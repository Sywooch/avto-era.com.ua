<?php


/**
 * Base class that represents a query for the 'custom_fields_data' table.
 *
 * 
 *
 * @method     CustomFieldsDataQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CustomFieldsDataQuery orderByLocale($order = Criteria::ASC) Order by the locale column
 * @method     CustomFieldsDataQuery orderByfieldId($order = Criteria::ASC) Order by the field_id column
 * @method     CustomFieldsDataQuery orderByentityId($order = Criteria::ASC) Order by the entity_id column
 * @method     CustomFieldsDataQuery orderBydata($order = Criteria::ASC) Order by the field_data column
 *
 * @method     CustomFieldsDataQuery groupById() Group by the id column
 * @method     CustomFieldsDataQuery groupByLocale() Group by the locale column
 * @method     CustomFieldsDataQuery groupByfieldId() Group by the field_id column
 * @method     CustomFieldsDataQuery groupByentityId() Group by the entity_id column
 * @method     CustomFieldsDataQuery groupBydata() Group by the field_data column
 *
 * @method     CustomFieldsDataQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CustomFieldsDataQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CustomFieldsDataQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CustomFieldsData findOne(PropelPDO $con = null) Return the first CustomFieldsData matching the query
 * @method     CustomFieldsData findOneOrCreate(PropelPDO $con = null) Return the first CustomFieldsData matching the query, or a new CustomFieldsData object populated from the query conditions when no match is found
 *
 * @method     CustomFieldsData findOneById(int $id) Return the first CustomFieldsData filtered by the id column
 * @method     CustomFieldsData findOneByLocale(string $locale) Return the first CustomFieldsData filtered by the locale column
 * @method     CustomFieldsData findOneByfieldId(int $field_id) Return the first CustomFieldsData filtered by the field_id column
 * @method     CustomFieldsData findOneByentityId(int $entity_id) Return the first CustomFieldsData filtered by the entity_id column
 * @method     CustomFieldsData findOneBydata(string $field_data) Return the first CustomFieldsData filtered by the field_data column
 *
 * @method     array findById(int $id) Return CustomFieldsData objects filtered by the id column
 * @method     array findByLocale(string $locale) Return CustomFieldsData objects filtered by the locale column
 * @method     array findByfieldId(int $field_id) Return CustomFieldsData objects filtered by the field_id column
 * @method     array findByentityId(int $entity_id) Return CustomFieldsData objects filtered by the entity_id column
 * @method     array findBydata(string $field_data) Return CustomFieldsData objects filtered by the field_data column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseCustomFieldsDataQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseCustomFieldsDataQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'CustomFieldsData', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CustomFieldsDataQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CustomFieldsDataQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CustomFieldsDataQuery) {
			return $criteria;
		}
		$query = new CustomFieldsDataQuery();
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
	 * @return    CustomFieldsData|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = CustomFieldsDataPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(CustomFieldsDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    CustomFieldsData A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `LOCALE`, `FIELD_ID`, `ENTITY_ID`, `FIELD_DATA` FROM `custom_fields_data` WHERE `ID` = :p0';
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
			$obj = new CustomFieldsData();
			$obj->hydrate($row);
			CustomFieldsDataPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    CustomFieldsData|array|mixed the result, formatted by the current formatter
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
	 * @return    CustomFieldsDataQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CustomFieldsDataPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CustomFieldsDataQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CustomFieldsDataPeer::ID, $keys, Criteria::IN);
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
	 * @return    CustomFieldsDataQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CustomFieldsDataPeer::ID, $id, $comparison);
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
	 * @return    CustomFieldsDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CustomFieldsDataPeer::LOCALE, $locale, $comparison);
	}

	/**
	 * Filter the query on the field_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByfieldId(1234); // WHERE field_id = 1234
	 * $query->filterByfieldId(array(12, 34)); // WHERE field_id IN (12, 34)
	 * $query->filterByfieldId(array('min' => 12)); // WHERE field_id > 12
	 * </code>
	 *
	 * @param     mixed $fieldId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomFieldsDataQuery The current query, for fluid interface
	 */
	public function filterByfieldId($fieldId = null, $comparison = null)
	{
		if (is_array($fieldId)) {
			$useMinMax = false;
			if (isset($fieldId['min'])) {
				$this->addUsingAlias(CustomFieldsDataPeer::FIELD_ID, $fieldId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fieldId['max'])) {
				$this->addUsingAlias(CustomFieldsDataPeer::FIELD_ID, $fieldId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CustomFieldsDataPeer::FIELD_ID, $fieldId, $comparison);
	}

	/**
	 * Filter the query on the entity_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByentityId(1234); // WHERE entity_id = 1234
	 * $query->filterByentityId(array(12, 34)); // WHERE entity_id IN (12, 34)
	 * $query->filterByentityId(array('min' => 12)); // WHERE entity_id > 12
	 * </code>
	 *
	 * @param     mixed $entityId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomFieldsDataQuery The current query, for fluid interface
	 */
	public function filterByentityId($entityId = null, $comparison = null)
	{
		if (is_array($entityId)) {
			$useMinMax = false;
			if (isset($entityId['min'])) {
				$this->addUsingAlias(CustomFieldsDataPeer::ENTITY_ID, $entityId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($entityId['max'])) {
				$this->addUsingAlias(CustomFieldsDataPeer::ENTITY_ID, $entityId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CustomFieldsDataPeer::ENTITY_ID, $entityId, $comparison);
	}

	/**
	 * Filter the query on the field_data column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBydata('fooValue');   // WHERE field_data = 'fooValue'
	 * $query->filterBydata('%fooValue%'); // WHERE field_data LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $data The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomFieldsDataQuery The current query, for fluid interface
	 */
	public function filterBydata($data = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($data)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $data)) {
				$data = str_replace('*', '%', $data);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CustomFieldsDataPeer::FIELD_DATA, $data, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     CustomFieldsData $customFieldsData Object to remove from the list of results
	 *
	 * @return    CustomFieldsDataQuery The current query, for fluid interface
	 */
	public function prune($customFieldsData = null)
	{
		if ($customFieldsData) {
			$this->addUsingAlias(CustomFieldsDataPeer::ID, $customFieldsData->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseCustomFieldsDataQuery