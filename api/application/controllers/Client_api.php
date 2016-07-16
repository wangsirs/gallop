<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * 通用客戶 API
 * @package         gallop
 * @subpackage      Account
 * @category        Controller
 * @author          bs
 */
class Client_api extends REST_Controller {

    function __construct(){
        parent::__construct();

        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['info_get']['limit'] = 1; // 500 requests per hour per user/key
        
        $this->load->model('user_comm_model');        
    }  
    
    /**
     * 登入驗證
     * @param string $type 登入方式(facebook,mt4, or '')
     * @param string $id 帳號
     * @param string $pw 密碼
     */
    public function login_post(){
        $type = $this->post('type');
        $id = $this->post('id');
        $pw = $this->post('pw');
        
        if(empty($type)){
            $type = '';
        }
        
        switch($type){
            case 'facebook': break;
            case 'mt4': break;
            default: //email or ib_id
                $info = $this->user_comm_model->login($id, $pw);
                break;
        }
        
        if(empty($info)){
            $this->set_response('failed.', 301);
            return FALSE;
        }
        
        $this->set_response($info, REST_Controller::HTTP_OK);
    }
    
    /**
     * 取得簡易會員資訊
     * @author bs
     * @param string $email 電子信箱
     * @return array 單一會員資料清單
     */
    public function info_post(){
        $email = $this->post('email');
        
        if(empty($email)){
            $this->set_response(array('param is empty.'), 201);
            return FALSE;
        }
        
        $user_info = $this->user_comm_model->info($email);
        
        $this->set_response($user_info, REST_Controller::HTTP_OK);
    }
    
    /**
     * 取得簡易會員資訊清單
     * @author bs
     * @return array 會員資料清單
     */
    public function list_post(){
       $user_info = $this->user_comm_model->lists();
        
        $this->set_response($user_info, REST_Controller::HTTP_OK);
    }
    
    /**
     * 更改密碼
     * @param string $user_id 會員帳號
     * @param string $old_pass 舊密碼
     * @param string $new_pass 新密碼
     */
    public function update_pw_post(){
        $user_id = $this->post('user_id');
        $old_pass = $this->post('old_pass');
        $new_pass = $this->post('new_pass');
        
        if(empty($user_id) || empty($old_pass) || empty($new_pass)){
            $this->set_response(array('param is empty.'), 201);
            return FALSE;
        }
        
        if($this->user_comm_model->update_pw($user_id, $old_pass, $new_pass)){
            $this->set_response(array('ok'), REST_Controller::HTTP_OK);
        }else{
            $this->set_response(array('failed'), 301);
        }
    }
    
    /**
     * 忘記密碼
     * @author bs
     * @param string $user_id 會員帳號
     * @param string $email 電子信箱
     * @param string $lang 語系
     * @return boolean
     */
    public function forgot_pw_post(){
        $user_id = $this->post('user_id');
        $email = $this->post('email');
        $lang = $this->post('lang');
        
        if(empty($user_id) || empty($email) || empty($lang)){
            $this->set_response(array('param is empty.'), 201);
            return FALSE;
        }

        //驗證email格式
        $this->load->helper('email');
        if ( ! valid_email($email))
        {
            $this->set_response(array('Email is wrong format.'), 301);
            return FALSE;
        }
        
        //比對帳密
        $user_info = $this->user_comm_model->info($user_id);
        if($user_info['email'] !== $email){
            $this->set_response(array('Wrong email.'), 302);
            return FALSE;
        }
                
        //發送密碼回使用者信箱
        $this->load->library('email_lib');
        $this->lang->load('user', $lang);
        if( ! $this->email_lib->send($user_info['email'], lang('user_mail_sub'), sprintf(lang('user_mail_content'), $user_info['pwd']))){
            //log
            //echo 'from=>'.$com_mail.'('.$com_mail_name.')';
            //echo 'to=>'.$user_info['email'];
            //echo $this->email->print_debugger();
            
            $this->set_response(array('Email send failed.'), 303);
            return FALSE;
        }
        
        $this->set_response(array('ok'), REST_Controller::HTTP_OK);
    }
    
    /**
     * 取得驗證碼
     * @param string $user_id 會員帳號
     * @param type $email
     * @return type
     */
    private function _get_vali_code($user_id, $email){
        $prefix = 'gallop123_';
        return md5($prefix.$user_id.$email);
    }
    
    /**
     * 發送驗證信
     * @param string $vali_code 驗證碼
     * @return boolean 發送結果
     */
    private function _sned_vali_email($lang, $to, $vali_code){
        
        //發送密碼回使用者信箱
        $this->load->library('email_lib');
        $this->lang->load('user', $lang);
        $url = ADMIN_URL.'account/vali_email/'.$vali_code;
        echo $re = $this->email_lib->send($to, lang('user_vali_mail_sub'), sprintf(lang('user_vali_mail_content'), $url, $url));
        
        if( ! $re){
            //log
            //echo 'from=>'.$com_mail.'('.$com_mail_name.')';
            //echo 'to=>'.$user_info['email'];
            //echo $this->email->print_debugger();
        }
        
        return $re;
    }
    
    /**
     * 檢查驗證信
     */
    public function chk_vali_email_post(){
        //update flag
    }
    
    /**
     * 變更 email
     * @author bs
     */
    public function update_email_post(){
        $user_id = $this->post('user_id');
        $new_email = $this->post('new_email');
        $lang = $this->post('lang');
        
        //$user_info = $this->user_comm_model->info($user_id);
        
        //reset flag, update email, 是否暫存舊 email
        if( ! $this->_sned_vali_email($lang, $new_email, $this->_get_vali_code($user_id, $new_email))){
            $this->set_response(array('Email send failed.'), 301);
            return FALSE;
        }
        
        $this->set_response(array('ok'), REST_Controller::HTTP_OK);
    }
    
    /**
     * 應用程式清單
     * @param string $user_id 客戶編號
     */
    public function apps_post(){
        $user_id = $this->post('user_id');
        
        if(empty($user_id)){
            $this->set_response(array('param is empty.'), 201);
            return FALSE;
        }
        
        $list = $this->user_comm_model->apps($user_id);
        if(empty($list)){
            logger_err(__CLASS__, __FUNCTION__, 'app list is empty:'.$user_id);
        }
        
        $this->set_response($list, REST_Controller::HTTP_OK);
    }
    
    /**
     * 更新最後使用的語系
     * @param string $user_id 客戶編號
     * @param string $last_lang 語系
     */
    public function update_last_lang_post(){
        $user_id = $this->post('user_id');
        $last_lang = $this->post('last_lang');
        
        if(empty($user_id) || empty($last_lang)){
            $this->set_response(array('param is empty.'), 201);
            return FALSE;
        }
        
        if($this->user_comm_model->update_last_lang($user_id, $last_lang)){
            $this->set_response('ok', REST_Controller::HTTP_OK);
        }else{
            $this->set_response('failed', 301);
        }
    }
}
