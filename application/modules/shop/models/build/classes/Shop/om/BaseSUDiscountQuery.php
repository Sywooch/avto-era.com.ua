<?php


/**
 * Base class that represents a query for the 'shop_discount_user_group' table.
 *
 * 
 *
 * @method     SUDiscountQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SUDiscountQuery orderBydiscountId($order = Criteria::ASC) Order by the discount_id column
 * @method     SUDiscountQuery orderByDiscountJoinId($order = Criteria::ASC) Order by the user_group_id column
 *
 * @method     SUDiscountQuery groupById() Group by the id column
 * @method     SUDiscountQuery groupBydiscountId() Group by the discount_id column
 * @method     SUDiscountQuery groupByDiscountJoinId() Group by the user_group_id column
 *
 * @method     SUDiscountQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SUDiscountQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SUDiscountQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SUDiscount findOne(PropelPDO $con = null) Return the first SUDiscount matching the query
 * @method     SUDiscount findOneOrCreate(PropelPDO $con = null) Return the first SUDiscount matching the query, or a new SUDiscount object populated from the query conditions when no match is found
 *
 * @method     SUDiscount findOneById(int $id) Return the first SUDiscount filtered by the id column
 * @method     SUDiscount findOneBydiscountId(int $discount_id) Return the first SUDiscount filtered by the discount_id column
 * @method     SUDiscount findOneByDiscountJoinId(int $user_group_id) Return the first SUDiscount filtered by the user_group_id column
 *
 * @method     array findById(int $id) Return SUDiscount objects filtered by the id column
 * @method     array findBydiscountId(int $discount_id) Return SUDiscount objects filtered by the discount_id column
 * @method     array findByDiscountJoinId(int $user_group_id) Return SUDiscount objects filtered by the user_group_id column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSUDiscountQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSUDiscountQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SUDiscount', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SUDiscountQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SUDiscountQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SUDiscountQuery) {
			return $criteria;
		}
		$query = new SUDiscountQuery();
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
	 * @return    SUDiscount|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SUDiscountPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SUDiscountPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    SUDiscount A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `DISCOUNT_ID`, `USER_GROUP_ID` FROM `shop_discount_user_group` WHERE `ID` = :p0';
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
			$obj = new SUDiscount();
			$obj->hydrate($row);
			SUDiscountPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    SUDiscount|array|mixed the result, formatted by the current formatter
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
	 * @return    SUDiscountQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SUDiscountPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SUDiscountQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SUDiscountPeer::ID, $keys, Criteria::IN);
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
	 * @return    SUDiscountQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SUDiscountPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the discount_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBydiscountId(1234); // WHERE discount_id = 1234
	 * $query->filterBydiscountId(array(12, 34)); // WHERE discount_id IN (12, 34)
	 * $query->filterBydiscountId(array('min' => 12)); // WHERE discount_id > 12
	 * </code>
	 *
	 * @param     mixed $discountId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SUDiscountQuery The current query, for fluid interface
	 */
	public function filterBydiscountId($discountId = null, $comparison = null)
	{
		if (is_array($discountId)) {
			$useMinMax = false;
			if (isset($discountId['min'])) {
				$this->addUsingAlias(SUDiscountPeer::DISCOUNT_ID, $discountId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($discountId['max'])) {
				$this->addUsingAlias(SUDiscountPeer::DISCOUNT_ID, $discountId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SUDiscountPeer::DISCOUNT_ID, $discountId, $comparison);
	}

	/**
	 * Filter the query on the user_group_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDiscountJoinId(1234); // WHERE user_group_id = 1234
	 * $query->filterByDiscountJoinId(array(12, 34)); // WHERE user_group_id IN (12, 34)
	 * $query->filterByDiscountJoinId(array('min' => 12)); // WHERE user_group_id > 12
	 * </code>
	 *
	 * @param     mixed $discountJoinId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SUDiscountQuery The current query, for fluid interface
	 */
	public function filterByDiscountJoinId($discountJoinId = null, $comparison = null)
	{
		if (is_array($discountJoinId)) {
			$useMinMax = false;
			if (isset($discountJoinId['min'])) {
				$this->addUsingAlias(SUDiscountPeer::USER_GROUP_ID, $discountJoinId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($discountJoinId['max'])) {
				$this->addUsingAlias(SUDiscountPeer::USER_GROUP_ID, $discountJoinId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SUDiscountPeer::USER_GROUP_ID, $discountJoinId, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SUDiscount $sUDiscount Object to remove from the list of results
	 *
	 * @return    SUDiscountQuery The current query, for fluid interface
	 */
	public function prune($sUDiscount = null)
	{
		if ($sUDiscount) {
			$this->addUsingAlias(SUDiscountPeer::ID, $sUDiscount->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseSUDiscountQuery