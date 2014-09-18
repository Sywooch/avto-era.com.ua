<?php



/**
 * This class defines the structure of the 'shop_products_i18n' table.
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
class SProductsI18nTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SProductsI18nTableMap';

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
		$this->setName('shop_products_i18n');
		$this->setPhpName('SProductsI18n');
		$this->setClassname('SProductsI18n');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'shop_products', 'ID', true, null, null);
		$this->addPrimaryKey('LOCALE', 'Locale', 'VARCHAR', true, 5, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 500, null);
		$this->addColumn('SHORT_DESCRIPTION', 'ShortDescription', 'LONGVARCHAR', false, null, null);
		$this->addColumn('FULL_DESCRIPTION', 'FullDescription', 'LONGVARCHAR', false, null, null);
		$this->addColumn('META_TITLE', 'MetaTitle', 'VARCHAR', false, 255, null);
		$this->addColumn('META_DESCRIPTION', 'MetaDescription', 'VARCHAR', false, 255, null);
		$this->addColumn('META_KEYWORDS', 'MetaKeywords', 'VARCHAR', false, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('SProducts', 'SProducts', RelationMap::MANY_TO_ONE, array('id' => 'id', ), 'CASCADE', 'CASCADE');
	} // buildRelations()

} // SProductsI18nTableMap
