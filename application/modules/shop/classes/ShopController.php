<?php

/**
  Shop Controller class file.
 * */
class ShopController extends MY_Controller {
	protected $template_path = null;
	public static $currentLocale = null;
	public static $doShowUntranslated = FALSE;
	public function __construct() {
		parent::__construct ();
		$this->template_path = ShopCore::$template_path;
		
		if (count ( $this->db->where ( 'name', 'mod_discount' )->get ( 'components' )->result_array () ) != 0)
			$this->load->module ( 'mod_discount' )->register_script ();
	}
	
	/**
	 * Fetch teplate file and display it in main.tpl
	 *
	 * @param string $name
	 *        	template file name
	 * @param array $data
	 *        	template data
	 * @access public
	 */
	public function render($name, $data = array(), $fetch = false) {
		$this->template->add_array ( $data );
		$content = $this->template->fetch ( 'file:' . $this->template_path . $name . '.tpl' );
		
		if ($fetch === false) {
			$this->template->assign ( 'content', $content );
			$this->template->display ( 'file:' . $this->template_path . '../main.tpl' );
		} else {
			return $content;
		}
	
	/**
	 * Profilers
	 */
		// $this->template->run_info();
		// echo ShopCore::app()->SPropelLogger->displayAsTable();
	}
	
	/**
	 * Display 404 error page.
	 *
	 * @access public
	 */
	public function error404() {
		header ( "HTTP/1.0 404 Not Found" );
		$this->render ( 'error404', array (
				'error' => ShopCore::t ( 'Страница не найдена' ) 
		) );
		exit ();
	}
	public static function getShowUntranslated() {
		return self::$doShowUntranslated;
	}
	public function render_min($name, $data = array(), $fetch = false) {
		$this->template->add_array ( $data );
		return $this->template->display ( 'file:' . $this->template_path . $name . '.tpl' );
	}
}

