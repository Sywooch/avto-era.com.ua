<?php

/**
 * Base class that represents a query for the 'shop_notification_statuses' table.
 *
 * 
 *
 * @method     SNotificationStatusesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SNotificationStatusesQuery orderByPosition($order = Criteria::ASC) Order by the position column
 *
 * @method     SNotificationStatusesQuery groupById() Group by the id column
 * @method     SNotificationStatusesQuery groupByPosition() Group by the position column
 *
 * @method     SNotificationStatusesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SNotificationStatusesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SNotificationStatusesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SNotificationStatusesQuery leftJoinSNotifications($relationAlias = null) Adds a LEFT JOIN clause to the query using the SNotifications relation
 * @method     SNotificationStatusesQuery rightJoinSNotifications($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SNotifications relation
 * @method     SNotificationStatusesQuery innerJoinSNotifications($relationAlias = null) Adds a INNER JOIN clause to the query using the SNotifications relation
 *
 * @method     SNotificationStatusesQuery leftJoinSNotificationStatusesI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the SNotificationStatusesI18n relation
 * @method     SNotificationStatusesQuery rightJoinSNotificationStatusesI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SNotificationStatusesI18n relation
 * @method     SNotificationStatusesQuery innerJoinSNotificationStatusesI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the SNotificationStatusesI18n relation
 *
 * @method     SNotificationStatuses findOne(PropelPDO $con = null) Return the first SNotificationStatuses matching the query
 * @method     SNotificationStatuses findOneOrCreate(PropelPDO $con = null) Return the first SNotificationStatuses matching the query, or a new SNotificationStatuses object populated from the query conditions when no match is found
 *
 * @method     SNotificationStatuses findOneById(int $id) Return the first SNotificationStatuses filtered by the id column
 * @method     SNotificationStatuses findOneByPosition(int $position) Return the first SNotificationStatuses filtered by the position column
 *
 * @method     array findById(int $id) Return SNotificationStatuses objects filtered by the id column
 * @method     array findByPosition(int $position) Return SNotificationStatuses objects filtered by the position column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSNotificationStatusesQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseSNotificationStatusesQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SNotificationStatuses', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new SNotificationStatusesQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return SNotificationStatusesQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof SNotificationStatusesQuery) {
			return $criteria;
		}
		$query = new SNotificationStatusesQuery ();
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
	 * @return SNotificationStatuses|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SNotificationStatusesPeer::getInstanceFromPool ( ( string ) $key ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( SNotificationStatusesPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return SNotificationStatuses A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `ID`, `POSITION` FROM `shop_notification_statuses` WHERE `ID` = :p0';
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
			$obj = new SNotificationStatuses ();
			$obj->hydrate ( $row );
			SNotificationStatusesPeer::addInstanceToPool ( $obj, ( string ) $key );
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
	 * @return SNotificationStatuses|array|mixed the result, formatted by the current formatter
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
	 * @return SNotificationStatusesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		return $this->addUsingAlias ( SNotificationStatusesPeer::ID, $key, Criteria::EQUAL );
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return SNotificationStatusesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		return $this->addUsingAlias ( SNotificationStatusesPeer::ID, $keys, Criteria::IN );
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
	 * @return SNotificationStatusesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null) {
		if (is_array ( $id ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( SNotificationStatusesPeer::ID, $id, $comparison );
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
	 * @return SNotificationStatusesQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null) {
		if (is_array ( $position )) {
			$useMinMax = false;
			if (isset ( $position ['min'] )) {
				$this->addUsingAlias ( SNotificationStatusesPeer::POSITION, $position ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $position ['max'] )) {
				$this->addUsingAlias ( SNotificationStatusesPeer::POSITION, $position ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SNotificationStatusesPeer::POSITION, $position, $comparison );
	}
	
	/**
	 * Filter the query by a related SNotifications object
	 *
	 * @param SNotifications $sNotifications
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SNotificationStatusesQuery The current query, for fluid interface
	 */
	public function filterBySNotifications($sNotifications, $comparison = null) {
		if ($sNotifications instanceof SNotifications) {
			return $this->addUsingAlias ( SNotificationStatusesPeer::ID, $sNotifications->getStatus (), $comparison );
		} elseif ($sNotifications instanceof PropelCollection) {
			return $this->useSNotificationsQuery ()->filterByPrimaryKeys ( $sNotifications->getPrimaryKeys () )->endUse ();
		} else {
			throw new PropelException ( 'filterBySNotifications() only accepts arguments of type SNotifications or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SNotifications relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SNotificationStatusesQuery The current query, for fluid interface
	 */
	public function joinSNotifications($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SNotifications' );
		
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
			$this->addJoinObject ( $join, 'SNotifications' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SNotifications relation SNotifications object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SNotificationsQuery A secondary query class using the current class as primary query
	 */
	public function useSNotificationsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinSNotifications ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SNotifications', 'SNotificationsQuery' );
	}
	
	/**
	 * Filter the query by a related SNotificationStatusesI18n object
	 *
	 * @param SNotificationStatusesI18n $sNotificationStatusesI18n
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SNotificationStatusesQuery The current query, for fluid interface
	 */
	public function filterBySNotificationStatusesI18n($sNotificationStatusesI18n, $comparison = null) {
		if ($sNotificationStatusesI18n instanceof SNotificationStatusesI18n) {
			return $this->addUsingAlias ( SNotificationStatusesPeer::ID, $sNotificationStatusesI18n->getId (), $comparison );
		} elseif ($sNotificationStatusesI18n instanceof PropelCollection) {
			return $this->useSNotificationStatusesI18nQuery ()->filterByPrimaryKeys ( $sNotificationStatusesI18n->getPrimaryKeys () )->endUse ();
		} else {
			throw new PropelException ( 'filterBySNotificationStatusesI18n() only accepts arguments of type SNotificationStatusesI18n or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SNotificationStatusesI18n relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SNotificationStatusesQuery The current query, for fluid interface
	 */
	public function joinSNotificationStatusesI18n($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SNotificationStatusesI18n' );
		
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
			$this->addJoinObject ( $join, 'SNotificationStatusesI18n' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SNotificationStatusesI18n relation SNotificationStatusesI18n object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SNotificationStatusesI18nQuery A secondary query class using the current class as primary query
	 */
	public function useSNotificationStatusesI18nQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinSNotificationStatusesI18n ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SNotificationStatusesI18n', 'SNotificationStatusesI18nQuery' );
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param SNotificationStatuses $sNotificationStatuses
	 *        	Object to remove from the list of results
	 *        	
	 * @return SNotificationStatusesQuery The current query, for fluid interface
	 */
	public function prune($sNotificationStatuses = null) {
		if ($sNotificationStatuses) {
			$this->addUsingAlias ( SNotificationStatusesPeer::ID, $sNotificationStatuses->getId (), Criteria::NOT_EQUAL );
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
	 * @return SNotificationStatusesQuery The current query, for fluid interface
	 */
	public function joinI18n($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		$relationName = $relationAlias ? $relationAlias : 'SNotificationStatusesI18n';
		return $this->joinSNotificationStatusesI18n ( $relationAlias, $joinType )->addJoinCondition ( $relationName, $relationName . '.Locale = ?', $locale );
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
	 * @return SNotificationStatusesQuery The current query, for fluid interface
	 */
	public function joinWithI18n($locale = 'ru', $joinType = Criteria::LEFT_JOIN) {
		$this->joinI18n ( $locale, null, $joinType )->with ( 'SNotificationStatusesI18n' );
		$this->with ['SNotificationStatusesI18n']->setIsWithOneToMany ( false );
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
	 * @return SNotificationStatusesI18nQuery A secondary query class using the current class as primary query
	 */
	public function useI18nQuery($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		return $this->joinI18n ( $locale, $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SNotificationStatusesI18n', 'SNotificationStatusesI18nQuery' );
	}
} // BaseSNotificationStatusesQuery