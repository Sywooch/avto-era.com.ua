<?php


/**
 * Base class that represents a query for the 'shop_delivery_methods' table.
 *
 * 
 *
 * @method     SDeliveryMethodsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SDeliveryMethodsQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     SDeliveryMethodsQuery orderByFreeFrom($order = Criteria::ASC) Order by the free_from column
 * @method     SDeliveryMethodsQuery orderByEnabled($order = Criteria::ASC) Order by the enabled column
 * @method     SDeliveryMethodsQuery orderByIsPriceInPercent($order = Criteria::ASC) Order by the is_price_in_percent column
 * @method     SDeliveryMethodsQuery orderByPosition($order = Criteria::ASC) Order by the position column
 *
 * @method     SDeliveryMethodsQuery groupById() Group by the id column
 * @method     SDeliveryMethodsQuery groupByPrice() Group by the price column
 * @method     SDeliveryMethodsQuery groupByFreeFrom() Group by the free_from column
 * @method     SDeliveryMethodsQuery groupByEnabled() Group by the enabled column
 * @method     SDeliveryMethodsQuery groupByIsPriceInPercent() Group by the is_price_in_percent column
 * @method     SDeliveryMethodsQuery groupByPosition() Group by the position column
 *
 * @method     SDeliveryMethodsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SDeliveryMethodsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SDeliveryMethodsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SDeliveryMethodsQuery leftJoinSDeliveryMethodsI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the SDeliveryMethodsI18n relation
 * @method     SDeliveryMethodsQuery rightJoinSDeliveryMethodsI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SDeliveryMethodsI18n relation
 * @method     SDeliveryMethodsQuery innerJoinSDeliveryMethodsI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the SDeliveryMethodsI18n relation
 *
 * @method     SDeliveryMethodsQuery leftJoinShopDeliveryMethodsSystems($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShopDeliveryMethodsSystems relation
 * @method     SDeliveryMethodsQuery rightJoinShopDeliveryMethodsSystems($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShopDeliveryMethodsSystems relation
 * @method     SDeliveryMethodsQuery innerJoinShopDeliveryMethodsSystems($relationAlias = null) Adds a INNER JOIN clause to the query using the ShopDeliveryMethodsSystems relation
 *
 * @method     SDeliveryMethodsQuery leftJoinSOrders($relationAlias = null) Adds a LEFT JOIN clause to the query using the SOrders relation
 * @method     SDeliveryMethodsQuery rightJoinSOrders($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SOrders relation
 * @method     SDeliveryMethodsQuery innerJoinSOrders($relationAlias = null) Adds a INNER JOIN clause to the query using the SOrders relation
 *
 * @method     SDeliveryMethods findOne(PropelPDO $con = null) Return the first SDeliveryMethods matching the query
 * @method     SDeliveryMethods findOneOrCreate(PropelPDO $con = null) Return the first SDeliveryMethods matching the query, or a new SDeliveryMethods object populated from the query conditions when no match is found
 *
 * @method     SDeliveryMethods findOneById(int $id) Return the first SDeliveryMethods filtered by the id column
 * @method     SDeliveryMethods findOneByPrice(string $price) Return the first SDeliveryMethods filtered by the price column
 * @method     SDeliveryMethods findOneByFreeFrom(string $free_from) Return the first SDeliveryMethods filtered by the free_from column
 * @method     SDeliveryMethods findOneByEnabled(boolean $enabled) Return the first SDeliveryMethods filtered by the enabled column
 * @method     SDeliveryMethods findOneByIsPriceInPercent(boolean $is_price_in_percent) Return the first SDeliveryMethods filtered by the is_price_in_percent column
 * @method     SDeliveryMethods findOneByPosition(int $position) Return the first SDeliveryMethods filtered by the position column
 *
 * @method     array findById(int $id) Return SDeliveryMethods objects filtered by the id column
 * @method     array findByPrice(string $price) Return SDeliveryMethods objects filtered by the price column
 * @method     array findByFreeFrom(string $free_from) Return SDeliveryMethods objects filtered by the free_from column
 * @method     array findByEnabled(boolean $enabled) Return SDeliveryMethods objects filtered by the enabled column
 * @method     array findByIsPriceInPercent(boolean $is_price_in_percent) Return SDeliveryMethods objects filtered by the is_price_in_percent column
 * @method     array findByPosition(int $position) Return SDeliveryMethods objects filtered by the position column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSDeliveryMethodsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSDeliveryMethodsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SDeliveryMethods', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SDeliveryMethodsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SDeliveryMethodsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SDeliveryMethodsQuery) {
			return $criteria;
		}
		$query = new SDeliveryMethodsQuery();
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
	 * @return    SDeliveryMethods|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SDeliveryMethodsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SDeliveryMethodsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    SDeliveryMethods A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PRICE`, `FREE_FROM`, `ENABLED`, `IS_PRICE_IN_PERCENT`, `POSITION` FROM `shop_delivery_methods` WHERE `ID` = :p0';
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
			$obj = new SDeliveryMethods();
			$obj->hydrate($row);
			SDeliveryMethodsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    SDeliveryMethods|array|mixed the result, formatted by the current formatter
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
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SDeliveryMethodsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SDeliveryMethodsPeer::ID, $keys, Criteria::IN);
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
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SDeliveryMethodsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the price column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPrice(1234); // WHERE price = 1234
	 * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
	 * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
	 * </code>
	 *
	 * @param     mixed $price The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function filterByPrice($price = null, $comparison = null)
	{
		if (is_array($price)) {
			$useMinMax = false;
			if (isset($price['min'])) {
				$this->addUsingAlias(SDeliveryMethodsPeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($price['max'])) {
				$this->addUsingAlias(SDeliveryMethodsPeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SDeliveryMethodsPeer::PRICE, $price, $comparison);
	}

	/**
	 * Filter the query on the free_from column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFreeFrom(1234); // WHERE free_from = 1234
	 * $query->filterByFreeFrom(array(12, 34)); // WHERE free_from IN (12, 34)
	 * $query->filterByFreeFrom(array('min' => 12)); // WHERE free_from > 12
	 * </code>
	 *
	 * @param     mixed $freeFrom The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function filterByFreeFrom($freeFrom = null, $comparison = null)
	{
		if (is_array($freeFrom)) {
			$useMinMax = false;
			if (isset($freeFrom['min'])) {
				$this->addUsingAlias(SDeliveryMethodsPeer::FREE_FROM, $freeFrom['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($freeFrom['max'])) {
				$this->addUsingAlias(SDeliveryMethodsPeer::FREE_FROM, $freeFrom['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SDeliveryMethodsPeer::FREE_FROM, $freeFrom, $comparison);
	}

	/**
	 * Filter the query on the enabled column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEnabled(true); // WHERE enabled = true
	 * $query->filterByEnabled('yes'); // WHERE enabled = true
	 * </code>
	 *
	 * @param     boolean|string $enabled The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function filterByEnabled($enabled = null, $comparison = null)
	{
		if (is_string($enabled)) {
			$enabled = in_array(strtolower($enabled), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SDeliveryMethodsPeer::ENABLED, $enabled, $comparison);
	}

	/**
	 * Filter the query on the is_price_in_percent column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIsPriceInPercent(true); // WHERE is_price_in_percent = true
	 * $query->filterByIsPriceInPercent('yes'); // WHERE is_price_in_percent = true
	 * </code>
	 *
	 * @param     boolean|string $isPriceInPercent The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function filterByIsPriceInPercent($isPriceInPercent = null, $comparison = null)
	{
		if (is_string($isPriceInPercent)) {
			$is_price_in_percent = in_array(strtolower($isPriceInPercent), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SDeliveryMethodsPeer::IS_PRICE_IN_PERCENT, $isPriceInPercent, $comparison);
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
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null)
	{
		if (is_array($position)) {
			$useMinMax = false;
			if (isset($position['min'])) {
				$this->addUsingAlias(SDeliveryMethodsPeer::POSITION, $position['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($position['max'])) {
				$this->addUsingAlias(SDeliveryMethodsPeer::POSITION, $position['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SDeliveryMethodsPeer::POSITION, $position, $comparison);
	}

	/**
	 * Filter the query by a related SDeliveryMethodsI18n object
	 *
	 * @param     SDeliveryMethodsI18n $sDeliveryMethodsI18n  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function filterBySDeliveryMethodsI18n($sDeliveryMethodsI18n, $comparison = null)
	{
		if ($sDeliveryMethodsI18n instanceof SDeliveryMethodsI18n) {
			return $this
				->addUsingAlias(SDeliveryMethodsPeer::ID, $sDeliveryMethodsI18n->getId(), $comparison);
		} elseif ($sDeliveryMethodsI18n instanceof PropelCollection) {
			return $this
				->useSDeliveryMethodsI18nQuery()
				->filterByPrimaryKeys($sDeliveryMethodsI18n->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySDeliveryMethodsI18n() only accepts arguments of type SDeliveryMethodsI18n or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SDeliveryMethodsI18n relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function joinSDeliveryMethodsI18n($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SDeliveryMethodsI18n');

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
			$this->addJoinObject($join, 'SDeliveryMethodsI18n');
		}

		return $this;
	}

	/**
	 * Use the SDeliveryMethodsI18n relation SDeliveryMethodsI18n object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SDeliveryMethodsI18nQuery A secondary query class using the current class as primary query
	 */
	public function useSDeliveryMethodsI18nQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSDeliveryMethodsI18n($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SDeliveryMethodsI18n', 'SDeliveryMethodsI18nQuery');
	}

	/**
	 * Filter the query by a related ShopDeliveryMethodsSystems object
	 *
	 * @param     ShopDeliveryMethodsSystems $shopDeliveryMethodsSystems  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function filterByShopDeliveryMethodsSystems($shopDeliveryMethodsSystems, $comparison = null)
	{
		if ($shopDeliveryMethodsSystems instanceof ShopDeliveryMethodsSystems) {
			return $this
				->addUsingAlias(SDeliveryMethodsPeer::ID, $shopDeliveryMethodsSystems->getDeliveryMethodId(), $comparison);
		} elseif ($shopDeliveryMethodsSystems instanceof PropelCollection) {
			return $this
				->useShopDeliveryMethodsSystemsQuery()
				->filterByPrimaryKeys($shopDeliveryMethodsSystems->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByShopDeliveryMethodsSystems() only accepts arguments of type ShopDeliveryMethodsSystems or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ShopDeliveryMethodsSystems relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function joinShopDeliveryMethodsSystems($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ShopDeliveryMethodsSystems');

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
			$this->addJoinObject($join, 'ShopDeliveryMethodsSystems');
		}

		return $this;
	}

	/**
	 * Use the ShopDeliveryMethodsSystems relation ShopDeliveryMethodsSystems object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShopDeliveryMethodsSystemsQuery A secondary query class using the current class as primary query
	 */
	public function useShopDeliveryMethodsSystemsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinShopDeliveryMethodsSystems($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ShopDeliveryMethodsSystems', 'ShopDeliveryMethodsSystemsQuery');
	}

	/**
	 * Filter the query by a related SOrders object
	 *
	 * @param     SOrders $sOrders  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function filterBySOrders($sOrders, $comparison = null)
	{
		if ($sOrders instanceof SOrders) {
			return $this
				->addUsingAlias(SDeliveryMethodsPeer::ID, $sOrders->getDeliveryMethod(), $comparison);
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
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
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
	 * Filter the query by a related SPaymentMethods object
	 * using the shop_delivery_methods_systems table as cross reference
	 *
	 * @param     SPaymentMethods $sPaymentMethods the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function filterByPaymentMethods($sPaymentMethods, $comparison = Criteria::EQUAL)
	{
		return $this
			->useShopDeliveryMethodsSystemsQuery()
			->filterByPaymentMethods($sPaymentMethods, $comparison)
			->endUse();
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SDeliveryMethods $sDeliveryMethods Object to remove from the list of results
	 *
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function prune($sDeliveryMethods = null)
	{
		if ($sDeliveryMethods) {
			$this->addUsingAlias(SDeliveryMethodsPeer::ID, $sDeliveryMethods->getId(), Criteria::NOT_EQUAL);
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
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function joinI18n($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$relationName = $relationAlias ? $relationAlias : 'SDeliveryMethodsI18n';
		return $this
			->joinSDeliveryMethodsI18n($relationAlias, $joinType)
			->addJoinCondition($relationName, $relationName . '.Locale = ?', $locale);
	}
	
	/**
	 * Adds a JOIN clause to the query and hydrates the related I18n object.
	 * Shortcut for $c->joinI18n($locale)->with()
	 *
	 * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
	 *
	 * @return    SDeliveryMethodsQuery The current query, for fluid interface
	 */
	public function joinWithI18n($locale = 'ru', $joinType = Criteria::LEFT_JOIN)
	{
		$this
			->joinI18n($locale, null, $joinType)
			->with('SDeliveryMethodsI18n');
		$this->with['SDeliveryMethodsI18n']->setIsWithOneToMany(false);
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
	 * @return    SDeliveryMethodsI18nQuery A secondary query class using the current class as primary query
	 */
	public function useI18nQuery($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinI18n($locale, $relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SDeliveryMethodsI18n', 'SDeliveryMethodsI18nQuery');
	}

} // BaseSDeliveryMethodsQuery