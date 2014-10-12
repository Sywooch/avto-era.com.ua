<?php

/**
 * ShopAdminCategories
 *
 * @uses ShopController
 * @package
 * @version $id$
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net>
 * @license
 */
class ShopAdminProducts extends ShopAdminController {
	protected $per_page = 20;
	protected $allowedImageExtensions = array (
			'jpg',
			'png',
			'gif',
			'jpeg'
	);
	public $defaultLanguage = null;
	protected $imageSizes = array ();
	protected $imageQuality = 99;
	public function __construct() {
		parent::__construct ();
		$this->per_page = ShopCore::app ()->SSettings->adminProductsPerPage;
		$this->load->helper ( "url" );
		$this->load->library ( 'upload' );
		$this->defaultLanguage = getDefaultLanguage ();
	}
	function ajax_translit() {
		$this->load->helper ( 'translit' );
		$str = $this->input->post ( 'str' );
		echo translit_url ( $str );
	}

	/**
	 * Display list of products in category
	 *
	 * @param integer $categoryID
	 * @access public
	 */
	public function index($categoryID = null, $offset = 0, $orderField = '', $orderCriteria = '') {
		$model = SCategoryQuery::create ()->findPk ( ( int ) $categoryID );

		if ($model === null)
			$this->error404 ( lang ( 'Category not found', 'admin' ) );

		$products = SProductsQuery::create ()->filterByCategory ( $model );

		// Set total products count
		$totalProducts = clone $products;
		$totalProducts = $totalProducts->count ();

		$products = $products->limit ( $this->per_page )->offset ( ( int ) $offset );

		$nextOrderCriteria = '';

		if ($orderField !== '' && $orderCriteria !== '' && method_exists ( $products, 'filterBy' . $orderField )) {
			switch ($orderCriteria) {
				case 'ASC' :
					$products = ($orderField != 'Price') ? $products->orderBy ( $orderField, Criteria::ASC ) : $products->leftJoin ( 'ProductVariant' )->orderBy ( $orderField, Criteria::ASC );
					$nextOrderCriteria = 'DESC';
					break;

				case 'DESC' :
					$products = ($orderField != 'Price') ? $products->orderBy ( $orderField, Criteria::DESC ) : $products->leftJoin ( 'ProductVariant' )->orderBy ( $orderField, Criteria::DESC );
					$nextOrderCriteria = 'ASC';
					break;
			}
		} else
			$products->orderById ( 'desc' );

		$products = $products->find ();

		$products->populateRelation ( 'ProductVariant' );

		// Create pagination
		$this->load->library ( 'pagination' );
		$config ['base_url'] = $this->createUrl ( 'products/index/', array (
				'catId' => $model->getId ()
		) );
		$config ['container'] = 'shopAdminPage';
		$config ['uri_segment'] = 8;
		$config ['total_rows'] = $totalProducts;
		$config ['per_page'] = $this->per_page;
		$config ['suffix'] = ($orderField != '') ? $orderField . '/' . $orderCriteria : '';
		$this->pagination->num_links = 6;
		$this->pagination->initialize ( $config );
		$this->render ( 'list', array (
				'model' => $model,
				'products' => $products,
				'totalProducts' => $totalProducts,
				'pagination' => $this->pagination->create_links_ajax (),
				'category' => SCategoryQuery::create ()->findPk ( ( int ) $categoryID ),
				'nextOrderCriteria' => $nextOrderCriteria,
				'orderField' => $orderField,
				'locale' => $this->defaultLanguage ['identif']
		) );
	}

	/**
	 * Validation for template name field
	 *
	 * @param string $tpl
	 */
	public function tpl_validation($tpl) {
		if (preg_match ( '/^[A-Za-z\_\.]{0,50}$/', $tpl )) {
			return TRUE;
		}
		$this->form_validation->set_message ( 'tpl_validation', lang ( 'The %s field can only contain Latin characters', 'admin' ) );
		return FALSE;
	}

	/**
	 * Create new product, upload and resize images.
	 *
	 * @access public
	 */
	public function create() {
		$model = new SProducts ();
		$locale = MY_Controller::getCurrentLocale ();
		\CMSFactory\Events::create ()->registerEvent ( '', 'ShopAdminProducts:preCreate' );
		\CMSFactory\Events::runFactory ();
		if (! empty ( $_POST )) {
				
			$this->form_validation->set_rules ( 'tpl', lang ( 'Main template', 'admin' ), "callback_tpl_validation" );
				
			$this->form_validation->set_rules ( $model->rules () );
			$validation = $this->form_validation->set_rules ( 'Created', lang ( 'Date Created', 'admin' ), 'required|valid_date' );
			$validation = $model->validateCustomData ( $validation );
				
			if ($validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors (), '', 'r' );
			} else {
				if ($_POST ['Url']) {
					// Check if Url is aviable.
					$urlCheck = SProductsQuery::create ()->where ( 'SProducts.Url = ?', ( string ) $_POST ['Url'] )->findOne ();
						
					if ($urlCheck !== null) {
						showMessage ( lang ( 'This URL is already in use!', 'admin' ), '', 'r' );
						exit ();
					}
				}
				// Check is Url available
				if ($_POST ['Url'] == null && $_POST ['Name'] != null) {
					$urlName = SProductsQuery::create ()->where ( 'SProducts.Url = ?', ( string ) $_POST ['Name'] )->findOne ();
						
					if ($urlName !== null) {
						showMessage ( lang ( 'Field Url is empty!', 'admin' ), '', 'r' );
						exit ();
					}
				}

				if (! $_POST ['RelatedProducts'])
					$_POST ['RelatedProducts'] = array ();

				if ($_POST ['Created'])
					$_POST ['Created'] = strtotime ( $_POST ['Created'] );

				$_POST ['Updated'] = time ();
				$model->fromArray ( $_POST );
				$model->settpl ( $_POST ['tpl'] );

				// Add main category relation
				$categoryModel = SCategoryQuery::create ()->findPk ( $model->getCategoryId () );
				if ($categoryModel)
					$model->addCategory ( $categoryModel );
					
				// Assign product categories
				if (sizeof ( $_POST ['Categories'] ) > 0 && is_array ( $_POST ['Categories'] )) {
					// Get selected categories
					$criteria = new Criteria ();
					$criteria->add ( SCategoryPeer::ID, $_POST ['Categories'], Criteria::IN );
					$categoriesModel = SCategoryPeer::doSelect ( $criteria );
						
					foreach ( $categoriesModel as $category ) {
						if ($category->getId () != $model->getCategoryId ())
							$model->addCategory ( $category );
					}
				}

				$this->_process_warehouses ( $model );
				$model->save ();

				if ($model->getUrl () == '') {
					// $model->setUrl($model->getId());
					$this->load->helper ( 'translit' );
					$model->setUrl ( translit_url ( $model->getName () ) );
					$model->save ();
				}

				if (sizeof ( $_POST ['productProperties'] ) > 0) {
					foreach ( $_POST ['productProperties'] as $key => $value ) {
						if ($value && $value != ShopCore::app ()->SPropertiesRenderer->noValueText && $value != '') {
							$pData = new SProductPropertiesData ();
								
							if (is_array ( $value )) {
								foreach ( $value as $val ) {
									if ($val != ShopCore::app ()->SPropertiesRenderer->noValueText && $val != '') {
										$pData = new SProductPropertiesData ();
										$pData->setProductId ( $model->getId () );
										$pData->setPropertyId ( $key );
										$pData->setValue ( $val );
										$pData->setLocale ( $locale );
										$model->addSProductPropertiesData ( $pData );
									}
								}
							} else {
								$pData->setProductId ( $model->getId () );
								$pData->setPropertyId ( $key );
								$pData->setValue ( $value );
								$pData->setLocale ( $locale );
								$model->addSProductPropertiesData ( $pData );
							}
						}
					}
						
					$model->save ();
				}

				/**
				 * Check folder and process images *
				 */
				\MediaManager\Image::create ()->checkOriginFolder ();
				$files = $this->upload_all ();
				/**
				 * Check images folders*
				 */
				\MediaManager\Image::create ()->checkImagesFolders ();
				/**
				 * Check watermarks folder
				 */
				\MediaManager\Image::create ()->checkWatermarks ();

				// Images can be loaded from computer or internet. From computer have higher priority.
				$i = 0;
				$countOfImages = 0;
				$newFiles = array ();
				foreach ( $_POST ['changeImage'] as $key => $imageUrl ) {
					if ($imageUrl != "") {
						if ($imageUrl == '1') {
							$newFiles [$i] = $files [$countOfImages];
							$countOfImages ++;
						} else {
							if (FALSE !== $imageName = \MediaManager\GetImages::create ()->saveImage ( $imageUrl )) {
								$newFiles [$i] = $imageName;
							}
						}
					}
					$i ++;
				}

				foreach ( $newFiles as $key => $fileName ) {
					\MediaManager\Image::create ()->makeResizeAndWatermark ( $fileName );
				}

				$this->_insert_variants ( $model->getId (), $newFiles );
				$model->setActive ( ($_POST ['Active']) );
				$model->save ();
				$model->saveCustomData ();

				/**
				 * Init Event.
				 * Create Shop Product
				 */
				\CMSFactory\Events::create ()->registerEvent ( array (
						'productId' => $model->getId (),
						'userId' => $this->dx_auth->get_user_id ()
				) );
				\CMSFactory\Events::runFactory ();

				showMessage ( lang ( "The product was successfully created", "admin" ) );
				$action = $_POST ['action'];
				if ($action == 'close') {
					pjax ( '/admin/components/run/shop/search/index' );
				} else {
					pjax ( '/admin/components/run/shop/products/edit/' . $model->getId () );
				}
			}
		} else {
			$currencies = SCurrenciesQuery::create ()->find ();
			$this->render ( 'create', array (
					'model' => $model,
					'categories' => ShopCore::app ()->SCategoryTree->getTree (),
					'cur_date' => date ( 'Y-m-d H:i:s' ),
					'warehouses' => SWarehousesQuery::create ()->orderByName ()->find (),
					'locale' => $locale,
					'currencies' => $currencies,
					'imagesPopup' => $this->render ( 'images', array (), TRUE )
			) );
		}
	}
	public function get_images($type) {
		$url = trim ( $_POST ['q'] );
		switch ($type) {
			case "search" :
				$images = \MediaManager\GetImages::create ()->searchImages ( $url, ( int ) $_POST ['pos'] );
				echo json_encode ( $images );
				break;
			case "url" :
				$image = \MediaManager\GetImages::create ()->getImage ( $url );
				$url1 = $image === FALSE ? '0' : $url;
				echo json_encode ( array (
						'url' => $url1
				) );
				break;
		}
	}
	public function save_image() {
		$url = $_POST ['url'];
		\MediaManager\GetImages::create ()->saveImages ( $_POST ['productId'], trim ( $_POST ['url'] ) );
	}
	public function getGImagesProgress() {
		$count = \MediaManager\GetImages::create ()->getProgress ();
		echo json_encode ( array (
				'count' => $count
		) );
	}

	/**
	 * Edit product
	 *
	 * @access public
	 */
	public function edit($productId, $locale = null) {
		$locale = $locale == null ? $this->defaultLanguage ['identif'] : $locale;
		// Select product with variants.
		$model = SProductsQuery::create ()->useProductVariantQuery ()->orderByPosition ()->endUse ()->leftJoinWith ( 'ProductVariant' )->findPk ( ( int ) $productId );

		if ($model === null)
			$this->error404 ( lang ( 'Product not found', 'admin' ) );

		/**
		 * Init Event.
		 * PreEdit Shop Product
		 */
		\CMSFactory\Events::create ()->registerEvent ( array (
				'model' => $model,
				'userId' => $this->dx_auth->get_user_id ()
		), 'ShopAdminProducts:preEdit' );
		\CMSFactory\Events::runFactory ();

		if (! empty ( $_POST )) {
			$this->form_validation->set_rules ( 'tpl', lang ( 'Main template', 'admin' ), "callback_tpl_validation" );
			$this->form_validation->set_rules ( $model->rules () );
			$validation = $this->form_validation->set_rules ( 'Created', lang ( 'Date Created', 'admin' ), 'required|valid_date' );
			$validation = $model->validateCustomData ( $validation );
			// for old price
			if (( int ) $model->getOldPrice () != ( int ) $_POST ['OldPrice'])
				$model->setOldPrice ( $_POST ['OldPrice'] );
				
			if ($validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors (), '', 'r' );
				// echo json_encode(array('error' => validation_errors(' ', ' ')));
			} else {
				// delete images
				foreach ( $_POST ['variants'] ['MainImageForDel'] as $key => $value ) {
					if ($value) {
						$imageName = $this->db->select ( 'mainImage' )->where ( 'id', $key )->get ( 'shop_product_variants' )->row_array ();
						// Delete from database
						$this->db->where ( 'id', $key )->update ( 'shop_product_variants', array (
								'mainImage' => ''
						) );
						// Delete files
						\MediaManager\Image::create ()->deleteAllProductImages ( $imageName ['mainImage'] );
					}
				}
				if ($_POST ['Url']) {
						
					// Check if Url is aviable.
					$urlCheck = SProductsQuery::create ()->where ( 'SProducts.Id != ?', $productId )->where ( 'SProducts.Url = ?', ( string ) $_POST ['Url'] )->findOne ();
						
					if ($urlCheck !== null) {

						showMessage ( lang ( 'The specified URL is busy', 'admin' ), '', 'r' );
						exit ();
					}
				}
				if ($_POST ['Created'])
					$_POST ['Created'] = strtotime ( $_POST ['Created'] );

				if (! $_POST ['RelatedProducts'])
					$_POST ['RelatedProducts'] = array ();

				$_POST ['Updated'] = time ();

				$_POST ['Locale'] = $locale;

				$model->fromArray ( $_POST );
				$model->settpl ( $_POST ['tpl'] );

				// Clear product category relations.
				ShopProductCategoriesQuery::create ()->filterByProductId ( $model->getId () )->delete ();

				// Add main category relation
				$categoryModel = SCategoryQuery::create ()->findPk ( $model->getCategoryId () );
				if ($categoryModel)
					$model->addCategory ( $categoryModel );
					
				// Assign product categories
				if (sizeof ( $_POST ['Categories'] ) > 0 && is_array ( $_POST ['Categories'] )) {
					// Get selected categories
					$criteria = new Criteria ();
					$criteria->add ( SCategoryPeer::ID, $_POST ['Categories'], Criteria::IN );
					$categoriesModel = SCategoryPeer::doSelect ( $criteria );
						
					foreach ( $categoriesModel as $category ) {
						if ($category->getId () != $model->getCategoryId ())
							$model->addCategory ( $category );
					}
				}

				if ($model->getUrl () == '')
					$model->setUrl ( $model->getId () );

				$this->_process_warehouses ( $model );

				$model->save ();

				/**
				 * Check folder and process images *
				 */
				\MediaManager\Image::create ()->checkOriginFolder ();
				$files = $this->upload_all ();
				/**
				 * Check images folders
				 */
				\MediaManager\Image::create ()->checkImagesFolders ();
				/**
				 * Check watermarks folder
				 */
				\MediaManager\Image::create ()->checkWatermarks ();

				// Images can be loaded from computer or internet. From computer have higher priority.
				$i = 0;
				$countOfImages = 0;
				$newFiles = array ();
				foreach ( $_POST ['changeImage'] as $key => $imageUrl ) {
					if ($imageUrl != "") {
						if ($imageUrl == '1') {
							$newFiles [$i] = $files [$countOfImages];
							$countOfImages ++;
						} else {
							if (FALSE !== $imageName = \MediaManager\GetImages::create ()->saveImage ( $imageUrl )) {
								$newFiles [$i] = $imageName;
							}
						}
					}
					$i ++;
				}

				foreach ( $newFiles as $key => $fileName ) {
					\MediaManager\Image::create ()->makeResizeAndWatermark ( $fileName );
				}

				$this->_insert_variants ( $model->getId (), $newFiles, $locale );

				// Add product properties
				SProductPropertiesDataQuery::create ()->filterByProductId ( $model->getId () )->filterByLocale ( $locale )->delete ();

				if (sizeof ( $_POST ['productProperties'] ) > 0) {
					foreach ( $_POST ['productProperties'] as $key => $value ) {
						if ($value && $value != ShopCore::app ()->SPropertiesRenderer->noValueText && $value != '') {
							$pData = new SProductPropertiesData ();
							if (is_array ( $value )) {
								foreach ( $value as $val ) {
									if ($val != ShopCore::app ()->SPropertiesRenderer->noValueText && $val != '') {
										$pData = new SProductPropertiesData ();
										$pData->setProductId ( $model->getId () );
										$pData->setPropertyId ( $key );
										$pData->setValue ( $val );
										$pData->setLocale ( $locale );
										$model->addSProductPropertiesData ( $pData, $locale );
									}
								}
							} else {
								$pData->setProductId ( $model->getId () );
								$pData->setPropertyId ( $key );
								$pData->setValue ( $value );
								$pData->setLocale ( $locale );
								$model->addSProductPropertiesData ( $pData, $locale );
							}
						}
						// $property = SPropertiesI18nQuery::create()->filterByLocale($locale)->filterById($key)->findOne();
						// if ($data_serial = $property->getData()) {
						// $data = unserialize($data_serial);
						// if (!in_array($value, $data))
						// $data[] = $value;
						// } else {
						// $data = array($value);
						// }
						// $property->setData(serialize($data));
						// $property->save();
					}
						
					$model->save ();
				}
				$model->setActive ( ($_POST ['Active']) );
				$model->save ();

				/**
				 * Save Additional images (from local computer)
				 */
				$additional = $this->upload_all_additionalImages ();

				/**
				 * Save Additional images (from internet)
				 */
				$j = 0;
				$params = array (
						'upload_dir' => './uploads/shop/products/origin/additional/'
				);

				\MediaManager\GetImages::create ( $params );
				while ( key_exists ( "add_img_urls_" . $j, $_POST ) ) {
					if (! empty ( $_POST ["add_img_urls_" . $j] ) & ! key_exists ( $j, $additional )) {
						if (FALSE !== $image = \MediaManager\GetImages::create ( $params )->saveImage ( $_POST ["add_img_urls_" . $j] )) {
							$additional [$j] = $image;
						} else {
							$bad = $_POST ["add_img_urls_" . $j];
							fwrite ( $f, $bad . "\n" );
						}
					}
					$j ++;
				}

				foreach ( $additional as $key => $value ) {
					\MediaManager\Image::create ()->makeResizeAndWatermarkAdditional ( $value );
					$this->saveAdditionalImages ( $productId, $value, $key );
				}

				$model->saveCustomData ();

				/**
				 * Init Event.
				 * Edit Shop Product
				 */
				\CMSFactory\Events::create ()->registerEvent ( array (
						'productId' => $model->getId (),
						'userId' => $this->dx_auth->get_user_id ()
				) );
				\CMSFactory\Events::runFactory ();

				showMessage ( lang ( "The product was successfully edited", "admin" ) );
				$action = $_POST ['action'];

				if ($action == 'close')
					pjax ( '/admin/components/run/shop/search/index' . $_SESSION ['ref_url'] );
				else
					pjax ( '/admin/components/run/shop/products/edit/' . $model->getId () . $_SESSION ['ref_url'] );
			}
		} else {
			// Create array from ids of additional product categories.
			$productCategories = array ();
			foreach ( $model->getCategorys () as $productCategory )
				array_push ( $productCategories, $productCategory->getId () );
				
			$additionalImagePositions = array ();
				
			foreach ( $model->getSProductImagess () as $addImage ) {
				$additionalImagePositions [$addImage->getPosition ()] = $addImage;
			}
				
			$model->setLocale ( $locale );
				
			foreach ( $model->getProductVariants () as $variant ) {
				$variant->setLocale ( $locale );
			}
			$currencies = SCurrenciesQuery::create ()->find ();
				
			$links = $this->prev_next ( $model->getId (), $this->get_ids ( $_GET ) );
				
			$this->render ( 'edit', array (
					'model' => $model,
					'languages' => ShopCore::$ci->cms_admin->get_langs ( true ),
					'categories' => ShopCore::app ()->SCategoryTree->getTree (),
					'productCategories' => $productCategories,
					'additionalImagePositions' => $additionalImagePositions,
					'warehouses' => SWarehousesQuery::create ()->orderByName ()->find (),
					'locale' => $locale,
					'currencies' => $currencies,
					'prev_id' => $links ['prev'],
					'next_id' => $links ['next'],
					'imagesPopup' => $this->render ( 'images', array (), TRUE )
			) );
		}
	}
	protected function _process_warehouses($model) {

		// Process warehouses
		SWarehouseDataQuery::create ()->filterByProductId ( $model->getId () )->delete ();

		if (sizeof ( $_POST ['warehouses'] ) > 0) {
			foreach ( $_POST ['warehouses'] as $key => $val ) {
				if (( int ) $_POST ['warehouses_c'] [$key] > 0 && $val > 0) {
					// Add warehouse data
					$wData = new SWarehouseData ();
					$wData->setCount ( $_POST ['warehouses_c'] [$key] );
					$wData->setWarehouseId ( $val );
					$wData->setProductId ( $model->getId () );
					$model->addSWarehouseData ( $wData );
				}
			}
		}
	}

	/**
	 * Delete product
	 *
	 * @access public
	 */
	public function delete() {
		$model = SProductsQuery::create ()->findPk ( ( int ) $_POST ['productId'] );

		if ($model !== null)
			$model->delete ();

		/**
		 * Init Event.
		 * Create Shop Product
		 */
		\CMSFactory\Events::create ()->registerEvent ( array (
				'productId' => $this->input->post ( 'productId' ),
				'userId' => $this->dx_auth->get_user_id ()
		) );
		\CMSFactory\Events::runFactory ();
	}

	/**
	 * Insert product variants from $_POST data.
	 *
	 * @param integer $productId
	 * @access protected
	 */
	protected function _insert_variants($productId, $image_names, $locale = null) {
		$locale = $locale == null ? $this->defaultLanguage ['identif'] : $locale;
		// Insert product variants
		if (! empty ( $_POST ['variants'] )) {
			$totalVariants = sizeof ( $_POST ['variants'] ['Name'] );
			$variants = array_fill ( 0, $totalVariants, array () );
			$keepById = array ();
			$files = array ();
				
			foreach ( $_POST ['variants'] as $key => $values ) {
				for($i = 0; $i < sizeof ( $values ); $i ++)
					$variants [$i] [$key] = $values [$i];
			}
			$i = 0;
			$countImages = 0;
			foreach ( $variants as $variant ) {

				// ++++++++++++++++++++++++++++++++
				if (isset ( $variant ['CurrentId'] ) && $variant ['CurrentId'] > 0)
					$productVariant_loc = SProductVariantsQuery::create ()->joinWithI18n ( $locale )->where ( 'SProductVariants.ProductId = ?', $productId )->where ( 'SProductVariants.Id = ?', $variant ['CurrentId'] )->findOne ();
				else
					$productVariant_loc = false;

				if ($productVariant_loc) {
						
					$idd = $productVariant_loc->getid ();
					$nn = $variant ['Name'];
						
					$sql = "UPDATE shop_product_variants_i18n set name =  '$nn' WHERE id = '$idd' and locale = '$locale'";
					$this->db->query ( $sql );
					$keepById [] = $idd;
						
					// echo $sql;
				}
				// ++++++++++++++++++++++++++
				// Add variants with Name and Price filled.
				if ($variant ['PriceInMain'] != '' && is_numeric ( $variant ['PriceInMain'] ))
					if (isset ( $variant ['CurrentId'] ) && $variant ['CurrentId'] > 0) {
					$productVariant = SProductVariantsQuery::create ()->where ( 'SProductVariants.ProductId = ?', $productId )->where ( 'SProductVariants.Id = ?', $variant ['CurrentId'] )->findOne ();
				} else {
					if (! $productVariant_loc) // ++
						$productVariant = new SProductVariants ();
				}

				if ($productVariant) { // ++
					$variant ['locale'] = $locale;
						
					$productVariant->fromArray ( $variant, BasePeer::TYPE_PHPNAME, true );
					$productVariant->setPosition ( $i );
					$productVariant->setProductId ( $productId );
					$productVariant->setCurrency ( $variant [currency] );
					$productVariant->setPrice ( $variant ['PriceInMain'], $variant ['currency'] );
						
					if (empty ( $variant ['Stock'] ))
						$productVariant->setStock ( 0 );
						
					$productVariant->save ();
					$variantId = $productVariant->getId ();
						
					$this->load->library ( 'image_lib' );
						
					if (isset ( $image_names [$i] )) {
						$productVariant->setMainimage ( $image_names [$i] );
					}
					$productVariant->save ();
					$keepById [] = $variantId;
					$i ++;
				}

				// ++++++++++++++++++
				if (! $productVariant_loc and $productVariant) {
					$idd = $productVariant->getid ();
					$nn = $variant ['Name'];
						
					$sql = "INSERT INTO shop_product_variants_i18n(id,locale,name) VALUES('$idd','$locale','$nn')";
					$this->db->query ( $sql );
					$keepById [] = $idd;
				}
				// +++++++++++++++++++++++
			}
		}

		// Delete variants
		if (sizeof ( $keepById ) > 0) {
			$model = SProductVariantsQuery::create ()->where ( 'SProductVariants.ProductId = ?', $productId )->where ( 'SProductVariants.Id NOT IN ?', $keepById )->find ();
			$model->delete ();
		} else {
			$model = SProductVariantsQuery::create ()->where ( 'SProductVariants.ProductId = ?', $productId )->find ();
			$model->delete ();
		}
		return $keepById [0];
	}

	/**
	 * Check if file has allowed extension
	 *
	 * @param string $fileName
	 * @access protected
	 * @return bool
	 */
	protected function _isAllowedExtension($fileName) {
		$parts = explode ( '.', $fileName );
		$ext = strtolower ( end ( $parts ) );

		if (in_array ( $ext, $this->allowedImageExtensions ))
			return true;
		else
			return false;
	}
	public function ajaxChangeActive($productId = null) {
		$model = SProductsQuery::create ()->findPk ( $productId );

		if ($model !== null) {
			$model->setActive ( ! $model->getActive () );
			$model->save ();
		}

		if (sizeof ( $_POST ['ids'] > 0 )) {
			$model = SProductsQuery::create ()->findPks ( $_POST ['ids'] );
				
			if (! empty ( $model )) {
				foreach ( $model as $product ) {
					$product->setActive ( ! $product->getActive () );
					$product->save ();
				}
			}
		}
	}
	public function ajaxChangeHit($productId = null) {
		$model = SProductsQuery::create ()->findPk ( $productId );

		if ($model !== null) {
			$model->setHit ( ! $model->getHit () );
			$model->save ();
		}

		if (sizeof ( $_POST ['ids'] > 0 )) {
			$model = SProductsQuery::create ()->findPks ( $_POST ['ids'] );
				
			if (! empty ( $model )) {
				foreach ( $model as $product ) {
					$product->setHit ( ! $product->getHit () );
					$product->save ();
				}
			}
			$url = $_SERVER ['HTTP_REFERER'];
			pjax ( $url );
		}
	}
	public function ajaxChangeHot($productId = null) {
		$model = SProductsQuery::create ()->findPk ( $productId );

		if ($model !== null) {
			$model->setHot ( ! $model->getHot () );
			$model->save ();
		}

		if (sizeof ( $_POST ['ids'] > 0 )) {
			$model = SProductsQuery::create ()->findPks ( $_POST ['ids'] );
				
			if (! empty ( $model )) {
				foreach ( $model as $product ) {
					$product->setHot ( ! $product->getHot () );
					$product->save ();
				}
			}
			$url = $_SERVER ['HTTP_REFERER'];
			pjax ( $url );
		}
	}
	public function ajaxChangeAction($productId = null) {
		$model = SProductsQuery::create ()->findPk ( $productId );

		if ($model !== null) {
			$model->setAction ( ! $model->getAction () );
			$model->save ();
		}

		if (sizeof ( $_POST ['ids'] > 0 )) {
			$model = SProductsQuery::create ()->findPks ( $_POST ['ids'] );
				
			if (! empty ( $model )) {
				foreach ( $model as $product ) {
					$product->setAction ( ! $product->getAction () );
					$product->save ();
				}
			}
			$url = $_SERVER ['HTTP_REFERER'];
			pjax ( $url );
		}
	}
	public function ajaxUpdatePrice($productId = null) {
		if ($productId !== null) {
			$productVariant = SProductVariantsQuery::create ()->filterByProductId ( $productId );
				
			if (isset ( $_POST ['variant'] ))
				$productVariant = $productVariant->filterById ( $_POST ['variant'] );
				
			$productVariant = $productVariant->findOne ();
			$productVariant->setPriceInMain ( $_POST ['price'] );
				
			// set value in main currency
			$productVariant->setPrice ( $_POST ['price'], $productVariant->getCurrency () );
				
			$productVariant->save ();
			/**
			 * Init Event.
			 * Edit Shop Product
			 */
			\CMSFactory\Events::create ()->registerEvent ( array (
					'productId' => $productId,
					'userId' => $this->dx_auth->get_user_id ()
			), 'ShopAdminProducts:edit' );
			\CMSFactory\Events::runFactory ();
				
			// $productVariant->update(array('Price' => $_POST['price']));
			showMessage ( lang ( 'Price updated', 'admin' ) );
		}
	}
	public function ajaxCloneProducts() {
		if (sizeof ( $_POST ['ids'] )) {
			$products = SProductsQuery::create ()->joinWithI18n ( MY_Controller::getCurrentLocale () )->findPks ( $_POST ['ids'] );
			foreach ( $products as $p ) {
				$cloned = $p->copy ();
				$cloned->setName ( $p->getName () . lang ( '(copy)', 'admin' ) );
				$cloned->setUpdated ( time () );
				$cloned->setMainImage ( '' );
				$cloned->setSmallImage ( '' );
				$cloned->setMetaTitle ( $p->getMetaTitle () );
				$cloned->setMetaDescription ( $p->getMetaDescription () );
				$cloned->setMetaKeywords ( $p->getMetaKeywords () );
				$cloned->setFullDescription ( $p->getFullDescription () );
				$cloned->setShortDescription ( $p->getShortDescription () );
				$cloned->save ();
				$cloned->setUrl ( $cloned->getId () );
				$cloned->save ();
				// Clone product variants
				$variants = SProductVariantsQuery::create ()->joinWithI18n ( 'ru' )->filterByProductId ( $p->getId () )->find ();

				foreach ( $variants as $v ) {
					$variantClone = $v->copy ( true );
					$variantClone->setProductId ( $cloned->getId () )->setMainimage ( $v->getMainImage () )->save ();
				}

				// Clone category relations
				// $cats = ShopProductCategoriesQuery::create()->joinWithI18n('ru')
				$cats = ShopProductCategoriesQuery::create ()->filterByProductId ( $p->getId () )->find ();

				if (count ( $cats ) > 0) {
					foreach ( $cats as $catClone ) {
						$CC = new ShopProductCategories ();
						$CC->setProductId ( $cloned->getId () );
						$CC->setCategoryId ( $catClone->getCategoryId () );
						$CC->save ();
					}
				}

				// Clone properties
				$props = SProductPropertiesDataQuery::create ()->filterByProductId ( $p->getId () )->find ();

				if ($props->count () > 0) {
					foreach ( $props as $prop ) {
						$propClone = new SProductPropertiesData ();
						$propClone->setProductId ( $cloned->getId () );
						$propClone->setPropertyId ( $prop->getPropertyId () );
						$propClone->setLocale ( $prop->getLocale () );
						$propClone->setValue ( $prop->getValue () );
						$propClone->save ();
					}
				}

				$cloned->save ();
				// Clone main/small image
				if ($p->getMainImage ()) {
					$source_file = ShopCore::$imagesUploadPath . $p->getMainImage ();
					if (file_exists ( $source_file )) {
						copy ( $source_file, ShopCore::$imagesUploadPath . $cloned->getId () . '_main.jpg' );
						$cloned->setMainImage ( $cloned->getId () . '_main.jpg' );
					}
				}

				if ($p->getMainModImage ()) {
					$source_file = ShopCore::$imagesUploadPath . $p->getMainModImage ();
					if (file_exists ( $source_file )) {
						copy ( $source_file, ShopCore::$imagesUploadPath . $cloned->getId () . '_mainMod.jpg' );
						$cloned->setMainModImage ( $cloned->getId () . '_mainMod.jpg' );
					}
				}

				if ($p->getSmallImage ()) {
					$source_file = ShopCore::$imagesUploadPath . $p->getSmallImage ();
					if (file_exists ( $source_file )) {
						copy ( $source_file, ShopCore::$imagesUploadPath . $cloned->getId () . '_small.jpg' );
						$cloned->setSmallImage ( $cloned->getId () . '_small.jpg' );
					}
				}

				if ($p->getSmallModImage ()) {
					$source_file = ShopCore::$imagesUploadPath . $p->getSmallModImage ();
					if (file_exists ( $source_file )) {
						copy ( $source_file, ShopCore::$imagesUploadPath . $cloned->getId () . '_smallMod.jpg' );
						$cloned->setSmallModImage ( $cloned->getId () . '_smallMod.jpg' );
					}
				}

				try {
						
					MediaManager\Image::create ()->checkOriginFolder ();
					// copying additional images
					$additionalImages = SProductImagesQuery::create ()->filterByProductId ( $p->getId () );
					if ($additionalImages->count ())
						foreach ( $additionalImages->find () as $img ) {
						if (file_exists ( ShopCore::$imagesUploadPath . $img->getImageName () )) {
							$clonedImg = $img->copy ();
							$clonedImg->setImageName ( $cloned->getId () . '_' . $img->getPosition () . '.jpg' );
							$clonedImg->setProductId ( $cloned->getId () );
							$clonedImg->save ();

							copy ( ShopCore::$imagesUploadPath . $img->getImageName (), ShopCore::$imagesUploadPath . $clonedImg->getImageName () );

							if (file_exists ( ShopCore::$imagesUploadPath . 'origin/' . $img->getImageName () ))
								copy ( ShopCore::$imagesUploadPath . 'origin/' . $img->getImageName (), ShopCore::$imagesUploadPath . 'origin/' . $clonedImg->getImageName () );
						}
					}
				} catch ( PropelException $e ) {
					showMessage ( $e->getMessage (), '', 'r' );
				}

				$status = $cloned->save ();
			}
			showMessage ( lang ( 'A copy was successfully created', 'admin' ) );
			pjax ( $_SERVER ['HTTP_REFERER'] );
		}
	}

	/**
	 * Delete products
	 */
	public function ajaxDeleteProducts() {
		if (sizeof ( $_POST ['ids'] > 0 )) {
			// Start. Kits delete
			$kits = $this->db->join ( 'shop_kit_product', 'shop_kit_product.kit_id=shop_kit.id' )->where_in ( 'shop_kit_product.product_id', $_POST ['ids'] )->or_where_in ( 'shop_kit.product_id', $_POST ['ids'] )->group_by ( 'id' )->get ( 'shop_kit' )->result ();
				
			foreach ( $kits as $key => $kit )
				$kitId [$key] = $kit->id;
				
			$modelKit = ShopKitQuery::create ()->findPks ( $kitId );
				
			if ($modelKit != null)
				$modelKit->delete ();
			// End. Kits delete
			// Start. Orders delete
			$orders = $this->db->where_in ( 'product_id', $_POST ['ids'] )->group_by ( 'order_id' )->get ( 'shop_orders_products' )->result ();
				
			foreach ( $orders as $key => $order )
				$orderId [$key] = $order->order_id;
				
			$modelOrders = SOrdersQuery::create ()->findPks ( $orderId );
				
			if ($modelOrders)
				$modelOrders->delete ();
			// End. Orders delete
			// Start. Notifications delete
			$notifications = $this->db->where_in ( 'product_id', $_POST ['ids'] )->get ( 'shop_notifications' )->result ();
				
			foreach ( $notifications as $key => $notification )
				$notifId [$key] = $notification->id;
				
			$notifModel = SNotificationsQuery::create ()->findPks ( $notifId );
				
			if ($notifModel)
				$notifModel->delete ();
			// End. Notifications delete
			// Start. Product delete
			\MediaManager\Image::create ()->deleteImagebyProductId ( $_POST ['ids'] );
			$modelProduct = SProductsQuery::create ()->findPks ( $_POST ['ids'] );
				
			if (! empty ( $modelProduct ))
				$modelProduct->delete ();
			// End. Product delete
				
			/**
			 * Init Event.
			 * Create Shop Product
			 */
			\CMSFactory\Events::create ()->registerEvent ( array (
					'model' => $modelProduct,
					'userId' => $this->dx_auth->get_user_id ()
			), 'ShopAdminProducts:delete' );
			\CMSFactory\Events::runFactory ();
		}
	}

	/**
	 * Show move products window
	 *
	 * @param
	 *        	$categoryId
	 */
	public function ajaxMoveWindow($categoryId) {
		$this->render ( '_moveWindow', array (
				'categories' => ShopCore::app ()->SCategoryTree->getTree (),
				'categoryId' => $categoryId
		) );
	}

	/**
	 * Move products to another category
	 */
	public function ajaxMoveProducts() {
		$newCategoryModel = SCategoryQuery::create ()->findPk ( $_POST ['categoryId'] );

		$products = SProductsQuery::create ()->findPks ( $_POST ['ids'] );

		if ($newCategoryModel !== null && ! empty ( $products )) {
			foreach ( $products as $product ) {
				// Delete main category relation
				ShopProductCategoriesQuery::create ()->filterByProductId ( $product->getId () )->filterByCategoryId ( $product->getCategoryId () )->delete ();

				// Add new main category relation
				$product->setCategoryId ( $newCategoryModel->getId () );
				$product->addCategory ( $newCategoryModel );
				$product->save ();
			}
			// showMessage('ТОвары успешно перемещены');
			pjax ( '/admin/components/run/shop/search/index/?CategoryId=' . $_POST ['categoryId'] );
		}
	}
	public function translate($id) {
		$model = SProductsQuery::create ()->findPk ( ( int ) $id );

		if ($model === null)
			$this->error404 ( lang ( 'Product not found', 'admin' ) );

		$languages = ShopCore::$ci->cms_admin->get_langs ( true );

		$translatableFieldNames = $model->getTranslatableFieldNames ();

		/**
		 * Update product translation
		 */
		if (! empty ( $_POST )) {
			// form validating
			$translatingRules = $model->translatingRules ();
			foreach ( $languages as $language ) {
				foreach ( $translatableFieldNames as $fieldName ) {
					$this->form_validation->set_rules ( $fieldName . '_' . $language ['identif'], $model->getLabel ( $fieldName ) . lang ( ' language ', 'admin' ) . $language ['lang_name'], $translatingRules [$fieldName] );
				}
			}
				
			if ($this->form_validation->run () == FALSE) {
				showMessage ( validation_errors () );
			} else {
				foreach ( $languages as $language ) {
					$model->setLocale ( $language ['identif'] );
					foreach ( $translatableFieldNames as $fieldName ) {
						$methodName = 'set' . $fieldName;
						$model->$methodName ( $this->input->post ( $fieldName . '_' . $language ['identif'] ) );
					}
						
					// begin of processing product variants translating
					foreach ( $_POST ['variants' . '_' . $language ['identif']] as $key => $values ) {
						for($i = 0; $i < sizeof ( $values ); $i ++) {
							$variants [$i] [$key] = $values [$i];
						}
					}
						
					foreach ( $variants as $variant ) {
						$variantModel = SProductVariantsQuery::create ()->where ( 'SProductVariants.ProductId = ?', $model->getId () )->where ( 'SProductVariants.Id = ?', $variant ['CurrentId'] )->findOne ();

						if ($variantModel instanceof SProductVariants) {
							$variantModel->setLocale ( $language ['identif'] );
							$variantModel->setName ( $variant ['Name'] );
							$variantModel->save ();
						}
					}
					// end of processing product variants translating
				}

				$model->save ();

				showMessage ( lang ( 'Changes saved', 'admin' ) );
			}
		} else {
				
			$mceEditorFieldNames = array (
					'ShortDescription',
					'FullDescription'
			);
			$requairedFieldNames = array (
					'Name'
			);
				
			$this->render ( 'translate', array (
					'model' => $model,
					'languages' => $languages,
					'translatableFieldNames' => $translatableFieldNames,
					'mceEditorFieldNames' => $mceEditorFieldNames,
					'requairedFieldNames' => $requairedFieldNames
			) );
		}
	}
	public function get_ids($param) {
		$model = SProductsQuery::create ()->leftJoinProductVariant ();

		if (isset ( $param ['CategoryId'] ) && $param ['CategoryId'] > 0)
			$model = $model->filterByCategoryId ( ( int ) $param ['CategoryId'] );

		if (isset ( $param ['filterID'] ) && $param ['filterID'] > 0)
			$model = $model->filterById ( ( int ) $param ['filterID'] );

		if (isset ( $param ['number'] ) && $param ['number'] != '') {
			$model = $model->where ( 'ProductVariant.Number = ?', $param ['number'] );
		}

		if (! empty ( $param ['text'] )) {
			$text = $param ['text'];
			if (! strpos ( $text, '%' ))
				$text = '%' . $text . '%';
				
			$model = $model->useI18nQuery ( $this->defaultLanguage ['identif'] )->where ( 'SProductsI18n.Name LIKE ?', $text )->endUse ()->orWhere ( 'ProductVariant.Number = ?', $text );
		}

		if (isset ( $param ['min_price'] ) && $param ['min_price'] > 0) {
			$model = $model->where ( 'ProductVariant.Price >= ?', $param ['min_price'] );
		}

		if (isset ( $param ['max_price'] ) && $param ['max_price'] > 0) {
			$model = $model->where ( 'ProductVariant.Price <= ?', $param ['max_price'] );
		}

		if ($param ['Active'] == 'true')
			$model = $model->filterByActive ( true );
		else if ($this->input->get ( 'Active' ) == 'false')
			$model = $model->filterByActive ( false );

		if (isset ( $param ['s'] )) {
			if ($param ['s'] == 'Hit')
				$model = $model->filterByHit ( true );
				
			if ($param ['s'] == 'Hot')
				$model = $model->filterByHot ( true );
				
			if ($param ['s'] == 'Action')
				$model = $model->filterByAction ( true );
		}

		$model = $model->offset ( ( int ) $_GET ['per_page'] )->distinct ()->find ();
		$res = null;
		foreach ( $model as $p ) {
			$res [] .= $p->getId ();
		}

		return $res;
	}
	public function prev_next($cur, $arr = NULL) {
		$res = null;
		if (in_array ( $cur, $arr )) {
			$index_cur = array_search ( $cur, $arr );
			$res ['prev'] = $arr [$index_cur - 1];
			$res ['next'] = $arr [$index_cur + 1];
		} else {
			$res = null;
		}

		return $res;
	}
	public function deleteAddImage($id, $pos) {
		$image = $this->db->where ( 'product_id', $id )->where ( 'position', $pos )->get ( 'shop_product_images' )->row_array ();
		$imageForDelete = $image ['image_name'];

		\MediaManager\Image::create ()->deleteAllProductAdditionalImages ( $imageForDelete );

		$this->db->where ( 'product_id', $id )->where ( 'position', $pos )->delete ( 'shop_product_images' );
	}
	public function upload_all() {
		$files = array ();
		$config = array ();

		$config ['upload_path'] = './uploads/shop/products/origin';
		$config ['allowed_types'] = 'gif|jpg|jpeg|png';
		$config ['encrypt_name'] = true;

		$this->upload->initialize ( $config );
		foreach ( $_FILES as $key => $value ) {
			if (! $this->upload->do_upload ( $key )) {
				return false;
			} else {
				$result = array (
						'upload_data' => $this->upload->data ()
				);
				$files [] .= $result ['upload_data'] ['file_name'];
			}
		}

		return $files;
	}
	public function upload_all_additionalImages() {
		$files = array ();
		$config = array ();

		$config ['upload_path'] = './uploads/shop/products/origin/additional';
		$config ['allowed_types'] = 'gif|jpg|jpeg|png';
		$config ['encrypt_name'] = true;
		$this->upload->initialize ( $config );

		foreach ( $_FILES as $key => $value ) {
			if (! $this->upload->do_upload ( $key )) {
				return false;
			} else {
				$result = array (
						'upload_data' => $this->upload->data ()
				);
				$matches = array ();
				preg_match ( '/\d/', $key, $matches );
				if (strstr ( $key, 'additionalImages' )) {
					$files [$matches [0]] .= $result ['upload_data'] ['file_name'];
				}
			}
		}
		return $files;
	}
	public function saveAdditionalImages($productId, $imageName, $position) {
		$images = $this->db->where ( 'product_id', $productId )->get ( 'shop_product_images' )->result_array ();
		$same_pos = $this->db->where ( 'product_id', $productId )->where ( 'position', $position )->get ( 'shop_product_images' )->row_array ();

		if ($same_pos != NULL) {
			$imageForDelete = $same_pos ['image_name'];
			\MediaManager\Image::create ()->deleteImagebyFullPath ( \MediaManager\Image::create ()->uploadProductsPath . 'origin/additional/' . $imageForDelete );
			\MediaManager\Image::create ()->deleteImagebyFullPath ( \MediaManager\Image::create ()->uploadProductsPath . 'additional/' . $imageForDelete );
			$this->db->where ( 'product_id', $productId )->where ( 'position', $position )->update ( 'shop_product_images', array (
					'image_name' => $imageName
			) );
		} else {
			if (! $images) {
				$position = 0;
			}
				
			$data = array (
					'product_id' => $productId,
					'image_name' => $imageName,
					'position' => $position
			);
			$this->db->insert ( 'shop_product_images', $data );
		}
	}
}

