<?php

/**
 * Base class that represents a row from the 'shop_product_properties' table.
 *
 * 
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSProperties extends ShopBaseObject implements Persistent {
	
	/**
	 * Peer class name
	 */
	const PEER = 'SPropertiesPeer';
	
	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * 
	 * @var SPropertiesPeer
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
	 * The value for the external_id field.
	 * 
	 * @var string
	 */
	protected $external_id;
	
	/**
	 * The value for the csv_name field.
	 * 
	 * @var string
	 */
	protected $csv_name;
	
	/**
	 * The value for the multiple field.
	 * 
	 * @var boolean
	 */
	protected $multiple;
	
	/**
	 * The value for the active field.
	 * 
	 * @var boolean
	 */
	protected $active;
	
	/**
	 * The value for the show_on_site field.
	 * 
	 * @var boolean
	 */
	protected $show_on_site;
	
	/**
	 * The value for the show_in_compare field.
	 * 
	 * @var boolean
	 */
	protected $show_in_compare;
	
	/**
	 * The value for the show_in_filter field.
	 * 
	 * @var boolean
	 */
	protected $show_in_filter;
	
	/**
	 * The value for the show_faq field.
	 * 
	 * @var boolean
	 */
	protected $show_faq;
	
	/**
	 * The value for the main_property field.
	 * 
	 * @var boolean
	 */
	protected $main_property;
	
	/**
	 * The value for the position field.
	 * 
	 * @var int
	 */
	protected $position;
	
	/**
	 *
	 * @var array SPropertiesI18n[] Collection to store aggregation of SPropertiesI18n objects.
	 */
	protected $collSPropertiesI18ns;
	
	/**
	 *
	 * @var array ShopProductPropertiesCategories[] Collection to store aggregation of ShopProductPropertiesCategories objects.
	 */
	protected $collShopProductPropertiesCategoriess;
	
	/**
	 *
	 * @var array SProductPropertiesData[] Collection to store aggregation of SProductPropertiesData objects.
	 */
	protected $collSProductPropertiesDatas;
	
	/**
	 *
	 * @var array SCategory[] Collection to store aggregation of SCategory objects.
	 */
	protected $collPropertyCategorys;
	
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
	 * @var array[SPropertiesI18n]
	 */
	protected $currentTranslations;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $propertyCategorysScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $sPropertiesI18nsScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $shopProductPropertiesCategoriessScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $sProductPropertiesDatasScheduledForDeletion = null;
	
	/**
	 * Get the [id] column value.
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Get the [external_id] column value.
	 *
	 * @return string
	 */
	public function getExternalId() {
		return $this->external_id;
	}
	
	/**
	 * Get the [csv_name] column value.
	 *
	 * @return string
	 */
	public function getCsvName() {
		return $this->csv_name;
	}
	
	/**
	 * Get the [multiple] column value.
	 *
	 * @return boolean
	 */
	public function getMultiple() {
		return $this->multiple;
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
	 * Get the [show_on_site] column value.
	 *
	 * @return boolean
	 */
	public function getShowOnSite() {
		return $this->show_on_site;
	}
	
	/**
	 * Get the [show_in_compare] column value.
	 *
	 * @return boolean
	 */
	public function getShowInCompare() {
		return $this->show_in_compare;
	}
	
	/**
	 * Get the [show_in_filter] column value.
	 *
	 * @return boolean
	 */
	public function getShowInFilter() {
		return $this->show_in_filter;
	}
	
	/**
	 * Get the [show_faq] column value.
	 *
	 * @return boolean
	 */
	public function getShowFaq() {
		return $this->show_faq;
	}
	
	/**
	 * Get the [main_property] column value.
	 *
	 * @return boolean
	 */
	public function getMainProperty() {
		return $this->main_property;
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
	 * @return SProperties The current object (for fluent API support)
	 */
	public function setId($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns [] = SPropertiesPeer::ID;
		}
		
		return $this;
	} // setId()
	
	/**
	 * Set the value of [external_id] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SProperties The current object (for fluent API support)
	 */
	public function setExternalId($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->external_id !== $v) {
			$this->external_id = $v;
			$this->modifiedColumns [] = SPropertiesPeer::EXTERNAL_ID;
		}
		
		return $this;
	} // setExternalId()
	
	/**
	 * Set the value of [csv_name] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SProperties The current object (for fluent API support)
	 */
	public function setCsvName($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->csv_name !== $v) {
			$this->csv_name = $v;
			$this->modifiedColumns [] = SPropertiesPeer::CSV_NAME;
		}
		
		return $this;
	} // setCsvName()
	
	/**
	 * Sets the value of the [multiple] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return SProperties The current object (for fluent API support)
	 */
	public function setMultiple($v) {
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
		
		if ($this->multiple !== $v) {
			$this->multiple = $v;
			$this->modifiedColumns [] = SPropertiesPeer::MULTIPLE;
		}
		
		return $this;
	} // setMultiple()
	
	/**
	 * Sets the value of the [active] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return SProperties The current object (for fluent API support)
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
			$this->modifiedColumns [] = SPropertiesPeer::ACTIVE;
		}
		
		return $this;
	} // setActive()
	
	/**
	 * Sets the value of the [show_on_site] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return SProperties The current object (for fluent API support)
	 */
	public function setShowOnSite($v) {
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
		
		if ($this->show_on_site !== $v) {
			$this->show_on_site = $v;
			$this->modifiedColumns [] = SPropertiesPeer::SHOW_ON_SITE;
		}
		
		return $this;
	} // setShowOnSite()
	
	/**
	 * Sets the value of the [show_in_compare] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return SProperties The current object (for fluent API support)
	 */
	public function setShowInCompare($v) {
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
		
		if ($this->show_in_compare !== $v) {
			$this->show_in_compare = $v;
			$this->modifiedColumns [] = SPropertiesPeer::SHOW_IN_COMPARE;
		}
		
		return $this;
	} // setShowInCompare()
	
	/**
	 * Sets the value of the [show_in_filter] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return SProperties The current object (for fluent API support)
	 */
	public function setShowInFilter($v) {
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
		
		if ($this->show_in_filter !== $v) {
			$this->show_in_filter = $v;
			$this->modifiedColumns [] = SPropertiesPeer::SHOW_IN_FILTER;
		}
		
		return $this;
	} // setShowInFilter()
	
	/**
	 * Sets the value of the [show_faq] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return SProperties The current object (for fluent API support)
	 */
	public function setShowFaq($v) {
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
		
		if ($this->show_faq !== $v) {
			$this->show_faq = $v;
			$this->modifiedColumns [] = SPropertiesPeer::SHOW_FAQ;
		}
		
		return $this;
	} // setShowFaq()
	
	/**
	 * Sets the value of the [main_property] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return SProperties The current object (for fluent API support)
	 */
	public function setMainProperty($v) {
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
		
		if ($this->main_property !== $v) {
			$this->main_property = $v;
			$this->modifiedColumns [] = SPropertiesPeer::MAIN_PROPERTY;
		}
		
		return $this;
	} // setMainProperty()
	
	/**
	 * Set the value of [position] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SProperties The current object (for fluent API support)
	 */
	public function setPosition($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->position !== $v) {
			$this->position = $v;
			$this->modifiedColumns [] = SPropertiesPeer::POSITION;
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
			$this->external_id = ($row [$startcol + 1] !== null) ? ( string ) $row [$startcol + 1] : null;
			$this->csv_name = ($row [$startcol + 2] !== null) ? ( string ) $row [$startcol + 2] : null;
			$this->multiple = ($row [$startcol + 3] !== null) ? ( boolean ) $row [$startcol + 3] : null;
			$this->active = ($row [$startcol + 4] !== null) ? ( boolean ) $row [$startcol + 4] : null;
			$this->show_on_site = ($row [$startcol + 5] !== null) ? ( boolean ) $row [$startcol + 5] : null;
			$this->show_in_compare = ($row [$startcol + 6] !== null) ? ( boolean ) $row [$startcol + 6] : null;
			$this->show_in_filter = ($row [$startcol + 7] !== null) ? ( boolean ) $row [$startcol + 7] : null;
			$this->show_faq = ($row [$startcol + 8] !== null) ? ( boolean ) $row [$startcol + 8] : null;
			$this->main_property = ($row [$startcol + 9] !== null) ? ( boolean ) $row [$startcol + 9] : null;
			$this->position = ($row [$startcol + 10] !== null) ? ( int ) $row [$startcol + 10] : null;
			$this->resetModified ();
			
			$this->setNew ( false );
			
			if ($rehydrate) {
				$this->ensureConsistency ();
			}
			
			return $startcol + 11; // 11 = SPropertiesPeer::NUM_HYDRATE_COLUMNS.
		} catch ( Exception $e ) {
			throw new PropelException ( "Error populating SProperties object", $e );
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
			$con = Propel::getConnection ( SPropertiesPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.
		
		$stmt = SPropertiesPeer::doSelectStmt ( $this->buildPkeyCriteria (), $con );
		$row = $stmt->fetch ( PDO::FETCH_NUM );
		$stmt->closeCursor ();
		if (! $row) {
			throw new PropelException ( 'Cannot find matching row in the database to reload object values.' );
		}
		$this->hydrate ( $row, 0, true ); // rehydrate
		
		if ($deep) { // also de-associate any related objects?
			
			$this->collSPropertiesI18ns = null;
			
			$this->collShopProductPropertiesCategoriess = null;
			
			$this->collSProductPropertiesDatas = null;
			
			$this->collPropertyCategorys = null;
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
			$con = Propel::getConnection ( SPropertiesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		$con->beginTransaction ();
		try {
			$deleteQuery = SPropertiesQuery::create ()->filterByPrimaryKey ( $this->getPrimaryKey () );
			$ret = $this->preDelete ( $con );
			if ($ret) {
				$deleteQuery->delete ( $con );
				$this->postDelete ( $con );
				// i18n behavior
				
				// emulate delete cascade
				SPropertiesI18nQuery::create ()->filterBySProperties ( $this )->delete ( $con );
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
			$con = Propel::getConnection ( SPropertiesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
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
				SPropertiesPeer::addInstanceToPool ( $this );
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
			
			if ($this->propertyCategorysScheduledForDeletion !== null) {
				if (! $this->propertyCategorysScheduledForDeletion->isEmpty ()) {
					ShopProductPropertiesCategoriesQuery::create ()->filterByPrimaryKeys ( $this->propertyCategorysScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->propertyCategorysScheduledForDeletion = null;
				}
				
				foreach ( $this->getPropertyCategorys () as $propertyCategory ) {
					if ($propertyCategory->isModified ()) {
						$propertyCategory->save ( $con );
					}
				}
			}
			
			if ($this->sPropertiesI18nsScheduledForDeletion !== null) {
				if (! $this->sPropertiesI18nsScheduledForDeletion->isEmpty ()) {
					SPropertiesI18nQuery::create ()->filterByPrimaryKeys ( $this->sPropertiesI18nsScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->sPropertiesI18nsScheduledForDeletion = null;
				}
			}
			
			if ($this->collSPropertiesI18ns !== null) {
				foreach ( $this->collSPropertiesI18ns as $referrerFK ) {
					if (! $referrerFK->isDeleted ()) {
						$affectedRows += $referrerFK->save ( $con );
					}
				}
			}
			
			if ($this->shopProductPropertiesCategoriessScheduledForDeletion !== null) {
				if (! $this->shopProductPropertiesCategoriessScheduledForDeletion->isEmpty ()) {
					ShopProductPropertiesCategoriesQuery::create ()->filterByPrimaryKeys ( $this->shopProductPropertiesCategoriessScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->shopProductPropertiesCategoriessScheduledForDeletion = null;
				}
			}
			
			if ($this->collShopProductPropertiesCategoriess !== null) {
				foreach ( $this->collShopProductPropertiesCategoriess as $referrerFK ) {
					if (! $referrerFK->isDeleted ()) {
						$affectedRows += $referrerFK->save ( $con );
					}
				}
			}
			
			if ($this->sProductPropertiesDatasScheduledForDeletion !== null) {
				if (! $this->sProductPropertiesDatasScheduledForDeletion->isEmpty ()) {
					SProductPropertiesDataQuery::create ()->filterByPrimaryKeys ( $this->sProductPropertiesDatasScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->sProductPropertiesDatasScheduledForDeletion = null;
				}
			}
			
			if ($this->collSProductPropertiesDatas !== null) {
				foreach ( $this->collSProductPropertiesDatas as $referrerFK ) {
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
		
		$this->modifiedColumns [] = SPropertiesPeer::ID;
		if (null !== $this->id) {
			throw new PropelException ( 'Cannot insert a value for auto-increment primary key (' . SPropertiesPeer::ID . ')' );
		}
		
		// check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified ( SPropertiesPeer::ID )) {
			$modifiedColumns [':p' . $index ++] = '`ID`';
		}
		if ($this->isColumnModified ( SPropertiesPeer::EXTERNAL_ID )) {
			$modifiedColumns [':p' . $index ++] = '`EXTERNAL_ID`';
		}
		if ($this->isColumnModified ( SPropertiesPeer::CSV_NAME )) {
			$modifiedColumns [':p' . $index ++] = '`CSV_NAME`';
		}
		if ($this->isColumnModified ( SPropertiesPeer::MULTIPLE )) {
			$modifiedColumns [':p' . $index ++] = '`MULTIPLE`';
		}
		if ($this->isColumnModified ( SPropertiesPeer::ACTIVE )) {
			$modifiedColumns [':p' . $index ++] = '`ACTIVE`';
		}
		if ($this->isColumnModified ( SPropertiesPeer::SHOW_ON_SITE )) {
			$modifiedColumns [':p' . $index ++] = '`SHOW_ON_SITE`';
		}
		if ($this->isColumnModified ( SPropertiesPeer::SHOW_IN_COMPARE )) {
			$modifiedColumns [':p' . $index ++] = '`SHOW_IN_COMPARE`';
		}
		if ($this->isColumnModified ( SPropertiesPeer::SHOW_IN_FILTER )) {
			$modifiedColumns [':p' . $index ++] = '`SHOW_IN_FILTER`';
		}
		if ($this->isColumnModified ( SPropertiesPeer::SHOW_FAQ )) {
			$modifiedColumns [':p' . $index ++] = '`SHOW_FAQ`';
		}
		if ($this->isColumnModified ( SPropertiesPeer::MAIN_PROPERTY )) {
			$modifiedColumns [':p' . $index ++] = '`MAIN_PROPERTY`';
		}
		if ($this->isColumnModified ( SPropertiesPeer::POSITION )) {
			$modifiedColumns [':p' . $index ++] = '`POSITION`';
		}
		
		$sql = sprintf ( 'INSERT INTO `shop_product_properties` (%s) VALUES (%s)', implode ( ', ', $modifiedColumns ), implode ( ', ', array_keys ( $modifiedColumns ) ) );
		
		try {
			$stmt = $con->prepare ( $sql );
			foreach ( $modifiedColumns as $identifier => $columnName ) {
				switch ($columnName) {
					case '`ID`' :
						$stmt->bindValue ( $identifier, $this->id, PDO::PARAM_INT );
						break;
					case '`EXTERNAL_ID`' :
						$stmt->bindValue ( $identifier, $this->external_id, PDO::PARAM_STR );
						break;
					case '`CSV_NAME`' :
						$stmt->bindValue ( $identifier, $this->csv_name, PDO::PARAM_STR );
						break;
					case '`MULTIPLE`' :
						$stmt->bindValue ( $identifier, ( int ) $this->multiple, PDO::PARAM_INT );
						break;
					case '`ACTIVE`' :
						$stmt->bindValue ( $identifier, ( int ) $this->active, PDO::PARAM_INT );
						break;
					case '`SHOW_ON_SITE`' :
						$stmt->bindValue ( $identifier, ( int ) $this->show_on_site, PDO::PARAM_INT );
						break;
					case '`SHOW_IN_COMPARE`' :
						$stmt->bindValue ( $identifier, ( int ) $this->show_in_compare, PDO::PARAM_INT );
						break;
					case '`SHOW_IN_FILTER`' :
						$stmt->bindValue ( $identifier, ( int ) $this->show_in_filter, PDO::PARAM_INT );
						break;
					case '`SHOW_FAQ`' :
						$stmt->bindValue ( $identifier, ( int ) $this->show_faq, PDO::PARAM_INT );
						break;
					case '`MAIN_PROPERTY`' :
						$stmt->bindValue ( $identifier, ( int ) $this->main_property, PDO::PARAM_INT );
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
			
			if (($retval = SPropertiesPeer::doValidate ( $this, $columns )) !== true) {
				$failureMap = array_merge ( $failureMap, $retval );
			}
			
			if ($this->collSPropertiesI18ns !== null) {
				foreach ( $this->collSPropertiesI18ns as $referrerFK ) {
					if (! $referrerFK->validate ( $columns )) {
						$failureMap = array_merge ( $failureMap, $referrerFK->getValidationFailures () );
					}
				}
			}
			
			if ($this->collShopProductPropertiesCategoriess !== null) {
				foreach ( $this->collShopProductPropertiesCategoriess as $referrerFK ) {
					if (! $referrerFK->validate ( $columns )) {
						$failureMap = array_merge ( $failureMap, $referrerFK->getValidationFailures () );
					}
				}
			}
			
			if ($this->collSProductPropertiesDatas !== null) {
				foreach ( $this->collSProductPropertiesDatas as $referrerFK ) {
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
		$pos = SPropertiesPeer::translateFieldName ( $name, $type, BasePeer::TYPE_NUM );
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
				return $this->getExternalId ();
				break;
			case 2 :
				return $this->getCsvName ();
				break;
			case 3 :
				return $this->getMultiple ();
				break;
			case 4 :
				return $this->getActive ();
				break;
			case 5 :
				return $this->getShowOnSite ();
				break;
			case 6 :
				return $this->getShowInCompare ();
				break;
			case 7 :
				return $this->getShowInFilter ();
				break;
			case 8 :
				return $this->getShowFaq ();
				break;
			case 9 :
				return $this->getMainProperty ();
				break;
			case 10 :
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
		if (isset ( $alreadyDumpedObjects ['SProperties'] [$this->getPrimaryKey ()] )) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects ['SProperties'] [$this->getPrimaryKey ()] = true;
		$keys = SPropertiesPeer::getFieldNames ( $keyType );
		$result = array (
				$keys [0] => $this->getId (),
				$keys [1] => $this->getExternalId (),
				$keys [2] => $this->getCsvName (),
				$keys [3] => $this->getMultiple (),
				$keys [4] => $this->getActive (),
				$keys [5] => $this->getShowOnSite (),
				$keys [6] => $this->getShowInCompare (),
				$keys [7] => $this->getShowInFilter (),
				$keys [8] => $this->getShowFaq (),
				$keys [9] => $this->getMainProperty (),
				$keys [10] => $this->getPosition () 
		);
		if ($includeForeignObjects) {
			if (null !== $this->collSPropertiesI18ns) {
				$result ['SPropertiesI18ns'] = $this->collSPropertiesI18ns->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
			}
			if (null !== $this->collShopProductPropertiesCategoriess) {
				$result ['ShopProductPropertiesCategoriess'] = $this->collShopProductPropertiesCategoriess->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
			}
			if (null !== $this->collSProductPropertiesDatas) {
				$result ['SProductPropertiesDatas'] = $this->collSProductPropertiesDatas->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
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
		$pos = SPropertiesPeer::translateFieldName ( $name, $type, BasePeer::TYPE_NUM );
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
				$this->setExternalId ( $value );
				break;
			case 2 :
				$this->setCsvName ( $value );
				break;
			case 3 :
				$this->setMultiple ( $value );
				break;
			case 4 :
				$this->setActive ( $value );
				break;
			case 5 :
				$this->setShowOnSite ( $value );
				break;
			case 6 :
				$this->setShowInCompare ( $value );
				break;
			case 7 :
				$this->setShowInFilter ( $value );
				break;
			case 8 :
				$this->setShowFaq ( $value );
				break;
			case 9 :
				$this->setMainProperty ( $value );
				break;
			case 10 :
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
		$keys = SPropertiesPeer::getFieldNames ( $keyType );
		
		if (array_key_exists ( $keys [0], $arr ))
			$this->setId ( $arr [$keys [0]] );
		if (array_key_exists ( $keys [1], $arr ))
			$this->setExternalId ( $arr [$keys [1]] );
		if (array_key_exists ( $keys [2], $arr ))
			$this->setCsvName ( $arr [$keys [2]] );
		if (array_key_exists ( $keys [3], $arr ))
			$this->setMultiple ( $arr [$keys [3]] );
		if (array_key_exists ( $keys [4], $arr ))
			$this->setActive ( $arr [$keys [4]] );
		if (array_key_exists ( $keys [5], $arr ))
			$this->setShowOnSite ( $arr [$keys [5]] );
		if (array_key_exists ( $keys [6], $arr ))
			$this->setShowInCompare ( $arr [$keys [6]] );
		if (array_key_exists ( $keys [7], $arr ))
			$this->setShowInFilter ( $arr [$keys [7]] );
		if (array_key_exists ( $keys [8], $arr ))
			$this->setShowFaq ( $arr [$keys [8]] );
		if (array_key_exists ( $keys [9], $arr ))
			$this->setMainProperty ( $arr [$keys [9]] );
		if (array_key_exists ( $keys [10], $arr ))
			$this->setPosition ( $arr [$keys [10]] );
	}
	
	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria() {
		$criteria = new Criteria ( SPropertiesPeer::DATABASE_NAME );
		
		if ($this->isColumnModified ( SPropertiesPeer::ID ))
			$criteria->add ( SPropertiesPeer::ID, $this->id );
		if ($this->isColumnModified ( SPropertiesPeer::EXTERNAL_ID ))
			$criteria->add ( SPropertiesPeer::EXTERNAL_ID, $this->external_id );
		if ($this->isColumnModified ( SPropertiesPeer::CSV_NAME ))
			$criteria->add ( SPropertiesPeer::CSV_NAME, $this->csv_name );
		if ($this->isColumnModified ( SPropertiesPeer::MULTIPLE ))
			$criteria->add ( SPropertiesPeer::MULTIPLE, $this->multiple );
		if ($this->isColumnModified ( SPropertiesPeer::ACTIVE ))
			$criteria->add ( SPropertiesPeer::ACTIVE, $this->active );
		if ($this->isColumnModified ( SPropertiesPeer::SHOW_ON_SITE ))
			$criteria->add ( SPropertiesPeer::SHOW_ON_SITE, $this->show_on_site );
		if ($this->isColumnModified ( SPropertiesPeer::SHOW_IN_COMPARE ))
			$criteria->add ( SPropertiesPeer::SHOW_IN_COMPARE, $this->show_in_compare );
		if ($this->isColumnModified ( SPropertiesPeer::SHOW_IN_FILTER ))
			$criteria->add ( SPropertiesPeer::SHOW_IN_FILTER, $this->show_in_filter );
		if ($this->isColumnModified ( SPropertiesPeer::SHOW_FAQ ))
			$criteria->add ( SPropertiesPeer::SHOW_FAQ, $this->show_faq );
		if ($this->isColumnModified ( SPropertiesPeer::MAIN_PROPERTY ))
			$criteria->add ( SPropertiesPeer::MAIN_PROPERTY, $this->main_property );
		if ($this->isColumnModified ( SPropertiesPeer::POSITION ))
			$criteria->add ( SPropertiesPeer::POSITION, $this->position );
		
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
		$criteria = new Criteria ( SPropertiesPeer::DATABASE_NAME );
		$criteria->add ( SPropertiesPeer::ID, $this->id );
		
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
	 *        	An object of SProperties (or compatible) type.
	 * @param boolean $deepCopy
	 *        	Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param boolean $makeNew
	 *        	Whether to reset autoincrement PKs and make the object new.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true) {
		$copyObj->setExternalId ( $this->getExternalId () );
		$copyObj->setCsvName ( $this->getCsvName () );
		$copyObj->setMultiple ( $this->getMultiple () );
		$copyObj->setActive ( $this->getActive () );
		$copyObj->setShowOnSite ( $this->getShowOnSite () );
		$copyObj->setShowInCompare ( $this->getShowInCompare () );
		$copyObj->setShowInFilter ( $this->getShowInFilter () );
		$copyObj->setShowFaq ( $this->getShowFaq () );
		$copyObj->setMainProperty ( $this->getMainProperty () );
		$copyObj->setPosition ( $this->getPosition () );
		
		if ($deepCopy && ! $this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew ( false );
			// store object hash to prevent cycle
			$this->startCopy = true;
			
			foreach ( $this->getSPropertiesI18ns () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSPropertiesI18n ( $relObj->copy ( $deepCopy ) );
				}
			}
			
			foreach ( $this->getShopProductPropertiesCategoriess () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addShopProductPropertiesCategories ( $relObj->copy ( $deepCopy ) );
				}
			}
			
			foreach ( $this->getSProductPropertiesDatas () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSProductPropertiesData ( $relObj->copy ( $deepCopy ) );
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
	 * @return SProperties Clone of current object.
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
	 * @return SPropertiesPeer
	 */
	public function getPeer() {
		if (self::$peer === null) {
			self::$peer = new SPropertiesPeer ();
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
		if ('SPropertiesI18n' == $relationName) {
			return $this->initSPropertiesI18ns ();
		}
		if ('ShopProductPropertiesCategories' == $relationName) {
			return $this->initShopProductPropertiesCategoriess ();
		}
		if ('SProductPropertiesData' == $relationName) {
			return $this->initSProductPropertiesDatas ();
		}
	}
	
	/**
	 * Clears out the collSPropertiesI18ns collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addSPropertiesI18ns()
	 */
	public function clearSPropertiesI18ns() {
		$this->collSPropertiesI18ns = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collSPropertiesI18ns collection.
	 *
	 * By default this just sets the collSPropertiesI18ns collection to an empty array (like clearcollSPropertiesI18ns());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initSPropertiesI18ns($overrideExisting = true) {
		if (null !== $this->collSPropertiesI18ns && ! $overrideExisting) {
			return;
		}
		$this->collSPropertiesI18ns = new PropelObjectCollection ();
		$this->collSPropertiesI18ns->setModel ( 'SPropertiesI18n' );
	}
	
	/**
	 * Gets an array of SPropertiesI18n objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SProperties is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array SPropertiesI18n[] List of SPropertiesI18n objects
	 * @throws PropelException
	 */
	public function getSPropertiesI18ns($criteria = null, PropelPDO $con = null) {
		if (null === $this->collSPropertiesI18ns || null !== $criteria) {
			if ($this->isNew () && null === $this->collSPropertiesI18ns) {
				// return empty collection
				$this->initSPropertiesI18ns ();
			} else {
				$collSPropertiesI18ns = SPropertiesI18nQuery::create ( null, $criteria )->filterBySProperties ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collSPropertiesI18ns;
				}
				$this->collSPropertiesI18ns = $collSPropertiesI18ns;
			}
		}
		return $this->collSPropertiesI18ns;
	}
	
	/**
	 * Sets a collection of SPropertiesI18n objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $sPropertiesI18ns
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setSPropertiesI18ns(PropelCollection $sPropertiesI18ns, PropelPDO $con = null) {
		$this->sPropertiesI18nsScheduledForDeletion = $this->getSPropertiesI18ns ( new Criteria (), $con )->diff ( $sPropertiesI18ns );
		
		foreach ( $sPropertiesI18ns as $sPropertiesI18n ) {
			// Fix issue with collection modified by reference
			if ($sPropertiesI18n->isNew ()) {
				$sPropertiesI18n->setSProperties ( $this );
			}
			$this->addSPropertiesI18n ( $sPropertiesI18n );
		}
		
		$this->collSPropertiesI18ns = $sPropertiesI18ns;
	}
	
	/**
	 * Returns the number of related SPropertiesI18n objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related SPropertiesI18n objects.
	 * @throws PropelException
	 */
	public function countSPropertiesI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collSPropertiesI18ns || null !== $criteria) {
			if ($this->isNew () && null === $this->collSPropertiesI18ns) {
				return 0;
			} else {
				$query = SPropertiesI18nQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterBySProperties ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collSPropertiesI18ns );
		}
	}
	
	/**
	 * Method called to associate a SPropertiesI18n object to this object
	 * through the SPropertiesI18n foreign key attribute.
	 *
	 * @param SPropertiesI18n $l
	 *        	SPropertiesI18n
	 * @return SProperties The current object (for fluent API support)
	 */
	public function addSPropertiesI18n(SPropertiesI18n $l) {
		if ($l && $locale = $l->getLocale ()) {
			$this->setLocale ( $locale );
			$this->currentTranslations [$locale] = $l;
		}
		if ($this->collSPropertiesI18ns === null) {
			$this->initSPropertiesI18ns ();
		}
		if (! $this->collSPropertiesI18ns->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddSPropertiesI18n ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param SPropertiesI18n $sPropertiesI18n
	 *        	The sPropertiesI18n object to add.
	 */
	protected function doAddSPropertiesI18n($sPropertiesI18n) {
		$this->collSPropertiesI18ns [] = $sPropertiesI18n;
		$sPropertiesI18n->setSProperties ( $this );
	}
	
	/**
	 * Clears out the collShopProductPropertiesCategoriess collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addShopProductPropertiesCategoriess()
	 */
	public function clearShopProductPropertiesCategoriess() {
		$this->collShopProductPropertiesCategoriess = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collShopProductPropertiesCategoriess collection.
	 *
	 * By default this just sets the collShopProductPropertiesCategoriess collection to an empty array (like clearcollShopProductPropertiesCategoriess());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initShopProductPropertiesCategoriess($overrideExisting = true) {
		if (null !== $this->collShopProductPropertiesCategoriess && ! $overrideExisting) {
			return;
		}
		$this->collShopProductPropertiesCategoriess = new PropelObjectCollection ();
		$this->collShopProductPropertiesCategoriess->setModel ( 'ShopProductPropertiesCategories' );
	}
	
	/**
	 * Gets an array of ShopProductPropertiesCategories objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SProperties is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array ShopProductPropertiesCategories[] List of ShopProductPropertiesCategories objects
	 * @throws PropelException
	 */
	public function getShopProductPropertiesCategoriess($criteria = null, PropelPDO $con = null) {
		if (null === $this->collShopProductPropertiesCategoriess || null !== $criteria) {
			if ($this->isNew () && null === $this->collShopProductPropertiesCategoriess) {
				// return empty collection
				$this->initShopProductPropertiesCategoriess ();
			} else {
				$collShopProductPropertiesCategoriess = ShopProductPropertiesCategoriesQuery::create ( null, $criteria )->filterByProperty ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collShopProductPropertiesCategoriess;
				}
				$this->collShopProductPropertiesCategoriess = $collShopProductPropertiesCategoriess;
			}
		}
		return $this->collShopProductPropertiesCategoriess;
	}
	
	/**
	 * Sets a collection of ShopProductPropertiesCategories objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $shopProductPropertiesCategoriess
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setShopProductPropertiesCategoriess(PropelCollection $shopProductPropertiesCategoriess, PropelPDO $con = null) {
		$this->shopProductPropertiesCategoriessScheduledForDeletion = $this->getShopProductPropertiesCategoriess ( new Criteria (), $con )->diff ( $shopProductPropertiesCategoriess );
		
		foreach ( $shopProductPropertiesCategoriess as $shopProductPropertiesCategories ) {
			// Fix issue with collection modified by reference
			if ($shopProductPropertiesCategories->isNew ()) {
				$shopProductPropertiesCategories->setProperty ( $this );
			}
			$this->addShopProductPropertiesCategories ( $shopProductPropertiesCategories );
		}
		
		$this->collShopProductPropertiesCategoriess = $shopProductPropertiesCategoriess;
	}
	
	/**
	 * Returns the number of related ShopProductPropertiesCategories objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related ShopProductPropertiesCategories objects.
	 * @throws PropelException
	 */
	public function countShopProductPropertiesCategoriess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collShopProductPropertiesCategoriess || null !== $criteria) {
			if ($this->isNew () && null === $this->collShopProductPropertiesCategoriess) {
				return 0;
			} else {
				$query = ShopProductPropertiesCategoriesQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterByProperty ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collShopProductPropertiesCategoriess );
		}
	}
	
	/**
	 * Method called to associate a ShopProductPropertiesCategories object to this object
	 * through the ShopProductPropertiesCategories foreign key attribute.
	 *
	 * @param ShopProductPropertiesCategories $l
	 *        	ShopProductPropertiesCategories
	 * @return SProperties The current object (for fluent API support)
	 */
	public function addShopProductPropertiesCategories(ShopProductPropertiesCategories $l) {
		if ($this->collShopProductPropertiesCategoriess === null) {
			$this->initShopProductPropertiesCategoriess ();
		}
		if (! $this->collShopProductPropertiesCategoriess->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddShopProductPropertiesCategories ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param ShopProductPropertiesCategories $shopProductPropertiesCategories
	 *        	The shopProductPropertiesCategories object to add.
	 */
	protected function doAddShopProductPropertiesCategories($shopProductPropertiesCategories) {
		$this->collShopProductPropertiesCategoriess [] = $shopProductPropertiesCategories;
		$shopProductPropertiesCategories->setProperty ( $this );
	}
	
	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SProperties is new, it will return
	 * an empty collection; or if this SProperties has previously
	 * been saved, it will retrieve related ShopProductPropertiesCategoriess from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable. You can provide public methods for those you
	 * actually need in SProperties.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @param string $join_behavior
	 *        	optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return PropelCollection|array ShopProductPropertiesCategories[] List of ShopProductPropertiesCategories objects
	 */
	public function getShopProductPropertiesCategoriessJoinPropertyCategory($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$query = ShopProductPropertiesCategoriesQuery::create ( null, $criteria );
		$query->joinWith ( 'PropertyCategory', $join_behavior );
		
		return $this->getShopProductPropertiesCategoriess ( $query, $con );
	}
	
	/**
	 * Clears out the collSProductPropertiesDatas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addSProductPropertiesDatas()
	 */
	public function clearSProductPropertiesDatas() {
		$this->collSProductPropertiesDatas = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collSProductPropertiesDatas collection.
	 *
	 * By default this just sets the collSProductPropertiesDatas collection to an empty array (like clearcollSProductPropertiesDatas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initSProductPropertiesDatas($overrideExisting = true) {
		if (null !== $this->collSProductPropertiesDatas && ! $overrideExisting) {
			return;
		}
		$this->collSProductPropertiesDatas = new PropelObjectCollection ();
		$this->collSProductPropertiesDatas->setModel ( 'SProductPropertiesData' );
	}
	
	/**
	 * Gets an array of SProductPropertiesData objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SProperties is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array SProductPropertiesData[] List of SProductPropertiesData objects
	 * @throws PropelException
	 */
	public function getSProductPropertiesDatas($criteria = null, PropelPDO $con = null) {
		if (null === $this->collSProductPropertiesDatas || null !== $criteria) {
			if ($this->isNew () && null === $this->collSProductPropertiesDatas) {
				// return empty collection
				$this->initSProductPropertiesDatas ();
			} else {
				$collSProductPropertiesDatas = SProductPropertiesDataQuery::create ( null, $criteria )->filterBySProperties ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collSProductPropertiesDatas;
				}
				$this->collSProductPropertiesDatas = $collSProductPropertiesDatas;
			}
		}
		return $this->collSProductPropertiesDatas;
	}
	
	/**
	 * Sets a collection of SProductPropertiesData objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $sProductPropertiesDatas
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setSProductPropertiesDatas(PropelCollection $sProductPropertiesDatas, PropelPDO $con = null) {
		$this->sProductPropertiesDatasScheduledForDeletion = $this->getSProductPropertiesDatas ( new Criteria (), $con )->diff ( $sProductPropertiesDatas );
		
		foreach ( $sProductPropertiesDatas as $sProductPropertiesData ) {
			// Fix issue with collection modified by reference
			if ($sProductPropertiesData->isNew ()) {
				$sProductPropertiesData->setSProperties ( $this );
			}
			$this->addSProductPropertiesData ( $sProductPropertiesData );
		}
		
		$this->collSProductPropertiesDatas = $sProductPropertiesDatas;
	}
	
	/**
	 * Returns the number of related SProductPropertiesData objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related SProductPropertiesData objects.
	 * @throws PropelException
	 */
	public function countSProductPropertiesDatas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collSProductPropertiesDatas || null !== $criteria) {
			if ($this->isNew () && null === $this->collSProductPropertiesDatas) {
				return 0;
			} else {
				$query = SProductPropertiesDataQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterBySProperties ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collSProductPropertiesDatas );
		}
	}
	
	/**
	 * Method called to associate a SProductPropertiesData object to this object
	 * through the SProductPropertiesData foreign key attribute.
	 *
	 * @param SProductPropertiesData $l
	 *        	SProductPropertiesData
	 * @return SProperties The current object (for fluent API support)
	 */
	public function addSProductPropertiesData(SProductPropertiesData $l) {
		if ($this->collSProductPropertiesDatas === null) {
			$this->initSProductPropertiesDatas ();
		}
		if (! $this->collSProductPropertiesDatas->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddSProductPropertiesData ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param SProductPropertiesData $sProductPropertiesData
	 *        	The sProductPropertiesData object to add.
	 */
	protected function doAddSProductPropertiesData($sProductPropertiesData) {
		$this->collSProductPropertiesDatas [] = $sProductPropertiesData;
		$sProductPropertiesData->setSProperties ( $this );
	}
	
	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SProperties is new, it will return
	 * an empty collection; or if this SProperties has previously
	 * been saved, it will retrieve related SProductPropertiesDatas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable. You can provide public methods for those you
	 * actually need in SProperties.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @param string $join_behavior
	 *        	optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return PropelCollection|array SProductPropertiesData[] List of SProductPropertiesData objects
	 */
	public function getSProductPropertiesDatasJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$query = SProductPropertiesDataQuery::create ( null, $criteria );
		$query->joinWith ( 'Product', $join_behavior );
		
		return $this->getSProductPropertiesDatas ( $query, $con );
	}
	
	/**
	 * Clears out the collPropertyCategorys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addPropertyCategorys()
	 */
	public function clearPropertyCategorys() {
		$this->collPropertyCategorys = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collPropertyCategorys collection.
	 *
	 * By default this just sets the collPropertyCategorys collection to an empty collection (like clearPropertyCategorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return void
	 */
	public function initPropertyCategorys() {
		$this->collPropertyCategorys = new PropelObjectCollection ();
		$this->collPropertyCategorys->setModel ( 'SCategory' );
	}
	
	/**
	 * Gets a collection of SCategory objects related by a many-to-many relationship
	 * to the current object by way of the shop_product_properties_categories cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SProperties is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	Optional query object to filter the query
	 * @param PropelPDO $con
	 *        	Optional connection object
	 *        	
	 * @return PropelCollection|array SCategory[] List of SCategory objects
	 */
	public function getPropertyCategorys($criteria = null, PropelPDO $con = null) {
		if (null === $this->collPropertyCategorys || null !== $criteria) {
			if ($this->isNew () && null === $this->collPropertyCategorys) {
				// return empty collection
				$this->initPropertyCategorys ();
			} else {
				$collPropertyCategorys = SCategoryQuery::create ( null, $criteria )->filterByProperty ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collPropertyCategorys;
				}
				$this->collPropertyCategorys = $collPropertyCategorys;
			}
		}
		return $this->collPropertyCategorys;
	}
	
	/**
	 * Sets a collection of SCategory objects related by a many-to-many relationship
	 * to the current object by way of the shop_product_properties_categories cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $propertyCategorys
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setPropertyCategorys(PropelCollection $propertyCategorys, PropelPDO $con = null) {
		$shopProductPropertiesCategoriess = ShopProductPropertiesCategoriesQuery::create ()->filterBySCategory ( $propertyCategorys )->filterByProperty ( $this )->find ( $con );
		
		$this->propertyCategorysScheduledForDeletion = $this->getShopProductPropertiesCategoriess ()->diff ( $shopProductPropertiesCategoriess );
		$this->collShopProductPropertiesCategoriess = $shopProductPropertiesCategoriess;
		
		foreach ( $propertyCategorys as $propertyCategory ) {
			// Fix issue with collection modified by reference
			if ($propertyCategory->isNew ()) {
				$this->doAddSCategory ( $propertyCategory );
			} else {
				$this->addSCategory ( $propertyCategory );
			}
		}
		
		$this->collPropertyCategorys = $propertyCategorys;
	}
	
	/**
	 * Gets the number of SCategory objects related by a many-to-many relationship
	 * to the current object by way of the shop_product_properties_categories cross-reference table.
	 *
	 * @param Criteria $criteria
	 *        	Optional query object to filter the query
	 * @param boolean $distinct
	 *        	Set to true to force count distinct
	 * @param PropelPDO $con
	 *        	Optional connection object
	 *        	
	 * @return int the number of related SCategory objects
	 */
	public function countPropertyCategorys($criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collPropertyCategorys || null !== $criteria) {
			if ($this->isNew () && null === $this->collPropertyCategorys) {
				return 0;
			} else {
				$query = SCategoryQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterByProperty ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collPropertyCategorys );
		}
	}
	
	/**
	 * Associate a SCategory object to this object
	 * through the shop_product_properties_categories cross reference table.
	 *
	 * @param SCategory $sCategory
	 *        	The ShopProductPropertiesCategories object to relate
	 * @return void
	 */
	public function addPropertyCategory(SCategory $sCategory) {
		if ($this->collPropertyCategorys === null) {
			$this->initPropertyCategorys ();
		}
		if (! $this->collPropertyCategorys->contains ( $sCategory )) { // only add it if the **same** object is not already associated
			$this->doAddPropertyCategory ( $sCategory );
			
			$this->collPropertyCategorys [] = $sCategory;
		}
	}
	
	/**
	 *
	 * @param PropertyCategory $propertyCategory
	 *        	The propertyCategory object to add.
	 */
	protected function doAddPropertyCategory($propertyCategory) {
		$shopProductPropertiesCategories = new ShopProductPropertiesCategories ();
		$shopProductPropertiesCategories->setPropertyCategory ( $propertyCategory );
		$this->addShopProductPropertiesCategories ( $shopProductPropertiesCategories );
	}
	
	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear() {
		$this->id = null;
		$this->external_id = null;
		$this->csv_name = null;
		$this->multiple = null;
		$this->active = null;
		$this->show_on_site = null;
		$this->show_in_compare = null;
		$this->show_in_filter = null;
		$this->show_faq = null;
		$this->main_property = null;
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
			if ($this->collSPropertiesI18ns) {
				foreach ( $this->collSPropertiesI18ns as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->collShopProductPropertiesCategoriess) {
				foreach ( $this->collShopProductPropertiesCategoriess as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->collSProductPropertiesDatas) {
				foreach ( $this->collSProductPropertiesDatas as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->collPropertyCategorys) {
				foreach ( $this->collPropertyCategorys as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
		} // if ($deep)
		  
		// i18n behavior
		$this->currentLocale = 'ru';
		$this->currentTranslations = null;
		if ($this->collSPropertiesI18ns instanceof PropelCollection) {
			$this->collSPropertiesI18ns->clearIterator ();
		}
		$this->collSPropertiesI18ns = null;
		if ($this->collShopProductPropertiesCategoriess instanceof PropelCollection) {
			$this->collShopProductPropertiesCategoriess->clearIterator ();
		}
		$this->collShopProductPropertiesCategoriess = null;
		if ($this->collSProductPropertiesDatas instanceof PropelCollection) {
			$this->collSProductPropertiesDatas->clearIterator ();
		}
		$this->collSProductPropertiesDatas = null;
		if ($this->collPropertyCategorys instanceof PropelCollection) {
			$this->collPropertyCategorys->clearIterator ();
		}
		$this->collPropertyCategorys = null;
	}
	
	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString() {
		return ( string ) $this->exportTo ( SPropertiesPeer::DEFAULT_STRING_FORMAT );
	}
	
	// i18n behavior
	
	/**
	 * Sets the locale for translations
	 *
	 * @param string $locale
	 *        	Locale to use for the translation, e.g. 'fr_FR'
	 *        	
	 * @return SProperties The current object (for fluent API support)
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
	 * @return SPropertiesI18n
	 */
	public function getTranslation($locale = 'ru', PropelPDO $con = null) {
		if (! isset ( $this->currentTranslations [$locale] )) {
			if (null !== $this->collSPropertiesI18ns) {
				foreach ( $this->collSPropertiesI18ns as $translation ) {
					if ($translation->getLocale () == $locale) {
						$this->currentTranslations [$locale] = $translation;
						return $translation;
					}
				}
			}
			if ($this->isNew ()) {
				$translation = new SPropertiesI18n ();
				$translation->setLocale ( $locale );
			} else {
				$translation = SPropertiesI18nQuery::create ()->filterByPrimaryKey ( array (
						$this->getPrimaryKey (),
						$locale 
				) )->findOneOrCreate ( $con );
				$this->currentTranslations [$locale] = $translation;
			}
			$this->addSPropertiesI18n ( $translation );
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
	 * @return SProperties The current object (for fluent API support)
	 */
	public function removeTranslation($locale = 'ru', PropelPDO $con = null) {
		if (! $this->isNew ()) {
			SPropertiesI18nQuery::create ()->filterByPrimaryKey ( array (
					$this->getPrimaryKey (),
					$locale 
			) )->delete ( $con );
		}
		if (isset ( $this->currentTranslations [$locale] )) {
			unset ( $this->currentTranslations [$locale] );
		}
		foreach ( $this->collSPropertiesI18ns as $key => $translation ) {
			if ($translation->getLocale () == $locale) {
				unset ( $this->collSPropertiesI18ns [$key] );
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
	 * @return SPropertiesI18n
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
	 * @return SProperties The current object (for fluent API support)
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
	 * @return SProperties The current object (for fluent API support)
	 */
	public function setDescription($v) {
		$this->getCurrentTranslation ()->setDescription ( $v );
		
		return $this;
	}
} // BaseSProperties
