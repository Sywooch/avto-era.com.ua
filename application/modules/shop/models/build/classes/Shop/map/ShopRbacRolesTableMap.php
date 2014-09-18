<?php



/**
 * This class defines the structure of the 'shop_rbac_roles' table.
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
class ShopRbacRolesTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.ShopRbacRolesTableMap';

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
		$this->setName('shop_rbac_roles');
		$this->setPhpName('ShopRbacRoles');
		$this->setClassname('ShopRbacRoles');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 255, null);
		$this->addColumn('IMPORTANCE', 'Importance', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('SUserProfile', 'SUserProfile', RelationMap::ONE_TO_MANY, array('id' => 'role_id', ), 'SET NULL', 'CASCADE', 'SUserProfiles');
		$this->addRelation('ShopRbacRolesPrivileges', 'ShopRbacRolesPrivileges', RelationMap::ONE_TO_MANY, array('id' => 'role_id', ), 'CASCADE', 'CASCADE', 'ShopRbacRolesPrivilegess');
		$this->addRelation('ShopRbacPrivileges', 'ShopRbacPrivileges', RelationMap::MANY_TO_MANY, array(), 'CASCADE', 'CASCADE', 'ShopRbacPrivilegess');
	} // buildRelations()

} // ShopRbacRolesTableMap
