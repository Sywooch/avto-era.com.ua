<?php

/**
 * This class defines the structure of the 'shop_brands' table.
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
class SBrandsTableMap extends TableMap {
	
	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SBrandsTableMap';
	
	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return void
	 * @throws PropelException
	 */
	public function initialize() {
		// attributes
		$this->setName ( 'shop_brands' );
		$this->setPhpName ( 'SBrands' );
		$this->setClassname ( 'SBrands' );
		$this->setPackage ( 'Shop' );
		$this->setUseIdGenerator ( true );
		// columns
		$this->addPrimaryKey ( 'ID', 'Id', 'INTEGER', true, null, null );
		$this->addColumn ( 'URL', 'Url', 'VARCHAR', true, 255, null );
		$this->addColumn ( 'IMAGE', 'Image', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'POSITION', 'Position', 'SMALLINT', true, null, null );
		// validators
	} // initialize()
	
	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations() {
		$this->addRelation ( 'SProducts', 'SProducts', RelationMap::ONE_TO_MANY, array (
				'id' => 'brand_id' 
		), null, null, 'SProductss' );
		$this->addRelation ( 'SBrandsI18n', 'SBrandsI18n', RelationMap::ONE_TO_MANY, array (
				'id' => 'id' 
		), 'CASCADE', 'CASCADE', 'SBrandsI18ns' );
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
						'i18n_columns' => 'name, description, meta_title, meta_description, meta_keywords',
						'locale_column' => 'locale',
						'default_locale' => 'ru',
						'locale_alias' => '' 
				) 
		);
	} // getBehaviors()
} // SBrandsTableMap
