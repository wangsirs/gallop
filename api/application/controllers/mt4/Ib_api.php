<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * MT4 顧問 API
 * @package         gallop
 * @subpackage      User
 * @category        Controller
 * @author          bs
 */
class ib_api extends REST_Controller {

    private $_app_id = 'mt4';

    function __construct(){
        parent::__construct();

        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['info_get']['limit'] = 1; // 500 requests per hour per user/key
        
        $this->load->model($this->_app_id.'/ib_model');       
    }  
    
    /**
     * 新增晉升請求
     * @param string $ib_id 顧問編號
     * @param string $com_id 公司編號
     * @param int $level 等級(0=初級)
     * @param float $scale 新佣金比例
     */
    public function add_promotion_post(){
        $ib_id = $this->post('ib_id');
        $com_id = $this->post('com_id');
        $level = $this->post('level');
        $scale = $this->post('scale');
        
        if(empty($ib_id) || empty($com_id) || empty($scale) ){
            $this->set_response('lose some param.', 201);
            return FALSE;
        }
        
        if(intval($level) < 0 ){
            $this->set_response('level range 0~n.', 202);
            return FALSE;
        }
        
        if($this->ib_model->chk_promotion_no_approve($ib_id, $com_id)){
            $this->set_response('This ib`s promotion request is exist.', 203);
            return FALSE;
        }
        
        //檢查 scale 需 大於 子結點 、小於 父結點 (已生效、申請中的)
        //$this->ib_model->promotion_range($ib_id, $com_id);
        
        //檢查 已經審核通過的請求
        
        
        if( ! $this->ib_model->add_promotion($ib_id, $com_id, $level, $scale)) {
            $this->set_response('add promotion failed.', 301);
            return FALSE;
        }

        $this->set_response('OK', REST_Controller::HTTP_OK);
    }
    
    /**
     * 審核晉升請求
     * @param string $ib_id 顧問編號
     * @param string $com_id 公司編號
     */
    public function approve_promotion_post(){
        $ib_id = $this->post('ib_id');
        $com_id = $this->post('com_id');
        $st_date = $this->post('st_date');
        
        if(empty($ib_id) || empty($com_id) ){
            $this->set_response('lose some param.', 201);
            return FALSE;
        }
        
        if( ! $this->ib_model->chk_promotion_no_approve($ib_id, $com_id)){
            $this->set_response('This ib\s havent promotion request.', 202);
            return FALSE;
        }
        
        //檢查生效時間是否在未來
        if(time() >= strtotime($st_date)){
            $this->set_response('start time is expired.', 203);
            return FALSE;
        }
        
        //檢查生效時間須為週一
        if(date('w', strtotime($st_date)) != '1'){
            $this->set_response('start time is not Monday.', 206);
            return FALSE;
        }
        
        //生效
        if( ! $this->ib_model->approve_promotion($ib_id, $com_id, $st_date)) {
            $this->set_response('approve promotion failed.', 301);
            return FALSE;
        }
        
        //計算 diff_scale
        

        $this->set_response('OK', REST_Controller::HTTP_OK);
    }    
    
    /**
     * 取得顧問佣金比例
     * @param string $ib_id 顧問編號
     */
    public function scale_post(){
        $ib_id = $this->post('ib_id');
        
        if(empty($ib_id)){
            $this->set_response('lose some param.', 201);
            return FALSE;
        }
        
        $scale = $this->ib_model->scale($ib_id);
        
        if (!$scale) {
            $this->set_response('ib not exist.', 303);
            return FALSE;
        }

        $this->set_response(array('scale' => $scale), REST_Controller::HTTP_OK);
    }
    
    /**
     * 新增 MT4 客戶
     * @author bs
     * @param array $post 基礎客戶資料+應用程式資料
     *  (user_name,com_id,pwd,first_name,last_name,nickname,passport,mod_user,email,<br>
     * gender,birthday,marital,nationality,country,zip,city,state,address,phone,cell_phone,<br>
     * passport_path,bank_path,resident_path,leverage,follow_auth,follow,mod_user)
     */
    public function add_post(){
        $post = $this->post();
        
        //挑出 app 資料
        $app_data = array();
        //必要
        foreach(array('scale', 'parent_id', 'mod_user') as $field){
            if( ! isset($post[$field]) || empty($post[$field]) && $post[$field] !== '0'){
                $this->set_response('Parameter is required:'.$field, 201);
                return FALSE;
            }
            $app_data[$field] = $post[$field];
        }
        //次要
//        foreach(array() as $field){
//            if(empty($post[$field])) continue;
//            $app_data[$field] = $post[$field];
//        }
        
        $scale = $this->ib_model->scale($post['parent_id']);
        
        if(intval($app_data['scale']) < 0 || $app_data['scale'] >= $scale){
            $this->set_response('scale should be Positive integer (0 <= scale < '.$scale.')', 202);
            return FALSE;            
        }
        
        //檢查基本資料
        include_once APPPATH.'libraries/Ib_share_lib.php';
        list($err_msg, $base_data) = ib_share_lib::add_ib_chk($post);
        if( ! empty($err_msg)){
            $this->set_response($err_msg, 203);
            return FALSE;
        }
        
        //檢查 MT4 用戶資料
//        echo '<pre>';
//        var_dump($base_data);
//        echo '</pre>';
//        echo '<pre>';
//        var_dump($app_data);
//        echo '</pre>';
        
        //寫入        
        if( ! $this->ib_model->add($base_data, $app_data)){
            $this->set_response('Add ib failed.', 302);
            return FALSE;
        }
        
        $this->set_response(array('ib_id' => $base_data['ib_id']), REST_Controller::HTTP_OK);
    }
    
    /**
     * 審核 MT4 帳號
     */
    public function approve_post(){
        $ib_id = $this->post('ib_id');
        
        if(empty($ib_id)){
            $this->set_response('lose some param.', 201);
            return FALSE;
        }
        
        //檢查是否有未驗證的 MT4 帳號
        $info = $this->ib_model->no_approve($ib_id);
//        echo '<pre>';
//        var_dump($info);
//        echo '</pre>';
        
        if(empty($info)){
            $this->set_response('No account havent approved.', 202);
            return FALSE;
        }
        
        //審核必填欄位
        $require_field = array('first_name', 'last_name', 'pwd', 'birthday', 'email', 'country', 'city', 'address', 'cell_phone', 'zip', 'scale');
        foreach($require_field as $field){
            if( ! isset($info[$field]) || empty($info[$field])){
                $this->set_response('MT4 require parameter is empty:'.$field, 203);
                return FALSE;
            }
        }
        
        //計算組織佣金
        $this->load->model($this->_app_id.'/results_model');
        $re = $this->results_model->update_diff_scale($ib_id);
        if(TRUE !== $re){
            $this->set_response('count org scale failed:'.$re, 301);
            return FALSE;
        }
        
        //加入應用程式關聯
        include_once APPPATH.'libraries/Ib_share_lib.php';
        if( ! ib_share_lib::add_to_app_model($info['com_id'], $ib_id, $this->_app_id)){
            $this->set_response('user join app failed.', 302);
            return FALSE;
        }
        
        //更新驗證
        if( ! $this->ib_model->approve($ib_id)){
            $this->set_response('update mt4 approve failed.', 303);
            return FALSE;
        }
        
        $this->set_response('OK', REST_Controller::HTTP_OK);
    }
    
    /**
     * 取得顧問的客戶資料
     * @author bs
     * @return array 會員資料清單
     */
    public function clients_post(){
        $ib_id = $this->post('ib_id');
        $keyword = $this->post('keyword');
        $page = $this->post('page');
        $num = $this->post('num');
        
        $list_client = $this->ib_model->clients($ib_id, $keyword, $page, $num);
        
        $this->set_response($list_client, REST_Controller::HTTP_OK);
    }    
    
    /**
     * 取得顧問的客戶 MT4 詳細資料
     * @author bs
     * @return array 會員資料清單
     */
    public function client_mt4s_post(){
        $ib_id = $this->post('ib_id');
        $user_id = $this->post('user_id');
        
        include_once APPPATH.'libraries/User_share_lib.php';
        $user_info = user_share_lib::info($user_id);
        $list_client = $this->ib_model->client_mt4s($ib_id, $user_id);
        
        $this->set_response(array('mt4s' => $list_client, 'first_name' => $user_info['first_name'], 'last_name' => $user_info['last_name']), REST_Controller::HTTP_OK);
    }    
    
    /**
     * 取得下線顧問清單
     * @author bs
     * @return array 顧問清單
     */
    public function ibs_post(){
        $ib_id = $this->post('ib_id');
        
        //取得下線所有顧問
        $tree_nodes = $this->ib_model->tree($ib_id, TRUE, TRUE);
        if(empty($tree_nodes)){
            $this->set_response(array(), REST_Controller::HTTP_OK);
            return FALSE;
        }
        
        $list_ib_id = array();
        foreach($tree_nodes as $node){
            $list_ib_id[] = $node['ib_id'];
        }
        
        $list_ib = $this->ib_model->ibs($list_ib_id);
        
        $this->set_response($list_ib, REST_Controller::HTTP_OK);
    }    
    
    
    /**
     * IB 樹狀圖
     */
    public function tree_post(){
        $ib_id = $this->post('ib_id');
        
        include_once APPPATH.'libraries/Ib_share_lib.php';
        $list = $this->ib_model->tree($ib_id);
        if( ! $list){
            $this->set_response('select failed.', 301);
            return FALSE;
        }
        
        $this->set_response($list, REST_Controller::HTTP_OK);        
    }
    
    /**
     * 取得客戶出入金
     * @param string $ib_id 顧問編號
     * @return boolean
     */
    public function client_money_history_post(){
        $ib_id = $this->post('ib_id');
        $com_id = $this->post('com_id');
        
        include_once APPPATH.'libraries/Ib_share_lib.php';
        $list = ib_share_lib::client_money_history($this->_app_id, $com_id, $ib_id);
        if( ! $list){
            $this->set_response('select failed.', 301);
            return FALSE;
        }
        
        $this->set_response($list, REST_Controller::HTTP_OK);        
    }
    
    /**
     * 客戶業績 ( by 單一顧問)
     * @param string $$ib_id 顧問編號
     * @param string $st_day 開始日期 y-m-d
     * @param string $end_day 結束日期 y-m-d
     */
    public function clients_results_post(){
        $ib_id = $this->post('ib_id');
        $st_day = $this->post('st_day');
        $end_day = $this->post('end_day');
        
        if ( ! preg_match("/\d{4}\-\d{2}-\d{2}/", $st_day) || ! preg_match("/\d{4}\-\d{2}-\d{2}/", $end_day)) {
            $this->set_response('Wrong date format Y-m-d.', 201);
            return FALSE;
        }
        
        //暫時寫在這
        $this->load->model($this->_app_id.'/results_model');
        $list = $this->results_model->search($st_day, $end_day, $ib_id);
        
        $this->set_response($list, REST_Controller::HTTP_OK);          
    }
    
    /**
     * 客戶業績 ( by 單一客戶)
     * @param string $$ib_id 顧問編號
     * @param string $st_day 開始日期 y-m-d
     * @param string $end_day 結束日期 y-m-d
     */
    public function clients_results_detail_post(){
        $user_id = $this->post('user_id');
        $st_day = $this->post('st_day');
        $end_day = $this->post('end_day');
        
        if ( ! preg_match("/\d{4}\-\d{2}-\d{2}/", $st_day) || ! preg_match("/\d{4}\-\d{2}-\d{2}/", $end_day)) {
            $this->set_response('Wrong date format Y-m-d.', 201);
            return FALSE;
        }
        
        //暫時寫在這
        $this->load->model($this->_app_id.'/results_model');
        $list = $this->results_model->search_by_user_id($st_day, $end_day, $user_id);
                
        $this->set_response($list, REST_Controller::HTTP_OK);          
    }
    
    /**
     * 計算客戶業績 (每日 cron)<br>
     * 可在任何時間執行，會略過相同的資料，若欄位值有差異，會先註記刪除舊資料
     * @param string $count_day 要計算的日期
     * @param string $user_id 客戶編號
     * @return boolean
     */
    public function count_cus_results_post(){
        $count_day = $this->post('count_day');
        $uid = $this->post('user_id');
        $debug = $this->post('debug') == '1';
        
        if ( ! preg_match("/\d{4}\-\d{2}-\d{2}/", $count_day)) {
            $this->set_response('Wrong date format Y-m-d.', 201);
            return FALSE;
        }
        
        $st = time();
        
        //確認執行時間，如果非正規時間，必須傳強制參數
        
        
        //測試 當日 log 擋是否寫入成功
        $log_path = 'cron/cus_result/';
        $log_fname = date('Y-m-d').'.json';
        if( ! $debug) json_push($log_path, $log_fname, array('sys' => 'prepare start ! '. date('Y-m-d H:i:s')));
        
        //取得客戶編號清單
        if( ! empty($uid)){
            $list_user_id = array($uid);
        }else{
            
        }
        
        //暫時寫在這
        $this->load->model($this->_app_id.'/results_model');
        
        foreach($list_user_id as $_user_id){
            //取得該 user 所有 MT4 帳號、以 天為單位的 清單
            $list = $this->results_model->count($_user_id, $count_day);
            if( ! $debug){
                $msg = $this->results_model->save($list, $_user_id);
                if($msg !== TRUE){
                    //寫入錯誤紀錄檔
                    //須改寫
                    error_log($_user_id.' count error='.$msg);
                    json_push($log_path, $log_fname, array($_user_id => $msg));
                }
            }
        }
        
        if( ! $debug) json_push($log_path, $log_fname, array('sys' => 'finish ! '.(time() - $st).'sec'));
        
        $this->set_response($list, REST_Controller::HTTP_OK);       
    }
    
    /**
     * 列出 計算客戶業績 Log
     * @param string $ymd 日期 2016-01-01
     */
    public function count_cus_results_log_post(){
        $ymd = $this->post('ymd');
        $log_path = 'cron/cus_result/';
        
        $this->set_response(json_read($log_path, $ymd.'.json'), REST_Controller::HTTP_OK);   
    }
    
    /**
     * 檢查全站錯誤的 組織佣金比例
     * @return array (less_zero => array(小於等於0者), conflict => array(計算有差異者))
     */
    public function chk_diff_scale_post(){
        $this->load->model($this->_app_id.'/results_model');
        
        $list = $this->results_model->chk_diff_scale();

        $this->set_response($list, REST_Controller::HTTP_OK);  
    }
    
    
    /**
     * 計算組織佣金比例(與父佣金差值)
     */
    public function update_diff_scale_post(){
        $ib_id = $this->post('ib_id');
        $this->load->model($this->_app_id.'/results_model');
        
        $re = $this->results_model->update_diff_scale($ib_id);
        if(TRUE !== $re){
            $this->set_response($re, 301);
            return FALSE;
        }

        $this->set_response('OK', REST_Controller::HTTP_OK);  
    }
    
    /**
     * 計算組織業績 (每日 cron)<br>
     * 可在任何時間執行，會略過相同的資料，若欄位值有差異，會先註記刪除舊資料
     * @param string $count_day 要計算的日期
     * @param string $ib_id 客戶編號
     * @return boolean
     */
    public function count_org_results_post(){
        $count_day = $this->post('count_day');
        $uid = $this->post('ib_id');
        
        if ( ! preg_match("/\d{4}\-\d{2}-\d{2}/", $count_day)) {
            $this->set_response('Wrong date format Y-m-d.', 201);
            return FALSE;
        }
        
        $st = time();
        
        //確認執行時間，如果非正規時間，必須傳強制參數
        
        
        //測試 當日 log 擋是否寫入成功
        $log_path = 'cron/org_result/';
        $log_fname = date('Y-m-d').'.json';
        json_push($log_path, $log_fname, array('sys' => 'prepare start ! '. date('Y-m-d H:i:s')));
        
        //取得客戶編號清單
        if( ! empty($uid)){
            $list_ib_id = array($uid);
        }else{
            
        }
        
        //暫時寫在這
        $this->load->model($this->_app_id.'/results_model');
        
        foreach($list_ib_id as $_ib_id){
            //取得該 user 所有 MT4 帳號、以 天為單位的 清單
            $list = $this->results_model->count_org_results($_ib_id, $count_day);
            $msg = $this->results_model->save_org_results($list, $_ib_id);
            if($msg !== TRUE){
                //寫入錯誤紀錄檔
                //須改寫
                error_log($_ib_id.' count error='.$msg);
                json_push($log_path, $log_fname, array($_ib_id => $msg));
            }
        }
        
        json_push($log_path, $log_fname, array('sys' => 'finish ! '.(time() - $st).'sec'));
        
        $this->set_response($list, REST_Controller::HTTP_OK);       
    }
    
    /**
     * 組織業績 ( by 單一顧問)
     * @param string $$ib_id 顧問編號
     * @param string $st_day 開始日期 y-m-d
     * @param string $end_day 結束日期 y-m-d
     */
    public function org_results_post(){
        $ib_id = $this->post('ib_id');
        $st_day = $this->post('st_day');
        $end_day = $this->post('end_day');
        
        if ( ! preg_match("/\d{4}\-\d{2}-\d{2}/", $st_day) || ! preg_match("/\d{4}\-\d{2}-\d{2}/", $end_day)) {
            $this->set_response('Wrong date format Y-m-d.', 201);
            return FALSE;
        }
        
        //取得下線所有顧問
        $tree_nodes = $this->ib_model->tree($ib_id, TRUE);
        if(empty($tree_nodes)){
            $this->set_response(array(), REST_Controller::HTTP_OK);
            return FALSE;
        }
        
        $list_ib_id = array();
        foreach($tree_nodes as $node){
            $list_ib_id[] = $node['ib_id'];
        }
        
        //暫時寫在這
        $this->load->model($this->_app_id.'/results_model');
        $list = $this->results_model->search_org_results($st_day, $end_day, $list_ib_id);
        
        $this->set_response($list, REST_Controller::HTTP_OK);          
    }
}
