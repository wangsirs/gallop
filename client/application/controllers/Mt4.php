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

        //FIXME:之後將 login check & userinfo 整合到 user helper
        //網址尾端帶 ?ajax=1 會辨識為 ajax 方式進入
        $is_ajax = ( ! empty($this->input->get('ajax')));

        //沒登入，就導回登入頁
        $this->load->library('session');
        $is_login = (boolean)$this->session->userdata('login');
        //不需檢查的 function (空陣列里面別殘留 '' )
        $list_skip = array();

        if( ! $is_login && ! in_array($this->uri->segment(3), $list_skip)){
            if($is_ajax){
                exit(json_encode('unauthorized'));
            }else{
                redirect(base_url('login'));
            }
        }
    }

    /**
     * 首頁
     */
    public function index()
    {
        $this->load->library('session');
        $list_btn = array(
            array('name' => '基本資料', 'url' => $this->_app.'/profile', 'icon' => 'basicInfo.png'),
            array('name' => '出入金查詢', 'url' => $this->_app.'/money_history', 'icon' => 'assets.png'),
            array('name' => '子帳號申請', 'url' => $this->_app.'/sub_mt4', 'icon' => 'multiUser.png'),
            array('name' => '密碼變更及忘記MT4密碼', 'url' => $this->_app.'/change_pw', 'icon' => 'lockandkey.png'),
            array('name' => '出金申請', 'url' => $this->_app.'/withdraw', 'icon' => 'bank_out.png'),
            array('name' => '存入資金', 'url' => $this->_app.'/funding', 'icon' => 'bank_in.png'),
            array('name' => '交易明細', 'url' => $this->_app.'/trade_history', 'icon' => 'tradeOrder.png'),
            array('name' => '帳戶互轉', 'url' => $this->_app.'/transfer', 'icon' => 'transfer.png'),

            );

        $data = array(
            'list_btn' => $list_btn,
            'row_num' => 4,
            );

        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
    }

    /**
     * 基本資料
     */
    public function profile()
    {
        $this->load->library('parser');

        $this->load->library('api_lib');
        $param = array(
            'user_id' => client_lib::user_id(),
            );

        $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/detail', json_encode($param));
        $info = $api_re['status'] === TRUE ? $api_re['data'] : array();

        //取得 MT4 清單
        $param = array(
            'user_id' => client_lib::user_id(),
            'only_approve' => '1'
            );
        $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/mt4s', json_encode($param));
        $list_mt4 = $api_re['status'] === TRUE ? $api_re['data'] : array();


        $this->load->helper('json');
        $json_arr = json_read(client_lib::user_id().'/', $this->_app.'_balance.json');

        $data = array(
            'common' => $this->parser->parse('common/'.__FUNCTION__.'_view', array(), TRUE), //共用的普通區塊
            'info' => $info,
            'mt4s' => $list_mt4,
            'balance' => @$json_arr['list']
            );



        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
    }

    public function refresh_balance(){
        $this->load->helper('json');

        $expired_sec = $this->config->item('mt4_balance'); //單位秒
        if(empty($expired_sec)){
            $expired_sec = 60;
        }
        $cache_path = client_lib::user_id().'/';
        $cache_fname = $this->_app.'_balance.json';
        $re = new stdClass();
        $re->status = FALSE;

        $json_arr = json_read($cache_path, $cache_fname);
        if(empty($json_arr)){
            $json_arr = array();
        }

        $bal_time = isset($json_arr['time']) ? intval($json_arr['time']) : 0;
        if(time() > $bal_time + $expired_sec){
            //取得用戶基本資訊
            $this->load->library('api_lib');
            $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/balance', json_encode(array('user_id' => client_lib::user_id())));

            if($api_re['status'] === TRUE){
                $json_arr = array(
                    'time' => time(),
                    'list' => $api_re['data']
                    );
                json_save($cache_path, $cache_fname, $json_arr);

                $re->status = TRUE;
            }elseif( ! empty($json_arr['list'])){
                //更新失敗，舊用 cache 內的舊資料
                error_log('balance reflush failed.:'.self::user_id());
            }
        }

        die(json_encode($re));
    }

    /**
     * 出金申請
     */
    public function withdraw()
    {
        $post = $this->input->post();
        $this->load->library('api_lib');
        if( ! empty($post)){

            $re = new stdClass();
            $re->status = FALSE;
            $re->msg = '';

            if( !isset($post['amount']) || !isset($post['mt4_id']) || !isset($post['note'])){
                $re->status = FALSE;
                $re->msg = 'lose some param';
                die(json_encode($re));
            }

            $param = array(
                'user_id' => client_lib::user_id(),
                );
            $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/detail', json_encode($param));

            $param = array(
                'com_id' => COM_ID,
                'user_id' => client_lib::user_id(),
                'amount' => $this->input->post('amount'),
                'mw_type' => '0',
                'mt4_id' => $this->input->post('mt4_id'),
                'lang' => client_lib::lang(),
                'note' => strip_tags($this->input->post('note'))
                );


            $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/withdraw', json_encode($param));

            $re->status = $api_re['status'];

            if($re->status === TRUE){
                $this->session->set_userdata('mw_id', $api_re['data']['mw_id']);
            }

            die(json_encode($re));
        }

        $param = array(
            'user_id' => client_lib::user_id(),
            'only_approve' => '1'
            );
        $api_re = $this->api_lib->call_api(API_PATH.'/mt4/client_api/mt4s', json_encode($param));
        $data = array(
            'mt4s' => $api_re['data']
            );

        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
    }

    /**
     * 出金申請 (OTP 驗證)
     */
    public function withdraw_otp()
    {
        $otp = $this->input->post('otp');
        if( ! empty($otp)){

            $re = new stdClass();
            $re->status = FALSE;
            $re->msg = '';

            $this->load->library('session');

            $this->load->library('api_lib');

            $mw_id = $this->session->userdata('mw_id');

            $param = array(
                'com_id' => COM_ID,
                'user_id' => client_lib::user_id(),
                'pincode' => $otp,
                'mw_id' => $mw_id
                );

            $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/withdraw_otp', json_encode($param));

            $re->status = $api_re['data']['vali'];

            if($re->status){

                $param = array(
                    'user_id' => client_lib::user_id(),
                    );

                $param = array(
                    'com_id' => COM_ID,
                    'mw_id' => $mw_id
                    );
                $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/withdraw_approve', json_encode($param));
                $re->status = $api_re['status'];
            }

            die(json_encode($re));
        }
        load_frame($this->_app, __CLASS__, __FUNCTION__);
    }

    /**
     * 存入資金
     */
    public function funding()
    {
        $post = $this->input->post();
        $this->load->library('api_lib');
        if( ! empty($post)){

            $re = new stdClass();
            $re->status = FALSE;
            $re->msg = '';

            if(empty($post['amount'])){
                $re->msg = 'need amount';
                die(json_encode($re));
            }

            $this->load->library('session');


            $param = array(
                'user_id' => client_lib::user_id(),
                );

            $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/detail', json_encode($param));

            $param = array(
                'com_id' => COM_ID,
                'user_id' => client_lib::user_id(),
                'mt4_id' => $this->input->post('mt4_id'),
                'mf_type' => '0',
                'amount' => $this->input->post('amount'),
                'note' => strip_tags($this->input->post('note'))
                );

            $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/funding', json_encode($param));
            $re->status = $api_re['status'];

            if($re->status === TRUE){
                $param = array(
                    'com_id' => COM_ID,
                    'mf_id' => $api_re['data']['mf_id']
                    );
                $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/funding_approve', json_encode($param));
                $re->status = $api_re['status'];
            }

            die(json_encode($re));
        }

        $param = array(
            'user_id' => client_lib::user_id(),
            'only_approve' => '1'
            );
        $api_re = $this->api_lib->call_api(API_PATH.'/mt4/client_api/mt4s', json_encode($param));
        $data = array(
            'mt4s' => $api_re['data']
            );

        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
    }

    /**
     * 選擇銀行匯款方式
     */
    public function bank_transfer(){
        $param = array(
            'user_id' => client_lib::user_id(),
            'only_approve' => '1'
            );
        $this->load->library('api_lib');
       $api_re = $this->api_lib->call_api(API_PATH.'/mt4/client_api/mt4s', json_encode($param));
        $data = array(
            'mt4s' => $api_re['data']
            );
        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
    }

    /**
     * 選擇銀聯卡匯款方式
     */
    public function union_pay(){
        //取得 MT4 清單
        $param = array(
            'user_id' => client_lib::user_id(),
            'only_approve' => '1'
            );
        $this->load->library('api_lib');
        $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/mt4s', json_encode($param));
        $list_mt4 = $api_re['status'] === TRUE ? $api_re['data'] : array();
        $data = array('username' => client_lib::full_name(),
            'main_mt4_id' => isset($list_mt4[0]['mt4_id'])?$list_mt4[0]['mt4_id'] : '',
            );
        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
    }

    /**
     * 出入金查詢
     */
    public function money_history()
    {
        $flag = FALSE;
        $this->load->library('api_lib');
        $param = array(
            'com_id' =>COM_ID,
            'user_id' => client_lib::user_id(),
            'st_day' => date('Y-m-d', 0),
            'end_day' => date('Y-m-d'),
            );
        if( !empty($get_array = $this->input->get())){
            $param['st_day'] = $get_array['st_day'];
            $param['end_day'] = $get_array['end_day'];
            $flag = TRUE;
        }
        $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/money_history', json_encode($param));
        $data = array('info' => ($api_re['status'] === TRUE) ? $api_re['data'] : array(),
            'flag'=>$flag);
        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
    }

    /**
     * 交易明細
     */
    public function trade_history(){
        $this->load->library('api_lib');
        $this->load->helper('json');

        $expire_time = $this->config->item('mt4_trade_history');
        $cache_path = client_lib::user_id().'/';
        $cache_fname = $this->_app.'_trade_history.json';

        $update_time = json_read($cache_path, $cache_fname);

        if(empty($update_time) || time() > intval($update_time) + $expire_time){
            $param = array(
                'user_id' => client_lib::user_id(),
                'st_day' => date('Y-m-d'),
                'end_day' => date('Y-m-d'),
                );

            $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/sync_trade_history', json_encode($param));

            json_save($cache_path, $cache_fname, time());
        }

        $param = array(
            'mt4_id' => '',
            'user_id' => client_lib::user_id(),
            'st_day' => date('Y-m-d', 0),
            'end_day' => date('Y-m-d'),
            );
        $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/trade_history', json_encode($param));

        // Download CSV file
        if( !empty($get = $this->input->get())){
            if($get['action'] == 'download'){
                $filename = __FUNCTION__.'_'.date('Ymd_Hi', time()).'.'.$get['filetype'];
                $title = array();
                if($get['filetype'] == 'csv'){
                    if(count($api_re['data'] > 0)){
                        $this->lang->load($this->_app, client_lib::lang());
                        foreach(array_keys($api_re['data'][0]) as $val){
                           $tmp = lang($this->_app.'_trade_'.$val);
                           array_push($title, $tmp);
                       }
                   }
                   $this->load->library('export_lib');
                   $this->export_lib->export_csv($api_re['data'], $filename, $title);
               }
           }
       }
       $data = array('list' => ($api_re['status'] === TRUE) ? $api_re['data'] : array(),'app'=>__CLASS__,'method'=>__FUNCTION__);
       load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
   }

    /**
     * 資金內部互轉
     */
    public function transfer(){

        $post = $this->input->post();
        $this->load->library('api_lib');
        if( ! empty($post)){

            $re = new stdClass();
            $re->status = FALSE;
            $re->msg = '';

            if(! is_numeric($post['amount'])){
                $re->msg = 'need amount';
                die(json_encode($re));
            }

            if($post['mt4_id'] == $post['target_mt4_id']){
                $re->msg = 'same account';
                die(json_encode($re));
            }

            $param = array(
                'user_id' => client_lib::user_id(),
                );

            $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/detail', json_encode($param));

            $param = array(
                'com_id' => COM_ID,
                'user_id' => client_lib::user_id(),
                'mt4_id' => $this->input->post('mt4_id'),
                'target_mt4_id' => $this->input->post('target_mt4_id'),
                'amount' => $this->input->post('amount'),
                'note' => strip_tags($this->input->post('note'))
                );

            $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/transfer', json_encode($param));
            $re->status = $api_re['status'];

            if($re->status === TRUE){
                $param = array(
                    'com_id' => COM_ID,
                    'mmt_id' => $api_re['data']['mmt_id']
                    );
                $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/transfer_approve', json_encode($param));
                $re->status = $api_re['status'];
            }

            die(json_encode($re));
        }

        $this->load->library('api_lib');

        $param = array(
            'user_id' => client_lib::user_id(),
            'only_approve' => '1'
            );
        $api_re = $this->api_lib->call_api(API_PATH.'/mt4/client_api/mt4s', json_encode($param));
        $data = array(
            'mt4s' => $api_re['data']
            );

        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
    }

    /**
     * mt4 更改密碼介面
     */
    public function change_pw(){
        $this->load->library('session');
        $this->load->library('api_lib');

        $api_re = $this->api_lib->call_api(API_PATH.'/mt4/client_api/mt4s', json_encode(array('user_id' => client_lib::user_id(),'only_approve' => '1')));
        $data = array(
            'mt4s' => $api_re['data']
            );
        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
    }

    /**
     * mt4 更改一般登入密碼確認
     */
    public function change_pw_conf(){
        $re = new stdClass();
        $post = $this->input->post();
        $old_pw = $post['old_pw'];
        $new_pw = $post['pwd'];
        $new_pw_conf = $post['pwd_conf'];
        if(empty($old_pw) || empty($new_pw) || empty($new_pw_conf) || strcmp($new_pw, $new_pw_conf) != 0 ){
            $re->status = FALSE;
            die(json_encode($re));
        }
        $param = array(
            'user_id' => client_lib::user_id(),
            'old_pass' => $old_pw,
            'new_pass' => $new_pw,
            );

        $this->load->library('api_lib');
        $api_re = $this->api_lib->call_api(API_PATH.'/client_api/update_pw', json_encode($param));
        $re->status = ($api_re['status'] === TRUE)? TRUE: FALSE;
        $re->msg = ! empty($api_re['data']) ? $api_re['data'] : '';
        die(json_encode($re));
    }

    /**
     * 還原mt4 app主密碼
     */
    public function change_mt4_pw(){
        $re = new stdClass();
        $re->status = FALSE;

        $param = array(
            'user_id' => client_lib::user_id(),
            'mt4_id' => $this->input->post('mt4_id'),
            );
        $this->load->library('api_lib');
        $api_re = $this->api_lib->call_api(API_PATH.'/mt4/client_api/reset_pw', json_encode($param));
        $re->status = ($api_re['status'] === TRUE)? TRUE: FALSE;
        $re->msg = ! empty($api_re['data']) ? $api_re['data'] : '';
        die(json_encode($re));
    }

    /**
     * 子帳號申請 畫面
     */
    public function sub_mt4(){
        $post = $this->input->post();

        $this->load->library('api_lib');
        if( ! empty($post)){
            $re = new stdClass();
            $re->status = FALSE;

            $param = array(
                'user_id' => client_lib::user_id(),
                'leverage' => $this->input->post('leverage'),
                'mod_user' => 'E00001',
                'follow' => $this->input->post('follow'),
                'follow_auth' => $this->input->post('follow_auth') == '1' ? '1' : '0',
                'note' => strip_tags($this->input->post('note'))
                );

            $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/add_sub_mt4', json_encode($param));

            if($api_re['status'] === TRUE){
                $param = array(
                    'user_id' => client_lib::user_id(),
                    'mt4_id' => $api_re['data']['mt4_id']
                    );
                $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/approve', json_encode($param));
                $re->status = TRUE;
            }

            die(json_encode($re));
        }

        //list mt4
        $param = array(
            'user_id' => client_lib::user_id()
            );
        $api_re = $this->api_lib->call_api(API_PATH.$this->_app.'/client_api/mt4s', json_encode($param));
        $data = array(
            'mt4s' => $api_re['status'] === TRUE ? $api_re['data'] : array()
            );


        load_frame($this->_app, __CLASS__, __FUNCTION__, $data);
    }
}
