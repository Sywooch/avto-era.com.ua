<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
//error_reporting(E_ALL);
/**
 * Update products
 * Avtoera Module Admin
 */
class Admin extends BaseAdminController {
    public function __construct() {
        parent::__construct();
//         $this->load->language('email');
//         $this->email = \cmsemail\email::getInstance();
//         $lang = new MY_Lang();
//         $lang->load('cmsemail');
    }

    public function index() {
    	//throw new RuntimeException('Invalid parameters.');
        \CMSFactory\assetManager::create()
                ->setData('models', array())
                ->renderAdmin('settings');
    }

    public function settings() {
//         \CMSFactory\assetManager::create()
//                 ->registerScript('email', TRUE)
//                 ->registerStyle('style')
//                 ->setData('settings', $this->email->getSettings())
//                 ->renderAdmin('settings');
    }
    
 	/**
     * Update tires and makeImport settings from POST
     * @param $_POST
     * @author vzelenivskyi <mymyhighlight@gmail.com>
     */
    public function update_products() {
    	// Undefined | Multiple Files | $_FILES Corruption Attack
    	// If this request falls under any of them, treat it invalid.
    	if (
    			!isset($_FILES['upfile']['error']) ||
    			is_array($_FILES['upfile']['error'])
    	) {
    		throw new RuntimeException('Invalid parameters.');
    	}
    	
    	// Check $_FILES['upfile']['error'] value.
    	switch ($_FILES['upfile']['error']) {
    		case UPLOAD_ERR_OK:
    			break;
    		case UPLOAD_ERR_NO_FILE:
    			throw new RuntimeException('No file sent.');
    		case UPLOAD_ERR_INI_SIZE:
    		case UPLOAD_ERR_FORM_SIZE:
    			throw new RuntimeException('Exceeded filesize limit.');
    		default:
    			throw new RuntimeException('Unknown errors.');
    	}
    	
    	// You should also check filesize here.
    	if ($_FILES['upfile']['size'] > 100000000) {
    		throw new RuntimeException('Exceeded filesize limit.');
    	}
    	
//     	// DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
//     	// Check MIME Type by yourself.
//     	$finfo = new finfo(FILEINFO_MIME_TYPE);
//     	if (false === $ext = array_search(
//     			$finfo->file($_FILES['upfile']['tmp_name']),
//     			array(
//     					'jpg' => 'image/jpeg',
//     					'png' => 'image/png',
//     					'gif' => 'image/gif',
//     			),
//     			true
//     	)) {
//     		throw new RuntimeException('Invalid file format.');
//     	}

    	// You should name it uniquely.
    	// DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
    	// On this example, obtain safe unique name from its binary data.
    	if (!move_uploaded_file(
    			$_FILES['upfile']['tmp_name'],
    			sprintf('./uploads/%s.%s',
    					sha1_file($_FILES['upfile']['userfile']),
    					$ext
    			)
    	)) {
    		throw new RuntimeException('Failed to move uploaded file.');
    	}
    	
        $result = array_map('trim', $_POST);
		var_dump($result);
		var_dump($_FILES);
		
// 		showMessage(lang('Settings are saved', 'socauth'));
// 		pjax($_SERVER[HTTP_REFERER]);
		
		
		
		
		
//         /** Save input data */
//         $this->db
//                 ->where('identif', 'socauth')
//                 ->update('components', array('settings' => serialize($result)));

//         showMessage(lang('Settings are saved', 'socauth'));
//         pjax($_SERVER[HTTP_REFERER]);
    }

    public function create() {
//         if ($_POST) {
//             if ($this->email->create()) {

//                 showMessage(lang('Template created', 'cms_email'));

//                 if ($this->input->post('action') == 'save')
//                     pjax('/admin/components/cp/cmsemail/index');
//             }
//             else {
//                 showMessage($this->email->errors, '', 'r');
//             }
//         }
//         else
//             \CMSFactory\assetManager::create()
//                     ->registerScript('email', TRUE)
//                     ->setData('settings', $this->email->getSettings())
//                     ->renderAdmin('create');
    }

    public function mailTest($config) {
//         lang('email_sent', 'admin');
//         echo $this->email->mailTest();
    }

    public function delete() {
//         $this->email->delete($_POST['ids']);
    }

    public function edit($id, $locale = null) {
//         if(null === $locale)
//             $locale = chose_language();
        
//         $model = $this->email->getTemplateById($id, $locale);
        
//         if(!$model){
//             $this->load->module('core');
//             $this->core->error_404();
//             exit;
//         }
//         $variables = unserialize($model['variables']);

//         if ($_POST) {
//             if ($this->email->edit($id, array(), $locale)) {
//                 showMessage(lang('Template edited', 'cmsemail'));

//                 if ($this->input->post('action') == 'tomain')
//                     pjax('/admin/components/cp/cmsemail/index');
//             }
//             else {
//                 showMessage($this->email->errors, '', 'r');
//             }
//         }
//         else
//             \CMSFactory\assetManager::create()
//                     ->setData('locale', $locale)
//                     ->setData('languages',  $this->db->get('languages')->result_array())
//                     ->setData('model', $model)
//                     ->setData('variables', $variables)
//                     ->registerScript('email', TRUE)
//                     ->renderAdmin('edit');
    }

    /**
     * updare settings for email
     */
    public function update_settings() {
//         if ($_POST) {
//             $this->form_validation->set_rules('settings[admin_email]', lang('Admin email', 'cmsemail'), 'required|xss_clean|valid_email');
//             $this->form_validation->set_rules('settings[from_email]', lang('Email sender', 'cmsemail'), 'required|xss_clean|valid_email');
//             $this->form_validation->set_rules('settings[from]', lang('From', 'cmsemail'), 'required|xss_clean');
//             $this->form_validation->set_rules('settings[theme]', lang('From email', 'cmsemail'), 'xss_clean|required');

//             if ($_POST['settings']['wraper_activ'])
//                 $this->form_validation->set_rules('settings[wraper]', lang('Wraper', 'cmsemail'), 'required|xss_clean|callback_wraper_check');
//             else
//                 $this->form_validation->set_rules('settings[wraper]', lang('Wraper', 'cmsemail'), 'xss_clean');

//             if ($this->form_validation->run($this) == FALSE) {
//                 showMessage(validation_errors(), lang('Message', 'cmsemail'), 'r');
//             } else {
//                 if ($this->email->setSettings($_POST['settings']))
//                     showMessage(lang('Settings saved', 'cmsemail'), lang('Message', 'cmsemail'));
//             }

//             $this->cache->delete_all();
//         }
    }

    /**
     * import templates from file
     */
    public function import_templates(){
//         $this->db->where_in('id', array(1,2,3,4,5,6,7))->delete('mod_email_paterns');
//         $file = $this->load->file(dirname(__FILE__) . '/models/paterns.sql', true);
//         $this->db->query($file);
//         $file = $this->load->file(dirname(__FILE__) . '/models/patterns_i18n.sql', true);
//         $this->db->query($file);
//         redirect('/admin/components/cp/cmsemail/');
        
    }

}