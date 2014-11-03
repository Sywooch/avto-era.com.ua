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
		
		/**
		 * Request entity diski/vse-shiny
		 */
		
		if(isset($_GET["product_type"]) && trim($_GET["product_type"]) == 'tyres'){
			$this->categoryPath = "vse-shiny";
		}else if(isset($_GET["product_type"]) && trim($_GET["product_type"]) == 'wheels'){
			$this->categoryPath = "diski";
		}else{
			$this->categoryPath = "vse-shiny";
		}
		
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

	}

	public function index() {
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
		
		$this->renderResults($ids, $products, $totalProducts, 'categories/');
	}
	
	
	/**
	 * Search by avto brands
	 */
	public function searchByAvto(){
		$type_retrieved = array();
		$types = $this->elasticsearch->getAutoResults();		
		
		foreach($types as $type){
			// string(21) "235/35 R18#255/35 R18" => |
			$type['zamen'] = str_replace("#", "|", $type['zamen']);
			$itemValue = $type['zamen'];
			
			$pieces = explode("|", $itemValue );
			
			foreach($pieces as $piecesValue){
				if(!in_array($piecesValue, $type_retrieved, true)){
        			array_push($type_retrieved, $piecesValue . "%'");
    			}
			}
		}
		// WHERE tutorial_author LIKE '%jay'
		$sqlWhere = "WHERE shop_products_i18n.name LIKE '%" . implode ( " OR shop_products_i18n.name LIKE '%" , $type_retrieved );
		
		
		$this->db->cache_on ();
		$productsBase = $this->elasticsearch->getProductsByAvto($sqlWhere, ( int ) $_GET ['per_page'], ( int ) $this->perPage);
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
		$totalProducts = $this->elasticsearch->getProductsByAvtoCount($sqlWhere);
		
		$this->renderResults($ids, $products, $totalProducts, 'categories/searchByAvto');
			
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
	 * Render results with paginator
	 * @param unknown_type $ids
	 */
	private function renderResults($ids, $products, $totalProducts, $path){
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
		
		/** Pagination */
		$this->load->library('Pagination');
		$this->pagination = new SPagination();
		$config['base_url'] = shop_url($path . SProductsQuery::getFilterQueryString());
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

		$this->core->set_meta_tags($title, $this->categoryModel->makePageKeywords(), $desc, $this->pagination->cur_page, 1);

		/** Render template */
		$this->render($this->templateFile, $this->data);
		exit;
	}
	
	/**
	 * Get default sort method
	 *
	 * @return type
	 */
	private function getDefaultSort() {
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

