<?php

/**
 * ShopAdminCurrencies 
 * 
 * @uses ShopAdminController
 * @package 
 * @version $id$
 * @copyright 
 * @author <dev@imagecms.net> 
 * @license 
 */
class ShopAdminCurrencies extends ShopAdminController {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Display list of currencies
     * 
     * @access public
     */
    public function index() {
        $model = SCurrenciesQuery::create()
                ->find();

        $this->render('list', array(
            'model' => $model,
        ));
    }

    /**
     * Create new currency
     * 
     * @access public
     * @return void
     */
    public function create() {
        $model = new SCurrencies;

        if ($_POST) {
            $this->form_validation->set_rules($model->rules());

            if ($this->form_validation->run($this) == FALSE) {
                showMessage(validation_errors(), '', 'r');
            } else {
                $model->fromArray($_POST);
                $model->save();
                showMessage(lang('Currency created', 'admin'));
                if ($_POST['action'] == 'tomain')
                    pjax('/admin/components/run/shop/currencies');
                else
                    pjax('/admin/components/run/shop/currencies/edit/' . $model->getId());
            }
        }
        else {
            $this->render('create', array(
                'model' => $model,
            ));
        }
    }

    /**
     * Edit currency
     * 
     * @access public
     */
    public function edit($id) {
        $model = SCurrenciesQuery::create()
                ->findPk($id);

        if ($model === null)
            $this->error404(lang('Currency not found', 'admin'));

        if ($_POST) {
            $this->form_validation->set_rules($model->rules());

            if ($this->form_validation->run($this) == FALSE) {
                showMessage(validation_errors());
            } else {
                $model->fromArray($_POST);
                $model->save();

                showMessage(lang('Changes have been saved', 'admin'));

                if ($_POST['action'] == 'tomain')
                    pjax('/admin/components/run/shop/currencies');

                if ($_POST['action'] == 'toedit')
                    pjax('/admin/components/run/shop/currencies/edit/' . $model->getId());

                if ($_POST['action'] == 'tocreate')
                    pjax('/admin/components/run/shop/currencies/create');
            }
        }
        else {
            $this->render('edit', array(
                'model' => $model,
            ));
        }
    }

    public function showOnSite() {
        if ($_POST) {
            $model = SCurrenciesQuery::create()
                    ->findPk((int) $_POST['id']);

            if ($model === null)
                $this->error404(lang('Currency not found', 'admin'));

            $model->setShowOnSite((int) $_POST['showOnSite']);
            $model->save();
        }
    }

    /**
     * makeCurrencyDefault 
     * 
     * @access public
     */
    public function makeCurrencyDefault() {
        if (count(SCurrenciesQuery::create()->find()) > 1) {
            $id = (int) $_POST['id'];

            $model = SCurrenciesQuery::create()
                    ->findPk($id);

            if ($model !== null) {
                SCurrenciesQuery::create()->update(array('IsDefault' => false));

                $model->setIsDefault(true);
                if ($model->save())
                    echo true;
            }
        }
    }

    /**
     * makeCurrencyMain 
     * 
     * @access public
     */
    public function makeCurrencyMain() {
//        if (count(SCurrenciesQuery::create()->find()) > 1) {
//            $id = (int) $_POST['id'];
//
//            $model = SCurrenciesQuery::create()
//                    ->findPk($id);
//
//            if ($model !== null) {
//                SCurrenciesQuery::create()->update(array('IsDefault' => false));
//
//                $model->setIsDefault(true);
//                if ($model->save())
//                    echo true;
//            }
//        }
        $this->makeCurrencyDefault();
        if (count(SCurrenciesQuery::create()->find()) > 1) {
            $id = (int) $_POST['id'];
            $recount = $_POST['recount'];

            $model = SCurrenciesQuery::create()
                    ->findPk($id);

            if ($model !== null) {
                SCurrenciesQuery::create()->update(array('Main' => false));

                $model->setMain(true);
                if ($model->save())
                    echo true;

                if (ShopCore::app()->SCurrencyHelper->checkPrices())
                    if ($recount == '1') {
                        // recount prices;
                    }
            }
        }
    }

    /**
     * Delete currency
     * 
     * @access public
     */
    public function delete() {
        $model = SCurrenciesQuery::create()
                ->findPk($_POST['ids']);

        if ($model !== null) {
            if ($model->getMain() == true) {
                $response = showMessage(lang('Unable to remove the main currency', 'admin'), false, '', true);
                echo json_encode(array('response' => $response));
                //pjax('/admin/components/run/shop/currencies');
                exit;
            }

//            if ($model->getIsDefault() == true) {
//                $response = showMessage('Невозможно удалить валюту по умолчанию.', false, '', true);
//                echo json_encode(array('response' => $response));
//                //pjax('/admin/components/run/shop/currencies');
//                exit;
//            }

            $paymentMethodsCount = SPaymentMethodsQuery::create()
                    ->filterByCurrencyId($model->getId())
                    ->count();

            if ($paymentMethodsCount > 0) {
                $response = showMessage(lang('Error. Currency used by other objects. Check the payment methods', 'admin'), false, '', true);
                echo json_encode(array('response' => $response));
                //pjax('/admin/components/run/shop/currencies');
                exit;
            }

            $productVariantsCount = SProductVariantsQuery::create()
                    ->filterByCurrency($model->getId())
                    ->count();

            if ($productVariantsCount > 0) {
                $response = showMessage(lang('Error. The currency used in the products. Check the currency options products', 'admin'), false, '', true);
                $showrecount = true;
                echo json_encode(array('response' => $response, 'recount' => $showrecount, 'id' => $model->getId()));

                //pjax('/admin/components/run/shop/currencies');
                exit;
            }

            $model->delete();
            $response = showMessage(lang('Currency successfully removed', 'admin'), false, '', true);
            echo json_encode(array('response' => $response, 'success' => true));
            //pjax('/admin/components/run/shop/currencies');
        }
    }

    public function recount() {
        $id = $this->input->post('id');
        $rate = $this->db->where('id', $id)->get('shop_currencies')->row()->rate;
        $main_id = ShopCore::app()->SCurrencyHelper->main->id;

        $this->db->query('UPDATE `shop_product_variants` SET `price` = `price_in_main` WHERE `currency` =' . $id);
        $this->db->query('UPDATE `shop_product_variants` SET `currency` = ' . $main_id . '  WHERE `currency` =' . $id);
        showMessage(lang('Conversion completed. Now the currency may be removed', 'admin'));
    }

    public function checkPrices() {
        if (ShopCore::app()->SCurrencyHelper->checkPrices())
            showMessage(lang('Prices updated','admin'));
        else
            showMessage(lang('There was no price for the upgrade','admin'));
    }

}
