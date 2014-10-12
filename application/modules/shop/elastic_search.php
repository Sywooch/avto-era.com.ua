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
	
	public function getBrands() {
		$brand_retrieved = array();
		$brands = $this->elasticsearch->getBrand(102, true);
		
		foreach($brands as $b){
			$brand_retrieved[$b->getId()] = $b->getName();
		}
		
		echo $this->elasticsearch->response($brand_retrieved);
	}
	
	public function initialize(){
		
	}
	
}