<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Exchange Class
 * exchange class handles 1c import/export
 * @package 1C-Exchange
 * @author ImageCMS <dev@imagecms.net>
 * @link  http://wiki.imagecms.net/%D0%98%D0%BD%D1%82%D0%B5%D0%B3%D1%80%D0%B0%D1%86%D0%B8%D1%8F_%D1%81_1%D0%A1
 */
class Exchange {

	/** array which contains 1c settings  */
	private $config = array();

	/** object instance of ci */
	private $ci;

	/** default directory for saving files from 1c */
	private $tempDir;

	/** contains default locale */
	private $locale;

	/** contains shop category table name */
	private $categories_table = 'shop_category';

	/** contains shop products properties table name */
	private $properties_table = 'shop_product_properties';

	/** contains shop products table name */
	private $products_table = 'shop_products';

	/** contains shop products variants name */
	private $product_variants_table = 'shop_product_variants';

	/** contains shop products variants images */
	private $shop_images = array();

	/** contains shop products additionals images */
	private $shop_additionals_images = array();

	/** table which contains module settings if modules is installed */
	private $settings_table = 'components';
	private $allowed_image_extensions = array();
	private $login;
	private $password;
	private $brand_identif;
	private $cat = array();
	private $prod = array();
	private $brand = array();
	private $prop = array();
	private $prop_data = array();
	private $multi_prop_data = array();
	private $urls = array();

	/**
	 * id of main currency
	 * @var int
	 */
	private $mainCurrencyId;

	public function __construct() {
		set_time_limit(0);
		ini_set('max_execution_time', 90000000);

		/* define path to folder for saving files from 1c */
		$this->tempDir = PUBPATH . 'application/modules/shop/cmlTemp/';

		$this->ci = &get_instance();

		$this->ci->load->helper('translit');
		$this->ci->load->helper('file');

		include 'application/modules/exchange/helpers/ex_helper.php';

		$this->locale = MY_Controller::getCurrentLocale();    //getting current locale
		$this->config = $this->get1CSettings();

		if (!$this->config) {
			//default settings if module is not installed yet
			$this->config['zip'] = 'no';
			$this->config['filesize'] = 2048000;
			$this->config['validIP'] = '127.0.0.1';
			$this->config['password'] = '';
			$this->config['usepassword'] = false;
			$this->config['userstatuses'] = array();
			$this->config['autoresize'] = 'off';
			$this->config['debug'] = false;
			$this->config['email'] = false;
		}

		if ($this->config[brand])
			$this->brand = load_brand();

		$this->allowed_image_extensions = array('jpg', 'jpeg', 'png', 'gif');

		//define first get command parameter
		$method = 'command_';

		$this->login = trim($_SERVER['PHP_AUTH_USER']);
		$this->password = trim($_SERVER['PHP_AUTH_PW']);

		//saving get requests to log file
		if ($_GET) {
			foreach ($_GET as $key => $value) {
				$string .= date('c') . " GET - " . $key . ": " . $value . "\n";
			}
			write_file($this->tempDir . "log.txt", $string, 'ab');
		}

		//preparing method and mode name from $_GET variables
		if (isset($_GET['type']) && isset($_GET['mode']))
			$method .= strtolower($_GET['type']) . '_' . strtolower($_GET['mode']);

		//run method if exist
		if (method_exists($this, $method))
			$this->$method();
	}

	/**
	 * Use this function to make backup before import starts
	 */
	protected function makeDBBackup() {
		if (is_really_writable('./application/backups')) {
			$this->ci->load->dbutil();
			$backup = & $this->ci->dbutil->backup(array('format' => 'txt'));
			write_file('./application/backups/' . "sql_" . date("d-m-Y_H.i.s.") . 'txt', $backup);
		} else {
			$this->error_log('Невозможно создать снимок базы, проверте папку /application/backups на возможность записи');
		}
	}

	/**
	 * get 1c settings from modules table
	 * @return boolean
	 */
	private function get1CSettings() {
		$config = $this->ci->db
		->where('identif', 'exchange')
		->get('components')
		->row_array();
		if (empty($config))
			return false;
		else
			return unserialize($config['settings']);
	}

	/**
	 * module install function
	 */
	function _install() {
		$this->ci->load->dbforge();
		($this->ci->dx_auth->is_admin()) OR exit;
		$fields = array(
				'id' => array(
						'type' => 'INT',
						'auto_increment' => TRUE
				),
				'external_id' => array(
						'type' => 'VARCHAR',
						'constraint' => '255',
						'null' => TRUE,
				),
				'property_id' => array(
						'type' => 'VARCHAR',
						'constraint' => '255',
						'null' => TRUE,
				),
				'value' => array(
						'type' => 'VARCHAR',
						'constraint' => '20',
						'null' => TRUE,
				)
		);

		$this->ci->dbforge->add_field($fields);
		$this->ci->dbforge->add_key('id', TRUE);
		$this->ci->dbforge->create_table('mod_exchange');

		$for_insert = serialize($this->config);
		$this->ci->db
		->where('identif', 'exchange')
		->update($this->settings_table, array(
				'settings' => $for_insert,
				'enabled' => 1,
		));
	}

	public function _deinstall() {
		$this->ci->load->dbforge();
		($this->ci->dx_auth->is_admin()) OR exit;
		$this->ci->dbforge->drop_table('mod_exchange');
	}

	function error_log($error, $send_email = FALSE) {
		$intIp = $_SERVER ["REMOTE_ADDR"];
		if (isset($_SERVER ["HTTP_X_FORWARDED_FOR"])) {
			if (isset($_SERVER ["HTTP_X_REAL_IP"]))
				$intIp = $_SERVER ["HTTP_X_REAL_IP"];
			else
				$intIp = $_SERVER ["HTTP_X_FORWARDED_FOR"];
		}

		if ($this->config[debug])
			write_file($this->tempDir . "error_log.txt", $intIp . ' - ' . date('c') . ' - ' . $error . PHP_EOL, 'ab');

		if ($send_email) {
			$this->ci->load->library('email');

			$this->ci->email->from("noreplay@$_SERVER[HTTP_HOST]");
			$this->ci->email->to($this->config[email]);

			$this->ci->email->subject('1C exchange');
			$this->ci->email->message($intIp . ' - ' . date('c') . ' - ' . $error . PHP_EOL);

			$this->ci->email->send();
		}
	}

	function __autoload() {
		return;
	}

	/**
	 * checking password from $_GET['password'] if use_password option in settings is "On"
	 */
	private function check_password() {
		if (($this->config['login'] == $this->login) && ($this->config['password'] == $this->password)) {
			$this->checkauth();
		} else {
			echo "failure. wrong password";
			$this->error_log('Неверно введен пароль', TRUE);
		}
	}

	/**
	 * return to 1c session id and success status
	 * to initialize import start
	 */
	private function command_catalog_checkauth() {
		if ($this->config['usepassword'] == 'on') {
			$this->check_password();
		} else {
			$this->checkauth();
		}
		exit();
	}

	/**
	 * preparing to import
	 * writing session id to txt file in md5
	 * deleting old import files
	 */
	private function checkauth() {
		echo "success\n";
		echo session_name() . "\n";
		echo session_id() . "\n";
		$string = md5(session_id());
		write_file($this->tempDir . "session.txt", $string, 'w');
		if (file_exists($this->tempDir . 'import.xml'))
			unlink($this->tempDir . 'import.xml');
		if (file_exists($this->tempDir . 'offers.xml'))
			unlink($this->tempDir . 'offers.xml');
	}

	/**
	 * checking if current session id matches session id in txt files
	 * @return boolean
	 */
	private function check_perm() {
		if ($this->config[debug])
			return true;

		$string = read_file($this->tempDir . 'session.txt');
		if (md5(session_id()) == $string) {
			return true;
		} else {
			$this->error_log("Ошибка безопасности!!!", TRUE);
			die("Ошибка безопасности!!!");
		}
	}

	/**
	 * returns exchange settings to 1c
	 * @zip no
	 * @file_limit in bytes
	 */
	private function command_catalog_init() {
		if ($this->check_perm() === true) {
			echo "zip=" . $this->config['zip'] . "\n";
			echo "file_limit=" . $this->config['filesize'] . "\n";
		}
		exit();
	}

	/**
	 * saves exchange files to tempDir
	 * xml files will be saved to tempDir/
	 * images wil be saved  to tempDir/images as jpg files
	 */
	private function command_catalog_file() {
		if ($this->check_perm() === true) {
			$st = $_GET['filename'];
			$st = basename($st);
			if (strrchr($st, "/"))
				$st = strrchr($st, "/");
			$ext = pathinfo($st, PATHINFO_EXTENSION);
			if ($ext != 'xml' && in_array($ext, $this->allowed_image_extensions)) {
				//saving images to cmlTemp/images folder
				if (write_file($this->tempDir . "images/" . $st, file_get_contents('php://input'), 'wb')) {
					echo "success";
				}
			} else {
				//saving xml files to cmlTemp
				if (write_file($this->tempDir . $_GET['filename'], file_get_contents('php://input'), 'a+')) {
					echo "success";
				}
			}
		}
		exit();
	}

	/**
	 * loading xml file to $this->xml variable
	 * uses simple xml extension
	 * @param type $filename
	 * @return boolean
	 */
	private function _readXmlFile($filename) {
		if (file_exists($this->tempDir . $filename) && is_file($this->tempDir . $filename))
			return simplexml_load_file($this->tempDir . $filename);
		return false;
	}

	/**
	 * start import process
	 * @return string "success" if success
	 */
	private function command_catalog_import() {
		$this->cat = load_cat();
		$this->prod = load_product();
		$this->prop = load_prop();
		$this->prop_data = load_prop_data();
		$this->multi_prop_data = load_multiple_prop();
		$this->urls = load_urls();
		$this->mainCurrencyId = load_main_curr();

		//check if session is up to date
		if ($this->check_perm() === true) {
			if ($this->config['backup'])
				$this->makeDBBackup();
			//reading xml files
			$this->xml = $this->_readXmlFile($_GET['filename']);
			if (!$this->xml) {
				$this->error_log('Ненайден ХМL файл импорта');
				return "failure";
			}

			// Import categories
			if (isset($this->xml->Классификатор->Группы)) {
				$this->importCategories($this->xml->Классификатор->Группы);
			}

			// Import properties
			if (isset($this->xml->Классификатор->Свойства)) {
				$this->importProperties();
			}

			//import products
			if (isset($this->xml->Каталог->Товары)) {
				$this->importProducts();
			}

			//import prices
			if (isset($this->xml->ПакетПредложений->Предложения)) {
				$this->importPrices();
			}

			//auto resize images if option is on
			if ($this->config['autoresize'] == 'on')
				$this->startImagesResize();

			//remove old success import file
			if (file_exists($this->tempDir . "success_" . $_GET['filename'])) {
				unlink($this->tempDir . "success_" . $_GET['filename']);
			}

			//rename import xml file after import finished
			if (!$this->config[debug])
				rename($this->tempDir . $_GET['filename'], $this->tempDir . "success_" . $_GET['filename']);
			//returns success status to 1c
			echo "success";
		}
		exit();
	}

	private function importCategories($data, $parent = null) {

		foreach ($data->Группа as $category) {
			//search category by external id
			//$searchedCat = array();
			// не робити в циклі а зробити один раз і працювати з масивом масив виду external_id => category_data
			// $searchedCat = $this->ci->db->select("id, external_id")->where('external_id', $category->Ид . "")->get($this->categories_table)->row_array();
			$searchedCat = is_cat($category->Ид, $this->cat);

			if (!$searchedCat) {
				//category not found, it should be inserted
				$translit = '';
				$translit = translit_url($category->Наименование);
				//preparing data for insert
				$data = array();
				$data['url'] = $translit;
				$data['external_id'] = $category->Ид . "";
				$data['active'] = TRUE;
				if (!$parent) {
					$data['parent_id'] = 0;
					$data['full_path'] = $translit;
					$ids = array();
					$data['full_path_ids'] = serialize($ids);
				} else {
					$data['parent_id'] = $parent['id'];
					$data['full_path'] = $parent['full_path'] . "/" . $translit;
				}
				$insert_id = null;
				$this->ci->db->insert($this->categories_table, $data);
				$insert_id = $this->ci->db->insert_id();


				//update full path ids if have parent
				if ($parent) {
					$data['full_path_ids'] = unserialize($parent['full_path_ids']);
					if (empty($data['full_path_ids']))
						$data['full_path_ids'] = array((int) $parent['id']);
					else {
						$data['full_path_ids'][] = (int) $parent['id'];
					}
					$this->ci->db
					->where('id', $insert_id)
					->update($this->categories_table, array('full_path_ids' => serialize($data['full_path_ids'])));
				}

				//preparing data for i18n table insert
				$i18n_data['id'] = $insert_id;
				$i18n_data['name'] = $category->Наименование . "";
				$i18n_data['locale'] = $this->locale;

				//inserting data to i18n table
				$this->ci->db->insert('shop_category_i18n', $i18n_data);
				$this->cat[] = array(
						'id' => $insert_id,
						'external_id' => $category->Ид . '',
						'full_path_ids' => $data['full_path_ids'],
						'full_path' => $data['full_path'],
						'url' => $data['url'],
						'parent_id' => $data['parent_id']
				);
			} else {
				//category found - we'll update it
				$translit = '';
				$translit = translit_url($category->Наименование);
				//preparing data for update
				$data = array();
				$data['url'] = $translit;
				$data['active'] = TRUE;
				if (!$parent) {
					$data['parent_id'] = 0;
					$data['full_path'] = $translit;
					$ids = array();
					$data['full_path_ids'] = serialize($ids);
				} else {
					$data['parent_id'] = $parent['id'];
					$data['full_path'] = $parent['full_path'] . "/" . $translit;
				}
				$this->ci->db
				->where('external_id', $searchedCat['external_id'])
				->update($this->categories_table, $data);

				//preparing data for i18n table update
				$i18n_data['name'] = $category->Наименование . "";

				//update data in i18n table
				$this->ci->db
				->where('id', $searchedCat['id'])
				->update('shop_category_i18n', $i18n_data);

				//update full path ids if have parent
				if ($parent) {
					$data['full_path_ids'] = unserialize($parent['full_path_ids']);
					if (empty($data['full_path_ids']))
						$data['full_path_ids'] = array($searchedCat['id']);
					else {
						$data['full_path_ids'][] = $searchedCat['id'];
					}
					$this->ci->db
					->where('id', $searchedCat['id'])
					->update($this->categories_table, array('full_path_ids' => serialize($data['full_path_ids'])));
				}
			}
			//process subcategories
			if (isset($category->Группы)) {

				//$parent_cat брати з масиву
				$parentCat = is_cat($category->Ид, $this->cat);
				//$this->ci->db->select("id, url, full_path, full_path_ids")->where('external_id', $category->Ид . "")->get($this->categories_table)->row_array();
				$this->importCategories($category->Группы, $parentCat);
			}
		}
	}

	private function importProperties() {
		if (isset($this->xml->Классификатор->Свойства->СвойствоНоменклатуры))
			$properties = $this->xml->Классификатор->Свойства->СвойствоНоменклатуры;
			elseif (isset($this->xml->Классификатор->Свойства->Свойство))
			$properties = $this->xml->Классификатор->Свойства->Свойство;
			foreach ($properties as $property) {

			if ($property->Наименование == $this->config['brand'])
				$this->brand_identif = $property->Ид;
				//            } else {
			//searching property by external id
			// $searchedProperty = $this->ci->db->select('id, external_id')->where('external_id', $property->Ид . "")->get('shop_product_properties')->row_array();
			$searchedProperty = is_prop($property->Ид, $this->prop);
			if (!$searchedProperty) {
				//property not found, it should be inserted
				//preparing insert data array
				$data = array();
				$data['external_id'] = $property->Ид . "";
				$data['csv_name'] = translit_url($property->Наименование);
				$data['csv_name'] = str_replace(array("-", "_", "'"), '', $data['csv_name']);

				if ($property->Обязательное . "" == 'true')
					$data['main_property'] = true;
				elseif ($property->Обязательное . "" == 'false')
				$data['main_property'] = false;
				if ($property->Множественное . "" == 'true')
					$data['multiple'] = true;
				elseif ($property->Множественное . "" == 'false')
				$data['multiple'] = false;

				if ($property->ТипЗначений . "" == 'Справочник') {
					$data['multiple'] = true;
				} else {
					$data['multiple'] = false;
				}

				if ($property->ИспользованиеСвойства . "" == 'true')
					$data['active'] = true;
				elseif ($property->ИспользованиеСвойства . "" == 'false')
				$data['active'] = false;
				if (count($property->ИспользованиеСвойства) == 0)
					$data['active'] = true;

				$data['show_in_compare'] = false;
				$data['show_on_site'] = true;
				$data['show_in_filter'] = false;
				//insert new property to properties table
				$this->ci->db->insert($this->properties_table, $data);

				$insert_id = null;
				$insert_id = $this->ci->db->insert_id();

				foreach ($property->ВариантыЗначений->Справочник as $value) {
					$v['external_id'] = (string) $value->ИдЗначения;
					$v['property_id'] = $insert_id;
					$v['value'] = (string) $value->Значение;
					$this->ci->db->insert('mod_exchange', $v);
				}

				//preparing data for insert to i18n table
				$i18n_data = array();
				$i18n_data['id'] = $insert_id;
				$i18n_data['name'] = $property->Наименование . "";
				$i18n_data['locale'] = $this->locale;
				$i18n_data['data'] = '';

				//inserting data to i18n table
				$this->ci->db->insert($this->properties_table . "_i18n", $i18n_data);
				$this->prop[] = array(
						'id' => $insert_id,
						'multiple' => $data['multiple'],
						'external_id' => $property->Ид . ''
				);
				$this->multi_prop_data = load_multiple_prop();
			} else {
				//property found, it sould be updated
				//preparing data for update
				$data = array();
				$data['csv_name'] = translit_url($property->Наименование);
				$data['csv_name'] = str_replace(array("-", "_", "'"), '', $data['csv_name']);

				if ($property->Обязательное . "" == 'true')
					$data['main_property'] = true;
				elseif ($property->Обязательное . "" == 'false')
				$data['main_property'] = false;
				if ($property->Множественное . "" == 'true')
					$data['multiple'] = true;
				elseif ($property->Множественное . "" == 'false')
				$data['multiple'] = false;

				if ($property->ТипЗначений . "" == 'Справочник') {
					$data['multiple'] = true;
					foreach ($property->ВариантыЗначений->Справочник as $value) {

						$this->ci->db->set('value', (string) $value->Значение);

						$this->ci->db
						->where(array(
								'external_id' => (string) $value->ИдЗначения,
								'property_id' => $searchedProperty['id']))
								->update('mod_exchange');
					}
				}
				else
					$data['multiple'] = false;

				if ($property->ИспользованиеСвойства . "" == 'true')
					$data['active'] = true;
				elseif ($property->ИспользованиеСвойства . "" == 'false')
				$data['active'] = false;
				if (count($property->ИспользованиеСвойства) == 0)
					$data['active'] = true;

				//updating property
				$this->ci->db
				->where(array(
						'id' => $searchedProperty['id'],
						'external_id' => $searchedProperty['external_id']))
						->update($this->properties_table, $data);

				//preparing update data for i18n table
				$i18n_data = array();
				$i18n_data['name'] = $property->Наименование . "";

				//updating i18n property table
				$this->ci->db
				->where(array(
						'id' => $searchedProperty['id'],
						'locale' => $this->locale))
						->update($this->properties_table . "_i18n", $i18n_data);
			}
			//            }
		}
	}

	/**
	 * Set brand for product
	 * @param type $property
	 * @param type $insert_id
	 */
	private function set_brand($property, $insert_id) {
		if (!$this->config[brand])
			return;
		$brand_id = 0;
		//check if product property exists
		if (is_prop_multiple((string) $property->Ид, $this->prop)) {
			$brandName = $this->multi_prop_data[(string) $property->Значение];
		} else {
			$brandName = $property->Значение . "";
		}
		$brand_id = is_brand($brandName, $this->brand);

		if (!$brand_id) {
			$brand_data = array(
					'url' => translit_url(strtolower($brandName))
			);
			$this->ci->db->insert('shop_brands', $brand_data);
			$brand_id = $this->ci->db->insert_id();
			$brand_data_locale = array(
					'id' => $brand_id,
					'name' => $brandName,
					'locale' => $this->locale,
			);
			$this->ci->db->insert('shop_brands_i18n', $brand_data_locale);
			$this->brand = load_brand();
		}

		$this->ci->db
		->where('id', $insert_id)
		->update('shop_products', array('brand_id' => $brand_id));
	}

	/**
	 * Import products
	 * @return boolean
	 */
	private function importProducts() {
		//property data array for serialize and unserialize
		$temp_properties = $this->ci->db
		->select('id, data')
		->where('locale', $this->locale)
		->get('shop_product_properties_i18n')
		->result_array();

		if (is_array($temp_properties)) {
			foreach ($temp_properties as $key => $item) {
				if (unserialize($item['data']) == false)
					$properties_data[$item['id']] = array();
				else
					$properties_data[$item['id']] = unserialize($item['data']);
			}
		}
		unset($temp_properties);

		$i = 0;
		foreach ($this->xml->Каталог->Товары->Товар as $product) {

			$searchedProduct = is_prod($product->Ид, $this->prod);

			if (!$searchedProduct) {

				//product not found, should be inserted
				//preparing insert data for shop_products table
				$data = array();
				$data['external_id'] = $product->Ид . "";

				if (isset($product->Группы)) {
					$categ = is_cat($product->Группы->Ид, $this->cat);
					if ($categ)
						$categoryId = $categ['id'];
					else
						return false;
					$data['category_id'] = $categoryId;
				}

				if ($product->Статус == 'Удален')
					$data['active'] = false;
				else
					$data['active'] = true;

				$data['hit'] = false;
				$data['brand_id'] = 0;
				$data['created'] = time();
				$data['updated'] = '';
				$data['old_price'] = '0.00';
				$data['views'] = 0;
				$data['hot'] = false;
				$data['action'] = false;
				$data['added_to_cart_count'] = 0;
				$data['enable_comments'] = true;

				if (in_array(translit_url($product->Наименование), $this->urls)) {
					$data['url'] = translit_url($product->Наименование) . '-' . $product->Ид;
				} else {
					$data['url'] = translit_url($product->Наименование);
					$this->urls[] .= $data['url'];
				}

				//inserting prepared data to shop_products table
				$this->ci->db->insert($this->products_table, $data);

				//preparing after insert updating
				$insert_id = null;
				$insert_id = $this->ci->db->insert_id();
				$data = array();

				//setting images if $product->Картинка not empty
				if ($product->Картинка != '' OR $product->Картинка != null) {

					$picture = null;
					foreach ($product->Картинка as $p) {
						$p = explode('/', $p);
						$p = end($p);
						$picture[] .= $p;
					}

					if (count($picture) > 1) {

						$this->ci->db->delete('shop_product_images', array('product_id' => $insert_id));

						foreach ($picture as $key => $pic) {
							if ($key == '0') {
								@copy($this->tempDir . 'images/' . $pic, './uploads/shop/products/origin/' . $pic);
							} else {
								@copy($this->tempDir . 'images/' . $pic, './uploads/shop/products/origin/additional/' . $pic);

								$this->ci->db->set('product_id', $insert_id);
								$this->ci->db->set('image_name', $pic);
								$this->ci->db->set('position', $key - 1);
								$this->ci->db->insert('shop_product_images');

								$this->shop_additionals_images[] = $insert_id;
							}
						}
					}
					else
						@copy($this->tempDir . 'images/' . $picture[0], './uploads/shop/products/origin/' . $picture[0]);

					$img[$i] = $picture[0];
				}

				//preparing data for shop_products_i18n table
				$data['id'] = $insert_id;
				$data['locale'] = $this->locale;
				$data['name'] = $product->Наименование . "";
				$data['short_description'] = $product->Описание . "";
				$data['full_description'] = $product->Описание . "";

				//inserting prepared data into shop_products_i18n
				$this->ci->db->insert($this->products_table . "_i18n", $data);

				//preparing data for shop_products_categories
				$data = array();
				if ($categoryId) {
					$data['product_id'] = $insert_id;
					$data['category_id'] = $categoryId;
					//inserting data into shop_products_categories
					$this->ci->db->insert("shop_product_categories", $data);
				}

				//preparing insert data for shop_product_variants
				$data = array();
				$data['mainImage'] = $img[$i];
				$data['product_id'] = $insert_id;
				$data['price'] = '0.00000';
				$data['external_id'] = $product->Ид . "";
				$data['number'] = $product->Артикул . "";
				$data['stock'] = 0;
				$data['position'] = 0;
				$data['currency'] = $this->mainCurrencyId;
				$data['price_in_main'] = '0.00000';

				//inserting prepared data to shop_product_variants
				$this->ci->db->insert($this->product_variants_table, $data);

				//preparing insert data for shop_product_variants_i18n table
				$variant_insert_id = null;
				$variant_insert_id = $this->ci->db->insert_id();
				$data = array();
				$data['locale'] = $this->locale;
				$data['id'] = $variant_insert_id;
				$data['name'] = '';

				//inserting prepared data into shop_product_variants_i18n
				$this->ci->db->insert($this->product_variants_table . "_i18n", $data);

				//process properties
				if ($product->ЗначенияСвойств) {
					foreach ($product->ЗначенияСвойств->ЗначенияСвойства as $property) {
						if ($property->Значение . "" == '')
							continue;

						// for brand------------------------------------------------------------------------
						if ($property->Ид . "" == $this->brand_identif) {
							$this->set_brand($property, $insert_id);
						} else {
							//------------------------------------------------------------------------------------
							//search property by external id
							$searchedProperty = null;

							$searchedProperty = is_prop($property->Ид, $this->prop);
							if ($searchedProperty) {
								//prepare insert data for shop_product_properties_data
								$data = array();
								$data['property_id'] = $searchedProperty['id'];
								$data['product_id'] = $insert_id;

								if (is_prop_multiple((string) $property->Ид, $this->prop)) {
									$data['value'] = $this->multi_prop_data[(string) $property->Значение];
								} else {
									$data['value'] = $property->Значение . "";
									//check if product property exists
								}

								$data['locale'] = $this->locale;

								//insert prepared data into shop_product_properties_data
								$this->ci->db->insert($this->properties_table . "_data", $data);

								if (!in_array($data['value'], $properties_data[$searchedProperty['id']])) {
									$properties_data[$searchedProperty['id']][] = $data['value'];
								}

								//update shop_product_properties_categories
								//search if relation not exists and insert record to base
								if ($categoryId) {
									if ($this->ci->db->where(array('property_id' => $searchedProperty['id'], 'category_id' => $categoryId))->get('shop_product_properties_categories')->num_rows() == 0) {
										$this->ci->db->insert('shop_product_properties_categories', array('property_id' => $searchedProperty['id'], 'category_id' => $categoryId));
									}
								}
								$this->prop_data[$searchedProperty['id'] . '_' . $insert_id] = $data['value'];
							}
						}
					}
				}
				$this->prod[$insert_id] = $product->Ид . '';
			} else {
				//product found and should be updated
				//preparing update data for shop_products table
				$data = array();

				if (isset($product->Группы)) {
					$categ = is_cat($product->Группы->Ид, $this->cat);
					if ($categ)
						$categoryId = $categ['id'];
					else
						return false;
					$data['category_id'] = $categoryId;
				}
				$data['updated'] = time();

				if ($product->Статус == 'Удален')
					$data['active'] = false;
				else
					$data['active'] = true;

				//updating prepared data in shop_products table
				$this->ci->db->where('id', $searchedProduct['id'])->update($this->products_table, $data);

				//setting images if $product->Картинка not empty
				if ($product->Картинка != '' OR $product->Картинка != null) {

					$picture = null;
					foreach ($product->Картинка as $p) {
						$p = explode('/', $p);
						$p = end($p);
						$picture[] .= $p;
					}

					if (count($picture) > 1) {
						$this->ci->db->delete('shop_product_images', array('product_id' => $searchedProduct['id']));

						foreach ($picture as $key => $pic) {
							if ($key == '0') {
								@copy($this->tempDir . 'images/' . $pic, './uploads/shop/products/origin/' . $pic);
							} else {
								@copy($this->tempDir . 'images/' . $pic, './uploads/shop/products/origin/additional/' . $pic);

								$this->ci->db->set('product_id', $searchedProduct['id']);
								$this->ci->db->set('image_name', $pic);
								$this->ci->db->set('position', $key - 1);
								$this->ci->db->insert('shop_product_images');

								$this->shop_additionals_images[] = $searchedProduct['id'];
							}
						}
					}
					else
						@copy($this->tempDir . 'images/' . $picture[0], './uploads/shop/products/origin/' . $picture[0]);

					$img[$i] = $picture[0];
				}

				//preparing data for shop_products_i18n table
				$data = array();
				$data['name'] = $product->Наименование . "";
				$data['short_description'] = $product->Описание . "";
				$data['full_description'] = $product->Описание . "";

				//updating prepared data in shop_products_i18n
				$this->ci->db->where('id', $searchedProduct['id'])->update($this->products_table . "_i18n", $data);

				//preparing data for shop_products_categories
				if ($categoryId) {
					$data = array();
					$data['product_id'] = $searchedProduct['id'];
					$data['category_id'] = $categoryId;
					if ($this->ci->db->where($data)->get('shop_product_categories')->num_rows() == 0)
						//inserting data into shop_products_categories
						$this->ci->db
						->insert("shop_product_categories", $data);
				}

				//preparing update data for shop_product_variants
				$data = array();
				$data['number'] = $product->Артикул . "";
				$data['external_id'] = $product->Ид . "";
				$data['mainImage'] = $img[$i];

				//updating prepared data in shop_product_variants
				$this->ci->db
				->where(array('product_id' => $searchedProduct['id'], 'position' => 0))
				->update($this->product_variants_table, $data);

				//process properties
				if ($product->ЗначенияСвойств) {
					foreach ($product->ЗначенияСвойств->ЗначенияСвойства as $property) {
						if ($property->Значение . "" == '')
							continue;
						// for brand------------------------------------------------------------------------
						if ($property->Ид . "" == $this->brand_identif) {
							$this->set_brand($property, $searchedProduct['id']);
						} else {
							//------------------------------------------------------------------------------------
							//search property by external id
							$searchedProperty = null;

							$searchedProperty = is_prop($property->Ид, $this->prop);
							if ($searchedProperty) {

								//prepare insert data for shop_product_properties_data
								$data = array();
								if (is_prop_multiple((string) $property->Ид, $this->prop)) {
									$data['value'] = $this->multi_prop_data[(string) $property->Значение];
								} else {
									$data['value'] = $property->Значение . "";
									//check if product property exists
								}

								if (is_prop_data($searchedProperty['id'], $searchedProduct['id'], $this->prop_data)) {
									//update prepared data into shop_product_properties_data
									if ($this->multi_prop_data[$data['value']])
										$this->ci->db
										->where(array(
												'product_id' => $searchedProduct['id'],
												'property_id' => $searchedProperty['id']))
												->update($this->properties_table . "_data", $data);
								} else {
									//insert new row
									$this->ci->db->insert($this->properties_table . "_data", array(
											'property_id' => $searchedProperty['id'],
											'product_id' => $searchedProduct['id'],
											'value' => $data['value'],
											'locale' => $this->locale
									));
								}
								$this->prop_data[$searchedProperty['id'] . '_' . $searchedProduct['id']] = $property->Значение . "";

								if (!in_array($data['value'], $properties_data[$searchedProperty['id']])) {
									$properties_data[$searchedProperty['id']][] = $data['value'];
								}

								//update shop_product_properties_categories
								//search if relation not exists and insert record to base
								if ($categoryId) {
									if ($this->ci->db->where(array('property_id' => $searchedProperty['id'], 'category_id' => $categoryId))->get('shop_product_properties_categories')->num_rows() == 0) {
										$this->ci->db->insert('shop_product_properties_categories', array('property_id' => $searchedProperty['id'], 'category_id' => $categoryId));
									}
								}
							}
						}
					}
				}
			}
			$i++;
		}

		$this->shop_images = array_diff($img, array(null));

		//serializing and saving property values to database
		foreach ($properties_data as $key => $item) {
			$data = array();
			$data = array('data' => serialize($item));
			$this->ci->db
			->where(array('id' => $key, 'locale' => $this->locale))
			->update('shop_product_properties_i18n', $data);
		}
	}

	private function importPrices() {
		foreach ($this->xml->ПакетПредложений->Предложения->Предложение as $offer) {
			//prepare update data
			$data = array();
			$data['price'] = (float) $offer->Цены->Цена->ЦенаЗаЕдиницу;
			$data['price_in_main'] = (float) $offer->Цены->Цена->ЦенаЗаЕдиницу;
			$data['stock'] = (int) $offer->Количество;
			$this->ci->db
			->where('external_id', $offer->Ид . "")
			->update($this->product_variants_table, $data);
		}
	}

	/**
	 * uses SWatermark class to carry out image resize and adding watermark
	 */
	private function startImagesResize() {
		\MediaManager\Image::create()
		->resizeByName($this->shop_images)
		->resizeByIdAdditional(array_unique($this->shop_additionals_images));
	}

	/**
	 * checkauth for orders import
	 */
	private function command_sale_checkauth() {
		if ($this->config['usepassword'] == 'on') {
			$this->check_password();
		} else {
			$this->checkauth();
		}
		exit();
	}

	/**
	 * returns exchange settings to 1c
	 * @zip no
	 * @file_limit in bytes
	 */
	private function command_sale_init() {
		if ($this->check_perm() === true) {
			$this->command_catalog_init();
		}
		exit();
	}

	/**
	 * saving xml files with orders from 1c
	 * and runs orders import
	 */
	private function command_sale_file() {
		if ($this->check_perm() === true) {
			$this->load->helper('file');
			if (write_file($this->tempDir . $_GET['filename'], file_get_contents('php://input'), 'a+'))
				echo "success";
			$this->command_sale_import();
		}
		exit();
	}

	/**
	 * procced orders import
	 * @return string
	 */
	private function command_sale_import() {
		if ($this->check_perm() === true) {
			$this->xml = $this->_readXmlFile($_GET['filename']);
			if (!$this->xml)
				return "failure";
			foreach ($this->xml->Документ as $order) {
				$model = SOrdersQuery::create()->findOneById($order->Номер);
				if ($model) {
					$model->setExternalId($order->Ид);
					$usr = SUserProfileQuery::create()->findByUserExternalId($order->Контрагенты->Контрагент->Ид);
					if (!$usr) {
						$usr->setUserExternalId($order->Контрагенты->Контрагент->Ид);
					}
					$model->setTotalPrice($order->Сумма);
					$model->setDateUpdated(date('U'));
					foreach ($order->ЗначенияРеквизитов->ЗначениеРеквизита as $item) {
						//echo $item->Наименование;
						if ($item->Наименование == 'ПометкаУдаления') {
							if ($item->Значение == true) {
								$model->setStatus(1);
							}
						}
						if ($item->Наименование . "" == 'Проведен') {
							if ($item->Значение == true) {
								$model->setStatus(10);
							}
						}
						if ($item->Наименование . "" == 'Дата оплаты по 1С') {
							if (strtotime($item->Значение)) {
								if ($item->Значение . "" != "Т") {
									$model->setPaid(1);
									echo "success</br>";
								}
							}
						}
						/* if ($item->Наименование == 'Номер отгрузки по 1С') {
						 $model->setStatus(3);
						} */
					}
					$model->save();
				} else {
					echo "fail. order not found";
				}
			}
			if (!$this->config[debug])
				rename($this->tempDir . $_GET['filename'], $this->tempDir . "success_" . $_GET['filename']);
		}
		exit();
	}

	/**
	 * runs when orders from site succesfully uploaded to 1c server
	 * and sets some status for imported orders "waiting" for example
	 */
	private function command_sale_success() {
		if ($this->check_perm() === true) {
			$model = SOrdersQuery::create()->findByStatus($this->config['userstatuses']);
			foreach ($model as $order) {
				$order->SetStatus($this->config['userstatuses_after']);
				$order->save();
			}
		}
		exit();
	}

	/**
	 * creating xml document with orders to make possible for 1c to grab it
	 */
	private function command_sale_query() {
		if ($this->check_perm() === true) {
			$model = SOrdersQuery::create()->findByStatus($this->config['userstatuses']);
			header('content-type: text/xml');
			$xml_order .= "<?xml version='1.0' encoding='UTF-8'?>" . "\n" .
					"<КоммерческаяИнформация ВерсияСхемы='2.03' ДатаФормирования='" . date('Y-m-d') . "'>" . "\n";
			foreach ($model as $order) {
				if ($order->user_id != Null) {
					$user_prof = SUserProfileQuery::create()->findById($order->user_id);
					if ($user_prof->user_external_id != '')
						$ext_id = $row['external_id'];
				}
				$xml_order.="<Документ>\n" .
						"<Ид>" . $order->Id . "</Ид>\n" .
						"<Номер>" . $order->Id . "</Номер>\n" .
						"<Дата>" . date('Y-m-d', $order->date_created) . "</Дата>\n" .
						"<ХозОперация>Заказ товара</ХозОперация>\n" .
						"<Роль>Продавец</Роль>\n" .
						"<Валюта>" . ShopCore::app()->SCurrencyHelper->main->getCode() . "</Валюта>\n" .
						"<Курс>1</Курс>\n" .
						"<Сумма>" . $order->totalprice . "</Сумма>\n" .
						"<Контрагенты>\n" .
						"<Контрагент>\n" .
						"<Ид>" . $ext_id . "</Ид>\n" .
						"<Наименование>" . $order->UserFullName . "</Наименование>\n" .
						"<Роль>Покупатель</Роль>" .
						"<ПолноеНаименование>" . $order->UserFullName . "</ПолноеНаименование>\n" .
						"<Фамилия>" . $order->UserFullName . "</Фамилия>" .
						"<Имя>" . $order->UserFullName . "</Имя>" .
						"<АдресРегистрации>" .
						"<Представление>" . $order->user_deliver_to . "</Представление>" .
						"<Комментарий></Комментарий>"
						. "</АдресРегистрации>" .
						"<Контакты>" .
						"<Контакт>" .
						"<Тип>ТелефонРабочий</Тип>" .
						"<Значение>" . $order->user_phone . "</Значение>" .
						"<Комментарий></Комментарий>" .
						"</Контакт>" .
						"<Контакт>" .
						"<Тип>Почта</Тип>" .
						"<Значение>" . $order->user_email . "</Значение>" .
						"<Комментарий>Пользовательская почта</Комментарий>" .
						"</Контакт>" .
						"</Контакты>" .
						"</Контрагент>\n" .
						"</Контрагенты>\n" .
						"<Время>" . date('G:i:s', $order->date_created) . "</Время>\n" .
						"<Комментарий>" . $order->user_comment . "</Комментарий>\n" .
						"<Товары>\n";
				$ordered_products = SOrderProductsQuery::create()->findByOrderId($order->Id);
				if ($order->deliverymethod != null) {
					$xml_order .= "<Товар>\n" .
							"<Ид>ORDER_DELIVERY</Ид>\n" .
							"<Наименование>Доставка заказа</Наименование>\n" .
							'<БазоваяЕдиница Код="796" НаименованиеПолное="Штука" МеждународноеСокращение="PCE">шт</БазоваяЕдиница>' . "\n" .
							"<ЦенаЗаЕдиницу>" . $order->deliveryprice . "</ЦенаЗаЕдиницу>\n" .
							"<Количество>1</Количество>\n" .
							"<Сумма>" . $order->deliveryprice . "</Сумма>\n" .
							"<ЗначенияРеквизитов>\n" .
							"<ЗначениеРеквизита>\n" .
							"<Наименование>ВидНоменклатуры</Наименование>\n" .
							"<Значение>Услуга</Значение>\n" .
							"</ЗначениеРеквизита>\n" .
							"<ЗначениеРеквизита>\n" .
							"<Наименование>ТипНоменклатуры</Наименование>\n" .
							"<Значение>Услуга</Значение>\n" .
							"</ЗначениеРеквизита>\n" .
							"</ЗначенияРеквизитов>\n" .
							"</Товар>\n";
				}
				foreach ($ordered_products as $product) {
					$category = get_product_category($product->product_id);

					$xml_order .= "<Товар>\n" .
							"<Ид>" . $this->prod[$product->product_id] . "</Ид>\n" .
							"<ИдКаталога>{$category['external_id']}</ИдКаталога>\n" .
							"<Наименование>" . ShopCore::encode($product->product_name) . "</Наименование>\n" .
							'<БазоваяЕдиница Код="796" НаименованиеПолное="Штука" МеждународноеСокращение="PCE">шт</БазоваяЕдиница>' . "\n" .
							"<ЦенаЗаЕдиницу>" . $product->price . "</ЦенаЗаЕдиницу>\n" .
							"<Количество>$product->quantity</Количество>\n" .
							"<Сумма>" . ($product->price) * ($product->quantity) . "</Сумма>\n" .
							"<ЗначенияРеквизитов>\n" .
							"<ЗначениеРеквизита>\n" .
							"<Наименование>ВидНоменклатуры</Наименование>\n" .
							"<Значение>Товар</Значение>\n" .
							"</ЗначениеРеквизита>\n" .
							"<ЗначениеРеквизита>\n" .
							"<Наименование>ТипНоменклатуры</Наименование>\n" .
							"<Значение>Товар</Значение>\n" .
							"</ЗначениеРеквизита>\n" .
							"</ЗначенияРеквизитов>\n" .
							"</Товар>\n";
				}
				$xml_order .= "</Товары>\n";
				if ($order->paid == 0) {
					$paid_status = 'false';
				} else {
					$paid_status = 'true';
				}
				$status = SOrders::getStatusName('Id', $order->getStatus());
				$xml_order .= "<ЗначенияРеквизитов>\n" .
						"<ЗначениеРеквизита>\n" .
						"<Наименование>Метод оплаты</Наименование>\n" .
						"<Значение>" . $order->getpaymentMethodName() . "</Значение>\n" .
						"</ЗначениеРеквизита>\n" .
						"<ЗначениеРеквизита>\n" .
						"<Наименование>Заказ оплачен</Наименование>\n" .
						"<Значение>" . $paid_status . "</Значение>\n" .
						"</ЗначениеРеквизита>\n" .
						"<ЗначениеРеквизита>\n" .
						"<Наименование>Доставка разрешена</Наименование>\n" .
						"<Значение>true</Значение>\n" .
						"</ЗначениеРеквизита>\n" .
						"<ЗначениеРеквизита>\n" .
						"<Наименование>Отменен</Наименование>\n" .
						"<Значение>false</Значение>\n" .
						"</ЗначениеРеквизита>\n" .
						"<ЗначениеРеквизита>\n" .
						"<Наименование>Финальный статус</Наименование>\n" .
						"<Значение>false</Значение>\n" .
						"</ЗначениеРеквизита>\n" .
						"<ЗначениеРеквизита>\n" .
						"<Наименование>Статус заказа</Наименование>\n" .
						"<Значение>" . $status . "</Значение>\n" .
						"</ЗначениеРеквизита>\n" .
						"<ЗначениеРеквизита>\n" .
						"<Наименование>Дата изменения статуса</Наименование>\n" .
						"<Значение>" . date('Y-m-d H:i:s', $order->date_updated) . "</Значение>\n" .
						"</ЗначениеРеквизита>\n" .
						"</ЗначенияРеквизитов>\n";
				$xml_order .= "</Документ>\n";
			}
			$xml_order .= "</КоммерческаяИнформация>";
			echo $xml_order;
		}
		exit();
	}

}

/* End of file exchange.php */
