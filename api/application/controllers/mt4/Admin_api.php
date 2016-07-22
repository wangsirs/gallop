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
    public function task_update_symbol_plan_post(){
        
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
                if( !empty($web) != $sec['enable']){
                    $err['enable'] = 'error';
                }
                
                if( ! empty($web)){
                    if($sec['spread'] <= $web['scale']){
                        $err['scale'] = 'info';
                        $err['spread'] = 'error';
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
                    
                    if(@in_array('error', array_values($err))){
                        $mail_content[] = $ct;
                    }
                }
            }
            
        }
        
        //FIXME:通知完，間隔 10分鐘才能發第二封
        //有 Error 發送 Email 通知
//        if( ! empty($mail_content)){
//            $this->load->library('email_lib');
//            foreach(array('wild0522@gmail.com', 'dailohaha@gmail.com') as $ads){
//                $email_re = $this->email_lib->send($ads, 'MT4客戶群組 異動有嚴重錯誤', json_encode($mail_content), FALSE);
//            }
//        }
        
        $this->set_response($report, REST_Controller::HTTP_OK);
    }
    
    /**
     * 還原 mt4 user group
     * @param string $msp_id 群組名稱
     * @return boolean
     */
    public function revert_mt4_user_group_post(){
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
        
        $symbol_group = array();
        foreach($detail as $row){
            $symbol_group[$row['security_group']] = array('name' => $row['security_group'], 'enable' => 1, 'spread' => $row['msp_spread']);
        }
        
		include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
		$mt4_com = new mt4_com_lib();
        
        //建立 B Book user group
		$mt4_re = $mt4_com->add_group('B_'.$msp_id, $symbol_group);        
        if( (int)$mt4_re['status'] !== mt4_com_lib::RET_SUCCESS){
            $this->set_response('revert mt4 user_group failed.'.$mt4_re['status'], 301);
            return FALSE;
        }
        
        //建立 A Book user group
		$mt4_re = $mt4_com->add_group('A_'.$msp_id, $symbol_group);
        if( (int)$mt4_re['status'] !== mt4_com_lib::RET_SUCCESS){
            $this->set_response('revert mt4 user_group part failed:A_'.$msp_id.', mt4_re:'.$mt4_re['status'], 302);
            return FALSE;
        }
        
        $this->set_response($detail, REST_Controller::HTTP_OK);
    }
}
