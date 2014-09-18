<?php


/**
 * Base class that represents a query for the 'shop_orders_status_history' table.
 *
 * 
 *
 * @method     SOrderStatusHistoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SOrderStatusHistoryQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     SOrderStatusHistoryQuery orderByStatusId($order = Criteria::ASC) Order by the status_id column
 * @method     SOrderStatusHistoryQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     SOrderStatusHistoryQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 * @method     SOrderStatusHistoryQuery orderByComment($order = Criteria::ASC) Order by the comment column
 *
 * @method     SOrderStatusHistoryQuery groupById() Group by the id column
 * @method     SOrderStatusHistoryQuery groupByOrderId() Group by the order_id column
 * @method     SOrderStatusHistoryQuery groupByStatusId() Group by the status_id column
 * @method     SOrderStatusHistoryQuery groupByUserId() Group by the user_id column
 * @method     SOrderStatusHistoryQuery groupByDateCreated() Group by the date_created column
 * @method     SOrderStatusHistoryQuery groupByComment() Group by the comment column
 *
 * @method     SOrderStatusHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SOrderStatusHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SOrderStatusHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SOrderStatusHistoryQuery leftJoinSOrders($relationAlias = null) Adds a LEFT JOIN clause to the query using the SOrders relation
 * @method     SOrderStatusHistoryQuery rightJoinSOrders($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SOrders relation
 * @method     SOrderStatusHistoryQuery innerJoinSOrders($relationAlias = null) Adds a INNER JOIN clause to the query using the SOrders relation
 *
 * @method     SOrderStatusHistoryQuery leftJoinSOrderStatuses($relationAlias = null) Adds a LEFT JOIN clause to the query using the SOrderStatuses relation
 * @method     SOrderStatusHistoryQuery rightJoinSOrderStatuses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SOrderStatuses relation
 * @method     SOrderStatusHistoryQuery innerJoinSOrderStatuses($relationAlias = null) Adds a INNER JOIN clause to the query using the SOrderStatuses relation
 *
 * @method     SOrderStatusHistory findOne(PropelPDO $con = null) Return the first SOrderStatusHistory matching the query
 * @method     SOrderStatusHistory findOneOrCreate(PropelPDO $con = null) Return the first SOrderStatusHistory matching the query, or a new SOrderStatusHistory object populated from the query conditions when no match is found
 *
 * @method     SOrderStatusHistory findOneById(int $id) Return the first SOrderStatusHistory filtered by the id column
 * @method     SOrderStatusHistory findOneByOrderId(int $order_id) Return the first SOrderStatusHistory filtered by the order_id column
 * @method     SOrderStatusHistory findOneByStatusId(int $status_id) Return the first SOrderStatusHistory filtered by the status_id column
 * @method     SOrderStatusHistory findOneByUserId(int $user_id) Return the first SOrderStatusHistory filtered by the user_id column
 * @method     SOrderStatusHistory findOneByDateCreated(int $date_created) Return the first SOrderStatusHistory filtered by the date_created column
 * @method     SOrderStatusHistory findOneByComment(string $comment) Return the first SOrderStatusHistory filtered by the comment column
 *
 * @method     array findById(int $id) Return SOrderStatusHistory objects filtered by the id column
 * @method     array findByOrderId(int $order_id) Return SOrderStatusHistory objects filtered by the order_id column
 * @method     array findByStatusId(int $status_id) Return SOrderStatusHistory objects filtered by the status_id column
 * @method     array findByUserId(int $user_id) Return SOrderStatusHistory objects filtered by the user_id column
 * @method     array findByDateCreated(int $date_created) Return SOrderStatusHistory objects filtered by the date_created column
 * @method     array findByComment(string $comment) Return SOrderStatusHistory objects filtered by the comment column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSOrderStatusHistoryQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSOrderStatusHistoryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SOrderStatusHistory', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SOrderStatusHistoryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SOrderStatusHistoryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SOrderStatusHistoryQuery) {
			return $criteria;
		}
		$query = new SOrderStatusHistoryQuery();
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
	 * @return    SOrderStatusHistory|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SOrderStatusHistoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SOrderStatusHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    SOrderStatusHistory A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ORDER_ID`, `STATUS_ID`, `USER_ID`, `DATE_CREATED`, `COMMENT` FROM `shop_orders_status_history` WHERE `ID` = :p0';
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
			$obj = new SOrderStatusHistory();
			$obj->hydrate($row);
			SOrderStatusHistoryPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    SOrderStatusHistory|array|mixed the result, formatted by the current formatter
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
	 * @return    SOrderStatusHistoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SOrderStatusHistoryPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SOrderStatusHistoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SOrderStatusHistoryPeer::ID, $keys, Criteria::IN);
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
	 * @return    SOrderStatusHistoryQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SOrderStatusHistoryPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the order_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrderId(1234); // WHERE order_id = 1234
	 * $query->filterByOrderId(array(12, 34)); // WHERE order_id IN (12, 34)
	 * $query->filterByOrderId(array('min' => 12)); // WHERE order_id > 12
	 * </code>
	 *
	 * @see       filterBySOrders()
	 *
	 * @param     mixed $orderId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrderStatusHistoryQuery The current query, for fluid interface
	 */
	public function filterByOrderId($orderId = null, $comparison = null)
	{
		if (is_array($orderId)) {
			$useMinMax = false;
			if (isset($orderId['min'])) {
				$this->addUsingAlias(SOrderStatusHistoryPeer::ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orderId['max'])) {
				$this->addUsingAlias(SOrderStatusHistoryPeer::ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrderStatusHistoryPeer::ORDER_ID, $orderId, $comparison);
	}

	/**
	 * Filter the query on the status_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStatusId(1234); // WHERE status_id = 1234
	 * $query->filterByStatusId(array(12, 34)); // WHERE status_id IN (12, 34)
	 * $query->filterByStatusId(array('min' => 12)); // WHERE status_id > 12
	 * </code>
	 *
	 * @see       filterBySOrderStatuses()
	 *
	 * @param     mixed $statusId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrderStatusHistoryQuery The current query, for fluid interface
	 */
	public function filterByStatusId($statusId = null, $comparison = null)
	{
		if (is_array($statusId)) {
			$useMinMax = false;
			if (isset($statusId['min'])) {
				$this->addUsingAlias(SOrderStatusHistoryPeer::STATUS_ID, $statusId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($statusId['max'])) {
				$this->addUsingAlias(SOrderStatusHistoryPeer::STATUS_ID, $statusId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrderStatusHistoryPeer::STATUS_ID, $statusId, $comparison);
	}

	/**
	 * Filter the query on the user_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserId(1234); // WHERE user_id = 1234
	 * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
	 * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
	 * </code>
	 *
	 * @param     mixed $userId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrderStatusHistoryQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId)) {
			$useMinMax = false;
			if (isset($userId['min'])) {
				$this->addUsingAlias(SOrderStatusHistoryPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userId['max'])) {
				$this->addUsingAlias(SOrderStatusHistoryPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrderStatusHistoryPeer::USER_ID, $userId, $comparison);
	}

	/**
	 * Filter the query on the date_created column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDateCreated(1234); // WHERE date_created = 1234
	 * $query->filterByDateCreated(array(12, 34)); // WHERE date_created IN (12, 34)
	 * $query->filterByDateCreated(array('min' => 12)); // WHERE date_created > 12
	 * </code>
	 *
	 * @param     mixed $dateCreated The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrderStatusHistoryQuery The current query, for fluid interface
	 */
	public function filterByDateCreated($dateCreated = null, $comparison = null)
	{
		if (is_array($dateCreated)) {
			$useMinMax = false;
			if (isset($dateCreated['min'])) {
				$this->addUsingAlias(SOrderStatusHistoryPeer::DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateCreated['max'])) {
				$this->addUsingAlias(SOrderStatusHistoryPeer::DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrderStatusHistoryPeer::DATE_CREATED, $dateCreated, $comparison);
	}

	/**
	 * Filter the query on the comment column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
	 * $query->filterByComment('%fooValue%'); // WHERE comment LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $comment The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrderStatusHistoryQuery The current query, for fluid interface
	 */
	public function filterByComment($comment = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($comment)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $comment)) {
				$comment = str_replace('*', '%', $comment);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SOrderStatusHistoryPeer::COMMENT, $comment, $comparison);
	}

	/**
	 * Filter the query by a related SOrders object
	 *
	 * @param     SOrders|PropelCollection $sOrders The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrderStatusHistoryQuery The current query, for fluid interface
	 */
	public function filterBySOrders($sOrders, $comparison = null)
	{
		if ($sOrders instanceof SOrders) {
			return $this
				->addUsingAlias(SOrderStatusHistoryPeer::ORDER_ID, $sOrders->getId(), $comparison);
		} elseif ($sOrders instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SOrderStatusHistoryPeer::ORDER_ID, $sOrders->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    SOrderStatusHistoryQuery The current query, for fluid interface
	 */
	public function joinSOrders($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useSOrdersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSOrders($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SOrders', 'SOrdersQuery');
	}

	/**
	 * Filter the query by a related SOrderStatuses object
	 *
	 * @param     SOrderStatuses|PropelCollection $sOrderStatuses The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrderStatusHistoryQuery The current query, for fluid interface
	 */
	public function filterBySOrderStatuses($sOrderStatuses, $comparison = null)
	{
		if ($sOrderStatuses instanceof SOrderStatuses) {
			return $this
				->addUsingAlias(SOrderStatusHistoryPeer::STATUS_ID, $sOrderStatuses->getId(), $comparison);
		} elseif ($sOrderStatuses instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SOrderStatusHistoryPeer::STATUS_ID, $sOrderStatuses->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySOrderStatuses() only accepts arguments of type SOrderStatuses or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SOrderStatuses relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SOrderStatusHistoryQuery The current query, for fluid interface
	 */
	public function joinSOrderStatuses($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SOrderStatuses');

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
			$this->addJoinObject($join, 'SOrderStatuses');
		}

		return $this;
	}

	/**
	 * Use the SOrderStatuses relation SOrderStatuses object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SOrderStatusesQuery A secondary query class using the current class as primary query
	 */
	public function useSOrderStatusesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSOrderStatuses($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SOrderStatuses', 'SOrderStatusesQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SOrderStatusHistory $sOrderStatusHistory Object to remove from the list of results
	 *
	 * @return    SOrderStatusHistoryQuery The current query, for fluid interface
	 */
	public function prune($sOrderStatusHistory = null)
	{
		if ($sOrderStatusHistory) {
			$this->addUsingAlias(SOrderStatusHistoryPeer::ID, $sOrderStatusHistory->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseSOrderStatusHistoryQuery