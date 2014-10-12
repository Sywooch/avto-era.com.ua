<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
/**
 * Elastic serach
 * {$CI->load->module('banners')->render($id)}
 * @author User
 *
 */
class Elastic_search extends ShopController {
	public function __construct() {
		parent::__construct ();
		$this->load->module ( 'elasticsearch' );
		
		$this->initialize ();
	}
	
	public function initialize(){
	
	}
	
	/**
	 * Retrieve brands
	 */
	public function getBrands() {
		$brand_retrieved = array();
		$brands = $this->elasticsearch->getAllBrand();

		foreach($brands as $b){
			$brand_retrieved[ $b['id'] ] = $b['name'];
		}
		
		echo $this->elasticsearch->response($brand_retrieved);
	}
	
	/**
	 * Retrieve type of tires
	 */
	public function getTypeOfTires(){
		$type_retrieved = array();
		
		$types = $this->elasticsearch->getTypeTires();
		
		foreach($types as $t){
			$type_retrieved[$t->getId ()] = $t->getName ();
		}
		
		echo $this->elasticsearch->response($type_retrieved);
	}
	
	/**
	 * Retrieve width
	 */
	public function getWidth(){
		$width_retrieved = array();
		$width_retrieved = $this->elasticsearch->getWidth();
		foreach($width as $t){
			$type_retrieved[$t] = $t;
		}
		
		echo $this->elasticsearch->response($width_retrieved);
		
	}
	
	public function test(){
		$query = $this->db->query ( "SELECT * FROM `shop_products`");
		$result = $query->result_array ();
		var_dump($result);
	}
	
}