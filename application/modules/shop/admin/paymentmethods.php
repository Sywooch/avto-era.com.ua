<?php

/**
 * ShopAdminPaymentMethods
 *
 * @uses ShopAdminController
 * @package
 * @version $id$
 * @copyright
 * @author <dev@imagecms.net>
 * @license
 */
class ShopAdminPaymentmethods extends ShopAdminController {
	public $defaultLanguage = null;
	public function __construct() {
		parent::__construct ();
		$this->defaultLanguage = getDefaultLanguage ();
	}

	/**
	 * Display all payment methods.
	 *
	 * @access public
	 */
	public function index() {
		$model = SPaymentMethodsQuery::create ()->orderByPosition ()->find ();

		$this->render ( 'list', array (
				'model' => $model
		) );
	}

	/**
	 * Create new payment method.
	 *
	 * @access public
	 */
	public function create() {
		$model = new SPaymentMethods ();

		if ($_POST) {
			$this->form_validation->set_rules ( $model->rules () );
				
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors (), '', 'r' );
			} else {
				$model->fromArray ( $_POST );

				$posModel = SPaymentMethodsQuery::create ()->select ( 'Position' )->orderByPosition ( 'Desc' )->limit ( 1 )->find ();

				$model->setPosition ( $posModel [0] + 1 );

				$model->save ();

				showMessage ( lang ( 'Payment method is created', 'admin' ) );
				if ($_POST ['action'] == 'exit') {
					pjax ( '/admin/components/run/shop/paymentmethods/index' );
				} else {
					pjax ( '/admin/components/run/shop/paymentmethods/edit/' . $model->getId () );
				}
			}
		} else {
			$this->render ( 'create', array (
					'model' => $model,
					'currencies' => SCurrenciesQuery::create ()->find ()
			) );
		}
	}
	function change_payment_status($id) {
		$model = SPaymentMethodsQuery::create ()->findPk ( $id );
		if ($model->getActive ())
			$model->setActive ( '0' );
		else
			$model->setActive ( '1' );
		$model->save ();
	}
	public function edit($id, $locale = null) {
		$locale = $locale == null ? $this->defaultLanguage ['identif'] : $locale;

		$model = SPaymentMethodsQuery::create ()->findPk ( ( int ) $id );

		if ($model === null)
			$this->error404 ( lang ( 'Payment method is not found.', 'admin' ) );

		$systemClass = ShopCore::app ()->SPaymentSystems->loadPaymentSystem ( $model->getPaymentSystemName () );

		// Get settings form
		if ($model->getPaymentSystemName () != null && method_exists ( $systemClass, 'getForm' )) {
			$systemClass->paymentMethod = $model;
			$paymentSystemForm = $systemClass->getAdminForm ();
		}

		if ($_POST) {
			// Validate paymentSystem data.
			$systemClass = ShopCore::app ()->SPaymentSystems->loadPaymentSystem ( $_POST ['PaymentSystemName'] );
				
			if (method_exists ( $systemClass, 'saveSettings' )) {
				$result = $systemClass->saveSettings ( $model );
				if ($result !== true) {
					showMessage ( $result, '', 'r' );
					exit ();
				}
			}
				
			$this->form_validation->set_rules ( $model->rules () );
				
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors (), '', 'r' );
			} else {
				$_POST ['Active'] = ( boolean ) $_POST ['Active'];
				$_POST ['Locale'] = $locale;

				$model->fromArray ( $_POST );
				$model->save ();

				showMessage ( lang ( 'Changes have been saved', 'admin' ) );
				if ($_POST ['action'] == 'edit') {
					pjax ( '/admin/components/run/shop/paymentmethods/edit/' . $id );
				} else {
					pjax ( '/admin/components/run/shop/paymentmethods' );
				}
				// $this->_redirect($model, $locale);
			}
		} else {
			$model->setLocale ( $locale );
				
			$this->render ( 'edit', array (
					'model' => $model,
					'currencies' => SCurrenciesQuery::create ()->find (),
					'paymentSystemForm' => $paymentSystemForm,
					'languages' => ShopCore::$ci->cms_admin->get_langs ( true ),
					'locale' => $locale
			) );
		}
	}

	/**
	 * Delete payment method by id.
	 *
	 * @access public
	 */
	public function deleteAll() {
		if (empty ( $_POST ['ids'] )) {
			showMessage ( lang ( 'No data transmitted', 'admin' ), '', 'r' );
			exit ();
		}
		if (sizeof ( $_POST ['ids'] > 0 )) {
			$model = SPaymentMethodsQuery::create ()->findPks ( $_POST ['ids'] );
				
			if (! empty ( $model )) {
				foreach ( $model as $order ) {
					$order->delete ();
				}

				showMessage ( lang ( 'Method of payment is removed', 'admin' ) );
			}
		}
	}

	/**
	 * Save payment methods positions.
	 *
	 * @access public
	 */
	public function savePositions() {
		if (sizeof ( $_POST ['positions'] ) > 0) {
			foreach ( $_POST ['positions'] as $id => $pos ) {
				SPaymentMethodsQuery::create ()->filterById ( $pos )->update ( array (
						'Position' => ( int ) $id
				) );
			}
			showMessage ( lang ( 'Positions saved', 'admin' ) );
		}
	}
	protected function _redirect($model = null, $locale = null) {
		if ($_POST ['_add'])
			$redirect_url = 'paymentmethods/index';

		if ($_POST ['_create'])
			$redirect_url = 'paymentmethods/create';

		if ($_POST ['_edit'])
			$redirect_url = 'paymentmethods/edit/' . $model->getId () . '/' . $locale;

		if ($redirect_url !== false)
			$this->ajaxShopDiv ( $redirect_url );
	}
	public function getAdminForm($systemName = null, $paymentMethodId = null) {
		$class = ShopCore::app ()->SPaymentSystems->loadPaymentSystem ( $systemName );

		if (is_object ( $class )) {
			$class->paymentMethod = SPaymentMethodsQuery::create ()->findPk ( $paymentMethodId );
			echo $class->getAdminForm ();
		}
	}
}