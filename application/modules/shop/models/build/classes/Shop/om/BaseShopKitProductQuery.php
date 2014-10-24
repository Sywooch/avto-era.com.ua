<?php

/**
 * Base class that represents a query for the 'shop_kit_product' table.
 *
 * 
 *
 * @method     ShopKitProductQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ShopKitProductQuery orderByKitId($order = Criteria::ASC) Order by the kit_id column
 * @method     ShopKitProductQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 *
 * @method     ShopKitProductQuery groupByProductId() Group by the product_id column
 * @method     ShopKitProductQuery groupByKitId() Group by the kit_id column
 * @method     ShopKitProductQuery groupByDiscount() Group by the discount column
 *
 * @method     ShopKitProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ShopKitProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ShopKitProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ShopKitProductQuery leftJoinSProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProducts relation
 * @method     ShopKitProductQuery rightJoinSProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProducts relation
 * @method     ShopKitProductQuery innerJoinSProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SProducts relation
 *
 * @method     ShopKitProductQuery leftJoinSProductVariants($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProductVariants relation
 * @method     ShopKitProductQuery rightJoinSProductVariants($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProductVariants relation
 * @method     ShopKitProductQuery innerJoinSProductVariants($relationAlias = null) Adds a INNER JOIN clause to the query using the SProductVariants relation
 *
 * @method     ShopKitProductQuery leftJoinShopKit($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShopKit relation
 * @method     ShopKitProductQuery rightJoinShopKit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShopKit relation
 * @method     ShopKitProductQuery innerJoinShopKit($relationAlias = null) Adds a INNER JOIN clause to the query using the ShopKit relation
 *
 * @method     ShopKitProduct findOne(PropelPDO $con = null) Return the first ShopKitProduct matching the query
 * @method     ShopKitProduct findOneOrCreate(PropelPDO $con = null) Return the first ShopKitProduct matching the query, or a new ShopKitProduct object populated from the query conditions when no match is found
 *
 * @method     ShopKitProduct findOneByProductId(int $product_id) Return the first ShopKitProduct filtered by the product_id column
 * @method     ShopKitProduct findOneByKitId(int $kit_id) Return the first ShopKitProduct filtered by the kit_id column
 * @method     ShopKitProduct findOneByDiscount(string $discount) Return the first ShopKitProduct filtered by the discount column
 *
 * @method     array findByProductId(int $product_id) Return ShopKitProduct objects filtered by the product_id column
 * @method     array findByKitId(int $kit_id) Return ShopKitProduct objects filtered by the kit_id column
 * @method     array findByDiscount(string $discount) Return ShopKitProduct objects filtered by the discount column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseShopKitProductQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseShopKitProductQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'ShopKitProduct', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new ShopKitProductQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return ShopKitProductQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof ShopKitProductQuery) {
			return $criteria;
		}
		$query = new ShopKitProductQuery ();
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
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 *
	 * @param array[$product_id, $kit_id]
	 *        	$key Primary key to use for the query
	 * @param PropelPDO $con
	 *        	an optional connection object
	 *        	
	 * @return ShopKitProduct|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ShopKitProductPeer::getInstanceFromPool ( serialize ( array (
				( string ) $key [0],
				( string ) $key [1] 
		) ) ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( ShopKitProductPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return ShopKitProduct A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `PRODUCT_ID`, `KIT_ID`, `DISCOUNT` FROM `shop_kit_product` WHERE `PRODUCT_ID` = :p0 AND `KIT_ID` = :p1';
		try {
			$stmt = $con->prepare ( $sql );
			$stmt->bindValue ( ':p0', $key [0], PDO::PARAM_INT );
			$stmt->bindValue ( ':p1', $key [1], PDO::PARAM_INT );
			$stmt->execute ();
		} catch ( Exception $e ) {
			Propel::log ( $e->getMessage (), Propel::LOG_ERR );
			throw new PropelException ( sprintf ( 'Unable to execute SELECT statement [%s]', $sql ), $e );
		}
		$obj = null;
		if ($row = $stmt->fetch ( PDO::FETCH_NUM )) {
			$obj = new ShopKitProduct ();
			$obj->hydrate ( $row );
			ShopKitProductPeer::addInstanceToPool ( $obj, serialize ( array (
					( string ) $key [0],
					( string ) $key [1] 
			) ) );
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
	 * @return ShopKitProduct|array|mixed the result, formatted by the current formatter
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return ShopKitProductQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		$this->addUsingAlias ( ShopKitProductPeer::PRODUCT_ID, $key [0], Criteria::EQUAL );
		$this->addUsingAlias ( ShopKitProductPeer::KIT_ID, $key [1], Criteria::EQUAL );
		
		return $this;
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return ShopKitProductQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		if (empty ( $keys )) {
			return $this->add ( null, '1<>1', Criteria::CUSTOM );
		}
		foreach ( $keys as $key ) {
			$cton0 = $this->getNewCriterion ( ShopKitProductPeer::PRODUCT_ID, $key [0], Criteria::EQUAL );
			$cton1 = $this->getNewCriterion ( ShopKitProductPeer::KIT_ID, $key [1], Criteria::EQUAL );
			$cton0->addAnd ( $cton1 );
			$this->addOr ( $cton0 );
		}
		
		return $this;
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
	 * @see filterBySProductVariants()
	 *
	 * @param mixed $productId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopKitProductQuery The current query, for fluid interface
	 */
	public function filterByProductId($productId = null, $comparison = null) {
		if (is_array ( $productId ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( ShopKitProductPeer::PRODUCT_ID, $productId, $comparison );
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
	 * @see filterByShopKit()
	 *
	 * @param mixed $kitId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopKitProductQuery The current query, for fluid interface
	 */
	public function filterByKitId($kitId = null, $comparison = null) {
		if (is_array ( $kitId ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( ShopKitProductPeer::KIT_ID, $kitId, $comparison );
	}
	
	/**
	 * Filter the query on the discount column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDiscount('fooValue'); // WHERE discount = 'fooValue'
	 * $query->filterByDiscount('%fooValue%'); // WHERE discount LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $discount
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopKitProductQuery The current query, for fluid interface
	 */
	public function filterByDiscount($discount = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $discount )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $discount )) {
				$discount = str_replace ( '*', '%', $discount );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( ShopKitProductPeer::DISCOUNT, $discount, $comparison );
	}
	
	/**
	 * Filter the query by a related SProducts object
	 *
	 * @param SProducts|PropelCollection $sProducts
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopKitProductQuery The current query, for fluid interface
	 */
	public function filterBySProducts($sProducts, $comparison = null) {
		if ($sProducts instanceof SProducts) {
			return $this->addUsingAlias ( ShopKitProductPeer::PRODUCT_ID, $sProducts->getId (), $comparison );
		} elseif ($sProducts instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( ShopKitProductPeer::PRODUCT_ID, $sProducts->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
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
	 * @return ShopKitProductQuery The current query, for fluid interface
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
	 * @return ShopKitProductQuery The current query, for fluid interface
	 */
	public function filterBySProductVariants($sProductVariants, $comparison = null) {
		if ($sProductVariants instanceof SProductVariants) {
			return $this->addUsingAlias ( ShopKitProductPeer::PRODUCT_ID, $sProductVariants->getProductId (), $comparison );
		} elseif ($sProductVariants instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( ShopKitProductPeer::PRODUCT_ID, $sProductVariants->toKeyValue ( 'PrimaryKey', 'ProductId' ), $comparison );
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
	 * @return ShopKitProductQuery The current query, for fluid interface
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
	 * Filter the query by a related ShopKit object
	 *
	 * @param ShopKit|PropelCollection $shopKit
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return ShopKitProductQuery The current query, for fluid interface
	 */
	public function filterByShopKit($shopKit, $comparison = null) {
		if ($shopKit instanceof ShopKit) {
			return $this->addUsingAlias ( ShopKitProductPeer::KIT_ID, $shopKit->getId (), $comparison );
		} elseif ($shopKit instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( ShopKitProductPeer::KIT_ID, $shopKit->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
		} else {
			throw new PropelException ( 'filterByShopKit() only accepts arguments of type ShopKit or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the ShopKit relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return ShopKitProductQuery The current query, for fluid interface
	 */
	public function joinShopKit($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'ShopKit' );
		
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
			$this->addJoinObject ( $join, 'ShopKit' );
		}
		
		return $this;
	}
	
	/**
	 * Use the ShopKit relation ShopKit object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return ShopKitQuery A secondary query class using the current class as primary query
	 */
	public function useShopKitQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinShopKit ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'ShopKit', 'ShopKitQuery' );
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param ShopKitProduct $shopKitProduct
	 *        	Object to remove from the list of results
	 *        	
	 * @return ShopKitProductQuery The current query, for fluid interface
	 */
	public function prune($shopKitProduct = null) {
		if ($shopKitProduct) {
			$this->addCond ( 'pruneCond0', $this->getAliasedColName ( ShopKitProductPeer::PRODUCT_ID ), $shopKitProduct->getProductId (), Criteria::NOT_EQUAL );
			$this->addCond ( 'pruneCond1', $this->getAliasedColName ( ShopKitProductPeer::KIT_ID ), $shopKitProduct->getKitId (), Criteria::NOT_EQUAL );
			$this->combine ( array (
					'pruneCond0',
					'pruneCond1' 
			), Criteria::LOGICAL_OR );
		}
		
		return $this;
	}
} // BaseShopKitProductQuery