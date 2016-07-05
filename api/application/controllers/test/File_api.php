<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * File 測試 api
 */
class file_api extends REST_Controller {

    
    function __construct(){
        parent::__construct();

        if( IS_ONLINE){
            die('dev env only');
        }
    }  
    
    /**
     * 寫入讀出 json 測試
     */
    public function json_io_post(){
        echo '寫入：';
        echo '<pre>';
        var_dump(json_save('DEV_TEST/', 'test.json', $this->post()));
        echo '</pre>';
        
        echo '讀出：';
        echo '<pre>';
        var_dump(json_read('DEV_TEST/', 'test.json'));
        echo '</pre>';
        
        echo '增加：';
        echo '<pre>';
        var_dump(json_push('DEV_TEST/', 'test.json', 'test string push'));
        echo '</pre>';
        echo '<pre>';
        var_dump(json_push('DEV_TEST/', 'test.json', array('test array push')));
        echo '</pre>';
        echo '<pre>';
        var_dump(json_push('DEV_TEST/', 'test.json', array('aaa' => 'test2 array push')));
        echo '</pre>';
        echo '<pre>';
        var_dump(json_read('DEV_TEST/', 'test.json'));
        echo '</pre>';
        
        echo '刪除：';
        echo '<pre>';
        var_dump(json_drop('DEV_TEST/', 'test.json'));
        echo '</pre>';
    }
}
