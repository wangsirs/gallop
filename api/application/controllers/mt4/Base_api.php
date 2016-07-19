<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * MT4 基礎資源 API
 * @package         gallop
 * @subpackage      User
 * @category        Controller
 * @author          bs
 */
class base_api extends REST_Controller {

    private $_app_id = 'mt4';
    
    function __construct(){
        parent::__construct();

        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['info_get']['limit'] = 1; // 500 requests per hour per user/key
                
        $this->load->model($this->_app_id.'/base_model');
    }  
        
    /**
     * 同步 MT4 商品
     */
    public function sync_symbol_post(){
		include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
		$mt4_com = new mt4_com_lib();
		
		$mt4_re = $mt4_com->get_all_symbols();
        
        if( (int)$mt4_re['status'] !== mt4_com_lib::RET_SUCCESS){
            $this->set_response('MT4 get_all_symbols failed:'.$mt4_re['status'], 301);
            return FALSE;
        }
        
        if(empty($mt4_re['data'])){
            $this->set_response('MT4 symbol is empty! Init mt4 symbol before sync.', 302);
            return FALSE;
        }
        
        //寫入資料庫
        $re = $this->base_model->sync_symbol($mt4_re['data']);
        if(TRUE !== $re){
            $this->set_response('insert to db failed:'.$re, 303);
            return FALSE;
        }
        
        $this->set_response('OK', REST_Controller::HTTP_OK);
    }
    
    /**
     * 檢查 MT4 商品異動
     */
    public function chk_symbol_post(){
		include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
		$mt4_com = new mt4_com_lib();
		
		$mt4_re = $mt4_com->get_all_symbols();
        
        if( (int)$mt4_re['status'] !== mt4_com_lib::RET_SUCCESS){
            $this->set_response('MT4 get_all_symbols failed:'.$mt4_re['status'], 301);
            return FALSE;
        }
        
        if(empty($mt4_re['data'])){
            $this->set_response('MT4 symbol is empty! Init mt4 symbol before sync.', 302);
            return FALSE;
        }
        
        //寫入資料庫
        $list = $this->base_model->chk_symbol($mt4_re['data']);
        
        if(empty($list)){
            $this->set_response('nothing change', REST_Controller::HTTP_OK);
            return FALSE;
        }
        
        $re = array();
        foreach($list as $row){
            $new_symbol = array();
            foreach($mt4_re['data'] as $symbol){
                if($symbol['symbol_id'] == $row['mss_id']){
                    $new_symbol = $symbol;
                }
            }
            
            $re[] = array('old' => $row, 'new' => $new_symbol);
        }
        
        $this->set_response($re, REST_Controller::HTTP_OK);
    }
    
}
