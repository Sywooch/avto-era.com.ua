<?php


/**
 * Base class that represents a query for the 'shop_gifts' table.
 *
 * 
 *
 * @method     ShopGiftsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ShopGiftsQuery orderByKey($order = Criteria::ASC) Order by the key column
 * @method     ShopGiftsQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     ShopGiftsQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ShopGiftsQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ShopGiftsQuery orderByEspdate($order = Criteria::ASC) Order by the espdate column
 *
 * @method     ShopGiftsQuery groupById() Group by the id column
 * @method     ShopGiftsQuery groupByKey() Group by the key column
 * @method     ShopGiftsQuery groupByActive() Group by the active column
 * @method     ShopGiftsQuery groupByPrice() Group by the price column
 * @method     ShopGiftsQuery groupByCreated() Group by the created column
 * @method     ShopGiftsQuery groupByEspdate() Group by the espdate column
 *
 * @method     ShopGiftsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ShopGiftsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ShopGiftsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ShopGifts findOne(PropelPDO $con = null) Return the first ShopGifts matching the query
 * @method     ShopGifts findOneOrCreate(PropelPDO $con = null) Return the first ShopGifts matching the query, or a new ShopGifts object populated from the query conditions when no match is found
 *
 * @method     ShopGifts findOneById(int $id) Return the first ShopGifts filtered by the id column
 * @method     ShopGifts findOneByKey(string $key) Return the first ShopGifts filtered by the key column
 * @method     ShopGifts findOneByActive(int $active) Return the first ShopGifts filtered by the active column
 * @method     ShopGifts findOneByPrice(int $price) Return the first ShopGifts filtered by the price column
 * @method     ShopGifts findOneByCreated(int $created) Return the first ShopGifts filtered by the created column
 * @method     ShopGifts findOneByEspdate(int $espdate) Return the first ShopGifts filtered by the espdate column
 *
 * @method     array findById(int $id) Return ShopGifts objects filtered by the id column
 * @method     array findByKey(string $key) Return ShopGifts objects filtered by the key column
 * @method     array findByActive(int $active) Return ShopGifts objects filtered by the active column
 * @method     array findByPrice(int $price) Return ShopGifts objects filtered by the price column
 * @method     array findByCreated(int $created) Return ShopGifts objects filtered by the created column
 * @method     array findByEspdate(int $espdate) Return ShopGifts objects filtered by the espdate column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseShopGiftsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseShopGiftsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'ShopGifts', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ShopGiftsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ShopGiftsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ShopGiftsQuery) {
			return $criteria;
		}
		$query = new ShopGiftsQuery();
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
	 * @return    ShopGifts|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ShopGiftsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ShopGiftsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    ShopGifts A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `KEY`, `ACTIVE`, `PRICE`, `CREATED`, `ESPDATE` FROM `shop_gifts` WHERE `ID` = :p0';
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
			$obj = new ShopGifts();
			$obj->hydrate($row);
			ShopGiftsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    ShopGifts|array|mixed the result, formatted by the current formatter
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
	 * @return    ShopGiftsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ShopGiftsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ShopGiftsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ShopGiftsPeer::ID, $keys, Criteria::IN);
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
	 * @return    ShopGiftsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ShopGiftsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the key column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByKey('fooValue');   // WHERE key = 'fooValue'
	 * $query->filterByKey('%fooValue%'); // WHERE key LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $key The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopGiftsQuery The current query, for fluid interface
	 */
	public function filterByKey($key = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($key)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $key)) {
				$key = str_replace('*', '%', $key);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ShopGiftsPeer::KEY, $key, $comparison);
	}

	/**
	 * Filter the query on the active column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActive(1234); // WHERE active = 1234
	 * $query->filterByActive(array(12, 34)); // WHERE active IN (12, 34)
	 * $query->filterByActive(array('min' => 12)); // WHERE active > 12
	 * </code>
	 *
	 * @param     mixed $active The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopGiftsQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_array($active)) {
			$useMinMax = false;
			if (isset($active['min'])) {
				$this->addUsingAlias(ShopGiftsPeer::ACTIVE, $active['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($active['max'])) {
				$this->addUsingAlias(ShopGiftsPeer::ACTIVE, $active['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShopGiftsPeer::ACTIVE, $active, $comparison);
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
	 * @return    ShopGiftsQuery The current query, for fluid interface
	 */
	public function filterByPrice($price = null, $comparison = null)
	{
		if (is_array($price)) {
			$useMinMax = false;
			if (isset($price['min'])) {
				$this->addUsingAlias(ShopGiftsPeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($price['max'])) {
				$this->addUsingAlias(ShopGiftsPeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShopGiftsPeer::PRICE, $price, $comparison);
	}

	/**
	 * Filter the query on the created column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCreated(1234); // WHERE created = 1234
	 * $query->filterByCreated(array(12, 34)); // WHERE created IN (12, 34)
	 * $query->filterByCreated(array('min' => 12)); // WHERE created > 12
	 * </code>
	 *
	 * @param     mixed $created The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopGiftsQuery The current query, for fluid interface
	 */
	public function filterByCreated($created = null, $comparison = null)
	{
		if (is_array($created)) {
			$useMinMax = false;
			if (isset($created['min'])) {
				$this->addUsingAlias(ShopGiftsPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($created['max'])) {
				$this->addUsingAlias(ShopGiftsPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShopGiftsPeer::CREATED, $created, $comparison);
	}

	/**
	 * Filter the query on the espdate column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEspdate(1234); // WHERE espdate = 1234
	 * $query->filterByEspdate(array(12, 34)); // WHERE espdate IN (12, 34)
	 * $query->filterByEspdate(array('min' => 12)); // WHERE espdate > 12
	 * </code>
	 *
	 * @param     mixed $espdate The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopGiftsQuery The current query, for fluid interface
	 */
	public function filterByEspdate($espdate = null, $comparison = null)
	{
		if (is_array($espdate)) {
			$useMinMax = false;
			if (isset($espdate['min'])) {
				$this->addUsingAlias(ShopGiftsPeer::ESPDATE, $espdate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($espdate['max'])) {
				$this->addUsingAlias(ShopGiftsPeer::ESPDATE, $espdate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShopGiftsPeer::ESPDATE, $espdate, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ShopGifts $shopGifts Object to remove from the list of results
	 *
	 * @return    ShopGiftsQuery The current query, for fluid interface
	 */
	public function prune($shopGifts = null)
	{
		if ($shopGifts) {
			$this->addUsingAlias(ShopGiftsPeer::ID, $shopGifts->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseShopGiftsQuery