<?php

/**
 * Base class that represents a query for the 'shop_notifications' table.
 *
 * 
 *
 * @method     SNotificationsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SNotificationsQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     SNotificationsQuery orderByVariantId($order = Criteria::ASC) Order by the variant_id column
 * @method     SNotificationsQuery orderByUserName($order = Criteria::ASC) Order by the user_name column
 * @method     SNotificationsQuery orderByUserEmail($order = Criteria::ASC) Order by the user_email column
 * @method     SNotificationsQuery orderByUserPhone($order = Criteria::ASC) Order by the user_phone column
 * @method     SNotificationsQuery orderByUserComment($order = Criteria::ASC) Order by the user_comment column
 * @method     SNotificationsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     SNotificationsQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 * @method     SNotificationsQuery orderByActiveTo($order = Criteria::ASC) Order by the active_to column
 * @method     SNotificationsQuery orderByManagerId($order = Criteria::ASC) Order by the manager_id column
 * @method     SNotificationsQuery orderByNotifiedByEmail($order = Criteria::ASC) Order by the notified_by_email column
 *
 * @method     SNotificationsQuery groupById() Group by the id column
 * @method     SNotificationsQuery groupByProductId() Group by the product_id column
 * @method     SNotificationsQuery groupByVariantId() Group by the variant_id column
 * @method     SNotificationsQuery groupByUserName() Group by the user_name column
 * @method     SNotificationsQuery groupByUserEmail() Group by the user_email column
 * @method     SNotificationsQuery groupByUserPhone() Group by the user_phone column
 * @method     SNotificationsQuery groupByUserComment() Group by the user_comment column
 * @method     SNotificationsQuery groupByStatus() Group by the status column
 * @method     SNotificationsQuery groupByDateCreated() Group by the date_created column
 * @method     SNotificationsQuery groupByActiveTo() Group by the active_to column
 * @method     SNotificationsQuery groupByManagerId() Group by the manager_id column
 * @method     SNotificationsQuery groupByNotifiedByEmail() Group by the notified_by_email column
 *
 * @method     SNotificationsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SNotificationsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SNotificationsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SNotificationsQuery leftJoinSProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProducts relation
 * @method     SNotificationsQuery rightJoinSProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProducts relation
 * @method     SNotificationsQuery innerJoinSProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SProducts relation
 *
 * @method     SNotificationsQuery leftJoinSProductVariants($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProductVariants relation
 * @method     SNotificationsQuery rightJoinSProductVariants($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProductVariants relation
 * @method     SNotificationsQuery innerJoinSProductVariants($relationAlias = null) Adds a INNER JOIN clause to the query using the SProductVariants relation
 *
 * @method     SNotificationsQuery leftJoinSNotificationStatuses($relationAlias = null) Adds a LEFT JOIN clause to the query using the SNotificationStatuses relation
 * @method     SNotificationsQuery rightJoinSNotificationStatuses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SNotificationStatuses relation
 * @method     SNotificationsQuery innerJoinSNotificationStatuses($relationAlias = null) Adds a INNER JOIN clause to the query using the SNotificationStatuses relation
 *
 * @method     SNotifications findOne(PropelPDO $con = null) Return the first SNotifications matching the query
 * @method     SNotifications findOneOrCreate(PropelPDO $con = null) Return the first SNotifications matching the query, or a new SNotifications object populated from the query conditions when no match is found
 *
 * @method     SNotifications findOneById(int $id) Return the first SNotifications filtered by the id column
 * @method     SNotifications findOneByProductId(int $product_id) Return the first SNotifications filtered by the product_id column
 * @method     SNotifications findOneByVariantId(int $variant_id) Return the first SNotifications filtered by the variant_id column
 * @method     SNotifications findOneByUserName(string $user_name) Return the first SNotifications filtered by the user_name column
 * @method     SNotifications findOneByUserEmail(string $user_email) Return the first SNotifications filtered by the user_email column
 * @method     SNotifications findOneByUserPhone(string $user_phone) Return the first SNotifications filtered by the user_phone column
 * @method     SNotifications findOneByUserComment(string $user_comment) Return the first SNotifications filtered by the user_comment column
 * @method     SNotifications findOneByStatus(int $status) Return the first SNotifications filtered by the status column
 * @method     SNotifications findOneByDateCreated(int $date_created) Return the first SNotifications filtered by the date_created column
 * @method     SNotifications findOneByActiveTo(int $active_to) Return the first SNotifications filtered by the active_to column
 * @method     SNotifications findOneByManagerId(int $manager_id) Return the first SNotifications filtered by the manager_id column
 * @method     SNotifications findOneByNotifiedByEmail(boolean $notified_by_email) Return the first SNotifications filtered by the notified_by_email column
 *
 * @method     array findById(int $id) Return SNotifications objects filtered by the id column
 * @method     array findByProductId(int $product_id) Return SNotifications objects filtered by the product_id column
 * @method     array findByVariantId(int $variant_id) Return SNotifications objects filtered by the variant_id column
 * @method     array findByUserName(string $user_name) Return SNotifications objects filtered by the user_name column
 * @method     array findByUserEmail(string $user_email) Return SNotifications objects filtered by the user_email column
 * @method     array findByUserPhone(string $user_phone) Return SNotifications objects filtered by the user_phone column
 * @method     array findByUserComment(string $user_comment) Return SNotifications objects filtered by the user_comment column
 * @method     array findByStatus(int $status) Return SNotifications objects filtered by the status column
 * @method     array findByDateCreated(int $date_created) Return SNotifications objects filtered by the date_created column
 * @method     array findByActiveTo(int $active_to) Return SNotifications objects filtered by the active_to column
 * @method     array findByManagerId(int $manager_id) Return SNotifications objects filtered by the manager_id column
 * @method     array findByNotifiedByEmail(boolean $notified_by_email) Return SNotifications objects filtered by the notified_by_email column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSNotificationsQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseSNotificationsQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SNotifications', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new SNotificationsQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return SNotificationsQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof SNotificationsQuery) {
			return $criteria;
		}
		$query = new SNotificationsQuery ();
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
	 * @return SNotifications|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SNotificationsPeer::getInstanceFromPool ( ( string ) $key ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return SNotifications A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `ID`, `PRODUCT_ID`, `VARIANT_ID`, `USER_NAME`, `USER_EMAIL`, `USER_PHONE`, `USER_COMMENT`, `STATUS`, `DATE_CREATED`, `ACTIVE_TO`, `MANAGER_ID`, `NOTIFIED_BY_EMAIL` FROM `shop_notifications` WHERE `ID` = :p0';
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
			$obj = new SNotifications ();
			$obj->hydrate ( $row );
			SNotificationsPeer::addInstanceToPool ( $obj, ( string ) $key );
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
	 * @return SNotifications|array|mixed the result, formatted by the current formatter
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
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		return $this->addUsingAlias ( SNotificationsPeer::ID, $key, Criteria::EQUAL );
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		return $this->addUsingAlias ( SNotificationsPeer::ID, $keys, Criteria::IN );
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
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null) {
		if (is_array ( $id ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( SNotificationsPeer::ID, $id, $comparison );
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
	 * @see filterBySProducts()
	 *
	 * @param mixed $productId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterByProductId($productId = null, $comparison = null) {
		if (is_array ( $productId )) {
			$useMinMax = false;
			if (isset ( $productId ['min'] )) {
				$this->addUsingAlias ( SNotificationsPeer::PRODUCT_ID, $productId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $productId ['max'] )) {
				$this->addUsingAlias ( SNotificationsPeer::PRODUCT_ID, $productId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SNotificationsPeer::PRODUCT_ID, $productId, $comparison );
	}
	
	/**
	 * Filter the query on the variant_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByVariantId(1234); // WHERE variant_id = 1234
	 * $query->filterByVariantId(array(12, 34)); // WHERE variant_id IN (12, 34)
	 * $query->filterByVariantId(array('min' => 12)); // WHERE variant_id > 12
	 * </code>
	 *
	 * @see filterBySProductVariants()
	 *
	 * @param mixed $variantId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterByVariantId($variantId = null, $comparison = null) {
		if (is_array ( $variantId )) {
			$useMinMax = false;
			if (isset ( $variantId ['min'] )) {
				$this->addUsingAlias ( SNotificationsPeer::VARIANT_ID, $variantId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $variantId ['max'] )) {
				$this->addUsingAlias ( SNotificationsPeer::VARIANT_ID, $variantId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SNotificationsPeer::VARIANT_ID, $variantId, $comparison );
	}
	
	/**
	 * Filter the query on the user_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserName('fooValue'); // WHERE user_name = 'fooValue'
	 * $query->filterByUserName('%fooValue%'); // WHERE user_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $userName
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterByUserName($userName = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $userName )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $userName )) {
				$userName = str_replace ( '*', '%', $userName );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SNotificationsPeer::USER_NAME, $userName, $comparison );
	}
	
	/**
	 * Filter the query on the user_email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserEmail('fooValue'); // WHERE user_email = 'fooValue'
	 * $query->filterByUserEmail('%fooValue%'); // WHERE user_email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $userEmail
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterByUserEmail($userEmail = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $userEmail )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $userEmail )) {
				$userEmail = str_replace ( '*', '%', $userEmail );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SNotificationsPeer::USER_EMAIL, $userEmail, $comparison );
	}
	
	/**
	 * Filter the query on the user_phone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserPhone('fooValue'); // WHERE user_phone = 'fooValue'
	 * $query->filterByUserPhone('%fooValue%'); // WHERE user_phone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $userPhone
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterByUserPhone($userPhone = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $userPhone )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $userPhone )) {
				$userPhone = str_replace ( '*', '%', $userPhone );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SNotificationsPeer::USER_PHONE, $userPhone, $comparison );
	}
	
	/**
	 * Filter the query on the user_comment column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserComment('fooValue'); // WHERE user_comment = 'fooValue'
	 * $query->filterByUserComment('%fooValue%'); // WHERE user_comment LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $userComment
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterByUserComment($userComment = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $userComment )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $userComment )) {
				$userComment = str_replace ( '*', '%', $userComment );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SNotificationsPeer::USER_COMMENT, $userComment, $comparison );
	}
	
	/**
	 * Filter the query on the status column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStatus(1234); // WHERE status = 1234
	 * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
	 * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
	 * </code>
	 *
	 * @see filterBySNotificationStatuses()
	 *
	 * @param mixed $status
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null) {
		if (is_array ( $status )) {
			$useMinMax = false;
			if (isset ( $status ['min'] )) {
				$this->addUsingAlias ( SNotificationsPeer::STATUS, $status ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $status ['max'] )) {
				$this->addUsingAlias ( SNotificationsPeer::STATUS, $status ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SNotificationsPeer::STATUS, $status, $comparison );
	}
	
	/**
	 * Filter the query on the date_created column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDateCreated(1234); // WHERE date_created = 1234
	 * $query->filterByDateCreated(array(12, 34)); // WHERE date_created IN (12, 34)
	 * $query->filterByDateCreated(array('min' => 12)); // WHERE date_created > 12
	 * </code>
	 *
	 * @param mixed $dateCreated
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterByDateCreated($dateCreated = null, $comparison = null) {
		if (is_array ( $dateCreated )) {
			$useMinMax = false;
			if (isset ( $dateCreated ['min'] )) {
				$this->addUsingAlias ( SNotificationsPeer::DATE_CREATED, $dateCreated ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $dateCreated ['max'] )) {
				$this->addUsingAlias ( SNotificationsPeer::DATE_CREATED, $dateCreated ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SNotificationsPeer::DATE_CREATED, $dateCreated, $comparison );
	}
	
	/**
	 * Filter the query on the active_to column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActiveTo(1234); // WHERE active_to = 1234
	 * $query->filterByActiveTo(array(12, 34)); // WHERE active_to IN (12, 34)
	 * $query->filterByActiveTo(array('min' => 12)); // WHERE active_to > 12
	 * </code>
	 *
	 * @param mixed $activeTo
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterByActiveTo($activeTo = null, $comparison = null) {
		if (is_array ( $activeTo )) {
			$useMinMax = false;
			if (isset ( $activeTo ['min'] )) {
				$this->addUsingAlias ( SNotificationsPeer::ACTIVE_TO, $activeTo ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $activeTo ['max'] )) {
				$this->addUsingAlias ( SNotificationsPeer::ACTIVE_TO, $activeTo ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SNotificationsPeer::ACTIVE_TO, $activeTo, $comparison );
	}
	
	/**
	 * Filter the query on the manager_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByManagerId(1234); // WHERE manager_id = 1234
	 * $query->filterByManagerId(array(12, 34)); // WHERE manager_id IN (12, 34)
	 * $query->filterByManagerId(array('min' => 12)); // WHERE manager_id > 12
	 * </code>
	 *
	 * @param mixed $managerId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterByManagerId($managerId = null, $comparison = null) {
		if (is_array ( $managerId )) {
			$useMinMax = false;
			if (isset ( $managerId ['min'] )) {
				$this->addUsingAlias ( SNotificationsPeer::MANAGER_ID, $managerId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $managerId ['max'] )) {
				$this->addUsingAlias ( SNotificationsPeer::MANAGER_ID, $managerId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SNotificationsPeer::MANAGER_ID, $managerId, $comparison );
	}
	
	/**
	 * Filter the query on the notified_by_email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNotifiedByEmail(true); // WHERE notified_by_email = true
	 * $query->filterByNotifiedByEmail('yes'); // WHERE notified_by_email = true
	 * </code>
	 *
	 * @param boolean|string $notifiedByEmail
	 *        	The value to use as filter.
	 *        	Non-boolean arguments are converted using the following rules:
	 *        	* 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 *        	* 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 *        	Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterByNotifiedByEmail($notifiedByEmail = null, $comparison = null) {
		if (is_string ( $notifiedByEmail )) {
			$notified_by_email = in_array ( strtolower ( $notifiedByEmail ), array (
					'false',
					'off',
					'-',
					'no',
					'n',
					'0',
					'' 
			) ) ? false : true;
		}
		return $this->addUsingAlias ( SNotificationsPeer::NOTIFIED_BY_EMAIL, $notifiedByEmail, $comparison );
	}
	
	/**
	 * Filter the query by a related SProducts object
	 *
	 * @param SProducts|PropelCollection $sProducts
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterBySProducts($sProducts, $comparison = null) {
		if ($sProducts instanceof SProducts) {
			return $this->addUsingAlias ( SNotificationsPeer::PRODUCT_ID, $sProducts->getId (), $comparison );
		} elseif ($sProducts instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( SNotificationsPeer::PRODUCT_ID, $sProducts->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
		} else {
			throw new PropelException ( 'filterBySProducts() only accepts arguments of type SProducts or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SProducts relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function joinSProducts($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SProducts' );
		
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
			$this->addJoinObject ( $join, 'SProducts' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SProducts relation SProducts object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SProductsQuery A secondary query class using the current class as primary query
	 */
	public function useSProductsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinSProducts ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SProducts', 'SProductsQuery' );
	}
	
	/**
	 * Filter the query by a related SProductVariants object
	 *
	 * @param SProductVariants|PropelCollection $sProductVariants
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterBySProductVariants($sProductVariants, $comparison = null) {
		if ($sProductVariants instanceof SProductVariants) {
			return $this->addUsingAlias ( SNotificationsPeer::VARIANT_ID, $sProductVariants->getId (), $comparison );
		} elseif ($sProductVariants instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( SNotificationsPeer::VARIANT_ID, $sProductVariants->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
		} else {
			throw new PropelException ( 'filterBySProductVariants() only accepts arguments of type SProductVariants or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SProductVariants relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function joinSProductVariants($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SProductVariants' );
		
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
			$this->addJoinObject ( $join, 'SProductVariants' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SProductVariants relation SProductVariants object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SProductVariantsQuery A secondary query class using the current class as primary query
	 */
	public function useSProductVariantsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinSProductVariants ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SProductVariants', 'SProductVariantsQuery' );
	}
	
	/**
	 * Filter the query by a related SNotificationStatuses object
	 *
	 * @param SNotificationStatuses|PropelCollection $sNotificationStatuses
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function filterBySNotificationStatuses($sNotificationStatuses, $comparison = null) {
		if ($sNotificationStatuses instanceof SNotificationStatuses) {
			return $this->addUsingAlias ( SNotificationsPeer::STATUS, $sNotificationStatuses->getId (), $comparison );
		} elseif ($sNotificationStatuses instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( SNotificationsPeer::STATUS, $sNotificationStatuses->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
		} else {
			throw new PropelException ( 'filterBySNotificationStatuses() only accepts arguments of type SNotificationStatuses or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SNotificationStatuses relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function joinSNotificationStatuses($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SNotificationStatuses' );
		
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
			$this->addJoinObject ( $join, 'SNotificationStatuses' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SNotificationStatuses relation SNotificationStatuses object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SNotificationStatusesQuery A secondary query class using the current class as primary query
	 */
	public function useSNotificationStatusesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinSNotificationStatuses ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SNotificationStatuses', 'SNotificationStatusesQuery' );
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param SNotifications $sNotifications
	 *        	Object to remove from the list of results
	 *        	
	 * @return SNotificationsQuery The current query, for fluid interface
	 */
	public function prune($sNotifications = null) {
		if ($sNotifications) {
			$this->addUsingAlias ( SNotificationsPeer::ID, $sNotifications->getId (), Criteria::NOT_EQUAL );
		}
		
		return $this;
	}
} // BaseSNotificationsQuery