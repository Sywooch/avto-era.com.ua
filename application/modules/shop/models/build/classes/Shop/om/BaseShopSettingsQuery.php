<?php

/**
 * Base class that represents a query for the 'shop_settings' table.
 *
 * 
 *
 * @method     ShopSettingsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ShopSettingsQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method     ShopSettingsQuery orderByLocale($order = Criteria::ASC) Order by the locale column
 *
 * @method     ShopSettingsQuery groupByName() Group by the name column
 * @method     ShopSettingsQuery groupByValue() Group by the value column
 * @method     ShopSettingsQuery groupByLocale() Group by the locale column
 *
 * @method     ShopSettingsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ShopSettingsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ShopSettingsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ShopSettings findOne(PropelPDO $con = null) Return the first ShopSettings matching the query
 * @method     ShopSettings findOneOrCreate(PropelPDO $con = null) Return the first ShopSettings matching the query, or a new ShopSettings object populated from the query conditions when no match is found
 *
 * @method     ShopSettings findOneByName(string $name) Return the first ShopSettings filtered by the name column
 * @method     ShopSettings findOneByValue(string $value) Return the first ShopSettings filtered by the value column
 * @method     ShopSettings findOneByLocale(string $locale) Return the first ShopSettings filtered by the locale column
 *
 * @method     array findByName(string $name) Return ShopSettings objects filtered by the name column
 * @method     array findByValue(string $value) Return ShopSettings objects filtered by the value column
 * @method     array findByLocale(string $locale) Return ShopSettings objects filtered by the locale column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseShopSettingsQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseShopSettingsQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'ShopSettings', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new ShopSettingsQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return ShopSettingsQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof ShopSettingsQuery) {
			return $criteria;
		}
		$query = new ShopSettingsQuery ();
		if (null !== $modelAlias) {
			$query->setModelAlias ( $modelAlias );
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith ( $criteria );
		}
		return $query;
	}
	
	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 *
	 * @param array[$name, $locale]
	 *        	$key Primary key to use for the query
	 * @param PropelPDO $con
	 *        	an optional connection object
	 *        	
	 * @return ShopSettings|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ShopSettingsPeer::getInstanceFromPool ( serialize ( array (
				( string ) $key [0],
				( string ) $key [1] 
		) ) ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( ShopSettingsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		$this->basePreSelect ( $con );
		if ($this->formatter || $this->modelAlias || $this->with || $this->select || $this->selectColumns || $this->asColumns || $this->selectModifiers || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex ( $key, $con );
		} else {
			return $this->findPkSimple ( $key, $con );
		}
	}
	
	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param mixed $key
	 *        	Primary key to use for the query
	 * @param PropelPDO $con
	 *        	A connection object
	 *        	
	 * @return ShopSettings A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `NAME`, `VALUE`, `LOCALE` FROM `shop_settings` WHERE `NAME` = :p0 AND `LOCALE` = :p1';
		try {
			$stmt = $con->prepare ( $sql );
			$stmt->bindValue ( ':p0', $key [0], PDO::PARAM_STR );
			$stmt->bindValue ( ':p1', $key [1], PDO::PARAM_STR );
			$stmt->execute ();
		} catch ( Exception $e ) {
			Propel::log ( $e->getMessage (), Propel::LOG_ERR );
			throw new PropelException ( sprintf ( 'Unable to execute SELECT statement [%s]', $sql ), $e );
		}
		$obj = null;
		if ($row = $stmt->fetch ( PDO::FETCH_NUM )) {
			$obj = new ShopSettings ();
			$obj->hydrate ( $row );
			ShopSettingsPeer::addInstanceToPool ( $obj, serialize ( array (
					( string ) $key [0],
					( string ) $key [1] 
			) ) );
		}
		$stmt->closeCursor ();
		
		return $obj;
	}
	
	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key
	 *        	Primary key to use for the query
	 * @param PropelPDO $con
	 *        	A connection object
	 *        	
	 * @return ShopSettings|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con) {
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery () ? clone $this : $this;
		$stmt = $criteria->filterByPrimaryKey ( $key )->doSelect ( $con );
		return $criteria->getFormatter ()->init ( $criteria )->formatOne ( $stmt );
	}
	
	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
	 * </code>
	 * 
	 * @param array $keys
	 *        	Primary keys to use for the query
	 * @param PropelPDO $con
	 *        	an optional connection object
	 *        	
	 * @return PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection ( $this->getDbName (), Propel::CONNECTION_READ );
		}
		$this->basePreSelect ( $con );
		$criteria = $this->isKeepQuery () ? clone $this : $this;
		$stmt = $criteria->filterByPrimaryKeys ( $keys )->doSelect ( $con );
		return $criteria->getFormatter ()->init ( $criteria )->format ( $stmt );
	}
	
	/**
	 * Filter the query by primary key
	 *
	 * @param mixed $key
	 *        	Primary key to use for the query
	 *        	
	 * @return ShopSettingsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		$this->addUsingAlias ( ShopSettingsPeer::NAME, $key [0], Criteria::EQUAL );
		$this->addUsingAlias ( ShopSettingsPeer::LOCALE, $key [1], Criteria::EQUAL );
		
		return $this;
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return ShopSettingsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		if (empty ( $keys )) {
			return $this->add ( null, '1<>1', Criteria::CUSTOM );
		}
		foreach ( $keys as $key ) {
			$cton0 = $this->getNewCriterion ( ShopSettingsPeer::NAME, $key [0], Criteria::EQUAL );
			$cton1 = $this->getNewCriterion ( ShopSettingsPeer::LOCALE, $key [1], Criteria::EQUAL );
			$cton0->addAnd ( $cton1 );
			$this->addOr ( $cton0 );
		}
		
		return $this;
	}
	
	/**
	 * Filter the query on the name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByName('fooValue'); // WHERE name = 'fooValue'
	 * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $name
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopSettingsQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $name )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $name )) {
				$name = str_replace ( '*', '%', $name );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( ShopSettingsPeer::NAME, $name, $comparison );
	}
	
	/**
	 * Filter the query on the value column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByValue('fooValue'); // WHERE value = 'fooValue'
	 * $query->filterByValue('%fooValue%'); // WHERE value LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $value
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopSettingsQuery The current query, for fluid interface
	 */
	public function filterByValue($value = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $value )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $value )) {
				$value = str_replace ( '*', '%', $value );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( ShopSettingsPeer::VALUE, $value, $comparison );
	}
	
	/**
	 * Filter the query on the locale column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLocale('fooValue'); // WHERE locale = 'fooValue'
	 * $query->filterByLocale('%fooValue%'); // WHERE locale LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $locale
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopSettingsQuery The current query, for fluid interface
	 */
	public function filterByLocale($locale = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $locale )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $locale )) {
				$locale = str_replace ( '*', '%', $locale );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( ShopSettingsPeer::LOCALE, $locale, $comparison );
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param ShopSettings $shopSettings
	 *        	Object to remove from the list of results
	 *        	
	 * @return ShopSettingsQuery The current query, for fluid interface
	 */
	public function prune($shopSettings = null) {
		if ($shopSettings) {
			$this->addCond ( 'pruneCond0', $this->getAliasedColName ( ShopSettingsPeer::NAME ), $shopSettings->getName (), Criteria::NOT_EQUAL );
			$this->addCond ( 'pruneCond1', $this->getAliasedColName ( ShopSettingsPeer::LOCALE ), $shopSettings->getLocale (), Criteria::NOT_EQUAL );
			$this->combine ( array (
					'pruneCond0',
					'pruneCond1' 
			), Criteria::LOGICAL_OR );
		}
		
		return $this;
	}
} // BaseShopSettingsQuery