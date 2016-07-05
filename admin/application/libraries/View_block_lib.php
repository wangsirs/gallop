<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * view區塊
 */
class View_block_lib
{   
    private $_app = '';
    
	function __construct($params)
	{        
        $this->_app = $params['app'];
	}
    
    public function ib_register(){
        if(file_exists(APPPATH.'libraries/view_block/View_block_'.$this->_app.'_lib.php')){
            $CI =& get_instance();
            $CI->load->library('view_block/View_block_'.$this->_app.'_lib');
            return $this->_menu = $CI->{'view_block_'.$this->_app.'_lib'}->ib_register();
        }
        return '';
    }
}