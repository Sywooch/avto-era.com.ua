<?php

/**
 * This class defines the structure of the 'shop_product_variants' table.
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
class SProductVariantsTableMap extends TableMap {
	
	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SProductVariantsTableMap';
	
	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return void
	 * @throws PropelException
	 */
	public function initialize() {
		// attributes
		$this->setName ( 'shop_product_variants' );
		$this->setPhpName ( 'SProductVariants' );
		$this->setClassname ( 'SProductVariants' );
		$this->setPackage ( 'Shop' );
		$this->setUseIdGenerator ( true );
		// columns
		$this->addPrimaryKey ( 'ID', 'Id', 'INTEGER', true, null, null );
		$this->addColumn ( 'EXTERNAL_ID', 'ExternalId', 'VARCHAR', false, 255, null );
		$this->addForeignKey ( 'PRODUCT_ID', 'ProductId', 'INTEGER', 'shop_products', 'ID', true, null, null );
		$this->addColumn ( 'PRICE', 'Price', 'FLOAT', true, null, null );
		$this->addColumn ( 'NUMBER', 'Number', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'STOCK', 'Stock', 'INTEGER', false, null, null );
		$this->addColumn ( 'MAINIMAGE', 'Mainimage', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'SMALLIMAGE', 'Smallimage', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'POSITION', 'Position', 'INTEGER', false, null, null );
		$this->addForeignKey ( 'CURRENCY', 'Currency', 'INTEGER', 'shop_currencies', 'ID', false, null, null );
		$this->addColumn ( 'PRICE_IN_MAIN', 'PriceInMain', 'FLOAT', true, null, null );
		// validators
	} // initialize()
	
	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations() {
		$this->addRelation ( 'SProducts', 'SProducts', RelationMap::MANY_TO_ONE, array (
				'product_id' => 'id' 
		), 'CASCADE', 'CASCADE' );
		$this->addRelation ( 'SCurrencies', 'SCurrencies', RelationMap::MANY_TO_ONE, array (
				'currency' => 'id' 
		), 'CASCADE', 'CASCADE' );
		$this->addRelation ( 'ShopKitProduct', 'ShopKitProduct', RelationMap::ONE_TO_MANY, array (
				'product_id' => 'product_id' 
		), 'CASCADE', 'CASCADE', 'ShopKitProducts' );
		$this->addRelation ( 'SProductVariantsI18n', 'SProductVariantsI18n', RelationMap::ONE_TO_MANY, array (
				'id' => 'id' 
		), 'CASCADE', 'CASCADE', 'SProductVariantsI18ns' );
		$this->addRelation ( 'SNotifications', 'SNotifications', RelationMap::ONE_TO_MANY, array (
				'id' => 'variant_id' 
		), null, null, 'SNotificationss' );
		$this->addRelation ( 'SOrderProducts', 'SOrderProducts', RelationMap::ONE_TO_MANY, array (
				'id' => 'variant_id' 
		), null, null, 'SOrderProductss' );
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
						'i18n_columns' => 'name',
						'locale_column' => 'locale',
						'default_locale' => 'ru',
						'locale_alias' => '' 
				) 
		);
	} // getBehaviors()
} // SProductVariantsTableMap
