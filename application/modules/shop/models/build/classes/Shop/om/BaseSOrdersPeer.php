<?php

/**
 * Base static class for performing query and update operations on the 'shop_orders' table.
 *
 * 
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSOrdersPeer {
	
	/**
	 * the default database name for this class
	 */
	const DATABASE_NAME = 'Shop';
	
	/**
	 * the table name for this class
	 */
	const TABLE_NAME = 'shop_orders';
	
	/**
	 * the related Propel class for this table
	 */
	const OM_CLASS = 'SOrders';
	
	/**
	 * A class that can be returned by this peer.
	 */
	const CLASS_DEFAULT = 'Shop.SOrders';
	
	/**
	 * the related TableMap class for this table
	 */
	const TM_CLASS = 'SOrdersTableMap';
	
	/**
	 * The total number of columns.
	 */
	const NUM_COLUMNS = 24;
	
	/**
	 * The number of lazy-loaded columns.
	 */
	const NUM_LAZY_LOAD_COLUMNS = 0;
	
	/**
	 * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
	 */
	const NUM_HYDRATE_COLUMNS = 24;
	
	/**
	 * the column name for the ID field
	 */
	const ID = 'shop_orders.ID';
	
	/**
	 * the column name for the USER_ID field
	 */
	const USER_ID = 'shop_orders.USER_ID';
	
	/**
	 * the column name for the KEY field
	 */
	const KEY = 'shop_orders.KEY';
	
	/**
	 * the column name for the DELIVERY_METHOD field
	 */
	const DELIVERY_METHOD = 'shop_orders.DELIVERY_METHOD';
	
	/**
	 * the column name for the DELIVERY_PRICE field
	 */
	const DELIVERY_PRICE = 'shop_orders.DELIVERY_PRICE';
	
	/**
	 * the column name for the PAYMENT_METHOD field
	 */
	const PAYMENT_METHOD = 'shop_orders.PAYMENT_METHOD';
	
	/**
	 * the column name for the STATUS field
	 */
	const STATUS = 'shop_orders.STATUS';
	
	/**
	 * the column name for the PAID field
	 */
	const PAID = 'shop_orders.PAID';
	
	/**
	 * the column name for the USER_FULL_NAME field
	 */
	const USER_FULL_NAME = 'shop_orders.USER_FULL_NAME';
	
	/**
	 * the column name for the USER_EMAIL field
	 */
	const USER_EMAIL = 'shop_orders.USER_EMAIL';
	
	/**
	 * the column name for the USER_PHONE field
	 */
	const USER_PHONE = 'shop_orders.USER_PHONE';
	
	/**
	 * the column name for the USER_DELIVER_TO field
	 */
	const USER_DELIVER_TO = 'shop_orders.USER_DELIVER_TO';
	
	/**
	 * the column name for the USER_COMMENT field
	 */
	const USER_COMMENT = 'shop_orders.USER_COMMENT';
	
	/**
	 * the column name for the DATE_CREATED field
	 */
	const DATE_CREATED = 'shop_orders.DATE_CREATED';
	
	/**
	 * the column name for the DATE_UPDATED field
	 */
	const DATE_UPDATED = 'shop_orders.DATE_UPDATED';
	
	/**
	 * the column name for the USER_IP field
	 */
	const USER_IP = 'shop_orders.USER_IP';
	
	/**
	 * the column name for the TOTAL_PRICE field
	 */
	const TOTAL_PRICE = 'shop_orders.TOTAL_PRICE';
	
	/**
	 * the column name for the EXTERNAL_ID field
	 */
	const EXTERNAL_ID = 'shop_orders.EXTERNAL_ID';
	
	/**
	 * the column name for the GIFT_CERT_KEY field
	 */
	const GIFT_CERT_KEY = 'shop_orders.GIFT_CERT_KEY';
	
	/**
	 * the column name for the DISCOUNT field
	 */
	const DISCOUNT = 'shop_orders.DISCOUNT';
	
	/**
	 * the column name for the GIFT_CERT_PRICE field
	 */
	const GIFT_CERT_PRICE = 'shop_orders.GIFT_CERT_PRICE';
	
	/**
	 * the column name for the DISCOUNT_INFO field
	 */
	const DISCOUNT_INFO = 'shop_orders.DISCOUNT_INFO';
	
	/**
	 * the column name for the ORIGIN_PRICE field
	 */
	const ORIGIN_PRICE = 'shop_orders.ORIGIN_PRICE';
	
	/**
	 * the column name for the COMULATIV field
	 */
	const COMULATIV = 'shop_orders.COMULATIV';
	
	/**
	 * The default string format for model objects of the related table *
	 */
	const DEFAULT_STRING_FORMAT = 'YAML';
	
	/**
	 * An identiy map to hold any loaded instances of SOrders objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * 
	 * @var array SOrders[]
	 */
	public static $instances = array ();
	
	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
			BasePeer::TYPE_PHPNAME => array (
					'Id',
					'UserId',
					'Key',
					'DeliveryMethod',
					'DeliveryPrice',
					'PaymentMethod',
					'Status',
					'Paid',
					'UserFullName',
					'UserEmail',
					'UserPhone',
					'UserDeliverTo',
					'UserComment',
					'DateCreated',
					'DateUpdated',
					'UserIp',
					'TotalPrice',
					'ExternalId',
					'GiftCertKey',
					'Discount',
					'GiftCertPrice',
					'DiscountInfo',
					'OriginPrice',
					'Comulativ' 
			),
			BasePeer::TYPE_STUDLYPHPNAME => array (
					'id',
					'userId',
					'key',
					'deliveryMethod',
					'deliveryPrice',
					'paymentMethod',
					'status',
					'paid',
					'userFullName',
					'userEmail',
					'userPhone',
					'userDeliverTo',
					'userComment',
					'dateCreated',
					'dateUpdated',
					'userIp',
					'totalPrice',
					'externalId',
					'giftCertKey',
					'discount',
					'giftCertPrice',
					'discountInfo',
					'originPrice',
					'comulativ' 
			),
			BasePeer::TYPE_COLNAME => array (
					self::ID,
					self::USER_ID,
					self::KEY,
					self::DELIVERY_METHOD,
					self::DELIVERY_PRICE,
					self::PAYMENT_METHOD,
					self::STATUS,
					self::PAID,
					self::USER_FULL_NAME,
					self::USER_EMAIL,
					self::USER_PHONE,
					self::USER_DELIVER_TO,
					self::USER_COMMENT,
					self::DATE_CREATED,
					self::DATE_UPDATED,
					self::USER_IP,
					self::TOTAL_PRICE,
					self::EXTERNAL_ID,
					self::GIFT_CERT_KEY,
					self::DISCOUNT,
					self::GIFT_CERT_PRICE,
					self::DISCOUNT_INFO,
					self::ORIGIN_PRICE,
					self::COMULATIV 
			),
			BasePeer::TYPE_RAW_COLNAME => array (
					'ID',
					'USER_ID',
					'KEY',
					'DELIVERY_METHOD',
					'DELIVERY_PRICE',
					'PAYMENT_METHOD',
					'STATUS',
					'PAID',
					'USER_FULL_NAME',
					'USER_EMAIL',
					'USER_PHONE',
					'USER_DELIVER_TO',
					'USER_COMMENT',
					'DATE_CREATED',
					'DATE_UPDATED',
					'USER_IP',
					'TOTAL_PRICE',
					'EXTERNAL_ID',
					'GIFT_CERT_KEY',
					'DISCOUNT',
					'GIFT_CERT_PRICE',
					'DISCOUNT_INFO',
					'ORIGIN_PRICE',
					'COMULATIV' 
			),
			BasePeer::TYPE_FIELDNAME => array (
					'id',
					'user_id',
					'key',
					'delivery_method',
					'delivery_price',
					'payment_method',
					'status',
					'paid',
					'user_full_name',
					'user_email',
					'user_phone',
					'user_deliver_to',
					'user_comment',
					'date_created',
					'date_updated',
					'user_ip',
					'total_price',
					'external_id',
					'gift_cert_key',
					'discount',
					'gift_cert_price',
					'discount_info',
					'origin_price',
					'comulativ' 
			),
			BasePeer::TYPE_NUM => array (
					0,
					1,
					2,
					3,
					4,
					5,
					6,
					7,
					8,
					9,
					10,
					11,
					12,
					13,
					14,
					15,
					16,
					17,
					18,
					19,
					20,
					21,
					22,
					23 
			) 
	);
	
	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
			BasePeer::TYPE_PHPNAME => array (
					'Id' => 0,
					'UserId' => 1,
					'Key' => 2,
					'DeliveryMethod' => 3,
					'DeliveryPrice' => 4,
					'PaymentMethod' => 5,
					'Status' => 6,
					'Paid' => 7,
					'UserFullName' => 8,
					'UserEmail' => 9,
					'UserPhone' => 10,
					'UserDeliverTo' => 11,
					'UserComment' => 12,
					'DateCreated' => 13,
					'DateUpdated' => 14,
					'UserIp' => 15,
					'TotalPrice' => 16,
					'ExternalId' => 17,
					'GiftCertKey' => 18,
					'Discount' => 19,
					'GiftCertPrice' => 20,
					'DiscountInfo' => 21,
					'OriginPrice' => 22,
					'Comulativ' => 23 
			),
			BasePeer::TYPE_STUDLYPHPNAME => array (
					'id' => 0,
					'userId' => 1,
					'key' => 2,
					'deliveryMethod' => 3,
					'deliveryPrice' => 4,
					'paymentMethod' => 5,
					'status' => 6,
					'paid' => 7,
					'userFullName' => 8,
					'userEmail' => 9,
					'userPhone' => 10,
					'userDeliverTo' => 11,
					'userComment' => 12,
					'dateCreated' => 13,
					'dateUpdated' => 14,
					'userIp' => 15,
					'totalPrice' => 16,
					'externalId' => 17,
					'giftCertKey' => 18,
					'discount' => 19,
					'giftCertPrice' => 20,
					'discountInfo' => 21,
					'originPrice' => 22,
					'comulativ' => 23 
			),
			BasePeer::TYPE_COLNAME => array (
					self::ID => 0,
					self::USER_ID => 1,
					self::KEY => 2,
					self::DELIVERY_METHOD => 3,
					self::DELIVERY_PRICE => 4,
					self::PAYMENT_METHOD => 5,
					self::STATUS => 6,
					self::PAID => 7,
					self::USER_FULL_NAME => 8,
					self::USER_EMAIL => 9,
					self::USER_PHONE => 10,
					self::USER_DELIVER_TO => 11,
					self::USER_COMMENT => 12,
					self::DATE_CREATED => 13,
					self::DATE_UPDATED => 14,
					self::USER_IP => 15,
					self::TOTAL_PRICE => 16,
					self::EXTERNAL_ID => 17,
					self::GIFT_CERT_KEY => 18,
					self::DISCOUNT => 19,
					self::GIFT_CERT_PRICE => 20,
					self::DISCOUNT_INFO => 21,
					self::ORIGIN_PRICE => 22,
					self::COMULATIV => 23 
			),
			BasePeer::TYPE_RAW_COLNAME => array (
					'ID' => 0,
					'USER_ID' => 1,
					'KEY' => 2,
					'DELIVERY_METHOD' => 3,
					'DELIVERY_PRICE' => 4,
					'PAYMENT_METHOD' => 5,
					'STATUS' => 6,
					'PAID' => 7,
					'USER_FULL_NAME' => 8,
					'USER_EMAIL' => 9,
					'USER_PHONE' => 10,
					'USER_DELIVER_TO' => 11,
					'USER_COMMENT' => 12,
					'DATE_CREATED' => 13,
					'DATE_UPDATED' => 14,
					'USER_IP' => 15,
					'TOTAL_PRICE' => 16,
					'EXTERNAL_ID' => 17,
					'GIFT_CERT_KEY' => 18,
					'DISCOUNT' => 19,
					'GIFT_CERT_PRICE' => 20,
					'DISCOUNT_INFO' => 21,
					'ORIGIN_PRICE' => 22,
					'COMULATIV' => 23 
			),
			BasePeer::TYPE_FIELDNAME => array (
					'id' => 0,
					'user_id' => 1,
					'key' => 2,
					'delivery_method' => 3,
					'delivery_price' => 4,
					'payment_method' => 5,
					'status' => 6,
					'paid' => 7,
					'user_full_name' => 8,
					'user_email' => 9,
					'user_phone' => 10,
					'user_deliver_to' => 11,
					'user_comment' => 12,
					'date_created' => 13,
					'date_updated' => 14,
					'user_ip' => 15,
					'total_price' => 16,
					'external_id' => 17,
					'gift_cert_key' => 18,
					'discount' => 19,
					'gift_cert_price' => 20,
					'discount_info' => 21,
					'origin_price' => 22,
					'comulativ' => 23 
			),
			BasePeer::TYPE_NUM => array (
					0,
					1,
					2,
					3,
					4,
					5,
					6,
					7,
					8,
					9,
					10,
					11,
					12,
					13,
					14,
					15,
					16,
					17,
					18,
					19,
					20,
					21,
					22,
					23 
			) 
	);
	
	/**
	 * Translates a fieldname to another type
	 *
	 * @param string $name
	 *        	field name
	 * @param string $fromType
	 *        	One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *        	BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param string $toType
	 *        	One of the class type constants
	 * @return string translated name of the field.
	 * @throws PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType) {
		$toNames = self::getFieldNames ( $toType );
		$key = isset ( self::$fieldKeys [$fromType] [$name] ) ? self::$fieldKeys [$fromType] [$name] : null;
		if ($key === null) {
			throw new PropelException ( "'$name' could not be found in the field names of type '$fromType'. These are: " . print_r ( self::$fieldKeys [$fromType], true ) );
		}
		return $toNames [$key];
	}
	
	/**
	 * Returns an array of field names.
	 *
	 * @param string $type
	 *        	The type of fieldnames to return:
	 *        	One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *        	BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return array A list of field names
	 */
	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME) {
		if (! array_key_exists ( $type, self::$fieldNames )) {
			throw new PropelException ( 'Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.' );
		}
		return self::$fieldNames [$type];
	}
	
	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 * $c->addAlias("alias1", TablePeer::TABLE_NAME);
	 * $c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * 
	 * @param string $alias
	 *        	The alias for the current table.
	 * @param string $column
	 *        	The column name for current table. (i.e. SOrdersPeer::COLUMN_NAME).
	 * @return string
	 */
	public static function alias($alias, $column) {
		return str_replace ( SOrdersPeer::TABLE_NAME . '.', $alias . '.', $column );
	}
	
	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param Criteria $criteria
	 *        	object containing the columns to add.
	 * @param string $alias
	 *        	optional table alias
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null) {
		if (null === $alias) {
			$criteria->addSelectColumn ( SOrdersPeer::ID );
			$criteria->addSelectColumn ( SOrdersPeer::USER_ID );
			$criteria->addSelectColumn ( SOrdersPeer::KEY );
			$criteria->addSelectColumn ( SOrdersPeer::DELIVERY_METHOD );
			$criteria->addSelectColumn ( SOrdersPeer::DELIVERY_PRICE );
			$criteria->addSelectColumn ( SOrdersPeer::PAYMENT_METHOD );
			$criteria->addSelectColumn ( SOrdersPeer::STATUS );
			$criteria->addSelectColumn ( SOrdersPeer::PAID );
			$criteria->addSelectColumn ( SOrdersPeer::USER_FULL_NAME );
			$criteria->addSelectColumn ( SOrdersPeer::USER_EMAIL );
			$criteria->addSelectColumn ( SOrdersPeer::USER_PHONE );
			$criteria->addSelectColumn ( SOrdersPeer::USER_DELIVER_TO );
			$criteria->addSelectColumn ( SOrdersPeer::USER_COMMENT );
			$criteria->addSelectColumn ( SOrdersPeer::DATE_CREATED );
			$criteria->addSelectColumn ( SOrdersPeer::DATE_UPDATED );
			$criteria->addSelectColumn ( SOrdersPeer::USER_IP );
			$criteria->addSelectColumn ( SOrdersPeer::TOTAL_PRICE );
			$criteria->addSelectColumn ( SOrdersPeer::EXTERNAL_ID );
			$criteria->addSelectColumn ( SOrdersPeer::GIFT_CERT_KEY );
			$criteria->addSelectColumn ( SOrdersPeer::DISCOUNT );
			$criteria->addSelectColumn ( SOrdersPeer::GIFT_CERT_PRICE );
			$criteria->addSelectColumn ( SOrdersPeer::DISCOUNT_INFO );
			$criteria->addSelectColumn ( SOrdersPeer::ORIGIN_PRICE );
			$criteria->addSelectColumn ( SOrdersPeer::COMULATIV );
		} else {
			$criteria->addSelectColumn ( $alias . '.ID' );
			$criteria->addSelectColumn ( $alias . '.USER_ID' );
			$criteria->addSelectColumn ( $alias . '.KEY' );
			$criteria->addSelectColumn ( $alias . '.DELIVERY_METHOD' );
			$criteria->addSelectColumn ( $alias . '.DELIVERY_PRICE' );
			$criteria->addSelectColumn ( $alias . '.PAYMENT_METHOD' );
			$criteria->addSelectColumn ( $alias . '.STATUS' );
			$criteria->addSelectColumn ( $alias . '.PAID' );
			$criteria->addSelectColumn ( $alias . '.USER_FULL_NAME' );
			$criteria->addSelectColumn ( $alias . '.USER_EMAIL' );
			$criteria->addSelectColumn ( $alias . '.USER_PHONE' );
			$criteria->addSelectColumn ( $alias . '.USER_DELIVER_TO' );
			$criteria->addSelectColumn ( $alias . '.USER_COMMENT' );
			$criteria->addSelectColumn ( $alias . '.DATE_CREATED' );
			$criteria->addSelectColumn ( $alias . '.DATE_UPDATED' );
			$criteria->addSelectColumn ( $alias . '.USER_IP' );
			$criteria->addSelectColumn ( $alias . '.TOTAL_PRICE' );
			$criteria->addSelectColumn ( $alias . '.EXTERNAL_ID' );
			$criteria->addSelectColumn ( $alias . '.GIFT_CERT_KEY' );
			$criteria->addSelectColumn ( $alias . '.DISCOUNT' );
			$criteria->addSelectColumn ( $alias . '.GIFT_CERT_PRICE' );
			$criteria->addSelectColumn ( $alias . '.DISCOUNT_INFO' );
			$criteria->addSelectColumn ( $alias . '.ORIGIN_PRICE' );
			$criteria->addSelectColumn ( $alias . '.COMULATIV' );
		}
	}
	
	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @return int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null) {
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SOrdersPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SOrdersPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY won't ever affect the count
		$criteria->setDbName ( self::DATABASE_NAME ); // Set the correct dbName
		
		if ($con === null) {
			$con = Propel::getConnection ( SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount ( $criteria, $con );
		
		if ($row = $stmt->fetch ( PDO::FETCH_NUM )) {
			$count = ( int ) $row [0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor ();
		return $count;
	}
	/**
	 * Selects one object from the DB.
	 *
	 * @param Criteria $criteria
	 *        	object used to create the SELECT statement.
	 * @param PropelPDO $con        	
	 * @return SOrders
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null) {
		$critcopy = clone $criteria;
		$critcopy->setLimit ( 1 );
		$objects = SOrdersPeer::doSelect ( $critcopy, $con );
		if ($objects) {
			return $objects [0];
		}
		return null;
	}
	/**
	 * Selects several row from the DB.
	 *
	 * @param Criteria $criteria
	 *        	The Criteria object used to build the SELECT statement.
	 * @param PropelPDO $con        	
	 * @return array Array of selected Objects
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null) {
		return SOrdersPeer::populateObjects ( SOrdersPeer::doSelectStmt ( $criteria, $con ) );
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param Criteria $criteria
	 *        	The Criteria object used to build the SELECT statement.
	 * @param PropelPDO $con
	 *        	The connection to use
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 * @return PDOStatement The executed PDOStatement object.
	 * @see BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null) {
		if ($con === null) {
			$con = Propel::getConnection ( SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		if (! $criteria->hasSelectClause ()) {
			$criteria = clone $criteria;
			SOrdersPeer::addSelectColumns ( $criteria );
		}
		
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		// BasePeer returns a PDOStatement
		return BasePeer::doSelect ( $criteria, $con );
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database. In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param SOrders $value
	 *        	A SOrders object.
	 * @param string $key
	 *        	(optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool($obj, $key = null) {
		if (Propel::isInstancePoolingEnabled ()) {
			if ($key === null) {
				$key = ( string ) $obj->getId ();
			} // if key === null
			self::$instances [$key] = $obj;
		}
	}
	
	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database. In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param mixed $value
	 *        	A SOrders object or a primary key value.
	 */
	public static function removeInstanceFromPool($value) {
		if (Propel::isInstancePoolingEnabled () && $value !== null) {
			if (is_object ( $value ) && $value instanceof SOrders) {
				$key = ( string ) $value->getId ();
			} elseif (is_scalar ( $value )) {
				// assume we've been passed a primary key
				$key = ( string ) $value;
			} else {
				$e = new PropelException ( "Invalid value passed to removeInstanceFromPool().  Expected primary key or SOrders object; got " . (is_object ( $value ) ? get_class ( $value ) . ' object.' : var_export ( $value, true )) );
				throw $e;
			}
			
			unset ( self::$instances [$key] );
		}
	} // removeInstanceFromPool()
	
	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned. For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param string $key
	 *        	The key (@see getPrimaryKeyHash()) for this instance.
	 * @return SOrders Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key) {
		if (Propel::isInstancePoolingEnabled ()) {
			if (isset ( self::$instances [$key] )) {
				return self::$instances [$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return void
	 */
	public static function clearInstancePool() {
		self::$instances = array ();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to shop_orders
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool() {
		// Invalidate objects in SOrderProductsPeer instance pool,
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		SOrderProductsPeer::clearInstancePool ();
		// Invalidate objects in SOrderStatusHistoryPeer instance pool,
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		SOrderStatusHistoryPeer::clearInstancePool ();
	}
	
	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned. For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param array $row
	 *        	PropelPDO resultset row.
	 * @param int $startcol
	 *        	The 0-based offset for reading from the resultset row.
	 * @return string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0) {
		// If the PK cannot be derived from the row, return NULL.
		if ($row [$startcol] === null) {
			return null;
		}
		return ( string ) $row [$startcol];
	}
	
	/**
	 * Retrieves the primary key from the DB resultset row
	 * For tables with a single-column primary key, that simple pkey value will be returned.
	 * For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param array $row
	 *        	PropelPDO resultset row.
	 * @param int $startcol
	 *        	The 0-based offset for reading from the resultset row.
	 * @return mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0) {
		return ( int ) $row [$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt) {
		$results = array ();
		
		// set the class once to avoid overhead in the loop
		$cls = SOrdersPeer::getOMClass ( false );
		// populate the object(s)
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key = SOrdersPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj = SOrdersPeer::getInstanceFromPool ( $key ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results [] = $obj;
			} else {
				$obj = new $cls ();
				$obj->hydrate ( $row );
				$results [] = $obj;
				SOrdersPeer::addInstanceToPool ( $obj, $key );
			} // if key exists
		}
		$stmt->closeCursor ();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param array $row
	 *        	PropelPDO resultset row.
	 * @param int $startcol
	 *        	The 0-based offset for reading from the resultset row.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 * @return array (SOrders object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0) {
		$key = SOrdersPeer::getPrimaryKeyHashFromRow ( $row, $startcol );
		if (null !== ($obj = SOrdersPeer::getInstanceFromPool ( $key ))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + SOrdersPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = SOrdersPeer::OM_CLASS;
			$obj = new $cls ();
			$col = $obj->hydrate ( $row, $startcol );
			SOrdersPeer::addInstanceToPool ( $obj, $key );
		}
		return array (
				$obj,
				$col 
		);
	}
	
	/**
	 * Returns the number of rows matching criteria, joining the related SDeliveryMethods table
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinSDeliveryMethods(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SOrdersPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SOrdersPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY won't ever affect the count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SOrdersPeer::DELIVERY_METHOD, SDeliveryMethodsPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doCount ( $criteria, $con );
		
		if ($row = $stmt->fetch ( PDO::FETCH_NUM )) {
			$count = ( int ) $row [0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor ();
		return $count;
	}
	
	/**
	 * Returns the number of rows matching criteria, joining the related SPaymentMethods table
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinSPaymentMethods(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SOrdersPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SOrdersPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY won't ever affect the count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SOrdersPeer::PAYMENT_METHOD, SPaymentMethodsPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doCount ( $criteria, $con );
		
		if ($row = $stmt->fetch ( PDO::FETCH_NUM )) {
			$count = ( int ) $row [0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor ();
		return $count;
	}
	
	/**
	 * Returns the number of rows matching criteria, joining the related SOrderStatuses table
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinSOrderStatuses(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SOrdersPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SOrdersPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY won't ever affect the count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SOrdersPeer::STATUS, SOrderStatusesPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doCount ( $criteria, $con );
		
		if ($row = $stmt->fetch ( PDO::FETCH_NUM )) {
			$count = ( int ) $row [0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor ();
		return $count;
	}
	
	/**
	 * Selects a collection of SOrders objects pre-filled with their SDeliveryMethods objects.
	 * 
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SOrders objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSDeliveryMethods(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SOrdersPeer::addSelectColumns ( $criteria );
		$startcol = SOrdersPeer::NUM_HYDRATE_COLUMNS;
		SDeliveryMethodsPeer::addSelectColumns ( $criteria );
		
		$criteria->addJoin ( SOrdersPeer::DELIVERY_METHOD, SDeliveryMethodsPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SOrdersPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SOrdersPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				
				$cls = SOrdersPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SOrdersPeer::addInstanceToPool ( $obj1, $key1 );
			} // if $obj1 already loaded
			
			$key2 = SDeliveryMethodsPeer::getPrimaryKeyHashFromRow ( $row, $startcol );
			if ($key2 !== null) {
				$obj2 = SDeliveryMethodsPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SDeliveryMethodsPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol );
					SDeliveryMethodsPeer::addInstanceToPool ( $obj2, $key2 );
				} // if obj2 already loaded
				  
				// Add the $obj1 (SOrders) to $obj2 (SDeliveryMethods)
				$obj2->addSOrders ( $obj1 );
			} // if joined row was not null
			
			$results [] = $obj1;
		}
		$stmt->closeCursor ();
		return $results;
	}
	
	/**
	 * Selects a collection of SOrders objects pre-filled with their SPaymentMethods objects.
	 * 
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SOrders objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSPaymentMethods(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SOrdersPeer::addSelectColumns ( $criteria );
		$startcol = SOrdersPeer::NUM_HYDRATE_COLUMNS;
		SPaymentMethodsPeer::addSelectColumns ( $criteria );
		
		$criteria->addJoin ( SOrdersPeer::PAYMENT_METHOD, SPaymentMethodsPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SOrdersPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SOrdersPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				
				$cls = SOrdersPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SOrdersPeer::addInstanceToPool ( $obj1, $key1 );
			} // if $obj1 already loaded
			
			$key2 = SPaymentMethodsPeer::getPrimaryKeyHashFromRow ( $row, $startcol );
			if ($key2 !== null) {
				$obj2 = SPaymentMethodsPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SPaymentMethodsPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol );
					SPaymentMethodsPeer::addInstanceToPool ( $obj2, $key2 );
				} // if obj2 already loaded
				  
				// Add the $obj1 (SOrders) to $obj2 (SPaymentMethods)
				$obj2->addSOrders ( $obj1 );
			} // if joined row was not null
			
			$results [] = $obj1;
		}
		$stmt->closeCursor ();
		return $results;
	}
	
	/**
	 * Selects a collection of SOrders objects pre-filled with their SOrderStatuses objects.
	 * 
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SOrders objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSOrderStatuses(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SOrdersPeer::addSelectColumns ( $criteria );
		$startcol = SOrdersPeer::NUM_HYDRATE_COLUMNS;
		SOrderStatusesPeer::addSelectColumns ( $criteria );
		
		$criteria->addJoin ( SOrdersPeer::STATUS, SOrderStatusesPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SOrdersPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SOrdersPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				
				$cls = SOrdersPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SOrdersPeer::addInstanceToPool ( $obj1, $key1 );
			} // if $obj1 already loaded
			
			$key2 = SOrderStatusesPeer::getPrimaryKeyHashFromRow ( $row, $startcol );
			if ($key2 !== null) {
				$obj2 = SOrderStatusesPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SOrderStatusesPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol );
					SOrderStatusesPeer::addInstanceToPool ( $obj2, $key2 );
				} // if obj2 already loaded
				  
				// Add the $obj1 (SOrders) to $obj2 (SOrderStatuses)
				$obj2->addSOrders ( $obj1 );
			} // if joined row was not null
			
			$results [] = $obj1;
		}
		$stmt->closeCursor ();
		return $results;
	}
	
	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SOrdersPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SOrdersPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY won't ever affect the count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SOrdersPeer::DELIVERY_METHOD, SDeliveryMethodsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SOrdersPeer::PAYMENT_METHOD, SPaymentMethodsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SOrdersPeer::STATUS, SOrderStatusesPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doCount ( $criteria, $con );
		
		if ($row = $stmt->fetch ( PDO::FETCH_NUM )) {
			$count = ( int ) $row [0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor ();
		return $count;
	}
	
	/**
	 * Selects a collection of SOrders objects pre-filled with all related objects.
	 *
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SOrders objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SOrdersPeer::addSelectColumns ( $criteria );
		$startcol2 = SOrdersPeer::NUM_HYDRATE_COLUMNS;
		
		SDeliveryMethodsPeer::addSelectColumns ( $criteria );
		$startcol3 = $startcol2 + SDeliveryMethodsPeer::NUM_HYDRATE_COLUMNS;
		
		SPaymentMethodsPeer::addSelectColumns ( $criteria );
		$startcol4 = $startcol3 + SPaymentMethodsPeer::NUM_HYDRATE_COLUMNS;
		
		SOrderStatusesPeer::addSelectColumns ( $criteria );
		$startcol5 = $startcol4 + SOrderStatusesPeer::NUM_HYDRATE_COLUMNS;
		
		$criteria->addJoin ( SOrdersPeer::DELIVERY_METHOD, SDeliveryMethodsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SOrdersPeer::PAYMENT_METHOD, SPaymentMethodsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SOrdersPeer::STATUS, SOrderStatusesPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SOrdersPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SOrdersPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SOrdersPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SOrdersPeer::addInstanceToPool ( $obj1, $key1 );
			} // if obj1 already loaded
			  
			// Add objects for joined SDeliveryMethods rows
			
			$key2 = SDeliveryMethodsPeer::getPrimaryKeyHashFromRow ( $row, $startcol2 );
			if ($key2 !== null) {
				$obj2 = SDeliveryMethodsPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SDeliveryMethodsPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol2 );
					SDeliveryMethodsPeer::addInstanceToPool ( $obj2, $key2 );
				} // if obj2 loaded
				  
				// Add the $obj1 (SOrders) to the collection in $obj2 (SDeliveryMethods)
				$obj2->addSOrders ( $obj1 );
			} // if joined row not null
			  
			// Add objects for joined SPaymentMethods rows
			
			$key3 = SPaymentMethodsPeer::getPrimaryKeyHashFromRow ( $row, $startcol3 );
			if ($key3 !== null) {
				$obj3 = SPaymentMethodsPeer::getInstanceFromPool ( $key3 );
				if (! $obj3) {
					
					$cls = SPaymentMethodsPeer::getOMClass ( false );
					
					$obj3 = new $cls ();
					$obj3->hydrate ( $row, $startcol3 );
					SPaymentMethodsPeer::addInstanceToPool ( $obj3, $key3 );
				} // if obj3 loaded
				  
				// Add the $obj1 (SOrders) to the collection in $obj3 (SPaymentMethods)
				$obj3->addSOrders ( $obj1 );
			} // if joined row not null
			  
			// Add objects for joined SOrderStatuses rows
			
			$key4 = SOrderStatusesPeer::getPrimaryKeyHashFromRow ( $row, $startcol4 );
			if ($key4 !== null) {
				$obj4 = SOrderStatusesPeer::getInstanceFromPool ( $key4 );
				if (! $obj4) {
					
					$cls = SOrderStatusesPeer::getOMClass ( false );
					
					$obj4 = new $cls ();
					$obj4->hydrate ( $row, $startcol4 );
					SOrderStatusesPeer::addInstanceToPool ( $obj4, $key4 );
				} // if obj4 loaded
				  
				// Add the $obj1 (SOrders) to the collection in $obj4 (SOrderStatuses)
				$obj4->addSOrders ( $obj1 );
			} // if joined row not null
			
			$results [] = $obj1;
		}
		$stmt->closeCursor ();
		return $results;
	}
	
	/**
	 * Returns the number of rows matching criteria, joining the related SDeliveryMethods table
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSDeliveryMethods(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SOrdersPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SOrdersPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY should not affect count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SOrdersPeer::PAYMENT_METHOD, SPaymentMethodsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SOrdersPeer::STATUS, SOrderStatusesPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doCount ( $criteria, $con );
		
		if ($row = $stmt->fetch ( PDO::FETCH_NUM )) {
			$count = ( int ) $row [0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor ();
		return $count;
	}
	
	/**
	 * Returns the number of rows matching criteria, joining the related SPaymentMethods table
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSPaymentMethods(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SOrdersPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SOrdersPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY should not affect count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SOrdersPeer::DELIVERY_METHOD, SDeliveryMethodsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SOrdersPeer::STATUS, SOrderStatusesPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doCount ( $criteria, $con );
		
		if ($row = $stmt->fetch ( PDO::FETCH_NUM )) {
			$count = ( int ) $row [0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor ();
		return $count;
	}
	
	/**
	 * Returns the number of rows matching criteria, joining the related SOrderStatuses table
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSOrderStatuses(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SOrdersPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SOrdersPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY should not affect count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SOrdersPeer::DELIVERY_METHOD, SDeliveryMethodsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SOrdersPeer::PAYMENT_METHOD, SPaymentMethodsPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doCount ( $criteria, $con );
		
		if ($row = $stmt->fetch ( PDO::FETCH_NUM )) {
			$count = ( int ) $row [0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor ();
		return $count;
	}
	
	/**
	 * Selects a collection of SOrders objects pre-filled with all related objects except SDeliveryMethods.
	 *
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SOrders objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSDeliveryMethods(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SOrdersPeer::addSelectColumns ( $criteria );
		$startcol2 = SOrdersPeer::NUM_HYDRATE_COLUMNS;
		
		SPaymentMethodsPeer::addSelectColumns ( $criteria );
		$startcol3 = $startcol2 + SPaymentMethodsPeer::NUM_HYDRATE_COLUMNS;
		
		SOrderStatusesPeer::addSelectColumns ( $criteria );
		$startcol4 = $startcol3 + SOrderStatusesPeer::NUM_HYDRATE_COLUMNS;
		
		$criteria->addJoin ( SOrdersPeer::PAYMENT_METHOD, SPaymentMethodsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SOrdersPeer::STATUS, SOrderStatusesPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SOrdersPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SOrdersPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SOrdersPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SOrdersPeer::addInstanceToPool ( $obj1, $key1 );
			} // if obj1 already loaded
			  
			// Add objects for joined SPaymentMethods rows
			
			$key2 = SPaymentMethodsPeer::getPrimaryKeyHashFromRow ( $row, $startcol2 );
			if ($key2 !== null) {
				$obj2 = SPaymentMethodsPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SPaymentMethodsPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol2 );
					SPaymentMethodsPeer::addInstanceToPool ( $obj2, $key2 );
				} // if $obj2 already loaded
				  
				// Add the $obj1 (SOrders) to the collection in $obj2 (SPaymentMethods)
				$obj2->addSOrders ( $obj1 );
			} // if joined row is not null
			  
			// Add objects for joined SOrderStatuses rows
			
			$key3 = SOrderStatusesPeer::getPrimaryKeyHashFromRow ( $row, $startcol3 );
			if ($key3 !== null) {
				$obj3 = SOrderStatusesPeer::getInstanceFromPool ( $key3 );
				if (! $obj3) {
					
					$cls = SOrderStatusesPeer::getOMClass ( false );
					
					$obj3 = new $cls ();
					$obj3->hydrate ( $row, $startcol3 );
					SOrderStatusesPeer::addInstanceToPool ( $obj3, $key3 );
				} // if $obj3 already loaded
				  
				// Add the $obj1 (SOrders) to the collection in $obj3 (SOrderStatuses)
				$obj3->addSOrders ( $obj1 );
			} // if joined row is not null
			
			$results [] = $obj1;
		}
		$stmt->closeCursor ();
		return $results;
	}
	
	/**
	 * Selects a collection of SOrders objects pre-filled with all related objects except SPaymentMethods.
	 *
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SOrders objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSPaymentMethods(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SOrdersPeer::addSelectColumns ( $criteria );
		$startcol2 = SOrdersPeer::NUM_HYDRATE_COLUMNS;
		
		SDeliveryMethodsPeer::addSelectColumns ( $criteria );
		$startcol3 = $startcol2 + SDeliveryMethodsPeer::NUM_HYDRATE_COLUMNS;
		
		SOrderStatusesPeer::addSelectColumns ( $criteria );
		$startcol4 = $startcol3 + SOrderStatusesPeer::NUM_HYDRATE_COLUMNS;
		
		$criteria->addJoin ( SOrdersPeer::DELIVERY_METHOD, SDeliveryMethodsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SOrdersPeer::STATUS, SOrderStatusesPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SOrdersPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SOrdersPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SOrdersPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SOrdersPeer::addInstanceToPool ( $obj1, $key1 );
			} // if obj1 already loaded
			  
			// Add objects for joined SDeliveryMethods rows
			
			$key2 = SDeliveryMethodsPeer::getPrimaryKeyHashFromRow ( $row, $startcol2 );
			if ($key2 !== null) {
				$obj2 = SDeliveryMethodsPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SDeliveryMethodsPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol2 );
					SDeliveryMethodsPeer::addInstanceToPool ( $obj2, $key2 );
				} // if $obj2 already loaded
				  
				// Add the $obj1 (SOrders) to the collection in $obj2 (SDeliveryMethods)
				$obj2->addSOrders ( $obj1 );
			} // if joined row is not null
			  
			// Add objects for joined SOrderStatuses rows
			
			$key3 = SOrderStatusesPeer::getPrimaryKeyHashFromRow ( $row, $startcol3 );
			if ($key3 !== null) {
				$obj3 = SOrderStatusesPeer::getInstanceFromPool ( $key3 );
				if (! $obj3) {
					
					$cls = SOrderStatusesPeer::getOMClass ( false );
					
					$obj3 = new $cls ();
					$obj3->hydrate ( $row, $startcol3 );
					SOrderStatusesPeer::addInstanceToPool ( $obj3, $key3 );
				} // if $obj3 already loaded
				  
				// Add the $obj1 (SOrders) to the collection in $obj3 (SOrderStatuses)
				$obj3->addSOrders ( $obj1 );
			} // if joined row is not null
			
			$results [] = $obj1;
		}
		$stmt->closeCursor ();
		return $results;
	}
	
	/**
	 * Selects a collection of SOrders objects pre-filled with all related objects except SOrderStatuses.
	 *
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SOrders objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSOrderStatuses(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SOrdersPeer::addSelectColumns ( $criteria );
		$startcol2 = SOrdersPeer::NUM_HYDRATE_COLUMNS;
		
		SDeliveryMethodsPeer::addSelectColumns ( $criteria );
		$startcol3 = $startcol2 + SDeliveryMethodsPeer::NUM_HYDRATE_COLUMNS;
		
		SPaymentMethodsPeer::addSelectColumns ( $criteria );
		$startcol4 = $startcol3 + SPaymentMethodsPeer::NUM_HYDRATE_COLUMNS;
		
		$criteria->addJoin ( SOrdersPeer::DELIVERY_METHOD, SDeliveryMethodsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SOrdersPeer::PAYMENT_METHOD, SPaymentMethodsPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SOrdersPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SOrdersPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SOrdersPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SOrdersPeer::addInstanceToPool ( $obj1, $key1 );
			} // if obj1 already loaded
			  
			// Add objects for joined SDeliveryMethods rows
			
			$key2 = SDeliveryMethodsPeer::getPrimaryKeyHashFromRow ( $row, $startcol2 );
			if ($key2 !== null) {
				$obj2 = SDeliveryMethodsPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SDeliveryMethodsPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol2 );
					SDeliveryMethodsPeer::addInstanceToPool ( $obj2, $key2 );
				} // if $obj2 already loaded
				  
				// Add the $obj1 (SOrders) to the collection in $obj2 (SDeliveryMethods)
				$obj2->addSOrders ( $obj1 );
			} // if joined row is not null
			  
			// Add objects for joined SPaymentMethods rows
			
			$key3 = SPaymentMethodsPeer::getPrimaryKeyHashFromRow ( $row, $startcol3 );
			if ($key3 !== null) {
				$obj3 = SPaymentMethodsPeer::getInstanceFromPool ( $key3 );
				if (! $obj3) {
					
					$cls = SPaymentMethodsPeer::getOMClass ( false );
					
					$obj3 = new $cls ();
					$obj3->hydrate ( $row, $startcol3 );
					SPaymentMethodsPeer::addInstanceToPool ( $obj3, $key3 );
				} // if $obj3 already loaded
				  
				// Add the $obj1 (SOrders) to the collection in $obj3 (SPaymentMethods)
				$obj3->addSOrders ( $obj1 );
			} // if joined row is not null
			
			$results [] = $obj1;
		}
		$stmt->closeCursor ();
		return $results;
	}
	
	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * 
	 * @return TableMap
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function getTableMap() {
		return Propel::getDatabaseMap ( self::DATABASE_NAME )->getTable ( self::TABLE_NAME );
	}
	
	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap() {
		$dbMap = Propel::getDatabaseMap ( BaseSOrdersPeer::DATABASE_NAME );
		if (! $dbMap->hasTable ( BaseSOrdersPeer::TABLE_NAME )) {
			$dbMap->addTableObject ( new SOrdersTableMap () );
		}
	}
	
	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param boolean $withPrefix
	 *        	Whether or not to return the path with the class name
	 * @return string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true) {
		return $withPrefix ? SOrdersPeer::CLASS_DEFAULT : SOrdersPeer::OM_CLASS;
	}
	
	/**
	 * Performs an INSERT on the database, given a SOrders or Criteria object.
	 *
	 * @param mixed $values
	 *        	Criteria or SOrders object containing data that is used to create the INSERT statement.
	 * @param PropelPDO $con
	 *        	the PropelPDO connection to use
	 * @return mixed The new primary key.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null) {
		if ($con === null) {
			$con = Propel::getConnection ( SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria (); // build Criteria from SOrders object
		}
		
		if ($criteria->containsKey ( SOrdersPeer::ID ) && $criteria->keyContainsValue ( SOrdersPeer::ID )) {
			throw new PropelException ( 'Cannot insert a value for auto-increment primary key (' . SOrdersPeer::ID . ')' );
		}
		
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction ();
			$pk = BasePeer::doInsert ( $criteria, $con );
			$con->commit ();
		} catch ( PropelException $e ) {
			$con->rollBack ();
			throw $e;
		}
		
		return $pk;
	}
	
	/**
	 * Performs an UPDATE on the database, given a SOrders or Criteria object.
	 *
	 * @param mixed $values
	 *        	Criteria or SOrders object containing data that is used to create the UPDATE statement.
	 * @param PropelPDO $con
	 *        	The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return int The number of affected rows (if supported by underlying database driver).
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null) {
		if ($con === null) {
			$con = Propel::getConnection ( SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		$selectCriteria = new Criteria ( self::DATABASE_NAME );
		
		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
			
			$comparison = $criteria->getComparison ( SOrdersPeer::ID );
			$value = $criteria->remove ( SOrdersPeer::ID );
			if ($value) {
				$selectCriteria->add ( SOrdersPeer::ID, $value, $comparison );
			} else {
				$selectCriteria->setPrimaryTableName ( SOrdersPeer::TABLE_NAME );
			}
		} else { // $values is SOrders object
			$criteria = $values->buildCriteria (); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria (); // gets criteria w/ primary key(s)
		}
		
		// set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		return BasePeer::doUpdate ( $selectCriteria, $criteria, $con );
	}
	
	/**
	 * Deletes all rows from the shop_orders table.
	 *
	 * @param PropelPDO $con
	 *        	the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null) {
		if ($con === null) {
			$con = Propel::getConnection ( SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction ();
			$affectedRows += SOrdersPeer::doOnDeleteCascade ( new Criteria ( SOrdersPeer::DATABASE_NAME ), $con );
			$affectedRows += BasePeer::doDeleteAll ( SOrdersPeer::TABLE_NAME, $con, SOrdersPeer::DATABASE_NAME );
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			SOrdersPeer::clearInstancePool ();
			SOrdersPeer::clearRelatedInstancePool ();
			$con->commit ();
			return $affectedRows;
		} catch ( PropelException $e ) {
			$con->rollBack ();
			throw $e;
		}
	}
	
	/**
	 * Performs a DELETE on the database, given a SOrders or Criteria object OR a primary key value.
	 *
	 * @param mixed $values
	 *        	Criteria or SOrders object or primary key or array of primary keys
	 *        	which is used to create the DELETE statement
	 * @param PropelPDO $con
	 *        	the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver). This includes CASCADE-related rows
	 *         if supported by native driver or if emulated using Propel.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doDelete($values, PropelPDO $con = null) {
		if ($con === null) {
			$con = Propel::getConnection ( SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof SOrders) { // it's a model object
		                                        // create criteria based on pk values
			$criteria = $values->buildPkeyCriteria ();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria ( self::DATABASE_NAME );
			$criteria->add ( SOrdersPeer::ID, ( array ) $values, Criteria::IN );
		}
		
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		$affectedRows = 0; // initialize var to track total num of affected rows
		
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction ();
			
			// cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
			$c = clone $criteria;
			$affectedRows += SOrdersPeer::doOnDeleteCascade ( $c, $con );
			
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			if ($values instanceof Criteria) {
				SOrdersPeer::clearInstancePool ();
			} elseif ($values instanceof SOrders) { // it's a model object
				SOrdersPeer::removeInstanceFromPool ( $values );
			} else { // it's a primary key, or an array of pks
				foreach ( ( array ) $values as $singleval ) {
					SOrdersPeer::removeInstanceFromPool ( $singleval );
				}
			}
			
			$affectedRows += BasePeer::doDelete ( $criteria, $con );
			SOrdersPeer::clearRelatedInstancePool ();
			$con->commit ();
			return $affectedRows;
		} catch ( PropelException $e ) {
			$con->rollBack ();
			throw $e;
		}
	}
	
	/**
	 * This is a method for emulating ON DELETE CASCADE for DBs that don't support this
	 * feature (like MySQL or SQLite).
	 *
	 * This method is not very speedy because it must perform a query first to get
	 * the implicated records and then perform the deletes by calling those Peer classes.
	 *
	 * This method should be used within a transaction if possible.
	 *
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con) {
		// initialize var to track total num of affected rows
		$affectedRows = 0;
		
		// first find the objects that are implicated by the $criteria
		$objects = SOrdersPeer::doSelect ( $criteria, $con );
		foreach ( $objects as $obj ) {
			
			// delete related SOrderProducts objects
			$criteria = new Criteria ( SOrderProductsPeer::DATABASE_NAME );
			
			$criteria->add ( SOrderProductsPeer::ORDER_ID, $obj->getId () );
			$affectedRows += SOrderProductsPeer::doDelete ( $criteria, $con );
			
			// delete related SOrderStatusHistory objects
			$criteria = new Criteria ( SOrderStatusHistoryPeer::DATABASE_NAME );
			
			$criteria->add ( SOrderStatusHistoryPeer::ORDER_ID, $obj->getId () );
			$affectedRows += SOrderStatusHistoryPeer::doDelete ( $criteria, $con );
		}
		return $affectedRows;
	}
	
	/**
	 * Validates all modified columns of given SOrders object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param SOrders $obj
	 *        	The object to validate.
	 * @param mixed $cols
	 *        	Column name or array of column names.
	 *        	
	 * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null) {
		$columns = array ();
		
		if ($cols) {
			$dbMap = Propel::getDatabaseMap ( SOrdersPeer::DATABASE_NAME );
			$tableMap = $dbMap->getTable ( SOrdersPeer::TABLE_NAME );
			
			if (! is_array ( $cols )) {
				$cols = array (
						$cols 
				);
			}
			
			foreach ( $cols as $colName ) {
				if ($tableMap->containsColumn ( $colName )) {
					$get = 'get' . $tableMap->getColumn ( $colName )->getPhpName ();
					$columns [$colName] = $obj->$get ();
				}
			}
		} else {
		}
		
		return BasePeer::doValidate ( SOrdersPeer::DATABASE_NAME, SOrdersPeer::TABLE_NAME, $columns );
	}
	
	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param int $pk
	 *        	the primary key.
	 * @param PropelPDO $con
	 *        	the connection to use
	 * @return SOrders
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null) {
		if (null !== ($obj = SOrdersPeer::getInstanceFromPool ( ( string ) $pk ))) {
			return $obj;
		}
		
		if ($con === null) {
			$con = Propel::getConnection ( SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria = new Criteria ( SOrdersPeer::DATABASE_NAME );
		$criteria->add ( SOrdersPeer::ID, $pk );
		
		$v = SOrdersPeer::doSelect ( $criteria, $con );
		
		return ! empty ( $v ) > 0 ? $v [0] : null;
	}
	
	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param array $pks
	 *        	List of primary keys
	 * @param PropelPDO $con
	 *        	the connection to use
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null) {
		if ($con === null) {
			$con = Propel::getConnection ( SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$objs = null;
		if (empty ( $pks )) {
			$objs = array ();
		} else {
			$criteria = new Criteria ( SOrdersPeer::DATABASE_NAME );
			$criteria->add ( SOrdersPeer::ID, $pks, Criteria::IN );
			$objs = SOrdersPeer::doSelect ( $criteria, $con );
		}
		return $objs;
	}
} // BaseSOrdersPeer
  
// This is the static code needed to register the TableMap for this table with the main Propel class.
  //
BaseSOrdersPeer::buildTableMap ();

