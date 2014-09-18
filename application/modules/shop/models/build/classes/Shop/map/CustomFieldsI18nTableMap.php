<?php



/**
 * This class defines the structure of the 'custom_fields_i18n' table.
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
class CustomFieldsI18nTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.CustomFieldsI18nTableMap';

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
		$this->setName('custom_fields_i18n');
		$this->setPhpName('CustomFieldsI18n');
		$this->setClassname('CustomFieldsI18n');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'custom_fields', 'ID', true, null, null);
		$this->addPrimaryKey('LOCALE', 'Locale', 'VARCHAR', true, 4, null);
		$this->addColumn('FIELD_LABEL', 'FieldLabel', 'VARCHAR', false, 255, null);
		$this->addColumn('FIELD_DESCRIPTION', 'FieldDescription', 'LONGVARCHAR', false, null, null);
		$this->addColumn('POSSIBLE_VALUES', 'PossibleValues', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('CustomFields', 'CustomFields', RelationMap::MANY_TO_ONE, array('id' => 'id', ), 'CASCADE', 'CASCADE');
	} // buildRelations()

} // CustomFieldsI18nTableMap
