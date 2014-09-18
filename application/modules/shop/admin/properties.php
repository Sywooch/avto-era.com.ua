<?php

/**
 * ShopAdminProperties
 *
 * @uses ShopController
 * @package Shop
 * @version $id$
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net>
 * @license
 *
 */
class ShopAdminProperties extends ShopAdminController {

    public $defaultLanguage = null;
    public $perPage = 5;

    public function __construct() {
        parent::__construct();
        $this->defaultLanguage = getDefaultLanguage();
        session_start();
        
          if (!$_COOKIE['per_page']) {
            setcookie("per_page", ShopCore::app()->SSettings->adminProductsPerPage, time() + 604800, "/", $_SERVER['HTTP_HOST']);
            $this->perPage = ShopCore::app()->SSettings->adminProductsPerPage;
        }
        else
            $this->perPage = $_COOKIE['per_page'];
    }
    
    /**
     * Display search form
     *
     * @return void
     */
    public function per_page_cookie() {
        setcookie("per_page", (int) $_GET['count_items'], time() + 604800, "/", $_SERVER['HTTP_HOST']);
    }


    /**
     * Display list of properties
     *
     * @access public
     */
    public function index($categoryId = null) {
        $_SESSION['cat_id'] = $categoryId;
        if ($categoryId === null || $categoryId == 0) {
            $model = SPropertiesQuery::create()->joinWithI18n(\MY_Controller::defaultLocale(), Criteria::LEFT_JOIN);
            $category = null;
        } else {
            $category = SCategoryQuery::create()->joinWithI18n(\MY_Controller::defaultLocale(), Criteria::LEFT_JOIN)->findPk((int) $categoryId);
            if ($category !== null) {
                $model = SPropertiesQuery::create()->joinWithI18n(\MY_Controller::defaultLocale(), Criteria::LEFT_JOIN)
                        ->filterByPropertyCategory($category);
            }
        }
        
        $model2 = clone  $model;
        $model2 = $model2
                ->distinct()
                ->find();
        
        $totalProperties = $this->getTotalRow();
        
        $model = $model
                ->offset((int) $_GET['per_page'])
                ->limit($this->perPage)
                ->distinct()
                ->find();
         
        
        
        // Create pagination
        $this->load->library('pagination');
        $config['base_url'] = '/admin/components/run/shop/properties/index/?' . http_build_query($_GET);
        //$config['base_url'] = site_url('admin/components/run/shop/search/index/?'.http_build_query($_GET));
        $config['container'] = 'shopAdminPage';
        $config['page_query_string'] = true;
        $config['uri_segment'] = 8;
        $config['total_rows'] = $totalProperties;
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
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';


        $this->pagination->num_links = 6;
        $this->pagination->initialize($config);
        
        $this->render('list', array(
            'model' => $model,
            'categories' => ShopCore::app()->SCategoryTree->getTree(),
            'filterCategory' => $category,
            'pagination' => $this->pagination->create_links_ajax(),
            'locale' => $this->defaultLanguage['identif'],
        ));
    }

    /**
     * Create new product property
     *
     * @access public
     */
    public function create() {
        $locale = array_key_exists('Locale', $_POST) ? $_POST['Locale'] : $this->defaultLanguage['identif'];

        $model = new SProperties;

        if (!empty($_POST)) {
            $this->form_validation->set_rules($model->rules());

            if ($this->form_validation->run($this) == FALSE) {
                showMessage(validation_errors(), '', 'r');
            } else {
                $model->fromArray($_POST);

                // Assign property categories
                if (sizeof($_POST['UseInCategories']) > 0 && is_array($_POST['UseInCategories'])) {
                    $criteria = new Criteria();
                    $criteria->add(SCategoryPeer::ID, $_POST['UseInCategories'], Criteria::IN);
                    $categoriesModel = SCategoryPeer::doSelect($criteria);

                    foreach ($categoriesModel as $category) {
                        $model->addPropertyCategory($category);
                    }
                }

                $model->save();

                showMessage(lang('Property created','admin'));
                if ($_POST['action'] == 'tomain')
                    pjax('/admin/components/run/shop/properties/index');
                else
                    pjax('/admin/components/run/shop/properties/edit/' . $model->getId());
            }
        }
        else {
            $this->render('create', array(
                'model' => $model,
                'categories' => ShopCore::app()->SCategoryTree->getTree(),
                'locale' => $this->defaultLanguage['identif'],
                'filter' => $_SESSION['cat_id'],
            ));
        }
    }

    /**
     * Edit property
     *
     * @param int $propertyId
     * @access public
     */
    public function edit($propertyId = null, $locale = null) {
        $locale = $locale == null ? $this->defaultLanguage['identif'] : $locale;

        $model = SPropertiesQuery::create()
                ->findPk((int) $propertyId);

        if ($model === null)
            $this->error404(lang('The property is not found','admin'));

        if (!empty($_POST)) {
            $this->form_validation->set_rules($model->rules());

            if ($this->form_validation->run($this) == FALSE) {
                showMessage(validation_errors(), '', 'r');
            } else {
                if (!$_POST['Data'])
                    $_POST['Data'] = '';

                $_POST['Active'] = (int) $_POST['Active'];
                $_POST['ShowInCompare'] = (int) $_POST['ShowInCompare'];
                $_POST['ShowInFilter'] = (int) $_POST['ShowInFilter'];
                $_POST['ShowOnSite'] = (int) $_POST['ShowOnSite'];
                $_POST['Multiple'] = (int) $_POST['Multiple'];
                $_POST['MainProperty'] = (int) $_POST['MainProperty'];
                $_POST['ShowFaq'] = (int) $_POST['ShowFaq'];

                $model->fromArray($_POST);

                ShopProductPropertiesCategoriesQuery::create()
                        ->filterByPropertyId($model->getId())
                        ->delete();

                // Assign property categories
                if (sizeof($_POST['UseInCategories']) > 0 && is_array($_POST['UseInCategories'])) {
                    $criteria = new Criteria();
                    $criteria->add(SCategoryPeer::ID, $_POST['UseInCategories'], Criteria::IN);
                    $categoriesModel = SCategoryPeer::doSelect($criteria);

                    foreach ($categoriesModel as $category) {
                        $model->addPropertyCategory($category);
                    }
                }

                $model->save();

                showMessage(lang('Changes saved','admin'));
                if ($_POST['action'] == 'tomain')
                    pjax('/admin/components/run/shop/properties/index');
                if ($_POST['action'] == 'tocreate')
                    pjax('/admin/components/run/shop/properties/create');
                if ($_POST['action'] == 'toedit')
                    pjax('/admin/components/run/shop/properties/edit/' . $model->getId());
            }
        }
        else {
            $model->setLocale($locale);

            $propertyCategories = array();
            foreach ($model->getPropertyCategorys() as $propertyCategory) {
                array_push($propertyCategories, $propertyCategory->getId());
            }

            $this->render('edit', array(
                'model' => $model,
                'categories' => ShopCore::app()->SCategoryTree->getTree(),
                'propertyCategories' => $propertyCategories,
                'languages' => ShopCore::$ci->cms_admin->get_langs(true),
                'locale' => $locale,
                'filter' => $_SESSION['cat_id'],
            ));
        }
    }

    /**
     * Render properties form for create/edit product.
     *
     * @param  $categoryId
     * @param  $productId
     * @return void
     */
    public function renderForm($categoryId, $productId = null) {
        $result = ShopCore::app()->SPropertiesRenderer->renderAdmin($categoryId, SProductsQuery::create()->findPk((int) $productId));

        if ($result == false) {
            echo '<div id="notice" style="width: 500px;">'.lang('The list of properties is empty','admin').'
						<a href="#" onclick="ajaxShop(\'properties/create\'); return false;">'.lang('Create','admin').'.</a>
					</div>';
        } else {
            echo $result;
        }
    }

    public function save_positions() {
        $positions = $_POST['positions'];
        if (sizeof($positions) == 0)
            return false;
        $arr = "(";
        $i = 0;
        foreach (array_values($positions) as $item) {
            $arr .= "'" . $item . "'";
            if ($i < count($positions) - 1) {
                $arr .= ", ";
            } else {
                $arr .= ")";
            }
            $i++;
        }
        $result = $this->db->query("SELECT `position` FROM `shop_product_properties` WHERE `id` IN " . $arr)->result_array();
        foreach ($result as $key => $item) {
            $positions_to_insert[(int) $item['position']] = $positions[$key];
        }

        foreach ($positions as $key => $val) {
            $query = "UPDATE `shop_product_properties` SET `position`=" . $key . " WHERE `id`=" . (int) $val . "; ";
            $this->db->query($query);
        }
        showMessage(lang('Positions saved','admin'));

//        foreach ($positions as $key => $val) {
//            $item_data = explode('_', substr($val, 5));
//
//            SPropertiesQuery::create()
//                    ->filterById((int) $item_data[0])
//                    ->update(array('Position' => $item_data[1]));
//        }
    }

    /**
     * Delete property
     */
    public function delete() {
        $id = $_POST['ids'];

        $model = SPropertiesQuery::create()
                ->findPks($id);

        if ($model === null)
            return false;

        $model->delete();
        showMessage(lang('Success','admin'), lang('The property(ies) deleted','admin'));
        pjax('/admin/components/run/shop/properties/index');
    }

    public function changeActive() {
        $id = $this->input->post('id');

        $prop = $this->db->where('id',$id)->get('shop_product_properties')->row();
        $active = $prop->active;
        if ( $active == 1)
            $active = 0;
        else $active=1;

        if ($this->db->where('id',$id)->update('shop_product_properties',array('active'=>$active)))
                showMessage(lang('Change saved successfully','admin'));

        /*$model = SPropertiesQuery::create()->findPk($id);
        if (count($model) > 0) {
            $model->setActive(!$model->getActive());
            if ($model->save()) {
                showMessage('Измения успешно сохранены');
            }
        }*/
    }
    
    private function getTotalRow() {
        $connection = Propel::getConnection();
        $statement = $connection->prepare('SELECT FOUND_ROWS() as `number`');
        $statement->execute();
        $resultset = $statement->fetchAll();
        return $resultset[0]['number'];
    }
}
