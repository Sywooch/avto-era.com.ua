<?php

/**
 * ShopAdminKits
 *
 * @uses ShopController
 * @package
 * @version $id$
 * @copyright 2012 Siteimage
 * @author <vasyl@siteimage.com.ua>
 * @license
 */
class ShopAdminKits extends ShopAdminController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $model = ShopKitQuery::create()
                ->orderById(Criteria::ASC)
                ->find();

        $this->render(__FUNCTION__, array(
            'model' => $model,
        ));
    }

    /*     * *************  Product kits  ************** */

    /**
     * create a kit of products
     *
     * @param	integer $mainProductId - main product of a kit
     * @access	public
     * @return	void
     */
    public function kit_create($mainProductId = null) {
        $model = new ShopKit();

        if (!empty($_POST)) {
            $this->form_validation->set_rules($model->rules());

            if ($this->form_validation->run($this) == FALSE) {
                showMessage(validation_errors(), '', 'r');
            } else {
                $mainProductId = $this->input->post('MainProductId');
                $attachedProductsIds = $_POST['AttachedProductsIds'];

                foreach ($_POST['AttachedProductsIds'] as $key => $value) {
                    $attachedProductsDiscounts[$value] = $_POST['Discounts'][$key];
                }

                $mainProduct = SProductsQuery::create()
                        ->findPk($mainProductId);
                if ($mainProduct === NULL)
                    die(showMessage(ShopCore::t(lang('You did not ask for a set of main commodity','admin'))));

                $attachedProducts = SProductsQuery::create()
                        ->findPks($attachedProductsIds);
                if ($attachedProducts->count() === 0)
                    die(showMessage(ShopCore::t(lang('You must attach the goods to create a set','admin'))));

                // check if there are doesn't exist same kit
                $kitCheck = $this->_kitCheck($mainProductId, $attachedProductsIds);

                if ($kitCheck === FALSE) {
                    die(showMessage(ShopCore::t(lang('Kit with such goods already exists','admin'))));
                }

                $model->fromArray($_POST);

                //set max position for this kit between the kits with a same main Product
                $kitPosition = $this->_calcNewKitPosition($mainProductId);
                $model->setPosition($kitPosition);

                //main product of a kit
                $model->setProductId($mainProductId);

                foreach ($attachedProducts as $attachedProduct) {
                    $shopKitProduct = new ShopKitProduct();
                    $shopKitProduct->setProductId($attachedProduct->getId());
                    $shopKitProduct->setDiscount($attachedProductsDiscounts[$attachedProduct->getId()]);

                    $model->addShopKitProduct($shopKitProduct);
                }
                $model->save();

                showMessage(ShopCore::t(lang('Kit created','admin')));

                if ($_POST['action'] == 'tomain')
                    pjax('/admin/components/run/shop/kits/index');

                if ($_POST['action'] == 'save')
                    pjax('/admin/components/run/shop/kits/kit_edit/' . $model->getId());
            }
        } else {
            if ($mainProductId)
                $model->setProductId($mainProductId);
            $this->render(__FUNCTION__, array(
                'model' => $model,
            ));
        }
    }

    /**
     * edit a kit of products
     *
     * @access	public
     * @param	integer $roleId
     * @return	void
     */
    public function kit_edit($kitId, $canChangeMainProduct = true) {
        $model = ShopKitQuery::create()
                ->findPk($kitId);

        if ($model === null)
            $this->error404(ShopCore::t(lang('The kit was not found','admin')));

        if (!empty($_POST)) {
            $this->form_validation->set_rules($model->rules());

            if ($this->form_validation->run($this) == FALSE) {
                showMessage(validation_errors(), '', 'r');
            } else {
                $_POST['Active'] = (int)$_POST['Active'];
                $mainProductId = $this->input->post('MainProductId');
                $attachedProductsIds = $_POST['AttachedProductsIds'];

                foreach ($_POST['AttachedProductsIds'] as $key => $value) {
                    $attachedProductsDiscounts[$value] = $_POST['Discounts'][$key];
                }

                $mainProduct = SProductsQuery::create()
                        ->findPk($mainProductId);
                if ($mainProduct === NULL)
                    die(showMessage(ShopCore::t(lang('You did not ask for a set of main commodity ','admin'))));

                $attachedProducts = SProductsQuery::create()
                        ->findPks($attachedProductsIds);
                if ($attachedProducts->count() === 0)
                    die(showMessage(ShopCore::t(lang('You must attach the goods to create a set','admin'))));

                // check if there are doesn't exist same kit
                $kitCheck = $this->_kitCheck($mainProductId, $attachedProductsIds, $model->getId());

                if ($kitCheck === FALSE) {
                    die(showMessage(ShopCore::t(lang('Kit with such goods already exists','admin'))));
                }

                $model->fromArray($_POST);

                //main product of a kit
                $model->setProductId($mainProductId);

                ShopKitProductQuery::create()->filterByShopKit($model)->delete();
                foreach ($attachedProducts as $attachedProduct) {
                    $shopKitProduct = new ShopKitProduct();
                    $shopKitProduct->setProductId($attachedProduct->getId());
                    $shopKitProduct->setDiscount($attachedProductsDiscounts[$attachedProduct->getId()]);

                    $model->addShopKitProduct($shopKitProduct);
                }
                $model->save();

                showMessage(ShopCore::t(lang('Changes have been saved','admin')));

                if ($_POST['action'] == 'tomain')
                    pjax('/admin/components/run/shop/kits/index');
            }
        } else {
            $this->render(__FUNCTION__, array(
                'model' => $model,
                'canChangeMainProduct' => $canChangeMainProduct
            ));
        }
    }

    /**
     * Save kits positions.
     *
     * @access	public
     * @return	void
     */
    public function kit_save_positions() {
        if (sizeof($_POST['Position']) > 0) {
            foreach ($_POST['Position'] as $id => $pos) {
                ShopKitQuery::create()
                        ->filterById($id)
                        ->update(array('Position' => (int) $pos));
            }
        }
    }

    /**
     * Change a kit active status
     * @param	integer $kitId
     * @access	public
     * @return	void
     */
    public function kit_change_active($kitId) {
        $model = ShopKitQuery::create()
                ->findPk($kitId);

        if ($model !== null) {
            $model->setActive(!$model->getActive());
            if ($model->save())
                showMessage(lang('Changes have been saved','admin'));
        }
    }

    /**
     * delete a kit
     *
     * @param integer $kitId
     * @access public
     * @return	void
     */
    public function kit_delete() {
        $kitId = $this->input->post('ids');
        $model = ShopKitQuery::create()
                ->findPks($kitId);

        if ($model != null)
            $model->delete();
        showMessage(lang('Set (s) has been successfully removed (s)','admin'));
    }

    /**
     * check if there are doesn't exist same kit
     *
     * @access	protected
     * @param	integer $mainProductId - main product Id
     * @param	array	$attachedPIds - the ids of atached products
     * @return	boolean - TRUE if a kit doesnt exist(available for creation)
     */
    protected function _kitCheck($mainProductId, $attachedPIds, $kit = null) {
        //all existing kit with the same main product
        $kits = ShopKitQuery::create();

        if ($kit !== null) {
            $kits = $kits->filterById($kit, Criteria::NOT_IN);
        }

        $kits = $kits->filterByProductId($mainProductId)
                ->find();
        //if there are exist some kit|kits with a same main product
        if ($kits->count() > 0) {
            //getting attached products ids array of these kits
            foreach ($kits as $kit) {
                $criteria = ShopKitProductQuery::create()
                        ->select(array('ProductId'));
                $pIds = $kit->getShopKitProducts($criteria)
                        ->toArray();

                //count the total atached products to a kit in db
                $attachedPIdsCount = count($attachedPIds);

                //if a kit from a db has the same products number
                if (count($pIds) == $attachedPIdsCount) {
                    //check if there are difference between those kits
                    $pIdsDiff = array_diff($pIds, $attachedPIds);

                    //return FALSE if the kits are the same
                    if (empty($pIdsDiff))
                        return FALSE;
                }
            }
        }

        //return TRUE if there are doesn't exist same kit
        return TRUE;
    }

    /**
     * calculate position for a new kit
     *
     * @param	integer $mainProductId - main product Id
     * @return	integer $newPosition - position for a new kit
     */
    protected function _calcNewKitPosition($mainProductId = NULL) {
        if ($mainProductId !== NULL) {
            //max position of all existing kit with a same main product
            $kit = ShopKitQuery::create()
                    ->orderByPosition(Criteria::DESC)
                    ->filterByProductId($mainProductId)
                    ->limit(1)
                    ->findOne();

            if ($kit !== null)
                return $kit->getPosition() + 1;
        }

        return 0;
    }

    /*     * *************  Other  ************** */

    /**
     * get the list of products
     * @access	public
     * @return	void
     */
    public function get_products_list() {
        if (isset($_GET['term']))
            $_GET['q'] = $_GET['term'];
        $products = SProductsQuery::create();

        if (!empty($_GET['q'])) {
            $text = $_GET['q'];
            if (!strpos($text, '%'))
                $text = '%' . $text . '%';
            $products = $products->useI18nQuery(MY_Controller::getCurrentLocale())
                    ->filterByName('%' . $_GET['q'] . '%')
                    ->endUse();
        }

        $products = $products->limit((int) $_GET['limit'])
                ->find();

        foreach ($products as $product) {
            $response[] = array(
                'value' => ShopCore::encode($product->getName()),
                'identifier' => array(
                    'id' => $product->getId()
                )
            );
        }

        echo json_encode($response);
    }

    /**
     * redirecting
     *
     * @param $model
     * @param string $entityName  - name of a RBAC entity: role|privilege
     * @return	void
     */
    protected function _redirect($model, $entityName) {
        //get controller name from a class name
        $controllerName = str_replace('ShopAdmin', '', get_class());
        $controllerName = strtolower($controllerName);

        if ($_POST['_add'])
            $redirect_url = $controllerName . '/' . $entityName . '_list';

        if ($_POST['_create'])
            $redirect_url = $controllerName . '/' . $entityName . '_create';

        if ($_POST['_edit'])
            $redirect_url = $controllerName . '/' . $entityName . '_edit' . '/' . $model->getId();

        if ($redirect_url !== null)
            $this->ajaxShopDiv($redirect_url);
    }

}

