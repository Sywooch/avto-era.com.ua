<?php

namespace Cart;

(defined ( 'BASEPATH' )) or exit ( 'No direct script access allowed' );
class Api extends \Cart\BaseCart {
	protected static $_BehaviorInstance;
	public function __construct() {
	}
	private function __clone() {
	}
	public static function create() {
		(null !== self::$_BehaviorInstance) or self::$_BehaviorInstance = new self ();
		self::$_BehaviorInstance->key = null;
		return self::$_BehaviorInstance;
	}
	public function __call($name, $params = array()) {
		if (! method_exists ( $this, $name ))
			$this->core->error_404 ();
	}
	public function add($action) {
		echo $action;
	}
	public function remove1($action) {
		echo $action;
	}
}

/* End of file Api.php */