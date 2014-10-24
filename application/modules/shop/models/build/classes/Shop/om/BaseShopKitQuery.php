<?php

/**
 * Base class that represents a query for the 'shop_kit' table.
 *
 * 
 *
 * @method     ShopKitQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ShopKitQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ShopKitQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     ShopKitQuery orderByPosition($order = Criteria::ASC) Order by the position column
 *
 * @method     ShopKitQuery groupById() Group by the id column
 * @method     ShopKitQuery groupByProductId() Group by the product_id column
 * @method     ShopKitQuery groupByActive() Group by the active column
 * @method     ShopKitQuery groupByPosition() Group by the position column
 *
 * @method     ShopKitQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ShopKitQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ShopKitQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ShopKitQuery leftJoinSProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProducts relation
 * @method     ShopKitQuery rightJoinSProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProducts relation
 * @method     ShopKitQuery innerJoinSProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SProducts relation
 *
 * @method     ShopKitQuery leftJoinShopKitProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShopKitProduct relation
 * @method     ShopKitQuery rightJoinShopKitProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShopKitProduct relation
 * @method     ShopKitQuery innerJoinShopKitProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the ShopKitProduct relation
 *
 * @method     ShopKit findOne(PropelPDO $con = null) Return the first ShopKit matching the query
 * @method     ShopKit findOneOrCreate(PropelPDO $con = null) Return the first ShopKit matching the query, or a new ShopKit object populated from the query conditions when no match is found
 *
 * @method     ShopKit findOneById(int $id) Return the first ShopKit filtered by the id column
 * @method     ShopKit findOneByProductId(int $product_id) Return the first ShopKit filtered by the product_id column
 * @method     ShopKit findOneByActive(boolean $active) Return the first ShopKit filtered by the active column
 * @method     ShopKit findOneByPosition(int $position) Return the first ShopKit filtered by the position column
 *
 * @method     array findById(int $id) Return ShopKit objects filtered by the id column
 * @method     array findByProductId(int $product_id) Return ShopKit objects filtered by the product_id column
 * @method     array findByActive(boolean $active) Return ShopKit objects filtered by the active column
 * @method     array findByPosition(int $position) Return ShopKit objects filtered by the position column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseShopKitQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseShopKitQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'ShopKit', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new ShopKitQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return ShopKitQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof ShopKitQuery) {
			return $criteria;
		}
		$query = new ShopKitQuery ();
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
	 * @return ShopKit|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ShopKitPeer::getInstanceFromPool ( ( string ) $key ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( ShopKitPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return ShopKit A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `ID`, `PRODUCT_ID`, `ACTIVE`, `POSITION` FROM `shop_kit` WHERE `ID` = :p0';
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
			$obj = new ShopKit ();
			$obj->hydrate ( $row );
			ShopKitPeer::addInstanceToPool ( $obj, ( string ) $key );
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
	 * @return ShopKit|array|mixed the result, formatted by the current formatter
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
	 * @return ShopKitQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		return $this->addUsingAlias ( ShopKitPeer::ID, $key, Criteria::EQUAL );
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return ShopKitQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		return $this->addUsingAlias ( ShopKitPeer::ID, $keys, Criteria::IN );
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
	 * @return ShopKitQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null) {
		if (is_array ( $id ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( ShopKitPeer::ID, $id, $comparison );
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
	 * @return ShopKitQuery The current query, for fluid interface
	 */
	public function filterByProductId($productId = null, $comparison = null) {
		if (is_array ( $productId )) {
			$useMinMax = false;
			if (isset ( $productId ['min'] )) {
				$this->addUsingAlias ( ShopKitPeer::PRODUCT_ID, $productId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $productId ['max'] )) {
				$this->addUsingAlias ( ShopKitPeer::PRODUCT_ID, $productId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( ShopKitPeer::PRODUCT_ID, $productId, $comparison );
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
	 * @param boolean|string $active
	 *        	The value to use as filter.
	 *        	Non-boolean arguments are converted using the following rules:
	 *        	* 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 *        	* 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 *        	Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopKitQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null) {
		if (is_string ( $active )) {
			$active = in_array ( strtolower ( $active ), array (
					'false',
					'off',
					'-',
					'no',
					'n',
					'0',
					'' 
			) ) ? false : true;
		}
		return $this->addUsingAlias ( ShopKitPeer::ACTIVE, $active, $comparison );
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
	 * @return ShopKitQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null) {
		if (is_array ( $position )) {
			$useMinMax = false;
			if (isset ( $position ['min'] )) {
				$this->addUsingAlias ( ShopKitPeer::POSITION, $position ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $position ['max'] )) {
				$this->addUsingAlias ( ShopKitPeer::POSITION, $position ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( ShopKitPeer::POSITION, $position, $comparison );
	}
	
	/**
	 * Filter the query by a related SProducts object
	 *
	 * @param SProducts|PropelCollection $sProducts
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopKitQuery The current query, for fluid interface
	 */
	public function filterBySProducts($sProducts, $comparison = null) {
		if ($sProducts instanceof SProducts) {
			return $this->addUsingAlias ( ShopKitPeer::PRODUCT_ID, $sProducts->getId (), $comparison );
		} elseif ($sProducts instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( ShopKitPeer::PRODUCT_ID, $sProducts->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
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
	 * @return ShopKitQuery The current query, for fluid interface
	 */
	public function joinSProducts($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
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
	public function useSProductsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		return $this->joinSProducts ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SProducts', 'SProductsQuery' );
	}
	
	/**
	 * Filter the query by a related ShopKitProduct object
	 *
	 * @param ShopKitProduct $shopKitProduct
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopKitQuery The current query, for fluid interface
	 */
	public function filterByShopKitProduct($shopKitProduct, $comparison = null) {
		if ($shopKitProduct instanceof ShopKitProduct) {
			return $this->addUsingAlias ( ShopKitPeer::ID, $shopKitProduct->getKitId (), $comparison );
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
	 * @return ShopKitQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param ShopKit $shopKit
	 *        	Object to remove from the list of results
	 *        	
	 * @return ShopKitQuery The current query, for fluid interface
	 */
	public function prune($shopKit = null) {
		if ($shopKit) {
			$this->addUsingAlias ( ShopKitPeer::ID, $shopKit->getId (), Criteria::NOT_EQUAL );
		}
		
		return $this;
	}
} // BaseShopKitQuery