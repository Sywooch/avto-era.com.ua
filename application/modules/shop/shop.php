<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Shop Controller
 *
 * @uses ShopController
 * @package Shop
 * @version 0.1
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net>
 */
class Shop extends ShopController {

    public function __construct() {
        parent::__construct();
    }
	
	public function importComment(){
        $date_start = strtotime('1 June 2014 23:59:59');
        $date_end = strtotime('25 June 2014 23:59:59');
        
        $file = @fopen('comm.csv', 'r');
        var_dump($file); exit;
        while (($row = fgetcsv($file, 5000, '@@@', '@@@')) !== false){
            //$date_start =date($date_start + 3 * 60*60);
            $number = $row[0];
            $date = date($row[1]);
            $uN = $row[2];
            $comment = $row[3];
			//var_dumps($uN);

        $pid = $this->db->where('url',$number)->get('shop_products')->row()->id;
    //      var_dump($pid);
            
           
            if ($pid){
              $data = array(
                    'module' => 'shop',
                    'user_name' => $uN,
                    'item_id' => $pid,
                    'text' => $comment,
                    'date' => strtotime($date),
                    'agent'=> $_SERVER['HTTP_USER_AGENT'],
                    'user_ip'=> '127.0.0.1',
                );
                $this->db->insert('comments', $data);
                
            }
        }
        
    }

    /**
     * Save user callback
     *
     * @return void
     */
    public function callback() {
        $success = FALSE;
        $this->load->library('Form_validation');
        $model = new SCallbacks;
        if (!empty($_POST)) {
            $this->form_validation->set_rules($model->rules());

            if ($this->form_validation->run($this) !== FALSE) {
                $model->setThemeId(SCallbackThemesQuery::create()->orderByPosition()->findOne()->getId());
                $model->fromArray($_POST);
                $model->setDate(time());
                $model->setStatusId(SCallbackStatusesQuery::create()->filterByIsDefault(TRUE)->findOne()->getId());
                $model->save();

                if (ShopSettingsQuery::create()->filterByName('callbacksSendNotification')->findOne()->getValue() == TRUE) {
                    $info = array();
                    $info['userName'] = $model->getName();
                    $info['userPhone'] = $model->getPhone();
                    $info['dateCreated'] = $model->getDate();
                    $info['callbackStatus'] = $model->getSCallbackStatuses()->getText();
                    $info['callbackTheme'] = $model->getSCallbackThemes()->getText();
                    $info['userComment'] = $model->getComment();
                    $this->_sendMail($info);
                }
                $locale = \MY_Controller::getCurrentLocale();
                $notif = $this->db->where('locale', $locale)->where('name', 'callback')->get('answer_notifications')->row();
                $success = $notif->message;
            }
        }
        $this->render_min('callback', array('success' => $success));
    }

    public function callbackApi() {
        $success = FALSE;
        $this->load->library('Form_validation');
        $this->form_validation->set_error_delimiters(FALSE, FALSE);
        $model = new SCallbacks;
        if (!empty($_POST)) {
            $this->form_validation->set_rules($model->rules());

            if ($this->form_validation->run($this) !== FALSE) {
                $model->setThemeId(SCallbackThemesQuery::create()->orderByPosition()->findOne()->getId());
                $model->fromArray($_POST);
                $model->setDate(time());
                $model->setStatusId(SCallbackStatusesQuery::create()->filterByIsDefault(TRUE)->findOne()->getId());
                $model->save();

                if (ShopSettingsQuery::create()->filterByName('callbacksSendNotification')->findOne()->getValue() == TRUE) {
                    $info = array();
                    $info['userName'] = $model->getName();
                    $info['userPhone'] = $model->getPhone();
                    $info['dateCreated'] = $model->getDate();
                    $info['callbackStatus'] = $model->getSCallbackStatuses()->getText();
                    $info['callbackTheme'] = $model->getSCallbackThemes()->getText();
                    $info['userComment'] = $model->getComment();
                    $this->_sendMail($info);
                }
                $locale = \MY_Controller::getCurrentLocale();
                $notif = $this->db->where('locale', $locale)->where('name', 'callback')->get('answer_notifications')->row();
                $success = $notif->message;
                echo json_encode(array(
                    'msg' => $success,
                    'status' => true,
                    'close' => true,
                    'refresh' => $this->input->post('refresh') ? $this->input->post('refresh') : FALSE,
                    'redirect' => $this->input->post('redirect') ? $this->input->post('redirect') : FALSE
                ));
            } else {
                echo json_encode(array(
                    'msg' => validation_errors(),
                    'status' => false,
                    'validations' => array(
                        'Name' => form_error('Name'),
                        'Phone' => form_error('Phone'),
                        'Comment' => form_error('Comment')))
                );
            }
        } else {
            echo json_encode(array(
                'msg' => "Ошибка, не достаточно данных",
                'status' => false
            ));
        }
    }

    public function callbackBottom() {
        $success = FALSE;
        $this->load->library('Form_validation');
        $model = new SCallbacks;
        if (!empty($_POST)) {
            $this->form_validation->set_rules($model->rules());

            if ($this->form_validation->run($this) !== FALSE) {
                $model->setThemeId(SCallbackThemesQuery::create()->orderByPosition()->findOne()->getId());
                $model->fromArray($_POST);
                $model->setDate(time());
                $model->setStatusId(SCallbackStatusesQuery::create()->filterByIsDefault(TRUE)->findOne()->getId());
                $model->save();

                if (ShopSettingsQuery::create()->filterByName('callbacksSendNotification')->findOne()->getValue() == TRUE) {
                    $info = array();
                    $info['userName'] = $model->getName();
                    $info['userPhone'] = $model->getPhone();
                    $info['dateCreated'] = $model->getDate();
                    $info['callbackStatus'] = $model->getSCallbackStatuses()->getText();
                    $info['callbackTheme'] = $model->getSCallbackThemes()->getText();
                    $info['userComment'] = $model->getComment();
                    $this->_sendMail($info);
                }
                $success = ShopSettingsQuery::create()->filterByName('adminMessageCallback')->findOne()->getValue();
            }
        }
        $this->render_min('callbackBottom', array('success' => $success));
    }

    /**
     * Send new callback email notification to admin.
     *
     * @param array $callback_info
     * @return void
     */
    protected function _sendMail($info) {
        $replaceData = array(
            '%callbackStatus%' => $info['callbackStatus'],
            '%userName%' => $info['userName'],
            '%dateCreated%' => date("d-m-Y H:i:s", $info['dateCreated']),
            '%callbackTheme%' => $info['callbackTheme'],
            '%userPhone%' => $info['userPhone'],
            '%userComment%' => $info['userComment']
        );

        $replaceData = array_map('encode', $replaceData);

        $fromEmail = ShopCore::app()->SSettings->callbacksSenderEmail;
        $shopName = ShopCore::app()->SSettings->callbacksSenderName;
        $theme = ShopCore::app()->SSettings->callbacksMessageTheme;
        $message = str_replace(array_keys($replaceData), $replaceData, ShopCore::app()->SSettings->callbacksMessageText);

        $this->load->library('email');
        $config['mailtype'] = ShopCore::app()->SSettings->callbacksMessageFormat;
        $this->email->initialize($config);

        $this->email->from($fromEmail, $shopName);
        $this->email->to(ShopCore::app()->SSettings->callbacksSendEmailTo);
        $this->email->subject($theme);
        $this->email->message($message);
        $this->email->send();
    }

    /**
     * Display shop main page
     */
    public function index() {
        if ($this->uri->uri_string() === 'shop')
            redirect('/', 'location', 301);

        $this->core->set_meta_tags();

        $this->render('start_page');
    }



}

/* End of file shop.php */
