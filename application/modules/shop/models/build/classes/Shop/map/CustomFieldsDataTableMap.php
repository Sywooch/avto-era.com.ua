<?php



/**
 * This class defines the structure of the 'custom_fields_data' table.
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
class CustomFieldsDataTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.CustomFieldsDataTableMap';

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
		$this->setName('custom_fields_data');
		$this->setPhpName('CustomFieldsData');
		$this->setClassname('CustomFieldsData');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(true);
		$this->setIsCrossRef(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('LOCALE', 'Locale', 'VARCHAR', true, 4, null);
		$this->addColumn('FIELD_ID', 'fieldId', 'INTEGER', true, null, null);
		$this->addColumn('ENTITY_ID', 'entityId', 'INTEGER', true, null, null);
		$this->addColumn('FIELD_DATA', 'data', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // CustomFieldsDataTableMap
