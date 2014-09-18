<?php



/**
 * This class defines the structure of the 'shop_sorting' table.
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
class SSortingTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SSortingTableMap';

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
		$this->setName('shop_sorting');
		$this->setPhpName('SSorting');
		$this->setClassname('SSorting');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('POS', 'Pos', 'INTEGER', false, 11, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 50, null);
		$this->addColumn('NAME_FRONT', 'NameFront', 'VARCHAR', false, 50, null);
		$this->addColumn('TOOLTIP', 'Tooltip', 'VARCHAR', false, 100, null);
		$this->addColumn('GET', 'Get', 'VARCHAR', true, 25, null);
		$this->addColumn('ACTIVE', 'Active', 'BOOLEAN', false, 1, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // SSortingTableMap
