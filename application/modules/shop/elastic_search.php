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
		$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
		
		echo $this->elasticsearch->response($arr);
	}
	
	public function initialize(){
		
	}
	
}