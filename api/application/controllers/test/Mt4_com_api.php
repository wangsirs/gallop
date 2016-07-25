<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * MT4 溝通元件 測試 api
 */
class mt4_com_api extends REST_Controller {

	
	function __construct(){
		parent::__construct();

		if( IS_ONLINE){
			die('dev env only');
		}
	}  
	
	/**
	 * 新增客戶
	 */
	public function add_user_post(){
		
		$mt4_data = $this->post();
		
		//新增 MT4 帳號
		include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
		
		$mt4_com = new mt4_com_lib();
		
		echo '<pre>';
		var_dump($mt4_data);
		echo '</pre>';
		
		$mt4_re = $mt4_com->add_user($mt4_data);
		
		echo 'result =';
		echo '<pre>';
		var_dump($mt4_re);
		echo '</pre>';
		
	}

	/**
	 * 檢查客戶ID是否重複
	 */
	public function check_id_post(){
		
		$mt4_data = $this->post();
		$login_id = isset($mt4_data['login_id'])?$mt4_data['login_id']:'';
		//新增 MT4 帳號
		include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
		
		$mt4_com = new mt4_com_lib();
		
		echo '<pre>';
		var_dump($login_id);
		echo '</pre>';
		
		$mt4_re = $mt4_com->check_id_exists($login_id);
		
		echo 'result =';
		echo '<pre>';
		var_dump($mt4_re);
		echo '</pre>';
		
	}

	/**
	 * 客戶入金
	 */
	public function client_deposit_post(){
		
		$mt4_data = $this->post();
		$login_id = isset($mt4_data['login_id'])?$mt4_data['login_id']:'';
		$amount = isset($mt4_data['amount'])?$mt4_data['amount']:'';
		//新增 MT4 帳號
		include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
		
		$mt4_com = new mt4_com_lib();
		
		echo '<pre>';
		var_dump($mt4_data);
		echo '</pre>';
		
		$mt4_re = $mt4_com->client_funding($login_id, $amount);
		
		echo '<pre>';
		var_dump($mt4_re);
		echo '</pre>';
		
	}

	/**
	 * 客戶出金
	 */
	public function client_withdraw_post(){
		
		$mt4_data = $this->post();
		$login_id = isset($mt4_data['login_id'])?$mt4_data['login_id']:'';
		$amount = isset($mt4_data['amount'])?$mt4_data['amount']:'';
		//新增 MT4 帳號
		include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
		
		$mt4_com = new mt4_com_lib();
		
		echo '<pre>';
		var_dump($mt4_data);
		echo '</pre>';
		
		$mt4_re = $mt4_com->client_withdraw($login_id, $amount);
		
		echo '<pre>';
		var_dump($mt4_re);
		echo '</pre>';
		
	}

	/**
	 * 查詢客戶餘額
	 */
	public function get_client_asset_post(){
		
		$mt4_data = $this->post();
		$login_id = isset($mt4_data['login_id'])?$mt4_data['login_id']:'';
		//新增 MT4 帳號
		include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
		
		$mt4_com = new mt4_com_lib();
		
		echo '<pre>';
		var_dump($mt4_data);
		echo '</pre>';
		
		$mt4_re = $mt4_com->get_client_asset($login_id);
		
		echo '<pre>';
		var_dump($mt4_re);
		echo '</pre>';
		
	}

	/**
	 * 查詢客戶交易明細
	 */
	public function get_client_trade_history_post(){
		
		$mt4_data = $this->post();
		$login_id = isset($mt4_data['login_id'])?$mt4_data['login_id']:'';
		$from = isset($mt4_data['from'])?$mt4_data['from']:NULL;
		$to = isset($mt4_data['to'])?$mt4_data['to']:NULL;
		//新增 MT4 帳號
		include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
		
		$mt4_com = new mt4_com_lib();
		
		echo '<pre>';
		var_dump($mt4_data);
		echo '</pre>';
		
		$mt4_re = $mt4_com->get_client_trade_history($login_id, $from, $to);
		
		echo '<pre>';
		var_dump($mt4_re);
		echo '</pre>';
		
	}
	/**
	 * 查詢客戶交易明細
	 */
	public function get_access_payment_post(){
		
		$mt4_data = $this->post();
		$login_id = isset($mt4_data['login_id'])?$mt4_data['login_id']:'';
		$from = isset($mt4_data['from'])?$mt4_data['from']:NULL;
		$to = isset($mt4_data['to'])?$mt4_data['to']:NULL;
		//新增 MT4 帳號
		include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
		
		$mt4_com = new mt4_com_lib();
		
		echo '<pre>';
		var_dump($mt4_data);
		echo '</pre>';
		
		$mt4_re = $mt4_com->get_access_payment($login_id, $from, $to);
		
		echo '<pre>';
		var_dump($mt4_re);
		echo '</pre>';
		
	}

	/*
	*
	 */
	public function change_pw_post(){
		$mt4_data = $this->post();
		$login_id = isset($mt4_data['login_id'])?$mt4_data['login_id']:'';
		$type = isset($mt4_data['type'])?$mt4_data['type']:'';
		$passwd = isset($mt4_data['passwd'])?$mt4_data['passwd']:'';
		
		include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
		$mt4_com = new mt4_com_lib();
		
		echo '<pre>';
		var_dump($mt4_data);
		echo '</pre>';
		
		$mt4_re = $mt4_com->change_pw($login_id, $type, $passwd);
		
		echo '<pre>';
		var_dump($mt4_re);
		echo '</pre>';
	}

	/*
	* 取得所有商品別跟對應ID
	 */
	public function get_all_symbols_post(){
		
		include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
		$mt4_com = new mt4_com_lib();
		
		$mt4_re = $mt4_com->get_all_symbols();
		
		echo '<pre>';
		var_dump($mt4_re);
		echo '</pre>';
	}

	/*
	* 新增群組
	 */
	public function add_group_post(){

		$mt4_data = $this->post();
		$group_name = isset($mt4_data['group'])?$mt4_data['group']:'';
		$group_support_page = isset($mt4_data['support_page'])?$mt4_data['support_page']:'';
		$group_enable = isset($mt4_data['enable'])?$mt4_data['enable']:'';
		$symbol_group = isset($mt4_data['symbol_group'])?$mt4_data['symbol_group']:'';
		include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
		$mt4_com = new mt4_com_lib();
		$mt4_re = $mt4_com->add_group($group_name, $symbol_group);
		
		echo '<pre>';
		var_dump($mt4_re);
		echo '</pre>';
	}

	/*
	* 取得群組資訊
	 */
	public function get_group_info_post(){
		$mt4_data = $this->post();
		$group_name = isset($mt4_data['group'])?$mt4_data['group']:'';
		include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
		$mt4_com = new mt4_com_lib();
		$mt4_re = $mt4_com->get_group_info($group_name);
		
		echo '<pre>';
		var_dump($mt4_re);
		echo '</pre>';
	}
}
