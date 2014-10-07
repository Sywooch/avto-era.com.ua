<?php

/**
 * Base class that represents a row from the 'shop_payment_methods' table.
 *
 * 
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSPaymentMethods extends ShopBaseObject implements Persistent {
	
	/**
	 * Peer class name
	 */
	const PEER = 'SPaymentMethodsPeer';
	
	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * 
	 * @var SPaymentMethodsPeer
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
	 * The value for the active field.
	 * 
	 * @var boolean
	 */
	protected $active;
	
	/**
	 * The value for the currency_id field.
	 * 
	 * @var int
	 */
	protected $currency_id;
	
	/**
	 * The value for the payment_system_name field.
	 * 
	 * @var string
	 */
	protected $payment_system_name;
	
	/**
	 * The value for the position field.
	 * 
	 * @var int
	 */
	protected $position;
	
	/**
	 *
	 * @var SCurrencies
	 */
	protected $aCurrency;
	
	/**
	 *
	 * @var array ShopDeliveryMethodsSystems[] Collection to store aggregation of ShopDeliveryMethodsSystems objects.
	 */
	protected $collShopDeliveryMethodsSystemss;
	
	/**
	 *
	 * @var array SOrders[] Collection to store aggregation of SOrders objects.
	 */
	protected $collSOrderss;
	
	/**
	 *
	 * @var array SPaymentMethodsI18n[] Collection to store aggregation of SPaymentMethodsI18n objects.
	 */
	protected $collSPaymentMethodsI18ns;
	
	/**
	 *
	 * @var array SDeliveryMethods[] Collection to store aggregation of SDeliveryMethods objects.
	 */
	protected $collSDeliveryMethodss;
	
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
	 * @var array[SPaymentMethodsI18n]
	 */
	protected $currentTranslations;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $sDeliveryMethodssScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $shopDeliveryMethodsSystemssScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $sOrderssScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $sPaymentMethodsI18nsScheduledForDeletion = null;
	
	/**
	 * Get the [id] column value.
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Get the [active] column value.
	 *
	 * @return boolean
	 */
	public function getActive() {
		return $this->active;
	}
	
	/**
	 * Get the [currency_id] column value.
	 *
	 * @return int
	 */
	public function getCurrencyId() {
		return $this->currency_id;
	}
	
	/**
	 * Get the [payment_system_name] column value.
	 *
	 * @return string
	 */
	public function getPaymentSystemName() {
		return $this->payment_system_name;
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
	 * @return SPaymentMethods The current object (for fluent API support)
	 */
	public function setId($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns [] = SPaymentMethodsPeer::ID;
		}
		
		return $this;
	} // setId()
	
	/**
	 * Sets the value of the [active] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return SPaymentMethods The current object (for fluent API support)
	 */
	public function setActive($v) {
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
		
		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns [] = SPaymentMethodsPeer::ACTIVE;
		}
		
		return $this;
	} // setActive()
	
	/**
	 * Set the value of [currency_id] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SPaymentMethods The current object (for fluent API support)
	 */
	public function setCurrencyId($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->currency_id !== $v) {
			$this->currency_id = $v;
			$this->modifiedColumns [] = SPaymentMethodsPeer::CURRENCY_ID;
		}
		
		if ($this->aCurrency !== null && $this->aCurrency->getId () !== $v) {
			$this->aCurrency = null;
		}
		
		return $this;
	} // setCurrencyId()
	
	/**
	 * Set the value of [payment_system_name] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SPaymentMethods The current object (for fluent API support)
	 */
	public function setPaymentSystemName($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->payment_system_name !== $v) {
			$this->payment_system_name = $v;
			$this->modifiedColumns [] = SPaymentMethodsPeer::PAYMENT_SYSTEM_NAME;
		}
		
		return $this;
	} // setPaymentSystemName()
	
	/**
	 * Set the value of [position] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SPaymentMethods The current object (for fluent API support)
	 */
	public function setPosition($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->position !== $v) {
			$this->position = $v;
			$this->modifiedColumns [] = SPaymentMethodsPeer::POSITION;
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
			$this->active = ($row [$startcol + 1] !== null) ? ( boolean ) $row [$startcol + 1] : null;
			$this->currency_id = ($row [$startcol + 2] !== null) ? ( int ) $row [$startcol + 2] : null;
			$this->payment_system_name = ($row [$startcol + 3] !== null) ? ( string ) $row [$startcol + 3] : null;
			$this->position = ($row [$startcol + 4] !== null) ? ( int ) $row [$startcol + 4] : null;
			$this->resetModified ();
			
			$this->setNew ( false );
			
			if ($rehydrate) {
				$this->ensureConsistency ();
			}
			
			return $startcol + 5; // 5 = SPaymentMethodsPeer::NUM_HYDRATE_COLUMNS.
		} catch ( Exception $e ) {
			throw new PropelException ( "Error populating SPaymentMethods object", $e );
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
		if ($this->aCurrency !== null && $this->currency_id !== $this->aCurrency->getId ()) {
			$this->aCurrency = null;
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
			$con = Propel::getConnection ( SPaymentMethodsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.
		
		$stmt = SPaymentMethodsPeer::doSelectStmt ( $this->buildPkeyCriteria (), $con );
		$row = $stmt->fetch ( PDO::FETCH_NUM );
		$stmt->closeCursor ();
		if (! $row) {
			throw new PropelException ( 'Cannot find matching row in the database to reload object values.' );
		}
		$this->hydrate ( $row, 0, true ); // rehydrate
		
		if ($deep) { // also de-associate any related objects?
			
			$this->aCurrency = null;
			$this->collShopDeliveryMethodsSystemss = null;
			
			$this->collSOrderss = null;
			
			$this->collSPaymentMethodsI18ns = null;
			
			$this->collSDeliveryMethodss = null;
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
			$con = Propel::getConnection ( SPaymentMethodsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		$con->beginTransaction ();
		try {
			$deleteQuery = SPaymentMethodsQuery::create ()->filterByPrimaryKey ( $this->getPrimaryKey () );
			$ret = $this->preDelete ( $con );
			if ($ret) {
				$deleteQuery->delete ( $con );
				$this->postDelete ( $con );
				// i18n behavior
				
				// emulate delete cascade
				SPaymentMethodsI18nQuery::create ()->filterBySPaymentMethods ( $this )->delete ( $con );
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
			$con = Propel::getConnection ( SPaymentMethodsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
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
				SPaymentMethodsPeer::addInstanceToPool ( $this );
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
			
			if ($this->aCurrency !== null) {
				if ($this->aCurrency->isModified () || $this->aCurrency->isNew ()) {
					$affectedRows += $this->aCurrency->save ( $con );
				}
				$this->setCurrency ( $this->aCurrency );
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
			
			if ($this->sDeliveryMethodssScheduledForDeletion !== null) {
				if (! $this->sDeliveryMethodssScheduledForDeletion->isEmpty ()) {
					ShopDeliveryMethodsSystemsQuery::create ()->filterByPrimaryKeys ( $this->sDeliveryMethodssScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->sDeliveryMethodssScheduledForDeletion = null;
				}
				
				foreach ( $this->getSDeliveryMethodss () as $sDeliveryMethods ) {
					if ($sDeliveryMethods->isModified ()) {
						$sDeliveryMethods->save ( $con );
					}
				}
			}
			
			if ($this->shopDeliveryMethodsSystemssScheduledForDeletion !== null) {
				if (! $this->shopDeliveryMethodsSystemssScheduledForDeletion->isEmpty ()) {
					ShopDeliveryMethodsSystemsQuery::create ()->filterByPrimaryKeys ( $this->shopDeliveryMethodsSystemssScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->shopDeliveryMethodsSystemssScheduledForDeletion = null;
				}
			}
			
			if ($this->collShopDeliveryMethodsSystemss !== null) {
				foreach ( $this->collShopDeliveryMethodsSystemss as $referrerFK ) {
					if (! $referrerFK->isDeleted ()) {
						$affectedRows += $referrerFK->save ( $con );
					}
				}
			}
			
			if ($this->sOrderssScheduledForDeletion !== null) {
				if (! $this->sOrderssScheduledForDeletion->isEmpty ()) {
					SOrdersQuery::create ()->filterByPrimaryKeys ( $this->sOrderssScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->sOrderssScheduledForDeletion = null;
				}
			}
			
			if ($this->collSOrderss !== null) {
				foreach ( $this->collSOrderss as $referrerFK ) {
					if (! $referrerFK->isDeleted ()) {
						$affectedRows += $referrerFK->save ( $con );
					}
				}
			}
			
			if ($this->sPaymentMethodsI18nsScheduledForDeletion !== null) {
				if (! $this->sPaymentMethodsI18nsScheduledForDeletion->isEmpty ()) {
					SPaymentMethodsI18nQuery::create ()->filterByPrimaryKeys ( $this->sPaymentMethodsI18nsScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->sPaymentMethodsI18nsScheduledForDeletion = null;
				}
			}
			
			if ($this->collSPaymentMethodsI18ns !== null) {
				foreach ( $this->collSPaymentMethodsI18ns as $referrerFK ) {
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
		
		$this->modifiedColumns [] = SPaymentMethodsPeer::ID;
		if (null !== $this->id) {
			throw new PropelException ( 'Cannot insert a value for auto-increment primary key (' . SPaymentMethodsPeer::ID . ')' );
		}
		
		// check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified ( SPaymentMethodsPeer::ID )) {
			$modifiedColumns [':p' . $index ++] = '`ID`';
		}
		if ($this->isColumnModified ( SPaymentMethodsPeer::ACTIVE )) {
			$modifiedColumns [':p' . $index ++] = '`ACTIVE`';
		}
		if ($this->isColumnModified ( SPaymentMethodsPeer::CURRENCY_ID )) {
			$modifiedColumns [':p' . $index ++] = '`CURRENCY_ID`';
		}
		if ($this->isColumnModified ( SPaymentMethodsPeer::PAYMENT_SYSTEM_NAME )) {
			$modifiedColumns [':p' . $index ++] = '`PAYMENT_SYSTEM_NAME`';
		}
		if ($this->isColumnModified ( SPaymentMethodsPeer::POSITION )) {
			$modifiedColumns [':p' . $index ++] = '`POSITION`';
		}
		
		$sql = sprintf ( 'INSERT INTO `shop_payment_methods` (%s) VALUES (%s)', implode ( ', ', $modifiedColumns ), implode ( ', ', array_keys ( $modifiedColumns ) ) );
		
		try {
			$stmt = $con->prepare ( $sql );
			foreach ( $modifiedColumns as $identifier => $columnName ) {
				switch ($columnName) {
					case '`ID`' :
						$stmt->bindValue ( $identifier, $this->id, PDO::PARAM_INT );
						break;
					case '`ACTIVE`' :
						$stmt->bindValue ( $identifier, ( int ) $this->active, PDO::PARAM_INT );
						break;
					case '`CURRENCY_ID`' :
						$stmt->bindValue ( $identifier, $this->currency_id, PDO::PARAM_INT );
						break;
					case '`PAYMENT_SYSTEM_NAME`' :
						$stmt->bindValue ( $identifier, $this->payment_system_name, PDO::PARAM_STR );
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
			
			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method. This object relates to these object(s) by a
			// foreign key reference.
			
			if ($this->aCurrency !== null) {
				if (! $this->aCurrency->validate ( $columns )) {
					$failureMap = array_merge ( $failureMap, $this->aCurrency->getValidationFailures () );
				}
			}
			
			if (($retval = SPaymentMethodsPeer::doValidate ( $this, $columns )) !== true) {
				$failureMap = array_merge ( $failureMap, $retval );
			}
			
			if ($this->collShopDeliveryMethodsSystemss !== null) {
				foreach ( $this->collShopDeliveryMethodsSystemss as $referrerFK ) {
					if (! $referrerFK->validate ( $columns )) {
						$failureMap = array_merge ( $failureMap, $referrerFK->getValidationFailures () );
					}
				}
			}
			
			if ($this->collSOrderss !== null) {
				foreach ( $this->collSOrderss as $referrerFK ) {
					if (! $referrerFK->validate ( $columns )) {
						$failureMap = array_merge ( $failureMap, $referrerFK->getValidationFailures () );
					}
				}
			}
			
			if ($this->collSPaymentMethodsI18ns !== null) {
				foreach ( $this->collSPaymentMethodsI18ns as $referrerFK ) {
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
		$pos = SPaymentMethodsPeer::translateFieldName ( $name, $type, BasePeer::TYPE_NUM );
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
				return $this->getActive ();
				break;
			case 2 :
				return $this->getCurrencyId ();
				break;
			case 3 :
				return $this->getPaymentSystemName ();
				break;
			case 4 :
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
		if (isset ( $alreadyDumpedObjects ['SPaymentMethods'] [$this->getPrimaryKey ()] )) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects ['SPaymentMethods'] [$this->getPrimaryKey ()] = true;
		$keys = SPaymentMethodsPeer::getFieldNames ( $keyType );
		$result = array (
				$keys [0] => $this->getId (),
				$keys [1] => $this->getActive (),
				$keys [2] => $this->getCurrencyId (),
				$keys [3] => $this->getPaymentSystemName (),
				$keys [4] => $this->getPosition () 
		);
		if ($includeForeignObjects) {
			if (null !== $this->aCurrency) {
				$result ['Currency'] = $this->aCurrency->toArray ( $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true );
			}
			if (null !== $this->collShopDeliveryMethodsSystemss) {
				$result ['ShopDeliveryMethodsSystemss'] = $this->collShopDeliveryMethodsSystemss->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
			}
			if (null !== $this->collSOrderss) {
				$result ['SOrderss'] = $this->collSOrderss->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
			}
			if (null !== $this->collSPaymentMethodsI18ns) {
				$result ['SPaymentMethodsI18ns'] = $this->collSPaymentMethodsI18ns->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
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
		$pos = SPaymentMethodsPeer::translateFieldName ( $name, $type, BasePeer::TYPE_NUM );
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
				$this->setActive ( $value );
				break;
			case 2 :
				$this->setCurrencyId ( $value );
				break;
			case 3 :
				$this->setPaymentSystemName ( $value );
				break;
			case 4 :
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
		$keys = SPaymentMethodsPeer::getFieldNames ( $keyType );
		
		if (array_key_exists ( $keys [0], $arr ))
			$this->setId ( $arr [$keys [0]] );
		if (array_key_exists ( $keys [1], $arr ))
			$this->setActive ( $arr [$keys [1]] );
		if (array_key_exists ( $keys [2], $arr ))
			$this->setCurrencyId ( $arr [$keys [2]] );
		if (array_key_exists ( $keys [3], $arr ))
			$this->setPaymentSystemName ( $arr [$keys [3]] );
		if (array_key_exists ( $keys [4], $arr ))
			$this->setPosition ( $arr [$keys [4]] );
	}
	
	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria() {
		$criteria = new Criteria ( SPaymentMethodsPeer::DATABASE_NAME );
		
		if ($this->isColumnModified ( SPaymentMethodsPeer::ID ))
			$criteria->add ( SPaymentMethodsPeer::ID, $this->id );
		if ($this->isColumnModified ( SPaymentMethodsPeer::ACTIVE ))
			$criteria->add ( SPaymentMethodsPeer::ACTIVE, $this->active );
		if ($this->isColumnModified ( SPaymentMethodsPeer::CURRENCY_ID ))
			$criteria->add ( SPaymentMethodsPeer::CURRENCY_ID, $this->currency_id );
		if ($this->isColumnModified ( SPaymentMethodsPeer::PAYMENT_SYSTEM_NAME ))
			$criteria->add ( SPaymentMethodsPeer::PAYMENT_SYSTEM_NAME, $this->payment_system_name );
		if ($this->isColumnModified ( SPaymentMethodsPeer::POSITION ))
			$criteria->add ( SPaymentMethodsPeer::POSITION, $this->position );
		
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
		$criteria = new Criteria ( SPaymentMethodsPeer::DATABASE_NAME );
		$criteria->add ( SPaymentMethodsPeer::ID, $this->id );
		
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
	 *        	An object of SPaymentMethods (or compatible) type.
	 * @param boolean $deepCopy
	 *        	Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param boolean $makeNew
	 *        	Whether to reset autoincrement PKs and make the object new.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true) {
		$copyObj->setActive ( $this->getActive () );
		$copyObj->setCurrencyId ( $this->getCurrencyId () );
		$copyObj->setPaymentSystemName ( $this->getPaymentSystemName () );
		$copyObj->setPosition ( $this->getPosition () );
		
		if ($deepCopy && ! $this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew ( false );
			// store object hash to prevent cycle
			$this->startCopy = true;
			
			foreach ( $this->getShopDeliveryMethodsSystemss () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addShopDeliveryMethodsSystems ( $relObj->copy ( $deepCopy ) );
				}
			}
			
			foreach ( $this->getSOrderss () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSOrders ( $relObj->copy ( $deepCopy ) );
				}
			}
			
			foreach ( $this->getSPaymentMethodsI18ns () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSPaymentMethodsI18n ( $relObj->copy ( $deepCopy ) );
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
	 * @return SPaymentMethods Clone of current object.
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
	 * @return SPaymentMethodsPeer
	 */
	public function getPeer() {
		if (self::$peer === null) {
			self::$peer = new SPaymentMethodsPeer ();
		}
		return self::$peer;
	}
	
	/**
	 * Declares an association between this object and a SCurrencies object.
	 *
	 * @param SCurrencies $v        	
	 * @return SPaymentMethods The current object (for fluent API support)
	 * @throws PropelException
	 */
	public function setCurrency(SCurrencies $v = null) {
		if ($v === null) {
			$this->setCurrencyId ( NULL );
		} else {
			$this->setCurrencyId ( $v->getId () );
		}
		
		$this->aCurrency = $v;
		
		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SCurrencies object, it will not be re-added.
		if ($v !== null) {
			$v->addSPaymentMethods ( $this );
		}
		
		return $this;
	}
	
	/**
	 * Get the associated SCurrencies object
	 *
	 * @param
	 *        	PropelPDO Optional Connection object.
	 * @return SCurrencies The associated SCurrencies object.
	 * @throws PropelException
	 */
	public function getCurrency(PropelPDO $con = null) {
		if ($this->aCurrency === null && ($this->currency_id !== null)) {
			$this->aCurrency = SCurrenciesQuery::create ()->findPk ( $this->currency_id, $con );
			/*
			 * The following can be used additionally to
			 * guarantee the related object contains a reference
			 * to this object. This level of coupling may, however, be
			 * undesirable since it could result in an only partially populated collection
			 * in the referenced object.
			 * $this->aCurrency->addSPaymentMethodss($this);
			 */
		}
		return $this->aCurrency;
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
		if ('ShopDeliveryMethodsSystems' == $relationName) {
			return $this->initShopDeliveryMethodsSystemss ();
		}
		if ('SOrders' == $relationName) {
			return $this->initSOrderss ();
		}
		if ('SPaymentMethodsI18n' == $relationName) {
			return $this->initSPaymentMethodsI18ns ();
		}
	}
	
	/**
	 * Clears out the collShopDeliveryMethodsSystemss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addShopDeliveryMethodsSystemss()
	 */
	public function clearShopDeliveryMethodsSystemss() {
		$this->collShopDeliveryMethodsSystemss = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collShopDeliveryMethodsSystemss collection.
	 *
	 * By default this just sets the collShopDeliveryMethodsSystemss collection to an empty array (like clearcollShopDeliveryMethodsSystemss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initShopDeliveryMethodsSystemss($overrideExisting = true) {
		if (null !== $this->collShopDeliveryMethodsSystemss && ! $overrideExisting) {
			return;
		}
		$this->collShopDeliveryMethodsSystemss = new PropelObjectCollection ();
		$this->collShopDeliveryMethodsSystemss->setModel ( 'ShopDeliveryMethodsSystems' );
	}
	
	/**
	 * Gets an array of ShopDeliveryMethodsSystems objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SPaymentMethods is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array ShopDeliveryMethodsSystems[] List of ShopDeliveryMethodsSystems objects
	 * @throws PropelException
	 */
	public function getShopDeliveryMethodsSystemss($criteria = null, PropelPDO $con = null) {
		if (null === $this->collShopDeliveryMethodsSystemss || null !== $criteria) {
			if ($this->isNew () && null === $this->collShopDeliveryMethodsSystemss) {
				// return empty collection
				$this->initShopDeliveryMethodsSystemss ();
			} else {
				$collShopDeliveryMethodsSystemss = ShopDeliveryMethodsSystemsQuery::create ( null, $criteria )->filterByPaymentMethods ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collShopDeliveryMethodsSystemss;
				}
				$this->collShopDeliveryMethodsSystemss = $collShopDeliveryMethodsSystemss;
			}
		}
		return $this->collShopDeliveryMethodsSystemss;
	}
	
	/**
	 * Sets a collection of ShopDeliveryMethodsSystems objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $shopDeliveryMethodsSystemss
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setShopDeliveryMethodsSystemss(PropelCollection $shopDeliveryMethodsSystemss, PropelPDO $con = null) {
		$this->shopDeliveryMethodsSystemssScheduledForDeletion = $this->getShopDeliveryMethodsSystemss ( new Criteria (), $con )->diff ( $shopDeliveryMethodsSystemss );
		
		foreach ( $shopDeliveryMethodsSystemss as $shopDeliveryMethodsSystems ) {
			// Fix issue with collection modified by reference
			if ($shopDeliveryMethodsSystems->isNew ()) {
				$shopDeliveryMethodsSystems->setPaymentMethods ( $this );
			}
			$this->addShopDeliveryMethodsSystems ( $shopDeliveryMethodsSystems );
		}
		
		$this->collShopDeliveryMethodsSystemss = $shopDeliveryMethodsSystemss;
	}
	
	/**
	 * Returns the number of related ShopDeliveryMethodsSystems objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related ShopDeliveryMethodsSystems objects.
	 * @throws PropelException
	 */
	public function countShopDeliveryMethodsSystemss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collShopDeliveryMethodsSystemss || null !== $criteria) {
			if ($this->isNew () && null === $this->collShopDeliveryMethodsSystemss) {
				return 0;
			} else {
				$query = ShopDeliveryMethodsSystemsQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterByPaymentMethods ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collShopDeliveryMethodsSystemss );
		}
	}
	
	/**
	 * Method called to associate a ShopDeliveryMethodsSystems object to this object
	 * through the ShopDeliveryMethodsSystems foreign key attribute.
	 *
	 * @param ShopDeliveryMethodsSystems $l
	 *        	ShopDeliveryMethodsSystems
	 * @return SPaymentMethods The current object (for fluent API support)
	 */
	public function addShopDeliveryMethodsSystems(ShopDeliveryMethodsSystems $l) {
		if ($this->collShopDeliveryMethodsSystemss === null) {
			$this->initShopDeliveryMethodsSystemss ();
		}
		if (! $this->collShopDeliveryMethodsSystemss->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddShopDeliveryMethodsSystems ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param ShopDeliveryMethodsSystems $shopDeliveryMethodsSystems
	 *        	The shopDeliveryMethodsSystems object to add.
	 */
	protected function doAddShopDeliveryMethodsSystems($shopDeliveryMethodsSystems) {
		$this->collShopDeliveryMethodsSystemss [] = $shopDeliveryMethodsSystems;
		$shopDeliveryMethodsSystems->setPaymentMethods ( $this );
	}
	
	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SPaymentMethods is new, it will return
	 * an empty collection; or if this SPaymentMethods has previously
	 * been saved, it will retrieve related ShopDeliveryMethodsSystemss from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable. You can provide public methods for those you
	 * actually need in SPaymentMethods.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @param string $join_behavior
	 *        	optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return PropelCollection|array ShopDeliveryMethodsSystems[] List of ShopDeliveryMethodsSystems objects
	 */
	public function getShopDeliveryMethodsSystemssJoinSDeliveryMethods($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$query = ShopDeliveryMethodsSystemsQuery::create ( null, $criteria );
		$query->joinWith ( 'SDeliveryMethods', $join_behavior );
		
		return $this->getShopDeliveryMethodsSystemss ( $query, $con );
	}
	
	/**
	 * Clears out the collSOrderss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addSOrderss()
	 */
	public function clearSOrderss() {
		$this->collSOrderss = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collSOrderss collection.
	 *
	 * By default this just sets the collSOrderss collection to an empty array (like clearcollSOrderss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initSOrderss($overrideExisting = true) {
		if (null !== $this->collSOrderss && ! $overrideExisting) {
			return;
		}
		$this->collSOrderss = new PropelObjectCollection ();
		$this->collSOrderss->setModel ( 'SOrders' );
	}
	
	/**
	 * Gets an array of SOrders objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SPaymentMethods is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array SOrders[] List of SOrders objects
	 * @throws PropelException
	 */
	public function getSOrderss($criteria = null, PropelPDO $con = null) {
		if (null === $this->collSOrderss || null !== $criteria) {
			if ($this->isNew () && null === $this->collSOrderss) {
				// return empty collection
				$this->initSOrderss ();
			} else {
				$collSOrderss = SOrdersQuery::create ( null, $criteria )->filterBySPaymentMethods ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collSOrderss;
				}
				$this->collSOrderss = $collSOrderss;
			}
		}
		return $this->collSOrderss;
	}
	
	/**
	 * Sets a collection of SOrders objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $sOrderss
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setSOrderss(PropelCollection $sOrderss, PropelPDO $con = null) {
		$this->sOrderssScheduledForDeletion = $this->getSOrderss ( new Criteria (), $con )->diff ( $sOrderss );
		
		foreach ( $sOrderss as $sOrders ) {
			// Fix issue with collection modified by reference
			if ($sOrders->isNew ()) {
				$sOrders->setSPaymentMethods ( $this );
			}
			$this->addSOrders ( $sOrders );
		}
		
		$this->collSOrderss = $sOrderss;
	}
	
	/**
	 * Returns the number of related SOrders objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related SOrders objects.
	 * @throws PropelException
	 */
	public function countSOrderss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collSOrderss || null !== $criteria) {
			if ($this->isNew () && null === $this->collSOrderss) {
				return 0;
			} else {
				$query = SOrdersQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterBySPaymentMethods ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collSOrderss );
		}
	}
	
	/**
	 * Method called to associate a SOrders object to this object
	 * through the SOrders foreign key attribute.
	 *
	 * @param SOrders $l
	 *        	SOrders
	 * @return SPaymentMethods The current object (for fluent API support)
	 */
	public function addSOrders(SOrders $l) {
		if ($this->collSOrderss === null) {
			$this->initSOrderss ();
		}
		if (! $this->collSOrderss->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddSOrders ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param SOrders $sOrders
	 *        	The sOrders object to add.
	 */
	protected function doAddSOrders($sOrders) {
		$this->collSOrderss [] = $sOrders;
		$sOrders->setSPaymentMethods ( $this );
	}
	
	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SPaymentMethods is new, it will return
	 * an empty collection; or if this SPaymentMethods has previously
	 * been saved, it will retrieve related SOrderss from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable. You can provide public methods for those you
	 * actually need in SPaymentMethods.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @param string $join_behavior
	 *        	optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return PropelCollection|array SOrders[] List of SOrders objects
	 */
	public function getSOrderssJoinSDeliveryMethods($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$query = SOrdersQuery::create ( null, $criteria );
		$query->joinWith ( 'SDeliveryMethods', $join_behavior );
		
		return $this->getSOrderss ( $query, $con );
	}
	
	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SPaymentMethods is new, it will return
	 * an empty collection; or if this SPaymentMethods has previously
	 * been saved, it will retrieve related SOrderss from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable. You can provide public methods for those you
	 * actually need in SPaymentMethods.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @param string $join_behavior
	 *        	optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return PropelCollection|array SOrders[] List of SOrders objects
	 */
	public function getSOrderssJoinSOrderStatuses($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$query = SOrdersQuery::create ( null, $criteria );
		$query->joinWith ( 'SOrderStatuses', $join_behavior );
		
		return $this->getSOrderss ( $query, $con );
	}
	
	/**
	 * Clears out the collSPaymentMethodsI18ns collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addSPaymentMethodsI18ns()
	 */
	public function clearSPaymentMethodsI18ns() {
		$this->collSPaymentMethodsI18ns = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collSPaymentMethodsI18ns collection.
	 *
	 * By default this just sets the collSPaymentMethodsI18ns collection to an empty array (like clearcollSPaymentMethodsI18ns());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initSPaymentMethodsI18ns($overrideExisting = true) {
		if (null !== $this->collSPaymentMethodsI18ns && ! $overrideExisting) {
			return;
		}
		$this->collSPaymentMethodsI18ns = new PropelObjectCollection ();
		$this->collSPaymentMethodsI18ns->setModel ( 'SPaymentMethodsI18n' );
	}
	
	/**
	 * Gets an array of SPaymentMethodsI18n objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SPaymentMethods is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array SPaymentMethodsI18n[] List of SPaymentMethodsI18n objects
	 * @throws PropelException
	 */
	public function getSPaymentMethodsI18ns($criteria = null, PropelPDO $con = null) {
		if (null === $this->collSPaymentMethodsI18ns || null !== $criteria) {
			if ($this->isNew () && null === $this->collSPaymentMethodsI18ns) {
				// return empty collection
				$this->initSPaymentMethodsI18ns ();
			} else {
				$collSPaymentMethodsI18ns = SPaymentMethodsI18nQuery::create ( null, $criteria )->filterBySPaymentMethods ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collSPaymentMethodsI18ns;
				}
				$this->collSPaymentMethodsI18ns = $collSPaymentMethodsI18ns;
			}
		}
		return $this->collSPaymentMethodsI18ns;
	}
	
	/**
	 * Sets a collection of SPaymentMethodsI18n objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $sPaymentMethodsI18ns
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setSPaymentMethodsI18ns(PropelCollection $sPaymentMethodsI18ns, PropelPDO $con = null) {
		$this->sPaymentMethodsI18nsScheduledForDeletion = $this->getSPaymentMethodsI18ns ( new Criteria (), $con )->diff ( $sPaymentMethodsI18ns );
		
		foreach ( $sPaymentMethodsI18ns as $sPaymentMethodsI18n ) {
			// Fix issue with collection modified by reference
			if ($sPaymentMethodsI18n->isNew ()) {
				$sPaymentMethodsI18n->setSPaymentMethods ( $this );
			}
			$this->addSPaymentMethodsI18n ( $sPaymentMethodsI18n );
		}
		
		$this->collSPaymentMethodsI18ns = $sPaymentMethodsI18ns;
	}
	
	/**
	 * Returns the number of related SPaymentMethodsI18n objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related SPaymentMethodsI18n objects.
	 * @throws PropelException
	 */
	public function countSPaymentMethodsI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collSPaymentMethodsI18ns || null !== $criteria) {
			if ($this->isNew () && null === $this->collSPaymentMethodsI18ns) {
				return 0;
			} else {
				$query = SPaymentMethodsI18nQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterBySPaymentMethods ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collSPaymentMethodsI18ns );
		}
	}
	
	/**
	 * Method called to associate a SPaymentMethodsI18n object to this object
	 * through the SPaymentMethodsI18n foreign key attribute.
	 *
	 * @param SPaymentMethodsI18n $l
	 *        	SPaymentMethodsI18n
	 * @return SPaymentMethods The current object (for fluent API support)
	 */
	public function addSPaymentMethodsI18n(SPaymentMethodsI18n $l) {
		if ($l && $locale = $l->getLocale ()) {
			$this->setLocale ( $locale );
			$this->currentTranslations [$locale] = $l;
		}
		if ($this->collSPaymentMethodsI18ns === null) {
			$this->initSPaymentMethodsI18ns ();
		}
		if (! $this->collSPaymentMethodsI18ns->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddSPaymentMethodsI18n ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param SPaymentMethodsI18n $sPaymentMethodsI18n
	 *        	The sPaymentMethodsI18n object to add.
	 */
	protected function doAddSPaymentMethodsI18n($sPaymentMethodsI18n) {
		$this->collSPaymentMethodsI18ns [] = $sPaymentMethodsI18n;
		$sPaymentMethodsI18n->setSPaymentMethods ( $this );
	}
	
	/**
	 * Clears out the collSDeliveryMethodss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addSDeliveryMethodss()
	 */
	public function clearSDeliveryMethodss() {
		$this->collSDeliveryMethodss = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collSDeliveryMethodss collection.
	 *
	 * By default this just sets the collSDeliveryMethodss collection to an empty collection (like clearSDeliveryMethodss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return void
	 */
	public function initSDeliveryMethodss() {
		$this->collSDeliveryMethodss = new PropelObjectCollection ();
		$this->collSDeliveryMethodss->setModel ( 'SDeliveryMethods' );
	}
	
	/**
	 * Gets a collection of SDeliveryMethods objects related by a many-to-many relationship
	 * to the current object by way of the shop_delivery_methods_systems cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SPaymentMethods is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	Optional query object to filter the query
	 * @param PropelPDO $con
	 *        	Optional connection object
	 *        	
	 * @return PropelCollection|array SDeliveryMethods[] List of SDeliveryMethods objects
	 */
	public function getSDeliveryMethodss($criteria = null, PropelPDO $con = null) {
		if (null === $this->collSDeliveryMethodss || null !== $criteria) {
			if ($this->isNew () && null === $this->collSDeliveryMethodss) {
				// return empty collection
				$this->initSDeliveryMethodss ();
			} else {
				$collSDeliveryMethodss = SDeliveryMethodsQuery::create ( null, $criteria )->filterByPaymentMethods ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collSDeliveryMethodss;
				}
				$this->collSDeliveryMethodss = $collSDeliveryMethodss;
			}
		}
		return $this->collSDeliveryMethodss;
	}
	
	/**
	 * Sets a collection of SDeliveryMethods objects related by a many-to-many relationship
	 * to the current object by way of the shop_delivery_methods_systems cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $sDeliveryMethodss
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setSDeliveryMethodss(PropelCollection $sDeliveryMethodss, PropelPDO $con = null) {
		$shopDeliveryMethodsSystemss = ShopDeliveryMethodsSystemsQuery::create ()->filterBySDeliveryMethods ( $sDeliveryMethodss )->filterByPaymentMethods ( $this )->find ( $con );
		
		$this->sDeliveryMethodssScheduledForDeletion = $this->getShopDeliveryMethodsSystemss ()->diff ( $shopDeliveryMethodsSystemss );
		$this->collShopDeliveryMethodsSystemss = $shopDeliveryMethodsSystemss;
		
		foreach ( $sDeliveryMethodss as $sDeliveryMethods ) {
			// Fix issue with collection modified by reference
			if ($sDeliveryMethods->isNew ()) {
				$this->doAddSDeliveryMethods ( $sDeliveryMethods );
			} else {
				$this->addSDeliveryMethods ( $sDeliveryMethods );
			}
		}
		
		$this->collSDeliveryMethodss = $sDeliveryMethodss;
	}
	
	/**
	 * Gets the number of SDeliveryMethods objects related by a many-to-many relationship
	 * to the current object by way of the shop_delivery_methods_systems cross-reference table.
	 *
	 * @param Criteria $criteria
	 *        	Optional query object to filter the query
	 * @param boolean $distinct
	 *        	Set to true to force count distinct
	 * @param PropelPDO $con
	 *        	Optional connection object
	 *        	
	 * @return int the number of related SDeliveryMethods objects
	 */
	public function countSDeliveryMethodss($criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collSDeliveryMethodss || null !== $criteria) {
			if ($this->isNew () && null === $this->collSDeliveryMethodss) {
				return 0;
			} else {
				$query = SDeliveryMethodsQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterByPaymentMethods ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collSDeliveryMethodss );
		}
	}
	
	/**
	 * Associate a SDeliveryMethods object to this object
	 * through the shop_delivery_methods_systems cross reference table.
	 *
	 * @param SDeliveryMethods $sDeliveryMethods
	 *        	The ShopDeliveryMethodsSystems object to relate
	 * @return void
	 */
	public function addSDeliveryMethods(SDeliveryMethods $sDeliveryMethods) {
		if ($this->collSDeliveryMethodss === null) {
			$this->initSDeliveryMethodss ();
		}
		if (! $this->collSDeliveryMethodss->contains ( $sDeliveryMethods )) { // only add it if the **same** object is not already associated
			$this->doAddSDeliveryMethods ( $sDeliveryMethods );
			
			$this->collSDeliveryMethodss [] = $sDeliveryMethods;
		}
	}
	
	/**
	 *
	 * @param SDeliveryMethods $sDeliveryMethods
	 *        	The sDeliveryMethods object to add.
	 */
	protected function doAddSDeliveryMethods($sDeliveryMethods) {
		$shopDeliveryMethodsSystems = new ShopDeliveryMethodsSystems ();
		$shopDeliveryMethodsSystems->setSDeliveryMethods ( $sDeliveryMethods );
		$this->addShopDeliveryMethodsSystems ( $shopDeliveryMethodsSystems );
	}
	
	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear() {
		$this->id = null;
		$this->active = null;
		$this->currency_id = null;
		$this->payment_system_name = null;
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
			if ($this->collShopDeliveryMethodsSystemss) {
				foreach ( $this->collShopDeliveryMethodsSystemss as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->collSOrderss) {
				foreach ( $this->collSOrderss as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->collSPaymentMethodsI18ns) {
				foreach ( $this->collSPaymentMethodsI18ns as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->collSDeliveryMethodss) {
				foreach ( $this->collSDeliveryMethodss as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
		} // if ($deep)
		  
		// i18n behavior
		$this->currentLocale = 'ru';
		$this->currentTranslations = null;
		if ($this->collShopDeliveryMethodsSystemss instanceof PropelCollection) {
			$this->collShopDeliveryMethodsSystemss->clearIterator ();
		}
		$this->collShopDeliveryMethodsSystemss = null;
		if ($this->collSOrderss instanceof PropelCollection) {
			$this->collSOrderss->clearIterator ();
		}
		$this->collSOrderss = null;
		if ($this->collSPaymentMethodsI18ns instanceof PropelCollection) {
			$this->collSPaymentMethodsI18ns->clearIterator ();
		}
		$this->collSPaymentMethodsI18ns = null;
		if ($this->collSDeliveryMethodss instanceof PropelCollection) {
			$this->collSDeliveryMethodss->clearIterator ();
		}
		$this->collSDeliveryMethodss = null;
		$this->aCurrency = null;
	}
	
	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString() {
		return ( string ) $this->exportTo ( SPaymentMethodsPeer::DEFAULT_STRING_FORMAT );
	}
	
	// i18n behavior
	
	/**
	 * Sets the locale for translations
	 *
	 * @param string $locale
	 *        	Locale to use for the translation, e.g. 'fr_FR'
	 *        	
	 * @return SPaymentMethods The current object (for fluent API support)
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
	 * @return SPaymentMethodsI18n
	 */
	public function getTranslation($locale = 'ru', PropelPDO $con = null) {
		if (! isset ( $this->currentTranslations [$locale] )) {
			if (null !== $this->collSPaymentMethodsI18ns) {
				foreach ( $this->collSPaymentMethodsI18ns as $translation ) {
					if ($translation->getLocale () == $locale) {
						$this->currentTranslations [$locale] = $translation;
						return $translation;
					}
				}
			}
			if ($this->isNew ()) {
				$translation = new SPaymentMethodsI18n ();
				$translation->setLocale ( $locale );
			} else {
				$translation = SPaymentMethodsI18nQuery::create ()->filterByPrimaryKey ( array (
						$this->getPrimaryKey (),
						$locale 
				) )->findOneOrCreate ( $con );
				$this->currentTranslations [$locale] = $translation;
			}
			$this->addSPaymentMethodsI18n ( $translation );
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
	 * @return SPaymentMethods The current object (for fluent API support)
	 */
	public function removeTranslation($locale = 'ru', PropelPDO $con = null) {
		if (! $this->isNew ()) {
			SPaymentMethodsI18nQuery::create ()->filterByPrimaryKey ( array (
					$this->getPrimaryKey (),
					$locale 
			) )->delete ( $con );
		}
		if (isset ( $this->currentTranslations [$locale] )) {
			unset ( $this->currentTranslations [$locale] );
		}
		foreach ( $this->collSPaymentMethodsI18ns as $key => $translation ) {
			if ($translation->getLocale () == $locale) {
				unset ( $this->collSPaymentMethodsI18ns [$key] );
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
	 * @return SPaymentMethodsI18n
	 */
	public function getCurrentTranslation(PropelPDO $con = null) {
		return $this->getTranslation ( $this->getLocale (), $con );
	}
	
	/**
	 * Get the [name] column value.
	 *
	 * @return string
	 */
	public function getName() {
		return $this->getCurrentTranslation ()->getName ();
	}
	
	/**
	 * Set the value of [name] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SPaymentMethods The current object (for fluent API support)
	 */
	public function setName($v) {
		$this->getCurrentTranslation ()->setName ( $v );
		
		return $this;
	}
	
	/**
	 * Get the [description] column value.
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->getCurrentTranslation ()->getDescription ();
	}
	
	/**
	 * Set the value of [description] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SPaymentMethods The current object (for fluent API support)
	 */
	public function setDescription($v) {
		$this->getCurrentTranslation ()->setDescription ( $v );
		
		return $this;
	}
} // BaseSPaymentMethods
