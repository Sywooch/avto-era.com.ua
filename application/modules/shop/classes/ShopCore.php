<?php

/**
 * ShopCore class file
 *
 * @package Shop
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net>
 */
define('PropelDebugMode', TRUE);
defined('SHOP_DIR') OR define('SHOP_DIR', PUBPATH . 'application/modules/shop/');
defined('DS') OR define('DS', '/');

class ShopCore {

    private static $_initialized = null;
    private static $_imports = array();
    private static $_includePaths = array();
    protected static $_componentsClass;
    public static $_GET = array();
    public static $template_path = null;
    public static $currentCategory = null;
    public static $ci = null; // CI instance
    public static $SHOP_APPLY_DISCOUNTS = true;
    public static $imagesUploadPath = null;

//    public static $currentLocale = null;

    /**
     * Replacement of php __autoload magic method.
     *
     * @param string $className
     * @access public
     */
    public static function autoload($className) {
        if (self::$_initialized === null) {
            self::$_initialized = true;
            self::$ci = & get_instance();

            // Load components class container.
            class_exists('ShopComponents', true);
            self::$_componentsClass = new ShopComponents();

            // Load shop helper
            //require realpath(dirname(__FILE__).'/../helpers/shop_helper'.EXT);
            require SHOP_DIR . 'helpers/shop_helper' . EXT;

            self::init();
        }

        // Full path to class file
        $classFullPath = SHOP_DIR . 'classes/' . $className . EXT;

        if (file_exists($classFullPath)) {
            include($classFullPath);
            self::$_imports[$className] = true;
        }
    }

    /**
     * Load main components like Propel, Config, etc...
     *
     * @access public
     */
    public static function init() {
        require_once SHOP_DIR . 'classes/propel/Propel.php';

        // Set images upload path
        self::$imagesUploadPath = PUBPATH . 'uploads/shop/';

        // Initialize Propel with the runtime configuration from an array based on
        // main database configuration.
        // Custom connection settings from propel conf dir.
        // Example: Propel::init(SHOP_DIR."models/build/conf/Shop-conf.php");
        $conf = array(
            'datasources' =>
            array(
                'Shop' =>
                array(
                    'adapter' => 'mysql',
                    'connection' =>
                    array(
                        'dsn' => 'mysql:host=' . self::$ci->db->hostname . ';dbname=' . self::$ci->db->database,
                        'user' => self::$ci->db->username,
                        'password' => self::$ci->db->password,
                        'settings' =>
                        array(
                            'charset' =>
                            array(
                                'value' => 'utf8',
                            ),
                        ),
                    ),
                ),
                'default' => 'Shop',
            ),
            'log' =>
            array(
            //'type' => 'file',
            //'name' => SHOP_DIR.'models/propel.log',
            //'ident' => 'propel',
            //'level' => '7',
            //'conf' => '',
            ),
            'generator_version' => '1.6.5-dev',
            'classmap' => include(SHOP_DIR . 'models' . DS . 'build' . DS . 'conf' . DS . 'classmap-Shop-conf' . EXT),
        );

        if (PropelDebugMode === TRUE) {
            $conf['datasources']['Shop']['connection']['classname'] = 'DebugPDO';
            $logger = ShopCore::app()->SPropelLogger; // Load logger class.
            Propel::setLogger($logger);
        }

        // Set propel configuration
        Propel::setConfiguration($conf);
        Propel::initialize();

        if (PropelDebugMode === true) {
            $config = Propel::getConfiguration(PropelConfiguration::TYPE_OBJECT);
            $config->setParameter('debugpdo.logging.details.method.enabled', true);
            $config->setParameter('debugpdo.logging.details.time.enabled', true);
            $config->setParameter('debugpdo.logging.details.mem.enabled', true);
        }

        self::$_GET = self::$ci->input->get(NULL, TRUE);

        // Add the generated 'classes' directory to the include path
        set_include_path(SHOP_DIR . "models/build/classes/" . PATH_SEPARATOR . get_include_path());
    }

    public static function initEnviroment() {
        $ci = &get_instance();
        $path = ShopCore::app()->SSettings->systemTemplatePath;
        if (isset($_SESSION['freferer'])) {
            $facebook = $ci->db->where('name', 'facebook_int')->get('shop_settings')->row();
            $facebook = unserialize($facebook->value);
            if ($facebook['use'] == 1)
                $path = "./templates/" . $facebook['template'] . "/shop/default";
        }
        if (isset($_SESSION['vreferer'])) {
            $vk = $ci->db->where('name', 'vk_int')->get('shop_settings')->row();
            $vk = unserialize($vk->value);
            if ($vk['use'] == 1)
                $path = "./templates/" . $vk['template'] . "/shop/default";
        }

        $media_path = $path;
        self::$template_path = realpath($path) . '/';

        if (count(ShopCore::app()->SCurrencyHelper->getCurrencies()) > 1 AND ShopCore::app()->SCurrencyHelper->default)
            $currentCurrency = SCurrenciesQuery::create()
                    ->filterByIsDefault(1)
                    ->findOne()
                    ->getId();

        ShopCore::app()->SCurrencyHelper->initCurrentCurrency(null);
        ShopCore::app()->SCurrencyHelper->initAdditionalCurrency($currentCurrency);
        if (substr($media_path, 0, 2) == './')
            $media_path = substr($media_path, 2);

        $nextCurrency = SCurrenciesQuery::create()
                ->filterById($currentCurrency, Criteria::NOT_EQUAL)
                ->filterByShowonsite(1)
                ->findOne();
        // Assign currency symbol.

        if ($nextCurrency) {
            $nextCurrencyName = $nextCurrency->getShowOnSite() ? $nextCurrency->Symbol : "";
        } else {
            $nextCurrencyName = '';
        }

        $ci->template->add_array(array(
            'SHOP_THEME' => media_url($media_path) . '/',
            'CS' => ShopCore::app()->SCurrencyHelper->getSymbol(),
            'NextCS' => $nextCurrencyName,
            'NextCSId' => $nextCurrency->Id,
        ));
    }

    /**
     * Load a language file
     *
     * @access	public
     * @param	string translating message
     * @param   string category front|admin
     * @param   string lang file name without category prefix and extension sufix
     * @param   array params should be raplaced in message
     * @param	string	the language (en, ru) etc.
     * @return	string
     */
    public static function t($message, $category = 'admin', $langfile = 'main', array $params = array(), $language = null) {
        $langfile = $category . '_' . $langfile;

        if ($language === null)
            $language = MY_Controller::getCurrentLocale();

        switch ($category) {
            case 'front':
                $filePath = self::$template_path;
                break;
            default:
                //TODO: translating admin messages
                return $message;
                break;
        }

        if (!in_array($langfile . EXT, self::$ci->lang->is_loaded, TRUE)) {
            ShopCore::$ci->lang->load($langfile, $language, FALSE, null, TRUE, $filePath);
        }

        //if translating doesnt exist - return original message
        $message = lang($message) ? lang($message) : $message;

        if ($params === array())
            return $message;

        if (!is_array($params))
            $params = array($params);

        foreach ($params as $key => $value) {
            $params["%$key%"] = $value;
            unset($array[$key]);
        }

        return strtr($message, $params);
    }

    /**
     *
     * @return ShopCore
     */
    public static function app() {
        return self::$_componentsClass;
    }

    public static function encode($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'utf-8');
    }

}

