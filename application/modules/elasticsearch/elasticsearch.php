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
	}
	public function getBrandsTest() {
		return "getBrands";
	}
	
}