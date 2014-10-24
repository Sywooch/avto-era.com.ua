<?php

/**
 * Base class that represents a query for the 'shop_comulativ_discount' table.
 *
 * 
 *
 * @method     ShopComulativQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ShopComulativQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ShopComulativQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     ShopComulativQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     ShopComulativQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ShopComulativQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ShopComulativQuery orderByTotalA($order = Criteria::ASC) Order by the total_a column
 *
 * @method     ShopComulativQuery groupById() Group by the id column
 * @method     ShopComulativQuery groupByDescription() Group by the description column
 * @method     ShopComulativQuery groupByDiscount() Group by the discount column
 * @method     ShopComulativQuery groupByActive() Group by the active column
 * @method     ShopComulativQuery groupByDate() Group by the date column
 * @method     ShopComulativQuery groupByTotal() Group by the total column
 * @method     ShopComulativQuery groupByTotalA() Group by the total_a column
 *
 * @method     ShopComulativQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ShopComulativQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ShopComulativQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ShopComulativ findOne(PropelPDO $con = null) Return the first ShopComulativ matching the query
 * @method     ShopComulativ findOneOrCreate(PropelPDO $con = null) Return the first ShopComulativ matching the query, or a new ShopComulativ object populated from the query conditions when no match is found
 *
 * @method     ShopComulativ findOneById(int $id) Return the first ShopComulativ filtered by the id column
 * @method     ShopComulativ findOneByDescription(string $description) Return the first ShopComulativ filtered by the description column
 * @method     ShopComulativ findOneByDiscount(int $discount) Return the first ShopComulativ filtered by the discount column
 * @method     ShopComulativ findOneByActive(int $active) Return the first ShopComulativ filtered by the active column
 * @method     ShopComulativ findOneByDate(int $date) Return the first ShopComulativ filtered by the date column
 * @method     ShopComulativ findOneByTotal(int $total) Return the first ShopComulativ filtered by the total column
 * @method     ShopComulativ findOneByTotalA(int $total_a) Return the first ShopComulativ filtered by the total_a column
 *
 * @method     array findById(int $id) Return ShopComulativ objects filtered by the id column
 * @method     array findByDescription(string $description) Return ShopComulativ objects filtered by the description column
 * @method     array findByDiscount(int $discount) Return ShopComulativ objects filtered by the discount column
 * @method     array findByActive(int $active) Return ShopComulativ objects filtered by the active column
 * @method     array findByDate(int $date) Return ShopComulativ objects filtered by the date column
 * @method     array findByTotal(int $total) Return ShopComulativ objects filtered by the total column
 * @method     array findByTotalA(int $total_a) Return ShopComulativ objects filtered by the total_a column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseShopComulativQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseShopComulativQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'ShopComulativ', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new ShopComulativQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return ShopComulativQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof ShopComulativQuery) {
			return $criteria;
		}
		$query = new ShopComulativQuery ();
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
	 * @return ShopComulativ|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ShopComulativPeer::getInstanceFromPool ( ( string ) $key ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( ShopComulativPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return ShopComulativ A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `ID`, `DESCRIPTION`, `DISCOUNT`, `ACTIVE`, `DATE`, `TOTAL`, `TOTAL_A` FROM `shop_comulativ_discount` WHERE `ID` = :p0';
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
			$obj = new ShopComulativ ();
			$obj->hydrate ( $row );
			ShopComulativPeer::addInstanceToPool ( $obj, ( string ) $key );
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
	 * @return ShopComulativ|array|mixed the result, formatted by the current formatter
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
	 * @return ShopComulativQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		return $this->addUsingAlias ( ShopComulativPeer::ID, $key, Criteria::EQUAL );
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return ShopComulativQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		return $this->addUsingAlias ( ShopComulativPeer::ID, $keys, Criteria::IN );
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
	 * @return ShopComulativQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null) {
		if (is_array ( $id ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( ShopComulativPeer::ID, $id, $comparison );
	}
	
	/**
	 * Filter the query on the description column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDescription('fooValue'); // WHERE description = 'fooValue'
	 * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $description
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopComulativQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $description )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $description )) {
				$description = str_replace ( '*', '%', $description );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( ShopComulativPeer::DESCRIPTION, $description, $comparison );
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
	 * @param mixed $discount
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopComulativQuery The current query, for fluid interface
	 */
	public function filterByDiscount($discount = null, $comparison = null) {
		if (is_array ( $discount )) {
			$useMinMax = false;
			if (isset ( $discount ['min'] )) {
				$this->addUsingAlias ( ShopComulativPeer::DISCOUNT, $discount ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $discount ['max'] )) {
				$this->addUsingAlias ( ShopComulativPeer::DISCOUNT, $discount ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( ShopComulativPeer::DISCOUNT, $discount, $comparison );
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
	 * @param mixed $active
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopComulativQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null) {
		if (is_array ( $active )) {
			$useMinMax = false;
			if (isset ( $active ['min'] )) {
				$this->addUsingAlias ( ShopComulativPeer::ACTIVE, $active ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $active ['max'] )) {
				$this->addUsingAlias ( ShopComulativPeer::ACTIVE, $active ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( ShopComulativPeer::ACTIVE, $active, $comparison );
	}
	
	/**
	 * Filter the query on the date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDate(1234); // WHERE date = 1234
	 * $query->filterByDate(array(12, 34)); // WHERE date IN (12, 34)
	 * $query->filterByDate(array('min' => 12)); // WHERE date > 12
	 * </code>
	 *
	 * @param mixed $date
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopComulativQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null) {
		if (is_array ( $date )) {
			$useMinMax = false;
			if (isset ( $date ['min'] )) {
				$this->addUsingAlias ( ShopComulativPeer::DATE, $date ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $date ['max'] )) {
				$this->addUsingAlias ( ShopComulativPeer::DATE, $date ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( ShopComulativPeer::DATE, $date, $comparison );
	}
	
	/**
	 * Filter the query on the total column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTotal(1234); // WHERE total = 1234
	 * $query->filterByTotal(array(12, 34)); // WHERE total IN (12, 34)
	 * $query->filterByTotal(array('min' => 12)); // WHERE total > 12
	 * </code>
	 *
	 * @param mixed $total
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopComulativQuery The current query, for fluid interface
	 */
	public function filterByTotal($total = null, $comparison = null) {
		if (is_array ( $total )) {
			$useMinMax = false;
			if (isset ( $total ['min'] )) {
				$this->addUsingAlias ( ShopComulativPeer::TOTAL, $total ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $total ['max'] )) {
				$this->addUsingAlias ( ShopComulativPeer::TOTAL, $total ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( ShopComulativPeer::TOTAL, $total, $comparison );
	}
	
	/**
	 * Filter the query on the total_a column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTotalA(1234); // WHERE total_a = 1234
	 * $query->filterByTotalA(array(12, 34)); // WHERE total_a IN (12, 34)
	 * $query->filterByTotalA(array('min' => 12)); // WHERE total_a > 12
	 * </code>
	 *
	 * @param mixed $totalA
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopComulativQuery The current query, for fluid interface
	 */
	public function filterByTotalA($totalA = null, $comparison = null) {
		if (is_array ( $totalA )) {
			$useMinMax = false;
			if (isset ( $totalA ['min'] )) {
				$this->addUsingAlias ( ShopComulativPeer::TOTAL_A, $totalA ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $totalA ['max'] )) {
				$this->addUsingAlias ( ShopComulativPeer::TOTAL_A, $totalA ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( ShopComulativPeer::TOTAL_A, $totalA, $comparison );
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param ShopComulativ $shopComulativ
	 *        	Object to remove from the list of results
	 *        	
	 * @return ShopComulativQuery The current query, for fluid interface
	 */
	public function prune($shopComulativ = null) {
		if ($shopComulativ) {
			$this->addUsingAlias ( ShopComulativPeer::ID, $shopComulativ->getId (), Criteria::NOT_EQUAL );
		}
		
		return $this;
	}
} // BaseShopComulativQuery