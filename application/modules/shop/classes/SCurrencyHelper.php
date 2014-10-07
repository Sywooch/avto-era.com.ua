<?php

/**
 * SCurrencyHelper
 *
 * @package
 * @version $id$
 * @copyright
 * @author <dev@imagecms.net>
 * @license
 */
class SCurrencyHelper {
	protected $currencies = array ();
	public $default = null; // Default currency.
	public $current = null; // Currency to convert to.
	public $additional = null; // Currency to convert to.
	public $main = null; // Main currency.
	public function __construct() {
		// Load all currencies.
		$currencies = SCurrenciesQuery::create ()->find ();
		
		foreach ( $currencies as $c ) {
			/**
			 * Set main currency
			 */
			if ($c->getMain () == true)
				$this->main = $c;
			
			/**
			 * Set default currency
			 */
			if ($c->getIsDefault () == true)
				$this->default = $c;
			
			$this->currencies [$c->getId ()] = $c;
		}
	}
	
	/**
	 * Convert price from default or selected currency to another currency
	 *
	 * @param integer $price
	 *        	Price to convert
	 * @access public
	 * @return integer Converted price
	 */
	public function convert($price, $currencyId = null) {
		// var_dump($currencyId);
		if ($currencyId !== null && isset ( $this->currencies [$currencyId] ))
			$currency = $this->currencies [$currencyId];
		else
			$currency = $this->current;
		
		$price = $price * $currency->getRate ();
		if ($price == round ( $price ))
			return $price;
		else
			return number_format ( $price, ShopCore::app ()->SSettings->pricePrecision, '.', '' );
	}
	public function convertnew($price, $currencyId = null) {
		if ($currencyId !== null && isset ( $this->currencies [$currencyId] )) {
			$currency = $this->currencies [$currencyId];
		} else {
			$currency = $this->current;
		}
		
		$price = $price * $currency->getRate ();
		return round ( $price, ShopCore::app ()->SSettings->pricePrecision );
	}
	
	/**
	 * Convert sum from one currency to another
	 */
	public function convertToMain($sum, $from) {
		if ($from == $this->main->getId ())
			return $sum;
		
		$from = $this->currencies [$from];
		$to = $this->main;
		
		$v1 = $from->getRate () / $to->getRate ();
		return round ( $sum / $v1, 2 );
	}
	
	/**
	 * Get current currency symbol
	 *
	 * @param integer $id
	 *        	Currency id to get symbol.
	 * @access public
	 * @return string
	 */
	public function getSymbol($id = null) {
		if ($this->current instanceof SCurrencies) {
			return $this->current->getSymbol ();
		}
	}
	public function getSymbolById($id = null) {
		if ($id == null)
			return false;
		$model = SCurrenciesQuery::create ()->findPk ( $id );
		if (count ( $model ) > 0)
			return $model->getSymbol ();
		else
			return false;
	}
	public function getRateByfilter() {
		$model = SCurrenciesQuery::create ()->filterByIsDefault ( 1 )->findOne ();
		if ($model)
			return $model->getRate ();
	}
	public function getRateById($id = null) {
		if ($id == null)
			return false;
		$model = SCurrenciesQuery::create ()->findPk ( $id );
		if (count ( $model ) > 0)
			return $model->getRate ();
		else
			return false;
	}
	
	/**
	 * Get currencies array
	 *
	 * @access public
	 * @return SCurrencies
	 */
	public function getCurrencies() {
		return $this->currencies;
	}
	public function initCurrentCurrency($id = null) {
		if ($id == 'main') {
			$this->current = $this->main;
			return true;
		}
		
		if ($id == 'default') {
			$this->current = $this->default;
			return true;
		}
		
		if ($id === null) {
			// Set current currency from default
			$this->current = $this->default;
		} else {
			// Check if currency exists.
			if (isset ( $this->currencies [$id] )) {
				$this->current = $this->currencies [$id];
			} else {
				$this->current = $this->default;
			}
		}
	}
	public function initAdditionalCurrency($id = null) {
		if (isset ( $this->currencies [$id] )) {
			$this->additional = $this->currencies [$id];
		}
		// else{
		// $this->additional = $this->default;
		// }
	}
	public function getmaincurr() {
		return $this->main;
	}
	public function checkPrices($fix = false) {
		$ci = &get_instance ();
		$incorrectIds = array ();
		// $fix = true;
		// check prices in all currencies
		foreach ( $this->currencies as $currency ) {
			$find = $ci->db->query ( "SELECT * FROM `shop_product_variants` WHERE `currency`=" . $currency->getId () )->num_rows ();
			$incorrect = $ci->db->query ( "SELECT * FROM `shop_product_variants` WHERE `currency`=" . $currency->getId () . " AND ROUND(`price`*" . $currency->getRate () . ", 2)!=ROUND(`price_in_main`, 2)" )->num_rows ();
			if ($incorrect > 0) {
				$incorrectIds [$currency->getId ()] ['query'] = " WHERE `currency`=" . $currency->getId () . " AND ROUND(`price`/" . $currency->getRate () . ", 2)!=ROUND(`price_in_main`, 2)";
				$incorrectIds [$currency->getId ()] ['rate'] = $currency->getRate ();
			}
			if ($fix) {
				echo "В " . $currency->getName () . ": " . $find . " (" . $incorrect . ")";
				echo "</br>";
			}
		}
		return $this->_fixPrices ( $incorrectIds );
	}
	private function _fixPrices($incorrectIds) {
		if (is_array ( $incorrectIds )) {
			$ci = &get_instance ();
			$updated_rows = 0;
			foreach ( $incorrectIds as $item ) {
				$ci->db->query ( "UPDATE `shop_product_variants` SET `price`=`price_in_main`/" . $item ['rate'] . $item ['query'] );
				// $updated_rows += $this->db->affected_rows();
			}
			return true;
		} else
			return false;
	}
	public function toMain($price, $id = null) {
		if (null === $id)
			$id = $this->main->getId ();
		$rate = $this->getRateById ( $id );
		return $price / $rate;
	}
}
