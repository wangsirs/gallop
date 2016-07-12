<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * MT4 客戶 API
 * @package         gallop
 * @subpackage      User
 * @category        Controller
 * @author          bs
 */
class client_api extends REST_Controller {

    private $_app_id = 'mt4';
    
    function __construct(){
        parent::__construct();

        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['info_get']['limit'] = 1; // 500 requests per hour per user/key
                
        $this->load->model($this->_app_id.'/user_model');        
    }  
        
    /**
     * 新增 MT4 客戶
     * @author bs
     * @param array $post 基礎客戶資料+應用程式資料
     *  (user_name,com_id,pwd,first_name,last_name,nickname,passport,mod_user,ib_id,email,<br>
     * gender,birthday,marital,nationality,country,zip,city,state,address,phone,cell_phone,<br>
     * first_deposit,passport_path,bank_path,resident_path,leverage,follow_auth,follow,note,mod_user)
     * or
     *  (user_id,leverage,follow_auth,follow,note,mod_user)
     */
    public function add_post(){
        $post = $this->post();
        
        //挑出 app 資料
        $app_data = array();
        //必要
        foreach(array('leverage', 'mod_user') as $field){
            if( ! isset($post[$field]) || empty($post[$field]) && $post[$field] !== '0'){
                $this->set_response('Parameter is required:'.$field, 201);
                return FALSE;
            }
            $app_data[$field] = $post[$field];
        }
        //次要
        foreach(array('follow_auth', 'follow', 'note') as $field){
            if(empty($post[$field])) continue;
            $app_data[$field] = $post[$field];
        }
        
        //檢查基本資料
        include_once APPPATH.'libraries/User_share_lib.php';
        if(isset($post['user_id']) && ! empty($post['user_id'])){
            $info = user_share_lib::info($post['user_id']);
            if(empty($info)){
                $this->set_response('User not exist:'.$post['user_id'], 202);
                return FALSE;
            }
            
            $app_data['user_id'] = $post['user_id'];
            $base_data = array();
            
            $is_old_user = user_model::USER_OLD;
        }else{
            list($err_msg, $base_data) = user_share_lib::add_user_chk($post);
            if( ! empty($err_msg)){
                $this->set_response($err_msg, 202);
                return FALSE;
            }
            
            //產生 user_id
            if(empty($base_data['user_id']))
            {
                $this->set_response('gen user_id failed.', 301);
                return FALSE;
            }
            $app_data['user_id'] = $base_data['user_id'];
            $is_old_user = user_model::USER_NEW;
        }
        
        //產生 mt4_id
        $mt4_id = $this->user_model->gen_mt4_id();
        $app_data['mt4_id'] = $mt4_id;
        
        //產生唯讀密碼
        $app_data['pw_read'] = $this->user_model->gen_mt4_read_pwd();

        $app_data['is_child'] = 0;
        
        //檢查 MT4 用戶資料
//        echo '<pre>';
//        var_dump($base_data);
//        echo '</pre>';
//        echo '<pre>';
//        var_dump($app_data);
//        echo '</pre>';
        //寫入        
        if( ! $this->user_model->add($base_data, $app_data, $is_old_user)){
            $this->set_response('Add user failed.', 302);
            return FALSE;
        }
        
        $this->set_response(array('user_id' => $app_data['user_id'], 'mt4_id' => $mt4_id), REST_Controller::HTTP_OK);
    }
    
    /**
     * 審核 MT4 帳號
     */
    public function approve_post(){
        $user_id = $this->post('user_id');
        $mt4_id = $this->post('mt4_id');
        
        if(empty($user_id) || empty($mt4_id)){
            $this->set_response('lose some param.', 201);
            return FALSE;
        }
        
        //檢查是否有未驗證的 MT4 帳號
        $info = $this->user_model->no_approve($mt4_id, $user_id);
//        echo '<pre>';
//        var_dump($info);
//        echo '</pre>';
        
        if(empty($info)){
            $this->set_response('No account havent approved.', 202);
            return FALSE;
        }
        
        //審核必填欄位
        $require_field = array('first_name', 'last_name', 'pwd', 'birthday', 'email', 'country', 'city', 'address', 'cell_phone', 'zip', 'mt4_id', 'leverage');
        foreach($require_field as $field){
            if( ! isset($info[$field]) || empty($info[$field])){
                $this->set_response('MT4 require parameter is empty:'.$field, 203);
                return FALSE;
            }
        }
        
        //產生主密碼 (pwd + 生日4碼)
        $main_pw = $info['pwd'].date('md', strtotime($info['birthday']));
        
        //新增 MT4 帳號
        include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
        
        $mt4_com = new mt4_com_lib();
        
        //MT4顯示的名稱
        $name = $info['first_name'].' '.$info['last_name'];
        if(!empty($info['note'])){
            $name .= '('.substr($info['note'], 0, 128 - 3 - strlen($name)).')';
        }
        
        $mt4_data = array(
			'group' => 'All-Hedge',
			'name' => $name,
			'password' => $main_pw, //要存在大小寫
			'read_password' => $info['pw_read'], //要存在大小寫
			'email' => $info['email'],
			'country' => $info['country'],
			'state' => $info['city'],
			'city' => $info['city'],
			'address' => $info['address'],
			'comment' => $info['is_child'] == '1' && empty($info['note']) ? 'sub mt4' : $info['note'],
			'phone' => $info['cell_phone'],
			'phone_password' => $info['pwd'].'_p',
			'status' => 'RE',
			'zipcode' => $info['zip'],
			'id' => $info['mt4_id'],
			'leverage' => $info['leverage'],
			'agent' => '',
			'send_reports' => '1',
			'deposit' => '0',
			'REMOTE_ADDR' => $_SERVER['SERVER_ADDR'],
		);
//        echo '<pre>';
//        var_dump($mt4_data);
//        echo '</pre>';
        
        $mt4_re = $mt4_com->add_user($mt4_data);
//        echo '<pre>';
//        var_dump($mt4_re);
//        echo '</pre>';
        
        //account exist 也給過
        if( ! in_array((int)$mt4_re['status'], array(mt4_com_lib::RET_SUCCESS, mt4_com_lib::LOGIN_ID_EXISTS))){
            $this->set_response('MT4 add_user failed:'.$mt4_re['status'], 301);
            return FALSE;
        }
        
        //加入應用程式關聯
        if($info['is_child'] == '0'){
            include_once APPPATH.'libraries/User_share_lib.php';
            if( ! user_share_lib::add_to_app_model($info['com_id'], $user_id, $this->_app_id)){
                $this->set_response('user join app failed.', 302);
                return FALSE;
            }
        }
        
        //更新驗證
        if( ! $this->user_model->approve($mt4_id, $user_id)){
            $this->set_response('update mt4 approve failed.', 303);
            return FALSE;
        }
        
        $this->set_response('OK', REST_Controller::HTTP_OK);
    }
    
    /**
     * 取得 MT4 客戶詳細資訊
     * @author bs
     * @param string $user_id 會員帳號
     * @return array 單一會員資料清單
     */
    public function detail_post(){
        $user_id = $this->post('user_id');
        if(empty($user_id)){
            $this->set_response('param is empty.', 201);
            return FALSE;
        }
        
        $user_info = $this->user_model->detail($user_id);
        
        $this->set_response($user_info, REST_Controller::HTTP_OK);
    }
    
    /**
     * 入金
     */
    public function funding_post(){
        $post = $this->post();
        //建立基本客戶
        include_once APPPATH.'libraries/Money_share_lib.php';
        
        
        list($err_msg, $data) = money_share_lib::add_funding_chk($post);
        if( ! empty($err_msg)){
            $this->set_response($err_msg, 201);
            return FALSE;
        }
        
        if(empty($post['mt4_id']) || empty($post['user_id']))
        {
            $this->set_response('neet mt4_id and user_id.', 202);
            return FALSE;
        }
        
        $list_mt4_id = $this->user_model->list_mt4_id($post['user_id']);
        if( ! in_array($post['mt4_id'], $list_mt4_id)){
            $this->set_response('This user havnt the mt4 id.', 203);
            return FALSE;
        }
        
        $this->load->model($this->_app_id.'/money_model');
        $mf_id = $this->money_model->add_funding($this->_app_id, $post['mt4_id'], $data);
        if( ! $mf_id){
            $this->set_response('add funding failed.', 301);
            return FALSE;
        }
        
        $this->set_response(array('mf_id' => $mf_id), REST_Controller::HTTP_OK);
    }
    
    /**
     * 入金審核
     * @param string $com_id 公司編號
     * @param string $mf_id 入金單流水號
     */
    public function funding_approve_post(){
        $com_id = $this->post('com_id');
        $mf_id = $this->post('mf_id');
        
        
        if(empty($com_id) || empty($mf_id)){
            $this->set_response('lose some param.', 201);
            return FALSE;
        }
        
        $this->load->model($this->_app_id.'/money_model');        
        $data = $this->money_model->get_funding_no_approve($com_id, $mf_id);
        if(empty($data)){
            $this->set_response('This funding is past or not exists.', 202);
            return FALSE;
        }
        
        //與MT4溝通
        include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
        $mt4_com = new mt4_com_lib();
        $mt4_re = $mt4_com->client_funding($data['mt4_id'], $data['amount']);
//        echo '<pre>';
//        var_dump($mt4_re);
//        echo '</pre>';
        
        //account exist 也給過
        if( ! in_array((int)$mt4_re['status'], array(mt4_com_lib::RET_SUCCESS))){
            
            //$this->money_model->update_funding_status($com_id, $mf_id, money_model::FA_FAILED);
            
            $this->set_response('MT4 funding failed:'.$mt4_re['status'].',mt4_id='.$data['mt4_id'], 301);
            return FALSE;
        }
        
        //更新驗證
        if( ! $this->money_model->update_funding_status($com_id, $mf_id, money_model::FA_SUCCESS)){
            //入金成功，但狀態更新失敗，須特別註記
            logger_warn(__CLASS__, __FUNCTION__, 'MT4 funding success, but log update failed. mf_id='.$mf_id);
            
            $this->set_response('update mt4 approve failed.', 302);
            return FALSE;
        }
        
        $this->set_response('OK', REST_Controller::HTTP_OK);
    }
    
    /**
     * 出金
     * @param string $com_id 公司編號
     * @param string $user_id 客戶編號
     * @param string $mw_type 出金方式
     * @param string $amount 金額
     * @param string $mt4_id mt4客戶編號
     * @param string $lang 語系
     */
    public function withdraw_post(){
        
        $post = $this->post();
        //建立基本客戶
        include_once APPPATH.'libraries/Money_share_lib.php';
        
        
        list($err_msg, $data) = money_share_lib::add_withdraw_chk($post);
        if( ! empty($err_msg)){
            $this->set_response($err_msg, 201);
            return FALSE;
        }
        
        if(empty($post['mt4_id']) || empty($post['user_id']))
        {
            $this->set_response('neet mt4_id and user_id.', 202);
            return FALSE;
        }
        $list_mt4_id = $this->user_model->list_mt4_id($post['user_id']);
        if( ! in_array($post['mt4_id'], $list_mt4_id)){
            $this->set_response('This user havnt the mt4 id.', 203);
            return FALSE;
        }
        
                
        $this->load->model($this->_app_id.'/money_model');
        $mw_id = $this->money_model->add_withdraw($this->_app_id, $post['mt4_id'], $data);
        if( ! $mw_id){
            $this->set_response('add withdraw failed.', 301);
            return FALSE;
        }
                
        if(empty($post['lang']))
        {
            $this->set_response('neet lang.', 206);
            return FALSE;
        }
        
        //發送 otp        
        include_once APPPATH.'libraries/Pincode_lib.php';
        $pincode_obj = new pincode_lib();
        $pincode = $pincode_obj->get($post['com_id'], $post['user_id'], 'withdraw');
        
        //取得客戶資訊        
        $user_info = $this->user_model->detail($post['user_id']);
                
        //發送信件
        $this->load->library('email_lib');
        $this->lang->load('client', $post['lang']);
        $email_re = $this->email_lib->send($user_info['email'], lang('client_wd_mail_sub'), sprintf(lang('client_wd_mail_content'), $pincode), FALSE);
        
        //發送簡訊
        $this->load->library('phone_lib');
        $this->lang->load('client', $post['lang']);
        $sms_re = $this->phone_lib->sms($user_info['cell_phone'], lang('client_wd_mail_sub').' : '.sprintf(lang('client_wd_mail_content'), $pincode));
        
        //FIXME: return 值不是 boolean
//        if( ! $email_re && ! $sms_re){
//            $this->set_response('Send email and SMS failed.email='.$user_info['email'].'|cell_phone='.$user_info['cell_phone'], 302);
//            return FALSE;
//        }
        
        $this->set_response(array('mw_id' => $mw_id), REST_Controller::HTTP_OK);
    }
    
    /**
     * 出金
     * @param string $com_id 公司編號
     * @param string $user_id 客戶編號
     * @param string $pincode Pincode
     */
    public function withdraw_otp_post(){
        $com_id = $this->post('com_id');
        $user_id = $this->post('user_id');
        $pincode = $this->post('pincode');
        $mw_id = $this->post('mw_id');
        
        if(empty($mw_id)){
            $this->set_response('lose param : mw_id', 201);
            return FALSE;
        }
        
        //驗證 otp
        include_once APPPATH.'libraries/Pincode_lib.php';
        $pincode_obj = new pincode_lib();
        $re = $pincode_obj->vali($com_id, $user_id, 'withdraw', $pincode); 
        
        
        //更新驗證
        $this->load->model($this->_app_id.'/money_model');    
        if( ! $this->money_model->update_withdraw_status($com_id, $mw_id, money_model::MA_READY)){
            
            $this->set_response('update mt4 approve failed.', 302);
            return FALSE;
        }
        
        $this->set_response(array('vali' => $re), REST_Controller::HTTP_OK);        
    }
    
    /**
     * 出金 審核
     * @param string $com_id 公司編號
     * @param string $mw_id 出金單流水號
     */
    public function withdraw_approve_post(){
        $com_id = $this->post('com_id');
        $mw_id = $this->post('mw_id');        
        
        if(empty($com_id) || empty($mw_id)){
            $this->set_response('lose some param.', 201);
            return FALSE;
        }
        
        $this->load->model($this->_app_id.'/money_model');        
        $data = $this->money_model->get_withdraw_no_approve($com_id, $this->_app_id, $mw_id);
        if(empty($data)){
            $this->set_response('This withdraw is past or not exists.', 202);
            return FALSE;
        }
        
        //與MT4溝通
        include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
        $mt4_com = new mt4_com_lib();
        $mt4_re = $mt4_com->client_withdraw($data['mt4_id'], $data['amount']);
//        echo '<pre>';
//        var_dump($mt4_re);
//        echo '</pre>';
        
        //account exist 也給過
        if( ! in_array((int)$mt4_re['status'], array(mt4_com_lib::RET_SUCCESS))){
            
            //$this->money_model->update_withdraw_status($com_id, $mf_id, money_model::MA_FAILED);
            
            $this->set_response('MT4 funding failed:'.$mt4_re['status'].',mt4_id='.$data['mt4_id'], 301);
            return FALSE;
        }
        
        //更新驗證
        if( ! $this->money_model->update_withdraw_status($com_id, $mw_id, money_model::MA_SUCCESS)){
            //入金成功，但狀態更新失敗，須特別註記
            logger_warn(__CLASS__, __FUNCTION__, 'MT4 funding success, but log update failed. mf_id='.$mw_id);
            
            $this->set_response('update mt4 approve failed.', 302);
            return FALSE;
        }
        
        $this->set_response('OK', REST_Controller::HTTP_OK);        
    }

    /**
     * 取得餘額(最今餘額、即時寫入DB)
     * @param string $user_id 客戶編號
     * @return array (bal=>string)
     */
    public function balance_post(){
        $user_id = $this->post('user_id');
        if(empty($user_id)){
            $this->set_response('lose some param.', 201);
            return FALSE;
        }

        //務必使用有排序的 mt4 清單
        $list_mt4 = $this->user_model->list_mt4($user_id, TRUE);
        if(empty($list_mt4)){
            $this->set_response('get mt4 list failed.', 301);
            return FALSE;
        }
        
        //與MT4溝通
        include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
        $mt4_com = new mt4_com_lib();
        
        $list_balance = array();
        $list_balance_to_db = array();
        foreach($list_mt4 as $mt4){
            $mt4_re = $mt4_com->get_client_asset($mt4['mt4_id']);
            if( ! in_array((int)$mt4_re['status'], array(mt4_com_lib::RET_SUCCESS))){
                $this->set_response('Get client asset failed:'.$mt4_re['status'].',mt4_id='.$mt4['mt4_id'], 301);
                return FALSE;
            }
            
            $list_balance[$mt4['mt4_id']] = array(
                    'mt4_id'=> $mt4['mt4_id'],
                    'balance' => $mt4_re['data']
            );
            
            $list_balance_to_db[] = array(
                'mt4_id' => $mt4['mt4_id'],
                'balance' => $mt4_re['data']
            );
        }
        
        //寫入資料庫
        $this->user_model->update_balance($list_balance_to_db);
        
        $this->set_response($list_balance, REST_Controller::HTTP_OK);   
    }

    /**
     * 更新餘額 by page
     * @param int $page 頁碼(從 1 開始)
     * @return boolean
     */
    public function sync_balance_post(){
        $auto = boolval($this->post('auto'));
        $reset = boolval($this->post('reset'));
        $page = $this->post('page');
        $num = 100;
        
        $json_path = 'cron/';
        $json_fname = date('Y-m-d').'_sync_balance.json';
        
        if($reset){
            json_drop($json_path, $json_fname);
            $this->set_response('Reset Success!', REST_Controller::HTTP_OK);
            return FALSE;
        }
        
        $json_data = json_read($json_path, $json_fname);
        if(empty($json_data)){
            $json_data = array();
        }
        
        if($auto){
            $page = isset($json_data['page']) ? intval($json_data['page'])+1 : 1;
        }elseif($page !== '' && $page !== NULL && intval($page) < 1){
            $this->set_response('page range 1~n', 201);
            return FALSE;
        }
        
        $list_mt4_id = $this->user_model->list_mt4_id_by_page(intval($page), $num);
        if(empty($list_mt4_id)){
            $json_data['empty'] = array(
                'page' => $page
            );
            
            json_save($json_path, $json_fname, $json_data);
            $this->set_response('empty, page='.$page, REST_Controller::HTTP_OK);
            return FALSE;
        }
        
        //與MT4溝通
        include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
        $mt4_com = new mt4_com_lib();
        
        $list_balance_to_db = array();
        foreach($list_mt4_id as $mt4_id){
            $mt4_re = $mt4_com->get_client_asset($mt4_id);
            if( ! in_array((int)$mt4_re['status'], array(mt4_com_lib::RET_SUCCESS))){
                $this->set_response('Get client asset failed:'.$mt4_re['status'].'|mt4_id='.$mt4_id, 301);
                return FALSE;
            }
            
            $list_balance_to_db[] = array(
                'mt4_id' => $mt4_id,
                'balance' => $mt4_re['data']
            );
        }
        
        //寫入資料庫
        $re = $this->user_model->update_balance($list_balance_to_db);
        
        if($re){
            $json_data['page'] = $page;
        }else{
            $json_data['err'][] = array(
                'page' => $page,
                'time' => date('Y-m-d H:i:s'),
                'list' => $list_balance_to_db
            );
        }
        
        json_save($json_path, $json_fname, $json_data);
          
        $this->set_response(array('page' => $page), $re ? REST_Controller::HTTP_OK : 301);
    }
    
    /**
     * 取得出入金訊息
     * @todo 出入金時間要使用哪一個? 待 PM 確認
     * @todo 幣別
     * @param string $com_id 公司編號
     * @param string $user_id 客戶編號
     * @param string $st_day 開始日期 y-m-d
     * @param string $end_day 結束日期 y-m-d
     */
    public function money_history_post(){
        $com_id = $this->post('com_id');
        $user_id = $this->post('user_id');
        $st_day = $this->post('st_day');
        $end_day = $this->post('end_day');
        
        if ( ! preg_match("/\d{4}\-\d{2}-\d{2}/", $st_day) || ! preg_match("/\d{4}\-\d{2}-\d{2}/", $end_day)) {
            $this->set_response('Wrong date format Y-m-d.', 201);
            return FALSE;
        }
        
        $this->load->model($this->_app_id.'/money_model');        
        $data = $this->money_model->history($this->_app_id, $com_id, $user_id, $st_day, $end_day);
        
        $this->set_response($data, REST_Controller::HTTP_OK);   
    }
    
    /**
     * 取得客戶交易資訊
     * @param string $user_id 客戶編號
     * @param string $mt4_id MT4編號 (不指定就撈全部)
     * @param string $st_day 開始日期 y-m-d
     * @param string $end_day 結束日期 y-m-d
     */
    public function trade_history_post(){
        $user_id = $this->post('user_id');
        $mt4_id = $this->post('mt4_id');
        $st_day = $this->post('st_day');
        $end_day = $this->post('end_day');
        
        if(empty($user_id)){
            $this->set_response('lose some param.', 201);
            return FALSE;
        }
        
        if ( ! preg_match("/\d{4}\-\d{2}-\d{2}/", $st_day) || ! preg_match("/\d{4}\-\d{2}-\d{2}/", $end_day)) {
            $this->set_response('Wrong date format Y-m-d.', 202);
            return FALSE;
        }
        
        //取得 mt4_id 清單 by user_id
        $list_mt4_id = $this->user_model->list_mt4_id($user_id);
        if( ! empty($mt4_id) && ! in_array($mt4_id, $list_mt4_id)){
            $this->set_response('mt4_id isnt match user_id.', 203);
            return FALSE;
        }
        
        if( ! empty($mt4_id)){
            $list_mt4_id = array($mt4_id);
        }
        
        $this->load->model($this->_app_id.'/trade_model');
        
        //撈取指定範圍資料
        $list = $this->trade_model->list_histroy($list_mt4_id, $st_day, $end_day);            
        
        $this->set_response($list, REST_Controller::HTTP_OK);   
    }

    /**
     * 同步交易歷史
     */
    public function sync_trade_history_post(){
        $user_id = $this->post('user_id');
        $st_day = $this->post('st_day');
        $end_day = $this->post('end_day');

        if ( ! preg_match("/\d{4}\-\d{2}-\d{2}/", $st_day) || ! preg_match("/\d{4}\-\d{2}-\d{2}/", $end_day)) {
            $this->set_response('Wrong date format Y-m-d.', 202);
            return FALSE;
        }
        
        //自動模式 init ------------------------------------------------------------------
        $auto = boolval($this->post('auto'));
        $reset = boolval($this->post('reset'));
        $page = $this->post('page');
        $num = 100;
        $half_auto = ($auto || $reset || ! is_null($page));
        
        if($half_auto){
            $json_path = 'cron/';
            $json_fname = date('Y-m-d').'_sync_trade_history.json';

            if($reset){
                json_drop($json_path, $json_fname);
                $this->set_response('Reset Success!', REST_Controller::HTTP_OK);
                return FALSE;
            }

            $json_data = json_read($json_path, $json_fname);
            if(empty($json_data)){
                $json_data = array();
            }

            if($auto){
                $page = isset($json_data['page']) ? intval($json_data['page'])+1 : 1;
            }elseif($page !== '' && !is_null($page) && intval($page) < 1){
                $this->set_response('page range 1~n', 201);
                return FALSE;
            }

            $list_mt4_id = $this->user_model->list_mt4_id_by_page(intval($page), $num);
            if(empty($list_mt4_id)){
                $json_data['empty'] = array(
                    'page' => $page
                );

                json_save($json_path, $json_fname, $json_data);
                $this->set_response('empty, page='.$page, REST_Controller::HTTP_OK);
                return FALSE;
            }
        }
        //end 自動模式 init ------------------------------------------------------------------
        
        //有指定 user_id 就只撈 該會員的 mt4_id 清單
        if(!empty($user_id)){
            $list_mt4_id = $this->user_model->list_mt4_id($user_id);
        }
        
        //與MT4溝通
        include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
        $mt4_com = new mt4_com_lib();
        
        $this->load->model($this->_app_id.'/trade_model');
        
        $count_err = 0;
        foreach($list_mt4_id as $mt4_id){
            $end_day = date('Y-m-d', strtotime($end_day . "+1 day"));
            $mt4_re = $mt4_com->get_client_trade_history($mt4_id, strtotime($st_day), strtotime($end_day));
            
            $err_msg = '';
            //允許失敗，直接跳過並記錄
            if((int)$mt4_re['status'] !== mt4_com_lib::RET_SUCCESS){
                $err_msg = 'Get get_client_trade_history failed:'.$mt4_re['status'];
            }

            //寫入資料庫
            if( ! empty($mt4_re['data'])){
                $batch_re = $this->trade_model->add($mt4_re['data'], $mt4_id);
                if(is_int($batch_re)){
                    $err_msg = 'Insert MT4 trade log partially success. Mt4_com='.count($mt4_re['data']).',Insert='.$batch_re;
                }elseif(FALSE === $batch_re){
                    $err_log = 'Insert MT4 trade log failed.';
                }
            }
        
            if(!empty($err_msg)){
                $count_err++;
                if($half_auto){
                    $json_data['err'][] = array(
                        'page' => $page,
                        'time' => date('Y-m-d H:i:s'),
                        'msg' => $err_msg.'|mt4_id='.$mt4_id
                    );
                }else{
                    logger_err(__CLASS__, __FUNCTION__, $err_msg.'|mt4_id='.$mt4_id);
                }
            }
            
        }
        if($half_auto){
            //沒錯誤才更新頁碼
            if($count_err === 0) $json_data['page'] = $page;
            
            json_save($json_path, $json_fname, $json_data);
            
            $this->set_response(array('page' => $page), $count_err === 0 ? REST_Controller::HTTP_OK : 301);
            return FALSE;
        }
        
        if($count_err > 0){
            $this->set_response(array('count_error' => $count_err), 301);
            return FALSE;
        }
        
        $this->set_response('OK', REST_Controller::HTTP_OK);
    }
    
    /**
     * 還原交易密碼
     * @param string $user_id 客戶編號
     * @param string $mt4_id MT4編號
     */
    public function reset_pw_post(){
        $user_id = $this->post('user_id');
        $mt4_id = $this->post('mt4_id');
        
        if(empty($user_id)){
            $this->set_response('lose user_id.', 201);
            return FALSE;
        }
        
        $list_mt4_id = $this->user_model->list_mt4_id($user_id);
        if( ! in_array($mt4_id, $list_mt4_id)){
            $this->set_response('This user havnt the mt4 id.', 202);
            return FALSE;
        }
        
        $detail = $this->user_model->detail($user_id);
        if(empty($detail)){
            $this->set_response('get user detail failed.', 301);
            return FALSE;
        }
        
        //新增 MT4 帳號
        include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
        $mt4_com = new mt4_com_lib();
        $mt4_re = $mt4_com->change_pw($mt4_id, mt4_com_lib::CPW_MAIN, $detail['pwd'].date('md', strtotime($detail['birthday'])));
        
        if((int)$mt4_re['status'] !== mt4_com_lib::RET_SUCCESS){
            $this->set_response('mt4 change password failed:'.$mt4_re['status'].',mt4_id='.$mt4_id, 301);
            return FALSE;
        }
        
        $this->set_response('OK', REST_Controller::HTTP_OK);   
    }
    
    /**
     * 取得客戶 mt4 帳號清單
     * @param string $user_id 客戶編號
     * @return array
     */
    public function mt4s_post(){
        $user_id = $this->post('user_id');
        $only_approve = $this->post('only_approve') == '1';
        
        if(empty($user_id)){
            $this->set_response('lose user_id.', 201);
            return FALSE;
        }
        
        $list_mt4_id = $this->user_model->list_mt4($user_id, $only_approve);
        if(empty($list_mt4_id)){
            $this->set_response('get mt4 list failed.', 301);
            return FALSE;
        }
        
        $this->set_response($list_mt4_id, REST_Controller::HTTP_OK);          
    }
    
    /**
     * 新增子帳號申請
     * @param string $user_id 客戶編號
     * @return boolean
     */
    public function add_sub_mt4_post(){
        $user_id = $this->post('user_id');
        if(empty($user_id)){
            $this->set_response('lose user_id.', 201);
            return FALSE;
        }
        
        //檢查是否有申請中的子帳號
        if($this->user_model->chk_sub_mt4_need_approve($user_id)){
            $this->set_response('Your new sub mt4 request is exist.', 202);
            return FALSE;
        }
        
        $post = $this->post();
        
        //挑出 app 資料
        $app_data = array();
        //必要
        foreach(array('leverage', 'mod_user') as $field){
            if( ! isset($post[$field]) || empty($post[$field]) && $post[$field] !== '0'){
                $this->set_response('Parameter is required:'.$field, 201);
                return FALSE;
            }
            $app_data[$field] = $post[$field];
        }
        //次要
        foreach(array('follow_auth', 'follow', 'note') as $field){
            if(empty($post[$field])) continue;
            $app_data[$field] = $post[$field];
        }
        
        $app_data['user_id'] = $user_id;
        
        //產生 mt4_id
        $mt4_id = $this->user_model->gen_mt4_id();
        $app_data['mt4_id'] = $mt4_id;
        
        //產生唯讀密碼
        $app_data['pw_read'] = $this->user_model->gen_mt4_read_pwd();
        
        $app_data['is_child'] = 1;
        
        //檢查 MT4 用戶資料
//        echo '<pre>';
//        var_dump($base_data);
//        echo '</pre>';
//        echo '<pre>';
//        var_dump($app_data);
//        echo '</pre>';
        //寫入        
        if( ! $this->user_model->add(array(), $app_data, user_model::USER_OLD)){
            $this->set_response('Add user failed.', 302);
            return FALSE;
        }
        
        $this->set_response(array('user_id' => $app_data['user_id'], 'mt4_id' => $mt4_id), REST_Controller::HTTP_OK);
        
    }
    
    /**
     * MT4資金內轉 (自己轉自己)
     * @param string $mt4_id MT4編號
     * @param string $mt4_id 目標MT4編號
     * @param string $user_id 客戶編號
     * @param int $amount 金額
     * @param string $note 備註
     * @return array
     */
    public function transfer_post(){
        $post = $this->post();
        
        if(empty($post['user_id'])){
            $this->set_response('lose user_id.', 201);
            return FALSE;
        }
        
        //挑出 app 資料
        $data = array();
        //必要
        foreach(array('mt4_id', 'target_mt4_id', 'amount') as $field){
            if( ! isset($post[$field]) || empty($post[$field]) && $post[$field] !== '0'){
                $this->set_response('Parameter is required:'.$field, 202);
                return FALSE;
            }
            $data[$field] = $post[$field];
        }
        //次要
        foreach(array('note') as $field){
            if(empty($post[$field])) continue;
            $data[$field] = $post[$field];
        }
        
        if($data['mt4_id'] == $data['target_mt4_id']){
            $this->set_response('same account.', 203);
            return FALSE;
        }
        
        //檢查是否屬於自己
        $list_mt4_id = $this->user_model->list_mt4_id($post['user_id']);
        if( ! in_array($post['mt4_id'], $list_mt4_id) ||  ! in_array($post['target_mt4_id'], $list_mt4_id)){
            $this->set_response('This user havnt the mt4 id.', 206);
            return FALSE;
        }
        
        $this->load->model($this->_app_id.'/money_model');
        $mmt_id = $this->money_model->add_transfer($data);
        if( ! $mmt_id){
            $this->set_response('add transfer failed.', 301);
            return FALSE;
        }
        
        $this->set_response(array('mmt_id' => $mmt_id), REST_Controller::HTTP_OK);
    }
    
    /**
     * 內轉審核
     * @param string $mmt_id 內轉單流水號
     */
    public function transfer_approve_post(){
        $mmt_id = $this->post('mmt_id');
        
        
        if(empty($mmt_id)){
            $this->set_response('lose some param.', 201);
            return FALSE;
        }
        
        $this->load->model($this->_app_id.'/money_model');        
        $data = $this->money_model->get_transfer_no_approve($mmt_id);
        if(empty($data)){
            $this->set_response('This transfer is past or not exists.', 202);
            return FALSE;
        }
        
        //與MT4溝通
        include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
        $mt4_com = new mt4_com_lib();
        
        //檢查錯誤檔
        $json_path = 'transfer/';
        $json_fname = 'mmt_'.$mmt_id.'.json';
        $err = json_read($json_path, $json_fname);
        
        if( ! empty($err)){
            $this->set_response('This transfer is stop from Developer.', 301);
            return FALSE;
        }
        
        //出金-------------------------------------------------------------------
        $mt4_re = $mt4_com->client_withdraw($data['mt4_id'], $data['amount']);
        //FIXME:如果餘額不足
        
        if((int)$mt4_re['status'] !== mt4_com_lib::RET_SUCCESS){
            $err[] = array(
                'time' => date('Y-m-d H:i:s'),
                'active' => 'withdraw',
                'mt4_com_re' => $mt4_re,
                'data' => $data
            );
            json_save($json_path, $json_fname, $err);
            
            $this->set_response('MT4 transfer(withdraw) failed:'.$mt4_re['status'].'|mmt_id='.$mmt_id.'|mt4_id='.$data['mt4_id'], 302);
            return FALSE;
        }
        
        //入金-----------------------------------------------------------------------
        $mt4_re = $mt4_com->client_funding($data['target_mt4_id'], $data['amount']);        
        //account exist 也給過
        if((int)$mt4_re['status'] !== mt4_com_lib::RET_SUCCESS){
            $err[] = array(
                'time' => date('Y-m-d H:i:s'),
                'active' => 'funding',
                'mt4_com_re' => $mt4_re,
                'data' => $data
            );
            json_save($json_path, $json_fname, $err);
            
            $this->set_response('MT4 transfer(funding) failed:'.$mt4_re['status'].'|mmt_id='.$mmt_id.'|mt4_id='.$data['mt4_id'], 303);
            return FALSE;
        }
        
        //更新驗證
        if( ! $this->money_model->update_transfer_status($mmt_id, money_model::TA_SUCCESS)){
            $err[] = array(
                'time' => date('Y-m-d H:i:s'),
                'active' => 'update_status',
                'mt4_com_re' => $mt4_re,
                'mt4_id' => $data['mt4_id']
            );
            json_save($json_path, $json_fname, $err);
            
            $this->set_response('update mt4 approve failed.', 304);
            return FALSE;
        }
        
        $this->set_response('OK', REST_Controller::HTTP_OK);   
        
    }
}
