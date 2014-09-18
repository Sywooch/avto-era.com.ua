<?php


/**
 * Base class that represents a query for the 'shop_order_statuses' table.
 *
 * 
 *
 * @method     SOrderStatusesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SOrderStatusesQuery orderByPosition($order = Criteria::ASC) Order by the position column
 *
 * @method     SOrderStatusesQuery groupById() Group by the id column
 * @method     SOrderStatusesQuery groupByPosition() Group by the position column
 *
 * @method     SOrderStatusesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SOrderStatusesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SOrderStatusesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SOrderStatusesQuery leftJoinSOrderStatusesI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the SOrderStatusesI18n relation
 * @method     SOrderStatusesQuery rightJoinSOrderStatusesI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SOrderStatusesI18n relation
 * @method     SOrderStatusesQuery innerJoinSOrderStatusesI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the SOrderStatusesI18n relation
 *
 * @method     SOrderStatusesQuery leftJoinSOrders($relationAlias = null) Adds a LEFT JOIN clause to the query using the SOrders relation
 * @method     SOrderStatusesQuery rightJoinSOrders($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SOrders relation
 * @method     SOrderStatusesQuery innerJoinSOrders($relationAlias = null) Adds a INNER JOIN clause to the query using the SOrders relation
 *
 * @method     SOrderStatusesQuery leftJoinSOrderStatusHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the SOrderStatusHistory relation
 * @method     SOrderStatusesQuery rightJoinSOrderStatusHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SOrderStatusHistory relation
 * @method     SOrderStatusesQuery innerJoinSOrderStatusHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the SOrderStatusHistory relation
 *
 * @method     SOrderStatuses findOne(PropelPDO $con = null) Return the first SOrderStatuses matching the query
 * @method     SOrderStatuses findOneOrCreate(PropelPDO $con = null) Return the first SOrderStatuses matching the query, or a new SOrderStatuses object populated from the query conditions when no match is found
 *
 * @method     SOrderStatuses findOneById(int $id) Return the first SOrderStatuses filtered by the id column
 * @method     SOrderStatuses findOneByPosition(int $position) Return the first SOrderStatuses filtered by the position column
 *
 * @method     array findById(int $id) Return SOrderStatuses objects filtered by the id column
 * @method     array findByPosition(int $position) Return SOrderStatuses objects filtered by the position column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSOrderStatusesQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSOrderStatusesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SOrderStatuses', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SOrderStatusesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SOrderStatusesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SOrderStatusesQuery) {
			return $criteria;
		}
		$query = new SOrderStatusesQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    SOrderStatuses|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SOrderStatusesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SOrderStatusesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    SOrderStatuses A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `POSITION` FROM `shop_order_statuses` WHERE `ID` = :p0';
		try {
			$stmt = $con->prepare($sql);			
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new SOrderStatuses();
			$obj->hydrate($row);
			SOrderStatusesPeer::addInstanceToPool($obj, (string) $key);
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    SOrderStatuses|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    SOrderStatusesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SOrderStatusesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SOrderStatusesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SOrderStatusesPeer::ID, $keys, Criteria::IN);
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
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrderStatusesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SOrderStatusesPeer::ID, $id, $comparison);
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
	 * @param     mixed $position The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrderStatusesQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null)
	{
		if (is_array($position)) {
			$useMinMax = false;
			if (isset($position['min'])) {
				$this->addUsingAlias(SOrderStatusesPeer::POSITION, $position['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($position['max'])) {
				$this->addUsingAlias(SOrderStatusesPeer::POSITION, $position['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrderStatusesPeer::POSITION, $position, $comparison);
	}

	/**
	 * Filter the query by a related SOrderStatusesI18n object
	 *
	 * @param     SOrderStatusesI18n $sOrderStatusesI18n  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrderStatusesQuery The current query, for fluid interface
	 */
	public function filterBySOrderStatusesI18n($sOrderStatusesI18n, $comparison = null)
	{
		if ($sOrderStatusesI18n instanceof SOrderStatusesI18n) {
			return $this
				->addUsingAlias(SOrderStatusesPeer::ID, $sOrderStatusesI18n->getId(), $comparison);
		} elseif ($sOrderStatusesI18n instanceof PropelCollection) {
			return $this
				->useSOrderStatusesI18nQuery()
				->filterByPrimaryKeys($sOrderStatusesI18n->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySOrderStatusesI18n() only accepts arguments of type SOrderStatusesI18n or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SOrderStatusesI18n relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SOrderStatusesQuery The current query, for fluid interface
	 */
	public function joinSOrderStatusesI18n($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SOrderStatusesI18n');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'SOrderStatusesI18n');
		}

		return $this;
	}

	/**
	 * Use the SOrderStatusesI18n relation SOrderStatusesI18n object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SOrderStatusesI18nQuery A secondary query class using the current class as primary query
	 */
	public function useSOrderStatusesI18nQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSOrderStatusesI18n($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SOrderStatusesI18n', 'SOrderStatusesI18nQuery');
	}

	/**
	 * Filter the query by a related SOrders object
	 *
	 * @param     SOrders $sOrders  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrderStatusesQuery The current query, for fluid interface
	 */
	public function filterBySOrders($sOrders, $comparison = null)
	{
		if ($sOrders instanceof SOrders) {
			return $this
				->addUsingAlias(SOrderStatusesPeer::ID, $sOrders->getStatus(), $comparison);
		} elseif ($sOrders instanceof PropelCollection) {
			return $this
				->useSOrdersQuery()
				->filterByPrimaryKeys($sOrders->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySOrders() only accepts arguments of type SOrders or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SOrders relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SOrderStatusesQuery The current query, for fluid interface
	 */
	public function joinSOrders($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SOrders');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'SOrders');
		}

		return $this;
	}

	/**
	 * Use the SOrders relation SOrders object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SOrdersQuery A secondary query class using the current class as primary query
	 */
	public function useSOrdersQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSOrders($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SOrders', 'SOrdersQuery');
	}

	/**
	 * Filter the query by a related SOrderStatusHistory object
	 *
	 * @param     SOrderStatusHistory $sOrderStatusHistory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrderStatusesQuery The current query, for fluid interface
	 */
	public function filterBySOrderStatusHistory($sOrderStatusHistory, $comparison = null)
	{
		if ($sOrderStatusHistory instanceof SOrderStatusHistory) {
			return $this
				->addUsingAlias(SOrderStatusesPeer::ID, $sOrderStatusHistory->getStatusId(), $comparison);
		} elseif ($sOrderStatusHistory instanceof PropelCollection) {
			return $this
				->useSOrderStatusHistoryQuery()
				->filterByPrimaryKeys($sOrderStatusHistory->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySOrderStatusHistory() only accepts arguments of type SOrderStatusHistory or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SOrderStatusHistory relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SOrderStatusesQuery The current query, for fluid interface
	 */
	public function joinSOrderStatusHistory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SOrderStatusHistory');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'SOrderStatusHistory');
		}

		return $this;
	}

	/**
	 * Use the SOrderStatusHistory relation SOrderStatusHistory object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SOrderStatusHistoryQuery A secondary query class using the current class as primary query
	 */
	public function useSOrderStatusHistoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSOrderStatusHistory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SOrderStatusHistory', 'SOrderStatusHistoryQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SOrderStatuses $sOrderStatuses Object to remove from the list of results
	 *
	 * @return    SOrderStatusesQuery The current query, for fluid interface
	 */
	public function prune($sOrderStatuses = null)
	{
		if ($sOrderStatuses) {
			$this->addUsingAlias(SOrderStatusesPeer::ID, $sOrderStatuses->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	// i18n behavior
	
	/**
	 * Adds a JOIN clause to the query using the i18n relation
	 *
	 * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
	 *
	 * @return    SOrderStatusesQuery The current query, for fluid interface
	 */
	public function joinI18n($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$relationName = $relationAlias ? $relationAlias : 'SOrderStatusesI18n';
		return $this
			->joinSOrderStatusesI18n($relationAlias, $joinType)
			->addJoinCondition($relationName, $relationName . '.Locale = ?', $locale);
	}
	
	/**
	 * Adds a JOIN clause to the query and hydrates the related I18n object.
	 * Shortcut for $c->joinI18n($locale)->with()
	 *
	 * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
	 *
	 * @return    SOrderStatusesQuery The current query, for fluid interface
	 */
	public function joinWithI18n($locale = 'ru', $joinType = Criteria::LEFT_JOIN)
	{
		$this
			->joinI18n($locale, null, $joinType)
			->with('SOrderStatusesI18n');
		$this->with['SOrderStatusesI18n']->setIsWithOneToMany(false);
		return $this;
	}
	
	/**
	 * Use the I18n relation query object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
	 *
	 * @return    SOrderStatusesI18nQuery A secondary query class using the current class as primary query
	 */
	public function useI18nQuery($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinI18n($locale, $relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SOrderStatusesI18n', 'SOrderStatusesI18nQuery');
	}

} // BaseSOrderStatusesQuery