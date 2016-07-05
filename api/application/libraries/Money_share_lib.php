<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Money share model
 *
 * @author wild
 */
class money_share_lib {
    
    const TB_USER = 'user';
    const TB_MF = 'money_funding';
    const TB_MW = 'money_withdraw';
    
    public function __construct()
    {
    }
    
    /**
     * 檢查新增入金申請
     * @param array $post
     * @return type
     */
    static public function add_funding_chk(&$post){
        $base_data = array();
        //必要
        foreach(array('user_id','com_id','mf_type', 'amount') as $field){
            if( ! isset($post[$field]) || empty($post[$field]) && $post[$field] !== '0'){
                return array('Parameter is required:'.$field, '');
            }
            $base_data[$field] = $post[$field];
        }
        
        //次要
        //`name', 'address', 'country', 'bank', 'bank_acc', 'bank_ads', 'pay_date', 'pay_amount' 'union_pay''
        foreach(array('note', 'union_pay') as $field){
            if(empty($post[$field])) continue;
            $base_data[$field] = $post[$field];
        }
        
        //FIXME:CI form validation
        
        return array('', $base_data);
    }
    
    /**
     * 新增入金申請
     * @param string $app 應用程式名稱
     * @param string $app_uid 應用程式客戶編號
     * @param array $data 資料
     * @param array $db
     */
    static public function add_funding_model($app, $app_uid, &$data, &$db){
        
        $data['mf_app_id'] = $app;
        $data['mf_app_uid'] = $app_uid;
        
        //寫入 user
        $db->set('ctime', 'NOW()', FALSE);
        $db->insert(self::TB_MF, $data);
    }
    
    /**
     * 檢查新增出金申請
     * @param array $post
     * @return type
     */
    static public function add_withdraw_chk(&$post){
        $base_data = array();
        //必要
        foreach(array('user_id','com_id','mw_type', 'amount') as $field){
            if( ! isset($post[$field]) || empty($post[$field]) && $post[$field] !== '0'){
                return array('Parameter is required:'.$field, '');
            }
            $base_data[$field] = $post[$field];
        }
        
        //次要
        foreach(array('note') as $field){
            if(empty($post[$field])) continue;
            $base_data[$field] = $post[$field];
        }
        
        //FIXME:CI form validation
        
        return array('', $base_data);
    }
    
    /**
     * 新增出金申請
     * @param string $app 應用程式名稱
     * @param string $app_uid 應用程式客戶編號
     * @param array $data 資料
     * @param array $db
     */
    static public function add_withdraw_model($app, $app_uid, &$data, &$db){
        
        $data['mw_app_id'] = $app;
        $data['mw_app_uid'] = $app_uid;
        
        //寫入 user
        $db->set('ctime', 'NOW()', FALSE);
        $db->insert(self::TB_MW, $data);
    }
    
}
