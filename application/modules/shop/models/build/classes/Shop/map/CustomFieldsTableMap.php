<?php

/**
 * This class defines the structure of the 'custom_fields' table.
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
class CustomFieldsTableMap extends TableMap {
	
	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.CustomFieldsTableMap';
	
	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return void
	 * @throws PropelException
	 */
	public function initialize() {
		// attributes
		$this->setName ( 'custom_fields' );
		$this->setPhpName ( 'CustomFields' );
		$this->setClassname ( 'CustomFields' );
		$this->setPackage ( 'Shop' );
		$this->setUseIdGenerator ( true );
		// columns
		$this->addPrimaryKey ( 'ID', 'Id', 'INTEGER', true, null, null );
		$this->addColumn ( 'ENTITY', 'Entity', 'VARCHAR', false, 32, null );
		$this->addColumn ( 'FIELD_TYPE_ID', 'typeId', 'INTEGER', true, null, null );
		$this->addColumn ( 'FIELD_NAME', 'name', 'VARCHAR', true, 64, null );
		$this->addColumn ( 'IS_REQUIRED', 'IsRequired', 'BOOLEAN', true, 1, true );
		$this->addColumn ( 'IS_ACTIVE', 'IsActive', 'BOOLEAN', true, 1, true );
		$this->addColumn ( 'OPTIONS', 'Options', 'VARCHAR', false, 65, null );
		$this->addColumn ( 'IS_PRIVATE', 'IsPrivate', 'BOOLEAN', true, 1, false );
		$this->addColumn ( 'VALIDATORS', 'Validators', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'CLASSES', 'classes', 'LONGVARCHAR', false, null, null );
		$this->addColumn ( 'POSITION', 'position', 'TINYINT', false, null, null );
		// validators
	} // initialize()
	
	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations() {
		$this->addRelation ( 'CustomFieldsI18n', 'CustomFieldsI18n', RelationMap::ONE_TO_MANY, array (
				'id' => 'id' 
		), 'CASCADE', 'CASCADE', 'CustomFieldsI18ns' );
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
						'i18n_columns' => 'field_label, field_description, possible_values',
						'locale_column' => 'locale',
						'default_locale' => 'ru',
						'locale_alias' => '' 
				) 
		);
	} // getBehaviors()
} // CustomFieldsTableMap
