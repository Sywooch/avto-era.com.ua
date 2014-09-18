<?php


/**
 * Base class that represents a query for the 'shop_currencies' table.
 *
 * 
 *
 * @method     SCurrenciesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SCurrenciesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     SCurrenciesQuery orderByMain($order = Criteria::ASC) Order by the main column
 * @method     SCurrenciesQuery orderByIsDefault($order = Criteria::ASC) Order by the is_default column
 * @method     SCurrenciesQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     SCurrenciesQuery orderBySymbol($order = Criteria::ASC) Order by the symbol column
 * @method     SCurrenciesQuery orderByRate($order = Criteria::ASC) Order by the rate column
 * @method     SCurrenciesQuery orderByShowonsite($order = Criteria::ASC) Order by the showOnSite column
 *
 * @method     SCurrenciesQuery groupById() Group by the id column
 * @method     SCurrenciesQuery groupByName() Group by the name column
 * @method     SCurrenciesQuery groupByMain() Group by the main column
 * @method     SCurrenciesQuery groupByIsDefault() Group by the is_default column
 * @method     SCurrenciesQuery groupByCode() Group by the code column
 * @method     SCurrenciesQuery groupBySymbol() Group by the symbol column
 * @method     SCurrenciesQuery groupByRate() Group by the rate column
 * @method     SCurrenciesQuery groupByShowonsite() Group by the showOnSite column
 *
 * @method     SCurrenciesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SCurrenciesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SCurrenciesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SCurrenciesQuery leftJoinCurrency($relationAlias = null) Adds a LEFT JOIN clause to the query using the Currency relation
 * @method     SCurrenciesQuery rightJoinCurrency($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Currency relation
 * @method     SCurrenciesQuery innerJoinCurrency($relationAlias = null) Adds a INNER JOIN clause to the query using the Currency relation
 *
 * @method     SCurrenciesQuery leftJoinSPaymentMethods($relationAlias = null) Adds a LEFT JOIN clause to the query using the SPaymentMethods relation
 * @method     SCurrenciesQuery rightJoinSPaymentMethods($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SPaymentMethods relation
 * @method     SCurrenciesQuery innerJoinSPaymentMethods($relationAlias = null) Adds a INNER JOIN clause to the query using the SPaymentMethods relation
 *
 * @method     SCurrencies findOne(PropelPDO $con = null) Return the first SCurrencies matching the query
 * @method     SCurrencies findOneOrCreate(PropelPDO $con = null) Return the first SCurrencies matching the query, or a new SCurrencies object populated from the query conditions when no match is found
 *
 * @method     SCurrencies findOneById(int $id) Return the first SCurrencies filtered by the id column
 * @method     SCurrencies findOneByName(string $name) Return the first SCurrencies filtered by the name column
 * @method     SCurrencies findOneByMain(boolean $main) Return the first SCurrencies filtered by the main column
 * @method     SCurrencies findOneByIsDefault(boolean $is_default) Return the first SCurrencies filtered by the is_default column
 * @method     SCurrencies findOneByCode(string $code) Return the first SCurrencies filtered by the code column
 * @method     SCurrencies findOneBySymbol(string $symbol) Return the first SCurrencies filtered by the symbol column
 * @method     SCurrencies findOneByRate(string $rate) Return the first SCurrencies filtered by the rate column
 * @method     SCurrencies findOneByShowonsite(int $showOnSite) Return the first SCurrencies filtered by the showOnSite column
 *
 * @method     array findById(int $id) Return SCurrencies objects filtered by the id column
 * @method     array findByName(string $name) Return SCurrencies objects filtered by the name column
 * @method     array findByMain(boolean $main) Return SCurrencies objects filtered by the main column
 * @method     array findByIsDefault(boolean $is_default) Return SCurrencies objects filtered by the is_default column
 * @method     array findByCode(string $code) Return SCurrencies objects filtered by the code column
 * @method     array findBySymbol(string $symbol) Return SCurrencies objects filtered by the symbol column
 * @method     array findByRate(string $rate) Return SCurrencies objects filtered by the rate column
 * @method     array findByShowonsite(int $showOnSite) Return SCurrencies objects filtered by the showOnSite column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSCurrenciesQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSCurrenciesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SCurrencies', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SCurrenciesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SCurrenciesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SCurrenciesQuery) {
			return $criteria;
		}
		$query = new SCurrenciesQuery();
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
	 * @return    SCurrencies|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SCurrenciesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SCurrenciesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    SCurrencies A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NAME`, `MAIN`, `IS_DEFAULT`, `CODE`, `SYMBOL`, `RATE`, `SHOWONSITE` FROM `shop_currencies` WHERE `ID` = :p0';
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
			$obj = new SCurrencies();
			$obj->hydrate($row);
			SCurrenciesPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    SCurrencies|array|mixed the result, formatted by the current formatter
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
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SCurrenciesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SCurrenciesPeer::ID, $keys, Criteria::IN);
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
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SCurrenciesPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
	 * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $name The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SCurrenciesPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the main column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMain(true); // WHERE main = true
	 * $query->filterByMain('yes'); // WHERE main = true
	 * </code>
	 *
	 * @param     boolean|string $main The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterByMain($main = null, $comparison = null)
	{
		if (is_string($main)) {
			$main = in_array(strtolower($main), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SCurrenciesPeer::MAIN, $main, $comparison);
	}

	/**
	 * Filter the query on the is_default column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIsDefault(true); // WHERE is_default = true
	 * $query->filterByIsDefault('yes'); // WHERE is_default = true
	 * </code>
	 *
	 * @param     boolean|string $isDefault The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterByIsDefault($isDefault = null, $comparison = null)
	{
		if (is_string($isDefault)) {
			$is_default = in_array(strtolower($isDefault), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SCurrenciesPeer::IS_DEFAULT, $isDefault, $comparison);
	}

	/**
	 * Filter the query on the code column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
	 * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $code The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterByCode($code = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($code)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $code)) {
				$code = str_replace('*', '%', $code);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SCurrenciesPeer::CODE, $code, $comparison);
	}

	/**
	 * Filter the query on the symbol column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySymbol('fooValue');   // WHERE symbol = 'fooValue'
	 * $query->filterBySymbol('%fooValue%'); // WHERE symbol LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $symbol The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterBySymbol($symbol = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($symbol)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $symbol)) {
				$symbol = str_replace('*', '%', $symbol);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SCurrenciesPeer::SYMBOL, $symbol, $comparison);
	}

	/**
	 * Filter the query on the rate column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRate(1234); // WHERE rate = 1234
	 * $query->filterByRate(array(12, 34)); // WHERE rate IN (12, 34)
	 * $query->filterByRate(array('min' => 12)); // WHERE rate > 12
	 * </code>
	 *
	 * @param     mixed $rate The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterByRate($rate = null, $comparison = null)
	{
		if (is_array($rate)) {
			$useMinMax = false;
			if (isset($rate['min'])) {
				$this->addUsingAlias(SCurrenciesPeer::RATE, $rate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($rate['max'])) {
				$this->addUsingAlias(SCurrenciesPeer::RATE, $rate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SCurrenciesPeer::RATE, $rate, $comparison);
	}

	/**
	 * Filter the query on the showOnSite column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShowonsite(1234); // WHERE showOnSite = 1234
	 * $query->filterByShowonsite(array(12, 34)); // WHERE showOnSite IN (12, 34)
	 * $query->filterByShowonsite(array('min' => 12)); // WHERE showOnSite > 12
	 * </code>
	 *
	 * @param     mixed $showonsite The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterByShowonsite($showonsite = null, $comparison = null)
	{
		if (is_array($showonsite)) {
			$useMinMax = false;
			if (isset($showonsite['min'])) {
				$this->addUsingAlias(SCurrenciesPeer::SHOWONSITE, $showonsite['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($showonsite['max'])) {
				$this->addUsingAlias(SCurrenciesPeer::SHOWONSITE, $showonsite['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SCurrenciesPeer::SHOWONSITE, $showonsite, $comparison);
	}

	/**
	 * Filter the query by a related SProductVariants object
	 *
	 * @param     SProductVariants $sProductVariants  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterByCurrency($sProductVariants, $comparison = null)
	{
		if ($sProductVariants instanceof SProductVariants) {
			return $this
				->addUsingAlias(SCurrenciesPeer::ID, $sProductVariants->getCurrency(), $comparison);
		} elseif ($sProductVariants instanceof PropelCollection) {
			return $this
				->useCurrencyQuery()
				->filterByPrimaryKeys($sProductVariants->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByCurrency() only accepts arguments of type SProductVariants or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Currency relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function joinCurrency($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Currency');

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
			$this->addJoinObject($join, 'Currency');
		}

		return $this;
	}

	/**
	 * Use the Currency relation SProductVariants object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductVariantsQuery A secondary query class using the current class as primary query
	 */
	public function useCurrencyQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCurrency($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Currency', 'SProductVariantsQuery');
	}

	/**
	 * Filter the query by a related SPaymentMethods object
	 *
	 * @param     SPaymentMethods $sPaymentMethods  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterBySPaymentMethods($sPaymentMethods, $comparison = null)
	{
		if ($sPaymentMethods instanceof SPaymentMethods) {
			return $this
				->addUsingAlias(SCurrenciesPeer::ID, $sPaymentMethods->getCurrencyId(), $comparison);
		} elseif ($sPaymentMethods instanceof PropelCollection) {
			return $this
				->useSPaymentMethodsQuery()
				->filterByPrimaryKeys($sPaymentMethods->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySPaymentMethods() only accepts arguments of type SPaymentMethods or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SPaymentMethods relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function joinSPaymentMethods($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SPaymentMethods');

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
			$this->addJoinObject($join, 'SPaymentMethods');
		}

		return $this;
	}

	/**
	 * Use the SPaymentMethods relation SPaymentMethods object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SPaymentMethodsQuery A secondary query class using the current class as primary query
	 */
	public function useSPaymentMethodsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSPaymentMethods($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SPaymentMethods', 'SPaymentMethodsQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SCurrencies $sCurrencies Object to remove from the list of results
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function prune($sCurrencies = null)
	{
		if ($sCurrencies) {
			$this->addUsingAlias(SCurrenciesPeer::ID, $sCurrencies->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseSCurrenciesQuery