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
    * 大IB群組開戶設定 step 1
    */
    public function gib_reg_1(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 大IB群組開戶設定 step 2
    */
    public function gib_reg_2(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 大IB群組開戶設定 step 3
    */
    public function gib_reg_3(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
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
    public function sub_check_detail(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 大IB管理
    */
    public function great_ib_manage(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 大IB管理修改功能
    */
    public function great_ib_manage_edit(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 顧問管理
    */
    public function ib_manage(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 顧問管理修改功能
    */
    public function ib_manage_edit(){
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
    * 客戶管理修改功能
    */
    public function client_manage_edit(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 客戶多帳號管理
    */
    public function client_multi_account(){
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

    /**
    * 直客獎金
    */
    public function client_bonus(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 佣金存入提款
    */
    public function comm_io(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 佣金存入細節
    */
    public function comm_funding(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 佣金提款細節
    */
    public function comm_withdraw(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 存提款紀錄
    */
    public function io_record(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 直客獎金
    */
    public function trade_report(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 客戶出入金管理
    */
    public function io_mgt(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 客戶入金細節
    */
    public function client_funding(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 客戶出金細節
    */
    public function client_withdraw(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 客戶入金管理
    */
    public function funding_mgt(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 客戶入金審核
    */
    public function funding_check(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 客戶出金管理
    */
    public function withdraw_mgt(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    /**
    * 客戶出金審核
    */
    public function withdraw_check(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data);
    }
}
