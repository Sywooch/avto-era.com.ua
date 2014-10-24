<?php

/**
 * Base class that represents a query for the 'shop_orders_products' table.
 *
 * 
 *
 * @method     SOrderProductsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SOrderProductsQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     SOrderProductsQuery orderByKitId($order = Criteria::ASC) Order by the kit_id column
 * @method     SOrderProductsQuery orderByIsMain($order = Criteria::ASC) Order by the is_main column
 * @method     SOrderProductsQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     SOrderProductsQuery orderByVariantId($order = Criteria::ASC) Order by the variant_id column
 * @method     SOrderProductsQuery orderByProductName($order = Criteria::ASC) Order by the product_name column
 * @method     SOrderProductsQuery orderByVariantName($order = Criteria::ASC) Order by the variant_name column
 * @method     SOrderProductsQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     SOrderProductsQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 *
 * @method     SOrderProductsQuery groupById() Group by the id column
 * @method     SOrderProductsQuery groupByOrderId() Group by the order_id column
 * @method     SOrderProductsQuery groupByKitId() Group by the kit_id column
 * @method     SOrderProductsQuery groupByIsMain() Group by the is_main column
 * @method     SOrderProductsQuery groupByProductId() Group by the product_id column
 * @method     SOrderProductsQuery groupByVariantId() Group by the variant_id column
 * @method     SOrderProductsQuery groupByProductName() Group by the product_name column
 * @method     SOrderProductsQuery groupByVariantName() Group by the variant_name column
 * @method     SOrderProductsQuery groupByPrice() Group by the price column
 * @method     SOrderProductsQuery groupByQuantity() Group by the quantity column
 *
 * @method     SOrderProductsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SOrderProductsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SOrderProductsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SOrderProductsQuery leftJoinSProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProducts relation
 * @method     SOrderProductsQuery rightJoinSProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProducts relation
 * @method     SOrderProductsQuery innerJoinSProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SProducts relation
 *
 * @method     SOrderProductsQuery leftJoinSProductVariants($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProductVariants relation
 * @method     SOrderProductsQuery rightJoinSProductVariants($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProductVariants relation
 * @method     SOrderProductsQuery innerJoinSProductVariants($relationAlias = null) Adds a INNER JOIN clause to the query using the SProductVariants relation
 *
 * @method     SOrderProductsQuery leftJoinSOrders($relationAlias = null) Adds a LEFT JOIN clause to the query using the SOrders relation
 * @method     SOrderProductsQuery rightJoinSOrders($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SOrders relation
 * @method     SOrderProductsQuery innerJoinSOrders($relationAlias = null) Adds a INNER JOIN clause to the query using the SOrders relation
 *
 * @method     SOrderProducts findOne(PropelPDO $con = null) Return the first SOrderProducts matching the query
 * @method     SOrderProducts findOneOrCreate(PropelPDO $con = null) Return the first SOrderProducts matching the query, or a new SOrderProducts object populated from the query conditions when no match is found
 *
 * @method     SOrderProducts findOneById(int $id) Return the first SOrderProducts filtered by the id column
 * @method     SOrderProducts findOneByOrderId(int $order_id) Return the first SOrderProducts filtered by the order_id column
 * @method     SOrderProducts findOneByKitId(int $kit_id) Return the first SOrderProducts filtered by the kit_id column
 * @method     SOrderProducts findOneByIsMain(boolean $is_main) Return the first SOrderProducts filtered by the is_main column
 * @method     SOrderProducts findOneByProductId(int $product_id) Return the first SOrderProducts filtered by the product_id column
 * @method     SOrderProducts findOneByVariantId(int $variant_id) Return the first SOrderProducts filtered by the variant_id column
 * @method     SOrderProducts findOneByProductName(string $product_name) Return the first SOrderProducts filtered by the product_name column
 * @method     SOrderProducts findOneByVariantName(string $variant_name) Return the first SOrderProducts filtered by the variant_name column
 * @method     SOrderProducts findOneByPrice(double $price) Return the first SOrderProducts filtered by the price column
 * @method     SOrderProducts findOneByQuantity(int $quantity) Return the first SOrderProducts filtered by the quantity column
 *
 * @method     array findById(int $id) Return SOrderProducts objects filtered by the id column
 * @method     array findByOrderId(int $order_id) Return SOrderProducts objects filtered by the order_id column
 * @method     array findByKitId(int $kit_id) Return SOrderProducts objects filtered by the kit_id column
 * @method     array findByIsMain(boolean $is_main) Return SOrderProducts objects filtered by the is_main column
 * @method     array findByProductId(int $product_id) Return SOrderProducts objects filtered by the product_id column
 * @method     array findByVariantId(int $variant_id) Return SOrderProducts objects filtered by the variant_id column
 * @method     array findByProductName(string $product_name) Return SOrderProducts objects filtered by the product_name column
 * @method     array findByVariantName(string $variant_name) Return SOrderProducts objects filtered by the variant_name column
 * @method     array findByPrice(double $price) Return SOrderProducts objects filtered by the price column
 * @method     array findByQuantity(int $quantity) Return SOrderProducts objects filtered by the quantity column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSOrderProductsQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseSOrderProductsQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SOrderProducts', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new SOrderProductsQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return SOrderProductsQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof SOrderProductsQuery) {
			return $criteria;
		}
		$query = new SOrderProductsQuery ();
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
	 * @return SOrderProducts|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SOrderProductsPeer::getInstanceFromPool ( ( string ) $key ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( SOrderProductsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return SOrderProducts A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `ID`, `ORDER_ID`, `KIT_ID`, `IS_MAIN`, `PRODUCT_ID`, `VARIANT_ID`, `PRODUCT_NAME`, `VARIANT_NAME`, `PRICE`, `QUANTITY` FROM `shop_orders_products` WHERE `ID` = :p0';
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
			$obj = new SOrderProducts ();
			$obj->hydrate ( $row );
			SOrderProductsPeer::addInstanceToPool ( $obj, ( string ) $key );
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
	 * @return SOrderProducts|array|mixed the result, formatted by the current formatter
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
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		return $this->addUsingAlias ( SOrderProductsPeer::ID, $key, Criteria::EQUAL );
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		return $this->addUsingAlias ( SOrderProductsPeer::ID, $keys, Criteria::IN );
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
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null) {
		if (is_array ( $id ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( SOrderProductsPeer::ID, $id, $comparison );
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
	 * @see filterBySOrders()
	 *
	 * @param mixed $orderId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function filterByOrderId($orderId = null, $comparison = null) {
		if (is_array ( $orderId )) {
			$useMinMax = false;
			if (isset ( $orderId ['min'] )) {
				$this->addUsingAlias ( SOrderProductsPeer::ORDER_ID, $orderId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $orderId ['max'] )) {
				$this->addUsingAlias ( SOrderProductsPeer::ORDER_ID, $orderId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SOrderProductsPeer::ORDER_ID, $orderId, $comparison );
	}
	
	/**
	 * Filter the query on the kit_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByKitId(1234); // WHERE kit_id = 1234
	 * $query->filterByKitId(array(12, 34)); // WHERE kit_id IN (12, 34)
	 * $query->filterByKitId(array('min' => 12)); // WHERE kit_id > 12
	 * </code>
	 *
	 * @param mixed $kitId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function filterByKitId($kitId = null, $comparison = null) {
		if (is_array ( $kitId )) {
			$useMinMax = false;
			if (isset ( $kitId ['min'] )) {
				$this->addUsingAlias ( SOrderProductsPeer::KIT_ID, $kitId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $kitId ['max'] )) {
				$this->addUsingAlias ( SOrderProductsPeer::KIT_ID, $kitId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SOrderProductsPeer::KIT_ID, $kitId, $comparison );
	}
	
	/**
	 * Filter the query on the is_main column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIsMain(true); // WHERE is_main = true
	 * $query->filterByIsMain('yes'); // WHERE is_main = true
	 * </code>
	 *
	 * @param boolean|string $isMain
	 *        	The value to use as filter.
	 *        	Non-boolean arguments are converted using the following rules:
	 *        	* 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 *        	* 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 *        	Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function filterByIsMain($isMain = null, $comparison = null) {
		if (is_string ( $isMain )) {
			$is_main = in_array ( strtolower ( $isMain ), array (
					'false',
					'off',
					'-',
					'no',
					'n',
					'0',
					'' 
			) ) ? false : true;
		}
		return $this->addUsingAlias ( SOrderProductsPeer::IS_MAIN, $isMain, $comparison );
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
	 * @see filterBySProducts()
	 *
	 * @param mixed $productId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function filterByProductId($productId = null, $comparison = null) {
		if (is_array ( $productId )) {
			$useMinMax = false;
			if (isset ( $productId ['min'] )) {
				$this->addUsingAlias ( SOrderProductsPeer::PRODUCT_ID, $productId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $productId ['max'] )) {
				$this->addUsingAlias ( SOrderProductsPeer::PRODUCT_ID, $productId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SOrderProductsPeer::PRODUCT_ID, $productId, $comparison );
	}
	
	/**
	 * Filter the query on the variant_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByVariantId(1234); // WHERE variant_id = 1234
	 * $query->filterByVariantId(array(12, 34)); // WHERE variant_id IN (12, 34)
	 * $query->filterByVariantId(array('min' => 12)); // WHERE variant_id > 12
	 * </code>
	 *
	 * @see filterBySProductVariants()
	 *
	 * @param mixed $variantId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function filterByVariantId($variantId = null, $comparison = null) {
		if (is_array ( $variantId )) {
			$useMinMax = false;
			if (isset ( $variantId ['min'] )) {
				$this->addUsingAlias ( SOrderProductsPeer::VARIANT_ID, $variantId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $variantId ['max'] )) {
				$this->addUsingAlias ( SOrderProductsPeer::VARIANT_ID, $variantId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SOrderProductsPeer::VARIANT_ID, $variantId, $comparison );
	}
	
	/**
	 * Filter the query on the product_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByProductName('fooValue'); // WHERE product_name = 'fooValue'
	 * $query->filterByProductName('%fooValue%'); // WHERE product_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $productName
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function filterByProductName($productName = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $productName )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $productName )) {
				$productName = str_replace ( '*', '%', $productName );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SOrderProductsPeer::PRODUCT_NAME, $productName, $comparison );
	}
	
	/**
	 * Filter the query on the variant_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByVariantName('fooValue'); // WHERE variant_name = 'fooValue'
	 * $query->filterByVariantName('%fooValue%'); // WHERE variant_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $variantName
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function filterByVariantName($variantName = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $variantName )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $variantName )) {
				$variantName = str_replace ( '*', '%', $variantName );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SOrderProductsPeer::VARIANT_NAME, $variantName, $comparison );
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
	 * @param mixed $price
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function filterByPrice($price = null, $comparison = null) {
		if (is_array ( $price )) {
			$useMinMax = false;
			if (isset ( $price ['min'] )) {
				$this->addUsingAlias ( SOrderProductsPeer::PRICE, $price ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $price ['max'] )) {
				$this->addUsingAlias ( SOrderProductsPeer::PRICE, $price ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SOrderProductsPeer::PRICE, $price, $comparison );
	}
	
	/**
	 * Filter the query on the quantity column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByQuantity(1234); // WHERE quantity = 1234
	 * $query->filterByQuantity(array(12, 34)); // WHERE quantity IN (12, 34)
	 * $query->filterByQuantity(array('min' => 12)); // WHERE quantity > 12
	 * </code>
	 *
	 * @param mixed $quantity
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function filterByQuantity($quantity = null, $comparison = null) {
		if (is_array ( $quantity )) {
			$useMinMax = false;
			if (isset ( $quantity ['min'] )) {
				$this->addUsingAlias ( SOrderProductsPeer::QUANTITY, $quantity ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $quantity ['max'] )) {
				$this->addUsingAlias ( SOrderProductsPeer::QUANTITY, $quantity ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SOrderProductsPeer::QUANTITY, $quantity, $comparison );
	}
	
	/**
	 * Filter the query by a related SProducts object
	 *
	 * @param SProducts|PropelCollection $sProducts
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function filterBySProducts($sProducts, $comparison = null) {
		if ($sProducts instanceof SProducts) {
			return $this->addUsingAlias ( SOrderProductsPeer::PRODUCT_ID, $sProducts->getId (), $comparison );
		} elseif ($sProducts instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( SOrderProductsPeer::PRODUCT_ID, $sProducts->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
		} else {
			throw new PropelException ( 'filterBySProducts() only accepts arguments of type SProducts or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SProducts relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function joinSProducts($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SProducts' );
		
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
			$this->addJoinObject ( $join, 'SProducts' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SProducts relation SProducts object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SProductsQuery A secondary query class using the current class as primary query
	 */
	public function useSProductsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinSProducts ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SProducts', 'SProductsQuery' );
	}
	
	/**
	 * Filter the query by a related SProductVariants object
	 *
	 * @param SProductVariants|PropelCollection $sProductVariants
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function filterBySProductVariants($sProductVariants, $comparison = null) {
		if ($sProductVariants instanceof SProductVariants) {
			return $this->addUsingAlias ( SOrderProductsPeer::VARIANT_ID, $sProductVariants->getId (), $comparison );
		} elseif ($sProductVariants instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( SOrderProductsPeer::VARIANT_ID, $sProductVariants->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
		} else {
			throw new PropelException ( 'filterBySProductVariants() only accepts arguments of type SProductVariants or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SProductVariants relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function joinSProductVariants($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SProductVariants' );
		
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
			$this->addJoinObject ( $join, 'SProductVariants' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SProductVariants relation SProductVariants object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SProductVariantsQuery A secondary query class using the current class as primary query
	 */
	public function useSProductVariantsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinSProductVariants ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SProductVariants', 'SProductVariantsQuery' );
	}
	
	/**
	 * Filter the query by a related SOrders object
	 *
	 * @param SOrders|PropelCollection $sOrders
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function filterBySOrders($sOrders, $comparison = null) {
		if ($sOrders instanceof SOrders) {
			return $this->addUsingAlias ( SOrderProductsPeer::ORDER_ID, $sOrders->getId (), $comparison );
		} elseif ($sOrders instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( SOrderProductsPeer::ORDER_ID, $sOrders->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
		} else {
			throw new PropelException ( 'filterBySOrders() only accepts arguments of type SOrders or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SOrders relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function joinSOrders($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SOrders' );
		
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
			$this->addJoinObject ( $join, 'SOrders' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SOrders relation SOrders object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SOrdersQuery A secondary query class using the current class as primary query
	 */
	public function useSOrdersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinSOrders ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SOrders', 'SOrdersQuery' );
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param SOrderProducts $sOrderProducts
	 *        	Object to remove from the list of results
	 *        	
	 * @return SOrderProductsQuery The current query, for fluid interface
	 */
	public function prune($sOrderProducts = null) {
		if ($sOrderProducts) {
			$this->addUsingAlias ( SOrderProductsPeer::ID, $sOrderProducts->getId (), Criteria::NOT_EQUAL );
		}
		
		return $this;
	}
} // BaseSOrderProductsQuery