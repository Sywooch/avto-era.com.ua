<?php



/**
 * This class defines the structure of the 'shop_products' table.
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
class SProductsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SProductsTableMap';

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
		$this->setName('shop_products');
		$this->setPhpName('SProducts');
		$this->setClassname('SProducts');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('USER_ID', 'UserId', 'INTEGER', false, null, null);
		$this->addColumn('EXTERNAL_ID', 'ExternalId', 'VARCHAR', false, 255, null);
		$this->addColumn('URL', 'Url', 'VARCHAR', true, 255, null);
		$this->addColumn('ACTIVE', 'Active', 'BOOLEAN', false, 1, null);
		$this->addColumn('HIT', 'Hit', 'BOOLEAN', false, 1, null);
		$this->addColumn('HOT', 'Hot', 'BOOLEAN', false, 1, null);
		$this->addColumn('ACTION', 'Action', 'BOOLEAN', false, 1, null);
		$this->addForeignKey('BRAND_ID', 'BrandId', 'INTEGER', 'shop_brands', 'ID', false, null, null);
		$this->addForeignKey('CATEGORY_ID', 'CategoryId', 'INTEGER', 'shop_category', 'ID', true, null, null);
		$this->addColumn('RELATED_PRODUCTS', 'RelatedProducts', 'VARCHAR', false, 255, null);
		$this->addColumn('MAINIMAGE', 'Mainimage', 'VARCHAR', false, 255, null);
		$this->addColumn('MAINMODIMAGE', 'Mainmodimage', 'VARCHAR', false, 255, null);
		$this->addColumn('SMALLIMAGE', 'Smallimage', 'VARCHAR', false, 255, null);
		$this->addColumn('SMALLMODIMAGE', 'Smallmodimage', 'VARCHAR', false, 255, null);
		$this->addColumn('OLD_PRICE', 'OldPrice', 'FLOAT', false, null, null);
		$this->addColumn('CREATED', 'Created', 'INTEGER', true, null, null);
		$this->addColumn('UPDATED', 'Updated', 'INTEGER', true, null, null);
		$this->addColumn('VIEWS', 'Views', 'INTEGER', false, null, 0);
		$this->addColumn('ADDED_TO_CART_COUNT', 'AddedToCartCount', 'INTEGER', false, null, null);
		$this->addColumn('ENABLE_COMMENTS', 'EnableComments', 'BOOLEAN', false, 1, true);
		$this->addColumn('TPL', 'Tpl', 'VARCHAR', false, 250, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Brand', 'SBrands', RelationMap::MANY_TO_ONE, array('brand_id' => 'id', ), null, null);
		$this->addRelation('MainCategory', 'SCategory', RelationMap::MANY_TO_ONE, array('category_id' => 'id', ), 'CASCADE', 'CASCADE');
		$this->addRelation('ShopKit', 'ShopKit', RelationMap::ONE_TO_MANY, array('id' => 'product_id', ), 'CASCADE', 'CASCADE', 'ShopKits');
		$this->addRelation('ShopKitProduct', 'ShopKitProduct', RelationMap::ONE_TO_MANY, array('id' => 'product_id', ), 'CASCADE', 'CASCADE', 'ShopKitProducts');
		$this->addRelation('SProductsI18n', 'SProductsI18n', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', 'CASCADE', 'SProductsI18ns');
		$this->addRelation('SProductImages', 'SProductImages', RelationMap::ONE_TO_MANY, array('id' => 'product_id', ), 'CASCADE', null, 'SProductImagess');
		$this->addRelation('ProductVariant', 'SProductVariants', RelationMap::ONE_TO_MANY, array('id' => 'product_id', ), 'CASCADE', 'CASCADE', 'ProductVariants');
		$this->addRelation('SWarehouseData', 'SWarehouseData', RelationMap::ONE_TO_MANY, array('id' => 'product_id', ), 'CASCADE', null, 'SWarehouseDatas');
		$this->addRelation('ShopProductCategories', 'ShopProductCategories', RelationMap::ONE_TO_MANY, array('id' => 'product_id', ), 'CASCADE', null, 'ShopProductCategoriess');
		$this->addRelation('SProductPropertiesData', 'SProductPropertiesData', RelationMap::ONE_TO_MANY, array('id' => 'product_id', ), 'CASCADE', null, 'SProductPropertiesDatas');
		$this->addRelation('SNotifications', 'SNotifications', RelationMap::ONE_TO_MANY, array('id' => 'product_id', ), null, null, 'SNotificationss');
		$this->addRelation('SOrderProducts', 'SOrderProducts', RelationMap::ONE_TO_MANY, array('id' => 'product_id', ), null, null, 'SOrderProductss');
		$this->addRelation('SProductsRating', 'SProductsRating', RelationMap::ONE_TO_ONE, array('id' => 'product_id', ), null, null);
		$this->addRelation('Category', 'SCategory', RelationMap::MANY_TO_MANY, array(), null, null, 'Categorys');
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
			'i18n' => array('i18n_table' => '%TABLE%_i18n', 'i18n_phpname' => '%PHPNAME%I18n', 'i18n_columns' => 'name, short_description, full_description, meta_title, meta_description, meta_keywords', 'locale_column' => 'locale', 'default_locale' => 'ru', 'locale_alias' => '', ),
			'query_cache' => array('backend' => 'custom', 'lifetime' => '600', ),
		);
	} // getBehaviors()

} // SProductsTableMap
