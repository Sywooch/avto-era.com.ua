<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Shop Cart Controller
 *
 * @uses ShopController
 * @package Shop
 * @copyright 2013 ImageCMS
 * @author <dev@imagecms.net>
 */
class Cart extends \Cart\BaseCart {

    /** Product quantity max number */
    public $maxRange = 20;
    public $validation_rules = array();

    public function __construct() {
        parent::__construct();
        $this->load->library('Form_validation');
        $this->_userId = $this->dx_auth->get_user_id();

        /**
         * Setting validation rules
         *
         * This is for let our methods know validation rules(which fields are required, for example),
         * before this method be called, so please set validation rules for your fields here
         * instead of direct cascade setting in "$this->form_validation->set_rules".
         * Example usage see this method "_validateUserInfo".
         */
        $this->validation_rules['userInfo[fullName]'] = 'required|max_length[50]';
        $this->validation_rules['userInfo[email]'] = 'valid_email|required|max_length[30]';
        $this->validation_rules['deliveryMethodId'] = 'callback_delivery_method_id_check';
    }

    /**
     * Display cart page.
     *
     * @access public
     */
    public function index() {

        $this->load->helper('Form');
        $this->core->set_meta_tags(ShopCore::t(lang('Cart')));
        $this->template->registerMeta("ROBOTS", "NOINDEX, NOFOLLOW");

        $msg = null;
        // Make order and clean cart.
        if ($_POST['makeOrder'] == 1)
            $this->_makeOrder();

        // Recount items

        if ($_POST['recount'] == 1) {
            ShopCore::app()->SCart->recount();
            if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest')
                $this->_redirectBack();
        }

        // Create ranges from dropdown list.
        $ranges = range(1, $this->maxRange);

        foreach (SDeliveryMethodsQuery::create()->joinWithI18n(MY_Controller::getCurrentLocale())->enabled()->orderBy('SDeliveryMethodsI18n.Name')->find() as $key => $deliveryMethod) {
            if ($key == 0)
                $firstDel = $deliveryMethod;
            foreach ($deliveryMethod->getPaymentMethodss() as $paymentMethod) {
                $paymentMethods[$deliveryMethod->getId()][] = $paymentMethod->getId();
            }
        }


        if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
            $cart_tpl = 'cart';
            $this->session->set_userdata($_POST['userInfo']);
            $this->render($cart_tpl, array(
                'items' => ShopCore::app()->SCart->loadProducts(),
                'deliveryMethods' => SDeliveryMethodsQuery::create()->joinWithI18n(MY_Controller::getCurrentLocale(), Criteria::LEFT_JOIN)->enabled()->orderBy('SDeliveryMethodsI18n.Name')->find(),
                'paymentMethods' => $firstDel->getPaymentMethodss(),
                'paymentMethodsArray' => $paymentMethods,
                'ranges' => array_combine($ranges, $ranges),
                'profile' => $this->_getUserProfile(),
                'isRequired' => $this->_isRequired()
            ));
        }
    }

    /**
     * Render order summary Page for User.
     * @param  string $orderSecretKey <p>Order Secret key. Random string</p>
     */
    public function view($orderSecretKey = null) {
        /** Support for Robokassa */
        if (isset($_REQUEST['Shp_orderKey']) && isset($_REQUEST['Shp_pmId'])) {
            $_GET['pm'] = $_REQUEST['Shp_pmId'];
            $orderSecretKey = $_REQUEST['Shp_orderKey'];
        }

        /** Get SOrders Model */
        $model = SOrdersModel::getOrdersByKey($orderSecretKey);
        ($model !== null) OR $this->core->error_404();

        /** Init Payment Systems */
        ShopCore::app()->SPaymentSystems->init($model);
        if (isset($_GET['pm']) && $_GET['pm'] > 0) {
            $paymentMethod = SPaymentMethodsQuery::create()->findPk((int) $_GET['pm']);
            $paymentProcessor = ShopCore::app()->SPaymentSystems->loadPaymentSystem($paymentMethod->getPaymentSystemName(), $paymentMethod);
            if ($paymentProcessor instanceof BasePaymentProcessor)
                $paymentProcessor->processPayment();
        }


        /** Init Payment Method for order */
        if ($model->getSDeliveryMethods() instanceof SDeliveryMethods) {
            $cr = new Criteria();
            $cr->add(SPaymentMethodsPeer::ACTIVE, TRUE, Criteria::EQUAL);
            $cr->add(SPaymentMethodsPeer::ID, $model->getPaymentMethod(), Criteria::EQUAL);
            $paymentMethods = $model->getSDeliveryMethods()->getPaymentMethodss($cr);
        }

        /** Start Render Template */
        $this->core->set_meta_tags(ShopCore::t(lang('Order view') . ' #' . $model->getId()));

        $this->template->registerMeta("ROBOTS", "NOINDEX, NOFOLLOW");
        $this->template->registerJsScript($this->load->library('lib_seo')->renderGAForCart($model, $this->core->settings));

        $freeFrom = SDeliveryMethodsQuery::create()
                ->findPk($model->getDeliveryMethod())
                ->getFreeFrom();

        $this->render('order_view', array(
            'model' => $model,
            'freeFrom' => $freeFrom,
            'paymentMethod' => $paymentMethods['0'],
        ));
    }

    /**
     * Add product to cart from POST data.
     *
     * @access public
     */
    public function add($instance = 'SProducts') {
        if (TRUE === parent::add($instance)) {
            if ($this->input->post('mobile') == 1)
                redirect(shop_url('cart'));
            else
                $this->_redirectBack();
        } else {
            $this->core->error_404();
        }
    }

    /**
     * Remove product from cart by ID
     * @access public
     * @author <dev@imagecms.net>
     * @copyright (c) 2013 ImageMCMS
     */
    public function delete() {
        $id = $this->uri->segment($this->uri->total_segments());
        if (TRUE === parent::delete($id)) {
            $this->_redirectBack();
        } else {
            $this->core->error_404();
        }
    }

    /**
     * Save ordered products to database
     *
     * @access protected
     * @return void
     */
    protected function _makeOrder() {

        $register = true;
        $order = new SOrders;
        // Validate user data
        if ($this->_validateUserInfo($order) === false) {
            $this->template->add_array(array(
                'errors' => validation_errors(),
            ));
            return false;
        }

        // Check if delivery method exists.
        $deliveryMethod = SDeliveryMethodsQuery::create()
                ->findPk((int) $_POST['deliveryMethodId']);
        if ($deliveryMethod === null) {
            $deliveryMethodId = 0;
            $deliveryPrice = 0;
        } else {
            $freeFrom = $deliveryMethod->getFreeFrom();

            $deliveryMethodId = $deliveryMethod->getId();
            $deliveryPrice = $deliveryMethod->getPrice();
        }

        // Check if payment method exists.
        $paymentMethod = SPaymentMethodsQuery::create()
                ->findPk((int) $_POST['paymentMethodId']);

        if ($paymentMethod === null) {
            $paymentMethodId = 0;
        } else {
            $paymentMethodId = $paymentMethod->getId();
        }


        // Set user id if logged in
        if ($this->dx_auth->is_logged_in() === true) {
            $order->setUserId($this->dx_auth->get_user_id());
            $user_id = $this->dx_auth->get_user_id();
            $register = false;
        } else {
            $userInfo = $this->_createUser($_POST['userInfo']['email']);
            $order->setUserId($userInfo['id']);
            $user_id = $userInfo['id'];
        }

        $order->setKey(self::createCode());
        $order->setDeliveryMethod($deliveryMethodId);
        //$order->setDeliveryPrice($deliveryPrice);
        $order->setPaymentMethod($paymentMethodId);
        $order->setStatus(1);
        $order->setUserFullName($_POST['userInfo']['fullName']);
        $order->setUserEmail($_POST['userInfo']['email']);
        $order->setUserPhone($_POST['userInfo']['phone']);
        $order->setUserDeliverTo($_POST['userInfo']['deliverTo']);
        $order->setUserComment($_POST['userInfo']['commentText']);
        $order->setDateCreated(time());
        $order->setDateUpdated(time());
        $order->setUserIp($this->input->ip_address());

        // products for admin's email (variant_name, quantity, price)
        $products = array();

        $totalPrice = 0;
        // Add products
        foreach (ShopCore::app()->SCart->loadProducts() as $cartItem) {

            $product = array(
                'quantity' => $cartItem['quantity'],
                'price' => $cartItem['price'],
            );

            if ($cartItem['model'] instanceof SProducts) {
                $model = $cartItem['model'];

                if (ShopCore::app()->SDiscountsManager->getActive())
                    $order->setComulativ($model->firstVariant->getNumDiscount());

                $model->setAddedToCartCount($model->getAddedToCartCount() + $cartItem['quantity']);
                $model->save();

                $orderedItem = new SOrderProducts;

                $product['variant_name'] = $cartItem['model']->getName();

                $orderedItem->fromArray(array(
                    'ProductId' => $cartItem['productId'],
                    'VariantId' => $cartItem['variantId'],
                    'ProductName' => $cartItem['model']->getName(),
                    'VariantName' => $cartItem['variantName'],
                    'Quantity' => $cartItem['quantity']));

                $orderedItem->fromArray(array('Price' => $cartItem['price']));

                $order->addSOrderProducts($orderedItem);
                $price = $this->db->query("select price from shop_product_variants where id = '" . $cartItem['variantId'] . "'")->row()->price;
                $totalPrice += $price * $cartItem['quantity'];
            } elseif ($cartItem['model'] instanceof ShopKit) {
                $model = $cartItem['model'];

                //adding main product of kit to the order
                $mp = $model->getMainProduct();
                $mp->setAddedToCartCount($mp->getAddedToCartCount() + $cartItem['quantity']);
                $mp->save();

                $mpV = $mp->getFirstVariant();

                $product['variant_name'] = $mp->getName();

                $orderedItem = new SOrderProducts;
                $orderedItem->fromArray(array(
                    'KitId' => $model->getId(),
                    'ProductId' => $mp->getId(),
                    'VariantId' => $mpV->getId(),
                    'ProductName' => $mp->getName(),
                    'VariantName' => $mpV->getName(),
                    'Quantity' => $cartItem['quantity'],
                    'IsMain' => TRUE,));

                $orderedItem->fromArray(array('Price' => $mpV->getPrice()));

                $order->addSOrderProducts($orderedItem);

                //adding atached products of kit to the order
                foreach ($model->getShopKitProducts() as $shopKitProduct) {
                    $ap = $shopKitProduct->getSProducts();
                    $ap->setAddedToCartCount($ap->getAddedToCartCount() + $cartItem['quantity']);
                    $ap->save();

                    $apV = $ap->getKitFirstVariant($shopKitProduct);

                    $orderedItem = new SOrderProducts;
                    $orderedItem->fromArray(array(
                        'KitId' => $model->getId(),
                        'ProductId' => $ap->getId(),
                        'VariantId' => $apV->getId(),
                        'ProductName' => $ap->getName(),
                        'VariantName' => $apV->getName(),
                        'Quantity' => $cartItem['quantity'],
                        'IsMain' => FALSE,
                            )
                    );

                    $orderedItem->fromArray(array('Price' => $apV->getPrice()));

                    $order->addSOrderProducts($orderedItem);
                }
                $totalPrice += $cartItem['price'] * $cartItem['quantity'];
            }

            $products[] = $product;

            // For SMS
//            $mes = $cartItem['model']->getName();
        }
        if ($deliveryMethod->getIsPriceInPercent() === true) {
            $order->setDeliveryPrice($totalPrice * $deliveryPrice / 100);
        } else {
            $order->setDeliveryPrice($totalPrice < $freeFrom ? $deliveryPrice : 0);
        }


        $order->setTotalPrice($totalPrice);


        $order->save();


        \CMSFactory\Events::create()->registerEvent(array('order' => $order, 'key' => $_POST['giftkey'], 'price' => $totalPrice), 'MakeOrder')->runFactory();

        $orderStatus = new SOrderStatusHistory;
        $orderStatus->setOrderId($order->getId());
        $orderStatus->setStatusId(1);
        $orderStatus->setUserId($user_id);
        $orderStatus->setDateCreated(time());
        $orderStatus->setComment($_POST['userInfo']['commentText']);
        $orderStatus->save();

        $productsForEmail = $this->createProductsInfoTable_($products, $order->getDiscount());

        $checkLink = site_url() . "admin/components/run/shop/orders/createPdf/" . trim($order->getId());

        $emailData = array(
            'userName' => $order->user_full_name,
            'userEmail' => $order->user_email,
            'userPhone' => $order->user_phone,
            'userDeliver' => $order->user_deliver_to,
            'orderLink' => shop_url('cart/view/' . $order->key),
            'products' => $productsForEmail,
            'deliveryPrice' => $deliveryPrice,
            'checkLink' => $checkLink,
        );

        \cmsemail\email::getInstance()->sendEmail($order->user_email, 'make_order', $emailData);
        // Send SMS to manager
        //ShopCore::app()->SGCalendarSMS->sendSMS('Новый заказ: '.substr($mes, 0, 35));
        // Clear cart data.
        ShopCore::app()->SCart->removeAll();

        // Set flash data.
        $this->session->set_flashdata('makeOrder', true);
        if ($register === true) {
            $userInfo = $this->_createUser($_POST['userInfo']['email']);
            $order->setUserId($userInfo['id']);
            $user_id = $userInfo['id'];
        }

        // Redirect to view ordered prducts.
        redirect(shop_url('cart/view/' . $order->getKey()));
    }

    /**
     * Creates the table with order info for cmsemail 'make_order' template
     * @param array $productsInfo
     * @return string html table
     */
    private function createProductsInfoTable_($productsInfo, $discount) {
        // getting the site's default currency
        $CI = &get_instance();
        $res = $CI->db->query("SELECT `symbol` FROM `shop_currencies` WHERE `main` = 1 LIMIT 1");
        $res2 = $res->result_array();
        $defaultCurrency = $res2[0]['symbol'];

        $tdStyle = " style='border: 1px solid #e5e5e5;' ";
        //$tdStyle = "";
        // begining creating the table
        $productsForEmail =
                "<table cellspacing='0' style='min-width: 400px; border: 1px solid #eaeaea;'>" .
                "<thead>" .
                "   <th{$tdStyle}>Продукт</th>" .
                "   <th{$tdStyle}>Количество</th>" .
                "   <th{$tdStyle}>Цена</th>" .
                "   <th{$tdStyle}>Cумма</th>" .
                "</thead>" .
                "<tbody>";

        $total = 0;
        // adding product rows
        foreach ($productsInfo as $product) {
            $curTotal = $product['price'] * $product['quantity'];
            $total += $curTotal;
            $productsForEmail .= "<tr>" .
                    "<td{$tdStyle}>{$product['variant_name']}</td>" .
                    "<td{$tdStyle}>{$product['quantity']}</td>" .
                    "<td{$tdStyle}>{$product['price']} {$defaultCurrency}</td>" .
                    "<td{$tdStyle}>{$curTotal} {$defaultCurrency}</td>" .
                    "</tr>";
        }

        // if there is a discount
        if (!empty($discount)) {
            $total -= $discount;
            $productsForEmail .= "<tr><td colspan='3'{$tdStyle}>Сумма скидки</td><td{$tdStyle}>{$discount} {$defaultCurrency}</td></tr>";
        }

        // total row
        $productsForEmail .= "<tr><td colspan='3'{$tdStyle}>Общая сумма</td><td{$tdStyle}>{$total} {$defaultCurrency}</td></tr>";
        $productsForEmail .= "</tbody></table>";
        return $productsForEmail;
    }

    /**
     * Create random code.
     *
     * @param int $charsCount
     * @param int $digitsCount
     * @static
     * @access public
     * @return string
     */
    public static function createCode($charsCount = 3, $digitsCount = 7) {
        $chars = array('q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'p', 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm');

        if ($charsCount > sizeof($chars))
            $charsCount = sizeof($chars);

        $result = array();
        if ($charsCount > 0) {
            $randCharsKeys = array_rand($chars, $charsCount);

            foreach ($randCharsKeys as $key => $val)
                array_push($result, $chars[$val]);
        }

        for ($i = 0; $i < $digitsCount; $i++)
            array_push($result, rand(0, 9));

        shuffle($result);

        $result = implode('', $result);

        if (sizeof(SOrdersQuery::create()->filterByKey($result)->select(array('Key'))->limit(1)->find()) > 0)
            self::createCode($charsCount, $digitsCount);

        return $result;
    }

    /**
     * Validate user data.
     *
     * @return void
     */
    protected function _validateUserInfo($order) {
        $this->form_validation->set_rules('userInfo[fullName]', ShopCore::t('Имя, фамилия'), $this->validation_rules['userInfo[fullName]']);
        $this->form_validation->set_rules('userInfo[email]', ShopCore::t('Email'), $this->validation_rules['userInfo[email]']);
        $this->form_validation->set_rules('userInfo[phone]', ShopCore::t('Телефон'), '');
        $this->form_validation->set_rules('userInfo[deliverTo]', ShopCore::t('Адрес доставки'), '');
        $this->form_validation->set_rules('userInfo[commentText]', ShopCore::t('Комментарий к заказу'), '');
        $this->form_validation->set_rules('deliveryMethodId', ShopCore::t('Способ доставки'), $this->validation_rules['deliveryMethodId']);

        $user = new SUserProfile();
        $this->form_validation = $user->validateCustomData($this->form_validation);
        unset($user);
        $this->form_validation = $order->validateCustomData($this->form_validation);

        if ($this->form_validation->run() == FALSE)
            return false;
        else
            return true;
    }

    function delivery_method_id_check($deliveryMethodId = 0) {
        // Check if delivery method exists.
        $deliveryMethod = SDeliveryMethodsQuery::create()
                ->findPk((int) $deliveryMethodId);

        if ($deliveryMethod === null) {
            $this->form_validation->set_message('delivery_method_id_check', 'Такого способа доставки не существует.');
            return false;
        } else {
            return true;
        }
    }

    public function clear() {
        ShopCore::app()->SCart->removeAll();
        $this->redirectToCart();
    }

    protected function _redirectBack() {
        redirect($_SERVER['HTTP_REFERER']);
        exit;
    }

    protected function redirectToCart() {
        redirect(shop_url('cart'));
    }

    protected function _getUserProfile() {

        if (!$this->_userId) {
            return array(
                'name' => $this->session->userdata('fullName'),
                'phone' => $this->session->userdata('phone'),
                'address' => $this->session->userdata('deliverTo'),
                'email' => $this->session->userdata('email'),
            );
        } else {

            if (!$this->_userId)
                return array();

            $profile = SUserProfileQuery::create()->filterById($this->_userId)->findOne();
            $user = $this->db->where('id', $this->_userId)->get('users')->row_array();
            if (!$profile)
                return array();

            if (!($email = $profile->getUserEmail()))
                $email = $user['email'];

            return array(
                'id' => $profile->getId(),
                'name' => $profile->getName(),
                'phone' => $profile->getPhone(),
                'address' => $profile->getAddress(),
                'email' => $email,
            );
        }
    }

    protected function _createUser($email) {
        $userInfo = array('id' => NULL);

        if ((int) ShopCore::app()->SSettings->userInfoRegister == 1) {

            $this->load->model('dx_auth/users', 'user2');
            $password = self::createCode();

            if ($this->dx_auth->is_email_available($email)) {
                $userInfo = $this->dx_auth->register($_POST['userInfo']['fullName'], $password, $email, $_POST['userInfo']['deliverTo'], '', $_POST['userInfo']['phone'], TRUE);
                $userInfo['id'] = NULL;

                if ($query = ShopCore::$ci->user2->get_user_by_email($email) AND $query->num_rows() == 1) {
                    $userInfo['id'] = $query->row()->id;
                    $userInfo['fullName'] = $_POST['userInfo']['fullName'];
                    // Send email to user.
//                    $this->_sendUserInfoMail($userInfo);
                }
            }
        }
        return $userInfo;
    }

    protected function _isRequired() {
        foreach ($this->validation_rules as $validationKey => $validationValue) {
            if (stristr($validationValue, 'required'))
                $reqArr[$validationKey] = TRUE;
            else
                $reqArr[$validationKey] = FALSE;
        }

        return $reqArr;
    }

    /**
     * @deprecated since v4.4.5
     * @updated 15 Aug 2013
     */
    public function displayPopupConfirm() {
        trigger_error('Deprecated: ' . __FUNCTION__ . ' method is deprecated', E_USER_DEPRECATED);
        $this->template->display('confirm_popup');
    }

    /**
     * @deprecated since v4.4.5
     * @updated 15 Aug 2013
     */
    protected function _email_check($email) {
        return $this->dx_auth->is_email_available($email);
    }

    /**
     * @deprecated since v4.4.5
     * @updated 15 Aug 2013
     */
    protected function _username_check($username) {
        return $this->dx_auth->is_username_available($username);
    }

    /**
     * @deprecated since v4.4.5
     * @updated 15 Aug 2013
     */
    public function notification_valid_date($str) {
        if (preg_match('/([0-9]{1,2})\-([0-9]{1,2})\-([0-9]{4})/', $str)) {
            $arr = explode("-", $str);
            $dd = $arr[0];
            $mm = $arr[1];
            $yyyy = $arr[2];
            if ((checkdate($mm, $dd, $yyyy)))
                return TRUE;
        }
        $this->form_validation->set_message('notification_valid_date', 'Поле Актуально до должно содержать правильную дату.');
        return FALSE;
    }

    /**
     * @deprecated since v4.4.5
     * @updated 15 Aug 2013
     */
    public function product_check($id) {
        $product = SProductsQuery::create()->findPk((int) $id);
        if ($product === null) {
            $this->form_validation->set_message('product_check', 'Такого товара не существует');
            return false;
        }
        else
            return true;
    }

    /**
     * @deprecated since v4.4.5
     * @updated 15 Aug 2013
     */
    public function variant_check($id) {
        $variant = SProductVariantsQuery::create()->findPk((int) $id);
        if ($variant === null) {
            $this->form_validation->set_message('variant_check', 'Такого варианта товара не существует');
            return false;
        }
        else
            return true;
    }

    /**
     * @deprecated since v4.4.5
     * @updated 15 Aug 2013
     */
    public function sendNotifyingRequest() {
        $val = $this->form_validation;
        $val->set_rules('productId', ShopCore::t('ID продукта'), 'callback_product_check');
        $val->set_rules('variantId', ShopCore::t('ID варианта'), 'callback_variant_check');
        $val->set_rules('name', ShopCore::t('Имя'), 'trim|xss_clean|required|max_length[50]');
        $val->set_rules('email', ShopCore::t('Email'), 'valid_email|required|max_length[50]');
        $val->set_rules('phone', ShopCore::t('Телефон'), 'trim|xss_clean|required|max_length[50]');
        $val->set_rules('actual', ShopCore::t('Актуально до'), 'required|callback_notification_valid_date');
        $val->set_rules('comment', ShopCore::t('Комментарий'), 'trim|xss_clean|max_length[500]');
        if ($val->run($this) == FALSE)
            echo $val->error_string();
        else {
            $notification = new SNotifications;
            $notification->setProductId((int) $val->set_value('productId'));
            $notification->setVariantId((int) $val->set_value('variantId'));
            $notification->setUserName($val->set_value('name'));
            $notification->setUserEmail($val->set_value('email'));
            $notification->setUserPhone($val->set_value('phone'));
            $notification->setUserComment($val->set_value('comment'));
            $notification->setStatus(1);
            $notification->setDateCreated(time());
            $notification->setActiveTo(strtotime($val->set_value('actual')));
            $notification->setNotifiedByEmail(0);
            $notification->save();
            echo 'done';
        }
    }

    /**
     * @deprecated since v4.4.5
     * @updated 15 Aug 2013
     */
    public function getPaymentsMethods($deliveryId) {
        //print_r(SPaymentMethodsQuery::create()->filterByActive(true)->orderByPosition()->find());
        $paymentMethods = ShopDeliveryMethodsSystemsQuery::create()->filterByDeliveryMethodId($deliveryId)->find();
        foreach ($paymentMethods as $paymentMethod) {
            $paymentMethodsId[] = $paymentMethod->getPaymentMethodId();
        }
        $paymentMethod = SPaymentMethodsQuery::create()->filterByActive(true)->where('SPaymentMethods.Id IN ?', $paymentMethodsId)->orderByPosition()->find();
        echo $this->render('cart_delivery_methods', array(
            'paymentMethods' => $paymentMethod
                ), true);
    }

}

/* End of file cart.php */
