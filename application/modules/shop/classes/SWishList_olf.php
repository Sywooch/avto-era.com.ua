<?php

/**
 * SWishList class file
 *
 * @package Shop
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net>
 */
class SWishList {
	protected $model; // SProducts model.
	                  
	// public $sessKey = 'ShopWishListData'; // Session key to store WishList items list.
	public function __construct() {
	}
	
	/**
	 * Add product to WishList.
	 *
	 * @param array $data
	 *        	Product Data
	 *        	
	 *        	array(SProducts model,variantId,quantity)
	 *        	
	 * @access public
	 * @return bool
	 */
	public function add($data = array()) {
		$data = ( object ) $data;
		
		if ($data->object instanceof SProducts) {
			// $variant = SProductVariantsQuery::create()
			// ->filterByProductId($data->model->getId())
			// ->findPk($data->variantId);
			
			$productVariants = $data->object->getProductVariants ();
			
			$variant = null;
			foreach ( $productVariants as $v ) {
				if ($v->getId () == $data->variantId) {
					$variant = $v;
				}
			}
			
			if ($variant === null)
				return false;
			
			$itemData = array (
					$data->object->getId (),
					$variant->getId () 
			);
			
			$this->_addToWishList ( $itemData );
		} else {
			return false;
		}
	}
	
	/**
	 * Add product to session data.
	 *
	 * @param array $data        	
	 * @access protected
	 * @return bool always returns true
	 */
	protected function _addToWishList($data) {
		$wishData = $this->getData ();
		if (! in_array ( $data, $wishData )) {
			$wishData [$data [0]] = $data;
		}
		$this->setData ( $wishData );
		
		return true;
	}
	
	/**
	 * Remove all items.
	 *
	 * @access public
	 * @return void
	 */
	public function removeAll() {
		// Set user WishList data if logged in
		if (ShopCore::$ci->dx_auth->is_logged_in () === true) {
			$sUserData = SUserProfileQuery::create ()->filterById ( ShopCore::$ci->dx_auth->get_user_id () )->findOne ();
			$sUserData->setWishListData ( null );
			$sUserData->save ();
		} else
			// ShopCore::$ci->session->set_userdata($this->sessKey, false);
			$this->removeWishListCookie ();
	}
	public function removeOne($key) {
		$data = $this->getData ();
		
		if (isset ( $data [$key] ))
			unset ( $data [$key] );
		
		$this->setData ( $data );
		
		// $this->setData(array_values($data));
		return true;
	}
	
	/**
	 * Get total items count.
	 *
	 * @access public
	 * @return integer
	 */
	public function totalItems() {
		$total = count ( $this->getData () );
		return $total;
	}
	
	/**
	 * Get total price.
	 *
	 * @access public
	 * @return float
	 */
	public function totalPrice($converToCurrent = true) {
		$data = $this->getData ();
		$result = 0;
		
		if (sizeof ( $data ) > 0) {
			foreach ( $data as $item ) {
				$productVariant = SProductVariantsQuery::create ()->filterById ( $item [1] )->findOne ();
				$price = $productVariant->getPrice ();
				$result += $price;
			}
		}
		
		if ($converToCurrent === true)
			$result = ShopCore::app ()->SCurrencyHelper->convert ( $result );
		
		return round ( $result, ShopCore::app ()->SSettings->pricePrecision );
	}
	
	/**
	 * Get session data
	 *
	 * @access public
	 * @return array
	 */
	public function getData($key = NULL) {
		// Get user WishList data if logged in
		if (ShopCore::$ci->dx_auth->is_logged_in () === true) {
			if (isset ( $key )) {
				$sUserData = SUserProfileQuery::create ()->filterByKey ( $key )->findOne ();
			} else {
				$sUserData = SUserProfileQuery::create ()->filterById ( ShopCore::$ci->dx_auth->get_user_id () )->findOne ();
			}
			if ($sUserData != null)
				$data = unserialize ( $sUserData->getWishListData () );
		} else if (isset ( $key )) {
			$sUserData = SUserProfileQuery::create ()->filterByKey ( $key )->findOne ();
		}
		if ($sUserData != null)
			$data = unserialize ( $sUserData->getWishListData () );
			// $data = $this->getWishListCookie();
		
		if ($data === false or $data == null)
			return array ();
		else
			return $data;
	}
	protected function setData(array $data) {
		// Set user WishList data if logged in
		if (ShopCore::$ci->dx_auth->is_logged_in () === true) {
			$sUserData = SUserProfileQuery::create ()->filterById ( ShopCore::$ci->dx_auth->get_user_id () )->findOne ();
			$sUserData->setWishListData ( serialize ( $data ) );
			$sUserData->save ();
		} else
			$this->setWishListCookie ( $data );
		// ShopCore::$ci->session->set_userdata($this->sessKey, $data);
	}
	public function countData() {
		// Get user WishList data if logged in
		if (ShopCore::$ci->dx_auth->is_logged_in () === true) {
			$sUserData = SUserProfileQuery::create ()->filterById ( ShopCore::$ci->dx_auth->get_user_id () )->findOne ();
			if ($sUserData != null)
				$data = unserialize ( $sUserData->getWishListData () );
		} else
			$data = $this->getWishListCookie ();
		if ($data === false or $data == null)
			return 0;
		else
			return count ( $data );
	}
	
	/**
	 * Load products from $this->getData ids array.
	 *
	 * @access public
	 * @return void
	 */
	public function loadProducts($key = NULL) {
		$data = $this->getData ( $key );
		
		if (empty ( $data ))
			return array ();
		else {
			$newData = array ();
			$newCollection = array ();
			$ids = array_map ( "array_shift", $data );
			
			if (sizeof ( $ids ) > 0) {
				// Load products
				$collection = SProductsQuery::create ()->findPks ( array_unique ( $ids ) );
			} else
				return false;
			
			for($i = 0; $i < sizeof ( $collection ); $i ++) {
				$newCollection [$collection [$i]->getId ()] = $collection [$i];
			}
			
			foreach ( $data as $key => $item ) {
				if ($newCollection [$item [0]] !== null) {
					$item ['model'] = $newCollection [$item [0]];
					$productVariant = SProductVariantsQuery::create ()->joinWithI18n ( MY_Controller::getCurrentLocale (), "LEFT JOIN" )->filterById ( $item [1] )->findOne ();
					$item ['variantName'] = $productVariant->getName ();
					$item ['price'] = round ( $productVariant->getPrice (), ShopCore::app ()->SSettings->pricePrecision );
					$newData [$key] = $item;
				}
			}
			// unset wised product if it is deleted from shop catalogue
			if (count ( $data ) != count ( $newData )) {
				foreach ( $data as $key => $value ) {
					if (! array_key_exists ( $key, $newData )) {
						unset ( $data [$key] );
					}
				}
				$this->setData ( $data );
			}
			return $newData;
		}
	}
	public function getWishListCookie() {
		// Load Cookie Helper
		ShopCore::$ci->load->helper ( 'cookie' );
		$data = unserialize ( get_cookie ( 'wish_list', True ) );
		if (count ( $data ) > 0) {
			return $data;
		} else
			return array ();
	}
	protected function setWishListCookie($data = array()) {
		// Load Cookie Helper
		ShopCore::$ci->load->helper ( 'cookie' );
		$cookie = array (
				'name' => 'wish_list',
				'value' => serialize ( $data ),
				'expire' => 60 * 60 * 24 * 31 * 2 
		);
		set_cookie ( $cookie );
	}
	public function removeWishListCookie() {
		// Load Cookie Helper
		ShopCore::$ci->load->helper ( 'cookie' );
		
		$cookie = array (
				'name' => 'wish_list' 
		);
		delete_cookie ( $cookie );
	}
	public function unionDbAndCookieWishLists() {
		$data = array_unique ( array_merge ( $this->getWishListCookie (), $this->getData () ) );
		$this->removeWishListCookie ();
		$this->setData ( $data );
	}
}
