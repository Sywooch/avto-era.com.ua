<?php

namespace ImportCSV;

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * @todo Delete ShopImport.php Does'nt needed anymore.
 * @property Core $core
 * @property CI_DB_active_record $db
 */
class ImportBootstrap extends Factor {

    protected $messages;
    protected static $_instance;
    public $uploadDir = './application/backups/';

    private function __construct() {

    }

    private function __clone() {

    }

    /**
     * Returns a new ImportBootstrap object.
     * @return ImportBootstrap
     * @access public static
     * @author Kaero
     * @copyright ImageCMS (c) 2012, Kaero <dev@imagecms.net>
     */
    public static function create() {
        (null !== self::$_instance) OR self::$_instance = new self();
        return self::$_instance;
    }

    /**
     * Start products import
     * @author Kaero
     * @return ImportBootstrapА
     * @copyright ImageCMS (c) 2012, Kaero <dev@imagecms.net>
     */
    public function startProcess() {
        $result = BaseImport::create()
                ->setFileName($this->getFileNameFromPost(TRUE))
                ->setSettings($this->getSettingsFromPost())
                ->setImportType(Factor::ImportProducts)
                ->makeImport();
        return $this;
    }

    public static function noErrors($type = Factor::MessageTypeError) {
        return (count(self::create()->messages[$type])) ? FALSE : TRUE;
    }

    public static function hasErrors($type = Factor::MessageTypeError) {
        return (count(self::create()->messages[$type])) ? TRUE : FALSE;
    }

    public static function addMessage($msg, $type = Factor::MessageTypeError) {
        self::create()->messages[$type][] = $msg;
        return ($type == Factor::MessageTypeError) ? FALSE : TRUE;
    }

    /**
     * @return array
     * @access public
     * @author Kaero
     * @copyright ImageCMS (c) 2012, Kaero <dev@imagecms.net>
     */
    public function resultAsArray() {
        return $this->messages;
    }

    /**
     * Implode result in a string with separator
     * @param string $separateBy String separator
     * @return array
     * @access public
     * @author Kaero
     * @copyright ImageCMS (c) 2012, Kaero <dev@imagecms.net>
     */
    public function resultAsString($separateBy = '<br/>') {
        $result[Factor::MessageTypeSuccess] = FALSE;
        $result[Factor::MessageTypeError] = FALSE;
        if (isset($this->messages[Factor::MessageTypeError])) {
            $result[Factor::MessageTypeError] = TRUE;
            $result[message] = @implode($separateBy, $this->messages[Factor::MessageTypeError]);
        } else {
            $result[Factor::MessageTypeSuccess] = TRUE;
            $result[message] = @implode($separateBy, $this->messages[Factor::MessageTypeSuccess]);
        }
        $result['report'] = $this->messages['report'];

        $result[content] = $this->messages[content];

        return $result;
    }

    /**
     * Get file name from Post
     * @return string
     * @param bool $fullPath Add full path
     * @access public
     * @author Kaero
     * @copyright ImageCMS (c) 2012, Kaero <dev@imagecms.net>
     */
    public function getFileNameFromPost($fullPath = FALSE) {
        $extension = 'csv';
        $target = 'csvfile';
        $prefix = 'product_csv';
        $posibleValues = array(1, 2, 3);
        $uploadDir = ($fullPath) ? $this->uploadDir : '';

        $fileNumber = (in_array($_POST[$target], $posibleValues)) ? intval($_POST[$target]) : 1;
        return sprintf('%s%s_%d.%s', $uploadDir, $prefix, $fileNumber, $extension);
    }

    /**
     * Get file name from Post
     * @return array()
     * @access public
     * @author Kaero
     * @copyright ImageCMS (c) 2012, Kaero <dev@imagecms.net>
     */
    public static function getSettingsFromPost() {
        return array(
            'attributes' => trim($_POST['attributes']),
            'import_type' => trim($_POST['import_type']),
            'delimiter' => trim($_POST['delimiter']),
            'enclosure' => trim($_POST['enclosure']),
            'encoding' => trim($_POST['encoding']),
            'currency' => trim($_POST['currency']),
            'languages' => trim($_POST['language']));
    }

    public static function getUploadDir() {
        return self::create()->uploadDir;
    }

    /**
     * Make DB Backup file before start Import. Destination folder is "./application/backups"
     * @todo Remove first row in method before public to production
     * @return bool
     * @author Kaero
     * @copyright ImageCMS (c) 2012, Kaero <dev@imagecms.net>
     */
    public function withBackup($forced = FALSE) {
        $this->messages['report']['DBBackuName'] = $this->messages['report']['DBBackup'] = FALSE;
        if (FALSE == $forced && !isset($_POST['withBackup']))
            return $this;
        if (is_really_writable(ImportBootstrap::getUploadDir())) {
            $CodeIgniter = &get_instance();
            \libraries\Backup::create()->createBackup("zip", "import");
            $this->messages['report']['DBBackup'] = TRUE;
            $this->messages['report']['DBBackuName'] = $backupName;
            unset($CodeIgniter);
            return $this;
        }
    }

}
