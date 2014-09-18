<?php



/**
 * This class defines the structure of the 'shop_orders_status_history' table.
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
class SOrderStatusHistoryTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SOrderStatusHistoryTableMap';

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
		$this->setName('shop_orders_status_history');
		$this->setPhpName('SOrderStatusHistory');
		$this->setClassname('SOrderStatusHistory');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ORDER_ID', 'OrderId', 'INTEGER', 'shop_orders', 'ID', true, null, null);
		$this->addForeignKey('STATUS_ID', 'StatusId', 'INTEGER', 'shop_order_statuses', 'ID', true, null, null);
		$this->addColumn('USER_ID', 'UserId', 'INTEGER', true, null, null);
		$this->addColumn('DATE_CREATED', 'DateCreated', 'INTEGER', false, null, null);
		$this->addColumn('COMMENT', 'Comment', 'VARCHAR', false, 1000, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('SOrders', 'SOrders', RelationMap::MANY_TO_ONE, array('order_id' => 'id', ), 'CASCADE', null);
		$this->addRelation('SOrderStatuses', 'SOrderStatuses', RelationMap::MANY_TO_ONE, array('status_id' => 'id', ), 'SET NULL', null);
	} // buildRelations()

} // SOrderStatusHistoryTableMap
