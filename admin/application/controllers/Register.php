<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 展示
*/
class Register extends CI_Controller {

/**
* 建構子，優先執行
*/
//    public function __construct()
//    {
//        //
//    }

	public function index()
	{
		//Load language
		$this->lang->load('Register', 'en');
		$data = array();
		//Load 樣板並顯示
		$this->load->view('register_view', $data);
		//Load 樣板變數中，再做另外處理
		// $view = $this->parser->parse('demo_view', $data);

	}

	/**
	* 測試 Get
	*/
	public function testget()
	{
		//取得 key 為 "g" 的 paramater
		$str = $this->input->get('g');

		echo 'test Get<br>';
		echo 'get='.$str;
	}

	/**
	* 測試 segment
	* @author bs
	* @param mix $seg1
	* @param mix $seg2
	* @return void
	*/
	public function testsegment($seg1, $seg2)
	{
		echo 'test segment<br>';
		echo "seg1=".$seg1.',seg2='.$seg2;
	}

	public function constants()
	{
		echo '<pre>';
		echo '環境參數';
		echo '<br>base_url()'.base_url();
		echo '<br>current_url()'.current_url();
		echo '目前環境是:';
		if(IS_DEV)
		{
			echo 'dev';
		}elseif(IS_BETA)
		{
			echo 'beta';
		}elseif(IS_PREV)
		{
			echo 'prev';
		}elseif(IS_ONLINE)
		{
			echo 'online';
		}
		echo '</pre>';
	}

	/**
	* 測試 Session
	*/
	public function sessions()
	{
		//Load library
		$this->load->library('session');

		//取得 session 值
		$name = $this->session->userdata('name');
		echo '$name 值為'.$name;

		//如果為空，就寫入
		if(empty($name))
		{
			echo '值不存在，寫入 session';
			$this->session->set_userdata('name', 'value~');

		}else
		{
			echo '值已經存在，清空完畢！';
			$this->session->unset_userdata('name');            
		}

	}
}
