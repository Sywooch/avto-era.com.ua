<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
/**
 * Search module
 * class Auth extends MY_Controller {
 * @author User
 *
 */
class Elasticsearch extends MY_Controller {
	public function __construct() {
		parent::__construct ();
		header("Access-Control-Allow-Orgin: *");
		header("Access-Control-Allow-Methods: *");
		header('Content-Type: application/json; charset=utf-8');
	}
	
	/**
	 * Making response
	 * @param unknown_type $data
	 * @param unknown_type $status
	 */
	public function response($data, $status = 200) {
		header("HTTP/1.1 " . $status . " " . $this->responseStatus($status));
		return json_encode($data);
	}
	
	/**
	 * Response status
	 * @param unknown_type $code
	 * @return string
	 */
	public function responseStatus($code) {
		$status = array(
				200 => 'OK',
				404 => 'Not Found',
				405 => 'Method Not Allowed',
				500 => 'Internal Server Error',
		);
		return ($status[$code])?$status[$code]:$status[500];
	}
	
	/**
	 * Retrieve products
	 */
	public function getProducts($offset = 0, $limit = 24){
		// Predefined wheels/tyres filter
		if(isset($_GET["product_type"]) && trim($_GET["product_type"]) == 'tyres'){
			$whereStr = $this->makeWhereSQL("shop_products.active = 1 AND shop_category_i18n.name <> 'Диски' AND ");
		}else if(isset($_GET["product_type"]) && trim($_GET["product_type"]) == 'wheels'){
			$whereStr = $this->makeWhereSQL("shop_products.active = 1 AND shop_category_i18n.name = 'Диски' AND ");
		}else{
			$whereStr = $this->makeWhereSQL("shop_products.active = 1 AND shop_category_i18n.name = 'Диски' AND ");
		}
		
		$sql = "SELECT shop_products.id AS id FROM `shop_products` shop_products
		JOIN `shop_products_i18n` ON shop_products_i18n.id = shop_products.id
		JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
		JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
		JOIN `shop_category` ON shop_category.id = shop_products.category_id
		JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
		JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
		JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
		JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id
		$whereStr
		GROUP BY shop_products_i18n.name
		ORDER BY shop_products_i18n.name
		LIMIT $offset, $limit";
		
		$query = $this->db->query($sql);
		$products = $query->result();
		
		return $products;
	}
	
	/**
	 * Retrieve products by avto
	 */
	public function getProductsByAvto($where, $offset = 0, $limit = 24){
		if(isset($_GET["product_type"]) && trim($_GET["product_type"]) == 'tyres'){
			$where = $where . " AND shop_products.active = 1 AND shop_category_i18n.name <> 'Диски' ";
		}else if(isset($_GET["product_type"]) && trim($_GET["product_type"]) == 'wheels'){
			$where = $where . " AND shop_products.active = 1 AND shop_category_i18n.name = 'Диски' ";
		}
		
		
		
		$sql = "SELECT shop_products.id AS id FROM `shop_products` shop_products
		JOIN `shop_products_i18n` ON shop_products_i18n.id = shop_products.id
		JOIN `shop_category` ON shop_category.id = shop_products.category_id
		JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
		$where 
		GROUP BY shop_products_i18n.name
		ORDER BY shop_products_i18n.name
		LIMIT $offset, $limit";
		
		$query = $this->db->query($sql);
		$products = $query->result();
		
		return $products;
	}
	
	/**
	 * Retrieve COUNT products by avto
	 */
	public function getProductsByAvtoCount($where){
		if(isset($_GET["product_type"]) && trim($_GET["product_type"]) == 'tyres'){
			$where = $where . " AND shop_products.active = 1 AND shop_category_i18n.name <> 'Диски' ";
		}else if(isset($_GET["product_type"]) && trim($_GET["product_type"]) == 'wheels'){
			$where = $where . " AND shop_products.active = 1 AND shop_category_i18n.name = 'Диски' ";
		}
		
		$sql = "SELECT shop_products.id AS id FROM `shop_products` shop_products
		JOIN `shop_products_i18n` ON shop_products_i18n.id = shop_products.id
		JOIN `shop_category` ON shop_category.id = shop_products.category_id
		JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
		$where
		GROUP BY shop_products_i18n.name
		ORDER BY shop_products_i18n.name";
	
		$query = $this->db->query($sql);
		$num_rows = $query->num_rows();
	
		return $num_rows;
	}
	
	/**
	 * Retrieve products
	 */
	public function getProductCount(){
		// Predefined wheels/tyres filter
		if(isset($_GET["product_type"]) && trim($_GET["product_type"]) == 'tyres'){
			$whereStr = $this->makeWhereSQL("shop_products.active = 1 AND shop_category_i18n.name <> 'Диски' AND ");
		}else if(isset($_GET["product_type"]) && trim($_GET["product_type"]) == 'wheels'){
			$whereStr = $this->makeWhereSQL("shop_products.active = 1 AND shop_category_i18n.name = 'Диски' AND ");
		}else{
			$whereStr = $this->makeWhereSQL("shop_products.active = 1 AND shop_category_i18n.name = 'Диски' AND ");
		}
	
		$sql = "SELECT * FROM `shop_products` shop_products
		JOIN `shop_products_i18n` ON shop_products_i18n.id = shop_products.id
		JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
		JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
		JOIN `shop_category` ON shop_category.id = shop_products.category_id
		JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
		JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
		JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
		JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id
		$whereStr
		GROUP BY shop_products_i18n.name
		ORDER BY shop_products_i18n.name";
	
		$query = $this->db->query($sql);
		$num_rows = $query->num_rows();
	
		return $num_rows;
	}
	
	// #############################################################################################
	// ######################################TIRES#################################################
	// #############################################################################################
	
	/**
	 * Filter by brand
	 * @param unknown_type $cid
	 * @param unknown_type $nin
	 * @return boolean|unknown
	 */
	public function getBrands() {
		$whereStr = $this->makeWhereSQL("");
		$sql = "SELECT shop_brands_i18n.id AS id, shop_brands_i18n.name AS name FROM `shop_products` shop_products 
			JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
			JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
			JOIN `shop_category` ON shop_category.id = shop_products.category_id
			JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id 	
			JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
			JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
			JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id 
			$whereStr
			GROUP BY shop_brands_i18n.name
			ORDER BY shop_brands_i18n.name";
		
		$query = $this->db->query($sql);
		$brands = $query->result_array();
		
		return $brands;
	}
	
	/**
	 * Retrieve type of tires
	 */
	public function getTypeTires() {
		//$sql = "SELECT * FROM `shop_category_i18n` shop_category_i18n WHERE shop_category_i18n.id IN (SELECT DISTINCT shop_category.id FROM `shop_category` shop_category INNER JOIN `shop_products` shop_products ON shop_category.id = shop_products.brand_id) AND shop_category_i18n.locale = 'ru' AND shop_category_i18n.id <> '102' GROUP BY(shop_category_i18n.name) ORDER BY shop_category_i18n.name";
		$whereStr = $this->makeWhereSQL("");
		
		$sql = "SELECT shop_category_i18n.id AS id, shop_category_i18n.name AS name FROM `shop_products` shop_products
		JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
		JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
		JOIN `shop_category` ON shop_category.id = shop_products.category_id
		JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
		JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
		JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
		JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id
		$whereStr
		GROUP BY shop_category_i18n.name
		ORDER BY shop_category_i18n.name";
		
		
		$query = $this->db->query($sql);
		$types = $query->result_array();
		
		return $types;
	}
	
	/**
	 * Retrieve type of tires
	 */
	public function getSeasons() {
		$whereStr = $this->makeWhereSQL("shop_product_properties_i18n.name='Сезонность' AND ");
	
		$sql = "SELECT shop_product_properties_data.value AS id, shop_product_properties_data.value AS value FROM `shop_products` shop_products
		JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
		JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
		JOIN `shop_category` ON shop_category.id = shop_products.category_id
		JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
		JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
		JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
		JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id
		$whereStr
		GROUP BY shop_product_properties_data.value
		ORDER BY shop_product_properties_data.value";
	
	
		$query = $this->db->query($sql);
		$types = $query->result_array();
	
		return $types;
	}
	
	/**
	 * Return width of tires
	 */
	public function getWidth() {
		$whereStr = $this->makeWhereTyresSQL();
		
		$sql = "SELECT shop_product_properties_data.value AS id, shop_product_properties_data.value AS value FROM `shop_products` shop_products
		JOIN `shop_products_i18n` ON shop_products_i18n.id = shop_products.id 
		JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
		JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
		JOIN `shop_category` ON shop_category.id = shop_products.category_id
		JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
		$whereStr
		GROUP BY shop_products_i18n.name
		ORDER BY shop_products_i18n.name";
		
		var_dump($sql);
		
// 		$query = $this->db->query($sql);
// 		$widths = $query->result_array();
		
		return $widths;
	}
	
	/**
	 * Return height of tires
	 */
	public function getHeight() {
		$whereStr = $this->makeWhereSQL("shop_product_properties_i18n.name='Профиль' AND ");
		$sql = "SELECT shop_product_properties_data.value AS id, shop_product_properties_data.value AS value FROM `shop_products` shop_products
		JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
		JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
		JOIN `shop_category` ON shop_category.id = shop_products.category_id
		JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
		JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
		JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
		JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id
		$whereStr
		GROUP BY shop_product_properties_data.value
		ORDER BY shop_product_properties_data.value";
		$query = $this->db->query($sql);
		$heights = $query->result_array();
	
		return $heights;
	}
	
	/**
	 * Return height of tires
	 */
	public function getDiameter() {
		$whereStr = $this->makeWhereSQL("shop_product_properties_i18n.name='Диаметр' AND ");
		
		$sql = "SELECT shop_product_properties_data.value AS id, shop_product_properties_data.value AS value FROM `shop_products` shop_products
		JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
		JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
		JOIN `shop_category` ON shop_category.id = shop_products.category_id
		JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
		JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
		JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
		JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id
		$whereStr
		GROUP BY shop_product_properties_data.value
		ORDER BY shop_product_properties_data.value";
		
		$query = $this->db->query($sql);
		$diameters = $query->result_array();
	
		return $diameters;
	}
	
	// #############################################################################################
	// ######################################wheels#################################################
	// #############################################################################################
	
	/**
	 * Return wheel brands
	 */
	public function getWheelBrands(){
		$whereStr = $this->makeWhereSQL("shop_category_i18n.name='Диски' AND ");
		
		$sql = "SELECT shop_brands_i18n.id AS id, shop_brands_i18n.name AS name FROM `shop_products` shop_products
		JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
		JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
		JOIN `shop_category` ON shop_category.id = shop_products.category_id
		JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
		JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
		JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
		JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id
		$whereStr
		GROUP BY shop_brands_i18n.name
		ORDER BY shop_brands_i18n.name";
		
		$query = $this->db->query($sql);
		$wheelBrands = $query->result_array();
		
		return $wheelBrands;
	}
	
	/**
	 * Get Wheel types
	 */
	public function getWheelType(){
		$whereStr = $this->makeWhereSQL("shop_category_i18n.name='Диски' AND shop_product_properties_i18n.name='Тип диска' AND ");
		
		$sql = "SELECT shop_product_properties_data.value AS id, shop_product_properties_data.value AS value FROM `shop_products` shop_products
		JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
		JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
		JOIN `shop_category` ON shop_category.id = shop_products.category_id
		JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
		JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
		JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
		JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id
		$whereStr
		GROUP BY shop_product_properties_data.value
		ORDER BY shop_product_properties_data.value";
		
		$query = $this->db->query($sql);
		$wheelType = $query->result_array();
		
		return $wheelType;
	}
	
	/**
	 * Get Wheel diameter
	 */
	public function getWheelDiameter(){
		$whereStr = $this->makeWhereSQL("shop_category_i18n.name='Диски' AND shop_product_properties_i18n.name='Диаметр диска' AND ");
		
		$sql = "SELECT shop_product_properties_data.value AS id, shop_product_properties_data.value AS value FROM `shop_products` shop_products
		JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
		JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
		JOIN `shop_category` ON shop_category.id = shop_products.category_id
		JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
		JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
		JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
		JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id
		$whereStr
		GROUP BY shop_product_properties_data.value
		ORDER BY shop_product_properties_data.value";
		
		$query = $this->db->query($sql);
		$wheelDiameter = $query->result_array();
		
		return $wheelDiameter;
	}
	
	/**
	 * Get wheel pcd
	 *
	 */
	public function getWheelPCDOne(){
		$whereStr = $this->makeWhereSQL("shop_category_i18n.name='Диски' AND shop_product_properties_i18n.name='PCD1' AND ");
		
		$sql = "SELECT shop_product_properties_data.value AS id, shop_product_properties_data.value AS value FROM `shop_products` shop_products
		JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
		JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
		JOIN `shop_category` ON shop_category.id = shop_products.category_id
		JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
		JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
		JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
		JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id
		$whereStr
		GROUP BY shop_product_properties_data.value
		ORDER BY shop_product_properties_data.value";
		
		$query = $this->db->query($sql);
		$wheelPCD = $query->result_array();
		
		return $wheelPCD;
		
	}
	
	/**
	 * Get Wheel  SUB hub
	 */
	public function getWheelVyletet(){
		$whereStr = $this->makeWhereSQL("shop_category_i18n.name='Диски' AND shop_product_properties_i18n.name='Вылет (ET)' AND ");
		
		$sql = "SELECT shop_product_properties_data.value AS id, shop_product_properties_data.value AS value FROM `shop_products` shop_products
		JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
		JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
		JOIN `shop_category` ON shop_category.id = shop_products.category_id
		JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
		JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
		JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
		JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id
		$whereStr
		GROUP BY shop_product_properties_data.value
		ORDER BY shop_product_properties_data.value";
		
		$query = $this->db->query($sql);
		$wheelVyletet = $query->result_array();
		
		return $wheelVyletet;
	}
	
	/**
	 * Get Wheel hub
	 */
	public function getWheelHub(){
		$whereStr = $this->makeWhereSQL("shop_category_i18n.name='Диски' AND shop_product_properties_i18n.name='Диаметр ступицы (DIA)' AND ");
		
		$sql = "SELECT shop_product_properties_data.value AS id, shop_product_properties_data.value AS value FROM `shop_products` shop_products
		JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
		JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
		JOIN `shop_category` ON shop_category.id = shop_products.category_id
		JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
		JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
		JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
		JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id
		$whereStr
		GROUP BY shop_product_properties_data.value
		ORDER BY shop_product_properties_data.value";
		
		$query = $this->db->query($sql);
		$wheelHub = $query->result_array();
		
		return $wheelHub;
	}
	
	// #############################################################################################
	// ######################################BRANDS#################################################
	// #############################################################################################
	/**
	 * Get auto brands
	 */
	public function getAutoBrands(){
		$whereStr = $this->makeWhereSQL();
		
		$sql = "SELECT podbor_shini_i_diski.vendor AS id, podbor_shini_i_diski.vendor AS value FROM `podbor_shini_i_diski`
		$whereStr
		GROUP BY podbor_shini_i_diski.vendor 
		ORDER BY podbor_shini_i_diski.vendor";
		
		$query = $this->db->query($sql);
		$autoBrands = $query->result_array();
		
		return $autoBrands;
	}
	
	/**
	 * Get auto models
	 */
	public function getAutoModels(){
		$whereStr = $this->makeWhereSQL();
		
		$sql = "SELECT podbor_shini_i_diski.car AS id, podbor_shini_i_diski.car AS value FROM `podbor_shini_i_diski`
		$whereStr
		GROUP BY podbor_shini_i_diski.car
		ORDER BY podbor_shini_i_diski.car";
		
		$query = $this->db->query($sql);
		$autoModels = $query->result_array();
		
		return $autoModels;
	}
	
	/**
	 * Get auto years
	 */
	public function getAutoYears(){
		$whereStr = $this->makeWhereSQL();
	
		$sql = "SELECT podbor_shini_i_diski.year AS id, podbor_shini_i_diski.year AS value FROM `podbor_shini_i_diski`
		$whereStr
		GROUP BY podbor_shini_i_diski.year
		ORDER BY podbor_shini_i_diski.year";
	
		$query = $this->db->query($sql);
		$autoYears = $query->result_array();
	
		return $autoYears;
	}
	
	/**
	 * Get auto years
	 */
	public function getAutoModification(){
		$whereStr = $this->makeWhereSQL();
	
		$sql = "SELECT podbor_shini_i_diski.modification AS id, podbor_shini_i_diski.modification AS value FROM `podbor_shini_i_diski`
		$whereStr
		GROUP BY podbor_shini_i_diski.modification
		ORDER BY podbor_shini_i_diski.modification";
	
		$query = $this->db->query($sql);
		$autoModification = $query->result_array();
	
		return $autoModification;
	}
	 
	/**
	 * Get auto results
	 */
	public function getAutoResults(){
		$whereStr = $this->makeWhereSQL();
		
		if(isset($_GET["product_type"]) && trim($_GET["product_type"]) == 'tyres'){
			$sql = "SELECT podbor_shini_i_diski.zamen_shini AS zamen FROM `podbor_shini_i_diski`
			$whereStr
			GROUP BY podbor_shini_i_diski.zamen_shini
			ORDER BY podbor_shini_i_diski.zamen_shini";
		}else if(isset($_GET["product_type"]) && trim($_GET["product_type"]) == 'wheels'){
			$sql = "SELECT podbor_shini_i_diski.zamen_diskov AS zamen FROM `podbor_shini_i_diski`
			$whereStr
			GROUP BY podbor_shini_i_diski.zamen_diskov
			ORDER BY podbor_shini_i_diski.zamen_diskov";
		}else{
			$sql = "SELECT podbor_shini_i_diski.zamen_shini AS zamen FROM `podbor_shini_i_diski`
			$whereStr
			GROUP BY podbor_shini_i_diski.zamen_shini
			ORDER BY podbor_shini_i_diski.zamen_shini";
		}
	
		$query = $this->db->query($sql);
		$autoResults = $query->result_array();
	
		return $autoResults;
	}
	
	private function makeWhereSQL($advWhere){
		$whereStr = "";
		foreach(array_keys($_GET) as $index => $keyValue){
			// Filter exclude
			if($keyValue != "_" && $keyValue != "product_type" && $keyValue != "per_page"){
				if($_GET[$keyValue] != ""){
					$keyValueUpdated = str_replace("__",".",$keyValue);
					// If numeric
					if( is_numeric(substr($keyValueUpdated, -1)) ){
						$keyValueUpdated = substr($keyValueUpdated, 0, strlen($keyValueUpdated) - 1);
					}
					
					$whereStr .= "$keyValueUpdated = '$_GET[$keyValue]' AND ";
				}
			}
		}
		
		if( strlen($whereStr) ){
			if(strlen($advWhere)){
				$whereStr = "where " . $advWhere . substr($whereStr, 0, strlen($whereStr) - 4);
			}else{
				$whereStr = "where " . substr($whereStr, 0, strlen($whereStr) - 4);
			}
		}else{
			if(strlen($advWhere)){
				$whereStr = "where " . substr($advWhere, 0, strlen($whereStr) - 4);
			}	
		}
		
		return  $whereStr;
	}
	
	/**
	 * Prepared where sql
	 * AND shop_products_i18n.name REGEXP '[0-9]*\/[0-9]*\.R[0-9]*'
	 * (185/65 R14) 
	 * @param unknown_type $advWhere
	 */
	private function makeWhereTyresSQL($advWhere){
		$tyresProperties = "shop_products_i18n.name REGEXP ':width\/:height\.R:diameter' AND";
		$parameters = array();
		
		$whereStr = "";
		foreach(array_keys($_GET) as $index => $keyValue){
			if($keyValue == ":width" || $keyValue == ":height" || $keyValue == ":diameter"){
				if($_GET[$keyValue] != ""){
					$parameters[$keyValue] = $_GET[$keyValue];
				}else{
					$parameters[$keyValue] = "[0-9]*";
				}	
				continue;
			}						
			// Filter exclude
			if($keyValue != "_" && $keyValue != "product_type" && $keyValue != "per_page"){
				if($_GET[$keyValue] != ""){
					$keyValueUpdated = str_replace("__",".",$keyValue);
					// If numeric
					if( is_numeric(substr($keyValueUpdated, -1)) ){
						$keyValueUpdated = substr($keyValueUpdated, 0, strlen($keyValueUpdated) - 1);
					}
						
					$whereStr .= "$keyValueUpdated = '$_GET[$keyValue]' AND ";
				}
			}
		}
	
		$advWhere .= str_replace(array_keys($parameters), $parameters, $tyresProperties);
		
		// recombining
		if( strlen($whereStr) ){
			if(strlen($advWhere)){
				$whereStr = "where " . $advWhere . substr($whereStr, 0, strlen($whereStr) - 4);
			}else{
				$whereStr = "where " . substr($whereStr, 0, strlen($whereStr) - 4);
			}
		}else{
			if(strlen($advWhere)){
				$whereStr = "where " . substr($advWhere, 0, strlen($whereStr) - 4);
			}
		}
	
		return  $whereStr;
	}
}