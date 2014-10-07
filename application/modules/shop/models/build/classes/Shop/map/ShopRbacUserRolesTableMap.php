<?php

/**
 * This class defines the structure of the 'shop_rbac_user_roles' table.
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
class ShopRbacUserRolesTableMap extends TableMap {
	
	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.ShopRbacUserRolesTableMap';
	
	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return void
	 * @throws PropelException
	 */
	public function initialize() {
		// attributes
		$this->setName ( 'shop_rbac_user_roles' );
		$this->setPhpName ( 'ShopRbacUserRoles' );
		$this->setClassname ( 'ShopRbacUserRoles' );
		$this->setPackage ( 'Shop' );
		$this->setUseIdGenerator ( true );
		// columns
		$this->addPrimaryKey ( 'ID', 'Id', 'INTEGER', true, null, null );
		$this->addColumn ( 'USER_ID', 'UserId', 'INTEGER', true, null, null );
		$this->addForeignKey ( 'ROLE_ID', 'RoleId', 'INTEGER', 'shop_rbac_roles', 'ID', true, null, null );
		// validators
	} // initialize()
	
	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations() {
		$this->addRelation ( 'ShopRbacRoles', 'ShopRbacRoles', RelationMap::MANY_TO_ONE, array (
				'role_id' => 'id' 
		), 'CASCADE', 'CASCADE' );
	} // buildRelations()
} // ShopRbacUserRolesTableMap
