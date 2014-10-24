<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 * User Profile Controller
 *
 * @uses ShopController
 * @package Shop
 * @version 0.1
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net>
 */
class ShopAdminGifts extends ShopAdminController {
	private $model;
	public function __construct() {
		parent::__construct ();

		if (! $this->dx_auth->is_logged_in ())
			redirect ( '/' );

		$this->_userId = $this->dx_auth->get_user_id ();
		$this->model = ShopGiftsQuery::create ()->find ();
		$this->load->helper ( 'url' );
	}

	/**
	 * Display list of user order
	 *
	 * @access public
	 */
	public function index() {
		$this->render ( 'index', array (
				'model' => $this->model
		) );
	}
	public function create() {
		if ($_POST) {
			$model = ShopGiftsQuery::create ()->findByKey ( $this->input->post ( 'key' ) );
			if (count ( $model ) > 0) {
				showMessage ( lang ( 'Certificate with this key already exists', 'admin' ) );
				return false;
				;
			}
			$this->load->library ( 'validation' );
			$this->form_validation->set_rules ( 'key', lang ( 'Code', 'admin' ), 'required|xss_clean' );
			$this->form_validation->set_rules ( 'price', lang ( 'Cost of the certificate', 'admin' ), 'required|numeric|xss_clean' );
			$this->form_validation->set_rules ( 'espir', lang ( 'Date of creation', 'admin' ), 'required|valid_date' );
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors (), '', 'r' );
			} else {
				$model = new ShopGifts ();
				$model->setKey ( $_POST ['key'] );
				$model->setPrice ( $_POST ['price'] );
				// $model->setActive(1);
				$model->setCreated ( date ( 'U' ) );
				$model->setEspDate ( strtotime ( $_POST ['espir'] ) );
				$model->save ();

				showMessage ( lang ( 'Certificate is created', 'admin' ) );

				if ($_POST ['action'] == 'new') {
					pjax ( '/admin/components/run/shop/gifts/edit/' . $model->getId () );
				} else {
					pjax ( '/admin/components/run/shop/gifts' );
				}
			}
		} else {
			$this->render ( 'create' );
		}
	}
	private function display_tpl($file = '') {
		$file = realpath ( dirname ( __FILE__ ) ) . '/templates/gifts/' . $file . '.tpl';
		$this->template->display ( 'file:' . $file );
	}
	public function generateKey() {
		if ($this->input->is_ajax_request ()) {
			$this->load->helper ( 'string' );
			$key = random_string ( 'alnum', 16 );
			echo json_encode ( array (
					"key" => "$key"
			) );
		}
	}
	public function delete() {
		$keys = $_POST ['ids'];
		$model = ShopGiftsQuery::create ()->findPks ( $keys );
		if (count ( $model ) > 0) {
			$model->delete ();
			showMessage ( lang ( 'Certificate (s) removed (s)', 'admin' ) );
			pjax ( '/admin/components/run/shop/gifts' );
		}
	}
	public function edit($cid) {
		$model = ShopGiftsQuery::create ()->findPk ( $cid );
		if (empty ( $_POST )) {
			if ($model) {
				$this->render ( 'edit', array (
						'model' => $model
				) );
			}
		} else {
			$this->load->library ( 'validation' );
			$this->form_validation->set_rules ( 'price', lang ( 'Cost of the certificate', 'admin' ), 'required|numeric|xss_clean' );
			$this->form_validation->set_rules ( 'espir', lang ( 'Date of creation', 'admin' ), 'required|valid_date' );
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors (), '', 'r' );
			} else {
				if ($model) {
					$model->setPrice ( ( int ) $_POST ['price'] );
					$model->setEspDate ( ( int ) strtotime ( $_POST ['espir'] ) );
					$model->save ();
				}
				showMessage ( lang ( 'Changes have been saved', 'admin' ) );

				if ($_POST ['action'] == 'edit') {
					pjax ( '/admin/components/run/shop/gifts/edit/' . $model->getId () );
				} else {
					pjax ( '/admin/components/run/shop/gifts' );
				}
			}
		}
	}
	public function ChangeActive($productId = null) {
		$model = ShopGiftsQuery::create ()->findPk ( $productId );

		if ($model !== null) {
			if (! $model->getActive ()) {
				$model->setEspdate ( date ( 'U' ) + 86400 );
			} else {
				$model->setEspdate ( date ( 'U' ) - 86400 );
			}
			$model->setActive ( ! $model->getActive () );
			$model->save ();
			showMessage ( lang ( 'You have changed the status of the certificate', 'admin' ) );
			pjax ( '/admin/components/run/shop/gifts' );
		}

		if (sizeof ( $_POST ['ids'] > 0 )) {
			$model = ShopGiftsQuery::create ()->findPks ( $_POST ['ids'] );
				
			if (! empty ( $model )) {
				foreach ( $model as $product ) {
					$product->setActive ( ! $product->getActive () );
					$product->save ();
				}
			}
		}
	}
	public function settings() {
		$this->render ( 'settings' );
	}
	public function save_settings() {
		if ($_POST ['gifton'] == 1) {
			ShopCore::app ()->SSettings->set ( 'usegifts', 1, true, 'ru' );
		} else {
			ShopCore::app ()->SSettings->set ( 'usegifts', 0, true, 'ru' );
		}
		showMessage ( lang ( 'The settings are saved', 'admin' ) );
		if ($_POST ['action'] == 'edit') {
			pjax ( '/admin/components/run/shop/gifts/settings' );
		} else {
			pjax ( '/admin/components/run/shop/gifts' );
		}
	}
}

/* End of file profile.php */
