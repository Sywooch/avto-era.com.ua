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
			$type_retrieved[ $t['id'] ] = $t['name'];
		}
		
		echo $this->elasticsearch->response($type_retrieved);
	}
	
	public function seasons(){
		$seasons = array('zimn' => 'Зимние', 'letn' => 'Летние', 'vsesez' => 'Всесезонные');
		echo $this->elasticsearch->response($seasons);
	}
	
	/**
	 * Retrieve width
	 */
	public function getWidth(){
		$width_retrieved = array();
		$width = $this->elasticsearch->getWidth();

		foreach($width as $t){
			$width_retrieved[ $t['id'] ] = $t['value'];
		}
		
		echo $this->elasticsearch->response($width_retrieved);
		
	}
	
	/**
	 * Retrieve Height
	 */
	public function getHeight(){
		$height_retrieved = array();
		$height = $this->elasticsearch->getHeight();
	
		foreach($height as $t){
			$height_retrieved[ $t['id'] ] = $t['value'];
		}
	
		echo $this->elasticsearch->response($height_retrieved);
	
	}
	
	/**
	 * Retrieve Diameter
	 */
	public function getDiameter(){
		$diameter_retrieved = array();
		$diameter = $this->elasticsearch->getDiameter();
	
		foreach($diameter as $t){
			$diameter_retrieved[ $t['id'] ] = $t['value'];
		}
	
		echo $this->elasticsearch->response($diameter_retrieved);
	
	}
}