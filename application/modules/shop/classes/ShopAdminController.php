<?php

/**
 * ShopAdminController
 *
 * @uses Controller
 * @package
 * @version $id$
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net>
 * @license
 */
class ShopAdminController extends MY_Controller {

    public $baseAdminUrl = '/admin/components/run/shop/';
    public $shopThemeUrl = '/application/modules/shop/admin/templates/assets/';
    public $pjaxRequest = false;

    public function __construct() {
        parent::__construct();

        $lang = new MY_Lang();
        $lang->load('admin');

        if (isset($_SERVER['HTTP_X_PJAX']) && $_SERVER['HTTP_X_PJAX'] == true) {
            $this->pjaxRequest = true;
            header('X-PJAX: true');
        }

        Permitions::checkPermitions();
        $this->autoloadModules();
        // Don't apply discounts in admin part.
        ShopCore::$SHOP_APPLY_DISCOUNTS = false;

        // Init main currency as default.
        ShopCore::app()->SCurrencyHelper->initCurrentCurrency('main');
        $this->template->add_array(array(
            'ADMIN_URL' => $this->baseAdminUrl,
            'SHOP_THEME' => $this->shopThemeUrl,
            'CS' => ShopCore::app()->SCurrencyHelper->getSymbol(),
            'Controller' => $this,
        ));
    }

    /**
     * Display rendered template file.
     *
     * @param string $viewName name of template file to display.
     * @param array $data template data
     * @access public
     * @return string if $return is set to true
     */
    public function render($viewName, array $data = array(), $return = false) {
        if (!empty($data))
            $this->template->add_array($data);
        //assign translatable field marker
        if (count(ShopCore::$ci->cms_admin->get_langs(true)) > 1) {
            $this->template->assign('translatable', '<i class="icon-flag" data-title="' . lang('Translated field', 'main') . '"data-rel="tooltip"></i>');
            $this->template->assign('translatable_w', '<i class="icon-flag icon-white" data-title="' . lang('Translated field', 'main') . '"data-rel="tooltip"></i>');
        }

        if ($this->pjaxRequest)
            echo $this->template->fetch('file:' . $this->getViewFullPath($viewName));
        else
        //$this->template->show('file:' . $this->getViewFullPath($viewName));


        if ($return === false)
            $this->template->show('file:' . $this->getViewFullPath($viewName));
        else
            return $this->template->fetch('file:' . $this->getViewFullPath($viewName));
        //echo ShopCore::app()->SPropelLogger->displayAsTable();
    }

    /**
     * Create full path to template file based on class name and view file name.
     *
     * @param string $viewName
     * @access public
     * @return string
     */
    public function getViewFullPath($viewName) {
        // Remove "ShopAdmin" from controller name
        $controllerName = str_replace('ShopAdmin', '', get_class($this));

        // Make first charater lowercase
        $controllerName{0} = strtolower($controllerName{0});

        switch (substr($_SERVER['SERVER_ADDR'], 0, strrpos($_SERVER['SERVER_ADDR'], '.'))) {
            case '127.0.0':
            case '127.0.1':
            case '10.0.0':
            case '172.16.0':
            case '192.168.0':
                $on_local = true;
                break;
        }

        if ($on_local !== true || (strtolower(end(explode('.', $_SERVER[HTTP_HOST])) !== 'loc'))) {

            $msg = base64_decode('PGRpdiBpZD0ibm90aWNlX2Vycm9yIj7QntGI0LjQsdC60LAg0L/RgNC+0LLQtdGA0LrQuCDQu9C40YbQtdC90LfQuNC4LjwvZGl2Pg==');
            $msgTest = base64_decode('0KHRgtGA0L7QuiDRgtC10YHRgtC+0LLQvtC5INC70LjRhtC10L3Qt9C40Lgg0LjRgdGC0LXQug==');

            $flPath = realpath(dirname(__FILE__) . '/../' . implode('', array_map('chr', array(108, 105, 99, 101, 110, 115, 101, 46, 107, 101, 121))));
            $flTestPath = realpath(dirname(__FILE__) . '/../' . str_replace('www.', '', $_SERVER[HTTP_HOST]) . '.key');

            if (!$this->ajaxRequest) {
                $this->template->assign('content', $msg);
                $this->template->assign('content', $msgTest);
                $msg = $this->template->fetch('main');
                $msgTest = $this->template->fetch('main');
            }

            if (!file_exists($flPath))
                if (!file_exists($flTestPath))
                    die($msg);

            if (file_exists($flTestPath)) {
                $time = file_get_contents($flTestPath);
                $time = explode('0xD', $time);
                $time = array_map('chr', $time);
                $time = array_reverse($time);

                for ($i = 0; $i < 10; $i++) {
                    $a .= $time[$i + 120];
                }
                $a = str_replace(array('q', 'w', 'e', 'r', 't', 'b', 'v', 's', 'd', '"'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0), $a);

                if ((int) $a > time()) {
                    $test = TRUE;
                } else {
                    die($msgTest);
                }
            }
            if (IMAGECMS_NUMBER == '4.5.1 Premium')
                $domain = sha1(str_replace('www.', '', $_SERVER['HTTP_HOST']));
            elseif (IMAGECMS_NUMBER == '4.5.1 Professional')
                $domain = md5(str_replace('www.', '', $_SERVER['HTTP_HOST']));
            elseif (!$test)
                die($msg);
//            else
//                die($msg);

            if (!$test) {

                $chars = array();

                for ($i = 0; $i < strlen($domain); $i++)
                    array_push($chars, $domain{$i});

                $chars = array_map('ord', $chars);
                $chars = array_map('base64_encode', $chars);
                $chars = array_reverse($chars);
                $result = implode('0xD', $chars);

                $key = trim(file_get_contents($flPath));

                if ($result != $key)
                    die($msg);
            }
        }

        // Create full path to template file
        $ext = '';
        if (strpos($viewName, '.tpl'))
            $ext = '.tpl';

        return SHOP_DIR . 'admin' . DS . 'templates' . DS . $controllerName . DS . $viewName . $ext;
    }

    /**
     * Create url to admin controller.
     *
     * Example: $this->createUrl('categories/edit',array('id'=>10)), will return
     * /admin/components/run/shop/categories/edit/10
     *
     * @param string $url
     * @param array $args
     * @access public
     * @return string
     */
    public function createUrl($url, array $args = array()) {
        $url = $this->baseAdminUrl . $url;

        if (!empty($args))
            $url.='/' . implode('/', $args);

        return $url;
    }

    /**
     * Show 404 page
     *
     * @param string $message Error message
     *
     * @access public
     */
    public function error404($message) {
        $this->template->assign('message', $message);
        $this->template->show('404');
        exit;
    }

    /**
     * Update admin html block
     *
     * @param string $url
     * @access public
     */
    public function ajaxShopDiv($url, $div = false) {
        if (!$div) {
            echo '
		<script type="text/javascript">
			ajaxShop("' . $url . '");
		</script>
		';
        } else {
            echo '
		<script type="text/javascript">
			ajaxShopDiv("' . $url . '");
		</script>
		';
        }
    }

    private function autoloadModules() {
        /** Search module with autoload */
        $query = $this->db
                ->select('name')
                ->where('autoload', 1)
                ->get('components');

        if ($query) {
            $moduleName = null;
            /** Run all Admin autoload method */
            foreach ($query->result_array() as $module) {
                $moduleName = $module['name'];
                Modules::load_file($moduleName, APPPATH . 'modules' . DIRECTORY_SEPARATOR . $moduleName . DIRECTORY_SEPARATOR);
                $moduleName = ucfirst($moduleName);
                if (class_exists($moduleName)) {

                    if (method_exists($moduleName, 'adminAutoload')) {
                        $moduleName::adminAutoload();
                     //   self::$detect_load_admin[$moduleName] = 1;
                    }

                }
            }
        }
    }

}