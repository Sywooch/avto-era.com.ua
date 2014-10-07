<?php

/**
 * ShopAdminBrands
 *
 * @uses ShopController
 * @package
 * @version $id$
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net>
 * @license
 * @property SBrands $model
 */
class ShopAdminBrands extends ShopAdminController {
	protected $allowedImageExtensions = array (
			'jpg',
			'png',
			'gif' 
	);
	public $defaultLanguage = null;
	protected $current_extension = null;
	protected $imageSizes = array (
			'mainImageWidth' => 120,
			'mainImageHeight' => 61 
	);
	protected $imageQuality = 99;
	protected $per_page = 20;
	public function __construct() {
		parent::__construct ();
		$this->defaultLanguage = getDefaultLanguage ();
	}
	private function getTotalRow() {
		$total = SBrandsQuery::create ()->useI18nQuery ( $this->defaultLanguage ['identif'] )->endUse ()->find ();
		return count ( $total );
	}
	public function index($offset = 0) {
		$model = SBrandsQuery::create ()->joinWithI18n ( \MY_Controller::defaultLocale () )->limit ( $this->per_page )->offset ( ( int ) $offset )->orderByPosition ()->useI18nQuery ( $this->defaultLanguage ['identif'] )->endUse ()->find ();
		
		$total = $this->getTotalRow ();
		
		// Create pagination
		$this->load->library ( 'pagination' );
		$config ['base_url'] = $this->createUrl ( 'brands/index/' );
		$config ['container'] = 'shopAdminPage';
		$config ['uri_segment'] = 7;
		$config ['total_rows'] = $total;
		$config ['per_page'] = $this->per_page;
		$config ['separate_controls'] = true;
		$config ['full_tag_open'] = '<div class="pagination pull-left"><ul>';
		$config ['full_tag_close'] = '</ul></div>';
		$config ['controls_tag_open'] = '<div class="pagination pull-right"><ul>';
		$config ['controls_tag_close'] = '</ul></div>';
		$config ['next_link'] = lang ( 'Next', 'admin' ) . '&nbsp;&gt;';
		$config ['prev_link'] = '&lt;&nbsp;' . lang ( 'Prev', 'admin' );
		$config ['cur_tag_open'] = '<li class="btn-primary active"><span>';
		$config ['cur_tag_close'] = '</span></li>';
		$config ['prev_tag_open'] = '<li>';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_tag_open'] = '<li>';
		$config ['next_tag_close'] = '</li>';
		$config ['num_tag_close'] = '</li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li>';
		$config ['last_tag_close'] = '</li>';
		$config ['first_tag_open'] = '<li>';
		$config ['first_tag_close'] = '</li>';
		$this->pagination->num_links = 6;
		$this->pagination->initialize ( $config );
		
		$this->render ( 'list', array (
				'model' => $model,
				'languages' => ShopCore::$ci->cms_admin->get_langs ( true ),
				'pagination' => $this->pagination->create_links () 
		) );
	}
	
	/**
	 * Create new brand
	 *
	 * @access public
	 */
	public function create() {
		$locale = $locale == null ? $this->defaultLanguage ['identif'] : $locale;
		
		$model = new SBrands ();
		
		if (! empty ( $_POST )) {
			$this->form_validation->set_rules ( $model->rules () );
			
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors (), '', 'r' );
			} else {
				// Check if brand URL is aviable.
				$urlCheck = SBrandsQuery::create ()->where ( 'SBrands.Url = ?', ( string ) $_POST ['Url'] )->findOne ();
				
				if ($urlCheck !== null) {
					exit ( showMessage ( lang ( 'This URL is already in use', 'admin' ), '', 'r' ) );
				}
				
				$model->fromArray ( $_POST );
				$model->save ();
				$this->load->library ( 'image_lib' );
				// Resize image.
				if (! empty ( $_FILES ['mainPhoto'] ['tmp_name'] ) && $this->_isAllowedExtension ( $_FILES ['mainPhoto'] ['name'] ) === true) {
					$imageSizes = $this->getImageSize ( $_FILES ['mainPhoto'] ['tmp_name'] );
					$imageName = $model->getUrl () . '.' . $this->current_extension;
					if ($imageSizes ['width'] >= $this->imageSizes ['mainImageWidth'] or $imageSizes ['height'] >= $this->imageSizes ['mainImageHeight']) {
						$config ['image_library'] = 'gd2';
						$config ['source_image'] = $_FILES ['mainPhoto'] ['tmp_name'];
						$config ['create_thumb'] = FALSE;
						$config ['maintain_ratio'] = TRUE;
						$config ['width'] = $this->imageSizes ['mainImageWidth'];
						$config ['height'] = $this->imageSizes ['mainImageHeight'];
						$config ['master_dim'] = 'height';
						$config ['new_image'] = ShopCore::$imagesUploadPath . 'brands/' . $imageName;
						$config ['quality'] = $this->imageQuality;
						$this->image_lib->initialize ( $config );
						
						if ($this->image_lib->resize ()) {
							$mainImageResized = true;
							$model->setImage ( $imageName );
						}
					} else {
						move_uploaded_file ( $_FILES ['mainPhoto'] ['tmp_name'], ShopCore::$imagesUploadPath . 'brands/' . $imageName );
						$mainImageResized = true;
						$model->setImage ( $imageName );
					}
					
					$model->save ();
				}
				
				showMessage ( lang ( 'Brand created', 'admin' ) );
				
				$action = $_POST ['action'];
				
				if ($action == 'exit') {
					pjax ( '/admin/components/run/shop/brands/index' );
				} else {
					pjax ( '/admin/components/run/shop/brands/edit/' . $model->getId () . '/' . $locale );
				}
			}
		} else {
			$this->render ( 'create', array (
					'model' => $model,
					'locale' => $this->defaultLanguage ['identif'] 
			) );
		}
	}
	public function edit($brandId = null, $locale = null) {
		$locale = $locale == null ? $this->defaultLanguage ['identif'] : $locale;
		
		$model = SBrandsQuery::create ()->findPk ( ( int ) $brandId );
		
		if ($model === null)
			$this->error404 ( lang ( 'Brand not found', 'admin' ), '', 'r' );
		
		if (! empty ( $_POST )) {
			$this->form_validation->set_rules ( $model->rules () );
			
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors (), '', 'r' );
			} else {
				// Check if brand URL is aviable.
				$urlCheck = SBrandsQuery::create ()->where ( 'SBrands.Url = ?', ( string ) $_POST ['Url'] )->where ( 'SBrands.Id != ?', ( int ) $model->getId () )->findOne ();
				
				if ($urlCheck !== null && $urlCheck->url !== $model->getUrl ())
					exit ( showMessage ( lang ( 'Fail', 'admin' ), lang ( 'This URL is already in use', 'admin' ), 'r' ) );
				
				$_POST ['Locale'] = $locale;
				
				$model->fromArray ( $_POST );
				if ($this->input->post ( 'deleteImage' ) == 1) {
					if (file_exists ( ShopCore::$imagesUploadPath . '/brands/' . $model->getImage () ))
						unlink ( ShopCore::$imagesUploadPath . '/brands/' . $model->getImage () );
					$model->setImage ( ' ' );
				}
				$model->save ();
				$this->load->library ( 'image_lib' );
				
				// Resize image.
				if (! empty ( $_FILES ['mainPhoto'] ['tmp_name'] ) && $this->_isAllowedExtension ( $_FILES ['mainPhoto'] ['name'] ) === true) {
					$imageSizes = $this->getImageSize ( $_FILES ['mainPhoto'] ['tmp_name'] );
					$imageName = $model->getUrl () . '.' . $this->current_extension;
					if ($imageSizes ['width'] >= $this->imageSizes ['mainImageWidth'] or $imageSizes ['height'] >= $this->imageSizes ['mainImageHeight']) {
						$config ['image_library'] = 'gd2';
						$config ['source_image'] = $_FILES ['mainPhoto'] ['tmp_name'];
						$config ['create_thumb'] = FALSE;
						$config ['maintain_ratio'] = TRUE;
						$config ['width'] = $this->imageSizes ['mainImageWidth'];
						$config ['height'] = $this->imageSizes ['mainImageHeight'];
						$config ['master_dim'] = 'height';
						$config ['new_image'] = ShopCore::$imagesUploadPath . 'brands/' . $imageName;
						$config ['quality'] = $this->imageQuality;
						$this->image_lib->initialize ( $config );
						
						if ($this->image_lib->resize ()) {
							$mainImageResized = true;
							$model->setImage ( $imageName );
						}
					} else {
						move_uploaded_file ( $_FILES ['mainPhoto'] ['tmp_name'], ShopCore::$imagesUploadPath . 'brands/' . $imageName );
						$mainImageResized = true;
						$model->setImage ( $imageName );
					}
					
					$model->save ();
				}
				
				showMessage ( lang ( 'Changes have been saved', 'admin' ) );
				
				if ($_POST ['action'] == 'tomain')
					pjax ( '/admin/components/run/shop/brands/index' );
				
				if ($_POST ['action'] == 'toedit')
					pjax ( '/admin/components/run/shop/brands/edit/' . $model->getId () );
				
				if ($_POST ['action'] == 'tocreate')
					pjax ( '/admin/components/run/shop/brands/create' );
			}
		} else {
			$model->setLocale ( $locale );
			
			$this->render ( 'edit', array (
					'model' => $model,
					'languages' => ShopCore::$ci->cms_admin->get_langs ( true ),
					'locale' => $locale 
			) );
		}
	}
	public function delete() {
		$id = $_POST ['ids'];
		foreach ( $id as $item ) {
			$item = ( int ) $item;
		}
		$model = SBrandsQuery::create ()->findPks ( $id );
		if ($model != null) {
			$model->delete ();
			showMessage ( lang ( 'Removing brand', 'admin' ) );
			pjax ( '/admin/components/run/shop/brands/index' );
		}
	}
	public function c_list() {
		$model = SBrandsQuery::create ()->orderByPosition ()->useI18nQuery ( $this->defaultLanguage ['identif'] )->endUse ()->find ();
		
		$this->render ( 'list', array (
				'model' => $model,
				'languages' => ShopCore::$ci->cms_admin->get_langs ( true ) 
		) );
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
		
		$this->current_extension = $ext;
		
		if (in_array ( $ext, $this->allowedImageExtensions ))
			return true;
		else
			return false;
	}
	
	/**
	 * Get image width and height.
	 *
	 * @param string $file_path
	 *        	Full path to image
	 * @access protected
	 * @return mixed
	 */
	protected function getImageSize($file_path) {
		if (function_exists ( 'getimagesize' ) && file_exists ( $file_path )) {
			$image = @getimagesize ( $file_path );
			
			$size = array (
					'width' => $image [0],
					'height' => $image [1] 
			);
			
			return $size;
		}
		
		return false;
	}
	public function translate($id) {
		$model = SBrandsQuery::create ()->findPk ( ( int ) $id );
		
		if ($model === null)
			$this->error404 ( lang ( 'Brand not found', 'admin' ) );
		
		$languages = ShopCore::$ci->cms_admin->get_langs ( true );
		
		$translatableFieldNames = $model->getTranslatableFieldNames ();
		
		/**
		 * Update brand translation
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
				}
				
				$model->save ();
				
				showMessage ( lang ( 'Changes have been saved', 'admin' ) );
				
				if ($_POST ['action'] == 'tomain')
					pjax ( '/admin/components/run/shop/brands/index' );
				
				if ($_POST ['action'] == 'toedit')
					pjax ( '/admin/components/run/shop/brands/edit/' . $model->getId () );
				
				if ($_POST ['action'] == 'tocreate')
					pjax ( '/admin/components/run/shop/brands/create' );
			}
		} else {
			
			$mceEditorFieldNames = array (
					'Description' 
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
	public function save_positions() {
		$positions = $_POST ['positions'];
		if (sizeof ( $positions ) == 0) {
			return false;
		}
		
		foreach ( $positions as $key => $val ) {
			$query = "UPDATE `shop_brands` SET `position`=" . $key . " WHERE `id`=" . ( int ) $val . "; ";
			$this->db->query ( $query );
		}
		showMessage ( lang ( "Positions saved", 'admin' ) );
	}
}
