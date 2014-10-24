<?php

/**
 * ShopAdminOrderStatuses
 *
 * @uses ShopAdminController
 * @package
 * @version $id$
 * @copyright
 * @author <dev@imagecms.net>
 * @license
 */
class ShopAdminOrderstatuses extends ShopAdminController {
	public $defaultLanguage = null;
	public function __construct() {
		parent::__construct ();
		$this->defaultLanguage = getDefaultLanguage ();
	}

	/**
	 * Display all order statuses.
	 *
	 * @access public
	 */
	public function index() {
		$model = SOrderStatusesQuery::create ()->orderByPosition ()->find ();
		$statusesInUse = array ();
		foreach ( SOrdersQuery::create ()->find () as $order ) {
			$statusesInUse [$order->getStatus ()] = $order->getStatus ();
		}
		$this->render ( 'list', array (
				'statusesInUse' => $statusesInUse,
				'model' => $model,
				'locale' => $this->defaultLanguage ['identif']
		) );
	}

	/**
	 * Create new order status.
	 *
	 * @access public
	 */
	public function create() {
		$locale = array_key_exists ( 'Locale', $_POST ) ? $_POST ['Locale'] : $this->defaultLanguage ['identif'];

		$model = new SOrderStatuses ();

		if ($_POST) {
			$this->form_validation->set_rules ( $model->rules () );
				
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors () );
			} else {
				$model->fromArray ( $_POST );

				$posModel = SOrderStatusesQuery::create ()->select ( 'Position' )->where ( 'SOrderStatuses.Id != 2' )->orderByPosition ( 'Desc' )->limit ( 1 )->find ();

				$model->setPosition ( $posModel [0] + 1 );

				$model->save ();

				showMessage ( lang ( 'Order status created', 'admin' ) );

				$_POST ['action'] ? $action = $_POST ['action'] : $action = 'edit';
				if ($action == 'close')
					pjax ( '/admin/components/run/shop/orderstatuses/index' );
				if ($action == 'edit')
					pjax ( '/admin/components/run/shop/orderstatuses/edit/' . $model->getId () );
			}
		} else {
			$this->render ( 'create', array (
					'model' => $model,
					'locale' => $this->defaultLanguage ['identif']
			) );
		}
	}

	/**
	 * Edit order satus by id.
	 *
	 * @access public
	 */
	public function edit($id = null, $locale = null) {
		$locale = $locale == null ? $this->defaultLanguage ['identif'] : $locale;

		$model = SOrderStatusesQuery::create ()->findPk ( ( int ) $id );

		if ($model === null)
			$this->error404 ( lang ( 'Order Status not found', 'admin' ) );

		if ($_POST) {
			$this->form_validation->set_rules ( $model->rules () );
				
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors () );
			} else {
				$_POST ['Active'] = ( boolean ) $_POST ['Active'];
				$_POST ['Locale'] = $locale;

				$model->fromArray ( $_POST );
				$model->save ();

				showMessage ( lang ( 'Changes have been saved', 'admin' ) );

				$_POST ['action'] ? $action = $_POST ['action'] : $action = 'edit';
				if ($action == 'close')
					pjax ( '/admin/components/run/shop/orderstatuses/index' );
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

	/**
	 * Delete order satus by id.
	 *
	 * @access public
	 */
	public function delete() {
		$id = ( int ) $_POST ['id'];
		$moveOrDelete = ( int ) $_POST ['moveOrDelete'];
		$moveTo = ( int ) $_POST ['moveTo'] [0];
		if ($id != 1 && $id != 2) {
			$model = SOrderStatusesQuery::create ()->findPk ( $id );
			if ($model) {
				$orders = SOrdersQuery::create ()->filterByStatus ( $id )->find ();

				if ($moveOrDelete === 2) {
					foreach ( $orders as $order ) {
						$order->delete ();
					}
					$model->delete ();
					showMessage ( lang ( 'Status and related orders removed', 'admin' ) );
				} else if ($moveOrDelete === 1) {
					foreach ( $orders as $order ) {
						$order->setStatus ( $moveTo );
						$order->save ();
					}
					$model->delete ();
					showMessage ( lang ( 'Status removed', 'admin' ) );
				}
				if ($moveOrDelete === 0) {
					$model->delete ();
					showMessage ( lang ( 'Status removed', 'admin' ) );
				}
				pjax ( '/admin/components/run/shop/orderstatuses' );
			} else
				showMessage ( lang ( 'Such status does not exist', 'admin' ), '', 'r' );
		} else
			showMessage ( lang ( 'Unable to remove the base status', 'admin' ) );
	}
	public function ajaxDeleteWindow($statusId) {
		$orders = SOrdersQuery::create ()->findByStatus ( $statusId );

		/*
		 * $model = SOrderStatusesQuery::create()
		* ->findPk($statusId);
		*/

		$this->render ( '_deleteWindow', array (
				'statuses' => SOrderStatusesQuery::create ()->find (),
				'statusId' => $statusId,
				'orders' => $orders
		) );
	}

	/**
	 * Save order satus positions.
	 *
	 * @access public
	 */
	public function savePositions() {
		$positions = $_POST ['positions'];
		if (sizeof ( $positions ) == 0) {
			return false;
		}

		foreach ( $positions as $key => $val ) {
			$query = "UPDATE `shop_order_statuses` SET `position`=" . $key . " WHERE `id`=" . ( int ) $val . "; ";
			$this->db->query ( $query );
		}
		showMessage ( lang ( 'Positions saved successfully', 'admin' ) );
	}
}
