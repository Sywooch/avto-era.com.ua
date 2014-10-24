<?php

/**
 * This class defines the structure of the 'users' table.
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
class SUserProfileTableMap extends TableMap {
	
	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SUserProfileTableMap';
	
	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return void
	 * @throws PropelException
	 */
	public function initialize() {
		// attributes
		$this->setName ( 'users' );
		$this->setPhpName ( 'SUserProfile' );
		$this->setClassname ( 'SUserProfile' );
		$this->setPackage ( 'Shop' );
		$this->setUseIdGenerator ( true );
		// columns
		$this->addPrimaryKey ( 'ID', 'Id', 'INTEGER', true, null, null );
		$this->addColumn ( 'USERNAME', 'Name', 'VARCHAR', false, 50, null );
		$this->addColumn ( 'PASSWORD', 'Password', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'EMAIL', 'UserEmail', 'VARCHAR', false, 100, null );
		$this->addColumn ( 'ADDRESS', 'Address', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'PHONE', 'Phone', 'VARCHAR', false, 32, null );
		$this->addColumn ( 'BANNED', 'Banned', 'TINYINT', false, 1, null );
		$this->addColumn ( 'BAN_REASON', 'BanReason', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'NEWPASS', 'Newpass', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'NEWPASS_KEY', 'NewpassKey', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'NEWPASS_TIME', 'NewpassTime', 'INTEGER', false, null, null );
		$this->addColumn ( 'CREATED', 'DateCreated', 'INTEGER', false, null, null );
		$this->addColumn ( 'LAST_IP', 'LastIp', 'VARCHAR', false, 40, null );
		$this->addColumn ( 'LAST_LOGIN', 'LastLogin', 'INTEGER', false, null, null );
		$this->addColumn ( 'MODIFIED', 'Modified', 'TIMESTAMP', false, null, null );
		$this->addColumn ( 'CART_DATA', 'CartData', 'LONGVARCHAR', false, null, null );
		$this->addColumn ( 'WISH_LIST_DATA', 'WishListData', 'LONGVARCHAR', false, null, null );
		$this->addColumn ( 'KEY', 'Key', 'VARCHAR', true, 255, null );
		$this->addColumn ( 'AMOUT', 'Amout', 'FLOAT', true, null, null );
		$this->addColumn ( 'DISCOUNT', 'Discount', 'VARCHAR', false, 255, null );
		$this->addColumn ( 'ROLE_ID', 'RoleId', 'INTEGER', false, null, null );
		// validators
	} // initialize()
	
	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations() {
	} // buildRelations()
} // SUserProfileTableMap
