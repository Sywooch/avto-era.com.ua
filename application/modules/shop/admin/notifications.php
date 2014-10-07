<?php

/**
 * ShopAdminNotifications
 *
 * @uses ShopController
 * @package
 * @version $id$
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net>
 * @license
 */
class ShopAdminNotifications extends ShopAdminController {
	protected $perPage = 10;
	public function __construct() {
		parent::__construct ();
		
		$this->defaultLanguage = getDefaultLanguage ();
		$this->load->helper ( 'Form' );
		if ($this->db->get_where ( 'components', array (
				'name' => 'comments' 
		) )->row ())
			$this->avalaibleComments = false;
		else
			$this->avalaibleComments = TRUE;
	}
	
	/**
	 * Display notifications list
	 *
	 * @access public
	 */
	public function index($offset = 0, $orderField = '', $orderCriteria = '') {
		$model = SNotificationsQuery::create ()->joinSProductVariants ( null, 'left join' )->joinSProducts ( null, 'left join' );
		
		if ($orderField !== '' && $orderCriteria !== '' && (method_exists ( $model, 'filterBy' . $orderField ) || $orderField == 'SProductVariants.Stock' || $orderField == 'SProducts.Name')) {
			switch ($orderCriteria) {
				case 'ASC' :
					$nextOrderCriteria = 'DESC';
					$model = $model->orderBy ( $orderField, Criteria::ASC );
					break;
				
				case 'DESC' :
					$nextOrderCriteria = 'ASC';
					$model = $model->orderBy ( $orderField, Criteria::DESC );
					break;
			}
		} else {
			$model->orderBy ( 'NotifiedByEmail', Criteria::ASC );
			$model->orderBy ( 'SProductVariants.Stock', Criteria::DESC );
		}
		
		$totalNotifications = $this->_count ( $model );
		
		$model = $model->distinct ()->limit ( $this->perPage )->offset ( ( int ) $offset )->find ();
		
		$notificationStatuses = SNotificationStatusesQuery::create ()->orderByPosition ( Criteria::ASC )->find ();
		
		// Create pagination
		$this->load->library ( 'pagination' );
		$config ['base_url'] = $this->createUrl ( 'notifications/index/' . $_GET ['status'] . '/' );
		$config ['total_rows'] = $totalNotifications;
		$config ['container'] = 'shopAdminPage';
		$config ['uri_segment'] = 7;
		$config ['per_page'] = $this->perPage;
		
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
		
		$this->pagination->num_links = 6;
		$this->pagination->initialize ( $config );
		
		foreach ( $model as $variant ) {
			$quantity = SProductVariantsQuery::create ()->filterById ( $variant->getVariantId () )->findOne ();
			if ($quantity)
				$productsQuaintity [$variant->getVariantId ()] = $quantity->getStock ();
		}
		
		$emails = array ();
		foreach ( $this->db->select ( 'user_email' )->get ( 'shop_notifications' )->result_array () as $mail )
			$emails [] = $mail ['user_email'];
		
		$this->render ( 'list', array (
				'model' => $model,
				'pagination' => $this->pagination->create_links_ajax (),
				'totalNotifications' => $totalNotifications,
				'nextOrderCriteria' => $nextOrderCriteria,
				'orderField' => $orderField,
				'notificationStatuses' => $notificationStatuses,
				'productsQuaintity' => $productsQuaintity,
				'emails' => array_values ( array_unique ( $emails ) ) 
		) );
	}
	
	/**
	 * Edit order info
	 *
	 * @access public
	 */
	public function edit($id) {
		$model = SNotificationsQuery::create ()->findPk ( ( int ) $id );
		
		if ($model === null)
			$this->error404 ( lang ( 'Notification is not found', 'admin' ) );
		$ci = get_instance ();
		$ci->load->model ( 'dx_auth/users', 'users' );
		
		if ($_POST) {
			$model->setStatus ( $_POST ['Status'] );
			$model->setManagerId ( $this->dx_auth->get_user_id () );
			$model->save ();
			// $this->ajaxShopDiv('notifications/index?status='.$_GET['back_to']);
		} else {
			if ($query = $ci->users->get_user_by_id ( $model->getManagerId () ) and $query->num_rows () == 1) {
				$row = $query->row ();
				$managerName = $row->username;
			} else
				$managerName = lang ( 'Manager does not exist or is not set', 'admin' );
			
			$notificationStatuses = SNotificationStatusesQuery::create ()->find ();
			
			$product = SProductsQuery::create ()->findPk ( $model->getProductId () );
			$variant = SProductVariantsQuery::create ()->joinI18n ( 'locale', $this->defaultLanguage ['identif'] )->findPk ( $model->getProductId () );
			$this->render ( 'edit', array (
					'product' => $product,
					'variant' => $variant,
					'notificationStatuses' => $notificationStatuses,
					'model' => $model,
					'managerName' => $managerName 
			) );
		}
		
		if ($_POST) {
			showMessage ( lang ( 'Notification updated', 'admin' ) );
			$action = $_POST ['action'];
			if ($action == 'edit') {
				pjax ( '/admin/components/run/shop/notifications/edit/' . $id );
			} else {
				pjax ( '/admin/components/run/shop/notifications' );
			}
		}
	}
	public function changeStatus($notificationId, $statusId) {
		$model = SNotificationsQuery::create ()->findPk ( $notificationId );
		
		$newStatusId = SNotificationStatusesQuery::create ()->findPk ( ( int ) $statusId );
		if (! empty ( $newStatusId )) {
			if ($model !== null) {
				$model->setStatus ( $statusId );
				$model->setManagerId ( 1 );
				$model->save ();
				
				showMessage ( lang ( 'Notification status updated', 'admin' ) );
			}
		}
		pjax ( '/admin/components/run/shop/notifications' );
	}
	public function notifyByEmail($notificationId) {
		$model = SNotificationsQuery::create ()->findPk ( $notificationId );
		
		if ($model->getNotifiedByEmail () != true) {
			$model->setNotifiedByEmail ( true );
			$model->save ();
		}
		$product = SProductsQuery::create ()->findPk ( $model->getProductId () );
		
		\cmsemail\email::getInstance ()->sendEmail ( $model->getUserEmail (), 'notification_email', array (
				'status' => $model->getSNotificationStatuses ()->getName (),
				'userName' => $model->getUserName (),
				'userEmail' => $model->getUserEmail (),
				'productName' => $product->getName (),
				'productLink' => shop_url ( 'product/' . $product->getUrl () ) 
		) );
		
		showMessage ( lang ( 'User is notified by E-mail', 'admin' ) . '( ' . $model->getUserEmail () . ' )' );
		pjax ( '/admin/components/run/shop/notifications' );
	}
	
	/**
	 * Send email to user.
	 *
	 * @param array $notification        	
	 * @return void
	 */
	protected function _sendMail($info) {
		$replaceData = array (
				'%notificationStatus%' => $info ['notificationStatus'],
				'%userName%' => $info ['userName'],
				'%productLink%' => shop_url ( 'product/' . $info ['productUrl'] ),
				'%dateCreated%' => date ( "d-m-Y H:i:s", $info ['dateCreated'] ),
				'%productName%' => $info ['productName'],
				'%userPhone%' => $info ['userPhone'] 
		);
		
		$replaceData = array_map ( 'encode', $replaceData );
		
		$fromEmail = ShopCore::app ()->SSettings->notificationsSenderEmail;
		$shopName = ShopCore::app ()->SSettings->notificationsSenderName;
		$theme = ShopCore::app ()->SSettings->notificationsMessageTheme;
		$message = str_replace ( array_keys ( $replaceData ), $replaceData, ShopCore::app ()->SSettings->notificationsMessageText );
		
		$this->load->library ( 'email' );
		$config ['mailtype'] = ShopCore::app ()->SSettings->notificationsMessageFormat;
		$this->email->initialize ( $config );
		
		$this->email->from ( $fromEmail, $shopName );
		$this->email->to ( $info ['userEmail'] );
		$this->email->subject ( $theme );
		$this->email->message ( $message );
		$this->email->send ();
	}
	public function deleteAll() {
		if (empty ( $_POST ['ids'] )) {
			showMessage ( lang ( 'No data transmitted', 'admin' ), '', 'r' );
			exit ();
		}
		if (sizeof ( $_POST ['ids'] > 0 )) {
			
			$model = SNotificationsQuery::create ()->findPks ( $_POST ['ids'] );
			
			if (! empty ( $model )) {
				foreach ( $model as $order ) {
					$order->delete ();
				}
				
				showMessage ( lang ( 'Uninstalling', 'admin' ) );
			}
		}
	}
	public function ajaxDeleteNotifications() {
		if (sizeof ( $_POST ['ids'] > 0 )) {
			$model = SNotificationsQuery::create ()->findPks ( $_POST ['ids'] );
			
			if (! empty ( $model )) {
				foreach ( $model as $notification ) {
					$notification->delete ();
				}
			}
		}
	}
	public function ajaxChangeNotificationsStatus($status) {
		if (sizeof ( $_POST ['ids'] > 0 )) {
			$model = SNotificationsQuery::create ()->findPks ( $_POST ['ids'] );
			$newStatusId = SNotificationStatusesQuery::create ()->findPk ( ( int ) $status );
			if (! empty ( $newStatusId )) {
				if (! empty ( $model )) {
					foreach ( $model as $notification ) {
						$notification->setManagerId ( $this->dx_auth->get_user_id () );
						$notification->setStatus ( ( int ) $status );
						$notification->save ();
					}
					showMessage ( lang ( 'Order status changed', 'admin' ) );
				}
			}
		}
	}
	public function search($offset = 0, $orderField = '', $orderCriteria = '') {
		if ($offset == 0 && $this->input->get ( 'per_page' ))
			$offset = $this->input->get ( 'per_page' );
		
		$model = SNotificationsQuery::create ()->joinSProductVariants ( null, 'left join' )->joinSProducts ( null, 'left join' );
		
		if ($_GET ['status_id'] != null)
			$model = $model->filterByStatus ( $_GET ['status_id'] );
		
		if ($_GET ['notification_id'])
			$model = $model->filterById ( $_GET ['notification_id'] );
		
		if ($_GET ['user_email'])
			$model = $model->filterByUserEmail ( $_GET ['user_email'] );
		
		if ($_GET ['user_phone'])
			$model = $model->where ( 'SNotifications.UserPhone LIKE "%' . encode ( $_GET ['user_phone'] ) . '%"' );
		
		if ($_GET ['created'])
			$model = $model->where ( 'FROM_UNIXTIME(SNotifications.DateCreated, \'%Y-%M-%D\') < ?', $_GET ['created'] );
		
		if ($_GET ['actual'])
			$model = $model->where ( 'SNotifications.ActiveTo <= ?', strtotime ( $_GET ['actual'] ) );
			
			// Count total notifications
		$totalNotifications = $this->_count ( $model );
		
		$nextOrderCriteria = '';
		
		if ($orderField !== '' && $orderCriteria !== '' && (method_exists ( $model, 'filterBy' . $orderField ) || $orderField == 'SProductVariants.Stock' || $orderField == 'SProducts.Name')) {
			switch ($orderCriteria) {
				case 'ASC' :
					$nextOrderCriteria = 'DESC';
					$model = $model->orderBy ( $orderField, Criteria::ASC );
					break;
				
				case 'DESC' :
					$nextOrderCriteria = 'ASC';
					$model = $model->orderBy ( $orderField, Criteria::DESC );
					break;
			}
		} else {
			$model->orderBy ( 'NotifiedByEmail', Criteria::ASC );
			$model->orderBy ( 'SProductVariants.Stock', Criteria::DESC );
		}
		
		$model = $model->limit ( $this->perPage )->offset ( ( int ) $offset )->distinct ()->find ();
		
		$getData = $_GET;
		unset ( $getData ['per_page'] );
		$queryString = '?' . urlencode ( http_build_query ( $getData ) );
		
		$notificationStatuses = SNotificationStatusesQuery::create ()->orderByPosition ( Criteria::ASC )->find ();
		
		// Create pagination
		// $this->load->library('pagination');
		// $config['base_url'] = $this->createUrl('notifications/search/');
		// $config['container'] = 'shopAdminPage';
		// $config['uri_segment'] = 7;
		// $config['total_rows'] = $totalNotifications;
		// $config['per_page'] = $this->perPage;
		// //$config['page_query_string'] = TRUE;
		// $this->pagination->num_links = 6;
		// $config['suffix'] = ($orderField != '') ? $orderField . '/' . $orderCriteria . $queryString : $queryString;
		// $this->pagination->initialize($config);
		
		$this->load->library ( 'pagination' );
		$config ['base_url'] = $this->createUrl ( 'notifications/search/?' . $this->input->server ( 'QUERY_STRING' ) );
		$config ['total_rows'] = $totalNotifications;
		$config ['container'] = 'shopAdminPage';
		$config ['uri_segment'] = 7;
		$config ['per_page'] = $this->perPage;
		
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
		
		$config ['page_query_string'] = TRUE;
		$this->pagination->num_links = 6;
		$this->pagination->initialize ( $config );
		
		foreach ( $model as $variant ) {
			$quantity = SProductVariantsQuery::create ()->filterById ( $variant->getVariantId () )->findOne ();
			if ($quantity)
				$productsQuaintity [$variant->getVariantId ()] = $quantity->getStock ();
		}
		
		$emails = array ();
		foreach ( $this->db->select ( 'user_email' )->get ( 'shop_notifications' )->result_array () as $mail )
			$emails [] = $mail ['user_email'];
		
		$_GET ['status'] = - 1;
		$this->render ( 'list', array (
				'model' => $model,
				'pagination' => $this->pagination->create_links_ajax (),
				'totalNotifications' => $totalNotifications,
				'nextOrderCriteria' => $nextOrderCriteria,
				'orderField' => $orderField,
				'queryString' => $queryString,
				'notificationStatuses' => $notificationStatuses,
				'productsQuaintity' => $productsQuaintity,
				'emails' => array_values ( array_unique ( $emails ) ) 
		)
		// 'qstr' =>
		 );
	}
	
	/**
	 * Count total notifications in the list
	 *
	 * @param SNotificationsQuery $object        	
	 * @return int
	 */
	protected function _count(SNotificationsQuery $object) {
		$object = clone $object;
		return $object->count ();
	}
	public function getAvailableNotification() {
		$totalNewNotifications = $this->_count ( SNotificationsQuery::create ()->joinSProductVariants ( null, 'left join' )->filterByStatus ( 1 )->where ( 'SNotifications.ActiveTo > ?', strtotime ( 'today' ) )->filterByNotifiedByEmail ( FALSE )->where ( 'SProductVariants.Stock > ?', 0 ) );
		
		$totalNewOrders = SOrdersQuery::create ()->filterByStatus ( 1 )->count ();
		
		$totalNewCallbacks = SCallbacksQuery::create ()->filterByStatusId ( SCallbackStatusesQuery::create ()->filterByIsDefault ( TRUE )->findOne ()->getId () )->count ();
		
		// TODO: optimize this fucking query
		$toralProductsWithoutImage = count ( $this->db->where ( "mainImage", null )->or_where ( 'mainImage', '' )->
		// ->or_where('not mainImage')
		group_by ( 'product_id' )->get ( 'shop_product_variants' )->result () );
		
		if (! $this->avalaibleComments)
			$totalNewComments = count ( $this->db->where ( 'status', 1 )->get ( 'comments' )->result_array () );
		
		$this->render ( 'topBlock', array (
				'totalNewOrders' => $totalNewOrders,
				'totalNewNotifications' => $totalNewNotifications,
				'totalNewCallbacks' => $totalNewCallbacks,
				'toralProductsWithoutImage' => $toralProductsWithoutImage,
				'totalNewComments' => $totalNewComments 
		) );
	}
}
