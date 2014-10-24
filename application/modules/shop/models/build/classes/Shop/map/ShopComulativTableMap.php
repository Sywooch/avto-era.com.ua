<?php

/**
 * This class defines the structure of the 'shop_comulativ_discount' table.
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
class ShopComulativTableMap extends TableMap {
	
	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.ShopComulativTableMap';
	
	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return void
	 * @throws PropelException
	 */
	public function initialize() {
		// attributes
		$this->setName ( 'shop_comulativ_discount' );
		$this->setPhpName ( 'ShopComulativ' );
		$this->setClassname ( 'ShopComulativ' );
		$this->setPackage ( 'Shop' );
		$this->setUseIdGenerator ( true );
		$this->setIsCrossRef ( true );
		// columns
		$this->addPrimaryKey ( 'ID', 'Id', 'INTEGER', true, null, null );
		$this->addColumn ( 'DESCRIPTION', 'Description', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'DISCOUNT', 'Discount', 'INTEGER', false, 3, null );
		$this->addColumn ( 'ACTIVE', 'Active', 'INTEGER', false, 1, null );
		$this->addColumn ( 'DATE', 'Date', 'INTEGER', false, 15, null );
		$this->addColumn ( 'TOTAL', 'Total', 'INTEGER', false, 255, null );
		$this->addColumn ( 'TOTAL_A', 'TotalA', 'INTEGER', false, 255, null );
		// validators
	} // initialize()
	
	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations() {
	} // buildRelations()
} // ShopComulativTableMap
