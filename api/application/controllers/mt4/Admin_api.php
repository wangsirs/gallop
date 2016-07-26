<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * MT4 行政 API
 * @package         gallop
 * @subpackage      User
 * @category        Controller
 * @author          bs
 */
class admin_api extends REST_Controller {

    private $_app_id = 'mt4';
    
    function __construct(){
        parent::__construct();

        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['info_get']['limit'] = 1; // 500 requests per hour per user/key
                
        $this->load->model($this->_app_id.'/admin_model');        
    }  
        
    /**
     * 新增大IB
     */
    public function add_org(){
        
        //新增佣金群組
    }
    
    /**
     * 新增佣金群組
     */
    public function add_symbol_plan_post(){        
        $post = $this->post();
        
        //檢查基本資料
        include_once APPPATH.'libraries/Mt4_share_lib.php';
        list($err_msg, $data) = mt4_share_lib::add_symbol_plan_chk($post);
        if( ! empty($err_msg)){
            $this->set_response($err_msg, 201);
            return FALSE;
        }
        
        $err_msg = mt4_share_lib::add_symbol_plan($data);
        if( ! empty($err_msg)){
            $this->set_response($err_msg, 301);
            return FALSE;
        }
        
        $this->set_response('OK', REST_Controller::HTTP_OK);
    }
    
    /**
     * 取得佣金群組ID清單
     * @return array
     */
    public function symbol_plan_ids_post(){
        $list = $this->admin_model->list_msp_id();
        if(empty($list)){
            $this->set_response('symbol_plan is empty, please init first.', 301);
            return FALSE;
        }
        
        $this->set_response($list, REST_Controller::HTTP_OK);
    }
    
    /**
     * 取得單一佣金群組詳細參數
     * @param string $msp_id 佣金群組名稱
     */
    public function symbol_plan_detail_post(){
        $msp_id = $this->post('msp_id');
        if(empty($msp_id)){
            $this->set_response('msp_id is required.', 201);
            return FALSE;
        }
        
        $detail = $this->admin_model->symbol_plan_detail($msp_id);
        if(empty($detail)){
            $this->set_response('This symbol plan is not exist.', 301);
            return FALSE;
        }
        
        $this->set_response($detail, REST_Controller::HTTP_OK);
    }
        
    /**
     * 更新佣金群組資料(加入排程)
     */
    public function task_symbol_plan_post(){
        
    }
    public function cancel_symbol_plan_task_post(){
        
    }
    
    public function symbol_plan_task_post(){
        
    }
    
    /**
     * 檢查 MT4 user_group 異動狀況
     */
    public function chk_user_group_post(){
        
        $list = $this->admin_model->list_symbol_plan_scale();
        if(empty($list)){
            $this->set_response('symbol_plan is empty, please init first.', 301);
            return FALSE;
        }
        
        $list_group_name = array();
        foreach(array_keys($list) as $msp_id){
            $list_group_name[] = 'A_'.$msp_id;
            $list_group_name[] = 'B_'.$msp_id;
        }
        
        $report = array();
        $mail_content = array();
        
		include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
        include_once APPPATH.'libraries/Mt4_share_lib.php';
		$mt4_com = new mt4_com_lib();
        foreach($list_group_name as $group_name){
            $mt4_re = $mt4_com->get_group_info($group_name);
            if( (int)$mt4_re['status'] !== mt4_com_lib::RET_SUCCESS){
                $report['failed'][$group_name] = $mt4_re['status'];
                continue;
            }
          
            $msp_id = substr($group_name, 2);
            
            foreach($mt4_re['data']['secuirty_group'] as $sec){
                $web = isset($list[$msp_id][$sec['name']]) ? $list[$msp_id][$sec['name']] : array();
                $err = array();
                //MT4有開 security_Group, web 沒有
                if( empty($web) && $sec['enable']){
                    $err['enable'] = 'error';
                    if('' === mt4_share_lib::revert_mt4_user_group($group_name)){
                        $err['enable'] = 'revert';
                    }
                }
                
                if( ! empty($web)){
                    if($sec['spread'] <= $web['scale']){
                        $err['scale'] = 'info';
                        $err['spread'] = 'error';
                        if('' === mt4_share_lib::revert_mt4_user_group($group_name)){
                            $err['spread'] = 'revert';
                        }
                    }elseif($sec['spread'] > $web['spread']){
                        $err['spread'] = 'info';
                    }elseif($sec['spread'] < $web['spread']){
                        $err['spread'] = 'warning';
                    }
                }
                
                if(!empty($err)){
                    $ct = array(
                        'group' => $group_name,
                        'sec' => $sec['name'],
                        'web' => $web,
                        'mt4' => $sec,
                        'err' => $err
                    );
                    
                    $report[] = $ct;
                    
                    if(@in_array('error', array_values($err)) || @in_array('revert', array_values($err))){
                        $mail_content[] = $ct;
                    }
                }
            }
            
        }
        
        json_save('cron/', 'chk_user_group.json', $report);
        
        $msg = '';
        if(!empty($report)){
            foreach($report as $row){
                if(!empty($row['err'])){
                    foreach($row['err'] as $field => $level){
                        if( ! in_array($level, array('error', 'revert'))){
                            continue;
                        }
                        
                        $rev = ($level == 'revert') ? ' (已還原)' : '';
                        
                        if($field == 'enable'){
                            $msg .= '['.$row['group'].']['.$row['sec'].'] 此交易類型 MT4 有開，但 WEB 無此點差佣金設定'.$rev.'<br>'.PHP_EOL;
                        }
                        if($field == 'spread'){
                            $msg .= '['.$row['group'].']['.$row['sec'].'] 點差比佣金小，公司虧錢啦~'.$rev.'<br>'.PHP_EOL;
                        }
                    }
                }
            }
        }
        
        //FIXME:通知完，間隔 10分鐘才能發第二封
        //有 Error 發送 Email 通知
        if( ! empty($mail_content)){
            $this->load->library('email_lib');
            foreach(array('wild0522@gmail.com', 'dailohaha@gmail.com') as $ads){
                $email_re = $this->email_lib->send($ads, 'MT4客戶群組 異動有嚴重錯誤', $msg.PHP_EOL.'<br>'.json_encode($mail_content), FALSE);
            }
        }
        
        $this->set_response($report, REST_Controller::HTTP_OK);
    }
    
    /**
     * 取得 user group 檢查報表
     */
    public function get_user_group_report_post(){
        $report = json_read('cron/', 'chk_user_group.json');
        
        $abook = $this->admin_model->unset_abook_user_group();
        
        $this->set_response(array('diff' => $report, 'abook' => $abook), REST_Controller::HTTP_OK);
    }
    
    /**
     * 還原 mt4 user group
     * @param string $group_name 群組名稱
     * @return boolean
     */
    public function revert_mt4_user_group_post(){
        $group_name = $this->post('group_name');
        
        if(empty($group_name)){
            $this->set_response('msp_id is required.', 201);
            return FALSE;
        }
        
        include_once APPPATH.'libraries/Mt4_share_lib.php';
        $err = mt4_share_lib::revert_mt4_user_group($group_name);
        if( !empty($err)){
            $this->set_response($err, 301);
            return FALSE;
        }
        
        $this->set_response('OK', REST_Controller::HTTP_OK);
    }
    
    /**
     * 更新 Abook 狀態
     * @param int $type Abook 狀態 (1=設定完成,2=不需要)
     */
    public function update_abook_status_post(){
        $msp_id = $this->post('msp_id');
        $type = $this->post('type');
        
        if(empty($msp_id) || ! in_array($type, array(admin_model::ABOOK_DONE, admin_model::ABOOK_NONEED))){
            $this->set_response('msp_id and type is required.', 201);
            return FALSE;
        }
        
        if(TRUE === $this->admin_model->update_abook_type($msp_id, $type)){
            $this->set_response('OK', REST_Controller::HTTP_OK);
        }else{
            $this->set_response('update abook status failed.', 301);
        }
    }
    
    /**
     * 新增顧問層級
     * @param string $mil_name 層級方案名稱
     * @param array $levels 層級清單(mil_level=等級n~1, mil_title=職級稱號, mil_scale=佣金比例) 
     * @return boolean
     */
    public function add_ib_level_post(){
        $mil_name = $this->post('mil_name');
        $levels = $this->post('levels');
        
        if(empty($mil_name)){
            $this->set_response('mil_name is required.', 201);
            return FALSE;
        }
           
        if( ! empty($this->admin_model->ib_levels_by_name($mil_name))){
            $this->set_response('This mil_name is exist.', 202);
            return FALSE;
        }
        
        $list_lv_scale = array();
        foreach($levels as $row){
            foreach(array('mil_level', 'mil_title','mil_scale') as $field){
                if( ! isset($row[$field])){
                    $this->set_response('Parameter is required:'.$field, 202);
                    return FALSE;
                }
            }
            
            if(empty($row['mil_level'])){
                $this->set_response('level have to bigger than 0.', 203);
                return FALSE;
            }
                
            if(floatval($row['mil_scale']) < 0){
                $this->set_response('scale have to bigger or equal than 0.', 203);
                return FALSE;
            }
        
            $list_lv_scale[intval($row['mil_level'])] = floatval($row['mil_scale']);
        }
         
        //檢查佣金比例
        //反向排序
        krsort($list_lv_scale);
        
        //100%
        if(floatval(current($list_lv_scale)) != 100){
            $this->set_response('The top level\'s scale have to 100 percent scale:'.current($list_lv_scale), 203);
            return FALSE;
        }
        
        $prev = -1;
        foreach($list_lv_scale as $lv => $_scale){
            if($prev !== -1 && $prev < $_scale){
                $this->set_response('Level_'.$lv.' scale '.$prev.' have to bigger than '.$_scale, 203);
                return FALSE;
            }
            $prev = $_scale;
        }
        
        if( ! $this->admin_model->add_ib_levels($mil_name, $levels)){
            $this->set_response('add ib levels failed.', 301);
        }else{
            $this->set_response('OK', REST_Controller::HTTP_OK);
        }
    }
    
    /**
     * 取得 IB 層級資料
     * @param int $mil_id 層級方案編號
     * @return array
     */    
    public function ib_levels_post(){
        $mil_id = $this->post('mil_id');
        
        if(empty($mil_id)){
            $this->set_response('mil_id is required.', 201);
            return FALSE;
        }
           
        $levels = $this->admin_model->ib_levels($mil_id);
        if(empty($levels)){
            $this->set_response('This mil_name not exist.', 301);
            return FALSE;
        }
        
        $this->set_response($levels, REST_Controller::HTTP_OK);
    }
    
    /**
     * 取得所有顧問層級方案
     */
    public function list_ib_level_plan_post(){
        $plans = $this->admin_model->list_ib_level_plan();
        if(empty($plans)){
            $this->set_response('IB level plan is empty.', 301);
            return FALSE;
        }
        
        $this->set_response($plans, REST_Controller::HTTP_OK);
    }
    
    public function task_ib_level_post(){
        
    }
    
    public function cancel_ib_level_task_post(){
        
    }
    
    public function ib_level_task_post(){
        
    }
}
