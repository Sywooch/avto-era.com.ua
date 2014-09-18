<?php



/**
 * This class defines the structure of the 'shop_rbac_roles_privileges' table.
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
class ShopRbacRolesPrivilegesTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.ShopRbacRolesPrivilegesTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName('shop_rbac_roles_privileges');
		$this->setPhpName('ShopRbacRolesPrivileges');
		$this->setClassname('ShopRbacRolesPrivileges');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(true);
		$this->setIsCrossRef(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ROLE_ID', 'RoleId', 'INTEGER', 'shop_rbac_roles', 'ID', true, null, null);
		$this->addForeignKey('PRIVILEGE_ID', 'PrivilegeId', 'INTEGER', 'shop_rbac_privileges', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('ShopRbacRoles', 'ShopRbacRoles', RelationMap::MANY_TO_ONE, array('role_id' => 'id', ), 'CASCADE', 'CASCADE');
		$this->addRelation('ShopRbacPrivileges', 'ShopRbacPrivileges', RelationMap::MANY_TO_ONE, array('privilege_id' => 'id', ), 'CASCADE', 'CASCADE');
	} // buildRelations()

} // ShopRbacRolesPrivilegesTableMap
