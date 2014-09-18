<?php



/**
 * This class defines the structure of the 'shop_product_properties' table.
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
class SPropertiesTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SPropertiesTableMap';

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
		$this->setName('shop_product_properties');
		$this->setPhpName('SProperties');
		$this->setClassname('SProperties');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('EXTERNAL_ID', 'ExternalId', 'VARCHAR', false, 255, null);
		$this->addColumn('CSV_NAME', 'CsvName', 'VARCHAR', true, 50, null);
		$this->addColumn('MULTIPLE', 'Multiple', 'BOOLEAN', false, 1, null);
		$this->addColumn('ACTIVE', 'Active', 'BOOLEAN', false, 1, null);
		$this->addColumn('SHOW_ON_SITE', 'ShowOnSite', 'BOOLEAN', false, 1, null);
		$this->addColumn('SHOW_IN_COMPARE', 'ShowInCompare', 'BOOLEAN', false, 1, null);
		$this->addColumn('SHOW_IN_FILTER', 'ShowInFilter', 'BOOLEAN', false, 1, null);
		$this->addColumn('SHOW_FAQ', 'ShowFaq', 'BOOLEAN', false, 1, null);
		$this->addColumn('MAIN_PROPERTY', 'MainProperty', 'BOOLEAN', false, 1, null);
		$this->addColumn('POSITION', 'Position', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('SPropertiesI18n', 'SPropertiesI18n', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', 'CASCADE', 'SPropertiesI18ns');
		$this->addRelation('ShopProductPropertiesCategories', 'ShopProductPropertiesCategories', RelationMap::ONE_TO_MANY, array('id' => 'property_id', ), 'CASCADE', null, 'ShopProductPropertiesCategoriess');
		$this->addRelation('SProductPropertiesData', 'SProductPropertiesData', RelationMap::ONE_TO_MANY, array('id' => 'property_id', ), 'CASCADE', null, 'SProductPropertiesDatas');
		$this->addRelation('PropertyCategory', 'SCategory', RelationMap::MANY_TO_MANY, array(), 'CASCADE', null, 'PropertyCategorys');
	} // buildRelations()

	/**
	 *
	 * Gets the list of behaviors registered for this table
	 *
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'i18n' => array('i18n_table' => '%TABLE%_i18n', 'i18n_phpname' => '%PHPNAME%I18n', 'i18n_columns' => 'name, description', 'locale_column' => 'locale', 'default_locale' => 'ru', 'locale_alias' => '', ),
		);
	} // getBehaviors()

} // SPropertiesTableMap
