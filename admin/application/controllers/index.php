<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* �i��
*/
class Index extends CI_Controller {

/**
* �غc�l�A�u������
*/
//    public function __construct()
//    {
//        //
//    }

	public function index()
	{
		//Load library
		$this->load->library('session');
		if($name = $this->session->userdata('name') !== null){
			echo 0;
		}else{
			echo 1;
		}
		//Load language
		$this->lang->load('Login', 'en');
		$data = array();
		//Load �˪O�����
		$this->load->view('login_view', $data);
		/*Load �˪O�ܼƤ��A�A���t�~�B�z
		 $view = $this->parser->parse('demo_view', $data);*/

	}

	/**
	* ���� Get
	*/
	public function testget()
	{
		//���o key �� "g" �� paramater
		$str = $this->input->get('g');

		echo 'test Get<br>';
		echo 'get='.$str;
	}

	/**
	* ���� segment
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
		echo '���ҰѼ�';
		echo '<br>base_url()'.base_url();
		echo '<br>current_url()'.current_url();
		echo '�ثe���ҬO:';
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
	* ���� Session
	*/
	public function sessions()
	{
		//Load library
		$this->load->library('session');

		//���o session ��
		$name = $this->session->userdata('name');
		echo '$name �Ȭ�'.$name;

		//�p�G���šA�N�g�J
		if(empty($name))
		{
			echo '�Ȥ��s�b�A�g�J session';
			$this->session->set_userdata('name', 'value~');

		}else
		{
			echo '�Ȥw�g�s�b�A�M�ŧ����I';
			$this->session->unset_userdata('name');            
		}

	}
}
