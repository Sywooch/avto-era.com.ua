<?php

/**
 * This class defines the structure of the 'shop_kit_product' table.
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
class ShopKitProductTableMap extends TableMap {
	
	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.ShopKitProductTableMap';
	
	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return void
	 * @throws PropelException
	 */
	public function initialize() {
		// attributes
		$this->setName ( 'shop_kit_product' );
		$this->setPhpName ( 'ShopKitProduct' );
		$this->setClassname ( 'ShopKitProduct' );
		$this->setPackage ( 'Shop' );
		$this->setUseIdGenerator ( false );
		// columns
		$this->addForeignPrimaryKey ( 'PRODUCT_ID', 'ProductId', 'INTEGER', 'shop_products', 'ID', true, null, null );
		$this->addForeignPrimaryKey ( 'PRODUCT_ID', 'ProductId', 'INTEGER', 'shop_product_variants', 'PRODUCT_ID', true, null, null );
		$this->addForeignPrimaryKey ( 'KIT_ID', 'KitId', 'INTEGER', 'shop_kit', 'ID', true, null, null );
		$this->addColumn ( 'DISCOUNT', 'Discount', 'VARCHAR', false, 11, '0' );
		// validators
	} // initialize()
	
	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations() {
		$this->addRelation ( 'SProducts', 'SProducts', RelationMap::MANY_TO_ONE, array (
				'product_id' => 'id' 
		), 'CASCADE', 'CASCADE' );
		$this->addRelation ( 'SProductVariants', 'SProductVariants', RelationMap::MANY_TO_ONE, array (
				'product_id' => 'product_id' 
		), 'CASCADE', 'CASCADE' );
		$this->addRelation ( 'ShopKit', 'ShopKit', RelationMap::MANY_TO_ONE, array (
				'kit_id' => 'id' 
		), 'CASCADE', 'CASCADE' );
	} // buildRelations()
} // ShopKitProductTableMap
