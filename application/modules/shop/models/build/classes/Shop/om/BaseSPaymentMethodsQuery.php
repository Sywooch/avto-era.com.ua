<?php

/**
 * Base class that represents a query for the 'shop_payment_methods' table.
 *
 * 
 *
 * @method     SPaymentMethodsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SPaymentMethodsQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     SPaymentMethodsQuery orderByCurrencyId($order = Criteria::ASC) Order by the currency_id column
 * @method     SPaymentMethodsQuery orderByPaymentSystemName($order = Criteria::ASC) Order by the payment_system_name column
 * @method     SPaymentMethodsQuery orderByPosition($order = Criteria::ASC) Order by the position column
 *
 * @method     SPaymentMethodsQuery groupById() Group by the id column
 * @method     SPaymentMethodsQuery groupByActive() Group by the active column
 * @method     SPaymentMethodsQuery groupByCurrencyId() Group by the currency_id column
 * @method     SPaymentMethodsQuery groupByPaymentSystemName() Group by the payment_system_name column
 * @method     SPaymentMethodsQuery groupByPosition() Group by the position column
 *
 * @method     SPaymentMethodsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SPaymentMethodsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SPaymentMethodsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SPaymentMethodsQuery leftJoinCurrency($relationAlias = null) Adds a LEFT JOIN clause to the query using the Currency relation
 * @method     SPaymentMethodsQuery rightJoinCurrency($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Currency relation
 * @method     SPaymentMethodsQuery innerJoinCurrency($relationAlias = null) Adds a INNER JOIN clause to the query using the Currency relation
 *
 * @method     SPaymentMethodsQuery leftJoinShopDeliveryMethodsSystems($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShopDeliveryMethodsSystems relation
 * @method     SPaymentMethodsQuery rightJoinShopDeliveryMethodsSystems($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShopDeliveryMethodsSystems relation
 * @method     SPaymentMethodsQuery innerJoinShopDeliveryMethodsSystems($relationAlias = null) Adds a INNER JOIN clause to the query using the ShopDeliveryMethodsSystems relation
 *
 * @method     SPaymentMethodsQuery leftJoinSOrders($relationAlias = null) Adds a LEFT JOIN clause to the query using the SOrders relation
 * @method     SPaymentMethodsQuery rightJoinSOrders($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SOrders relation
 * @method     SPaymentMethodsQuery innerJoinSOrders($relationAlias = null) Adds a INNER JOIN clause to the query using the SOrders relation
 *
 * @method     SPaymentMethodsQuery leftJoinSPaymentMethodsI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the SPaymentMethodsI18n relation
 * @method     SPaymentMethodsQuery rightJoinSPaymentMethodsI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SPaymentMethodsI18n relation
 * @method     SPaymentMethodsQuery innerJoinSPaymentMethodsI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the SPaymentMethodsI18n relation
 *
 * @method     SPaymentMethods findOne(PropelPDO $con = null) Return the first SPaymentMethods matching the query
 * @method     SPaymentMethods findOneOrCreate(PropelPDO $con = null) Return the first SPaymentMethods matching the query, or a new SPaymentMethods object populated from the query conditions when no match is found
 *
 * @method     SPaymentMethods findOneById(int $id) Return the first SPaymentMethods filtered by the id column
 * @method     SPaymentMethods findOneByActive(boolean $active) Return the first SPaymentMethods filtered by the active column
 * @method     SPaymentMethods findOneByCurrencyId(int $currency_id) Return the first SPaymentMethods filtered by the currency_id column
 * @method     SPaymentMethods findOneByPaymentSystemName(string $payment_system_name) Return the first SPaymentMethods filtered by the payment_system_name column
 * @method     SPaymentMethods findOneByPosition(int $position) Return the first SPaymentMethods filtered by the position column
 *
 * @method     array findById(int $id) Return SPaymentMethods objects filtered by the id column
 * @method     array findByActive(boolean $active) Return SPaymentMethods objects filtered by the active column
 * @method     array findByCurrencyId(int $currency_id) Return SPaymentMethods objects filtered by the currency_id column
 * @method     array findByPaymentSystemName(string $payment_system_name) Return SPaymentMethods objects filtered by the payment_system_name column
 * @method     array findByPosition(int $position) Return SPaymentMethods objects filtered by the position column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSPaymentMethodsQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseSPaymentMethodsQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SPaymentMethods', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new SPaymentMethodsQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return SPaymentMethodsQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof SPaymentMethodsQuery) {
			return $criteria;
		}
		$query = new SPaymentMethodsQuery ();
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
	 * @return SPaymentMethods|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SPaymentMethodsPeer::getInstanceFromPool ( ( string ) $key ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( SPaymentMethodsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return SPaymentMethods A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `ID`, `ACTIVE`, `CURRENCY_ID`, `PAYMENT_SYSTEM_NAME`, `POSITION` FROM `shop_payment_methods` WHERE `ID` = :p0';
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
			$obj = new SPaymentMethods ();
			$obj->hydrate ( $row );
			SPaymentMethodsPeer::addInstanceToPool ( $obj, ( string ) $key );
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
	 * @return SPaymentMethods|array|mixed the result, formatted by the current formatter
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
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		return $this->addUsingAlias ( SPaymentMethodsPeer::ID, $key, Criteria::EQUAL );
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		return $this->addUsingAlias ( SPaymentMethodsPeer::ID, $keys, Criteria::IN );
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
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null) {
		if (is_array ( $id ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( SPaymentMethodsPeer::ID, $id, $comparison );
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
	 * @return SPaymentMethodsQuery The current query, for fluid interface
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
		return $this->addUsingAlias ( SPaymentMethodsPeer::ACTIVE, $active, $comparison );
	}
	
	/**
	 * Filter the query on the currency_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCurrencyId(1234); // WHERE currency_id = 1234
	 * $query->filterByCurrencyId(array(12, 34)); // WHERE currency_id IN (12, 34)
	 * $query->filterByCurrencyId(array('min' => 12)); // WHERE currency_id > 12
	 * </code>
	 *
	 * @see filterByCurrency()
	 *
	 * @param mixed $currencyId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterByCurrencyId($currencyId = null, $comparison = null) {
		if (is_array ( $currencyId )) {
			$useMinMax = false;
			if (isset ( $currencyId ['min'] )) {
				$this->addUsingAlias ( SPaymentMethodsPeer::CURRENCY_ID, $currencyId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $currencyId ['max'] )) {
				$this->addUsingAlias ( SPaymentMethodsPeer::CURRENCY_ID, $currencyId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SPaymentMethodsPeer::CURRENCY_ID, $currencyId, $comparison );
	}
	
	/**
	 * Filter the query on the payment_system_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPaymentSystemName('fooValue'); // WHERE payment_system_name = 'fooValue'
	 * $query->filterByPaymentSystemName('%fooValue%'); // WHERE payment_system_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $paymentSystemName
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterByPaymentSystemName($paymentSystemName = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $paymentSystemName )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $paymentSystemName )) {
				$paymentSystemName = str_replace ( '*', '%', $paymentSystemName );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SPaymentMethodsPeer::PAYMENT_SYSTEM_NAME, $paymentSystemName, $comparison );
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
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null) {
		if (is_array ( $position )) {
			$useMinMax = false;
			if (isset ( $position ['min'] )) {
				$this->addUsingAlias ( SPaymentMethodsPeer::POSITION, $position ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $position ['max'] )) {
				$this->addUsingAlias ( SPaymentMethodsPeer::POSITION, $position ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SPaymentMethodsPeer::POSITION, $position, $comparison );
	}
	
	/**
	 * Filter the query by a related SCurrencies object
	 *
	 * @param SCurrencies|PropelCollection $sCurrencies
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterByCurrency($sCurrencies, $comparison = null) {
		if ($sCurrencies instanceof SCurrencies) {
			return $this->addUsingAlias ( SPaymentMethodsPeer::CURRENCY_ID, $sCurrencies->getId (), $comparison );
		} elseif ($sCurrencies instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( SPaymentMethodsPeer::CURRENCY_ID, $sCurrencies->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
		} else {
			throw new PropelException ( 'filterByCurrency() only accepts arguments of type SCurrencies or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the Currency relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function joinCurrency($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'Currency' );
		
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
			$this->addJoinObject ( $join, 'Currency' );
		}
		
		return $this;
	}
	
	/**
	 * Use the Currency relation SCurrencies object
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
	public function useCurrencyQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		return $this->joinCurrency ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'Currency', 'SCurrenciesQuery' );
	}
	
	/**
	 * Filter the query by a related ShopDeliveryMethodsSystems object
	 *
	 * @param ShopDeliveryMethodsSystems $shopDeliveryMethodsSystems
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterByShopDeliveryMethodsSystems($shopDeliveryMethodsSystems, $comparison = null) {
		if ($shopDeliveryMethodsSystems instanceof ShopDeliveryMethodsSystems) {
			return $this->addUsingAlias ( SPaymentMethodsPeer::ID, $shopDeliveryMethodsSystems->getPaymentMethodId (), $comparison );
		} elseif ($shopDeliveryMethodsSystems instanceof PropelCollection) {
			return $this->useShopDeliveryMethodsSystemsQuery ()->filterByPrimaryKeys ( $shopDeliveryMethodsSystems->getPrimaryKeys () )->endUse ();
		} else {
			throw new PropelException ( 'filterByShopDeliveryMethodsSystems() only accepts arguments of type ShopDeliveryMethodsSystems or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the ShopDeliveryMethodsSystems relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function joinShopDeliveryMethodsSystems($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'ShopDeliveryMethodsSystems' );
		
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
			$this->addJoinObject ( $join, 'ShopDeliveryMethodsSystems' );
		}
		
		return $this;
	}
	
	/**
	 * Use the ShopDeliveryMethodsSystems relation ShopDeliveryMethodsSystems object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return ShopDeliveryMethodsSystemsQuery A secondary query class using the current class as primary query
	 */
	public function useShopDeliveryMethodsSystemsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinShopDeliveryMethodsSystems ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'ShopDeliveryMethodsSystems', 'ShopDeliveryMethodsSystemsQuery' );
	}
	
	/**
	 * Filter the query by a related SOrders object
	 *
	 * @param SOrders $sOrders
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterBySOrders($sOrders, $comparison = null) {
		if ($sOrders instanceof SOrders) {
			return $this->addUsingAlias ( SPaymentMethodsPeer::ID, $sOrders->getPaymentMethod (), $comparison );
		} elseif ($sOrders instanceof PropelCollection) {
			return $this->useSOrdersQuery ()->filterByPrimaryKeys ( $sOrders->getPrimaryKeys () )->endUse ();
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
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function joinSOrders($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
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
	public function useSOrdersQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		return $this->joinSOrders ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SOrders', 'SOrdersQuery' );
	}
	
	/**
	 * Filter the query by a related SPaymentMethodsI18n object
	 *
	 * @param SPaymentMethodsI18n $sPaymentMethodsI18n
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterBySPaymentMethodsI18n($sPaymentMethodsI18n, $comparison = null) {
		if ($sPaymentMethodsI18n instanceof SPaymentMethodsI18n) {
			return $this->addUsingAlias ( SPaymentMethodsPeer::ID, $sPaymentMethodsI18n->getId (), $comparison );
		} elseif ($sPaymentMethodsI18n instanceof PropelCollection) {
			return $this->useSPaymentMethodsI18nQuery ()->filterByPrimaryKeys ( $sPaymentMethodsI18n->getPrimaryKeys () )->endUse ();
		} else {
			throw new PropelException ( 'filterBySPaymentMethodsI18n() only accepts arguments of type SPaymentMethodsI18n or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SPaymentMethodsI18n relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function joinSPaymentMethodsI18n($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SPaymentMethodsI18n' );
		
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
			$this->addJoinObject ( $join, 'SPaymentMethodsI18n' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SPaymentMethodsI18n relation SPaymentMethodsI18n object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SPaymentMethodsI18nQuery A secondary query class using the current class as primary query
	 */
	public function useSPaymentMethodsI18nQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinSPaymentMethodsI18n ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SPaymentMethodsI18n', 'SPaymentMethodsI18nQuery' );
	}
	
	/**
	 * Filter the query by a related SDeliveryMethods object
	 * using the shop_delivery_methods_systems table as cross reference
	 *
	 * @param SDeliveryMethods $sDeliveryMethods
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterBySDeliveryMethods($sDeliveryMethods, $comparison = Criteria::EQUAL) {
		return $this->useShopDeliveryMethodsSystemsQuery ()->filterBySDeliveryMethods ( $sDeliveryMethods, $comparison )->endUse ();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param SPaymentMethods $sPaymentMethods
	 *        	Object to remove from the list of results
	 *        	
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function prune($sPaymentMethods = null) {
		if ($sPaymentMethods) {
			$this->addUsingAlias ( SPaymentMethodsPeer::ID, $sPaymentMethods->getId (), Criteria::NOT_EQUAL );
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
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function joinI18n($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		$relationName = $relationAlias ? $relationAlias : 'SPaymentMethodsI18n';
		return $this->joinSPaymentMethodsI18n ( $relationAlias, $joinType )->addJoinCondition ( $relationName, $relationName . '.Locale = ?', $locale );
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
	 * @return SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function joinWithI18n($locale = 'ru', $joinType = Criteria::LEFT_JOIN) {
		$this->joinI18n ( $locale, null, $joinType )->with ( 'SPaymentMethodsI18n' );
		$this->with ['SPaymentMethodsI18n']->setIsWithOneToMany ( false );
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
	 * @return SPaymentMethodsI18nQuery A secondary query class using the current class as primary query
	 */
	public function useI18nQuery($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		return $this->joinI18n ( $locale, $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SPaymentMethodsI18n', 'SPaymentMethodsI18nQuery' );
	}
} // BaseSPaymentMethodsQuery