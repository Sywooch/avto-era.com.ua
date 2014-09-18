<?php


/**
 * Base class that represents a row from the 'shop_orders' table.
 *
 * 
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSOrders extends ShopBaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'SOrdersPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SOrdersPeer
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
	 * The value for the user_id field.
	 * @var        int
	 */
	protected $user_id;

	/**
	 * The value for the key field.
	 * @var        string
	 */
	protected $key;

	/**
	 * The value for the delivery_method field.
	 * @var        int
	 */
	protected $delivery_method;

	/**
	 * The value for the delivery_price field.
	 * @var        string
	 */
	protected $delivery_price;

	/**
	 * The value for the payment_method field.
	 * @var        int
	 */
	protected $payment_method;

	/**
	 * The value for the status field.
	 * @var        int
	 */
	protected $status;

	/**
	 * The value for the paid field.
	 * @var        boolean
	 */
	protected $paid;

	/**
	 * The value for the user_full_name field.
	 * @var        string
	 */
	protected $user_full_name;

	/**
	 * The value for the user_email field.
	 * @var        string
	 */
	protected $user_email;

	/**
	 * The value for the user_phone field.
	 * @var        string
	 */
	protected $user_phone;

	/**
	 * The value for the user_deliver_to field.
	 * @var        string
	 */
	protected $user_deliver_to;

	/**
	 * The value for the user_comment field.
	 * @var        string
	 */
	protected $user_comment;

	/**
	 * The value for the date_created field.
	 * @var        int
	 */
	protected $date_created;

	/**
	 * The value for the date_updated field.
	 * @var        int
	 */
	protected $date_updated;

	/**
	 * The value for the user_ip field.
	 * @var        string
	 */
	protected $user_ip;

	/**
	 * The value for the total_price field.
	 * @var        double
	 */
	protected $total_price;

	/**
	 * The value for the external_id field.
	 * @var        string
	 */
	protected $external_id;

	/**
	 * The value for the gift_cert_key field.
	 * @var        string
	 */
	protected $gift_cert_key;

	/**
	 * The value for the discount field.
	 * @var        double
	 */
	protected $discount;

	/**
	 * The value for the gift_cert_price field.
	 * @var        int
	 */
	protected $gift_cert_price;

	/**
	 * The value for the discount_info field.
	 * @var        string
	 */
	protected $discount_info;

	/**
	 * The value for the origin_price field.
	 * @var        double
	 */
	protected $origin_price;

	/**
	 * The value for the comulativ field.
	 * @var        double
	 */
	protected $comulativ;

	/**
	 * @var        SDeliveryMethods
	 */
	protected $aSDeliveryMethods;

	/**
	 * @var        SPaymentMethods
	 */
	protected $aSPaymentMethods;

	/**
	 * @var        SOrderStatuses
	 */
	protected $aSOrderStatuses;

	/**
	 * @var        array SOrderProducts[] Collection to store aggregation of SOrderProducts objects.
	 */
	protected $collSOrderProductss;

	/**
	 * @var        array SOrderStatusHistory[] Collection to store aggregation of SOrderStatusHistory objects.
	 */
	protected $collSOrderStatusHistorys;

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
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $sOrderProductssScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $sOrderStatusHistorysScheduledForDeletion = null;

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
	 * Get the [user_id] column value.
	 * 
	 * @return     int
	 */
	public function getUserId()
	{
		return $this->user_id;
	}

	/**
	 * Get the [key] column value.
	 * 
	 * @return     string
	 */
	public function getKey()
	{
		return $this->key;
	}

	/**
	 * Get the [delivery_method] column value.
	 * 
	 * @return     int
	 */
	public function getDeliveryMethod()
	{
		return $this->delivery_method;
	}

	/**
	 * Get the [delivery_price] column value.
	 * 
	 * @return     string
	 */
	public function getDeliveryPrice()
	{
		return $this->delivery_price;
	}

	/**
	 * Get the [payment_method] column value.
	 * 
	 * @return     int
	 */
	public function getPaymentMethod()
	{
		return $this->payment_method;
	}

	/**
	 * Get the [status] column value.
	 * 
	 * @return     int
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Get the [paid] column value.
	 * 
	 * @return     boolean
	 */
	public function getPaid()
	{
		return $this->paid;
	}

	/**
	 * Get the [user_full_name] column value.
	 * 
	 * @return     string
	 */
	public function getUserFullName()
	{
		return $this->user_full_name;
	}

	/**
	 * Get the [user_email] column value.
	 * 
	 * @return     string
	 */
	public function getUserEmail()
	{
		return $this->user_email;
	}

	/**
	 * Get the [user_phone] column value.
	 * 
	 * @return     string
	 */
	public function getUserPhone()
	{
		return $this->user_phone;
	}

	/**
	 * Get the [user_deliver_to] column value.
	 * 
	 * @return     string
	 */
	public function getUserDeliverTo()
	{
		return $this->user_deliver_to;
	}

	/**
	 * Get the [user_comment] column value.
	 * 
	 * @return     string
	 */
	public function getUserComment()
	{
		return $this->user_comment;
	}

	/**
	 * Get the [date_created] column value.
	 * 
	 * @return     int
	 */
	public function getDateCreated()
	{
		return $this->date_created;
	}

	/**
	 * Get the [date_updated] column value.
	 * 
	 * @return     int
	 */
	public function getDateUpdated()
	{
		return $this->date_updated;
	}

	/**
	 * Get the [user_ip] column value.
	 * 
	 * @return     string
	 */
	public function getUserIp()
	{
		return $this->user_ip;
	}

	/**
	 * Get the [total_price] column value.
	 * 
	 * @return     double
	 */
	public function getTotalPrice()
	{
		return $this->total_price;
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
	 * Get the [gift_cert_key] column value.
	 * 
	 * @return     string
	 */
	public function getGiftCertKey()
	{
		return $this->gift_cert_key;
	}

	/**
	 * Get the [discount] column value.
	 * 
	 * @return     double
	 */
	public function getDiscount()
	{
		return $this->discount;
	}

	/**
	 * Get the [gift_cert_price] column value.
	 * 
	 * @return     int
	 */
	public function getGiftCertPrice()
	{
		return $this->gift_cert_price;
	}

	/**
	 * Get the [discount_info] column value.
	 * 
	 * @return     string
	 */
	public function getDiscountInfo()
	{
		return $this->discount_info;
	}

	/**
	 * Get the [origin_price] column value.
	 * 
	 * @return     double
	 */
	public function getOriginPrice()
	{
		return $this->origin_price;
	}

	/**
	 * Get the [comulativ] column value.
	 * 
	 * @return     double
	 */
	public function getComulativ()
	{
		return $this->comulativ;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SOrdersPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [user_id] column.
	 * 
	 * @param      int $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setUserId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = SOrdersPeer::USER_ID;
		}

		return $this;
	} // setUserId()

	/**
	 * Set the value of [key] column.
	 * 
	 * @param      string $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setKey($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->key !== $v) {
			$this->key = $v;
			$this->modifiedColumns[] = SOrdersPeer::KEY;
		}

		return $this;
	} // setKey()

	/**
	 * Set the value of [delivery_method] column.
	 * 
	 * @param      int $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setDeliveryMethod($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->delivery_method !== $v) {
			$this->delivery_method = $v;
			$this->modifiedColumns[] = SOrdersPeer::DELIVERY_METHOD;
		}

		if ($this->aSDeliveryMethods !== null && $this->aSDeliveryMethods->getId() !== $v) {
			$this->aSDeliveryMethods = null;
		}

		return $this;
	} // setDeliveryMethod()

	/**
	 * Set the value of [delivery_price] column.
	 * 
	 * @param      string $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setDeliveryPrice($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->delivery_price !== $v) {
			$this->delivery_price = $v;
			$this->modifiedColumns[] = SOrdersPeer::DELIVERY_PRICE;
		}

		return $this;
	} // setDeliveryPrice()

	/**
	 * Set the value of [payment_method] column.
	 * 
	 * @param      int $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setPaymentMethod($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->payment_method !== $v) {
			$this->payment_method = $v;
			$this->modifiedColumns[] = SOrdersPeer::PAYMENT_METHOD;
		}

		if ($this->aSPaymentMethods !== null && $this->aSPaymentMethods->getId() !== $v) {
			$this->aSPaymentMethods = null;
		}

		return $this;
	} // setPaymentMethod()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      int $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = SOrdersPeer::STATUS;
		}

		if ($this->aSOrderStatuses !== null && $this->aSOrderStatuses->getId() !== $v) {
			$this->aSOrderStatuses = null;
		}

		return $this;
	} // setStatus()

	/**
	 * Sets the value of the [paid] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setPaid($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->paid !== $v) {
			$this->paid = $v;
			$this->modifiedColumns[] = SOrdersPeer::PAID;
		}

		return $this;
	} // setPaid()

	/**
	 * Set the value of [user_full_name] column.
	 * 
	 * @param      string $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setUserFullName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->user_full_name !== $v) {
			$this->user_full_name = $v;
			$this->modifiedColumns[] = SOrdersPeer::USER_FULL_NAME;
		}

		return $this;
	} // setUserFullName()

	/**
	 * Set the value of [user_email] column.
	 * 
	 * @param      string $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setUserEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->user_email !== $v) {
			$this->user_email = $v;
			$this->modifiedColumns[] = SOrdersPeer::USER_EMAIL;
		}

		return $this;
	} // setUserEmail()

	/**
	 * Set the value of [user_phone] column.
	 * 
	 * @param      string $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setUserPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->user_phone !== $v) {
			$this->user_phone = $v;
			$this->modifiedColumns[] = SOrdersPeer::USER_PHONE;
		}

		return $this;
	} // setUserPhone()

	/**
	 * Set the value of [user_deliver_to] column.
	 * 
	 * @param      string $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setUserDeliverTo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->user_deliver_to !== $v) {
			$this->user_deliver_to = $v;
			$this->modifiedColumns[] = SOrdersPeer::USER_DELIVER_TO;
		}

		return $this;
	} // setUserDeliverTo()

	/**
	 * Set the value of [user_comment] column.
	 * 
	 * @param      string $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setUserComment($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->user_comment !== $v) {
			$this->user_comment = $v;
			$this->modifiedColumns[] = SOrdersPeer::USER_COMMENT;
		}

		return $this;
	} // setUserComment()

	/**
	 * Set the value of [date_created] column.
	 * 
	 * @param      int $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setDateCreated($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->date_created !== $v) {
			$this->date_created = $v;
			$this->modifiedColumns[] = SOrdersPeer::DATE_CREATED;
		}

		return $this;
	} // setDateCreated()

	/**
	 * Set the value of [date_updated] column.
	 * 
	 * @param      int $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setDateUpdated($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->date_updated !== $v) {
			$this->date_updated = $v;
			$this->modifiedColumns[] = SOrdersPeer::DATE_UPDATED;
		}

		return $this;
	} // setDateUpdated()

	/**
	 * Set the value of [user_ip] column.
	 * 
	 * @param      string $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setUserIp($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->user_ip !== $v) {
			$this->user_ip = $v;
			$this->modifiedColumns[] = SOrdersPeer::USER_IP;
		}

		return $this;
	} // setUserIp()

	/**
	 * Set the value of [total_price] column.
	 * 
	 * @param      double $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setTotalPrice($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->total_price !== $v) {
			$this->total_price = $v;
			$this->modifiedColumns[] = SOrdersPeer::TOTAL_PRICE;
		}

		return $this;
	} // setTotalPrice()

	/**
	 * Set the value of [external_id] column.
	 * 
	 * @param      string $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setExternalId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->external_id !== $v) {
			$this->external_id = $v;
			$this->modifiedColumns[] = SOrdersPeer::EXTERNAL_ID;
		}

		return $this;
	} // setExternalId()

	/**
	 * Set the value of [gift_cert_key] column.
	 * 
	 * @param      string $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setGiftCertKey($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->gift_cert_key !== $v) {
			$this->gift_cert_key = $v;
			$this->modifiedColumns[] = SOrdersPeer::GIFT_CERT_KEY;
		}

		return $this;
	} // setGiftCertKey()

	/**
	 * Set the value of [discount] column.
	 * 
	 * @param      double $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setDiscount($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->discount !== $v) {
			$this->discount = $v;
			$this->modifiedColumns[] = SOrdersPeer::DISCOUNT;
		}

		return $this;
	} // setDiscount()

	/**
	 * Set the value of [gift_cert_price] column.
	 * 
	 * @param      int $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setGiftCertPrice($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->gift_cert_price !== $v) {
			$this->gift_cert_price = $v;
			$this->modifiedColumns[] = SOrdersPeer::GIFT_CERT_PRICE;
		}

		return $this;
	} // setGiftCertPrice()

	/**
	 * Set the value of [discount_info] column.
	 * 
	 * @param      string $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setDiscountInfo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->discount_info !== $v) {
			$this->discount_info = $v;
			$this->modifiedColumns[] = SOrdersPeer::DISCOUNT_INFO;
		}

		return $this;
	} // setDiscountInfo()

	/**
	 * Set the value of [origin_price] column.
	 * 
	 * @param      double $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setOriginPrice($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->origin_price !== $v) {
			$this->origin_price = $v;
			$this->modifiedColumns[] = SOrdersPeer::ORIGIN_PRICE;
		}

		return $this;
	} // setOriginPrice()

	/**
	 * Set the value of [comulativ] column.
	 * 
	 * @param      double $v new value
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function setComulativ($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->comulativ !== $v) {
			$this->comulativ = $v;
			$this->modifiedColumns[] = SOrdersPeer::COMULATIV;
		}

		return $this;
	} // setComulativ()

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
			$this->user_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->key = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->delivery_method = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->delivery_price = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->payment_method = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->status = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->paid = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
			$this->user_full_name = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->user_email = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->user_phone = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->user_deliver_to = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->user_comment = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->date_created = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->date_updated = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
			$this->user_ip = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->total_price = ($row[$startcol + 16] !== null) ? (double) $row[$startcol + 16] : null;
			$this->external_id = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->gift_cert_key = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->discount = ($row[$startcol + 19] !== null) ? (double) $row[$startcol + 19] : null;
			$this->gift_cert_price = ($row[$startcol + 20] !== null) ? (int) $row[$startcol + 20] : null;
			$this->discount_info = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
			$this->origin_price = ($row[$startcol + 22] !== null) ? (double) $row[$startcol + 22] : null;
			$this->comulativ = ($row[$startcol + 23] !== null) ? (double) $row[$startcol + 23] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 24; // 24 = SOrdersPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating SOrders object", $e);
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

		if ($this->aSDeliveryMethods !== null && $this->delivery_method !== $this->aSDeliveryMethods->getId()) {
			$this->aSDeliveryMethods = null;
		}
		if ($this->aSPaymentMethods !== null && $this->payment_method !== $this->aSPaymentMethods->getId()) {
			$this->aSPaymentMethods = null;
		}
		if ($this->aSOrderStatuses !== null && $this->status !== $this->aSOrderStatuses->getId()) {
			$this->aSOrderStatuses = null;
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
			$con = Propel::getConnection(SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SOrdersPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSDeliveryMethods = null;
			$this->aSPaymentMethods = null;
			$this->aSOrderStatuses = null;
			$this->collSOrderProductss = null;

			$this->collSOrderStatusHistorys = null;

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
			$con = Propel::getConnection(SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = SOrdersQuery::create()
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
			$con = Propel::getConnection(SOrdersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				SOrdersPeer::addInstanceToPool($this);
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

			if ($this->aSDeliveryMethods !== null) {
				if ($this->aSDeliveryMethods->isModified() || $this->aSDeliveryMethods->isNew()) {
					$affectedRows += $this->aSDeliveryMethods->save($con);
				}
				$this->setSDeliveryMethods($this->aSDeliveryMethods);
			}

			if ($this->aSPaymentMethods !== null) {
				if ($this->aSPaymentMethods->isModified() || $this->aSPaymentMethods->isNew()) {
					$affectedRows += $this->aSPaymentMethods->save($con);
				}
				$this->setSPaymentMethods($this->aSPaymentMethods);
			}

			if ($this->aSOrderStatuses !== null) {
				if ($this->aSOrderStatuses->isModified() || $this->aSOrderStatuses->isNew()) {
					$affectedRows += $this->aSOrderStatuses->save($con);
				}
				$this->setSOrderStatuses($this->aSOrderStatuses);
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

			if ($this->sOrderProductssScheduledForDeletion !== null) {
				if (!$this->sOrderProductssScheduledForDeletion->isEmpty()) {
					SOrderProductsQuery::create()
						->filterByPrimaryKeys($this->sOrderProductssScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->sOrderProductssScheduledForDeletion = null;
				}
			}

			if ($this->collSOrderProductss !== null) {
				foreach ($this->collSOrderProductss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->sOrderStatusHistorysScheduledForDeletion !== null) {
				if (!$this->sOrderStatusHistorysScheduledForDeletion->isEmpty()) {
					SOrderStatusHistoryQuery::create()
						->filterByPrimaryKeys($this->sOrderStatusHistorysScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->sOrderStatusHistorysScheduledForDeletion = null;
				}
			}

			if ($this->collSOrderStatusHistorys !== null) {
				foreach ($this->collSOrderStatusHistorys as $referrerFK) {
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

		$this->modifiedColumns[] = SOrdersPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . SOrdersPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(SOrdersPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(SOrdersPeer::USER_ID)) {
			$modifiedColumns[':p' . $index++]  = '`USER_ID`';
		}
		if ($this->isColumnModified(SOrdersPeer::KEY)) {
			$modifiedColumns[':p' . $index++]  = '`KEY`';
		}
		if ($this->isColumnModified(SOrdersPeer::DELIVERY_METHOD)) {
			$modifiedColumns[':p' . $index++]  = '`DELIVERY_METHOD`';
		}
		if ($this->isColumnModified(SOrdersPeer::DELIVERY_PRICE)) {
			$modifiedColumns[':p' . $index++]  = '`DELIVERY_PRICE`';
		}
		if ($this->isColumnModified(SOrdersPeer::PAYMENT_METHOD)) {
			$modifiedColumns[':p' . $index++]  = '`PAYMENT_METHOD`';
		}
		if ($this->isColumnModified(SOrdersPeer::STATUS)) {
			$modifiedColumns[':p' . $index++]  = '`STATUS`';
		}
		if ($this->isColumnModified(SOrdersPeer::PAID)) {
			$modifiedColumns[':p' . $index++]  = '`PAID`';
		}
		if ($this->isColumnModified(SOrdersPeer::USER_FULL_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`USER_FULL_NAME`';
		}
		if ($this->isColumnModified(SOrdersPeer::USER_EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`USER_EMAIL`';
		}
		if ($this->isColumnModified(SOrdersPeer::USER_PHONE)) {
			$modifiedColumns[':p' . $index++]  = '`USER_PHONE`';
		}
		if ($this->isColumnModified(SOrdersPeer::USER_DELIVER_TO)) {
			$modifiedColumns[':p' . $index++]  = '`USER_DELIVER_TO`';
		}
		if ($this->isColumnModified(SOrdersPeer::USER_COMMENT)) {
			$modifiedColumns[':p' . $index++]  = '`USER_COMMENT`';
		}
		if ($this->isColumnModified(SOrdersPeer::DATE_CREATED)) {
			$modifiedColumns[':p' . $index++]  = '`DATE_CREATED`';
		}
		if ($this->isColumnModified(SOrdersPeer::DATE_UPDATED)) {
			$modifiedColumns[':p' . $index++]  = '`DATE_UPDATED`';
		}
		if ($this->isColumnModified(SOrdersPeer::USER_IP)) {
			$modifiedColumns[':p' . $index++]  = '`USER_IP`';
		}
		if ($this->isColumnModified(SOrdersPeer::TOTAL_PRICE)) {
			$modifiedColumns[':p' . $index++]  = '`TOTAL_PRICE`';
		}
		if ($this->isColumnModified(SOrdersPeer::EXTERNAL_ID)) {
			$modifiedColumns[':p' . $index++]  = '`EXTERNAL_ID`';
		}
		if ($this->isColumnModified(SOrdersPeer::GIFT_CERT_KEY)) {
			$modifiedColumns[':p' . $index++]  = '`GIFT_CERT_KEY`';
		}
		if ($this->isColumnModified(SOrdersPeer::DISCOUNT)) {
			$modifiedColumns[':p' . $index++]  = '`DISCOUNT`';
		}
		if ($this->isColumnModified(SOrdersPeer::GIFT_CERT_PRICE)) {
			$modifiedColumns[':p' . $index++]  = '`GIFT_CERT_PRICE`';
		}
		if ($this->isColumnModified(SOrdersPeer::DISCOUNT_INFO)) {
			$modifiedColumns[':p' . $index++]  = '`DISCOUNT_INFO`';
		}
		if ($this->isColumnModified(SOrdersPeer::ORIGIN_PRICE)) {
			$modifiedColumns[':p' . $index++]  = '`ORIGIN_PRICE`';
		}
		if ($this->isColumnModified(SOrdersPeer::COMULATIV)) {
			$modifiedColumns[':p' . $index++]  = '`COMULATIV`';
		}

		$sql = sprintf(
			'INSERT INTO `shop_orders` (%s) VALUES (%s)',
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
					case '`USER_ID`':						
						$stmt->bindValue($identifier, $this->user_id, PDO::PARAM_INT);
						break;
					case '`KEY`':						
						$stmt->bindValue($identifier, $this->key, PDO::PARAM_STR);
						break;
					case '`DELIVERY_METHOD`':						
						$stmt->bindValue($identifier, $this->delivery_method, PDO::PARAM_INT);
						break;
					case '`DELIVERY_PRICE`':						
						$stmt->bindValue($identifier, $this->delivery_price, PDO::PARAM_STR);
						break;
					case '`PAYMENT_METHOD`':						
						$stmt->bindValue($identifier, $this->payment_method, PDO::PARAM_INT);
						break;
					case '`STATUS`':						
						$stmt->bindValue($identifier, $this->status, PDO::PARAM_INT);
						break;
					case '`PAID`':
						$stmt->bindValue($identifier, (int) $this->paid, PDO::PARAM_INT);
						break;
					case '`USER_FULL_NAME`':						
						$stmt->bindValue($identifier, $this->user_full_name, PDO::PARAM_STR);
						break;
					case '`USER_EMAIL`':						
						$stmt->bindValue($identifier, $this->user_email, PDO::PARAM_STR);
						break;
					case '`USER_PHONE`':						
						$stmt->bindValue($identifier, $this->user_phone, PDO::PARAM_STR);
						break;
					case '`USER_DELIVER_TO`':						
						$stmt->bindValue($identifier, $this->user_deliver_to, PDO::PARAM_STR);
						break;
					case '`USER_COMMENT`':						
						$stmt->bindValue($identifier, $this->user_comment, PDO::PARAM_STR);
						break;
					case '`DATE_CREATED`':						
						$stmt->bindValue($identifier, $this->date_created, PDO::PARAM_INT);
						break;
					case '`DATE_UPDATED`':						
						$stmt->bindValue($identifier, $this->date_updated, PDO::PARAM_INT);
						break;
					case '`USER_IP`':						
						$stmt->bindValue($identifier, $this->user_ip, PDO::PARAM_STR);
						break;
					case '`TOTAL_PRICE`':						
						$stmt->bindValue($identifier, $this->total_price, PDO::PARAM_STR);
						break;
					case '`EXTERNAL_ID`':						
						$stmt->bindValue($identifier, $this->external_id, PDO::PARAM_STR);
						break;
					case '`GIFT_CERT_KEY`':						
						$stmt->bindValue($identifier, $this->gift_cert_key, PDO::PARAM_STR);
						break;
					case '`DISCOUNT`':						
						$stmt->bindValue($identifier, $this->discount, PDO::PARAM_STR);
						break;
					case '`GIFT_CERT_PRICE`':						
						$stmt->bindValue($identifier, $this->gift_cert_price, PDO::PARAM_INT);
						break;
					case '`DISCOUNT_INFO`':						
						$stmt->bindValue($identifier, $this->discount_info, PDO::PARAM_STR);
						break;
					case '`ORIGIN_PRICE`':						
						$stmt->bindValue($identifier, $this->origin_price, PDO::PARAM_STR);
						break;
					case '`COMULATIV`':						
						$stmt->bindValue($identifier, $this->comulativ, PDO::PARAM_STR);
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

			if ($this->aSDeliveryMethods !== null) {
				if (!$this->aSDeliveryMethods->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSDeliveryMethods->getValidationFailures());
				}
			}

			if ($this->aSPaymentMethods !== null) {
				if (!$this->aSPaymentMethods->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSPaymentMethods->getValidationFailures());
				}
			}

			if ($this->aSOrderStatuses !== null) {
				if (!$this->aSOrderStatuses->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSOrderStatuses->getValidationFailures());
				}
			}


			if (($retval = SOrdersPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collSOrderProductss !== null) {
					foreach ($this->collSOrderProductss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSOrderStatusHistorys !== null) {
					foreach ($this->collSOrderStatusHistorys as $referrerFK) {
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
		$pos = SOrdersPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getUserId();
				break;
			case 2:
				return $this->getKey();
				break;
			case 3:
				return $this->getDeliveryMethod();
				break;
			case 4:
				return $this->getDeliveryPrice();
				break;
			case 5:
				return $this->getPaymentMethod();
				break;
			case 6:
				return $this->getStatus();
				break;
			case 7:
				return $this->getPaid();
				break;
			case 8:
				return $this->getUserFullName();
				break;
			case 9:
				return $this->getUserEmail();
				break;
			case 10:
				return $this->getUserPhone();
				break;
			case 11:
				return $this->getUserDeliverTo();
				break;
			case 12:
				return $this->getUserComment();
				break;
			case 13:
				return $this->getDateCreated();
				break;
			case 14:
				return $this->getDateUpdated();
				break;
			case 15:
				return $this->getUserIp();
				break;
			case 16:
				return $this->getTotalPrice();
				break;
			case 17:
				return $this->getExternalId();
				break;
			case 18:
				return $this->getGiftCertKey();
				break;
			case 19:
				return $this->getDiscount();
				break;
			case 20:
				return $this->getGiftCertPrice();
				break;
			case 21:
				return $this->getDiscountInfo();
				break;
			case 22:
				return $this->getOriginPrice();
				break;
			case 23:
				return $this->getComulativ();
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
		if (isset($alreadyDumpedObjects['SOrders'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['SOrders'][$this->getPrimaryKey()] = true;
		$keys = SOrdersPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUserId(),
			$keys[2] => $this->getKey(),
			$keys[3] => $this->getDeliveryMethod(),
			$keys[4] => $this->getDeliveryPrice(),
			$keys[5] => $this->getPaymentMethod(),
			$keys[6] => $this->getStatus(),
			$keys[7] => $this->getPaid(),
			$keys[8] => $this->getUserFullName(),
			$keys[9] => $this->getUserEmail(),
			$keys[10] => $this->getUserPhone(),
			$keys[11] => $this->getUserDeliverTo(),
			$keys[12] => $this->getUserComment(),
			$keys[13] => $this->getDateCreated(),
			$keys[14] => $this->getDateUpdated(),
			$keys[15] => $this->getUserIp(),
			$keys[16] => $this->getTotalPrice(),
			$keys[17] => $this->getExternalId(),
			$keys[18] => $this->getGiftCertKey(),
			$keys[19] => $this->getDiscount(),
			$keys[20] => $this->getGiftCertPrice(),
			$keys[21] => $this->getDiscountInfo(),
			$keys[22] => $this->getOriginPrice(),
			$keys[23] => $this->getComulativ(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aSDeliveryMethods) {
				$result['SDeliveryMethods'] = $this->aSDeliveryMethods->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aSPaymentMethods) {
				$result['SPaymentMethods'] = $this->aSPaymentMethods->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aSOrderStatuses) {
				$result['SOrderStatuses'] = $this->aSOrderStatuses->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collSOrderProductss) {
				$result['SOrderProductss'] = $this->collSOrderProductss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collSOrderStatusHistorys) {
				$result['SOrderStatusHistorys'] = $this->collSOrderStatusHistorys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = SOrdersPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setUserId($value);
				break;
			case 2:
				$this->setKey($value);
				break;
			case 3:
				$this->setDeliveryMethod($value);
				break;
			case 4:
				$this->setDeliveryPrice($value);
				break;
			case 5:
				$this->setPaymentMethod($value);
				break;
			case 6:
				$this->setStatus($value);
				break;
			case 7:
				$this->setPaid($value);
				break;
			case 8:
				$this->setUserFullName($value);
				break;
			case 9:
				$this->setUserEmail($value);
				break;
			case 10:
				$this->setUserPhone($value);
				break;
			case 11:
				$this->setUserDeliverTo($value);
				break;
			case 12:
				$this->setUserComment($value);
				break;
			case 13:
				$this->setDateCreated($value);
				break;
			case 14:
				$this->setDateUpdated($value);
				break;
			case 15:
				$this->setUserIp($value);
				break;
			case 16:
				$this->setTotalPrice($value);
				break;
			case 17:
				$this->setExternalId($value);
				break;
			case 18:
				$this->setGiftCertKey($value);
				break;
			case 19:
				$this->setDiscount($value);
				break;
			case 20:
				$this->setGiftCertPrice($value);
				break;
			case 21:
				$this->setDiscountInfo($value);
				break;
			case 22:
				$this->setOriginPrice($value);
				break;
			case 23:
				$this->setComulativ($value);
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
		$keys = SOrdersPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUserId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setKey($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDeliveryMethod($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDeliveryPrice($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPaymentMethod($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStatus($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPaid($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUserFullName($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUserEmail($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUserPhone($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUserDeliverTo($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUserComment($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDateCreated($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDateUpdated($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUserIp($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setTotalPrice($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setExternalId($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setGiftCertKey($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDiscount($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setGiftCertPrice($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDiscountInfo($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setOriginPrice($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setComulativ($arr[$keys[23]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SOrdersPeer::DATABASE_NAME);

		if ($this->isColumnModified(SOrdersPeer::ID)) $criteria->add(SOrdersPeer::ID, $this->id);
		if ($this->isColumnModified(SOrdersPeer::USER_ID)) $criteria->add(SOrdersPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(SOrdersPeer::KEY)) $criteria->add(SOrdersPeer::KEY, $this->key);
		if ($this->isColumnModified(SOrdersPeer::DELIVERY_METHOD)) $criteria->add(SOrdersPeer::DELIVERY_METHOD, $this->delivery_method);
		if ($this->isColumnModified(SOrdersPeer::DELIVERY_PRICE)) $criteria->add(SOrdersPeer::DELIVERY_PRICE, $this->delivery_price);
		if ($this->isColumnModified(SOrdersPeer::PAYMENT_METHOD)) $criteria->add(SOrdersPeer::PAYMENT_METHOD, $this->payment_method);
		if ($this->isColumnModified(SOrdersPeer::STATUS)) $criteria->add(SOrdersPeer::STATUS, $this->status);
		if ($this->isColumnModified(SOrdersPeer::PAID)) $criteria->add(SOrdersPeer::PAID, $this->paid);
		if ($this->isColumnModified(SOrdersPeer::USER_FULL_NAME)) $criteria->add(SOrdersPeer::USER_FULL_NAME, $this->user_full_name);
		if ($this->isColumnModified(SOrdersPeer::USER_EMAIL)) $criteria->add(SOrdersPeer::USER_EMAIL, $this->user_email);
		if ($this->isColumnModified(SOrdersPeer::USER_PHONE)) $criteria->add(SOrdersPeer::USER_PHONE, $this->user_phone);
		if ($this->isColumnModified(SOrdersPeer::USER_DELIVER_TO)) $criteria->add(SOrdersPeer::USER_DELIVER_TO, $this->user_deliver_to);
		if ($this->isColumnModified(SOrdersPeer::USER_COMMENT)) $criteria->add(SOrdersPeer::USER_COMMENT, $this->user_comment);
		if ($this->isColumnModified(SOrdersPeer::DATE_CREATED)) $criteria->add(SOrdersPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(SOrdersPeer::DATE_UPDATED)) $criteria->add(SOrdersPeer::DATE_UPDATED, $this->date_updated);
		if ($this->isColumnModified(SOrdersPeer::USER_IP)) $criteria->add(SOrdersPeer::USER_IP, $this->user_ip);
		if ($this->isColumnModified(SOrdersPeer::TOTAL_PRICE)) $criteria->add(SOrdersPeer::TOTAL_PRICE, $this->total_price);
		if ($this->isColumnModified(SOrdersPeer::EXTERNAL_ID)) $criteria->add(SOrdersPeer::EXTERNAL_ID, $this->external_id);
		if ($this->isColumnModified(SOrdersPeer::GIFT_CERT_KEY)) $criteria->add(SOrdersPeer::GIFT_CERT_KEY, $this->gift_cert_key);
		if ($this->isColumnModified(SOrdersPeer::DISCOUNT)) $criteria->add(SOrdersPeer::DISCOUNT, $this->discount);
		if ($this->isColumnModified(SOrdersPeer::GIFT_CERT_PRICE)) $criteria->add(SOrdersPeer::GIFT_CERT_PRICE, $this->gift_cert_price);
		if ($this->isColumnModified(SOrdersPeer::DISCOUNT_INFO)) $criteria->add(SOrdersPeer::DISCOUNT_INFO, $this->discount_info);
		if ($this->isColumnModified(SOrdersPeer::ORIGIN_PRICE)) $criteria->add(SOrdersPeer::ORIGIN_PRICE, $this->origin_price);
		if ($this->isColumnModified(SOrdersPeer::COMULATIV)) $criteria->add(SOrdersPeer::COMULATIV, $this->comulativ);

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
		$criteria = new Criteria(SOrdersPeer::DATABASE_NAME);
		$criteria->add(SOrdersPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of SOrders (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setUserId($this->getUserId());
		$copyObj->setKey($this->getKey());
		$copyObj->setDeliveryMethod($this->getDeliveryMethod());
		$copyObj->setDeliveryPrice($this->getDeliveryPrice());
		$copyObj->setPaymentMethod($this->getPaymentMethod());
		$copyObj->setStatus($this->getStatus());
		$copyObj->setPaid($this->getPaid());
		$copyObj->setUserFullName($this->getUserFullName());
		$copyObj->setUserEmail($this->getUserEmail());
		$copyObj->setUserPhone($this->getUserPhone());
		$copyObj->setUserDeliverTo($this->getUserDeliverTo());
		$copyObj->setUserComment($this->getUserComment());
		$copyObj->setDateCreated($this->getDateCreated());
		$copyObj->setDateUpdated($this->getDateUpdated());
		$copyObj->setUserIp($this->getUserIp());
		$copyObj->setTotalPrice($this->getTotalPrice());
		$copyObj->setExternalId($this->getExternalId());
		$copyObj->setGiftCertKey($this->getGiftCertKey());
		$copyObj->setDiscount($this->getDiscount());
		$copyObj->setGiftCertPrice($this->getGiftCertPrice());
		$copyObj->setDiscountInfo($this->getDiscountInfo());
		$copyObj->setOriginPrice($this->getOriginPrice());
		$copyObj->setComulativ($this->getComulativ());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getSOrderProductss() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSOrderProducts($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSOrderStatusHistorys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSOrderStatusHistory($relObj->copy($deepCopy));
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
	 * @return     SOrders Clone of current object.
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
	 * @return     SOrdersPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SOrdersPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a SDeliveryMethods object.
	 *
	 * @param      SDeliveryMethods $v
	 * @return     SOrders The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSDeliveryMethods(SDeliveryMethods $v = null)
	{
		if ($v === null) {
			$this->setDeliveryMethod(NULL);
		} else {
			$this->setDeliveryMethod($v->getId());
		}

		$this->aSDeliveryMethods = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SDeliveryMethods object, it will not be re-added.
		if ($v !== null) {
			$v->addSOrders($this);
		}

		return $this;
	}


	/**
	 * Get the associated SDeliveryMethods object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SDeliveryMethods The associated SDeliveryMethods object.
	 * @throws     PropelException
	 */
	public function getSDeliveryMethods(PropelPDO $con = null)
	{
		if ($this->aSDeliveryMethods === null && ($this->delivery_method !== null)) {
			$this->aSDeliveryMethods = SDeliveryMethodsQuery::create()->findPk($this->delivery_method, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aSDeliveryMethods->addSOrderss($this);
			 */
		}
		return $this->aSDeliveryMethods;
	}

	/**
	 * Declares an association between this object and a SPaymentMethods object.
	 *
	 * @param      SPaymentMethods $v
	 * @return     SOrders The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSPaymentMethods(SPaymentMethods $v = null)
	{
		if ($v === null) {
			$this->setPaymentMethod(NULL);
		} else {
			$this->setPaymentMethod($v->getId());
		}

		$this->aSPaymentMethods = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SPaymentMethods object, it will not be re-added.
		if ($v !== null) {
			$v->addSOrders($this);
		}

		return $this;
	}


	/**
	 * Get the associated SPaymentMethods object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SPaymentMethods The associated SPaymentMethods object.
	 * @throws     PropelException
	 */
	public function getSPaymentMethods(PropelPDO $con = null)
	{
		if ($this->aSPaymentMethods === null && ($this->payment_method !== null)) {
			$this->aSPaymentMethods = SPaymentMethodsQuery::create()->findPk($this->payment_method, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aSPaymentMethods->addSOrderss($this);
			 */
		}
		return $this->aSPaymentMethods;
	}

	/**
	 * Declares an association between this object and a SOrderStatuses object.
	 *
	 * @param      SOrderStatuses $v
	 * @return     SOrders The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSOrderStatuses(SOrderStatuses $v = null)
	{
		if ($v === null) {
			$this->setStatus(NULL);
		} else {
			$this->setStatus($v->getId());
		}

		$this->aSOrderStatuses = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SOrderStatuses object, it will not be re-added.
		if ($v !== null) {
			$v->addSOrders($this);
		}

		return $this;
	}


	/**
	 * Get the associated SOrderStatuses object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SOrderStatuses The associated SOrderStatuses object.
	 * @throws     PropelException
	 */
	public function getSOrderStatuses(PropelPDO $con = null)
	{
		if ($this->aSOrderStatuses === null && ($this->status !== null)) {
			$this->aSOrderStatuses = SOrderStatusesQuery::create()->findPk($this->status, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aSOrderStatuses->addSOrderss($this);
			 */
		}
		return $this->aSOrderStatuses;
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
		if ('SOrderProducts' == $relationName) {
			return $this->initSOrderProductss();
		}
		if ('SOrderStatusHistory' == $relationName) {
			return $this->initSOrderStatusHistorys();
		}
	}

	/**
	 * Clears out the collSOrderProductss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSOrderProductss()
	 */
	public function clearSOrderProductss()
	{
		$this->collSOrderProductss = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSOrderProductss collection.
	 *
	 * By default this just sets the collSOrderProductss collection to an empty array (like clearcollSOrderProductss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initSOrderProductss($overrideExisting = true)
	{
		if (null !== $this->collSOrderProductss && !$overrideExisting) {
			return;
		}
		$this->collSOrderProductss = new PropelObjectCollection();
		$this->collSOrderProductss->setModel('SOrderProducts');
	}

	/**
	 * Gets an array of SOrderProducts objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SOrders is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SOrderProducts[] List of SOrderProducts objects
	 * @throws     PropelException
	 */
	public function getSOrderProductss($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSOrderProductss || null !== $criteria) {
			if ($this->isNew() && null === $this->collSOrderProductss) {
				// return empty collection
				$this->initSOrderProductss();
			} else {
				$collSOrderProductss = SOrderProductsQuery::create(null, $criteria)
					->filterBySOrders($this)
					->find($con);
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
	 * @param      PropelCollection $sOrderProductss A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setSOrderProductss(PropelCollection $sOrderProductss, PropelPDO $con = null)
	{
		$this->sOrderProductssScheduledForDeletion = $this->getSOrderProductss(new Criteria(), $con)->diff($sOrderProductss);

		foreach ($sOrderProductss as $sOrderProducts) {
			// Fix issue with collection modified by reference
			if ($sOrderProducts->isNew()) {
				$sOrderProducts->setSOrders($this);
			}
			$this->addSOrderProducts($sOrderProducts);
		}

		$this->collSOrderProductss = $sOrderProductss;
	}

	/**
	 * Returns the number of related SOrderProducts objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SOrderProducts objects.
	 * @throws     PropelException
	 */
	public function countSOrderProductss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSOrderProductss || null !== $criteria) {
			if ($this->isNew() && null === $this->collSOrderProductss) {
				return 0;
			} else {
				$query = SOrderProductsQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySOrders($this)
					->count($con);
			}
		} else {
			return count($this->collSOrderProductss);
		}
	}

	/**
	 * Method called to associate a SOrderProducts object to this object
	 * through the SOrderProducts foreign key attribute.
	 *
	 * @param      SOrderProducts $l SOrderProducts
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function addSOrderProducts(SOrderProducts $l)
	{
		if ($this->collSOrderProductss === null) {
			$this->initSOrderProductss();
		}
		if (!$this->collSOrderProductss->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddSOrderProducts($l);
		}

		return $this;
	}

	/**
	 * @param	SOrderProducts $sOrderProducts The sOrderProducts object to add.
	 */
	protected function doAddSOrderProducts($sOrderProducts)
	{
		$this->collSOrderProductss[]= $sOrderProducts;
		$sOrderProducts->setSOrders($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SOrders is new, it will return
	 * an empty collection; or if this SOrders has previously
	 * been saved, it will retrieve related SOrderProductss from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SOrders.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SOrderProducts[] List of SOrderProducts objects
	 */
	public function getSOrderProductssJoinSProducts($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SOrderProductsQuery::create(null, $criteria);
		$query->joinWith('SProducts', $join_behavior);

		return $this->getSOrderProductss($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SOrders is new, it will return
	 * an empty collection; or if this SOrders has previously
	 * been saved, it will retrieve related SOrderProductss from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SOrders.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SOrderProducts[] List of SOrderProducts objects
	 */
	public function getSOrderProductssJoinSProductVariants($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SOrderProductsQuery::create(null, $criteria);
		$query->joinWith('SProductVariants', $join_behavior);

		return $this->getSOrderProductss($query, $con);
	}

	/**
	 * Clears out the collSOrderStatusHistorys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSOrderStatusHistorys()
	 */
	public function clearSOrderStatusHistorys()
	{
		$this->collSOrderStatusHistorys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSOrderStatusHistorys collection.
	 *
	 * By default this just sets the collSOrderStatusHistorys collection to an empty array (like clearcollSOrderStatusHistorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initSOrderStatusHistorys($overrideExisting = true)
	{
		if (null !== $this->collSOrderStatusHistorys && !$overrideExisting) {
			return;
		}
		$this->collSOrderStatusHistorys = new PropelObjectCollection();
		$this->collSOrderStatusHistorys->setModel('SOrderStatusHistory');
	}

	/**
	 * Gets an array of SOrderStatusHistory objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SOrders is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SOrderStatusHistory[] List of SOrderStatusHistory objects
	 * @throws     PropelException
	 */
	public function getSOrderStatusHistorys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSOrderStatusHistorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collSOrderStatusHistorys) {
				// return empty collection
				$this->initSOrderStatusHistorys();
			} else {
				$collSOrderStatusHistorys = SOrderStatusHistoryQuery::create(null, $criteria)
					->filterBySOrders($this)
					->find($con);
				if (null !== $criteria) {
					return $collSOrderStatusHistorys;
				}
				$this->collSOrderStatusHistorys = $collSOrderStatusHistorys;
			}
		}
		return $this->collSOrderStatusHistorys;
	}

	/**
	 * Sets a collection of SOrderStatusHistory objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $sOrderStatusHistorys A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setSOrderStatusHistorys(PropelCollection $sOrderStatusHistorys, PropelPDO $con = null)
	{
		$this->sOrderStatusHistorysScheduledForDeletion = $this->getSOrderStatusHistorys(new Criteria(), $con)->diff($sOrderStatusHistorys);

		foreach ($sOrderStatusHistorys as $sOrderStatusHistory) {
			// Fix issue with collection modified by reference
			if ($sOrderStatusHistory->isNew()) {
				$sOrderStatusHistory->setSOrders($this);
			}
			$this->addSOrderStatusHistory($sOrderStatusHistory);
		}

		$this->collSOrderStatusHistorys = $sOrderStatusHistorys;
	}

	/**
	 * Returns the number of related SOrderStatusHistory objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SOrderStatusHistory objects.
	 * @throws     PropelException
	 */
	public function countSOrderStatusHistorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSOrderStatusHistorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collSOrderStatusHistorys) {
				return 0;
			} else {
				$query = SOrderStatusHistoryQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySOrders($this)
					->count($con);
			}
		} else {
			return count($this->collSOrderStatusHistorys);
		}
	}

	/**
	 * Method called to associate a SOrderStatusHistory object to this object
	 * through the SOrderStatusHistory foreign key attribute.
	 *
	 * @param      SOrderStatusHistory $l SOrderStatusHistory
	 * @return     SOrders The current object (for fluent API support)
	 */
	public function addSOrderStatusHistory(SOrderStatusHistory $l)
	{
		if ($this->collSOrderStatusHistorys === null) {
			$this->initSOrderStatusHistorys();
		}
		if (!$this->collSOrderStatusHistorys->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddSOrderStatusHistory($l);
		}

		return $this;
	}

	/**
	 * @param	SOrderStatusHistory $sOrderStatusHistory The sOrderStatusHistory object to add.
	 */
	protected function doAddSOrderStatusHistory($sOrderStatusHistory)
	{
		$this->collSOrderStatusHistorys[]= $sOrderStatusHistory;
		$sOrderStatusHistory->setSOrders($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SOrders is new, it will return
	 * an empty collection; or if this SOrders has previously
	 * been saved, it will retrieve related SOrderStatusHistorys from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SOrders.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SOrderStatusHistory[] List of SOrderStatusHistory objects
	 */
	public function getSOrderStatusHistorysJoinSOrderStatuses($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SOrderStatusHistoryQuery::create(null, $criteria);
		$query->joinWith('SOrderStatuses', $join_behavior);

		return $this->getSOrderStatusHistorys($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->user_id = null;
		$this->key = null;
		$this->delivery_method = null;
		$this->delivery_price = null;
		$this->payment_method = null;
		$this->status = null;
		$this->paid = null;
		$this->user_full_name = null;
		$this->user_email = null;
		$this->user_phone = null;
		$this->user_deliver_to = null;
		$this->user_comment = null;
		$this->date_created = null;
		$this->date_updated = null;
		$this->user_ip = null;
		$this->total_price = null;
		$this->external_id = null;
		$this->gift_cert_key = null;
		$this->discount = null;
		$this->gift_cert_price = null;
		$this->discount_info = null;
		$this->origin_price = null;
		$this->comulativ = null;
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
			if ($this->collSOrderProductss) {
				foreach ($this->collSOrderProductss as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSOrderStatusHistorys) {
				foreach ($this->collSOrderStatusHistorys as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collSOrderProductss instanceof PropelCollection) {
			$this->collSOrderProductss->clearIterator();
		}
		$this->collSOrderProductss = null;
		if ($this->collSOrderStatusHistorys instanceof PropelCollection) {
			$this->collSOrderStatusHistorys->clearIterator();
		}
		$this->collSOrderStatusHistorys = null;
		$this->aSDeliveryMethods = null;
		$this->aSPaymentMethods = null;
		$this->aSOrderStatuses = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(SOrdersPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseSOrders
