<?php


/**
 * Base class that represents a query for the 'shop_callbacks_statuses' table.
 *
 * 
 *
 * @method     SCallbackStatusesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SCallbackStatusesQuery orderByIsDefault($order = Criteria::ASC) Order by the is_default column
 *
 * @method     SCallbackStatusesQuery groupById() Group by the id column
 * @method     SCallbackStatusesQuery groupByIsDefault() Group by the is_default column
 *
 * @method     SCallbackStatusesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SCallbackStatusesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SCallbackStatusesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SCallbackStatusesQuery leftJoinSCallbacks($relationAlias = null) Adds a LEFT JOIN clause to the query using the SCallbacks relation
 * @method     SCallbackStatusesQuery rightJoinSCallbacks($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SCallbacks relation
 * @method     SCallbackStatusesQuery innerJoinSCallbacks($relationAlias = null) Adds a INNER JOIN clause to the query using the SCallbacks relation
 *
 * @method     SCallbackStatusesQuery leftJoinSCallbackStatusesI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the SCallbackStatusesI18n relation
 * @method     SCallbackStatusesQuery rightJoinSCallbackStatusesI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SCallbackStatusesI18n relation
 * @method     SCallbackStatusesQuery innerJoinSCallbackStatusesI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the SCallbackStatusesI18n relation
 *
 * @method     SCallbackStatuses findOne(PropelPDO $con = null) Return the first SCallbackStatuses matching the query
 * @method     SCallbackStatuses findOneOrCreate(PropelPDO $con = null) Return the first SCallbackStatuses matching the query, or a new SCallbackStatuses object populated from the query conditions when no match is found
 *
 * @method     SCallbackStatuses findOneById(int $id) Return the first SCallbackStatuses filtered by the id column
 * @method     SCallbackStatuses findOneByIsDefault(boolean $is_default) Return the first SCallbackStatuses filtered by the is_default column
 *
 * @method     array findById(int $id) Return SCallbackStatuses objects filtered by the id column
 * @method     array findByIsDefault(boolean $is_default) Return SCallbackStatuses objects filtered by the is_default column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSCallbackStatusesQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSCallbackStatusesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SCallbackStatuses', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SCallbackStatusesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SCallbackStatusesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SCallbackStatusesQuery) {
			return $criteria;
		}
		$query = new SCallbackStatusesQuery();
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
	 * @return    SCallbackStatuses|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SCallbackStatusesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SCallbackStatusesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    SCallbackStatuses A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `IS_DEFAULT` FROM `shop_callbacks_statuses` WHERE `ID` = :p0';
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
			$obj = new SCallbackStatuses();
			$obj->hydrate($row);
			SCallbackStatusesPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    SCallbackStatuses|array|mixed the result, formatted by the current formatter
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
	 * @return    SCallbackStatusesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SCallbackStatusesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SCallbackStatusesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SCallbackStatusesPeer::ID, $keys, Criteria::IN);
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
	 * @return    SCallbackStatusesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SCallbackStatusesPeer::ID, $id, $comparison);
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
	 * @return    SCallbackStatusesQuery The current query, for fluid interface
	 */
	public function filterByIsDefault($isDefault = null, $comparison = null)
	{
		if (is_string($isDefault)) {
			$is_default = in_array(strtolower($isDefault), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SCallbackStatusesPeer::IS_DEFAULT, $isDefault, $comparison);
	}

	/**
	 * Filter the query by a related SCallbacks object
	 *
	 * @param     SCallbacks $sCallbacks  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCallbackStatusesQuery The current query, for fluid interface
	 */
	public function filterBySCallbacks($sCallbacks, $comparison = null)
	{
		if ($sCallbacks instanceof SCallbacks) {
			return $this
				->addUsingAlias(SCallbackStatusesPeer::ID, $sCallbacks->getStatusId(), $comparison);
		} elseif ($sCallbacks instanceof PropelCollection) {
			return $this
				->useSCallbacksQuery()
				->filterByPrimaryKeys($sCallbacks->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySCallbacks() only accepts arguments of type SCallbacks or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SCallbacks relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SCallbackStatusesQuery The current query, for fluid interface
	 */
	public function joinSCallbacks($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SCallbacks');

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
			$this->addJoinObject($join, 'SCallbacks');
		}

		return $this;
	}

	/**
	 * Use the SCallbacks relation SCallbacks object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SCallbacksQuery A secondary query class using the current class as primary query
	 */
	public function useSCallbacksQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSCallbacks($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SCallbacks', 'SCallbacksQuery');
	}

	/**
	 * Filter the query by a related SCallbackStatusesI18n object
	 *
	 * @param     SCallbackStatusesI18n $sCallbackStatusesI18n  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCallbackStatusesQuery The current query, for fluid interface
	 */
	public function filterBySCallbackStatusesI18n($sCallbackStatusesI18n, $comparison = null)
	{
		if ($sCallbackStatusesI18n instanceof SCallbackStatusesI18n) {
			return $this
				->addUsingAlias(SCallbackStatusesPeer::ID, $sCallbackStatusesI18n->getId(), $comparison);
		} elseif ($sCallbackStatusesI18n instanceof PropelCollection) {
			return $this
				->useSCallbackStatusesI18nQuery()
				->filterByPrimaryKeys($sCallbackStatusesI18n->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySCallbackStatusesI18n() only accepts arguments of type SCallbackStatusesI18n or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SCallbackStatusesI18n relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SCallbackStatusesQuery The current query, for fluid interface
	 */
	public function joinSCallbackStatusesI18n($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SCallbackStatusesI18n');

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
			$this->addJoinObject($join, 'SCallbackStatusesI18n');
		}

		return $this;
	}

	/**
	 * Use the SCallbackStatusesI18n relation SCallbackStatusesI18n object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SCallbackStatusesI18nQuery A secondary query class using the current class as primary query
	 */
	public function useSCallbackStatusesI18nQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSCallbackStatusesI18n($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SCallbackStatusesI18n', 'SCallbackStatusesI18nQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SCallbackStatuses $sCallbackStatuses Object to remove from the list of results
	 *
	 * @return    SCallbackStatusesQuery The current query, for fluid interface
	 */
	public function prune($sCallbackStatuses = null)
	{
		if ($sCallbackStatuses) {
			$this->addUsingAlias(SCallbackStatusesPeer::ID, $sCallbackStatuses->getId(), Criteria::NOT_EQUAL);
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
	 * @return    SCallbackStatusesQuery The current query, for fluid interface
	 */
	public function joinI18n($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$relationName = $relationAlias ? $relationAlias : 'SCallbackStatusesI18n';
		return $this
			->joinSCallbackStatusesI18n($relationAlias, $joinType)
			->addJoinCondition($relationName, $relationName . '.Locale = ?', $locale);
	}
	
	/**
	 * Adds a JOIN clause to the query and hydrates the related I18n object.
	 * Shortcut for $c->joinI18n($locale)->with()
	 *
	 * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
	 *
	 * @return    SCallbackStatusesQuery The current query, for fluid interface
	 */
	public function joinWithI18n($locale = 'ru', $joinType = Criteria::LEFT_JOIN)
	{
		$this
			->joinI18n($locale, null, $joinType)
			->with('SCallbackStatusesI18n');
		$this->with['SCallbackStatusesI18n']->setIsWithOneToMany(false);
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
	 * @return    SCallbackStatusesI18nQuery A secondary query class using the current class as primary query
	 */
	public function useI18nQuery($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinI18n($locale, $relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SCallbackStatusesI18n', 'SCallbackStatusesI18nQuery');
	}

} // BaseSCallbackStatusesQuery