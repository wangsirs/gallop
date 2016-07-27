<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Admin
*/
class admin extends CI_Controller {

    private $_app = 'admin';

    /**
    * 建構子，優先執行
    */
    public function __construct()
    {
        parent::__construct();

        //網址尾端帶 ?ajax=1 會辨識為 ajax 方式進入
        $is_ajax = ( ! empty($this->input->get('ajax')));
    }


    public function index(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data, FALSE, __FUNCTION__.'_view');
    }

    public function rd_monitor(){
        $this->load->library('api_lib');
        if( ! empty($this->input->post())){
            $post = $this->input->post();
            if($post['action'] == 'refresh'){
                $api_re = $this->api_lib->call_api(API_PATH.'/mt4/admin_api/chk_user_group', json_encode(array()));
                $data = array('status' => $api_re['status'] === TRUE?TRUE:FALSE);
                die(json_encode($data));
            }else{
                $param = array('group_name' => $post['group']);
                $api_re = $this->api_lib->call_api(API_PATH.'/mt4/admin_api/revert_mt4_user_group', json_encode($param));
                $this->api_lib->call_api(API_PATH.'/mt4/admin_api/chk_user_group', json_encode(array()));
                $data = array('status' => TRUE);
                die(json_encode($data));
            }
        }
        $api_re = $this->api_lib->call_api(API_PATH.'/mt4/admin_api/get_user_group_report', json_encode(array()));
        $data = array('content' => ($api_re['status'] === TRUE) ? $api_re['data'] : array());
        load_frame( __CLASS__, __FUNCTION__, $data);
    }

    public function io_transfer(){
        $data = array();
        if( ! empty($post = $this->input->post())){
            $this->load->library('mt4_com/mt4_com_lib');
            $in = $post['in_account'];
            $out = $post['out_account'];
            $amount = $post['amount'];
            $in_account_exists = $this->mt4_com_lib->check_id_exists($in);
            $out_account_exists = $this->mt4_com_lib->check_id_exists($out);
            if($in_account_exists['status'] == 0 || $out_account_exists['status'] == 0 ){
                $data = array('status' => FALSE, 'msg' => 'MT4帳號不存在');
                die(json_encode($data));
            }
            $ret = $this->mt4_com_lib->client_withdraw($out, $amount);
            if($ret['status'] != 0){
                $data = array('status' => FALSE, 'msg'=> '出金帳號餘額不足');
            }else{
                $this->mt4_com_lib->client_funding($in, $amount);
                $data = array('status' => TRUE);
            }
            die(json_encode($data));
        }
        load_frame( __CLASS__, __FUNCTION__, $data);
    }
}
