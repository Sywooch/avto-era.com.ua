<?php

/**
 * Base class that represents a query for the 'shop_products_rating' table.
 *
 * 
 *
 * @method     SProductsRatingQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     SProductsRatingQuery orderByVotes($order = Criteria::ASC) Order by the votes column
 * @method     SProductsRatingQuery orderByRating($order = Criteria::ASC) Order by the rating column
 *
 * @method     SProductsRatingQuery groupByProductId() Group by the product_id column
 * @method     SProductsRatingQuery groupByVotes() Group by the votes column
 * @method     SProductsRatingQuery groupByRating() Group by the rating column
 *
 * @method     SProductsRatingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SProductsRatingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SProductsRatingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SProductsRatingQuery leftJoinSProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProducts relation
 * @method     SProductsRatingQuery rightJoinSProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProducts relation
 * @method     SProductsRatingQuery innerJoinSProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SProducts relation
 *
 * @method     SProductsRating findOne(PropelPDO $con = null) Return the first SProductsRating matching the query
 * @method     SProductsRating findOneOrCreate(PropelPDO $con = null) Return the first SProductsRating matching the query, or a new SProductsRating object populated from the query conditions when no match is found
 *
 * @method     SProductsRating findOneByProductId(int $product_id) Return the first SProductsRating filtered by the product_id column
 * @method     SProductsRating findOneByVotes(int $votes) Return the first SProductsRating filtered by the votes column
 * @method     SProductsRating findOneByRating(int $rating) Return the first SProductsRating filtered by the rating column
 *
 * @method     array findByProductId(int $product_id) Return SProductsRating objects filtered by the product_id column
 * @method     array findByVotes(int $votes) Return SProductsRating objects filtered by the votes column
 * @method     array findByRating(int $rating) Return SProductsRating objects filtered by the rating column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSProductsRatingQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseSProductsRatingQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SProductsRating', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new SProductsRatingQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return SProductsRatingQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof SProductsRatingQuery) {
			return $criteria;
		}
		$query = new SProductsRatingQuery ();
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
	 * @return SProductsRating|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SProductsRatingPeer::getInstanceFromPool ( ( string ) $key ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( SProductsRatingPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return SProductsRating A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `PRODUCT_ID`, `VOTES`, `RATING` FROM `shop_products_rating` WHERE `PRODUCT_ID` = :p0';
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
			$obj = new SProductsRating ();
			$obj->hydrate ( $row );
			SProductsRatingPeer::addInstanceToPool ( $obj, ( string ) $key );
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
	 * @return SProductsRating|array|mixed the result, formatted by the current formatter
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
	 * @return SProductsRatingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		return $this->addUsingAlias ( SProductsRatingPeer::PRODUCT_ID, $key, Criteria::EQUAL );
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return SProductsRatingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		return $this->addUsingAlias ( SProductsRatingPeer::PRODUCT_ID, $keys, Criteria::IN );
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
	 * @return SProductsRatingQuery The current query, for fluid interface
	 */
	public function filterByProductId($productId = null, $comparison = null) {
		if (is_array ( $productId ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( SProductsRatingPeer::PRODUCT_ID, $productId, $comparison );
	}
	
	/**
	 * Filter the query on the votes column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByVotes(1234); // WHERE votes = 1234
	 * $query->filterByVotes(array(12, 34)); // WHERE votes IN (12, 34)
	 * $query->filterByVotes(array('min' => 12)); // WHERE votes > 12
	 * </code>
	 *
	 * @param mixed $votes
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SProductsRatingQuery The current query, for fluid interface
	 */
	public function filterByVotes($votes = null, $comparison = null) {
		if (is_array ( $votes )) {
			$useMinMax = false;
			if (isset ( $votes ['min'] )) {
				$this->addUsingAlias ( SProductsRatingPeer::VOTES, $votes ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $votes ['max'] )) {
				$this->addUsingAlias ( SProductsRatingPeer::VOTES, $votes ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SProductsRatingPeer::VOTES, $votes, $comparison );
	}
	
	/**
	 * Filter the query on the rating column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRating(1234); // WHERE rating = 1234
	 * $query->filterByRating(array(12, 34)); // WHERE rating IN (12, 34)
	 * $query->filterByRating(array('min' => 12)); // WHERE rating > 12
	 * </code>
	 *
	 * @param mixed $rating
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SProductsRatingQuery The current query, for fluid interface
	 */
	public function filterByRating($rating = null, $comparison = null) {
		if (is_array ( $rating )) {
			$useMinMax = false;
			if (isset ( $rating ['min'] )) {
				$this->addUsingAlias ( SProductsRatingPeer::RATING, $rating ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $rating ['max'] )) {
				$this->addUsingAlias ( SProductsRatingPeer::RATING, $rating ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SProductsRatingPeer::RATING, $rating, $comparison );
	}
	
	/**
	 * Filter the query by a related SProducts object
	 *
	 * @param SProducts|PropelCollection $sProducts
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SProductsRatingQuery The current query, for fluid interface
	 */
	public function filterBySProducts($sProducts, $comparison = null) {
		if ($sProducts instanceof SProducts) {
			return $this->addUsingAlias ( SProductsRatingPeer::PRODUCT_ID, $sProducts->getId (), $comparison );
		} elseif ($sProducts instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( SProductsRatingPeer::PRODUCT_ID, $sProducts->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
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
	 * @return SProductsRatingQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param SProductsRating $sProductsRating
	 *        	Object to remove from the list of results
	 *        	
	 * @return SProductsRatingQuery The current query, for fluid interface
	 */
	public function prune($sProductsRating = null) {
		if ($sProductsRating) {
			$this->addUsingAlias ( SProductsRatingPeer::PRODUCT_ID, $sProductsRating->getProductId (), Criteria::NOT_EQUAL );
		}
		
		return $this;
	}
} // BaseSProductsRatingQuery