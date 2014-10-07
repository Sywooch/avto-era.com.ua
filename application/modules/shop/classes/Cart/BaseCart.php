<?php

namespace Cart;

use Cart\Api as CartApi;

(defined ( 'BASEPATH' )) or exit ( 'No direct script access allowed' );
class BaseCart extends \ShopController {
	public function api($action, $value) {
		CartApi::create ()->$action ( $value );
	}
	
	/**
	 * Errors messages
	 */
	protected $errorMessages = null;
	
	/**
	 * Add product to cart from GET data.
	 * 
	 * @param string $instance        	
	 * @return bool
	 * @access public
	 * @author <dev@imagecms.net>
	 * @copyright (c) 2013 ImageMCMS
	 */
	public function add($instance = 'SProducts') {
		try {
			if ($instance == 'SProducts') {
				
				/**
				 * Search for product and variant
				 */
				$model = \SProductsQuery::create ()->filterByActive ( TRUE )->findPk ( $this->input->get ( 'productId' ) );
				
				/**
				 * Is model or throw Excaption
				 */
				($model != FALSE) or throwException ( 'Wrong input data. Can\'t add to Cart' );
				
				/**
				 * Add Product item to cart
				 */
				$data = array (
						'model' => $model,
						'variantId' => ( int ) $this->input->get ( 'variantId' ),
						'quantity' => ( int ) $this->input->get ( 'quantity' ) 
				);
				\ShopCore::app ()->SCart->add ( $data );
				
				/**
				 * Register onAddToCart Event type
				 */
				\CMSFactory\Events::create ()->registerEvent ( $model );
			} elseif ($instance == 'ShopKit') {
				
				/**
				 * Search for product and its variant
				 */
				$model = \ShopKitQuery::create ()->filterByActive ( TRUE )->findPk ( ( int ) $_GET ['kitId'] );
				
				/**
				 * Is model or throw Excaption
				 */
				($model != FALSE) or throwException ( 'Wrong input data. Can\'t add to Cart' );
				
				/**
				 * Add Product item to cart
				 */
				$data = array (
						'model' => $model,
						'quantity' => 1 
				);
				\ShopCore::app ()->SCart->add ( $data );
				
				/**
				 * Register onAddToCart Event type
				 */
				\CMSFactory\Events::create ()->registerEvent ( $model );
			}
			return true;
		} catch ( \Exception $e ) {
			$this->errorMessages = $e->getMessage ();
			return false;
		}
	}
	
	/**
	 * Remove product from cart by ID.
	 * 
	 * @param int $id        	
	 * @return bool
	 * @access public
	 * @author <dev@imagecms.net>
	 * @copyright (c) 2013 ImageMCMS
	 */
	public function delete($id) {
		try {
			($this->security->xss_clean ( $id )) or throwException ( 'Can\'t remove item from Cart. Incorrect input value' );
			\ShopCore::app ()->SCart->removeOne ( $id );
			return TRUE;
		} catch ( \Exception $exc ) {
			$this->errorMessages = $exc->getMessage ();
			return FALSE;
		}
	}
}

/* End of file BaseCart.php */