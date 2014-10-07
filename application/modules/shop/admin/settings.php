<?php

/**
 * ShopAdminSettings class
 *
 * Saves shop settings
 */
class ShopAdminSettings extends ShopAdminController {
	private $defaultLanguage = null;
	public function __construct() {
		parent::__construct ();
		
		$this->defaultLanguage = getDefaultLanguage ();
	}
	
	/**
	 * Display settings table
	 *
	 * @return string
	 */
	public function index($locale = null) {
		$locale = $locale == null ? $this->defaultLanguage ['identif'] : $locale;
		
		SSettings::$curentLocale = $locale;
		
		$orders = SOrderStatusesI18nQuery::create ()->filterByLocale ( $locale )->find ();
		
		$notif = $this->db->where ( 'locale', $locale )->get ( 'answer_notifications' )->result_array ();
		$notif_with_key = array ();
		foreach ( $notif as $n )
			$notif_with_key [$n ['name']] = $n ['message'];
		
		$this->render ( 'settings', array (
				'templates' => $this->_getTemplatesList (),
				'mobileTemplates' => $this->_getMobileTemplatesList (),
				'locale' => $locale,
				'orders' => $orders,
				'ctemplates' => $this->_get_templates (),
				'vsettings' => $this->get_vsettings (),
				'fsettings' => $this->get_fsettings (),
				'xmlSettings' => $this->_load_settings (),
				'changefreq_options' => array (
						'always' => 'always',
						'hourly' => 'hourly',
						'daily' => 'daily',
						'weekly' => 'weekly',
						'monthly' => 'monthly',
						'yearly' => 'yearly',
						'never' => 'never' 
				),
				'sorting' => $this->getSorting (),
				'notif' => $notif_with_key 
		) );
	}
	
	/**
	 * Update settings
	 */
	public function update($locale = null) {
		if ($locale === null)
			$locale = chose_language ();
		$fdata = $_POST ['facebook'];
		$vdata = $_POST ['vk'];
		$fstring = serialize ( $fdata );
		$vstring = serialize ( $vdata );
		ShopCore::app ()->SSettings->set ( 'facebook_int', $fstring );
		ShopCore::app ()->SSettings->set ( 'vk_int', $vstring );
		
		$XMLDataMap = array (
				'main_page_priority' => $this->input->post ( 'main_page_priority' ),
				'cats_priority' => $this->input->post ( 'cats_priority' ),
				'pages_priority' => $this->input->post ( 'pages_priority' ),
				'main_page_changefreq' => $this->input->post ( 'main_page_changefreq' ),
				'categories_changefreq' => $this->input->post ( 'categories_changefreq' ),
				'pages_changefreq' => $this->input->post ( 'pages_changefreq' ) 
		);
		
		ShopCore::app ()->SSettings->set ( 'xmlSiteMap', serialize ( $XMLDataMap ) );
		$this->db->where ( 'name', 'sitemap' );
		$this->db->update ( 'components', array (
				'enabled' => '1',
				'settings' => serialize ( $XMLDataMap ) 
		) );
		
		$data = array ();
		$this->load->library ( 'form_validation' );
		
		// Products front validation rules
		$this->form_validation->set_rules ( 'frontProductsPerPage', lang ( 'Number of products on site', 'admin' ), 'integer|required' );
		$this->form_validation->set_rules ( 'arrayFrontProductsPerPage', lang ( 'Array of values for the number of products on site', 'admin' ), 'required' );
		$this->form_validation->set_rules ( 'adminProductsPerPage', lang ( 'The number of items in the control panel', 'admin' ), 'integer|required' );
		
		// Orders
		// $this->form_validation->set_rules('orders[senderEmail]', lang('Email address of the sender in the Notice for the buyer of making an order', 'admin'), 'valid_email|required');
		// $this->input->post('orders[managerEmail]') ? $this->form_validation->set_rules('orders[managerEmail]', lang('Email address of the administrator in the Notice for the buyer of making an order', 'admin'), 'valid_email') : false;
		// $this->form_validation->set_rules('notifyOrderStatus[senderEmail]', lang('Email address of the sender in the Notice of change of status of the customer order', 'admin'), 'valid_email|required');
		// $this->form_validation->set_rules('wishLists[senderEmail]', lang('Email address of the WishList sender', 'valid_email|required');
		// $this->form_validation->set_rules('notifications[senderEmail]', lang('Email address of the sender requested notify', 'admin'), 'valid_email|required');
		// $_POST['callbacks']['sendEmailTo'] ? $this->form_validation->set_rules('callbacks[sendEmailTo]', lang('Email, which send messages to the new Callback', 'admin'), 'valid_email') : true;
		// $_POST['callbacks']['senderEmail'] ? $this->form_validation->set_rules('callbacks[senderEmail]', lang('Email address of the sender', 'admin'), 'valid_email') : true;
		// $_POST['userInfo']['senderEmail'] ? $this->form_validation->set_rules('userInfo[senderEmail]', lang('Email address of the sender', 'admin'), 'valid_email') : true;
		
		if ($this->form_validation->run () == false) {
			showMessage ( validation_errors (), '', '' );
			return false;
		} else {
			
			$defaultFontPath = "./uploads/";
			
			$data ['pricePrecision'] = $_POST ['pricePrecision'];
			$data ['order_method'] = $_POST ['order_method'];
			
			// Forgot Password Message text
			$data ['forgotPasswordMessageText'] = $_POST ['forgotPassword'] ['MessageText'];
			
			@$_POST ['watermark'] ['active'] = ( boolean ) $_POST ['watermark'] ['active'];
			// Save watermark settings
			if (! empty ( $_POST ['watermark'] )) {
				foreach ( $_POST ['watermark'] as $key => $value ) {
					$data ['watermark_' . $key] = $value;
				}
				
				if (isset ( $_FILES ['watermark_font_path_file'] )) {
					$data ['watermark_watermark_font_path'] = $defaultFontPath . $_FILES ['watermark_font_path_file'] ['name'];
				} else {
					unset ( $data ['watermark_watermark_font_path'] );
				}
			}
			// Start. Save image sizes Blocks
			if ($imageSizesBlock = serialize ( $_POST ['imageSizesBlock'] )) {
				ShopCore::app ()->SSettings->set ( 'imageSizesBlock', $imageSizesBlock );
			}
			// End. Save image sizes Blocks
			
			/**
			 * Delete not used folders
			 */
			$postList = array ();
			foreach ( $_POST ['imageSizesBlock'] as $key => $value ) {
				$postList [] .= $value ['name'];
			}
			
			array_push ( $postList, 'additional', 'origin', 'watermarks' );
			$list = $this->getFoldersList ( \ShopCore::$imagesUploadPath . 'products/' );
			$foldersForDeleting = array_diff ( $list, $postList );
			
			foreach ( $foldersForDeleting as $value ) {
				$this->removeDirectory ( \ShopCore::$imagesUploadPath . 'products/' . $value );
			}
			/**
			 * End.
			 * Delete not used folders
			 */
			$data ['imagesQuality'] = $_POST ['images'] ['quality'];
			$data ['imagesMainSize'] = $_POST ['images'] ['imagesMainSize'];
			
			$data ['additionalImageWidth'] = $_POST ['additionalImageWidth'];
			$data ['additionalImageHeight'] = $_POST ['additionalImageHeight'];
			
			$data ['thumbImageWidth'] = $_POST ['thumbImageWidth'];
			$data ['thumbImageHeight'] = $_POST ['thumbImageHeight'];
			
			$data ['frontProductsPerPage'] = $_POST ['frontProductsPerPage'];
			if ($_POST ['arrayFrontProductsPerPage'] != null) {
				$values = explode ( ",", trim ( $_POST ['arrayFrontProductsPerPage'], ',' ) );
				$data ['arrayFrontProductsPerPage'] = serialize ( $values );
			}
			$data ['adminProductsPerPage'] = $_POST ['adminProductsPerPage'];
			$data ['systemTemplatePath'] = $_POST ['systemTemplatePath'];
			$data ['mobileTemplatePath'] = $_POST ['mobileTemplatePath'];
			
			// Orders
			$data ['ordersMessageFormat'] = $_POST ['orders'] ['messageFormat'];
			$data ['ordersMessageText'] = $_POST ['orders'] ['userMessageText'];
			$data ['ordersSendMessage'] = $_POST ['orders'] ['sendUserEmail'];
			$data ['ordersSenderEmail'] = $_POST ['orders'] ['senderEmail'];
			$data ['ordersSenderName'] = $_POST ['orders'] ['senderName'];
			$data ['ordersMessageTheme'] = $_POST ['orders'] ['theme'];
			$data ['ordersManagerEmail'] = $_POST ['orders'] ['managerEmail'];
			$data ['ordersSendManagerMessage'] = $_POST ['orders'] ['sendManagerEmail'];
			
			$data ['ordersuserInfoRegister'] = $_POST ['orders'] ['userInfo[Register]'];
			
			$data ['ordersRecountGoods'] = ( bool ) $_POST ['orders'] ['recountGoods'];
			$data ['ordersCheckStocks'] = ( bool ) $_POST ['orders'] ['checkStocks'];
			
			// Order statuses changing
			$data ['notifyOrderStatusStatusEmail'] = $_POST ['notifyOrderStatus'] ['statusEmail'];
			$data ['notifyOrderStatusMessageFormat'] = $_POST ['notifyOrderStatus'] ['messageFormat'];
			$data ['notifyOrderStatusMessageText'] = $_POST ['notifyOrderStatus'] ['userMessageText'];
			$data ['notifyOrderStatusSenderEmail'] = $_POST ['notifyOrderStatus'] ['senderEmail'];
			$data ['notifyOrderStatusSenderName'] = $_POST ['notifyOrderStatus'] ['senderName'];
			$data ['notifyOrderStatusMessageTheme'] = $_POST ['notifyOrderStatus'] ['theme'];
			
			// Wish lists
			$data ['wishListsMessageFormat'] = $_POST ['wishLists'] ['messageFormat'];
			$data ['wishListsMessageText'] = $_POST ['wishLists'] ['userMessageText'];
			$data ['wishListsSenderEmail'] = $_POST ['wishLists'] ['senderEmail'];
			$data ['wishListsSenderName'] = $_POST ['wishLists'] ['senderName'];
			$data ['wishListsMessageTheme'] = $_POST ['wishLists'] ['theme'];
			
			// Notifications
			$data ['notificationsMessageFormat'] = $_POST ['notifications'] ['messageFormat'];
			$data ['notificationsMessageText'] = $_POST ['notifications'] ['userMessageText'];
			$data ['notificationsSenderEmail'] = $_POST ['notifications'] ['senderEmail'];
			$data ['notificationsSenderName'] = $_POST ['notifications'] ['senderName'];
			$data ['notificationsMessageTheme'] = $_POST ['notifications'] ['theme'];
			
			// Callbacks
			$data ['callbacksSendNotification'] = ($_POST ['callbacks'] ['sendNotification'] == 1) ? 1 : 0;
			$data ['callbacksMessageFormat'] = $_POST ['callbacks'] ['messageFormat'];
			$data ['callbacksMessageText'] = $_POST ['callbacks'] ['userMessageText'];
			$data ['callbacksSendEmailTo'] = $_POST ['callbacks'] ['sendEmailTo'];
			$data ['callbacksSenderEmail'] = $_POST ['callbacks'] ['senderEmail'];
			$data ['callbacksSenderName'] = $_POST ['callbacks'] ['senderName'];
			$data ['callbacksMessageTheme'] = $_POST ['callbacks'] ['theme'];
			
			// UserInfo for new user after ordering
			$data ['userInfoRegister'] = ($_POST ['userInfo'] ['Register'] == 1) ? 1 : 0;
			$data ['userInfoMessageFormat'] = $_POST ['userInfo'] ['messageFormat'];
			$data ['userInfoMessageText'] = $_POST ['userInfo'] ['userMessageText'];
			$data ['userInfoSenderEmail'] = $_POST ['userInfo'] ['senderEmail'];
			$data ['userInfoSenderName'] = $_POST ['userInfo'] ['senderName'];
			$data ['userInfoMessageTheme'] = $_POST ['userInfo'] ['theme'];
			
			// UserInfo for new user after ordering
			$data ['topSalesBlockFormulaCoef'] = $_POST ['topSalesBlock'] ['formulaCoef'];
			$data ['Locale'] = $_POST ['Locale'];
			
			// Yandex market settings
			$data ['selectedProductCats'] = serialize ( $_POST ['displayedCats'] );
			
			// 1C catalogue settings
			$_POST ['1CSettings'] ['filesize'] = 'file_limit=' . $_POST ['1CSettings'] ['filesize'];
			$data ['1CCatSettings'] = serialize ( $_POST ['1CSettings'] );
			$data ['1CSettingsOS'] = serialize ( $_POST ['1CSettingsOS'] );
			
			// Memcached settings
			$_POST ['MemCachedSettings'] ['MEMCACHE_ON'] = ( bool ) $_POST ['MemCachedSettings'] ['MEMCACHE_ON'];
			$data ['MemcachedSettings'] = serialize ( $_POST ['MemCachedSettings'] );
			
			// Mobile version settings
			$_POST ['MobileVersionSettings'] ['MobileVersionON'] = ( bool ) $_POST ['MobileVersionSettings'] ['MobileVersionON'];
			$data ['MobileVersionSettings'] = serialize ( $_POST ['MobileVersionSettings'] );
			
			// Messages from admin panel
			// $data['adminMessageIncoming'] = $_POST['messages']['incoming'];
			// $data['adminMessageCallback'] = $_POST['messages']['callback'];
			$data ['adminMessageMonkey'] = $_POST ['messages'] ['monkey'];
			$data ['adminMessageMonkeylist'] = $_POST ['messages'] ['monkeylist'];
			// $data['adminMessageOrderPage'] = $_POST['messages']['order'];
			// $data['adminMessages'] = serialize($_POST['messages']);
			
			SSettings::$curentLocale = $data ['Locale'];
			ShopCore::app ()->SSettings->fromArray ( $data );
			
			$adminMessageIncoming = $_POST ['messages'] ['incoming'];
			$adminMessageCallback = $_POST ['messages'] ['callback'];
			$adminMessageOrderPage = $_POST ['messages'] ['order'];
			
			if ($this->db->where ( 'name', 'incoming' )->where ( 'locale', $locale )->get ( 'answer_notifications' )->num_rows ())
				$this->db->where ( 'name', 'incoming' )->where ( 'locale', $locale )->update ( 'answer_notifications', array (
						'message' => $adminMessageIncoming 
				) );
			else
				$this->db->insert ( 'answer_notifications', array (
						'locale' => $locale,
						'name' => 'incoming',
						'message' => $adminMessageIncoming 
				) );
			
			if ($this->db->where ( 'name', 'callback' )->where ( 'locale', $locale )->get ( 'answer_notifications' )->num_rows ())
				$this->db->where ( 'name', 'callback' )->where ( 'locale', $locale )->update ( 'answer_notifications', array (
						'message' => $adminMessageCallback 
				) );
			else
				$this->db->insert ( 'answer_notifications', array (
						'locale' => $locale,
						'name' => 'callback',
						'message' => $adminMessageCallback 
				) );
			
			if ($this->db->where ( 'name', 'order' )->where ( 'locale', $locale )->get ( 'answer_notifications' )->num_rows ())
				$this->db->where ( 'name', 'order' )->where ( 'locale', $locale )->update ( 'answer_notifications', array (
						'message' => $adminMessageOrderPage 
				) );
			else
				$this->db->insert ( 'answer_notifications', array (
						'locale' => $locale,
						'name' => 'order',
						'message' => $adminMessageOrderPage 
				) );
				
				// saving font file, if specified
			if (isset ( $_FILES ['watermark_font_path_file'] )) {
				$uploadPath = './uploads/';
				// TODO: there are no mime-types for fonts in application/config/mimes.php
				$allowedTypes = array (
						'ttf',
						'fnt',
						'fon',
						'otf' 
				);
				$ext = pathinfo ( $_FILES ['watermark_font_path_file'] ['name'], PATHINFO_EXTENSION );
				if (in_array ( $ext, $allowedTypes )) {
					$this->load->library ( 'upload', array (
							'upload_path' => $uploadPath,
							'max_size' => 1024 * 1024 * 2, // 2 Mb
							                               // 'allowed_types' => 'ttf|fnt|fon|otf'
							'allowed_types' => '*' 
					) );
					if (! $this->upload->do_upload ( 'watermark_font_path_file' )) {
						$data ['error'] = $this->upload->display_errors ( '', '' );
					} else {
						$data = array (
								'upload_data' => $this->upload->data () 
						);
						// changing value in the DB
						$this->changeComponentsSettings ( 'gallery', 'watermark_font_path', $uploadPath . $_FILES ['watermark_font_path_file'] ['name'] );
					}
				}
			}
			
			showMessage ( lang ( 'Changes have been saved', 'admin' ) );
			
			$this->cache->delete_all ();
			
			$action = $_POST ['action'];
			if ($action == 'close')
				pjax ( '/admin/components/run/shop/dashboard' );
		}
	}
	
	/**
	 * Changes the array values in table `components`, field `settings`
	 * 
	 * @param string $moduleName
	 *        	- `name` field of table (module name)
	 * @param string $key        	
	 * @param mixed $newValue        	
	 */
	protected function changeComponentsSettings($moduleName, $key, $newValue) {
		// getting settings from table
		$result = $this->db->select ( 'settings' )->from ( 'components' )->where ( 'name', $moduleName )->get ();
		$settingsData = $result->result_array ();
		$settings = unserialize ( $settingsData [0] ['settings'] );
		// set new value
		$settings [$key] = $newValue;
		// save data into table
		$this->db->where ( 'name', $moduleName )->update ( 'components', array (
				'settings' => serialize ( $settings ) 
		) );
	}
	protected function _getTemplatesList() {
		$paths = array ();
		$this->load->helper ( 'directory' );
		
		$dirs = array (
				'./application/modules/shop/templates/*',
				'./templates/*/shop/' 
		);
		
		foreach ( $dirs as $dir ) {
			$result = glob ( $dir, GLOB_ONLYDIR );
			if (is_array ( $result )) {
				
				// Remove mobile version template from select
				foreach ( $result as $pathItemIndex => $pathItem ) {
					if (stristr ( $pathItem, '_mobile' ))
						unset ( $result [$pathItemIndex] );
				}
				
				$paths = array_merge ( $paths, $result );
			}
		}
		
		if (sizeof ( $paths > 0 )) {
			return $paths;
		} else {
			return false;
		}
	}
	protected function _getMobileTemplatesList() {
		$paths = array ();
		$this->load->helper ( 'directory' );
		
		$dirs = array (
				'./application/modules/shop/templates/*',
				'./templates/*/shop' 
		);
		
		foreach ( $dirs as $dir ) {
			$result = glob ( $dir, GLOB_ONLYDIR );
			if (is_array ( $result )) {
				
				// Remove templates from select except mobile version
				foreach ( $result as $pathItemIndex => $pathItem ) {
					if (! stristr ( $pathItem, '_mobile' ))
						unset ( $result [$pathItemIndex] );
				}
				
				$paths = array_merge ( $paths, $result );
			}
		}
		
		if (sizeof ( $paths > 0 )) {
			return $paths;
		} else {
			return false;
		}
	}
	public function get_fsettings() {
		$settings = ShopCore::app ()->SSettings->__get ( 'facebook_int' );
		$settings = unserialize ( $settings );
		return $settings;
	}
	public function get_vsettings() {
		$settings = ShopCore::app ()->SSettings->__get ( 'vk_int' );
		$settings = unserialize ( $settings );
		return $settings;
	}
	function _get_templates() {
		$new_arr = array ();
		if ($handle = opendir ( TEMPLATES_PATH )) {
			while ( false !== ($file = readdir ( $handle )) ) {
				if ($file != "." && $file != ".." && $file != 'administrator' && $file != 'modules') {
					if (! is_file ( TEMPLATES_PATH . $file )) {
						$new_arr [$file] = $file;
					}
				}
			}
			closedir ( $handle );
		} else {
			return FALSE;
		}
		return $new_arr;
	}
	public function _load_settings() {
		return $this->load->module ( 'sitemap' )->_load_settings ();
	}
	public function runResizeAll() {
		\MediaManager\Image::create ()->resizeAll ();
		showMessage ( lang ( 'Pictures Updated', 'admin' ) );
	}
	public function runResizeAllJsone() {
		$array = json_decode ( $this->input->post ( 'array' ) );
		\MediaManager\Image::create ()->resizeById ( $array );
		// showMessage("Картинки обновлены");
	}
	public function runResizeAllAdditionalJsone() {
		$array = json_decode ( $this->input->post ( 'array' ) );
		\MediaManager\Image::create ()->resizeByIdAdditional ( $array );
		// showMessage("Картинки обновлены");
	}
	public function runResizeById($id) {
		\MediaManager\Image::create ()->resizeById ( $id )->resizeByIdAdditional ( $id, TRUE );
		showMessage ( lang ( 'Pictures Updated', 'admin' ) );
	}
	public function changeSortActive() {
		if ($this->input->post ( 'status' ) == 'true') {
			$status = 0;
		} else {
			$status = 1;
		}
		$this->db->where ( 'id', $this->input->post ( 'sortId' ) )->update ( 'shop_sorting', array (
				'active' => $status 
		) );
	}
	public function saveSortPositions() {
		$positions = $_POST ['positions'];
		if (sizeof ( $positions ) == 0) {
			return false;
		}
		foreach ( $positions as $key => $val ) {
			$query = "UPDATE `shop_sorting` SET `pos`=" . $key . " WHERE `id`=" . ( int ) $val . "; ";
			$this->db->query ( $query );
		}
		showMessage ( lang ( 'Positions saved', 'admin' ) );
	}
	public function ajaxUpdateFieldName() {
		$data = array (
				$this->input->post ( 'name' ) => $this->input->post ( 'text' ) 
		);
		try {
			$this->db->where ( 'id', $this->input->post ( 'id' ) )->update ( 'shop_sorting', $data );
		} catch ( Exception $e ) {
		}
	}
	public function getAllProductsVariantsIds() {
		$ids = null;
		$array = $this->db->select ( 'id,mainImage' )->get ( 'shop_product_variants' )->result_array ();
		
		foreach ( $array as $value ) {
			if ($value [mainImage])
				$ids [] .= $value ['id'];
		}
		echo json_encode ( $ids );
	}
	public function getAllProductsIds() {
		$ids = null;
		$array = $this->db->distinct ()->select ( 'product_id' )->get ( 'shop_product_images' )->result_array ();
		foreach ( $array as $value ) {
			$ids [] .= $value ['product_id'];
		}
		if ($ids != null)
			echo json_encode ( $ids );
		else
			echo 'false';
	}
	public function getFoldersList($path) {
		$list = scandir ( $path );
		unset ( $list [0], $list [1] );
		return $list;
	}
	function removeDirectory($dir) {
		if ($objs = glob ( $dir . "/*" )) {
			foreach ( $objs as $obj ) {
				is_dir ( $obj ) ? removeDirectory ( $obj ) : unlink ( $obj );
			}
		}
		rmdir ( $dir );
	}
	public function getSorting() {
		$locale = MY_Controller::getCurrentLocale ();
		return $this->db->order_by ( 'shop_sorting.pos' )->select ( '*, shop_sorting.id as id' )->join ( 'shop_sorting_i18n', "shop_sorting_i18n.id=shop_sorting.id and shop_sorting_i18n.locale = '$locale'", 'left' )->get ( 'shop_sorting' )->result_array ();
	}
	public function setSorting() {
		$name = $this->input->post ( 'name' );
		$name_front = $this->input->post ( 'name_front' );
		$get = $this->input->post ( 'get' );
		$tooltip = $this->input->post ( 'tooltip' );
		$locale = $this->input->post ( 'locale' );
		$id = $this->input->post ( 'id' );
		
		if ($this->db->where ( 'locale', $locale )->where ( 'id', $id )->get ( 'shop_sorting_i18n' )->num_rows ())
			$this->db->where ( 'locale', $locale )->where ( 'id', $id )->update ( 'shop_sorting_i18n', array (
					'name' => $name,
					'name_front' => $name_front,
					'tooltip' => $tooltip 
			) );
		else
			$this->db->insert ( 'shop_sorting_i18n', array (
					'locale' => $locale,
					'id' => $id,
					'name' => $name,
					'name_front' => $name_front,
					'tooltip' => $tooltip 
			) );
	}
}
