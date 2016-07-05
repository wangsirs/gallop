<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Grants
 */
class Header_grants_lib
{
    private $_CI;
    private $_app = 'grants';
    public function __construct()
    {
        $this->_CI =& get_instance();
        $this->_CI->load->library('session');
        $this->_CI->lang->load('header', client_lib::lang());
    }

    /**
     * 資訊區塊
     */
    public function nav()
    {
        $data = array(
            'username' => client_lib::full_name()
            );
        return $this->_CI->parser->parse($this->_app.'/header_'.__FUNCTION__.'_view', $data, TRUE);
    }

    /**
     * 多子帳號餘額
     * @return array
     */
    public function balance(){
        $this->_CI->load->helper('json');

        $expired_sec = $this->_CI->config->item('mt4_balance'); //單位秒
        if(empty($expired_sec)){
            $expired_sec = 60;
        }

        $cache_path = client_lib::user_id().'/';
        $cache_fname = $this->_app.'_balance.json';

        $json_arr = json_read($cache_path, $cache_fname);
        if(empty($json_arr)){
            $json_arr = array();
        }

        $reflash = empty($json_arr) || (time() > intval($json_arr['time']) + $expired_sec);


        $this->_CI->lang->load('header', client_lib::lang());
        $data = array('balance' => @$json_arr['list'], 'refresh' => $reflash);
        return $this->_CI->parser->parse($this->_app.'/header_bal_view', $data, TRUE);
    }

    /**
     * 選單
     * @return array
     */
    public function menu()
    {
        $this->_CI->lang->load('header', client_lib::lang());
        return array(
            array(
                'name' => lang('header_grants'),
                'page_title' => '',
                'url' => '',
                'extra' => '&nbsp;<span class="fa fa-angle-down"></span>',
                'class'=> 'typeSel'
                ),
            array(
                'name' => lang('header_contact'),
                'page_title' => '',
                'url' => ''
                ),
            array(
                'name' => lang('header_reply'),
                'page_title' => '',
                'url' => ''
                ),
            array(
                'name' => lang('header_logout'),
                'page_title' => '',
                'url' => 'mt4/account/logout'
                ),
            );
    }
}
