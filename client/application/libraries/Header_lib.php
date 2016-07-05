<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 天
 */
class Header_lib
{   
    private $_menu = array();
    private $_obj;
    
	function __construct($params)
	{        
        $app = $params['app'];
        $this->_view = $params;
        
        if(file_exists(APPPATH.'libraries/header/Header_'.$app.'_lib.php')){
            $CI =& get_instance();
            $CI->load->library('header/header_'.$app.'_lib');
            $this->_obj = $CI->{'header_'.$app.'_lib'};
        }
	}
    
    /**
     * 取得天畫面
     * @return \Header_mt4_lib
     */
    public function load()
    {
        return $this->_obj;
    }
}