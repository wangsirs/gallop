<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 選單主程式
*/
class Menu_lib
{   
    private $_menu = array();
    private $_params = array();
    private $_bread_crumb = array();

    function __construct($params)
    {        
        $this->_params = $params;

        if(file_exists(APPPATH.'libraries/menu/Menu_lib.php')){
            $CI =& get_instance();
            $CI->load->library('menu/Menu_admin_lib');
            $this->_menu = $CI->{'menu_admin_lib'}->lists();
        }
    }

/**
* 取得選單清單
* @return array
*/
public function load()
{
    return $this->_menu;
}

/**
* 取得麵包屑
* @param string $classname Class名稱
* @param string $funcname function名稱
* @return 第二層 名稱
*/
public function bread_crumb()
{
    if( ! empty($this->_bread_crumb))
    {
        return $this->_bread_crumb['name'];
    }
    $cf = strtolower($this->_params['classname'].'/'.$this->_params['funcname']);
    foreach($this->_menu as $item)
    {
        if(strpos($item['url'], $cf) !== FALSE)
        {
            $this->_bread_crumb = $item;
            return $item['name'];
        }

        if( ! empty($item['list']))
        {
            foreach($item['list'] as $item2)
            {
                if(strpos($item2['url'], $cf) !== FALSE)
                {
                    $this->_bread_crumb = $item2;
                    return $item2['name'];
                }
            }
        }
    }
}

/**
* 取得頁面標題
* @return string
*/
public function page_title()
{
    if(empty($this->_bread_crumb)) $this->bread_crumb();
    if(empty($this->_bread_crumb)) return '';
    return  ! empty($this->_bread_crumb['page_title']) ? $this->_bread_crumb['page_title'] : $this->_bread_crumb['name'];
}
}