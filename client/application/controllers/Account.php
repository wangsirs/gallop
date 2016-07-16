<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 帳戶
 */
class account extends CI_Controller {

    /**
     * 建構子，優先執行
     */
    public function __construct()
    {
        parent::__construct();
        
		//網址尾端帶 ?ajax=1 會辨識為 ajax 方式進入
		$is_ajax = ( ! empty($this->input->get('ajax')));

		//沒登入，就導回登入頁
		$is_login = (boolean)$this->session->userdata('login');
        //不需檢查的 function (空陣列里面別殘留 '' )
        $list_skip = array();
        
		if( ! $is_login && ! in_array($this->uri->segment(4), $list_skip)){
			if($is_ajax){
				exit(json_encode('unauthorized'));
			}else{
				redirect(base_url('login'));
			}
		}
    }


    /**
     * 變更語系
     */
    public function change_lang($lang){
		$re = new stdClass();
        $re->status = FALSE;
        if( ! in_array($lang, array('en', 'zh-tw', 'zh-cn'))){
            die(json_encode($re));
        }
        
        if($lang == client_lib::lang()){
            $re->status = TRUE;
            die(json_encode($re));
        }
        
		$this->load->library('api_lib');
		$param = array(
			'user_id' => client_lib::user_id(),
            'last_lang' => $lang
			);
		$api_re = $this->api_lib->call_api(API_PATH.'client_api/update_last_lang', json_encode($param));
        $re->status = $api_re['status'];
        if($re->status === TRUE){
            client_lib::set('last_lang', $lang);
        }
        die(json_encode($re));
    }
    
    /**
     * 密碼變更
     */
	public function change_pw(){
        $app = $this->uri->segment(2);
        if(empty($app)){
            //導回首頁
        }
		$this->lang->load('Main', 'zh-tw');
		//使用者資訊

		$data = array(
			'username'=> client_lib::full_name(),
			);
        load_frame($app, __CLASS__, __FUNCTION__, $data);
	}
    
    /**
     * 密碼變更處理
     */
    public function change_pw_conf(){
        $old_pass = $this->input->post('oldPw');
        $new_pass = $this->input->post('newPw');

        $this->load->library('api_lib');
        
        $param = array(
            'id' => client_lib::user_id(),
            'old_pass' => $old_pass,
            'new_pass' => $new_pass
        );
        
        $api_re = $this->api_lib->call_api(API_PATH.'user_api/update_pw/client', json_encode($param));
        
        $re = new stdClass();
        $re->status = FALSE;
        if($api_re['status'] === TRUE){
            $re->status = TRUE;
        }
        
        die(json_encode($re));
    }

    /**
     * 登出
     */
    public function logout(){
		//Load library
      $this->load->library('session');
      $this->session->sess_destroy();

      redirect(site_url('login'));
  }

}
