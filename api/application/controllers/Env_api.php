<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * 環境通用 API
 * @package         gallop
 * @subpackage      Env
 * @category        Controller
 * @author          bs
 */
class Env_api extends REST_Controller {

    function __construct(){
        parent::__construct();

        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['info_get']['limit'] = 1; // 500 requests per hour per user/key
        
        $this->load->model('env_comm_model');
    }
    
    /**
     * IB登入驗證
     * @param string $lang 語系
     * @param string $id 帳號
     * @param string $pw 密碼
     */
    public function country_post(){
        $lang = $this->post('lang');
        
        if(empty($lang)){
            $lang = 'en';
        }
        
        $list = $this->env_comm_model->country();
        
        if(empty($list)){
            $this->set_response('Country is empty, Developer should init first!', 301);
            return FALSE;
        }
        
        $this->lang->load('env', strtolower($lang));
        foreach($list as $ct){
            $list[$ct['country']]['name'] = lang('ct_'.strtolower($ct['country']));
        }
        
        $this->set_response($list, REST_Controller::HTTP_OK);
    }
    /**
     * 電話國碼清單
     * @param string $lang 語系
     */
    public function phone_code_post(){
        $lang = $this->post('lang');
        
        if(empty($lang)){
            $lang = 'en';
        }
        
        $list = $this->env_comm_model->phone_code();
        
        if(empty($list)){
            $this->set_response('Phone code is empty, Developer should init first!', 301);
            return FALSE;
        }
        
        $this->lang->load('env', strtolower($lang));
        foreach($list as $ct){
            $list[$ct['territory']]['name'] = lang('ct_'.strtolower($ct['country']));
            $list[$ct['territory']]['territory'] = lang('pc_'.strtolower($ct['territory']));
        }
        
        $this->set_response($list, REST_Controller::HTTP_OK);
    }
}
