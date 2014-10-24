<?php

/**
 * Base class that represents a query for the 'shop_product_variants' table.
 *
 * 
 *
 * @method     SProductVariantsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SProductVariantsQuery orderByExternalId($order = Criteria::ASC) Order by the external_id column
 * @method     SProductVariantsQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     SProductVariantsQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     SProductVariantsQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method     SProductVariantsQuery orderByStock($order = Criteria::ASC) Order by the stock column
 * @method     SProductVariantsQuery orderByMainimage($order = Criteria::ASC) Order by the mainImage column
 * @method     SProductVariantsQuery orderBySmallimage($order = Criteria::ASC) Order by the smallImage column
 * @method     SProductVariantsQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     SProductVariantsQuery orderByCurrency($order = Criteria::ASC) Order by the currency column
 * @method     SProductVariantsQuery orderByPriceInMain($order = Criteria::ASC) Order by the price_in_main column
 *
 * @method     SProductVariantsQuery groupById() Group by the id column
 * @method     SProductVariantsQuery groupByExternalId() Group by the external_id column
 * @method     SProductVariantsQuery groupByProductId() Group by the product_id column
 * @method     SProductVariantsQuery groupByPrice() Group by the price column
 * @method     SProductVariantsQuery groupByNumber() Group by the number column
 * @method     SProductVariantsQuery groupByStock() Group by the stock column
 * @method     SProductVariantsQuery groupByMainimage() Group by the mainImage column
 * @method     SProductVariantsQuery groupBySmallimage() Group by the smallImage column
 * @method     SProductVariantsQuery groupByPosition() Group by the position column
 * @method     SProductVariantsQuery groupByCurrency() Group by the currency column
 * @method     SProductVariantsQuery groupByPriceInMain() Group by the price_in_main column
 *
 * @method     SProductVariantsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SProductVariantsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SProductVariantsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SProductVariantsQuery leftJoinSProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProducts relation
 * @method     SProductVariantsQuery rightJoinSProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProducts relation
 * @method     SProductVariantsQuery innerJoinSProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SProducts relation
 *
 * @method     SProductVariantsQuery leftJoinSCurrencies($relationAlias = null) Adds a LEFT JOIN clause to the query using the SCurrencies relation
 * @method     SProductVariantsQuery rightJoinSCurrencies($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SCurrencies relation
 * @method     SProductVariantsQuery innerJoinSCurrencies($relationAlias = null) Adds a INNER JOIN clause to the query using the SCurrencies relation
 *
 * @method     SProductVariantsQuery leftJoinShopKitProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShopKitProduct relation
 * @method     SProductVariantsQuery rightJoinShopKitProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShopKitProduct relation
 * @method     SProductVariantsQuery innerJoinShopKitProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the ShopKitProduct relation
 *
 * @method     SProductVariantsQuery leftJoinSProductVariantsI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProductVariantsI18n relation
 * @method     SProductVariantsQuery rightJoinSProductVariantsI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProductVariantsI18n relation
 * @method     SProductVariantsQuery innerJoinSProductVariantsI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the SProductVariantsI18n relation
 *
 * @method     SProductVariantsQuery leftJoinSNotifications($relationAlias = null) Adds a LEFT JOIN clause to the query using the SNotifications relation
 * @method     SProductVariantsQuery rightJoinSNotifications($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SNotifications relation
 * @method     SProductVariantsQuery innerJoinSNotifications($relationAlias = null) Adds a INNER JOIN clause to the query using the SNotifications relation
 *
 * @method     SProductVariantsQuery leftJoinSOrderProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SOrderProducts relation
 * @method     SProductVariantsQuery rightJoinSOrderProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SOrderProducts relation
 * @method     SProductVariantsQuery innerJoinSOrderProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SOrderProducts relation
 *
 * @method     SProductVariants findOne(PropelPDO $con = null) Return the first SProductVariants matching the query
 * @method     SProductVariants findOneOrCreate(PropelPDO $con = null) Return the first SProductVariants matching the query, or a new SProductVariants object populated from the query conditions when no match is found
 *
 * @method     SProductVariants findOneById(int $id) Return the first SProductVariants filtered by the id column
 * @method     SProductVariants findOneByExternalId(string $external_id) Return the first SProductVariants filtered by the external_id column
 * @method     SProductVariants findOneByProductId(int $product_id) Return the first SProductVariants filtered by the product_id column
 * @method     SProductVariants findOneByPrice(double $price) Return the first SProductVariants filtered by the price column
 * @method     SProductVariants findOneByNumber(string $number) Return the first SProductVariants filtered by the number column
 * @method     SProductVariants findOneByStock(int $stock) Return the first SProductVariants filtered by the stock column
 * @method     SProductVariants findOneByMainimage(string $mainImage) Return the first SProductVariants filtered by the mainImage column
 * @method     SProductVariants findOneBySmallimage(string $smallImage) Return the first SProductVariants filtered by the smallImage column
 * @method     SProductVariants findOneByPosition(int $position) Return the first SProductVariants filtered by the position column
 * @method     SProductVariants findOneByCurrency(int $currency) Return the first SProductVariants filtered by the currency column
 * @method     SProductVariants findOneByPriceInMain(string $price_in_main) Return the first SProductVariants filtered by the price_in_main column
 *
 * @method     array findById(int $id) Return SProductVariants objects filtered by the id column
 * @method     array findByExternalId(string $external_id) Return SProductVariants objects filtered by the external_id column
 * @method     array findByProductId(int $product_id) Return SProductVariants objects filtered by the product_id column
 * @method     array findByPrice(double $price) Return SProductVariants objects filtered by the price column
 * @method     array findByNumber(string $number) Return SProductVariants objects filtered by the number column
 * @method     array findByStock(int $stock) Return SProductVariants objects filtered by the stock column
 * @method     array findByMainimage(string $mainImage) Return SProductVariants objects filtered by the mainImage column
 * @method     array findBySmallimage(string $smallImage) Return SProductVariants objects filtered by the smallImage column
 * @method     array findByPosition(int $position) Return SProductVariants objects filtered by the position column
 * @method     array findByCurrency(int $currency) Return SProductVariants objects filtered by the currency column
 * @method     array findByPriceInMain(string $price_in_main) Return SProductVariants objects filtered by the price_in_main column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSProductVariantsQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseSProductVariantsQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SProductVariants', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new SProductVariantsQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return SProductVariantsQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof SProductVariantsQuery) {
			return $criteria;
		}
		$query = new SProductVariantsQuery ();
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
	 * @return SProductVariants|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SProductVariantsPeer::getInstanceFromPool ( ( string ) $key ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( SProductVariantsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return SProductVariants A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `ID`, `EXTERNAL_ID`, `PRODUCT_ID`, `PRICE`, `NUMBER`, `STOCK`, `MAINIMAGE`, `SMALLIMAGE`, `POSITION`, `CURRENCY`, `PRICE_IN_MAIN` FROM `shop_product_variants` WHERE `ID` = :p0';
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
			$obj = new SProductVariants ();
			$obj->hydrate ( $row );
			SProductVariantsPeer::addInstanceToPool ( $obj, ( string ) $key );
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
	 * @return SProductVariants|array|mixed the result, formatted by the current formatter
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
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		return $this->addUsingAlias ( SProductVariantsPeer::ID, $key, Criteria::EQUAL );
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		return $this->addUsingAlias ( SProductVariantsPeer::ID, $keys, Criteria::IN );
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
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null) {
		if (is_array ( $id ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( SProductVariantsPeer::ID, $id, $comparison );
	}
	
	/**
	 * Filter the query on the external_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByExternalId('fooValue'); // WHERE external_id = 'fooValue'
	 * $query->filterByExternalId('%fooValue%'); // WHERE external_id LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $externalId
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterByExternalId($externalId = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $externalId )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $externalId )) {
				$externalId = str_replace ( '*', '%', $externalId );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SProductVariantsPeer::EXTERNAL_ID, $externalId, $comparison );
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
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterByProductId($productId = null, $comparison = null) {
		if (is_array ( $productId )) {
			$useMinMax = false;
			if (isset ( $productId ['min'] )) {
				$this->addUsingAlias ( SProductVariantsPeer::PRODUCT_ID, $productId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $productId ['max'] )) {
				$this->addUsingAlias ( SProductVariantsPeer::PRODUCT_ID, $productId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SProductVariantsPeer::PRODUCT_ID, $productId, $comparison );
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
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterByPrice($price = null, $comparison = null) {
		if (is_array ( $price )) {
			$useMinMax = false;
			if (isset ( $price ['min'] )) {
				$this->addUsingAlias ( SProductVariantsPeer::PRICE, $price ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $price ['max'] )) {
				$this->addUsingAlias ( SProductVariantsPeer::PRICE, $price ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SProductVariantsPeer::PRICE, $price, $comparison );
	}
	
	/**
	 * Filter the query on the number column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNumber('fooValue'); // WHERE number = 'fooValue'
	 * $query->filterByNumber('%fooValue%'); // WHERE number LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $number
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterByNumber($number = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $number )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $number )) {
				$number = str_replace ( '*', '%', $number );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SProductVariantsPeer::NUMBER, $number, $comparison );
	}
	
	/**
	 * Filter the query on the stock column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStock(1234); // WHERE stock = 1234
	 * $query->filterByStock(array(12, 34)); // WHERE stock IN (12, 34)
	 * $query->filterByStock(array('min' => 12)); // WHERE stock > 12
	 * </code>
	 *
	 * @param mixed $stock
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterByStock($stock = null, $comparison = null) {
		if (is_array ( $stock )) {
			$useMinMax = false;
			if (isset ( $stock ['min'] )) {
				$this->addUsingAlias ( SProductVariantsPeer::STOCK, $stock ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $stock ['max'] )) {
				$this->addUsingAlias ( SProductVariantsPeer::STOCK, $stock ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SProductVariantsPeer::STOCK, $stock, $comparison );
	}
	
	/**
	 * Filter the query on the mainImage column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMainimage('fooValue'); // WHERE mainImage = 'fooValue'
	 * $query->filterByMainimage('%fooValue%'); // WHERE mainImage LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $mainimage
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterByMainimage($mainimage = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $mainimage )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $mainimage )) {
				$mainimage = str_replace ( '*', '%', $mainimage );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SProductVariantsPeer::MAINIMAGE, $mainimage, $comparison );
	}
	
	/**
	 * Filter the query on the smallImage column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySmallimage('fooValue'); // WHERE smallImage = 'fooValue'
	 * $query->filterBySmallimage('%fooValue%'); // WHERE smallImage LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $smallimage
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterBySmallimage($smallimage = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $smallimage )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $smallimage )) {
				$smallimage = str_replace ( '*', '%', $smallimage );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SProductVariantsPeer::SMALLIMAGE, $smallimage, $comparison );
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
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null) {
		if (is_array ( $position )) {
			$useMinMax = false;
			if (isset ( $position ['min'] )) {
				$this->addUsingAlias ( SProductVariantsPeer::POSITION, $position ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $position ['max'] )) {
				$this->addUsingAlias ( SProductVariantsPeer::POSITION, $position ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SProductVariantsPeer::POSITION, $position, $comparison );
	}
	
	/**
	 * Filter the query on the currency column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCurrency(1234); // WHERE currency = 1234
	 * $query->filterByCurrency(array(12, 34)); // WHERE currency IN (12, 34)
	 * $query->filterByCurrency(array('min' => 12)); // WHERE currency > 12
	 * </code>
	 *
	 * @see filterBySCurrencies()
	 *
	 * @param mixed $currency
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterByCurrency($currency = null, $comparison = null) {
		if (is_array ( $currency )) {
			$useMinMax = false;
			if (isset ( $currency ['min'] )) {
				$this->addUsingAlias ( SProductVariantsPeer::CURRENCY, $currency ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $currency ['max'] )) {
				$this->addUsingAlias ( SProductVariantsPeer::CURRENCY, $currency ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SProductVariantsPeer::CURRENCY, $currency, $comparison );
	}
	
	/**
	 * Filter the query on the price_in_main column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPriceInMain(1234); // WHERE price_in_main = 1234
	 * $query->filterByPriceInMain(array(12, 34)); // WHERE price_in_main IN (12, 34)
	 * $query->filterByPriceInMain(array('min' => 12)); // WHERE price_in_main > 12
	 * </code>
	 *
	 * @param mixed $priceInMain
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterByPriceInMain($priceInMain = null, $comparison = null) {
		if (is_array ( $priceInMain )) {
			$useMinMax = false;
			if (isset ( $priceInMain ['min'] )) {
				$this->addUsingAlias ( SProductVariantsPeer::PRICE_IN_MAIN, $priceInMain ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $priceInMain ['max'] )) {
				$this->addUsingAlias ( SProductVariantsPeer::PRICE_IN_MAIN, $priceInMain ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SProductVariantsPeer::PRICE_IN_MAIN, $priceInMain, $comparison );
	}
	
	/**
	 * Filter the query by a related SProducts object
	 *
	 * @param SProducts|PropelCollection $sProducts
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterBySProducts($sProducts, $comparison = null) {
		if ($sProducts instanceof SProducts) {
			return $this->addUsingAlias ( SProductVariantsPeer::PRODUCT_ID, $sProducts->getId (), $comparison );
		} elseif ($sProducts instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( SProductVariantsPeer::PRODUCT_ID, $sProducts->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
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
	 * @return SProductVariantsQuery The current query, for fluid interface
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
	 * Filter the query by a related SCurrencies object
	 *
	 * @param SCurrencies|PropelCollection $sCurrencies
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterBySCurrencies($sCurrencies, $comparison = null) {
		if ($sCurrencies instanceof SCurrencies) {
			return $this->addUsingAlias ( SProductVariantsPeer::CURRENCY, $sCurrencies->getId (), $comparison );
		} elseif ($sCurrencies instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( SProductVariantsPeer::CURRENCY, $sCurrencies->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
		} else {
			throw new PropelException ( 'filterBySCurrencies() only accepts arguments of type SCurrencies or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SCurrencies relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function joinSCurrencies($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SCurrencies' );
		
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
			$this->addJoinObject ( $join, 'SCurrencies' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SCurrencies relation SCurrencies object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SCurrenciesQuery A secondary query class using the current class as primary query
	 */
	public function useSCurrenciesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		return $this->joinSCurrencies ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SCurrencies', 'SCurrenciesQuery' );
	}
	
	/**
	 * Filter the query by a related ShopKitProduct object
	 *
	 * @param ShopKitProduct $shopKitProduct
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterByShopKitProduct($shopKitProduct, $comparison = null) {
		if ($shopKitProduct instanceof ShopKitProduct) {
			return $this->addUsingAlias ( SProductVariantsPeer::PRODUCT_ID, $shopKitProduct->getProductId (), $comparison );
		} elseif ($shopKitProduct instanceof PropelCollection) {
			return $this->useShopKitProductQuery ()->filterByPrimaryKeys ( $shopKitProduct->getPrimaryKeys () )->endUse ();
		} else {
			throw new PropelException ( 'filterByShopKitProduct() only accepts arguments of type ShopKitProduct or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the ShopKitProduct relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function joinShopKitProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'ShopKitProduct' );
		
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
			$this->addJoinObject ( $join, 'ShopKitProduct' );
		}
		
		return $this;
	}
	
	/**
	 * Use the ShopKitProduct relation ShopKitProduct object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return ShopKitProductQuery A secondary query class using the current class as primary query
	 */
	public function useShopKitProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinShopKitProduct ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'ShopKitProduct', 'ShopKitProductQuery' );
	}
	
	/**
	 * Filter the query by a related SProductVariantsI18n object
	 *
	 * @param SProductVariantsI18n $sProductVariantsI18n
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterBySProductVariantsI18n($sProductVariantsI18n, $comparison = null) {
		if ($sProductVariantsI18n instanceof SProductVariantsI18n) {
			return $this->addUsingAlias ( SProductVariantsPeer::ID, $sProductVariantsI18n->getId (), $comparison );
		} elseif ($sProductVariantsI18n instanceof PropelCollection) {
			return $this->useSProductVariantsI18nQuery ()->filterByPrimaryKeys ( $sProductVariantsI18n->getPrimaryKeys () )->endUse ();
		} else {
			throw new PropelException ( 'filterBySProductVariantsI18n() only accepts arguments of type SProductVariantsI18n or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SProductVariantsI18n relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function joinSProductVariantsI18n($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SProductVariantsI18n' );
		
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
			$this->addJoinObject ( $join, 'SProductVariantsI18n' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SProductVariantsI18n relation SProductVariantsI18n object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SProductVariantsI18nQuery A secondary query class using the current class as primary query
	 */
	public function useSProductVariantsI18nQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinSProductVariantsI18n ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SProductVariantsI18n', 'SProductVariantsI18nQuery' );
	}
	
	/**
	 * Filter the query by a related SNotifications object
	 *
	 * @param SNotifications $sNotifications
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterBySNotifications($sNotifications, $comparison = null) {
		if ($sNotifications instanceof SNotifications) {
			return $this->addUsingAlias ( SProductVariantsPeer::ID, $sNotifications->getVariantId (), $comparison );
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
	 * @return SProductVariantsQuery The current query, for fluid interface
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
	 * Filter the query by a related SOrderProducts object
	 *
	 * @param SOrderProducts $sOrderProducts
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function filterBySOrderProducts($sOrderProducts, $comparison = null) {
		if ($sOrderProducts instanceof SOrderProducts) {
			return $this->addUsingAlias ( SProductVariantsPeer::ID, $sOrderProducts->getVariantId (), $comparison );
		} elseif ($sOrderProducts instanceof PropelCollection) {
			return $this->useSOrderProductsQuery ()->filterByPrimaryKeys ( $sOrderProducts->getPrimaryKeys () )->endUse ();
		} else {
			throw new PropelException ( 'filterBySOrderProducts() only accepts arguments of type SOrderProducts or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SOrderProducts relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function joinSOrderProducts($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SOrderProducts' );
		
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
			$this->addJoinObject ( $join, 'SOrderProducts' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SOrderProducts relation SOrderProducts object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SOrderProductsQuery A secondary query class using the current class as primary query
	 */
	public function useSOrderProductsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinSOrderProducts ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SOrderProducts', 'SOrderProductsQuery' );
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param SProductVariants $sProductVariants
	 *        	Object to remove from the list of results
	 *        	
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function prune($sProductVariants = null) {
		if ($sProductVariants) {
			$this->addUsingAlias ( SProductVariantsPeer::ID, $sProductVariants->getId (), Criteria::NOT_EQUAL );
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
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function joinI18n($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		$relationName = $relationAlias ? $relationAlias : 'SProductVariantsI18n';
		return $this->joinSProductVariantsI18n ( $relationAlias, $joinType )->addJoinCondition ( $relationName, $relationName . '.Locale = ?', $locale );
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
	 * @return SProductVariantsQuery The current query, for fluid interface
	 */
	public function joinWithI18n($locale = 'ru', $joinType = Criteria::LEFT_JOIN) {
		$this->joinI18n ( $locale, null, $joinType )->with ( 'SProductVariantsI18n' );
		$this->with ['SProductVariantsI18n']->setIsWithOneToMany ( false );
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
	 * @return SProductVariantsI18nQuery A secondary query class using the current class as primary query
	 */
	public function useI18nQuery($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		return $this->joinI18n ( $locale, $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SProductVariantsI18n', 'SProductVariantsI18nQuery' );
	}
} // BaseSProductVariantsQuery