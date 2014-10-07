<?php

/**
 * Base class that represents a row from the 'shop_products' table.
 *
 * 
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSProducts extends ShopBaseObject implements Persistent {
	
	/**
	 * Peer class name
	 */
	const PEER = 'SProductsPeer';
	
	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * 
	 * @var SProductsPeer
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
	 * The value for the user_id field.
	 * 
	 * @var int
	 */
	protected $user_id;
	
	/**
	 * The value for the external_id field.
	 * 
	 * @var string
	 */
	protected $external_id;
	
	/**
	 * The value for the url field.
	 * 
	 * @var string
	 */
	protected $url;
	
	/**
	 * The value for the active field.
	 * 
	 * @var boolean
	 */
	protected $active;
	
	/**
	 * The value for the hit field.
	 * 
	 * @var boolean
	 */
	protected $hit;
	
	/**
	 * The value for the hot field.
	 * 
	 * @var boolean
	 */
	protected $hot;
	
	/**
	 * The value for the action field.
	 * 
	 * @var boolean
	 */
	protected $action;
	
	/**
	 * The value for the brand_id field.
	 * 
	 * @var int
	 */
	protected $brand_id;
	
	/**
	 * The value for the category_id field.
	 * 
	 * @var int
	 */
	protected $category_id;
	
	/**
	 * The value for the related_products field.
	 * 
	 * @var string
	 */
	protected $related_products;
	
	/**
	 * The value for the mainimage field.
	 * 
	 * @var string
	 */
	protected $mainimage;
	
	/**
	 * The value for the mainmodimage field.
	 * 
	 * @var string
	 */
	protected $mainmodimage;
	
	/**
	 * The value for the smallimage field.
	 * 
	 * @var string
	 */
	protected $smallimage;
	
	/**
	 * The value for the smallmodimage field.
	 * 
	 * @var string
	 */
	protected $smallmodimage;
	
	/**
	 * The value for the old_price field.
	 * 
	 * @var string
	 */
	protected $old_price;
	
	/**
	 * The value for the created field.
	 * 
	 * @var int
	 */
	protected $created;
	
	/**
	 * The value for the updated field.
	 * 
	 * @var int
	 */
	protected $updated;
	
	/**
	 * The value for the views field.
	 * Note: this column has a database default value of: 0
	 * 
	 * @var int
	 */
	protected $views;
	
	/**
	 * The value for the added_to_cart_count field.
	 * 
	 * @var int
	 */
	protected $added_to_cart_count;
	
	/**
	 * The value for the enable_comments field.
	 * Note: this column has a database default value of: true
	 * 
	 * @var boolean
	 */
	protected $enable_comments;
	
	/**
	 * The value for the tpl field.
	 * 
	 * @var string
	 */
	protected $tpl;
	
	/**
	 *
	 * @var SBrands
	 */
	protected $aBrand;
	
	/**
	 *
	 * @var SCategory
	 */
	protected $aMainCategory;
	
	/**
	 *
	 * @var array ShopKit[] Collection to store aggregation of ShopKit objects.
	 */
	protected $collShopKits;
	
	/**
	 *
	 * @var array ShopKitProduct[] Collection to store aggregation of ShopKitProduct objects.
	 */
	protected $collShopKitProducts;
	
	/**
	 *
	 * @var array SProductsI18n[] Collection to store aggregation of SProductsI18n objects.
	 */
	protected $collSProductsI18ns;
	
	/**
	 *
	 * @var array SProductImages[] Collection to store aggregation of SProductImages objects.
	 */
	protected $collSProductImagess;
	
	/**
	 *
	 * @var array SProductVariants[] Collection to store aggregation of SProductVariants objects.
	 */
	protected $collProductVariants;
	
	/**
	 *
	 * @var array SWarehouseData[] Collection to store aggregation of SWarehouseData objects.
	 */
	protected $collSWarehouseDatas;
	
	/**
	 *
	 * @var array ShopProductCategories[] Collection to store aggregation of ShopProductCategories objects.
	 */
	protected $collShopProductCategoriess;
	
	/**
	 *
	 * @var array SProductPropertiesData[] Collection to store aggregation of SProductPropertiesData objects.
	 */
	protected $collSProductPropertiesDatas;
	
	/**
	 *
	 * @var array SNotifications[] Collection to store aggregation of SNotifications objects.
	 */
	protected $collSNotificationss;
	
	/**
	 *
	 * @var array SOrderProducts[] Collection to store aggregation of SOrderProducts objects.
	 */
	protected $collSOrderProductss;
	
	/**
	 *
	 * @var SProductsRating one-to-one related SProductsRating object
	 */
	protected $singleSProductsRating;
	
	/**
	 *
	 * @var array SCategory[] Collection to store aggregation of SCategory objects.
	 */
	protected $collCategorys;
	
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
	 * @var array[SProductsI18n]
	 */
	protected $currentTranslations;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $categorysScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $shopKitsScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $shopKitProductsScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $sProductsI18nsScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $sProductImagessScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $productVariantsScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $sWarehouseDatasScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $shopProductCategoriessScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $sProductPropertiesDatasScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $sNotificationssScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $sOrderProductssScheduledForDeletion = null;
	
	/**
	 * An array of objects scheduled for deletion.
	 * 
	 * @var array
	 */
	protected $sProductsRatingsScheduledForDeletion = null;
	
	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * 
	 * @see __construct()
	 */
	public function applyDefaultValues() {
		$this->views = 0;
		$this->enable_comments = true;
	}
	
	/**
	 * Initializes internal state of BaseSProducts object.
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
	 * Get the [user_id] column value.
	 *
	 * @return int
	 */
	public function getUserId() {
		return $this->user_id;
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
	 * Get the [url] column value.
	 *
	 * @return string
	 */
	public function getUrl() {
		return $this->url;
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
	 * Get the [hit] column value.
	 *
	 * @return boolean
	 */
	public function getHit() {
		return $this->hit;
	}
	
	/**
	 * Get the [hot] column value.
	 *
	 * @return boolean
	 */
	public function getHot() {
		return $this->hot;
	}
	
	/**
	 * Get the [action] column value.
	 *
	 * @return boolean
	 */
	public function getAction() {
		return $this->action;
	}
	
	/**
	 * Get the [brand_id] column value.
	 *
	 * @return int
	 */
	public function getBrandId() {
		return $this->brand_id;
	}
	
	/**
	 * Get the [category_id] column value.
	 *
	 * @return int
	 */
	public function getCategoryId() {
		return $this->category_id;
	}
	
	/**
	 * Get the [related_products] column value.
	 *
	 * @return string
	 */
	public function getRelatedProducts() {
		return $this->related_products;
	}
	
	/**
	 * Get the [mainimage] column value.
	 *
	 * @return string
	 */
	public function getMainimage() {
		return $this->mainimage;
	}
	
	/**
	 * Get the [mainmodimage] column value.
	 *
	 * @return string
	 */
	public function getMainmodimage() {
		return $this->mainmodimage;
	}
	
	/**
	 * Get the [smallimage] column value.
	 *
	 * @return string
	 */
	public function getSmallimage() {
		return $this->smallimage;
	}
	
	/**
	 * Get the [smallmodimage] column value.
	 *
	 * @return string
	 */
	public function getSmallmodimage() {
		return $this->smallmodimage;
	}
	
	/**
	 * Get the [old_price] column value.
	 *
	 * @return string
	 */
	public function getOldPrice() {
		return $this->old_price;
	}
	
	/**
	 * Get the [created] column value.
	 *
	 * @return int
	 */
	public function getCreated() {
		return $this->created;
	}
	
	/**
	 * Get the [updated] column value.
	 *
	 * @return int
	 */
	public function getUpdated() {
		return $this->updated;
	}
	
	/**
	 * Get the [views] column value.
	 *
	 * @return int
	 */
	public function getViews() {
		return $this->views;
	}
	
	/**
	 * Get the [added_to_cart_count] column value.
	 *
	 * @return int
	 */
	public function getAddedToCartCount() {
		return $this->added_to_cart_count;
	}
	
	/**
	 * Get the [enable_comments] column value.
	 *
	 * @return boolean
	 */
	public function getEnableComments() {
		return $this->enable_comments;
	}
	
	/**
	 * Get the [tpl] column value.
	 *
	 * @return string
	 */
	public function getTpl() {
		return $this->tpl;
	}
	
	/**
	 * Set the value of [id] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setId($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns [] = SProductsPeer::ID;
		}
		
		return $this;
	} // setId()
	
	/**
	 * Set the value of [user_id] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setUserId($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns [] = SProductsPeer::USER_ID;
		}
		
		return $this;
	} // setUserId()
	
	/**
	 * Set the value of [external_id] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setExternalId($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->external_id !== $v) {
			$this->external_id = $v;
			$this->modifiedColumns [] = SProductsPeer::EXTERNAL_ID;
		}
		
		return $this;
	} // setExternalId()
	
	/**
	 * Set the value of [url] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setUrl($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->url !== $v) {
			$this->url = $v;
			$this->modifiedColumns [] = SProductsPeer::URL;
		}
		
		return $this;
	} // setUrl()
	
	/**
	 * Sets the value of the [active] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return SProducts The current object (for fluent API support)
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
			$this->modifiedColumns [] = SProductsPeer::ACTIVE;
		}
		
		return $this;
	} // setActive()
	
	/**
	 * Sets the value of the [hit] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setHit($v) {
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
		
		if ($this->hit !== $v) {
			$this->hit = $v;
			$this->modifiedColumns [] = SProductsPeer::HIT;
		}
		
		return $this;
	} // setHit()
	
	/**
	 * Sets the value of the [hot] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setHot($v) {
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
		
		if ($this->hot !== $v) {
			$this->hot = $v;
			$this->modifiedColumns [] = SProductsPeer::HOT;
		}
		
		return $this;
	} // setHot()
	
	/**
	 * Sets the value of the [action] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setAction($v) {
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
		
		if ($this->action !== $v) {
			$this->action = $v;
			$this->modifiedColumns [] = SProductsPeer::ACTION;
		}
		
		return $this;
	} // setAction()
	
	/**
	 * Set the value of [brand_id] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setBrandId($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->brand_id !== $v) {
			$this->brand_id = $v;
			$this->modifiedColumns [] = SProductsPeer::BRAND_ID;
		}
		
		if ($this->aBrand !== null && $this->aBrand->getId () !== $v) {
			$this->aBrand = null;
		}
		
		return $this;
	} // setBrandId()
	
	/**
	 * Set the value of [category_id] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setCategoryId($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->category_id !== $v) {
			$this->category_id = $v;
			$this->modifiedColumns [] = SProductsPeer::CATEGORY_ID;
		}
		
		if ($this->aMainCategory !== null && $this->aMainCategory->getId () !== $v) {
			$this->aMainCategory = null;
		}
		
		return $this;
	} // setCategoryId()
	
	/**
	 * Set the value of [related_products] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setRelatedProducts($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->related_products !== $v) {
			$this->related_products = $v;
			$this->modifiedColumns [] = SProductsPeer::RELATED_PRODUCTS;
		}
		
		return $this;
	} // setRelatedProducts()
	
	/**
	 * Set the value of [mainimage] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setMainimage($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->mainimage !== $v) {
			$this->mainimage = $v;
			$this->modifiedColumns [] = SProductsPeer::MAINIMAGE;
		}
		
		return $this;
	} // setMainimage()
	
	/**
	 * Set the value of [mainmodimage] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setMainmodimage($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->mainmodimage !== $v) {
			$this->mainmodimage = $v;
			$this->modifiedColumns [] = SProductsPeer::MAINMODIMAGE;
		}
		
		return $this;
	} // setMainmodimage()
	
	/**
	 * Set the value of [smallimage] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setSmallimage($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->smallimage !== $v) {
			$this->smallimage = $v;
			$this->modifiedColumns [] = SProductsPeer::SMALLIMAGE;
		}
		
		return $this;
	} // setSmallimage()
	
	/**
	 * Set the value of [smallmodimage] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setSmallmodimage($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->smallmodimage !== $v) {
			$this->smallmodimage = $v;
			$this->modifiedColumns [] = SProductsPeer::SMALLMODIMAGE;
		}
		
		return $this;
	} // setSmallmodimage()
	
	/**
	 * Set the value of [old_price] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setOldPrice($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->old_price !== $v) {
			$this->old_price = $v;
			$this->modifiedColumns [] = SProductsPeer::OLD_PRICE;
		}
		
		return $this;
	} // setOldPrice()
	
	/**
	 * Set the value of [created] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setCreated($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->created !== $v) {
			$this->created = $v;
			$this->modifiedColumns [] = SProductsPeer::CREATED;
		}
		
		return $this;
	} // setCreated()
	
	/**
	 * Set the value of [updated] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setUpdated($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->updated !== $v) {
			$this->updated = $v;
			$this->modifiedColumns [] = SProductsPeer::UPDATED;
		}
		
		return $this;
	} // setUpdated()
	
	/**
	 * Set the value of [views] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setViews($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->views !== $v) {
			$this->views = $v;
			$this->modifiedColumns [] = SProductsPeer::VIEWS;
		}
		
		return $this;
	} // setViews()
	
	/**
	 * Set the value of [added_to_cart_count] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setAddedToCartCount($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->added_to_cart_count !== $v) {
			$this->added_to_cart_count = $v;
			$this->modifiedColumns [] = SProductsPeer::ADDED_TO_CART_COUNT;
		}
		
		return $this;
	} // setAddedToCartCount()
	
	/**
	 * Sets the value of the [enable_comments] column.
	 * Non-boolean arguments are converted using the following rules:
	 * * 1, '1', 'true', 'on', and 'yes' are converted to boolean true
	 * * 0, '0', 'false', 'off', and 'no' are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 *
	 * @param boolean|integer|string $v
	 *        	The new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setEnableComments($v) {
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
		
		if ($this->enable_comments !== $v) {
			$this->enable_comments = $v;
			$this->modifiedColumns [] = SProductsPeer::ENABLE_COMMENTS;
		}
		
		return $this;
	} // setEnableComments()
	
	/**
	 * Set the value of [tpl] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setTpl($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->tpl !== $v) {
			$this->tpl = $v;
			$this->modifiedColumns [] = SProductsPeer::TPL;
		}
		
		return $this;
	} // setTpl()
	
	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues() {
		if ($this->views !== 0) {
			return false;
		}
		
		if ($this->enable_comments !== true) {
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
			$this->user_id = ($row [$startcol + 1] !== null) ? ( int ) $row [$startcol + 1] : null;
			$this->external_id = ($row [$startcol + 2] !== null) ? ( string ) $row [$startcol + 2] : null;
			$this->url = ($row [$startcol + 3] !== null) ? ( string ) $row [$startcol + 3] : null;
			$this->active = ($row [$startcol + 4] !== null) ? ( boolean ) $row [$startcol + 4] : null;
			$this->hit = ($row [$startcol + 5] !== null) ? ( boolean ) $row [$startcol + 5] : null;
			$this->hot = ($row [$startcol + 6] !== null) ? ( boolean ) $row [$startcol + 6] : null;
			$this->action = ($row [$startcol + 7] !== null) ? ( boolean ) $row [$startcol + 7] : null;
			$this->brand_id = ($row [$startcol + 8] !== null) ? ( int ) $row [$startcol + 8] : null;
			$this->category_id = ($row [$startcol + 9] !== null) ? ( int ) $row [$startcol + 9] : null;
			$this->related_products = ($row [$startcol + 10] !== null) ? ( string ) $row [$startcol + 10] : null;
			$this->mainimage = ($row [$startcol + 11] !== null) ? ( string ) $row [$startcol + 11] : null;
			$this->mainmodimage = ($row [$startcol + 12] !== null) ? ( string ) $row [$startcol + 12] : null;
			$this->smallimage = ($row [$startcol + 13] !== null) ? ( string ) $row [$startcol + 13] : null;
			$this->smallmodimage = ($row [$startcol + 14] !== null) ? ( string ) $row [$startcol + 14] : null;
			$this->old_price = ($row [$startcol + 15] !== null) ? ( string ) $row [$startcol + 15] : null;
			$this->created = ($row [$startcol + 16] !== null) ? ( int ) $row [$startcol + 16] : null;
			$this->updated = ($row [$startcol + 17] !== null) ? ( int ) $row [$startcol + 17] : null;
			$this->views = ($row [$startcol + 18] !== null) ? ( int ) $row [$startcol + 18] : null;
			$this->added_to_cart_count = ($row [$startcol + 19] !== null) ? ( int ) $row [$startcol + 19] : null;
			$this->enable_comments = ($row [$startcol + 20] !== null) ? ( boolean ) $row [$startcol + 20] : null;
			$this->tpl = ($row [$startcol + 21] !== null) ? ( string ) $row [$startcol + 21] : null;
			$this->resetModified ();
			
			$this->setNew ( false );
			
			if ($rehydrate) {
				$this->ensureConsistency ();
			}
			
			return $startcol + 22; // 22 = SProductsPeer::NUM_HYDRATE_COLUMNS.
		} catch ( Exception $e ) {
			throw new PropelException ( "Error populating SProducts object", $e );
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
		if ($this->aBrand !== null && $this->brand_id !== $this->aBrand->getId ()) {
			$this->aBrand = null;
		}
		if ($this->aMainCategory !== null && $this->category_id !== $this->aMainCategory->getId ()) {
			$this->aMainCategory = null;
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
			$con = Propel::getConnection ( SProductsPeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.
		
		$stmt = SProductsPeer::doSelectStmt ( $this->buildPkeyCriteria (), $con );
		$row = $stmt->fetch ( PDO::FETCH_NUM );
		$stmt->closeCursor ();
		if (! $row) {
			throw new PropelException ( 'Cannot find matching row in the database to reload object values.' );
		}
		$this->hydrate ( $row, 0, true ); // rehydrate
		
		if ($deep) { // also de-associate any related objects?
			
			$this->aBrand = null;
			$this->aMainCategory = null;
			$this->collShopKits = null;
			
			$this->collShopKitProducts = null;
			
			$this->collSProductsI18ns = null;
			
			$this->collSProductImagess = null;
			
			$this->collProductVariants = null;
			
			$this->collSWarehouseDatas = null;
			
			$this->collShopProductCategoriess = null;
			
			$this->collSProductPropertiesDatas = null;
			
			$this->collSNotificationss = null;
			
			$this->collSOrderProductss = null;
			
			$this->singleSProductsRating = null;
			
			$this->collCategorys = null;
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
			$con = Propel::getConnection ( SProductsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		$con->beginTransaction ();
		try {
			$deleteQuery = SProductsQuery::create ()->filterByPrimaryKey ( $this->getPrimaryKey () );
			$ret = $this->preDelete ( $con );
			if ($ret) {
				$deleteQuery->delete ( $con );
				$this->postDelete ( $con );
				// i18n behavior
				
				// emulate delete cascade
				SProductsI18nQuery::create ()->filterBySProducts ( $this )->delete ( $con );
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
			$con = Propel::getConnection ( SProductsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
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
				SProductsPeer::addInstanceToPool ( $this );
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
			
			if ($this->aBrand !== null) {
				if ($this->aBrand->isModified () || $this->aBrand->isNew ()) {
					$affectedRows += $this->aBrand->save ( $con );
				}
				$this->setBrand ( $this->aBrand );
			}
			
			if ($this->aMainCategory !== null) {
				if ($this->aMainCategory->isModified () || $this->aMainCategory->isNew ()) {
					$affectedRows += $this->aMainCategory->save ( $con );
				}
				$this->setMainCategory ( $this->aMainCategory );
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
			
			if ($this->categorysScheduledForDeletion !== null) {
				if (! $this->categorysScheduledForDeletion->isEmpty ()) {
					ShopProductCategoriesQuery::create ()->filterByPrimaryKeys ( $this->categorysScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->categorysScheduledForDeletion = null;
				}
				
				foreach ( $this->getCategorys () as $category ) {
					if ($category->isModified ()) {
						$category->save ( $con );
					}
				}
			}
			
			if ($this->shopKitsScheduledForDeletion !== null) {
				if (! $this->shopKitsScheduledForDeletion->isEmpty ()) {
					ShopKitQuery::create ()->filterByPrimaryKeys ( $this->shopKitsScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->shopKitsScheduledForDeletion = null;
				}
			}
			
			if ($this->collShopKits !== null) {
				foreach ( $this->collShopKits as $referrerFK ) {
					if (! $referrerFK->isDeleted ()) {
						$affectedRows += $referrerFK->save ( $con );
					}
				}
			}
			
			if ($this->shopKitProductsScheduledForDeletion !== null) {
				if (! $this->shopKitProductsScheduledForDeletion->isEmpty ()) {
					ShopKitProductQuery::create ()->filterByPrimaryKeys ( $this->shopKitProductsScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->shopKitProductsScheduledForDeletion = null;
				}
			}
			
			if ($this->collShopKitProducts !== null) {
				foreach ( $this->collShopKitProducts as $referrerFK ) {
					if (! $referrerFK->isDeleted ()) {
						$affectedRows += $referrerFK->save ( $con );
					}
				}
			}
			
			if ($this->sProductsI18nsScheduledForDeletion !== null) {
				if (! $this->sProductsI18nsScheduledForDeletion->isEmpty ()) {
					SProductsI18nQuery::create ()->filterByPrimaryKeys ( $this->sProductsI18nsScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->sProductsI18nsScheduledForDeletion = null;
				}
			}
			
			if ($this->collSProductsI18ns !== null) {
				foreach ( $this->collSProductsI18ns as $referrerFK ) {
					if (! $referrerFK->isDeleted ()) {
						$affectedRows += $referrerFK->save ( $con );
					}
				}
			}
			
			if ($this->sProductImagessScheduledForDeletion !== null) {
				if (! $this->sProductImagessScheduledForDeletion->isEmpty ()) {
					SProductImagesQuery::create ()->filterByPrimaryKeys ( $this->sProductImagessScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->sProductImagessScheduledForDeletion = null;
				}
			}
			
			if ($this->collSProductImagess !== null) {
				foreach ( $this->collSProductImagess as $referrerFK ) {
					if (! $referrerFK->isDeleted ()) {
						$affectedRows += $referrerFK->save ( $con );
					}
				}
			}
			
			if ($this->productVariantsScheduledForDeletion !== null) {
				if (! $this->productVariantsScheduledForDeletion->isEmpty ()) {
					SProductVariantsQuery::create ()->filterByPrimaryKeys ( $this->productVariantsScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->productVariantsScheduledForDeletion = null;
				}
			}
			
			if ($this->collProductVariants !== null) {
				foreach ( $this->collProductVariants as $referrerFK ) {
					if (! $referrerFK->isDeleted ()) {
						$affectedRows += $referrerFK->save ( $con );
					}
				}
			}
			
			if ($this->sWarehouseDatasScheduledForDeletion !== null) {
				if (! $this->sWarehouseDatasScheduledForDeletion->isEmpty ()) {
					SWarehouseDataQuery::create ()->filterByPrimaryKeys ( $this->sWarehouseDatasScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->sWarehouseDatasScheduledForDeletion = null;
				}
			}
			
			if ($this->collSWarehouseDatas !== null) {
				foreach ( $this->collSWarehouseDatas as $referrerFK ) {
					if (! $referrerFK->isDeleted ()) {
						$affectedRows += $referrerFK->save ( $con );
					}
				}
			}
			
			if ($this->shopProductCategoriessScheduledForDeletion !== null) {
				if (! $this->shopProductCategoriessScheduledForDeletion->isEmpty ()) {
					ShopProductCategoriesQuery::create ()->filterByPrimaryKeys ( $this->shopProductCategoriessScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->shopProductCategoriessScheduledForDeletion = null;
				}
			}
			
			if ($this->collShopProductCategoriess !== null) {
				foreach ( $this->collShopProductCategoriess as $referrerFK ) {
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
			
			if ($this->sNotificationssScheduledForDeletion !== null) {
				if (! $this->sNotificationssScheduledForDeletion->isEmpty ()) {
					SNotificationsQuery::create ()->filterByPrimaryKeys ( $this->sNotificationssScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->sNotificationssScheduledForDeletion = null;
				}
			}
			
			if ($this->collSNotificationss !== null) {
				foreach ( $this->collSNotificationss as $referrerFK ) {
					if (! $referrerFK->isDeleted ()) {
						$affectedRows += $referrerFK->save ( $con );
					}
				}
			}
			
			if ($this->sOrderProductssScheduledForDeletion !== null) {
				if (! $this->sOrderProductssScheduledForDeletion->isEmpty ()) {
					SOrderProductsQuery::create ()->filterByPrimaryKeys ( $this->sOrderProductssScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->sOrderProductssScheduledForDeletion = null;
				}
			}
			
			if ($this->collSOrderProductss !== null) {
				foreach ( $this->collSOrderProductss as $referrerFK ) {
					if (! $referrerFK->isDeleted ()) {
						$affectedRows += $referrerFK->save ( $con );
					}
				}
			}
			
			if ($this->sProductsRatingsScheduledForDeletion !== null) {
				if (! $this->sProductsRatingsScheduledForDeletion->isEmpty ()) {
					SProductsRatingQuery::create ()->filterByPrimaryKeys ( $this->sProductsRatingsScheduledForDeletion->getPrimaryKeys ( false ) )->delete ( $con );
					$this->sProductsRatingsScheduledForDeletion = null;
				}
			}
			
			if ($this->singleSProductsRating !== null) {
				if (! $this->singleSProductsRating->isDeleted ()) {
					$affectedRows += $this->singleSProductsRating->save ( $con );
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
		
		$this->modifiedColumns [] = SProductsPeer::ID;
		if (null !== $this->id) {
			throw new PropelException ( 'Cannot insert a value for auto-increment primary key (' . SProductsPeer::ID . ')' );
		}
		
		// check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified ( SProductsPeer::ID )) {
			$modifiedColumns [':p' . $index ++] = '`ID`';
		}
		if ($this->isColumnModified ( SProductsPeer::USER_ID )) {
			$modifiedColumns [':p' . $index ++] = '`USER_ID`';
		}
		if ($this->isColumnModified ( SProductsPeer::EXTERNAL_ID )) {
			$modifiedColumns [':p' . $index ++] = '`EXTERNAL_ID`';
		}
		if ($this->isColumnModified ( SProductsPeer::URL )) {
			$modifiedColumns [':p' . $index ++] = '`URL`';
		}
		if ($this->isColumnModified ( SProductsPeer::ACTIVE )) {
			$modifiedColumns [':p' . $index ++] = '`ACTIVE`';
		}
		if ($this->isColumnModified ( SProductsPeer::HIT )) {
			$modifiedColumns [':p' . $index ++] = '`HIT`';
		}
		if ($this->isColumnModified ( SProductsPeer::HOT )) {
			$modifiedColumns [':p' . $index ++] = '`HOT`';
		}
		if ($this->isColumnModified ( SProductsPeer::ACTION )) {
			$modifiedColumns [':p' . $index ++] = '`ACTION`';
		}
		if ($this->isColumnModified ( SProductsPeer::BRAND_ID )) {
			$modifiedColumns [':p' . $index ++] = '`BRAND_ID`';
		}
		if ($this->isColumnModified ( SProductsPeer::CATEGORY_ID )) {
			$modifiedColumns [':p' . $index ++] = '`CATEGORY_ID`';
		}
		if ($this->isColumnModified ( SProductsPeer::RELATED_PRODUCTS )) {
			$modifiedColumns [':p' . $index ++] = '`RELATED_PRODUCTS`';
		}
		if ($this->isColumnModified ( SProductsPeer::MAINIMAGE )) {
			$modifiedColumns [':p' . $index ++] = '`MAINIMAGE`';
		}
		if ($this->isColumnModified ( SProductsPeer::MAINMODIMAGE )) {
			$modifiedColumns [':p' . $index ++] = '`MAINMODIMAGE`';
		}
		if ($this->isColumnModified ( SProductsPeer::SMALLIMAGE )) {
			$modifiedColumns [':p' . $index ++] = '`SMALLIMAGE`';
		}
		if ($this->isColumnModified ( SProductsPeer::SMALLMODIMAGE )) {
			$modifiedColumns [':p' . $index ++] = '`SMALLMODIMAGE`';
		}
		if ($this->isColumnModified ( SProductsPeer::OLD_PRICE )) {
			$modifiedColumns [':p' . $index ++] = '`OLD_PRICE`';
		}
		if ($this->isColumnModified ( SProductsPeer::CREATED )) {
			$modifiedColumns [':p' . $index ++] = '`CREATED`';
		}
		if ($this->isColumnModified ( SProductsPeer::UPDATED )) {
			$modifiedColumns [':p' . $index ++] = '`UPDATED`';
		}
		if ($this->isColumnModified ( SProductsPeer::VIEWS )) {
			$modifiedColumns [':p' . $index ++] = '`VIEWS`';
		}
		if ($this->isColumnModified ( SProductsPeer::ADDED_TO_CART_COUNT )) {
			$modifiedColumns [':p' . $index ++] = '`ADDED_TO_CART_COUNT`';
		}
		if ($this->isColumnModified ( SProductsPeer::ENABLE_COMMENTS )) {
			$modifiedColumns [':p' . $index ++] = '`ENABLE_COMMENTS`';
		}
		if ($this->isColumnModified ( SProductsPeer::TPL )) {
			$modifiedColumns [':p' . $index ++] = '`TPL`';
		}
		
		$sql = sprintf ( 'INSERT INTO `shop_products` (%s) VALUES (%s)', implode ( ', ', $modifiedColumns ), implode ( ', ', array_keys ( $modifiedColumns ) ) );
		
		try {
			$stmt = $con->prepare ( $sql );
			foreach ( $modifiedColumns as $identifier => $columnName ) {
				switch ($columnName) {
					case '`ID`' :
						$stmt->bindValue ( $identifier, $this->id, PDO::PARAM_INT );
						break;
					case '`USER_ID`' :
						$stmt->bindValue ( $identifier, $this->user_id, PDO::PARAM_INT );
						break;
					case '`EXTERNAL_ID`' :
						$stmt->bindValue ( $identifier, $this->external_id, PDO::PARAM_STR );
						break;
					case '`URL`' :
						$stmt->bindValue ( $identifier, $this->url, PDO::PARAM_STR );
						break;
					case '`ACTIVE`' :
						$stmt->bindValue ( $identifier, ( int ) $this->active, PDO::PARAM_INT );
						break;
					case '`HIT`' :
						$stmt->bindValue ( $identifier, ( int ) $this->hit, PDO::PARAM_INT );
						break;
					case '`HOT`' :
						$stmt->bindValue ( $identifier, ( int ) $this->hot, PDO::PARAM_INT );
						break;
					case '`ACTION`' :
						$stmt->bindValue ( $identifier, ( int ) $this->action, PDO::PARAM_INT );
						break;
					case '`BRAND_ID`' :
						$stmt->bindValue ( $identifier, $this->brand_id, PDO::PARAM_INT );
						break;
					case '`CATEGORY_ID`' :
						$stmt->bindValue ( $identifier, $this->category_id, PDO::PARAM_INT );
						break;
					case '`RELATED_PRODUCTS`' :
						$stmt->bindValue ( $identifier, $this->related_products, PDO::PARAM_STR );
						break;
					case '`MAINIMAGE`' :
						$stmt->bindValue ( $identifier, $this->mainimage, PDO::PARAM_STR );
						break;
					case '`MAINMODIMAGE`' :
						$stmt->bindValue ( $identifier, $this->mainmodimage, PDO::PARAM_STR );
						break;
					case '`SMALLIMAGE`' :
						$stmt->bindValue ( $identifier, $this->smallimage, PDO::PARAM_STR );
						break;
					case '`SMALLMODIMAGE`' :
						$stmt->bindValue ( $identifier, $this->smallmodimage, PDO::PARAM_STR );
						break;
					case '`OLD_PRICE`' :
						$stmt->bindValue ( $identifier, $this->old_price, PDO::PARAM_STR );
						break;
					case '`CREATED`' :
						$stmt->bindValue ( $identifier, $this->created, PDO::PARAM_INT );
						break;
					case '`UPDATED`' :
						$stmt->bindValue ( $identifier, $this->updated, PDO::PARAM_INT );
						break;
					case '`VIEWS`' :
						$stmt->bindValue ( $identifier, $this->views, PDO::PARAM_INT );
						break;
					case '`ADDED_TO_CART_COUNT`' :
						$stmt->bindValue ( $identifier, $this->added_to_cart_count, PDO::PARAM_INT );
						break;
					case '`ENABLE_COMMENTS`' :
						$stmt->bindValue ( $identifier, ( int ) $this->enable_comments, PDO::PARAM_INT );
						break;
					case '`TPL`' :
						$stmt->bindValue ( $identifier, $this->tpl, PDO::PARAM_STR );
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
			
			if ($this->aBrand !== null) {
				if (! $this->aBrand->validate ( $columns )) {
					$failureMap = array_merge ( $failureMap, $this->aBrand->getValidationFailures () );
				}
			}
			
			if ($this->aMainCategory !== null) {
				if (! $this->aMainCategory->validate ( $columns )) {
					$failureMap = array_merge ( $failureMap, $this->aMainCategory->getValidationFailures () );
				}
			}
			
			if (($retval = SProductsPeer::doValidate ( $this, $columns )) !== true) {
				$failureMap = array_merge ( $failureMap, $retval );
			}
			
			if ($this->collShopKits !== null) {
				foreach ( $this->collShopKits as $referrerFK ) {
					if (! $referrerFK->validate ( $columns )) {
						$failureMap = array_merge ( $failureMap, $referrerFK->getValidationFailures () );
					}
				}
			}
			
			if ($this->collShopKitProducts !== null) {
				foreach ( $this->collShopKitProducts as $referrerFK ) {
					if (! $referrerFK->validate ( $columns )) {
						$failureMap = array_merge ( $failureMap, $referrerFK->getValidationFailures () );
					}
				}
			}
			
			if ($this->collSProductsI18ns !== null) {
				foreach ( $this->collSProductsI18ns as $referrerFK ) {
					if (! $referrerFK->validate ( $columns )) {
						$failureMap = array_merge ( $failureMap, $referrerFK->getValidationFailures () );
					}
				}
			}
			
			if ($this->collSProductImagess !== null) {
				foreach ( $this->collSProductImagess as $referrerFK ) {
					if (! $referrerFK->validate ( $columns )) {
						$failureMap = array_merge ( $failureMap, $referrerFK->getValidationFailures () );
					}
				}
			}
			
			if ($this->collProductVariants !== null) {
				foreach ( $this->collProductVariants as $referrerFK ) {
					if (! $referrerFK->validate ( $columns )) {
						$failureMap = array_merge ( $failureMap, $referrerFK->getValidationFailures () );
					}
				}
			}
			
			if ($this->collSWarehouseDatas !== null) {
				foreach ( $this->collSWarehouseDatas as $referrerFK ) {
					if (! $referrerFK->validate ( $columns )) {
						$failureMap = array_merge ( $failureMap, $referrerFK->getValidationFailures () );
					}
				}
			}
			
			if ($this->collShopProductCategoriess !== null) {
				foreach ( $this->collShopProductCategoriess as $referrerFK ) {
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
			
			if ($this->collSNotificationss !== null) {
				foreach ( $this->collSNotificationss as $referrerFK ) {
					if (! $referrerFK->validate ( $columns )) {
						$failureMap = array_merge ( $failureMap, $referrerFK->getValidationFailures () );
					}
				}
			}
			
			if ($this->collSOrderProductss !== null) {
				foreach ( $this->collSOrderProductss as $referrerFK ) {
					if (! $referrerFK->validate ( $columns )) {
						$failureMap = array_merge ( $failureMap, $referrerFK->getValidationFailures () );
					}
				}
			}
			
			if ($this->singleSProductsRating !== null) {
				if (! $this->singleSProductsRating->validate ( $columns )) {
					$failureMap = array_merge ( $failureMap, $this->singleSProductsRating->getValidationFailures () );
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
		$pos = SProductsPeer::translateFieldName ( $name, $type, BasePeer::TYPE_NUM );
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
				return $this->getUserId ();
				break;
			case 2 :
				return $this->getExternalId ();
				break;
			case 3 :
				return $this->getUrl ();
				break;
			case 4 :
				return $this->getActive ();
				break;
			case 5 :
				return $this->getHit ();
				break;
			case 6 :
				return $this->getHot ();
				break;
			case 7 :
				return $this->getAction ();
				break;
			case 8 :
				return $this->getBrandId ();
				break;
			case 9 :
				return $this->getCategoryId ();
				break;
			case 10 :
				return $this->getRelatedProducts ();
				break;
			case 11 :
				return $this->getMainimage ();
				break;
			case 12 :
				return $this->getMainmodimage ();
				break;
			case 13 :
				return $this->getSmallimage ();
				break;
			case 14 :
				return $this->getSmallmodimage ();
				break;
			case 15 :
				return $this->getOldPrice ();
				break;
			case 16 :
				return $this->getCreated ();
				break;
			case 17 :
				return $this->getUpdated ();
				break;
			case 18 :
				return $this->getViews ();
				break;
			case 19 :
				return $this->getAddedToCartCount ();
				break;
			case 20 :
				return $this->getEnableComments ();
				break;
			case 21 :
				return $this->getTpl ();
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
		if (isset ( $alreadyDumpedObjects ['SProducts'] [$this->getPrimaryKey ()] )) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects ['SProducts'] [$this->getPrimaryKey ()] = true;
		$keys = SProductsPeer::getFieldNames ( $keyType );
		$result = array (
				$keys [0] => $this->getId (),
				$keys [1] => $this->getUserId (),
				$keys [2] => $this->getExternalId (),
				$keys [3] => $this->getUrl (),
				$keys [4] => $this->getActive (),
				$keys [5] => $this->getHit (),
				$keys [6] => $this->getHot (),
				$keys [7] => $this->getAction (),
				$keys [8] => $this->getBrandId (),
				$keys [9] => $this->getCategoryId (),
				$keys [10] => $this->getRelatedProducts (),
				$keys [11] => $this->getMainimage (),
				$keys [12] => $this->getMainmodimage (),
				$keys [13] => $this->getSmallimage (),
				$keys [14] => $this->getSmallmodimage (),
				$keys [15] => $this->getOldPrice (),
				$keys [16] => $this->getCreated (),
				$keys [17] => $this->getUpdated (),
				$keys [18] => $this->getViews (),
				$keys [19] => $this->getAddedToCartCount (),
				$keys [20] => $this->getEnableComments (),
				$keys [21] => $this->getTpl () 
		);
		if ($includeForeignObjects) {
			if (null !== $this->aBrand) {
				$result ['Brand'] = $this->aBrand->toArray ( $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true );
			}
			if (null !== $this->aMainCategory) {
				$result ['MainCategory'] = $this->aMainCategory->toArray ( $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true );
			}
			if (null !== $this->collShopKits) {
				$result ['ShopKits'] = $this->collShopKits->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
			}
			if (null !== $this->collShopKitProducts) {
				$result ['ShopKitProducts'] = $this->collShopKitProducts->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
			}
			if (null !== $this->collSProductsI18ns) {
				$result ['SProductsI18ns'] = $this->collSProductsI18ns->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
			}
			if (null !== $this->collSProductImagess) {
				$result ['SProductImagess'] = $this->collSProductImagess->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
			}
			if (null !== $this->collProductVariants) {
				$result ['ProductVariants'] = $this->collProductVariants->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
			}
			if (null !== $this->collSWarehouseDatas) {
				$result ['SWarehouseDatas'] = $this->collSWarehouseDatas->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
			}
			if (null !== $this->collShopProductCategoriess) {
				$result ['ShopProductCategoriess'] = $this->collShopProductCategoriess->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
			}
			if (null !== $this->collSProductPropertiesDatas) {
				$result ['SProductPropertiesDatas'] = $this->collSProductPropertiesDatas->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
			}
			if (null !== $this->collSNotificationss) {
				$result ['SNotificationss'] = $this->collSNotificationss->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
			}
			if (null !== $this->collSOrderProductss) {
				$result ['SOrderProductss'] = $this->collSOrderProductss->toArray ( null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects );
			}
			if (null !== $this->singleSProductsRating) {
				$result ['SProductsRating'] = $this->singleSProductsRating->toArray ( $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true );
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
		$pos = SProductsPeer::translateFieldName ( $name, $type, BasePeer::TYPE_NUM );
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
				$this->setUserId ( $value );
				break;
			case 2 :
				$this->setExternalId ( $value );
				break;
			case 3 :
				$this->setUrl ( $value );
				break;
			case 4 :
				$this->setActive ( $value );
				break;
			case 5 :
				$this->setHit ( $value );
				break;
			case 6 :
				$this->setHot ( $value );
				break;
			case 7 :
				$this->setAction ( $value );
				break;
			case 8 :
				$this->setBrandId ( $value );
				break;
			case 9 :
				$this->setCategoryId ( $value );
				break;
			case 10 :
				$this->setRelatedProducts ( $value );
				break;
			case 11 :
				$this->setMainimage ( $value );
				break;
			case 12 :
				$this->setMainmodimage ( $value );
				break;
			case 13 :
				$this->setSmallimage ( $value );
				break;
			case 14 :
				$this->setSmallmodimage ( $value );
				break;
			case 15 :
				$this->setOldPrice ( $value );
				break;
			case 16 :
				$this->setCreated ( $value );
				break;
			case 17 :
				$this->setUpdated ( $value );
				break;
			case 18 :
				$this->setViews ( $value );
				break;
			case 19 :
				$this->setAddedToCartCount ( $value );
				break;
			case 20 :
				$this->setEnableComments ( $value );
				break;
			case 21 :
				$this->setTpl ( $value );
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
		$keys = SProductsPeer::getFieldNames ( $keyType );
		
		if (array_key_exists ( $keys [0], $arr ))
			$this->setId ( $arr [$keys [0]] );
		if (array_key_exists ( $keys [1], $arr ))
			$this->setUserId ( $arr [$keys [1]] );
		if (array_key_exists ( $keys [2], $arr ))
			$this->setExternalId ( $arr [$keys [2]] );
		if (array_key_exists ( $keys [3], $arr ))
			$this->setUrl ( $arr [$keys [3]] );
		if (array_key_exists ( $keys [4], $arr ))
			$this->setActive ( $arr [$keys [4]] );
		if (array_key_exists ( $keys [5], $arr ))
			$this->setHit ( $arr [$keys [5]] );
		if (array_key_exists ( $keys [6], $arr ))
			$this->setHot ( $arr [$keys [6]] );
		if (array_key_exists ( $keys [7], $arr ))
			$this->setAction ( $arr [$keys [7]] );
		if (array_key_exists ( $keys [8], $arr ))
			$this->setBrandId ( $arr [$keys [8]] );
		if (array_key_exists ( $keys [9], $arr ))
			$this->setCategoryId ( $arr [$keys [9]] );
		if (array_key_exists ( $keys [10], $arr ))
			$this->setRelatedProducts ( $arr [$keys [10]] );
		if (array_key_exists ( $keys [11], $arr ))
			$this->setMainimage ( $arr [$keys [11]] );
		if (array_key_exists ( $keys [12], $arr ))
			$this->setMainmodimage ( $arr [$keys [12]] );
		if (array_key_exists ( $keys [13], $arr ))
			$this->setSmallimage ( $arr [$keys [13]] );
		if (array_key_exists ( $keys [14], $arr ))
			$this->setSmallmodimage ( $arr [$keys [14]] );
		if (array_key_exists ( $keys [15], $arr ))
			$this->setOldPrice ( $arr [$keys [15]] );
		if (array_key_exists ( $keys [16], $arr ))
			$this->setCreated ( $arr [$keys [16]] );
		if (array_key_exists ( $keys [17], $arr ))
			$this->setUpdated ( $arr [$keys [17]] );
		if (array_key_exists ( $keys [18], $arr ))
			$this->setViews ( $arr [$keys [18]] );
		if (array_key_exists ( $keys [19], $arr ))
			$this->setAddedToCartCount ( $arr [$keys [19]] );
		if (array_key_exists ( $keys [20], $arr ))
			$this->setEnableComments ( $arr [$keys [20]] );
		if (array_key_exists ( $keys [21], $arr ))
			$this->setTpl ( $arr [$keys [21]] );
	}
	
	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria() {
		$criteria = new Criteria ( SProductsPeer::DATABASE_NAME );
		
		if ($this->isColumnModified ( SProductsPeer::ID ))
			$criteria->add ( SProductsPeer::ID, $this->id );
		if ($this->isColumnModified ( SProductsPeer::USER_ID ))
			$criteria->add ( SProductsPeer::USER_ID, $this->user_id );
		if ($this->isColumnModified ( SProductsPeer::EXTERNAL_ID ))
			$criteria->add ( SProductsPeer::EXTERNAL_ID, $this->external_id );
		if ($this->isColumnModified ( SProductsPeer::URL ))
			$criteria->add ( SProductsPeer::URL, $this->url );
		if ($this->isColumnModified ( SProductsPeer::ACTIVE ))
			$criteria->add ( SProductsPeer::ACTIVE, $this->active );
		if ($this->isColumnModified ( SProductsPeer::HIT ))
			$criteria->add ( SProductsPeer::HIT, $this->hit );
		if ($this->isColumnModified ( SProductsPeer::HOT ))
			$criteria->add ( SProductsPeer::HOT, $this->hot );
		if ($this->isColumnModified ( SProductsPeer::ACTION ))
			$criteria->add ( SProductsPeer::ACTION, $this->action );
		if ($this->isColumnModified ( SProductsPeer::BRAND_ID ))
			$criteria->add ( SProductsPeer::BRAND_ID, $this->brand_id );
		if ($this->isColumnModified ( SProductsPeer::CATEGORY_ID ))
			$criteria->add ( SProductsPeer::CATEGORY_ID, $this->category_id );
		if ($this->isColumnModified ( SProductsPeer::RELATED_PRODUCTS ))
			$criteria->add ( SProductsPeer::RELATED_PRODUCTS, $this->related_products );
		if ($this->isColumnModified ( SProductsPeer::MAINIMAGE ))
			$criteria->add ( SProductsPeer::MAINIMAGE, $this->mainimage );
		if ($this->isColumnModified ( SProductsPeer::MAINMODIMAGE ))
			$criteria->add ( SProductsPeer::MAINMODIMAGE, $this->mainmodimage );
		if ($this->isColumnModified ( SProductsPeer::SMALLIMAGE ))
			$criteria->add ( SProductsPeer::SMALLIMAGE, $this->smallimage );
		if ($this->isColumnModified ( SProductsPeer::SMALLMODIMAGE ))
			$criteria->add ( SProductsPeer::SMALLMODIMAGE, $this->smallmodimage );
		if ($this->isColumnModified ( SProductsPeer::OLD_PRICE ))
			$criteria->add ( SProductsPeer::OLD_PRICE, $this->old_price );
		if ($this->isColumnModified ( SProductsPeer::CREATED ))
			$criteria->add ( SProductsPeer::CREATED, $this->created );
		if ($this->isColumnModified ( SProductsPeer::UPDATED ))
			$criteria->add ( SProductsPeer::UPDATED, $this->updated );
		if ($this->isColumnModified ( SProductsPeer::VIEWS ))
			$criteria->add ( SProductsPeer::VIEWS, $this->views );
		if ($this->isColumnModified ( SProductsPeer::ADDED_TO_CART_COUNT ))
			$criteria->add ( SProductsPeer::ADDED_TO_CART_COUNT, $this->added_to_cart_count );
		if ($this->isColumnModified ( SProductsPeer::ENABLE_COMMENTS ))
			$criteria->add ( SProductsPeer::ENABLE_COMMENTS, $this->enable_comments );
		if ($this->isColumnModified ( SProductsPeer::TPL ))
			$criteria->add ( SProductsPeer::TPL, $this->tpl );
		
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
		$criteria = new Criteria ( SProductsPeer::DATABASE_NAME );
		$criteria->add ( SProductsPeer::ID, $this->id );
		
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
	 *        	An object of SProducts (or compatible) type.
	 * @param boolean $deepCopy
	 *        	Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param boolean $makeNew
	 *        	Whether to reset autoincrement PKs and make the object new.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true) {
		$copyObj->setUserId ( $this->getUserId () );
		$copyObj->setExternalId ( $this->getExternalId () );
		$copyObj->setUrl ( $this->getUrl () );
		$copyObj->setActive ( $this->getActive () );
		$copyObj->setHit ( $this->getHit () );
		$copyObj->setHot ( $this->getHot () );
		$copyObj->setAction ( $this->getAction () );
		$copyObj->setBrandId ( $this->getBrandId () );
		$copyObj->setCategoryId ( $this->getCategoryId () );
		$copyObj->setRelatedProducts ( $this->getRelatedProducts () );
		$copyObj->setMainimage ( $this->getMainimage () );
		$copyObj->setMainmodimage ( $this->getMainmodimage () );
		$copyObj->setSmallimage ( $this->getSmallimage () );
		$copyObj->setSmallmodimage ( $this->getSmallmodimage () );
		$copyObj->setOldPrice ( $this->getOldPrice () );
		$copyObj->setCreated ( $this->getCreated () );
		$copyObj->setUpdated ( $this->getUpdated () );
		$copyObj->setViews ( $this->getViews () );
		$copyObj->setAddedToCartCount ( $this->getAddedToCartCount () );
		$copyObj->setEnableComments ( $this->getEnableComments () );
		$copyObj->setTpl ( $this->getTpl () );
		
		if ($deepCopy && ! $this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew ( false );
			// store object hash to prevent cycle
			$this->startCopy = true;
			
			foreach ( $this->getShopKits () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addShopKit ( $relObj->copy ( $deepCopy ) );
				}
			}
			
			foreach ( $this->getShopKitProducts () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addShopKitProduct ( $relObj->copy ( $deepCopy ) );
				}
			}
			
			foreach ( $this->getSProductsI18ns () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSProductsI18n ( $relObj->copy ( $deepCopy ) );
				}
			}
			
			foreach ( $this->getSProductImagess () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSProductImages ( $relObj->copy ( $deepCopy ) );
				}
			}
			
			foreach ( $this->getProductVariants () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProductVariant ( $relObj->copy ( $deepCopy ) );
				}
			}
			
			foreach ( $this->getSWarehouseDatas () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSWarehouseData ( $relObj->copy ( $deepCopy ) );
				}
			}
			
			foreach ( $this->getShopProductCategoriess () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addShopProductCategories ( $relObj->copy ( $deepCopy ) );
				}
			}
			
			foreach ( $this->getSProductPropertiesDatas () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSProductPropertiesData ( $relObj->copy ( $deepCopy ) );
				}
			}
			
			foreach ( $this->getSNotificationss () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSNotifications ( $relObj->copy ( $deepCopy ) );
				}
			}
			
			foreach ( $this->getSOrderProductss () as $relObj ) {
				if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSOrderProducts ( $relObj->copy ( $deepCopy ) );
				}
			}
			
			$relObj = $this->getSProductsRating ();
			if ($relObj) {
				$copyObj->setSProductsRating ( $relObj->copy ( $deepCopy ) );
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
	 * @return SProducts Clone of current object.
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
	 * @return SProductsPeer
	 */
	public function getPeer() {
		if (self::$peer === null) {
			self::$peer = new SProductsPeer ();
		}
		return self::$peer;
	}
	
	/**
	 * Declares an association between this object and a SBrands object.
	 *
	 * @param SBrands $v        	
	 * @return SProducts The current object (for fluent API support)
	 * @throws PropelException
	 */
	public function setBrand(SBrands $v = null) {
		if ($v === null) {
			$this->setBrandId ( NULL );
		} else {
			$this->setBrandId ( $v->getId () );
		}
		
		$this->aBrand = $v;
		
		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SBrands object, it will not be re-added.
		if ($v !== null) {
			$v->addSProducts ( $this );
		}
		
		return $this;
	}
	
	/**
	 * Get the associated SBrands object
	 *
	 * @param
	 *        	PropelPDO Optional Connection object.
	 * @return SBrands The associated SBrands object.
	 * @throws PropelException
	 */
	public function getBrand(PropelPDO $con = null) {
		if ($this->aBrand === null && ($this->brand_id !== null)) {
			$this->aBrand = SBrandsQuery::create ()->findPk ( $this->brand_id, $con );
			/*
			 * The following can be used additionally to
			 * guarantee the related object contains a reference
			 * to this object. This level of coupling may, however, be
			 * undesirable since it could result in an only partially populated collection
			 * in the referenced object.
			 * $this->aBrand->addSProductss($this);
			 */
		}
		return $this->aBrand;
	}
	
	/**
	 * Declares an association between this object and a SCategory object.
	 *
	 * @param SCategory $v        	
	 * @return SProducts The current object (for fluent API support)
	 * @throws PropelException
	 */
	public function setMainCategory(SCategory $v = null) {
		if ($v === null) {
			$this->setCategoryId ( NULL );
		} else {
			$this->setCategoryId ( $v->getId () );
		}
		
		$this->aMainCategory = $v;
		
		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SCategory object, it will not be re-added.
		if ($v !== null) {
			$v->addSProducts ( $this );
		}
		
		return $this;
	}
	
	/**
	 * Get the associated SCategory object
	 *
	 * @param
	 *        	PropelPDO Optional Connection object.
	 * @return SCategory The associated SCategory object.
	 * @throws PropelException
	 */
	public function getMainCategory(PropelPDO $con = null) {
		if ($this->aMainCategory === null && ($this->category_id !== null)) {
			$this->aMainCategory = SCategoryQuery::create ()->findPk ( $this->category_id, $con );
			/*
			 * The following can be used additionally to
			 * guarantee the related object contains a reference
			 * to this object. This level of coupling may, however, be
			 * undesirable since it could result in an only partially populated collection
			 * in the referenced object.
			 * $this->aMainCategory->addSProductss($this);
			 */
		}
		return $this->aMainCategory;
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
		if ('ShopKit' == $relationName) {
			return $this->initShopKits ();
		}
		if ('ShopKitProduct' == $relationName) {
			return $this->initShopKitProducts ();
		}
		if ('SProductsI18n' == $relationName) {
			return $this->initSProductsI18ns ();
		}
		if ('SProductImages' == $relationName) {
			return $this->initSProductImagess ();
		}
		if ('ProductVariant' == $relationName) {
			return $this->initProductVariants ();
		}
		if ('SWarehouseData' == $relationName) {
			return $this->initSWarehouseDatas ();
		}
		if ('ShopProductCategories' == $relationName) {
			return $this->initShopProductCategoriess ();
		}
		if ('SProductPropertiesData' == $relationName) {
			return $this->initSProductPropertiesDatas ();
		}
		if ('SNotifications' == $relationName) {
			return $this->initSNotificationss ();
		}
		if ('SOrderProducts' == $relationName) {
			return $this->initSOrderProductss ();
		}
	}
	
	/**
	 * Clears out the collShopKits collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addShopKits()
	 */
	public function clearShopKits() {
		$this->collShopKits = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collShopKits collection.
	 *
	 * By default this just sets the collShopKits collection to an empty array (like clearcollShopKits());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initShopKits($overrideExisting = true) {
		if (null !== $this->collShopKits && ! $overrideExisting) {
			return;
		}
		$this->collShopKits = new PropelObjectCollection ();
		$this->collShopKits->setModel ( 'ShopKit' );
	}
	
	/**
	 * Gets an array of ShopKit objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SProducts is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array ShopKit[] List of ShopKit objects
	 * @throws PropelException
	 */
	public function getShopKits($criteria = null, PropelPDO $con = null) {
		if (null === $this->collShopKits || null !== $criteria) {
			if ($this->isNew () && null === $this->collShopKits) {
				// return empty collection
				$this->initShopKits ();
			} else {
				$collShopKits = ShopKitQuery::create ( null, $criteria )->filterBySProducts ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collShopKits;
				}
				$this->collShopKits = $collShopKits;
			}
		}
		return $this->collShopKits;
	}
	
	/**
	 * Sets a collection of ShopKit objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $shopKits
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setShopKits(PropelCollection $shopKits, PropelPDO $con = null) {
		$this->shopKitsScheduledForDeletion = $this->getShopKits ( new Criteria (), $con )->diff ( $shopKits );
		
		foreach ( $shopKits as $shopKit ) {
			// Fix issue with collection modified by reference
			if ($shopKit->isNew ()) {
				$shopKit->setSProducts ( $this );
			}
			$this->addShopKit ( $shopKit );
		}
		
		$this->collShopKits = $shopKits;
	}
	
	/**
	 * Returns the number of related ShopKit objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related ShopKit objects.
	 * @throws PropelException
	 */
	public function countShopKits(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collShopKits || null !== $criteria) {
			if ($this->isNew () && null === $this->collShopKits) {
				return 0;
			} else {
				$query = ShopKitQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterBySProducts ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collShopKits );
		}
	}
	
	/**
	 * Method called to associate a ShopKit object to this object
	 * through the ShopKit foreign key attribute.
	 *
	 * @param ShopKit $l
	 *        	ShopKit
	 * @return SProducts The current object (for fluent API support)
	 */
	public function addShopKit(ShopKit $l) {
		if ($this->collShopKits === null) {
			$this->initShopKits ();
		}
		if (! $this->collShopKits->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddShopKit ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param ShopKit $shopKit
	 *        	The shopKit object to add.
	 */
	protected function doAddShopKit($shopKit) {
		$this->collShopKits [] = $shopKit;
		$shopKit->setSProducts ( $this );
	}
	
	/**
	 * Clears out the collShopKitProducts collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addShopKitProducts()
	 */
	public function clearShopKitProducts() {
		$this->collShopKitProducts = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collShopKitProducts collection.
	 *
	 * By default this just sets the collShopKitProducts collection to an empty array (like clearcollShopKitProducts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initShopKitProducts($overrideExisting = true) {
		if (null !== $this->collShopKitProducts && ! $overrideExisting) {
			return;
		}
		$this->collShopKitProducts = new PropelObjectCollection ();
		$this->collShopKitProducts->setModel ( 'ShopKitProduct' );
	}
	
	/**
	 * Gets an array of ShopKitProduct objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SProducts is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array ShopKitProduct[] List of ShopKitProduct objects
	 * @throws PropelException
	 */
	public function getShopKitProducts($criteria = null, PropelPDO $con = null) {
		if (null === $this->collShopKitProducts || null !== $criteria) {
			if ($this->isNew () && null === $this->collShopKitProducts) {
				// return empty collection
				$this->initShopKitProducts ();
			} else {
				$collShopKitProducts = ShopKitProductQuery::create ( null, $criteria )->filterBySProducts ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collShopKitProducts;
				}
				$this->collShopKitProducts = $collShopKitProducts;
			}
		}
		return $this->collShopKitProducts;
	}
	
	/**
	 * Sets a collection of ShopKitProduct objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $shopKitProducts
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setShopKitProducts(PropelCollection $shopKitProducts, PropelPDO $con = null) {
		$this->shopKitProductsScheduledForDeletion = $this->getShopKitProducts ( new Criteria (), $con )->diff ( $shopKitProducts );
		
		foreach ( $shopKitProducts as $shopKitProduct ) {
			// Fix issue with collection modified by reference
			if ($shopKitProduct->isNew ()) {
				$shopKitProduct->setSProducts ( $this );
			}
			$this->addShopKitProduct ( $shopKitProduct );
		}
		
		$this->collShopKitProducts = $shopKitProducts;
	}
	
	/**
	 * Returns the number of related ShopKitProduct objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related ShopKitProduct objects.
	 * @throws PropelException
	 */
	public function countShopKitProducts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collShopKitProducts || null !== $criteria) {
			if ($this->isNew () && null === $this->collShopKitProducts) {
				return 0;
			} else {
				$query = ShopKitProductQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterBySProducts ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collShopKitProducts );
		}
	}
	
	/**
	 * Method called to associate a ShopKitProduct object to this object
	 * through the ShopKitProduct foreign key attribute.
	 *
	 * @param ShopKitProduct $l
	 *        	ShopKitProduct
	 * @return SProducts The current object (for fluent API support)
	 */
	public function addShopKitProduct(ShopKitProduct $l) {
		if ($this->collShopKitProducts === null) {
			$this->initShopKitProducts ();
		}
		if (! $this->collShopKitProducts->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddShopKitProduct ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param ShopKitProduct $shopKitProduct
	 *        	The shopKitProduct object to add.
	 */
	protected function doAddShopKitProduct($shopKitProduct) {
		$this->collShopKitProducts [] = $shopKitProduct;
		$shopKitProduct->setSProducts ( $this );
	}
	
	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SProducts is new, it will return
	 * an empty collection; or if this SProducts has previously
	 * been saved, it will retrieve related ShopKitProducts from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable. You can provide public methods for those you
	 * actually need in SProducts.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @param string $join_behavior
	 *        	optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return PropelCollection|array ShopKitProduct[] List of ShopKitProduct objects
	 */
	public function getShopKitProductsJoinSProductVariants($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$query = ShopKitProductQuery::create ( null, $criteria );
		$query->joinWith ( 'SProductVariants', $join_behavior );
		
		return $this->getShopKitProducts ( $query, $con );
	}
	
	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SProducts is new, it will return
	 * an empty collection; or if this SProducts has previously
	 * been saved, it will retrieve related ShopKitProducts from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable. You can provide public methods for those you
	 * actually need in SProducts.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @param string $join_behavior
	 *        	optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return PropelCollection|array ShopKitProduct[] List of ShopKitProduct objects
	 */
	public function getShopKitProductsJoinShopKit($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$query = ShopKitProductQuery::create ( null, $criteria );
		$query->joinWith ( 'ShopKit', $join_behavior );
		
		return $this->getShopKitProducts ( $query, $con );
	}
	
	/**
	 * Clears out the collSProductsI18ns collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addSProductsI18ns()
	 */
	public function clearSProductsI18ns() {
		$this->collSProductsI18ns = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collSProductsI18ns collection.
	 *
	 * By default this just sets the collSProductsI18ns collection to an empty array (like clearcollSProductsI18ns());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initSProductsI18ns($overrideExisting = true) {
		if (null !== $this->collSProductsI18ns && ! $overrideExisting) {
			return;
		}
		$this->collSProductsI18ns = new PropelObjectCollection ();
		$this->collSProductsI18ns->setModel ( 'SProductsI18n' );
	}
	
	/**
	 * Gets an array of SProductsI18n objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SProducts is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array SProductsI18n[] List of SProductsI18n objects
	 * @throws PropelException
	 */
	public function getSProductsI18ns($criteria = null, PropelPDO $con = null) {
		if (null === $this->collSProductsI18ns || null !== $criteria) {
			if ($this->isNew () && null === $this->collSProductsI18ns) {
				// return empty collection
				$this->initSProductsI18ns ();
			} else {
				$collSProductsI18ns = SProductsI18nQuery::create ( null, $criteria )->filterBySProducts ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collSProductsI18ns;
				}
				$this->collSProductsI18ns = $collSProductsI18ns;
			}
		}
		return $this->collSProductsI18ns;
	}
	
	/**
	 * Sets a collection of SProductsI18n objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $sProductsI18ns
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setSProductsI18ns(PropelCollection $sProductsI18ns, PropelPDO $con = null) {
		$this->sProductsI18nsScheduledForDeletion = $this->getSProductsI18ns ( new Criteria (), $con )->diff ( $sProductsI18ns );
		
		foreach ( $sProductsI18ns as $sProductsI18n ) {
			// Fix issue with collection modified by reference
			if ($sProductsI18n->isNew ()) {
				$sProductsI18n->setSProducts ( $this );
			}
			$this->addSProductsI18n ( $sProductsI18n );
		}
		
		$this->collSProductsI18ns = $sProductsI18ns;
	}
	
	/**
	 * Returns the number of related SProductsI18n objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related SProductsI18n objects.
	 * @throws PropelException
	 */
	public function countSProductsI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collSProductsI18ns || null !== $criteria) {
			if ($this->isNew () && null === $this->collSProductsI18ns) {
				return 0;
			} else {
				$query = SProductsI18nQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterBySProducts ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collSProductsI18ns );
		}
	}
	
	/**
	 * Method called to associate a SProductsI18n object to this object
	 * through the SProductsI18n foreign key attribute.
	 *
	 * @param SProductsI18n $l
	 *        	SProductsI18n
	 * @return SProducts The current object (for fluent API support)
	 */
	public function addSProductsI18n(SProductsI18n $l) {
		if ($l && $locale = $l->getLocale ()) {
			$this->setLocale ( $locale );
			$this->currentTranslations [$locale] = $l;
		}
		if ($this->collSProductsI18ns === null) {
			$this->initSProductsI18ns ();
		}
		if (! $this->collSProductsI18ns->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddSProductsI18n ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param SProductsI18n $sProductsI18n
	 *        	The sProductsI18n object to add.
	 */
	protected function doAddSProductsI18n($sProductsI18n) {
		$this->collSProductsI18ns [] = $sProductsI18n;
		$sProductsI18n->setSProducts ( $this );
	}
	
	/**
	 * Clears out the collSProductImagess collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addSProductImagess()
	 */
	public function clearSProductImagess() {
		$this->collSProductImagess = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collSProductImagess collection.
	 *
	 * By default this just sets the collSProductImagess collection to an empty array (like clearcollSProductImagess());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initSProductImagess($overrideExisting = true) {
		if (null !== $this->collSProductImagess && ! $overrideExisting) {
			return;
		}
		$this->collSProductImagess = new PropelObjectCollection ();
		$this->collSProductImagess->setModel ( 'SProductImages' );
	}
	
	/**
	 * Gets an array of SProductImages objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SProducts is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array SProductImages[] List of SProductImages objects
	 * @throws PropelException
	 */
	public function getSProductImagess($criteria = null, PropelPDO $con = null) {
		if (null === $this->collSProductImagess || null !== $criteria) {
			if ($this->isNew () && null === $this->collSProductImagess) {
				// return empty collection
				$this->initSProductImagess ();
			} else {
				$collSProductImagess = SProductImagesQuery::create ( null, $criteria )->filterBySProducts ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collSProductImagess;
				}
				$this->collSProductImagess = $collSProductImagess;
			}
		}
		return $this->collSProductImagess;
	}
	
	/**
	 * Sets a collection of SProductImages objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $sProductImagess
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setSProductImagess(PropelCollection $sProductImagess, PropelPDO $con = null) {
		$this->sProductImagessScheduledForDeletion = $this->getSProductImagess ( new Criteria (), $con )->diff ( $sProductImagess );
		
		foreach ( $sProductImagess as $sProductImages ) {
			// Fix issue with collection modified by reference
			if ($sProductImages->isNew ()) {
				$sProductImages->setSProducts ( $this );
			}
			$this->addSProductImages ( $sProductImages );
		}
		
		$this->collSProductImagess = $sProductImagess;
	}
	
	/**
	 * Returns the number of related SProductImages objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related SProductImages objects.
	 * @throws PropelException
	 */
	public function countSProductImagess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collSProductImagess || null !== $criteria) {
			if ($this->isNew () && null === $this->collSProductImagess) {
				return 0;
			} else {
				$query = SProductImagesQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterBySProducts ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collSProductImagess );
		}
	}
	
	/**
	 * Method called to associate a SProductImages object to this object
	 * through the SProductImages foreign key attribute.
	 *
	 * @param SProductImages $l
	 *        	SProductImages
	 * @return SProducts The current object (for fluent API support)
	 */
	public function addSProductImages(SProductImages $l) {
		if ($this->collSProductImagess === null) {
			$this->initSProductImagess ();
		}
		if (! $this->collSProductImagess->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddSProductImages ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param SProductImages $sProductImages
	 *        	The sProductImages object to add.
	 */
	protected function doAddSProductImages($sProductImages) {
		$this->collSProductImagess [] = $sProductImages;
		$sProductImages->setSProducts ( $this );
	}
	
	/**
	 * Clears out the collProductVariants collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addProductVariants()
	 */
	public function clearProductVariants() {
		$this->collProductVariants = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collProductVariants collection.
	 *
	 * By default this just sets the collProductVariants collection to an empty array (like clearcollProductVariants());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initProductVariants($overrideExisting = true) {
		if (null !== $this->collProductVariants && ! $overrideExisting) {
			return;
		}
		$this->collProductVariants = new PropelObjectCollection ();
		$this->collProductVariants->setModel ( 'SProductVariants' );
	}
	
	/**
	 * Gets an array of SProductVariants objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SProducts is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array SProductVariants[] List of SProductVariants objects
	 * @throws PropelException
	 */
	public function getProductVariants($criteria = null, PropelPDO $con = null) {
		if (null === $this->collProductVariants || null !== $criteria) {
			if ($this->isNew () && null === $this->collProductVariants) {
				// return empty collection
				$this->initProductVariants ();
			} else {
				$collProductVariants = SProductVariantsQuery::create ( null, $criteria )->filterBySProducts ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collProductVariants;
				}
				$this->collProductVariants = $collProductVariants;
			}
		}
		return $this->collProductVariants;
	}
	
	/**
	 * Sets a collection of ProductVariant objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $productVariants
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setProductVariants(PropelCollection $productVariants, PropelPDO $con = null) {
		$this->productVariantsScheduledForDeletion = $this->getProductVariants ( new Criteria (), $con )->diff ( $productVariants );
		
		foreach ( $productVariants as $productVariant ) {
			// Fix issue with collection modified by reference
			if ($productVariant->isNew ()) {
				$productVariant->setSProducts ( $this );
			}
			$this->addProductVariant ( $productVariant );
		}
		
		$this->collProductVariants = $productVariants;
	}
	
	/**
	 * Returns the number of related SProductVariants objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related SProductVariants objects.
	 * @throws PropelException
	 */
	public function countProductVariants(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collProductVariants || null !== $criteria) {
			if ($this->isNew () && null === $this->collProductVariants) {
				return 0;
			} else {
				$query = SProductVariantsQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterBySProducts ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collProductVariants );
		}
	}
	
	/**
	 * Method called to associate a SProductVariants object to this object
	 * through the SProductVariants foreign key attribute.
	 *
	 * @param SProductVariants $l
	 *        	SProductVariants
	 * @return SProducts The current object (for fluent API support)
	 */
	public function addProductVariant(SProductVariants $l) {
		if ($this->collProductVariants === null) {
			$this->initProductVariants ();
		}
		if (! $this->collProductVariants->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddProductVariant ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param ProductVariant $productVariant
	 *        	The productVariant object to add.
	 */
	protected function doAddProductVariant($productVariant) {
		$this->collProductVariants [] = $productVariant;
		$productVariant->setSProducts ( $this );
	}
	
	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SProducts is new, it will return
	 * an empty collection; or if this SProducts has previously
	 * been saved, it will retrieve related ProductVariants from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable. You can provide public methods for those you
	 * actually need in SProducts.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @param string $join_behavior
	 *        	optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return PropelCollection|array SProductVariants[] List of SProductVariants objects
	 */
	public function getProductVariantsJoinSCurrencies($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$query = SProductVariantsQuery::create ( null, $criteria );
		$query->joinWith ( 'SCurrencies', $join_behavior );
		
		return $this->getProductVariants ( $query, $con );
	}
	
	/**
	 * Clears out the collSWarehouseDatas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addSWarehouseDatas()
	 */
	public function clearSWarehouseDatas() {
		$this->collSWarehouseDatas = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collSWarehouseDatas collection.
	 *
	 * By default this just sets the collSWarehouseDatas collection to an empty array (like clearcollSWarehouseDatas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initSWarehouseDatas($overrideExisting = true) {
		if (null !== $this->collSWarehouseDatas && ! $overrideExisting) {
			return;
		}
		$this->collSWarehouseDatas = new PropelObjectCollection ();
		$this->collSWarehouseDatas->setModel ( 'SWarehouseData' );
	}
	
	/**
	 * Gets an array of SWarehouseData objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SProducts is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array SWarehouseData[] List of SWarehouseData objects
	 * @throws PropelException
	 */
	public function getSWarehouseDatas($criteria = null, PropelPDO $con = null) {
		if (null === $this->collSWarehouseDatas || null !== $criteria) {
			if ($this->isNew () && null === $this->collSWarehouseDatas) {
				// return empty collection
				$this->initSWarehouseDatas ();
			} else {
				$collSWarehouseDatas = SWarehouseDataQuery::create ( null, $criteria )->filterBySProducts ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collSWarehouseDatas;
				}
				$this->collSWarehouseDatas = $collSWarehouseDatas;
			}
		}
		return $this->collSWarehouseDatas;
	}
	
	/**
	 * Sets a collection of SWarehouseData objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $sWarehouseDatas
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setSWarehouseDatas(PropelCollection $sWarehouseDatas, PropelPDO $con = null) {
		$this->sWarehouseDatasScheduledForDeletion = $this->getSWarehouseDatas ( new Criteria (), $con )->diff ( $sWarehouseDatas );
		
		foreach ( $sWarehouseDatas as $sWarehouseData ) {
			// Fix issue with collection modified by reference
			if ($sWarehouseData->isNew ()) {
				$sWarehouseData->setSProducts ( $this );
			}
			$this->addSWarehouseData ( $sWarehouseData );
		}
		
		$this->collSWarehouseDatas = $sWarehouseDatas;
	}
	
	/**
	 * Returns the number of related SWarehouseData objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related SWarehouseData objects.
	 * @throws PropelException
	 */
	public function countSWarehouseDatas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collSWarehouseDatas || null !== $criteria) {
			if ($this->isNew () && null === $this->collSWarehouseDatas) {
				return 0;
			} else {
				$query = SWarehouseDataQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterBySProducts ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collSWarehouseDatas );
		}
	}
	
	/**
	 * Method called to associate a SWarehouseData object to this object
	 * through the SWarehouseData foreign key attribute.
	 *
	 * @param SWarehouseData $l
	 *        	SWarehouseData
	 * @return SProducts The current object (for fluent API support)
	 */
	public function addSWarehouseData(SWarehouseData $l) {
		if ($this->collSWarehouseDatas === null) {
			$this->initSWarehouseDatas ();
		}
		if (! $this->collSWarehouseDatas->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddSWarehouseData ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param SWarehouseData $sWarehouseData
	 *        	The sWarehouseData object to add.
	 */
	protected function doAddSWarehouseData($sWarehouseData) {
		$this->collSWarehouseDatas [] = $sWarehouseData;
		$sWarehouseData->setSProducts ( $this );
	}
	
	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SProducts is new, it will return
	 * an empty collection; or if this SProducts has previously
	 * been saved, it will retrieve related SWarehouseDatas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable. You can provide public methods for those you
	 * actually need in SProducts.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @param string $join_behavior
	 *        	optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return PropelCollection|array SWarehouseData[] List of SWarehouseData objects
	 */
	public function getSWarehouseDatasJoinSWarehouses($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$query = SWarehouseDataQuery::create ( null, $criteria );
		$query->joinWith ( 'SWarehouses', $join_behavior );
		
		return $this->getSWarehouseDatas ( $query, $con );
	}
	
	/**
	 * Clears out the collShopProductCategoriess collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addShopProductCategoriess()
	 */
	public function clearShopProductCategoriess() {
		$this->collShopProductCategoriess = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collShopProductCategoriess collection.
	 *
	 * By default this just sets the collShopProductCategoriess collection to an empty array (like clearcollShopProductCategoriess());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initShopProductCategoriess($overrideExisting = true) {
		if (null !== $this->collShopProductCategoriess && ! $overrideExisting) {
			return;
		}
		$this->collShopProductCategoriess = new PropelObjectCollection ();
		$this->collShopProductCategoriess->setModel ( 'ShopProductCategories' );
	}
	
	/**
	 * Gets an array of ShopProductCategories objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SProducts is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array ShopProductCategories[] List of ShopProductCategories objects
	 * @throws PropelException
	 */
	public function getShopProductCategoriess($criteria = null, PropelPDO $con = null) {
		if (null === $this->collShopProductCategoriess || null !== $criteria) {
			if ($this->isNew () && null === $this->collShopProductCategoriess) {
				// return empty collection
				$this->initShopProductCategoriess ();
			} else {
				$collShopProductCategoriess = ShopProductCategoriesQuery::create ( null, $criteria )->filterByProduct ( $this )->find ( $con );
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
	 * @param PropelCollection $shopProductCategoriess
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setShopProductCategoriess(PropelCollection $shopProductCategoriess, PropelPDO $con = null) {
		$this->shopProductCategoriessScheduledForDeletion = $this->getShopProductCategoriess ( new Criteria (), $con )->diff ( $shopProductCategoriess );
		
		foreach ( $shopProductCategoriess as $shopProductCategories ) {
			// Fix issue with collection modified by reference
			if ($shopProductCategories->isNew ()) {
				$shopProductCategories->setProduct ( $this );
			}
			$this->addShopProductCategories ( $shopProductCategories );
		}
		
		$this->collShopProductCategoriess = $shopProductCategoriess;
	}
	
	/**
	 * Returns the number of related ShopProductCategories objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related ShopProductCategories objects.
	 * @throws PropelException
	 */
	public function countShopProductCategoriess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collShopProductCategoriess || null !== $criteria) {
			if ($this->isNew () && null === $this->collShopProductCategoriess) {
				return 0;
			} else {
				$query = ShopProductCategoriesQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterByProduct ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collShopProductCategoriess );
		}
	}
	
	/**
	 * Method called to associate a ShopProductCategories object to this object
	 * through the ShopProductCategories foreign key attribute.
	 *
	 * @param ShopProductCategories $l
	 *        	ShopProductCategories
	 * @return SProducts The current object (for fluent API support)
	 */
	public function addShopProductCategories(ShopProductCategories $l) {
		if ($this->collShopProductCategoriess === null) {
			$this->initShopProductCategoriess ();
		}
		if (! $this->collShopProductCategoriess->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddShopProductCategories ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param ShopProductCategories $shopProductCategories
	 *        	The shopProductCategories object to add.
	 */
	protected function doAddShopProductCategories($shopProductCategories) {
		$this->collShopProductCategoriess [] = $shopProductCategories;
		$shopProductCategories->setProduct ( $this );
	}
	
	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SProducts is new, it will return
	 * an empty collection; or if this SProducts has previously
	 * been saved, it will retrieve related ShopProductCategoriess from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable. You can provide public methods for those you
	 * actually need in SProducts.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @param string $join_behavior
	 *        	optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return PropelCollection|array ShopProductCategories[] List of ShopProductCategories objects
	 */
	public function getShopProductCategoriessJoinCategory($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$query = ShopProductCategoriesQuery::create ( null, $criteria );
		$query->joinWith ( 'Category', $join_behavior );
		
		return $this->getShopProductCategoriess ( $query, $con );
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
	 * If this SProducts is new, it will return
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
				$collSProductPropertiesDatas = SProductPropertiesDataQuery::create ( null, $criteria )->filterByProduct ( $this )->find ( $con );
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
				$sProductPropertiesData->setProduct ( $this );
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
				return $query->filterByProduct ( $this )->count ( $con );
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
	 * @return SProducts The current object (for fluent API support)
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
		$sProductPropertiesData->setProduct ( $this );
	}
	
	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SProducts is new, it will return
	 * an empty collection; or if this SProducts has previously
	 * been saved, it will retrieve related SProductPropertiesDatas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable. You can provide public methods for those you
	 * actually need in SProducts.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @param string $join_behavior
	 *        	optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return PropelCollection|array SProductPropertiesData[] List of SProductPropertiesData objects
	 */
	public function getSProductPropertiesDatasJoinSProperties($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$query = SProductPropertiesDataQuery::create ( null, $criteria );
		$query->joinWith ( 'SProperties', $join_behavior );
		
		return $this->getSProductPropertiesDatas ( $query, $con );
	}
	
	/**
	 * Clears out the collSNotificationss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addSNotificationss()
	 */
	public function clearSNotificationss() {
		$this->collSNotificationss = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collSNotificationss collection.
	 *
	 * By default this just sets the collSNotificationss collection to an empty array (like clearcollSNotificationss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initSNotificationss($overrideExisting = true) {
		if (null !== $this->collSNotificationss && ! $overrideExisting) {
			return;
		}
		$this->collSNotificationss = new PropelObjectCollection ();
		$this->collSNotificationss->setModel ( 'SNotifications' );
	}
	
	/**
	 * Gets an array of SNotifications objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SProducts is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array SNotifications[] List of SNotifications objects
	 * @throws PropelException
	 */
	public function getSNotificationss($criteria = null, PropelPDO $con = null) {
		if (null === $this->collSNotificationss || null !== $criteria) {
			if ($this->isNew () && null === $this->collSNotificationss) {
				// return empty collection
				$this->initSNotificationss ();
			} else {
				$collSNotificationss = SNotificationsQuery::create ( null, $criteria )->filterBySProducts ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collSNotificationss;
				}
				$this->collSNotificationss = $collSNotificationss;
			}
		}
		return $this->collSNotificationss;
	}
	
	/**
	 * Sets a collection of SNotifications objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $sNotificationss
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setSNotificationss(PropelCollection $sNotificationss, PropelPDO $con = null) {
		$this->sNotificationssScheduledForDeletion = $this->getSNotificationss ( new Criteria (), $con )->diff ( $sNotificationss );
		
		foreach ( $sNotificationss as $sNotifications ) {
			// Fix issue with collection modified by reference
			if ($sNotifications->isNew ()) {
				$sNotifications->setSProducts ( $this );
			}
			$this->addSNotifications ( $sNotifications );
		}
		
		$this->collSNotificationss = $sNotificationss;
	}
	
	/**
	 * Returns the number of related SNotifications objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related SNotifications objects.
	 * @throws PropelException
	 */
	public function countSNotificationss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collSNotificationss || null !== $criteria) {
			if ($this->isNew () && null === $this->collSNotificationss) {
				return 0;
			} else {
				$query = SNotificationsQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterBySProducts ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collSNotificationss );
		}
	}
	
	/**
	 * Method called to associate a SNotifications object to this object
	 * through the SNotifications foreign key attribute.
	 *
	 * @param SNotifications $l
	 *        	SNotifications
	 * @return SProducts The current object (for fluent API support)
	 */
	public function addSNotifications(SNotifications $l) {
		if ($this->collSNotificationss === null) {
			$this->initSNotificationss ();
		}
		if (! $this->collSNotificationss->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddSNotifications ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param SNotifications $sNotifications
	 *        	The sNotifications object to add.
	 */
	protected function doAddSNotifications($sNotifications) {
		$this->collSNotificationss [] = $sNotifications;
		$sNotifications->setSProducts ( $this );
	}
	
	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SProducts is new, it will return
	 * an empty collection; or if this SProducts has previously
	 * been saved, it will retrieve related SNotificationss from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable. You can provide public methods for those you
	 * actually need in SProducts.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @param string $join_behavior
	 *        	optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return PropelCollection|array SNotifications[] List of SNotifications objects
	 */
	public function getSNotificationssJoinSProductVariants($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$query = SNotificationsQuery::create ( null, $criteria );
		$query->joinWith ( 'SProductVariants', $join_behavior );
		
		return $this->getSNotificationss ( $query, $con );
	}
	
	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SProducts is new, it will return
	 * an empty collection; or if this SProducts has previously
	 * been saved, it will retrieve related SNotificationss from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable. You can provide public methods for those you
	 * actually need in SProducts.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @param string $join_behavior
	 *        	optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return PropelCollection|array SNotifications[] List of SNotifications objects
	 */
	public function getSNotificationssJoinSNotificationStatuses($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$query = SNotificationsQuery::create ( null, $criteria );
		$query->joinWith ( 'SNotificationStatuses', $join_behavior );
		
		return $this->getSNotificationss ( $query, $con );
	}
	
	/**
	 * Clears out the collSOrderProductss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addSOrderProductss()
	 */
	public function clearSOrderProductss() {
		$this->collSOrderProductss = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collSOrderProductss collection.
	 *
	 * By default this just sets the collSOrderProductss collection to an empty array (like clearcollSOrderProductss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param boolean $overrideExisting
	 *        	If set to true, the method call initializes
	 *        	the collection even if it is not empty
	 *        	
	 * @return void
	 */
	public function initSOrderProductss($overrideExisting = true) {
		if (null !== $this->collSOrderProductss && ! $overrideExisting) {
			return;
		}
		$this->collSOrderProductss = new PropelObjectCollection ();
		$this->collSOrderProductss->setModel ( 'SOrderProducts' );
	}
	
	/**
	 * Gets an array of SOrderProducts objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SProducts is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return PropelCollection|array SOrderProducts[] List of SOrderProducts objects
	 * @throws PropelException
	 */
	public function getSOrderProductss($criteria = null, PropelPDO $con = null) {
		if (null === $this->collSOrderProductss || null !== $criteria) {
			if ($this->isNew () && null === $this->collSOrderProductss) {
				// return empty collection
				$this->initSOrderProductss ();
			} else {
				$collSOrderProductss = SOrderProductsQuery::create ( null, $criteria )->filterBySProducts ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collSOrderProductss;
				}
				$this->collSOrderProductss = $collSOrderProductss;
			}
		}
		return $this->collSOrderProductss;
	}
	
	/**
	 * Sets a collection of SOrderProducts objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $sOrderProductss
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setSOrderProductss(PropelCollection $sOrderProductss, PropelPDO $con = null) {
		$this->sOrderProductssScheduledForDeletion = $this->getSOrderProductss ( new Criteria (), $con )->diff ( $sOrderProductss );
		
		foreach ( $sOrderProductss as $sOrderProducts ) {
			// Fix issue with collection modified by reference
			if ($sOrderProducts->isNew ()) {
				$sOrderProducts->setSProducts ( $this );
			}
			$this->addSOrderProducts ( $sOrderProducts );
		}
		
		$this->collSOrderProductss = $sOrderProductss;
	}
	
	/**
	 * Returns the number of related SOrderProducts objects.
	 *
	 * @param Criteria $criteria        	
	 * @param boolean $distinct        	
	 * @param PropelPDO $con        	
	 * @return int Count of related SOrderProducts objects.
	 * @throws PropelException
	 */
	public function countSOrderProductss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collSOrderProductss || null !== $criteria) {
			if ($this->isNew () && null === $this->collSOrderProductss) {
				return 0;
			} else {
				$query = SOrderProductsQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterBySProducts ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collSOrderProductss );
		}
	}
	
	/**
	 * Method called to associate a SOrderProducts object to this object
	 * through the SOrderProducts foreign key attribute.
	 *
	 * @param SOrderProducts $l
	 *        	SOrderProducts
	 * @return SProducts The current object (for fluent API support)
	 */
	public function addSOrderProducts(SOrderProducts $l) {
		if ($this->collSOrderProductss === null) {
			$this->initSOrderProductss ();
		}
		if (! $this->collSOrderProductss->contains ( $l )) { // only add it if the **same** object is not already associated
			$this->doAddSOrderProducts ( $l );
		}
		
		return $this;
	}
	
	/**
	 *
	 * @param SOrderProducts $sOrderProducts
	 *        	The sOrderProducts object to add.
	 */
	protected function doAddSOrderProducts($sOrderProducts) {
		$this->collSOrderProductss [] = $sOrderProducts;
		$sOrderProducts->setSProducts ( $this );
	}
	
	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SProducts is new, it will return
	 * an empty collection; or if this SProducts has previously
	 * been saved, it will retrieve related SOrderProductss from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable. You can provide public methods for those you
	 * actually need in SProducts.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @param string $join_behavior
	 *        	optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return PropelCollection|array SOrderProducts[] List of SOrderProducts objects
	 */
	public function getSOrderProductssJoinSProductVariants($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$query = SOrderProductsQuery::create ( null, $criteria );
		$query->joinWith ( 'SProductVariants', $join_behavior );
		
		return $this->getSOrderProductss ( $query, $con );
	}
	
	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SProducts is new, it will return
	 * an empty collection; or if this SProducts has previously
	 * been saved, it will retrieve related SOrderProductss from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable. You can provide public methods for those you
	 * actually need in SProducts.
	 *
	 * @param Criteria $criteria
	 *        	optional Criteria object to narrow the query
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @param string $join_behavior
	 *        	optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return PropelCollection|array SOrderProducts[] List of SOrderProducts objects
	 */
	public function getSOrderProductssJoinSOrders($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
		$query = SOrderProductsQuery::create ( null, $criteria );
		$query->joinWith ( 'SOrders', $join_behavior );
		
		return $this->getSOrderProductss ( $query, $con );
	}
	
	/**
	 * Gets a single SProductsRating object, which is related to this object by a one-to-one relationship.
	 *
	 * @param PropelPDO $con
	 *        	optional connection object
	 * @return SProductsRating
	 * @throws PropelException
	 */
	public function getSProductsRating(PropelPDO $con = null) {
		if ($this->singleSProductsRating === null && ! $this->isNew ()) {
			$this->singleSProductsRating = SProductsRatingQuery::create ()->findPk ( $this->getPrimaryKey (), $con );
		}
		
		return $this->singleSProductsRating;
	}
	
	/**
	 * Sets a single SProductsRating object as related to this object by a one-to-one relationship.
	 *
	 * @param SProductsRating $v
	 *        	SProductsRating
	 * @return SProducts The current object (for fluent API support)
	 * @throws PropelException
	 */
	public function setSProductsRating(SProductsRating $v = null) {
		$this->singleSProductsRating = $v;
		
		// Make sure that that the passed-in SProductsRating isn't already associated with this object
		if ($v !== null && $v->getSProducts () === null) {
			$v->setSProducts ( $this );
		}
		
		return $this;
	}
	
	/**
	 * Clears out the collCategorys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return void
	 * @see addCategorys()
	 */
	public function clearCategorys() {
		$this->collCategorys = null; // important to set this to NULL since that means it is uninitialized
	}
	
	/**
	 * Initializes the collCategorys collection.
	 *
	 * By default this just sets the collCategorys collection to an empty collection (like clearCategorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return void
	 */
	public function initCategorys() {
		$this->collCategorys = new PropelObjectCollection ();
		$this->collCategorys->setModel ( 'SCategory' );
	}
	
	/**
	 * Gets a collection of SCategory objects related by a many-to-many relationship
	 * to the current object by way of the shop_product_categories cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SProducts is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param Criteria $criteria
	 *        	Optional query object to filter the query
	 * @param PropelPDO $con
	 *        	Optional connection object
	 *        	
	 * @return PropelCollection|array SCategory[] List of SCategory objects
	 */
	public function getCategorys($criteria = null, PropelPDO $con = null) {
		if (null === $this->collCategorys || null !== $criteria) {
			if ($this->isNew () && null === $this->collCategorys) {
				// return empty collection
				$this->initCategorys ();
			} else {
				$collCategorys = SCategoryQuery::create ( null, $criteria )->filterByProduct ( $this )->find ( $con );
				if (null !== $criteria) {
					return $collCategorys;
				}
				$this->collCategorys = $collCategorys;
			}
		}
		return $this->collCategorys;
	}
	
	/**
	 * Sets a collection of SCategory objects related by a many-to-many relationship
	 * to the current object by way of the shop_product_categories cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param PropelCollection $categorys
	 *        	A Propel collection.
	 * @param PropelPDO $con
	 *        	Optional connection object
	 */
	public function setCategorys(PropelCollection $categorys, PropelPDO $con = null) {
		$shopProductCategoriess = ShopProductCategoriesQuery::create ()->filterBySCategory ( $categorys )->filterByProduct ( $this )->find ( $con );
		
		$this->categorysScheduledForDeletion = $this->getShopProductCategoriess ()->diff ( $shopProductCategoriess );
		$this->collShopProductCategoriess = $shopProductCategoriess;
		
		foreach ( $categorys as $category ) {
			// Fix issue with collection modified by reference
			if ($category->isNew ()) {
				$this->doAddSCategory ( $category );
			} else {
				$this->addSCategory ( $category );
			}
		}
		
		$this->collCategorys = $categorys;
	}
	
	/**
	 * Gets the number of SCategory objects related by a many-to-many relationship
	 * to the current object by way of the shop_product_categories cross-reference table.
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
	public function countCategorys($criteria = null, $distinct = false, PropelPDO $con = null) {
		if (null === $this->collCategorys || null !== $criteria) {
			if ($this->isNew () && null === $this->collCategorys) {
				return 0;
			} else {
				$query = SCategoryQuery::create ( null, $criteria );
				if ($distinct) {
					$query->distinct ();
				}
				return $query->filterByProduct ( $this )->count ( $con );
			}
		} else {
			return count ( $this->collCategorys );
		}
	}
	
	/**
	 * Associate a SCategory object to this object
	 * through the shop_product_categories cross reference table.
	 *
	 * @param SCategory $sCategory
	 *        	The ShopProductCategories object to relate
	 * @return void
	 */
	public function addCategory(SCategory $sCategory) {
		if ($this->collCategorys === null) {
			$this->initCategorys ();
		}
		if (! $this->collCategorys->contains ( $sCategory )) { // only add it if the **same** object is not already associated
			$this->doAddCategory ( $sCategory );
			
			$this->collCategorys [] = $sCategory;
		}
	}
	
	/**
	 *
	 * @param Category $category
	 *        	The category object to add.
	 */
	protected function doAddCategory($category) {
		$shopProductCategories = new ShopProductCategories ();
		$shopProductCategories->setCategory ( $category );
		$this->addShopProductCategories ( $shopProductCategories );
	}
	
	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear() {
		$this->id = null;
		$this->user_id = null;
		$this->external_id = null;
		$this->url = null;
		$this->active = null;
		$this->hit = null;
		$this->hot = null;
		$this->action = null;
		$this->brand_id = null;
		$this->category_id = null;
		$this->related_products = null;
		$this->mainimage = null;
		$this->mainmodimage = null;
		$this->smallimage = null;
		$this->smallmodimage = null;
		$this->old_price = null;
		$this->created = null;
		$this->updated = null;
		$this->views = null;
		$this->added_to_cart_count = null;
		$this->enable_comments = null;
		$this->tpl = null;
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
			if ($this->collShopKits) {
				foreach ( $this->collShopKits as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->collShopKitProducts) {
				foreach ( $this->collShopKitProducts as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->collSProductsI18ns) {
				foreach ( $this->collSProductsI18ns as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->collSProductImagess) {
				foreach ( $this->collSProductImagess as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->collProductVariants) {
				foreach ( $this->collProductVariants as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->collSWarehouseDatas) {
				foreach ( $this->collSWarehouseDatas as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->collShopProductCategoriess) {
				foreach ( $this->collShopProductCategoriess as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->collSProductPropertiesDatas) {
				foreach ( $this->collSProductPropertiesDatas as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->collSNotificationss) {
				foreach ( $this->collSNotificationss as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->collSOrderProductss) {
				foreach ( $this->collSOrderProductss as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
			if ($this->singleSProductsRating) {
				$this->singleSProductsRating->clearAllReferences ( $deep );
			}
			if ($this->collCategorys) {
				foreach ( $this->collCategorys as $o ) {
					$o->clearAllReferences ( $deep );
				}
			}
		} // if ($deep)
		  
		// i18n behavior
		$this->currentLocale = 'ru';
		$this->currentTranslations = null;
		if ($this->collShopKits instanceof PropelCollection) {
			$this->collShopKits->clearIterator ();
		}
		$this->collShopKits = null;
		if ($this->collShopKitProducts instanceof PropelCollection) {
			$this->collShopKitProducts->clearIterator ();
		}
		$this->collShopKitProducts = null;
		if ($this->collSProductsI18ns instanceof PropelCollection) {
			$this->collSProductsI18ns->clearIterator ();
		}
		$this->collSProductsI18ns = null;
		if ($this->collSProductImagess instanceof PropelCollection) {
			$this->collSProductImagess->clearIterator ();
		}
		$this->collSProductImagess = null;
		if ($this->collProductVariants instanceof PropelCollection) {
			$this->collProductVariants->clearIterator ();
		}
		$this->collProductVariants = null;
		if ($this->collSWarehouseDatas instanceof PropelCollection) {
			$this->collSWarehouseDatas->clearIterator ();
		}
		$this->collSWarehouseDatas = null;
		if ($this->collShopProductCategoriess instanceof PropelCollection) {
			$this->collShopProductCategoriess->clearIterator ();
		}
		$this->collShopProductCategoriess = null;
		if ($this->collSProductPropertiesDatas instanceof PropelCollection) {
			$this->collSProductPropertiesDatas->clearIterator ();
		}
		$this->collSProductPropertiesDatas = null;
		if ($this->collSNotificationss instanceof PropelCollection) {
			$this->collSNotificationss->clearIterator ();
		}
		$this->collSNotificationss = null;
		if ($this->collSOrderProductss instanceof PropelCollection) {
			$this->collSOrderProductss->clearIterator ();
		}
		$this->collSOrderProductss = null;
		if ($this->singleSProductsRating instanceof PropelCollection) {
			$this->singleSProductsRating->clearIterator ();
		}
		$this->singleSProductsRating = null;
		if ($this->collCategorys instanceof PropelCollection) {
			$this->collCategorys->clearIterator ();
		}
		$this->collCategorys = null;
		$this->aBrand = null;
		$this->aMainCategory = null;
	}
	
	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString() {
		return ( string ) $this->exportTo ( SProductsPeer::DEFAULT_STRING_FORMAT );
	}
	
	// i18n behavior
	
	/**
	 * Sets the locale for translations
	 *
	 * @param string $locale
	 *        	Locale to use for the translation, e.g. 'fr_FR'
	 *        	
	 * @return SProducts The current object (for fluent API support)
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
	 * @return SProductsI18n
	 */
	public function getTranslation($locale = 'ru', PropelPDO $con = null) {
		if (! isset ( $this->currentTranslations [$locale] )) {
			if (null !== $this->collSProductsI18ns) {
				foreach ( $this->collSProductsI18ns as $translation ) {
					if ($translation->getLocale () == $locale) {
						$this->currentTranslations [$locale] = $translation;
						return $translation;
					}
				}
			}
			if ($this->isNew ()) {
				$translation = new SProductsI18n ();
				$translation->setLocale ( $locale );
			} else {
				$translation = SProductsI18nQuery::create ()->filterByPrimaryKey ( array (
						$this->getPrimaryKey (),
						$locale 
				) )->findOneOrCreate ( $con );
				$this->currentTranslations [$locale] = $translation;
			}
			$this->addSProductsI18n ( $translation );
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
	 * @return SProducts The current object (for fluent API support)
	 */
	public function removeTranslation($locale = 'ru', PropelPDO $con = null) {
		if (! $this->isNew ()) {
			SProductsI18nQuery::create ()->filterByPrimaryKey ( array (
					$this->getPrimaryKey (),
					$locale 
			) )->delete ( $con );
		}
		if (isset ( $this->currentTranslations [$locale] )) {
			unset ( $this->currentTranslations [$locale] );
		}
		foreach ( $this->collSProductsI18ns as $key => $translation ) {
			if ($translation->getLocale () == $locale) {
				unset ( $this->collSProductsI18ns [$key] );
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
	 * @return SProductsI18n
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
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setName($v) {
		$this->getCurrentTranslation ()->setName ( $v );
		
		return $this;
	}
	
	/**
	 * Get the [short_description] column value.
	 *
	 * @return string
	 */
	public function getShortDescription() {
		return $this->getCurrentTranslation ()->getShortDescription ();
	}
	
	/**
	 * Set the value of [short_description] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setShortDescription($v) {
		$this->getCurrentTranslation ()->setShortDescription ( $v );
		
		return $this;
	}
	
	/**
	 * Get the [full_description] column value.
	 *
	 * @return string
	 */
	public function getFullDescription() {
		return $this->getCurrentTranslation ()->getFullDescription ();
	}
	
	/**
	 * Set the value of [full_description] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setFullDescription($v) {
		$this->getCurrentTranslation ()->setFullDescription ( $v );
		
		return $this;
	}
	
	/**
	 * Get the [meta_title] column value.
	 *
	 * @return string
	 */
	public function getMetaTitle() {
		return $this->getCurrentTranslation ()->getMetaTitle ();
	}
	
	/**
	 * Set the value of [meta_title] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setMetaTitle($v) {
		$this->getCurrentTranslation ()->setMetaTitle ( $v );
		
		return $this;
	}
	
	/**
	 * Get the [meta_description] column value.
	 *
	 * @return string
	 */
	public function getMetaDescription() {
		return $this->getCurrentTranslation ()->getMetaDescription ();
	}
	
	/**
	 * Set the value of [meta_description] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setMetaDescription($v) {
		$this->getCurrentTranslation ()->setMetaDescription ( $v );
		
		return $this;
	}
	
	/**
	 * Get the [meta_keywords] column value.
	 *
	 * @return string
	 */
	public function getMetaKeywords() {
		return $this->getCurrentTranslation ()->getMetaKeywords ();
	}
	
	/**
	 * Set the value of [meta_keywords] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SProducts The current object (for fluent API support)
	 */
	public function setMetaKeywords($v) {
		$this->getCurrentTranslation ()->setMetaKeywords ( $v );
		
		return $this;
	}
} // BaseSProducts
