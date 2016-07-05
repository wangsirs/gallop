<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * Phone 測試 api
 */
class Phone_api extends REST_Controller {

    
    function __construct(){
        parent::__construct();

        if( IS_ONLINE){
            die('dev env only');
        }
    }  
    
    /**
     * 簡訊測試
     */
    public function sms_post(){
        $to = $this->post('to');
        $msg = $this->post('msg');
        $from = $this->post('from');
        
        $this->load->library('phone_lib');
        echo '<pre>';
        var_dump($this->phone_lib->sms($to, $msg, $from));
        echo '</pre>';
    }
}
