<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* mt4
*/
class mt4 extends CI_Controller {

    private $_app = 'mt4';

    /**
    * 建構子，優先執行
    */
    public function __construct()
    {
        parent::__construct();

        //網址尾端帶 ?ajax=1 會辨識為 ajax 方式進入
        $is_ajax = ( ! empty($this->input->get('ajax')));
    }

    /**
    * IB審核
    */
    public function ib_check(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

   /**
    * IB審核詳細資料
    */
    public function ib_check_detail(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 客戶資料審查
    */
    public function client_check(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 客戶資料詳細資料
    */
    public function client_check_detail(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 客戶子帳戶審查
    */
    public function sub_check(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 客戶管理
    */
    public function client_manage(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 組織獎金
    */
    public function org_bonus(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }
}
