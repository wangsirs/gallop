<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* MT4
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

        //沒登入，就導回登入頁

        $is_login = (boolean)$this->session->userdata('login');
        if( ! $is_login || ! ib_lib::have_app($this->_app)){
            if($is_ajax){
                exit(json_encode('unauthorized'));
            }else{
                redirect(base_url('login'));
            }
        }
    }


    public function index(){
        $data = array(
            'username'=> ib_lib::full_name());
        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
    }

    /**
     * 客戶總覽
     */
    public function client_list(){
        $this->load->library('api_lib');
        $param = array(
            'ib_id' => ib_lib::ib_id());
        $api_re = $this->api_lib->call_api(API_PATH.'mt4/ib_api/clients', json_encode($param));
        $data = array('content'=>$api_re['data'],
            'username'=> ib_lib::full_name(),
            );
        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
    }

    /*
    *客戶之MT4明細
    */
    public function client_mt4s(){
        $user_id = $this->input->get('user_id');
        $this->load->library('api_lib');
        $param = array(
            'ib_id' => ib_lib::ib_id(),
            'user_id' => $user_id
            );
        $api_re = $this->api_lib->call_api(API_PATH.'mt4/ib_api/client_mt4s', json_encode($param));
        $data = array('content'=>$api_re['data']
            );
        $this->load->view('mt4/'.__FUNCTION__.'_view', $data);
    }

    /*
    *客戶MT4基本資料
    */
    public function client_profile(){
        $user_id = $this->input->get('user_id');
        $this->load->library('api_lib');
        $param = array(
            'user_id' => $user_id,
            'lang' => ib_lib::lang()
            );
        $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/detail', json_encode($param));
        $data = array(
            'info' => ($api_re['status'] === TRUE) ? $api_re['data'] : array()
            );
        $this->load->view('mt4/'.__FUNCTION__.'_view', $data);
    }
    
    /**
     * 顧問總覽
     */
    public function ib_list(){
        $this->load->library('api_lib');
        $param = array(
            'ib_id' => ib_lib::ib_id());
        if($get = $this->input->get()){
            $param = array('ib_id' => $get['ib_id']);
        }
        $api_re = $this->api_lib->call_api(API_PATH.'mt4/ib_api/ibs', json_encode($param));
        $data = array(
            'content'=>$api_re['data']
            );
        load_frame($this->_app, __CLASS__, __FUNCTION__, $data, TRUE);
    }

    /**
     * 觀看顧問資訊
     */
    public function ib_profile(){
        $this->load->library('api_lib');
        $get = $this->input->get();

        $param = array(
            'ib_id' => $get['ib_id'],
            'lang' => ib_lib::lang()
        );
        $api_re = $this->api_lib->call_api(API_PATH.'ib_api/detail', json_encode($param));
        $data['info'] = $api_re['data'];

        $param = array(
            'ib_id' => ib_lib::ib_id());
        $api_re = $this->api_lib->call_api(API_PATH.'mt4/ib_api/ibs', json_encode($param));
        if($api_re['status'] === TRUE){
            foreach($api_re['data'] as $key => $val){
                if($val['ib_id'] == $get['ib_id']){
                    $data['info'] = array_merge($data['info'], $val);
                }
            }
        }
        $data['info'] = array_merge($data['info'], array('introducer'=>ib_lib::ib_id()));
        $data['app'] = $this->_app;
        $this->load->view('mt4/'.__FUNCTION__.'_view', $data);
    }

    /**
     * 開戶報備
     */
    public function reg_report(){
        $data = array(
            'username'=> ib_lib::full_name(),
            );
        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
    }
    
    /**
     * 晉升記錄
     */
    public function promotion(){

    }

    /**
     * 個人業績
     */
    public function person_results(){       
        $this->load->library('api_lib');
        $flag = false;
        $param = array(
            'ib_id' => ib_lib::ib_id(),
            'st_day' => date('Y-m-d', 0),
            'end_day' => date('Y-m-d', time()),
            );

        if( !empty($get_array = $this->input->get())){
            $param['st_day'] = $get_array['st_day'];
            $param['end_day'] = $get_array['end_day'];
            $flag = true;
        }

        $api_re = $this->api_lib->call_api(API_PATH.'mt4/ib_api/clients_results', json_encode($param));

        $data = array(
            'content' => is_array($api_re['data']) ? $api_re['data'] : array(),
            'flag' => $flag
            );
        
        //每日 cron ，Demo 暫時放此
        $api_re = $this->api_lib->call_api(API_PATH.'mt4/ib_api/clients', json_encode(array('ib_id' => ib_lib::ib_id())));
        
        if(!empty($api_re)){
            foreach($api_re['data'] as $u){
                for($i = 0;$i< 15;$i++){
                    $api_re = $this->api_lib->call_api(API_PATH.'mt4/ib_api/count_cus_results', json_encode(array('user_id' => $u['user_id'], 'count_day' => date('Y-m-d', strtotime(date('Y-m-d'). '-'.$i.' days')))));
                }
            }
        }
        
        
        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);    
    }

    public function person_results_detail(){
        $user_id = $this->input->get('user_id');
        $this->load->library('api_lib');
        $param = array(
            'st_day' => date('Y-m-d', 0),
            'end_day' => date('Y-m-d', time()),
            'user_id' => $user_id,
            );
        $api_re = $this->api_lib->call_api(API_PATH.'mt4/ib_api/clients_results_detail', json_encode($param));
        $data = array('content'=>$api_re['data'],
            'username'=> ib_lib::full_name(),
            );
        $this->load->view('mt4/'.__FUNCTION__.'_view', $data);  
    }

    /**
     * 組織業績
     */
    public function org_results(){      
        $flag = false;
        $param = array();
        $this->load->library('api_lib');

        $param = array(
            'ib_id' => ib_lib::ib_id(),
            'st_day' => date('Y-m-d', 0),
            'end_day' => date('Y-m-d', time()),
            );

        if( !empty($get_array = $this->input->get())){
            if(! empty($get_array['ib_id'])){
                $param['ib_id'] = $get_array['ib_id'];
            }
            if(! empty($get_array['st_day']) && ! empty($get_array['end_day']) ){
                $param['st_day'] = $get_array['st_day'];
                $param['end_day'] = $get_array['end_day'];
                $flag = true;
            }
        }

        $api_re = $this->api_lib->call_api(API_PATH.'mt4/ib_api/org_results', json_encode($param));

        $data = array(
            'content' => is_array($api_re['data']) ? $api_re['data'] : array(),
            'flag' => $flag
            );
        
//        //每日 cron ，Demo 暫時放此
//        $api_re = $this->api_lib->call_api(API_PATH.'mt4/ib_api/clients', json_encode(array('ib_id' => ib_lib::ib_id())));
//        
//        if(!empty($api_re)){
//            foreach($api_re['data'] as $u){
//                for($i = 0;$i< 15;$i++){
//                    $api_re = $this->api_lib->call_api(API_PATH.'mt4/ib_api/count_cus_results', json_encode(array('user_id' => $u['user_id'], 'count_day' => date('Y-m-d', strtotime(date('Y-m-d'). '-'.$i.' days')))));
//                }
//            }
//        }
        
        
        load_frame($this->_app, __CLASS__, __FUNCTION__, $data, TRUE);
    }

    /**
     * 客戶出入金訊息
     */
    public function money_flow(){       
        $this->load->library('api_lib');
        $flag = FALSE;

        $param = array(
            'ib_id' => ib_lib::ib_id(),
            'com_id'  => COM_ID,
            );

        if( !empty($get_array = $this->input->get())){
            if(! empty($get_array['st_day']) && ! empty($get_array['end_day']) ){
                $param['st_day'] = $get_array['st_day'];
                $param['end_day'] = $get_array['end_day'];
                $flag = true;
            }
        }
        
        $api_re = $this->api_lib->call_api(API_PATH.'mt4/ib_api/client_money_history', json_encode($param));
        $data = array('content'=>$api_re['data'],
            'flag' => $flag
            );

        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
    }

    /**
     * 獎金計算
     */
    public function bonus_cal(){
        $data = array();
        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
    }

    /**
     * 獎金提領
     */
    public function bonus_withdraw(){
        $data = array('content'=> array(array('date'=>'2016/01/01',
            'type'=>'123',
            'assets_type'=>'出金',
            'price'=>'1000',
            'comment'=>'comment',
            'status'=>'Y',
            )),
            'username'=>ib_lib::full_name(),
            'ib_id'=>ib_lib::ib_id(),
        );
        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
    }
}
