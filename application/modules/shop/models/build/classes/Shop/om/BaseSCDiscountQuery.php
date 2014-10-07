<?php

/**
 * Base class that represents a query for the 'shop_discount_category' table.
 *
 * 
 *
 * @method     SCDiscountQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SCDiscountQuery orderBydiscountId($order = Criteria::ASC) Order by the discount_id column
 * @method     SCDiscountQuery orderByDiscountJoinId($order = Criteria::ASC) Order by the category_id column
 *
 * @method     SCDiscountQuery groupById() Group by the id column
 * @method     SCDiscountQuery groupBydiscountId() Group by the discount_id column
 * @method     SCDiscountQuery groupByDiscountJoinId() Group by the category_id column
 *
 * @method     SCDiscountQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SCDiscountQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SCDiscountQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SCDiscount findOne(PropelPDO $con = null) Return the first SCDiscount matching the query
 * @method     SCDiscount findOneOrCreate(PropelPDO $con = null) Return the first SCDiscount matching the query, or a new SCDiscount object populated from the query conditions when no match is found
 *
 * @method     SCDiscount findOneById(int $id) Return the first SCDiscount filtered by the id column
 * @method     SCDiscount findOneBydiscountId(int $discount_id) Return the first SCDiscount filtered by the discount_id column
 * @method     SCDiscount findOneByDiscountJoinId(int $category_id) Return the first SCDiscount filtered by the category_id column
 *
 * @method     array findById(int $id) Return SCDiscount objects filtered by the id column
 * @method     array findBydiscountId(int $discount_id) Return SCDiscount objects filtered by the discount_id column
 * @method     array findByDiscountJoinId(int $category_id) Return SCDiscount objects filtered by the category_id column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSCDiscountQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseSCDiscountQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SCDiscount', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new SCDiscountQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return SCDiscountQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof SCDiscountQuery) {
			return $criteria;
		}
		$query = new SCDiscountQuery ();
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
	 * @return SCDiscount|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SCDiscountPeer::getInstanceFromPool ( ( string ) $key ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( SCDiscountPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return SCDiscount A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `ID`, `DISCOUNT_ID`, `CATEGORY_ID` FROM `shop_discount_category` WHERE `ID` = :p0';
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
			$obj = new SCDiscount ();
			$obj->hydrate ( $row );
			SCDiscountPeer::addInstanceToPool ( $obj, ( string ) $key );
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
	 * @return SCDiscount|array|mixed the result, formatted by the current formatter
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
	 * @return SCDiscountQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		return $this->addUsingAlias ( SCDiscountPeer::ID, $key, Criteria::EQUAL );
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return SCDiscountQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		return $this->addUsingAlias ( SCDiscountPeer::ID, $keys, Criteria::IN );
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
	 * @return SCDiscountQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null) {
		if (is_array ( $id ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( SCDiscountPeer::ID, $id, $comparison );
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
	 * @param mixed $discountId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCDiscountQuery The current query, for fluid interface
	 */
	public function filterBydiscountId($discountId = null, $comparison = null) {
		if (is_array ( $discountId )) {
			$useMinMax = false;
			if (isset ( $discountId ['min'] )) {
				$this->addUsingAlias ( SCDiscountPeer::DISCOUNT_ID, $discountId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $discountId ['max'] )) {
				$this->addUsingAlias ( SCDiscountPeer::DISCOUNT_ID, $discountId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SCDiscountPeer::DISCOUNT_ID, $discountId, $comparison );
	}
	
	/**
	 * Filter the query on the category_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDiscountJoinId(1234); // WHERE category_id = 1234
	 * $query->filterByDiscountJoinId(array(12, 34)); // WHERE category_id IN (12, 34)
	 * $query->filterByDiscountJoinId(array('min' => 12)); // WHERE category_id > 12
	 * </code>
	 *
	 * @param mixed $discountJoinId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCDiscountQuery The current query, for fluid interface
	 */
	public function filterByDiscountJoinId($discountJoinId = null, $comparison = null) {
		if (is_array ( $discountJoinId )) {
			$useMinMax = false;
			if (isset ( $discountJoinId ['min'] )) {
				$this->addUsingAlias ( SCDiscountPeer::CATEGORY_ID, $discountJoinId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $discountJoinId ['max'] )) {
				$this->addUsingAlias ( SCDiscountPeer::CATEGORY_ID, $discountJoinId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SCDiscountPeer::CATEGORY_ID, $discountJoinId, $comparison );
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param SCDiscount $sCDiscount
	 *        	Object to remove from the list of results
	 *        	
	 * @return SCDiscountQuery The current query, for fluid interface
	 */
	public function prune($sCDiscount = null) {
		if ($sCDiscount) {
			$this->addUsingAlias ( SCDiscountPeer::ID, $sCDiscount->getId (), Criteria::NOT_EQUAL );
		}
		
		return $this;
	}
} // BaseSCDiscountQuery