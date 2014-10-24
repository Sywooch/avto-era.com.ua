<?php

/**
 * This class defines the structure of the 'shop_payment_methods_i18n' table.
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
class SPaymentMethodsI18nTableMap extends TableMap {
	
	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SPaymentMethodsI18nTableMap';
	
	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return void
	 * @throws PropelException
	 */
	public function initialize() {
		// attributes
		$this->setName ( 'shop_payment_methods_i18n' );
		$this->setPhpName ( 'SPaymentMethodsI18n' );
		$this->setClassname ( 'SPaymentMethodsI18n' );
		$this->setPackage ( 'Shop' );
		$this->setUseIdGenerator ( false );
		// columns
		$this->addForeignPrimaryKey ( 'ID', 'Id', 'INTEGER', 'shop_payment_methods', 'ID', true, null, null );
		$this->addPrimaryKey ( 'LOCALE', 'Locale', 'VARCHAR', true, 5, null );
		$this->addColumn ( 'NAME', 'Name', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null );
		// validators
	} // initialize()
	
	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations() {
		$this->addRelation ( 'SPaymentMethods', 'SPaymentMethods', RelationMap::MANY_TO_ONE, array (
				'id' => 'id' 
		), 'CASCADE', 'CASCADE' );
	} // buildRelations()
} // SPaymentMethodsI18nTableMap
