<?php

/**
 * Base class that represents a row from the 'custom_fields' table.
 *
 * 
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseCustomFields extends ShopBaseObject implements Persistent {
	
	/**
	 * Peer class name
	 */
	const PEER = 'CustomFieldsPeer';
	
	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * 
	 * @var CustomFieldsPeer
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
	 * The value for the entity field.
	 * 
	 * @var string
	 */
	protected $entity;
	
	/**
	 * The value for the field_type_id field.
	 * 
	 * @var int
	 */
	protected $field_type_id;
	
	/**
	 * The value for the field_name field.
	 * 
	 * @var string
	 */
	protected $field_name;
	
	/**
	 * The value for the is_required field.
	 * Note: this column has a database default value of: true
	 * 
	 * @var boolean
	 */
	protected $is_required;
	
	/**
	 * The value for the is_active field.
	 * Note: this column has a database default value of: true
	 * 
	 * @var boolean
	 */
	protected $is_active;
	
	/**
	 * The value for the options field.
	 * 
	 * @var string
	 */
	protected $options;
	
	/**
	 * The value for the is_private field.
	 * Note: this column has a database default value of: false
	 * 
	 * @var boolean
	 */
	protected $is_private;
	
	/**
	 * The value for the validators field.
	 * 
	 * @var string
	 */
	protected $validators;
	
	/**
	 * The value for the classes field.
	 * 
	 * @var string
	 */
	protected $classes;
	
	/**
	 * The value for the position field.
	 * 
	 * @var int
	 */
	protected $position;
	
	/**
	 *
	 * @var array CustomFieldsI18n[] Collection to store aggregation of CustomFieldsI18n objects.
	 */
	protected $collCustomFieldsI18ns;
	
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
	 * @var array[CustomFieldsI18n]
	 */
	protected $currentTranslations;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $customFieldsI18nsScheduledForDeletion = null;
	
	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * 
	 * @see __construct()
	 */
	public function applyDefaultValues() {
		$this->is_required = true;
		$this->is_active = true;
		$this->is_private = false;
	}
	
	/**
	 * Initializes internal state of BaseCustomFields object.
	 * 
	 * @see applyDefaults()
	 */
	public function __construct() {
		parent::__construct ();
		$this->applyDefaultValues ();
	}
	
	/**
	 * Get the [id] column value.
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Get the [entity] column value.
	 *
	 * @return string
	 */
	public function getEntity() {
		return $this->entity;
	}
	
	/**
	 * Get the [field_type_id] column value.
	 *
	 * @return int
	 */
	public function gettypeId() {
		return $this->field_type_id;
	}
	
	/**
	 * Get the [field_name] column value.
	 *
	 * @return string
	 */
	public function getname() {
		return $this->field_name;
	}
	
	/**
	 * Get the [is_required] column value.
	 *
	 * @return boolean
	 */
	public function getIsRequired() {
		return $this->is_required;
	}
	
	/**
	 * Get the [is_active] column value.
	 *
	 * @return boolean
	 */
	public function getIsActive() {
		return $this->is_active;
	}
	
	/**
	 * Get the [options] column value.
	 *
	 * @return string
	 */
	public function getOptions() {
		return $this->options;
	}
	
	/**
	 * Get the [is_private] column value.
	 *
	 * @return boolean
	 */
	public function getIsPrivate() {
		return $this->is_private;
	}
	
	/**
	 * Get the [validators] column value.
	 *
	 * @return string
	 */
	public function getValidators() {
		return $this->validators;
	}
	
	/**
	 * Get the [classes] column value.
	 *
	 * @return string
	 */
	public function getclasses() {
		return $this->classes;
	}
	
	/**
	 * Get the [position] column value.
	 *
	 * @return int
	 */
	public function getposition() {
		return $this->position;
	}
	
	/**
	 * Set the value of [id] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return CustomFields The current object (for fluent API support)
	 */
	public function setId($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns [] = CustomFieldsPeer::ID;
		}
		
		return $this;
	} // setId()
	
	/**
	 * Set the value of [entity] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return CustomFields The current object (for fluent API support)
	 */
	public function setEntity($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->entity !== $v) {
			$this->entity = $v;
			$this->modifiedColumns [] = CustomFieldsPeer::ENTITY;
		}
		
		return $this;
	} // setEntity()
	
	/**
	 * Set the value of [field_type_id] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return CustomFields The current object (for fluent API support)
	 */
	public function settypeId($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->field_type_id !== $v) {
			$this->field_type_id = $v;
			$this->modifiedColumns [] = CustomFieldsPeer::FIELD_TYPE_ID;
		}
		
		return $this;
	} // settypeId()
	
	/**
	 * Set the value of [field_name] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return CustomFields The current object (for fluent API support)
	 */
	public function setname($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->field_name !== $v) {
			$this->field_name = $v;
			$this->modifiedColumns [] = CustomFieldsPeer::FIELD_NAME;
		}
		
		return $this;
	} // setname()
	
	/**
	 * Sets the value of the [is_required] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return CustomFields The current object (for fluent API support)
	 */
	public function setIsRequired($v) {
		if ($v !== null) {
			if (is_string ( $v )) {
				$v = in_array ( strtolower ( $v ), array (
						'false',
						'off',
						'-',
						'no',
						'n',
						'0',
						'' 
				) ) ? false : true;
			} else {
				$v = ( boolean ) $v;
			}
		}
		
		if ($this->is_required !== $v) {
			$this->is_required = $v;
			$this->modifiedColumns [] = CustomFieldsPeer::IS_REQUIRED;
		}
		
		return $this;
	} // setIsRequired()
	
	/**
	 * Sets the value of the [is_active] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return CustomFields The current object (for fluent API support)
	 */
	public function setIsActive($v) {
		if ($v !== null) {
			if (is_string ( $v )) {
				$v = in_array ( strtolower ( $v ), array (
						'false',
						'off',
						'-',
						'no',
						'n',
						'0',
						'' 
				) ) ? false : true;
			} else {
				$v = ( boolean ) $v;
			}
		}
		
		if ($this->is_active !== $v) {
			$this->is_active = $v;
			$this->modifiedColumns [] = CustomFieldsPeer::IS_ACTIVE;
		}
		
		return $this;
	} // setIsActive()
	
	/**
	 * Set the value of [options] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return CustomFields The current object (for fluent API support)
	 */
	public function setOptions($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->options !== $v) {
			$this->options = $v;
			$this->modifiedColumns [] = CustomFieldsPeer::OPTIONS;
		}
		
		return $this;
	} // setOptions()
	
	/**
	 * Sets the value of the [is_private] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return CustomFields The current object (for fluent API support)
	 */
	public function setIsPrivate($v) {
		if ($v !== null) {
			if (is_string ( $v )) {
				$v = in_array ( strtolower ( $v ), array (
						'false',
						'off',
						'-',
						'no',
						'n',
						'0',
						'' 
				) ) ? false : true;
			} else {
				$v = ( boolean ) $v;
			}
		}
		
		if ($this->is_private !== $v) {
			$this->is_private = $v;
			$this->modifiedColumns [] = CustomFieldsPeer::IS_PRIVATE;
		}
		
		return $this;
	} // setIsPrivate()
	
	/**
	 * Set the value of [validators] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return CustomFields The current object (for fluent API support)
	 */
	public function setValidators($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->validators !== $v) {
			$this->validators = $v;
			$this->modifiedColumns [] = CustomFieldsPeer::VALIDATORS;
		}
		
		return $this;
	} // setValidators()
	
	/**
	 * Set the value of [classes] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return CustomFields The current object (for fluent API support)
	 */
	public function setclasses($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->classes !== $v) {
			$this->classes = $v;
			$this->modifiedColumns [] = CustomFieldsPeer::CLASSES;
		}
		
		return $this;
	} // setclasses()
	
	/**
	 * Set the value of [position] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return CustomFields The current object (for fluent API support)
	 */
	public function setposition($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->position !== $v) {
			$this->position = $v;
			$this->modifiedColumns [] = CustomFieldsPeer::POSITION;
		}
		
		return $this;
	} // setposition()
	
	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues() {
		if ($this->is_required !== true) {
			return false;
		}
		
		if ($this->is_active !== true) {
			return false;
		}
		
		if ($this->is_private !== false) {
			return false;
		}
		
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
			$this->entity = ($row [$startcol + 1] !== null) ? ( string ) $row [$startcol + 1] : null;
			$this->field_type_id = ($row [$startcol + 2] !== null) ? ( int ) $row [$startcol + 2] : null;
			$this->field_name = ($row [$startcol + 3] !== null) ? ( string ) $row [$startcol + 3] : null;
			$this->is_required = ($row [$startcol + 4] !== null) ? ( boolean ) $row [$startcol + 4] : null;
			$this->is_active = ($row [$startcol + 5] !== null) ? ( boolean ) $row [$startcol + 5] : null;
			$this->options = ($row [$startcol + 6] !== null) ? ( string ) $row [$startcol + 6] : null;
			$this->is_private = ($row [$startcol + 7] !== null) ? ( boolean ) $row [$startcol + 7] : null;
			$this->validators = ($row [$startcol + 8] !== null) ? ( string ) $row [$startcol + 8] : null;
			$this->classes = ($row [$startcol + 9] !== null) ? ( string ) $row [$startcol + 9] : null;
			$this->position = ($row [$startcol + 10] !== null) ? ( int ) $row [$startcol + 10] : null;
			$this->resetModified ();
			
			$this->setNew ( false );
			
			if ($rehydrate) {
				$this->ensureConsistency ();
			}
			
			return $startcol + 11; // 11 = CustomFieldsPeer::NUM_HYDRATE_COLUMNS.
		} catch ( Exception $e ) {
			throw new PropelException ( "Error populating CustomFields object", $e );
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
			$con = Propel::getConnection ( CustomFieldsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.
		
		$stmt = CustomFieldsPeer::doSelectStmt ( $this->buildPkeyCriteria (), $con );
		$row = $stmt->fetch ( PDO::FETCH_NUM );
		$stmt->closeCursor ();
		if (! $row) {
			throw new PropelException ( 'Cannot find matching row in the database to reload object values.' );
		}
		$this->hydrate ( $row, 0, true ); // rehydrate
		
		if ($deep) { // also de-associate any related objects?
			
			$this->collCustomFieldsI18ns = null;
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
			$con = Propel::getConnection ( CustomFieldsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		$con->beginTransaction ();
		try {
			$deleteQuery = CustomFieldsQuery::create ()->filterByPrimaryKey ( $this->getPrimaryKey () );
			$ret = $this->preDelete ( $con );
			if ($ret) {
				$deleteQuery->delete ( $con );
				$this->postDelete ( $con );
				// i18n behavior
				
				// emulate delete cascade
				CustomFieldsI18nQuery::create ()->filterByCustomFields ( $this )->delete ( $con );
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
			$con = Propel::getConnection ( CustomFieldsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
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
				CustomFieldsPeer::addInstanceToPool ( $this );
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
			
			if ($this->customFieldsI18nsScheduledForDeletion !== null) {
				if (! $this->customFieldsI18nsScheduledForDeletion->isEmpty ()) {
					CustomFieldsI18nQuery::create ()->filterByPrimaryKeys ( $this->customFieldsI18nsScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->customFieldsI18nsScheduledForDeletion = null;
				}
			}
			
			if ($this->collCustomFieldsI18ns !== null) {
				foreach ( $this->collCustomFieldsI18ns as $referrerFK ) {
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
		
		$this->modifiedColumns [] = CustomFieldsPeer::ID;
		if (null !== $this->id) {
			throw new PropelException ( 'Cannot insert a value for auto-increment primary key (' . CustomFieldsPeer::ID . ')' );
		}
		
		// check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified ( CustomFieldsPeer::ID )) {
			$modifiedColumns [':p' . $index ++] = '`ID`';
		}
		if ($this->isColumnModified ( CustomFieldsPeer::ENTITY )) {
			$modifiedColumns [':p' . $index ++] = '`ENTITY`';
		}
		if ($this->isColumnModified ( CustomFieldsPeer::FIELD_TYPE_ID )) {
			$modifiedColumns [':p' . $index ++] = '`FIELD_TYPE_ID`';
		}
		if ($this->isColumnModified ( CustomFieldsPeer::FIELD_NAME )) {
			$modifiedColumns [':p' . $index ++] = '`FIELD_NAME`';
		}
		if ($this->isColumnModified ( CustomFieldsPeer::IS_REQUIRED )) {
			$modifiedColumns [':p' . $index ++] = '`IS_REQUIRED`';
		}
		if ($this->isColumnModified ( CustomFieldsPeer::IS_ACTIVE )) {
			$modifiedColumns [':p' . $index ++] = '`IS_ACTIVE`';
		}
		if ($this->isColumnModified ( CustomFieldsPeer::OPTIONS )) {
			$modifiedColumns [':p' . $index ++] = '`OPTIONS`';
		}
		if ($this->isColumnModified ( CustomFieldsPeer::IS_PRIVATE )) {
			$modifiedColumns [':p' . $index ++] = '`IS_PRIVATE`';
		}
		if ($this->isColumnModified ( CustomFieldsPeer::VALIDATORS )) {
			$modifiedColumns [':p' . $index ++] = '`VALIDATORS`';
		}
		if ($this->isColumnModified ( CustomFieldsPeer::CLASSES )) {
			$modifiedColumns [':p' . $index ++] = '`CLASSES`';
		}
		if ($this->isColumnModified ( CustomFieldsPeer::POSITION )) {
			$modifiedColumns [':p' . $index ++] = '`POSITION`';
		}
		
		$sql = sprintf ( 'INSERT INTO `custom_fields` (%s) VALUES (%s)', implode ( ', ', $modifiedColumns ), implode ( ', ', array_keys ( $modifiedColumns ) ) );
		
		try {
			$stmt = $con->prepare ( $sql );
			foreach ( $modifiedColumns as $identifier => $columnName ) {
				switch ($columnName) {
					case '`ID`' :
						$stmt->bindValue ( $identifier, $this->id, PDO::PARAM_INT );
						break;
					case '`ENTITY`' :
						$stmt->bindValue ( $identifier, $this->entity, PDO::PARAM_STR );
						break;
					case '`FIELD_TYPE_ID`' :
						$stmt->bindValue ( $identifier, $this->field_type_id, PDO::PARAM_INT );
						break;
					case '`FIELD_NAME`' :
						$stmt->bindValue ( $identifier, $this->field_name, PDO::PARAM_STR );
						break;
					case '`IS_REQUIRED`' :
						$stmt->bindValue ( $identifier, ( int ) $this->is_required, PDO::PARAM_INT );
						break;
					case '`IS_ACTIVE`' :
						$stmt->bindValue ( $identifier, ( int ) $this->is_active, PDO::PARAM_INT );
						break;
					case '`OPTIONS`' :
						$stmt->bindValue ( $identifier, $this->options, PDO::PARAM_STR );
						break;
					case '`IS_PRIVATE`' :
						$stmt->bindValue ( $identifier, ( int ) $this->is_private, PDO::PARAM_INT );
						break;
					case '`VALIDATORS`' :
						$stmt->bindValue ( $identifier, $this->validators, PDO::PARAM_STR );
						break;
					case '`CLASSES`' :
						$stmt->bindValue ( $identifier, $this->classes, PDO::PARAM_STR );
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
			
			if (($retval = CustomFieldsPeer::doValidate ( $this, $columns )) !== true) {
				$failureMap = array_merge ( $failureMap, $retval );
			}
			
			if ($this->collCustomFieldsI18ns !== null) {
				foreach ( $this->collCustomFieldsI18ns as $referrerFK ) {
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
		$pos = CustomFieldsPeer::translateFieldName ( $name, $type, BasePeer::TYPE_NUM );
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
				return $this->getEntity ();
				break;
			case 2 :
				return $this->gettypeId ();
				break;
			case 3 :
				return $this->getname ();
				break;
			case 4 :
				return $this->getIsRequired ();
				break;
			case 5 :
				return $this->getIsActive ();
				break;
			case 6 :
				return $this->getOptions ();
				break;
			case 7 :
				return $this->getIsPrivate ();
				break;
			case 8 :
				return $this->getValidators ();
				break;
			case 9 :
				return $this->getclasses ();
				break;
			case 10 :
				return $this->getposition ();
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
		if (isset ( $alreadyDumpedObjects ['CustomFields'] [$this->getPrimaryKey ()] )) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects ['CustomFields'] [$this->getPrimaryKey ()] = true;
		$keys = CustomFieldsPeer::getFieldNames ( $keyType );
		$result = array (
				$keys [0] => $this->getId (),
				$keys [1] => $this->getEntity (),
				$keys [2] => $this->gettypeId (),
				$keys [3] => $this->getname (),
				$keys [4] => $this->getIsRequired (),
				$keys [5] => $this->getIsActive (),
				$keys [6] => $this->getOptions (),
				$keys [7] => $this->getIsPrivate (),
				$keys [8] => $this->getValidators (),
				$keys [9] => $this->getclasses (),
				$keys [10] => $this->getposition () 
		);
		if ($includeForeignObjects) {
			if (null !== $this->collCustomFieldsI18ns) {
				$result ['CustomFieldsI18ns'] = $this->collCustomFieldsI18ns->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
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
		$pos = CustomFieldsPeer::translateFieldName ( $name, $type, BasePeer::TYPE_NUM );
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
				$this->setEntity ( $value );
				break;
			case 2 :
				$this->settypeId ( $value );
				break;
			case 3 :
				$this->setname ( $value );
				break;
			case 4 :
				$this->setIsRequired ( $value );
				break;
			case 5 :
				$this->setIsActive ( $value );
				break;
			case 6 :
				$this->setOptions ( $value );
				break;
			case 7 :
				$this->setIsPrivate ( $value );
				break;
			case 8 :
				$this->setValidators ( $value );
				break;
			case 9 :
				$this->setclasses ( $value );
				break;
			case 10 :
				$this->setposition ( $value );
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
		$keys = CustomFieldsPeer::getFieldNames ( $keyType );
		
		if (array_key_exists ( $keys [0], $arr ))
			$this->setId ( $arr [$keys [0]] );
		if (array_key_exists ( $keys [1], $arr ))
			$this->setEntity ( $arr [$keys [1]] );
		if (array_key_exists ( $keys [2], $arr ))
			$this->settypeId ( $arr [$keys [2]] );
		if (array_key_exists ( $keys [3], $arr ))
			$this->setname ( $arr [$keys [3]] );
		if (array_key_exists ( $keys [4], $arr ))
			$this->setIsRequired ( $arr [$keys [4]] );
		if (array_key_exists ( $keys [5], $arr ))
			$this->setIsActive ( $arr [$keys [5]] );
		if (array_key_exists ( $keys [6], $arr ))
			$this->setOptions ( $arr [$keys [6]] );
		if (array_key_exists ( $keys [7], $arr ))
			$this->setIsPrivate ( $arr [$keys [7]] );
		if (array_key_exists ( $keys [8], $arr ))
			$this->setValidators ( $arr [$keys [8]] );
		if (array_key_exists ( $keys [9], $arr ))
			$this->setclasses ( $arr [$keys [9]] );
		if (array_key_exists ( $keys [10], $arr ))
			$this->setposition ( $arr [$keys [10]] );
	}
	
	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria() {
		$criteria = new Criteria ( CustomFieldsPeer::DATABASE_NAME );
		
		if ($this->isColumnModified ( CustomFieldsPeer::ID ))
			$criteria->add ( CustomFieldsPeer::ID, $this->id );
		if ($this->isColumnModified ( CustomFieldsPeer::ENTITY ))
			$criteria->add ( CustomFieldsPeer::ENTITY, $this->entity );
		if ($this->isColumnModified ( CustomFieldsPeer::FIELD_TYPE_ID ))
			$criteria->add ( CustomFieldsPeer::FIELD_TYPE_ID, $this->field_type_id );
		if ($this->isColumnModified ( CustomFieldsPeer::FIELD_NAME ))
			$criteria->add ( CustomFieldsPeer::FIELD_NAME, $this->field_name );
		if ($this->isColumnModified ( CustomFieldsPeer::IS_REQUIRED ))
			$criteria->add ( CustomFieldsPeer::IS_REQUIRED, $this->is_required );
		if ($this->isColumnModified ( CustomFieldsPeer::IS_ACTIVE ))
			$criteria->add ( CustomFieldsPeer::IS_ACTIVE, $this->is_active );
		if ($this->isColumnModified ( CustomFieldsPeer::OPTIONS ))
			$criteria->add ( CustomFieldsPeer::OPTIONS, $this->options );
		if ($this->isColumnModified ( CustomFieldsPeer::IS_PRIVATE ))
			$criteria->add ( CustomFieldsPeer::IS_PRIVATE, $this->is_private );
		if ($this->isColumnModified ( CustomFieldsPeer::VALIDATORS ))
			$criteria->add ( CustomFieldsPeer::VALIDATORS, $this->validators );
		if ($this->isColumnModified ( CustomFieldsPeer::CLASSES ))
			$criteria->add ( CustomFieldsPeer::CLASSES, $this->classes );
		if ($this->isColumnModified ( CustomFieldsPeer::POSITION ))
			$criteria->add ( CustomFieldsPeer::POSITION, $this->position );
		
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
		$criteria = new Criteria ( CustomFieldsPeer::DATABASE_NAME );
		$criteria->add ( CustomFieldsPeer::ID, $this->id );
		
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
	 *        	An object of CustomFields (or compatible) type.
	 * @param boolean $deepCopy
	 *        	Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param boolean $makeNew
	 *        	Whether to reset autoincrement PKs and make the object new.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true) {
		$copyObj->setEntity ( $this->getEntity () );
		$copyObj->settypeId ( $this->gettypeId () );
		$copyObj->setname ( $this->getname () );
		$copyObj->setIsRequired ( $this->getIsRequired () );
		$copyObj->setIsActive ( $this->getIsActive () );
		$copyObj->setOptions ( $this->getOptions () );
		$copyObj->setIsPrivate ( $this->getIsPrivate () );
		$copyObj->setValidators ( $this->getValidators () );
		$copyObj->setclasses ( $this->getclasses () );
		$copyObj->setposition ( $this->getposition () );
		
		if ($deepCopy && ! $this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew ( false );
			// store object hash to prevent cycle
			$this->startCopy = true;
			
			foreach ( $this->getCustomFieldsI18ns () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCustomFieldsI18n ( $relObj->copy ( $deepCopy ) );
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
	 * @return CustomFields Clone of current object.
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
	 * @return CustomFieldsPeer
	 */
	public function getPeer() {
		if (self::$peer === null) {
			self::$peer = new CustomFieldsPeer ();
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
		if ('CustomFieldsI18n' == $relationName) {
			return $this->initCustomFieldsI18ns ();
		}
	}
	
	/**
	 * Clears out the collCustomFieldsI18ns collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addCustomFieldsI18ns()
	 */
	public function clearCustomFieldsI18ns() {
		$this->collCustomFieldsI18ns = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collCustomFieldsI18ns collection.
	 *
	 * By default this just sets the collCustomFieldsI18ns collection to an empty array (like clearcollCustomFieldsI18ns());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initCustomFieldsI18ns($overrideExisting = true) {
		if (null !== $this->collCustomFieldsI18ns && ! $overrideExisting) {
			return;
		}
		$this->collCustomFieldsI18ns = new PropelObjectCollection ();
		$this->collCustomFieldsI18ns->setModel ( 'CustomFieldsI18n' );
	}
	
	/**
	 * Gets an array of CustomFieldsI18n objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this CustomFields is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array CustomFieldsI18n[] List of CustomFieldsI18n objects
	 * @throws PropelException
	 */
	public function getCustomFieldsI18ns($criteria = null, PropelPDO $con = null) {
		if (null === $this->collCustomFieldsI18ns || null !== $criteria) {
			if ($this->isNew () && null === $this->collCustomFieldsI18ns) {
				// return empty collection
				$this->initCustomFieldsI18ns ();
			} else {
				$collCustomFieldsI18ns = CustomFieldsI18nQuery::create ( null, $criteria )->filterByCustomFields ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collCustomFieldsI18ns;
				}
				$this->collCustomFieldsI18ns = $collCustomFieldsI18ns;
			}
		}
		return $this->collCustomFieldsI18ns;
	}
	
	/**
	 * Sets a collection of CustomFieldsI18n objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $customFieldsI18ns
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setCustomFieldsI18ns(PropelCollection $customFieldsI18ns, PropelPDO $con = null) {
		$this->customFieldsI18nsScheduledForDeletion = $this->getCustomFieldsI18ns ( new Criteria (), $con )->diff ( $customFieldsI18ns );
		
		foreach ( $customFieldsI18ns as $customFieldsI18n ) {
			// Fix issue with collection modified by reference
			if ($customFieldsI18n->isNew ()) {
				$customFieldsI18n->setCustomFields ( $this );
			}
			$this->addCustomFieldsI18n ( $customFieldsI18n );
		}
		
		$this->collCustomFieldsI18ns = $customFieldsI18ns;
	}
	
	/**
	 * Returns the number of related CustomFieldsI18n objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related CustomFieldsI18n objects.
	 * @throws PropelException
	 */
	public function countCustomFieldsI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collCustomFieldsI18ns || null !== $criteria) {
			if ($this->isNew () && null === $this->collCustomFieldsI18ns) {
				return 0;
			} else {
				$query = CustomFieldsI18nQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterByCustomFields ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collCustomFieldsI18ns );
		}
	}
	
	/**
	 * Method called to associate a CustomFieldsI18n object to this object
	 * through the CustomFieldsI18n foreign key attribute.
	 *
	 * @param CustomFieldsI18n $l
	 *        	CustomFieldsI18n
	 * @return CustomFields The current object (for fluent API support)
	 */
	public function addCustomFieldsI18n(CustomFieldsI18n $l) {
		if ($l && $locale = $l->getLocale ()) {
			$this->setLocale ( $locale );
			$this->currentTranslations [$locale] = $l;
		}
		if ($this->collCustomFieldsI18ns === null) {
			$this->initCustomFieldsI18ns ();
		}
		if (! $this->collCustomFieldsI18ns->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddCustomFieldsI18n ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param CustomFieldsI18n $customFieldsI18n
	 *        	The customFieldsI18n object to add.
	 */
	protected function doAddCustomFieldsI18n($customFieldsI18n) {
		$this->collCustomFieldsI18ns [] = $customFieldsI18n;
		$customFieldsI18n->setCustomFields ( $this );
	}
	
	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear() {
		$this->id = null;
		$this->entity = null;
		$this->field_type_id = null;
		$this->field_name = null;
		$this->is_required = null;
		$this->is_active = null;
		$this->options = null;
		$this->is_private = null;
		$this->validators = null;
		$this->classes = null;
		$this->position = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences ();
		$this->applyDefaultValues ();
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
			if ($this->collCustomFieldsI18ns) {
				foreach ( $this->collCustomFieldsI18ns as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
		} // if ($deep)
		  
		// i18n behavior
		$this->currentLocale = 'ru';
		$this->currentTranslations = null;
		if ($this->collCustomFieldsI18ns instanceof PropelCollection) {
			$this->collCustomFieldsI18ns->clearIterator ();
		}
		$this->collCustomFieldsI18ns = null;
	}
	
	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString() {
		return ( string ) $this->exportTo ( CustomFieldsPeer::DEFAULT_STRING_FORMAT );
	}
	
	// i18n behavior
	
	/**
	 * Sets the locale for translations
	 *
	 * @param string $locale
	 *        	Locale to use for the translation, e.g. 'fr_FR'
	 *        	
	 * @return CustomFields The current object (for fluent API support)
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
	 * @return CustomFieldsI18n
	 */
	public function getTranslation($locale = 'ru', PropelPDO $con = null) {
		if (! isset ( $this->currentTranslations [$locale] )) {
			if (null !== $this->collCustomFieldsI18ns) {
				foreach ( $this->collCustomFieldsI18ns as $translation ) {
					if ($translation->getLocale () == $locale) {
						$this->currentTranslations [$locale] = $translation;
						return $translation;
					}
				}
			}
			if ($this->isNew ()) {
				$translation = new CustomFieldsI18n ();
				$translation->setLocale ( $locale );
			} else {
				$translation = CustomFieldsI18nQuery::create ()->filterByPrimaryKey ( array (
						$this->getPrimaryKey (),
						$locale 
				) )->findOneOrCreate ( $con );
				$this->currentTranslations [$locale] = $translation;
			}
			$this->addCustomFieldsI18n ( $translation );
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
	 * @return CustomFields The current object (for fluent API support)
	 */
	public function removeTranslation($locale = 'ru', PropelPDO $con = null) {
		if (! $this->isNew ()) {
			CustomFieldsI18nQuery::create ()->filterByPrimaryKey ( array (
					$this->getPrimaryKey (),
					$locale 
			) )->delete ( $con );
		}
		if (isset ( $this->currentTranslations [$locale] )) {
			unset ( $this->currentTranslations [$locale] );
		}
		foreach ( $this->collCustomFieldsI18ns as $key => $translation ) {
			if ($translation->getLocale () == $locale) {
				unset ( $this->collCustomFieldsI18ns [$key] );
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
	 * @return CustomFieldsI18n
	 */
	public function getCurrentTranslation(PropelPDO $con = null) {
		return $this->getTranslation ( $this->getLocale (), $con );
	}
	
	/**
	 * Get the [field_label] column value.
	 *
	 * @return string
	 */
	public function getFieldLabel() {
		return $this->getCurrentTranslation ()->getFieldLabel ();
	}
	
	/**
	 * Set the value of [field_label] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return CustomFields The current object (for fluent API support)
	 */
	public function setFieldLabel($v) {
		$this->getCurrentTranslation ()->setFieldLabel ( $v );
		
		return $this;
	}
	
	/**
	 * Get the [field_description] column value.
	 *
	 * @return string
	 */
	public function getFieldDescription() {
		return $this->getCurrentTranslation ()->getFieldDescription ();
	}
	
	/**
	 * Set the value of [field_description] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return CustomFields The current object (for fluent API support)
	 */
	public function setFieldDescription($v) {
		$this->getCurrentTranslation ()->setFieldDescription ( $v );
		
		return $this;
	}
	
	/**
	 * Get the [possible_values] column value.
	 *
	 * @return string
	 */
	public function getPossibleValues() {
		return $this->getCurrentTranslation ()->getPossibleValues ();
	}
	
	/**
	 * Set the value of [possible_values] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return CustomFields The current object (for fluent API support)
	 */
	public function setPossibleValues($v) {
		$this->getCurrentTranslation ()->setPossibleValues ( $v );
		
		return $this;
	}
} // BaseCustomFields
