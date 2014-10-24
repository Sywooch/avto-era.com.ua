<?php

/**
 * Base class that represents a query for the 'shop_product_properties' table.
 *
 * 
 *
 * @method     SPropertiesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SPropertiesQuery orderByExternalId($order = Criteria::ASC) Order by the external_id column
 * @method     SPropertiesQuery orderByCsvName($order = Criteria::ASC) Order by the csv_name column
 * @method     SPropertiesQuery orderByMultiple($order = Criteria::ASC) Order by the multiple column
 * @method     SPropertiesQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     SPropertiesQuery orderByShowOnSite($order = Criteria::ASC) Order by the show_on_site column
 * @method     SPropertiesQuery orderByShowInCompare($order = Criteria::ASC) Order by the show_in_compare column
 * @method     SPropertiesQuery orderByShowInFilter($order = Criteria::ASC) Order by the show_in_filter column
 * @method     SPropertiesQuery orderByShowFaq($order = Criteria::ASC) Order by the show_faq column
 * @method     SPropertiesQuery orderByMainProperty($order = Criteria::ASC) Order by the main_property column
 * @method     SPropertiesQuery orderByPosition($order = Criteria::ASC) Order by the position column
 *
 * @method     SPropertiesQuery groupById() Group by the id column
 * @method     SPropertiesQuery groupByExternalId() Group by the external_id column
 * @method     SPropertiesQuery groupByCsvName() Group by the csv_name column
 * @method     SPropertiesQuery groupByMultiple() Group by the multiple column
 * @method     SPropertiesQuery groupByActive() Group by the active column
 * @method     SPropertiesQuery groupByShowOnSite() Group by the show_on_site column
 * @method     SPropertiesQuery groupByShowInCompare() Group by the show_in_compare column
 * @method     SPropertiesQuery groupByShowInFilter() Group by the show_in_filter column
 * @method     SPropertiesQuery groupByShowFaq() Group by the show_faq column
 * @method     SPropertiesQuery groupByMainProperty() Group by the main_property column
 * @method     SPropertiesQuery groupByPosition() Group by the position column
 *
 * @method     SPropertiesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SPropertiesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SPropertiesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SPropertiesQuery leftJoinSPropertiesI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the SPropertiesI18n relation
 * @method     SPropertiesQuery rightJoinSPropertiesI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SPropertiesI18n relation
 * @method     SPropertiesQuery innerJoinSPropertiesI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the SPropertiesI18n relation
 *
 * @method     SPropertiesQuery leftJoinShopProductPropertiesCategories($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShopProductPropertiesCategories relation
 * @method     SPropertiesQuery rightJoinShopProductPropertiesCategories($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShopProductPropertiesCategories relation
 * @method     SPropertiesQuery innerJoinShopProductPropertiesCategories($relationAlias = null) Adds a INNER JOIN clause to the query using the ShopProductPropertiesCategories relation
 *
 * @method     SPropertiesQuery leftJoinSProductPropertiesData($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProductPropertiesData relation
 * @method     SPropertiesQuery rightJoinSProductPropertiesData($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProductPropertiesData relation
 * @method     SPropertiesQuery innerJoinSProductPropertiesData($relationAlias = null) Adds a INNER JOIN clause to the query using the SProductPropertiesData relation
 *
 * @method     SProperties findOne(PropelPDO $con = null) Return the first SProperties matching the query
 * @method     SProperties findOneOrCreate(PropelPDO $con = null) Return the first SProperties matching the query, or a new SProperties object populated from the query conditions when no match is found
 *
 * @method     SProperties findOneById(int $id) Return the first SProperties filtered by the id column
 * @method     SProperties findOneByExternalId(string $external_id) Return the first SProperties filtered by the external_id column
 * @method     SProperties findOneByCsvName(string $csv_name) Return the first SProperties filtered by the csv_name column
 * @method     SProperties findOneByMultiple(boolean $multiple) Return the first SProperties filtered by the multiple column
 * @method     SProperties findOneByActive(boolean $active) Return the first SProperties filtered by the active column
 * @method     SProperties findOneByShowOnSite(boolean $show_on_site) Return the first SProperties filtered by the show_on_site column
 * @method     SProperties findOneByShowInCompare(boolean $show_in_compare) Return the first SProperties filtered by the show_in_compare column
 * @method     SProperties findOneByShowInFilter(boolean $show_in_filter) Return the first SProperties filtered by the show_in_filter column
 * @method     SProperties findOneByShowFaq(boolean $show_faq) Return the first SProperties filtered by the show_faq column
 * @method     SProperties findOneByMainProperty(boolean $main_property) Return the first SProperties filtered by the main_property column
 * @method     SProperties findOneByPosition(int $position) Return the first SProperties filtered by the position column
 *
 * @method     array findById(int $id) Return SProperties objects filtered by the id column
 * @method     array findByExternalId(string $external_id) Return SProperties objects filtered by the external_id column
 * @method     array findByCsvName(string $csv_name) Return SProperties objects filtered by the csv_name column
 * @method     array findByMultiple(boolean $multiple) Return SProperties objects filtered by the multiple column
 * @method     array findByActive(boolean $active) Return SProperties objects filtered by the active column
 * @method     array findByShowOnSite(boolean $show_on_site) Return SProperties objects filtered by the show_on_site column
 * @method     array findByShowInCompare(boolean $show_in_compare) Return SProperties objects filtered by the show_in_compare column
 * @method     array findByShowInFilter(boolean $show_in_filter) Return SProperties objects filtered by the show_in_filter column
 * @method     array findByShowFaq(boolean $show_faq) Return SProperties objects filtered by the show_faq column
 * @method     array findByMainProperty(boolean $main_property) Return SProperties objects filtered by the main_property column
 * @method     array findByPosition(int $position) Return SProperties objects filtered by the position column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSPropertiesQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseSPropertiesQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SProperties', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new SPropertiesQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return SPropertiesQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof SPropertiesQuery) {
			return $criteria;
		}
		$query = new SPropertiesQuery ();
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
	 * $obj = $c->findPk(12, $con);
	 * </code>
	 *
	 * @param mixed $key
	 *        	Primary key to use for the query
	 * @param PropelPDO $con
	 *        	an optional connection object
	 *        	
	 * @return SProperties|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SPropertiesPeer::getInstanceFromPool ( ( string ) $key ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( SPropertiesPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return SProperties A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `ID`, `EXTERNAL_ID`, `CSV_NAME`, `MULTIPLE`, `ACTIVE`, `SHOW_ON_SITE`, `SHOW_IN_COMPARE`, `SHOW_IN_FILTER`, `SHOW_FAQ`, `MAIN_PROPERTY`, `POSITION` FROM `shop_product_properties` WHERE `ID` = :p0';
		try {
			$stmt = $con->prepare ( $sql );
			$stmt->bindValue ( ':p0', $key, PDO::PARAM_INT );
			$stmt->execute ();
		} catch ( Exception $e ) {
			Propel::log ( $e->getMessage (), Propel::LOG_ERR );
			throw new PropelException ( sprintf ( 'Unable to execute SELECT statement [%s]', $sql ), $e );
		}
		$obj = null;
		if ($row = $stmt->fetch ( PDO::FETCH_NUM )) {
			$obj = new SProperties ();
			$obj->hydrate ( $row );
			SPropertiesPeer::addInstanceToPool ( $obj, ( string ) $key );
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
	 * @return SProperties|array|mixed the result, formatted by the current formatter
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
	 * $objs = $c->findPks(array(12, 56, 832), $con);
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
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		return $this->addUsingAlias ( SPropertiesPeer::ID, $key, Criteria::EQUAL );
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		return $this->addUsingAlias ( SPropertiesPeer::ID, $keys, Criteria::IN );
	}
	
	/**
	 * Filter the query on the id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param mixed $id
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null) {
		if (is_array ( $id ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( SPropertiesPeer::ID, $id, $comparison );
	}
	
	/**
	 * Filter the query on the external_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByExternalId('fooValue'); // WHERE external_id = 'fooValue'
	 * $query->filterByExternalId('%fooValue%'); // WHERE external_id LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $externalId
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterByExternalId($externalId = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $externalId )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $externalId )) {
				$externalId = str_replace ( '*', '%', $externalId );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SPropertiesPeer::EXTERNAL_ID, $externalId, $comparison );
	}
	
	/**
	 * Filter the query on the csv_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCsvName('fooValue'); // WHERE csv_name = 'fooValue'
	 * $query->filterByCsvName('%fooValue%'); // WHERE csv_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $csvName
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterByCsvName($csvName = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $csvName )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $csvName )) {
				$csvName = str_replace ( '*', '%', $csvName );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SPropertiesPeer::CSV_NAME, $csvName, $comparison );
	}
	
	/**
	 * Filter the query on the multiple column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMultiple(true); // WHERE multiple = true
	 * $query->filterByMultiple('yes'); // WHERE multiple = true
	 * </code>
	 *
	 * @param boolean|string $multiple
	 *        	The value to use as filter.
	 *        	Non-boolean arguments are converted using the following rules:
	 *        	* 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 *        	* 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 *        	Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterByMultiple($multiple = null, $comparison = null) {
		if (is_string ( $multiple )) {
			$multiple = in_array ( strtolower ( $multiple ), array (
					'false',
					'off',
					'-',
					'no',
					'n',
					'0',
					'' 
			) ) ? false : true;
		}
		return $this->addUsingAlias ( SPropertiesPeer::MULTIPLE, $multiple, $comparison );
	}
	
	/**
	 * Filter the query on the active column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActive(true); // WHERE active = true
	 * $query->filterByActive('yes'); // WHERE active = true
	 * </code>
	 *
	 * @param boolean|string $active
	 *        	The value to use as filter.
	 *        	Non-boolean arguments are converted using the following rules:
	 *        	* 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 *        	* 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 *        	Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null) {
		if (is_string ( $active )) {
			$active = in_array ( strtolower ( $active ), array (
					'false',
					'off',
					'-',
					'no',
					'n',
					'0',
					'' 
			) ) ? false : true;
		}
		return $this->addUsingAlias ( SPropertiesPeer::ACTIVE, $active, $comparison );
	}
	
	/**
	 * Filter the query on the show_on_site column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShowOnSite(true); // WHERE show_on_site = true
	 * $query->filterByShowOnSite('yes'); // WHERE show_on_site = true
	 * </code>
	 *
	 * @param boolean|string $showOnSite
	 *        	The value to use as filter.
	 *        	Non-boolean arguments are converted using the following rules:
	 *        	* 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 *        	* 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 *        	Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterByShowOnSite($showOnSite = null, $comparison = null) {
		if (is_string ( $showOnSite )) {
			$show_on_site = in_array ( strtolower ( $showOnSite ), array (
					'false',
					'off',
					'-',
					'no',
					'n',
					'0',
					'' 
			) ) ? false : true;
		}
		return $this->addUsingAlias ( SPropertiesPeer::SHOW_ON_SITE, $showOnSite, $comparison );
	}
	
	/**
	 * Filter the query on the show_in_compare column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShowInCompare(true); // WHERE show_in_compare = true
	 * $query->filterByShowInCompare('yes'); // WHERE show_in_compare = true
	 * </code>
	 *
	 * @param boolean|string $showInCompare
	 *        	The value to use as filter.
	 *        	Non-boolean arguments are converted using the following rules:
	 *        	* 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 *        	* 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 *        	Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterByShowInCompare($showInCompare = null, $comparison = null) {
		if (is_string ( $showInCompare )) {
			$show_in_compare = in_array ( strtolower ( $showInCompare ), array (
					'false',
					'off',
					'-',
					'no',
					'n',
					'0',
					'' 
			) ) ? false : true;
		}
		return $this->addUsingAlias ( SPropertiesPeer::SHOW_IN_COMPARE, $showInCompare, $comparison );
	}
	
	/**
	 * Filter the query on the show_in_filter column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShowInFilter(true); // WHERE show_in_filter = true
	 * $query->filterByShowInFilter('yes'); // WHERE show_in_filter = true
	 * </code>
	 *
	 * @param boolean|string $showInFilter
	 *        	The value to use as filter.
	 *        	Non-boolean arguments are converted using the following rules:
	 *        	* 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 *        	* 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 *        	Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterByShowInFilter($showInFilter = null, $comparison = null) {
		if (is_string ( $showInFilter )) {
			$show_in_filter = in_array ( strtolower ( $showInFilter ), array (
					'false',
					'off',
					'-',
					'no',
					'n',
					'0',
					'' 
			) ) ? false : true;
		}
		return $this->addUsingAlias ( SPropertiesPeer::SHOW_IN_FILTER, $showInFilter, $comparison );
	}
	
	/**
	 * Filter the query on the show_faq column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShowFaq(true); // WHERE show_faq = true
	 * $query->filterByShowFaq('yes'); // WHERE show_faq = true
	 * </code>
	 *
	 * @param boolean|string $showFaq
	 *        	The value to use as filter.
	 *        	Non-boolean arguments are converted using the following rules:
	 *        	* 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 *        	* 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 *        	Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterByShowFaq($showFaq = null, $comparison = null) {
		if (is_string ( $showFaq )) {
			$show_faq = in_array ( strtolower ( $showFaq ), array (
					'false',
					'off',
					'-',
					'no',
					'n',
					'0',
					'' 
			) ) ? false : true;
		}
		return $this->addUsingAlias ( SPropertiesPeer::SHOW_FAQ, $showFaq, $comparison );
	}
	
	/**
	 * Filter the query on the main_property column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMainProperty(true); // WHERE main_property = true
	 * $query->filterByMainProperty('yes'); // WHERE main_property = true
	 * </code>
	 *
	 * @param boolean|string $mainProperty
	 *        	The value to use as filter.
	 *        	Non-boolean arguments are converted using the following rules:
	 *        	* 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 *        	* 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 *        	Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterByMainProperty($mainProperty = null, $comparison = null) {
		if (is_string ( $mainProperty )) {
			$main_property = in_array ( strtolower ( $mainProperty ), array (
					'false',
					'off',
					'-',
					'no',
					'n',
					'0',
					'' 
			) ) ? false : true;
		}
		return $this->addUsingAlias ( SPropertiesPeer::MAIN_PROPERTY, $mainProperty, $comparison );
	}
	
	/**
	 * Filter the query on the position column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPosition(1234); // WHERE position = 1234
	 * $query->filterByPosition(array(12, 34)); // WHERE position IN (12, 34)
	 * $query->filterByPosition(array('min' => 12)); // WHERE position > 12
	 * </code>
	 *
	 * @param mixed $position
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null) {
		if (is_array ( $position )) {
			$useMinMax = false;
			if (isset ( $position ['min'] )) {
				$this->addUsingAlias ( SPropertiesPeer::POSITION, $position ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $position ['max'] )) {
				$this->addUsingAlias ( SPropertiesPeer::POSITION, $position ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SPropertiesPeer::POSITION, $position, $comparison );
	}
	
	/**
	 * Filter the query by a related SPropertiesI18n object
	 *
	 * @param SPropertiesI18n $sPropertiesI18n
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterBySPropertiesI18n($sPropertiesI18n, $comparison = null) {
		if ($sPropertiesI18n instanceof SPropertiesI18n) {
			return $this->addUsingAlias ( SPropertiesPeer::ID, $sPropertiesI18n->getId (), $comparison );
		} elseif ($sPropertiesI18n instanceof PropelCollection) {
			return $this->useSPropertiesI18nQuery ()->filterByPrimaryKeys ( $sPropertiesI18n->getPrimaryKeys () )->endUse ();
		} else {
			throw new PropelException ( 'filterBySPropertiesI18n() only accepts arguments of type SPropertiesI18n or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SPropertiesI18n relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function joinSPropertiesI18n($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SPropertiesI18n' );
		
		// create a ModelJoin object for this join
		$join = new ModelJoin ();
		$join->setJoinType ( $joinType );
		$join->setRelationMap ( $relationMap, $this->useAliasInSQL ? $this->getModelAlias () : null, $relationAlias );
		if ($previousJoin = $this->getPreviousJoin ()) {
			$join->setPreviousJoin ( $previousJoin );
		}
		
		// add the ModelJoin to the current object
		if ($relationAlias) {
			$this->addAlias ( $relationAlias, $relationMap->getRightTable ()->getName () );
			$this->addJoinObject ( $join, $relationAlias );
		} else {
			$this->addJoinObject ( $join, 'SPropertiesI18n' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SPropertiesI18n relation SPropertiesI18n object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SPropertiesI18nQuery A secondary query class using the current class as primary query
	 */
	public function useSPropertiesI18nQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinSPropertiesI18n ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SPropertiesI18n', 'SPropertiesI18nQuery' );
	}
	
	/**
	 * Filter the query by a related ShopProductPropertiesCategories object
	 *
	 * @param ShopProductPropertiesCategories $shopProductPropertiesCategories
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterByShopProductPropertiesCategories($shopProductPropertiesCategories, $comparison = null) {
		if ($shopProductPropertiesCategories instanceof ShopProductPropertiesCategories) {
			return $this->addUsingAlias ( SPropertiesPeer::ID, $shopProductPropertiesCategories->getPropertyId (), $comparison );
		} elseif ($shopProductPropertiesCategories instanceof PropelCollection) {
			return $this->useShopProductPropertiesCategoriesQuery ()->filterByPrimaryKeys ( $shopProductPropertiesCategories->getPrimaryKeys () )->endUse ();
		} else {
			throw new PropelException ( 'filterByShopProductPropertiesCategories() only accepts arguments of type ShopProductPropertiesCategories or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the ShopProductPropertiesCategories relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function joinShopProductPropertiesCategories($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'ShopProductPropertiesCategories' );
		
		// create a ModelJoin object for this join
		$join = new ModelJoin ();
		$join->setJoinType ( $joinType );
		$join->setRelationMap ( $relationMap, $this->useAliasInSQL ? $this->getModelAlias () : null, $relationAlias );
		if ($previousJoin = $this->getPreviousJoin ()) {
			$join->setPreviousJoin ( $previousJoin );
		}
		
		// add the ModelJoin to the current object
		if ($relationAlias) {
			$this->addAlias ( $relationAlias, $relationMap->getRightTable ()->getName () );
			$this->addJoinObject ( $join, $relationAlias );
		} else {
			$this->addJoinObject ( $join, 'ShopProductPropertiesCategories' );
		}
		
		return $this;
	}
	
	/**
	 * Use the ShopProductPropertiesCategories relation ShopProductPropertiesCategories object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return ShopProductPropertiesCategoriesQuery A secondary query class using the current class as primary query
	 */
	public function useShopProductPropertiesCategoriesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinShopProductPropertiesCategories ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'ShopProductPropertiesCategories', 'ShopProductPropertiesCategoriesQuery' );
	}
	
	/**
	 * Filter the query by a related SProductPropertiesData object
	 *
	 * @param SProductPropertiesData $sProductPropertiesData
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterBySProductPropertiesData($sProductPropertiesData, $comparison = null) {
		if ($sProductPropertiesData instanceof SProductPropertiesData) {
			return $this->addUsingAlias ( SPropertiesPeer::ID, $sProductPropertiesData->getPropertyId (), $comparison );
		} elseif ($sProductPropertiesData instanceof PropelCollection) {
			return $this->useSProductPropertiesDataQuery ()->filterByPrimaryKeys ( $sProductPropertiesData->getPrimaryKeys () )->endUse ();
		} else {
			throw new PropelException ( 'filterBySProductPropertiesData() only accepts arguments of type SProductPropertiesData or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SProductPropertiesData relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function joinSProductPropertiesData($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SProductPropertiesData' );
		
		// create a ModelJoin object for this join
		$join = new ModelJoin ();
		$join->setJoinType ( $joinType );
		$join->setRelationMap ( $relationMap, $this->useAliasInSQL ? $this->getModelAlias () : null, $relationAlias );
		if ($previousJoin = $this->getPreviousJoin ()) {
			$join->setPreviousJoin ( $previousJoin );
		}
		
		// add the ModelJoin to the current object
		if ($relationAlias) {
			$this->addAlias ( $relationAlias, $relationMap->getRightTable ()->getName () );
			$this->addJoinObject ( $join, $relationAlias );
		} else {
			$this->addJoinObject ( $join, 'SProductPropertiesData' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SProductPropertiesData relation SProductPropertiesData object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SProductPropertiesDataQuery A secondary query class using the current class as primary query
	 */
	public function useSProductPropertiesDataQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		return $this->joinSProductPropertiesData ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SProductPropertiesData', 'SProductPropertiesDataQuery' );
	}
	
	/**
	 * Filter the query by a related SCategory object
	 * using the shop_product_properties_categories table as cross reference
	 *
	 * @param SCategory $sCategory
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function filterByPropertyCategory($sCategory, $comparison = Criteria::EQUAL) {
		return $this->useShopProductPropertiesCategoriesQuery ()->filterByPropertyCategory ( $sCategory, $comparison )->endUse ();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param SProperties $sProperties
	 *        	Object to remove from the list of results
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function prune($sProperties = null) {
		if ($sProperties) {
			$this->addUsingAlias ( SPropertiesPeer::ID, $sProperties->getId (), Criteria::NOT_EQUAL );
		}
		
		return $this;
	}
	
	// i18n behavior
	
	/**
	 * Adds a JOIN clause to the query using the i18n relation
	 *
	 * @param string $locale
	 *        	Locale to use for the join condition, e.g. 'fr_FR'
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function joinI18n($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		$relationName = $relationAlias ? $relationAlias : 'SPropertiesI18n';
		return $this->joinSPropertiesI18n ( $relationAlias, $joinType )->addJoinCondition ( $relationName, $relationName . '.Locale = ?', $locale );
	}
	
	/**
	 * Adds a JOIN clause to the query and hydrates the related I18n object.
	 * Shortcut for $c->joinI18n($locale)->with()
	 *
	 * @param string $locale
	 *        	Locale to use for the join condition, e.g. 'fr_FR'
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
	 *        	
	 * @return SPropertiesQuery The current query, for fluid interface
	 */
	public function joinWithI18n($locale = 'ru', $joinType = Criteria::LEFT_JOIN) {
		$this->joinI18n ( $locale, null, $joinType )->with ( 'SPropertiesI18n' );
		$this->with ['SPropertiesI18n']->setIsWithOneToMany ( false );
		return $this;
	}
	
	/**
	 * Use the I18n relation query object
	 *
	 * @see useQuery()
	 *
	 * @param string $locale
	 *        	Locale to use for the join condition, e.g. 'fr_FR'
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
	 *        	
	 * @return SPropertiesI18nQuery A secondary query class using the current class as primary query
	 */
	public function useI18nQuery($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		return $this->joinI18n ( $locale, $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SPropertiesI18n', 'SPropertiesI18nQuery' );
	}
} // BaseSPropertiesQuery