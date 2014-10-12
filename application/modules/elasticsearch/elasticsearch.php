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
		header("Content-Type: application/json");
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
}