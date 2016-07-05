<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 未登入相關
*/
class login extends CI_Controller {

    /**
    * 建構子，優先執行
    */
    public function __construct(){
        parent::__construct();
        
        $is_login = (boolean)$this->session->userdata('login');
        if($is_login){
            redirect(site_url('mt4'));
        }
    }
    
    /**
     * 登入畫面
     */
    public function index(){
        $type = $this->input->post('type');
        $id = $this->input->post('user');
        $pw = $this->input->post('pass');
        $captcha = $this->input->post('captcha');
        //Load language
        $this->lang->load('Login', 'zh-tw');

        $re = new stdClass();
        $re->status = FALSE;
        $re->msg = '';
        
        if( ! empty($id) && ! empty($pw) && ! empty($captcha)){

            $this->load->library('session');
            $sess_captcha = $this->session->userdata('captcha');            
            if( empty($sess_captcha) || $captcha != $sess_captcha){
                $re->msg = '驗證碼錯誤';
                die(json_encode($re));
            }

            $this->load->library('api_lib');
            $param = array(
                'type' => $type,
                'id' => $id,
                'pw' => $pw,
                );
            $api_re = $this->api_lib->call_api(API_PATH.'client_api/login', json_encode($param));
            if($api_re['status'] === TRUE){
                //設定語系
                $api_re['data']['lang'] = 'zh-tw';

                 //取得 app 清單
                $app_re = $this->api_lib->call_api(API_PATH.'client_api/apps', json_encode(array(
                    'user_id' => $api_re['data']['user_id']
                    )));
                $api_re['data']['apps'] = $app_re['data'];
                
                $this->session->set_userdata('user', $api_re['data']);
                $this->session->set_userdata('login', TRUE);

                $re->status = TRUE;
            }else{
                $re->msg = '登入失敗';
            }

            die(json_encode($re));
        }
        
        //Load 樣板並顯示
        $this->load->view(__CLASS__.'/'.__FUNCTION__.'_view');
    }
    
    /**
     * 忘記密碼
     */
    public function forget(){
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        //Load language
        $this->lang->load('Login', 'zh-tw');
        $data = array();
        $this->load->view(__CLASS__.'/'.__FUNCTION__.'_view', $data);
        
//      $this->load->helper(array('form'));
//      $this->load->library('session');
//      $this->load->library('form_validation');
//      //Load language
//      $this->lang->load('Login', 'en');
//      $authConfig = array(
//               array(
//                     'field'   => 'account', 
//                     'label'   => 'User name', 
//                     'rules'   => 'trim|required|min_length[5]|max_length[12]|xss_clean'
//                  ),
//               array(
//                     'field'   => 'email', 
//                     'label'   => 'E-mail', 
//                     'rules'   => 'required'
//                  ),
//               array(
//                     'field'   => 'code', 
//                     'label'   => 'Confirmation code', 
//                     'rules'   => 'required'
//                  ),
//            );
//      $this->form_validation->set_rules($authConfig);
//      $data = array();
//      if($this->form_validation->run() === FALSE){
//          $this->load->view('forget_view', $data);
//      }else{
//          //$this->load->view('forget_view', $data);
//      }
    }

    /*
    *產生驗證碼
     */ 
    function captcha_gen()
    {
        $this->load->library('captcha_lib');
        $num = $this->captcha_lib->captcha_gen();
        $this->load->library('session');
        $this->session->set_userdata('captcha',$num);
    }

    /**
     * 忘記密碼(驗證表單)
     */
    public function forget_confirm(){
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        //Load language
        $this->lang->load('Login', 'zh-tw');
        $data = array();
        if($this->form_validation->run() === FALSE){
            $data = array('status' => 1);
        }else{
            $data = array('status' => 0);
        }
        $this->load->view(__CLASS__.'/error_msg_view', $data);
    }
    
    /**
     * 驗證電子信箱
     * @author bs
     */
    public function vali_email($vali_code){
        $this->load->library('api_lib');
        
        $param = array(
            'vali_code' => $vali_code,
            );
        
        $api_re = $this->api_lib->call_api(API_PATH.'user_api/chk_vali_email', json_encode($param));
        
        if($api_re['chk'] === TRUE){
            echo '電子信箱驗證成功';
        }
    }

}
