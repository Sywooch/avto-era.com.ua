<?php

/**
 * This class defines the structure of the 'shop_notifications' table.
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
class SNotificationsTableMap extends TableMap {
	
	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SNotificationsTableMap';
	
	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return void
	 * @throws PropelException
	 */
	public function initialize() {
		// attributes
		$this->setName ( 'shop_notifications' );
		$this->setPhpName ( 'SNotifications' );
		$this->setClassname ( 'SNotifications' );
		$this->setPackage ( 'Shop' );
		$this->setUseIdGenerator ( true );
		// columns
		$this->addPrimaryKey ( 'ID', 'Id', 'INTEGER', true, null, null );
		$this->addForeignKey ( 'PRODUCT_ID', 'ProductId', 'INTEGER', 'shop_products', 'ID', true, null, null );
		$this->addForeignKey ( 'VARIANT_ID', 'VariantId', 'INTEGER', 'shop_product_variants', 'ID', true, null, null );
		$this->addColumn ( 'USER_NAME', 'UserName', 'VARCHAR', false, 100, null );
		$this->addColumn ( 'USER_EMAIL', 'UserEmail', 'VARCHAR', false, 100, null );
		$this->addColumn ( 'USER_PHONE', 'UserPhone', 'VARCHAR', false, 100, null );
		$this->addColumn ( 'USER_COMMENT', 'UserComment', 'VARCHAR', false, 500, null );
		$this->addForeignKey ( 'STATUS', 'Status', 'INTEGER', 'shop_notification_statuses', 'ID', true, null, null );
		$this->addColumn ( 'DATE_CREATED', 'DateCreated', 'INTEGER', true, null, null );
		$this->addColumn ( 'ACTIVE_TO', 'ActiveTo', 'INTEGER', true, null, null );
		$this->addColumn ( 'MANAGER_ID', 'ManagerId', 'INTEGER', false, null, null );
		$this->addColumn ( 'NOTIFIED_BY_EMAIL', 'NotifiedByEmail', 'BOOLEAN', false, 1, null );
		// validators
	} // initialize()
	
	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations() {
		$this->addRelation ( 'SProducts', 'SProducts', RelationMap::MANY_TO_ONE, array (
				'product_id' => 'id' 
		), null, null );
		$this->addRelation ( 'SProductVariants', 'SProductVariants', RelationMap::MANY_TO_ONE, array (
				'variant_id' => 'id' 
		), null, null );
		$this->addRelation ( 'SNotificationStatuses', 'SNotificationStatuses', RelationMap::MANY_TO_ONE, array (
				'status' => 'id' 
		), null, null );
	} // buildRelations()
} // SNotificationsTableMap
