<?php


/**
 * Base class that represents a query for the 'shop_products' table.
 *
 * 
 *
 * @method     SProductsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SProductsQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     SProductsQuery orderByExternalId($order = Criteria::ASC) Order by the external_id column
 * @method     SProductsQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     SProductsQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     SProductsQuery orderByHit($order = Criteria::ASC) Order by the hit column
 * @method     SProductsQuery orderByHot($order = Criteria::ASC) Order by the hot column
 * @method     SProductsQuery orderByAction($order = Criteria::ASC) Order by the action column
 * @method     SProductsQuery orderByBrandId($order = Criteria::ASC) Order by the brand_id column
 * @method     SProductsQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     SProductsQuery orderByRelatedProducts($order = Criteria::ASC) Order by the related_products column
 * @method     SProductsQuery orderByMainimage($order = Criteria::ASC) Order by the mainImage column
 * @method     SProductsQuery orderByMainmodimage($order = Criteria::ASC) Order by the mainModImage column
 * @method     SProductsQuery orderBySmallimage($order = Criteria::ASC) Order by the smallImage column
 * @method     SProductsQuery orderBySmallmodimage($order = Criteria::ASC) Order by the smallModImage column
 * @method     SProductsQuery orderByOldPrice($order = Criteria::ASC) Order by the old_price column
 * @method     SProductsQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     SProductsQuery orderByUpdated($order = Criteria::ASC) Order by the updated column
 * @method     SProductsQuery orderByViews($order = Criteria::ASC) Order by the views column
 * @method     SProductsQuery orderByAddedToCartCount($order = Criteria::ASC) Order by the added_to_cart_count column
 * @method     SProductsQuery orderByEnableComments($order = Criteria::ASC) Order by the enable_comments column
 * @method     SProductsQuery orderByTpl($order = Criteria::ASC) Order by the tpl column
 *
 * @method     SProductsQuery groupById() Group by the id column
 * @method     SProductsQuery groupByUserId() Group by the user_id column
 * @method     SProductsQuery groupByExternalId() Group by the external_id column
 * @method     SProductsQuery groupByUrl() Group by the url column
 * @method     SProductsQuery groupByActive() Group by the active column
 * @method     SProductsQuery groupByHit() Group by the hit column
 * @method     SProductsQuery groupByHot() Group by the hot column
 * @method     SProductsQuery groupByAction() Group by the action column
 * @method     SProductsQuery groupByBrandId() Group by the brand_id column
 * @method     SProductsQuery groupByCategoryId() Group by the category_id column
 * @method     SProductsQuery groupByRelatedProducts() Group by the related_products column
 * @method     SProductsQuery groupByMainimage() Group by the mainImage column
 * @method     SProductsQuery groupByMainmodimage() Group by the mainModImage column
 * @method     SProductsQuery groupBySmallimage() Group by the smallImage column
 * @method     SProductsQuery groupBySmallmodimage() Group by the smallModImage column
 * @method     SProductsQuery groupByOldPrice() Group by the old_price column
 * @method     SProductsQuery groupByCreated() Group by the created column
 * @method     SProductsQuery groupByUpdated() Group by the updated column
 * @method     SProductsQuery groupByViews() Group by the views column
 * @method     SProductsQuery groupByAddedToCartCount() Group by the added_to_cart_count column
 * @method     SProductsQuery groupByEnableComments() Group by the enable_comments column
 * @method     SProductsQuery groupByTpl() Group by the tpl column
 *
 * @method     SProductsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SProductsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SProductsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SProductsQuery leftJoinBrand($relationAlias = null) Adds a LEFT JOIN clause to the query using the Brand relation
 * @method     SProductsQuery rightJoinBrand($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Brand relation
 * @method     SProductsQuery innerJoinBrand($relationAlias = null) Adds a INNER JOIN clause to the query using the Brand relation
 *
 * @method     SProductsQuery leftJoinMainCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the MainCategory relation
 * @method     SProductsQuery rightJoinMainCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MainCategory relation
 * @method     SProductsQuery innerJoinMainCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the MainCategory relation
 *
 * @method     SProductsQuery leftJoinShopKit($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShopKit relation
 * @method     SProductsQuery rightJoinShopKit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShopKit relation
 * @method     SProductsQuery innerJoinShopKit($relationAlias = null) Adds a INNER JOIN clause to the query using the ShopKit relation
 *
 * @method     SProductsQuery leftJoinShopKitProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShopKitProduct relation
 * @method     SProductsQuery rightJoinShopKitProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShopKitProduct relation
 * @method     SProductsQuery innerJoinShopKitProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the ShopKitProduct relation
 *
 * @method     SProductsQuery leftJoinSProductsI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProductsI18n relation
 * @method     SProductsQuery rightJoinSProductsI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProductsI18n relation
 * @method     SProductsQuery innerJoinSProductsI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the SProductsI18n relation
 *
 * @method     SProductsQuery leftJoinSProductImages($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProductImages relation
 * @method     SProductsQuery rightJoinSProductImages($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProductImages relation
 * @method     SProductsQuery innerJoinSProductImages($relationAlias = null) Adds a INNER JOIN clause to the query using the SProductImages relation
 *
 * @method     SProductsQuery leftJoinProductVariant($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductVariant relation
 * @method     SProductsQuery rightJoinProductVariant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductVariant relation
 * @method     SProductsQuery innerJoinProductVariant($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductVariant relation
 *
 * @method     SProductsQuery leftJoinSWarehouseData($relationAlias = null) Adds a LEFT JOIN clause to the query using the SWarehouseData relation
 * @method     SProductsQuery rightJoinSWarehouseData($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SWarehouseData relation
 * @method     SProductsQuery innerJoinSWarehouseData($relationAlias = null) Adds a INNER JOIN clause to the query using the SWarehouseData relation
 *
 * @method     SProductsQuery leftJoinShopProductCategories($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShopProductCategories relation
 * @method     SProductsQuery rightJoinShopProductCategories($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShopProductCategories relation
 * @method     SProductsQuery innerJoinShopProductCategories($relationAlias = null) Adds a INNER JOIN clause to the query using the ShopProductCategories relation
 *
 * @method     SProductsQuery leftJoinSProductPropertiesData($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProductPropertiesData relation
 * @method     SProductsQuery rightJoinSProductPropertiesData($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProductPropertiesData relation
 * @method     SProductsQuery innerJoinSProductPropertiesData($relationAlias = null) Adds a INNER JOIN clause to the query using the SProductPropertiesData relation
 *
 * @method     SProductsQuery leftJoinSNotifications($relationAlias = null) Adds a LEFT JOIN clause to the query using the SNotifications relation
 * @method     SProductsQuery rightJoinSNotifications($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SNotifications relation
 * @method     SProductsQuery innerJoinSNotifications($relationAlias = null) Adds a INNER JOIN clause to the query using the SNotifications relation
 *
 * @method     SProductsQuery leftJoinSOrderProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SOrderProducts relation
 * @method     SProductsQuery rightJoinSOrderProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SOrderProducts relation
 * @method     SProductsQuery innerJoinSOrderProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SOrderProducts relation
 *
 * @method     SProductsQuery leftJoinSProductsRating($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProductsRating relation
 * @method     SProductsQuery rightJoinSProductsRating($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProductsRating relation
 * @method     SProductsQuery innerJoinSProductsRating($relationAlias = null) Adds a INNER JOIN clause to the query using the SProductsRating relation
 *
 * @method     SProducts findOne(PropelPDO $con = null) Return the first SProducts matching the query
 * @method     SProducts findOneOrCreate(PropelPDO $con = null) Return the first SProducts matching the query, or a new SProducts object populated from the query conditions when no match is found
 *
 * @method     SProducts findOneById(int $id) Return the first SProducts filtered by the id column
 * @method     SProducts findOneByUserId(int $user_id) Return the first SProducts filtered by the user_id column
 * @method     SProducts findOneByExternalId(string $external_id) Return the first SProducts filtered by the external_id column
 * @method     SProducts findOneByUrl(string $url) Return the first SProducts filtered by the url column
 * @method     SProducts findOneByActive(boolean $active) Return the first SProducts filtered by the active column
 * @method     SProducts findOneByHit(boolean $hit) Return the first SProducts filtered by the hit column
 * @method     SProducts findOneByHot(boolean $hot) Return the first SProducts filtered by the hot column
 * @method     SProducts findOneByAction(boolean $action) Return the first SProducts filtered by the action column
 * @method     SProducts findOneByBrandId(int $brand_id) Return the first SProducts filtered by the brand_id column
 * @method     SProducts findOneByCategoryId(int $category_id) Return the first SProducts filtered by the category_id column
 * @method     SProducts findOneByRelatedProducts(string $related_products) Return the first SProducts filtered by the related_products column
 * @method     SProducts findOneByMainimage(string $mainImage) Return the first SProducts filtered by the mainImage column
 * @method     SProducts findOneByMainmodimage(string $mainModImage) Return the first SProducts filtered by the mainModImage column
 * @method     SProducts findOneBySmallimage(string $smallImage) Return the first SProducts filtered by the smallImage column
 * @method     SProducts findOneBySmallmodimage(string $smallModImage) Return the first SProducts filtered by the smallModImage column
 * @method     SProducts findOneByOldPrice(string $old_price) Return the first SProducts filtered by the old_price column
 * @method     SProducts findOneByCreated(int $created) Return the first SProducts filtered by the created column
 * @method     SProducts findOneByUpdated(int $updated) Return the first SProducts filtered by the updated column
 * @method     SProducts findOneByViews(int $views) Return the first SProducts filtered by the views column
 * @method     SProducts findOneByAddedToCartCount(int $added_to_cart_count) Return the first SProducts filtered by the added_to_cart_count column
 * @method     SProducts findOneByEnableComments(boolean $enable_comments) Return the first SProducts filtered by the enable_comments column
 * @method     SProducts findOneByTpl(string $tpl) Return the first SProducts filtered by the tpl column
 *
 * @method     array findById(int $id) Return SProducts objects filtered by the id column
 * @method     array findByUserId(int $user_id) Return SProducts objects filtered by the user_id column
 * @method     array findByExternalId(string $external_id) Return SProducts objects filtered by the external_id column
 * @method     array findByUrl(string $url) Return SProducts objects filtered by the url column
 * @method     array findByActive(boolean $active) Return SProducts objects filtered by the active column
 * @method     array findByHit(boolean $hit) Return SProducts objects filtered by the hit column
 * @method     array findByHot(boolean $hot) Return SProducts objects filtered by the hot column
 * @method     array findByAction(boolean $action) Return SProducts objects filtered by the action column
 * @method     array findByBrandId(int $brand_id) Return SProducts objects filtered by the brand_id column
 * @method     array findByCategoryId(int $category_id) Return SProducts objects filtered by the category_id column
 * @method     array findByRelatedProducts(string $related_products) Return SProducts objects filtered by the related_products column
 * @method     array findByMainimage(string $mainImage) Return SProducts objects filtered by the mainImage column
 * @method     array findByMainmodimage(string $mainModImage) Return SProducts objects filtered by the mainModImage column
 * @method     array findBySmallimage(string $smallImage) Return SProducts objects filtered by the smallImage column
 * @method     array findBySmallmodimage(string $smallModImage) Return SProducts objects filtered by the smallModImage column
 * @method     array findByOldPrice(string $old_price) Return SProducts objects filtered by the old_price column
 * @method     array findByCreated(int $created) Return SProducts objects filtered by the created column
 * @method     array findByUpdated(int $updated) Return SProducts objects filtered by the updated column
 * @method     array findByViews(int $views) Return SProducts objects filtered by the views column
 * @method     array findByAddedToCartCount(int $added_to_cart_count) Return SProducts objects filtered by the added_to_cart_count column
 * @method     array findByEnableComments(boolean $enable_comments) Return SProducts objects filtered by the enable_comments column
 * @method     array findByTpl(string $tpl) Return SProducts objects filtered by the tpl column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSProductsQuery extends ModelCriteria
{
	
	// query_cache behavior
	protected $queryKey = '';
	protected static $cacheBackend;
				
	/**
	 * Initializes internal state of BaseSProductsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SProducts', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SProductsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SProductsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SProductsQuery) {
			return $criteria;
		}
		$query = new SProductsQuery();
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
	 * @return    SProducts|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SProductsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SProductsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    SProducts A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USER_ID`, `EXTERNAL_ID`, `URL`, `ACTIVE`, `HIT`, `HOT`, `ACTION`, `BRAND_ID`, `CATEGORY_ID`, `RELATED_PRODUCTS`, `MAINIMAGE`, `MAINMODIMAGE`, `SMALLIMAGE`, `SMALLMODIMAGE`, `OLD_PRICE`, `CREATED`, `UPDATED`, `VIEWS`, `ADDED_TO_CART_COUNT`, `ENABLE_COMMENTS`, `TPL` FROM `shop_products` WHERE `ID` = :p0';
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
			$obj = new SProducts();
			$obj->hydrate($row);
			SProductsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    SProducts|array|mixed the result, formatted by the current formatter
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
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SProductsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SProductsPeer::ID, $keys, Criteria::IN);
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
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SProductsPeer::ID, $id, $comparison);
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
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId)) {
			$useMinMax = false;
			if (isset($userId['min'])) {
				$this->addUsingAlias(SProductsPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userId['max'])) {
				$this->addUsingAlias(SProductsPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductsPeer::USER_ID, $userId, $comparison);
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
	 * @return    SProductsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SProductsPeer::EXTERNAL_ID, $externalId, $comparison);
	}

	/**
	 * Filter the query on the url column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
	 * $query->filterByUrl('%fooValue%'); // WHERE url LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $url The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByUrl($url = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($url)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $url)) {
				$url = str_replace('*', '%', $url);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsPeer::URL, $url, $comparison);
	}

	/**
	 * Filter the query on the active column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActive(true); // WHERE active = true
	 * $query->filterByActive('yes'); // WHERE active = true
	 * </code>
	 *
	 * @param     boolean|string $active The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SProductsPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query on the hit column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHit(true); // WHERE hit = true
	 * $query->filterByHit('yes'); // WHERE hit = true
	 * </code>
	 *
	 * @param     boolean|string $hit The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByHit($hit = null, $comparison = null)
	{
		if (is_string($hit)) {
			$hit = in_array(strtolower($hit), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SProductsPeer::HIT, $hit, $comparison);
	}

	/**
	 * Filter the query on the hot column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHot(true); // WHERE hot = true
	 * $query->filterByHot('yes'); // WHERE hot = true
	 * </code>
	 *
	 * @param     boolean|string $hot The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByHot($hot = null, $comparison = null)
	{
		if (is_string($hot)) {
			$hot = in_array(strtolower($hot), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SProductsPeer::HOT, $hot, $comparison);
	}

	/**
	 * Filter the query on the action column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAction(true); // WHERE action = true
	 * $query->filterByAction('yes'); // WHERE action = true
	 * </code>
	 *
	 * @param     boolean|string $action The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByAction($action = null, $comparison = null)
	{
		if (is_string($action)) {
			$action = in_array(strtolower($action), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SProductsPeer::ACTION, $action, $comparison);
	}

	/**
	 * Filter the query on the brand_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByBrandId(1234); // WHERE brand_id = 1234
	 * $query->filterByBrandId(array(12, 34)); // WHERE brand_id IN (12, 34)
	 * $query->filterByBrandId(array('min' => 12)); // WHERE brand_id > 12
	 * </code>
	 *
	 * @see       filterByBrand()
	 *
	 * @param     mixed $brandId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByBrandId($brandId = null, $comparison = null)
	{
		if (is_array($brandId)) {
			$useMinMax = false;
			if (isset($brandId['min'])) {
				$this->addUsingAlias(SProductsPeer::BRAND_ID, $brandId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($brandId['max'])) {
				$this->addUsingAlias(SProductsPeer::BRAND_ID, $brandId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductsPeer::BRAND_ID, $brandId, $comparison);
	}

	/**
	 * Filter the query on the category_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCategoryId(1234); // WHERE category_id = 1234
	 * $query->filterByCategoryId(array(12, 34)); // WHERE category_id IN (12, 34)
	 * $query->filterByCategoryId(array('min' => 12)); // WHERE category_id > 12
	 * </code>
	 *
	 * @see       filterByMainCategory()
	 *
	 * @param     mixed $categoryId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByCategoryId($categoryId = null, $comparison = null)
	{
		if (is_array($categoryId)) {
			$useMinMax = false;
			if (isset($categoryId['min'])) {
				$this->addUsingAlias(SProductsPeer::CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($categoryId['max'])) {
				$this->addUsingAlias(SProductsPeer::CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductsPeer::CATEGORY_ID, $categoryId, $comparison);
	}

	/**
	 * Filter the query on the related_products column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRelatedProducts('fooValue');   // WHERE related_products = 'fooValue'
	 * $query->filterByRelatedProducts('%fooValue%'); // WHERE related_products LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $relatedProducts The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByRelatedProducts($relatedProducts = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($relatedProducts)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $relatedProducts)) {
				$relatedProducts = str_replace('*', '%', $relatedProducts);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsPeer::RELATED_PRODUCTS, $relatedProducts, $comparison);
	}

	/**
	 * Filter the query on the mainImage column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMainimage('fooValue');   // WHERE mainImage = 'fooValue'
	 * $query->filterByMainimage('%fooValue%'); // WHERE mainImage LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $mainimage The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByMainimage($mainimage = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($mainimage)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $mainimage)) {
				$mainimage = str_replace('*', '%', $mainimage);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsPeer::MAINIMAGE, $mainimage, $comparison);
	}

	/**
	 * Filter the query on the mainModImage column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMainmodimage('fooValue');   // WHERE mainModImage = 'fooValue'
	 * $query->filterByMainmodimage('%fooValue%'); // WHERE mainModImage LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $mainmodimage The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByMainmodimage($mainmodimage = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($mainmodimage)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $mainmodimage)) {
				$mainmodimage = str_replace('*', '%', $mainmodimage);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsPeer::MAINMODIMAGE, $mainmodimage, $comparison);
	}

	/**
	 * Filter the query on the smallImage column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySmallimage('fooValue');   // WHERE smallImage = 'fooValue'
	 * $query->filterBySmallimage('%fooValue%'); // WHERE smallImage LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $smallimage The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterBySmallimage($smallimage = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($smallimage)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $smallimage)) {
				$smallimage = str_replace('*', '%', $smallimage);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsPeer::SMALLIMAGE, $smallimage, $comparison);
	}

	/**
	 * Filter the query on the smallModImage column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySmallmodimage('fooValue');   // WHERE smallModImage = 'fooValue'
	 * $query->filterBySmallmodimage('%fooValue%'); // WHERE smallModImage LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $smallmodimage The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterBySmallmodimage($smallmodimage = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($smallmodimage)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $smallmodimage)) {
				$smallmodimage = str_replace('*', '%', $smallmodimage);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsPeer::SMALLMODIMAGE, $smallmodimage, $comparison);
	}

	/**
	 * Filter the query on the old_price column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOldPrice(1234); // WHERE old_price = 1234
	 * $query->filterByOldPrice(array(12, 34)); // WHERE old_price IN (12, 34)
	 * $query->filterByOldPrice(array('min' => 12)); // WHERE old_price > 12
	 * </code>
	 *
	 * @param     mixed $oldPrice The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByOldPrice($oldPrice = null, $comparison = null)
	{
		if (is_array($oldPrice)) {
			$useMinMax = false;
			if (isset($oldPrice['min'])) {
				$this->addUsingAlias(SProductsPeer::OLD_PRICE, $oldPrice['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($oldPrice['max'])) {
				$this->addUsingAlias(SProductsPeer::OLD_PRICE, $oldPrice['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductsPeer::OLD_PRICE, $oldPrice, $comparison);
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
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByCreated($created = null, $comparison = null)
	{
		if (is_array($created)) {
			$useMinMax = false;
			if (isset($created['min'])) {
				$this->addUsingAlias(SProductsPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($created['max'])) {
				$this->addUsingAlias(SProductsPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductsPeer::CREATED, $created, $comparison);
	}

	/**
	 * Filter the query on the updated column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUpdated(1234); // WHERE updated = 1234
	 * $query->filterByUpdated(array(12, 34)); // WHERE updated IN (12, 34)
	 * $query->filterByUpdated(array('min' => 12)); // WHERE updated > 12
	 * </code>
	 *
	 * @param     mixed $updated The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByUpdated($updated = null, $comparison = null)
	{
		if (is_array($updated)) {
			$useMinMax = false;
			if (isset($updated['min'])) {
				$this->addUsingAlias(SProductsPeer::UPDATED, $updated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updated['max'])) {
				$this->addUsingAlias(SProductsPeer::UPDATED, $updated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductsPeer::UPDATED, $updated, $comparison);
	}

	/**
	 * Filter the query on the views column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByViews(1234); // WHERE views = 1234
	 * $query->filterByViews(array(12, 34)); // WHERE views IN (12, 34)
	 * $query->filterByViews(array('min' => 12)); // WHERE views > 12
	 * </code>
	 *
	 * @param     mixed $views The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByViews($views = null, $comparison = null)
	{
		if (is_array($views)) {
			$useMinMax = false;
			if (isset($views['min'])) {
				$this->addUsingAlias(SProductsPeer::VIEWS, $views['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($views['max'])) {
				$this->addUsingAlias(SProductsPeer::VIEWS, $views['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductsPeer::VIEWS, $views, $comparison);
	}

	/**
	 * Filter the query on the added_to_cart_count column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAddedToCartCount(1234); // WHERE added_to_cart_count = 1234
	 * $query->filterByAddedToCartCount(array(12, 34)); // WHERE added_to_cart_count IN (12, 34)
	 * $query->filterByAddedToCartCount(array('min' => 12)); // WHERE added_to_cart_count > 12
	 * </code>
	 *
	 * @param     mixed $addedToCartCount The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByAddedToCartCount($addedToCartCount = null, $comparison = null)
	{
		if (is_array($addedToCartCount)) {
			$useMinMax = false;
			if (isset($addedToCartCount['min'])) {
				$this->addUsingAlias(SProductsPeer::ADDED_TO_CART_COUNT, $addedToCartCount['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($addedToCartCount['max'])) {
				$this->addUsingAlias(SProductsPeer::ADDED_TO_CART_COUNT, $addedToCartCount['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductsPeer::ADDED_TO_CART_COUNT, $addedToCartCount, $comparison);
	}

	/**
	 * Filter the query on the enable_comments column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEnableComments(true); // WHERE enable_comments = true
	 * $query->filterByEnableComments('yes'); // WHERE enable_comments = true
	 * </code>
	 *
	 * @param     boolean|string $enableComments The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByEnableComments($enableComments = null, $comparison = null)
	{
		if (is_string($enableComments)) {
			$enable_comments = in_array(strtolower($enableComments), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SProductsPeer::ENABLE_COMMENTS, $enableComments, $comparison);
	}

	/**
	 * Filter the query on the tpl column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTpl('fooValue');   // WHERE tpl = 'fooValue'
	 * $query->filterByTpl('%fooValue%'); // WHERE tpl LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $tpl The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByTpl($tpl = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tpl)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tpl)) {
				$tpl = str_replace('*', '%', $tpl);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsPeer::TPL, $tpl, $comparison);
	}

	/**
	 * Filter the query by a related SBrands object
	 *
	 * @param     SBrands|PropelCollection $sBrands The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByBrand($sBrands, $comparison = null)
	{
		if ($sBrands instanceof SBrands) {
			return $this
				->addUsingAlias(SProductsPeer::BRAND_ID, $sBrands->getId(), $comparison);
		} elseif ($sBrands instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SProductsPeer::BRAND_ID, $sBrands->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByBrand() only accepts arguments of type SBrands or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Brand relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinBrand($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Brand');

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
			$this->addJoinObject($join, 'Brand');
		}

		return $this;
	}

	/**
	 * Use the Brand relation SBrands object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SBrandsQuery A secondary query class using the current class as primary query
	 */
	public function useBrandQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinBrand($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Brand', 'SBrandsQuery');
	}

	/**
	 * Filter the query by a related SCategory object
	 *
	 * @param     SCategory|PropelCollection $sCategory The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByMainCategory($sCategory, $comparison = null)
	{
		if ($sCategory instanceof SCategory) {
			return $this
				->addUsingAlias(SProductsPeer::CATEGORY_ID, $sCategory->getId(), $comparison);
		} elseif ($sCategory instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SProductsPeer::CATEGORY_ID, $sCategory->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByMainCategory() only accepts arguments of type SCategory or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the MainCategory relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinMainCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MainCategory');

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
			$this->addJoinObject($join, 'MainCategory');
		}

		return $this;
	}

	/**
	 * Use the MainCategory relation SCategory object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SCategoryQuery A secondary query class using the current class as primary query
	 */
	public function useMainCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMainCategory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MainCategory', 'SCategoryQuery');
	}

	/**
	 * Filter the query by a related ShopKit object
	 *
	 * @param     ShopKit $shopKit  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByShopKit($shopKit, $comparison = null)
	{
		if ($shopKit instanceof ShopKit) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $shopKit->getProductId(), $comparison);
		} elseif ($shopKit instanceof PropelCollection) {
			return $this
				->useShopKitQuery()
				->filterByPrimaryKeys($shopKit->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByShopKit() only accepts arguments of type ShopKit or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ShopKit relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinShopKit($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ShopKit');

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
			$this->addJoinObject($join, 'ShopKit');
		}

		return $this;
	}

	/**
	 * Use the ShopKit relation ShopKit object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShopKitQuery A secondary query class using the current class as primary query
	 */
	public function useShopKitQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinShopKit($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ShopKit', 'ShopKitQuery');
	}

	/**
	 * Filter the query by a related ShopKitProduct object
	 *
	 * @param     ShopKitProduct $shopKitProduct  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByShopKitProduct($shopKitProduct, $comparison = null)
	{
		if ($shopKitProduct instanceof ShopKitProduct) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $shopKitProduct->getProductId(), $comparison);
		} elseif ($shopKitProduct instanceof PropelCollection) {
			return $this
				->useShopKitProductQuery()
				->filterByPrimaryKeys($shopKitProduct->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByShopKitProduct() only accepts arguments of type ShopKitProduct or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ShopKitProduct relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinShopKitProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ShopKitProduct');

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
			$this->addJoinObject($join, 'ShopKitProduct');
		}

		return $this;
	}

	/**
	 * Use the ShopKitProduct relation ShopKitProduct object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShopKitProductQuery A secondary query class using the current class as primary query
	 */
	public function useShopKitProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinShopKitProduct($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ShopKitProduct', 'ShopKitProductQuery');
	}

	/**
	 * Filter the query by a related SProductsI18n object
	 *
	 * @param     SProductsI18n $sProductsI18n  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterBySProductsI18n($sProductsI18n, $comparison = null)
	{
		if ($sProductsI18n instanceof SProductsI18n) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $sProductsI18n->getId(), $comparison);
		} elseif ($sProductsI18n instanceof PropelCollection) {
			return $this
				->useSProductsI18nQuery()
				->filterByPrimaryKeys($sProductsI18n->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySProductsI18n() only accepts arguments of type SProductsI18n or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SProductsI18n relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinSProductsI18n($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SProductsI18n');

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
			$this->addJoinObject($join, 'SProductsI18n');
		}

		return $this;
	}

	/**
	 * Use the SProductsI18n relation SProductsI18n object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsI18nQuery A secondary query class using the current class as primary query
	 */
	public function useSProductsI18nQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSProductsI18n($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SProductsI18n', 'SProductsI18nQuery');
	}

	/**
	 * Filter the query by a related SProductImages object
	 *
	 * @param     SProductImages $sProductImages  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterBySProductImages($sProductImages, $comparison = null)
	{
		if ($sProductImages instanceof SProductImages) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $sProductImages->getProductId(), $comparison);
		} elseif ($sProductImages instanceof PropelCollection) {
			return $this
				->useSProductImagesQuery()
				->filterByPrimaryKeys($sProductImages->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySProductImages() only accepts arguments of type SProductImages or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SProductImages relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinSProductImages($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SProductImages');

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
			$this->addJoinObject($join, 'SProductImages');
		}

		return $this;
	}

	/**
	 * Use the SProductImages relation SProductImages object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductImagesQuery A secondary query class using the current class as primary query
	 */
	public function useSProductImagesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSProductImages($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SProductImages', 'SProductImagesQuery');
	}

	/**
	 * Filter the query by a related SProductVariants object
	 *
	 * @param     SProductVariants $sProductVariants  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByProductVariant($sProductVariants, $comparison = null)
	{
		if ($sProductVariants instanceof SProductVariants) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $sProductVariants->getProductId(), $comparison);
		} elseif ($sProductVariants instanceof PropelCollection) {
			return $this
				->useProductVariantQuery()
				->filterByPrimaryKeys($sProductVariants->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByProductVariant() only accepts arguments of type SProductVariants or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ProductVariant relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinProductVariant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ProductVariant');

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
			$this->addJoinObject($join, 'ProductVariant');
		}

		return $this;
	}

	/**
	 * Use the ProductVariant relation SProductVariants object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductVariantsQuery A secondary query class using the current class as primary query
	 */
	public function useProductVariantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinProductVariant($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ProductVariant', 'SProductVariantsQuery');
	}

	/**
	 * Filter the query by a related SWarehouseData object
	 *
	 * @param     SWarehouseData $sWarehouseData  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterBySWarehouseData($sWarehouseData, $comparison = null)
	{
		if ($sWarehouseData instanceof SWarehouseData) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $sWarehouseData->getProductId(), $comparison);
		} elseif ($sWarehouseData instanceof PropelCollection) {
			return $this
				->useSWarehouseDataQuery()
				->filterByPrimaryKeys($sWarehouseData->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySWarehouseData() only accepts arguments of type SWarehouseData or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SWarehouseData relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinSWarehouseData($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SWarehouseData');

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
			$this->addJoinObject($join, 'SWarehouseData');
		}

		return $this;
	}

	/**
	 * Use the SWarehouseData relation SWarehouseData object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SWarehouseDataQuery A secondary query class using the current class as primary query
	 */
	public function useSWarehouseDataQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSWarehouseData($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SWarehouseData', 'SWarehouseDataQuery');
	}

	/**
	 * Filter the query by a related ShopProductCategories object
	 *
	 * @param     ShopProductCategories $shopProductCategories  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByShopProductCategories($shopProductCategories, $comparison = null)
	{
		if ($shopProductCategories instanceof ShopProductCategories) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $shopProductCategories->getProductId(), $comparison);
		} elseif ($shopProductCategories instanceof PropelCollection) {
			return $this
				->useShopProductCategoriesQuery()
				->filterByPrimaryKeys($shopProductCategories->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByShopProductCategories() only accepts arguments of type ShopProductCategories or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ShopProductCategories relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinShopProductCategories($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ShopProductCategories');

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
			$this->addJoinObject($join, 'ShopProductCategories');
		}

		return $this;
	}

	/**
	 * Use the ShopProductCategories relation ShopProductCategories object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShopProductCategoriesQuery A secondary query class using the current class as primary query
	 */
	public function useShopProductCategoriesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinShopProductCategories($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ShopProductCategories', 'ShopProductCategoriesQuery');
	}

	/**
	 * Filter the query by a related SProductPropertiesData object
	 *
	 * @param     SProductPropertiesData $sProductPropertiesData  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterBySProductPropertiesData($sProductPropertiesData, $comparison = null)
	{
		if ($sProductPropertiesData instanceof SProductPropertiesData) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $sProductPropertiesData->getProductId(), $comparison);
		} elseif ($sProductPropertiesData instanceof PropelCollection) {
			return $this
				->useSProductPropertiesDataQuery()
				->filterByPrimaryKeys($sProductPropertiesData->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySProductPropertiesData() only accepts arguments of type SProductPropertiesData or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SProductPropertiesData relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinSProductPropertiesData($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SProductPropertiesData');

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
			$this->addJoinObject($join, 'SProductPropertiesData');
		}

		return $this;
	}

	/**
	 * Use the SProductPropertiesData relation SProductPropertiesData object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductPropertiesDataQuery A secondary query class using the current class as primary query
	 */
	public function useSProductPropertiesDataQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSProductPropertiesData($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SProductPropertiesData', 'SProductPropertiesDataQuery');
	}

	/**
	 * Filter the query by a related SNotifications object
	 *
	 * @param     SNotifications $sNotifications  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterBySNotifications($sNotifications, $comparison = null)
	{
		if ($sNotifications instanceof SNotifications) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $sNotifications->getProductId(), $comparison);
		} elseif ($sNotifications instanceof PropelCollection) {
			return $this
				->useSNotificationsQuery()
				->filterByPrimaryKeys($sNotifications->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySNotifications() only accepts arguments of type SNotifications or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SNotifications relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinSNotifications($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SNotifications');

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
			$this->addJoinObject($join, 'SNotifications');
		}

		return $this;
	}

	/**
	 * Use the SNotifications relation SNotifications object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SNotificationsQuery A secondary query class using the current class as primary query
	 */
	public function useSNotificationsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSNotifications($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SNotifications', 'SNotificationsQuery');
	}

	/**
	 * Filter the query by a related SOrderProducts object
	 *
	 * @param     SOrderProducts $sOrderProducts  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterBySOrderProducts($sOrderProducts, $comparison = null)
	{
		if ($sOrderProducts instanceof SOrderProducts) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $sOrderProducts->getProductId(), $comparison);
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
	 * @return    SProductsQuery The current query, for fluid interface
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
	 * Filter the query by a related SProductsRating object
	 *
	 * @param     SProductsRating $sProductsRating  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterBySProductsRating($sProductsRating, $comparison = null)
	{
		if ($sProductsRating instanceof SProductsRating) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $sProductsRating->getProductId(), $comparison);
		} elseif ($sProductsRating instanceof PropelCollection) {
			return $this
				->useSProductsRatingQuery()
				->filterByPrimaryKeys($sProductsRating->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySProductsRating() only accepts arguments of type SProductsRating or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SProductsRating relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinSProductsRating($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SProductsRating');

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
			$this->addJoinObject($join, 'SProductsRating');
		}

		return $this;
	}

	/**
	 * Use the SProductsRating relation SProductsRating object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsRatingQuery A secondary query class using the current class as primary query
	 */
	public function useSProductsRatingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSProductsRating($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SProductsRating', 'SProductsRatingQuery');
	}

	/**
	 * Filter the query by a related SCategory object
	 * using the shop_product_categories table as cross reference
	 *
	 * @param     SCategory $sCategory the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByCategory($sCategory, $comparison = Criteria::EQUAL)
	{
		return $this
			->useShopProductCategoriesQuery()
			->filterByCategory($sCategory, $comparison)
			->endUse();
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SProducts $sProducts Object to remove from the list of results
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function prune($sProducts = null)
	{
		if ($sProducts) {
			$this->addUsingAlias(SProductsPeer::ID, $sProducts->getId(), Criteria::NOT_EQUAL);
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
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinI18n($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$relationName = $relationAlias ? $relationAlias : 'SProductsI18n';
		return $this
			->joinSProductsI18n($relationAlias, $joinType)
			->addJoinCondition($relationName, $relationName . '.Locale = ?', $locale);
	}
	
	/**
	 * Adds a JOIN clause to the query and hydrates the related I18n object.
	 * Shortcut for $c->joinI18n($locale)->with()
	 *
	 * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinWithI18n($locale = 'ru', $joinType = Criteria::LEFT_JOIN)
	{
		$this
			->joinI18n($locale, null, $joinType)
			->with('SProductsI18n');
		$this->with['SProductsI18n']->setIsWithOneToMany(false);
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
	 * @return    SProductsI18nQuery A secondary query class using the current class as primary query
	 */
	public function useI18nQuery($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinI18n($locale, $relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SProductsI18n', 'SProductsI18nQuery');
	}

	// query_cache behavior
	
	public function setQueryKey($key)
	{
		$this->queryKey = $key;
		return $this;
	}
	
	public function getQueryKey()
	{
		return $this->queryKey;
	}
	
	public function cacheContains($key)
	{
		throw new PropelException('You must override the cacheContains(), cacheStore(), and cacheFetch() methods to enable query cache');
	}
	
	public function cacheFetch($key)
	{
		throw new PropelException('You must override the cacheContains(), cacheStore(), and cacheFetch() methods to enable query cache');
	}
	
	public function cacheStore($key, $value, $lifetime = 600)
	{
		throw new PropelException('You must override the cacheContains(), cacheStore(), and cacheFetch() methods to enable query cache');
	}
	
	protected function doSelect($con)
	{
		// check that the columns of the main class are already added (if this is the primary ModelCriteria)
		if (!$this->hasSelectClause() && !$this->getPrimaryCriteria()) {
			$this->addSelfSelectColumns();
		}
		$this->configureSelectColumns();
	
		$dbMap = Propel::getDatabaseMap(SProductsPeer::DATABASE_NAME);
		$db = Propel::getDB(SProductsPeer::DATABASE_NAME);
	
		$key = $this->getQueryKey();
		if ($key && $this->cacheContains($key)) {
			$params = $this->getParams();
			$sql = $this->cacheFetch($key);
		} else {
			$params = array();
			$sql = BasePeer::createSelectSql($this, $params);
			if ($key) {
				$this->cacheStore($key, $sql);
			}
		}
	
		try {
			$stmt = $con->prepare($sql);
			$db->bindValues($stmt, $params, $dbMap);
			$stmt->execute();
			} catch (Exception $e) {
				Propel::log($e->getMessage(), Propel::LOG_ERR);
				throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
			}
	
		return $stmt;
	}
	
	protected function doCount($con)
	{
		$dbMap = Propel::getDatabaseMap($this->getDbName());
		$db = Propel::getDB($this->getDbName());
	
		$key = $this->getQueryKey();
		if ($key && $this->cacheContains($key)) {
			$params = $this->getParams();
			$sql = $this->cacheFetch($key);
		} else {
			// check that the columns of the main class are already added (if this is the primary ModelCriteria)
			if (!$this->hasSelectClause() && !$this->getPrimaryCriteria()) {
				$this->addSelfSelectColumns();
			}
	
			$this->configureSelectColumns();
	
			$needsComplexCount = $this->getGroupByColumns()
				|| $this->getOffset()
				|| $this->getLimit()
				|| $this->getHaving()
				|| in_array(Criteria::DISTINCT, $this->getSelectModifiers());
	
			$params = array();
			if ($needsComplexCount) {
				if (BasePeer::needsSelectAliases($this)) {
					if ($this->getHaving()) {
						throw new PropelException('Propel cannot create a COUNT query when using HAVING and  duplicate column names in the SELECT part');
					}
					$db->turnSelectColumnsToAliases($this);
				}
				$selectSql = BasePeer::createSelectSql($this, $params);
				$sql = 'SELECT COUNT(*) FROM (' . $selectSql . ') propelmatch4cnt';
			} else {
				// Replace SELECT columns with COUNT(*)
				$this->clearSelectColumns()->addSelectColumn('COUNT(*)');
				$sql = BasePeer::createSelectSql($this, $params);
			}
	
			if ($key) {
				$this->cacheStore($key, $sql);
			}
		}
	
		try {
			$stmt = $con->prepare($sql);
			$db->bindValues($stmt, $params, $dbMap);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute COUNT statement [%s]', $sql), $e);
		}
	
		return $stmt;
	}

} // BaseSProductsQuery