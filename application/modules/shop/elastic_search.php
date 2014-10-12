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
		var_dump($this->elasticsearch);
		echo "getBrands" . " " . $this->elasticsearch->getBrandsTest();
	}
	
	public function initialize(){
		
	}
	
}