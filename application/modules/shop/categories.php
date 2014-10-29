<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * @property SCategory $categoryModel
 */
class Categories extends ShopController {
	public $data;
	public $locale;
	public $perPage;
	public $templateFile;
	public $categoryModel;
	public $categoryPath;
	
	public function __construct() {
		parent::__construct();
		$this->load->module ( 'elasticsearch' );
		
		header('Content-Type: text/html; charset=utf-8');
		
		$this->initialize ();
	}
	
	/**
	 * Initialize all controller
	 */
	private function initialize(){
		/**
		 * Set Locale
		 */
		$this->locale = \MY_Controller::getCurrentLocale ();
		
// 		// ???
// 		if (! is_numeric ( $_GET ['per_page'] ) && $_GET ['per_page'] != NULL)
// 			$this->core->error_404 ();
		
		/**
		 * Remove locale/shop/category from request
		 */
		$this->categoryPath = "vse-shiny";

		/**
		 * Get SCategory Model
		 */
		$this->categoryModel = \SCategoryQuery::create ()->joinWithI18n ( $this->locale )->withColumn ( 'IF(H1 IS NOT NULL AND H1 NOT LIKE "", H1, Name)', 'title' )->filterByFullPath ( $this->categoryPath )->findOne ();
		
		/**
		 * Set userPerPage Products Count
		 */
		$this->perPage = (intval ( $_GET ['user_per_page'] )) ? intval ( $_GET ['user_per_page'] ) : $this->perPage = \ShopCore::app ()->SSettings->frontProductsPerPage;
		
		/**
		 * Set template file
		 */
		$this->templateFile = 'categories';		
		
		/**
		 * Geting products model from base
		 */
		$this->db->cache_on ();
		$productsBase = $this->elasticsearch->getProducts(( int ) $_GET ['per_page'], ( int ) $this->perPage);
		$this->db->cache_off ();

		$ids = $this->retrieveIDs($productsBase);
		
		/**
		 * Enable Query Caching
		 */
		$this->db->cache_on ();
		
		/**
		 * Prepare products model
		 */
		$products = \SProductsQuery::create ()->joinWithI18n()->joinProductVariant ()->withColumn ( 'IF(sum(shop_product_variants.stock) > 0, 1, 0)', 'allstock' )->groupById ()->joinBrand ()->distinct ()->orderBy ( 'allstock', \Criteria::DESC )->findPks( $ids );
		$this->db->cache_off ();
		
		/**
		 * Get total product count according to filter parameters
		 */
		$totalProducts = $this->elasticsearch->getProductCount();
		
		/**
		 * Choode order method (default or get)
		 */
		if (! $_GET ['order']) {
			$order_method = $this->getDefaultSort ();
		} elseif (! empty ( $_GET ['order'] )) {
			$order_method = $_GET ['order'];
		}
		
		/**
		 * For order method by get order
		 */
// 		if ($order_method) {
// 			$products = $products->globalSort ( $order_method );
// 		}
		
		/**
		 * Render category page
		 */
		$this->data = array (
			'title' => $this->categoryModel->virtualColumns ['title'],
			'category' => $this->categoryModel,
			'products' => $products,
			'model' => & $products,
			'totalProducts' => $totalProducts,
			'propertiesInCat' => $properties,
			'brands' => $brands,
			'order_method' => $order_method
		);

	}

	public function index() {
// 		if ($this->categoryModel->getFullPath() !== $this->categoryPath)
// 			redirect('shop/category/' . $this->categoryModel->getFullPath(), 'location', '301');

		/** Pagination */
		$this->load->library('Pagination');
		$this->pagination = new SPagination();
		$config['base_url'] = shop_url('categories/' . SProductsQuery::getFilterQueryString());
		$config['page_query_string'] = true;
		$config['total_rows'] = $this->data['totalProducts'];
		$config['per_page'] = $this->perPage;
		$config['first_link'] = '1';
		$config['next_link'] = '→';
		$config['prev_link'] = '←';
		$config['last_link'] = ceil($this->data['totalProducts'] / $this->perPage);

		$this->pagination->num_links = 3;
		$this->pagination->initialize($config);
		$this->data['pagination'] = $this->pagination->create_links();
		$this->data['page_number'] = $this->pagination->cur_page;

// 		if ($_GET['per_page'] % $this->perPage != 0)
// 			redirect($this->uri->uri_string(), 'location');

// 		/* Seo block (canonical) */
// 		if ((!empty($_GET) || strstr($_SERVER['REQUEST_URI'], '?')) && (!$_GET['per_page']))
// 			$this->template->registerCanonical(site_url($this->uri->uri_string()));

// 		//Назва категрії або (підкатегорії) + купить в Киеве по низкой цене в Интернет магазине Beautiful-cars

// 		/* Set meta tags */
// 		if ($this->categoryModel->getMetaTitle())
// 			$title = $this->categoryModel->getMetaTitle();
// 		else
// 			$title = $this->categoryModel->getName () . " купить в Киеве по низкой цене в Интернет магазине Beautiful-cars Украина";

// 		if ($this->categoryModel->getMetaDesc())
// 			$desc = $this->categoryModel->getMetaDesc();
// 		else
// 			$desc = $this->categoryModel->getName () . " покупайте по самых низких ценах с доставкой по Киеву и Украине, лучшие отзывы и характеристики.";

		$this->core->set_meta_tags($title, $this->categoryModel->makePageKeywords(), $desc, $this->pagination->cur_page, 1);

// 		/** Register event 'category:load' */
// 		\CMSFactory\Events::create()->registerEvent($this->data, 'category:load');
// 		\CMSFactory\Events::runFactory();

		/** Render template */
		$this->render($this->templateFile, $this->data);
		exit;
	}
	
	/**
	 * Retrieve all ids
	 * @param unknown_type $productsBase
	 */
	private function retrieveIDs($productsBase){
		$IDs = array();
		foreach($productsBase as $value){
			array_push($IDs, (( int ) $value->id) );
		}
		return $IDs;
	}
	
	/**
	 * Get default sort method
	 *
	 * @return type
	 */
	public function getDefaultSort() {
		if ($this->categoryModel) {
			$order_method = $this->categoryModel->getOrderMethod ();
			$order_from_db = $this->db->where ( 'id', ( int ) $order_method )->get ( 'shop_sorting' )->result_array ();
			$order = $order_from_db [0] ['get'];
		}

		if (! empty ( $order ))
			return $order;
		else {
			$order = $this->db->select ( 'shop_sorting.get' )->from ( 'shop_sorting' )->where ( 'shop_sorting.active', 1 )->order_by ( 'shop_sorting.pos' )->get ()->row ();
			return $order->get;
		}
	}

}

