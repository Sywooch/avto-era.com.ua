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
	 * Filter by brand
	 * @param unknown_type $cid
	 * @param unknown_type $nin
	 * @return boolean|unknown
	 */
	public function getAllBrand() {
		$sql = "SELECT * FROM `shop_brands_i18n` shop_brands_i18n WHERE shop_brands_i18n.id IN (SELECT DISTINCT shop_brands.id FROM `shop_brands` shop_brands INNER JOIN `shop_products` shop_products ON shop_brands.id = shop_products.brand_id) AND shop_brands_i18n.locale = 'ru' ORDER BY shop_brands_i18n.name";
		$query = $this->db->query($sql);
		$brands = $query->result_array ();
		
		return $brands;
	}
	
	/**
	 * Retrieve type of tires
	 */
	public function getTypeTires() {
		$sql = "SELECT * FROM `shop_category_i18n` shop_category_i18n WHERE shop_category_i18n.id IN (SELECT DISTINCT shop_category.id FROM `shop_category` shop_category INNER JOIN `shop_products` shop_products ON shop_category.id = shop_products.brand_id) AND shop_category_i18n.locale = 'ru' AND shop_category_i18n.id <> '102' GROUP BY(shop_category_i18n.name) ORDER BY shop_category_i18n.name";
		$query = $this->db->query($sql);
		$types = $query->result_array ();
		
		return $types;
	}
	
	/**
	 * Return width of tires
	 */
	public function getWidth() {
		$sql = "SELECT shop_product_properties_data.id, shop_product_properties_data.value FROM `shop_product_properties_data` shop_product_properties_data INNER JOIN `shop_products` shop_products ON shop_products.id = shop_product_properties_data.product_id WHERE shop_product_properties_data.property_id = '42' AND shop_product_properties_data.value > 100 GROUP BY (shop_product_properties_data.value)";
		$query = $this->db->query($sql);
		$widths = $query->result_array ();
		
		return $widths;
	}
	
	/**
	 * Return height of tires
	 */
	public function getHeight() {
		$sql = "SELECT shop_product_properties_data.id, shop_product_properties_data.value FROM `shop_product_properties_data` shop_product_properties_data INNER JOIN `shop_products` shop_products ON shop_products.id = shop_product_properties_data.product_id WHERE shop_product_properties_data.property_id = 43 GROUP BY (shop_product_properties_data.value)";
		$query = $this->db->query($sql);
		$heights = $query->result_array ();
	
		return $heights;
	}
	
	/**
	 * Return height of tires
	 */
	public function getDiameter() {
		$sql = "SELECT shop_product_properties_data.id, shop_product_properties_data.value FROM `shop_product_properties_data` shop_product_properties_data INNER JOIN `shop_products` shop_products ON shop_products.id = shop_product_properties_data.product_id WHERE shop_product_properties_data.property_id = 44 GROUP BY (shop_product_properties_data.value)";
		$query = $this->db->query($sql);
		$diameters = $query->result_array ();
	
		return $diameters;
	}
	
	public function getAllTogether(){
		$sql = "SELECT * FROM `shop_products` shop_products 
JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
JOIN `shop_category` ON shop_category.id = shop_products.category_id
JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id 	
JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id";
		$query = $this->db->query($sql);
		$all = $query->result_array ();
		
		return $all;
		
	}
}