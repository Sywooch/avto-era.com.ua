<?php

/**
 * Base class that represents a query for the 'custom_fields' table.
 *
 * 
 *
 * @method     CustomFieldsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CustomFieldsQuery orderByEntity($order = Criteria::ASC) Order by the entity column
 * @method     CustomFieldsQuery orderBytypeId($order = Criteria::ASC) Order by the field_type_id column
 * @method     CustomFieldsQuery orderByname($order = Criteria::ASC) Order by the field_name column
 * @method     CustomFieldsQuery orderByIsRequired($order = Criteria::ASC) Order by the is_required column
 * @method     CustomFieldsQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method     CustomFieldsQuery orderByOptions($order = Criteria::ASC) Order by the options column
 * @method     CustomFieldsQuery orderByIsPrivate($order = Criteria::ASC) Order by the is_private column
 * @method     CustomFieldsQuery orderByValidators($order = Criteria::ASC) Order by the validators column
 * @method     CustomFieldsQuery orderByclasses($order = Criteria::ASC) Order by the classes column
 * @method     CustomFieldsQuery orderByposition($order = Criteria::ASC) Order by the position column
 *
 * @method     CustomFieldsQuery groupById() Group by the id column
 * @method     CustomFieldsQuery groupByEntity() Group by the entity column
 * @method     CustomFieldsQuery groupBytypeId() Group by the field_type_id column
 * @method     CustomFieldsQuery groupByname() Group by the field_name column
 * @method     CustomFieldsQuery groupByIsRequired() Group by the is_required column
 * @method     CustomFieldsQuery groupByIsActive() Group by the is_active column
 * @method     CustomFieldsQuery groupByOptions() Group by the options column
 * @method     CustomFieldsQuery groupByIsPrivate() Group by the is_private column
 * @method     CustomFieldsQuery groupByValidators() Group by the validators column
 * @method     CustomFieldsQuery groupByclasses() Group by the classes column
 * @method     CustomFieldsQuery groupByposition() Group by the position column
 *
 * @method     CustomFieldsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CustomFieldsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CustomFieldsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CustomFieldsQuery leftJoinCustomFieldsI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomFieldsI18n relation
 * @method     CustomFieldsQuery rightJoinCustomFieldsI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomFieldsI18n relation
 * @method     CustomFieldsQuery innerJoinCustomFieldsI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomFieldsI18n relation
 *
 * @method     CustomFields findOne(PropelPDO $con = null) Return the first CustomFields matching the query
 * @method     CustomFields findOneOrCreate(PropelPDO $con = null) Return the first CustomFields matching the query, or a new CustomFields object populated from the query conditions when no match is found
 *
 * @method     CustomFields findOneById(int $id) Return the first CustomFields filtered by the id column
 * @method     CustomFields findOneByEntity(string $entity) Return the first CustomFields filtered by the entity column
 * @method     CustomFields findOneBytypeId(int $field_type_id) Return the first CustomFields filtered by the field_type_id column
 * @method     CustomFields findOneByname(string $field_name) Return the first CustomFields filtered by the field_name column
 * @method     CustomFields findOneByIsRequired(boolean $is_required) Return the first CustomFields filtered by the is_required column
 * @method     CustomFields findOneByIsActive(boolean $is_active) Return the first CustomFields filtered by the is_active column
 * @method     CustomFields findOneByOptions(string $options) Return the first CustomFields filtered by the options column
 * @method     CustomFields findOneByIsPrivate(boolean $is_private) Return the first CustomFields filtered by the is_private column
 * @method     CustomFields findOneByValidators(string $validators) Return the first CustomFields filtered by the validators column
 * @method     CustomFields findOneByclasses(string $classes) Return the first CustomFields filtered by the classes column
 * @method     CustomFields findOneByposition(int $position) Return the first CustomFields filtered by the position column
 *
 * @method     array findById(int $id) Return CustomFields objects filtered by the id column
 * @method     array findByEntity(string $entity) Return CustomFields objects filtered by the entity column
 * @method     array findBytypeId(int $field_type_id) Return CustomFields objects filtered by the field_type_id column
 * @method     array findByname(string $field_name) Return CustomFields objects filtered by the field_name column
 * @method     array findByIsRequired(boolean $is_required) Return CustomFields objects filtered by the is_required column
 * @method     array findByIsActive(boolean $is_active) Return CustomFields objects filtered by the is_active column
 * @method     array findByOptions(string $options) Return CustomFields objects filtered by the options column
 * @method     array findByIsPrivate(boolean $is_private) Return CustomFields objects filtered by the is_private column
 * @method     array findByValidators(string $validators) Return CustomFields objects filtered by the validators column
 * @method     array findByclasses(string $classes) Return CustomFields objects filtered by the classes column
 * @method     array findByposition(int $position) Return CustomFields objects filtered by the position column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseCustomFieldsQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseCustomFieldsQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'CustomFields', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new CustomFieldsQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return CustomFieldsQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof CustomFieldsQuery) {
			return $criteria;
		}
		$query = new CustomFieldsQuery ();
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
	 * @return CustomFields|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = CustomFieldsPeer::getInstanceFromPool ( ( string ) $key ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( CustomFieldsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return CustomFields A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `ID`, `ENTITY`, `FIELD_TYPE_ID`, `FIELD_NAME`, `IS_REQUIRED`, `IS_ACTIVE`, `OPTIONS`, `IS_PRIVATE`, `VALIDATORS`, `CLASSES`, `POSITION` FROM `custom_fields` WHERE `ID` = :p0';
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
			$obj = new CustomFields ();
			$obj->hydrate ( $row );
			CustomFieldsPeer::addInstanceToPool ( $obj, ( string ) $key );
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
	 * @return CustomFields|array|mixed the result, formatted by the current formatter
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
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		return $this->addUsingAlias ( CustomFieldsPeer::ID, $key, Criteria::EQUAL );
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		return $this->addUsingAlias ( CustomFieldsPeer::ID, $keys, Criteria::IN );
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
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null) {
		if (is_array ( $id ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( CustomFieldsPeer::ID, $id, $comparison );
	}
	
	/**
	 * Filter the query on the entity column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEntity('fooValue'); // WHERE entity = 'fooValue'
	 * $query->filterByEntity('%fooValue%'); // WHERE entity LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $entity
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function filterByEntity($entity = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $entity )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $entity )) {
				$entity = str_replace ( '*', '%', $entity );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( CustomFieldsPeer::ENTITY, $entity, $comparison );
	}
	
	/**
	 * Filter the query on the field_type_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBytypeId(1234); // WHERE field_type_id = 1234
	 * $query->filterBytypeId(array(12, 34)); // WHERE field_type_id IN (12, 34)
	 * $query->filterBytypeId(array('min' => 12)); // WHERE field_type_id > 12
	 * </code>
	 *
	 * @param mixed $typeId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function filterBytypeId($typeId = null, $comparison = null) {
		if (is_array ( $typeId )) {
			$useMinMax = false;
			if (isset ( $typeId ['min'] )) {
				$this->addUsingAlias ( CustomFieldsPeer::FIELD_TYPE_ID, $typeId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $typeId ['max'] )) {
				$this->addUsingAlias ( CustomFieldsPeer::FIELD_TYPE_ID, $typeId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( CustomFieldsPeer::FIELD_TYPE_ID, $typeId, $comparison );
	}
	
	/**
	 * Filter the query on the field_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByname('fooValue'); // WHERE field_name = 'fooValue'
	 * $query->filterByname('%fooValue%'); // WHERE field_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $name
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function filterByname($name = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $name )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $name )) {
				$name = str_replace ( '*', '%', $name );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( CustomFieldsPeer::FIELD_NAME, $name, $comparison );
	}
	
	/**
	 * Filter the query on the is_required column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIsRequired(true); // WHERE is_required = true
	 * $query->filterByIsRequired('yes'); // WHERE is_required = true
	 * </code>
	 *
	 * @param boolean|string $isRequired
	 *        	The value to use as filter.
	 *        	Non-boolean arguments are converted using the following rules:
	 *        	* 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 *        	* 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 *        	Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function filterByIsRequired($isRequired = null, $comparison = null) {
		if (is_string ( $isRequired )) {
			$is_required = in_array ( strtolower ( $isRequired ), array (
					'false',
					'off',
					'-',
					'no',
					'n',
					'0',
					'' 
			) ) ? false : true;
		}
		return $this->addUsingAlias ( CustomFieldsPeer::IS_REQUIRED, $isRequired, $comparison );
	}
	
	/**
	 * Filter the query on the is_active column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIsActive(true); // WHERE is_active = true
	 * $query->filterByIsActive('yes'); // WHERE is_active = true
	 * </code>
	 *
	 * @param boolean|string $isActive
	 *        	The value to use as filter.
	 *        	Non-boolean arguments are converted using the following rules:
	 *        	* 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 *        	* 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 *        	Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function filterByIsActive($isActive = null, $comparison = null) {
		if (is_string ( $isActive )) {
			$is_active = in_array ( strtolower ( $isActive ), array (
					'false',
					'off',
					'-',
					'no',
					'n',
					'0',
					'' 
			) ) ? false : true;
		}
		return $this->addUsingAlias ( CustomFieldsPeer::IS_ACTIVE, $isActive, $comparison );
	}
	
	/**
	 * Filter the query on the options column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOptions('fooValue'); // WHERE options = 'fooValue'
	 * $query->filterByOptions('%fooValue%'); // WHERE options LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $options
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function filterByOptions($options = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $options )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $options )) {
				$options = str_replace ( '*', '%', $options );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( CustomFieldsPeer::OPTIONS, $options, $comparison );
	}
	
	/**
	 * Filter the query on the is_private column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIsPrivate(true); // WHERE is_private = true
	 * $query->filterByIsPrivate('yes'); // WHERE is_private = true
	 * </code>
	 *
	 * @param boolean|string $isPrivate
	 *        	The value to use as filter.
	 *        	Non-boolean arguments are converted using the following rules:
	 *        	* 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 *        	* 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 *        	Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function filterByIsPrivate($isPrivate = null, $comparison = null) {
		if (is_string ( $isPrivate )) {
			$is_private = in_array ( strtolower ( $isPrivate ), array (
					'false',
					'off',
					'-',
					'no',
					'n',
					'0',
					'' 
			) ) ? false : true;
		}
		return $this->addUsingAlias ( CustomFieldsPeer::IS_PRIVATE, $isPrivate, $comparison );
	}
	
	/**
	 * Filter the query on the validators column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByValidators('fooValue'); // WHERE validators = 'fooValue'
	 * $query->filterByValidators('%fooValue%'); // WHERE validators LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $validators
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function filterByValidators($validators = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $validators )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $validators )) {
				$validators = str_replace ( '*', '%', $validators );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( CustomFieldsPeer::VALIDATORS, $validators, $comparison );
	}
	
	/**
	 * Filter the query on the classes column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByclasses('fooValue'); // WHERE classes = 'fooValue'
	 * $query->filterByclasses('%fooValue%'); // WHERE classes LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $classes
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function filterByclasses($classes = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $classes )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $classes )) {
				$classes = str_replace ( '*', '%', $classes );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( CustomFieldsPeer::CLASSES, $classes, $comparison );
	}
	
	/**
	 * Filter the query on the position column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByposition(1234); // WHERE position = 1234
	 * $query->filterByposition(array(12, 34)); // WHERE position IN (12, 34)
	 * $query->filterByposition(array('min' => 12)); // WHERE position > 12
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
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function filterByposition($position = null, $comparison = null) {
		if (is_array ( $position )) {
			$useMinMax = false;
			if (isset ( $position ['min'] )) {
				$this->addUsingAlias ( CustomFieldsPeer::POSITION, $position ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $position ['max'] )) {
				$this->addUsingAlias ( CustomFieldsPeer::POSITION, $position ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( CustomFieldsPeer::POSITION, $position, $comparison );
	}
	
	/**
	 * Filter the query by a related CustomFieldsI18n object
	 *
	 * @param CustomFieldsI18n $customFieldsI18n
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function filterByCustomFieldsI18n($customFieldsI18n, $comparison = null) {
		if ($customFieldsI18n instanceof CustomFieldsI18n) {
			return $this->addUsingAlias ( CustomFieldsPeer::ID, $customFieldsI18n->getId (), $comparison );
		} elseif ($customFieldsI18n instanceof PropelCollection) {
			return $this->useCustomFieldsI18nQuery ()->filterByPrimaryKeys ( $customFieldsI18n->getPrimaryKeys () )->endUse ();
		} else {
			throw new PropelException ( 'filterByCustomFieldsI18n() only accepts arguments of type CustomFieldsI18n or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the CustomFieldsI18n relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function joinCustomFieldsI18n($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'CustomFieldsI18n' );
		
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
			$this->addJoinObject ( $join, 'CustomFieldsI18n' );
		}
		
		return $this;
	}
	
	/**
	 * Use the CustomFieldsI18n relation CustomFieldsI18n object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return CustomFieldsI18nQuery A secondary query class using the current class as primary query
	 */
	public function useCustomFieldsI18nQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinCustomFieldsI18n ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'CustomFieldsI18n', 'CustomFieldsI18nQuery' );
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param CustomFields $customFields
	 *        	Object to remove from the list of results
	 *        	
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function prune($customFields = null) {
		if ($customFields) {
			$this->addUsingAlias ( CustomFieldsPeer::ID, $customFields->getId (), Criteria::NOT_EQUAL );
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
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function joinI18n($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		$relationName = $relationAlias ? $relationAlias : 'CustomFieldsI18n';
		return $this->joinCustomFieldsI18n ( $relationAlias, $joinType )->addJoinCondition ( $relationName, $relationName . '.Locale = ?', $locale );
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
	 * @return CustomFieldsQuery The current query, for fluid interface
	 */
	public function joinWithI18n($locale = 'ru', $joinType = Criteria::LEFT_JOIN) {
		$this->joinI18n ( $locale, null, $joinType )->with ( 'CustomFieldsI18n' );
		$this->with ['CustomFieldsI18n']->setIsWithOneToMany ( false );
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
	 * @return CustomFieldsI18nQuery A secondary query class using the current class as primary query
	 */
	public function useI18nQuery($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		return $this->joinI18n ( $locale, $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'CustomFieldsI18n', 'CustomFieldsI18nQuery' );
	}
} // BaseCustomFieldsQuery