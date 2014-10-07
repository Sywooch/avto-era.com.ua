<?php

/**
 * Base class that represents a query for the 'users' table.
 *
 * 
 *
 * @method     SUserProfileQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SUserProfileQuery orderByName($order = Criteria::ASC) Order by the username column
 * @method     SUserProfileQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     SUserProfileQuery orderByUserEmail($order = Criteria::ASC) Order by the email column
 * @method     SUserProfileQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     SUserProfileQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     SUserProfileQuery orderByBanned($order = Criteria::ASC) Order by the banned column
 * @method     SUserProfileQuery orderByBanReason($order = Criteria::ASC) Order by the ban_reason column
 * @method     SUserProfileQuery orderByNewpass($order = Criteria::ASC) Order by the newpass column
 * @method     SUserProfileQuery orderByNewpassKey($order = Criteria::ASC) Order by the newpass_key column
 * @method     SUserProfileQuery orderByNewpassTime($order = Criteria::ASC) Order by the newpass_time column
 * @method     SUserProfileQuery orderByDateCreated($order = Criteria::ASC) Order by the created column
 * @method     SUserProfileQuery orderByLastIp($order = Criteria::ASC) Order by the last_ip column
 * @method     SUserProfileQuery orderByLastLogin($order = Criteria::ASC) Order by the last_login column
 * @method     SUserProfileQuery orderByModified($order = Criteria::ASC) Order by the modified column
 * @method     SUserProfileQuery orderByCartData($order = Criteria::ASC) Order by the cart_data column
 * @method     SUserProfileQuery orderByWishListData($order = Criteria::ASC) Order by the wish_list_data column
 * @method     SUserProfileQuery orderByKey($order = Criteria::ASC) Order by the key column
 * @method     SUserProfileQuery orderByAmout($order = Criteria::ASC) Order by the amout column
 * @method     SUserProfileQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     SUserProfileQuery orderByRoleId($order = Criteria::ASC) Order by the role_id column
 *
 * @method     SUserProfileQuery groupById() Group by the id column
 * @method     SUserProfileQuery groupByName() Group by the username column
 * @method     SUserProfileQuery groupByPassword() Group by the password column
 * @method     SUserProfileQuery groupByUserEmail() Group by the email column
 * @method     SUserProfileQuery groupByAddress() Group by the address column
 * @method     SUserProfileQuery groupByPhone() Group by the phone column
 * @method     SUserProfileQuery groupByBanned() Group by the banned column
 * @method     SUserProfileQuery groupByBanReason() Group by the ban_reason column
 * @method     SUserProfileQuery groupByNewpass() Group by the newpass column
 * @method     SUserProfileQuery groupByNewpassKey() Group by the newpass_key column
 * @method     SUserProfileQuery groupByNewpassTime() Group by the newpass_time column
 * @method     SUserProfileQuery groupByDateCreated() Group by the created column
 * @method     SUserProfileQuery groupByLastIp() Group by the last_ip column
 * @method     SUserProfileQuery groupByLastLogin() Group by the last_login column
 * @method     SUserProfileQuery groupByModified() Group by the modified column
 * @method     SUserProfileQuery groupByCartData() Group by the cart_data column
 * @method     SUserProfileQuery groupByWishListData() Group by the wish_list_data column
 * @method     SUserProfileQuery groupByKey() Group by the key column
 * @method     SUserProfileQuery groupByAmout() Group by the amout column
 * @method     SUserProfileQuery groupByDiscount() Group by the discount column
 * @method     SUserProfileQuery groupByRoleId() Group by the role_id column
 *
 * @method     SUserProfileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SUserProfileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SUserProfileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SUserProfile findOne(PropelPDO $con = null) Return the first SUserProfile matching the query
 * @method     SUserProfile findOneOrCreate(PropelPDO $con = null) Return the first SUserProfile matching the query, or a new SUserProfile object populated from the query conditions when no match is found
 *
 * @method     SUserProfile findOneById(int $id) Return the first SUserProfile filtered by the id column
 * @method     SUserProfile findOneByName(string $username) Return the first SUserProfile filtered by the username column
 * @method     SUserProfile findOneByPassword(string $password) Return the first SUserProfile filtered by the password column
 * @method     SUserProfile findOneByUserEmail(string $email) Return the first SUserProfile filtered by the email column
 * @method     SUserProfile findOneByAddress(string $address) Return the first SUserProfile filtered by the address column
 * @method     SUserProfile findOneByPhone(string $phone) Return the first SUserProfile filtered by the phone column
 * @method     SUserProfile findOneByBanned(int $banned) Return the first SUserProfile filtered by the banned column
 * @method     SUserProfile findOneByBanReason(string $ban_reason) Return the first SUserProfile filtered by the ban_reason column
 * @method     SUserProfile findOneByNewpass(string $newpass) Return the first SUserProfile filtered by the newpass column
 * @method     SUserProfile findOneByNewpassKey(string $newpass_key) Return the first SUserProfile filtered by the newpass_key column
 * @method     SUserProfile findOneByNewpassTime(int $newpass_time) Return the first SUserProfile filtered by the newpass_time column
 * @method     SUserProfile findOneByDateCreated(int $created) Return the first SUserProfile filtered by the created column
 * @method     SUserProfile findOneByLastIp(string $last_ip) Return the first SUserProfile filtered by the last_ip column
 * @method     SUserProfile findOneByLastLogin(int $last_login) Return the first SUserProfile filtered by the last_login column
 * @method     SUserProfile findOneByModified(string $modified) Return the first SUserProfile filtered by the modified column
 * @method     SUserProfile findOneByCartData(string $cart_data) Return the first SUserProfile filtered by the cart_data column
 * @method     SUserProfile findOneByWishListData(string $wish_list_data) Return the first SUserProfile filtered by the wish_list_data column
 * @method     SUserProfile findOneByKey(string $key) Return the first SUserProfile filtered by the key column
 * @method     SUserProfile findOneByAmout(string $amout) Return the first SUserProfile filtered by the amout column
 * @method     SUserProfile findOneByDiscount(string $discount) Return the first SUserProfile filtered by the discount column
 * @method     SUserProfile findOneByRoleId(int $role_id) Return the first SUserProfile filtered by the role_id column
 *
 * @method     array findById(int $id) Return SUserProfile objects filtered by the id column
 * @method     array findByName(string $username) Return SUserProfile objects filtered by the username column
 * @method     array findByPassword(string $password) Return SUserProfile objects filtered by the password column
 * @method     array findByUserEmail(string $email) Return SUserProfile objects filtered by the email column
 * @method     array findByAddress(string $address) Return SUserProfile objects filtered by the address column
 * @method     array findByPhone(string $phone) Return SUserProfile objects filtered by the phone column
 * @method     array findByBanned(int $banned) Return SUserProfile objects filtered by the banned column
 * @method     array findByBanReason(string $ban_reason) Return SUserProfile objects filtered by the ban_reason column
 * @method     array findByNewpass(string $newpass) Return SUserProfile objects filtered by the newpass column
 * @method     array findByNewpassKey(string $newpass_key) Return SUserProfile objects filtered by the newpass_key column
 * @method     array findByNewpassTime(int $newpass_time) Return SUserProfile objects filtered by the newpass_time column
 * @method     array findByDateCreated(int $created) Return SUserProfile objects filtered by the created column
 * @method     array findByLastIp(string $last_ip) Return SUserProfile objects filtered by the last_ip column
 * @method     array findByLastLogin(int $last_login) Return SUserProfile objects filtered by the last_login column
 * @method     array findByModified(string $modified) Return SUserProfile objects filtered by the modified column
 * @method     array findByCartData(string $cart_data) Return SUserProfile objects filtered by the cart_data column
 * @method     array findByWishListData(string $wish_list_data) Return SUserProfile objects filtered by the wish_list_data column
 * @method     array findByKey(string $key) Return SUserProfile objects filtered by the key column
 * @method     array findByAmout(string $amout) Return SUserProfile objects filtered by the amout column
 * @method     array findByDiscount(string $discount) Return SUserProfile objects filtered by the discount column
 * @method     array findByRoleId(int $role_id) Return SUserProfile objects filtered by the role_id column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSUserProfileQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseSUserProfileQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SUserProfile', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new SUserProfileQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return SUserProfileQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof SUserProfileQuery) {
			return $criteria;
		}
		$query = new SUserProfileQuery ();
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
	 * @return SUserProfile|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SUserProfilePeer::getInstanceFromPool ( ( string ) $key ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( SUserProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return SUserProfile A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `ID`, `USERNAME`, `PASSWORD`, `EMAIL`, `ADDRESS`, `PHONE`, `BANNED`, `BAN_REASON`, `NEWPASS`, `NEWPASS_KEY`, `NEWPASS_TIME`, `CREATED`, `LAST_IP`, `LAST_LOGIN`, `MODIFIED`, `CART_DATA`, `WISH_LIST_DATA`, `KEY`, `AMOUT`, `DISCOUNT`, `ROLE_ID` FROM `users` WHERE `ID` = :p0';
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
			$obj = new SUserProfile ();
			$obj->hydrate ( $row );
			SUserProfilePeer::addInstanceToPool ( $obj, ( string ) $key );
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
	 * @return SUserProfile|array|mixed the result, formatted by the current formatter
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
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		return $this->addUsingAlias ( SUserProfilePeer::ID, $key, Criteria::EQUAL );
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		return $this->addUsingAlias ( SUserProfilePeer::ID, $keys, Criteria::IN );
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
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null) {
		if (is_array ( $id ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( SUserProfilePeer::ID, $id, $comparison );
	}
	
	/**
	 * Filter the query on the username column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByName('fooValue'); // WHERE username = 'fooValue'
	 * $query->filterByName('%fooValue%'); // WHERE username LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $name
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
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
		return $this->addUsingAlias ( SUserProfilePeer::USERNAME, $name, $comparison );
	}
	
	/**
	 * Filter the query on the password column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPassword('fooValue'); // WHERE password = 'fooValue'
	 * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $password
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByPassword($password = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $password )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $password )) {
				$password = str_replace ( '*', '%', $password );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::PASSWORD, $password, $comparison );
	}
	
	/**
	 * Filter the query on the email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserEmail('fooValue'); // WHERE email = 'fooValue'
	 * $query->filterByUserEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $userEmail
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
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
		return $this->addUsingAlias ( SUserProfilePeer::EMAIL, $userEmail, $comparison );
	}
	
	/**
	 * Filter the query on the address column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAddress('fooValue'); // WHERE address = 'fooValue'
	 * $query->filterByAddress('%fooValue%'); // WHERE address LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $address
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByAddress($address = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $address )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $address )) {
				$address = str_replace ( '*', '%', $address );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::ADDRESS, $address, $comparison );
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
	 * @return SUserProfileQuery The current query, for fluid interface
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
		return $this->addUsingAlias ( SUserProfilePeer::PHONE, $phone, $comparison );
	}
	
	/**
	 * Filter the query on the banned column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByBanned(1234); // WHERE banned = 1234
	 * $query->filterByBanned(array(12, 34)); // WHERE banned IN (12, 34)
	 * $query->filterByBanned(array('min' => 12)); // WHERE banned > 12
	 * </code>
	 *
	 * @param mixed $banned
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByBanned($banned = null, $comparison = null) {
		if (is_array ( $banned )) {
			$useMinMax = false;
			if (isset ( $banned ['min'] )) {
				$this->addUsingAlias ( SUserProfilePeer::BANNED, $banned ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $banned ['max'] )) {
				$this->addUsingAlias ( SUserProfilePeer::BANNED, $banned ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::BANNED, $banned, $comparison );
	}
	
	/**
	 * Filter the query on the ban_reason column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByBanReason('fooValue'); // WHERE ban_reason = 'fooValue'
	 * $query->filterByBanReason('%fooValue%'); // WHERE ban_reason LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $banReason
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByBanReason($banReason = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $banReason )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $banReason )) {
				$banReason = str_replace ( '*', '%', $banReason );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::BAN_REASON, $banReason, $comparison );
	}
	
	/**
	 * Filter the query on the newpass column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNewpass('fooValue'); // WHERE newpass = 'fooValue'
	 * $query->filterByNewpass('%fooValue%'); // WHERE newpass LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $newpass
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByNewpass($newpass = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $newpass )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $newpass )) {
				$newpass = str_replace ( '*', '%', $newpass );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::NEWPASS, $newpass, $comparison );
	}
	
	/**
	 * Filter the query on the newpass_key column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNewpassKey('fooValue'); // WHERE newpass_key = 'fooValue'
	 * $query->filterByNewpassKey('%fooValue%'); // WHERE newpass_key LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $newpassKey
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByNewpassKey($newpassKey = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $newpassKey )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $newpassKey )) {
				$newpassKey = str_replace ( '*', '%', $newpassKey );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::NEWPASS_KEY, $newpassKey, $comparison );
	}
	
	/**
	 * Filter the query on the newpass_time column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNewpassTime(1234); // WHERE newpass_time = 1234
	 * $query->filterByNewpassTime(array(12, 34)); // WHERE newpass_time IN (12, 34)
	 * $query->filterByNewpassTime(array('min' => 12)); // WHERE newpass_time > 12
	 * </code>
	 *
	 * @param mixed $newpassTime
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByNewpassTime($newpassTime = null, $comparison = null) {
		if (is_array ( $newpassTime )) {
			$useMinMax = false;
			if (isset ( $newpassTime ['min'] )) {
				$this->addUsingAlias ( SUserProfilePeer::NEWPASS_TIME, $newpassTime ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $newpassTime ['max'] )) {
				$this->addUsingAlias ( SUserProfilePeer::NEWPASS_TIME, $newpassTime ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::NEWPASS_TIME, $newpassTime, $comparison );
	}
	
	/**
	 * Filter the query on the created column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDateCreated(1234); // WHERE created = 1234
	 * $query->filterByDateCreated(array(12, 34)); // WHERE created IN (12, 34)
	 * $query->filterByDateCreated(array('min' => 12)); // WHERE created > 12
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
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByDateCreated($dateCreated = null, $comparison = null) {
		if (is_array ( $dateCreated )) {
			$useMinMax = false;
			if (isset ( $dateCreated ['min'] )) {
				$this->addUsingAlias ( SUserProfilePeer::CREATED, $dateCreated ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $dateCreated ['max'] )) {
				$this->addUsingAlias ( SUserProfilePeer::CREATED, $dateCreated ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::CREATED, $dateCreated, $comparison );
	}
	
	/**
	 * Filter the query on the last_ip column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLastIp('fooValue'); // WHERE last_ip = 'fooValue'
	 * $query->filterByLastIp('%fooValue%'); // WHERE last_ip LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $lastIp
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByLastIp($lastIp = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $lastIp )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $lastIp )) {
				$lastIp = str_replace ( '*', '%', $lastIp );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::LAST_IP, $lastIp, $comparison );
	}
	
	/**
	 * Filter the query on the last_login column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLastLogin(1234); // WHERE last_login = 1234
	 * $query->filterByLastLogin(array(12, 34)); // WHERE last_login IN (12, 34)
	 * $query->filterByLastLogin(array('min' => 12)); // WHERE last_login > 12
	 * </code>
	 *
	 * @param mixed $lastLogin
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByLastLogin($lastLogin = null, $comparison = null) {
		if (is_array ( $lastLogin )) {
			$useMinMax = false;
			if (isset ( $lastLogin ['min'] )) {
				$this->addUsingAlias ( SUserProfilePeer::LAST_LOGIN, $lastLogin ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $lastLogin ['max'] )) {
				$this->addUsingAlias ( SUserProfilePeer::LAST_LOGIN, $lastLogin ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::LAST_LOGIN, $lastLogin, $comparison );
	}
	
	/**
	 * Filter the query on the modified column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByModified('2011-03-14'); // WHERE modified = '2011-03-14'
	 * $query->filterByModified('now'); // WHERE modified = '2011-03-14'
	 * $query->filterByModified(array('max' => 'yesterday')); // WHERE modified > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $modified
	 *        	The value to use as filter.
	 *        	Values can be integers (unix timestamps), DateTime objects, or strings.
	 *        	Empty strings are treated as NULL.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByModified($modified = null, $comparison = null) {
		if (is_array ( $modified )) {
			$useMinMax = false;
			if (isset ( $modified ['min'] )) {
				$this->addUsingAlias ( SUserProfilePeer::MODIFIED, $modified ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $modified ['max'] )) {
				$this->addUsingAlias ( SUserProfilePeer::MODIFIED, $modified ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::MODIFIED, $modified, $comparison );
	}
	
	/**
	 * Filter the query on the cart_data column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCartData('fooValue'); // WHERE cart_data = 'fooValue'
	 * $query->filterByCartData('%fooValue%'); // WHERE cart_data LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $cartData
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByCartData($cartData = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $cartData )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $cartData )) {
				$cartData = str_replace ( '*', '%', $cartData );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::CART_DATA, $cartData, $comparison );
	}
	
	/**
	 * Filter the query on the wish_list_data column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByWishListData('fooValue'); // WHERE wish_list_data = 'fooValue'
	 * $query->filterByWishListData('%fooValue%'); // WHERE wish_list_data LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $wishListData
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByWishListData($wishListData = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $wishListData )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $wishListData )) {
				$wishListData = str_replace ( '*', '%', $wishListData );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::WISH_LIST_DATA, $wishListData, $comparison );
	}
	
	/**
	 * Filter the query on the key column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByKey('fooValue'); // WHERE key = 'fooValue'
	 * $query->filterByKey('%fooValue%'); // WHERE key LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $key
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByKey($key = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $key )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $key )) {
				$key = str_replace ( '*', '%', $key );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::KEY, $key, $comparison );
	}
	
	/**
	 * Filter the query on the amout column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAmout(1234); // WHERE amout = 1234
	 * $query->filterByAmout(array(12, 34)); // WHERE amout IN (12, 34)
	 * $query->filterByAmout(array('min' => 12)); // WHERE amout > 12
	 * </code>
	 *
	 * @param mixed $amout
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByAmout($amout = null, $comparison = null) {
		if (is_array ( $amout )) {
			$useMinMax = false;
			if (isset ( $amout ['min'] )) {
				$this->addUsingAlias ( SUserProfilePeer::AMOUT, $amout ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $amout ['max'] )) {
				$this->addUsingAlias ( SUserProfilePeer::AMOUT, $amout ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::AMOUT, $amout, $comparison );
	}
	
	/**
	 * Filter the query on the discount column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDiscount('fooValue'); // WHERE discount = 'fooValue'
	 * $query->filterByDiscount('%fooValue%'); // WHERE discount LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $discount
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByDiscount($discount = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $discount )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $discount )) {
				$discount = str_replace ( '*', '%', $discount );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::DISCOUNT, $discount, $comparison );
	}
	
	/**
	 * Filter the query on the role_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRoleId(1234); // WHERE role_id = 1234
	 * $query->filterByRoleId(array(12, 34)); // WHERE role_id IN (12, 34)
	 * $query->filterByRoleId(array('min' => 12)); // WHERE role_id > 12
	 * </code>
	 *
	 * @param mixed $roleId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByRoleId($roleId = null, $comparison = null) {
		if (is_array ( $roleId )) {
			$useMinMax = false;
			if (isset ( $roleId ['min'] )) {
				$this->addUsingAlias ( SUserProfilePeer::ROLE_ID, $roleId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $roleId ['max'] )) {
				$this->addUsingAlias ( SUserProfilePeer::ROLE_ID, $roleId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SUserProfilePeer::ROLE_ID, $roleId, $comparison );
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param SUserProfile $sUserProfile
	 *        	Object to remove from the list of results
	 *        	
	 * @return SUserProfileQuery The current query, for fluid interface
	 */
	public function prune($sUserProfile = null) {
		if ($sUserProfile) {
			$this->addUsingAlias ( SUserProfilePeer::ID, $sUserProfile->getId (), Criteria::NOT_EQUAL );
		}
		
		return $this;
	}
} // BaseSUserProfileQuery