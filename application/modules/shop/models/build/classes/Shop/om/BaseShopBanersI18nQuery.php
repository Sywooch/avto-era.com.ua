<?php

/**
 * Base class that represents a query for the 'shop_banners_i18n' table.
 *
 * 
 *
 * @method     ShopBanersI18nQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ShopBanersI18nQuery orderByLocale($order = Criteria::ASC) Order by the locale column
 * @method     ShopBanersI18nQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ShopBanersI18nQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method     ShopBanersI18nQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ShopBanersI18nQuery orderByImage($order = Criteria::ASC) Order by the image column
 *
 * @method     ShopBanersI18nQuery groupById() Group by the id column
 * @method     ShopBanersI18nQuery groupByLocale() Group by the locale column
 * @method     ShopBanersI18nQuery groupByName() Group by the name column
 * @method     ShopBanersI18nQuery groupByText() Group by the text column
 * @method     ShopBanersI18nQuery groupByUrl() Group by the url column
 * @method     ShopBanersI18nQuery groupByImage() Group by the image column
 *
 * @method     ShopBanersI18nQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ShopBanersI18nQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ShopBanersI18nQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ShopBanersI18nQuery leftJoinShopBaners($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShopBaners relation
 * @method     ShopBanersI18nQuery rightJoinShopBaners($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShopBaners relation
 * @method     ShopBanersI18nQuery innerJoinShopBaners($relationAlias = null) Adds a INNER JOIN clause to the query using the ShopBaners relation
 *
 * @method     ShopBanersI18n findOne(PropelPDO $con = null) Return the first ShopBanersI18n matching the query
 * @method     ShopBanersI18n findOneOrCreate(PropelPDO $con = null) Return the first ShopBanersI18n matching the query, or a new ShopBanersI18n object populated from the query conditions when no match is found
 *
 * @method     ShopBanersI18n findOneById(int $id) Return the first ShopBanersI18n filtered by the id column
 * @method     ShopBanersI18n findOneByLocale(string $locale) Return the first ShopBanersI18n filtered by the locale column
 * @method     ShopBanersI18n findOneByName(string $name) Return the first ShopBanersI18n filtered by the name column
 * @method     ShopBanersI18n findOneByText(string $text) Return the first ShopBanersI18n filtered by the text column
 * @method     ShopBanersI18n findOneByUrl(string $url) Return the first ShopBanersI18n filtered by the url column
 * @method     ShopBanersI18n findOneByImage(string $image) Return the first ShopBanersI18n filtered by the image column
 *
 * @method     array findById(int $id) Return ShopBanersI18n objects filtered by the id column
 * @method     array findByLocale(string $locale) Return ShopBanersI18n objects filtered by the locale column
 * @method     array findByName(string $name) Return ShopBanersI18n objects filtered by the name column
 * @method     array findByText(string $text) Return ShopBanersI18n objects filtered by the text column
 * @method     array findByUrl(string $url) Return ShopBanersI18n objects filtered by the url column
 * @method     array findByImage(string $image) Return ShopBanersI18n objects filtered by the image column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseShopBanersI18nQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseShopBanersI18nQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'ShopBanersI18n', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new ShopBanersI18nQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return ShopBanersI18nQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof ShopBanersI18nQuery) {
			return $criteria;
		}
		$query = new ShopBanersI18nQuery ();
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
	 * @param array[$id, $locale]
	 *        	$key Primary key to use for the query
	 * @param PropelPDO $con
	 *        	an optional connection object
	 *        	
	 * @return ShopBanersI18n|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ShopBanersI18nPeer::getInstanceFromPool ( serialize ( array (
				( string ) $key [0],
				( string ) $key [1] 
		) ) ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( ShopBanersI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return ShopBanersI18n A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `ID`, `LOCALE`, `NAME`, `TEXT`, `URL`, `IMAGE` FROM `shop_banners_i18n` WHERE `ID` = :p0 AND `LOCALE` = :p1';
		try {
			$stmt = $con->prepare ( $sql );
			$stmt->bindValue ( ':p0', $key [0], PDO::PARAM_INT );
			$stmt->bindValue ( ':p1', $key [1], PDO::PARAM_STR );
			$stmt->execute ();
		} catch ( Exception $e ) {
			Propel::log ( $e->getMessage (), Propel::LOG_ERR );
			throw new PropelException ( sprintf ( 'Unable to execute SELECT statement [%s]', $sql ), $e );
		}
		$obj = null;
		if ($row = $stmt->fetch ( PDO::FETCH_NUM )) {
			$obj = new ShopBanersI18n ();
			$obj->hydrate ( $row );
			ShopBanersI18nPeer::addInstanceToPool ( $obj, serialize ( array (
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
	 * @return ShopBanersI18n|array|mixed the result, formatted by the current formatter
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
	 * @return ShopBanersI18nQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		$this->addUsingAlias ( ShopBanersI18nPeer::ID, $key [0], Criteria::EQUAL );
		$this->addUsingAlias ( ShopBanersI18nPeer::LOCALE, $key [1], Criteria::EQUAL );
		
		return $this;
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return ShopBanersI18nQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		if (empty ( $keys )) {
			return $this->add ( null, '1<>1', Criteria::CUSTOM );
		}
		foreach ( $keys as $key ) {
			$cton0 = $this->getNewCriterion ( ShopBanersI18nPeer::ID, $key [0], Criteria::EQUAL );
			$cton1 = $this->getNewCriterion ( ShopBanersI18nPeer::LOCALE, $key [1], Criteria::EQUAL );
			$cton0->addAnd ( $cton1 );
			$this->addOr ( $cton0 );
		}
		
		return $this;
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
	 * @see filterByShopBaners()
	 *
	 * @param mixed $id
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopBanersI18nQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null) {
		if (is_array ( $id ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( ShopBanersI18nPeer::ID, $id, $comparison );
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
	 * @return ShopBanersI18nQuery The current query, for fluid interface
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
		return $this->addUsingAlias ( ShopBanersI18nPeer::LOCALE, $locale, $comparison );
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
	 * @return ShopBanersI18nQuery The current query, for fluid interface
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
		return $this->addUsingAlias ( ShopBanersI18nPeer::NAME, $name, $comparison );
	}
	
	/**
	 * Filter the query on the text column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByText('fooValue'); // WHERE text = 'fooValue'
	 * $query->filterByText('%fooValue%'); // WHERE text LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $text
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopBanersI18nQuery The current query, for fluid interface
	 */
	public function filterByText($text = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $text )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $text )) {
				$text = str_replace ( '*', '%', $text );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( ShopBanersI18nPeer::TEXT, $text, $comparison );
	}
	
	/**
	 * Filter the query on the url column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUrl('fooValue'); // WHERE url = 'fooValue'
	 * $query->filterByUrl('%fooValue%'); // WHERE url LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $url
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopBanersI18nQuery The current query, for fluid interface
	 */
	public function filterByUrl($url = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $url )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $url )) {
				$url = str_replace ( '*', '%', $url );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( ShopBanersI18nPeer::URL, $url, $comparison );
	}
	
	/**
	 * Filter the query on the image column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByImage('fooValue'); // WHERE image = 'fooValue'
	 * $query->filterByImage('%fooValue%'); // WHERE image LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $image
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopBanersI18nQuery The current query, for fluid interface
	 */
	public function filterByImage($image = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $image )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $image )) {
				$image = str_replace ( '*', '%', $image );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( ShopBanersI18nPeer::IMAGE, $image, $comparison );
	}
	
	/**
	 * Filter the query by a related ShopBaners object
	 *
	 * @param ShopBaners|PropelCollection $shopBaners
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopBanersI18nQuery The current query, for fluid interface
	 */
	public function filterByShopBaners($shopBaners, $comparison = null) {
		if ($shopBaners instanceof ShopBaners) {
			return $this->addUsingAlias ( ShopBanersI18nPeer::ID, $shopBaners->getId (), $comparison );
		} elseif ($shopBaners instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( ShopBanersI18nPeer::ID, $shopBaners->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
		} else {
			throw new PropelException ( 'filterByShopBaners() only accepts arguments of type ShopBaners or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the ShopBaners relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return ShopBanersI18nQuery The current query, for fluid interface
	 */
	public function joinShopBaners($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'ShopBaners' );
		
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
			$this->addJoinObject ( $join, 'ShopBaners' );
		}
		
		return $this;
	}
	
	/**
	 * Use the ShopBaners relation ShopBaners object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return ShopBanersQuery A secondary query class using the current class as primary query
	 */
	public function useShopBanersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinShopBaners ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'ShopBaners', 'ShopBanersQuery' );
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param ShopBanersI18n $shopBanersI18n
	 *        	Object to remove from the list of results
	 *        	
	 * @return ShopBanersI18nQuery The current query, for fluid interface
	 */
	public function prune($shopBanersI18n = null) {
		if ($shopBanersI18n) {
			$this->addCond ( 'pruneCond0', $this->getAliasedColName ( ShopBanersI18nPeer::ID ), $shopBanersI18n->getId (), Criteria::NOT_EQUAL );
			$this->addCond ( 'pruneCond1', $this->getAliasedColName ( ShopBanersI18nPeer::LOCALE ), $shopBanersI18n->getLocale (), Criteria::NOT_EQUAL );
			$this->combine ( array (
					'pruneCond0',
					'pruneCond1' 
			), Criteria::LOGICAL_OR );
		}
		
		return $this;
	}
} // BaseShopBanersI18nQuery