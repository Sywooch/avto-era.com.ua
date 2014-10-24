<?php

/**
 * Base class that represents a query for the 'custom_fields_i18n' table.
 *
 * 
 *
 * @method     CustomFieldsI18nQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CustomFieldsI18nQuery orderByLocale($order = Criteria::ASC) Order by the locale column
 * @method     CustomFieldsI18nQuery orderByFieldLabel($order = Criteria::ASC) Order by the field_label column
 * @method     CustomFieldsI18nQuery orderByFieldDescription($order = Criteria::ASC) Order by the field_description column
 * @method     CustomFieldsI18nQuery orderByPossibleValues($order = Criteria::ASC) Order by the possible_values column
 *
 * @method     CustomFieldsI18nQuery groupById() Group by the id column
 * @method     CustomFieldsI18nQuery groupByLocale() Group by the locale column
 * @method     CustomFieldsI18nQuery groupByFieldLabel() Group by the field_label column
 * @method     CustomFieldsI18nQuery groupByFieldDescription() Group by the field_description column
 * @method     CustomFieldsI18nQuery groupByPossibleValues() Group by the possible_values column
 *
 * @method     CustomFieldsI18nQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CustomFieldsI18nQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CustomFieldsI18nQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CustomFieldsI18nQuery leftJoinCustomFields($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomFields relation
 * @method     CustomFieldsI18nQuery rightJoinCustomFields($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomFields relation
 * @method     CustomFieldsI18nQuery innerJoinCustomFields($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomFields relation
 *
 * @method     CustomFieldsI18n findOne(PropelPDO $con = null) Return the first CustomFieldsI18n matching the query
 * @method     CustomFieldsI18n findOneOrCreate(PropelPDO $con = null) Return the first CustomFieldsI18n matching the query, or a new CustomFieldsI18n object populated from the query conditions when no match is found
 *
 * @method     CustomFieldsI18n findOneById(int $id) Return the first CustomFieldsI18n filtered by the id column
 * @method     CustomFieldsI18n findOneByLocale(string $locale) Return the first CustomFieldsI18n filtered by the locale column
 * @method     CustomFieldsI18n findOneByFieldLabel(string $field_label) Return the first CustomFieldsI18n filtered by the field_label column
 * @method     CustomFieldsI18n findOneByFieldDescription(string $field_description) Return the first CustomFieldsI18n filtered by the field_description column
 * @method     CustomFieldsI18n findOneByPossibleValues(string $possible_values) Return the first CustomFieldsI18n filtered by the possible_values column
 *
 * @method     array findById(int $id) Return CustomFieldsI18n objects filtered by the id column
 * @method     array findByLocale(string $locale) Return CustomFieldsI18n objects filtered by the locale column
 * @method     array findByFieldLabel(string $field_label) Return CustomFieldsI18n objects filtered by the field_label column
 * @method     array findByFieldDescription(string $field_description) Return CustomFieldsI18n objects filtered by the field_description column
 * @method     array findByPossibleValues(string $possible_values) Return CustomFieldsI18n objects filtered by the possible_values column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseCustomFieldsI18nQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseCustomFieldsI18nQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'CustomFieldsI18n', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new CustomFieldsI18nQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return CustomFieldsI18nQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof CustomFieldsI18nQuery) {
			return $criteria;
		}
		$query = new CustomFieldsI18nQuery ();
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
	 * @param array[$id, $locale]
	 *        	$key Primary key to use for the query
	 * @param PropelPDO $con
	 *        	an optional connection object
	 *        	
	 * @return CustomFieldsI18n|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = CustomFieldsI18nPeer::getInstanceFromPool ( serialize ( array (
				( string ) $key [0],
				( string ) $key [1] 
		) ) ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( CustomFieldsI18nPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return CustomFieldsI18n A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `ID`, `LOCALE`, `FIELD_LABEL`, `FIELD_DESCRIPTION`, `POSSIBLE_VALUES` FROM `custom_fields_i18n` WHERE `ID` = :p0 AND `LOCALE` = :p1';
		try {
			$stmt = $con->prepare ( $sql );
			$stmt->bindValue ( ':p0', $key [0], PDO::PARAM_INT );
			$stmt->bindValue ( ':p1', $key [1], PDO::PARAM_STR );
			$stmt->execute ();
		} catch ( Exception $e ) {
			Propel::log ( $e->getMessage (), Propel::LOG_ERR );
			throw new PropelException ( sprintf ( 'Unable to execute SELECT statement [%s]', $sql ), $e );
		}
		$obj = null;
		if ($row = $stmt->fetch ( PDO::FETCH_NUM )) {
			$obj = new CustomFieldsI18n ();
			$obj->hydrate ( $row );
			CustomFieldsI18nPeer::addInstanceToPool ( $obj, serialize ( array (
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
	 * @return CustomFieldsI18n|array|mixed the result, formatted by the current formatter
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
	 * @return CustomFieldsI18nQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		$this->addUsingAlias ( CustomFieldsI18nPeer::ID, $key [0], Criteria::EQUAL );
		$this->addUsingAlias ( CustomFieldsI18nPeer::LOCALE, $key [1], Criteria::EQUAL );
		
		return $this;
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return CustomFieldsI18nQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		if (empty ( $keys )) {
			return $this->add ( null, '1<>1', Criteria::CUSTOM );
		}
		foreach ( $keys as $key ) {
			$cton0 = $this->getNewCriterion ( CustomFieldsI18nPeer::ID, $key [0], Criteria::EQUAL );
			$cton1 = $this->getNewCriterion ( CustomFieldsI18nPeer::LOCALE, $key [1], Criteria::EQUAL );
			$cton0->addAnd ( $cton1 );
			$this->addOr ( $cton0 );
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
	 * @see filterByCustomFields()
	 *
	 * @param mixed $id
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return CustomFieldsI18nQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null) {
		if (is_array ( $id ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( CustomFieldsI18nPeer::ID, $id, $comparison );
	}
	
	/**
	 * Filter the query on the locale column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLocale('fooValue'); // WHERE locale = 'fooValue'
	 * $query->filterByLocale('%fooValue%'); // WHERE locale LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $locale
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return CustomFieldsI18nQuery The current query, for fluid interface
	 */
	public function filterByLocale($locale = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $locale )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $locale )) {
				$locale = str_replace ( '*', '%', $locale );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( CustomFieldsI18nPeer::LOCALE, $locale, $comparison );
	}
	
	/**
	 * Filter the query on the field_label column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFieldLabel('fooValue'); // WHERE field_label = 'fooValue'
	 * $query->filterByFieldLabel('%fooValue%'); // WHERE field_label LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $fieldLabel
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return CustomFieldsI18nQuery The current query, for fluid interface
	 */
	public function filterByFieldLabel($fieldLabel = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $fieldLabel )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $fieldLabel )) {
				$fieldLabel = str_replace ( '*', '%', $fieldLabel );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( CustomFieldsI18nPeer::FIELD_LABEL, $fieldLabel, $comparison );
	}
	
	/**
	 * Filter the query on the field_description column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFieldDescription('fooValue'); // WHERE field_description = 'fooValue'
	 * $query->filterByFieldDescription('%fooValue%'); // WHERE field_description LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $fieldDescription
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return CustomFieldsI18nQuery The current query, for fluid interface
	 */
	public function filterByFieldDescription($fieldDescription = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $fieldDescription )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $fieldDescription )) {
				$fieldDescription = str_replace ( '*', '%', $fieldDescription );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( CustomFieldsI18nPeer::FIELD_DESCRIPTION, $fieldDescription, $comparison );
	}
	
	/**
	 * Filter the query on the possible_values column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPossibleValues('fooValue'); // WHERE possible_values = 'fooValue'
	 * $query->filterByPossibleValues('%fooValue%'); // WHERE possible_values LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $possibleValues
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return CustomFieldsI18nQuery The current query, for fluid interface
	 */
	public function filterByPossibleValues($possibleValues = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $possibleValues )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $possibleValues )) {
				$possibleValues = str_replace ( '*', '%', $possibleValues );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( CustomFieldsI18nPeer::POSSIBLE_VALUES, $possibleValues, $comparison );
	}
	
	/**
	 * Filter the query by a related CustomFields object
	 *
	 * @param CustomFields|PropelCollection $customFields
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return CustomFieldsI18nQuery The current query, for fluid interface
	 */
	public function filterByCustomFields($customFields, $comparison = null) {
		if ($customFields instanceof CustomFields) {
			return $this->addUsingAlias ( CustomFieldsI18nPeer::ID, $customFields->getId (), $comparison );
		} elseif ($customFields instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( CustomFieldsI18nPeer::ID, $customFields->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
		} else {
			throw new PropelException ( 'filterByCustomFields() only accepts arguments of type CustomFields or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the CustomFields relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return CustomFieldsI18nQuery The current query, for fluid interface
	 */
	public function joinCustomFields($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'CustomFields' );
		
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
			$this->addJoinObject ( $join, 'CustomFields' );
		}
		
		return $this;
	}
	
	/**
	 * Use the CustomFields relation CustomFields object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return CustomFieldsQuery A secondary query class using the current class as primary query
	 */
	public function useCustomFieldsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinCustomFields ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'CustomFields', 'CustomFieldsQuery' );
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param CustomFieldsI18n $customFieldsI18n
	 *        	Object to remove from the list of results
	 *        	
	 * @return CustomFieldsI18nQuery The current query, for fluid interface
	 */
	public function prune($customFieldsI18n = null) {
		if ($customFieldsI18n) {
			$this->addCond ( 'pruneCond0', $this->getAliasedColName ( CustomFieldsI18nPeer::ID ), $customFieldsI18n->getId (), Criteria::NOT_EQUAL );
			$this->addCond ( 'pruneCond1', $this->getAliasedColName ( CustomFieldsI18nPeer::LOCALE ), $customFieldsI18n->getLocale (), Criteria::NOT_EQUAL );
			$this->combine ( array (
					'pruneCond0',
					'pruneCond1' 
			), Criteria::LOGICAL_OR );
		}
		
		return $this;
	}
} // BaseCustomFieldsI18nQuery