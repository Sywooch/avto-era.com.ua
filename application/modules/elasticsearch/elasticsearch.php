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
		$brands = $query->result_array ();
		
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
		$types = $query->result_array ();
		
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
		$types = $query->result_array ();
	
		return $types;
	}
	
	/**
	 * Return width of tires
	 */
	public function getWidth() {
		$whereStr = $this->makeWhereSQL("shop_product_properties_i18n.name='Ширина шины' AND ");
		
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
		$widths = $query->result_array ();
		
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
		$heights = $query->result_array ();
	
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
		$diameters = $query->result_array ();
	
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
		$wheelBrands = $query->result_array ();
		
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
		$wheelType = $query->result_array ();
		
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
		$wheelDiameter = $query->result_array ();
		
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
		$wheelPCD = $query->result_array ();
		
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
		$wheelVyletet = $query->result_array ();
		
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
		$wheelHub = $query->result_array ();
		
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
		
		$sql = "SELECT podbor_shini_i_diski.id AS id, podbor_shini_i_diski.vendor AS value FROM `podbor_shini_i_diski`
		$whereStr
		GROUP BY podbor_shini_i_diski.vendor 
		ORDER BY podbor_shini_i_diski.vendor";
		
		$query = $this->db->query($sql);
		$autoBrands = $query->result_array ();
		
		return $autoBrands;
	}
	 
	private function makeWhereSQL($advWhere){
		$whereStr = "";
		foreach(array_keys($_GET) as $index => $keyValue){
			if($keyValue != "_"){
				$keyValueUpdated = str_replace("__",".",$keyValue);
				// If numeric
				if( is_numeric(substr($keyValueUpdated, -1)) ){
					$keyValueUpdated = substr($keyValueUpdated, 0, strlen($keyValueUpdated) - 1);
				}
				
				$whereStr .= "$keyValueUpdated = '$_GET[$keyValue]' AND ";
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
}