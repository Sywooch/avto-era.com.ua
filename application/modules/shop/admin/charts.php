<?php

/**
 * Charts
 */
class ShopAdminCharts extends ShopAdminController {
	
	/**
	 * Stats for brands
	 */
	public function brands() {
		$data = array ();
		$brands = SBrandsQuery::create ()->useI18nQuery ()->orderByName ()->endUse ()->find ();
		
		foreach ( $brands as $brand )
			$data [$brand->getName ()] = SProductsQuery::create ()->filterByBrand ( $brand )->count ();
		
		$this->render ( 'brands', array (
				'data' => $data 
		) );
	}
	
	/**
	 * Display monthly stats
	 */
	public function orders($year = null, $month = null) {
		if (! $year)
			$year = date ( 'Y' );
		
		if (! $month)
			$month = date ( 'm' );
		
		$totalMonthOrders = 0;
		$totalMonthSum = 0;
		
		$data = array ();
		// $daysInMonth = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
		$daysInMonth = date ( 't', mktime ( 0, 0, 0, $month, 1, $year ) );
		
		for($i = 1; $i <= $daysInMonth; $i ++) {
			$data [$i] = $this->_getDayData ( $year, $month, $i );
			$totalMonthOrders += $data [$i] ['count'];
			$totalMonthSum += $data [$i] ['sum'];
		}
		
		$this->render ( 'orders', array (
				'data' => $data,
				'dates' => $this->_createDatesDropDown (),
				'year' => $year,
				'month' => $month,
				'totalMonthOrders' => $totalMonthOrders,
				'totalMonthSum' => $totalMonthSum 
		) );
	}
	public function byDate($date) {
		$parts = explode ( '-', $date );
		$this->orders ( $parts [0], $parts [1] );
	}
	private function _getDayData($year, $month, $day) {
		$result = array (
				'count' => 0,
				'sum' => 0 
		);
		$needDate = $year . '-' . $month . '-' . $day;
		$startUnixTime = strtotime ( $needDate );
		$endUnixTime = $startUnixTime + 60 * 60 * 24;
		
		$orders = SOrdersQuery::create ()->where ( 'SOrders.DateCreated >= ?', $startUnixTime )->where ( 'SOrders.DateCreated <= ?', $endUnixTime )->find ();
		
		foreach ( $orders as $order )
			$result ['sum'] += $order->getTotalPrice ();
		
		$result ['count'] = $orders->count ();
		return $result;
	}
	private function _createDatesDropDown() {
		$result = array ();
		$orders = SOrdersQuery::create ()->orderByDateCreated ( Criteria::DESC )->find ();
		
		foreach ( $orders as $o )
			array_push ( $result, date ( 'Y-m', $o->getDateCreated () ) );
		
		return array_unique ( $result );
	}
}
