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
        
        $this->lang->load('country', strtolower($lang));
        foreach($list as $ct){
            $list[$ct['country']]['name'] = lang('ct_'.strtolower($ct['country']));
        }
        
        $this->set_response($list, REST_Controller::HTTP_OK);
    }
    
    /**
     * 取得詳細顧問
     * @author bs
     * @param string $ib_id 會員帳號
     * @return array 單一顧問資料清單
     */
    public function detail_post(){
        $ib_id = $this->post('ib_id');
        
        if(empty($ib_id)){
            $this->set_response(array('need ib_id.'), 201);
            return FALSE;
        }
        
        $detail = $this->ib_comm_model->detail($ib_id);
        if(empty($detail)){
            $this->set_response('select failed.', 301);
            return FALSE;
        }
        
        unset($detail['pwd']);
        
        $this->set_response($detail, REST_Controller::HTTP_OK);
    }
    
    /**
     * 更改密碼
     * @param string $ib_id 顧問帳號
     * @param string $old_pass 舊密碼
     * @param string $new_pass 新密碼
     */
    public function update_pw_post(){
        $ib_id = $this->post('ib_id');
        $old_pass = $this->post('old_pass');
        $new_pass = $this->post('new_pass');
        
        if(empty($ib_id) || empty($old_pass) || empty($new_pass)){
            $this->set_response(array('param is empty.'), 201);
            return FALSE;
        }
        
        if($this->ib_comm_model->update_pw($ib_id, $old_pass, $new_pass)){
            $this->set_response(array('ok'), REST_Controller::HTTP_OK);
        }else{
            $this->set_response(array('failed'), 301);
        }
    }
    
    /**
     * 應用程式清單
     * @param string $ib_id 顧問編號
     */
    public function apps_post(){
        $ib_id = $this->post('ib_id');
        
        if(empty($ib_id)){
            $this->set_response(array('param is empty.'), 201);
            return FALSE;
        }
        
        $list = $this->ib_comm_model->apps($ib_id);
        if(empty($list)){
            logger_err(__CLASS__, __FUNCTION__, 'app list is empty:'.$ib_id);
        }
        
        
        $this->set_response($list, REST_Controller::HTTP_OK);
    }
}
