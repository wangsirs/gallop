<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* MT4 樹
*/
class Tree_mt4_lib
{    
	public function view()
	{
		$CI =& get_instance();
		$CI->load->library('api_lib');

		$param = array('ib_id' => ib_lib::ib_id());
		$data = array('data'=> $CI->api_lib->call_api(API_PATH.'mt4/ib_api/tree', json_encode($param)), 
			'username' => ib_lib::full_name()); 

		return $CI->parser->parse('mt4/tree_view', $data, TRUE);
	}
}