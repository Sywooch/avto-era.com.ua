<?php

/**
 * Base static class for performing query and update operations on the 'shop_products' table.
 *
 * 
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSProductsPeer {
	
	/**
	 * the default database name for this class
	 */
	const DATABASE_NAME = 'Shop';
	
	/**
	 * the table name for this class
	 */
	const TABLE_NAME = 'shop_products';
	
	/**
	 * the related Propel class for this table
	 */
	const OM_CLASS = 'SProducts';
	
	/**
	 * A class that can be returned by this peer.
	 */
	const CLASS_DEFAULT = 'Shop.SProducts';
	
	/**
	 * the related TableMap class for this table
	 */
	const TM_CLASS = 'SProductsTableMap';
	
	/**
	 * The total number of columns.
	 */
	const NUM_COLUMNS = 22;
	
	/**
	 * The number of lazy-loaded columns.
	 */
	const NUM_LAZY_LOAD_COLUMNS = 0;
	
	/**
	 * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
	 */
	const NUM_HYDRATE_COLUMNS = 22;
	
	/**
	 * the column name for the ID field
	 */
	const ID = 'shop_products.ID';
	
	/**
	 * the column name for the USER_ID field
	 */
	const USER_ID = 'shop_products.USER_ID';
	
	/**
	 * the column name for the EXTERNAL_ID field
	 */
	const EXTERNAL_ID = 'shop_products.EXTERNAL_ID';
	
	/**
	 * the column name for the URL field
	 */
	const URL = 'shop_products.URL';
	
	/**
	 * the column name for the ACTIVE field
	 */
	const ACTIVE = 'shop_products.ACTIVE';
	
	/**
	 * the column name for the HIT field
	 */
	const HIT = 'shop_products.HIT';
	
	/**
	 * the column name for the HOT field
	 */
	const HOT = 'shop_products.HOT';
	
	/**
	 * the column name for the ACTION field
	 */
	const ACTION = 'shop_products.ACTION';
	
	/**
	 * the column name for the BRAND_ID field
	 */
	const BRAND_ID = 'shop_products.BRAND_ID';
	
	/**
	 * the column name for the CATEGORY_ID field
	 */
	const CATEGORY_ID = 'shop_products.CATEGORY_ID';
	
	/**
	 * the column name for the RELATED_PRODUCTS field
	 */
	const RELATED_PRODUCTS = 'shop_products.RELATED_PRODUCTS';
	
	/**
	 * the column name for the MAINIMAGE field
	 */
	const MAINIMAGE = 'shop_products.MAINIMAGE';
	
	/**
	 * the column name for the MAINMODIMAGE field
	 */
	const MAINMODIMAGE = 'shop_products.MAINMODIMAGE';
	
	/**
	 * the column name for the SMALLIMAGE field
	 */
	const SMALLIMAGE = 'shop_products.SMALLIMAGE';
	
	/**
	 * the column name for the SMALLMODIMAGE field
	 */
	const SMALLMODIMAGE = 'shop_products.SMALLMODIMAGE';
	
	/**
	 * the column name for the OLD_PRICE field
	 */
	const OLD_PRICE = 'shop_products.OLD_PRICE';
	
	/**
	 * the column name for the CREATED field
	 */
	const CREATED = 'shop_products.CREATED';
	
	/**
	 * the column name for the UPDATED field
	 */
	const UPDATED = 'shop_products.UPDATED';
	
	/**
	 * the column name for the VIEWS field
	 */
	const VIEWS = 'shop_products.VIEWS';
	
	/**
	 * the column name for the ADDED_TO_CART_COUNT field
	 */
	const ADDED_TO_CART_COUNT = 'shop_products.ADDED_TO_CART_COUNT';
	
	/**
	 * the column name for the ENABLE_COMMENTS field
	 */
	const ENABLE_COMMENTS = 'shop_products.ENABLE_COMMENTS';
	
	/**
	 * the column name for the TPL field
	 */
	const TPL = 'shop_products.TPL';
	
	/**
	 * The default string format for model objects of the related table *
	 */
	const DEFAULT_STRING_FORMAT = 'YAML';
	
	/**
	 * An identiy map to hold any loaded instances of SProducts objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * 
	 * @var array SProducts[]
	 */
	public static $instances = array ();
	
	// i18n behavior
	
	/**
	 * The default locale to use for translations
	 * 
	 * @var string
	 */
	const DEFAULT_LOCALE = 'ru';
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
					'ExternalId',
					'Url',
					'Active',
					'Hit',
					'Hot',
					'Action',
					'BrandId',
					'CategoryId',
					'RelatedProducts',
					'Mainimage',
					'Mainmodimage',
					'Smallimage',
					'Smallmodimage',
					'OldPrice',
					'Created',
					'Updated',
					'Views',
					'AddedToCartCount',
					'EnableComments',
					'Tpl' 
			),
			BasePeer::TYPE_STUDLYPHPNAME => array (
					'id',
					'userId',
					'externalId',
					'url',
					'active',
					'hit',
					'hot',
					'action',
					'brandId',
					'categoryId',
					'relatedProducts',
					'mainimage',
					'mainmodimage',
					'smallimage',
					'smallmodimage',
					'oldPrice',
					'created',
					'updated',
					'views',
					'addedToCartCount',
					'enableComments',
					'tpl' 
			),
			BasePeer::TYPE_COLNAME => array (
					self::ID,
					self::USER_ID,
					self::EXTERNAL_ID,
					self::URL,
					self::ACTIVE,
					self::HIT,
					self::HOT,
					self::ACTION,
					self::BRAND_ID,
					self::CATEGORY_ID,
					self::RELATED_PRODUCTS,
					self::MAINIMAGE,
					self::MAINMODIMAGE,
					self::SMALLIMAGE,
					self::SMALLMODIMAGE,
					self::OLD_PRICE,
					self::CREATED,
					self::UPDATED,
					self::VIEWS,
					self::ADDED_TO_CART_COUNT,
					self::ENABLE_COMMENTS,
					self::TPL 
			),
			BasePeer::TYPE_RAW_COLNAME => array (
					'ID',
					'USER_ID',
					'EXTERNAL_ID',
					'URL',
					'ACTIVE',
					'HIT',
					'HOT',
					'ACTION',
					'BRAND_ID',
					'CATEGORY_ID',
					'RELATED_PRODUCTS',
					'MAINIMAGE',
					'MAINMODIMAGE',
					'SMALLIMAGE',
					'SMALLMODIMAGE',
					'OLD_PRICE',
					'CREATED',
					'UPDATED',
					'VIEWS',
					'ADDED_TO_CART_COUNT',
					'ENABLE_COMMENTS',
					'TPL' 
			),
			BasePeer::TYPE_FIELDNAME => array (
					'id',
					'user_id',
					'external_id',
					'url',
					'active',
					'hit',
					'hot',
					'action',
					'brand_id',
					'category_id',
					'related_products',
					'mainImage',
					'mainModImage',
					'smallImage',
					'smallModImage',
					'old_price',
					'created',
					'updated',
					'views',
					'added_to_cart_count',
					'enable_comments',
					'tpl' 
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
					21 
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
					'ExternalId' => 2,
					'Url' => 3,
					'Active' => 4,
					'Hit' => 5,
					'Hot' => 6,
					'Action' => 7,
					'BrandId' => 8,
					'CategoryId' => 9,
					'RelatedProducts' => 10,
					'Mainimage' => 11,
					'Mainmodimage' => 12,
					'Smallimage' => 13,
					'Smallmodimage' => 14,
					'OldPrice' => 15,
					'Created' => 16,
					'Updated' => 17,
					'Views' => 18,
					'AddedToCartCount' => 19,
					'EnableComments' => 20,
					'Tpl' => 21 
			),
			BasePeer::TYPE_STUDLYPHPNAME => array (
					'id' => 0,
					'userId' => 1,
					'externalId' => 2,
					'url' => 3,
					'active' => 4,
					'hit' => 5,
					'hot' => 6,
					'action' => 7,
					'brandId' => 8,
					'categoryId' => 9,
					'relatedProducts' => 10,
					'mainimage' => 11,
					'mainmodimage' => 12,
					'smallimage' => 13,
					'smallmodimage' => 14,
					'oldPrice' => 15,
					'created' => 16,
					'updated' => 17,
					'views' => 18,
					'addedToCartCount' => 19,
					'enableComments' => 20,
					'tpl' => 21 
			),
			BasePeer::TYPE_COLNAME => array (
					self::ID => 0,
					self::USER_ID => 1,
					self::EXTERNAL_ID => 2,
					self::URL => 3,
					self::ACTIVE => 4,
					self::HIT => 5,
					self::HOT => 6,
					self::ACTION => 7,
					self::BRAND_ID => 8,
					self::CATEGORY_ID => 9,
					self::RELATED_PRODUCTS => 10,
					self::MAINIMAGE => 11,
					self::MAINMODIMAGE => 12,
					self::SMALLIMAGE => 13,
					self::SMALLMODIMAGE => 14,
					self::OLD_PRICE => 15,
					self::CREATED => 16,
					self::UPDATED => 17,
					self::VIEWS => 18,
					self::ADDED_TO_CART_COUNT => 19,
					self::ENABLE_COMMENTS => 20,
					self::TPL => 21 
			),
			BasePeer::TYPE_RAW_COLNAME => array (
					'ID' => 0,
					'USER_ID' => 1,
					'EXTERNAL_ID' => 2,
					'URL' => 3,
					'ACTIVE' => 4,
					'HIT' => 5,
					'HOT' => 6,
					'ACTION' => 7,
					'BRAND_ID' => 8,
					'CATEGORY_ID' => 9,
					'RELATED_PRODUCTS' => 10,
					'MAINIMAGE' => 11,
					'MAINMODIMAGE' => 12,
					'SMALLIMAGE' => 13,
					'SMALLMODIMAGE' => 14,
					'OLD_PRICE' => 15,
					'CREATED' => 16,
					'UPDATED' => 17,
					'VIEWS' => 18,
					'ADDED_TO_CART_COUNT' => 19,
					'ENABLE_COMMENTS' => 20,
					'TPL' => 21 
			),
			BasePeer::TYPE_FIELDNAME => array (
					'id' => 0,
					'user_id' => 1,
					'external_id' => 2,
					'url' => 3,
					'active' => 4,
					'hit' => 5,
					'hot' => 6,
					'action' => 7,
					'brand_id' => 8,
					'category_id' => 9,
					'related_products' => 10,
					'mainImage' => 11,
					'mainModImage' => 12,
					'smallImage' => 13,
					'smallModImage' => 14,
					'old_price' => 15,
					'created' => 16,
					'updated' => 17,
					'views' => 18,
					'added_to_cart_count' => 19,
					'enable_comments' => 20,
					'tpl' => 21 
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
					21 
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
	 *        	The column name for current table. (i.e. SProductsPeer::COLUMN_NAME).
	 * @return string
	 */
	public static function alias($alias, $column) {
		return str_replace ( SProductsPeer::TABLE_NAME . '.', $alias . '.', $column );
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
			$criteria->addSelectColumn ( SProductsPeer::ID );
			$criteria->addSelectColumn ( SProductsPeer::USER_ID );
			$criteria->addSelectColumn ( SProductsPeer::EXTERNAL_ID );
			$criteria->addSelectColumn ( SProductsPeer::URL );
			$criteria->addSelectColumn ( SProductsPeer::ACTIVE );
			$criteria->addSelectColumn ( SProductsPeer::HIT );
			$criteria->addSelectColumn ( SProductsPeer::HOT );
			$criteria->addSelectColumn ( SProductsPeer::ACTION );
			$criteria->addSelectColumn ( SProductsPeer::BRAND_ID );
			$criteria->addSelectColumn ( SProductsPeer::CATEGORY_ID );
			$criteria->addSelectColumn ( SProductsPeer::RELATED_PRODUCTS );
			$criteria->addSelectColumn ( SProductsPeer::MAINIMAGE );
			$criteria->addSelectColumn ( SProductsPeer::MAINMODIMAGE );
			$criteria->addSelectColumn ( SProductsPeer::SMALLIMAGE );
			$criteria->addSelectColumn ( SProductsPeer::SMALLMODIMAGE );
			$criteria->addSelectColumn ( SProductsPeer::OLD_PRICE );
			$criteria->addSelectColumn ( SProductsPeer::CREATED );
			$criteria->addSelectColumn ( SProductsPeer::UPDATED );
			$criteria->addSelectColumn ( SProductsPeer::VIEWS );
			$criteria->addSelectColumn ( SProductsPeer::ADDED_TO_CART_COUNT );
			$criteria->addSelectColumn ( SProductsPeer::ENABLE_COMMENTS );
			$criteria->addSelectColumn ( SProductsPeer::TPL );
		} else {
			$criteria->addSelectColumn ( $alias . '.ID' );
			$criteria->addSelectColumn ( $alias . '.USER_ID' );
			$criteria->addSelectColumn ( $alias . '.EXTERNAL_ID' );
			$criteria->addSelectColumn ( $alias . '.URL' );
			$criteria->addSelectColumn ( $alias . '.ACTIVE' );
			$criteria->addSelectColumn ( $alias . '.HIT' );
			$criteria->addSelectColumn ( $alias . '.HOT' );
			$criteria->addSelectColumn ( $alias . '.ACTION' );
			$criteria->addSelectColumn ( $alias . '.BRAND_ID' );
			$criteria->addSelectColumn ( $alias . '.CATEGORY_ID' );
			$criteria->addSelectColumn ( $alias . '.RELATED_PRODUCTS' );
			$criteria->addSelectColumn ( $alias . '.MAINIMAGE' );
			$criteria->addSelectColumn ( $alias . '.MAINMODIMAGE' );
			$criteria->addSelectColumn ( $alias . '.SMALLIMAGE' );
			$criteria->addSelectColumn ( $alias . '.SMALLMODIMAGE' );
			$criteria->addSelectColumn ( $alias . '.OLD_PRICE' );
			$criteria->addSelectColumn ( $alias . '.CREATED' );
			$criteria->addSelectColumn ( $alias . '.UPDATED' );
			$criteria->addSelectColumn ( $alias . '.VIEWS' );
			$criteria->addSelectColumn ( $alias . '.ADDED_TO_CART_COUNT' );
			$criteria->addSelectColumn ( $alias . '.ENABLE_COMMENTS' );
			$criteria->addSelectColumn ( $alias . '.TPL' );
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
		$criteria->setPrimaryTableName ( SProductsPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SProductsPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY won't ever affect the count
		$criteria->setDbName ( self::DATABASE_NAME ); // Set the correct dbName
		
		if ($con === null) {
			$con = Propel::getConnection ( SProductsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return SProducts
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null) {
		$critcopy = clone $criteria;
		$critcopy->setLimit ( 1 );
		$objects = SProductsPeer::doSelect ( $critcopy, $con );
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
		return SProductsPeer::populateObjects ( SProductsPeer::doSelectStmt ( $criteria, $con ) );
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
			$con = Propel::getConnection ( SProductsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		if (! $criteria->hasSelectClause ()) {
			$criteria = clone $criteria;
			SProductsPeer::addSelectColumns ( $criteria );
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
	 * @param SProducts $value
	 *        	A SProducts object.
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
	 *        	A SProducts object or a primary key value.
	 */
	public static function removeInstanceFromPool($value) {
		if (Propel::isInstancePoolingEnabled () && $value !== null) {
			if (is_object ( $value ) && $value instanceof SProducts) {
				$key = ( string ) $value->getId ();
			} elseif (is_scalar ( $value )) {
				// assume we've been passed a primary key
				$key = ( string ) $value;
			} else {
				$e = new PropelException ( "Invalid value passed to removeInstanceFromPool().  Expected primary key or SProducts object; got " . (is_object ( $value ) ? get_class ( $value ) . ' object.' : var_export ( $value, true )) );
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
	 * @return SProducts Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to shop_products
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool() {
		// Invalidate objects in ShopKitPeer instance pool,
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		ShopKitPeer::clearInstancePool ();
		// Invalidate objects in ShopKitProductPeer instance pool,
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		ShopKitProductPeer::clearInstancePool ();
		// Invalidate objects in SProductsI18nPeer instance pool,
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		SProductsI18nPeer::clearInstancePool ();
		// Invalidate objects in SProductImagesPeer instance pool,
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		SProductImagesPeer::clearInstancePool ();
		// Invalidate objects in SProductVariantsPeer instance pool,
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		SProductVariantsPeer::clearInstancePool ();
		// Invalidate objects in SWarehouseDataPeer instance pool,
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		SWarehouseDataPeer::clearInstancePool ();
		// Invalidate objects in ShopProductCategoriesPeer instance pool,
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		ShopProductCategoriesPeer::clearInstancePool ();
		// Invalidate objects in SProductPropertiesDataPeer instance pool,
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		SProductPropertiesDataPeer::clearInstancePool ();
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
		$cls = SProductsPeer::getOMClass ( false );
		// populate the object(s)
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key = SProductsPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj = SProductsPeer::getInstanceFromPool ( $key ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results [] = $obj;
			} else {
				$obj = new $cls ();
				$obj->hydrate ( $row );
				$results [] = $obj;
				SProductsPeer::addInstanceToPool ( $obj, $key );
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
	 * @return array (SProducts object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0) {
		$key = SProductsPeer::getPrimaryKeyHashFromRow ( $row, $startcol );
		if (null !== ($obj = SProductsPeer::getInstanceFromPool ( $key ))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + SProductsPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = SProductsPeer::OM_CLASS;
			$obj = new $cls ();
			$col = $obj->hydrate ( $row, $startcol );
			SProductsPeer::addInstanceToPool ( $obj, $key );
		}
		return array (
				$obj,
				$col 
		);
	}
	
	/**
	 * Returns the number of rows matching criteria, joining the related Brand table
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinBrand(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SProductsPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SProductsPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY won't ever affect the count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SProductsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SProductsPeer::BRAND_ID, SBrandsPeer::ID, $join_behavior );
		
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
	 * Returns the number of rows matching criteria, joining the related MainCategory table
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinMainCategory(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SProductsPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SProductsPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY won't ever affect the count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SProductsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SProductsPeer::CATEGORY_ID, SCategoryPeer::ID, $join_behavior );
		
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
	 * Selects a collection of SProducts objects pre-filled with their SBrands objects.
	 * 
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SProducts objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinBrand(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SProductsPeer::addSelectColumns ( $criteria );
		$startcol = SProductsPeer::NUM_HYDRATE_COLUMNS;
		SBrandsPeer::addSelectColumns ( $criteria );
		
		$criteria->addJoin ( SProductsPeer::BRAND_ID, SBrandsPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SProductsPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SProductsPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				
				$cls = SProductsPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SProductsPeer::addInstanceToPool ( $obj1, $key1 );
			} // if $obj1 already loaded
			
			$key2 = SBrandsPeer::getPrimaryKeyHashFromRow ( $row, $startcol );
			if ($key2 !== null) {
				$obj2 = SBrandsPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SBrandsPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol );
					SBrandsPeer::addInstanceToPool ( $obj2, $key2 );
				} // if obj2 already loaded
				  
				// Add the $obj1 (SProducts) to $obj2 (SBrands)
				$obj2->addSProducts ( $obj1 );
			} // if joined row was not null
			
			$results [] = $obj1;
		}
		$stmt->closeCursor ();
		return $results;
	}
	
	/**
	 * Selects a collection of SProducts objects pre-filled with their SCategory objects.
	 * 
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SProducts objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinMainCategory(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SProductsPeer::addSelectColumns ( $criteria );
		$startcol = SProductsPeer::NUM_HYDRATE_COLUMNS;
		SCategoryPeer::addSelectColumns ( $criteria );
		
		$criteria->addJoin ( SProductsPeer::CATEGORY_ID, SCategoryPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SProductsPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SProductsPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				
				$cls = SProductsPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SProductsPeer::addInstanceToPool ( $obj1, $key1 );
			} // if $obj1 already loaded
			
			$key2 = SCategoryPeer::getPrimaryKeyHashFromRow ( $row, $startcol );
			if ($key2 !== null) {
				$obj2 = SCategoryPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SCategoryPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol );
					SCategoryPeer::addInstanceToPool ( $obj2, $key2 );
				} // if obj2 already loaded
				  
				// Add the $obj1 (SProducts) to $obj2 (SCategory)
				$obj2->addSProducts ( $obj1 );
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
		$criteria->setPrimaryTableName ( SProductsPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SProductsPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY won't ever affect the count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SProductsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SProductsPeer::BRAND_ID, SBrandsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SProductsPeer::CATEGORY_ID, SCategoryPeer::ID, $join_behavior );
		
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
	 * Selects a collection of SProducts objects pre-filled with all related objects.
	 *
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SProducts objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SProductsPeer::addSelectColumns ( $criteria );
		$startcol2 = SProductsPeer::NUM_HYDRATE_COLUMNS;
		
		SBrandsPeer::addSelectColumns ( $criteria );
		$startcol3 = $startcol2 + SBrandsPeer::NUM_HYDRATE_COLUMNS;
		
		SCategoryPeer::addSelectColumns ( $criteria );
		$startcol4 = $startcol3 + SCategoryPeer::NUM_HYDRATE_COLUMNS;
		
		$criteria->addJoin ( SProductsPeer::BRAND_ID, SBrandsPeer::ID, $join_behavior );
		
		$criteria->addJoin ( SProductsPeer::CATEGORY_ID, SCategoryPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SProductsPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SProductsPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SProductsPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SProductsPeer::addInstanceToPool ( $obj1, $key1 );
			} // if obj1 already loaded
			  
			// Add objects for joined SBrands rows
			
			$key2 = SBrandsPeer::getPrimaryKeyHashFromRow ( $row, $startcol2 );
			if ($key2 !== null) {
				$obj2 = SBrandsPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SBrandsPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol2 );
					SBrandsPeer::addInstanceToPool ( $obj2, $key2 );
				} // if obj2 loaded
				  
				// Add the $obj1 (SProducts) to the collection in $obj2 (SBrands)
				$obj2->addSProducts ( $obj1 );
			} // if joined row not null
			  
			// Add objects for joined SCategory rows
			
			$key3 = SCategoryPeer::getPrimaryKeyHashFromRow ( $row, $startcol3 );
			if ($key3 !== null) {
				$obj3 = SCategoryPeer::getInstanceFromPool ( $key3 );
				if (! $obj3) {
					
					$cls = SCategoryPeer::getOMClass ( false );
					
					$obj3 = new $cls ();
					$obj3->hydrate ( $row, $startcol3 );
					SCategoryPeer::addInstanceToPool ( $obj3, $key3 );
				} // if obj3 loaded
				  
				// Add the $obj1 (SProducts) to the collection in $obj3 (SCategory)
				$obj3->addSProducts ( $obj1 );
			} // if joined row not null
			
			$results [] = $obj1;
		}
		$stmt->closeCursor ();
		return $results;
	}
	
	/**
	 * Returns the number of rows matching criteria, joining the related Brand table
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptBrand(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SProductsPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SProductsPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY should not affect count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SProductsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SProductsPeer::CATEGORY_ID, SCategoryPeer::ID, $join_behavior );
		
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
	 * Returns the number of rows matching criteria, joining the related MainCategory table
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct
	 *        	Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return int Number of matching rows.
	 */
	public static function doCountJoinAllExceptMainCategory(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName ( SProductsPeer::TABLE_NAME );
		
		if ($distinct && ! in_array ( Criteria::DISTINCT, $criteria->getSelectModifiers () )) {
			$criteria->setDistinct ();
		}
		
		if (! $criteria->hasSelectClause ()) {
			SProductsPeer::addSelectColumns ( $criteria );
		}
		
		$criteria->clearOrderByColumns (); // ORDER BY should not affect count
		                                  
		// Set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		if ($con === null) {
			$con = Propel::getConnection ( SProductsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria->addJoin ( SProductsPeer::BRAND_ID, SBrandsPeer::ID, $join_behavior );
		
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
	 * Selects a collection of SProducts objects pre-filled with all related objects except Brand.
	 *
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SProducts objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptBrand(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SProductsPeer::addSelectColumns ( $criteria );
		$startcol2 = SProductsPeer::NUM_HYDRATE_COLUMNS;
		
		SCategoryPeer::addSelectColumns ( $criteria );
		$startcol3 = $startcol2 + SCategoryPeer::NUM_HYDRATE_COLUMNS;
		
		$criteria->addJoin ( SProductsPeer::CATEGORY_ID, SCategoryPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SProductsPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SProductsPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SProductsPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SProductsPeer::addInstanceToPool ( $obj1, $key1 );
			} // if obj1 already loaded
			  
			// Add objects for joined SCategory rows
			
			$key2 = SCategoryPeer::getPrimaryKeyHashFromRow ( $row, $startcol2 );
			if ($key2 !== null) {
				$obj2 = SCategoryPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SCategoryPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol2 );
					SCategoryPeer::addInstanceToPool ( $obj2, $key2 );
				} // if $obj2 already loaded
				  
				// Add the $obj1 (SProducts) to the collection in $obj2 (SCategory)
				$obj2->addSProducts ( $obj1 );
			} // if joined row is not null
			
			$results [] = $obj1;
		}
		$stmt->closeCursor ();
		return $results;
	}
	
	/**
	 * Selects a collection of SProducts objects pre-filled with all related objects except MainCategory.
	 *
	 * @param Criteria $criteria        	
	 * @param PropelPDO $con        	
	 * @param String $join_behavior
	 *        	the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return array Array of SProducts objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptMainCategory(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$criteria = clone $criteria;
		
		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName () == Propel::getDefaultDB ()) {
			$criteria->setDbName ( self::DATABASE_NAME );
		}
		
		SProductsPeer::addSelectColumns ( $criteria );
		$startcol2 = SProductsPeer::NUM_HYDRATE_COLUMNS;
		
		SBrandsPeer::addSelectColumns ( $criteria );
		$startcol3 = $startcol2 + SBrandsPeer::NUM_HYDRATE_COLUMNS;
		
		$criteria->addJoin ( SProductsPeer::BRAND_ID, SBrandsPeer::ID, $join_behavior );
		
		$stmt = BasePeer::doSelect ( $criteria, $con );
		$results = array ();
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			$key1 = SProductsPeer::getPrimaryKeyHashFromRow ( $row, 0 );
			if (null !== ($obj1 = SProductsPeer::getInstanceFromPool ( $key1 ))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SProductsPeer::getOMClass ( false );
				
				$obj1 = new $cls ();
				$obj1->hydrate ( $row );
				SProductsPeer::addInstanceToPool ( $obj1, $key1 );
			} // if obj1 already loaded
			  
			// Add objects for joined SBrands rows
			
			$key2 = SBrandsPeer::getPrimaryKeyHashFromRow ( $row, $startcol2 );
			if ($key2 !== null) {
				$obj2 = SBrandsPeer::getInstanceFromPool ( $key2 );
				if (! $obj2) {
					
					$cls = SBrandsPeer::getOMClass ( false );
					
					$obj2 = new $cls ();
					$obj2->hydrate ( $row, $startcol2 );
					SBrandsPeer::addInstanceToPool ( $obj2, $key2 );
				} // if $obj2 already loaded
				  
				// Add the $obj1 (SProducts) to the collection in $obj2 (SBrands)
				$obj2->addSProducts ( $obj1 );
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
		$dbMap = Propel::getDatabaseMap ( BaseSProductsPeer::DATABASE_NAME );
		if (! $dbMap->hasTable ( BaseSProductsPeer::TABLE_NAME )) {
			$dbMap->addTableObject ( new SProductsTableMap () );
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
		return $withPrefix ? SProductsPeer::CLASS_DEFAULT : SProductsPeer::OM_CLASS;
	}
	
	/**
	 * Performs an INSERT on the database, given a SProducts or Criteria object.
	 *
	 * @param mixed $values
	 *        	Criteria or SProducts object containing data that is used to create the INSERT statement.
	 * @param PropelPDO $con
	 *        	the PropelPDO connection to use
	 * @return mixed The new primary key.
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null) {
		if ($con === null) {
			$con = Propel::getConnection ( SProductsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria (); // build Criteria from SProducts object
		}
		
		if ($criteria->containsKey ( SProductsPeer::ID ) && $criteria->keyContainsValue ( SProductsPeer::ID )) {
			throw new PropelException ( 'Cannot insert a value for auto-increment primary key (' . SProductsPeer::ID . ')' );
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
	 * Performs an UPDATE on the database, given a SProducts or Criteria object.
	 *
	 * @param mixed $values
	 *        	Criteria or SProducts object containing data that is used to create the UPDATE statement.
	 * @param PropelPDO $con
	 *        	The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return int The number of affected rows (if supported by underlying database driver).
	 * @throws PropelException Any exceptions caught during processing will be
	 *         rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null) {
		if ($con === null) {
			$con = Propel::getConnection ( SProductsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		$selectCriteria = new Criteria ( self::DATABASE_NAME );
		
		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
			
			$comparison = $criteria->getComparison ( SProductsPeer::ID );
			$value = $criteria->remove ( SProductsPeer::ID );
			if ($value) {
				$selectCriteria->add ( SProductsPeer::ID, $value, $comparison );
			} else {
				$selectCriteria->setPrimaryTableName ( SProductsPeer::TABLE_NAME );
			}
		} else { // $values is SProducts object
			$criteria = $values->buildCriteria (); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria (); // gets criteria w/ primary key(s)
		}
		
		// set the correct dbName
		$criteria->setDbName ( self::DATABASE_NAME );
		
		return BasePeer::doUpdate ( $selectCriteria, $criteria, $con );
	}
	
	/**
	 * Deletes all rows from the shop_products table.
	 *
	 * @param PropelPDO $con
	 *        	the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null) {
		if ($con === null) {
			$con = Propel::getConnection ( SProductsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction ();
			$affectedRows += SProductsPeer::doOnDeleteCascade ( new Criteria ( SProductsPeer::DATABASE_NAME ), $con );
			$affectedRows += BasePeer::doDeleteAll ( SProductsPeer::TABLE_NAME, $con, SProductsPeer::DATABASE_NAME );
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			SProductsPeer::clearInstancePool ();
			SProductsPeer::clearRelatedInstancePool ();
			$con->commit ();
			return $affectedRows;
		} catch ( PropelException $e ) {
			$con->rollBack ();
			throw $e;
		}
	}
	
	/**
	 * Performs a DELETE on the database, given a SProducts or Criteria object OR a primary key value.
	 *
	 * @param mixed $values
	 *        	Criteria or SProducts object or primary key or array of primary keys
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
			$con = Propel::getConnection ( SProductsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof SProducts) { // it's a model object
		                                          // create criteria based on pk values
			$criteria = $values->buildPkeyCriteria ();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria ( self::DATABASE_NAME );
			$criteria->add ( SProductsPeer::ID, ( array ) $values, Criteria::IN );
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
			$affectedRows += SProductsPeer::doOnDeleteCascade ( $c, $con );
			
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			if ($values instanceof Criteria) {
				SProductsPeer::clearInstancePool ();
			} elseif ($values instanceof SProducts) { // it's a model object
				SProductsPeer::removeInstanceFromPool ( $values );
			} else { // it's a primary key, or an array of pks
				foreach ( ( array ) $values as $singleval ) {
					SProductsPeer::removeInstanceFromPool ( $singleval );
				}
			}
			
			$affectedRows += BasePeer::doDelete ( $criteria, $con );
			SProductsPeer::clearRelatedInstancePool ();
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
		$objects = SProductsPeer::doSelect ( $criteria, $con );
		foreach ( $objects as $obj ) {
			
			// delete related ShopKit objects
			$criteria = new Criteria ( ShopKitPeer::DATABASE_NAME );
			
			$criteria->add ( ShopKitPeer::PRODUCT_ID, $obj->getId () );
			$affectedRows += ShopKitPeer::doDelete ( $criteria, $con );
			
			// delete related ShopKitProduct objects
			$criteria = new Criteria ( ShopKitProductPeer::DATABASE_NAME );
			
			$criteria->add ( ShopKitProductPeer::PRODUCT_ID, $obj->getId () );
			$affectedRows += ShopKitProductPeer::doDelete ( $criteria, $con );
			
			// delete related SProductsI18n objects
			$criteria = new Criteria ( SProductsI18nPeer::DATABASE_NAME );
			
			$criteria->add ( SProductsI18nPeer::ID, $obj->getId () );
			$affectedRows += SProductsI18nPeer::doDelete ( $criteria, $con );
			
			// delete related SProductImages objects
			$criteria = new Criteria ( SProductImagesPeer::DATABASE_NAME );
			
			$criteria->add ( SProductImagesPeer::PRODUCT_ID, $obj->getId () );
			$affectedRows += SProductImagesPeer::doDelete ( $criteria, $con );
			
			// delete related SProductVariants objects
			$criteria = new Criteria ( SProductVariantsPeer::DATABASE_NAME );
			
			$criteria->add ( SProductVariantsPeer::PRODUCT_ID, $obj->getId () );
			$affectedRows += SProductVariantsPeer::doDelete ( $criteria, $con );
			
			// delete related SWarehouseData objects
			$criteria = new Criteria ( SWarehouseDataPeer::DATABASE_NAME );
			
			$criteria->add ( SWarehouseDataPeer::PRODUCT_ID, $obj->getId () );
			$affectedRows += SWarehouseDataPeer::doDelete ( $criteria, $con );
			
			// delete related ShopProductCategories objects
			$criteria = new Criteria ( ShopProductCategoriesPeer::DATABASE_NAME );
			
			$criteria->add ( ShopProductCategoriesPeer::PRODUCT_ID, $obj->getId () );
			$affectedRows += ShopProductCategoriesPeer::doDelete ( $criteria, $con );
			
			// delete related SProductPropertiesData objects
			$criteria = new Criteria ( SProductPropertiesDataPeer::DATABASE_NAME );
			
			$criteria->add ( SProductPropertiesDataPeer::PRODUCT_ID, $obj->getId () );
			$affectedRows += SProductPropertiesDataPeer::doDelete ( $criteria, $con );
		}
		return $affectedRows;
	}
	
	/**
	 * Validates all modified columns of given SProducts object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param SProducts $obj
	 *        	The object to validate.
	 * @param mixed $cols
	 *        	Column name or array of column names.
	 *        	
	 * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null) {
		$columns = array ();
		
		if ($cols) {
			$dbMap = Propel::getDatabaseMap ( SProductsPeer::DATABASE_NAME );
			$tableMap = $dbMap->getTable ( SProductsPeer::TABLE_NAME );
			
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
		
		return BasePeer::doValidate ( SProductsPeer::DATABASE_NAME, SProductsPeer::TABLE_NAME, $columns );
	}
	
	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param int $pk
	 *        	the primary key.
	 * @param PropelPDO $con
	 *        	the connection to use
	 * @return SProducts
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null) {
		if (null !== ($obj = SProductsPeer::getInstanceFromPool ( ( string ) $pk ))) {
			return $obj;
		}
		
		if ($con === null) {
			$con = Propel::getConnection ( SProductsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$criteria = new Criteria ( SProductsPeer::DATABASE_NAME );
		$criteria->add ( SProductsPeer::ID, $pk );
		
		$v = SProductsPeer::doSelect ( $criteria, $con );
		
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
			$con = Propel::getConnection ( SProductsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		$objs = null;
		if (empty ( $pks )) {
			$objs = array ();
		} else {
			$criteria = new Criteria ( SProductsPeer::DATABASE_NAME );
			$criteria->add ( SProductsPeer::ID, $pks, Criteria::IN );
			$objs = SProductsPeer::doSelect ( $criteria, $con );
		}
		return $objs;
	}
} // BaseSProductsPeer
  
// This is the static code needed to register the TableMap for this table with the main Propel class.
  //
BaseSProductsPeer::buildTableMap ();

