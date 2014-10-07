<?php

/**
 * Skeleton subclass for representing a row from the 'shop_kit_product' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Shop
 */
class ShopKitProduct extends BaseShopKitProduct {
	public function getKitProductPrice($CS = null) {
		$this->getSProducts ()->getProductVariants ();
		if ($this->getSProducts ()->hasDiscounts ())
			$price = $this->getSProducts ()->getFirstVariant ()->getVirtual ( 'origPrice' );
		else
			$price = $this->getSProducts ()->getFirstVariant ()->getPrice ();
		return ShopCore::app ()->SCurrencyHelper->convert ( $price, $CS );
	}
	public function getKitNewPrice($CS = null) {
		return number_format ( $this->getKitProductPrice ( $CS ) - $this->getKitProductPrice ( $CS ) * $this->getDiscount () / 100, ShopCore::app ()->SSettings->pricePrecision, '.', '' );
	}
} // ShopKitProduct
