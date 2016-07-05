<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * Pincode 測試 api
 */
class Pincode_api extends REST_Controller {

    
    function __construct(){
        parent::__construct();

        if( IS_ONLINE){
            die('dev env only');
        }
    }  
    
    /**
     * 產生 Pincode
     */
    public function gen_pincode_post(){
        $com_id = $this->post('com_id');
        $uid = $this->post('user_id');
        $alive = $this->post('alive');
        $size = $this->post('size');
        
        include_once APPPATH.'libraries/Pincode_lib.php';
        $pincode_obj = new pincode_lib();
        
        echo 'Gen Pincode and save to DB:';
        echo $pincode = $pincode_obj->get($com_id, $uid, 'test', $alive, $size);
    }
    
    /**
     * 驗證 Pincode
     */
    public function vali_pincode_post(){
        $com_id = $this->post('com_id');
        $uid = $this->post('user_id');
        $pincode = $this->post('pincode');
        
        include_once APPPATH.'libraries/Pincode_lib.php';
        $pincode_obj = new pincode_lib();
                
        echo PHP_EOL.'Validation pincode:';
        echo $pincode_obj->vali($com_id, $uid, 'test', $pincode) ? 'Success' : 'Failed';        
    }
    
    /**
     * 清除舊驗證碼
     */
    public function clear_old_post(){
        $over_days = $this->post('over_days');
        
        include_once APPPATH.'libraries/Pincode_lib.php';
        $pincode_obj = new pincode_lib();
        
        echo 'Total clear number:';
        echo $pincode_obj->clear($over_days);
    }
}
