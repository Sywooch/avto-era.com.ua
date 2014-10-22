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
	
	// #############################################################################################
	// ######################################TIRES#################################################
	// #############################################################################################
	
	/**
	 * Retrieve brands
	 */
	public function getBrands() {
		$brand_retrieved = array();
		$brands = $this->elasticsearch->getBrands();

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
		$season_retrieved = array();
		$seasons =  $this->elasticsearch->getSeasons();
		
		foreach($seasons as $s){
			$season_retrieved[ $s['id'] ] = $s['value'];
		}
		
		echo $this->elasticsearch->response($season_retrieved);
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
	
	// #############################################################################################
	// ######################################wheels#################################################
	// #############################################################################################
	
	/**
	 * Get JSON of wheel brands
	 */
	function getWheelBrands(){
		$wheel_brand_retrieved = array();
		$wheel_brands = $this->elasticsearch->getWheelBrands();
		
		foreach($wheel_brands as $b){
			$wheel_brand_retrieved[ $b['id'] ] = $b['name'];
		}
		echo $this->elasticsearch->response($wheel_brand_retrieved);
	}
	
	/**
	 * Get JSON of wheel type
	 */
	public function getWheelType(){
		$wheel_type_retrieved = array();
		$wheel_type = $this->elasticsearch->getWheelType();
		
		foreach($wheel_type as $t){
			$wheel_type_retrieved[ $t['id'] ] = $t['value'];
		}
		echo $this->elasticsearch->response($wheel_type_retrieved);
	}
	
}