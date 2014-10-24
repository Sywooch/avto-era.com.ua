<?php

/**
 * Base class that represents a row from the 'shop_notifications' table.
 *
 * 
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSNotifications extends ShopBaseObject implements Persistent {
	
	/**
	 * Peer class name
	 */
	const PEER = 'SNotificationsPeer';
	
	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * 
	 * @var SNotificationsPeer
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
	 * The value for the product_id field.
	 * 
	 * @var int
	 */
	protected $product_id;
	
	/**
	 * The value for the variant_id field.
	 * 
	 * @var int
	 */
	protected $variant_id;
	
	/**
	 * The value for the user_name field.
	 * 
	 * @var string
	 */
	protected $user_name;
	
	/**
	 * The value for the user_email field.
	 * 
	 * @var string
	 */
	protected $user_email;
	
	/**
	 * The value for the user_phone field.
	 * 
	 * @var string
	 */
	protected $user_phone;
	
	/**
	 * The value for the user_comment field.
	 * 
	 * @var string
	 */
	protected $user_comment;
	
	/**
	 * The value for the status field.
	 * 
	 * @var int
	 */
	protected $status;
	
	/**
	 * The value for the date_created field.
	 * 
	 * @var int
	 */
	protected $date_created;
	
	/**
	 * The value for the active_to field.
	 * 
	 * @var int
	 */
	protected $active_to;
	
	/**
	 * The value for the manager_id field.
	 * 
	 * @var int
	 */
	protected $manager_id;
	
	/**
	 * The value for the notified_by_email field.
	 * 
	 * @var boolean
	 */
	protected $notified_by_email;
	
	/**
	 *
	 * @var SProducts
	 */
	protected $aSProducts;
	
	/**
	 *
	 * @var SProductVariants
	 */
	protected $aSProductVariants;
	
	/**
	 *
	 * @var SNotificationStatuses
	 */
	protected $aSNotificationStatuses;
	
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
	
	/**
	 * Get the [id] column value.
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Get the [product_id] column value.
	 *
	 * @return int
	 */
	public function getProductId() {
		return $this->product_id;
	}
	
	/**
	 * Get the [variant_id] column value.
	 *
	 * @return int
	 */
	public function getVariantId() {
		return $this->variant_id;
	}
	
	/**
	 * Get the [user_name] column value.
	 *
	 * @return string
	 */
	public function getUserName() {
		return $this->user_name;
	}
	
	/**
	 * Get the [user_email] column value.
	 *
	 * @return string
	 */
	public function getUserEmail() {
		return $this->user_email;
	}
	
	/**
	 * Get the [user_phone] column value.
	 *
	 * @return string
	 */
	public function getUserPhone() {
		return $this->user_phone;
	}
	
	/**
	 * Get the [user_comment] column value.
	 *
	 * @return string
	 */
	public function getUserComment() {
		return $this->user_comment;
	}
	
	/**
	 * Get the [status] column value.
	 *
	 * @return int
	 */
	public function getStatus() {
		return $this->status;
	}
	
	/**
	 * Get the [date_created] column value.
	 *
	 * @return int
	 */
	public function getDateCreated() {
		return $this->date_created;
	}
	
	/**
	 * Get the [active_to] column value.
	 *
	 * @return int
	 */
	public function getActiveTo() {
		return $this->active_to;
	}
	
	/**
	 * Get the [manager_id] column value.
	 *
	 * @return int
	 */
	public function getManagerId() {
		return $this->manager_id;
	}
	
	/**
	 * Get the [notified_by_email] column value.
	 *
	 * @return boolean
	 */
	public function getNotifiedByEmail() {
		return $this->notified_by_email;
	}
	
	/**
	 * Set the value of [id] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SNotifications The current object (for fluent API support)
	 */
	public function setId($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns [] = SNotificationsPeer::ID;
		}
		
		return $this;
	} // setId()
	
	/**
	 * Set the value of [product_id] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SNotifications The current object (for fluent API support)
	 */
	public function setProductId($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->product_id !== $v) {
			$this->product_id = $v;
			$this->modifiedColumns [] = SNotificationsPeer::PRODUCT_ID;
		}
		
		if ($this->aSProducts !== null && $this->aSProducts->getId () !== $v) {
			$this->aSProducts = null;
		}
		
		return $this;
	} // setProductId()
	
	/**
	 * Set the value of [variant_id] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SNotifications The current object (for fluent API support)
	 */
	public function setVariantId($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->variant_id !== $v) {
			$this->variant_id = $v;
			$this->modifiedColumns [] = SNotificationsPeer::VARIANT_ID;
		}
		
		if ($this->aSProductVariants !== null && $this->aSProductVariants->getId () !== $v) {
			$this->aSProductVariants = null;
		}
		
		return $this;
	} // setVariantId()
	
	/**
	 * Set the value of [user_name] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SNotifications The current object (for fluent API support)
	 */
	public function setUserName($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->user_name !== $v) {
			$this->user_name = $v;
			$this->modifiedColumns [] = SNotificationsPeer::USER_NAME;
		}
		
		return $this;
	} // setUserName()
	
	/**
	 * Set the value of [user_email] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SNotifications The current object (for fluent API support)
	 */
	public function setUserEmail($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->user_email !== $v) {
			$this->user_email = $v;
			$this->modifiedColumns [] = SNotificationsPeer::USER_EMAIL;
		}
		
		return $this;
	} // setUserEmail()
	
	/**
	 * Set the value of [user_phone] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SNotifications The current object (for fluent API support)
	 */
	public function setUserPhone($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->user_phone !== $v) {
			$this->user_phone = $v;
			$this->modifiedColumns [] = SNotificationsPeer::USER_PHONE;
		}
		
		return $this;
	} // setUserPhone()
	
	/**
	 * Set the value of [user_comment] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SNotifications The current object (for fluent API support)
	 */
	public function setUserComment($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->user_comment !== $v) {
			$this->user_comment = $v;
			$this->modifiedColumns [] = SNotificationsPeer::USER_COMMENT;
		}
		
		return $this;
	} // setUserComment()
	
	/**
	 * Set the value of [status] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SNotifications The current object (for fluent API support)
	 */
	public function setStatus($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns [] = SNotificationsPeer::STATUS;
		}
		
		if ($this->aSNotificationStatuses !== null && $this->aSNotificationStatuses->getId () !== $v) {
			$this->aSNotificationStatuses = null;
		}
		
		return $this;
	} // setStatus()
	
	/**
	 * Set the value of [date_created] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SNotifications The current object (for fluent API support)
	 */
	public function setDateCreated($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->date_created !== $v) {
			$this->date_created = $v;
			$this->modifiedColumns [] = SNotificationsPeer::DATE_CREATED;
		}
		
		return $this;
	} // setDateCreated()
	
	/**
	 * Set the value of [active_to] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SNotifications The current object (for fluent API support)
	 */
	public function setActiveTo($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->active_to !== $v) {
			$this->active_to = $v;
			$this->modifiedColumns [] = SNotificationsPeer::ACTIVE_TO;
		}
		
		return $this;
	} // setActiveTo()
	
	/**
	 * Set the value of [manager_id] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SNotifications The current object (for fluent API support)
	 */
	public function setManagerId($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->manager_id !== $v) {
			$this->manager_id = $v;
			$this->modifiedColumns [] = SNotificationsPeer::MANAGER_ID;
		}
		
		return $this;
	} // setManagerId()
	
	/**
	 * Sets the value of the [notified_by_email] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return SNotifications The current object (for fluent API support)
	 */
	public function setNotifiedByEmail($v) {
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
		
		if ($this->notified_by_email !== $v) {
			$this->notified_by_email = $v;
			$this->modifiedColumns [] = SNotificationsPeer::NOTIFIED_BY_EMAIL;
		}
		
		return $this;
	} // setNotifiedByEmail()
	
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
			$this->product_id = ($row [$startcol + 1] !== null) ? ( int ) $row [$startcol + 1] : null;
			$this->variant_id = ($row [$startcol + 2] !== null) ? ( int ) $row [$startcol + 2] : null;
			$this->user_name = ($row [$startcol + 3] !== null) ? ( string ) $row [$startcol + 3] : null;
			$this->user_email = ($row [$startcol + 4] !== null) ? ( string ) $row [$startcol + 4] : null;
			$this->user_phone = ($row [$startcol + 5] !== null) ? ( string ) $row [$startcol + 5] : null;
			$this->user_comment = ($row [$startcol + 6] !== null) ? ( string ) $row [$startcol + 6] : null;
			$this->status = ($row [$startcol + 7] !== null) ? ( int ) $row [$startcol + 7] : null;
			$this->date_created = ($row [$startcol + 8] !== null) ? ( int ) $row [$startcol + 8] : null;
			$this->active_to = ($row [$startcol + 9] !== null) ? ( int ) $row [$startcol + 9] : null;
			$this->manager_id = ($row [$startcol + 10] !== null) ? ( int ) $row [$startcol + 10] : null;
			$this->notified_by_email = ($row [$startcol + 11] !== null) ? ( boolean ) $row [$startcol + 11] : null;
			$this->resetModified ();
			
			$this->setNew ( false );
			
			if ($rehydrate) {
				$this->ensureConsistency ();
			}
			
			return $startcol + 12; // 12 = SNotificationsPeer::NUM_HYDRATE_COLUMNS.
		} catch ( Exception $e ) {
			throw new PropelException ( "Error populating SNotifications object", $e );
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
		if ($this->aSProducts !== null && $this->product_id !== $this->aSProducts->getId ()) {
			$this->aSProducts = null;
		}
		if ($this->aSProductVariants !== null && $this->variant_id !== $this->aSProductVariants->getId ()) {
			$this->aSProductVariants = null;
		}
		if ($this->aSNotificationStatuses !== null && $this->status !== $this->aSNotificationStatuses->getId ()) {
			$this->aSNotificationStatuses = null;
		}
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
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.
		
		$stmt = SNotificationsPeer::doSelectStmt ( $this->buildPkeyCriteria (), $con );
		$row = $stmt->fetch ( PDO::FETCH_NUM );
		$stmt->closeCursor ();
		if (! $row) {
			throw new PropelException ( 'Cannot find matching row in the database to reload object values.' );
		}
		$this->hydrate ( $row, 0, true ); // rehydrate
		
		if ($deep) { // also de-associate any related objects?
			
			$this->aSProducts = null;
			$this->aSProductVariants = null;
			$this->aSNotificationStatuses = null;
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
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		$con->beginTransaction ();
		try {
			$deleteQuery = SNotificationsQuery::create ()->filterByPrimaryKey ( $this->getPrimaryKey () );
			$ret = $this->preDelete ( $con );
			if ($ret) {
				$deleteQuery->delete ( $con );
				$this->postDelete ( $con );
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
			$con = Propel::getConnection ( SNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
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
				SNotificationsPeer::addInstanceToPool ( $this );
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
			
			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method. This object relates to these object(s) by a
			// foreign key reference.
			
			if ($this->aSProducts !== null) {
				if ($this->aSProducts->isModified () || $this->aSProducts->isNew ()) {
					$affectedRows += $this->aSProducts->save ( $con );
				}
				$this->setSProducts ( $this->aSProducts );
			}
			
			if ($this->aSProductVariants !== null) {
				if ($this->aSProductVariants->isModified () || $this->aSProductVariants->isNew ()) {
					$affectedRows += $this->aSProductVariants->save ( $con );
				}
				$this->setSProductVariants ( $this->aSProductVariants );
			}
			
			if ($this->aSNotificationStatuses !== null) {
				if ($this->aSNotificationStatuses->isModified () || $this->aSNotificationStatuses->isNew ()) {
					$affectedRows += $this->aSNotificationStatuses->save ( $con );
				}
				$this->setSNotificationStatuses ( $this->aSNotificationStatuses );
			}
			
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
		
		$this->modifiedColumns [] = SNotificationsPeer::ID;
		if (null !== $this->id) {
			throw new PropelException ( 'Cannot insert a value for auto-increment primary key (' . SNotificationsPeer::ID . ')' );
		}
		
		// check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified ( SNotificationsPeer::ID )) {
			$modifiedColumns [':p' . $index ++] = '`ID`';
		}
		if ($this->isColumnModified ( SNotificationsPeer::PRODUCT_ID )) {
			$modifiedColumns [':p' . $index ++] = '`PRODUCT_ID`';
		}
		if ($this->isColumnModified ( SNotificationsPeer::VARIANT_ID )) {
			$modifiedColumns [':p' . $index ++] = '`VARIANT_ID`';
		}
		if ($this->isColumnModified ( SNotificationsPeer::USER_NAME )) {
			$modifiedColumns [':p' . $index ++] = '`USER_NAME`';
		}
		if ($this->isColumnModified ( SNotificationsPeer::USER_EMAIL )) {
			$modifiedColumns [':p' . $index ++] = '`USER_EMAIL`';
		}
		if ($this->isColumnModified ( SNotificationsPeer::USER_PHONE )) {
			$modifiedColumns [':p' . $index ++] = '`USER_PHONE`';
		}
		if ($this->isColumnModified ( SNotificationsPeer::USER_COMMENT )) {
			$modifiedColumns [':p' . $index ++] = '`USER_COMMENT`';
		}
		if ($this->isColumnModified ( SNotificationsPeer::STATUS )) {
			$modifiedColumns [':p' . $index ++] = '`STATUS`';
		}
		if ($this->isColumnModified ( SNotificationsPeer::DATE_CREATED )) {
			$modifiedColumns [':p' . $index ++] = '`DATE_CREATED`';
		}
		if ($this->isColumnModified ( SNotificationsPeer::ACTIVE_TO )) {
			$modifiedColumns [':p' . $index ++] = '`ACTIVE_TO`';
		}
		if ($this->isColumnModified ( SNotificationsPeer::MANAGER_ID )) {
			$modifiedColumns [':p' . $index ++] = '`MANAGER_ID`';
		}
		if ($this->isColumnModified ( SNotificationsPeer::NOTIFIED_BY_EMAIL )) {
			$modifiedColumns [':p' . $index ++] = '`NOTIFIED_BY_EMAIL`';
		}
		
		$sql = sprintf ( 'INSERT INTO `shop_notifications` (%s) VALUES (%s)', implode ( ', ', $modifiedColumns ), implode ( ', ', array_keys ( $modifiedColumns ) ) );
		
		try {
			$stmt = $con->prepare ( $sql );
			foreach ( $modifiedColumns as $identifier => $columnName ) {
				switch ($columnName) {
					case '`ID`' :
						$stmt->bindValue ( $identifier, $this->id, PDO::PARAM_INT );
						break;
					case '`PRODUCT_ID`' :
						$stmt->bindValue ( $identifier, $this->product_id, PDO::PARAM_INT );
						break;
					case '`VARIANT_ID`' :
						$stmt->bindValue ( $identifier, $this->variant_id, PDO::PARAM_INT );
						break;
					case '`USER_NAME`' :
						$stmt->bindValue ( $identifier, $this->user_name, PDO::PARAM_STR );
						break;
					case '`USER_EMAIL`' :
						$stmt->bindValue ( $identifier, $this->user_email, PDO::PARAM_STR );
						break;
					case '`USER_PHONE`' :
						$stmt->bindValue ( $identifier, $this->user_phone, PDO::PARAM_STR );
						break;
					case '`USER_COMMENT`' :
						$stmt->bindValue ( $identifier, $this->user_comment, PDO::PARAM_STR );
						break;
					case '`STATUS`' :
						$stmt->bindValue ( $identifier, $this->status, PDO::PARAM_INT );
						break;
					case '`DATE_CREATED`' :
						$stmt->bindValue ( $identifier, $this->date_created, PDO::PARAM_INT );
						break;
					case '`ACTIVE_TO`' :
						$stmt->bindValue ( $identifier, $this->active_to, PDO::PARAM_INT );
						break;
					case '`MANAGER_ID`' :
						$stmt->bindValue ( $identifier, $this->manager_id, PDO::PARAM_INT );
						break;
					case '`NOTIFIED_BY_EMAIL`' :
						$stmt->bindValue ( $identifier, ( int ) $this->notified_by_email, PDO::PARAM_INT );
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
			
			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method. This object relates to these object(s) by a
			// foreign key reference.
			
			if ($this->aSProducts !== null) {
				if (! $this->aSProducts->validate ( $columns )) {
					$failureMap = array_merge ( $failureMap, $this->aSProducts->getValidationFailures () );
				}
			}
			
			if ($this->aSProductVariants !== null) {
				if (! $this->aSProductVariants->validate ( $columns )) {
					$failureMap = array_merge ( $failureMap, $this->aSProductVariants->getValidationFailures () );
				}
			}
			
			if ($this->aSNotificationStatuses !== null) {
				if (! $this->aSNotificationStatuses->validate ( $columns )) {
					$failureMap = array_merge ( $failureMap, $this->aSNotificationStatuses->getValidationFailures () );
				}
			}
			
			if (($retval = SNotificationsPeer::doValidate ( $this, $columns )) !== true) {
				$failureMap = array_merge ( $failureMap, $retval );
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
		$pos = SNotificationsPeer::translateFieldName ( $name, $type, BasePeer::TYPE_NUM );
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
				return $this->getProductId ();
				break;
			case 2 :
				return $this->getVariantId ();
				break;
			case 3 :
				return $this->getUserName ();
				break;
			case 4 :
				return $this->getUserEmail ();
				break;
			case 5 :
				return $this->getUserPhone ();
				break;
			case 6 :
				return $this->getUserComment ();
				break;
			case 7 :
				return $this->getStatus ();
				break;
			case 8 :
				return $this->getDateCreated ();
				break;
			case 9 :
				return $this->getActiveTo ();
				break;
			case 10 :
				return $this->getManagerId ();
				break;
			case 11 :
				return $this->getNotifiedByEmail ();
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
		if (isset ( $alreadyDumpedObjects ['SNotifications'] [$this->getPrimaryKey ()] )) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects ['SNotifications'] [$this->getPrimaryKey ()] = true;
		$keys = SNotificationsPeer::getFieldNames ( $keyType );
		$result = array (
				$keys [0] => $this->getId (),
				$keys [1] => $this->getProductId (),
				$keys [2] => $this->getVariantId (),
				$keys [3] => $this->getUserName (),
				$keys [4] => $this->getUserEmail (),
				$keys [5] => $this->getUserPhone (),
				$keys [6] => $this->getUserComment (),
				$keys [7] => $this->getStatus (),
				$keys [8] => $this->getDateCreated (),
				$keys [9] => $this->getActiveTo (),
				$keys [10] => $this->getManagerId (),
				$keys [11] => $this->getNotifiedByEmail () 
		);
		if ($includeForeignObjects) {
			if (null !== $this->aSProducts) {
				$result ['SProducts'] = $this->aSProducts->toArray ( $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true );
			}
			if (null !== $this->aSProductVariants) {
				$result ['SProductVariants'] = $this->aSProductVariants->toArray ( $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true );
			}
			if (null !== $this->aSNotificationStatuses) {
				$result ['SNotificationStatuses'] = $this->aSNotificationStatuses->toArray ( $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true );
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
		$pos = SNotificationsPeer::translateFieldName ( $name, $type, BasePeer::TYPE_NUM );
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
				$this->setProductId ( $value );
				break;
			case 2 :
				$this->setVariantId ( $value );
				break;
			case 3 :
				$this->setUserName ( $value );
				break;
			case 4 :
				$this->setUserEmail ( $value );
				break;
			case 5 :
				$this->setUserPhone ( $value );
				break;
			case 6 :
				$this->setUserComment ( $value );
				break;
			case 7 :
				$this->setStatus ( $value );
				break;
			case 8 :
				$this->setDateCreated ( $value );
				break;
			case 9 :
				$this->setActiveTo ( $value );
				break;
			case 10 :
				$this->setManagerId ( $value );
				break;
			case 11 :
				$this->setNotifiedByEmail ( $value );
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
		$keys = SNotificationsPeer::getFieldNames ( $keyType );
		
		if (array_key_exists ( $keys [0], $arr ))
			$this->setId ( $arr [$keys [0]] );
		if (array_key_exists ( $keys [1], $arr ))
			$this->setProductId ( $arr [$keys [1]] );
		if (array_key_exists ( $keys [2], $arr ))
			$this->setVariantId ( $arr [$keys [2]] );
		if (array_key_exists ( $keys [3], $arr ))
			$this->setUserName ( $arr [$keys [3]] );
		if (array_key_exists ( $keys [4], $arr ))
			$this->setUserEmail ( $arr [$keys [4]] );
		if (array_key_exists ( $keys [5], $arr ))
			$this->setUserPhone ( $arr [$keys [5]] );
		if (array_key_exists ( $keys [6], $arr ))
			$this->setUserComment ( $arr [$keys [6]] );
		if (array_key_exists ( $keys [7], $arr ))
			$this->setStatus ( $arr [$keys [7]] );
		if (array_key_exists ( $keys [8], $arr ))
			$this->setDateCreated ( $arr [$keys [8]] );
		if (array_key_exists ( $keys [9], $arr ))
			$this->setActiveTo ( $arr [$keys [9]] );
		if (array_key_exists ( $keys [10], $arr ))
			$this->setManagerId ( $arr [$keys [10]] );
		if (array_key_exists ( $keys [11], $arr ))
			$this->setNotifiedByEmail ( $arr [$keys [11]] );
	}
	
	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria() {
		$criteria = new Criteria ( SNotificationsPeer::DATABASE_NAME );
		
		if ($this->isColumnModified ( SNotificationsPeer::ID ))
			$criteria->add ( SNotificationsPeer::ID, $this->id );
		if ($this->isColumnModified ( SNotificationsPeer::PRODUCT_ID ))
			$criteria->add ( SNotificationsPeer::PRODUCT_ID, $this->product_id );
		if ($this->isColumnModified ( SNotificationsPeer::VARIANT_ID ))
			$criteria->add ( SNotificationsPeer::VARIANT_ID, $this->variant_id );
		if ($this->isColumnModified ( SNotificationsPeer::USER_NAME ))
			$criteria->add ( SNotificationsPeer::USER_NAME, $this->user_name );
		if ($this->isColumnModified ( SNotificationsPeer::USER_EMAIL ))
			$criteria->add ( SNotificationsPeer::USER_EMAIL, $this->user_email );
		if ($this->isColumnModified ( SNotificationsPeer::USER_PHONE ))
			$criteria->add ( SNotificationsPeer::USER_PHONE, $this->user_phone );
		if ($this->isColumnModified ( SNotificationsPeer::USER_COMMENT ))
			$criteria->add ( SNotificationsPeer::USER_COMMENT, $this->user_comment );
		if ($this->isColumnModified ( SNotificationsPeer::STATUS ))
			$criteria->add ( SNotificationsPeer::STATUS, $this->status );
		if ($this->isColumnModified ( SNotificationsPeer::DATE_CREATED ))
			$criteria->add ( SNotificationsPeer::DATE_CREATED, $this->date_created );
		if ($this->isColumnModified ( SNotificationsPeer::ACTIVE_TO ))
			$criteria->add ( SNotificationsPeer::ACTIVE_TO, $this->active_to );
		if ($this->isColumnModified ( SNotificationsPeer::MANAGER_ID ))
			$criteria->add ( SNotificationsPeer::MANAGER_ID, $this->manager_id );
		if ($this->isColumnModified ( SNotificationsPeer::NOTIFIED_BY_EMAIL ))
			$criteria->add ( SNotificationsPeer::NOTIFIED_BY_EMAIL, $this->notified_by_email );
		
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
		$criteria = new Criteria ( SNotificationsPeer::DATABASE_NAME );
		$criteria->add ( SNotificationsPeer::ID, $this->id );
		
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
	 *        	An object of SNotifications (or compatible) type.
	 * @param boolean $deepCopy
	 *        	Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param boolean $makeNew
	 *        	Whether to reset autoincrement PKs and make the object new.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true) {
		$copyObj->setProductId ( $this->getProductId () );
		$copyObj->setVariantId ( $this->getVariantId () );
		$copyObj->setUserName ( $this->getUserName () );
		$copyObj->setUserEmail ( $this->getUserEmail () );
		$copyObj->setUserPhone ( $this->getUserPhone () );
		$copyObj->setUserComment ( $this->getUserComment () );
		$copyObj->setStatus ( $this->getStatus () );
		$copyObj->setDateCreated ( $this->getDateCreated () );
		$copyObj->setActiveTo ( $this->getActiveTo () );
		$copyObj->setManagerId ( $this->getManagerId () );
		$copyObj->setNotifiedByEmail ( $this->getNotifiedByEmail () );
		
		if ($deepCopy && ! $this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew ( false );
			// store object hash to prevent cycle
			$this->startCopy = true;
			
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
	 * @return SNotifications Clone of current object.
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
	 * @return SNotificationsPeer
	 */
	public function getPeer() {
		if (self::$peer === null) {
			self::$peer = new SNotificationsPeer ();
		}
		return self::$peer;
	}
	
	/**
	 * Declares an association between this object and a SProducts object.
	 *
	 * @param SProducts $v        	
	 * @return SNotifications The current object (for fluent API support)
	 * @throws PropelException
	 */
	public function setSProducts(SProducts $v = null) {
		if ($v === null) {
			$this->setProductId ( NULL );
		} else {
			$this->setProductId ( $v->getId () );
		}
		
		$this->aSProducts = $v;
		
		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SProducts object, it will not be re-added.
		if ($v !== null) {
			$v->addSNotifications ( $this );
		}
		
		return $this;
	}
	
	/**
	 * Get the associated SProducts object
	 *
	 * @param
	 *        	PropelPDO Optional Connection object.
	 * @return SProducts The associated SProducts object.
	 * @throws PropelException
	 */
	public function getSProducts(PropelPDO $con = null) {
		if ($this->aSProducts === null && ($this->product_id !== null)) {
			$this->aSProducts = SProductsQuery::create ()->findPk ( $this->product_id, $con );
			/*
			 * The following can be used additionally to
			 * guarantee the related object contains a reference
			 * to this object. This level of coupling may, however, be
			 * undesirable since it could result in an only partially populated collection
			 * in the referenced object.
			 * $this->aSProducts->addSNotificationss($this);
			 */
		}
		return $this->aSProducts;
	}
	
	/**
	 * Declares an association between this object and a SProductVariants object.
	 *
	 * @param SProductVariants $v        	
	 * @return SNotifications The current object (for fluent API support)
	 * @throws PropelException
	 */
	public function setSProductVariants(SProductVariants $v = null) {
		if ($v === null) {
			$this->setVariantId ( NULL );
		} else {
			$this->setVariantId ( $v->getId () );
		}
		
		$this->aSProductVariants = $v;
		
		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SProductVariants object, it will not be re-added.
		if ($v !== null) {
			$v->addSNotifications ( $this );
		}
		
		return $this;
	}
	
	/**
	 * Get the associated SProductVariants object
	 *
	 * @param
	 *        	PropelPDO Optional Connection object.
	 * @return SProductVariants The associated SProductVariants object.
	 * @throws PropelException
	 */
	public function getSProductVariants(PropelPDO $con = null) {
		if ($this->aSProductVariants === null && ($this->variant_id !== null)) {
			$this->aSProductVariants = SProductVariantsQuery::create ()->findPk ( $this->variant_id, $con );
			/*
			 * The following can be used additionally to
			 * guarantee the related object contains a reference
			 * to this object. This level of coupling may, however, be
			 * undesirable since it could result in an only partially populated collection
			 * in the referenced object.
			 * $this->aSProductVariants->addSNotificationss($this);
			 */
		}
		return $this->aSProductVariants;
	}
	
	/**
	 * Declares an association between this object and a SNotificationStatuses object.
	 *
	 * @param SNotificationStatuses $v        	
	 * @return SNotifications The current object (for fluent API support)
	 * @throws PropelException
	 */
	public function setSNotificationStatuses(SNotificationStatuses $v = null) {
		if ($v === null) {
			$this->setStatus ( NULL );
		} else {
			$this->setStatus ( $v->getId () );
		}
		
		$this->aSNotificationStatuses = $v;
		
		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SNotificationStatuses object, it will not be re-added.
		if ($v !== null) {
			$v->addSNotifications ( $this );
		}
		
		return $this;
	}
	
	/**
	 * Get the associated SNotificationStatuses object
	 *
	 * @param
	 *        	PropelPDO Optional Connection object.
	 * @return SNotificationStatuses The associated SNotificationStatuses object.
	 * @throws PropelException
	 */
	public function getSNotificationStatuses(PropelPDO $con = null) {
		if ($this->aSNotificationStatuses === null && ($this->status !== null)) {
			$this->aSNotificationStatuses = SNotificationStatusesQuery::create ()->findPk ( $this->status, $con );
			/*
			 * The following can be used additionally to
			 * guarantee the related object contains a reference
			 * to this object. This level of coupling may, however, be
			 * undesirable since it could result in an only partially populated collection
			 * in the referenced object.
			 * $this->aSNotificationStatuses->addSNotificationss($this);
			 */
		}
		return $this->aSNotificationStatuses;
	}
	
	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear() {
		$this->id = null;
		$this->product_id = null;
		$this->variant_id = null;
		$this->user_name = null;
		$this->user_email = null;
		$this->user_phone = null;
		$this->user_comment = null;
		$this->status = null;
		$this->date_created = null;
		$this->active_to = null;
		$this->manager_id = null;
		$this->notified_by_email = null;
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
		} // if ($deep)
		
		$this->aSProducts = null;
		$this->aSProductVariants = null;
		$this->aSNotificationStatuses = null;
	}
	
	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString() {
		return ( string ) $this->exportTo ( SNotificationsPeer::DEFAULT_STRING_FORMAT );
	}
} // BaseSNotifications
