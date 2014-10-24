<?php

/**
 * This class defines the structure of the 'shop_callbacks' table.
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
class SCallbacksTableMap extends TableMap {
	
	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SCallbacksTableMap';
	
	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return void
	 * @throws PropelException
	 */
	public function initialize() {
		// attributes
		$this->setName ( 'shop_callbacks' );
		$this->setPhpName ( 'SCallbacks' );
		$this->setClassname ( 'SCallbacks' );
		$this->setPackage ( 'Shop' );
		$this->setUseIdGenerator ( true );
		// columns
		$this->addPrimaryKey ( 'ID', 'Id', 'INTEGER', true, null, null );
		$this->addColumn ( 'USER_ID', 'UserId', 'INTEGER', false, null, null );
		$this->addForeignKey ( 'STATUS_ID', 'StatusId', 'INTEGER', 'shop_callbacks_statuses', 'ID', false, null, null );
		$this->addForeignKey ( 'THEME_ID', 'ThemeId', 'VARCHAR', 'shop_callbacks_themes', 'ID', false, 255, null );
		$this->addColumn ( 'PHONE', 'Phone', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'NAME', 'Name', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'COMMENT', 'Comment', 'LONGVARCHAR', false, null, null );
		$this->addColumn ( 'DATE', 'Date', 'INTEGER', false, null, null );
		// validators
	} // initialize()
	
	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations() {
		$this->addRelation ( 'SCallbackStatuses', 'SCallbackStatuses', RelationMap::MANY_TO_ONE, array (
				'status_id' => 'id' 
		), null, null );
		$this->addRelation ( 'SCallbackThemes', 'SCallbackThemes', RelationMap::MANY_TO_ONE, array (
				'theme_id' => 'id' 
		), null, null );
	} // buildRelations()
} // SCallbacksTableMap
