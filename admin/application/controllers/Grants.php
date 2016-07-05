<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 贈金
*/
class grants extends CI_Controller {

	private $_app = 'grants';

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
        if( ! $is_login || ! ib_lib::have_app($this->_app)){
			if($is_ajax){
				exit(json_encode('unauthorized'));
			}else{
				redirect(base_url('login'));
			}
		}
	}
    
	public function index(){
        echo 'grants';
	}

}
