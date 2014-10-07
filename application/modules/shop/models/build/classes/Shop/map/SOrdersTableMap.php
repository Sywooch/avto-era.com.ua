<?php

/**
 * This class defines the structure of the 'shop_orders' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.Shop.map
 */
class SOrdersTableMap extends TableMap {
	
	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SOrdersTableMap';
	
	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return void
	 * @throws PropelException
	 */
	public function initialize() {
		// attributes
		$this->setName ( 'shop_orders' );
		$this->setPhpName ( 'SOrders' );
		$this->setClassname ( 'SOrders' );
		$this->setPackage ( 'Shop' );
		$this->setUseIdGenerator ( true );
		// columns
		$this->addPrimaryKey ( 'ID', 'Id', 'INTEGER', true, null, null );
		$this->addColumn ( 'USER_ID', 'UserId', 'INTEGER', false, null, null );
		$this->addColumn ( 'KEY', 'Key', 'VARCHAR', true, 255, null );
		$this->addForeignKey ( 'DELIVERY_METHOD', 'DeliveryMethod', 'INTEGER', 'shop_delivery_methods', 'ID', false, null, null );
		$this->addColumn ( 'DELIVERY_PRICE', 'DeliveryPrice', 'FLOAT', false, null, null );
		$this->addForeignKey ( 'PAYMENT_METHOD', 'PaymentMethod', 'INTEGER', 'shop_payment_methods', 'ID', false, null, null );
		$this->addForeignKey ( 'STATUS', 'Status', 'INTEGER', 'shop_order_statuses', 'ID', false, null, null );
		$this->addColumn ( 'PAID', 'Paid', 'BOOLEAN', false, 1, null );
		$this->addColumn ( 'USER_FULL_NAME', 'UserFullName', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'USER_EMAIL', 'UserEmail', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'USER_PHONE', 'UserPhone', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'USER_DELIVER_TO', 'UserDeliverTo', 'VARCHAR', false, 500, null );
		$this->addColumn ( 'USER_COMMENT', 'UserComment', 'VARCHAR', false, 1000, null );
		$this->addColumn ( 'DATE_CREATED', 'DateCreated', 'INTEGER', false, null, null );
		$this->addColumn ( 'DATE_UPDATED', 'DateUpdated', 'INTEGER', false, null, null );
		$this->addColumn ( 'USER_IP', 'UserIp', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'TOTAL_PRICE', 'TotalPrice', 'FLOAT', false, null, null );
		$this->addColumn ( 'EXTERNAL_ID', 'ExternalId', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'GIFT_CERT_KEY', 'GiftCertKey', 'VARCHAR', false, 25, null );
		$this->addColumn ( 'DISCOUNT', 'Discount', 'FLOAT', false, null, null );
		$this->addColumn ( 'GIFT_CERT_PRICE', 'GiftCertPrice', 'INTEGER', false, null, null );
		$this->addColumn ( 'DISCOUNT_INFO', 'DiscountInfo', 'LONGVARCHAR', false, null, null );
		$this->addColumn ( 'ORIGIN_PRICE', 'OriginPrice', 'FLOAT', false, null, null );
		$this->addColumn ( 'COMULATIV', 'Comulativ', 'FLOAT', false, null, null );
		// validators
	} // initialize()
	
	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations() {
		$this->addRelation ( 'SDeliveryMethods', 'SDeliveryMethods', RelationMap::MANY_TO_ONE, array (
				'delivery_method' => 'id' 
		), 'SET NULL', null );
		$this->addRelation ( 'SPaymentMethods', 'SPaymentMethods', RelationMap::MANY_TO_ONE, array (
				'payment_method' => 'id' 
		), 'SET NULL', null );
		$this->addRelation ( 'SOrderStatuses', 'SOrderStatuses', RelationMap::MANY_TO_ONE, array (
				'status' => 'id' 
		), 'SET NULL', null );
		$this->addRelation ( 'SOrderProducts', 'SOrderProducts', RelationMap::ONE_TO_MANY, array (
				'id' => 'order_id' 
		), 'CASCADE', null, 'SOrderProductss' );
		$this->addRelation ( 'SOrderStatusHistory', 'SOrderStatusHistory', RelationMap::ONE_TO_MANY, array (
				'id' => 'order_id' 
		), 'CASCADE', null, 'SOrderStatusHistorys' );
	} // buildRelations()
} // SOrdersTableMap
