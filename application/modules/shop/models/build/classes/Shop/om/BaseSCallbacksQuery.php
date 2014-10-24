<?php

/**
 * Base class that represents a query for the 'shop_callbacks' table.
 *
 * 
 *
 * @method     SCallbacksQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SCallbacksQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     SCallbacksQuery orderByStatusId($order = Criteria::ASC) Order by the status_id column
 * @method     SCallbacksQuery orderByThemeId($order = Criteria::ASC) Order by the theme_id column
 * @method     SCallbacksQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     SCallbacksQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     SCallbacksQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     SCallbacksQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     SCallbacksQuery groupById() Group by the id column
 * @method     SCallbacksQuery groupByUserId() Group by the user_id column
 * @method     SCallbacksQuery groupByStatusId() Group by the status_id column
 * @method     SCallbacksQuery groupByThemeId() Group by the theme_id column
 * @method     SCallbacksQuery groupByPhone() Group by the phone column
 * @method     SCallbacksQuery groupByName() Group by the name column
 * @method     SCallbacksQuery groupByComment() Group by the comment column
 * @method     SCallbacksQuery groupByDate() Group by the date column
 *
 * @method     SCallbacksQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SCallbacksQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SCallbacksQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SCallbacksQuery leftJoinSCallbackStatuses($relationAlias = null) Adds a LEFT JOIN clause to the query using the SCallbackStatuses relation
 * @method     SCallbacksQuery rightJoinSCallbackStatuses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SCallbackStatuses relation
 * @method     SCallbacksQuery innerJoinSCallbackStatuses($relationAlias = null) Adds a INNER JOIN clause to the query using the SCallbackStatuses relation
 *
 * @method     SCallbacksQuery leftJoinSCallbackThemes($relationAlias = null) Adds a LEFT JOIN clause to the query using the SCallbackThemes relation
 * @method     SCallbacksQuery rightJoinSCallbackThemes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SCallbackThemes relation
 * @method     SCallbacksQuery innerJoinSCallbackThemes($relationAlias = null) Adds a INNER JOIN clause to the query using the SCallbackThemes relation
 *
 * @method     SCallbacks findOne(PropelPDO $con = null) Return the first SCallbacks matching the query
 * @method     SCallbacks findOneOrCreate(PropelPDO $con = null) Return the first SCallbacks matching the query, or a new SCallbacks object populated from the query conditions when no match is found
 *
 * @method     SCallbacks findOneById(int $id) Return the first SCallbacks filtered by the id column
 * @method     SCallbacks findOneByUserId(int $user_id) Return the first SCallbacks filtered by the user_id column
 * @method     SCallbacks findOneByStatusId(int $status_id) Return the first SCallbacks filtered by the status_id column
 * @method     SCallbacks findOneByThemeId(string $theme_id) Return the first SCallbacks filtered by the theme_id column
 * @method     SCallbacks findOneByPhone(string $phone) Return the first SCallbacks filtered by the phone column
 * @method     SCallbacks findOneByName(string $name) Return the first SCallbacks filtered by the name column
 * @method     SCallbacks findOneByComment(string $comment) Return the first SCallbacks filtered by the comment column
 * @method     SCallbacks findOneByDate(int $date) Return the first SCallbacks filtered by the date column
 *
 * @method     array findById(int $id) Return SCallbacks objects filtered by the id column
 * @method     array findByUserId(int $user_id) Return SCallbacks objects filtered by the user_id column
 * @method     array findByStatusId(int $status_id) Return SCallbacks objects filtered by the status_id column
 * @method     array findByThemeId(string $theme_id) Return SCallbacks objects filtered by the theme_id column
 * @method     array findByPhone(string $phone) Return SCallbacks objects filtered by the phone column
 * @method     array findByName(string $name) Return SCallbacks objects filtered by the name column
 * @method     array findByComment(string $comment) Return SCallbacks objects filtered by the comment column
 * @method     array findByDate(int $date) Return SCallbacks objects filtered by the date column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSCallbacksQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseSCallbacksQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SCallbacks', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new SCallbacksQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return SCallbacksQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof SCallbacksQuery) {
			return $criteria;
		}
		$query = new SCallbacksQuery ();
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
	 * @return SCallbacks|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SCallbacksPeer::getInstanceFromPool ( ( string ) $key ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( SCallbacksPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return SCallbacks A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `ID`, `USER_ID`, `STATUS_ID`, `THEME_ID`, `PHONE`, `NAME`, `COMMENT`, `DATE` FROM `shop_callbacks` WHERE `ID` = :p0';
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
			$obj = new SCallbacks ();
			$obj->hydrate ( $row );
			SCallbacksPeer::addInstanceToPool ( $obj, ( string ) $key );
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
	 * @return SCallbacks|array|mixed the result, formatted by the current formatter
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
	 * @return SCallbacksQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		return $this->addUsingAlias ( SCallbacksPeer::ID, $key, Criteria::EQUAL );
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return SCallbacksQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		return $this->addUsingAlias ( SCallbacksPeer::ID, $keys, Criteria::IN );
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
	 * @return SCallbacksQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null) {
		if (is_array ( $id ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( SCallbacksPeer::ID, $id, $comparison );
	}
	
	/**
	 * Filter the query on the user_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserId(1234); // WHERE user_id = 1234
	 * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
	 * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
	 * </code>
	 *
	 * @param mixed $userId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCallbacksQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null) {
		if (is_array ( $userId )) {
			$useMinMax = false;
			if (isset ( $userId ['min'] )) {
				$this->addUsingAlias ( SCallbacksPeer::USER_ID, $userId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $userId ['max'] )) {
				$this->addUsingAlias ( SCallbacksPeer::USER_ID, $userId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SCallbacksPeer::USER_ID, $userId, $comparison );
	}
	
	/**
	 * Filter the query on the status_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStatusId(1234); // WHERE status_id = 1234
	 * $query->filterByStatusId(array(12, 34)); // WHERE status_id IN (12, 34)
	 * $query->filterByStatusId(array('min' => 12)); // WHERE status_id > 12
	 * </code>
	 *
	 * @see filterBySCallbackStatuses()
	 *
	 * @param mixed $statusId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCallbacksQuery The current query, for fluid interface
	 */
	public function filterByStatusId($statusId = null, $comparison = null) {
		if (is_array ( $statusId )) {
			$useMinMax = false;
			if (isset ( $statusId ['min'] )) {
				$this->addUsingAlias ( SCallbacksPeer::STATUS_ID, $statusId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $statusId ['max'] )) {
				$this->addUsingAlias ( SCallbacksPeer::STATUS_ID, $statusId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SCallbacksPeer::STATUS_ID, $statusId, $comparison );
	}
	
	/**
	 * Filter the query on the theme_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByThemeId('fooValue'); // WHERE theme_id = 'fooValue'
	 * $query->filterByThemeId('%fooValue%'); // WHERE theme_id LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $themeId
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCallbacksQuery The current query, for fluid interface
	 */
	public function filterByThemeId($themeId = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $themeId )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $themeId )) {
				$themeId = str_replace ( '*', '%', $themeId );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SCallbacksPeer::THEME_ID, $themeId, $comparison );
	}
	
	/**
	 * Filter the query on the phone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPhone('fooValue'); // WHERE phone = 'fooValue'
	 * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $phone
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCallbacksQuery The current query, for fluid interface
	 */
	public function filterByPhone($phone = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $phone )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $phone )) {
				$phone = str_replace ( '*', '%', $phone );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SCallbacksPeer::PHONE, $phone, $comparison );
	}
	
	/**
	 * Filter the query on the name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByName('fooValue'); // WHERE name = 'fooValue'
	 * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $name
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCallbacksQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $name )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $name )) {
				$name = str_replace ( '*', '%', $name );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SCallbacksPeer::NAME, $name, $comparison );
	}
	
	/**
	 * Filter the query on the comment column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByComment('fooValue'); // WHERE comment = 'fooValue'
	 * $query->filterByComment('%fooValue%'); // WHERE comment LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $comment
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCallbacksQuery The current query, for fluid interface
	 */
	public function filterByComment($comment = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $comment )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $comment )) {
				$comment = str_replace ( '*', '%', $comment );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SCallbacksPeer::COMMENT, $comment, $comparison );
	}
	
	/**
	 * Filter the query on the date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDate(1234); // WHERE date = 1234
	 * $query->filterByDate(array(12, 34)); // WHERE date IN (12, 34)
	 * $query->filterByDate(array('min' => 12)); // WHERE date > 12
	 * </code>
	 *
	 * @param mixed $date
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCallbacksQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null) {
		if (is_array ( $date )) {
			$useMinMax = false;
			if (isset ( $date ['min'] )) {
				$this->addUsingAlias ( SCallbacksPeer::DATE, $date ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $date ['max'] )) {
				$this->addUsingAlias ( SCallbacksPeer::DATE, $date ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SCallbacksPeer::DATE, $date, $comparison );
	}
	
	/**
	 * Filter the query by a related SCallbackStatuses object
	 *
	 * @param SCallbackStatuses|PropelCollection $sCallbackStatuses
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCallbacksQuery The current query, for fluid interface
	 */
	public function filterBySCallbackStatuses($sCallbackStatuses, $comparison = null) {
		if ($sCallbackStatuses instanceof SCallbackStatuses) {
			return $this->addUsingAlias ( SCallbacksPeer::STATUS_ID, $sCallbackStatuses->getId (), $comparison );
		} elseif ($sCallbackStatuses instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( SCallbacksPeer::STATUS_ID, $sCallbackStatuses->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
		} else {
			throw new PropelException ( 'filterBySCallbackStatuses() only accepts arguments of type SCallbackStatuses or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SCallbackStatuses relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SCallbacksQuery The current query, for fluid interface
	 */
	public function joinSCallbackStatuses($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SCallbackStatuses' );
		
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
			$this->addJoinObject ( $join, 'SCallbackStatuses' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SCallbackStatuses relation SCallbackStatuses object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SCallbackStatusesQuery A secondary query class using the current class as primary query
	 */
	public function useSCallbackStatusesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		return $this->joinSCallbackStatuses ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SCallbackStatuses', 'SCallbackStatusesQuery' );
	}
	
	/**
	 * Filter the query by a related SCallbackThemes object
	 *
	 * @param SCallbackThemes|PropelCollection $sCallbackThemes
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCallbacksQuery The current query, for fluid interface
	 */
	public function filterBySCallbackThemes($sCallbackThemes, $comparison = null) {
		if ($sCallbackThemes instanceof SCallbackThemes) {
			return $this->addUsingAlias ( SCallbacksPeer::THEME_ID, $sCallbackThemes->getId (), $comparison );
		} elseif ($sCallbackThemes instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( SCallbacksPeer::THEME_ID, $sCallbackThemes->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
		} else {
			throw new PropelException ( 'filterBySCallbackThemes() only accepts arguments of type SCallbackThemes or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SCallbackThemes relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SCallbacksQuery The current query, for fluid interface
	 */
	public function joinSCallbackThemes($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SCallbackThemes' );
		
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
			$this->addJoinObject ( $join, 'SCallbackThemes' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SCallbackThemes relation SCallbackThemes object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SCallbackThemesQuery A secondary query class using the current class as primary query
	 */
	public function useSCallbackThemesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		return $this->joinSCallbackThemes ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SCallbackThemes', 'SCallbackThemesQuery' );
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param SCallbacks $sCallbacks
	 *        	Object to remove from the list of results
	 *        	
	 * @return SCallbacksQuery The current query, for fluid interface
	 */
	public function prune($sCallbacks = null) {
		if ($sCallbacks) {
			$this->addUsingAlias ( SCallbacksPeer::ID, $sCallbacks->getId (), Criteria::NOT_EQUAL );
		}
		
		return $this;
	}
} // BaseSCallbacksQuery