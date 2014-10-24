<?php

/**
 * Base class that represents a query for the 'shop_category' table.
 *
 * 
 *
 * @method     SCategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SCategoryQuery orderByExternalId($order = Criteria::ASC) Order by the external_id column
 * @method     SCategoryQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     SCategoryQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     SCategoryQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     SCategoryQuery orderByParentId($order = Criteria::ASC) Order by the parent_id column
 * @method     SCategoryQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     SCategoryQuery orderByFullPath($order = Criteria::ASC) Order by the full_path column
 * @method     SCategoryQuery orderByFullPathIds($order = Criteria::ASC) Order by the full_path_ids column
 * @method     SCategoryQuery orderByTpl($order = Criteria::ASC) Order by the tpl column
 * @method     SCategoryQuery orderByOrderMethod($order = Criteria::ASC) Order by the order_method column
 * @method     SCategoryQuery orderByShowsitetitle($order = Criteria::ASC) Order by the showsitetitle column
 *
 * @method     SCategoryQuery groupById() Group by the id column
 * @method     SCategoryQuery groupByExternalId() Group by the external_id column
 * @method     SCategoryQuery groupByUrl() Group by the url column
 * @method     SCategoryQuery groupByActive() Group by the active column
 * @method     SCategoryQuery groupByImage() Group by the image column
 * @method     SCategoryQuery groupByParentId() Group by the parent_id column
 * @method     SCategoryQuery groupByPosition() Group by the position column
 * @method     SCategoryQuery groupByFullPath() Group by the full_path column
 * @method     SCategoryQuery groupByFullPathIds() Group by the full_path_ids column
 * @method     SCategoryQuery groupByTpl() Group by the tpl column
 * @method     SCategoryQuery groupByOrderMethod() Group by the order_method column
 * @method     SCategoryQuery groupByShowsitetitle() Group by the showsitetitle column
 *
 * @method     SCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SCategoryQuery leftJoinSCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the SCategory relation
 * @method     SCategoryQuery rightJoinSCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SCategory relation
 * @method     SCategoryQuery innerJoinSCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the SCategory relation
 *
 * @method     SCategoryQuery leftJoinSCategoryRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the SCategoryRelatedById relation
 * @method     SCategoryQuery rightJoinSCategoryRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SCategoryRelatedById relation
 * @method     SCategoryQuery innerJoinSCategoryRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the SCategoryRelatedById relation
 *
 * @method     SCategoryQuery leftJoinSCategoryI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the SCategoryI18n relation
 * @method     SCategoryQuery rightJoinSCategoryI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SCategoryI18n relation
 * @method     SCategoryQuery innerJoinSCategoryI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the SCategoryI18n relation
 *
 * @method     SCategoryQuery leftJoinSProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProducts relation
 * @method     SCategoryQuery rightJoinSProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProducts relation
 * @method     SCategoryQuery innerJoinSProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SProducts relation
 *
 * @method     SCategoryQuery leftJoinShopProductCategories($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShopProductCategories relation
 * @method     SCategoryQuery rightJoinShopProductCategories($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShopProductCategories relation
 * @method     SCategoryQuery innerJoinShopProductCategories($relationAlias = null) Adds a INNER JOIN clause to the query using the ShopProductCategories relation
 *
 * @method     SCategoryQuery leftJoinShopProductPropertiesCategories($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShopProductPropertiesCategories relation
 * @method     SCategoryQuery rightJoinShopProductPropertiesCategories($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShopProductPropertiesCategories relation
 * @method     SCategoryQuery innerJoinShopProductPropertiesCategories($relationAlias = null) Adds a INNER JOIN clause to the query using the ShopProductPropertiesCategories relation
 *
 * @method     SCategory findOne(PropelPDO $con = null) Return the first SCategory matching the query
 * @method     SCategory findOneOrCreate(PropelPDO $con = null) Return the first SCategory matching the query, or a new SCategory object populated from the query conditions when no match is found
 *
 * @method     SCategory findOneById(int $id) Return the first SCategory filtered by the id column
 * @method     SCategory findOneByExternalId(string $external_id) Return the first SCategory filtered by the external_id column
 * @method     SCategory findOneByUrl(string $url) Return the first SCategory filtered by the url column
 * @method     SCategory findOneByActive(boolean $active) Return the first SCategory filtered by the active column
 * @method     SCategory findOneByImage(string $image) Return the first SCategory filtered by the image column
 * @method     SCategory findOneByParentId(int $parent_id) Return the first SCategory filtered by the parent_id column
 * @method     SCategory findOneByPosition(int $position) Return the first SCategory filtered by the position column
 * @method     SCategory findOneByFullPath(string $full_path) Return the first SCategory filtered by the full_path column
 * @method     SCategory findOneByFullPathIds(string $full_path_ids) Return the first SCategory filtered by the full_path_ids column
 * @method     SCategory findOneByTpl(string $tpl) Return the first SCategory filtered by the tpl column
 * @method     SCategory findOneByOrderMethod(int $order_method) Return the first SCategory filtered by the order_method column
 * @method     SCategory findOneByShowsitetitle(int $showsitetitle) Return the first SCategory filtered by the showsitetitle column
 *
 * @method     array findById(int $id) Return SCategory objects filtered by the id column
 * @method     array findByExternalId(string $external_id) Return SCategory objects filtered by the external_id column
 * @method     array findByUrl(string $url) Return SCategory objects filtered by the url column
 * @method     array findByActive(boolean $active) Return SCategory objects filtered by the active column
 * @method     array findByImage(string $image) Return SCategory objects filtered by the image column
 * @method     array findByParentId(int $parent_id) Return SCategory objects filtered by the parent_id column
 * @method     array findByPosition(int $position) Return SCategory objects filtered by the position column
 * @method     array findByFullPath(string $full_path) Return SCategory objects filtered by the full_path column
 * @method     array findByFullPathIds(string $full_path_ids) Return SCategory objects filtered by the full_path_ids column
 * @method     array findByTpl(string $tpl) Return SCategory objects filtered by the tpl column
 * @method     array findByOrderMethod(int $order_method) Return SCategory objects filtered by the order_method column
 * @method     array findByShowsitetitle(int $showsitetitle) Return SCategory objects filtered by the showsitetitle column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSCategoryQuery extends ModelCriteria {
	
	/**
	 * Initializes internal state of BaseSCategoryQuery object.
	 *
	 * @param string $dbName
	 *        	The dabase name
	 * @param string $modelName
	 *        	The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias
	 *        	The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SCategory', $modelAlias = null) {
		parent::__construct ( $dbName, $modelName, $modelAlias );
	}
	
	/**
	 * Returns a new SCategoryQuery object.
	 *
	 * @param string $modelAlias
	 *        	The alias of a model in the query
	 * @param Criteria $criteria
	 *        	Optional Criteria to build the query from
	 *        	
	 * @return SCategoryQuery
	 */
	public static function create($modelAlias = null, $criteria = null) {
		if ($criteria instanceof SCategoryQuery) {
			return $criteria;
		}
		$query = new SCategoryQuery ();
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
	 * @return SCategory|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null) {
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SCategoryPeer::getInstanceFromPool ( ( string ) $key ))) && ! $this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection ( SCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ );
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
	 * @return SCategory A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con) {
		$sql = 'SELECT `ID`, `EXTERNAL_ID`, `URL`, `ACTIVE`, `IMAGE`, `PARENT_ID`, `POSITION`, `FULL_PATH`, `FULL_PATH_IDS`, `TPL`, `ORDER_METHOD`, `SHOWSITETITLE` FROM `shop_category` WHERE `ID` = :p0';
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
			$obj = new SCategory ();
			$obj->hydrate ( $row );
			SCategoryPeer::addInstanceToPool ( $obj, ( string ) $key );
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
	 * @return SCategory|array|mixed the result, formatted by the current formatter
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
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		return $this->addUsingAlias ( SCategoryPeer::ID, $key, Criteria::EQUAL );
	}
	
	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array $keys
	 *        	The list of primary key to use for the query
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys) {
		return $this->addUsingAlias ( SCategoryPeer::ID, $keys, Criteria::IN );
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
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null) {
		if (is_array ( $id ) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias ( SCategoryPeer::ID, $id, $comparison );
	}
	
	/**
	 * Filter the query on the external_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByExternalId('fooValue'); // WHERE external_id = 'fooValue'
	 * $query->filterByExternalId('%fooValue%'); // WHERE external_id LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $externalId
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByExternalId($externalId = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $externalId )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $externalId )) {
				$externalId = str_replace ( '*', '%', $externalId );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SCategoryPeer::EXTERNAL_ID, $externalId, $comparison );
	}
	
	/**
	 * Filter the query on the url column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUrl('fooValue'); // WHERE url = 'fooValue'
	 * $query->filterByUrl('%fooValue%'); // WHERE url LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $url
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByUrl($url = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $url )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $url )) {
				$url = str_replace ( '*', '%', $url );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SCategoryPeer::URL, $url, $comparison );
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
	 * @param boolean|string $active
	 *        	The value to use as filter.
	 *        	Non-boolean arguments are converted using the following rules:
	 *        	* 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 *        	* 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 *        	Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null) {
		if (is_string ( $active )) {
			$active = in_array ( strtolower ( $active ), array (
					'false',
					'off',
					'-',
					'no',
					'n',
					'0',
					'' 
			) ) ? false : true;
		}
		return $this->addUsingAlias ( SCategoryPeer::ACTIVE, $active, $comparison );
	}
	
	/**
	 * Filter the query on the image column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByImage('fooValue'); // WHERE image = 'fooValue'
	 * $query->filterByImage('%fooValue%'); // WHERE image LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $image
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByImage($image = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $image )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $image )) {
				$image = str_replace ( '*', '%', $image );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SCategoryPeer::IMAGE, $image, $comparison );
	}
	
	/**
	 * Filter the query on the parent_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByParentId(1234); // WHERE parent_id = 1234
	 * $query->filterByParentId(array(12, 34)); // WHERE parent_id IN (12, 34)
	 * $query->filterByParentId(array('min' => 12)); // WHERE parent_id > 12
	 * </code>
	 *
	 * @see filterBySCategory()
	 *
	 * @param mixed $parentId
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByParentId($parentId = null, $comparison = null) {
		if (is_array ( $parentId )) {
			$useMinMax = false;
			if (isset ( $parentId ['min'] )) {
				$this->addUsingAlias ( SCategoryPeer::PARENT_ID, $parentId ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $parentId ['max'] )) {
				$this->addUsingAlias ( SCategoryPeer::PARENT_ID, $parentId ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SCategoryPeer::PARENT_ID, $parentId, $comparison );
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
	 * @param mixed $position
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null) {
		if (is_array ( $position )) {
			$useMinMax = false;
			if (isset ( $position ['min'] )) {
				$this->addUsingAlias ( SCategoryPeer::POSITION, $position ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $position ['max'] )) {
				$this->addUsingAlias ( SCategoryPeer::POSITION, $position ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SCategoryPeer::POSITION, $position, $comparison );
	}
	
	/**
	 * Filter the query on the full_path column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFullPath('fooValue'); // WHERE full_path = 'fooValue'
	 * $query->filterByFullPath('%fooValue%'); // WHERE full_path LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $fullPath
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByFullPath($fullPath = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $fullPath )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $fullPath )) {
				$fullPath = str_replace ( '*', '%', $fullPath );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SCategoryPeer::FULL_PATH, $fullPath, $comparison );
	}
	
	/**
	 * Filter the query on the full_path_ids column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFullPathIds('fooValue'); // WHERE full_path_ids = 'fooValue'
	 * $query->filterByFullPathIds('%fooValue%'); // WHERE full_path_ids LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $fullPathIds
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByFullPathIds($fullPathIds = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $fullPathIds )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $fullPathIds )) {
				$fullPathIds = str_replace ( '*', '%', $fullPathIds );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SCategoryPeer::FULL_PATH_IDS, $fullPathIds, $comparison );
	}
	
	/**
	 * Filter the query on the tpl column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTpl('fooValue'); // WHERE tpl = 'fooValue'
	 * $query->filterByTpl('%fooValue%'); // WHERE tpl LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $tpl
	 *        	The value to use as filter.
	 *        	Accepts wildcards (* and % trigger a LIKE)
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByTpl($tpl = null, $comparison = null) {
		if (null === $comparison) {
			if (is_array ( $tpl )) {
				$comparison = Criteria::IN;
			} elseif (preg_match ( '/[\%\*]/', $tpl )) {
				$tpl = str_replace ( '*', '%', $tpl );
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias ( SCategoryPeer::TPL, $tpl, $comparison );
	}
	
	/**
	 * Filter the query on the order_method column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrderMethod(1234); // WHERE order_method = 1234
	 * $query->filterByOrderMethod(array(12, 34)); // WHERE order_method IN (12, 34)
	 * $query->filterByOrderMethod(array('min' => 12)); // WHERE order_method > 12
	 * </code>
	 *
	 * @param mixed $orderMethod
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByOrderMethod($orderMethod = null, $comparison = null) {
		if (is_array ( $orderMethod )) {
			$useMinMax = false;
			if (isset ( $orderMethod ['min'] )) {
				$this->addUsingAlias ( SCategoryPeer::ORDER_METHOD, $orderMethod ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $orderMethod ['max'] )) {
				$this->addUsingAlias ( SCategoryPeer::ORDER_METHOD, $orderMethod ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SCategoryPeer::ORDER_METHOD, $orderMethod, $comparison );
	}
	
	/**
	 * Filter the query on the showsitetitle column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShowsitetitle(1234); // WHERE showsitetitle = 1234
	 * $query->filterByShowsitetitle(array(12, 34)); // WHERE showsitetitle IN (12, 34)
	 * $query->filterByShowsitetitle(array('min' => 12)); // WHERE showsitetitle > 12
	 * </code>
	 *
	 * @param mixed $showsitetitle
	 *        	The value to use as filter.
	 *        	Use scalar values for equality.
	 *        	Use array values for in_array() equivalent.
	 *        	Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByShowsitetitle($showsitetitle = null, $comparison = null) {
		if (is_array ( $showsitetitle )) {
			$useMinMax = false;
			if (isset ( $showsitetitle ['min'] )) {
				$this->addUsingAlias ( SCategoryPeer::SHOWSITETITLE, $showsitetitle ['min'], Criteria::GREATER_EQUAL );
				$useMinMax = true;
			}
			if (isset ( $showsitetitle ['max'] )) {
				$this->addUsingAlias ( SCategoryPeer::SHOWSITETITLE, $showsitetitle ['max'], Criteria::LESS_EQUAL );
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias ( SCategoryPeer::SHOWSITETITLE, $showsitetitle, $comparison );
	}
	
	/**
	 * Filter the query by a related SCategory object
	 *
	 * @param SCategory|PropelCollection $sCategory
	 *        	The related object(s) to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterBySCategory($sCategory, $comparison = null) {
		if ($sCategory instanceof SCategory) {
			return $this->addUsingAlias ( SCategoryPeer::PARENT_ID, $sCategory->getId (), $comparison );
		} elseif ($sCategory instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this->addUsingAlias ( SCategoryPeer::PARENT_ID, $sCategory->toKeyValue ( 'PrimaryKey', 'Id' ), $comparison );
		} else {
			throw new PropelException ( 'filterBySCategory() only accepts arguments of type SCategory or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SCategory relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function joinSCategory($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SCategory' );
		
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
			$this->addJoinObject ( $join, 'SCategory' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SCategory relation SCategory object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SCategoryQuery A secondary query class using the current class as primary query
	 */
	public function useSCategoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		return $this->joinSCategory ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SCategory', 'SCategoryQuery' );
	}
	
	/**
	 * Filter the query by a related SCategory object
	 *
	 * @param SCategory $sCategory
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterBySCategoryRelatedById($sCategory, $comparison = null) {
		if ($sCategory instanceof SCategory) {
			return $this->addUsingAlias ( SCategoryPeer::ID, $sCategory->getParentId (), $comparison );
		} elseif ($sCategory instanceof PropelCollection) {
			return $this->useSCategoryRelatedByIdQuery ()->filterByPrimaryKeys ( $sCategory->getPrimaryKeys () )->endUse ();
		} else {
			throw new PropelException ( 'filterBySCategoryRelatedById() only accepts arguments of type SCategory or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SCategoryRelatedById relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function joinSCategoryRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SCategoryRelatedById' );
		
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
			$this->addJoinObject ( $join, 'SCategoryRelatedById' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SCategoryRelatedById relation SCategory object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SCategoryQuery A secondary query class using the current class as primary query
	 */
	public function useSCategoryRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		return $this->joinSCategoryRelatedById ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SCategoryRelatedById', 'SCategoryQuery' );
	}
	
	/**
	 * Filter the query by a related SCategoryI18n object
	 *
	 * @param SCategoryI18n $sCategoryI18n
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterBySCategoryI18n($sCategoryI18n, $comparison = null) {
		if ($sCategoryI18n instanceof SCategoryI18n) {
			return $this->addUsingAlias ( SCategoryPeer::ID, $sCategoryI18n->getId (), $comparison );
		} elseif ($sCategoryI18n instanceof PropelCollection) {
			return $this->useSCategoryI18nQuery ()->filterByPrimaryKeys ( $sCategoryI18n->getPrimaryKeys () )->endUse ();
		} else {
			throw new PropelException ( 'filterBySCategoryI18n() only accepts arguments of type SCategoryI18n or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the SCategoryI18n relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function joinSCategoryI18n($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'SCategoryI18n' );
		
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
			$this->addJoinObject ( $join, 'SCategoryI18n' );
		}
		
		return $this;
	}
	
	/**
	 * Use the SCategoryI18n relation SCategoryI18n object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SCategoryI18nQuery A secondary query class using the current class as primary query
	 */
	public function useSCategoryI18nQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinSCategoryI18n ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SCategoryI18n', 'SCategoryI18nQuery' );
	}
	
	/**
	 * Filter the query by a related SProducts object
	 *
	 * @param SProducts $sProducts
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterBySProducts($sProducts, $comparison = null) {
		if ($sProducts instanceof SProducts) {
			return $this->addUsingAlias ( SCategoryPeer::ID, $sProducts->getCategoryId (), $comparison );
		} elseif ($sProducts instanceof PropelCollection) {
			return $this->useSProductsQuery ()->filterByPrimaryKeys ( $sProducts->getPrimaryKeys () )->endUse ();
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
	 * @return SCategoryQuery The current query, for fluid interface
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
	 * Filter the query by a related ShopProductCategories object
	 *
	 * @param ShopProductCategories $shopProductCategories
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByShopProductCategories($shopProductCategories, $comparison = null) {
		if ($shopProductCategories instanceof ShopProductCategories) {
			return $this->addUsingAlias ( SCategoryPeer::ID, $shopProductCategories->getCategoryId (), $comparison );
		} elseif ($shopProductCategories instanceof PropelCollection) {
			return $this->useShopProductCategoriesQuery ()->filterByPrimaryKeys ( $shopProductCategories->getPrimaryKeys () )->endUse ();
		} else {
			throw new PropelException ( 'filterByShopProductCategories() only accepts arguments of type ShopProductCategories or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the ShopProductCategories relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function joinShopProductCategories($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'ShopProductCategories' );
		
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
			$this->addJoinObject ( $join, 'ShopProductCategories' );
		}
		
		return $this;
	}
	
	/**
	 * Use the ShopProductCategories relation ShopProductCategories object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return ShopProductCategoriesQuery A secondary query class using the current class as primary query
	 */
	public function useShopProductCategoriesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinShopProductCategories ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'ShopProductCategories', 'ShopProductCategoriesQuery' );
	}
	
	/**
	 * Filter the query by a related ShopProductPropertiesCategories object
	 *
	 * @param ShopProductPropertiesCategories $shopProductPropertiesCategories
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByShopProductPropertiesCategories($shopProductPropertiesCategories, $comparison = null) {
		if ($shopProductPropertiesCategories instanceof ShopProductPropertiesCategories) {
			return $this->addUsingAlias ( SCategoryPeer::ID, $shopProductPropertiesCategories->getCategoryId (), $comparison );
		} elseif ($shopProductPropertiesCategories instanceof PropelCollection) {
			return $this->useShopProductPropertiesCategoriesQuery ()->filterByPrimaryKeys ( $shopProductPropertiesCategories->getPrimaryKeys () )->endUse ();
		} else {
			throw new PropelException ( 'filterByShopProductPropertiesCategories() only accepts arguments of type ShopProductPropertiesCategories or PropelCollection' );
		}
	}
	
	/**
	 * Adds a JOIN clause to the query using the ShopProductPropertiesCategories relation
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function joinShopProductPropertiesCategories($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		$tableMap = $this->getTableMap ();
		$relationMap = $tableMap->getRelation ( 'ShopProductPropertiesCategories' );
		
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
			$this->addJoinObject ( $join, 'ShopProductPropertiesCategories' );
		}
		
		return $this;
	}
	
	/**
	 * Use the ShopProductPropertiesCategories relation ShopProductPropertiesCategories object
	 *
	 * @see useQuery()
	 *
	 * @param string $relationAlias
	 *        	optional alias for the relation,
	 *        	to be used as main alias in the secondary query
	 * @param string $joinType
	 *        	Accepted values are null, 'left join', 'right join', 'inner join'
	 *        	
	 * @return ShopProductPropertiesCategoriesQuery A secondary query class using the current class as primary query
	 */
	public function useShopProductPropertiesCategoriesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN) {
		return $this->joinShopProductPropertiesCategories ( $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'ShopProductPropertiesCategories', 'ShopProductPropertiesCategoriesQuery' );
	}
	
	/**
	 * Filter the query by a related SProducts object
	 * using the shop_product_categories table as cross reference
	 *
	 * @param SProducts $sProducts
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByProduct($sProducts, $comparison = Criteria::EQUAL) {
		return $this->useShopProductCategoriesQuery ()->filterByProduct ( $sProducts, $comparison )->endUse ();
	}
	
	/**
	 * Filter the query by a related SProperties object
	 * using the shop_product_properties_categories table as cross reference
	 *
	 * @param SProperties $sProperties
	 *        	the related object to use as filter
	 * @param string $comparison
	 *        	Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function filterByProperty($sProperties, $comparison = Criteria::EQUAL) {
		return $this->useShopProductPropertiesCategoriesQuery ()->filterByProperty ( $sProperties, $comparison )->endUse ();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param SCategory $sCategory
	 *        	Object to remove from the list of results
	 *        	
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function prune($sCategory = null) {
		if ($sCategory) {
			$this->addUsingAlias ( SCategoryPeer::ID, $sCategory->getId (), Criteria::NOT_EQUAL );
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
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function joinI18n($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		$relationName = $relationAlias ? $relationAlias : 'SCategoryI18n';
		return $this->joinSCategoryI18n ( $relationAlias, $joinType )->addJoinCondition ( $relationName, $relationName . '.Locale = ?', $locale );
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
	 * @return SCategoryQuery The current query, for fluid interface
	 */
	public function joinWithI18n($locale = 'ru', $joinType = Criteria::LEFT_JOIN) {
		$this->joinI18n ( $locale, null, $joinType )->with ( 'SCategoryI18n' );
		$this->with ['SCategoryI18n']->setIsWithOneToMany ( false );
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
	 * @return SCategoryI18nQuery A secondary query class using the current class as primary query
	 */
	public function useI18nQuery($locale = 'ru', $relationAlias = null, $joinType = Criteria::LEFT_JOIN) {
		return $this->joinI18n ( $locale, $relationAlias, $joinType )->useQuery ( $relationAlias ? $relationAlias : 'SCategoryI18n', 'SCategoryI18nQuery' );
	}
} // BaseSCategoryQuery