<?php

class ShopAdminBanners extends ShopAdminController {

    protected $perPage = 14;
    protected $allowedImageExtensions = array('jpg', 'png', 'gif');
    protected $current_extension = null;
    protected $imageSizes = array(
        'mainImageWidth' => 1000,
        'mainImageHeight' => 300,
    );
    protected $imageQuality = 99;
    public $defaultLanguage = null;

    public function __construct() {
        parent::__construct();
        $this->defaultLanguage = getDefaultLanguage();
    }

    public function index($offset = 0, $orderField = '', $orderCriteria = '') {
        $model = ShopBanersQuery::create();

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
            $model->orderByPosition('ASC');

        // Count total banners
        $totalBanners = $this->_count($model);

        $model = $model
                ->limit($this->perPage)
                ->offset((int) $offset)
                ->find();

        // Create pagination
        $this->load->library('pagination');
        $config['base_url'] = $this->createUrl('banners/index/');
        $config['container'] = 'shopAdminPage';
        $config['uri_segment'] = 7;
        $config['total_rows'] = $totalBanners;
        $config['per_page'] = $this->perPage;
        $this->pagination->num_links = 6;
        $config['suffix'] = ($orderField != '') ? $orderField . '/' . $orderCriteria : '';
        $this->pagination->initialize($config);

        $categories = $this->db->select('id,name')->get('shop_category_i18n')->result_array();

        $this->render('list', array(
            'model' => $model,
            'pagination' => $this->pagination->create_links_ajax(),
            'totalBanners' => $totalBanners,
            'nextOrderCriteria' => $nextOrderCriteria,
            'orderField' => $orderField,
            'languages' => ShopCore::$ci->cms_admin->get_langs(true),
            'locale' => $this->defaultLanguage['identif'],
            'categories' => $categories,
        ));
    }

    /**
     * Create or edit banner
     *
     * @return void
     */
    public function create() {

        $model = new ShopBaners();
        if (!empty($_POST)) {
            $this->form_validation->set_rules($model->rules());

            if ($this->form_validation->run($this) == FALSE)
            // echo json_encode(array('error' => validation_errors(' ', ' ')));
                showMessage(validation_errors(), '', 'r');
            else {
                $_POST['Locale'] = $locale;

                $image = str_replace("/uploads/shop/banners/", "", $this->input->post('Image'));

                $model->setLocale($this->defaultLanguage['identif']);
                $model->setName($_POST['Name']);
                $model->setText($_POST['Text']);
                $model->setUrl($_POST['Url']);
                $model->setActive($_POST['Active']);
                $model->setImage($image);

                $posModel = ShopBanersQuery::create()
                        ->select('Position')
                        ->orderByPosition('Desc')
                        ->limit(1)
                        ->find();

                $model->setPosition($posModel[0] + 1);
                $model->setEspdate((int) strtotime($_POST['espir']));
                $categories = $this->input->post('Categories');
                if ($categories[0] == 'no_category') {
                    $model->setCategories('false');
                } elseif ($this->input->post('show_in_all_cat') == 1) {
                    $model->setCategories('all');
                } elseif ($this->input->post('show_in_all_cat') != 1) {
                    $model->setCategories(json_encode($categories));
                } else {
                    $model->setCategories('false');
                }


                $model->save();

                $this->load->library('image_lib');

                // Resize image.
                if (!empty($_FILES['mainPhoto']['tmp_name']) && $this->_isAllowedExtension($_FILES['mainPhoto']['name']) === true) {
                    $imageSizes = $this->getImageSize($_FILES['mainPhoto']['tmp_name']);
                    $imageName = $model->getId() . '_' . $locale . '.' . $this->current_extension;

                    if ($imageSizes['width'] >= $this->imageSizes['mainImageWidth'] OR $imageSizes['height'] >= $this->imageSizes['mainImageHeight']) {
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = $_FILES['mainPhoto']['tmp_name'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width'] = $this->imageSizes['mainImageWidth'];
                        $config['height'] = $this->imageSizes['mainImageHeight'];
                        $config['new_image'] = ShopCore::$imagesUploadPath . 'banners/' . $imageName;
                        $config['quality'] = $this->imageQuality;

                        $this->image_lib->initialize($config);

                        if ($this->image_lib->resize()) {
                            $mainImageResized = true;
                            $model->setImage($imageName);
                        }
                    } else {
                        move_uploaded_file($_FILES['mainPhoto']['tmp_name'], ShopCore::$imagesUploadPath . 'banners/' . $imageName);
                        $mainImageResized = true;
                        $model->setImage($imageName);
                    }

                    $model->save();
                }
                showMessage(lang('Banner created', 'admin'));
                $this->cache->clearCacheFolder('banners');

                $action = $_POST['action'];

                if ($action == 'exit') {
                    pjax('/admin/components/run/shop/banners/index');
                } else {
                    pjax('/admin/components/run/shop/banners/edit/' . $model->getId());
                }
            }
        } else {

            $this->render('create', array(
                'model' => $model,
                'categories' => ShopCore::app()->SCategoryTree->getTree(),
                'date' => date('Y-m-d', time('U') + 24 * 60 * 60 * 30),
            ));
        }
    }

    /**
     * Create or edit banner
     *
     * @return void
     */
    public function edit($bannerId = NULL, $locale = null) {
        $locale = $locale == null ? $this->defaultLanguage['identif'] : $locale;

        $model = ShopBanersQuery::create()->findPk((int) $bannerId);

        if ($model === null)
            $this->error404(lang('Banner could not be found', 'admin'));

        if (!empty($_POST)) {
            $this->form_validation->set_rules($model->rules());

            if ($this->form_validation->run($this) == FALSE)
                showMessage(validation_errors(), '', 'r');
            else {
                $_POST['Locale'] = $locale;

                $image = str_replace("/uploads/shop/banners/", "", $this->input->post('Image'));

                $model->setEspdate((int) strtotime($_POST['espir']));
                $model->fromArray($_POST);
                $model->setImage($image);
                $model->setActive($this->input->post('Active'));
                $model->setOnMain($this->input->post('on_main'));
                $categories = $this->input->post('Categories');


                if ($categories[0] == 'no_category') {
                    $model->setCategories('false');
                } elseif ($this->input->post('show_in_all_cat') == 1) {
                    $model->setCategories('all');
                } elseif ($this->input->post('show_in_all_cat') != 1) {
                    $model->setCategories(json_encode($categories));
                } else {
                    $model->setCategories('false');
                }


                $model->save();
                if ($this->input->post('deleteImage') == 1 && empty($_FILES['mainPhoto']['tmp_name'])) {
                    if (file_exists("uploads/shop/banners/" . $model->getImage())) {
                        unlink("uploads/shop/banners/" . $model->getImage());
                    }
                    $model->setImage('');
                    $model->save();
                }
                $this->load->library('image_lib');

                // Resize image.
                if (!empty($_FILES['mainPhoto']['tmp_name']) && $this->_isAllowedExtension($_FILES['mainPhoto']['name']) === true) {
                    $imageSizes = $this->getImageSize($_FILES['mainPhoto']['tmp_name']);
                    $imageName = $model->getId() . '_' . $locale . '.' . $this->current_extension;

                    if ($imageSizes['width'] >= $this->imageSizes['mainImageWidth'] OR $imageSizes['height'] >= $this->imageSizes['mainImageHeight']) {
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = $_FILES['mainPhoto']['tmp_name'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width'] = $this->imageSizes['mainImageWidth'];
                        $config['height'] = $this->imageSizes['mainImageHeight'];
                        $config['new_image'] = ShopCore::$imagesUploadPath . 'banners/' . $imageName;
                        $config['quality'] = $this->imageQuality;

                        $this->image_lib->initialize($config);

                        if ($this->image_lib->resize()) {
                            $mainImageResized = true;
                            $model->setImage($imageName);
                        }
                    } else {
                        move_uploaded_file($_FILES['mainPhoto']['tmp_name'], ShopCore::$imagesUploadPath . 'banners/' . $imageName);
                        $mainImageResized = true;
                        $model->setImage($imageName);
                    }

                    $model->save();
                }


                showMessage(lang('Banner updated', 'admin'));
                $this->cache->clearCacheFolder('banners');
                if ($this->input->post('action') == 'tomain')
                    pjax('/admin/components/run/shop/banners/index');
            }
        }
        else {
            $model->setLocale($locale);

            $bannerCategories = json_decode($model->getCategories());
            $this->render('edit', array(
                'model' => $model,
                'languages' => ShopCore::$ci->cms_admin->get_langs(true),
                'locale' => $locale,
                'categories' => ShopCore::app()->SCategoryTree->getTree(),
                'bannerCategories' => $bannerCategories,
                'date' => date('Y-m-d', time('U') + 24 * 60 * 60 * 30)
            ));
        }
    }

    /**
     * Delete banner
     *
     * @return void
     */
    public function deleteAll() {
        if (empty($_POST['ids'])) {
            showMessage(lang('No data transmitted', 'admin'), '', 'r');
            exit;
        }
        if (sizeof($_POST['ids'] > 0)) {
            $model = ShopBanersQuery::create()
                    ->findPks($_POST['ids']);

            if (!empty($model)) {
                foreach ($model as $order) {
                    $order->delete();
                }

                showMessage(lang('Banner removed', 'admin'));
                $this->cache->clearCacheFolder('banners');
            }
        }
    }

    /**
     * Check if file has allowed extension
     *
     * @param string $fileName
     * @access protected
     * @return bool
     */
    protected function _isAllowedExtension($fileName) {
        $parts = explode('.', $fileName);
        $ext = strtolower(end($parts));

        $this->current_extension = $ext;

        if (in_array($ext, $this->allowedImageExtensions))
            return true;
        else
            return false;
    }

    /**
     * Get image width and height.
     *
     * @param string $file_path Full path to image
     * @access protected
     * @return mixed
     */
    protected function getImageSize($file_path) {
        if (function_exists('getimagesize') && file_exists($file_path)) {
            $image = @getimagesize($file_path);

            $size = array(
                'width' => $image[0],
                'height' => $image[1],
            );

            return $size;
        }

        return false;
    }

    /**
     * Count total banners in the list
     *
     * @param ShopBanersQuery $object
     * @return int */
    protected function _count(ShopBanersQuery $object) {
        $object = clone $object;
        return $object->count();
    }

    public function translate($id) {
        $model = ShopBanersQuery::create()->findPk((int) $id);

        if ($model === null)
            $this->error404(lang('Banner could not be found', 'admin'));

        $languages = ShopCore::$ci->cms_admin->get_langs(true);

        $translatableFieldNames = $model->getTranslatableFieldNames();
        $imageFieldNames = array('Image');

        /**
         *  Update category translation
         */
        if (!empty($_POST)) {
            //form validating
            $translatingRules = $model->translatingRules();
            foreach ($languages as $language) {
                foreach ($translatableFieldNames as $fieldName) {
                    $this->form_validation->set_rules($fieldName . '_' . $language['identif'], $model->getLabel($fieldName) . lang(' language ', 'admin') . $language['lang_name'], $translatingRules[$fieldName]);
                }
            }

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(array('error' => validation_errors(' ', ' ')));
            } else {
                foreach ($languages as $language) {
                    $model->setLocale($language['identif']);
                    foreach ($translatableFieldNames as $fieldName) {
                        $setterMethodName = 'set' . $fieldName;
                        $getterMethodName = 'get' . $fieldName;
                        //if it is text field
                        if (!in_array($fieldName, $imageFieldNames)) {
                            $model->$setterMethodName($this->input->post($fieldName . '_' . $language['identif']));
                            //else if it is file field
                        } else {
                            $this->load->library('image_lib');

                            $imageArray = $_FILES['mainPhoto' . '_' . $language['identif']];

                            // Begin of image resizing
                            if (!empty($imageArray['tmp_name']) && $this->_isAllowedExtension($imageArray['name']) === true) {
                                //Begin of deleting previous banner image
                                if (file_exists(ShopCore::$imagesUploadPath . 'banners/' . $model->$getterMethodName())) {
                                    @unlink(ShopCore::$imagesUploadPath . 'banners/' . $model->$getterMethodName());
                                }
                                //End of deleting previous banner image

                                $imageName = $model->getId() . '_' . $language['identif'] . '.' . $this->current_extension;
                                $imageSizes = $this->getImageSize($imageArray['tmp_name']);

                                if ($imageSizes['width'] >= $this->imageSizes['mainImageWidth'] OR $imageSizes['height'] >= $this->imageSizes['mainImageHeight']) {
                                    $config['image_library'] = 'gd2';
                                    $config['source_image'] = $imageArray['tmp_name'];
                                    $config['create_thumb'] = FALSE;
                                    $config['maintain_ratio'] = TRUE;
                                    $config['width'] = $this->imageSizes['mainImageWidth'];
                                    $config['height'] = $this->imageSizes['mainImageHeight'];
                                    $config['new_image'] = ShopCore::$imagesUploadPath . 'banners/' . $imageName;
                                    $config['quality'] = $this->imageQuality;

                                    $this->image_lib->initialize($config);

                                    if ($this->image_lib->resize()) {
                                        $model->$setterMethodName($imageName);
                                    }
                                } else {
                                    move_uploaded_file($imageArray['tmp_name'], ShopCore::$imagesUploadPath . 'banners/' . $imageName);
                                    $model->$setterMethodName($imageName);
                                }
                            }
                            // End of image resizing
                        }
                    }
                }


                $model->save();

                $redirect_url = 'banners/translate/' . $model->getId();

                echo json_encode(array(
                    'ok' => true,
                    'redirect_url' => $redirect_url,
                ));
            }
        } else {

            $mceEditorFieldNames = array();
            $requairedFieldNames = array('Name', 'Url');

            $this->render('translate', array(
                'model' => $model,
                'languages' => $languages,
                'translatableFieldNames' => $translatableFieldNames,
                'mceEditorFieldNames' => $mceEditorFieldNames,
                'imageFieldNames' => $imageFieldNames,
                'requairedFieldNames' => $requairedFieldNames,
            ));
        }
    }

    public function changeActive() {
        $model = ShopBanersQuery::create()->findPk((int) $this->input->post('bannerId'));

        if ($model != null) {
            if ($this->input->post('status') == 'true') {
                $model->setActive(0);
            } else {
                $model->setActive(1);
            }
            $model->save();
            $this->cache->clearCacheFolder('banners');
        }
    }

    public function save_positions() {
        $positions = $_POST['positions'];
        if (sizeof($positions) == 0) {
            return false;
        }

        foreach ($positions as $key => $val) {
            $query = "UPDATE `shop_banners` SET `position`=" . $key . " WHERE `id`=" . (int) $val . "; ";
            $this->db->query($query);
        }
        showMessage(lang("Positions saved", 'admin'));
        $this->cache->clearCacheFolder('banners');
    }

}
