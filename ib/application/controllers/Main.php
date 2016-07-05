<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 展示
*/
class Main extends CI_Controller {

	/**
	* 建構子，優先執行
	*/
	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');        

		//網址尾端帶 ?ajax=1 會辨識為 ajax 方式進入
		$is_ajax = ( ! empty($this->input->get('ajax')));

		//沒登入，就導回登入頁

		$is_login = (boolean)$this->session->userdata('login');
		if( ! $is_login){
			if($is_ajax){
				exit(json_encode('unauthorized'));
			}else{
				redirect(base_url("account"));
			}
		}
	}


	public function index()
	{
		//Load language
		$this->lang->load('Main', 'zh-tw');

		//使用者資訊
		$user_info = $this->session->userdata('user');

		$data = array(
			'username'=> $user_info['first_name'].' '.$user_info['last_name'],
			'ctrlName'=>$this->uri->segment(1),
			'funcName' => '主頁',
			);
		$this->load->view('main_view', $data);

	}

	public function person_info(){
		//Load language
		$this->lang->load('Main', 'zh-tw');

		//使用者資訊
		$user_info = $this->session->userdata('user');
		$data = array(
			'username'=> $user_info['first_name'].' '.$user_info['last_name'],
			'ctrlName'=>$this->uri->segment(1),
			'funcName' => '人事資料',
			);
		//var_dump($user_info);
		$this->load->view('person_info_view', $data);
	}

	public function member_list(){
		$this->lang->load('Main', 'zh-tw');
		$user_info = $this->session->userdata('user');
		$this->load->library('api_lib');
		$param = array();
		$api_re = $this->api_lib->call_api(API_PATH.'user_api/list', json_encode($param));
		$data = array('content'=>$api_re,
			'username'=> $user_info['first_name'].' '.$user_info['last_name'],
			'ctrlName'=>$this->uri->segment(1),
			'funcName' => '客戶總覽',
			);
		$this->load->view('member_list_view', $data);
	}

	public function change_pw(){
		$this->lang->load('Main', 'zh-tw');
		//使用者資訊
		$user_info = $this->session->userdata('user');

		$data = array(
			'username'=> $user_info['first_name'].' '.$user_info['last_name'],
			'ctrlName'=>$this->uri->segment(1),
			'funcName' => '密碼變更',
			);
		$this->load->view('change_pw_view', $data);
	}

	public function open_account_report(){
		$this->lang->load('Main', 'zh-tw');
		$user_info = $this->session->userdata('user');

		$data = array(
			'username'=> $user_info['first_name'].' '.$user_info['last_name'],
			'ctrlName'=>$this->uri->segment(1),
			'funcName' => '開戶報備',
			);
		$this->load->view('open_account_report_view', $data);
	}

	public function person_results(){
		$this->lang->load('Main', 'zh-tw');
		$user_info = $this->session->userdata('user');
		$this->load->library('api_lib');
		$param = array();
		$api_re = $this->api_lib->call_api(API_PATH.'user_api/list', json_encode($param));
		$data = array('content'=>$api_re,
			'username'=> $user_info['first_name'].' '.$user_info['last_name'],
			'ctrlName'=>$this->uri->segment(1),
			'funcName' => '個人業績',
			);
		$this->load->view('person_results_view', $data);	
	}

	public function org_results(){
		$this->lang->load('Main', 'zh-tw');
		$user_info = $this->session->userdata('user');
		$this->load->library('api_lib');
		$param = array();
		$api_re = $this->api_lib->call_api(API_PATH.'user_api/list', json_encode($param));
		$data = array('content'=>$api_re,
			'username'=> $user_info['first_name'].' '.$user_info['last_name'],
			'ctrlName'=>$this->uri->segment(1),
			'funcName' => '組織業績',
			);
		$this->load->view('org_results_view', $data);
	}

	public function member_assets(){
		$this->lang->load('Main', 'zh-tw');
		$user_info = $this->session->userdata('user');
		$this->load->library('api_lib');
		$param = array();
		$api_re = $this->api_lib->call_api(API_PATH.'user_api/list', json_encode($param));
		$data = array('content'=>$api_re,
			'username'=> $user_info['first_name'].' '.$user_info['last_name'],
			'ctrlName'=>$this->uri->segment(1),
			'funcName' => '客戶出入金訊息',
			);
		$this->load->view('member_assets_view', $data);
	}
}
