<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * MT4 行政 API
 * @package         gallop
 * @subpackage      User
 * @category        Controller
 * @author          bs
 */
class admin_api extends REST_Controller {

    private $_app_id = 'mt4';
    
    function __construct(){
        parent::__construct();

        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['info_get']['limit'] = 1; // 500 requests per hour per user/key
                
        $this->load->model($this->_app_id.'/user_model');        
    }  
        
    /**
     * 新增大IB
     */
    public function add_org(){
        
        //新增佣金群組
    }
    
    /**
     * 新增佣金群組
     */
    public function add_symbol_plan(){
        
    }
    
    private function _add_symbol_plan(){
        
    }
}
