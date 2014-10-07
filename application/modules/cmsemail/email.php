<?php

namespace cmsemail;

(defined ( 'BASEPATH' )) or exit ( 'No direct script access allowed' );

/**
 * Image CMS
 * Emails
 */
class email extends classes\BaseEmail {
	protected static $_instance;
	public function __construct() {
		parent::__construct ();
	}
	private function __clone() {
	}
	
	/**
	 *
	 * @return email
	 */
	public static function getInstance() {
		if (null === self::$_instance) {
			self::$_instance = new self ();
		}
		return self::$_instance;
	}
}

/* End of file email.php */
