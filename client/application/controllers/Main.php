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
			);
		$this->load->view('main_view', $data);

	}

	public function withdraw_apply()
	{
		$this->lang->load('Main', 'zh-tw');
		//使用者資訊
		$user_info = $this->session->userdata('user');

		$data = array(
			'username'=> $user_info['first_name'].' '.$user_info['last_name'],
			'ctrlName'=>$this->uri->segment(1),
			);
		$this->load->view('withdrawApply_view', $data);
	}
	
	public function withdraw_apply_confirm()
	{
		$this->lang->load('Main', 'zh-tw');
		//串接簡訊API
		$user_info = $this->session->userdata('user');

		$data = array(
			'username'=> $user_info['first_name'].' '.$user_info['last_name'],
			'ctrlName'=>$this->uri->segment(1),
			);
		$this->load->view('withdrawOTP_view', $data);
	}

	public function deposit_apply()
	{
		$this->lang->load('Main', 'zh-tw');
		//使用者資訊
		$user_info = $this->session->userdata('user');

		$data = array(
			'username'=> $user_info['first_name'].' '.$user_info['last_name'],
			'ctrlName'=>$this->uri->segment(1),
			);
		$this->load->view('depositApply_view', $data);
	}

	public function basic_info()
	{
		$this->lang->load('Main', 'zh-tw');
		//使用者資訊
		$user_info = $this->session->userdata('user');

		$data = array(
			'username'=> $user_info['first_name'].' '.$user_info['last_name'],
			'ctrlName'=>$this->uri->segment(1),
			);
		$this->load->view('basicInfo_view', $data);		
	}
}
