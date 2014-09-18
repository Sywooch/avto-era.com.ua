<?php

namespace ImportCSV;

use ImportCSV\CategoryImport as CategoriesHandler;
use ImportCSV\ProductsImport as ProductsHandler;
use ImportCSV\PropertiesImport as PropertiesHandler;

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * @property Core $core
 * @property CI_DB_active_record $db
 */
class BaseImport extends \CI_Model {

    protected static $_instance;
    public $currency = 2;
    public $encoding = 'utf-8';
    public $languages = 'ru';
    public $CSVsource = '';
    public $delimiter = ";";
    public $enclosure = '"';
    public $importType = '';
    public $attributes = "";
    public $maxRowLength = 10000;
    public $content = array();
    public $settings = array();
    public $possibleAttributes = array();
    public $exportSuccessfulHandler;

    public function __construct() {
        parent::__construct();
    }

    /**
     * Start CSV Import
     * @return bool
     * @access public
     * @author Kaero
     * @copyright ImageCMS (c) 2012, Kaero <dev@imagecms.net>
     */
    public function makeImport() {
        $this->makeAttributesList();
        $this->validateAndParse();
//        $this->makeDBBackup();
        CategoriesHandler::loadCategories();
        ProductsHandler::create()->make();
        PropertiesHandler::runProperties();
        if (ImportBootstrap::noErrors())
            ImportBootstrap::create()->addMessage(Factor::SuccessImportCompleted . '<b>' . count($this->content) . '</b>', Factor::MessageTypeSuccess);
        else
            return FALSE;
    }

    /**
     * Validate Information and parse CSV. As a goal we have $content variable with file information.
     * @return bool
     * @access private
     * @author Kaero
     * @copyright ImageCMS (c) 2012, Kaero <dev@imagecms.net>
     */
    private function validateAndParse() {

        if (substr(sprintf('%o', fileperms(ImportBootstrap::getUploadDir())), -4) != '0777') {
            ImportBootstrap::addMessage(Factor::ErrorFolderPermission);
            return FALSE;
        }
        if (!$file = @fopen($this->CSVsource, 'r')) {
            ImportBootstrap::addMessage(Factor::ErrorFileReadError);
            return FALSE;
        }

        $row = fgetcsv($file, $this->maxRowLegth, $this->delimiter, $this->enclosure);
        if (!in_array('cat', $row)) {
            ImportBootstrap::addMessage(Factor::ErrorCategoryAttribute);
            return FALSE;
        }
        if (!in_array('num', $row) && $this->importType == Factor::ImportProducts) {
            ImportBootstrap::addMessage(Factor::ErrorNumberAttribute);
            return FALSE;
        }
        if ((count($this->possibleAttributes) - count(array_diff($this->possibleAttributes, $row))) == count($this->attributes))
            $this->attributes = $row;
        elseif (count($row) === count($this->attributes))
            rewind($file);
        else {
            ImportBootstrap::addMessage(Factor::ErrorPossibleAttrValues);
            return FALSE;
        }
        while (($row = fgetcsv($file, $this->maxRowLegth, $this->delimiter, $this->enclosure)) !== false)
            $this->content[] = array_combine($this->attributes, array_map('trim', $row));
        fclose($file);
        return TRUE;
    }

    /**
     * Set Import Type. Must be setted before import start.
     * @return BaseImport
     * @access public
     * @author Kaero
     * @copyright ImageCMS (c) 2012, Kaero <dev@imagecms.net>
     */
    public function setImportType($type) {
        $this->importType = $type;
        return $this;
    }

    /**
     * Set Import Settings. Must be setted before import start.
     * @return BaseImport
     * @access public
     * @author Kaero
     * @copyright ImageCMS (c) 2012, Kaero <dev@imagecms.net>
     */
    public function setSettings($settings) {
        $this->settings = $settings;
        $this->attributes = array_diff(explode(',', $this->settings['attributes']), array(null));
        return $this;
    }

    /**
     * Set Import file name. Must be setted before import start.
     * @return BaseImport
     * @access public
     * @author Kaero
     * @copyright ImageCMS (c) 2012, Kaero <dev@imagecms.net>
     */
    public function setFileName($fileName) {
        try {
            if (FALSE === file_exists($fileName))
                throw new \Exception(\ImportCSV\Factor::ErrorEmptySlot);
            $this->CSVsource = $fileName;
            return $this;
        } catch (\Exception $exc) {
            $result[Factor::MessageTypeSuccess] = FALSE;
            $result[Factor::MessageTypeError] = FALSE;
            $result['message'] = $exc->getMessage();
            echo json_encode($result);
            exit();
        }
    }

    /**
     * BaseImport Singleton
     * @return BaseImport
     * @access public
     * @author Kaero
     * @copyright ImageCMS (c) 2012, Kaero <dev@imagecms.net>
     */
    public static function create() {
        (null !== self::$_instance) OR self::$_instance = new self();
        return self::$_instance;
    }

    /**
     * Get attributes list.
     * @return BaseImport
     * @access public
     * @author Kaero
     * @copyright ImageCMS (c) 2012, Kaero <dev@imagecms.net>
     */
    public function makeAttributesList() {
        if (!count($this->possibleAttributes)) {
            $this->possibleAttributes = array(
                'skip' => 'Пропустить колонку',
                'name' => 'Имя товара',
                'url' => 'URL',
                'prc' => 'Цена',
                'oldprc' => 'Старая Цена',
                'stk' => 'Количество',
                'num' => 'Артикул',
                'var' => 'Имя варианта',
                'act' => 'Активен',
                'hit' => 'Хит',
                'brd' => 'Бренд',
                'cat' => 'Категория',
                'relp' => 'Связанные товары',
//                'mimg' => 'Основное изображение',
                'vimg' => 'Основное изображение варианта',
//                'vsimg' => 'Маленькое изображение варианта',
                'cur' => 'Валюта',
//                'modim' => 'Основное изображение дополнительное',
//                'simg' => 'Маленькое изображение',
//                'modis' => 'Маленькое изображение дополнительное',
                'imgs' => 'Дополнительные изображения',
                'shdesc' => 'Краткое описание',
                'desc' => 'Полное описание',
                'mett' => 'Meta Title',
                'metd' => 'Meta Description',
                'metk' => 'Meta Keywords');

            $properties = $this->db->query('
                SELECT shop_product_properties.id, shop_product_properties.csv_name, shop_product_properties_i18n.name
                FROM `shop_product_properties`
                LEFT OUTER JOIN `shop_product_properties_i18n` ON shop_product_properties.id = shop_product_properties_i18n.id
                WHERE `csv_name` != "" AND shop_product_properties_i18n.locale = ?
                ', $this->languages)->result();
            $this->possibleAttributes = array_flip($this->possibleAttributes);
            foreach ($properties as $property)
                $this->possibleAttributes[$property->name] = $property->csv_name;
        }
        return $this;
    }

    /**
     * Make DB Backup file before start Import. Destination folder is "./application/backups"
     * @todo Remove first row in method before public to production
     * @return bool
     * @author Kaero
     * @copyright ImageCMS (c) 2012, Kaero <dev@imagecms.net>
     */
    protected function makeDBBackup() {
        if (ImportBootstrap::hasErrors())
            return FALSE;
        if (is_really_writable(ImportBootstrap::getUploadDir())) {
            \libraries\Backup::create()->createBackup("zip", "import");
        }
    }

}

