<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* MT4 view block
*/
class View_block_mt4_lib
{    
	public function ib_register()
	{
		$CI =& get_instance();
		$CI->load->library('api_lib');

		$api_re = $CI->api_lib->call_api(API_PATH.'mt4/ib_api/scale', json_encode(array('ib_id' => ib_lib::ib_id())));
        
        
        $data = array(
            'ib_id' => ib_lib::ib_id(),
            'scale' => sprintf('%01.2f', intval($api_re['data']['scale'])) - 0.01
        );
        
		return $CI->parser->parse('mt4/ib_register_view', $data, TRUE);
	}
}