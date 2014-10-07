<?php
class ShopAdminCallbacks extends ShopAdminController {
	protected $perPage = 14;
	public $defaultLanguage = null;
	public function __construct() {
		parent::__construct ();
		$this->defaultLanguage = getDefaultLanguage ();
	}
	public function index($status = null, $offset = 0, $orderField = '', $orderCriteria = '') {
		$model = SCallbacksQuery::create ()->joinSCallbackStatuses ( null, 'left join' )->joinSCallbackThemes ( null, 'left join' );
		
		if ($orderField !== '' && $orderCriteria !== '' && (method_exists ( $model, 'filterBy' . $orderField ) || $orderField == 'SCallbackStatuses.Text' || $orderField == 'SCallbackThemes.Text')) {
			switch ($orderCriteria) {
				case 'ASC' :
					$model = $model->orderBy ( $orderField, Criteria::ASC );
					$nextOrderCriteria = 'DESC';
					break;
				
				case 'DESC' :
					$model = $model->orderBy ( $orderField, Criteria::DESC );
					$nextOrderCriteria = 'ASC';
					break;
			}
		} else
			$model->orderByStatusId ();
		
		if (! $_GET ['status'])
			$_GET ['status'] = SCallbackStatusesQuery::create ()->filterByIsDefault ( TRUE )->findOne ()->getId ();
		
		if ($status != null && $status > 0)
			$_GET ['status'] = ( int ) $status;
			
			// $model->filterByStatusId($_GET['status']);
			// Count total orders
		$totalCallbacks = $this->_count ( $model );
		
		$model = $model->limit ( $this->perPage )->offset ( ( int ) $offset )->find ();
		
		$callbackStatuses = SCallbackStatusesQuery::create ()->orderBy ( 'IsDefault', Criteria::DESC )->find ();
		$callbackThemes = SCallbackThemesQuery::create ()->find ();
		
		// Create pagination
		$this->load->library ( 'pagination' );
		$config ['base_url'] = $this->createUrl ( 'callbacks/index/' . $_GET ['status'] . '/' );
		$config ['container'] = 'shopAdminPage';
		$config ['uri_segment'] = 8;
		$config ['total_rows'] = $totalCallbacks;
		$config ['per_page'] = $this->perPage;
		// $config['page_query_string'] = TRUE;
		$this->pagination->num_links = 6;
		$config ['suffix'] = ($orderField != '') ? $orderField . '/' . $orderCriteria : '';
		$this->pagination->initialize ( $config );
		
		$this->render ( 'list', array (
				'model' => $model,
				'pagination' => $this->pagination->create_links_ajax (),
				'totalCallbacks' => $totalCallbacks,
				'nextOrderCriteria' => $nextOrderCriteria,
				'orderField' => $orderField,
				'callbackStatuses' => $callbackStatuses,
				'callbackThemes' => $callbackThemes 
		) );
	}
	
	/**
	 * Create or update callback
	 *
	 * @param null $brandId        	
	 * @return void
	 */
	public function update($callbackId = null) {
		$model = SCallbacksQuery::create ()->findPk ( ( int ) $callbackId );
		
		if ($model === null)
			$this->error404 ( lang ( 'Error', 'admin' ) );
		
		if (! empty ( $_POST )) {
			$this->form_validation->set_rules ( $model->rules () );
			
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors () );
			} else {
				$model->fromArray ( $_POST );
				if ($model->getStatusId () !== $_POST ['StatusId']) {
					$model->setUserId ( $this->dx_auth->get_user_id () );
				}
				$model->save ();
				
				showMessage ( lang ( 'Changes have been saved', 'admin' ) );
				
				if ($_POST ['action'] == 'close')
					$redirect_url = '/admin/components/run/shop/callbacks';
				
				if ($_POST ['action'] == 'edit')
					$redirect_url = '/admin/components/run/shop/callbacks/update/' . $model->getId ();
				
				pjax ( $redirect_url );
			}
		} else {
			$this->render ( 'edit', array (
					'model' => $model 
			) );
		}
	}
	
	/**
	 * Display list of callback statuses
	 *
	 * @return void
	 */
	public function statuses() {
		$model = SCallbackStatusesQuery::create ()->joinWithI18n ( \MY_Controller::defaultLocale (), Criteria::LEFT_JOIN )->find ();
		
		$this->render ( 'status_list', array (
				'model' => $model,
				'locale' => $this->defaultLanguage ['identif'] 
		) );
	}
	
	/**
	 * Create new status
	 *
	 * @param null $callbackId        	
	 * @return void
	 */
	public function createStatus() {
		$model = new SCallbackStatuses ();
		
		if (! empty ( $_POST )) {
			$this->form_validation->set_rules ( $model->rules () );
			
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors (), '', 'r' );
			} else {
				if (! $_POST ['IsDefault'])
					$_POST ['IsDefault'] = false;
				
				$model->fromArray ( $_POST );
				$model->save ();
				
				showMessage ( lang ( 'Position created', 'admin' ) );
				
				if ($_POST ['action'] == 'new')
					$redirect_url = '/admin/components/run/shop/callbacks/updateStatus/' . $model->getId ();
				
				if ($_POST ['action'] == 'exit')
					$redirect_url = '/admin/components/run/shop/callbacks/statuses';
				
				pjax ( $redirect_url );
			}
		} else {
			$this->render ( 'create_status', array (
					'model' => $model,
					'locale' => $this->defaultLanguage ['identif'] 
			) );
		}
	}
	
	/**
	 * Update new status
	 *
	 * @param null $callbackId        	
	 * @return void
	 */
	public function updateStatus($statusId = null, $locale = null) {
		$locale = $locale == null ? $this->defaultLanguage ['identif'] : $locale;
		
		$model = SCallbackStatusesQuery::create ()->findPk ( ( int ) $statusId );
		
		if ($model === null)
			showMessage ( lang ( 'Such status does not exist', 'admin' ), '404', 'r' );
		
		if (! empty ( $_POST )) {
			$this->form_validation->set_rules ( $model->rules () );
			
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors () );
			} else {
				if (! $_POST ['IsDefault'])
					$_POST ['IsDefault'] = false;
				
				$_POST ['Locale'] = $locale;
				
				$model->fromArray ( $_POST );
				$model->save ();
				
				showMessage ( lang ( 'Changes have been saved', 'admin' ) );
				
				if ($_POST ['action'] == 'close')
					$redirect_url = '/admin/components/run/shop/callbacks/statuses';
				
				if ($_POST ['action'] == 'edit')
					$redirect_url = '/admin/components/run/shop/callbacks/updateStatus/' . $model->getId () . '/' . $locale;
				;
				
				pjax ( $redirect_url );
			}
		} else {
			$model->setLocale ( $locale );
			
			$this->render ( 'edit_status', array (
					'model' => $model,
					'languages' => ShopCore::$ci->cms_admin->get_langs ( true ),
					'locale' => $locale 
			) );
		}
	}
	public function setDefaultStatus() {
		if ($_POST ['id'] && is_numeric ( $_POST ['id'] )) {
			$model = SCallbackStatusesQuery::create ()->findPk ( $_POST ['id'] );
			if ($model) {
				$model->setIsDefault ( true );
				$model->save ();
				showMessage ( lang ( 'Default status was changed', 'admin' ) );
			}
		}
	}
	public function changeStatus() {
		$callbackId = ( int ) $_POST ['CallbackId'];
		$statusId = ( int ) $_POST ['StatusId'];
		
		$model = SCallbacksQuery::create ()->findPk ( $callbackId );
		
		$newStatusId = SCallbackStatusesQuery::create ()->findPk ( ( int ) $statusId );
		if (! empty ( $newStatusId )) {
			if ($model !== null) {
				$model->setStatusId ( $statusId );
				$model->setUserId ( $this->dx_auth->get_user_id () );
				$model->save ();
				
				showMessage ( lang ( 'Callback\'s status was changed', 'admin' ) );
				// pjax($_POST['hash']);
				// echo '<script>$(window.location.hash).addClass("active");</script>';
			}
		}
	}
	public function reorderThemes() {
		if (sizeof ( $_POST ['positions'] ) > 0) {
			foreach ( $_POST ['positions'] as $pos => $id ) {
				SCallbackThemesQuery::create ()->filterById ( $id )->update ( array (
						'Position' => ( int ) $pos 
				) );
			}
			showMessage ( lang ( 'Positions saved successfully', 'admin' ) );
		}
	}
	public function changeTheme() {
		$callbackId = ( int ) $_POST ['CallbackId'];
		$themeId = ( int ) $_POST ['ThemeId'];
		
		$model = SCallbacksQuery::create ()->findPk ( $callbackId );
		
		$newThemeId = SCallbackThemesQuery::create ()->findPk ( ( int ) $themeId );
		if (! empty ( $newThemeId )) {
			if ($model !== null) {
				$model->setThemeId ( $themeId );
				$model->setUserId ( $this->dx_auth->get_user_id () );
				$model->save ();
				
				showMessage ( lang ( 'Callback is changed', 'lang' ) );
				// pjax($_POST['hash']);
				// echo '<script>$(window.location.hash).addClass("active");</script>';
			}
		}
	}
	
	/**
	 * Delete callback
	 *
	 * @return void
	 */
	public function deleteCallback() {
		$id = $_POST ['id'];
		if (is_numeric ( $id )) {
			$model = SCallbacksQuery::create ()->findPk ( $id )->delete ();
			showMessage ( lang ( 'Callback was removed', 'admin' ) );
		}
		
		if (is_array ( $id )) {
			$model = SCallbacksQuery::create ()->findBy ( 'id', $id )->delete ();
			showMessage ( lang ( 'Callbacks was removed', 'admin' ) );
		}
		
		pjax ( '/admin/components/run/shop/callbacks' );
	}
	
	/**
	 * Delete status and related callbacks
	 *
	 * @return void
	 */
	public function deleteStatus() {
		$id = ( int ) $_POST ['id'];
		$model = SCallbackStatusesQuery::create ()->findPk ( $id );
		
		if ($model !== null) {
			if ($model->getIsDefault () == true) {
				showMessage ( lang ( 'Unable to remove default status', 'admin' ), lang ( 'Error', 'admin' ), 'r' );
				exit ();
			}
			SCallbacksQuery::create ()->filterByStatusId ( $model->getId () )->delete ();
			$model->delete ();
			showMessage ( lang ( 'Status was removed', 'admin' ) );
			pjax ( '/admin/components/run/shop/callbacks/statuses' );
		}
	}
	
	/**
	 * Display list of callback themes
	 *
	 * @return void
	 */
	public function themes() {
		$model = SCallbackThemesQuery::create ()->joinWithI18n ( \MY_Controller::defaultLocale (), Criteria::LEFT_JOIN )->orderByPosition ()->find ();
		
		$this->render ( 'themes_list', array (
				'model' => $model,
				'locale' => $this->defaultLanguage ['identif'] 
		) );
	}
	public function createTheme() {
		$model = new SCallbackThemes ();
		
		if (! empty ( $_POST )) {
			$this->form_validation->set_rules ( $model->rules () );
			
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors () );
			} else {
				$locale = array_key_exists ( 'Locale', $_POST ) ? $_POST ['Locale'] : $this->defaultLanguage ['identif'];
				$_POST ['Locale'] = $locale;
				
				$model->fromArray ( $_POST );
				$model->save ();
				
				showMessage ( lang ( 'Topic started', 'admin' ) );
				
				if ($_POST ['action'] == 'close')
					$redirect_url = '/admin/components/run/shop/callbacks/themes';
				
				if ($_POST ['action'] == 'edit')
					$redirect_url = '/admin/components/run/shop/callbacks/updateTheme/' . $model->getId ();
				
				pjax ( $redirect_url );
			}
		} else {
			$this->render ( 'create_theme', array (
					'model' => $model,
					'locale' => $this->defaultLanguage ['identif'] 
			) );
		}
	}
	public function updateTheme($themeId = null, $locale = null) {
		$locale = $locale == null ? $this->defaultLanguage ['identif'] : $locale;
		
		$model = SCallbackThemesQuery::create ()->findPk ( ( int ) $themeId );
		
		if ($model === null)
			$this->error404 ( lang ( 'Error', 'admin' ) );
		
		if (! empty ( $_POST )) {
			$this->form_validation->set_rules ( $model->rules () );
			
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors () );
			} else {
				$_POST ['Locale'] = $locale;
				
				$model->fromArray ( $_POST );
				$model->save ();
				
				showMessage ( lang ( 'Changes have been saved', 'admin' ) );
				
				if ($_POST ['action'] == 'close')
					$redirect_url = '/admin/components/run/shop/callbacks/themes';
				
				if ($_POST ['action'] == 'edit')
					$redirect_url = '/admin/components/run/shop/callbacks/updateTheme/' . $model->getId () . '/' . $locale;
				
				pjax ( $redirect_url );
			}
		} else {
			$model->setLocale ( $locale );
			
			$this->render ( 'edit_theme', array (
					'model' => $model,
					'languages' => ShopCore::$ci->cms_admin->get_langs ( true ),
					'locale' => $locale 
			) );
		}
	}
	
	/**
	 * Delete status and related callbacks
	 *
	 * @return void
	 */
	public function deleteTheme() {
		$id = ( int ) $_POST ['id'];
		$model = SCallbackThemesQuery::create ()->findPk ( $id );
		
		if ($model !== null) {
			SCallbacksQuery::create ()->filterByThemeId ( $model->getId () )->delete ();
			
			$model->delete ();
			
			showMessage ( lang ( 'Topic deleted', 'admin' ) );
			pjax ( '/admin/components/run/shop/callbacks/themes' );
		}
	}
	public function search($offset = 0, $orderField = '', $orderCriteria = '') {
		$model = SCallbacksQuery::create ()->joinSCallbackStatuses ( null, 'left join' )->joinSCallbackThemes ( null, 'left join' );
		
		if ($_GET ['status_id'] != null)
			$model = $model->filterByStatusId ( ( int ) $_GET ['status_id'] );
		
		if ($_GET ['callback_id'])
			$model = $model->filterById ( ( int ) $_GET ['callback_id'] );
		
		if ($_GET ['phone'])
			$model = $model->where ( 'SCallbacks.Phone LIKE "%' . encode ( $_GET ['phone'] ) . '%"' );
		
		if ($_GET ['name'])
			$model = $model->where ( 'SCallbacks.Name LIKE "%' . encode ( $_GET ['name'] ) . '%"' );
		
		if ($_GET ['date'])
			$model = $model->where ( 'FROM_UNIXTIME(SCallbacks.Date, \'%Y-%m-%d\') = ?', $_GET ['date'] );
		
		if ($orderField !== '' && $orderCriteria !== '' && (method_exists ( $model, 'filterBy' . $orderField ) || $orderField == 'SCallbackStatuses.Text' || $orderField == 'SCallbackThemes.Text')) {
			switch ($orderCriteria) {
				case 'ASC' :
					$model = $model->orderBy ( $orderField, Criteria::ASC );
					$nextOrderCriteria = 'DESC';
					break;
				
				case 'DESC' :
					$model = $model->orderBy ( $orderField, Criteria::DESC );
					$nextOrderCriteria = 'ASC';
					break;
			}
		} else
			$model->orderById ( 'desc' );
		
		if (! $_GET ['status'])
			$_GET ['status'] = SCallbackStatusesQuery::create ()->filterByIsDefault ( TRUE )->findOne ()->getId ();
		
		if ($status != null && $status > 0)
			$_GET ['status'] = ( int ) $status;
			
			// Count total orders
		$totalCallbacks = $this->_count ( $model );
		
		$model = $model->limit ( $this->perPage )->offset ( ( int ) $offset )->find ();
		
		$getData = $_GET;
		unset ( $getData ['per_page'] );
		unset ( $getData ['status'] );
		$queryString = '?' . urlencode ( http_build_query ( $getData ) );
		
		$callbackStatuses = SCallbackStatusesQuery::create ()->find ();
		
		// Create pagination
		$this->load->library ( 'pagination' );
		$config ['base_url'] = $this->createUrl ( 'callbacks/search/' );
		$config ['container'] = 'shopAdminPage';
		$config ['uri_segment'] = 7;
		$config ['total_rows'] = $totalCallbacks;
		$config ['per_page'] = $this->perPage;
		// $config['page_query_string'] = TRUE;
		$this->pagination->num_links = 6;
		$config ['suffix'] = ($orderField != '') ? $orderField . '/' . $orderCriteria . $queryString : $queryString;
		$this->pagination->initialize ( $config );
		
		$_GET ['status'] = - 1;
		
		$this->render ( 'list', array (
				'model' => $model,
				'pagination' => $this->pagination->create_links_ajax (),
				'totalCallbacks' => $totalCallbacks,
				'nextOrderCriteria' => $nextOrderCriteria,
				'orderField' => $orderField,
				'callbackStatuses' => $callbackStatuses 
		) );
	}
	
	/**
	 * Count total callbacks in the list
	 *
	 * @param SCallbacksQuery $object        	
	 * @return int
	 */
	protected function _count(SCallbacksQuery $object) {
		$object = clone $object;
		return $object->count ();
	}
}
