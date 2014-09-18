<?php


/**
 * Base class that represents a row from the 'shop_category' table.
 *
 * 
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSCategory extends ShopBaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'SCategoryPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SCategoryPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the external_id field.
	 * @var        string
	 */
	protected $external_id;

	/**
	 * The value for the url field.
	 * @var        string
	 */
	protected $url;

	/**
	 * The value for the active field.
	 * @var        boolean
	 */
	protected $active;

	/**
	 * The value for the image field.
	 * @var        string
	 */
	protected $image;

	/**
	 * The value for the parent_id field.
	 * @var        int
	 */
	protected $parent_id;

	/**
	 * The value for the position field.
	 * @var        int
	 */
	protected $position;

	/**
	 * The value for the full_path field.
	 * @var        string
	 */
	protected $full_path;

	/**
	 * The value for the full_path_ids field.
	 * @var        string
	 */
	protected $full_path_ids;

	/**
	 * The value for the tpl field.
	 * @var        string
	 */
	protected $tpl;

	/**
	 * The value for the order_method field.
	 * @var        int
	 */
	protected $order_method;

	/**
	 * The value for the showsitetitle field.
	 * @var        int
	 */
	protected $showsitetitle;

	/**
	 * @var        SCategory
	 */
	protected $aSCategory;

	/**
	 * @var        array SCategory[] Collection to store aggregation of SCategory objects.
	 */
	protected $collSCategorysRelatedById;

	/**
	 * @var        array SCategoryI18n[] Collection to store aggregation of SCategoryI18n objects.
	 */
	protected $collSCategoryI18ns;

	/**
	 * @var        array SProducts[] Collection to store aggregation of SProducts objects.
	 */
	protected $collSProductss;

	/**
	 * @var        array ShopProductCategories[] Collection to store aggregation of ShopProductCategories objects.
	 */
	protected $collShopProductCategoriess;

	/**
	 * @var        array ShopProductPropertiesCategories[] Collection to store aggregation of ShopProductPropertiesCategories objects.
	 */
	protected $collShopProductPropertiesCategoriess;

	/**
	 * @var        array SProducts[] Collection to store aggregation of SProducts objects.
	 */
	protected $collProducts;

	/**
	 * @var        array SProperties[] Collection to store aggregation of SProperties objects.
	 */
	protected $collPropertys;

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

	// i18n behavior
	
	/**
	 * Current locale
	 * @var        string
	 */
	protected $currentLocale = 'ru';
	
	/**
	 * Current translation objects
	 * @var        array[SCategoryI18n]
	 */
	protected $currentTranslations;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $productsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $propertysScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $sCategorysRelatedByIdScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $sCategoryI18nsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $sProductssScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $shopProductCategoriessScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $shopProductPropertiesCategoriessScheduledForDeletion = null;

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [external_id] column value.
	 * 
	 * @return     string
	 */
	public function getExternalId()
	{
		return $this->external_id;
	}

	/**
	 * Get the [url] column value.
	 * 
	 * @return     string
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * Get the [active] column value.
	 * 
	 * @return     boolean
	 */
	public function getActive()
	{
		return $this->active;
	}

	/**
	 * Get the [image] column value.
	 * 
	 * @return     string
	 */
	public function getImage()
	{
		return $this->image;
	}

	/**
	 * Get the [parent_id] column value.
	 * 
	 * @return     int
	 */
	public function getParentId()
	{
		return $this->parent_id;
	}

	/**
	 * Get the [position] column value.
	 * 
	 * @return     int
	 */
	public function getPosition()
	{
		return $this->position;
	}

	/**
	 * Get the [full_path] column value.
	 * 
	 * @return     string
	 */
	public function getFullPath()
	{
		return $this->full_path;
	}

	/**
	 * Get the [full_path_ids] column value.
	 * 
	 * @return     string
	 */
	public function getFullPathIds()
	{
		return $this->full_path_ids;
	}

	/**
	 * Get the [tpl] column value.
	 * 
	 * @return     string
	 */
	public function getTpl()
	{
		return $this->tpl;
	}

	/**
	 * Get the [order_method] column value.
	 * 
	 * @return     int
	 */
	public function getOrderMethod()
	{
		return $this->order_method;
	}

	/**
	 * Get the [showsitetitle] column value.
	 * 
	 * @return     int
	 */
	public function getShowsitetitle()
	{
		return $this->showsitetitle;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SCategoryPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [external_id] column.
	 * 
	 * @param      string $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setExternalId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->external_id !== $v) {
			$this->external_id = $v;
			$this->modifiedColumns[] = SCategoryPeer::EXTERNAL_ID;
		}

		return $this;
	} // setExternalId()

	/**
	 * Set the value of [url] column.
	 * 
	 * @param      string $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setUrl($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->url !== $v) {
			$this->url = $v;
			$this->modifiedColumns[] = SCategoryPeer::URL;
		}

		return $this;
	} // setUrl()

	/**
	 * Sets the value of the [active] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setActive($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = SCategoryPeer::ACTIVE;
		}

		return $this;
	} // setActive()

	/**
	 * Set the value of [image] column.
	 * 
	 * @param      string $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setImage($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->image !== $v) {
			$this->image = $v;
			$this->modifiedColumns[] = SCategoryPeer::IMAGE;
		}

		return $this;
	} // setImage()

	/**
	 * Set the value of [parent_id] column.
	 * 
	 * @param      int $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setParentId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->parent_id !== $v) {
			$this->parent_id = $v;
			$this->modifiedColumns[] = SCategoryPeer::PARENT_ID;
		}

		if ($this->aSCategory !== null && $this->aSCategory->getId() !== $v) {
			$this->aSCategory = null;
		}

		return $this;
	} // setParentId()

	/**
	 * Set the value of [position] column.
	 * 
	 * @param      int $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setPosition($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->position !== $v) {
			$this->position = $v;
			$this->modifiedColumns[] = SCategoryPeer::POSITION;
		}

		return $this;
	} // setPosition()

	/**
	 * Set the value of [full_path] column.
	 * 
	 * @param      string $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setFullPath($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->full_path !== $v) {
			$this->full_path = $v;
			$this->modifiedColumns[] = SCategoryPeer::FULL_PATH;
		}

		return $this;
	} // setFullPath()

	/**
	 * Set the value of [full_path_ids] column.
	 * 
	 * @param      string $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setFullPathIds($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->full_path_ids !== $v) {
			$this->full_path_ids = $v;
			$this->modifiedColumns[] = SCategoryPeer::FULL_PATH_IDS;
		}

		return $this;
	} // setFullPathIds()

	/**
	 * Set the value of [tpl] column.
	 * 
	 * @param      string $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setTpl($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tpl !== $v) {
			$this->tpl = $v;
			$this->modifiedColumns[] = SCategoryPeer::TPL;
		}

		return $this;
	} // setTpl()

	/**
	 * Set the value of [order_method] column.
	 * 
	 * @param      int $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setOrderMethod($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->order_method !== $v) {
			$this->order_method = $v;
			$this->modifiedColumns[] = SCategoryPeer::ORDER_METHOD;
		}

		return $this;
	} // setOrderMethod()

	/**
	 * Set the value of [showsitetitle] column.
	 * 
	 * @param      int $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setShowsitetitle($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->showsitetitle !== $v) {
			$this->showsitetitle = $v;
			$this->modifiedColumns[] = SCategoryPeer::SHOWSITETITLE;
		}

		return $this;
	} // setShowsitetitle()

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

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->external_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->url = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->active = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->image = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->parent_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->position = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->full_path = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->full_path_ids = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->tpl = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->order_method = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->showsitetitle = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 12; // 12 = SCategoryPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating SCategory object", $e);
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

		if ($this->aSCategory !== null && $this->parent_id !== $this->aSCategory->getId()) {
			$this->aSCategory = null;
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
			$con = Propel::getConnection(SCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SCategoryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSCategory = null;
			$this->collSCategorysRelatedById = null;

			$this->collSCategoryI18ns = null;

			$this->collSProductss = null;

			$this->collShopProductCategoriess = null;

			$this->collShopProductPropertiesCategoriess = null;

			$this->collProducts = null;
			$this->collPropertys = null;
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
			$con = Propel::getConnection(SCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = SCategoryQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				// i18n behavior
				
				// emulate delete cascade
				SCategoryI18nQuery::create()
					->filterBySCategory($this)
					->delete($con);
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
			$con = Propel::getConnection(SCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				SCategoryPeer::addInstanceToPool($this);
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

			if ($this->aSCategory !== null) {
				if ($this->aSCategory->isModified() || $this->aSCategory->isNew()) {
					$affectedRows += $this->aSCategory->save($con);
				}
				$this->setSCategory($this->aSCategory);
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

			if ($this->productsScheduledForDeletion !== null) {
				if (!$this->productsScheduledForDeletion->isEmpty()) {
					ShopProductCategoriesQuery::create()
						->filterByPrimaryKeys($this->productsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->productsScheduledForDeletion = null;
				}

				foreach ($this->getProducts() as $product) {
					if ($product->isModified()) {
						$product->save($con);
					}
				}
			}

			if ($this->propertysScheduledForDeletion !== null) {
				if (!$this->propertysScheduledForDeletion->isEmpty()) {
					ShopProductPropertiesCategoriesQuery::create()
						->filterByPrimaryKeys($this->propertysScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->propertysScheduledForDeletion = null;
				}

				foreach ($this->getPropertys() as $property) {
					if ($property->isModified()) {
						$property->save($con);
					}
				}
			}

			if ($this->sCategorysRelatedByIdScheduledForDeletion !== null) {
				if (!$this->sCategorysRelatedByIdScheduledForDeletion->isEmpty()) {
					SCategoryQuery::create()
						->filterByPrimaryKeys($this->sCategorysRelatedByIdScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->sCategorysRelatedByIdScheduledForDeletion = null;
				}
			}

			if ($this->collSCategorysRelatedById !== null) {
				foreach ($this->collSCategorysRelatedById as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->sCategoryI18nsScheduledForDeletion !== null) {
				if (!$this->sCategoryI18nsScheduledForDeletion->isEmpty()) {
					SCategoryI18nQuery::create()
						->filterByPrimaryKeys($this->sCategoryI18nsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->sCategoryI18nsScheduledForDeletion = null;
				}
			}

			if ($this->collSCategoryI18ns !== null) {
				foreach ($this->collSCategoryI18ns as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->sProductssScheduledForDeletion !== null) {
				if (!$this->sProductssScheduledForDeletion->isEmpty()) {
					SProductsQuery::create()
						->filterByPrimaryKeys($this->sProductssScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->sProductssScheduledForDeletion = null;
				}
			}

			if ($this->collSProductss !== null) {
				foreach ($this->collSProductss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->shopProductCategoriessScheduledForDeletion !== null) {
				if (!$this->shopProductCategoriessScheduledForDeletion->isEmpty()) {
					ShopProductCategoriesQuery::create()
						->filterByPrimaryKeys($this->shopProductCategoriessScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->shopProductCategoriessScheduledForDeletion = null;
				}
			}

			if ($this->collShopProductCategoriess !== null) {
				foreach ($this->collShopProductCategoriess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->shopProductPropertiesCategoriessScheduledForDeletion !== null) {
				if (!$this->shopProductPropertiesCategoriessScheduledForDeletion->isEmpty()) {
					ShopProductPropertiesCategoriesQuery::create()
						->filterByPrimaryKeys($this->shopProductPropertiesCategoriessScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->shopProductPropertiesCategoriessScheduledForDeletion = null;
				}
			}

			if ($this->collShopProductPropertiesCategoriess !== null) {
				foreach ($this->collShopProductPropertiesCategoriess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
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
	 * @param      PropelPDO $con
	 *
	 * @throws     PropelException
	 * @see        doSave()
	 */
	protected function doInsert(PropelPDO $con)
	{
		$modifiedColumns = array();
		$index = 0;

		$this->modifiedColumns[] = SCategoryPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . SCategoryPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(SCategoryPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(SCategoryPeer::EXTERNAL_ID)) {
			$modifiedColumns[':p' . $index++]  = '`EXTERNAL_ID`';
		}
		if ($this->isColumnModified(SCategoryPeer::URL)) {
			$modifiedColumns[':p' . $index++]  = '`URL`';
		}
		if ($this->isColumnModified(SCategoryPeer::ACTIVE)) {
			$modifiedColumns[':p' . $index++]  = '`ACTIVE`';
		}
		if ($this->isColumnModified(SCategoryPeer::IMAGE)) {
			$modifiedColumns[':p' . $index++]  = '`IMAGE`';
		}
		if ($this->isColumnModified(SCategoryPeer::PARENT_ID)) {
			$modifiedColumns[':p' . $index++]  = '`PARENT_ID`';
		}
		if ($this->isColumnModified(SCategoryPeer::POSITION)) {
			$modifiedColumns[':p' . $index++]  = '`POSITION`';
		}
		if ($this->isColumnModified(SCategoryPeer::FULL_PATH)) {
			$modifiedColumns[':p' . $index++]  = '`FULL_PATH`';
		}
		if ($this->isColumnModified(SCategoryPeer::FULL_PATH_IDS)) {
			$modifiedColumns[':p' . $index++]  = '`FULL_PATH_IDS`';
		}
		if ($this->isColumnModified(SCategoryPeer::TPL)) {
			$modifiedColumns[':p' . $index++]  = '`TPL`';
		}
		if ($this->isColumnModified(SCategoryPeer::ORDER_METHOD)) {
			$modifiedColumns[':p' . $index++]  = '`ORDER_METHOD`';
		}
		if ($this->isColumnModified(SCategoryPeer::SHOWSITETITLE)) {
			$modifiedColumns[':p' . $index++]  = '`SHOWSITETITLE`';
		}

		$sql = sprintf(
			'INSERT INTO `shop_category` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ID`':						
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
						break;
					case '`EXTERNAL_ID`':						
						$stmt->bindValue($identifier, $this->external_id, PDO::PARAM_STR);
						break;
					case '`URL`':						
						$stmt->bindValue($identifier, $this->url, PDO::PARAM_STR);
						break;
					case '`ACTIVE`':
						$stmt->bindValue($identifier, (int) $this->active, PDO::PARAM_INT);
						break;
					case '`IMAGE`':						
						$stmt->bindValue($identifier, $this->image, PDO::PARAM_STR);
						break;
					case '`PARENT_ID`':						
						$stmt->bindValue($identifier, $this->parent_id, PDO::PARAM_INT);
						break;
					case '`POSITION`':						
						$stmt->bindValue($identifier, $this->position, PDO::PARAM_INT);
						break;
					case '`FULL_PATH`':						
						$stmt->bindValue($identifier, $this->full_path, PDO::PARAM_STR);
						break;
					case '`FULL_PATH_IDS`':						
						$stmt->bindValue($identifier, $this->full_path_ids, PDO::PARAM_STR);
						break;
					case '`TPL`':						
						$stmt->bindValue($identifier, $this->tpl, PDO::PARAM_STR);
						break;
					case '`ORDER_METHOD`':						
						$stmt->bindValue($identifier, $this->order_method, PDO::PARAM_INT);
						break;
					case '`SHOWSITETITLE`':						
						$stmt->bindValue($identifier, $this->showsitetitle, PDO::PARAM_INT);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

		try {
			$pk = $con->lastInsertId();
		} catch (Exception $e) {
			throw new PropelException('Unable to get autoincrement id.', $e);
		}
		$this->setId($pk);

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

			if ($this->aSCategory !== null) {
				if (!$this->aSCategory->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSCategory->getValidationFailures());
				}
			}


			if (($retval = SCategoryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collSCategorysRelatedById !== null) {
					foreach ($this->collSCategorysRelatedById as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSCategoryI18ns !== null) {
					foreach ($this->collSCategoryI18ns as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSProductss !== null) {
					foreach ($this->collSProductss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collShopProductCategoriess !== null) {
					foreach ($this->collShopProductCategoriess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collShopProductPropertiesCategoriess !== null) {
					foreach ($this->collShopProductPropertiesCategoriess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = SCategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getId();
				break;
			case 1:
				return $this->getExternalId();
				break;
			case 2:
				return $this->getUrl();
				break;
			case 3:
				return $this->getActive();
				break;
			case 4:
				return $this->getImage();
				break;
			case 5:
				return $this->getParentId();
				break;
			case 6:
				return $this->getPosition();
				break;
			case 7:
				return $this->getFullPath();
				break;
			case 8:
				return $this->getFullPathIds();
				break;
			case 9:
				return $this->getTpl();
				break;
			case 10:
				return $this->getOrderMethod();
				break;
			case 11:
				return $this->getShowsitetitle();
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
		if (isset($alreadyDumpedObjects['SCategory'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['SCategory'][$this->getPrimaryKey()] = true;
		$keys = SCategoryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getExternalId(),
			$keys[2] => $this->getUrl(),
			$keys[3] => $this->getActive(),
			$keys[4] => $this->getImage(),
			$keys[5] => $this->getParentId(),
			$keys[6] => $this->getPosition(),
			$keys[7] => $this->getFullPath(),
			$keys[8] => $this->getFullPathIds(),
			$keys[9] => $this->getTpl(),
			$keys[10] => $this->getOrderMethod(),
			$keys[11] => $this->getShowsitetitle(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aSCategory) {
				$result['SCategory'] = $this->aSCategory->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collSCategorysRelatedById) {
				$result['SCategorysRelatedById'] = $this->collSCategorysRelatedById->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collSCategoryI18ns) {
				$result['SCategoryI18ns'] = $this->collSCategoryI18ns->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collSProductss) {
				$result['SProductss'] = $this->collSProductss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collShopProductCategoriess) {
				$result['ShopProductCategoriess'] = $this->collShopProductCategoriess->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collShopProductPropertiesCategoriess) {
				$result['ShopProductPropertiesCategoriess'] = $this->collShopProductPropertiesCategoriess->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = SCategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setId($value);
				break;
			case 1:
				$this->setExternalId($value);
				break;
			case 2:
				$this->setUrl($value);
				break;
			case 3:
				$this->setActive($value);
				break;
			case 4:
				$this->setImage($value);
				break;
			case 5:
				$this->setParentId($value);
				break;
			case 6:
				$this->setPosition($value);
				break;
			case 7:
				$this->setFullPath($value);
				break;
			case 8:
				$this->setFullPathIds($value);
				break;
			case 9:
				$this->setTpl($value);
				break;
			case 10:
				$this->setOrderMethod($value);
				break;
			case 11:
				$this->setShowsitetitle($value);
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
		$keys = SCategoryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setExternalId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUrl($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setActive($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setImage($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setParentId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPosition($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFullPath($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFullPathIds($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTpl($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setOrderMethod($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setShowsitetitle($arr[$keys[11]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SCategoryPeer::DATABASE_NAME);

		if ($this->isColumnModified(SCategoryPeer::ID)) $criteria->add(SCategoryPeer::ID, $this->id);
		if ($this->isColumnModified(SCategoryPeer::EXTERNAL_ID)) $criteria->add(SCategoryPeer::EXTERNAL_ID, $this->external_id);
		if ($this->isColumnModified(SCategoryPeer::URL)) $criteria->add(SCategoryPeer::URL, $this->url);
		if ($this->isColumnModified(SCategoryPeer::ACTIVE)) $criteria->add(SCategoryPeer::ACTIVE, $this->active);
		if ($this->isColumnModified(SCategoryPeer::IMAGE)) $criteria->add(SCategoryPeer::IMAGE, $this->image);
		if ($this->isColumnModified(SCategoryPeer::PARENT_ID)) $criteria->add(SCategoryPeer::PARENT_ID, $this->parent_id);
		if ($this->isColumnModified(SCategoryPeer::POSITION)) $criteria->add(SCategoryPeer::POSITION, $this->position);
		if ($this->isColumnModified(SCategoryPeer::FULL_PATH)) $criteria->add(SCategoryPeer::FULL_PATH, $this->full_path);
		if ($this->isColumnModified(SCategoryPeer::FULL_PATH_IDS)) $criteria->add(SCategoryPeer::FULL_PATH_IDS, $this->full_path_ids);
		if ($this->isColumnModified(SCategoryPeer::TPL)) $criteria->add(SCategoryPeer::TPL, $this->tpl);
		if ($this->isColumnModified(SCategoryPeer::ORDER_METHOD)) $criteria->add(SCategoryPeer::ORDER_METHOD, $this->order_method);
		if ($this->isColumnModified(SCategoryPeer::SHOWSITETITLE)) $criteria->add(SCategoryPeer::SHOWSITETITLE, $this->showsitetitle);

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
		$criteria = new Criteria(SCategoryPeer::DATABASE_NAME);
		$criteria->add(SCategoryPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of SCategory (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setExternalId($this->getExternalId());
		$copyObj->setUrl($this->getUrl());
		$copyObj->setActive($this->getActive());
		$copyObj->setImage($this->getImage());
		$copyObj->setParentId($this->getParentId());
		$copyObj->setPosition($this->getPosition());
		$copyObj->setFullPath($this->getFullPath());
		$copyObj->setFullPathIds($this->getFullPathIds());
		$copyObj->setTpl($this->getTpl());
		$copyObj->setOrderMethod($this->getOrderMethod());
		$copyObj->setShowsitetitle($this->getShowsitetitle());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getSCategorysRelatedById() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSCategoryRelatedById($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSCategoryI18ns() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSCategoryI18n($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSProductss() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSProducts($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getShopProductCategoriess() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addShopProductCategories($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getShopProductPropertiesCategoriess() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addShopProductPropertiesCategories($relObj->copy($deepCopy));
				}
			}

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     SCategory Clone of current object.
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
	 * @return     SCategoryPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SCategoryPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a SCategory object.
	 *
	 * @param      SCategory $v
	 * @return     SCategory The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSCategory(SCategory $v = null)
	{
		if ($v === null) {
			$this->setParentId(NULL);
		} else {
			$this->setParentId($v->getId());
		}

		$this->aSCategory = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SCategory object, it will not be re-added.
		if ($v !== null) {
			$v->addSCategoryRelatedById($this);
		}

		return $this;
	}


	/**
	 * Get the associated SCategory object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SCategory The associated SCategory object.
	 * @throws     PropelException
	 */
	public function getSCategory(PropelPDO $con = null)
	{
		if ($this->aSCategory === null && ($this->parent_id !== null)) {
			$this->aSCategory = SCategoryQuery::create()->findPk($this->parent_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aSCategory->addSCategorysRelatedById($this);
			 */
		}
		return $this->aSCategory;
	}


	/**
	 * Initializes a collection based on the name of a relation.
	 * Avoids crafting an 'init[$relationName]s' method name
	 * that wouldn't work when StandardEnglishPluralizer is used.
	 *
	 * @param      string $relationName The name of the relation to initialize
	 * @return     void
	 */
	public function initRelation($relationName)
	{
		if ('SCategoryRelatedById' == $relationName) {
			return $this->initSCategorysRelatedById();
		}
		if ('SCategoryI18n' == $relationName) {
			return $this->initSCategoryI18ns();
		}
		if ('SProducts' == $relationName) {
			return $this->initSProductss();
		}
		if ('ShopProductCategories' == $relationName) {
			return $this->initShopProductCategoriess();
		}
		if ('ShopProductPropertiesCategories' == $relationName) {
			return $this->initShopProductPropertiesCategoriess();
		}
	}

	/**
	 * Clears out the collSCategorysRelatedById collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSCategorysRelatedById()
	 */
	public function clearSCategorysRelatedById()
	{
		$this->collSCategorysRelatedById = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSCategorysRelatedById collection.
	 *
	 * By default this just sets the collSCategorysRelatedById collection to an empty array (like clearcollSCategorysRelatedById());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initSCategorysRelatedById($overrideExisting = true)
	{
		if (null !== $this->collSCategorysRelatedById && !$overrideExisting) {
			return;
		}
		$this->collSCategorysRelatedById = new PropelObjectCollection();
		$this->collSCategorysRelatedById->setModel('SCategory');
	}

	/**
	 * Gets an array of SCategory objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SCategory is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SCategory[] List of SCategory objects
	 * @throws     PropelException
	 */
	public function getSCategorysRelatedById($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSCategorysRelatedById || null !== $criteria) {
			if ($this->isNew() && null === $this->collSCategorysRelatedById) {
				// return empty collection
				$this->initSCategorysRelatedById();
			} else {
				$collSCategorysRelatedById = SCategoryQuery::create(null, $criteria)
					->filterBySCategory($this)
					->find($con);
				if (null !== $criteria) {
					return $collSCategorysRelatedById;
				}
				$this->collSCategorysRelatedById = $collSCategorysRelatedById;
			}
		}
		return $this->collSCategorysRelatedById;
	}

	/**
	 * Sets a collection of SCategoryRelatedById objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $sCategorysRelatedById A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setSCategorysRelatedById(PropelCollection $sCategorysRelatedById, PropelPDO $con = null)
	{
		$this->sCategorysRelatedByIdScheduledForDeletion = $this->getSCategorysRelatedById(new Criteria(), $con)->diff($sCategorysRelatedById);

		foreach ($sCategorysRelatedById as $sCategoryRelatedById) {
			// Fix issue with collection modified by reference
			if ($sCategoryRelatedById->isNew()) {
				$sCategoryRelatedById->setSCategory($this);
			}
			$this->addSCategoryRelatedById($sCategoryRelatedById);
		}

		$this->collSCategorysRelatedById = $sCategorysRelatedById;
	}

	/**
	 * Returns the number of related SCategory objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SCategory objects.
	 * @throws     PropelException
	 */
	public function countSCategorysRelatedById(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSCategorysRelatedById || null !== $criteria) {
			if ($this->isNew() && null === $this->collSCategorysRelatedById) {
				return 0;
			} else {
				$query = SCategoryQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySCategory($this)
					->count($con);
			}
		} else {
			return count($this->collSCategorysRelatedById);
		}
	}

	/**
	 * Method called to associate a SCategory object to this object
	 * through the SCategory foreign key attribute.
	 *
	 * @param      SCategory $l SCategory
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function addSCategoryRelatedById(SCategory $l)
	{
		if ($this->collSCategorysRelatedById === null) {
			$this->initSCategorysRelatedById();
		}
		if (!$this->collSCategorysRelatedById->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddSCategoryRelatedById($l);
		}

		return $this;
	}

	/**
	 * @param	SCategoryRelatedById $sCategoryRelatedById The sCategoryRelatedById object to add.
	 */
	protected function doAddSCategoryRelatedById($sCategoryRelatedById)
	{
		$this->collSCategorysRelatedById[]= $sCategoryRelatedById;
		$sCategoryRelatedById->setSCategory($this);
	}

	/**
	 * Clears out the collSCategoryI18ns collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSCategoryI18ns()
	 */
	public function clearSCategoryI18ns()
	{
		$this->collSCategoryI18ns = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSCategoryI18ns collection.
	 *
	 * By default this just sets the collSCategoryI18ns collection to an empty array (like clearcollSCategoryI18ns());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initSCategoryI18ns($overrideExisting = true)
	{
		if (null !== $this->collSCategoryI18ns && !$overrideExisting) {
			return;
		}
		$this->collSCategoryI18ns = new PropelObjectCollection();
		$this->collSCategoryI18ns->setModel('SCategoryI18n');
	}

	/**
	 * Gets an array of SCategoryI18n objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SCategory is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SCategoryI18n[] List of SCategoryI18n objects
	 * @throws     PropelException
	 */
	public function getSCategoryI18ns($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSCategoryI18ns || null !== $criteria) {
			if ($this->isNew() && null === $this->collSCategoryI18ns) {
				// return empty collection
				$this->initSCategoryI18ns();
			} else {
				$collSCategoryI18ns = SCategoryI18nQuery::create(null, $criteria)
					->filterBySCategory($this)
					->find($con);
				if (null !== $criteria) {
					return $collSCategoryI18ns;
				}
				$this->collSCategoryI18ns = $collSCategoryI18ns;
			}
		}
		return $this->collSCategoryI18ns;
	}

	/**
	 * Sets a collection of SCategoryI18n objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $sCategoryI18ns A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setSCategoryI18ns(PropelCollection $sCategoryI18ns, PropelPDO $con = null)
	{
		$this->sCategoryI18nsScheduledForDeletion = $this->getSCategoryI18ns(new Criteria(), $con)->diff($sCategoryI18ns);

		foreach ($sCategoryI18ns as $sCategoryI18n) {
			// Fix issue with collection modified by reference
			if ($sCategoryI18n->isNew()) {
				$sCategoryI18n->setSCategory($this);
			}
			$this->addSCategoryI18n($sCategoryI18n);
		}

		$this->collSCategoryI18ns = $sCategoryI18ns;
	}

	/**
	 * Returns the number of related SCategoryI18n objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SCategoryI18n objects.
	 * @throws     PropelException
	 */
	public function countSCategoryI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSCategoryI18ns || null !== $criteria) {
			if ($this->isNew() && null === $this->collSCategoryI18ns) {
				return 0;
			} else {
				$query = SCategoryI18nQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySCategory($this)
					->count($con);
			}
		} else {
			return count($this->collSCategoryI18ns);
		}
	}

	/**
	 * Method called to associate a SCategoryI18n object to this object
	 * through the SCategoryI18n foreign key attribute.
	 *
	 * @param      SCategoryI18n $l SCategoryI18n
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function addSCategoryI18n(SCategoryI18n $l)
	{
		if ($l && $locale = $l->getLocale()) {
			$this->setLocale($locale);
			$this->currentTranslations[$locale] = $l;
		}
		if ($this->collSCategoryI18ns === null) {
			$this->initSCategoryI18ns();
		}
		if (!$this->collSCategoryI18ns->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddSCategoryI18n($l);
		}

		return $this;
	}

	/**
	 * @param	SCategoryI18n $sCategoryI18n The sCategoryI18n object to add.
	 */
	protected function doAddSCategoryI18n($sCategoryI18n)
	{
		$this->collSCategoryI18ns[]= $sCategoryI18n;
		$sCategoryI18n->setSCategory($this);
	}

	/**
	 * Clears out the collSProductss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSProductss()
	 */
	public function clearSProductss()
	{
		$this->collSProductss = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSProductss collection.
	 *
	 * By default this just sets the collSProductss collection to an empty array (like clearcollSProductss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initSProductss($overrideExisting = true)
	{
		if (null !== $this->collSProductss && !$overrideExisting) {
			return;
		}
		$this->collSProductss = new PropelObjectCollection();
		$this->collSProductss->setModel('SProducts');
	}

	/**
	 * Gets an array of SProducts objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SCategory is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SProducts[] List of SProducts objects
	 * @throws     PropelException
	 */
	public function getSProductss($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSProductss || null !== $criteria) {
			if ($this->isNew() && null === $this->collSProductss) {
				// return empty collection
				$this->initSProductss();
			} else {
				$collSProductss = SProductsQuery::create(null, $criteria)
					->filterByMainCategory($this)
					->find($con);
				if (null !== $criteria) {
					return $collSProductss;
				}
				$this->collSProductss = $collSProductss;
			}
		}
		return $this->collSProductss;
	}

	/**
	 * Sets a collection of SProducts objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $sProductss A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setSProductss(PropelCollection $sProductss, PropelPDO $con = null)
	{
		$this->sProductssScheduledForDeletion = $this->getSProductss(new Criteria(), $con)->diff($sProductss);

		foreach ($sProductss as $sProducts) {
			// Fix issue with collection modified by reference
			if ($sProducts->isNew()) {
				$sProducts->setMainCategory($this);
			}
			$this->addSProducts($sProducts);
		}

		$this->collSProductss = $sProductss;
	}

	/**
	 * Returns the number of related SProducts objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SProducts objects.
	 * @throws     PropelException
	 */
	public function countSProductss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSProductss || null !== $criteria) {
			if ($this->isNew() && null === $this->collSProductss) {
				return 0;
			} else {
				$query = SProductsQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByMainCategory($this)
					->count($con);
			}
		} else {
			return count($this->collSProductss);
		}
	}

	/**
	 * Method called to associate a SProducts object to this object
	 * through the SProducts foreign key attribute.
	 *
	 * @param      SProducts $l SProducts
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function addSProducts(SProducts $l)
	{
		if ($this->collSProductss === null) {
			$this->initSProductss();
		}
		if (!$this->collSProductss->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddSProducts($l);
		}

		return $this;
	}

	/**
	 * @param	SProducts $sProducts The sProducts object to add.
	 */
	protected function doAddSProducts($sProducts)
	{
		$this->collSProductss[]= $sProducts;
		$sProducts->setMainCategory($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SCategory is new, it will return
	 * an empty collection; or if this SCategory has previously
	 * been saved, it will retrieve related SProductss from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SCategory.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SProducts[] List of SProducts objects
	 */
	public function getSProductssJoinBrand($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SProductsQuery::create(null, $criteria);
		$query->joinWith('Brand', $join_behavior);

		return $this->getSProductss($query, $con);
	}

	/**
	 * Clears out the collShopProductCategoriess collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addShopProductCategoriess()
	 */
	public function clearShopProductCategoriess()
	{
		$this->collShopProductCategoriess = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collShopProductCategoriess collection.
	 *
	 * By default this just sets the collShopProductCategoriess collection to an empty array (like clearcollShopProductCategoriess());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initShopProductCategoriess($overrideExisting = true)
	{
		if (null !== $this->collShopProductCategoriess && !$overrideExisting) {
			return;
		}
		$this->collShopProductCategoriess = new PropelObjectCollection();
		$this->collShopProductCategoriess->setModel('ShopProductCategories');
	}

	/**
	 * Gets an array of ShopProductCategories objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SCategory is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ShopProductCategories[] List of ShopProductCategories objects
	 * @throws     PropelException
	 */
	public function getShopProductCategoriess($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collShopProductCategoriess || null !== $criteria) {
			if ($this->isNew() && null === $this->collShopProductCategoriess) {
				// return empty collection
				$this->initShopProductCategoriess();
			} else {
				$collShopProductCategoriess = ShopProductCategoriesQuery::create(null, $criteria)
					->filterByCategory($this)
					->find($con);
				if (null !== $criteria) {
					return $collShopProductCategoriess;
				}
				$this->collShopProductCategoriess = $collShopProductCategoriess;
			}
		}
		return $this->collShopProductCategoriess;
	}

	/**
	 * Sets a collection of ShopProductCategories objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $shopProductCategoriess A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setShopProductCategoriess(PropelCollection $shopProductCategoriess, PropelPDO $con = null)
	{
		$this->shopProductCategoriessScheduledForDeletion = $this->getShopProductCategoriess(new Criteria(), $con)->diff($shopProductCategoriess);

		foreach ($shopProductCategoriess as $shopProductCategories) {
			// Fix issue with collection modified by reference
			if ($shopProductCategories->isNew()) {
				$shopProductCategories->setCategory($this);
			}
			$this->addShopProductCategories($shopProductCategories);
		}

		$this->collShopProductCategoriess = $shopProductCategoriess;
	}

	/**
	 * Returns the number of related ShopProductCategories objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ShopProductCategories objects.
	 * @throws     PropelException
	 */
	public function countShopProductCategoriess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collShopProductCategoriess || null !== $criteria) {
			if ($this->isNew() && null === $this->collShopProductCategoriess) {
				return 0;
			} else {
				$query = ShopProductCategoriesQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCategory($this)
					->count($con);
			}
		} else {
			return count($this->collShopProductCategoriess);
		}
	}

	/**
	 * Method called to associate a ShopProductCategories object to this object
	 * through the ShopProductCategories foreign key attribute.
	 *
	 * @param      ShopProductCategories $l ShopProductCategories
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function addShopProductCategories(ShopProductCategories $l)
	{
		if ($this->collShopProductCategoriess === null) {
			$this->initShopProductCategoriess();
		}
		if (!$this->collShopProductCategoriess->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddShopProductCategories($l);
		}

		return $this;
	}

	/**
	 * @param	ShopProductCategories $shopProductCategories The shopProductCategories object to add.
	 */
	protected function doAddShopProductCategories($shopProductCategories)
	{
		$this->collShopProductCategoriess[]= $shopProductCategories;
		$shopProductCategories->setCategory($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SCategory is new, it will return
	 * an empty collection; or if this SCategory has previously
	 * been saved, it will retrieve related ShopProductCategoriess from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SCategory.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ShopProductCategories[] List of ShopProductCategories objects
	 */
	public function getShopProductCategoriessJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ShopProductCategoriesQuery::create(null, $criteria);
		$query->joinWith('Product', $join_behavior);

		return $this->getShopProductCategoriess($query, $con);
	}

	/**
	 * Clears out the collShopProductPropertiesCategoriess collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addShopProductPropertiesCategoriess()
	 */
	public function clearShopProductPropertiesCategoriess()
	{
		$this->collShopProductPropertiesCategoriess = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collShopProductPropertiesCategoriess collection.
	 *
	 * By default this just sets the collShopProductPropertiesCategoriess collection to an empty array (like clearcollShopProductPropertiesCategoriess());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initShopProductPropertiesCategoriess($overrideExisting = true)
	{
		if (null !== $this->collShopProductPropertiesCategoriess && !$overrideExisting) {
			return;
		}
		$this->collShopProductPropertiesCategoriess = new PropelObjectCollection();
		$this->collShopProductPropertiesCategoriess->setModel('ShopProductPropertiesCategories');
	}

	/**
	 * Gets an array of ShopProductPropertiesCategories objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SCategory is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ShopProductPropertiesCategories[] List of ShopProductPropertiesCategories objects
	 * @throws     PropelException
	 */
	public function getShopProductPropertiesCategoriess($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collShopProductPropertiesCategoriess || null !== $criteria) {
			if ($this->isNew() && null === $this->collShopProductPropertiesCategoriess) {
				// return empty collection
				$this->initShopProductPropertiesCategoriess();
			} else {
				$collShopProductPropertiesCategoriess = ShopProductPropertiesCategoriesQuery::create(null, $criteria)
					->filterByPropertyCategory($this)
					->find($con);
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
	 * @param      PropelCollection $shopProductPropertiesCategoriess A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setShopProductPropertiesCategoriess(PropelCollection $shopProductPropertiesCategoriess, PropelPDO $con = null)
	{
		$this->shopProductPropertiesCategoriessScheduledForDeletion = $this->getShopProductPropertiesCategoriess(new Criteria(), $con)->diff($shopProductPropertiesCategoriess);

		foreach ($shopProductPropertiesCategoriess as $shopProductPropertiesCategories) {
			// Fix issue with collection modified by reference
			if ($shopProductPropertiesCategories->isNew()) {
				$shopProductPropertiesCategories->setPropertyCategory($this);
			}
			$this->addShopProductPropertiesCategories($shopProductPropertiesCategories);
		}

		$this->collShopProductPropertiesCategoriess = $shopProductPropertiesCategoriess;
	}

	/**
	 * Returns the number of related ShopProductPropertiesCategories objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ShopProductPropertiesCategories objects.
	 * @throws     PropelException
	 */
	public function countShopProductPropertiesCategoriess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collShopProductPropertiesCategoriess || null !== $criteria) {
			if ($this->isNew() && null === $this->collShopProductPropertiesCategoriess) {
				return 0;
			} else {
				$query = ShopProductPropertiesCategoriesQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPropertyCategory($this)
					->count($con);
			}
		} else {
			return count($this->collShopProductPropertiesCategoriess);
		}
	}

	/**
	 * Method called to associate a ShopProductPropertiesCategories object to this object
	 * through the ShopProductPropertiesCategories foreign key attribute.
	 *
	 * @param      ShopProductPropertiesCategories $l ShopProductPropertiesCategories
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function addShopProductPropertiesCategories(ShopProductPropertiesCategories $l)
	{
		if ($this->collShopProductPropertiesCategoriess === null) {
			$this->initShopProductPropertiesCategoriess();
		}
		if (!$this->collShopProductPropertiesCategoriess->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddShopProductPropertiesCategories($l);
		}

		return $this;
	}

	/**
	 * @param	ShopProductPropertiesCategories $shopProductPropertiesCategories The shopProductPropertiesCategories object to add.
	 */
	protected function doAddShopProductPropertiesCategories($shopProductPropertiesCategories)
	{
		$this->collShopProductPropertiesCategoriess[]= $shopProductPropertiesCategories;
		$shopProductPropertiesCategories->setPropertyCategory($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SCategory is new, it will return
	 * an empty collection; or if this SCategory has previously
	 * been saved, it will retrieve related ShopProductPropertiesCategoriess from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SCategory.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ShopProductPropertiesCategories[] List of ShopProductPropertiesCategories objects
	 */
	public function getShopProductPropertiesCategoriessJoinProperty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ShopProductPropertiesCategoriesQuery::create(null, $criteria);
		$query->joinWith('Property', $join_behavior);

		return $this->getShopProductPropertiesCategoriess($query, $con);
	}

	/**
	 * Clears out the collProducts collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProducts()
	 */
	public function clearProducts()
	{
		$this->collProducts = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProducts collection.
	 *
	 * By default this just sets the collProducts collection to an empty collection (like clearProducts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProducts()
	{
		$this->collProducts = new PropelObjectCollection();
		$this->collProducts->setModel('SProducts');
	}

	/**
	 * Gets a collection of SProducts objects related by a many-to-many relationship
	 * to the current object by way of the shop_product_categories cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SCategory is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array SProducts[] List of SProducts objects
	 */
	public function getProducts($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collProducts || null !== $criteria) {
			if ($this->isNew() && null === $this->collProducts) {
				// return empty collection
				$this->initProducts();
			} else {
				$collProducts = SProductsQuery::create(null, $criteria)
					->filterByCategory($this)
					->find($con);
				if (null !== $criteria) {
					return $collProducts;
				}
				$this->collProducts = $collProducts;
			}
		}
		return $this->collProducts;
	}

	/**
	 * Sets a collection of SProducts objects related by a many-to-many relationship
	 * to the current object by way of the shop_product_categories cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $products A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setProducts(PropelCollection $products, PropelPDO $con = null)
	{
		$shopProductCategoriess = ShopProductCategoriesQuery::create()
			->filterBySProducts($products)
			->filterByCategory($this)
			->find($con);

		$this->productsScheduledForDeletion = $this->getShopProductCategoriess()->diff($shopProductCategoriess);
		$this->collShopProductCategoriess = $shopProductCategoriess;

		foreach ($products as $product) {
			// Fix issue with collection modified by reference
			if ($product->isNew()) {
				$this->doAddSProducts($product);
			} else {
				$this->addSProducts($product);
			}
		}

		$this->collProducts = $products;
	}

	/**
	 * Gets the number of SProducts objects related by a many-to-many relationship
	 * to the current object by way of the shop_product_categories cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related SProducts objects
	 */
	public function countProducts($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collProducts || null !== $criteria) {
			if ($this->isNew() && null === $this->collProducts) {
				return 0;
			} else {
				$query = SProductsQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCategory($this)
					->count($con);
			}
		} else {
			return count($this->collProducts);
		}
	}

	/**
	 * Associate a SProducts object to this object
	 * through the shop_product_categories cross reference table.
	 *
	 * @param      SProducts $sProducts The ShopProductCategories object to relate
	 * @return     void
	 */
	public function addProduct(SProducts $sProducts)
	{
		if ($this->collProducts === null) {
			$this->initProducts();
		}
		if (!$this->collProducts->contains($sProducts)) { // only add it if the **same** object is not already associated
			$this->doAddProduct($sProducts);

			$this->collProducts[]= $sProducts;
		}
	}

	/**
	 * @param	Product $product The product object to add.
	 */
	protected function doAddProduct($product)
	{
		$shopProductCategories = new ShopProductCategories();
		$shopProductCategories->setProduct($product);
		$this->addShopProductCategories($shopProductCategories);
	}

	/**
	 * Clears out the collPropertys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPropertys()
	 */
	public function clearPropertys()
	{
		$this->collPropertys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPropertys collection.
	 *
	 * By default this just sets the collPropertys collection to an empty collection (like clearPropertys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPropertys()
	{
		$this->collPropertys = new PropelObjectCollection();
		$this->collPropertys->setModel('SProperties');
	}

	/**
	 * Gets a collection of SProperties objects related by a many-to-many relationship
	 * to the current object by way of the shop_product_properties_categories cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SCategory is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array SProperties[] List of SProperties objects
	 */
	public function getPropertys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPropertys || null !== $criteria) {
			if ($this->isNew() && null === $this->collPropertys) {
				// return empty collection
				$this->initPropertys();
			} else {
				$collPropertys = SPropertiesQuery::create(null, $criteria)
					->filterByPropertyCategory($this)
					->find($con);
				if (null !== $criteria) {
					return $collPropertys;
				}
				$this->collPropertys = $collPropertys;
			}
		}
		return $this->collPropertys;
	}

	/**
	 * Sets a collection of SProperties objects related by a many-to-many relationship
	 * to the current object by way of the shop_product_properties_categories cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $propertys A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setPropertys(PropelCollection $propertys, PropelPDO $con = null)
	{
		$shopProductPropertiesCategoriess = ShopProductPropertiesCategoriesQuery::create()
			->filterBySProperties($propertys)
			->filterByPropertyCategory($this)
			->find($con);

		$this->propertysScheduledForDeletion = $this->getShopProductPropertiesCategoriess()->diff($shopProductPropertiesCategoriess);
		$this->collShopProductPropertiesCategoriess = $shopProductPropertiesCategoriess;

		foreach ($propertys as $property) {
			// Fix issue with collection modified by reference
			if ($property->isNew()) {
				$this->doAddSProperties($property);
			} else {
				$this->addSProperties($property);
			}
		}

		$this->collPropertys = $propertys;
	}

	/**
	 * Gets the number of SProperties objects related by a many-to-many relationship
	 * to the current object by way of the shop_product_properties_categories cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related SProperties objects
	 */
	public function countPropertys($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPropertys || null !== $criteria) {
			if ($this->isNew() && null === $this->collPropertys) {
				return 0;
			} else {
				$query = SPropertiesQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPropertyCategory($this)
					->count($con);
			}
		} else {
			return count($this->collPropertys);
		}
	}

	/**
	 * Associate a SProperties object to this object
	 * through the shop_product_properties_categories cross reference table.
	 *
	 * @param      SProperties $sProperties The ShopProductPropertiesCategories object to relate
	 * @return     void
	 */
	public function addProperty(SProperties $sProperties)
	{
		if ($this->collPropertys === null) {
			$this->initPropertys();
		}
		if (!$this->collPropertys->contains($sProperties)) { // only add it if the **same** object is not already associated
			$this->doAddProperty($sProperties);

			$this->collPropertys[]= $sProperties;
		}
	}

	/**
	 * @param	Property $property The property object to add.
	 */
	protected function doAddProperty($property)
	{
		$shopProductPropertiesCategories = new ShopProductPropertiesCategories();
		$shopProductPropertiesCategories->setProperty($property);
		$this->addShopProductPropertiesCategories($shopProductPropertiesCategories);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->external_id = null;
		$this->url = null;
		$this->active = null;
		$this->image = null;
		$this->parent_id = null;
		$this->position = null;
		$this->full_path = null;
		$this->full_path_ids = null;
		$this->tpl = null;
		$this->order_method = null;
		$this->showsitetitle = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
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
			if ($this->collSCategorysRelatedById) {
				foreach ($this->collSCategorysRelatedById as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSCategoryI18ns) {
				foreach ($this->collSCategoryI18ns as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSProductss) {
				foreach ($this->collSProductss as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collShopProductCategoriess) {
				foreach ($this->collShopProductCategoriess as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collShopProductPropertiesCategoriess) {
				foreach ($this->collShopProductPropertiesCategoriess as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProducts) {
				foreach ($this->collProducts as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPropertys) {
				foreach ($this->collPropertys as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		// i18n behavior
		$this->currentLocale = 'ru';
		$this->currentTranslations = null;
		if ($this->collSCategorysRelatedById instanceof PropelCollection) {
			$this->collSCategorysRelatedById->clearIterator();
		}
		$this->collSCategorysRelatedById = null;
		if ($this->collSCategoryI18ns instanceof PropelCollection) {
			$this->collSCategoryI18ns->clearIterator();
		}
		$this->collSCategoryI18ns = null;
		if ($this->collSProductss instanceof PropelCollection) {
			$this->collSProductss->clearIterator();
		}
		$this->collSProductss = null;
		if ($this->collShopProductCategoriess instanceof PropelCollection) {
			$this->collShopProductCategoriess->clearIterator();
		}
		$this->collShopProductCategoriess = null;
		if ($this->collShopProductPropertiesCategoriess instanceof PropelCollection) {
			$this->collShopProductPropertiesCategoriess->clearIterator();
		}
		$this->collShopProductPropertiesCategoriess = null;
		if ($this->collProducts instanceof PropelCollection) {
			$this->collProducts->clearIterator();
		}
		$this->collProducts = null;
		if ($this->collPropertys instanceof PropelCollection) {
			$this->collPropertys->clearIterator();
		}
		$this->collPropertys = null;
		$this->aSCategory = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(SCategoryPeer::DEFAULT_STRING_FORMAT);
	}

	// i18n behavior
	
	/**
	 * Sets the locale for translations
	 *
	 * @param     string $locale Locale to use for the translation, e.g. 'fr_FR'
	 *
	 * @return    SCategory The current object (for fluent API support)
	 */
	public function setLocale($locale = 'ru')
	{
		$this->currentLocale = $locale;
	
		return $this;
	}
	
	/**
	 * Gets the locale for translations
	 *
	 * @return    string $locale Locale to use for the translation, e.g. 'fr_FR'
	 */
	public function getLocale()
	{
		return $this->currentLocale;
	}
	
	/**
	 * Returns the current translation for a given locale
	 *
	 * @param     string $locale Locale to use for the translation, e.g. 'fr_FR'
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return SCategoryI18n */
	public function getTranslation($locale = 'ru', PropelPDO $con = null)
	{
		if (!isset($this->currentTranslations[$locale])) {
			if (null !== $this->collSCategoryI18ns) {
				foreach ($this->collSCategoryI18ns as $translation) {
					if ($translation->getLocale() == $locale) {
						$this->currentTranslations[$locale] = $translation;
						return $translation;
					}
				}
			}
			if ($this->isNew()) {
				$translation = new SCategoryI18n();
				$translation->setLocale($locale);
			} else {
				$translation = SCategoryI18nQuery::create()
					->filterByPrimaryKey(array($this->getPrimaryKey(), $locale))
					->findOneOrCreate($con);
				$this->currentTranslations[$locale] = $translation;
			}
			$this->addSCategoryI18n($translation);
		}
	
		return $this->currentTranslations[$locale];
	}
	
	/**
	 * Remove the translation for a given locale
	 *
	 * @param     string $locale Locale to use for the translation, e.g. 'fr_FR'
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    SCategory The current object (for fluent API support)
	 */
	public function removeTranslation($locale = 'ru', PropelPDO $con = null)
	{
		if (!$this->isNew()) {
			SCategoryI18nQuery::create()
				->filterByPrimaryKey(array($this->getPrimaryKey(), $locale))
				->delete($con);
		}
		if (isset($this->currentTranslations[$locale])) {
			unset($this->currentTranslations[$locale]);
		}
		foreach ($this->collSCategoryI18ns as $key => $translation) {
			if ($translation->getLocale() == $locale) {
				unset($this->collSCategoryI18ns[$key]);
				break;
			}
		}
	
		return $this;
	}
	
	/**
	 * Returns the current translation
	 *
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return SCategoryI18n */
	public function getCurrentTranslation(PropelPDO $con = null)
	{
		return $this->getTranslation($this->getLocale(), $con);
	}
	
	
	/**
	 * Get the [name] column value.
	 * 
	 * @return     string
	 */
	public function getName()
	{	return $this->getCurrentTranslation()->getName();
	}
	
	
	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setName($v)
	{	$this->getCurrentTranslation()->setName($v);
	
		return $this;
	}
	
	
	/**
	 * Get the [h1] column value.
	 * 
	 * @return     string
	 */
	public function getH1()
	{	return $this->getCurrentTranslation()->getH1();
	}
	
	
	/**
	 * Set the value of [h1] column.
	 * 
	 * @param      string $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setH1($v)
	{	$this->getCurrentTranslation()->setH1($v);
	
		return $this;
	}
	
	
	/**
	 * Get the [description] column value.
	 * 
	 * @return     string
	 */
	public function getDescription()
	{	return $this->getCurrentTranslation()->getDescription();
	}
	
	
	/**
	 * Set the value of [description] column.
	 * 
	 * @param      string $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setDescription($v)
	{	$this->getCurrentTranslation()->setDescription($v);
	
		return $this;
	}
	
	
	/**
	 * Get the [meta_desc] column value.
	 * 
	 * @return     string
	 */
	public function getMetaDesc()
	{	return $this->getCurrentTranslation()->getMetaDesc();
	}
	
	
	/**
	 * Set the value of [meta_desc] column.
	 * 
	 * @param      string $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setMetaDesc($v)
	{	$this->getCurrentTranslation()->setMetaDesc($v);
	
		return $this;
	}
	
	
	/**
	 * Get the [meta_title] column value.
	 * 
	 * @return     string
	 */
	public function getMetaTitle()
	{	return $this->getCurrentTranslation()->getMetaTitle();
	}
	
	
	/**
	 * Set the value of [meta_title] column.
	 * 
	 * @param      string $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setMetaTitle($v)
	{	$this->getCurrentTranslation()->setMetaTitle($v);
	
		return $this;
	}
	
	
	/**
	 * Get the [meta_keywords] column value.
	 * 
	 * @return     string
	 */
	public function getMetaKeywords()
	{	return $this->getCurrentTranslation()->getMetaKeywords();
	}
	
	
	/**
	 * Set the value of [meta_keywords] column.
	 * 
	 * @param      string $v new value
	 * @return     SCategory The current object (for fluent API support)
	 */
	public function setMetaKeywords($v)
	{	$this->getCurrentTranslation()->setMetaKeywords($v);
	
		return $this;
	}

} // BaseSCategory
