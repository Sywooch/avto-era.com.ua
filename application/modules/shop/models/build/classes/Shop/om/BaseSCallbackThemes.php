<?php

/**
 * Base class that represents a row from the 'shop_callbacks_themes' table.
 *
 * 
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSCallbackThemes extends ShopBaseObject implements Persistent {
	
	/**
	 * Peer class name
	 */
	const PEER = 'SCallbackThemesPeer';
	
	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * 
	 * @var SCallbackThemesPeer
	 */
	protected static $peer;
	
	/**
	 * The flag var to prevent infinit loop in deep copy
	 * 
	 * @var boolean
	 */
	protected $startCopy = false;
	
	/**
	 * The value for the id field.
	 * 
	 * @var int
	 */
	protected $id;
	
	/**
	 * The value for the position field.
	 * 
	 * @var int
	 */
	protected $position;
	
	/**
	 *
	 * @var array SCallbacks[] Collection to store aggregation of SCallbacks objects.
	 */
	protected $collSCallbackss;
	
	/**
	 *
	 * @var array SCallbackThemesI18n[] Collection to store aggregation of SCallbackThemesI18n objects.
	 */
	protected $collSCallbackThemesI18ns;
	
	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * 
	 * @var boolean
	 */
	protected $alreadyInSave = false;
	
	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * 
	 * @var boolean
	 */
	protected $alreadyInValidation = false;
	
	// i18n behavior
	
	/**
	 * Current locale
	 * 
	 * @var string
	 */
	protected $currentLocale = 'ru';
	
	/**
	 * Current translation objects
	 * 
	 * @var array[SCallbackThemesI18n]
	 */
	protected $currentTranslations;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $sCallbackssScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $sCallbackThemesI18nsScheduledForDeletion = null;
	
	/**
	 * Get the [id] column value.
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Get the [position] column value.
	 *
	 * @return int
	 */
	public function getPosition() {
		return $this->position;
	}
	
	/**
	 * Set the value of [id] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SCallbackThemes The current object (for fluent API support)
	 */
	public function setId($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns [] = SCallbackThemesPeer::ID;
		}
		
		return $this;
	} // setId()
	
	/**
	 * Set the value of [position] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SCallbackThemes The current object (for fluent API support)
	 */
	public function setPosition($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->position !== $v) {
			$this->position = $v;
			$this->modifiedColumns [] = SCallbackThemesPeer::POSITION;
		}
		
		return $this;
	} // setPosition()
	
	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues() {
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()
	
	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows. This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param array $row
	 *        	The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param int $startcol
	 *        	0-based offset column which indicates which restultset column to start with.
	 * @param boolean $rehydrate
	 *        	Whether this object is being re-hydrated from the database.
	 * @return int next starting column
	 * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false) {
		try {
			
			$this->id = ($row [$startcol + 0] !== null) ? ( int ) $row [$startcol + 0] : null;
			$this->position = ($row [$startcol + 1] !== null) ? ( int ) $row [$startcol + 1] : null;
			$this->resetModified ();
			
			$this->setNew ( false );
			
			if ($rehydrate) {
				$this->ensureConsistency ();
			}
			
			return $startcol + 2; // 2 = SCallbackThemesPeer::NUM_HYDRATE_COLUMNS.
		} catch ( Exception $e ) {
			throw new PropelException ( "Error populating SCallbackThemes object", $e );
		}
	}
	
	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database. It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws PropelException
	 */
	public function ensureConsistency() {
	} // ensureConsistency
	
	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param boolean $deep
	 *        	(optional) Whether to also de-associated any related objects.
	 * @param PropelPDO $con
	 *        	(optional) The PropelPDO connection to use.
	 * @return void
	 * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null) {
		if ($this->isDeleted ()) {
			throw new PropelException ( "Cannot reload a deleted object." );
		}
		
		if ($this->isNew ()) {
			throw new PropelException ( "Cannot reload an unsaved object." );
		}
		
		if ($con === null) {
			$con = Propel::getConnection ( SCallbackThemesPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.
		
		$stmt = SCallbackThemesPeer::doSelectStmt ( $this->buildPkeyCriteria (), $con );
		$row = $stmt->fetch ( PDO::FETCH_NUM );
		$stmt->closeCursor ();
		if (! $row) {
			throw new PropelException ( 'Cannot find matching row in the database to reload object values.' );
		}
		$this->hydrate ( $row, 0, true ); // rehydrate
		
		if ($deep) { // also de-associate any related objects?
			
			$this->collSCallbackss = null;
			
			$this->collSCallbackThemesI18ns = null;
		} // if (deep)
	}
	
	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param PropelPDO $con        	
	 * @return void
	 * @throws PropelException
	 * @see BaseObject::setDeleted()
	 * @see BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null) {
		if ($this->isDeleted ()) {
			throw new PropelException ( "This object has already been deleted." );
		}
		
		if ($con === null) {
			$con = Propel::getConnection ( SCallbackThemesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		$con->beginTransaction ();
		try {
			$deleteQuery = SCallbackThemesQuery::create ()->filterByPrimaryKey ( $this->getPrimaryKey () );
			$ret = $this->preDelete ( $con );
			if ($ret) {
				$deleteQuery->delete ( $con );
				$this->postDelete ( $con );
				// i18n behavior
				
				// emulate delete cascade
				SCallbackThemesI18nQuery::create ()->filterBySCallbackThemes ( $this )->delete ( $con );
				$con->commit ();
				$this->setDeleted ( true );
			} else {
				$con->commit ();
			}
		} catch ( Exception $e ) {
			$con->rollBack ();
			throw $e;
		}
	}
	
	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method. This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param PropelPDO $con        	
	 * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws PropelException
	 * @see doSave()
	 */
	public function save(PropelPDO $con = null) {
		if ($this->isDeleted ()) {
			throw new PropelException ( "You cannot save an object that has been deleted." );
		}
		
		if ($con === null) {
			$con = Propel::getConnection ( SCallbackThemesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		$con->beginTransaction ();
		$isInsert = $this->isNew ();
		try {
			$ret = $this->preSave ( $con );
			if ($isInsert) {
				$ret = $ret && $this->preInsert ( $con );
			} else {
				$ret = $ret && $this->preUpdate ( $con );
			}
			if ($ret) {
				$affectedRows = $this->doSave ( $con );
				if ($isInsert) {
					$this->postInsert ( $con );
				} else {
					$this->postUpdate ( $con );
				}
				$this->postSave ( $con );
				SCallbackThemesPeer::addInstanceToPool ( $this );
			} else {
				$affectedRows = 0;
			}
			$con->commit ();
			return $affectedRows;
		} catch ( Exception $e ) {
			$con->rollBack ();
			throw $e;
		}
	}
	
	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param PropelPDO $con        	
	 * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws PropelException
	 * @see save()
	 */
	protected function doSave(PropelPDO $con) {
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (! $this->alreadyInSave) {
			$this->alreadyInSave = true;
			
			if ($this->isNew () || $this->isModified ()) {
				// persist changes
				if ($this->isNew ()) {
					$this->doInsert ( $con );
				} else {
					$this->doUpdate ( $con );
				}
				$affectedRows += 1;
				$this->resetModified ();
			}
			
			if ($this->sCallbackssScheduledForDeletion !== null) {
				if (! $this->sCallbackssScheduledForDeletion->isEmpty ()) {
					SCallbacksQuery::create ()->filterByPrimaryKeys ( $this->sCallbackssScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->sCallbackssScheduledForDeletion = null;
				}
			}
			
			if ($this->collSCallbackss !== null) {
				foreach ( $this->collSCallbackss as $referrerFK ) {
					if (! $referrerFK->isDeleted ()) {
						$affectedRows += $referrerFK->save ( $con );
					}
				}
			}
			
			if ($this->sCallbackThemesI18nsScheduledForDeletion !== null) {
				if (! $this->sCallbackThemesI18nsScheduledForDeletion->isEmpty ()) {
					SCallbackThemesI18nQuery::create ()->filterByPrimaryKeys ( $this->sCallbackThemesI18nsScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->sCallbackThemesI18nsScheduledForDeletion = null;
				}
			}
			
			if ($this->collSCallbackThemesI18ns !== null) {
				foreach ( $this->collSCallbackThemesI18ns as $referrerFK ) {
					if (! $referrerFK->isDeleted ()) {
						$affectedRows += $referrerFK->save ( $con );
					}
				}
			}
			
			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} // doSave()
	
	/**
	 * Insert the row in the database.
	 *
	 * @param PropelPDO $con        	
	 *
	 * @throws PropelException
	 * @see doSave()
	 */
	protected function doInsert(PropelPDO $con) {
		$modifiedColumns = array ();
		$index = 0;
		
		$this->modifiedColumns [] = SCallbackThemesPeer::ID;
		if (null !== $this->id) {
			throw new PropelException ( 'Cannot insert a value for auto-increment primary key (' . SCallbackThemesPeer::ID . ')' );
		}
		
		// check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified ( SCallbackThemesPeer::ID )) {
			$modifiedColumns [':p' . $index ++] = '`ID`';
		}
		if ($this->isColumnModified ( SCallbackThemesPeer::POSITION )) {
			$modifiedColumns [':p' . $index ++] = '`POSITION`';
		}
		
		$sql = sprintf ( 'INSERT INTO `shop_callbacks_themes` (%s) VALUES (%s)', implode ( ', ', $modifiedColumns ), implode ( ', ', array_keys ( $modifiedColumns ) ) );
		
		try {
			$stmt = $con->prepare ( $sql );
			foreach ( $modifiedColumns as $identifier => $columnName ) {
				switch ($columnName) {
					case '`ID`' :
						$stmt->bindValue ( $identifier, $this->id, PDO::PARAM_INT );
						break;
					case '`POSITION`' :
						$stmt->bindValue ( $identifier, $this->position, PDO::PARAM_INT );
						break;
				}
			}
			$stmt->execute ();
		} catch ( Exception $e ) {
			Propel::log ( $e->getMessage (), Propel::LOG_ERR );
			throw new PropelException ( sprintf ( 'Unable to execute INSERT statement [%s]', $sql ), $e );
		}
		
		try {
			$pk = $con->lastInsertId ();
		} catch ( Exception $e ) {
			throw new PropelException ( 'Unable to get autoincrement id.', $e );
		}
		$this->setId ( $pk );
		
		$this->setNew ( false );
	}
	
	/**
	 * Update the row in the database.
	 *
	 * @param PropelPDO $con        	
	 *
	 * @see doSave()
	 */
	protected function doUpdate(PropelPDO $con) {
		$selectCriteria = $this->buildPkeyCriteria ();
		$valuesCriteria = $this->buildCriteria ();
		BasePeer::doUpdate ( $selectCriteria, $valuesCriteria, $con );
	}
	
	/**
	 * Array of ValidationFailed objects.
	 * 
	 * @var array ValidationFailed[]
	 */
	protected $validationFailures = array ();
	
	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return array ValidationFailed[]
	 * @see validate()
	 */
	public function getValidationFailures() {
		return $this->validationFailures;
	}
	
	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param mixed $columns
	 *        	Column name or an array of column names.
	 * @return boolean Whether all columns pass validation.
	 * @see doValidate()
	 * @see getValidationFailures()
	 */
	public function validate($columns = null) {
		$res = $this->doValidate ( $columns );
		if ($res === true) {
			$this->validationFailures = array ();
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
	 * also be validated. If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param array $columns
	 *        	Array of column names to validate.
	 * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null) {
		if (! $this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;
			
			$failureMap = array ();
			
			if (($retval = SCallbackThemesPeer::doValidate ( $this, $columns )) !== true) {
				$failureMap = array_merge ( $failureMap, $retval );
			}
			
			if ($this->collSCallbackss !== null) {
				foreach ( $this->collSCallbackss as $referrerFK ) {
					if (! $referrerFK->validate ( $columns )) {
						$failureMap = array_merge ( $failureMap, $referrerFK->getValidationFailures () );
					}
				}
			}
			
			if ($this->collSCallbackThemesI18ns !== null) {
				foreach ( $this->collSCallbackThemesI18ns as $referrerFK ) {
					if (! $referrerFK->validate ( $columns )) {
						$failureMap = array_merge ( $failureMap, $referrerFK->getValidationFailures () );
					}
				}
			}
			
			$this->alreadyInValidation = false;
		}
		
		return (! empty ( $failureMap ) ? $failureMap : true);
	}
	
	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param string $name
	 *        	name
	 * @param string $type
	 *        	The type of fieldname the $name is of:
	 *        	one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *        	BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME) {
		$pos = SCallbackThemesPeer::translateFieldName ( $name, $type, BasePeer::TYPE_NUM );
		$field = $this->getByPosition ( $pos );
		return $field;
	}
	
	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param int $pos
	 *        	position in xml schema
	 * @return mixed Value of field at $pos
	 */
	public function getByPosition($pos) {
		switch ($pos) {
			case 0 :
				return $this->getId ();
				break;
			case 1 :
				return $this->getPosition ();
				break;
			default :
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
	 * @param string $keyType
	 *        	(optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *        	BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *        	Defaults to BasePeer::TYPE_PHPNAME.
	 * @param boolean $includeLazyLoadColumns
	 *        	(optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param array $alreadyDumpedObjects
	 *        	List of objects to skip to avoid recursion
	 * @param boolean $includeForeignObjects
	 *        	(optional) Whether to include hydrated related objects. Default to FALSE.
	 *        	
	 * @return array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false) {
		if (isset ( $alreadyDumpedObjects ['SCallbackThemes'] [$this->getPrimaryKey ()] )) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects ['SCallbackThemes'] [$this->getPrimaryKey ()] = true;
		$keys = SCallbackThemesPeer::getFieldNames ( $keyType );
		$result = array (
				$keys [0] => $this->getId (),
				$keys [1] => $this->getPosition () 
		);
		if ($includeForeignObjects) {
			if (null !== $this->collSCallbackss) {
				$result ['SCallbackss'] = $this->collSCallbackss->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
			}
			if (null !== $this->collSCallbackThemesI18ns) {
				$result ['SCallbackThemesI18ns'] = $this->collSCallbackThemesI18ns->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
			}
		}
		return $result;
	}
	
	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param string $name
	 *        	peer name
	 * @param mixed $value
	 *        	field value
	 * @param string $type
	 *        	The type of fieldname the $name is of:
	 *        	one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *        	BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME) {
		$pos = SCallbackThemesPeer::translateFieldName ( $name, $type, BasePeer::TYPE_NUM );
		return $this->setByPosition ( $pos, $value );
	}
	
	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param int $pos
	 *        	position in xml schema
	 * @param mixed $value
	 *        	field value
	 * @return void
	 */
	public function setByPosition($pos, $value) {
		switch ($pos) {
			case 0 :
				$this->setId ( $value );
				break;
			case 1 :
				$this->setPosition ( $value );
				break;
		} // switch()
	}
	
	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST). This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param array $arr
	 *        	An array to populate the object from.
	 * @param string $keyType
	 *        	The type of keys the array uses.
	 * @return void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME) {
		$keys = SCallbackThemesPeer::getFieldNames ( $keyType );
		
		if (array_key_exists ( $keys [0], $arr ))
			$this->setId ( $arr [$keys [0]] );
		if (array_key_exists ( $keys [1], $arr ))
			$this->setPosition ( $arr [$keys [1]] );
	}
	
	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria() {
		$criteria = new Criteria ( SCallbackThemesPeer::DATABASE_NAME );
		
		if ($this->isColumnModified ( SCallbackThemesPeer::ID ))
			$criteria->add ( SCallbackThemesPeer::ID, $this->id );
		if ($this->isColumnModified ( SCallbackThemesPeer::POSITION ))
			$criteria->add ( SCallbackThemesPeer::POSITION, $this->position );
		
		return $criteria;
	}
	
	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria() {
		$criteria = new Criteria ( SCallbackThemesPeer::DATABASE_NAME );
		$criteria->add ( SCallbackThemesPeer::ID, $this->id );
		
		return $criteria;
	}
	
	/**
	 * Returns the primary key for this object (row).
	 * 
	 * @return int
	 */
	public function getPrimaryKey() {
		return $this->getId ();
	}
	
	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param int $key
	 *        	Primary key.
	 * @return void
	 */
	public function setPrimaryKey($key) {
		$this->setId ( $key );
	}
	
	/**
	 * Returns true if the primary key for this object is null.
	 * 
	 * @return boolean
	 */
	public function isPrimaryKeyNull() {
		return null === $this->getId ();
	}
	
	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param object $copyObj
	 *        	An object of SCallbackThemes (or compatible) type.
	 * @param boolean $deepCopy
	 *        	Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param boolean $makeNew
	 *        	Whether to reset autoincrement PKs and make the object new.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true) {
		$copyObj->setPosition ( $this->getPosition () );
		
		if ($deepCopy && ! $this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew ( false );
			// store object hash to prevent cycle
			$this->startCopy = true;
			
			foreach ( $this->getSCallbackss () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSCallbacks ( $relObj->copy ( $deepCopy ) );
				}
			}
			
			foreach ( $this->getSCallbackThemesI18ns () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSCallbackThemesI18n ( $relObj->copy ( $deepCopy ) );
				}
			}
			
			// unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)
		
		if ($makeNew) {
			$copyObj->setNew ( true );
			$copyObj->setId ( NULL ); // this is a auto-increment column, so set to default value
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
	 * @param boolean $deepCopy
	 *        	Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return SCallbackThemes Clone of current object.
	 * @throws PropelException
	 */
	public function copy($deepCopy = false) {
		// we use get_class(), because this might be a subclass
		$clazz = get_class ( $this );
		$copyObj = new $clazz ();
		$this->copyInto ( $copyObj, $deepCopy );
		return $copyObj;
	}
	
	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return SCallbackThemesPeer
	 */
	public function getPeer() {
		if (self::$peer === null) {
			self::$peer = new SCallbackThemesPeer ();
		}
		return self::$peer;
	}
	
	/**
	 * Initializes a collection based on the name of a relation.
	 * Avoids crafting an 'init[$relationName]s' method name
	 * that wouldn't work when StandardEnglishPluralizer is used.
	 *
	 * @param string $relationName
	 *        	The name of the relation to initialize
	 * @return void
	 */
	public function initRelation($relationName) {
		if ('SCallbacks' == $relationName) {
			return $this->initSCallbackss ();
		}
		if ('SCallbackThemesI18n' == $relationName) {
			return $this->initSCallbackThemesI18ns ();
		}
	}
	
	/**
	 * Clears out the collSCallbackss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addSCallbackss()
	 */
	public function clearSCallbackss() {
		$this->collSCallbackss = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collSCallbackss collection.
	 *
	 * By default this just sets the collSCallbackss collection to an empty array (like clearcollSCallbackss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initSCallbackss($overrideExisting = true) {
		if (null !== $this->collSCallbackss && ! $overrideExisting) {
			return;
		}
		$this->collSCallbackss = new PropelObjectCollection ();
		$this->collSCallbackss->setModel ( 'SCallbacks' );
	}
	
	/**
	 * Gets an array of SCallbacks objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SCallbackThemes is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array SCallbacks[] List of SCallbacks objects
	 * @throws PropelException
	 */
	public function getSCallbackss($criteria = null, PropelPDO $con = null) {
		if (null === $this->collSCallbackss || null !== $criteria) {
			if ($this->isNew () && null === $this->collSCallbackss) {
				// return empty collection
				$this->initSCallbackss ();
			} else {
				$collSCallbackss = SCallbacksQuery::create ( null, $criteria )->filterBySCallbackThemes ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collSCallbackss;
				}
				$this->collSCallbackss = $collSCallbackss;
			}
		}
		return $this->collSCallbackss;
	}
	
	/**
	 * Sets a collection of SCallbacks objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $sCallbackss
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setSCallbackss(PropelCollection $sCallbackss, PropelPDO $con = null) {
		$this->sCallbackssScheduledForDeletion = $this->getSCallbackss ( new Criteria (), $con )->diff ( $sCallbackss );
		
		foreach ( $sCallbackss as $sCallbacks ) {
			// Fix issue with collection modified by reference
			if ($sCallbacks->isNew ()) {
				$sCallbacks->setSCallbackThemes ( $this );
			}
			$this->addSCallbacks ( $sCallbacks );
		}
		
		$this->collSCallbackss = $sCallbackss;
	}
	
	/**
	 * Returns the number of related SCallbacks objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related SCallbacks objects.
	 * @throws PropelException
	 */
	public function countSCallbackss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collSCallbackss || null !== $criteria) {
			if ($this->isNew () && null === $this->collSCallbackss) {
				return 0;
			} else {
				$query = SCallbacksQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterBySCallbackThemes ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collSCallbackss );
		}
	}
	
	/**
	 * Method called to associate a SCallbacks object to this object
	 * through the SCallbacks foreign key attribute.
	 *
	 * @param SCallbacks $l
	 *        	SCallbacks
	 * @return SCallbackThemes The current object (for fluent API support)
	 */
	public function addSCallbacks(SCallbacks $l) {
		if ($this->collSCallbackss === null) {
			$this->initSCallbackss ();
		}
		if (! $this->collSCallbackss->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddSCallbacks ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param SCallbacks $sCallbacks
	 *        	The sCallbacks object to add.
	 */
	protected function doAddSCallbacks($sCallbacks) {
		$this->collSCallbackss [] = $sCallbacks;
		$sCallbacks->setSCallbackThemes ( $this );
	}
	
	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SCallbackThemes is new, it will return
	 * an empty collection; or if this SCallbackThemes has previously
	 * been saved, it will retrieve related SCallbackss from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable. You can provide public methods for those you
	 * actually need in SCallbackThemes.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @param string $join_behavior
	 *        	optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return PropelCollection|array SCallbacks[] List of SCallbacks objects
	 */
	public function getSCallbackssJoinSCallbackStatuses($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$query = SCallbacksQuery::create ( null, $criteria );
		$query->joinWith ( 'SCallbackStatuses', $join_behavior );
		
		return $this->getSCallbackss ( $query, $con );
	}
	
	/**
	 * Clears out the collSCallbackThemesI18ns collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addSCallbackThemesI18ns()
	 */
	public function clearSCallbackThemesI18ns() {
		$this->collSCallbackThemesI18ns = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collSCallbackThemesI18ns collection.
	 *
	 * By default this just sets the collSCallbackThemesI18ns collection to an empty array (like clearcollSCallbackThemesI18ns());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initSCallbackThemesI18ns($overrideExisting = true) {
		if (null !== $this->collSCallbackThemesI18ns && ! $overrideExisting) {
			return;
		}
		$this->collSCallbackThemesI18ns = new PropelObjectCollection ();
		$this->collSCallbackThemesI18ns->setModel ( 'SCallbackThemesI18n' );
	}
	
	/**
	 * Gets an array of SCallbackThemesI18n objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SCallbackThemes is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array SCallbackThemesI18n[] List of SCallbackThemesI18n objects
	 * @throws PropelException
	 */
	public function getSCallbackThemesI18ns($criteria = null, PropelPDO $con = null) {
		if (null === $this->collSCallbackThemesI18ns || null !== $criteria) {
			if ($this->isNew () && null === $this->collSCallbackThemesI18ns) {
				// return empty collection
				$this->initSCallbackThemesI18ns ();
			} else {
				$collSCallbackThemesI18ns = SCallbackThemesI18nQuery::create ( null, $criteria )->filterBySCallbackThemes ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collSCallbackThemesI18ns;
				}
				$this->collSCallbackThemesI18ns = $collSCallbackThemesI18ns;
			}
		}
		return $this->collSCallbackThemesI18ns;
	}
	
	/**
	 * Sets a collection of SCallbackThemesI18n objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $sCallbackThemesI18ns
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setSCallbackThemesI18ns(PropelCollection $sCallbackThemesI18ns, PropelPDO $con = null) {
		$this->sCallbackThemesI18nsScheduledForDeletion = $this->getSCallbackThemesI18ns ( new Criteria (), $con )->diff ( $sCallbackThemesI18ns );
		
		foreach ( $sCallbackThemesI18ns as $sCallbackThemesI18n ) {
			// Fix issue with collection modified by reference
			if ($sCallbackThemesI18n->isNew ()) {
				$sCallbackThemesI18n->setSCallbackThemes ( $this );
			}
			$this->addSCallbackThemesI18n ( $sCallbackThemesI18n );
		}
		
		$this->collSCallbackThemesI18ns = $sCallbackThemesI18ns;
	}
	
	/**
	 * Returns the number of related SCallbackThemesI18n objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related SCallbackThemesI18n objects.
	 * @throws PropelException
	 */
	public function countSCallbackThemesI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collSCallbackThemesI18ns || null !== $criteria) {
			if ($this->isNew () && null === $this->collSCallbackThemesI18ns) {
				return 0;
			} else {
				$query = SCallbackThemesI18nQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterBySCallbackThemes ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collSCallbackThemesI18ns );
		}
	}
	
	/**
	 * Method called to associate a SCallbackThemesI18n object to this object
	 * through the SCallbackThemesI18n foreign key attribute.
	 *
	 * @param SCallbackThemesI18n $l
	 *        	SCallbackThemesI18n
	 * @return SCallbackThemes The current object (for fluent API support)
	 */
	public function addSCallbackThemesI18n(SCallbackThemesI18n $l) {
		if ($l && $locale = $l->getLocale ()) {
			$this->setLocale ( $locale );
			$this->currentTranslations [$locale] = $l;
		}
		if ($this->collSCallbackThemesI18ns === null) {
			$this->initSCallbackThemesI18ns ();
		}
		if (! $this->collSCallbackThemesI18ns->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddSCallbackThemesI18n ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param SCallbackThemesI18n $sCallbackThemesI18n
	 *        	The sCallbackThemesI18n object to add.
	 */
	protected function doAddSCallbackThemesI18n($sCallbackThemesI18n) {
		$this->collSCallbackThemesI18ns [] = $sCallbackThemesI18n;
		$sCallbackThemesI18n->setSCallbackThemes ( $this );
	}
	
	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear() {
		$this->id = null;
		$this->position = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences ();
		$this->resetModified ();
		$this->setNew ( true );
		$this->setDeleted ( false );
	}
	
	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param boolean $deep
	 *        	Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false) {
		if ($deep) {
			if ($this->collSCallbackss) {
				foreach ( $this->collSCallbackss as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->collSCallbackThemesI18ns) {
				foreach ( $this->collSCallbackThemesI18ns as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
		} // if ($deep)
		  
		// i18n behavior
		$this->currentLocale = 'ru';
		$this->currentTranslations = null;
		if ($this->collSCallbackss instanceof PropelCollection) {
			$this->collSCallbackss->clearIterator ();
		}
		$this->collSCallbackss = null;
		if ($this->collSCallbackThemesI18ns instanceof PropelCollection) {
			$this->collSCallbackThemesI18ns->clearIterator ();
		}
		$this->collSCallbackThemesI18ns = null;
	}
	
	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString() {
		return ( string ) $this->exportTo ( SCallbackThemesPeer::DEFAULT_STRING_FORMAT );
	}
	
	// i18n behavior
	
	/**
	 * Sets the locale for translations
	 *
	 * @param string $locale
	 *        	Locale to use for the translation, e.g. 'fr_FR'
	 *        	
	 * @return SCallbackThemes The current object (for fluent API support)
	 */
	public function setLocale($locale = 'ru') {
		$this->currentLocale = $locale;
		
		return $this;
	}
	
	/**
	 * Gets the locale for translations
	 *
	 * @return string $locale Locale to use for the translation, e.g. 'fr_FR'
	 */
	public function getLocale() {
		return $this->currentLocale;
	}
	
	/**
	 * Returns the current translation for a given locale
	 *
	 * @param string $locale
	 *        	Locale to use for the translation, e.g. 'fr_FR'
	 * @param PropelPDO $con
	 *        	an optional connection object
	 *        	
	 * @return SCallbackThemesI18n
	 */
	public function getTranslation($locale = 'ru', PropelPDO $con = null) {
		if (! isset ( $this->currentTranslations [$locale] )) {
			if (null !== $this->collSCallbackThemesI18ns) {
				foreach ( $this->collSCallbackThemesI18ns as $translation ) {
					if ($translation->getLocale () == $locale) {
						$this->currentTranslations [$locale] = $translation;
						return $translation;
					}
				}
			}
			if ($this->isNew ()) {
				$translation = new SCallbackThemesI18n ();
				$translation->setLocale ( $locale );
			} else {
				$translation = SCallbackThemesI18nQuery::create ()->filterByPrimaryKey ( array (
						$this->getPrimaryKey (),
						$locale 
				) )->findOneOrCreate ( $con );
				$this->currentTranslations [$locale] = $translation;
			}
			$this->addSCallbackThemesI18n ( $translation );
		}
		
		return $this->currentTranslations [$locale];
	}
	
	/**
	 * Remove the translation for a given locale
	 *
	 * @param string $locale
	 *        	Locale to use for the translation, e.g. 'fr_FR'
	 * @param PropelPDO $con
	 *        	an optional connection object
	 *        	
	 * @return SCallbackThemes The current object (for fluent API support)
	 */
	public function removeTranslation($locale = 'ru', PropelPDO $con = null) {
		if (! $this->isNew ()) {
			SCallbackThemesI18nQuery::create ()->filterByPrimaryKey ( array (
					$this->getPrimaryKey (),
					$locale 
			) )->delete ( $con );
		}
		if (isset ( $this->currentTranslations [$locale] )) {
			unset ( $this->currentTranslations [$locale] );
		}
		foreach ( $this->collSCallbackThemesI18ns as $key => $translation ) {
			if ($translation->getLocale () == $locale) {
				unset ( $this->collSCallbackThemesI18ns [$key] );
				break;
			}
		}
		
		return $this;
	}
	
	/**
	 * Returns the current translation
	 *
	 * @param PropelPDO $con
	 *        	an optional connection object
	 *        	
	 * @return SCallbackThemesI18n
	 */
	public function getCurrentTranslation(PropelPDO $con = null) {
		return $this->getTranslation ( $this->getLocale (), $con );
	}
	
	/**
	 * Get the [text] column value.
	 *
	 * @return string
	 */
	public function getText() {
		return $this->getCurrentTranslation ()->getText ();
	}
	
	/**
	 * Set the value of [text] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SCallbackThemes The current object (for fluent API support)
	 */
	public function setText($v) {
		$this->getCurrentTranslation ()->setText ( $v );
		
		return $this;
	}
} // BaseSCallbackThemes
