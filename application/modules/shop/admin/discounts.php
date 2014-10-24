<?php

/**
 * ShopAdminDiscounts
 *
 * @uses ShopAdminController
 * @package
 * @version $id$
 * @copyright
 * @author <dev@imagecms.net>
 * @license
 */
class ShopAdminDiscounts extends ShopAdminController {
	protected $arrayForId = array ();
	public function __construct() {
		parent::__construct ();
	}

	/**
	 * Display list of discounts
	 *
	 * @access public
	 */
	public function index() {
		$model = ShopDiscountsQuery::create ()->find ();

		$this->render ( 'list', array (
				'model' => $model
		) );
	}
	private function roles() {
		$locale = MY_Controller::getCurrentLocale ();
		$sql = 'SELECT shop_rbac_roles.id, name, alt_name
		FROM shop_rbac_roles
		INNER JOIN shop_rbac_roles_i18n ON shop_rbac_roles_i18n.id = shop_rbac_roles.id
		WHERE locale = "' . $locale . '"';
		$roles = ShopCore::$ci->db->query ( $sql )->result_array ();
		return $roles;
	}

	/**
	 * Create new currency
	 *
	 * @access public
	 * @return void
	 */
	public function autosearch() {
		if (mb_strlen ( $_POST ['queryString'] ) >= 1) {
				
			$products = SProductsQuery::create ()->leftJoin ( 'ProductVariant' )->joinWithI18n ( MY_Controller::getCurrentLocale () )->distinct ()->filterByActive ( true )->useI18nQuery ( MY_Controller::getCurrentLocale () )->filterByName ( '%' . trim ( $_POST ['queryString'] ) . '%' )->endUse ()->orWhere ( 'ProductVariant.Number LIKE ?', trim ( $_POST ['queryString'] ) )->orWhere ( 'SProducts.Id = ?', trim ( $_POST ['queryString'] ) )->find ();
				
			$this->template->assign ( 'products', $products );
			$this->render ( $_POST ['tpl'] );
			exit ();
		}
	}
	public function create() {
		$model = new ShopDiscounts ();

		if ($_POST) {
			$_POST ['Active'] = ( boolean ) $_POST ['Active'];
			$_POST ['Categories'] = serialize ( $_POST ['Categories'] );
				
			if (! empty ( $_POST ['DateStart'] ))
				$_POST ['DateStart'] = strtotime ( $_POST ['DateStart'] );
				
			if (! empty ( $_POST ['DateStop'] ))
				$_POST ['DateStop'] = strtotime ( $_POST ['DateStop'] );
				
			$this->form_validation->set_rules ( $model->rules () );
				
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors (), '', 'r' );
			} else {
				$model->fromArray ( $_POST );
				$model->setUserGroup ( serialize ( $_POST ['roles'] ) );
				$model->save ();

				showMessage ( lang ( 'Discount created', 'admin' ) );

				if ($this->input->post ( 'action' ) == 'edit') {
					pjax ( '/admin/components/run/shop/discounts/edit/' . $model->getId () );
				} else {
					pjax ( '/admin/components/run/shop/discounts/index' );
				}
			}
		} else {
			$locale = MY_Controller::getCurrentLocale ();
			$sql = 'SELECT shop_rbac_roles.id, name, alt_name
			FROM shop_rbac_roles
			INNER JOIN shop_rbac_roles_i18n ON shop_rbac_roles_i18n.id = shop_rbac_roles.id
			WHERE locale = "' . $locale . '"';
			$roles = ShopCore::$ci->db->query ( $sql )->result_array ();
				
			$this->render ( 'create', array (
					'model' => $model,
					'categoriesTree' => ShopCore::app ()->SCategoryTree->getTree (),
					'roles' => $this->roles ()
			) );
		}
	}

	/**
	 * Change status
	 *
	 * @param
	 *        	$id
	 */
	function change_discount_status($id) {
		$model = ShopDiscountsQuery::create ()->findPk ( $id );
		if ($model->getActive ())
			$model->setActive ( '0' );
		else
			$model->setActive ( '1' );
		$model->save ();
	}

	/**
	 * Edit discount
	 *
	 * @param
	 *        	$id
	 * @return void
	 */
	public function edit($id = null) {
		$model = ShopDiscountsQuery::create ()->findPk ( $id );

		if ($_POST) {
			$_POST ['Active'] = ( boolean ) $_POST ['Active'];
			$_POST ['Categories'] = serialize ( $_POST ['Categories'] );
				
			if (! empty ( $_POST ['DateStart'] ))
				$_POST ['DateStart'] = strtotime ( $_POST ['DateStart'] );
				
			if (! empty ( $_POST ['DateStop'] ))
				$_POST ['DateStop'] = strtotime ( $_POST ['DateStop'] );
				
			$this->form_validation->set_rules ( $model->rules () );
				
			if ($this->form_validation->run ( $this ) == FALSE) {
				showMessage ( validation_errors (), '', 'r' );
			} else {

				$model->fromArray ( $_POST );
				$model->setUserGroup ( serialize ( $_POST ['roles'] ) );
				$model->save ();

				showMessage ( lang ( 'Changes have been saved', 'admin' ) );

				if ($this->input->post ( 'action' ) == 'close') {
					pjax ( '/admin/components/run/shop/discounts/edit/' . $id );
				} else {
					pjax ( '/admin/components/run/shop/discounts/index' );
				}
			}
		} else {
			$this->render ( 'edit', array (
					'model' => $model,
					'categoriesTree' => ShopCore::app ()->SCategoryTree->getTree (),
					'userGroup' => $this->arrayId ( unserialize ( $model->getUserGroup () ) ),
					'categoryId' => $this->arrayId ( unserialize ( $model->getCategories () ) ),
					'roles' => $this->roles ()
			) );
		}
	}
	private function arrayId($idForArray) {
		if (! empty ( $idForArray )) {
			foreach ( $idForArray as $key => $value )
				$arrayForId [$key] = $value;
				
			return $arrayForId;
		}
	}
	public function deleteAll() {
		if (sizeof ( $_POST ['ids'] > 0 )) {
			$model = ShopDiscountsQuery::create ()->findPks ( $_POST ['ids'] );
				
			if (! empty ( $model )) {
				foreach ( $model as $order ) {
					$order->delete ();
				}

				showMessage ( lang ( 'Discounts are removed', 'admin' ) );
			}
		}
	}
}
