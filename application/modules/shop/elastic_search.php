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
		$regex = "/(\d+)\/(\d+)\WR(\d+)/";
		$width_retrieved = array();
		$width = $this->elasticsearch->getTyreProp();

		foreach($width as $t){
			preg_match($regex, $t['name'],
					$matches_out);
			
			if(!in_array($matches_out[1], $width_retrieved, true) && $matches_out[1] > 90){
				$width_retrieved[$matches_out[1]] = $matches_out[1];
			}
		}
		
		echo $this->elasticsearch->response($width_retrieved);
		
	}
	
	/**
	 * Retrieve Height
	 */
	public function getHeight(){
		$regex = "/(\d+)\/(\d+)\WR(\d+)/";
		$height_retrieved = array();
		$height = $this->elasticsearch->getTyreProp();
	
		foreach($height as $t){
			preg_match($regex, $t['name'],
					$matches_out);	
			if(!in_array($matches_out[2], $height_retrieved, true) && $matches_out[2] > 25 && $matches_out[2] < 200){
				$height_retrieved[$matches_out[2]] = $matches_out[2];
			}	
		}
	
		echo $this->elasticsearch->response($height_retrieved);
	
	}
	
	/**
	 * Retrieve Diameter
	 */
	public function getDiameter(){
		$regex = "/(\d+)\/(\d+)\W(R\d+)/";
		$diameter_retrieved = array();
		$diameter = $this->elasticsearch->getTyreProp();
	
		foreach($diameter as $t){
			preg_match($regex, $t['name'],
					$matches_out);
			
			if(!in_array($matches_out[3], $diameter_retrieved, true) && !preg_match('/null/',$matches_out[3]) && !empty($matches_out[3]) ) {
				$diameter_retrieved[$matches_out[3]] = $matches_out[3];
			}
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
	
	/**
	 * Get JSON of wheel diameter
	 */
	public function getWheelDiameter(){
		$regex = "/([0-9]+(\,[0-9]+)?x[0-9]+(\,[0-9]+)?)\W([0-9]+(\,[0-9]+)?x[0-9]+(\,[0-9]+)?)(\/[0-9]+)?\W(ET[0-9]+)\W(DIA[0-9]+(\,[0-9]+)?)/";
		$wheel_diameter_retrieved = array();
		$wheel_diameter = $this->elasticsearch->getWheelDiameter();
		
		foreach($wheel_diameter as $d){
// 			var_dump($d);
			preg_match($regex, $d['name'],
					$matches_out);
			$matches_out_new = array();
			// ==================================
			$pt = '/^(\,[0-9]+)?$/';
			foreach ($matches_out as $key => $value){
				$res = preg_match($pt, $value);
				if(!$res && !empty( $value ) ){
					array_push($matches_out_new, $matches_out[$key]);
				}
			}
			$matches_out = $matches_out_new;
			// ==================================
			if( !in_array($matches_out[1], $wheel_diameter_retrieved, true) ){
				$wheel_diameter_retrieved[$matches_out[1]] = $matches_out[1];
			}
		}
		echo $this->elasticsearch->response($wheel_diameter_retrieved);
		
	}
	
	/**
	 * Get JSON wheel PCD
	 */
	public function getWheelPCD(){
		$wheel_pcd_retrieved = array();
		$wheel_pcd = $this->elasticsearch->getWheelPCDOne();

		foreach($wheel_pcd as $p){
			$wheel_pcd_retrieved[ $p['id'] ] = $p['value'];
		}
		echo $this->elasticsearch->response($wheel_pcd_retrieved);
	}
	
	/**
	 * Get JSON wheel SubHub
	 */
	public function getWheelVyletet(){
		$wheel_vyletet_retrieved = array();
		$wheel_vyletet = $this->elasticsearch->getWheelVyletet();
	
		foreach($wheel_vyletet as $v){
			$wheel_vyletet_retrieved[ $v['id'] ] = $v['value'];
		}
		echo $this->elasticsearch->response($wheel_vyletet_retrieved);
	}
	
	/**
	 * Get JSON auto brands
	 */
	public function getWheelHub(){
		$wheel_hubs_retrieved = array();
		$wheel_hubs = $this->elasticsearch->getWheelHub();
	
		foreach($wheel_hubs as $h){
			$wheel_hubs_retrieved[ $h['id'] ] = $h['value'];
		}
		echo $this->elasticsearch->response($wheel_hubs_retrieved);
	}
	
	/**
	 * Get JSON auto brands
	 */
	public function getAutoBrands(){
		$auto_brands_retrieved = array();
		$auto_brands = $this->elasticsearch->getAutoBrands();
	
		foreach($auto_brands as $ab){
			$auto_brands_retrieved[ $ab['id'] ] = $ab['value'];
		}
		echo $this->elasticsearch->response($auto_brands_retrieved);
	}
	
	/**
	 * Get JSON auto models
	 */
	public function getAutoModels(){
		$auto_model_retrieved = array();
		$auto_model = $this->elasticsearch->getAutoModels();
	
		foreach($auto_model as $am){
			$auto_model_retrieved[ $am['id'] ] = $am['value'];
		}
		echo $this->elasticsearch->response($auto_model_retrieved);
	}
	
	
	/**
	 * Get JSON auto years
	 */
	public function getAutoYears(){
		$auto_year_retrieved = array();
		$auto_year = $this->elasticsearch->getAutoYears();
	
		foreach($auto_year as $ay){
			$auto_year_retrieved[ $ay['id'] ] = $ay['value'];
		}
		echo $this->elasticsearch->response($auto_year_retrieved);
	}
	
	/**
	 * Get JSON auto years
	 */
	public function getAutoModification(){
		$auto_modification_retrieved = array();
		$auto_modification = $this->elasticsearch->getAutoModification();
	
		foreach($auto_modification as $am){
			$auto_modification_retrieved[ $am['id'] ] = $am['value'];
		}
		echo $this->elasticsearch->response($auto_modification_retrieved);
	}
}