<?php

/**
 * ShopAdminSearch search products
 *
 */
class ShopAdminSearch extends ShopAdminController {
	public $perPage = 5;
	public function __construct() {
		parent::__construct ();

		if (! $_COOKIE ['per_page']) {
			setcookie ( "per_page", ShopCore::app ()->SSettings->adminProductsPerPage, time () + 604800, "/", $_SERVER ['HTTP_HOST'] );
			$this->perPage = ShopCore::app ()->SSettings->adminProductsPerPage;
		} else
			$this->perPage = $_COOKIE ['per_page'];

		$this->defaultLanguage = getDefaultLanguage ();
	}

	/**
	 * Display search form
	 *
	 * @return void
	 */
	public function per_page_cookie() {
		setcookie ( "per_page", ( int ) $_GET ['count_items'], time () + 604800, "/", $_SERVER ['HTTP_HOST'] );
	}
	public function index() {
		$model = SProductsQuery::create ()->joinWithI18n ( \MY_Controller::defaultLocale (), Criteria::LEFT_JOIN )->addSelectModifier ( 'SQL_CALC_FOUND_ROWS' )->leftJoinProductVariant ();

		if (isset ( $_GET ['WithoutImages'] ) && (( int ) $_GET ['WithoutImages'] == 1))
			$model = $model->where ( 'shop_product_variants.mainImage="" or shop_product_variants.mainImage IS NULL' );
		// $model = $model->where('');

		if (isset ( $_GET ['CategoryId'] ) && $_GET ['CategoryId'] > 0) {
			$category = SCategoryQuery::create ()->filterById ( ( int ) $_GET ['CategoryId'] )->findOne ();
			if ($category)
				$model = $model->filterByCategory ( $category );
		}

		if (isset ( $_GET ['filterID'] ) && $_GET ['filterID'] > 0)
			$model = $model->filterById ( ( int ) $_GET ['filterID'] );

		if (isset ( $_GET ['number'] ) && $_GET ['number'] != '') {
			$model = $model->where ( 'ProductVariant.Number = ?', $_GET ['number'] );
		}

		if (! empty ( $_GET ['text'] )) {
			$text = $_GET ['text'];
			if (! strpos ( $text, '%' ))
				$text = '%' . $text . '%';
				
			$model = $model->useI18nQuery ( $this->defaultLanguage ['identif'] )->where ( 'SProductsI18n.Name LIKE ?', $text )->endUse ()->orWhere ( 'ProductVariant.Number = ?', $text );
		}

		if (isset ( $_GET ['min_price'] ) && $_GET ['min_price'] > 0) {
			$model = $model->where ( 'ProductVariant.Price >= ?', $_GET ['min_price'] );
		}

		if (isset ( $_GET ['max_price'] ) && $_GET ['max_price'] > 0) {
			$model = $model->where ( 'ProductVariant.Price <= ?', $_GET ['max_price'] );
		}

		if ($_GET ['Active'] == 'true')
			$model = $model->filterByActive ( true );
		elseif ($this->input->get ( 'Active' ) == 'false')
		$model = $model->filterByActive ( false );

		if (isset ( $_GET ['s'] )) {
			if ($_GET ['s'] == 'Hit')
				$model = $model->filterByHit ( true );
				
			if ($_GET ['s'] == 'Hot')
				$model = $model->filterByHot ( true );
				
			if ($_GET ['s'] == 'Action')
				$model = $model->filterByAction ( true );
		}

		if (isset ( $_GET ['orderMethod'] ) && $_GET ['orderMethod'] != '') {
			$order_methods = array (
					'Id',
					'Name',
					'CategoryId',
					'Price',
					'Active',
					'Reference'
			);
			if (in_array ( $_GET ['orderMethod'], $order_methods )) {
				switch ($_GET ['orderMethod']) {
					case 'Name' :
						$model = $model->useSProductsI18nQuery ()->orderByName ( $_GET ['order'] )->endUse ();
						break;
					case 'Price' :
						$model = $model->useProductVariantQuery ()->orderByPrice ( $_GET ['order'] )->endUse ();
						break;
					case 'Reference' :
						$model = $model->useProductVariantQuery ()->orderByNumber ( $_GET ['order'] )->endUse ();
						break;
					default :
						$model = $model->orderBy ( $_GET ['orderMethod'], $_GET ['order'] );
						break;
				}
			}
		}

		if (sizeof ( $_GET ['productProperties'] ) > 0) {
			$combine = $this->_buildCombinatorArray ( $_GET ['productProperties'] );
			if ($combine !== false)
				$model = $model->combinator ( $combine );
		}

		$model = $model->offset ( ( int ) $_GET ['per_page'] )->limit ( $this->perPage )->distinct ()->find ();

		$totalProducts = $this->getTotalRow ();

		$model->populateRelation ( 'ProductVariant' );
		$model->populateRelation ( 'MainCategory' );

		// to save filter query

		if (! empty ( $_GET )) {
			session_start ();
			$_SESSION ['ref_url'] = '?' . http_build_query ( $_GET );
		} else {
			unset ( $_SESSION ['ref_url'] );
		}

		// Create pagination
		$this->load->library ( 'pagination' );
		$config ['base_url'] = '/admin/components/run/shop/search/index/?' . http_build_query ( $_GET );
		// $config['base_url'] = site_url('admin/components/run/shop/search/index/?'.http_build_query($_GET));
		$config ['container'] = 'shopAdminPage';
		$config ['page_query_string'] = true;
		$config ['uri_segment'] = 8;
		$config ['total_rows'] = $totalProducts;
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
		$config ['last_tag_open'] = '<li>';
		$config ['last_tag_close'] = '</li>';
		$config ['first_tag_open'] = '<li>';
		$config ['first_tag_close'] = '</li>';

		$this->pagination->num_links = 6;
		$this->pagination->initialize ( $config );

		if ($_GET ['CategoryId'] > 0) {
			$categoryModel = SCategoryQuery::create ()->findPk ( $_GET ['CategoryId'] );
			if ($categoryModel !== null) {
				$renderer = ShopCore::app ()->SPropertiesRenderer;
				$renderer->useMultipleSelect = true;
				$this->template->assign ( 'fieldsForm', $renderer->renderAdmin ( $categoryModel->getId () ) );
			}
		}

		$this->render ( 'list', array (

				// 'form'=>$form,
				'products' => $model,

				// 'categories'=>$categories,
				'categories' => ShopCore::app ()->SCategoryTree->getTree (),
				'totalProducts' => $totalProducts,
				'pagination' => $this->pagination->create_links_ajax (),
				'filter_url' => http_build_query ( $_GET ),
				'cur_uri_str' => base64_encode ( $this->uri->uri_string () . '?' . http_build_query ( $_GET ) )
		) );
	}
	public function save_positions_variant() {
		$positions = $_POST ['positions'];

		if (sizeof ( $positions ) == 0) {
			return false;
		}

		foreach ( $positions as $key => $val ) {
			$query = "UPDATE `shop_product_variants` SET `position`=" . $key . " WHERE `id`=" . ( int ) $val . "; ";
			$this->db->query ( $query );
		}
		showMessage ( lang ( 'Positions saved', 'admin' ) );
	}
	protected function _buildCombinatorArray(array $data) {
		$resultData = array (); // Array containing data for combinator
		foreach ( $data as $fieldId => $fieldValue ) {
			// Load field
			$field = SPropertiesQuery::create ()->filterByActive ( true )->findPk ( $fieldId );
				
			if ($field !== null && ! empty ( $fieldValue )) {
				if (is_array ( $fieldValue ))
					$resultData [$fieldId] = $fieldValue;
				else
					$resultData [$fieldId] [] = $fieldValue;
			}
		}

		if (! empty ( $resultData ))
			return $resultData;
		else
			return false;
	}
	private function _advanced_search_by_term($term, $fullData = false) {
		$model = SProductsQuery::create ()->leftJoinProductVariant ();

		$model = $model->useI18nQuery ( $this->defaultLanguage ['identif'] )->where ( 'SProductsI18n.Name LIKE ?', '%' . $term . '%' )->endUse ()->orWhere ( 'ProductVariant.Number = ?', '%' . $term . '%' )->distinct ()->find ();

		if ($fullData)
			$select = '*';
		else
			$select = 'username, phone, email';

		if (count ( explode ( " / ", $term ) ) > 1)
			$term = explode ( " / ", $term );
		if (is_array ( $term )) {
			$users = $this->db->select ( $select )->where ( "username like '%$term[0]%'" )->or_where ( "phone LIKE '%$term[1]%'" )->or_where ( "email LIKE '%$term[2]%'" )->get ( 'users' )->result_array ();
		} else {
			$users = $this->db->select ( $select )->where ( "username like '%$term%'" )->or_where ( "phone LIKE '%$term%'" )->or_where ( "email LIKE '%$term%'" )->get ( 'users' )->result_array ();
		}
		return array (
				'users' => $users,
				'model' => $model
		);
	}
	public function autocomplete() {
		if ($this->input->get ( 'term' ))
			if ($this->ajaxRequest) {
			$tokens = array ();

			$term = $this->input->get ( 'term' );

			extract ( $this->_advanced_search_by_term ( $term ) );

			foreach ( $users as $u ) {
				if (strlen ( trim ( $u ['username'] ) ))
					$tokens [] = $u ['username'];
				if (strlen ( trim ( $u ['phone'] ) ))
					$tokens [] = $u ['phone'];
				if (strlen ( trim ( $u ['email'] ) ))
					$tokens [] = $u ['email'];
			}

			foreach ( $model as $p ) {
				if (strlen ( trim ( $p->getName () ) ))
					$tokens [] = $p->getName ();
				if (strlen ( trim ( $p->getFirstVariant ()->getNumber () ) ))
					$tokens [] = $p->getFirstVariant ()->getNumber ();
			}

			echo json_encode ( array_values ( array_unique ( $tokens ) ) );
		} else
			redirect ( '/admin/components/run/shop/dashboard' );
	}
	public function advanced() {
		$data = trim ( $this->input->get ( 'q' ) );
		$data = strip_tags ( $data );
		$data = htmlspecialchars ( $data, ENT_QUOTES );

		$searchText = $this->security->xss_clean ( $data );

		if (strlen ( $searchText ))
			$this->render ( 'advanced', $this->_advanced_search_by_term ( $searchText, true ) );
		else {
			redirect ( $_SERVER ['HTTP_REFERER'] );
		}
	}

	/**
	 * Display custom fields form.
	 *
	 * @param
	 *        	$categoryId
	 * @return void
	 */
	public function renderCustomFields($categoryId = null) {
		$renderer = ShopCore::app ()->SPropertiesRenderer;
		$renderer->useMultipleSelect = true;
		echo $renderer->renderAdmin ( $categoryId );
	}
	private function getTotalRow() {
		$connection = Propel::getConnection ();
		$statement = $connection->prepare ( 'SELECT FOUND_ROWS() as `number`' );
		$statement->execute ();
		$resultset = $statement->fetchAll ();
		return $resultset [0] ['number'];
	}
}

