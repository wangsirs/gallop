<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * Email 測試 api
 */
class Email_api extends REST_Controller {

    
    function __construct(){
        parent::__construct();

        if( IS_ONLINE){
            die('dev env only');
        }
    }  
    
    /**
     * 測試
     */
    public function send_email_post(){
        $to = $this->post('to');
        $subject = $this->post('subject');
        $content = $this->post('content');
        
        $this->load->library('email_lib');
        echo '<pre>';
        var_dump($this->email_lib->send($to, $subject, $content, TRUE));
        echo '</pre>';
    }
}
