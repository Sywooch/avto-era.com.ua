<?php


/**
 * Base class that represents a query for the 'shop_banners' table.
 *
 * 
 *
 * @method     ShopBanersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ShopBanersQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     ShopBanersQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     ShopBanersQuery orderByCategories($order = Criteria::ASC) Order by the categories column
 * @method     ShopBanersQuery orderByOnMain($order = Criteria::ASC) Order by the on_main column
 * @method     ShopBanersQuery orderByEspdate($order = Criteria::ASC) Order by the espdate column
 *
 * @method     ShopBanersQuery groupById() Group by the id column
 * @method     ShopBanersQuery groupByPosition() Group by the position column
 * @method     ShopBanersQuery groupByActive() Group by the active column
 * @method     ShopBanersQuery groupByCategories() Group by the categories column
 * @method     ShopBanersQuery groupByOnMain() Group by the on_main column
 * @method     ShopBanersQuery groupByEspdate() Group by the espdate column
 *
 * @method     ShopBanersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ShopBanersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ShopBanersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ShopBanersQuery leftJoinShopBanersI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShopBanersI18n relation
 * @method     ShopBanersQuery rightJoinShopBanersI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShopBanersI18n relation
 * @method     ShopBanersQuery innerJoinShopBanersI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the ShopBanersI18n relation
 *
 * @method     ShopBaners findOne(PropelPDO $con = null) Return the first ShopBaners matching the query
 * @method     ShopBaners findOneOrCreate(PropelPDO $con = null) Return the first ShopBaners matching the query, or a new ShopBaners object populated from the query conditions when no match is found
 *
 * @method     ShopBaners findOneById(int $id) Return the first ShopBaners filtered by the id column
 * @method     ShopBaners findOneByPosition(int $position) Return the first ShopBaners filtered by the position column
 * @method     ShopBaners findOneByActive(boolean $active) Return the first ShopBaners filtered by the active column
 * @method     ShopBaners findOneByCategories(string $categories) Return the first ShopBaners filtered by the categories column
 * @method     ShopBaners findOneByOnMain(boolean $on_main) Return the first ShopBaners filtered by the on_main column
 * @method     ShopBaners findOneByEspdate(int $espdate) Return the first ShopBaners filtered by the espdate column
 *
 * @method     array findById(int $id) Return ShopBaners objects filtered by the id column
 * @method     array findByPosition(int $position) Return ShopBaners objects filtered by the position column
 * @method     array findByActive(boolean $active) Return ShopBaners objects filtered by the active column
 * @method     array findByCategories(string $categories) Return ShopBaners objects filtered by the categories column
 * @method     array findByOnMain(boolean $on_main) Return ShopBaners objects filtered by the on_main column
 * @method     array findByEspdate(int $espdate) Return ShopBaners objects filtered by the espdate column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseShopBanersQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseShopBanersQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'ShopBaners', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ShopBanersQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ShopBanersQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ShopBanersQuery) {
			return $criteria;
		}
		$query = new ShopBanersQuery();
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
	 * @return    ShopBaners|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ShopBanersPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ShopBanersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    ShopBaners A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `POSITION`, `ACTIVE`, `CATEGORIES`, `ON_MAIN`, `ESPDATE` FROM `shop_banners` WHERE `ID` = :p0';
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
			$obj = new ShopBaners();
			$obj->hydrate($row);
			ShopBanersPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    ShopBaners|array|mixed the result, formatted by the current formatter
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
	 * @return    ShopBanersQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ShopBanersPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ShopBanersQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ShopBanersPeer::ID, $keys, Criteria::IN);
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
	 * @return    ShopBanersQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ShopBanersPeer::ID, $id, $comparison);
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
	 * @param     mixed $position The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopBanersQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null)
	{
		if (is_array($position)) {
			$useMinMax = false;
			if (isset($position['min'])) {
				$this->addUsingAlias(ShopBanersPeer::POSITION, $position['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($position['max'])) {
				$this->addUsingAlias(ShopBanersPeer::POSITION, $position['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShopBanersPeer::POSITION, $position, $comparison);
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
	 * @param     boolean|string $active The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopBanersQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ShopBanersPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query on the categories column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCategories('fooValue');   // WHERE categories = 'fooValue'
	 * $query->filterByCategories('%fooValue%'); // WHERE categories LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $categories The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopBanersQuery The current query, for fluid interface
	 */
	public function filterByCategories($categories = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($categories)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $categories)) {
				$categories = str_replace('*', '%', $categories);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ShopBanersPeer::CATEGORIES, $categories, $comparison);
	}

	/**
	 * Filter the query on the on_main column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOnMain(true); // WHERE on_main = true
	 * $query->filterByOnMain('yes'); // WHERE on_main = true
	 * </code>
	 *
	 * @param     boolean|string $onMain The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopBanersQuery The current query, for fluid interface
	 */
	public function filterByOnMain($onMain = null, $comparison = null)
	{
		if (is_string($onMain)) {
			$on_main = in_array(strtolower($onMain), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ShopBanersPeer::ON_MAIN, $onMain, $comparison);
	}

	/**
	 * Filter the query on the espdate column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEspdate(1234); // WHERE espdate = 1234
	 * $query->filterByEspdate(array(12, 34)); // WHERE espdate IN (12, 34)
	 * $query->filterByEspdate(array('min' => 12)); // WHERE espdate > 12
	 * </code>
	 *
	 * @param     mixed $espdate The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopBanersQuery The current query, for fluid interface
	 */
	public function filterByEspdate($espdate = null, $comparison = null)
	{
		if (is_array($espdate)) {
			$useMinMax = false;
			if (isset($espdate['min'])) {
				$this->addUsingAlias(ShopBanersPeer::ESPDATE, $espdate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($espdate['max'])) {
				$this->addUsingAlias(ShopBanersPeer::ESPDATE, $espdate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShopBanersPeer::ESPDATE, $espdate, $comparison);
	}

	/**
	 * Filter the query by a related ShopBanersI18n object
	 *
	 * @param     ShopBanersI18n $shopBanersI18n  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopBanersQuery The current query, for fluid interface
	 */
	public function filterByShopBanersI18n($shopBanersI18n, $comparison = null)
	{
		if ($shopBanersI18n instanceof ShopBanersI18n) {
			return $this
				->addUsingAlias(ShopBanersPeer::ID, $shopBanersI18n->getId(), $comparison);
		} elseif ($shopBanersI18n instanceof PropelCollection) {
			return $this
				->useShopBanersI18nQuery()
				->filterByPrimaryKeys($shopBanersI18n->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByShopBanersI18n() only accepts arguments of type ShopBanersI18n or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ShopBanersI18n relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShopBanersQuery The current query, for fluid interface
	 */
	public function joinShopBanersI18n($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ShopBanersI18n');

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
			$this->addJoinObject($join, 'ShopBanersI18n');
		}

		return $this;
	}

	/**
	 * Use the ShopBanersI18n relation ShopBanersI18n object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShopBanersI18nQuery A secondary query class using the current class as primary query
	 */
	public function useShopBanersI18nQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinShopBanersI18n($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ShopBanersI18n', 'ShopBanersI18nQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ShopBaners $shopBaners Object to remove from the list of results
	 *
	 * @return    ShopBanersQuery The current query, for fluid interface
	 */
	public function prune($shopBaners = null)
	{
		if ($shopBaners) {
			$this->addUsingAlias(ShopBanersPeer::ID, $shopBaners->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	// i18n behavior
	
	/**
	 * Adds a JOIN clause to the query using the i18n relation
	 *
	 * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
	 *
	 * @return    ShopBanersQuery The current query, for fluid interface
	 */
	public function joinI18n($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$relationName = $relationAlias ? $relationAlias : 'ShopBanersI18n';
		return $this
			->joinShopBanersI18n($relationAlias, $joinType)
			->addJoinCondition($relationName, $relationName . '.Locale = ?', $locale);
	}
	
	/**
	 * Adds a JOIN clause to the query and hydrates the related I18n object.
	 * Shortcut for $c->joinI18n($locale)->with()
	 *
	 * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
	 *
	 * @return    ShopBanersQuery The current query, for fluid interface
	 */
	public function joinWithI18n($locale = 'ru', $joinType = Criteria::LEFT_JOIN)
	{
		$this
			->joinI18n($locale, null, $joinType)
			->with('ShopBanersI18n');
		$this->with['ShopBanersI18n']->setIsWithOneToMany(false);
		return $this;
	}
	
	/**
	 * Use the I18n relation query object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
	 *
	 * @return    ShopBanersI18nQuery A secondary query class using the current class as primary query
	 */
	public function useI18nQuery($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinI18n($locale, $relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ShopBanersI18n', 'ShopBanersI18nQuery');
	}

} // BaseShopBanersQuery