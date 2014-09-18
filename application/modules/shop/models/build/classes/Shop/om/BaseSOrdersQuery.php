<?php


/**
 * Base class that represents a query for the 'shop_orders' table.
 *
 * 
 *
 * @method     SOrdersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SOrdersQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     SOrdersQuery orderByKey($order = Criteria::ASC) Order by the key column
 * @method     SOrdersQuery orderByDeliveryMethod($order = Criteria::ASC) Order by the delivery_method column
 * @method     SOrdersQuery orderByDeliveryPrice($order = Criteria::ASC) Order by the delivery_price column
 * @method     SOrdersQuery orderByPaymentMethod($order = Criteria::ASC) Order by the payment_method column
 * @method     SOrdersQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     SOrdersQuery orderByPaid($order = Criteria::ASC) Order by the paid column
 * @method     SOrdersQuery orderByUserFullName($order = Criteria::ASC) Order by the user_full_name column
 * @method     SOrdersQuery orderByUserEmail($order = Criteria::ASC) Order by the user_email column
 * @method     SOrdersQuery orderByUserPhone($order = Criteria::ASC) Order by the user_phone column
 * @method     SOrdersQuery orderByUserDeliverTo($order = Criteria::ASC) Order by the user_deliver_to column
 * @method     SOrdersQuery orderByUserComment($order = Criteria::ASC) Order by the user_comment column
 * @method     SOrdersQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 * @method     SOrdersQuery orderByDateUpdated($order = Criteria::ASC) Order by the date_updated column
 * @method     SOrdersQuery orderByUserIp($order = Criteria::ASC) Order by the user_ip column
 * @method     SOrdersQuery orderByTotalPrice($order = Criteria::ASC) Order by the total_price column
 * @method     SOrdersQuery orderByExternalId($order = Criteria::ASC) Order by the external_id column
 * @method     SOrdersQuery orderByGiftCertKey($order = Criteria::ASC) Order by the gift_cert_key column
 * @method     SOrdersQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     SOrdersQuery orderByGiftCertPrice($order = Criteria::ASC) Order by the gift_cert_price column
 * @method     SOrdersQuery orderByDiscountInfo($order = Criteria::ASC) Order by the discount_info column
 * @method     SOrdersQuery orderByOriginPrice($order = Criteria::ASC) Order by the origin_price column
 * @method     SOrdersQuery orderByComulativ($order = Criteria::ASC) Order by the comulativ column
 *
 * @method     SOrdersQuery groupById() Group by the id column
 * @method     SOrdersQuery groupByUserId() Group by the user_id column
 * @method     SOrdersQuery groupByKey() Group by the key column
 * @method     SOrdersQuery groupByDeliveryMethod() Group by the delivery_method column
 * @method     SOrdersQuery groupByDeliveryPrice() Group by the delivery_price column
 * @method     SOrdersQuery groupByPaymentMethod() Group by the payment_method column
 * @method     SOrdersQuery groupByStatus() Group by the status column
 * @method     SOrdersQuery groupByPaid() Group by the paid column
 * @method     SOrdersQuery groupByUserFullName() Group by the user_full_name column
 * @method     SOrdersQuery groupByUserEmail() Group by the user_email column
 * @method     SOrdersQuery groupByUserPhone() Group by the user_phone column
 * @method     SOrdersQuery groupByUserDeliverTo() Group by the user_deliver_to column
 * @method     SOrdersQuery groupByUserComment() Group by the user_comment column
 * @method     SOrdersQuery groupByDateCreated() Group by the date_created column
 * @method     SOrdersQuery groupByDateUpdated() Group by the date_updated column
 * @method     SOrdersQuery groupByUserIp() Group by the user_ip column
 * @method     SOrdersQuery groupByTotalPrice() Group by the total_price column
 * @method     SOrdersQuery groupByExternalId() Group by the external_id column
 * @method     SOrdersQuery groupByGiftCertKey() Group by the gift_cert_key column
 * @method     SOrdersQuery groupByDiscount() Group by the discount column
 * @method     SOrdersQuery groupByGiftCertPrice() Group by the gift_cert_price column
 * @method     SOrdersQuery groupByDiscountInfo() Group by the discount_info column
 * @method     SOrdersQuery groupByOriginPrice() Group by the origin_price column
 * @method     SOrdersQuery groupByComulativ() Group by the comulativ column
 *
 * @method     SOrdersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SOrdersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SOrdersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SOrdersQuery leftJoinSDeliveryMethods($relationAlias = null) Adds a LEFT JOIN clause to the query using the SDeliveryMethods relation
 * @method     SOrdersQuery rightJoinSDeliveryMethods($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SDeliveryMethods relation
 * @method     SOrdersQuery innerJoinSDeliveryMethods($relationAlias = null) Adds a INNER JOIN clause to the query using the SDeliveryMethods relation
 *
 * @method     SOrdersQuery leftJoinSPaymentMethods($relationAlias = null) Adds a LEFT JOIN clause to the query using the SPaymentMethods relation
 * @method     SOrdersQuery rightJoinSPaymentMethods($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SPaymentMethods relation
 * @method     SOrdersQuery innerJoinSPaymentMethods($relationAlias = null) Adds a INNER JOIN clause to the query using the SPaymentMethods relation
 *
 * @method     SOrdersQuery leftJoinSOrderStatuses($relationAlias = null) Adds a LEFT JOIN clause to the query using the SOrderStatuses relation
 * @method     SOrdersQuery rightJoinSOrderStatuses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SOrderStatuses relation
 * @method     SOrdersQuery innerJoinSOrderStatuses($relationAlias = null) Adds a INNER JOIN clause to the query using the SOrderStatuses relation
 *
 * @method     SOrdersQuery leftJoinSOrderProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SOrderProducts relation
 * @method     SOrdersQuery rightJoinSOrderProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SOrderProducts relation
 * @method     SOrdersQuery innerJoinSOrderProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SOrderProducts relation
 *
 * @method     SOrdersQuery leftJoinSOrderStatusHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the SOrderStatusHistory relation
 * @method     SOrdersQuery rightJoinSOrderStatusHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SOrderStatusHistory relation
 * @method     SOrdersQuery innerJoinSOrderStatusHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the SOrderStatusHistory relation
 *
 * @method     SOrders findOne(PropelPDO $con = null) Return the first SOrders matching the query
 * @method     SOrders findOneOrCreate(PropelPDO $con = null) Return the first SOrders matching the query, or a new SOrders object populated from the query conditions when no match is found
 *
 * @method     SOrders findOneById(int $id) Return the first SOrders filtered by the id column
 * @method     SOrders findOneByUserId(int $user_id) Return the first SOrders filtered by the user_id column
 * @method     SOrders findOneByKey(string $key) Return the first SOrders filtered by the key column
 * @method     SOrders findOneByDeliveryMethod(int $delivery_method) Return the first SOrders filtered by the delivery_method column
 * @method     SOrders findOneByDeliveryPrice(string $delivery_price) Return the first SOrders filtered by the delivery_price column
 * @method     SOrders findOneByPaymentMethod(int $payment_method) Return the first SOrders filtered by the payment_method column
 * @method     SOrders findOneByStatus(int $status) Return the first SOrders filtered by the status column
 * @method     SOrders findOneByPaid(boolean $paid) Return the first SOrders filtered by the paid column
 * @method     SOrders findOneByUserFullName(string $user_full_name) Return the first SOrders filtered by the user_full_name column
 * @method     SOrders findOneByUserEmail(string $user_email) Return the first SOrders filtered by the user_email column
 * @method     SOrders findOneByUserPhone(string $user_phone) Return the first SOrders filtered by the user_phone column
 * @method     SOrders findOneByUserDeliverTo(string $user_deliver_to) Return the first SOrders filtered by the user_deliver_to column
 * @method     SOrders findOneByUserComment(string $user_comment) Return the first SOrders filtered by the user_comment column
 * @method     SOrders findOneByDateCreated(int $date_created) Return the first SOrders filtered by the date_created column
 * @method     SOrders findOneByDateUpdated(int $date_updated) Return the first SOrders filtered by the date_updated column
 * @method     SOrders findOneByUserIp(string $user_ip) Return the first SOrders filtered by the user_ip column
 * @method     SOrders findOneByTotalPrice(double $total_price) Return the first SOrders filtered by the total_price column
 * @method     SOrders findOneByExternalId(string $external_id) Return the first SOrders filtered by the external_id column
 * @method     SOrders findOneByGiftCertKey(string $gift_cert_key) Return the first SOrders filtered by the gift_cert_key column
 * @method     SOrders findOneByDiscount(double $discount) Return the first SOrders filtered by the discount column
 * @method     SOrders findOneByGiftCertPrice(int $gift_cert_price) Return the first SOrders filtered by the gift_cert_price column
 * @method     SOrders findOneByDiscountInfo(string $discount_info) Return the first SOrders filtered by the discount_info column
 * @method     SOrders findOneByOriginPrice(double $origin_price) Return the first SOrders filtered by the origin_price column
 * @method     SOrders findOneByComulativ(double $comulativ) Return the first SOrders filtered by the comulativ column
 *
 * @method     array findById(int $id) Return SOrders objects filtered by the id column
 * @method     array findByUserId(int $user_id) Return SOrders objects filtered by the user_id column
 * @method     array findByKey(string $key) Return SOrders objects filtered by the key column
 * @method     array findByDeliveryMethod(int $delivery_method) Return SOrders objects filtered by the delivery_method column
 * @method     array findByDeliveryPrice(string $delivery_price) Return SOrders objects filtered by the delivery_price column
 * @method     array findByPaymentMethod(int $payment_method) Return SOrders objects filtered by the payment_method column
 * @method     array findByStatus(int $status) Return SOrders objects filtered by the status column
 * @method     array findByPaid(boolean $paid) Return SOrders objects filtered by the paid column
 * @method     array findByUserFullName(string $user_full_name) Return SOrders objects filtered by the user_full_name column
 * @method     array findByUserEmail(string $user_email) Return SOrders objects filtered by the user_email column
 * @method     array findByUserPhone(string $user_phone) Return SOrders objects filtered by the user_phone column
 * @method     array findByUserDeliverTo(string $user_deliver_to) Return SOrders objects filtered by the user_deliver_to column
 * @method     array findByUserComment(string $user_comment) Return SOrders objects filtered by the user_comment column
 * @method     array findByDateCreated(int $date_created) Return SOrders objects filtered by the date_created column
 * @method     array findByDateUpdated(int $date_updated) Return SOrders objects filtered by the date_updated column
 * @method     array findByUserIp(string $user_ip) Return SOrders objects filtered by the user_ip column
 * @method     array findByTotalPrice(double $total_price) Return SOrders objects filtered by the total_price column
 * @method     array findByExternalId(string $external_id) Return SOrders objects filtered by the external_id column
 * @method     array findByGiftCertKey(string $gift_cert_key) Return SOrders objects filtered by the gift_cert_key column
 * @method     array findByDiscount(double $discount) Return SOrders objects filtered by the discount column
 * @method     array findByGiftCertPrice(int $gift_cert_price) Return SOrders objects filtered by the gift_cert_price column
 * @method     array findByDiscountInfo(string $discount_info) Return SOrders objects filtered by the discount_info column
 * @method     array findByOriginPrice(double $origin_price) Return SOrders objects filtered by the origin_price column
 * @method     array findByComulativ(double $comulativ) Return SOrders objects filtered by the comulativ column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSOrdersQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSOrdersQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SOrders', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SOrdersQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SOrdersQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SOrdersQuery) {
			return $criteria;
		}
		$query = new SOrdersQuery();
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
	 * @return    SOrders|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SOrdersPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    SOrders A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USER_ID`, `KEY`, `DELIVERY_METHOD`, `DELIVERY_PRICE`, `PAYMENT_METHOD`, `STATUS`, `PAID`, `USER_FULL_NAME`, `USER_EMAIL`, `USER_PHONE`, `USER_DELIVER_TO`, `USER_COMMENT`, `DATE_CREATED`, `DATE_UPDATED`, `USER_IP`, `TOTAL_PRICE`, `EXTERNAL_ID`, `GIFT_CERT_KEY`, `DISCOUNT`, `GIFT_CERT_PRICE`, `DISCOUNT_INFO`, `ORIGIN_PRICE`, `COMULATIV` FROM `shop_orders` WHERE `ID` = :p0';
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
			$obj = new SOrders();
			$obj->hydrate($row);
			SOrdersPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    SOrders|array|mixed the result, formatted by the current formatter
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
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SOrdersPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SOrdersPeer::ID, $keys, Criteria::IN);
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
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SOrdersPeer::ID, $id, $comparison);
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
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId)) {
			$useMinMax = false;
			if (isset($userId['min'])) {
				$this->addUsingAlias(SOrdersPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userId['max'])) {
				$this->addUsingAlias(SOrdersPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::USER_ID, $userId, $comparison);
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
	 * @return    SOrdersQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SOrdersPeer::KEY, $key, $comparison);
	}

	/**
	 * Filter the query on the delivery_method column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDeliveryMethod(1234); // WHERE delivery_method = 1234
	 * $query->filterByDeliveryMethod(array(12, 34)); // WHERE delivery_method IN (12, 34)
	 * $query->filterByDeliveryMethod(array('min' => 12)); // WHERE delivery_method > 12
	 * </code>
	 *
	 * @see       filterBySDeliveryMethods()
	 *
	 * @param     mixed $deliveryMethod The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByDeliveryMethod($deliveryMethod = null, $comparison = null)
	{
		if (is_array($deliveryMethod)) {
			$useMinMax = false;
			if (isset($deliveryMethod['min'])) {
				$this->addUsingAlias(SOrdersPeer::DELIVERY_METHOD, $deliveryMethod['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($deliveryMethod['max'])) {
				$this->addUsingAlias(SOrdersPeer::DELIVERY_METHOD, $deliveryMethod['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::DELIVERY_METHOD, $deliveryMethod, $comparison);
	}

	/**
	 * Filter the query on the delivery_price column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDeliveryPrice(1234); // WHERE delivery_price = 1234
	 * $query->filterByDeliveryPrice(array(12, 34)); // WHERE delivery_price IN (12, 34)
	 * $query->filterByDeliveryPrice(array('min' => 12)); // WHERE delivery_price > 12
	 * </code>
	 *
	 * @param     mixed $deliveryPrice The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByDeliveryPrice($deliveryPrice = null, $comparison = null)
	{
		if (is_array($deliveryPrice)) {
			$useMinMax = false;
			if (isset($deliveryPrice['min'])) {
				$this->addUsingAlias(SOrdersPeer::DELIVERY_PRICE, $deliveryPrice['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($deliveryPrice['max'])) {
				$this->addUsingAlias(SOrdersPeer::DELIVERY_PRICE, $deliveryPrice['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::DELIVERY_PRICE, $deliveryPrice, $comparison);
	}

	/**
	 * Filter the query on the payment_method column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPaymentMethod(1234); // WHERE payment_method = 1234
	 * $query->filterByPaymentMethod(array(12, 34)); // WHERE payment_method IN (12, 34)
	 * $query->filterByPaymentMethod(array('min' => 12)); // WHERE payment_method > 12
	 * </code>
	 *
	 * @see       filterBySPaymentMethods()
	 *
	 * @param     mixed $paymentMethod The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByPaymentMethod($paymentMethod = null, $comparison = null)
	{
		if (is_array($paymentMethod)) {
			$useMinMax = false;
			if (isset($paymentMethod['min'])) {
				$this->addUsingAlias(SOrdersPeer::PAYMENT_METHOD, $paymentMethod['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($paymentMethod['max'])) {
				$this->addUsingAlias(SOrdersPeer::PAYMENT_METHOD, $paymentMethod['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::PAYMENT_METHOD, $paymentMethod, $comparison);
	}

	/**
	 * Filter the query on the status column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStatus(1234); // WHERE status = 1234
	 * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
	 * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
	 * </code>
	 *
	 * @see       filterBySOrderStatuses()
	 *
	 * @param     mixed $status The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(SOrdersPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(SOrdersPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the paid column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPaid(true); // WHERE paid = true
	 * $query->filterByPaid('yes'); // WHERE paid = true
	 * </code>
	 *
	 * @param     boolean|string $paid The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByPaid($paid = null, $comparison = null)
	{
		if (is_string($paid)) {
			$paid = in_array(strtolower($paid), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SOrdersPeer::PAID, $paid, $comparison);
	}

	/**
	 * Filter the query on the user_full_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserFullName('fooValue');   // WHERE user_full_name = 'fooValue'
	 * $query->filterByUserFullName('%fooValue%'); // WHERE user_full_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $userFullName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByUserFullName($userFullName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userFullName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userFullName)) {
				$userFullName = str_replace('*', '%', $userFullName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::USER_FULL_NAME, $userFullName, $comparison);
	}

	/**
	 * Filter the query on the user_email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserEmail('fooValue');   // WHERE user_email = 'fooValue'
	 * $query->filterByUserEmail('%fooValue%'); // WHERE user_email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $userEmail The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByUserEmail($userEmail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userEmail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userEmail)) {
				$userEmail = str_replace('*', '%', $userEmail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::USER_EMAIL, $userEmail, $comparison);
	}

	/**
	 * Filter the query on the user_phone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserPhone('fooValue');   // WHERE user_phone = 'fooValue'
	 * $query->filterByUserPhone('%fooValue%'); // WHERE user_phone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $userPhone The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByUserPhone($userPhone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userPhone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userPhone)) {
				$userPhone = str_replace('*', '%', $userPhone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::USER_PHONE, $userPhone, $comparison);
	}

	/**
	 * Filter the query on the user_deliver_to column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserDeliverTo('fooValue');   // WHERE user_deliver_to = 'fooValue'
	 * $query->filterByUserDeliverTo('%fooValue%'); // WHERE user_deliver_to LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $userDeliverTo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByUserDeliverTo($userDeliverTo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userDeliverTo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userDeliverTo)) {
				$userDeliverTo = str_replace('*', '%', $userDeliverTo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::USER_DELIVER_TO, $userDeliverTo, $comparison);
	}

	/**
	 * Filter the query on the user_comment column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserComment('fooValue');   // WHERE user_comment = 'fooValue'
	 * $query->filterByUserComment('%fooValue%'); // WHERE user_comment LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $userComment The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByUserComment($userComment = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userComment)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userComment)) {
				$userComment = str_replace('*', '%', $userComment);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::USER_COMMENT, $userComment, $comparison);
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
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByDateCreated($dateCreated = null, $comparison = null)
	{
		if (is_array($dateCreated)) {
			$useMinMax = false;
			if (isset($dateCreated['min'])) {
				$this->addUsingAlias(SOrdersPeer::DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateCreated['max'])) {
				$this->addUsingAlias(SOrdersPeer::DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::DATE_CREATED, $dateCreated, $comparison);
	}

	/**
	 * Filter the query on the date_updated column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDateUpdated(1234); // WHERE date_updated = 1234
	 * $query->filterByDateUpdated(array(12, 34)); // WHERE date_updated IN (12, 34)
	 * $query->filterByDateUpdated(array('min' => 12)); // WHERE date_updated > 12
	 * </code>
	 *
	 * @param     mixed $dateUpdated The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByDateUpdated($dateUpdated = null, $comparison = null)
	{
		if (is_array($dateUpdated)) {
			$useMinMax = false;
			if (isset($dateUpdated['min'])) {
				$this->addUsingAlias(SOrdersPeer::DATE_UPDATED, $dateUpdated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateUpdated['max'])) {
				$this->addUsingAlias(SOrdersPeer::DATE_UPDATED, $dateUpdated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::DATE_UPDATED, $dateUpdated, $comparison);
	}

	/**
	 * Filter the query on the user_ip column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserIp('fooValue');   // WHERE user_ip = 'fooValue'
	 * $query->filterByUserIp('%fooValue%'); // WHERE user_ip LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $userIp The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByUserIp($userIp = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userIp)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userIp)) {
				$userIp = str_replace('*', '%', $userIp);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::USER_IP, $userIp, $comparison);
	}

	/**
	 * Filter the query on the total_price column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTotalPrice(1234); // WHERE total_price = 1234
	 * $query->filterByTotalPrice(array(12, 34)); // WHERE total_price IN (12, 34)
	 * $query->filterByTotalPrice(array('min' => 12)); // WHERE total_price > 12
	 * </code>
	 *
	 * @param     mixed $totalPrice The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByTotalPrice($totalPrice = null, $comparison = null)
	{
		if (is_array($totalPrice)) {
			$useMinMax = false;
			if (isset($totalPrice['min'])) {
				$this->addUsingAlias(SOrdersPeer::TOTAL_PRICE, $totalPrice['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($totalPrice['max'])) {
				$this->addUsingAlias(SOrdersPeer::TOTAL_PRICE, $totalPrice['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::TOTAL_PRICE, $totalPrice, $comparison);
	}

	/**
	 * Filter the query on the external_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByExternalId('fooValue');   // WHERE external_id = 'fooValue'
	 * $query->filterByExternalId('%fooValue%'); // WHERE external_id LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $externalId The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByExternalId($externalId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($externalId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $externalId)) {
				$externalId = str_replace('*', '%', $externalId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::EXTERNAL_ID, $externalId, $comparison);
	}

	/**
	 * Filter the query on the gift_cert_key column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByGiftCertKey('fooValue');   // WHERE gift_cert_key = 'fooValue'
	 * $query->filterByGiftCertKey('%fooValue%'); // WHERE gift_cert_key LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $giftCertKey The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByGiftCertKey($giftCertKey = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($giftCertKey)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $giftCertKey)) {
				$giftCertKey = str_replace('*', '%', $giftCertKey);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::GIFT_CERT_KEY, $giftCertKey, $comparison);
	}

	/**
	 * Filter the query on the discount column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDiscount(1234); // WHERE discount = 1234
	 * $query->filterByDiscount(array(12, 34)); // WHERE discount IN (12, 34)
	 * $query->filterByDiscount(array('min' => 12)); // WHERE discount > 12
	 * </code>
	 *
	 * @param     mixed $discount The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByDiscount($discount = null, $comparison = null)
	{
		if (is_array($discount)) {
			$useMinMax = false;
			if (isset($discount['min'])) {
				$this->addUsingAlias(SOrdersPeer::DISCOUNT, $discount['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($discount['max'])) {
				$this->addUsingAlias(SOrdersPeer::DISCOUNT, $discount['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::DISCOUNT, $discount, $comparison);
	}

	/**
	 * Filter the query on the gift_cert_price column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByGiftCertPrice(1234); // WHERE gift_cert_price = 1234
	 * $query->filterByGiftCertPrice(array(12, 34)); // WHERE gift_cert_price IN (12, 34)
	 * $query->filterByGiftCertPrice(array('min' => 12)); // WHERE gift_cert_price > 12
	 * </code>
	 *
	 * @param     mixed $giftCertPrice The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByGiftCertPrice($giftCertPrice = null, $comparison = null)
	{
		if (is_array($giftCertPrice)) {
			$useMinMax = false;
			if (isset($giftCertPrice['min'])) {
				$this->addUsingAlias(SOrdersPeer::GIFT_CERT_PRICE, $giftCertPrice['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($giftCertPrice['max'])) {
				$this->addUsingAlias(SOrdersPeer::GIFT_CERT_PRICE, $giftCertPrice['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::GIFT_CERT_PRICE, $giftCertPrice, $comparison);
	}

	/**
	 * Filter the query on the discount_info column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDiscountInfo('fooValue');   // WHERE discount_info = 'fooValue'
	 * $query->filterByDiscountInfo('%fooValue%'); // WHERE discount_info LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $discountInfo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByDiscountInfo($discountInfo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($discountInfo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $discountInfo)) {
				$discountInfo = str_replace('*', '%', $discountInfo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::DISCOUNT_INFO, $discountInfo, $comparison);
	}

	/**
	 * Filter the query on the origin_price column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOriginPrice(1234); // WHERE origin_price = 1234
	 * $query->filterByOriginPrice(array(12, 34)); // WHERE origin_price IN (12, 34)
	 * $query->filterByOriginPrice(array('min' => 12)); // WHERE origin_price > 12
	 * </code>
	 *
	 * @param     mixed $originPrice The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByOriginPrice($originPrice = null, $comparison = null)
	{
		if (is_array($originPrice)) {
			$useMinMax = false;
			if (isset($originPrice['min'])) {
				$this->addUsingAlias(SOrdersPeer::ORIGIN_PRICE, $originPrice['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($originPrice['max'])) {
				$this->addUsingAlias(SOrdersPeer::ORIGIN_PRICE, $originPrice['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::ORIGIN_PRICE, $originPrice, $comparison);
	}

	/**
	 * Filter the query on the comulativ column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByComulativ(1234); // WHERE comulativ = 1234
	 * $query->filterByComulativ(array(12, 34)); // WHERE comulativ IN (12, 34)
	 * $query->filterByComulativ(array('min' => 12)); // WHERE comulativ > 12
	 * </code>
	 *
	 * @param     mixed $comulativ The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterByComulativ($comulativ = null, $comparison = null)
	{
		if (is_array($comulativ)) {
			$useMinMax = false;
			if (isset($comulativ['min'])) {
				$this->addUsingAlias(SOrdersPeer::COMULATIV, $comulativ['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($comulativ['max'])) {
				$this->addUsingAlias(SOrdersPeer::COMULATIV, $comulativ['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SOrdersPeer::COMULATIV, $comulativ, $comparison);
	}

	/**
	 * Filter the query by a related SDeliveryMethods object
	 *
	 * @param     SDeliveryMethods|PropelCollection $sDeliveryMethods The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterBySDeliveryMethods($sDeliveryMethods, $comparison = null)
	{
		if ($sDeliveryMethods instanceof SDeliveryMethods) {
			return $this
				->addUsingAlias(SOrdersPeer::DELIVERY_METHOD, $sDeliveryMethods->getId(), $comparison);
		} elseif ($sDeliveryMethods instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SOrdersPeer::DELIVERY_METHOD, $sDeliveryMethods->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySDeliveryMethods() only accepts arguments of type SDeliveryMethods or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SDeliveryMethods relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function joinSDeliveryMethods($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SDeliveryMethods');

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
			$this->addJoinObject($join, 'SDeliveryMethods');
		}

		return $this;
	}

	/**
	 * Use the SDeliveryMethods relation SDeliveryMethods object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SDeliveryMethodsQuery A secondary query class using the current class as primary query
	 */
	public function useSDeliveryMethodsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSDeliveryMethods($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SDeliveryMethods', 'SDeliveryMethodsQuery');
	}

	/**
	 * Filter the query by a related SPaymentMethods object
	 *
	 * @param     SPaymentMethods|PropelCollection $sPaymentMethods The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterBySPaymentMethods($sPaymentMethods, $comparison = null)
	{
		if ($sPaymentMethods instanceof SPaymentMethods) {
			return $this
				->addUsingAlias(SOrdersPeer::PAYMENT_METHOD, $sPaymentMethods->getId(), $comparison);
		} elseif ($sPaymentMethods instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SOrdersPeer::PAYMENT_METHOD, $sPaymentMethods->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySPaymentMethods() only accepts arguments of type SPaymentMethods or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SPaymentMethods relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function joinSPaymentMethods($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SPaymentMethods');

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
			$this->addJoinObject($join, 'SPaymentMethods');
		}

		return $this;
	}

	/**
	 * Use the SPaymentMethods relation SPaymentMethods object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SPaymentMethodsQuery A secondary query class using the current class as primary query
	 */
	public function useSPaymentMethodsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSPaymentMethods($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SPaymentMethods', 'SPaymentMethodsQuery');
	}

	/**
	 * Filter the query by a related SOrderStatuses object
	 *
	 * @param     SOrderStatuses|PropelCollection $sOrderStatuses The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterBySOrderStatuses($sOrderStatuses, $comparison = null)
	{
		if ($sOrderStatuses instanceof SOrderStatuses) {
			return $this
				->addUsingAlias(SOrdersPeer::STATUS, $sOrderStatuses->getId(), $comparison);
		} elseif ($sOrderStatuses instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SOrdersPeer::STATUS, $sOrderStatuses->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function joinSOrderStatuses($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useSOrderStatusesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSOrderStatuses($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SOrderStatuses', 'SOrderStatusesQuery');
	}

	/**
	 * Filter the query by a related SOrderProducts object
	 *
	 * @param     SOrderProducts $sOrderProducts  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterBySOrderProducts($sOrderProducts, $comparison = null)
	{
		if ($sOrderProducts instanceof SOrderProducts) {
			return $this
				->addUsingAlias(SOrdersPeer::ID, $sOrderProducts->getOrderId(), $comparison);
		} elseif ($sOrderProducts instanceof PropelCollection) {
			return $this
				->useSOrderProductsQuery()
				->filterByPrimaryKeys($sOrderProducts->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySOrderProducts() only accepts arguments of type SOrderProducts or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SOrderProducts relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function joinSOrderProducts($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SOrderProducts');

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
			$this->addJoinObject($join, 'SOrderProducts');
		}

		return $this;
	}

	/**
	 * Use the SOrderProducts relation SOrderProducts object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SOrderProductsQuery A secondary query class using the current class as primary query
	 */
	public function useSOrderProductsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSOrderProducts($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SOrderProducts', 'SOrderProductsQuery');
	}

	/**
	 * Filter the query by a related SOrderStatusHistory object
	 *
	 * @param     SOrderStatusHistory $sOrderStatusHistory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function filterBySOrderStatusHistory($sOrderStatusHistory, $comparison = null)
	{
		if ($sOrderStatusHistory instanceof SOrderStatusHistory) {
			return $this
				->addUsingAlias(SOrdersPeer::ID, $sOrderStatusHistory->getOrderId(), $comparison);
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
	 * @return    SOrdersQuery The current query, for fluid interface
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
	 * @param     SOrders $sOrders Object to remove from the list of results
	 *
	 * @return    SOrdersQuery The current query, for fluid interface
	 */
	public function prune($sOrders = null)
	{
		if ($sOrders) {
			$this->addUsingAlias(SOrdersPeer::ID, $sOrders->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseSOrdersQuery