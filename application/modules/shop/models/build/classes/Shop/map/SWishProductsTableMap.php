<?php



/**
 * This class defines the structure of the 'shop_wishes_products' table.
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
class SWishProductsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SWishProductsTableMap';

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
		$this->setName('shop_wishes_products');
		$this->setPhpName('SWishProducts');
		$this->setClassname('SWishProducts');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('WISH_ID', 'WishId', 'INTEGER', 'shop_wishes', 'ID', true, null, null);
		$this->addForeignKey('PRODUCT_ID', 'ProductId', 'INTEGER', 'shop_products', 'ID', true, null, null);
		$this->addColumn('VARIANT_ID', 'VariantId', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SProducts', 'SProducts', RelationMap::MANY_TO_ONE, array('product_id' => 'id', ), null, null);
    $this->addRelation('SWishes', 'SWishes', RelationMap::MANY_TO_ONE, array('wish_id' => 'id', ), 'CASCADE', null);
	} // buildRelations()

} // SWishProductsTableMap
