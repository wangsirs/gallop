<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 展示
*/
class Main extends CI_Controller {

	private $_app = 'admin';

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

	public function client_register(){
		load_frame($this->_app, __CLASS__, __FUNCTION__);
	}
}
