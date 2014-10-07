<?php

/**
 * ShopAdminOrders
 *
 * @uses ShopController
 * @package
 * @version $id$
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net>
 * @license
 */
class ShopAdminOrders extends ShopAdminController {
	protected $perPage = 12;
	public $defaultLanguage = null;
	public function __construct() {
		parent::__construct ();
		
		$this->load->helper ( 'Form' );
		include (SHOP_DIR . 'classes/pdf/tcpdf.php');
		$this->defaultLanguage = getDefaultLanguage ();
	}
	public function index() {
		$offset = 0;
		$oldest_date_created = $this->db->query ( "SELECT MIN(date_created) AS oldest_date, MAX(date_created) AS newest_date FROM `shop_orders`" );
		if ($oldest_date_created)
			$oldest_date_created = $oldest_date_created->row ();
		
		$model = SOrdersQuery::create ()->addSelectModifier ( 'SQL_CALC_FOUND_ROWS' );
		
		unset ( $pids );
		
		if (is_numeric ( $_GET ['status_id'] ) && ($_GET ['status_id'] != '-- none --'))
			$model = $model->filterByStatus ( $_GET ['status_id'] );
		
		if ($_GET ['order_id'])
			$model = $model->where ( 'SOrders.Id = ?', $_GET ['order_id'] );
		
		if ($_GET ['created_from'])
			$model = $model->where ( 'FROM_UNIXTIME(SOrders.DateCreated, \'%Y-%m-%d\') >= ?', date ( 'Y-m-d', strtotime ( $_GET ['created_from'] ) ) );
		
		if ($_GET ['created_to'])
			$model = $model->where ( 'FROM_UNIXTIME(SOrders.DateCreated, \'%Y-%m-%d\') <= ?', date ( 'Y-m-d', strtotime ( $_GET ['created_to'] ) ) );
		
		if ($_GET ['product_id'])
			$model = $model->leftJoinSOrderProducts ()->where ( 'SOrderProducts.ProductId = ?', $_GET ['product_id'] );
			
			// $cvcv = array('SOrders.UserFullName LIKE ?' => '%' . $_GET['customer'] . '%', 'SOrders.UserEmail LIKE ?' => '%' . $_GET['customer'] . '%', 'SOrders.UserPhone LIKE ?'=> '%'.$_GET['customer'].'%');
		if ($_GET ['customer'])
			$model = $model->_and ()->where ( 'SOrders.UserFullName LIKE ?', '%' . $_GET ['customer'] . '%' )->_or ()->where ( 'SOrders.UserEmail LIKE ?', '%' . $_GET ['customer'] . '%' )->_or ()->where ( 'SOrders.UserPhone LIKE ?', '%' . $_GET ['customer'] . '%' );
		
		if ($_GET ['amount_from'])
			$model = $model->where ( 'SOrders.TotalPrice >= ?', $_GET ['amount_from'] );
		
		if ($_GET ['amount_to'])
			$model = $model->where ( 'SOrders.TotalPrice <= ?', $_GET ['amount_to'] );
		
		if ($_GET ['paid'] != '-- none --')
			if ($_GET ['paid'] === "0")
				$model = $model->where ( 'SOrders.Paid IS NULL' )->orWhere ( 'SOrders.Paid = 0' );
			else if ($_GET ['paid'] === "1")
				$model = $model->filterByPaid ( true );
			
			// Count total orders
		if (($_GET ['orderMethod'] != '' && $_GET ['orderCriteria'] != '' && method_exists ( $model, 'filterBy' . $_GET ['orderMethod'] )) or $_GET ['orderMethod'] == 'Id') {
			switch ($_GET ['orderCriteria']) {
				case 'ASC' :
					$nextOrderCriteria = 'DESC';
					$nOArr = '&darr;';
					$model = $model->orderBy ( $_GET ['orderMethod'], Criteria::ASC );
					break;
				
				case 'DESC' :
					$nextOrderCriteria = 'ASC';
					$nOArr = '&uarr;';
					$model = $model->orderBy ( $_GET ['orderMethod'], Criteria::DESC );
					break;
			}
		} else
			$model->orderById ( 'DESC' );
		
		$this->perPage = $this->paginationVariant ( $_SESSION ['pagination'] );
		
		$model = $model->limit ( $this->perPage )->offset ( ( int ) $_GET ['per_page'] )->distinct ()->find ();
		
		$totalOrders = $this->getTotalRow ();
		
		$usersDatas = array ();
		$productDatas = array ();
		$pids = array ();
		foreach ( $model as $o ) {
			$usersDatas [] = $o->getUserFullName ();
			$usersDatas [] = $o->getUserEmail ();
			$usersDatas [] = $o->getUserPhone ();
			
			if ($o->getSOrderProductss ())
				foreach ( $o->getSOrderProductss () as $p )
					if (is_object ( $p )) {
						if (! in_array ( $p->getProductId (), $pids ))
							;
						{
							$pids [] = $p->getProductId ();
							$productDatas [] = array (
									'v' => $p->getProductId (),
									'label' => $p->getProductName () 
							);
						}
					}
		}
		
		$getData = $_GET;
		unset ( $getData ['per_page'] );
		$queryString = '?' . http_build_query ( $getData );
		
		$orderStatuses = SOrderStatusesQuery::create ()->orderByPosition ( Criteria::ASC )->find ();
		
		$this->load->library ( 'Pagination' );
		$config ['base_url'] = site_url ( 'admin/components/run/shop/orders/index/?' ) . http_build_query ( $_GET );
		
		$config ['container'] = 'shopAdminPage';
		$config ['uri_segment'] = $this->uri->total_segments ();
		$config ['page_query_string'] = true;
		$config ['total_rows'] = $totalOrders;
		$config ['per_page'] = $this->perPage;
		
		$config ['separate_controls'] = true;
		$config ['full_tag_open'] = '<div class="pagination pull-left"><ul>';
		$config ['full_tag_close'] = '</ul></div>';
		$config ['controls_tag_open'] = '<div class="pagination pull-right"><ul>';
		$config ['controls_tag_close'] = '</ul></div>';
		$config ['next_link'] = lang ( 'Forward&nbsp;', 'admin' );
		$config ['prev_link'] = lang ( '&nbsp;Back', 'admin' );
		;
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
		
		$this->pagination->num_links = 5;
		$this->pagination->initialize ( $config );
		$this->template->assign ( 'pagination', $this->pagination->create_links_ajax () );
		
		$_GET ['status'] = - 1;
		$this->render ( 'list', array (
				'oldest_order_date' => $oldest_date_created,
				'model' => $model,
				'totalOrders' => $totalOrders,
				'perPage' => $this->perPage,
				'nextOrderCriteria' => $nextOrderCriteria,
				'orderField' => $orderField,
				'paginationVariant' => $this->paginationVariant ( $_SESSION ['pagination'] ),
				'queryString' => $queryString,
				'deliveryMethods' => SDeliveryMethodsQuery::create ()->find (),
				'paymentMethods' => SPaymentMethodsQuery::create ()->find (),
				'orderStatuses' => $orderStatuses,
				'usersDatas' => $usersDatas,
				'productsDatas' => $productDatas,
				'offset' => $offset 
		) );
	}
	public function paginationVariant($int = FALSE, $ref = FALSE) {
		if ($int == FALSE or $int == NULL) {
			$_SESSION ['pagination'] = 12;
		} else {
			$_SESSION ['pagination'] = $int;
		}
		
		if ($ref == TRUE)
			pjax ( '/admin/components/run/shop/orders' );
		
		return $_SESSION ['pagination'];
	}
	
	/**
	 * Edit order info
	 *
	 * @access public
	 */
	public function edit($id) {
		$model = SOrdersQuery::create ()->findPk ( ( int ) $id );
		$price_total = $model->getTotalPrice ();
		
		$criteriaPaid = $model->getPaid ();
		
		if ($model === null)
			$this->error404 ( lang ( 'Order not found', 'admin' ) );
			
			// in this case products count will be recounted
		
		if ($this->input->post ( 'Paid' ) && ! $model->getPaid ()) {
			session_start ();
			$_SESSION ['recount'] = true;
		}
		
		$statusHistory = SOrderStatusHistoryQuery::create ()->filterByOrderId ( ( int ) $id )->find ();
		
		$usersName = array ();
		$ci = get_instance ();
		$ci->load->model ( 'dx_auth/users', 'users' );
		foreach ( $statusHistory as $status ) {
			if ($query = $ci->users->get_user_by_id ( $status->getUserId () ) and $query->num_rows () == 1) {
				$row = $query->row ();
				$usersName [$status->getId ()] = $row->username;
			}
		}
		
		$oldStatusId = SOrdersQuery::create ()->filterById ( $id )->findOne ()->getStatus ();
		if ($_POST) {
			
			$_POST ['Paid'] = ( bool ) $_POST ['Paid'];
			
			$_POST ['StatusId'] = $this->input->post ( 'Status' );
			
			$validation = $this->form_validation->set_rules ( 'UserEmail' );
			$validation = $model->validateCustomData ( $validation );
			if ($validation->run ()) {
				$model->fromArray ( $_POST );
				
				// Check if delivery method exists.
				$deliveryMethod = SDeliveryMethodsQuery::create ()->findPk ( ( int ) $_POST [shop_orders] ['delivery_method'] );
				if ($deliveryMethod === null) {
					$deliveryMethod = 0;
					$deliveryPrice = 0;
				} else {
					$deliveryPrice = $deliveryMethod->getPrice ();
					$deliveryMethod = $deliveryMethod->getId ();
				}
				
				// Check if payment method exists.
				$paymentMethod = SPaymentMethodsQuery::create ()->findPk ( ( int ) $_POST [shop_orders] ['payment_method'] );
				
				if ($paymentMethod === null) {
					$paymentMethod = 0;
				} else {
					$paymentMethod = $paymentMethod->getId ();
				}
				
				$model->setDeliveryMethod ( $deliveryMethod );
				$model->setDeliveryPrice ( $deliveryPrice );
				$model->setPaymentMethod ( $paymentMethod );
				
				$model->save ();
				
				if ($model->getUserId ()) {
					$ordersesQuery = $this->db->query ( 'SELECT amout FROM users WHERE id = ' . $model->getUserId () );
					$orderses = $ordersesQuery->row_array ();
					
					// var_dump($_POST['Paid']);
					if ($_POST ['Paid'] && ( int ) $criteriaPaid != ( int ) $_POST ['Paid']) {
						$summAdd = ( float ) $orderses ['amout'] + ( float ) $price_total;
					} elseif (! $_POST ['Paid'] && ( int ) $criteriaPaid != ( int ) $_POST ['Paid']) {
						$summAdd = ( float ) $orderses ['amout'] - ( float ) $price_total;
					} else {
						$summAdd = ( float ) $orderses ['amout'];
					}
					
					$this->db->query ( "update users set amout = '" . $summAdd . "' where id = " . $model->getUserId () );
				}
				
				if ($oldStatusId != ( int ) $_POST ['Status']) {
					$modelOrder = new SOrderStatusHistory ();
					$this->form_validation->set_rules ( $modelOrder->rules () );
					
					if ($this->form_validation->run ( $this ) == FALSE) {
						showMessage ( validation_errors (), '', 'r' );
					} else {
						$modelOrder->setOrderId ( $id )->setStatusId ( $_POST ['Status'] )->setUserId ( $this->dx_auth->get_user_id () )->setDateCreated ( time () )->setComment ( $_POST ['Comment'] );
						
						$modelOrder->save ();
						if ($_POST ['Notify']) {
							\cmsemail\email::getInstance ()->sendEmail ( $model->getUserEmail (), 'change_order_status', array (
									'status' => $modelOrder->getSOrderStatuses ()->getName (),
									'userName' => $model->getUserFullName (),
									'userEmail' => $model->getUserEmail (),
									'orderLink' => shop_url ( 'cart/view/' . $model->getKey () ) 
							) );
						}
						showMessage ( lang ( 'Order status changed', 'admin' ) );
					}
				}
				
				showMessage ( lang ( 'Changes saved', 'admin' ) );
				
				if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'edit') {
					pjax ( '/admin/components/run/shop/orders/edit/' . $model->getId () );
				} else
					pjax ( '/admin/components/run/shop/orders/' );
			} else
				showMessage ( validation_errors (), '', 'r' );
		} else {
			$criteria = SOrderProductsQuery::create ()->orderById ( Criteria::ASC );
			foreach ( $model->getSOrderProductss ( $criteria ) as $sOrderProduct ) {
				if ($sOrderProduct->getKitId () > 0) {
					if (! isset ( $kits [$sOrderProduct->getKitId ()] ['total'] ))
						$kits [$sOrderProduct->getKitId ()] ['total'] = 0;
					
					if (! isset ( $kits [$sOrderProduct->getKitId ()] ['price'] ))
						$kits [$sOrderProduct->getKitId ()] ['price'] = 0;
					
					$kits [$sOrderProduct->getKitId ()] ['total'] ++;
					$kits [$sOrderProduct->getKitId ()] ['price'] = $kits [$sOrderProduct->getKitId ()] ['price'] + $sOrderProduct->toCurrency ();
				}
			}
			
			foreach ( $model->getSOrderProductss () as $key => $number ) {
				// $products = SProductVariantsQuery::create()->filterById($number->getProductId())->find();
				$products = SProductVariantsQuery::create ()->filterById ( $number->getVariantId () )->find ();
				if ($products [0]) {
					$number->setVirtualColumn ( 'number', $products [0]->getNumber () );
				}
			}
			if ($model->getDeliveryMethod () != 0)
				$freeFrom = SDeliveryMethodsQuery::create ()->findPk ( $model->getDeliveryMethod () )->getFreeFrom ();
			else
				$freeFrom = 0;
			
			$this->render ( 'edit', array (
					'model' => $model,
					'freeFrom' => $freeFrom,
					'kits' => $kits,
					'deliveryMethods' => SDeliveryMethodsQuery::create ()->useI18nQuery ( $this->defaultLanguage ['identif'] )->orderByName ( Criteria::ASC )->endUse ()->find (),
					'paymentMethods' => SPaymentMethodsQuery::create ()->useI18nQuery ( $this->defaultLanguage ['identif'] )->orderByName ( Criteria::ASC )->endUse ()->find (),
					'statusHistory' => $statusHistory,
					'usersName' => $usersName 
			) );
		}
	}
	
	/**
	 * Send email to user.
	 *
	 * @param array $wish        	
	 * @return void
	 */
	public function recount_amount($user_id = null) {
		$this->db->select ( 'total_price' );
		$this->db->where ( 'user_id', $user_id );
		$res = $this->db->get ( 'shop_orders' )->result_array ();
		$sum = 0;
		foreach ( $res as $value ) {
			$sum += $value ['total_price'];
		}
		return $sum;
	}
	public function changeStatus() {
		$orderId = ( int ) $_POST ['OrderId'];
		$statusId = ( int ) $_POST ['StatusId'];
		
		$model = SOrdersQuery::create ()->findPk ( $orderId );
		
		$newStatusId = SOrderStatusesQuery::create ()->findPk ( ( int ) $statusId );
		if (! empty ( $newStatusId )) {
			if ($model !== null) {
				$model->setStatus ( $statusId );
				
				$model->save ();
				
				if (! empty ( $_POST )) {
					$model = new SOrderStatusHistory ();
					$this->form_validation->set_rules ( $model->rules () );
					
					if ($this->form_validation->run ( $this ) == FALSE) {
						showMessage ( validation_errors () );
					} else {
						$model->setOrderId ( $orderId )->setStatusId ( $statusId )->setUserId ( $this->dx_auth->get_user_id () )->setDateCreated ( time () )->setComment ( $_POST ['Comment'] );
						
						$model->save ();
						
						showMessage ( lang ( 'Order Status changed', 'admin' ) );
					}
				}
			}
		}
	}
	public function changePaid() {
		$orderId = ( int ) $_POST ['orderId'];
		
		$model = SOrdersQuery::create ()->findPk ( $orderId );
		
		if ($model !== null) {
			if ($model->getPaid () == true)
				$model->setPaid ( false );
			else
				$model->setPaid ( true );
			
			$model->save ();
			echo ( int ) $model->getPaid ();
			
			$ordersesQuery = $this->db->query ( 'SELECT amout FROM shop_user_profile WHERE user_id = ' . $model->getUserId () );
			$orderses = $ordersesQuery->row ();
			
			if ($model->getPaid () == 1) {
				
				$summAdd = $orderses->amout + $model->getTotalPrice () - ShopCore::app ()->SCurrencyHelper->convert ( $model->getDiscount () );
			} else {
				
				$summAdd = $orderses->amout - ($model->getTotalPrice () - ShopCore::app ()->SCurrencyHelper->convert ( $model->getDiscount () ));
			}
			
			$data = array (
					'amout' => $summAdd 
			);
			
			$this->db->where ( 'user_id', $model->getUserId () );
			$this->db->update ( 'shop_user_profile', $data );
		}
	}
	public function delete() {
		$model = SOrdersQuery::create ()->findPk ( ( int ) $_POST ['orderId'] );
		
		if ($model) {
			$model->delete ();
		}
	}
	public function ajaxDeleteOrders() {
		if (sizeof ( $_POST ['ids'] > 0 )) {
			$model = SOrdersQuery::create ()->findPks ( $_POST ['ids'] );
			
			if (! empty ( $model )) {
				foreach ( $model as $order ) {
					$order->delete ();
					$amount_total = $this->recount_amount ( $order->getUserId () );
					$data = array (
							'amout' => $amount_total 
					);
					$this->db->where ( 'id', $order->getUserId () );
					$this->db->update ( 'users', $data );
				}
				showMessage ( lang ( 'Orders are removed', 'admin' ), lang ( 'The operation was successful', 'admin' ) );
			}
		}
	}
	public function ajaxChangeOrdersStatus($status) {
		if (sizeof ( $_POST ['ids'] > 0 )) {
			$model = SOrdersQuery::create ()->findPks ( $_POST ['ids'] );
			$newStatusId = SOrderStatusesQuery::create ()->findPk ( ( int ) $status );
			
			$statusEmail = SOrderStatusesI18nQuery::create ()->filterById ( $status )->findOne ();
			
			if (! empty ( $newStatusId )) {
				if (! empty ( $model )) {
					foreach ( $model as $order ) {
						$order->setStatus ( ( int ) $status );
						$order->save ();
						
						$modelOrderStatusHistory = new SOrderStatusHistory ();
						$modelOrderStatusHistory->setOrderId ( $order->getId () )->setStatusId ( $status )->setUserId ( $this->dx_auth->get_user_id () )->setDateCreated ( time () );
						
						$modelOrderStatusHistory->save ();
						
						if (ShopCore::app ()->SSettings->notifyOrderStatusStatusEmail == 1) {
							\cmsemail\email::getInstance ()->sendEmail ( $order->getUserEmail (), 'change_order_status', array (
									'status' => $statusEmail->getName (),
									'userName' => $order->getUserFullName (),
									'userEmail' => $order->getUserEmail (),
									'orderLink' => shop_url ( 'cart/view/' . $order->getKey () ) 
							) );
						}
					}
					
					showMessage ( lang ( 'Order Status changed', 'admin' ), lang ( 'The operation was successful', 'admin' ) );
				}
			}
		}
	}
	public function ajaxChangeOrdersPaid($paid) {
		if (sizeof ( $_POST ['ids'] > 0 )) {
			$model = SOrdersQuery::create ()->findPks ( $_POST ['ids'] );
			if (! empty ( $model )) {
				foreach ( $model as $order ) {
					
					$order->setPaid ( $paid );
					$order->save ();
					if ($order->getUserId ()) {
						$ordersesQuery = $this->db->query ( 'SELECT amout FROM users WHERE id = ' . $order->getUserId () );
						$orderses = $ordersesQuery->row ();
						
						if ($order->getPaid () == 1) {
							
							$summAdd = $orderses->amout + $order->getTotalPrice ();
						} else {
							
							$summAdd = $orderses->amout - $order->getTotalPrice ();
						}
						
						$data = array (
								'amout' => $summAdd 
						);
						
						$this->db->where ( 'id', $order->getUserId () );
						$this->db->update ( 'users', $data );
					}
				}
				
				showMessage ( lang ( 'Payment status of orders changed', 'admin' ), lang ( 'Saved', 'admin' ) );
			}
		}
	}
	public function ajaxEditWindow($Id) {
		$orderedProduct = SOrderProductsQuery::create ()->filterById ( ( int ) $Id )->findOne ();
		$this->render ( '_editWindow', array (
				'product' => SProductsQuery::create ()->filterById ( $orderedProduct->getProductId () )->findOne (),
				'orderedProduct' => $orderedProduct 
		) );
	}
	public function editKit($orderId, $kitId) {
		$model = SOrdersQuery::create ()->findPk ( ( int ) $orderId );
		
		if ($_POST) {
		} else {
			if ($model) {
				$criteria = SOrderProductsQuery::create ()->filterByKitId ( ( int ) $kitId );
				$sOrderProducts = $model->getSOrderProductss ( $criteria );
			}
			
			$this->render ( 'editKitWindow', array (
					'sOrderProducts' => $sOrderProducts,
					'orderId' => $orderId,
					'kitId' => $kitId 
			) );
		}
	}
	public function ajaxEditAddToCartWindow($orderId) {
		$this->render ( '_editAddToCartWindow', array (
				'order' => SOrdersQuery::create ()->filterById ( $orderId )->findOne () 
		) );
	}
	public function ajaxDeleteProduct($Id) {
		$orderedProduct = SOrderProductsQuery::create ()->filterById ( ( int ) $Id )->findOne ();
		if ($orderedProduct == Null)
			return;
			
			// check if it's not a last product in order
		$countProducts = $this->db->select ( "*, IF (kit_id IS NOT NULL, kit_id, id) AS forgroup", false )->where ( 'order_id', $orderedProduct->getOrderId () )->group_by ( 'forgroup' )->get ( 'shop_orders_products' )->num_rows ();
		
		if ($countProducts <= 1) {
			showMessage ( lang ( 'You can not delete the last item from the order', 'admin' ) );
			return;
		}
		
		if ($orderedProduct->getKitId () != Null) {
			$kitProducts = SOrderProductsQuery::create ()->filterByKitId ( $orderedProduct->getKitId () )->filterByOrderId ( $orderedProduct->getOrderId () )->find ();
			$kitProducts->delete ();
			
			$oId = $orderedProduct->getOrderId ();
			$order = SOrdersQuery::create ()->findPk ( $oId );
			
			$order->updateTotalPrice ();
			$order->save ();
			$order->updateDeliveryPrice ();
			$order->save ();
			
			showMessage ( lang ( 'Product is removed from the Order', 'admin' ) );
			pjax ( '/admin/components/run/shop/orders/edit/' . $order->getId () . '#productsInCart' );
			return;
		}
		if ($orderedProduct != null) {
			$oId = $orderedProduct->getOrderId ();
			$orderedProduct->delete ();
			
			$order = SOrdersQuery::create ()->findPk ( $oId );
			
			$order->updateTotalPrice ();
			$order->save ();
			$order->updateDeliveryPrice ();
			$order->save ();
			
			showMessage ( lang ( 'Product is removed from the Order', 'admin' ) );
			pjax ( '/admin/components/run/shop/orders/edit/' . $order->getId () . '#productsInCart' );
		}
	}
	public function ajaxGetProductList($type = NULL) {
		$products = new SProductsQuery ();
		
		if (! empty ( $_GET ['term'] )) {
			$text = $_GET ['term'];
			if (! strpos ( $text, '%' ))
				$text = '%' . $text . '%';
			if ($type != 'number') {
				$products = $products->filterById ( $_GET ['term'] )->_or ()->useI18nQuery ( MY_Controller::getCurrentLocale () )->filterByName ( '%' . $_GET ['term'] . '%' )->endUse ()->_or ()->useProductVariantQuery ()->filterByNumber ( '%' . $_GET ['term'] . '%' )->endUse ();
			} else {
				$products = $products->useProductVariantQuery ()->filterByNumber ( '%' . $_GET ['term'] . '%' )->endUse ();
			}
		}
		
		$products = $products->limit ( ( int ) $_GET ['limit'] )->distinct ()->find ();
		
		$variants = SProductVariantsQuery::create ()->filterBySProducts ( $products )->orderById ( Criteria::DESC )->find ();
		
		foreach ( $variants as $variant ) {
			$pVariants [$variant->getProductId ()] [$variant->getId ()] ['name'] = ShopCore::encode ( $variant->getName () );
			$pVariants [$variant->getProductId ()] [$variant->getId ()] ['price'] = $variant->getPrice ();
			$pVariants [$variant->getProductId ()] [$variant->getId ()] ['number'] = $variant->getNumber ();
		}
		
		foreach ( $products as $key => $product ) {
			if ($type != NULL and count ( $product ) > 0) {
				$numbers = SProductVariantsQuery::create ()->joinI18n ()->filterByProductId ( $product->getId () )->find ();
				$product->setVirtualColumn ( 'number', $numbers [$key]->getNumber () );
				$product->setVirtualColumn ( 'nameVariant', $numbers [$key]->getName () );
			}
			$response [] = array (
					'number' => ($type != NULL and count ( $product ) > 0) ? ShopCore::encode ( $product->getNameVariant () ) : ' - ',
					'label' => ($type != NULL and count ( $product ) > 0) ? ShopCore::encode ( '(' . $product->getNumber () . ') ' . $product->getNameVariant () ) : ShopCore::encode ( $product->getName () ),
					'name' => ShopCore::encode ( $product->getName () ),
					'id' => $product->getId (),
					'value' => $product->getId (),
					'category' => $product->getCategoryId (),
					'variants' => $pVariants [$product->getId ()],
					'cs' => ShopCore::app ()->SCurrencyHelper->getSymbol () 
			);
		}
		
		echo json_encode ( $response );
	}
	public function ajaxEditOrderCartNew($Id) {
		$new_quan = $this->input->post ( 'newQuantity' );
		$new_price = $this->input->post ( 'newPrice' );
		// var_dumps($new_quan);
		if (( int ) $new_quan >= 100000000) {
			showMessage ( lang ( 'Very high price, please set smaller', 'admin' ), lang ( 'Error', 'admin' ), 'r' );
			return FALSE;
		}
		
		$orderproduct = SOrderProductsQuery::create ()->findPk ( $Id );
		
		if ($new_quan) {
			if ($kitId = $orderproduct->getKitId ()) {
				$orderproducts = SOrderProductsQuery::create ()->filterByKitId ( $kitId )->filterByOrderId ( $orderproduct->getOrderId () )->find ();
				
				foreach ( $orderproducts as $product ) {
					$price_old_total = $product->getPrice () * $product->getQuantity ();
					$product->setQuantity ( $new_quan );
					$product->save ();
					
					$diff += $product->getPrice () * $product->getQuantity () - $price_old_total;
				}
			} else {
				
				$price_old_total = $orderproduct->getPrice () * $orderproduct->getQuantity ();
				$orderproduct->setQuantity ( $new_quan );
				$orderproduct->save ();
				
				$diff = $orderproduct->getPrice () * $orderproduct->getQuantity () - $price_old_total;
			}
		} else {
			if (! $orderproduct->getKitId ()) {
				
				$price_old_total = $orderproduct->getPrice () * $orderproduct->getQuantity ();
				$orderproduct->setPrice ( $new_price );
				$orderproduct->save ();
				
				$diff = $orderproduct->getPrice () * $orderproduct->getQuantity () - $price_old_total;
			}
		}
		$this->db->query ( "update shop_orders set total_price = total_price + '$diff' where id = '" . $orderproduct->getOrderId () . "'" );
		
		pjax ( '' );
	}
	public function ajaxEditOrderCart($Id) {
		$order = SOrderProductsQuery::create ()->filterById ( ( int ) $Id )->findOne ();
		
		// if it's product from kit
		if ($order->getKitId () != Null) {
			$orderKit = SOrderProductsQuery::create ()->filterByOrderId ( $order->getOrderId () )->filterByKitId ( $order->getKitId () )->find ();
			if ($this->input->post ( 'newQuantity' ))
				foreach ( $orderKit as $item ) {
					$item->setQuantity ( ( int ) $this->input->post ( 'newQuantity' ) );
					$item->save ();
				}
			$order = SOrdersQuery::create ()->findPk ( $order->getOrderId () );
			$order->updateTotalPrice ();
			pjax ( '' );
			return;
		}
		
		$product = SProductsQuery::create ()->filterById ( ( int ) $_POST ['newProductId'] )->findOne ();
		$variant = SProductVariantsQuery::create ()->filterByProductId ( ( int ) $_POST ['newProductId'] )->filterById ( ( int ) $_POST ['newVariantId'] )->findOne ();
		if ($order === null) {
			return;
		} elseif ($product === null || $variant === null) {
			if ($this->input->post ( 'newQuantity' ))
				$order->setQuantity ( ( int ) $_POST ['newQuantity'] );
			if ($this->input->post ( 'newPrice' ))
				$order->setPrice ( $this->input->post ( 'newPrice' ) );
			$order->save ();
			showMessage ( lang ( 'Product updated', 'admin' ) );
		} else {
			if (( int ) $_POST ['newProductId'] != $order->getProductId ()) {
				$order->setProductId ( ( int ) $_POST ['newProductId'] );
				$order->setVariantId ( ( int ) $_POST ['newVariantId'] );
				$order->setProductName ( $product->getName () );
				$order->setVariantName ( $variant->getName () );
				$order->setPrice ( $variant->getPrice () );
				$order->setQuantity ( ( int ) $_POST ['newQuantity'] );
			} else {
				if (( int ) $_POST ['newVariantId'] != $order->getVariantId () && $_POST ['SavePrice'] [0] != 'yes') {
					$order->setVariantId ( ( int ) $_POST ['newVariantId'] );
					$order->setVariantName ( $variant->getName () );
					$order->setPrice ( $variant->getPrice () );
				} else {
					if ($_POST ['SavePrice'] [0] != 'yes') {
						$order->setPrice ( $variant->getPrice () );
					}
					;
				}
				if (( int ) $_POST ['newQuantity'] != $order->getQuantity ()) {
					if (( int ) $_POST ['newQuantity'] < 1)
						$_POST ['newQuantity'] = 1;
					$order->setQuantity ( ( int ) $_POST ['newQuantity'] );
				}
			}
			$order->save ();
			
			showMessage ( lang ( 'Product updated', 'admin' ) );
		}
		$order = SOrdersQuery::create ()->findPk ( $order->getOrderId () );
		$order->updateTotalPrice ();
		$order->save ();
		$order->updateDeliveryPrice ();
		$order->save ();
		
		pjax ( '' );
	}
	public function ajaxEditOrderAddToCart($orderId) {
		$productId = ( int ) $_POST ['newProductId'];
		$variantId = ( int ) $_POST ['newVariantId'];
		$quantity = ( int ) $_POST ['newQuantity'];
		
		$order = SOrdersQuery::create ()->filterById ( ( int ) $orderId )->findOne ();
		if ($order != null) {
			$product = SProductsQuery::create ()->filterById ( $productId )->findOne ();
			
			$variant = SProductVariantsQuery::create ()->filterById ( $variantId )->findOne ();
			if ($product != NULL && $variant != NULL) {
				if ($quantity < 1)
					$quantity = 1;
				
				$orderP = new SOrderProducts ();
				$orderP->setOrderId ( ( int ) $orderId )->setProductId ( $product->getId () )->setVariantId ( $variant->getId () )->setProductName ( $product->getName () )->setVariantName ( $variant->getName () )->setPrice ( $variant->getPrice () )->setQuantity ( $quantity )->save ();
				
				$order->updateTotalPrice ();
				$order->save ();
				$order->updateDeliveryPrice ();
				$order->save ();
				
				showMessage ( lang ( 'Item has been added to the order', 'admin' ) );
				pjax ( '/admin/components/run/shop/orders/edit/' . $order->getId () . '#productsInCart' );
			} else
				showMessage ( lang ( 'This product does not exist', 'admin' ) );
		}
	}
	public function ajaxGetOrderCart($orderId) {
		$criteria = SOrderProductsQuery::create ()->orderById ( Criteria::ASC );
		$model = SOrdersQuery::create ()->findPk ( ( int ) $orderId );
		foreach ( $model->getSOrderProductss ( $criteria ) as $sOrderProduct ) {
			if ($sOrderProduct->getKitId () > 0) {
				if (! isset ( $kits [$sOrderProduct->getKitId ()] ['total'] ))
					$kits [$sOrderProduct->getKitId ()] ['total'] = 0;
				
				if (! isset ( $kits [$sOrderProduct->getKitId ()] ['price'] ))
					$kits [$sOrderProduct->getKitId ()] ['price'] = 0;
				
				$kits [$sOrderProduct->getKitId ()] ['total'] ++;
				$kits [$sOrderProduct->getKitId ()] ['price'] = $kits [$sOrderProduct->getKitId ()] ['price'] + $sOrderProduct->toCurrency ();
			}
		}
		
		$this->render ( 'cart_list', array (
				'model' => SOrdersQuery::create ()->filterById ( $orderId )->findOne (),
				'kits' => $kits,
				'deliveryMethods' => SDeliveryMethodsQuery::create ()->useI18nQuery ( MY_Controller::getCurrentLocale () )->orderByName ()->endUse ()->find (),
				'paymentMethods' => SPaymentMethodsQuery::create ()->useI18nQuery ( MY_Controller::getCurrentLocale () )->orderByName ()->endUse ()->find () 
		) );
		;
	}
	
	/**
	 * Count total orders in the list
	 *
	 * @param SOrdersQuery $object        	
	 * @return int
	 */
	protected function _count(SOrdersQuery $object) {
		$object = clone $object;
		return $object->count ();
	}
	public function printChecks($pks = array(1)) {
		$this->pdf = new TCPDF ( 'P', 'mm', 'A4', true, 'UTF-8', false );
		$this->pdf->setFontSubsetting ( false );
		$this->pdf->cms_cache_key = 'check' . time ();
		$this->pdf->setPDFVersion ( '1.6' );
		$this->pdf->SetFont ( 'dejavusanscondensed', '', 10 );
		$this->pdf->setPrintHeader ( false );
		$this->pdf->setPrintFooter ( false );
		$this->pdf->SetTextColor ( 0, 0, 0 );
		
		foreach ( $pks as $id ) {
			$this->pageNumber = '';
			$model = SOrdersQuery::create ()->findPk ( $id );
			$products = $model->getSOrderProductss ();
			
			// Print product 15 per page
			if ($products->count () >= 15) {
				$products = array_chunk ( ( array ) $products, 15 );
				
				$n = 1;
				foreach ( $products as $p ) {
					$this->pageNumber = '/ ' . $n;
					$this->createPDFPage ( $model, $p, true );
					$n ++;
				}
				// Create copy
				$n = 1;
				foreach ( $products as $p ) {
					$this->pageNumber = '/ ' . $n;
					$this->createPDFPage ( $model, $p, true );
					$n ++;
				}
			}			// Print product >5 on two pages.
			elseif ($products->count () > 5) {
				$this->createPDFPage ( $model, $products, true );
				$this->createPDFPage ( $model, $products, true );
			} else {
				$this->createPDFPage ( $model, $products, true );
			}
		}
		
		$this->pdf->Output ( "Order_No_$id.pdf" );
	}
	
	/**
	 * Create order check and display PDF file.
	 *
	 * @param int $orderId        	
	 * @access public
	 * @return PDF file
	 */
	public function createPDFPage(SOrders $model, $products, $duplicate = false) {
		if ($model->getDeliveryMethod ())
			$freeFrom = SDeliveryMethodsQuery::create ()->findPk ( $model->getDeliveryMethod () )->getFreeFrom ();
		else
			$freeFrom = false;
		$deliveryPrice = ($model->getTotalPrice () <= $freeFrom) ? $model->getDeliveryPrice () : 0;
		$totalPrice = $model->getTotalPrice () + $deliveryPrice;
		
		// if ($freeFrom > $totalPrice)
		if ($deliveryPrice > 0) {
			$delivery = new SOrderProducts ();
			$delivery->setProductName ( lang ( 'Delivery', 'admin' ) );
			$delivery->setQuantity ( 1 );
			$delivery->setPrice ( $deliveryPrice );
			$products [] = $delivery;
		}
		
		$html = $this->render ( 'check', array (
				'model' => $model,
				'products' => $products,
				'totalPrice' => $totalPrice,
				'pageNumber' => $this->pageNumber 
		), true );
		
		if ($duplicate === false) {
			$resultHtml = $html . '<p>&nbsp;</p><p><hr></p><p>&nbsp;</p>' . $html;
		} else {
			$resultHtml = $html;
		}
		
		$this->pdf->AddPage ();
		$this->pdf->writeHTML ( $resultHtml, true, false, true, false, '' );
	}
	public function createPdf($id) {
		$this->printChecks ( array (
				0 => $id 
		) );
	}
	
	/**
	 * Create new order
	 */
	public function create() {
		if ($_POST) {
			$shopOrder = $this->input->post ( 'shop_orders' );
			$shopOrderProducts = $this->input->post ( 'shop_orders_products' );
			
			if ($shopOrder ['user_id'] != null && $shopOrder ['delivery_method'] != 0 && $shopOrder ['payment_method'] != 0) {
				
				$_POST ['action'] ? $action = $_POST ['action'] : $action = 'edit';
				$model = new SOrders ();
				$model->setUserId ( $shopOrder ['user_id'] );
				$model->setUserFullName ( $shopOrder ['user_full_name'] );
				$model->setUserEmail ( $shopOrder ['user_email'] );
				$model->setUserPhone ( $shopOrder ['user_phone'] );
				$model->setUserDeliverTo ( $shopOrder ['user_delivery_to'] );
				$model->setComulativ ( $shopOrder ['comulativ'] );
				$model->setTotalPrice ( $shopOrder ['total_price'] );
				$model->setGiftCertKey ( $shopOrder ['gift_cert_key'] );
				$model->setGiftCertPrice ( $shopOrder ['gift_cert_price'] );
				$model->setKey ( self::createCode () );
				$model->setStatus ( 1 );
				
				// make not active gitft certificate
				$this->makeNotActiveGiftCert ( $shopOrder ['gift_cert_key'] );
				
				// Check if delivery method exists.
				$deliveryMethod = SDeliveryMethodsQuery::create ()->findPk ( ( int ) $shopOrder ['delivery_method'] );
				
				if ($deliveryMethod === null) {
					$deliveryMethod = 0;
					$deliveryPrice = 0;
				} else {
					$deliveryPrice = $deliveryMethod->getPrice ();
					$deliveryMethod = $deliveryMethod->getId ();
				}
				
				// Check if payment method exists.
				$paymentMethod = SPaymentMethodsQuery::create ()->findPk ( ( int ) $shopOrder ['payment_method'] );
				
				if ($paymentMethod === null)
					$paymentMethod = 0;
				else
					$paymentMethod = $paymentMethod->getId ();
				
				$model->setDeliveryMethod ( $deliveryMethod );
				$model->setDeliveryPrice ( $deliveryPrice );
				$model->setPaymentMethod ( $paymentMethod );
				$model->setDateCreated ( time () );
				$model->setDateUpdated ( time () );
				$model->save ();
				
				/**
				 * Collect order products data
				 */
				$totalProducts = count ( $shopOrderProducts ['product_id'] );
				$orderId = $model->getId ();
				
				$orderProducts = array ();
				$orderProducts ['order_id'] = $orderId;
				
				for($i = 0; $i < $totalProducts; $i ++) {
					if ($shopOrderProducts ['variant_name'] [$i] == '-')
						$shopOrderProducts ['variant_name'] [$i] = '';
					$data = array (
							'order_id' => $orderId,
							'product_id' => $shopOrderProducts ['product_id'] [$i],
							'product_name' => $shopOrderProducts ['product_name'] [$i],
							'variant_id' => $shopOrderProducts ['variant_id'] [$i],
							'variant_name' => $shopOrderProducts ['variant_name'] [$i],
							'price' => $shopOrderProducts ['price'] [$i] / 100 * (100 - $shopOrder ['comulativ']),
							'quantity' => $shopOrderProducts ['quantity'] [$i] 
					);
					$orderProducts ['products'] [] = $shopOrderProducts ['product_id'] [$i];
					$this->db->insert ( 'shop_orders_products', $data );
				}
				
				/**
				 * Init Event.
				 * Create Shop order
				 */
				\CMSFactory\Events::create ()->registerEvent ( array (
						'order_products' => $orderProducts 
				), 'ShopAdminOrder:create' );
				\CMSFactory\Events::runFactory ();
				
				showMessage ( lang ( 'Order was successfully created', 'admin' ) );
				
				switch ($action) {
					case 'edit' :
						pjax ( '/admin/components/run/shop/orders/edit/' . $model->getId () );
						break;
					
					case 'close' :
						pjax ( '/admin/components/run/shop/orders' );
						break;
				}
			} else {
				if ($shopOrder ['user_id'] == null)
					showMessage ( lang ( 'User is not selected', 'admin' ), lang ( 'Error', 'admin' ), 'r' );
				if ($shopOrder ['delivery_method'] == 0)
					showMessage ( lang ( 'Delivery method is not selected', 'admin' ), lang ( 'Error', 'admin' ), 'r' );
				if ($shopOrder ['payment_method'] == 0)
					showMessage ( lang ( 'Payment method is not selected', 'admin' ), lang ( 'Error', 'admin' ), 'r' );
			}
		} else {
			$this->render ( 'create', array (
					'categories' => ShopCore::app ()->SCategoryTree->getTree (),
					'deliveryMethods' => SDeliveryMethodsQuery::create ()->useI18nQuery ( $this->defaultLanguage ['identif'] )->orderByName ( Criteria::ASC )->endUse ()->find (),
					'paymentMethods' => SPaymentMethodsQuery::create ()->useI18nQuery ( $this->defaultLanguage ['identif'] )->orderByName ( Criteria::ASC )->endUse ()->find () 
			) );
		}
	}
	private function makeNotActiveGiftCert($key) {
		if ($key == null)
			return;
		
		$this->db->where ( 'key', $key )->update ( 'shop_gifts', array (
				'active' => 0 
		) );
	}
	private function getTotalRow() {
		$connection = Propel::getConnection ();
		$statement = $connection->prepare ( 'SELECT FOUND_ROWS() as `number`' );
		$statement->execute ();
		$resultset = $statement->fetchAll ();
		return $resultset [0] ['number'];
	}
	
	/**
	 * Get products in category id and children categories
	 */
	public function ajaxGetProductsInCategory() {
		$categoryId = $this->input->post ( 'categoryId' );
		$currentCategoryFullPath = $this->db->select ( 'full_path' )->where ( 'id', $categoryId )->get ( 'shop_category' )->row_array ();
		$query = $this->db->select ( 'id' )->like ( 'full_path', $currentCategoryFullPath ['full_path'] )->get ( 'shop_category' )->result_array ();
		$categoriesIds = array ();
		foreach ( $query as $q ) {
			$categoriesIds [] .= $q ['id'];
		}
		
		$products = $this->db->select ( 'shop_products.id, shop_products_i18n.name' )->from ( 'shop_products' )->join ( 'shop_products_i18n', 'shop_products.id = shop_products_i18n.id' )->where ( 'shop_products_i18n.locale', MY_Controller::getCurrentLocale () )->where_in ( 'shop_products.category_id', $categoriesIds )->get ()->result_array ();
		echo json_encode ( $products );
	}
	
	/**
	 * Get products in category id and children categories
	 */
	public function ajaxGetProductVariants() {
		$productId = $this->input->post ( 'productId' );
		
		$productVariants = $this->db->select ( 'shop_product_variants.id, shop_product_variants_i18n.name, shop_product_variants.price,shop_currencies.symbol, shop_product_variants.stock' )->from ( 'shop_products' )->join ( 'shop_product_variants', 'shop_products.id = shop_product_variants.product_id' )->join ( 'shop_product_variants_i18n', 'shop_product_variants.id = shop_product_variants_i18n.id' )->join ( 'shop_currencies', 'shop_product_variants.currency = shop_currencies.id' )->where ( 'shop_product_variants_i18n.locale', MY_Controller::getCurrentLocale () )->where ( 'shop_product_variants.product_id', $productId )->get ()->result_array ();
		
		echo json_encode ( $productVariants );
	}
	public function getImageName() {
		$variantId = $this->input->post ( 'variantId' );
		
		$query = $this->db->select ( 'mainImage' )->where ( 'id', $variantId )->get ( 'shop_product_variants' )->row_array ();
		echo $query ['mainImage'];
	}
	
	/**
	 * Autocomlite users by name, email, id for orders create
	 */
	public function autoComplite() {
		$s_limit = $this->input->get ( 'limit' );
		$s_coef = $this->input->get ( 'term' );
		
		$model = SUserProfileQuery::create ();
		$model = $model->where ( 'SUserProfile.Name LIKE "%' . $s_coef . '%"' )->_or ()->where ( 'SUserProfile.UserEmail LIKE "%' . $s_coef . '%"' )->_or ()->where ( 'SUserProfile.Id LIKE "%' . $s_coef . '%"' )->limit ( $s_limit )->find ();
		
		foreach ( $model as $val ) {
			$response [] = array (
					'value' => $val->getId () . ' - ' . $val->getName () . ' - ' . $val->getUserEmail (),
					'id' => $val->getId (),
					'name' => $val->getName (),
					'email' => $val->getUserEmail (),
					'phone' => $val->getPhone (),
					'address' => $val->getAddress () 
			);
		}
		echo json_encode ( $response );
	}
	
	/* Ajax create new user */
	public function createNewUser() {
		// $name, $password, $userEmail, $address, $phone
		$this->input->post ( '' );
		$data = array (
				'name' => $this->input->post ( 'name' ),
				'password' => ShopCore::$ci->dx_auth->_gen_pass (),
				'email' => $this->input->post ( 'email' ),
				'phone' => $this->input->post ( 'phone' ),
				'address' => $this->input->post ( 'address' ) 
		);
		if (! ShopCore::$ci->dx_auth->is_email_available ( $data ['email'] )) {
			echo 'email';
		} elseif (ShopCore::$ci->dx_auth->register ( $data ['name'], $data ['password'], $data ['email'], $data ['address'], '', $data ['phone'], $false )) {
			echo $this->getLastUserInfo ();
		} else {
			echo 'false';
		}
	}
	
	/**
	 * Get discount for user by id
	 * 
	 * @param type $userId        	
	 */
	public function ajaxGetUserDiscount() {
		$userId = $this->input->post ( 'userId' );
		if ($userId != null) {
			$query = $this->db->select ( 'discount' )->from ( 'users' )->where ( 'id', $userId )->get ()->row_array ();
		}
		if ($query != null)
			echo $query ['discount'];
	}
	
	/*
	 * Get Payment methods by delivery method id
	 */
	public function getPaymentsMethods($deliveryId) {
		$paymentMethods = ShopDeliveryMethodsSystemsQuery::create ()->filterByDeliveryMethodId ( $deliveryId )->find ();
		foreach ( $paymentMethods as $paymentMethod ) {
			$paymentMethodsId [] = $paymentMethod->getPaymentMethodId ();
		}
		$paymentMethod = SPaymentMethodsQuery::create ()->filterByActive ( true )->where ( 'SPaymentMethods.Id IN ?', $paymentMethodsId )->orderByPosition ()->find ();
		
		$jsonData = array ();
		foreach ( $paymentMethod->getData () as $pm ) {
			$jsonData [] = array (
					'id' => $pm->getId (),
					'name' => $pm->getName () 
			);
		}
		
		echo json_encode ( $jsonData );
	}
	
	/*
	 * Check gift certificate code by key
	 */
	public function checkGiftCert($key) {
		$date = time ();
		$query = $this->db->where ( 'key', $key )->where ( 'espdate >', $date )->where ( 'active', 1 )->get ( 'shop_gifts' )->row_array ();
		echo json_encode ( $query );
	}
	
	/**
	 * Create random code.
	 *
	 * @param int $charsCount        	
	 * @param int $digitsCount        	
	 * @static
	 *
	 * @access public
	 * @return string
	 */
	public static function createCode($charsCount = 3, $digitsCount = 7) {
		$chars = array (
				'q',
				'w',
				'e',
				'r',
				't',
				'y',
				'u',
				'i',
				'p',
				'a',
				's',
				'd',
				'f',
				'g',
				'h',
				'j',
				'k',
				'l',
				'z',
				'x',
				'c',
				'v',
				'b',
				'n',
				'm' 
		);
		
		if ($charsCount > sizeof ( $chars ))
			$charsCount = sizeof ( $chars );
		
		$result = array ();
		if ($charsCount > 0) {
			$randCharsKeys = array_rand ( $chars, $charsCount );
			
			foreach ( $randCharsKeys as $key => $val )
				array_push ( $result, $chars [$val] );
		}
		
		for($i = 0; $i < $digitsCount; $i ++)
			array_push ( $result, rand ( 0, 9 ) );
		
		shuffle ( $result );
		
		$result = implode ( '', $result );
		
		if (sizeof ( SOrdersQuery::create ()->filterByKey ( $result )->select ( array (
				'Key' 
		) )->limit ( 1 )->find () ) > 0)
			self::createCode ( $charsCount, $digitsCount );
		
		return $result;
	}
	
	/**
	 * Return info about last created user
	 */
	public function getLastUserInfo() {
		$response = $this->db->order_by ( 'id', 'desc' )->get ( 'users' )->row_array ();
		
		if ($response)
			echo json_encode ( $response );
		else
			echo 'false';
	}
}
