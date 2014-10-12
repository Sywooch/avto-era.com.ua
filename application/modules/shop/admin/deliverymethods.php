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
 */
class ShopAdminDeliverymethods extends ShopAdminController {
	public $defaultLanguage = null;
	public function __construct() {
		parent::__construct ();
		$this->defaultLanguage = getDefaultLanguage ();
	}
	public function index() {
		$model = SDeliveryMethodsQuery::create ()->orderByPosition ( Criteria::ASC )->find ();

		$this->render ( 'list', array (
				'model' => $model
		) );
	}

	/**
	 * Create new brand
	 *
	 * @access public
	 */
	public function create() {
		$model = new SDeliveryMethods ();
		$model->setLocale ( $this->defaultLanguage ['identif'] );

		if ($_POST) {
			if (substr ( trim ( $_POST ['Price'], ' ' ), - 1 ) == '%') {
				$_POST ['IsPriceInPercent'] = true;
			} else {
				$_POST ['IsPriceInPercent'] = false;
			}
			$model->fromArray ( $_POST );
			$this->form_validation->set_rules ( $model->rules () );
				
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors (), '', 'r' );
			} else {
				$model->setPricedescription ( $this->input->post ( 'pricedescription' ) );
				$model->save ();

				// Clear payment systems relation
				ShopDeliveryMethodsSystemsQuery::create ()->filterByDeliveryMethodId ( $model->getId () )->delete ();

				if (sizeof ( $_POST ['paymentMethods'] ) > 0) {
					foreach ( $_POST ['paymentMethods'] as $key => $val ) {
						$pm = SPaymentMethodsQuery::create ()->findPk ( $val );
						if ($pm instanceof SPaymentMethods)
							$model->addPaymentMethods ( $pm );
					}
				}

				$model->save ();

				showMessage ( lang ( 'Delivery created', 'admin' ) );
				if ($_POST ['action'] == 'close') {
					pjax ( '/admin/components/run/shop/deliverymethods/index' );
				} else {
					pjax ( '/admin/components/run/shop/deliverymethods/edit/' . $model->getId () . '/' . $locale );
				}
			}
		} else {
			$this->render ( 'create', array (
					'model' => $model,
					'paymentMethods' => SPaymentMethodsQuery::create ()->orderByPosition ()->find ()
			) );
		}
	}
	function change_delivery_status($id) {
		$count = count ( SDeliveryMethodsQuery::create ()->filterByEnabled ( 1 )->find () );
		$model = SDeliveryMethodsQuery::create ()->findPk ( $id );
		if ($model->getEnabled ()) {
			$model->setEnabled ( '0' );
			$count -= 1;
		} else {
			$model->setEnabled ( '1' );
			$count += 1;
		}
		if ($count != 0)
			$model->save ();
	}
	public function edit($deliveryMethodId = null, $locale = null) {
		$locale = $locale == null ? $this->defaultLanguage ['identif'] : $locale;

		$model = SDeliveryMethodsQuery::create ()->findPk ( ( int ) $deliveryMethodId );

		if ($model === null)
			$this->error404 ( lang ( 'Delivery method is not found', 'admin' ) );

		if (! empty ( $_POST )) {
			$this->form_validation->set_rules ( $model->rules () );
			if (substr ( trim ( $_POST ['Price'], ' ' ), - 1 ) == '%') {
				$_POST ['IsPriceInPercent'] = true;
			} else {
				$_POST ['IsPriceInPercent'] = false;
			}
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors () );
			} else {
				if (! $_POST ['Enabled'])
					$_POST ['Enabled'] = false;

				$_POST ['Locale'] = $locale;

				$model->fromArray ( $_POST );
				$model->setPricedescription ( $this->input->post ( 'pricedescription' ) );
				$model->setDescription ( $this->input->post ( 'Description' ) );
				$model->save ();

				// Clear payment systems relation
				ShopDeliveryMethodsSystemsQuery::create ()->filterByDeliveryMethodId ( $model->getId () )->delete ();

				if (sizeof ( $_POST ['paymentMethods'] ) > 0) {
					foreach ( $_POST ['paymentMethods'] as $key => $val ) {
						$pm = SPaymentMethodsQuery::create ()->findPk ( $val );
						if ($pm instanceof SPaymentMethods)
							$model->addPaymentMethods ( $pm );
					}
				}
				$model->setDescription ( $this->input->post ( 'Description' ) );
				$model->save ();

				showMessage ( lang ( 'Changes have been saved', 'admin' ) );
				if ($_POST ['action'] == 'close') {
						
					pjax ( '/admin/components/run/shop/deliverymethods/edit/' . $deliveryMethodId . '/' . $locale );
				} else {
					pjax ( '/admin/components/run/shop/deliverymethods/index' );
				}
			}
		} else {
			$model->setLocale ( $locale );
				
			$this->render ( 'edit', array (
					'model' => $model,
					'languages' => ShopCore::$ci->cms_admin->get_langs ( true ),
					'paymentMethods' => SPaymentMethodsQuery::create ()->orderByPosition ()->find (),
					'locale' => $locale
			) );
		}
	}

	/**
	 * Delete delivery method by id.
	 *
	 * @access public
	 */
	public function deleteAll() {
		if (empty ( $_POST ['ids'] )) {
			showMessage ( lang ( 'No data transmitted', 'admin' ), '', 'r' );
			exit ();
		}
		if (sizeof ( $_POST ['ids'] > 0 )) {
			$model = SDeliveryMethodsQuery::create ()->findPks ( $_POST ['ids'] );
				
			if (! empty ( $model )) {
				foreach ( $model as $order ) {
					$order->delete ();
				}

				showMessage ( lang ( 'Delivery method removed', 'admin' ) );
			}
		}
	}
	protected function redirect($model = null, $locale = null) {
		// Redirect to list
		if ($_POST ['_add'])
			$this->ajaxShopDiv ( 'deliverymethods/index' );
			
		// Redirect to create new object
		if ($_POST ['_create'])
			$this->ajaxShopDiv ( 'deliverymethods/create' );

		if ($_POST ['_edit'])
			$this->ajaxShopDiv ( 'deliverymethods/edit/' . $model->getId () . '/' . $locale );
	}
	/**
	 *
	 * @return boolean
	 */
	public function save_positions() {
		$positions = $_POST ['positions'];
		if (sizeof ( $positions ) == 0) {
			return false;
		}

		foreach ( $positions as $key => $val ) {
			$query = "UPDATE `shop_delivery_methods` SET `position`=" . $key . " WHERE `id`=" . ( int ) $val . "; ";
			$this->db->query ( $query );
		}
		showMessage ( lang ( 'Positions saved', 'admin' ) );
	}
}
