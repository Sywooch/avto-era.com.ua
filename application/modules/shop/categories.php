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
		
// 		/**
// 		 * Remove locale/shop/category from request
// 		 */
// 		$this->categoryPath = ($this->locale == $this->uri->segments [1]) ? implode ( '/', array_slice ( $this->uri->segments, 3 ) ) : implode ( '/', array_slice ( $this->uri->segments, 2 ) );
		
// 		/**
// 		 * Get SCategory Model
// 		 */
// 		$this->categoryModel = \SCategoryQuery::create ()->joinWithI18n ( $this->locale )->withColumn ( 'IF(H1 IS NOT NULL AND H1 NOT LIKE "", H1, Name)', 'title' )->filterByFullPath ( $this->categoryPath )->filterByActive ( TRUE )->findOne ();
// 		var_dump($this->categoryModel);
		
		/**
		 * Set userPerPage Products Count
		 */
		$this->perPage = (intval ( $_GET ['user_per_page'] )) ? intval ( $_GET ['user_per_page'] ) : $this->perPage = \ShopCore::app ()->SSettings->frontProductsPerPage;
		
		/**
		 * Set template file
		 */
		$this->templateFile = 'categories';
		
		/**
		 * Get total product count according to filter parameters
		 */
		$totalProducts = $this->elasticsearch->getProductCount();
		
		/**
		 * Geting products model from base
		 */
		$this->db->cache_on ();
		$products = $this->elasticsearch->getProducts(( int ) $_GET ['per_page'], ( int ) $this->perPage);
		$this->db->cache_off ();
		
		/**
		 * Render category page
		 */
		$this->data = array (
			'title' => "category tytle",
			'category' => null,
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

// 		/** Pagination */
// 		$this->load->library('Pagination');
// 		$this->pagination = new SPagination();
// 		$config['base_url'] = shop_url('category/' . $this->categoryModel->getFullPath() . SProductsQuery::getFilterQueryString());
// 		$config['page_query_string'] = true;
// 		$config['total_rows'] = $this->data['totalProducts'];
// 		$config['per_page'] = $this->perPage;
// 		$config['first_link'] = '1';
// 		$config['next_link'] = '→';
// 		$config['prev_link'] = '←';
// 		$config['last_link'] = ceil($this->data['totalProducts'] / $this->perPage);

// 		$this->pagination->num_links = 3;
// 		$this->pagination->initialize($config);
// 		$this->data['pagination'] = $this->pagination->create_links();
// 		$this->data['page_number'] = $this->pagination->cur_page;

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

// 		$this->core->set_meta_tags($title, $this->categoryModel->makePageKeywords(), $desc, $this->pagination->cur_page, 1);

// 		/** Register event 'category:load' */
// 		\CMSFactory\Events::create()->registerEvent($this->data, 'category:load');
// 		\CMSFactory\Events::runFactory();

		/** Render template */
		$this->render($this->templateFile, $this->data);
		exit;
	}
	
	/**
	 * Get total rows
	 *
	 * @return int
	 */
// 	private function getTotalRow() {
// 		$connection = \Propel::getConnection ();
// 		$statement = $connection->prepare ( 'SELECT FOUND_ROWS() as `number`' );
// 		$statement->execute ();
// 		$resultset = $statement->fetchAll ();
// 		return $resultset [0] ['number'];
// 	}

}

