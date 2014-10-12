<?php

/**
 * ShopAdminNotificationStatuses
 *
 * @uses ShopAdminController
 * @package
 * @version $id$
 * @copyright
 * @author <dev@imagecms.net>
 * @license
 */
class ShopAdminNotificationstatuses extends ShopAdminController {
	public $defaultLanguage = null;
	public function __construct() {
		parent::__construct ();
		$this->defaultLanguage = getDefaultLanguage ();
	}

	/**
	 * Display all notification statuses.
	 *
	 * @access public
	 */
	public function index() {
		$locale = $locale == null ? $this->defaultLanguage ['identif'] : $locale;
		$model = SNotificationStatusesQuery::create ()->joinWithI18n ( $locale )->orderByPosition ()->find ();

		$statusesInUse = array ();

		foreach ( SNotificationsQuery::create ()->find () as $notification ) {
			$statusesInUse [$notification->getStatus ()] = $notification->getStatus ();
		}

		$this->render ( 'list', array (
				'statusesInUse' => $statusesInUse,
				'model' => $model
		) );
	}

	/**
	 * Create new notification status.
	 *
	 * @access public
	 */
	public function create() {
		$model = new SNotificationStatuses ();

		if ($_POST) {
			$this->form_validation->set_rules ( $model->rules () );
				
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors (), '', 'r' );
			} else {
				$model->fromArray ( $_POST );

				$posModel = SNotificationStatusesQuery::create ()->select ( 'Position' )->orderByPosition ( 'Desc' )->limit ( 1 )->find ();

				$model->setPosition ( $posModel [0] + 1 );

				$model->save ();

				showMessage ( lang ( 'Status pending created', 'admin' ) );

				pjax ( '/admin/components/run/shop/notificationstatuses/edit/' . $model->getId () );
			}
		} else {
			$this->render ( 'create', array (
					'model' => $model
			) );
		}
	}

	/**
	 * Edit notification satus by id.
	 *
	 * @access public
	 */
	public function edit($id = null, $locale = null) {
		$locale = $locale == null ? $this->defaultLanguage ['identif'] : $locale;

		$model = SNotificationStatusesQuery::create ()->joinWithI18n ( $locale )->findPk ( ( int ) $id );

		if ($model === null)
			$this->error404 ( lang ( 'Status pending not found', 'admin' ) );

		if ($_POST) {
			$this->form_validation->set_rules ( $model->rules () );
				
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors (), '', 'r' );
			} else {
				$_POST ['Active'] = ( boolean ) $_POST ['Active'];
				$_POST ['Locale'] = $locale;

				$model->fromArray ( $_POST );
				$model->save ();

				showMessage ( lang ( 'Changes have been saved', 'admin' ) );

				// $this->_redirect($model, $locale);
				$active = $_POST ['action'];
				if ($active == 'edit') {
					pjax ( '/admin/components/run/shop/notificationstatuses/edit/' . $id );
				} else {
					pjax ( '/admin/components/run/shop/notificationstatuses' );
				}
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
	 * Delete status by id.
	 *
	 * @access public
	 */
	public function deleteAll() {
		if (empty ( $_POST ['ids'] )) {
			showMessage ( lang ( 'No data transmitted', 'admin' ), '', 'r' );
			exit ();
		}
		if (sizeof ( $_POST ['ids'] > 0 )) {
				
			$model = SNotificationStatusesQuery::create ()->findPks ( $_POST ['ids'] );
				
			if (! empty ( $model )) {
				foreach ( $model as $order ) {
					$order->delete ();
				}

				showMessage ( lang ( 'Status removed', 'admin' ) );
			}
		}
	}

	/**
	 * Save notification satus positions.
	 *
	 * @access public
	 */
	public function savePositions() {
		if (sizeof ( $_POST ['positions'] ) > 0) {
				
			foreach ( $_POST ['positions'] as $id => $pos ) {
				SNotificationStatusesQuery::create ()->filterById ( $pos )->update ( array (
						'Position' => ( int ) $id
				) );
			}
			showMessage ( lang ( 'Positions saved', 'admin' ) );
		}
	}
}