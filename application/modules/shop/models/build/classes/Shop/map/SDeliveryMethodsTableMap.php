<?php

/**
 * This class defines the structure of the 'shop_delivery_methods' table.
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
class SDeliveryMethodsTableMap extends TableMap {
	
	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SDeliveryMethodsTableMap';
	
	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return void
	 * @throws PropelException
	 */
	public function initialize() {
		// attributes
		$this->setName ( 'shop_delivery_methods' );
		$this->setPhpName ( 'SDeliveryMethods' );
		$this->setClassname ( 'SDeliveryMethods' );
		$this->setPackage ( 'Shop' );
		$this->setUseIdGenerator ( true );
		// columns
		$this->addPrimaryKey ( 'ID', 'Id', 'INTEGER', true, null, null );
		$this->addColumn ( 'PRICE', 'Price', 'FLOAT', true, null, null );
		$this->addColumn ( 'FREE_FROM', 'FreeFrom', 'FLOAT', true, null, null );
		$this->addColumn ( 'ENABLED', 'Enabled', 'BOOLEAN', false, 1, null );
		$this->addColumn ( 'IS_PRICE_IN_PERCENT', 'IsPriceInPercent', 'BOOLEAN', true, 1, null );
		$this->addColumn ( 'POSITION', 'Position', 'INTEGER', false, 11, null );
		// validators
	} // initialize()
	
	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations() {
		$this->addRelation ( 'SDeliveryMethodsI18n', 'SDeliveryMethodsI18n', RelationMap::ONE_TO_MANY, array (
				'id' => 'id' 
		), 'CASCADE', 'CASCADE', 'SDeliveryMethodsI18ns' );
		$this->addRelation ( 'ShopDeliveryMethodsSystems', 'ShopDeliveryMethodsSystems', RelationMap::ONE_TO_MANY, array (
				'id' => 'delivery_method_id' 
		), 'CASCADE', null, 'ShopDeliveryMethodsSystemss' );
		$this->addRelation ( 'SOrders', 'SOrders', RelationMap::ONE_TO_MANY, array (
				'id' => 'delivery_method' 
		), 'SET NULL', null, 'SOrderss' );
		$this->addRelation ( 'PaymentMethods', 'SPaymentMethods', RelationMap::MANY_TO_MANY, array (), 'SET NULL', null, 'PaymentMethodss' );
	} // buildRelations()
	
	/**
	 *
	 * Gets the list of behaviors registered for this table
	 *
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors() {
		return array (
				'i18n' => array (
						'i18n_table' => '%TABLE%_i18n',
						'i18n_phpname' => '%PHPNAME%I18n',
						'i18n_columns' => 'name, description, pricedescription',
						'locale_column' => 'locale',
						'default_locale' => 'ru',
						'locale_alias' => '' 
				) 
		);
	} // getBehaviors()
} // SDeliveryMethodsTableMap
