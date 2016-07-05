<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 帳戶
 */
class account extends CI_Controller {

	private $_app;
	
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
		$list_skip = array('register');

		if( ! $is_login && ! in_array($this->uri->segment(4), $list_skip)){
			if($is_ajax){
				exit(json_encode('unauthorized'));
			}else{
				redirect(base_url('login'));
			}
		}
		
		//取得 app 代號
		$this->_app = $this->uri->segment(2);
		//不需檢查的 function
		$list_skip = array('logout');
		if(empty($this->_app) || in_array($this->_app, $list_skip)){
			redirect(base_url('mt4'));
		}
	}
	
	/**
	 * 此 IB 個人資料
	 */
	public function profile(){
		//Load language

		
		$this->load->library('api_lib');
		$param = array(
			'ib_id' => ib_lib::ib_id()
			);
		$api_re = $this->api_lib->call_api(API_PATH.'ib_api/detail', json_encode($param));
		$data = $api_re['data'];
		$data['app'] = $this->_app;
		
		load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
	}

	/**
	 * 密碼變更
	 */
	public function change_pw(){
		$data = array(
			'app' => $this->_app,
			'username'=> ib_lib::full_name(),
			);
		load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
	}
	
	/**
	 * 密碼變更處理
	 */
	public function change_pw_conf(){
		$re = new stdClass();
		$post = $this->input->post();
		$old_pw = $post['oldPw'];
		$new_pw = $post['newPw'];
		$new_pw_conf = $post['newPwConf'];
		if(empty($old_pw) || 
			empty($old_pw) || 
			empty($old_pw) || 
			strcmp($new_pw, $new_pw_conf) != 0){
			$re->status = FALSE;
		$re->msg = 'Not follow the rules';
		die(json_encode($re));
		}
		$this->load->library('api_lib');
		$param = array(
			'ib_id' => ib_lib::ib_id(),
			'old_pass' => $old_pw,
			'new_pass' => $new_pw_conf,
			);
		$api_re = $this->api_lib->call_api(API_PATH.'ib_api/update_pw', json_encode($param));
		$re->status = ($api_re['status'] === TRUE)? TRUE: FALSE;
		$re->msg = ! empty($api_re['data']) ? $api_re['data'] : '';
		die(json_encode($re));
	}

	/**
	 * 登出
	 */
	public function logout(){
		//Load library
		$this->session->sess_destroy();

		redirect(site_url('login'));
	}

	/**
	 * 顧問註冊畫面
	 */
	public function ib_register(){
		$this->load->library('parser');
		$this->load->library('country_lib');
		
        $this->load->library('view_block_lib', array('app' => $this->_app));
        
		$data = array(
			'app' => $this->_app,
			'app_form' => $this->view_block_lib->ib_register(),
			'list_country' => $this->country_lib->load(),
			'list_country_phone' => $this->country_lib->phone(),
			);
		
		load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
	}

	/**
	 * 客戶註冊畫面
	 * @param string $view_mode 是否為內部頁面
	 */
	public function register($view_mode = ''){
		$ib_id = $this->input->get('id');

		$this->load->library('parser');
		$this->load->library('country_lib');
		
		$data = array(
			'app' => $this->_app,
			'app_form' => $this->parser->parse($this->_app.'/'.__FUNCTION__.'_view', array()),
			'list_country' => $this->country_lib->load(),
			'list_country_phone' => $this->country_lib->phone(),
			'hash' => substr(md5(time()), 0, 6)
			);
		
		//內部頁面
		if('inside' === $view_mode){
			
			//套用此顧問 ib_id
			
			$data['ib_id'] = ib_lib::ib_id();
			
			$is_login = (boolean)$this->session->userdata('login');
			if( ! $is_login ){
				redirect(base_url('login'));
			}
			
			load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
		//免登入頁面
		}else{
			//使用 boss ib_id
			$data['ib_id'] = 'B00001';
			
			$lang = $this->input->get('lang');
			$lang = empty($lang) ? 'en' : $lang;
			$this->session->set_userdata('lang', $lang);
			
			load_light_frame(__CLASS__.'/'.__FUNCTION__.'_view', $data);
		}
	}
	
	/**
	 * 暫存表單資訊
	 */
	public function register_tmp(){
		$post = $this->input->post();
		
		$re = new stdClass();
		$re->status = FALSE;
		$re->msg = '';

		if(empty($post['hash'])){
			$re->msg = 'from error!';
			die(json_encode($re));
		}
		
		//FIXME:從 session 取得 ib_id
		$post['com_id'] = COM_ID;
		$post['mod_user'] = 'E0001';
		$sess_key = 'reg_'.$post['hash'];
		$base_data = $this->session->userdata($sess_key);
		
		if( ! empty($base_data)){
			$base_data = array_merge($base_data, $post);
		}else{
			$base_data = $post;
		}
		
		$this->session->set_userdata($sess_key, $base_data);
		
		$re->status = TRUE;
		die(json_encode($re));
	}
	
	/**
	 * 儲存客戶註冊資料
	 */
	public function register_save(){
		$post = $this->input->post();
		
		$sess_key = 'reg_'.$post['hash'];
		$base_data = $this->session->userdata($sess_key);
		
		//如果有登入 IB, 強制寫死 ib_id
		$user_info = $this->session->userdata('user');
		if(isset($user_info['ib_id'])){
			$base_data['ib_id'] = $user_info['ib_id'];
		}
		
		$require_field = array(
			'user_name', 'com_id', 'pwd', 'first_name', 'last_name', 'nickname',
			'passport', 'mod_user', 'ib_id', 'email', 'gender', 'birthday', 'marital',
			'nationality', 'country', 'zip', 'city', 'state', 'address', 'phone', 'cell_phone',
			'first_deposit', 'passport_path', 'bank_path', 'resident_path');

		$this->load->library('api_lib');
		
		$api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/add', json_encode($base_data));
		
		$re = new stdClass();
		$re->status = FALSE;
		$re->msg = '';

		if($api_re['status'] === TRUE){
			$re->status = TRUE;
			$param = array(
				'user_id' => $api_re['data']['user_id'],
				'mt4_id' => $api_re['data']['mt4_id'],
				);
			$api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/approve', json_encode($param));
			$re->status = ($api_re['status'] === TRUE);
			$re->msg = ($re->status) ? 'mt4_id='.$param['mt4_id'] : 'mt4 account create failed.';
		}elseif(303 === $api_re['status']){
			$re->msg = 'email帳號已存在';
		}
		die(json_encode($re));
	}
	
	/**
	 * 儲存顧問註冊資料
	 */
	public function ib_register_save(){		
		$post  = $this->input->post();
		$post['com_id'] = COM_ID;
		$post['mod_user'] = COM_ID;
		$post['passport_path'] = COM_ID;
		$post['bank_path'] = COM_ID;
		$post['resident_path'] = COM_ID;
		$post['parent_id'] = ib_lib::ib_id();
		
		$this->load->library('api_lib');
		$api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/ib_api/add', json_encode($post));
		$re = new stdClass();
		$re->status = FALSE;
		$re->msg = '';
		if($api_re['status'] === TRUE){
			$param = array(
				'ib_id' => $api_re['data']['ib_id'],
				);
			$api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/ib_api/approve', json_encode($param));
			$re->status = ($api_re['status'] === TRUE);
			$re->msg = ($re->status) ? 'IB_ID='.$param['ib_id'] : 'IB account create failed.';
		}elseif(303 === $api_re['status']){
			$re->msg = 'email帳號已存在';
		}
		die(json_encode($re));
	}
}
