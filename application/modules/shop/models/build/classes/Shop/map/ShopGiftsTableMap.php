<?php



/**
 * This class defines the structure of the 'shop_gifts' table.
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
class ShopGiftsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.ShopGiftsTableMap';

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
		$this->setName('shop_gifts');
		$this->setPhpName('ShopGifts');
		$this->setClassname('ShopGifts');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('KEY', 'Key', 'VARCHAR', false, 255, null);
		$this->addColumn('ACTIVE', 'Active', 'INTEGER', false, null, null);
		$this->addColumn('PRICE', 'Price', 'INTEGER', false, null, null);
		$this->addColumn('CREATED', 'Created', 'INTEGER', false, null, null);
		$this->addColumn('ESPDATE', 'Espdate', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // ShopGiftsTableMap
