<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * Postman Ads api
 */
class Postman_api extends CI_Controller {

    private $_path = 'postman/';
    private $_fname = 'url.json';
    private $_base_url = 'https://www.getpostman.com/collections/';
            
    function __construct(){
        parent::__construct();

        if( IS_ONLINE){
            die('dev env only');
        }
    }  
    
    public function index($collection = 'main'){
        $list = json_read($this->_path, $this->_fname);
        
        $this->load->helper('url');
        redirect($this->_base_url.$list[$collection]);
    }
    
    /**
     * 加入
     */
    public function add($collection, $url){
        $list = json_read($this->_path, $this->_fname);
        
        $list[$collection] = str_replace('/', '', $url);
                                
        json_save($this->_path, $this->_fname, $list) ? '更新成功' : '更新失敗';
        
        echo '目前清單:<pre>';
        var_dump($list);
        echo '</pre>';
        
        echo 'import 資料:';
        echo '<pre>';
        var_dump(file_get_contents($this->_base_url.$url));
        echo '</pre>';
    }
    
    /**
     * 顯示
     */
    public function show(){
        $list = json_read($this->_path, $this->_fname);
        
        echo '目前清單:<pre>';
        var_dump($list);
        echo '</pre>';
    }
}
