<?php

/**
 * ShopAdminWarehouses
 * 
 * @uses ShopController
 * @package 
 * @version $id$
 * @copyright 2011 Siteimage
 * @author <dev@imagecms.net> 
 * @license 
 */
class ShopAdminWarehouses extends ShopAdminController {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Display list of warehouses
     * 
     * @access public
     * @return void
     */
    public function index() {
        $this->render('list', array(
            'model' => SWarehousesQuery::create()->orderByName()->find()
        ));
    }

    /**
     * Create new warehouse
     * 
     * @access public
     */
    public function create() {
        $model = new SWarehouses;

        if (!empty($_POST)) {
            $this->form_validation->set_rules($model->rules());

            if ($this->form_validation->run($this) == FALSE) {
                showMessage(validation_errors(), '', 'r');
            } else {
                $model->fromArray($_POST);
                $model->save();

                showMessage(lang('Warehouse created', 'admin'));
                if ($_POST['action'] == 'exit') {
                    pjax('/admin/components/run/shop/warehouses/index');
                } else {
                    pjax('/admin/components/run/shop/warehouses/edit/' . $model->getId());
                }
            }
        } else {
            $this->render('create', array(
                'model' => $model,
            ));
        }
    }

    public function edit($id = null) {
        $model = SWarehousesQuery::create()->findPk((int) $id);

        if ($model === null)
            $this->error404(lang('Warehouse not found', 'admin'));

        if (!empty($_POST)) {
            $this->form_validation->set_rules($model->rules());

            if ($this->form_validation->run($this) == FALSE) {
                showMessage(validation_errors(), '', 'r');
            } else {
                $model->fromArray($_POST);
                $model->save();

                showMessage(lang('Changes saved', 'admin'));
                if ($_POST['action'] == 'tomain')
                    pjax('/admin/components/run/shop/warehouses/index/');
            }
        } else {
            $this->render('edit', array(
                'model' => $model,
            ));
        }
    }

    /**
     * Delete warehouse
     *
     * @return void
     */
    public function deleteAll() {
        if (empty($_POST['ids'])) {
            showMessage(lang('No data transferred', 'admin'), '', 'r');
            exit;
        }
        if (sizeof($_POST['ids'] > 0)) {
            $model = SWarehousesQuery::create()
                    ->findPks($_POST['ids']);

            if (!empty($model)) {
                foreach ($model as $order) {
                    $order->delete();
                }

                showMessage(lang('Warehouse deleted', 'admin'), lang('The operation was successful', 'admin'));
            }
        }
    }

}
