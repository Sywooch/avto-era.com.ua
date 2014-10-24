<?php

/**
 * Base static class for performing query and update operations on the 'shop_notifications' table.
 *
 * 
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSNotificationsPeer {
	
	/**
	 * the default database name for this class
	 */
	const DATABASE_NAME = 'Shop';
	
	/**
	 * the table name for this class
	 */
	const TABLE_NAME = 'shop_notifications';
	
	/**
	 * the related Propel class for this table
	 */
	const OM_CLASS = 'SNotifications';
	
	/**
	 * A class that can be returned by this peer.
	 */
	const CLASS_DEFAULT = 'Shop.SNotifications';
	
	/**
	 * the related TableMap class for this table
	 */
	const TM_CLASS = 'SNotificationsTableMap';
	
	/**
	 * The total number of columns.
	 */
	const NUM_COLUMNS = 12;
	
	/**
	 * The number of lazy-loaded columns.
	 */
	const NUM_LAZY_LOAD_COLUMNS = 0;
	
	/**
	 * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
	 */
	const NUM_HYDRATE_COLUMNS = 12;
	
	/**
	 * the column name for the ID field
	 */
	const ID = 'shop_notifications.ID';
	
	/**
	 * the column name for the PRODUCT_ID field
	 */
	const PRODUCT_ID = 'shop_notifications.PRODUCT_ID';
	
	/**
	 * the column name for the VARIANT_ID field
	 */
	const VARIANT_ID = 'shop_notifications.VARIANT_ID';
	
	/**
	 * the column name for the USER_NAME field
	 */
	const USER_NAME = 'shop_notifications.USER_NAME';
	
	/**
	 * the column name for the USER_EMAIL field
	 */
	const USER_EMAIL = 'shop_notifications.USER_EMAIL';
	
	/**
	 * the column name for the USER_PHONE field
	 */
	const USER_PHONE = 'shop_notifications.USER_PHONE';
	
	/**
	 * the column name for the USER_COMMENT field
	 */
	const USER_COMMENT = 'shop_notifications.USER_COMMENT';
	
	/**
	 * the column name for the STATUS field
	 */
	const STATUS = 'shop_notifications.STATUS';
	
	/**
	 * the column name for the DATE_CREATED field
	 */
	const DATE_CREATED = 'shop_notifications.DATE_CREATED';
	
	/**
	 * the column name for the ACTIVE_TO field
	 */
	const ACTIVE_TO = 'shop_notifications.ACTIVE_TO';
	
	/**
	 * the column name for the MANAGER_ID field
	 */
	const MANAGER_ID = 'shop_notifications.MANAGER_ID';
	
	/**
	 * the column name for the NOTIFIED_BY_EMAIL field
	 */
	const NOTIFIED_BY_EMAIL = 'shop_notifications.NOTIFIED_BY_EMAIL';
	
	/**
	 * The default string format for model objects of the related table *
	 */
	const DEFAULT_STRING_FORMAT = 'YAML';
	
	/**
	 * An identiy map to hold any loaded instances of SNotifications objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * 
	 * @var array SNotifications[]
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
					'ProductId',
					'VariantId',
					'UserName',
					'UserEmail',
					'UserPhone',
					'UserComment',
					'Status',
					'DateCreated',
					'ActiveTo',
					'ManagerId',
					'NotifiedByEmail' 
			),
			BasePeer::TYPE_STUDLYPHPNAME => array (
					'id',
					'productId',
					'variantId',
					'userName',
					'userEmail',
					'userPhone',
					'userComment',
					'status',
					'dateCreated',
					'activeTo',
					'managerId',
					'notifiedByEmail' 
			),
			BasePeer::TYPE_COLNAME => array (
					self::ID,
					self::PRODUCT_ID,
					self::VARIANT_ID,
					self::USER_NAME,
					self::USER_EMAIL,
					self::USER_PHONE,
					self::USER_COMMENT,
					self::STATUS,
					self::DATE_CREATED,
					self::ACTIVE_TO,
					self::MANAGER_ID,
					self::NOTIFIED_BY_EMAIL 
			),
			BasePeer::TYPE_RAW_COLNAME => array (
					'ID',
					'PRODUCT_ID',
					'VARIANT_ID',
					'USER_NAME',
					'USER_EMAIL',
					'USER_PHONE',
					'USER_COMMENT',
					'STATUS',
					'DATE_CREATED',
					'ACTIVE_TO',
					'MANAGER_ID',
					'NOTIFIED_BY_EMAIL' 
			),
			BasePeer::TYPE_FIELDNAME => array (
					'id',
					'product_id',
					'variant_id',
					'user_name',
					'user_email',
					'user_phone',
					'user_comment',
					'status',
					'date_created',
					'active_to',
					'manager_id',
					'notified_by_email' 
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
					11 
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
					'ProductId' => 1,
					'VariantId' => 2,
					'UserName' => 3,
					'UserEmail' => 4,
					'UserPhone' => 5,
					'UserComment' => 6,
					'Status' => 7,
					'DateCreated' => 8,
					'ActiveTo' => 9,
					'ManagerId' => 10,
					'NotifiedByEmail' => 11 
			),
			BasePeer::TYPE_STUDLYPHPNAME => array (
					'id' => 0,
					'productId' => 1,
					'variantId' => 2,
					'userName' => 3,
					'userEmail' => 4,
					'userPhone' => 5,
					'userComment' => 6,
					'status' => 7,
					'dateCreated' => 8,
					'activeTo' => 9,
					'managerId' => 10,
					'notifiedByEmail' => 11 
			),
			BasePeer::TYPE_COLNAME => array (
					self::ID => 0,
					self::PRODUCT_ID => 1,
					self::VARIANT_ID => 2,
					self::USER_NAME => 3,
					self::USER_EMAIL => 4,
					self::USER_PHONE => 5,
					self::USER_COMMENT => 6,
					self::STATUS => 7,
					self::DATE_CREATED => 8,
					self::ACTIVE_TO => 9,
					self::MANAGER_ID => 10,
					self::NOTIFIED_BY_EMAIL => 11 
			),
			BasePeer::TYPE_RAW_COLNAME => array (
					'ID' => 0,
					'PRODUCT_ID' => 1,
					'VARIANT_ID' => 2,
					'USER_NAME' => 3,
					'USER_EMAIL' => 4,
					'USER_PHONE' => 5,
					'USER_COMMENT' => 6,
					'STATUS' => 7,
					'DATE_CREATED' => 8,
					'ACTIVE_TO' => 9,
					'MANAGER_ID' => 10,
					'NOTIFIED_BY_EMAIL' => 11 
			),
			BasePeer::TYPE_FIELDNAME => array (
					'id' => 0,
					'product_id' => 1,
					'variant_id' => 2,
					'user_name' => 3,
					'user_email' => 4,
					'user_phone' => 5,
					'user_comment' => 6,
					'status' => 7,
					'date_created' => 8,
					'active_to' => 9,
					'manager_id' => 10,
					'notified_by_email' => 11 
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
					11 
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
	 *        	The column name for current table. (i.e. SNotificationsPeer::COLUMN_NAME).
	 * @return string
	 */
	public static function alias($alias, $column) {
		return str_replace ( SNotificationsPeer::TABLE_NAME . '.', $alias . '.', $column );
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
			$criteria->addSelectColumn ( SNotificationsPeer::ID );
			$criteria->addSelectColumn ( SNotificationsPeer::PRODUCT_ID );
			$criteria->addSelectColumn ( SNotificationsPeer::VARIANT_ID );
			$criteria->addSelectColumn ( SNotificationsPeer::USER_NAME );
			$criteria->addSelectColumn ( SNotificationsPeer::USER_EMAIL );
			$criteria->addSelectColumn ( SNotificationsPeer::USER_PHONE );
			$criteria->addSelectColumn ( SNotificationsPeer::USER_COMMENT );
			$criteria->addSelectColumn ( SNotificationsPeer::STATUS );
			$criteria->addSelectColumn ( SNotificationsPeer::DATE_CREATED );
			$criteria->addSelectColumn ( SNotificationsPeer::ACTIVE_TO );
			$criteria->addSelectColumn ( SNotificationsPeer::MANAGER_ID );
			$criteria->addSelectColumn ( SNotificationsPeer::NOTIFIED_BY_EMAIL );
		} else {
			$criteria->addSelectColumn ( $alias . '.ID' );
			$criteria->addSelectColumn ( $alias . '.PRODUCT_ID' );
			$criteria->addSelectColumn ( $alias . '.VARIANT_ID' );
			$criteria->addSelectColumn ( $alias . '.USER_NAME' );
			$criteria->addSelectColumn ( $alias . '.USER_EMAIL' );
			$criteria->addSelectColumn ( $alias . '.USER_PHONE' );
			$criteria->addSelectColumn ( $alias . '.USER_COMMENT' );
			$criteria->addSelectColumn ( $alias . '.STATUS' );
			$criteria->addSelectColumn ( $alias . '.DATE_CREATED' );
			$criteria->addSelectColumn ( $alias . '.ACTIVE_TO' );
			$criteria->addSelectColumn ( $alias . '.MANAGER_ID' );
			$criteria->addSelectColumn ( $alias . '.NOTIFIED_BY_EMAIL' );
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
		$criteria->setPrimaryTableName ( SNotificationsPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SNotificationsPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY won't ever affect the count
		$criteria->setDbName ( self::DATABASE_NAME ); // Set the correct dbName
		
		if ($con === null) {
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return SNotifications
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null) {
		$critcopy = clone $criteria;
		$critcopy->setLimit ( 1 );
		$objects = SNotificationsPeer::doSelect ( $critcopy, $con );
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
		return SNotificationsPeer::populateObjects ( SNotificationsPeer::doSelectStmt ( $criteria, $con ) );
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
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		if (! $criteria->hasSelectClause ()) {
			$criteria = clone $criteria;
			SNotificationsPeer::addSelectColumns ( $criteria );
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
	 * @param SNotifications $value
	 *        	A SNotifications object.
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
	 *        	A SNotifications object or a primary key value.
	 */
	public static function removeInstanceFromPool($value) {
		if (Propel::isInstancePoolingEnabled () && $value !== null) {
			if (is_object ( $value ) && $value instanceof SNotifications) {
				$key = ( string ) $value->getId ();
			} elseif (is_scalar ( $value )) {
				// assume we've been passed a primary key
				$key = ( string ) $value;
			} else {
				$e = new PropelException ( "Invalid value passed to removeInstanceFromPool().  Expected primary key or SNotifications object; got " . (is_object ( $value ) ? get_class ( $value ) . ' object.' : var_export ( $value, true )) );
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
	 * @return SNotifications Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to shop_notifications
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool() {
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
		$cls = SNotificationsPeer::getOMClass ( false );
		// populate the object(s)
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key = SNotificationsPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj = SNotificationsPeer::getInstanceFromPool ( $key ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results [] = $obj;
			} else {
				$obj = new $cls ();
				$obj->hydrate ( $row );
				$results [] = $obj;
				SNotificationsPeer::addInstanceToPool ( $obj, $key );
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
	 * @return array (SNotifications object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0) {
		$key = SNotificationsPeer::getPrimaryKeyHashFromRow ( $row, $startcol );
		if (null !== ($obj = SNotificationsPeer::getInstanceFromPool ( $key ))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + SNotificationsPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = SNotificationsPeer::OM_CLASS;
			$obj = new $cls ();
			$col = $obj->hydrate ( $row, $startcol );
			SNotificationsPeer::addInstanceToPool ( $obj, $key );
		}
		return array (
				$obj,
				$col 
		);
	}
	
	/**
	 * Returns the number of rows matching criteria, joining the related SProducts table
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinSProducts(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SNotificationsPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SNotificationsPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY won't ever affect the count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SNotificationsPeer::PRODUCT_ID, SProductsPeer::ID, $join_behavior );
		
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
	 * Returns the number of rows matching criteria, joining the related SProductVariants table
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinSProductVariants(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SNotificationsPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SNotificationsPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY won't ever affect the count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SNotificationsPeer::VARIANT_ID, SProductVariantsPeer::ID, $join_behavior );
		
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
	 * Returns the number of rows matching criteria, joining the related SNotificationStatuses table
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinSNotificationStatuses(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SNotificationsPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SNotificationsPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY won't ever affect the count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SNotificationsPeer::STATUS, SNotificationStatusesPeer::ID, $join_behavior );
		
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
	 * Selects a collection of SNotifications objects pre-filled with their SProducts objects.
	 * 
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SNotifications objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSProducts(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SNotificationsPeer::addSelectColumns ( $criteria );
		$startcol = SNotificationsPeer::NUM_HYDRATE_COLUMNS;
		SProductsPeer::addSelectColumns ( $criteria );
		
		$criteria->addJoin ( SNotificationsPeer::PRODUCT_ID, SProductsPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SNotificationsPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SNotificationsPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				
				$cls = SNotificationsPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SNotificationsPeer::addInstanceToPool ( $obj1, $key1 );
			} // if $obj1 already loaded
			
			$key2 = SProductsPeer::getPrimaryKeyHashFromRow ( $row, $startcol );
			if ($key2 !== null) {
				$obj2 = SProductsPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SProductsPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol );
					SProductsPeer::addInstanceToPool ( $obj2, $key2 );
				} // if obj2 already loaded
				  
				// Add the $obj1 (SNotifications) to $obj2 (SProducts)
				$obj2->addSNotifications ( $obj1 );
			} // if joined row was not null
			
			$results [] = $obj1;
		}
		$stmt->closeCursor ();
		return $results;
	}
	
	/**
	 * Selects a collection of SNotifications objects pre-filled with their SProductVariants objects.
	 * 
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SNotifications objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSProductVariants(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SNotificationsPeer::addSelectColumns ( $criteria );
		$startcol = SNotificationsPeer::NUM_HYDRATE_COLUMNS;
		SProductVariantsPeer::addSelectColumns ( $criteria );
		
		$criteria->addJoin ( SNotificationsPeer::VARIANT_ID, SProductVariantsPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SNotificationsPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SNotificationsPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				
				$cls = SNotificationsPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SNotificationsPeer::addInstanceToPool ( $obj1, $key1 );
			} // if $obj1 already loaded
			
			$key2 = SProductVariantsPeer::getPrimaryKeyHashFromRow ( $row, $startcol );
			if ($key2 !== null) {
				$obj2 = SProductVariantsPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SProductVariantsPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol );
					SProductVariantsPeer::addInstanceToPool ( $obj2, $key2 );
				} // if obj2 already loaded
				  
				// Add the $obj1 (SNotifications) to $obj2 (SProductVariants)
				$obj2->addSNotifications ( $obj1 );
			} // if joined row was not null
			
			$results [] = $obj1;
		}
		$stmt->closeCursor ();
		return $results;
	}
	
	/**
	 * Selects a collection of SNotifications objects pre-filled with their SNotificationStatuses objects.
	 * 
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SNotifications objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSNotificationStatuses(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SNotificationsPeer::addSelectColumns ( $criteria );
		$startcol = SNotificationsPeer::NUM_HYDRATE_COLUMNS;
		SNotificationStatusesPeer::addSelectColumns ( $criteria );
		
		$criteria->addJoin ( SNotificationsPeer::STATUS, SNotificationStatusesPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SNotificationsPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SNotificationsPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				
				$cls = SNotificationsPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SNotificationsPeer::addInstanceToPool ( $obj1, $key1 );
			} // if $obj1 already loaded
			
			$key2 = SNotificationStatusesPeer::getPrimaryKeyHashFromRow ( $row, $startcol );
			if ($key2 !== null) {
				$obj2 = SNotificationStatusesPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SNotificationStatusesPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol );
					SNotificationStatusesPeer::addInstanceToPool ( $obj2, $key2 );
				} // if obj2 already loaded
				  
				// Add the $obj1 (SNotifications) to $obj2 (SNotificationStatuses)
				$obj2->addSNotifications ( $obj1 );
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
		$criteria->setPrimaryTableName ( SNotificationsPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SNotificationsPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY won't ever affect the count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SNotificationsPeer::PRODUCT_ID, SProductsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SNotificationsPeer::VARIANT_ID, SProductVariantsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SNotificationsPeer::STATUS, SNotificationStatusesPeer::ID, $join_behavior );
		
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
	 * Selects a collection of SNotifications objects pre-filled with all related objects.
	 *
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SNotifications objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SNotificationsPeer::addSelectColumns ( $criteria );
		$startcol2 = SNotificationsPeer::NUM_HYDRATE_COLUMNS;
		
		SProductsPeer::addSelectColumns ( $criteria );
		$startcol3 = $startcol2 + SProductsPeer::NUM_HYDRATE_COLUMNS;
		
		SProductVariantsPeer::addSelectColumns ( $criteria );
		$startcol4 = $startcol3 + SProductVariantsPeer::NUM_HYDRATE_COLUMNS;
		
		SNotificationStatusesPeer::addSelectColumns ( $criteria );
		$startcol5 = $startcol4 + SNotificationStatusesPeer::NUM_HYDRATE_COLUMNS;
		
		$criteria->addJoin ( SNotificationsPeer::PRODUCT_ID, SProductsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SNotificationsPeer::VARIANT_ID, SProductVariantsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SNotificationsPeer::STATUS, SNotificationStatusesPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SNotificationsPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SNotificationsPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SNotificationsPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SNotificationsPeer::addInstanceToPool ( $obj1, $key1 );
			} // if obj1 already loaded
			  
			// Add objects for joined SProducts rows
			
			$key2 = SProductsPeer::getPrimaryKeyHashFromRow ( $row, $startcol2 );
			if ($key2 !== null) {
				$obj2 = SProductsPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SProductsPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol2 );
					SProductsPeer::addInstanceToPool ( $obj2, $key2 );
				} // if obj2 loaded
				  
				// Add the $obj1 (SNotifications) to the collection in $obj2 (SProducts)
				$obj2->addSNotifications ( $obj1 );
			} // if joined row not null
			  
			// Add objects for joined SProductVariants rows
			
			$key3 = SProductVariantsPeer::getPrimaryKeyHashFromRow ( $row, $startcol3 );
			if ($key3 !== null) {
				$obj3 = SProductVariantsPeer::getInstanceFromPool ( $key3 );
				if (! $obj3) {
					
					$cls = SProductVariantsPeer::getOMClass ( false );
					
					$obj3 = new $cls ();
					$obj3->hydrate ( $row, $startcol3 );
					SProductVariantsPeer::addInstanceToPool ( $obj3, $key3 );
				} // if obj3 loaded
				  
				// Add the $obj1 (SNotifications) to the collection in $obj3 (SProductVariants)
				$obj3->addSNotifications ( $obj1 );
			} // if joined row not null
			  
			// Add objects for joined SNotificationStatuses rows
			
			$key4 = SNotificationStatusesPeer::getPrimaryKeyHashFromRow ( $row, $startcol4 );
			if ($key4 !== null) {
				$obj4 = SNotificationStatusesPeer::getInstanceFromPool ( $key4 );
				if (! $obj4) {
					
					$cls = SNotificationStatusesPeer::getOMClass ( false );
					
					$obj4 = new $cls ();
					$obj4->hydrate ( $row, $startcol4 );
					SNotificationStatusesPeer::addInstanceToPool ( $obj4, $key4 );
				} // if obj4 loaded
				  
				// Add the $obj1 (SNotifications) to the collection in $obj4 (SNotificationStatuses)
				$obj4->addSNotifications ( $obj1 );
			} // if joined row not null
			
			$results [] = $obj1;
		}
		$stmt->closeCursor ();
		return $results;
	}
	
	/**
	 * Returns the number of rows matching criteria, joining the related SProducts table
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSProducts(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SNotificationsPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SNotificationsPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY should not affect count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SNotificationsPeer::VARIANT_ID, SProductVariantsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SNotificationsPeer::STATUS, SNotificationStatusesPeer::ID, $join_behavior );
		
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
	 * Returns the number of rows matching criteria, joining the related SProductVariants table
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSProductVariants(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SNotificationsPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SNotificationsPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY should not affect count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SNotificationsPeer::PRODUCT_ID, SProductsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SNotificationsPeer::STATUS, SNotificationStatusesPeer::ID, $join_behavior );
		
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
	 * Returns the number of rows matching criteria, joining the related SNotificationStatuses table
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSNotificationStatuses(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SNotificationsPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SNotificationsPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY should not affect count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SNotificationsPeer::PRODUCT_ID, SProductsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SNotificationsPeer::VARIANT_ID, SProductVariantsPeer::ID, $join_behavior );
		
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
	 * Selects a collection of SNotifications objects pre-filled with all related objects except SProducts.
	 *
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SNotifications objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSProducts(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SNotificationsPeer::addSelectColumns ( $criteria );
		$startcol2 = SNotificationsPeer::NUM_HYDRATE_COLUMNS;
		
		SProductVariantsPeer::addSelectColumns ( $criteria );
		$startcol3 = $startcol2 + SProductVariantsPeer::NUM_HYDRATE_COLUMNS;
		
		SNotificationStatusesPeer::addSelectColumns ( $criteria );
		$startcol4 = $startcol3 + SNotificationStatusesPeer::NUM_HYDRATE_COLUMNS;
		
		$criteria->addJoin ( SNotificationsPeer::VARIANT_ID, SProductVariantsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SNotificationsPeer::STATUS, SNotificationStatusesPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SNotificationsPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SNotificationsPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SNotificationsPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SNotificationsPeer::addInstanceToPool ( $obj1, $key1 );
			} // if obj1 already loaded
			  
			// Add objects for joined SProductVariants rows
			
			$key2 = SProductVariantsPeer::getPrimaryKeyHashFromRow ( $row, $startcol2 );
			if ($key2 !== null) {
				$obj2 = SProductVariantsPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SProductVariantsPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol2 );
					SProductVariantsPeer::addInstanceToPool ( $obj2, $key2 );
				} // if $obj2 already loaded
				  
				// Add the $obj1 (SNotifications) to the collection in $obj2 (SProductVariants)
				$obj2->addSNotifications ( $obj1 );
			} // if joined row is not null
			  
			// Add objects for joined SNotificationStatuses rows
			
			$key3 = SNotificationStatusesPeer::getPrimaryKeyHashFromRow ( $row, $startcol3 );
			if ($key3 !== null) {
				$obj3 = SNotificationStatusesPeer::getInstanceFromPool ( $key3 );
				if (! $obj3) {
					
					$cls = SNotificationStatusesPeer::getOMClass ( false );
					
					$obj3 = new $cls ();
					$obj3->hydrate ( $row, $startcol3 );
					SNotificationStatusesPeer::addInstanceToPool ( $obj3, $key3 );
				} // if $obj3 already loaded
				  
				// Add the $obj1 (SNotifications) to the collection in $obj3 (SNotificationStatuses)
				$obj3->addSNotifications ( $obj1 );
			} // if joined row is not null
			
			$results [] = $obj1;
		}
		$stmt->closeCursor ();
		return $results;
	}
	
	/**
	 * Selects a collection of SNotifications objects pre-filled with all related objects except SProductVariants.
	 *
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SNotifications objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSProductVariants(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SNotificationsPeer::addSelectColumns ( $criteria );
		$startcol2 = SNotificationsPeer::NUM_HYDRATE_COLUMNS;
		
		SProductsPeer::addSelectColumns ( $criteria );
		$startcol3 = $startcol2 + SProductsPeer::NUM_HYDRATE_COLUMNS;
		
		SNotificationStatusesPeer::addSelectColumns ( $criteria );
		$startcol4 = $startcol3 + SNotificationStatusesPeer::NUM_HYDRATE_COLUMNS;
		
		$criteria->addJoin ( SNotificationsPeer::PRODUCT_ID, SProductsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SNotificationsPeer::STATUS, SNotificationStatusesPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SNotificationsPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SNotificationsPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SNotificationsPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SNotificationsPeer::addInstanceToPool ( $obj1, $key1 );
			} // if obj1 already loaded
			  
			// Add objects for joined SProducts rows
			
			$key2 = SProductsPeer::getPrimaryKeyHashFromRow ( $row, $startcol2 );
			if ($key2 !== null) {
				$obj2 = SProductsPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SProductsPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol2 );
					SProductsPeer::addInstanceToPool ( $obj2, $key2 );
				} // if $obj2 already loaded
				  
				// Add the $obj1 (SNotifications) to the collection in $obj2 (SProducts)
				$obj2->addSNotifications ( $obj1 );
			} // if joined row is not null
			  
			// Add objects for joined SNotificationStatuses rows
			
			$key3 = SNotificationStatusesPeer::getPrimaryKeyHashFromRow ( $row, $startcol3 );
			if ($key3 !== null) {
				$obj3 = SNotificationStatusesPeer::getInstanceFromPool ( $key3 );
				if (! $obj3) {
					
					$cls = SNotificationStatusesPeer::getOMClass ( false );
					
					$obj3 = new $cls ();
					$obj3->hydrate ( $row, $startcol3 );
					SNotificationStatusesPeer::addInstanceToPool ( $obj3, $key3 );
				} // if $obj3 already loaded
				  
				// Add the $obj1 (SNotifications) to the collection in $obj3 (SNotificationStatuses)
				$obj3->addSNotifications ( $obj1 );
			} // if joined row is not null
			
			$results [] = $obj1;
		}
		$stmt->closeCursor ();
		return $results;
	}
	
	/**
	 * Selects a collection of SNotifications objects pre-filled with all related objects except SNotificationStatuses.
	 *
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SNotifications objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSNotificationStatuses(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SNotificationsPeer::addSelectColumns ( $criteria );
		$startcol2 = SNotificationsPeer::NUM_HYDRATE_COLUMNS;
		
		SProductsPeer::addSelectColumns ( $criteria );
		$startcol3 = $startcol2 + SProductsPeer::NUM_HYDRATE_COLUMNS;
		
		SProductVariantsPeer::addSelectColumns ( $criteria );
		$startcol4 = $startcol3 + SProductVariantsPeer::NUM_HYDRATE_COLUMNS;
		
		$criteria->addJoin ( SNotificationsPeer::PRODUCT_ID, SProductsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SNotificationsPeer::VARIANT_ID, SProductVariantsPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SNotificationsPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SNotificationsPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SNotificationsPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SNotificationsPeer::addInstanceToPool ( $obj1, $key1 );
			} // if obj1 already loaded
			  
			// Add objects for joined SProducts rows
			
			$key2 = SProductsPeer::getPrimaryKeyHashFromRow ( $row, $startcol2 );
			if ($key2 !== null) {
				$obj2 = SProductsPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SProductsPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol2 );
					SProductsPeer::addInstanceToPool ( $obj2, $key2 );
				} // if $obj2 already loaded
				  
				// Add the $obj1 (SNotifications) to the collection in $obj2 (SProducts)
				$obj2->addSNotifications ( $obj1 );
			} // if joined row is not null
			  
			// Add objects for joined SProductVariants rows
			
			$key3 = SProductVariantsPeer::getPrimaryKeyHashFromRow ( $row, $startcol3 );
			if ($key3 !== null) {
				$obj3 = SProductVariantsPeer::getInstanceFromPool ( $key3 );
				if (! $obj3) {
					
					$cls = SProductVariantsPeer::getOMClass ( false );
					
					$obj3 = new $cls ();
					$obj3->hydrate ( $row, $startcol3 );
					SProductVariantsPeer::addInstanceToPool ( $obj3, $key3 );
				} // if $obj3 already loaded
				  
				// Add the $obj1 (SNotifications) to the collection in $obj3 (SProductVariants)
				$obj3->addSNotifications ( $obj1 );
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
		$dbMap = Propel::getDatabaseMap ( BaseSNotificationsPeer::DATABASE_NAME );
		if (! $dbMap->hasTable ( BaseSNotificationsPeer::TABLE_NAME )) {
			$dbMap->addTableObject ( new SNotificationsTableMap () );
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
		return $withPrefix ? SNotificationsPeer::CLASS_DEFAULT : SNotificationsPeer::OM_CLASS;
	}
	
	/**
	 * Performs an INSERT on the database, given a SNotifications or Criteria object.
	 *
	 * @param mixed $values
	 *        	Criteria or SNotifications object containing data that is used to create the INSERT statement.
	 * @param PropelPDO $con
	 *        	the PropelPDO connection to use
	 * @return mixed The new primary key.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null) {
		if ($con === null) {
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria (); // build Criteria from SNotifications object
		}
		
		if ($criteria->containsKey ( SNotificationsPeer::ID ) && $criteria->keyContainsValue ( SNotificationsPeer::ID )) {
			throw new PropelException ( 'Cannot insert a value for auto-increment primary key (' . SNotificationsPeer::ID . ')' );
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
	 * Performs an UPDATE on the database, given a SNotifications or Criteria object.
	 *
	 * @param mixed $values
	 *        	Criteria or SNotifications object containing data that is used to create the UPDATE statement.
	 * @param PropelPDO $con
	 *        	The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return int The number of affected rows (if supported by underlying database driver).
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null) {
		if ($con === null) {
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		$selectCriteria = new Criteria ( self::DATABASE_NAME );
		
		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
			
			$comparison = $criteria->getComparison ( SNotificationsPeer::ID );
			$value = $criteria->remove ( SNotificationsPeer::ID );
			if ($value) {
				$selectCriteria->add ( SNotificationsPeer::ID, $value, $comparison );
			} else {
				$selectCriteria->setPrimaryTableName ( SNotificationsPeer::TABLE_NAME );
			}
		} else { // $values is SNotifications object
			$criteria = $values->buildCriteria (); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria (); // gets criteria w/ primary key(s)
		}
		
		// set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		return BasePeer::doUpdate ( $selectCriteria, $criteria, $con );
	}
	
	/**
	 * Deletes all rows from the shop_notifications table.
	 *
	 * @param PropelPDO $con
	 *        	the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null) {
		if ($con === null) {
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction ();
			$affectedRows += BasePeer::doDeleteAll ( SNotificationsPeer::TABLE_NAME, $con, SNotificationsPeer::DATABASE_NAME );
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			SNotificationsPeer::clearInstancePool ();
			SNotificationsPeer::clearRelatedInstancePool ();
			$con->commit ();
			return $affectedRows;
		} catch ( PropelException $e ) {
			$con->rollBack ();
			throw $e;
		}
	}
	
	/**
	 * Performs a DELETE on the database, given a SNotifications or Criteria object OR a primary key value.
	 *
	 * @param mixed $values
	 *        	Criteria or SNotifications object or primary key or array of primary keys
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
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			SNotificationsPeer::clearInstancePool ();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof SNotifications) { // it's a model object
		                                               // invalidate the cache for this single object
			SNotificationsPeer::removeInstanceFromPool ( $values );
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria ();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria ( self::DATABASE_NAME );
			$criteria->add ( SNotificationsPeer::ID, ( array ) $values, Criteria::IN );
			// invalidate the cache for this object(s)
			foreach ( ( array ) $values as $singleval ) {
				SNotificationsPeer::removeInstanceFromPool ( $singleval );
			}
		}
		
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		$affectedRows = 0; // initialize var to track total num of affected rows
		
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction ();
			
			$affectedRows += BasePeer::doDelete ( $criteria, $con );
			SNotificationsPeer::clearRelatedInstancePool ();
			$con->commit ();
			return $affectedRows;
		} catch ( PropelException $e ) {
			$con->rollBack ();
			throw $e;
		}
	}
	
	/**
	 * Validates all modified columns of given SNotifications object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param SNotifications $obj
	 *        	The object to validate.
	 * @param mixed $cols
	 *        	Column name or array of column names.
	 *        	
	 * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null) {
		$columns = array ();
		
		if ($cols) {
			$dbMap = Propel::getDatabaseMap ( SNotificationsPeer::DATABASE_NAME );
			$tableMap = $dbMap->getTable ( SNotificationsPeer::TABLE_NAME );
			
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
		
		return BasePeer::doValidate ( SNotificationsPeer::DATABASE_NAME, SNotificationsPeer::TABLE_NAME, $columns );
	}
	
	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param int $pk
	 *        	the primary key.
	 * @param PropelPDO $con
	 *        	the connection to use
	 * @return SNotifications
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null) {
		if (null !== ($obj = SNotificationsPeer::getInstanceFromPool ( ( string ) $pk ))) {
			return $obj;
		}
		
		if ($con === null) {
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria = new Criteria ( SNotificationsPeer::DATABASE_NAME );
		$criteria->add ( SNotificationsPeer::ID, $pk );
		
		$v = SNotificationsPeer::doSelect ( $criteria, $con );
		
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
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$objs = null;
		if (empty ( $pks )) {
			$objs = array ();
		} else {
			$criteria = new Criteria ( SNotificationsPeer::DATABASE_NAME );
			$criteria->add ( SNotificationsPeer::ID, $pks, Criteria::IN );
			$objs = SNotificationsPeer::doSelect ( $criteria, $con );
		}
		return $objs;
	}
} // BaseSNotificationsPeer
  
// This is the static code needed to register the TableMap for this table with the main Propel class.
  //
BaseSNotificationsPeer::buildTableMap ();

