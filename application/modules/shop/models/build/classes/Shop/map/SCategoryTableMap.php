<?php

/**
 * This class defines the structure of the 'shop_category' table.
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
class SCategoryTableMap extends TableMap {
	
	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SCategoryTableMap';
	
	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return void
	 * @throws PropelException
	 */
	public function initialize() {
		// attributes
		$this->setName ( 'shop_category' );
		$this->setPhpName ( 'SCategory' );
		$this->setClassname ( 'SCategory' );
		$this->setPackage ( 'Shop' );
		$this->setUseIdGenerator ( true );
		// columns
		$this->addPrimaryKey ( 'ID', 'Id', 'INTEGER', true, null, null );
		$this->addColumn ( 'EXTERNAL_ID', 'ExternalId', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'URL', 'Url', 'VARCHAR', true, 255, null );
		$this->addColumn ( 'ACTIVE', 'Active', 'BOOLEAN', false, 1, null );
		$this->addColumn ( 'IMAGE', 'Image', 'VARCHAR', false, 255, null );
		$this->addForeignKey ( 'PARENT_ID', 'ParentId', 'INTEGER', 'shop_category', 'ID', false, null, null );
		$this->addColumn ( 'POSITION', 'Position', 'INTEGER', false, null, null );
		$this->addColumn ( 'FULL_PATH', 'FullPath', 'VARCHAR', false, 1000, null );
		$this->addColumn ( 'FULL_PATH_IDS', 'FullPathIds', 'VARCHAR', false, 250, null );
		$this->addColumn ( 'TPL', 'Tpl', 'VARCHAR', false, 250, null );
		$this->addColumn ( 'ORDER_METHOD', 'OrderMethod', 'INTEGER', false, null, null );
		$this->addColumn ( 'SHOWSITETITLE', 'Showsitetitle', 'INTEGER', false, null, null );
		// validators
	} // initialize()
	
	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations() {
		$this->addRelation ( 'SCategory', 'SCategory', RelationMap::MANY_TO_ONE, array (
				'parent_id' => 'id' 
		), 'CASCADE', 'CASCADE' );
		$this->addRelation ( 'SCategoryRelatedById', 'SCategory', RelationMap::ONE_TO_MANY, array (
				'id' => 'parent_id' 
		), 'CASCADE', 'CASCADE', 'SCategorysRelatedById' );
		$this->addRelation ( 'SCategoryI18n', 'SCategoryI18n', RelationMap::ONE_TO_MANY, array (
				'id' => 'id' 
		), 'CASCADE', 'CASCADE', 'SCategoryI18ns' );
		$this->addRelation ( 'SProducts', 'SProducts', RelationMap::ONE_TO_MANY, array (
				'id' => 'category_id' 
		), 'CASCADE', 'CASCADE', 'SProductss' );
		$this->addRelation ( 'ShopProductCategories', 'ShopProductCategories', RelationMap::ONE_TO_MANY, array (
				'id' => 'category_id' 
		), 'CASCADE', null, 'ShopProductCategoriess' );
		$this->addRelation ( 'ShopProductPropertiesCategories', 'ShopProductPropertiesCategories', RelationMap::ONE_TO_MANY, array (
				'id' => 'category_id' 
		), 'CASCADE', null, 'ShopProductPropertiesCategoriess' );
		$this->addRelation ( 'Product', 'SProducts', RelationMap::MANY_TO_MANY, array (), 'CASCADE', null, 'Products' );
		$this->addRelation ( 'Property', 'SProperties', RelationMap::MANY_TO_MANY, array (), 'CASCADE', null, 'Propertys' );
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
						'i18n_columns' => 'name, h1, description, meta_desc, meta_title, meta_keywords',
						'locale_column' => 'locale',
						'default_locale' => 'ru',
						'locale_alias' => '' 
				) 
		);
	} // getBehaviors()
} // SCategoryTableMap
