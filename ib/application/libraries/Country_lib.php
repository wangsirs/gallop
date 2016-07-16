<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 國家相關程式
 */
class Country_lib
{

    private $_CI;
    private $_status_code;
    private $_action;

    function __construct()
    {
        $this->_CI =& get_instance();
    }

    /**
     * 取得國家清單
     * @return array
     */
    public function load()
    {
        // Initialized params
        $param = array('lang' => ib_lib::lang());
        $this->_CI->load->library('api_lib');
        $api_re = $this->_CI->api_lib->call_api(API_PATH.'env_api/country', json_encode($param));
        return ($api_re['status'] === TRUE)?$api_re['data'] : array();
    }

    /**
     * 取得國家電話代碼
     * @return array
     */
    public function phone()
    {
        // Initialized params
        $param = array('lang' => ib_lib::lang());
        $this->_CI->load->library('api_lib');
        $api_re = $this->_CI->api_lib->call_api(API_PATH.'env_api/phone_code', json_encode($param));
        return ($api_re['status'] === TRUE)?$api_re['data'] : array();
    }
}
