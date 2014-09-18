<?php


/**
 * Base class that represents a query for the 'shop_products_i18n' table.
 *
 * 
 *
 * @method     SProductsI18nQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SProductsI18nQuery orderByLocale($order = Criteria::ASC) Order by the locale column
 * @method     SProductsI18nQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     SProductsI18nQuery orderByShortDescription($order = Criteria::ASC) Order by the short_description column
 * @method     SProductsI18nQuery orderByFullDescription($order = Criteria::ASC) Order by the full_description column
 * @method     SProductsI18nQuery orderByMetaTitle($order = Criteria::ASC) Order by the meta_title column
 * @method     SProductsI18nQuery orderByMetaDescription($order = Criteria::ASC) Order by the meta_description column
 * @method     SProductsI18nQuery orderByMetaKeywords($order = Criteria::ASC) Order by the meta_keywords column
 *
 * @method     SProductsI18nQuery groupById() Group by the id column
 * @method     SProductsI18nQuery groupByLocale() Group by the locale column
 * @method     SProductsI18nQuery groupByName() Group by the name column
 * @method     SProductsI18nQuery groupByShortDescription() Group by the short_description column
 * @method     SProductsI18nQuery groupByFullDescription() Group by the full_description column
 * @method     SProductsI18nQuery groupByMetaTitle() Group by the meta_title column
 * @method     SProductsI18nQuery groupByMetaDescription() Group by the meta_description column
 * @method     SProductsI18nQuery groupByMetaKeywords() Group by the meta_keywords column
 *
 * @method     SProductsI18nQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SProductsI18nQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SProductsI18nQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SProductsI18nQuery leftJoinSProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProducts relation
 * @method     SProductsI18nQuery rightJoinSProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProducts relation
 * @method     SProductsI18nQuery innerJoinSProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SProducts relation
 *
 * @method     SProductsI18n findOne(PropelPDO $con = null) Return the first SProductsI18n matching the query
 * @method     SProductsI18n findOneOrCreate(PropelPDO $con = null) Return the first SProductsI18n matching the query, or a new SProductsI18n object populated from the query conditions when no match is found
 *
 * @method     SProductsI18n findOneById(int $id) Return the first SProductsI18n filtered by the id column
 * @method     SProductsI18n findOneByLocale(string $locale) Return the first SProductsI18n filtered by the locale column
 * @method     SProductsI18n findOneByName(string $name) Return the first SProductsI18n filtered by the name column
 * @method     SProductsI18n findOneByShortDescription(string $short_description) Return the first SProductsI18n filtered by the short_description column
 * @method     SProductsI18n findOneByFullDescription(string $full_description) Return the first SProductsI18n filtered by the full_description column
 * @method     SProductsI18n findOneByMetaTitle(string $meta_title) Return the first SProductsI18n filtered by the meta_title column
 * @method     SProductsI18n findOneByMetaDescription(string $meta_description) Return the first SProductsI18n filtered by the meta_description column
 * @method     SProductsI18n findOneByMetaKeywords(string $meta_keywords) Return the first SProductsI18n filtered by the meta_keywords column
 *
 * @method     array findById(int $id) Return SProductsI18n objects filtered by the id column
 * @method     array findByLocale(string $locale) Return SProductsI18n objects filtered by the locale column
 * @method     array findByName(string $name) Return SProductsI18n objects filtered by the name column
 * @method     array findByShortDescription(string $short_description) Return SProductsI18n objects filtered by the short_description column
 * @method     array findByFullDescription(string $full_description) Return SProductsI18n objects filtered by the full_description column
 * @method     array findByMetaTitle(string $meta_title) Return SProductsI18n objects filtered by the meta_title column
 * @method     array findByMetaDescription(string $meta_description) Return SProductsI18n objects filtered by the meta_description column
 * @method     array findByMetaKeywords(string $meta_keywords) Return SProductsI18n objects filtered by the meta_keywords column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSProductsI18nQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSProductsI18nQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SProductsI18n', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SProductsI18nQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SProductsI18nQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SProductsI18nQuery) {
			return $criteria;
		}
		$query = new SProductsI18nQuery();
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
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 *
	 * @param     array[$id, $locale] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    SProductsI18n|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SProductsI18nPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SProductsI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    SProductsI18n A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `LOCALE`, `NAME`, `SHORT_DESCRIPTION`, `FULL_DESCRIPTION`, `META_TITLE`, `META_DESCRIPTION`, `META_KEYWORDS` FROM `shop_products_i18n` WHERE `ID` = :p0 AND `LOCALE` = :p1';
		try {
			$stmt = $con->prepare($sql);			
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);			
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new SProductsI18n();
			$obj->hydrate($row);
			SProductsI18nPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
	 * @return    SProductsI18n|array|mixed the result, formatted by the current formatter
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return    SProductsI18nQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(SProductsI18nPeer::ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(SProductsI18nPeer::LOCALE, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SProductsI18nQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(SProductsI18nPeer::ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(SProductsI18nPeer::LOCALE, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
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
	 * @see       filterBySProducts()
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsI18nQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SProductsI18nPeer::ID, $id, $comparison);
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
	 * @return    SProductsI18nQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SProductsI18nPeer::LOCALE, $locale, $comparison);
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
	 * @return    SProductsI18nQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SProductsI18nPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the short_description column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShortDescription('fooValue');   // WHERE short_description = 'fooValue'
	 * $query->filterByShortDescription('%fooValue%'); // WHERE short_description LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $shortDescription The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsI18nQuery The current query, for fluid interface
	 */
	public function filterByShortDescription($shortDescription = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($shortDescription)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $shortDescription)) {
				$shortDescription = str_replace('*', '%', $shortDescription);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsI18nPeer::SHORT_DESCRIPTION, $shortDescription, $comparison);
	}

	/**
	 * Filter the query on the full_description column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFullDescription('fooValue');   // WHERE full_description = 'fooValue'
	 * $query->filterByFullDescription('%fooValue%'); // WHERE full_description LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $fullDescription The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsI18nQuery The current query, for fluid interface
	 */
	public function filterByFullDescription($fullDescription = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fullDescription)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fullDescription)) {
				$fullDescription = str_replace('*', '%', $fullDescription);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsI18nPeer::FULL_DESCRIPTION, $fullDescription, $comparison);
	}

	/**
	 * Filter the query on the meta_title column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMetaTitle('fooValue');   // WHERE meta_title = 'fooValue'
	 * $query->filterByMetaTitle('%fooValue%'); // WHERE meta_title LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $metaTitle The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsI18nQuery The current query, for fluid interface
	 */
	public function filterByMetaTitle($metaTitle = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($metaTitle)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $metaTitle)) {
				$metaTitle = str_replace('*', '%', $metaTitle);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsI18nPeer::META_TITLE, $metaTitle, $comparison);
	}

	/**
	 * Filter the query on the meta_description column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMetaDescription('fooValue');   // WHERE meta_description = 'fooValue'
	 * $query->filterByMetaDescription('%fooValue%'); // WHERE meta_description LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $metaDescription The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsI18nQuery The current query, for fluid interface
	 */
	public function filterByMetaDescription($metaDescription = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($metaDescription)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $metaDescription)) {
				$metaDescription = str_replace('*', '%', $metaDescription);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsI18nPeer::META_DESCRIPTION, $metaDescription, $comparison);
	}

	/**
	 * Filter the query on the meta_keywords column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMetaKeywords('fooValue');   // WHERE meta_keywords = 'fooValue'
	 * $query->filterByMetaKeywords('%fooValue%'); // WHERE meta_keywords LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $metaKeywords The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsI18nQuery The current query, for fluid interface
	 */
	public function filterByMetaKeywords($metaKeywords = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($metaKeywords)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $metaKeywords)) {
				$metaKeywords = str_replace('*', '%', $metaKeywords);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsI18nPeer::META_KEYWORDS, $metaKeywords, $comparison);
	}

	/**
	 * Filter the query by a related SProducts object
	 *
	 * @param     SProducts|PropelCollection $sProducts The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsI18nQuery The current query, for fluid interface
	 */
	public function filterBySProducts($sProducts, $comparison = null)
	{
		if ($sProducts instanceof SProducts) {
			return $this
				->addUsingAlias(SProductsI18nPeer::ID, $sProducts->getId(), $comparison);
		} elseif ($sProducts instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SProductsI18nPeer::ID, $sProducts->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySProducts() only accepts arguments of type SProducts or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SProducts relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsI18nQuery The current query, for fluid interface
	 */
	public function joinSProducts($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SProducts');

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
			$this->addJoinObject($join, 'SProducts');
		}

		return $this;
	}

	/**
	 * Use the SProducts relation SProducts object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery A secondary query class using the current class as primary query
	 */
	public function useSProductsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSProducts($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SProducts', 'SProductsQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SProductsI18n $sProductsI18n Object to remove from the list of results
	 *
	 * @return    SProductsI18nQuery The current query, for fluid interface
	 */
	public function prune($sProductsI18n = null)
	{
		if ($sProductsI18n) {
			$this->addCond('pruneCond0', $this->getAliasedColName(SProductsI18nPeer::ID), $sProductsI18n->getId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(SProductsI18nPeer::LOCALE), $sProductsI18n->getLocale(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseSProductsI18nQuery