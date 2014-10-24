<?php

/**
 * This class defines the structure of the 'shop_rbac_privileges' table.
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
class ShopRbacPrivilegesTableMap extends TableMap {
	
	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.ShopRbacPrivilegesTableMap';
	
	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return void
	 * @throws PropelException
	 */
	public function initialize() {
		// attributes
		$this->setName ( 'shop_rbac_privileges' );
		$this->setPhpName ( 'ShopRbacPrivileges' );
		$this->setClassname ( 'ShopRbacPrivileges' );
		$this->setPackage ( 'Shop' );
		$this->setUseIdGenerator ( true );
		// columns
		$this->addPrimaryKey ( 'ID', 'Id', 'INTEGER', true, null, null );
		$this->addForeignKey ( 'GROUP_ID', 'GroupId', 'INTEGER', 'shop_rbac_group', 'ID', true, null, null );
		$this->addColumn ( 'NAME', 'Name', 'VARCHAR', true, 255, null );
		$this->addColumn ( 'DESCRIPTION', 'Description', 'VARCHAR', false, 255, null );
		// validators
	} // initialize()
	
	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations() {
		$this->addRelation ( 'ShopRbacGroup', 'ShopRbacGroup', RelationMap::MANY_TO_ONE, array (
				'group_id' => 'id' 
		), 'CASCADE', 'CASCADE' );
		$this->addRelation ( 'ShopRbacRolesPrivileges', 'ShopRbacRolesPrivileges', RelationMap::ONE_TO_MANY, array (
				'id' => 'privilege_id' 
		), 'CASCADE', 'CASCADE', 'ShopRbacRolesPrivilegess' );
		$this->addRelation ( 'ShopRbacRoles', 'ShopRbacRoles', RelationMap::MANY_TO_MANY, array (), 'CASCADE', 'CASCADE', 'ShopRbacRoless' );
	} // buildRelations()
} // ShopRbacPrivilegesTableMap
