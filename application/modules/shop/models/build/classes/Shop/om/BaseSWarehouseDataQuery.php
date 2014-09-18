<?php


/**
 * Base class that represents a query for the 'shop_warehouse_data' table.
 *
 * 
 *
 * @method     SWarehouseDataQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SWarehouseDataQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     SWarehouseDataQuery orderByWarehouseId($order = Criteria::ASC) Order by the warehouse_id column
 * @method     SWarehouseDataQuery orderByCount($order = Criteria::ASC) Order by the count column
 *
 * @method     SWarehouseDataQuery groupById() Group by the id column
 * @method     SWarehouseDataQuery groupByProductId() Group by the product_id column
 * @method     SWarehouseDataQuery groupByWarehouseId() Group by the warehouse_id column
 * @method     SWarehouseDataQuery groupByCount() Group by the count column
 *
 * @method     SWarehouseDataQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SWarehouseDataQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SWarehouseDataQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SWarehouseDataQuery leftJoinSProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProducts relation
 * @method     SWarehouseDataQuery rightJoinSProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProducts relation
 * @method     SWarehouseDataQuery innerJoinSProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SProducts relation
 *
 * @method     SWarehouseDataQuery leftJoinSWarehouses($relationAlias = null) Adds a LEFT JOIN clause to the query using the SWarehouses relation
 * @method     SWarehouseDataQuery rightJoinSWarehouses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SWarehouses relation
 * @method     SWarehouseDataQuery innerJoinSWarehouses($relationAlias = null) Adds a INNER JOIN clause to the query using the SWarehouses relation
 *
 * @method     SWarehouseData findOne(PropelPDO $con = null) Return the first SWarehouseData matching the query
 * @method     SWarehouseData findOneOrCreate(PropelPDO $con = null) Return the first SWarehouseData matching the query, or a new SWarehouseData object populated from the query conditions when no match is found
 *
 * @method     SWarehouseData findOneById(int $id) Return the first SWarehouseData filtered by the id column
 * @method     SWarehouseData findOneByProductId(int $product_id) Return the first SWarehouseData filtered by the product_id column
 * @method     SWarehouseData findOneByWarehouseId(int $warehouse_id) Return the first SWarehouseData filtered by the warehouse_id column
 * @method     SWarehouseData findOneByCount(int $count) Return the first SWarehouseData filtered by the count column
 *
 * @method     array findById(int $id) Return SWarehouseData objects filtered by the id column
 * @method     array findByProductId(int $product_id) Return SWarehouseData objects filtered by the product_id column
 * @method     array findByWarehouseId(int $warehouse_id) Return SWarehouseData objects filtered by the warehouse_id column
 * @method     array findByCount(int $count) Return SWarehouseData objects filtered by the count column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSWarehouseDataQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSWarehouseDataQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SWarehouseData', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SWarehouseDataQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SWarehouseDataQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SWarehouseDataQuery) {
			return $criteria;
		}
		$query = new SWarehouseDataQuery();
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
	 * @return    SWarehouseData|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SWarehouseDataPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SWarehouseDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    SWarehouseData A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PRODUCT_ID`, `WAREHOUSE_ID`, `COUNT` FROM `shop_warehouse_data` WHERE `ID` = :p0';
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
			$obj = new SWarehouseData();
			$obj->hydrate($row);
			SWarehouseDataPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    SWarehouseData|array|mixed the result, formatted by the current formatter
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
	 * @return    SWarehouseDataQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SWarehouseDataPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SWarehouseDataQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SWarehouseDataPeer::ID, $keys, Criteria::IN);
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
	 * @return    SWarehouseDataQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SWarehouseDataPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the product_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByProductId(1234); // WHERE product_id = 1234
	 * $query->filterByProductId(array(12, 34)); // WHERE product_id IN (12, 34)
	 * $query->filterByProductId(array('min' => 12)); // WHERE product_id > 12
	 * </code>
	 *
	 * @see       filterBySProducts()
	 *
	 * @param     mixed $productId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SWarehouseDataQuery The current query, for fluid interface
	 */
	public function filterByProductId($productId = null, $comparison = null)
	{
		if (is_array($productId)) {
			$useMinMax = false;
			if (isset($productId['min'])) {
				$this->addUsingAlias(SWarehouseDataPeer::PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($productId['max'])) {
				$this->addUsingAlias(SWarehouseDataPeer::PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SWarehouseDataPeer::PRODUCT_ID, $productId, $comparison);
	}

	/**
	 * Filter the query on the warehouse_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByWarehouseId(1234); // WHERE warehouse_id = 1234
	 * $query->filterByWarehouseId(array(12, 34)); // WHERE warehouse_id IN (12, 34)
	 * $query->filterByWarehouseId(array('min' => 12)); // WHERE warehouse_id > 12
	 * </code>
	 *
	 * @see       filterBySWarehouses()
	 *
	 * @param     mixed $warehouseId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SWarehouseDataQuery The current query, for fluid interface
	 */
	public function filterByWarehouseId($warehouseId = null, $comparison = null)
	{
		if (is_array($warehouseId)) {
			$useMinMax = false;
			if (isset($warehouseId['min'])) {
				$this->addUsingAlias(SWarehouseDataPeer::WAREHOUSE_ID, $warehouseId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($warehouseId['max'])) {
				$this->addUsingAlias(SWarehouseDataPeer::WAREHOUSE_ID, $warehouseId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SWarehouseDataPeer::WAREHOUSE_ID, $warehouseId, $comparison);
	}

	/**
	 * Filter the query on the count column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCount(1234); // WHERE count = 1234
	 * $query->filterByCount(array(12, 34)); // WHERE count IN (12, 34)
	 * $query->filterByCount(array('min' => 12)); // WHERE count > 12
	 * </code>
	 *
	 * @param     mixed $count The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SWarehouseDataQuery The current query, for fluid interface
	 */
	public function filterByCount($count = null, $comparison = null)
	{
		if (is_array($count)) {
			$useMinMax = false;
			if (isset($count['min'])) {
				$this->addUsingAlias(SWarehouseDataPeer::COUNT, $count['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($count['max'])) {
				$this->addUsingAlias(SWarehouseDataPeer::COUNT, $count['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SWarehouseDataPeer::COUNT, $count, $comparison);
	}

	/**
	 * Filter the query by a related SProducts object
	 *
	 * @param     SProducts|PropelCollection $sProducts The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SWarehouseDataQuery The current query, for fluid interface
	 */
	public function filterBySProducts($sProducts, $comparison = null)
	{
		if ($sProducts instanceof SProducts) {
			return $this
				->addUsingAlias(SWarehouseDataPeer::PRODUCT_ID, $sProducts->getId(), $comparison);
		} elseif ($sProducts instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SWarehouseDataPeer::PRODUCT_ID, $sProducts->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySProducts() only accepts arguments of type SProducts or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SProducts relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SWarehouseDataQuery The current query, for fluid interface
	 */
	public function joinSProducts($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SProducts');

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
			$this->addJoinObject($join, 'SProducts');
		}

		return $this;
	}

	/**
	 * Use the SProducts relation SProducts object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery A secondary query class using the current class as primary query
	 */
	public function useSProductsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSProducts($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SProducts', 'SProductsQuery');
	}

	/**
	 * Filter the query by a related SWarehouses object
	 *
	 * @param     SWarehouses|PropelCollection $sWarehouses The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SWarehouseDataQuery The current query, for fluid interface
	 */
	public function filterBySWarehouses($sWarehouses, $comparison = null)
	{
		if ($sWarehouses instanceof SWarehouses) {
			return $this
				->addUsingAlias(SWarehouseDataPeer::WAREHOUSE_ID, $sWarehouses->getId(), $comparison);
		} elseif ($sWarehouses instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SWarehouseDataPeer::WAREHOUSE_ID, $sWarehouses->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySWarehouses() only accepts arguments of type SWarehouses or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SWarehouses relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SWarehouseDataQuery The current query, for fluid interface
	 */
	public function joinSWarehouses($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SWarehouses');

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
			$this->addJoinObject($join, 'SWarehouses');
		}

		return $this;
	}

	/**
	 * Use the SWarehouses relation SWarehouses object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SWarehousesQuery A secondary query class using the current class as primary query
	 */
	public function useSWarehousesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSWarehouses($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SWarehouses', 'SWarehousesQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SWarehouseData $sWarehouseData Object to remove from the list of results
	 *
	 * @return    SWarehouseDataQuery The current query, for fluid interface
	 */
	public function prune($sWarehouseData = null)
	{
		if ($sWarehouseData) {
			$this->addUsingAlias(SWarehouseDataPeer::ID, $sWarehouseData->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseSWarehouseDataQuery