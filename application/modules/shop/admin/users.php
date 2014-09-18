<?php

/**
 * ShopAdminUsers
 *
 * @uses ShopAdminController
 * @package
 * @version $id$
 * @copyright
 * @author <dev@imagecms.net>
 * @license
 */
class ShopAdminUsers extends ShopAdminController {

    protected $perPage = 15;
    protected $ordersPerPage = 6;

    public function __construct() {
        parent::__construct();
    }

    /**
     * Display all order statuses.
     *
     * @access public
     */
    public function index($offset = 0, $orderField = '', $orderCriteria = '') {
        $model = SUserProfileQuery::create();

        if ($_GET['name'])
            $model = $model->where('SUserProfile.Name LIKE "%' . encode($_GET['name']) . '%"');

        if ($_GET['dateCreated_f'] && $_GET['dateCreated_t']) {
            $model = $model->where('FROM_UNIXTIME(SUserProfile.DateCreated, \'%Y-%m-%d\') >= ?', date('Y-m-d', strtotime($_GET['dateCreated_f'])));
            $model = $model->where('FROM_UNIXTIME(SUserProfile.DateCreated, \'%Y-%m-%d\') <= ?', date('Y-m-d', strtotime($_GET['dateCreated_t'])));
        }

        if ($_GET['email'])
            $model = $model->where('SUserProfile.UserEmail LIKE "%' . encode($_GET['email']) . '%"');

        if($_GET['role']){
            $model = $model->filterByRoleId(encode($_GET['role']));
        }

        if ($_GET['amout_f'] != NULL && $_GET['amout_t'] != NULL) {
            if ($_GET['amout_f']) {
                $amout_f = encode($_GET['amout_f']);
            } else {
                $amout_f = 0;
            }
            if ($_GET['amout_t']) {
                $amout_t = encode($_GET['amout_t']);
            } else {
                $amout_t = 0;
            }

            if ($amout_f < $amout_t) {
                $model = $model->where('SUserProfile.Amout > ?', $amout_f);
                $model = $model->where('SUserProfile.Amout < ?', $amout_t);
            }
        }


        if ($orderField !== '' && $orderCriteria !== '' && method_exists($model, 'filterBy' . $orderField)) {
            switch ($orderCriteria) {
                case 'ASC':
                    $model = $model->orderBy($orderField, Criteria::ASC);
                    $nextOrderCriteria = 'DESC';
                    break;

                case 'DESC':
                    $model = $model->orderBy($orderField, Criteria::DESC);
                    $nextOrderCriteria = 'ASC';
                    break;
            }
        }
        else
            $model->orderById('asc');

        // Count total users
        $totalUsers = $this->_count($model);

        $model = $model
                ->offset((int) $_GET['per_page'])
                ->limit($this->perPage)
                ->distinct()
                ->find();

        $getData = $_GET;
        unset($getData['per_page']);
        $queryString = '?' . http_build_query($getData);

        foreach ($model as $user) {
            $amountPurchases[$user->getId()] = 0;
            foreach (SOrdersQuery::create()->leftJoin('SOrderProducts')->distinct()->filterByUserId($user->getId())->find() as $order) {
                if ($order->getPaid() == TRUE) {
                    foreach ($order->getSOrderProductss() as $p) {
                        $amountPurchases[$user->getId()] += $p->getQuantity() * $p->getPrice();
                    }
                    $amountPurchases[$user->getId()] += $order->getDeliveryPrice();
                }
            }
        }

        // Create pagination

        if ($totalUsers > $this->perPage) {
            $this->load->library('Pagination');

            $config['base_url'] = site_url('admin/components/run/shop/users/index/?' . http_build_query($_GET));
            $config['container'] = 'shopAdminPage';
            $config['uri_segment'] = $this->uri->total_segments();
            $config['container'] = 'shopAdminPage';
            $config['page_query_string'] = true;
            $config['total_rows'] = $totalUsers;
            $config['per_page'] = $this->perPage;


            $config['separate_controls'] = true;
            $config['full_tag_open'] = '<div class="pagination pull-left"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['controls_tag_open'] = '<div class="pagination pull-right"><ul>';
            $config['controls_tag_close'] = '</ul></div>';
            $config['next_link'] = lang('Next', 'admin') . '&nbsp;&gt;';
            $config['prev_link'] = '&lt;&nbsp;'. lang('Prev', 'admin');
            $config['cur_tag_open'] = '<li class="btn-primary active"><span>';
            $config['cur_tag_close'] = '</span></li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['num_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $this->pagination->num_links = 5;
            $this->pagination->initialize($config);
            $this->template->assign('paginator', $this->pagination->create_links_ajax());
        }
        $usersDatas = array();
        foreach ($model as $o) {
            $usersDatas[] = $o->getFullName();
            $usersDatas[] = $o->getUserEmail();
            $usersDatas[] = $o->getDateCreated();
        }
        $usersDatas = array_unique($usersDatas);
        $roles =array();
        foreach ((array)$this->roles() as $role){
            $roles[$role->id] = $role->alt_name;
        }

        $this->render('list', array(
            'model' => $model,
            'amountPurchases' => $amountPurchases,
            'totalUsers' => $totalUsers,
            'nextOrderCriteria' => $nextOrderCriteria,
            'orderField' => $orderField,
            'queryString' => $queryString,
            'usersDatas' => $usersDatas,
            'filter_url' => http_build_query($_GET),
            'cur_uri_str' => base64_encode($this->uri->uri_string() . '?' . http_build_query($_GET)),
            'roles' => $roles
        ));
    }

    public function search($offset = 0, $orderField = '', $orderCriteria = '') {

        $model = SOrdersQuery::create();

        if (is_numeric($_GET['status_id']) && ($_GET['status_id'] != '-- none --'))
            $model = $model->filterByStatus($_GET['status_id']);

        if ($_GET['order_id'])
            $model = $model->where('SOrders.Id = ?', $_GET['order_id']);

        if ($_GET['created_from'])
            $model = $model->where('FROM_UNIXTIME(SOrders.DateCreated, \'%Y-%m-%d\') = ?', date('Y-m-d', strtotime($_GET['date_from'])));

        if ($_GET['created_to'])
            $model = $model->where('FROM_UNIXTIME(SOrders.DateCreated, \'%Y-%m-%d\') <= ?', date('Y-m-d', strtotime($_GET['date_to'])));

        if ($_GET['dateCreated_f'] && $_GET['dateCreated_t']) {
            $model = $model->where('FROM_UNIXTIME(SUserProfile.DateCreated, \'%Y-%m-%d\') >= ?', date('Y-m-d', strtotime($_GET['dateCreated_f'])));
            $model = $model->where('FROM_UNIXTIME(SUserProfile.DateCreated, \'%Y-%m-%d\') <= ?', date('Y-m-d', strtotime($_GET['dateCreated_t'])));
        }

        if ($_GET['amout_f'] && $_GET['amout_t']) {
            $model = $model->where('SUserProfile.Amout > ?', encode($_GET['amout_f']));
            $model = $model->where('SUserProfile.Amout < ?', encode($_GET['amout_t']));
        }

        if ($_GET['customer'])
            $model->_or()
                    ->where('SOrders.UserFullName LIKE ?', '%' . $_GET['customer'] . '%')
                    ->_or()
                    ->where('SOrders.UserEmail LIKE ?', '%' . $_GET['customer'] . '%')
                    ->_or()
                    ->where('SOrders.UserPhone LIKE ?', '%' . $_GET['customer'] . '%');

        if ($_GET['amount_from'])
            $model->where('SOrders.TotalPrice >= ?', $_GET['amount_from']);

        if ($_GET['amount_to'])
            $model->where('SOrders.TotalPrice <= ?', $_GET['amount_to']);

        if (is_numeric($_GET['paid']) && ($_GET['paid'] != '-- none --'))
            if (!$_GET['paid'])
                $model->where('SOrders.Paid IS NULL');
            else
                $model = $model->filterByPaid(true);

        // Count total orders
        $totalOrders = $this->_count($model);

        $nextOrderCriteria = '';

        if ($orderField !== '' && $orderCriteria !== '' && method_exists($products, 'filterBy' . $orderField)) {
            switch ($orderCriteria) {
                case 'ASC':
                    $model = $model->orderBy($orderField, Criteria::ASC);
                    $nextOrderCriteria = 'DESC';
                    break;

                case 'DESC':
                    $model = $model->orderBy($orderField, Criteria::DESC);
                    $nextOrderCriteria = 'ASC';
                    break;
            }
        }
        else
            $model->orderById('desc');

        $model = $model
                ->limit($this->perPage)
                ->offset((int) $offset)
                ->distinct()
                ->find();

        $getData = $_GET;
        unset($getData['per_page']);
        $queryString = '?' . http_build_query($getData);

        $orderStatuses = SOrderStatusesQuery::create()->orderByPosition(Criteria::ASC)->find();

        $usersDatas = array();
        foreach ($model as $o) {
            $usersDatas[] = $o->getUserFullName();
            $usersDatas[] = $o->getUserEmail();
            $usersDatas[] = $o->getUserPhone();
        }

        $usersDatas = array_unique($usersDatas);

        // Create pagination
        $this->load->library('pagination');
        $config['base_url'] = $this->createUrl('orders/search/');
        $config['container'] = 'shopAdminPage';
        $config['uri_segment'] = 7;
        $config['total_rows'] = $totalOrders;
        $config['per_page'] = $this->perPage;
        $this->pagination->num_links = 6;
        $config['suffix'] = ($orderField != '') ? $orderField . '/' . $orderCriteria . $queryString : $queryString;
        $this->pagination->initialize($config);

        $_GET['status'] = -1;
        $this->render('list', array(
            'model' => $model,
            'pagination' => $this->pagination->create_links_ajax(),
            'totalOrders' => $totalOrders,
            'nextOrderCriteria' => $nextOrderCriteria,
            'orderField' => $orderField,
            'queryString' => $queryString,
            'deliveryMethods' => SDeliveryMethodsQuery::create()->find(),
            'paymentMethods' => SPaymentMethodsQuery::create()->find(),
            'orderStatuses' => $orderStatuses,
            'usersDatas' => $usersDatas
        ));
    }

    private function roles() {
        $this->db->select("shop_rbac_roles.*", FALSE);
        $this->db->select("shop_rbac_roles_i18n.alt_name", FALSE);
        $this->db->where('locale', MY_Controller::getCurrentLocale());
        $this->db->join("shop_rbac_roles_i18n", "shop_rbac_roles_i18n.id = shop_rbac_roles.id");
        $roles = $this->db->get('shop_rbac_roles')->result();
        return $roles;
    }

    /**
     * Create new user.
     *
     * @access public
     */
    public function create() {

        $model = new SUserProfile();

        if ($_POST) {
            $this->load->model('dx_auth/users', 'user2');
            $val = $this->form_validation->set_rules($model->rules('create'));
            $val = $model->validateCustomData($val);

            if (!$val->run()) {
                showMessage(validation_errors(), '', 'r');
            } else {
                ($hook = get_hook('users_create_set_val_rules')) ? eval($hook) : NULL;

                $email = $_POST['UserEmail'];
                $role = $_POST['Role'];
                // check user mail
                if ($this->user2->check_email($email)->num_rows() > 0) {
                    showMessage(lang('A user with this email is already registered.', 'admin'), '', 'r');
                    exit;
                }

                $this->load->helper('string');
                $key = random_string('alnum', 5);
                if (ShopCore::$ci->dx_auth->register($val->set_value('Name'), $val->set_value('Password'), $val->set_value('UserEmail'), $val->set_value('Address'), $key, $val->set_value('Phone'), FALSE)) {
                    $user_info = ShopCore::$ci->user2->get_user_by_email($email)->row_array();

                    $model = SUserProfileQuery::create()
                            ->findOneById($user_info['id']);

                    $model->setRoleId($role);
                    $model->setKey($key);
                    $model->setPhone($_POST['Phone']);
                    $model->setAddress($_POST['Address']);

                    $model->save();

                    /** Init Event. Create Shop user */
                    \CMSFactory\Events::create()->registerEvent(array(
                        'user' => $model), 'ShopAdminUser:create');
                    \CMSFactory\Events::runFactory();


                    ($hook = get_hook('users_user_created')) ? eval($hook) : NULL;

                    //set user role
                    $this->user2->set_role($user_info['id'], $role);

                    $this->lib_admin->log(lang('Created by', 'admin') . ' ' . $val->set_value('Login'));

                    showMessage(lang('User created', 'admin'));

                    $action = $_POST['action'];
                    if ($action == 'close') {
                        pjax('/admin/components/run/shop/users/edit/' . $model->getId());
                    } else {
                        pjax('/admin/components/run/shop/users/index');
                    }
                } else {
                    showMessage(validation_errors(), '', 'r');
                }
            }
        } else {

            $this->render('create', array(
                'model' => $model,
                'roles' => $this->roles(),
            ));
        }
    }

    /**
     * Edit order satus by id.
     *
     * @access public
     */
    public function edit($id, $offset = 0, $ordersList = null) {
        $model = SUserProfileQuery::create()
                ->filterById((int) $id)
                ->findOne();

        if ($model === null)
            $this->error404(lang('User not found', 'admin'));

        if (!empty($_POST)) {
            $validation = $this->form_validation->set_rules($model->rules('edit'));
            $validation = $model->validateCustomData($validation);

            if ($validation->run($this) == FALSE) {

                showMessage(validation_errors(), '', 'r');
            } else {

                $model->fromArray($_POST);
                $model->save();

                $this->lib_admin->log(lang('Shop', 'admin') . ' - ' . lang('Changes have been saved', 'admin') .
                        '<a href="' . site_url('/admin/components/run/shop/users/edit/' . $id) . '">' . $model->getFullName() . '</a>'
                );

                showMessage(lang('Changes have been saved', 'admin'));

                $action = $_POST['action'];

                if ($action == 'close') {
                    pjax('/admin/components/run/shop/users/edit/' . $id);
                } else {
                    pjax('/admin/components/run/shop/users/index');
                }
            }
        } else {
            $amountPurchases = 0;
            foreach (SOrdersQuery::create()->leftJoin('SOrderProducts')->distinct()->filterByUserId($id)->find() as $order) {
                if ($order->getPaid() == TRUE) {
                    foreach ($order->getSOrderProductss() as $p) {
                        $amountPurchases += $p->getQuantity() * $p->getPrice();
                    }
                    $amountPurchases += $order->getDeliveryPrice();
                }
            }
            $wishListData = unserialize($model->getWishListData());

            if (is_array($wishListData)) {
                $newData = array();
                $newCollection = array();
                $ids = array_map("array_shift", $wishListData);

                if (sizeof($ids) > 0) {
                    // Load products
                    $collection = SProductsQuery::create()
                            ->findPks(array_unique($ids));

                    for ($i = 0; $i < sizeof($collection); $i++) {
                        $newCollection[$collection[$i]->getId()] = $collection[$i];
                    }

                    foreach ($wishListData as $key => $item) {
                        if ($newCollection[$item[0]] !== null) {
                            $item['model'] = $newCollection[$item[0]];
                            $productVariant = SProductVariantsQuery::create()->filterById($item[1])->findOne();
                            $item['variantName'] = $productVariant->getName();
                            $item['price'] = money_format('%i', $productVariant->getPrice());
                            $newData[$key] = $item;
                        }
                    }
                }
            }

            $ordersModel = SOrdersQuery::create()
                    ->orderById('desc')
                    ->filterByUserId($id);

            // Count total orders
            $totalOrders = $this->_count($ordersModel);

            $ordersModel = $ordersModel
                    ->distinct()
                    ->limit($this->ordersPerPage)
                    ->offset((int) $offset)
                    ->find();

            $orderStatuses = SOrderStatusesQuery::create()->orderByPosition(Criteria::ASC)->find();

            // Create pagination
            $this->load->library('pagination');
            $config['base_url'] = $this->createUrl('users/edit/' . $id . '/');
            $config['container'] = 'shopEditUserOrders';
            $config['uri_segment'] = 8;
            $config['total_rows'] = $totalOrders;
            $config['per_page'] = $this->ordersPerPage;
            //$config['page_query_string'] = TRUE;
            $this->pagination->num_links = 6;
            $config['suffix'] = 'true';
            $this->pagination->initialize($config);

            if ($ordersList) {
                $this->render('edit_orders_list', array(
                    'ordersModel' => $ordersModel,
                    'orderStatuses' => $orderStatuses,
                    'pagination' => $this->pagination->create_links_ajax(),
                ));
            } else {



                $this->render('edit', array(
                    'model' => $model,
                    'amountPurchases' => $amountPurchases,
                    'newData' => $newData,
                    'ordersModel' => $ordersModel,
                    'orderStatuses' => $orderStatuses,
                    'pagination' => $this->pagination->create_links_ajax(),
                    'roles' => $this->roles(),
                ));
            }
        }
    }

    /**
     * Delete user by id.
     *
     * @access public
     */
    public function deleteAll() {
        if (empty($_POST['ids'])) {
            showMessage(lang('No data transmitted', 'admin'), '', 'r');
            exit;
        }
        if (sizeof($_POST['ids'] > 0)) {
            $model = SUserProfileQuery::create()
                    ->findPks($_POST['ids']);

            if (!empty($model)) {
                foreach ($model as $order) {
                    $order->delete();
                }

                showMessage(lang('Members removed', 'admin'));
            }
        }
    }

    /**
     * Count total elements in the list
     *
     * @param $object
     * @return int */
    protected function _count($object) {
        $object = clone $object;
        return $object->count();
    }

    public function auto_complite($type) {

        $s_limit = $this->input->get('limit');
        $s_coef = $this->input->get('term');

        $model = SUserProfileQuery::create();

        if ($type == 'name') {
            $model = $model->where('SUserProfile.Name LIKE "%' . $s_coef . '%"');
        } else {
            $model = $model->where('SUserProfile.UserEmail LIKE "%' . $s_coef . '%"');
        }
        $model = $model
                ->limit($s_limit)
                ->find();


        foreach ($model as $product) {


            if ($type == 'name') {
                $response[] = array(
                    'value' => ShopCore::encode($product->getName()),
                );
            } elseif ($type == 'email') {
                $response[] = array(
                    'value' => ShopCore::encode($product->getUserEmail()),
                );
            }
        }
        echo json_encode($response);
    }

}

