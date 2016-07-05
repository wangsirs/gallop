<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 樹主程式
 */
class Tree_lib
{   
    private $_app = '';
    private $_menu = array();
    
	function __construct($params)
	{        
        $this->_app = $params['app'];
	}
    
    /**
     * 取得樹畫面
     * @return string
     */
    public function load()
    {
        if(file_exists(APPPATH.'libraries/tree/Tree_'.$this->_app.'_lib.php')){
            $CI =& get_instance();
            $CI->load->library('tree/tree_'.$this->_app.'_lib');
            return $this->_menu = $CI->{'tree_'.$this->_app.'_lib'}->view();
        }
        return '';
    }
}