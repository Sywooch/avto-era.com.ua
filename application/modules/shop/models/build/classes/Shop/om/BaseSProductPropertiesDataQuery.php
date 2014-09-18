<?php


/**
 * Base class that represents a query for the 'shop_product_properties_data' table.
 *
 * 
 *
 * @method     SProductPropertiesDataQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SProductPropertiesDataQuery orderByPropertyId($order = Criteria::ASC) Order by the property_id column
 * @method     SProductPropertiesDataQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     SProductPropertiesDataQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method     SProductPropertiesDataQuery orderByLocale($order = Criteria::ASC) Order by the locale column
 *
 * @method     SProductPropertiesDataQuery groupById() Group by the id column
 * @method     SProductPropertiesDataQuery groupByPropertyId() Group by the property_id column
 * @method     SProductPropertiesDataQuery groupByProductId() Group by the product_id column
 * @method     SProductPropertiesDataQuery groupByValue() Group by the value column
 * @method     SProductPropertiesDataQuery groupByLocale() Group by the locale column
 *
 * @method     SProductPropertiesDataQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SProductPropertiesDataQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SProductPropertiesDataQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SProductPropertiesDataQuery leftJoinSProperties($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProperties relation
 * @method     SProductPropertiesDataQuery rightJoinSProperties($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProperties relation
 * @method     SProductPropertiesDataQuery innerJoinSProperties($relationAlias = null) Adds a INNER JOIN clause to the query using the SProperties relation
 *
 * @method     SProductPropertiesDataQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method     SProductPropertiesDataQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method     SProductPropertiesDataQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method     SProductPropertiesData findOne(PropelPDO $con = null) Return the first SProductPropertiesData matching the query
 * @method     SProductPropertiesData findOneOrCreate(PropelPDO $con = null) Return the first SProductPropertiesData matching the query, or a new SProductPropertiesData object populated from the query conditions when no match is found
 *
 * @method     SProductPropertiesData findOneById(int $id) Return the first SProductPropertiesData filtered by the id column
 * @method     SProductPropertiesData findOneByPropertyId(int $property_id) Return the first SProductPropertiesData filtered by the property_id column
 * @method     SProductPropertiesData findOneByProductId(int $product_id) Return the first SProductPropertiesData filtered by the product_id column
 * @method     SProductPropertiesData findOneByValue(string $value) Return the first SProductPropertiesData filtered by the value column
 * @method     SProductPropertiesData findOneByLocale(string $locale) Return the first SProductPropertiesData filtered by the locale column
 *
 * @method     array findById(int $id) Return SProductPropertiesData objects filtered by the id column
 * @method     array findByPropertyId(int $property_id) Return SProductPropertiesData objects filtered by the property_id column
 * @method     array findByProductId(int $product_id) Return SProductPropertiesData objects filtered by the product_id column
 * @method     array findByValue(string $value) Return SProductPropertiesData objects filtered by the value column
 * @method     array findByLocale(string $locale) Return SProductPropertiesData objects filtered by the locale column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSProductPropertiesDataQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSProductPropertiesDataQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SProductPropertiesData', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SProductPropertiesDataQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SProductPropertiesDataQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SProductPropertiesDataQuery) {
			return $criteria;
		}
		$query = new SProductPropertiesDataQuery();
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
	 * @return    SProductPropertiesData|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SProductPropertiesDataPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SProductPropertiesDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    SProductPropertiesData A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PROPERTY_ID`, `PRODUCT_ID`, `VALUE`, `LOCALE` FROM `shop_product_properties_data` WHERE `ID` = :p0';
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
			$obj = new SProductPropertiesData();
			$obj->hydrate($row);
			SProductPropertiesDataPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    SProductPropertiesData|array|mixed the result, formatted by the current formatter
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
	 * @return    SProductPropertiesDataQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SProductPropertiesDataPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SProductPropertiesDataQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SProductPropertiesDataPeer::ID, $keys, Criteria::IN);
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
	 * @return    SProductPropertiesDataQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SProductPropertiesDataPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the property_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPropertyId(1234); // WHERE property_id = 1234
	 * $query->filterByPropertyId(array(12, 34)); // WHERE property_id IN (12, 34)
	 * $query->filterByPropertyId(array('min' => 12)); // WHERE property_id > 12
	 * </code>
	 *
	 * @see       filterBySProperties()
	 *
	 * @param     mixed $propertyId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductPropertiesDataQuery The current query, for fluid interface
	 */
	public function filterByPropertyId($propertyId = null, $comparison = null)
	{
		if (is_array($propertyId)) {
			$useMinMax = false;
			if (isset($propertyId['min'])) {
				$this->addUsingAlias(SProductPropertiesDataPeer::PROPERTY_ID, $propertyId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($propertyId['max'])) {
				$this->addUsingAlias(SProductPropertiesDataPeer::PROPERTY_ID, $propertyId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductPropertiesDataPeer::PROPERTY_ID, $propertyId, $comparison);
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
	 * @see       filterByProduct()
	 *
	 * @param     mixed $productId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductPropertiesDataQuery The current query, for fluid interface
	 */
	public function filterByProductId($productId = null, $comparison = null)
	{
		if (is_array($productId)) {
			$useMinMax = false;
			if (isset($productId['min'])) {
				$this->addUsingAlias(SProductPropertiesDataPeer::PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($productId['max'])) {
				$this->addUsingAlias(SProductPropertiesDataPeer::PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductPropertiesDataPeer::PRODUCT_ID, $productId, $comparison);
	}

	/**
	 * Filter the query on the value column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
	 * $query->filterByValue('%fooValue%'); // WHERE value LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $value The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductPropertiesDataQuery The current query, for fluid interface
	 */
	public function filterByValue($value = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($value)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $value)) {
				$value = str_replace('*', '%', $value);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductPropertiesDataPeer::VALUE, $value, $comparison);
	}

	/**
	 * Filter the query on the locale column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLocale('fooValue');   // WHERE locale = 'fooValue'
	 * $query->filterByLocale('%fooValue%'); // WHERE locale LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $locale The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductPropertiesDataQuery The current query, for fluid interface
	 */
	public function filterByLocale($locale = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($locale)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $locale)) {
				$locale = str_replace('*', '%', $locale);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductPropertiesDataPeer::LOCALE, $locale, $comparison);
	}

	/**
	 * Filter the query by a related SProperties object
	 *
	 * @param     SProperties|PropelCollection $sProperties The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductPropertiesDataQuery The current query, for fluid interface
	 */
	public function filterBySProperties($sProperties, $comparison = null)
	{
		if ($sProperties instanceof SProperties) {
			return $this
				->addUsingAlias(SProductPropertiesDataPeer::PROPERTY_ID, $sProperties->getId(), $comparison);
		} elseif ($sProperties instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SProductPropertiesDataPeer::PROPERTY_ID, $sProperties->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySProperties() only accepts arguments of type SProperties or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SProperties relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductPropertiesDataQuery The current query, for fluid interface
	 */
	public function joinSProperties($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SProperties');

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
			$this->addJoinObject($join, 'SProperties');
		}

		return $this;
	}

	/**
	 * Use the SProperties relation SProperties object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SPropertiesQuery A secondary query class using the current class as primary query
	 */
	public function useSPropertiesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSProperties($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SProperties', 'SPropertiesQuery');
	}

	/**
	 * Filter the query by a related SProducts object
	 *
	 * @param     SProducts|PropelCollection $sProducts The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductPropertiesDataQuery The current query, for fluid interface
	 */
	public function filterByProduct($sProducts, $comparison = null)
	{
		if ($sProducts instanceof SProducts) {
			return $this
				->addUsingAlias(SProductPropertiesDataPeer::PRODUCT_ID, $sProducts->getId(), $comparison);
		} elseif ($sProducts instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SProductPropertiesDataPeer::PRODUCT_ID, $sProducts->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByProduct() only accepts arguments of type SProducts or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Product relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductPropertiesDataQuery The current query, for fluid interface
	 */
	public function joinProduct($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Product');

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
			$this->addJoinObject($join, 'Product');
		}

		return $this;
	}

	/**
	 * Use the Product relation SProducts object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery A secondary query class using the current class as primary query
	 */
	public function useProductQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinProduct($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Product', 'SProductsQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SProductPropertiesData $sProductPropertiesData Object to remove from the list of results
	 *
	 * @return    SProductPropertiesDataQuery The current query, for fluid interface
	 */
	public function prune($sProductPropertiesData = null)
	{
		if ($sProductPropertiesData) {
			$this->addUsingAlias(SProductPropertiesDataPeer::ID, $sProductPropertiesData->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseSProductPropertiesDataQuery