<?php


/**
 * Base class that represents a row from the 'shop_kit_product' table.
 *
 * 
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseShopKitProduct extends ShopBaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ShopKitProductPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ShopKitProductPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the product_id field.
	 * @var        int
	 */
	protected $product_id;

	/**
	 * The value for the kit_id field.
	 * @var        int
	 */
	protected $kit_id;

	/**
	 * The value for the discount field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $discount;

	/**
	 * @var        SProducts
	 */
	protected $aSProducts;

	/**
	 * @var        SProductVariants
	 */
	protected $aSProductVariants;

	/**
	 * @var        ShopKit
	 */
	protected $aShopKit;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->discount = '0';
	}

	/**
	 * Initializes internal state of BaseShopKitProduct object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [product_id] column value.
	 * 
	 * @return     int
	 */
	public function getProductId()
	{
		return $this->product_id;
	}

	/**
	 * Get the [kit_id] column value.
	 * 
	 * @return     int
	 */
	public function getKitId()
	{
		return $this->kit_id;
	}

	/**
	 * Get the [discount] column value.
	 * 
	 * @return     string
	 */
	public function getDiscount()
	{
		return $this->discount;
	}

	/**
	 * Set the value of [product_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ShopKitProduct The current object (for fluent API support)
	 */
	public function setProductId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->product_id !== $v) {
			$this->product_id = $v;
			$this->modifiedColumns[] = ShopKitProductPeer::PRODUCT_ID;
		}

		if ($this->aSProducts !== null && $this->aSProducts->getId() !== $v) {
			$this->aSProducts = null;
		}

		if ($this->aSProductVariants !== null && $this->aSProductVariants->getProductId() !== $v) {
			$this->aSProductVariants = null;
		}

		return $this;
	} // setProductId()

	/**
	 * Set the value of [kit_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ShopKitProduct The current object (for fluent API support)
	 */
	public function setKitId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->kit_id !== $v) {
			$this->kit_id = $v;
			$this->modifiedColumns[] = ShopKitProductPeer::KIT_ID;
		}

		if ($this->aShopKit !== null && $this->aShopKit->getId() !== $v) {
			$this->aShopKit = null;
		}

		return $this;
	} // setKitId()

	/**
	 * Set the value of [discount] column.
	 * 
	 * @param      string $v new value
	 * @return     ShopKitProduct The current object (for fluent API support)
	 */
	public function setDiscount($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->discount !== $v) {
			$this->discount = $v;
			$this->modifiedColumns[] = ShopKitProductPeer::DISCOUNT;
		}

		return $this;
	} // setDiscount()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->discount !== '0') {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->product_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->kit_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->discount = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 3; // 3 = ShopKitProductPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating ShopKitProduct object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aSProducts !== null && $this->product_id !== $this->aSProducts->getId()) {
			$this->aSProducts = null;
		}
		if ($this->aSProductVariants !== null && $this->product_id !== $this->aSProductVariants->getProductId()) {
			$this->aSProductVariants = null;
		}
		if ($this->aShopKit !== null && $this->kit_id !== $this->aShopKit->getId()) {
			$this->aShopKit = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ShopKitProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ShopKitProductPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSProducts = null;
			$this->aSProductVariants = null;
			$this->aShopKit = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ShopKitProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = ShopKitProductQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ShopKitProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				ShopKitProductPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aSProducts !== null) {
				if ($this->aSProducts->isModified() || $this->aSProducts->isNew()) {
					$affectedRows += $this->aSProducts->save($con);
				}
				$this->setSProducts($this->aSProducts);
			}

			if ($this->aSProductVariants !== null) {
				if ($this->aSProductVariants->isModified() || $this->aSProductVariants->isNew()) {
					$affectedRows += $this->aSProductVariants->save($con);
				}
				$this->setSProductVariants($this->aSProductVariants);
			}

			if ($this->aShopKit !== null) {
				if ($this->aShopKit->isModified() || $this->aShopKit->isNew()) {
					$affectedRows += $this->aShopKit->save($con);
				}
				$this->setShopKit($this->aShopKit);
			}

			if ($this->isNew() || $this->isModified()) {
				// persist changes
				if ($this->isNew()) {
					$this->doInsert($con);
				} else {
					$this->doUpdate($con);
				}
				$affectedRows += 1;
				$this->resetModified();
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Insert the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @throws     PropelException
	 * @see        doSave()
	 */
	protected function doInsert(PropelPDO $con)
	{
		$modifiedColumns = array();
		$index = 0;


		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(ShopKitProductPeer::PRODUCT_ID)) {
			$modifiedColumns[':p' . $index++]  = '`PRODUCT_ID`';
		}
		if ($this->isColumnModified(ShopKitProductPeer::KIT_ID)) {
			$modifiedColumns[':p' . $index++]  = '`KIT_ID`';
		}
		if ($this->isColumnModified(ShopKitProductPeer::DISCOUNT)) {
			$modifiedColumns[':p' . $index++]  = '`DISCOUNT`';
		}

		$sql = sprintf(
			'INSERT INTO `shop_kit_product` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`PRODUCT_ID`':						
						$stmt->bindValue($identifier, $this->product_id, PDO::PARAM_INT);
						break;
					case '`KIT_ID`':						
						$stmt->bindValue($identifier, $this->kit_id, PDO::PARAM_INT);
						break;
					case '`DISCOUNT`':						
						$stmt->bindValue($identifier, $this->discount, PDO::PARAM_STR);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

		$this->setNew(false);
	}

	/**
	 * Update the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @see        doSave()
	 */
	protected function doUpdate(PropelPDO $con)
	{
		$selectCriteria = $this->buildPkeyCriteria();
		$valuesCriteria = $this->buildCriteria();
		BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
	}

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aSProducts !== null) {
				if (!$this->aSProducts->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSProducts->getValidationFailures());
				}
			}

			if ($this->aSProductVariants !== null) {
				if (!$this->aSProductVariants->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSProductVariants->getValidationFailures());
				}
			}

			if ($this->aShopKit !== null) {
				if (!$this->aShopKit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aShopKit->getValidationFailures());
				}
			}


			if (($retval = ShopKitProductPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ShopKitProductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getProductId();
				break;
			case 1:
				return $this->getKitId();
				break;
			case 2:
				return $this->getDiscount();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['ShopKitProduct'][serialize($this->getPrimaryKey())])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['ShopKitProduct'][serialize($this->getPrimaryKey())] = true;
		$keys = ShopKitProductPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getProductId(),
			$keys[1] => $this->getKitId(),
			$keys[2] => $this->getDiscount(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aSProducts) {
				$result['SProducts'] = $this->aSProducts->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aSProductVariants) {
				$result['SProductVariants'] = $this->aSProductVariants->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aShopKit) {
				$result['ShopKit'] = $this->aShopKit->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ShopKitProductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setProductId($value);
				break;
			case 1:
				$this->setKitId($value);
				break;
			case 2:
				$this->setDiscount($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ShopKitProductPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setProductId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setKitId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDiscount($arr[$keys[2]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ShopKitProductPeer::DATABASE_NAME);

		if ($this->isColumnModified(ShopKitProductPeer::PRODUCT_ID)) $criteria->add(ShopKitProductPeer::PRODUCT_ID, $this->product_id);
		if ($this->isColumnModified(ShopKitProductPeer::KIT_ID)) $criteria->add(ShopKitProductPeer::KIT_ID, $this->kit_id);
		if ($this->isColumnModified(ShopKitProductPeer::DISCOUNT)) $criteria->add(ShopKitProductPeer::DISCOUNT, $this->discount);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ShopKitProductPeer::DATABASE_NAME);
		$criteria->add(ShopKitProductPeer::PRODUCT_ID, $this->product_id);
		$criteria->add(ShopKitProductPeer::KIT_ID, $this->kit_id);

		return $criteria;
	}

	/**
	 * Returns the composite primary key for this object.
	 * The array elements will be in same order as specified in XML.
	 * @return     array
	 */
	public function getPrimaryKey()
	{
		$pks = array();
		$pks[0] = $this->getProductId();
		$pks[1] = $this->getKitId();

		return $pks;
	}

	/**
	 * Set the [composite] primary key.
	 *
	 * @param      array $keys The elements of the composite key (order must match the order in XML file).
	 * @return     void
	 */
	public function setPrimaryKey($keys)
	{
		$this->setProductId($keys[0]);
		$this->setKitId($keys[1]);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return (null === $this->getProductId()) && (null === $this->getKitId());
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of ShopKitProduct (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setProductId($this->getProductId());
		$copyObj->setKitId($this->getKitId());
		$copyObj->setDiscount($this->getDiscount());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     ShopKitProduct Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     ShopKitProductPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ShopKitProductPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a SProducts object.
	 *
	 * @param      SProducts $v
	 * @return     ShopKitProduct The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSProducts(SProducts $v = null)
	{
		if ($v === null) {
			$this->setProductId(NULL);
		} else {
			$this->setProductId($v->getId());
		}

		$this->aSProducts = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SProducts object, it will not be re-added.
		if ($v !== null) {
			$v->addShopKitProduct($this);
		}

		return $this;
	}


	/**
	 * Get the associated SProducts object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SProducts The associated SProducts object.
	 * @throws     PropelException
	 */
	public function getSProducts(PropelPDO $con = null)
	{
		if ($this->aSProducts === null && ($this->product_id !== null)) {
			$this->aSProducts = SProductsQuery::create()->findPk($this->product_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aSProducts->addShopKitProducts($this);
			 */
		}
		return $this->aSProducts;
	}

	/**
	 * Declares an association between this object and a SProductVariants object.
	 *
	 * @param      SProductVariants $v
	 * @return     ShopKitProduct The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSProductVariants(SProductVariants $v = null)
	{
		if ($v === null) {
			$this->setProductId(NULL);
		} else {
			$this->setProductId($v->getProductId());
		}

		$this->aSProductVariants = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SProductVariants object, it will not be re-added.
		if ($v !== null) {
			$v->addShopKitProduct($this);
		}

		return $this;
	}


	/**
	 * Get the associated SProductVariants object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SProductVariants The associated SProductVariants object.
	 * @throws     PropelException
	 */
	public function getSProductVariants(PropelPDO $con = null)
	{
		if ($this->aSProductVariants === null && ($this->product_id !== null)) {
			$this->aSProductVariants = SProductVariantsQuery::create()
				->filterByShopKitProduct($this) // here
				->findOne($con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aSProductVariants->addShopKitProducts($this);
			 */
		}
		return $this->aSProductVariants;
	}

	/**
	 * Declares an association between this object and a ShopKit object.
	 *
	 * @param      ShopKit $v
	 * @return     ShopKitProduct The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setShopKit(ShopKit $v = null)
	{
		if ($v === null) {
			$this->setKitId(NULL);
		} else {
			$this->setKitId($v->getId());
		}

		$this->aShopKit = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ShopKit object, it will not be re-added.
		if ($v !== null) {
			$v->addShopKitProduct($this);
		}

		return $this;
	}


	/**
	 * Get the associated ShopKit object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ShopKit The associated ShopKit object.
	 * @throws     PropelException
	 */
	public function getShopKit(PropelPDO $con = null)
	{
		if ($this->aShopKit === null && ($this->kit_id !== null)) {
			$this->aShopKit = ShopKitQuery::create()->findPk($this->kit_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aShopKit->addShopKitProducts($this);
			 */
		}
		return $this->aShopKit;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->product_id = null;
		$this->kit_id = null;
		$this->discount = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

		$this->aSProducts = null;
		$this->aSProductVariants = null;
		$this->aShopKit = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(ShopKitProductPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseShopKitProduct
