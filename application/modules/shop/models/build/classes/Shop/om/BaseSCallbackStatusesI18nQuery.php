<?php

/**
 * Base class that represents a query for the 'shop_callbacks_statuses_i18n' table.
 *
 * 
 *
 * @method     SCallbackStatusesI18nQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SCallbackStatusesI18nQuery orderByLocale($order = Criteria::ASC) Order by the locale column
 * @method     SCallbackStatusesI18nQuery orderByText($order = Criteria::ASC) Order by the text column
 *
 * @method     SCallbackStatusesI18nQuery groupById() Group by the id column
 * @method     SCallbackStatusesI18nQuery groupByLocale() Group by the locale column
 * @method     SCallbackStatusesI18nQuery groupByText() Group by the text column
 *
 * @method     SCallbackStatusesI18nQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SCallbackStatusesI18nQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SCallbackStatusesI18nQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SCallbackStatusesI18nQuery leftJoinSCallbackStatuses($relationAlias = null) Adds a LEFT JOIN clause to the query using the SCallbackStatuses relation
 * @method     SCallbackStatusesI18nQuery rightJoinSCallbackStatuses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SCallbackStatuses relation
 * @method     SCallbackStatusesI18nQuery innerJoinSCallbackStatuses($relationAlias = null) Adds a INNER JOIN clause to the query using the SCallbackStatuses relation
 *
 * @method     SCallbackStatusesI18n findOne(PropelPDO $con = null) Return the first SCallbackStatusesI18n matching the query
 * @method     SCallbackStatusesI18n findOneOrCreate(PropelPDO $con = null) Return the first SCallbackStatusesI18n matching the query, or a new SCallbackStatusesI18n object populated from the query conditions when no match is found
 *
 * @method     SCallbackStatusesI18n findOneById(int $id) Return the first SCallbackStatusesI18n filtered by the id column
 * @method     SCallbackStatusesI18n findOneByLocale(string $locale) Return the first SCallbackStatusesI18n filtered by the locale column
 * @method     SCallbackStatusesI18n findOneByText(string $text) Return the first SCallbackStatusesI18n filtered by the text column
 *
 * @method     array findById(int $id) Return SCallbackStatusesI18n objects filtered by the id column
 * @method     array findByLocale(string $locale) Return SCallbackStatusesI18n objects filtered by the locale column
 * @method     array findByText(string $text) Return SCallbackStatusesI18n objects filtered by the text column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSCallbackStatusesI18nQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseSCallbackStatusesI18nQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SCallbackStatusesI18n', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new SCallbackStatusesI18nQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return SCallbackStatusesI18nQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof SCallbackStatusesI18nQuery) {
			return $criteria;
		}
		$query = new SCallbackStatusesI18nQuery ();
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
	 * @return SCallbackStatusesI18n|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SCallbackStatusesI18nPeer::getInstanceFromPool ( serialize ( array (
				( string ) $key [0],
				( string ) $key [1] 
		) ) ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( SCallbackStatusesI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return SCallbackStatusesI18n A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `ID`, `LOCALE`, `TEXT` FROM `shop_callbacks_statuses_i18n` WHERE `ID` = :p0 AND `LOCALE` = :p1';
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
			$obj = new SCallbackStatusesI18n ();
			$obj->hydrate ( $row );
			SCallbackStatusesI18nPeer::addInstanceToPool ( $obj, serialize ( array (
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
	 * @return SCallbackStatusesI18n|array|mixed the result, formatted by the current formatter
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
	 * @return SCallbackStatusesI18nQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		$this->addUsingAlias ( SCallbackStatusesI18nPeer::ID, $key [0], Criteria::EQUAL );
		$this->addUsingAlias ( SCallbackStatusesI18nPeer::LOCALE, $key [1], Criteria::EQUAL );
		
		return $this;
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return SCallbackStatusesI18nQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		if (empty ( $keys )) {
			return $this->add ( null, '1<>1', Criteria::CUSTOM );
		}
		foreach ( $keys as $key ) {
			$cton0 = $this->getNewCriterion ( SCallbackStatusesI18nPeer::ID, $key [0], Criteria::EQUAL );
			$cton1 = $this->getNewCriterion ( SCallbackStatusesI18nPeer::LOCALE, $key [1], Criteria::EQUAL );
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
	 * @see filterBySCallbackStatuses()
	 *
	 * @param mixed $id
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCallbackStatusesI18nQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null) {
		if (is_array ( $id ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( SCallbackStatusesI18nPeer::ID, $id, $comparison );
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
	 * @return SCallbackStatusesI18nQuery The current query, for fluid interface
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
		return $this->addUsingAlias ( SCallbackStatusesI18nPeer::LOCALE, $locale, $comparison );
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
	 * @return SCallbackStatusesI18nQuery The current query, for fluid interface
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
		return $this->addUsingAlias ( SCallbackStatusesI18nPeer::TEXT, $text, $comparison );
	}
	
	/**
	 * Filter the query by a related SCallbackStatuses object
	 *
	 * @param SCallbackStatuses|PropelCollection $sCallbackStatuses
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCallbackStatusesI18nQuery The current query, for fluid interface
	 */
	public function filterBySCallbackStatuses($sCallbackStatuses, $comparison = null) {
		if ($sCallbackStatuses instanceof SCallbackStatuses) {
			return $this->addUsingAlias ( SCallbackStatusesI18nPeer::ID, $sCallbackStatuses->getId (), $comparison );
		} elseif ($sCallbackStatuses instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( SCallbackStatusesI18nPeer::ID, $sCallbackStatuses->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
		} else {
			throw new PropelException ( 'filterBySCallbackStatuses() only accepts arguments of type SCallbackStatuses or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SCallbackStatuses relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SCallbackStatusesI18nQuery The current query, for fluid interface
	 */
	public function joinSCallbackStatuses($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SCallbackStatuses' );
		
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
			$this->addJoinObject ( $join, 'SCallbackStatuses' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SCallbackStatuses relation SCallbackStatuses object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SCallbackStatusesQuery A secondary query class using the current class as primary query
	 */
	public function useSCallbackStatusesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinSCallbackStatuses ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SCallbackStatuses', 'SCallbackStatusesQuery' );
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param SCallbackStatusesI18n $sCallbackStatusesI18n
	 *        	Object to remove from the list of results
	 *        	
	 * @return SCallbackStatusesI18nQuery The current query, for fluid interface
	 */
	public function prune($sCallbackStatusesI18n = null) {
		if ($sCallbackStatusesI18n) {
			$this->addCond ( 'pruneCond0', $this->getAliasedColName ( SCallbackStatusesI18nPeer::ID ), $sCallbackStatusesI18n->getId (), Criteria::NOT_EQUAL );
			$this->addCond ( 'pruneCond1', $this->getAliasedColName ( SCallbackStatusesI18nPeer::LOCALE ), $sCallbackStatusesI18n->getLocale (), Criteria::NOT_EQUAL );
			$this->combine ( array (
					'pruneCond0',
					'pruneCond1' 
			), Criteria::LOGICAL_OR );
		}
		
		return $this;
	}
} // BaseSCallbackStatusesI18nQuery