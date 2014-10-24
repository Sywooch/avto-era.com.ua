<?php

/**
 * Base class that represents a row from the 'users' table.
 *
 * 
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSUserProfile extends ShopBaseObject implements Persistent {
	
	/**
	 * Peer class name
	 */
	const PEER = 'SUserProfilePeer';
	
	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * 
	 * @var SUserProfilePeer
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
	 * The value for the username field.
	 * 
	 * @var string
	 */
	protected $username;
	
	/**
	 * The value for the password field.
	 * 
	 * @var string
	 */
	protected $password;
	
	/**
	 * The value for the email field.
	 * 
	 * @var string
	 */
	protected $email;
	
	/**
	 * The value for the address field.
	 * 
	 * @var string
	 */
	protected $address;
	
	/**
	 * The value for the phone field.
	 * 
	 * @var string
	 */
	protected $phone;
	
	/**
	 * The value for the banned field.
	 * 
	 * @var int
	 */
	protected $banned;
	
	/**
	 * The value for the ban_reason field.
	 * 
	 * @var string
	 */
	protected $ban_reason;
	
	/**
	 * The value for the newpass field.
	 * 
	 * @var string
	 */
	protected $newpass;
	
	/**
	 * The value for the newpass_key field.
	 * 
	 * @var string
	 */
	protected $newpass_key;
	
	/**
	 * The value for the newpass_time field.
	 * 
	 * @var int
	 */
	protected $newpass_time;
	
	/**
	 * The value for the created field.
	 * 
	 * @var int
	 */
	protected $created;
	
	/**
	 * The value for the last_ip field.
	 * 
	 * @var string
	 */
	protected $last_ip;
	
	/**
	 * The value for the last_login field.
	 * 
	 * @var int
	 */
	protected $last_login;
	
	/**
	 * The value for the modified field.
	 * 
	 * @var string
	 */
	protected $modified;
	
	/**
	 * The value for the cart_data field.
	 * 
	 * @var string
	 */
	protected $cart_data;
	
	/**
	 * The value for the wish_list_data field.
	 * 
	 * @var string
	 */
	protected $wish_list_data;
	
	/**
	 * The value for the key field.
	 * 
	 * @var string
	 */
	protected $key;
	
	/**
	 * The value for the amout field.
	 * 
	 * @var string
	 */
	protected $amout;
	
	/**
	 * The value for the discount field.
	 * 
	 * @var string
	 */
	protected $discount;
	
	/**
	 * The value for the role_id field.
	 * 
	 * @var int
	 */
	protected $role_id;
	
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
	 * Get the [username] column value.
	 *
	 * @return string
	 */
	public function getName() {
		return $this->username;
	}
	
	/**
	 * Get the [password] column value.
	 *
	 * @return string
	 */
	public function getPassword() {
		return $this->password;
	}
	
	/**
	 * Get the [email] column value.
	 *
	 * @return string
	 */
	public function getUserEmail() {
		return $this->email;
	}
	
	/**
	 * Get the [address] column value.
	 *
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}
	
	/**
	 * Get the [phone] column value.
	 *
	 * @return string
	 */
	public function getPhone() {
		return $this->phone;
	}
	
	/**
	 * Get the [banned] column value.
	 *
	 * @return int
	 */
	public function getBanned() {
		return $this->banned;
	}
	
	/**
	 * Get the [ban_reason] column value.
	 *
	 * @return string
	 */
	public function getBanReason() {
		return $this->ban_reason;
	}
	
	/**
	 * Get the [newpass] column value.
	 *
	 * @return string
	 */
	public function getNewpass() {
		return $this->newpass;
	}
	
	/**
	 * Get the [newpass_key] column value.
	 *
	 * @return string
	 */
	public function getNewpassKey() {
		return $this->newpass_key;
	}
	
	/**
	 * Get the [newpass_time] column value.
	 *
	 * @return int
	 */
	public function getNewpassTime() {
		return $this->newpass_time;
	}
	
	/**
	 * Get the [created] column value.
	 *
	 * @return int
	 */
	public function getDateCreated() {
		return $this->created;
	}
	
	/**
	 * Get the [last_ip] column value.
	 *
	 * @return string
	 */
	public function getLastIp() {
		return $this->last_ip;
	}
	
	/**
	 * Get the [last_login] column value.
	 *
	 * @return int
	 */
	public function getLastLogin() {
		return $this->last_login;
	}
	
	/**
	 * Get the [optionally formatted] temporal [modified] column value.
	 *
	 *
	 * @param string $format
	 *        	The date/time format string (either date()-style or strftime()-style).
	 *        	If format is NULL, then the raw DateTime object will be returned.
	 * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws PropelException - if unable to parse/validate the date/time value.
	 */
	public function getModified($format = 'Y-m-d H:i:s') {
		if ($this->modified === null) {
			return null;
		}
		
		if ($this->modified === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime ( $this->modified );
			} catch ( Exception $x ) {
				throw new PropelException ( "Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export ( $this->modified, true ), $x );
			}
		}
		
		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos ( $format, '%' ) !== false) {
			return strftime ( $format, $dt->format ( 'U' ) );
		} else {
			return $dt->format ( $format );
		}
	}
	
	/**
	 * Get the [cart_data] column value.
	 *
	 * @return string
	 */
	public function getCartData() {
		return $this->cart_data;
	}
	
	/**
	 * Get the [wish_list_data] column value.
	 *
	 * @return string
	 */
	public function getWishListData() {
		return $this->wish_list_data;
	}
	
	/**
	 * Get the [key] column value.
	 *
	 * @return string
	 */
	public function getKey() {
		return $this->key;
	}
	
	/**
	 * Get the [amout] column value.
	 *
	 * @return string
	 */
	public function getAmout() {
		return $this->amout;
	}
	
	/**
	 * Get the [discount] column value.
	 *
	 * @return string
	 */
	public function getDiscount() {
		return $this->discount;
	}
	
	/**
	 * Get the [role_id] column value.
	 *
	 * @return int
	 */
	public function getRoleId() {
		return $this->role_id;
	}
	
	/**
	 * Set the value of [id] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setId($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns [] = SUserProfilePeer::ID;
		}
		
		return $this;
	} // setId()
	
	/**
	 * Set the value of [username] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setName($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns [] = SUserProfilePeer::USERNAME;
		}
		
		return $this;
	} // setName()
	
	/**
	 * Set the value of [password] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setPassword($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns [] = SUserProfilePeer::PASSWORD;
		}
		
		return $this;
	} // setPassword()
	
	/**
	 * Set the value of [email] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setUserEmail($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns [] = SUserProfilePeer::EMAIL;
		}
		
		return $this;
	} // setUserEmail()
	
	/**
	 * Set the value of [address] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setAddress($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns [] = SUserProfilePeer::ADDRESS;
		}
		
		return $this;
	} // setAddress()
	
	/**
	 * Set the value of [phone] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setPhone($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns [] = SUserProfilePeer::PHONE;
		}
		
		return $this;
	} // setPhone()
	
	/**
	 * Set the value of [banned] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setBanned($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->banned !== $v) {
			$this->banned = $v;
			$this->modifiedColumns [] = SUserProfilePeer::BANNED;
		}
		
		return $this;
	} // setBanned()
	
	/**
	 * Set the value of [ban_reason] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setBanReason($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->ban_reason !== $v) {
			$this->ban_reason = $v;
			$this->modifiedColumns [] = SUserProfilePeer::BAN_REASON;
		}
		
		return $this;
	} // setBanReason()
	
	/**
	 * Set the value of [newpass] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setNewpass($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->newpass !== $v) {
			$this->newpass = $v;
			$this->modifiedColumns [] = SUserProfilePeer::NEWPASS;
		}
		
		return $this;
	} // setNewpass()
	
	/**
	 * Set the value of [newpass_key] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setNewpassKey($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->newpass_key !== $v) {
			$this->newpass_key = $v;
			$this->modifiedColumns [] = SUserProfilePeer::NEWPASS_KEY;
		}
		
		return $this;
	} // setNewpassKey()
	
	/**
	 * Set the value of [newpass_time] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setNewpassTime($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->newpass_time !== $v) {
			$this->newpass_time = $v;
			$this->modifiedColumns [] = SUserProfilePeer::NEWPASS_TIME;
		}
		
		return $this;
	} // setNewpassTime()
	
	/**
	 * Set the value of [created] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setDateCreated($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->created !== $v) {
			$this->created = $v;
			$this->modifiedColumns [] = SUserProfilePeer::CREATED;
		}
		
		return $this;
	} // setDateCreated()
	
	/**
	 * Set the value of [last_ip] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setLastIp($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->last_ip !== $v) {
			$this->last_ip = $v;
			$this->modifiedColumns [] = SUserProfilePeer::LAST_IP;
		}
		
		return $this;
	} // setLastIp()
	
	/**
	 * Set the value of [last_login] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setLastLogin($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->last_login !== $v) {
			$this->last_login = $v;
			$this->modifiedColumns [] = SUserProfilePeer::LAST_LOGIN;
		}
		
		return $this;
	} // setLastLogin()
	
	/**
	 * Sets the value of [modified] column to a normalized version of the date/time value specified.
	 *
	 * @param mixed $v
	 *        	string, integer (timestamp), or DateTime value.
	 *        	Empty strings are treated as NULL.
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setModified($v) {
		$dt = PropelDateTime::newInstance ( $v, null, 'DateTime' );
		if ($this->modified !== null || $dt !== null) {
			$currentDateAsString = ($this->modified !== null && $tmpDt = new DateTime ( $this->modified )) ? $tmpDt->format ( 'Y-m-d H:i:s' ) : null;
			$newDateAsString = $dt ? $dt->format ( 'Y-m-d H:i:s' ) : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->modified = $newDateAsString;
				$this->modifiedColumns [] = SUserProfilePeer::MODIFIED;
			}
		} // if either are not null
		
		return $this;
	} // setModified()
	
	/**
	 * Set the value of [cart_data] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setCartData($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->cart_data !== $v) {
			$this->cart_data = $v;
			$this->modifiedColumns [] = SUserProfilePeer::CART_DATA;
		}
		
		return $this;
	} // setCartData()
	
	/**
	 * Set the value of [wish_list_data] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setWishListData($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->wish_list_data !== $v) {
			$this->wish_list_data = $v;
			$this->modifiedColumns [] = SUserProfilePeer::WISH_LIST_DATA;
		}
		
		return $this;
	} // setWishListData()
	
	/**
	 * Set the value of [key] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setKey($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->key !== $v) {
			$this->key = $v;
			$this->modifiedColumns [] = SUserProfilePeer::KEY;
		}
		
		return $this;
	} // setKey()
	
	/**
	 * Set the value of [amout] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setAmout($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->amout !== $v) {
			$this->amout = $v;
			$this->modifiedColumns [] = SUserProfilePeer::AMOUT;
		}
		
		return $this;
	} // setAmout()
	
	/**
	 * Set the value of [discount] column.
	 *
	 * @param string $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setDiscount($v) {
		if ($v !== null) {
			$v = ( string ) $v;
		}
		
		if ($this->discount !== $v) {
			$this->discount = $v;
			$this->modifiedColumns [] = SUserProfilePeer::DISCOUNT;
		}
		
		return $this;
	} // setDiscount()
	
	/**
	 * Set the value of [role_id] column.
	 *
	 * @param int $v
	 *        	new value
	 * @return SUserProfile The current object (for fluent API support)
	 */
	public function setRoleId($v) {
		if ($v !== null) {
			$v = ( int ) $v;
		}
		
		if ($this->role_id !== $v) {
			$this->role_id = $v;
			$this->modifiedColumns [] = SUserProfilePeer::ROLE_ID;
		}
		
		return $this;
	} // setRoleId()
	
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
			$this->username = ($row [$startcol + 1] !== null) ? ( string ) $row [$startcol + 1] : null;
			$this->password = ($row [$startcol + 2] !== null) ? ( string ) $row [$startcol + 2] : null;
			$this->email = ($row [$startcol + 3] !== null) ? ( string ) $row [$startcol + 3] : null;
			$this->address = ($row [$startcol + 4] !== null) ? ( string ) $row [$startcol + 4] : null;
			$this->phone = ($row [$startcol + 5] !== null) ? ( string ) $row [$startcol + 5] : null;
			$this->banned = ($row [$startcol + 6] !== null) ? ( int ) $row [$startcol + 6] : null;
			$this->ban_reason = ($row [$startcol + 7] !== null) ? ( string ) $row [$startcol + 7] : null;
			$this->newpass = ($row [$startcol + 8] !== null) ? ( string ) $row [$startcol + 8] : null;
			$this->newpass_key = ($row [$startcol + 9] !== null) ? ( string ) $row [$startcol + 9] : null;
			$this->newpass_time = ($row [$startcol + 10] !== null) ? ( int ) $row [$startcol + 10] : null;
			$this->created = ($row [$startcol + 11] !== null) ? ( int ) $row [$startcol + 11] : null;
			$this->last_ip = ($row [$startcol + 12] !== null) ? ( string ) $row [$startcol + 12] : null;
			$this->last_login = ($row [$startcol + 13] !== null) ? ( int ) $row [$startcol + 13] : null;
			$this->modified = ($row [$startcol + 14] !== null) ? ( string ) $row [$startcol + 14] : null;
			$this->cart_data = ($row [$startcol + 15] !== null) ? ( string ) $row [$startcol + 15] : null;
			$this->wish_list_data = ($row [$startcol + 16] !== null) ? ( string ) $row [$startcol + 16] : null;
			$this->key = ($row [$startcol + 17] !== null) ? ( string ) $row [$startcol + 17] : null;
			$this->amout = ($row [$startcol + 18] !== null) ? ( string ) $row [$startcol + 18] : null;
			$this->discount = ($row [$startcol + 19] !== null) ? ( string ) $row [$startcol + 19] : null;
			$this->role_id = ($row [$startcol + 20] !== null) ? ( int ) $row [$startcol + 20] : null;
			$this->resetModified ();
			
			$this->setNew ( false );
			
			if ($rehydrate) {
				$this->ensureConsistency ();
			}
			
			return $startcol + 21; // 21 = SUserProfilePeer::NUM_HYDRATE_COLUMNS.
		} catch ( Exception $e ) {
			throw new PropelException ( "Error populating SUserProfile object", $e );
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
			$con = Propel::getConnection ( SUserProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ );
		}
		
		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.
		
		$stmt = SUserProfilePeer::doSelectStmt ( $this->buildPkeyCriteria (), $con );
		$row = $stmt->fetch ( PDO::FETCH_NUM );
		$stmt->closeCursor ();
		if (! $row) {
			throw new PropelException ( 'Cannot find matching row in the database to reload object values.' );
		}
		$this->hydrate ( $row, 0, true ); // rehydrate
		
		if ($deep) { // also de-associate any related objects?
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
			$con = Propel::getConnection ( SUserProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
		}
		
		$con->beginTransaction ();
		try {
			$deleteQuery = SUserProfileQuery::create ()->filterByPrimaryKey ( $this->getPrimaryKey () );
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
			$con = Propel::getConnection ( SUserProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE );
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
				SUserProfilePeer::addInstanceToPool ( $this );
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
		
		$this->modifiedColumns [] = SUserProfilePeer::ID;
		if (null !== $this->id) {
			throw new PropelException ( 'Cannot insert a value for auto-increment primary key (' . SUserProfilePeer::ID . ')' );
		}
		
		// check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified ( SUserProfilePeer::ID )) {
			$modifiedColumns [':p' . $index ++] = '`ID`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::USERNAME )) {
			$modifiedColumns [':p' . $index ++] = '`USERNAME`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::PASSWORD )) {
			$modifiedColumns [':p' . $index ++] = '`PASSWORD`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::EMAIL )) {
			$modifiedColumns [':p' . $index ++] = '`EMAIL`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::ADDRESS )) {
			$modifiedColumns [':p' . $index ++] = '`ADDRESS`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::PHONE )) {
			$modifiedColumns [':p' . $index ++] = '`PHONE`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::BANNED )) {
			$modifiedColumns [':p' . $index ++] = '`BANNED`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::BAN_REASON )) {
			$modifiedColumns [':p' . $index ++] = '`BAN_REASON`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::NEWPASS )) {
			$modifiedColumns [':p' . $index ++] = '`NEWPASS`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::NEWPASS_KEY )) {
			$modifiedColumns [':p' . $index ++] = '`NEWPASS_KEY`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::NEWPASS_TIME )) {
			$modifiedColumns [':p' . $index ++] = '`NEWPASS_TIME`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::CREATED )) {
			$modifiedColumns [':p' . $index ++] = '`CREATED`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::LAST_IP )) {
			$modifiedColumns [':p' . $index ++] = '`LAST_IP`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::LAST_LOGIN )) {
			$modifiedColumns [':p' . $index ++] = '`LAST_LOGIN`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::MODIFIED )) {
			$modifiedColumns [':p' . $index ++] = '`MODIFIED`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::CART_DATA )) {
			$modifiedColumns [':p' . $index ++] = '`CART_DATA`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::WISH_LIST_DATA )) {
			$modifiedColumns [':p' . $index ++] = '`WISH_LIST_DATA`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::KEY )) {
			$modifiedColumns [':p' . $index ++] = '`KEY`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::AMOUT )) {
			$modifiedColumns [':p' . $index ++] = '`AMOUT`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::DISCOUNT )) {
			$modifiedColumns [':p' . $index ++] = '`DISCOUNT`';
		}
		if ($this->isColumnModified ( SUserProfilePeer::ROLE_ID )) {
			$modifiedColumns [':p' . $index ++] = '`ROLE_ID`';
		}
		
		$sql = sprintf ( 'INSERT INTO `users` (%s) VALUES (%s)', implode ( ', ', $modifiedColumns ), implode ( ', ', array_keys ( $modifiedColumns ) ) );
		
		try {
			$stmt = $con->prepare ( $sql );
			foreach ( $modifiedColumns as $identifier => $columnName ) {
				switch ($columnName) {
					case '`ID`' :
						$stmt->bindValue ( $identifier, $this->id, PDO::PARAM_INT );
						break;
					case '`USERNAME`' :
						$stmt->bindValue ( $identifier, $this->username, PDO::PARAM_STR );
						break;
					case '`PASSWORD`' :
						$stmt->bindValue ( $identifier, $this->password, PDO::PARAM_STR );
						break;
					case '`EMAIL`' :
						$stmt->bindValue ( $identifier, $this->email, PDO::PARAM_STR );
						break;
					case '`ADDRESS`' :
						$stmt->bindValue ( $identifier, $this->address, PDO::PARAM_STR );
						break;
					case '`PHONE`' :
						$stmt->bindValue ( $identifier, $this->phone, PDO::PARAM_STR );
						break;
					case '`BANNED`' :
						$stmt->bindValue ( $identifier, $this->banned, PDO::PARAM_INT );
						break;
					case '`BAN_REASON`' :
						$stmt->bindValue ( $identifier, $this->ban_reason, PDO::PARAM_STR );
						break;
					case '`NEWPASS`' :
						$stmt->bindValue ( $identifier, $this->newpass, PDO::PARAM_STR );
						break;
					case '`NEWPASS_KEY`' :
						$stmt->bindValue ( $identifier, $this->newpass_key, PDO::PARAM_STR );
						break;
					case '`NEWPASS_TIME`' :
						$stmt->bindValue ( $identifier, $this->newpass_time, PDO::PARAM_INT );
						break;
					case '`CREATED`' :
						$stmt->bindValue ( $identifier, $this->created, PDO::PARAM_INT );
						break;
					case '`LAST_IP`' :
						$stmt->bindValue ( $identifier, $this->last_ip, PDO::PARAM_STR );
						break;
					case '`LAST_LOGIN`' :
						$stmt->bindValue ( $identifier, $this->last_login, PDO::PARAM_INT );
						break;
					case '`MODIFIED`' :
						$stmt->bindValue ( $identifier, $this->modified, PDO::PARAM_STR );
						break;
					case '`CART_DATA`' :
						$stmt->bindValue ( $identifier, $this->cart_data, PDO::PARAM_STR );
						break;
					case '`WISH_LIST_DATA`' :
						$stmt->bindValue ( $identifier, $this->wish_list_data, PDO::PARAM_STR );
						break;
					case '`KEY`' :
						$stmt->bindValue ( $identifier, $this->key, PDO::PARAM_STR );
						break;
					case '`AMOUT`' :
						$stmt->bindValue ( $identifier, $this->amout, PDO::PARAM_STR );
						break;
					case '`DISCOUNT`' :
						$stmt->bindValue ( $identifier, $this->discount, PDO::PARAM_STR );
						break;
					case '`ROLE_ID`' :
						$stmt->bindValue ( $identifier, $this->role_id, PDO::PARAM_INT );
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
			
			if (($retval = SUserProfilePeer::doValidate ( $this, $columns )) !== true) {
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
		$pos = SUserProfilePeer::translateFieldName ( $name, $type, BasePeer::TYPE_NUM );
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
				return $this->getName ();
				break;
			case 2 :
				return $this->getPassword ();
				break;
			case 3 :
				return $this->getUserEmail ();
				break;
			case 4 :
				return $this->getAddress ();
				break;
			case 5 :
				return $this->getPhone ();
				break;
			case 6 :
				return $this->getBanned ();
				break;
			case 7 :
				return $this->getBanReason ();
				break;
			case 8 :
				return $this->getNewpass ();
				break;
			case 9 :
				return $this->getNewpassKey ();
				break;
			case 10 :
				return $this->getNewpassTime ();
				break;
			case 11 :
				return $this->getDateCreated ();
				break;
			case 12 :
				return $this->getLastIp ();
				break;
			case 13 :
				return $this->getLastLogin ();
				break;
			case 14 :
				return $this->getModified ();
				break;
			case 15 :
				return $this->getCartData ();
				break;
			case 16 :
				return $this->getWishListData ();
				break;
			case 17 :
				return $this->getKey ();
				break;
			case 18 :
				return $this->getAmout ();
				break;
			case 19 :
				return $this->getDiscount ();
				break;
			case 20 :
				return $this->getRoleId ();
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
	 *        	
	 * @return array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array()) {
		if (isset ( $alreadyDumpedObjects ['SUserProfile'] [$this->getPrimaryKey ()] )) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects ['SUserProfile'] [$this->getPrimaryKey ()] = true;
		$keys = SUserProfilePeer::getFieldNames ( $keyType );
		$result = array (
				$keys [0] => $this->getId (),
				$keys [1] => $this->getName (),
				$keys [2] => $this->getPassword (),
				$keys [3] => $this->getUserEmail (),
				$keys [4] => $this->getAddress (),
				$keys [5] => $this->getPhone (),
				$keys [6] => $this->getBanned (),
				$keys [7] => $this->getBanReason (),
				$keys [8] => $this->getNewpass (),
				$keys [9] => $this->getNewpassKey (),
				$keys [10] => $this->getNewpassTime (),
				$keys [11] => $this->getDateCreated (),
				$keys [12] => $this->getLastIp (),
				$keys [13] => $this->getLastLogin (),
				$keys [14] => $this->getModified (),
				$keys [15] => $this->getCartData (),
				$keys [16] => $this->getWishListData (),
				$keys [17] => $this->getKey (),
				$keys [18] => $this->getAmout (),
				$keys [19] => $this->getDiscount (),
				$keys [20] => $this->getRoleId () 
		);
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
		$pos = SUserProfilePeer::translateFieldName ( $name, $type, BasePeer::TYPE_NUM );
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
				$this->setName ( $value );
				break;
			case 2 :
				$this->setPassword ( $value );
				break;
			case 3 :
				$this->setUserEmail ( $value );
				break;
			case 4 :
				$this->setAddress ( $value );
				break;
			case 5 :
				$this->setPhone ( $value );
				break;
			case 6 :
				$this->setBanned ( $value );
				break;
			case 7 :
				$this->setBanReason ( $value );
				break;
			case 8 :
				$this->setNewpass ( $value );
				break;
			case 9 :
				$this->setNewpassKey ( $value );
				break;
			case 10 :
				$this->setNewpassTime ( $value );
				break;
			case 11 :
				$this->setDateCreated ( $value );
				break;
			case 12 :
				$this->setLastIp ( $value );
				break;
			case 13 :
				$this->setLastLogin ( $value );
				break;
			case 14 :
				$this->setModified ( $value );
				break;
			case 15 :
				$this->setCartData ( $value );
				break;
			case 16 :
				$this->setWishListData ( $value );
				break;
			case 17 :
				$this->setKey ( $value );
				break;
			case 18 :
				$this->setAmout ( $value );
				break;
			case 19 :
				$this->setDiscount ( $value );
				break;
			case 20 :
				$this->setRoleId ( $value );
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
		$keys = SUserProfilePeer::getFieldNames ( $keyType );
		
		if (array_key_exists ( $keys [0], $arr ))
			$this->setId ( $arr [$keys [0]] );
		if (array_key_exists ( $keys [1], $arr ))
			$this->setName ( $arr [$keys [1]] );
		if (array_key_exists ( $keys [2], $arr ))
			$this->setPassword ( $arr [$keys [2]] );
		if (array_key_exists ( $keys [3], $arr ))
			$this->setUserEmail ( $arr [$keys [3]] );
		if (array_key_exists ( $keys [4], $arr ))
			$this->setAddress ( $arr [$keys [4]] );
		if (array_key_exists ( $keys [5], $arr ))
			$this->setPhone ( $arr [$keys [5]] );
		if (array_key_exists ( $keys [6], $arr ))
			$this->setBanned ( $arr [$keys [6]] );
		if (array_key_exists ( $keys [7], $arr ))
			$this->setBanReason ( $arr [$keys [7]] );
		if (array_key_exists ( $keys [8], $arr ))
			$this->setNewpass ( $arr [$keys [8]] );
		if (array_key_exists ( $keys [9], $arr ))
			$this->setNewpassKey ( $arr [$keys [9]] );
		if (array_key_exists ( $keys [10], $arr ))
			$this->setNewpassTime ( $arr [$keys [10]] );
		if (array_key_exists ( $keys [11], $arr ))
			$this->setDateCreated ( $arr [$keys [11]] );
		if (array_key_exists ( $keys [12], $arr ))
			$this->setLastIp ( $arr [$keys [12]] );
		if (array_key_exists ( $keys [13], $arr ))
			$this->setLastLogin ( $arr [$keys [13]] );
		if (array_key_exists ( $keys [14], $arr ))
			$this->setModified ( $arr [$keys [14]] );
		if (array_key_exists ( $keys [15], $arr ))
			$this->setCartData ( $arr [$keys [15]] );
		if (array_key_exists ( $keys [16], $arr ))
			$this->setWishListData ( $arr [$keys [16]] );
		if (array_key_exists ( $keys [17], $arr ))
			$this->setKey ( $arr [$keys [17]] );
		if (array_key_exists ( $keys [18], $arr ))
			$this->setAmout ( $arr [$keys [18]] );
		if (array_key_exists ( $keys [19], $arr ))
			$this->setDiscount ( $arr [$keys [19]] );
		if (array_key_exists ( $keys [20], $arr ))
			$this->setRoleId ( $arr [$keys [20]] );
	}
	
	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria() {
		$criteria = new Criteria ( SUserProfilePeer::DATABASE_NAME );
		
		if ($this->isColumnModified ( SUserProfilePeer::ID ))
			$criteria->add ( SUserProfilePeer::ID, $this->id );
		if ($this->isColumnModified ( SUserProfilePeer::USERNAME ))
			$criteria->add ( SUserProfilePeer::USERNAME, $this->username );
		if ($this->isColumnModified ( SUserProfilePeer::PASSWORD ))
			$criteria->add ( SUserProfilePeer::PASSWORD, $this->password );
		if ($this->isColumnModified ( SUserProfilePeer::EMAIL ))
			$criteria->add ( SUserProfilePeer::EMAIL, $this->email );
		if ($this->isColumnModified ( SUserProfilePeer::ADDRESS ))
			$criteria->add ( SUserProfilePeer::ADDRESS, $this->address );
		if ($this->isColumnModified ( SUserProfilePeer::PHONE ))
			$criteria->add ( SUserProfilePeer::PHONE, $this->phone );
		if ($this->isColumnModified ( SUserProfilePeer::BANNED ))
			$criteria->add ( SUserProfilePeer::BANNED, $this->banned );
		if ($this->isColumnModified ( SUserProfilePeer::BAN_REASON ))
			$criteria->add ( SUserProfilePeer::BAN_REASON, $this->ban_reason );
		if ($this->isColumnModified ( SUserProfilePeer::NEWPASS ))
			$criteria->add ( SUserProfilePeer::NEWPASS, $this->newpass );
		if ($this->isColumnModified ( SUserProfilePeer::NEWPASS_KEY ))
			$criteria->add ( SUserProfilePeer::NEWPASS_KEY, $this->newpass_key );
		if ($this->isColumnModified ( SUserProfilePeer::NEWPASS_TIME ))
			$criteria->add ( SUserProfilePeer::NEWPASS_TIME, $this->newpass_time );
		if ($this->isColumnModified ( SUserProfilePeer::CREATED ))
			$criteria->add ( SUserProfilePeer::CREATED, $this->created );
		if ($this->isColumnModified ( SUserProfilePeer::LAST_IP ))
			$criteria->add ( SUserProfilePeer::LAST_IP, $this->last_ip );
		if ($this->isColumnModified ( SUserProfilePeer::LAST_LOGIN ))
			$criteria->add ( SUserProfilePeer::LAST_LOGIN, $this->last_login );
		if ($this->isColumnModified ( SUserProfilePeer::MODIFIED ))
			$criteria->add ( SUserProfilePeer::MODIFIED, $this->modified );
		if ($this->isColumnModified ( SUserProfilePeer::CART_DATA ))
			$criteria->add ( SUserProfilePeer::CART_DATA, $this->cart_data );
		if ($this->isColumnModified ( SUserProfilePeer::WISH_LIST_DATA ))
			$criteria->add ( SUserProfilePeer::WISH_LIST_DATA, $this->wish_list_data );
		if ($this->isColumnModified ( SUserProfilePeer::KEY ))
			$criteria->add ( SUserProfilePeer::KEY, $this->key );
		if ($this->isColumnModified ( SUserProfilePeer::AMOUT ))
			$criteria->add ( SUserProfilePeer::AMOUT, $this->amout );
		if ($this->isColumnModified ( SUserProfilePeer::DISCOUNT ))
			$criteria->add ( SUserProfilePeer::DISCOUNT, $this->discount );
		if ($this->isColumnModified ( SUserProfilePeer::ROLE_ID ))
			$criteria->add ( SUserProfilePeer::ROLE_ID, $this->role_id );
		
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
		$criteria = new Criteria ( SUserProfilePeer::DATABASE_NAME );
		$criteria->add ( SUserProfilePeer::ID, $this->id );
		
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
	 *        	An object of SUserProfile (or compatible) type.
	 * @param boolean $deepCopy
	 *        	Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param boolean $makeNew
	 *        	Whether to reset autoincrement PKs and make the object new.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true) {
		$copyObj->setName ( $this->getName () );
		$copyObj->setPassword ( $this->getPassword () );
		$copyObj->setUserEmail ( $this->getUserEmail () );
		$copyObj->setAddress ( $this->getAddress () );
		$copyObj->setPhone ( $this->getPhone () );
		$copyObj->setBanned ( $this->getBanned () );
		$copyObj->setBanReason ( $this->getBanReason () );
		$copyObj->setNewpass ( $this->getNewpass () );
		$copyObj->setNewpassKey ( $this->getNewpassKey () );
		$copyObj->setNewpassTime ( $this->getNewpassTime () );
		$copyObj->setDateCreated ( $this->getDateCreated () );
		$copyObj->setLastIp ( $this->getLastIp () );
		$copyObj->setLastLogin ( $this->getLastLogin () );
		$copyObj->setModified ( $this->getModified () );
		$copyObj->setCartData ( $this->getCartData () );
		$copyObj->setWishListData ( $this->getWishListData () );
		$copyObj->setKey ( $this->getKey () );
		$copyObj->setAmout ( $this->getAmout () );
		$copyObj->setDiscount ( $this->getDiscount () );
		$copyObj->setRoleId ( $this->getRoleId () );
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
	 * @return SUserProfile Clone of current object.
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
	 * @return SUserProfilePeer
	 */
	public function getPeer() {
		if (self::$peer === null) {
			self::$peer = new SUserProfilePeer ();
		}
		return self::$peer;
	}
	
	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear() {
		$this->id = null;
		$this->username = null;
		$this->password = null;
		$this->email = null;
		$this->address = null;
		$this->phone = null;
		$this->banned = null;
		$this->ban_reason = null;
		$this->newpass = null;
		$this->newpass_key = null;
		$this->newpass_time = null;
		$this->created = null;
		$this->last_ip = null;
		$this->last_login = null;
		$this->modified = null;
		$this->cart_data = null;
		$this->wish_list_data = null;
		$this->key = null;
		$this->amout = null;
		$this->discount = null;
		$this->role_id = null;
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
	}
	
	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString() {
		return ( string ) $this->exportTo ( SUserProfilePeer::DEFAULT_STRING_FORMAT );
	}
} // BaseSUserProfile
