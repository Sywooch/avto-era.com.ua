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
		$bid = ( int ) $_POST ['bid'];
	
		$pids = SProductsQuery::create ()->filterByBrandId ( $bid )->select ( array (
				'CategoryId'
		) )->distinct ()->find ()->toArray ();
		$cids = SCategoryQuery::create ()->filterById ( $pids )->select ( array (
				'ParentId'
		) )->distinct ()->find ()->toArray ();
		$cat = SCategoryQuery::create ()->filterById ( $cids )->distinct ()->find ();
		return $cat;
// 		if (count ( $cat ) > 0) {
// 			foreach ( $cat as $v ) {
// 				$out .= '<option  value="' . $v->getId () . '*' . $v->getUrl () . '">' . $v->getName () . '</option>' . "\n";
// 			}
// 		}
// 		echo $out . '</select>';
	}
	
	/**
	 * Retrieve seasons
	 */
	public function getSezon() {
		$bid = ( int ) $_POST ['bid'];
		$cid = ( int ) $_POST ['cid'];
	
// 		$out = '<select class="color" id="sezon" name="sezon">';
// 		$out .= '<option value="0" selected="selected">выберите сезон</option>' . "\n";
	
		$pids = SProductsQuery::create ()->filterByBrandId ( $bid )->select ( array (
				'CategoryId'
		) )->distinct ()->find ()->toArray ();
		$cids = SCategoryQuery::create ()->filterById ( $pids )->distinct ()->find ();
	
		if (count ( $cids ) > 0) {
			foreach ( $cids as $v ) {
	
				if ($v->getParentId () == $cid)
					$out .= '<option value="' . $v->getId () . '*' . $v->getUrl () . '">' . $v->getName () . '</option>' . "\n";
			}
		}
		echo $out . '</select>';
	}
	
	/**
	 * Return width of tires
	 */
	public function getWidth() {
		$bid = ( int ) $_POST ['bid'];
		$cid = ( int ) $_POST ['cid'];
	
// 		$out = '<select class="color" id="shirina" name="p[42][]">';
// 		$out .= '<option value="0" selected="selected">выберите ширину</option>' . "\n";
	
		$pids = SProductsQuery::create ()->filterByBrandId ( $bid )->filterByCategoryId ( $cid )->select ( array (
				'Id'
		) )->distinct ()->find ()->toArray ();
		$shirina = SProductPropertiesDataQuery::create ()->filterByProductId ( $pids )->filterByPropertyId ( 42 )->distinct ()->select ( array (
				'Value'
		) )->find ()->toArray ();
	
		return $shirina;
		
// 		if (count ( $shirina ) > 0) {
// 			foreach ( $shirina as $v ) {
	
// 				$out .= '<option value="' . $v . '">' . $v . '</option>' . "\n";
// 			}
// 		}
// 		echo $out . '</select>';
	}
}