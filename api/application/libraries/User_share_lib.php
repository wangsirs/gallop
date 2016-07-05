<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 客戶共用 lib
 *
 * @author wild
 */
class user_share_lib {
    
    const TB_USER = 'user';
    const TB_UD = 'user_detail';
    const TB_UAR = 'user_app_relation';
    
    public function __construct()
    {
    }
    
    /**
     * 產生客戶帳號
     * @return type
     */
    static public function gen_user_id(){
//        $this->_CI = &get_instance();
        return 'U'.rand(10000, 99999);
    }
    
    /**
     * 檢查新增的客戶基本資料
     * @param array $post
     * @return type
     */
    static public function add_user_chk(&$post){
        
        $base_data = array();
        //必要
        foreach(array(
            'com_id', 'pwd', 'first_name', 'last_name', 
            'passport', 'mod_user', 'ib_id', 'email', 'gender', 'birthday', 
            'country', 'zip', 'city', 'state', 'address', 'cell_phone',
            'first_deposit') as $field){
            if( ! isset($post[$field]) || empty($post[$field]) && $post[$field] !== '0'){
                return array('Parameter is required:'.$field, '');
            }
            $base_data[$field] = $post[$field];
        }
        //次要
        foreach(array('user_name', 'nickname', 'phone', 'nationality', 'marital', 'passport_path', 'bank_path', 'resident_path') as $field){
            if(empty($post[$field])) continue;
            $base_data[$field] = $post[$field];
        }
        
        //FIXME:CI form validation
        
        $user_id = self::gen_user_id();
        
        $base_data['user_id'] = $user_id;
        
        if(empty($base_data['email'])){
            return array('email is required.', '');
        }
        
        $CI = &get_instance();
        $CI->load->model('user_comm_model');
        
        //檢查 email 是否存在
        if($CI->user_comm_model->chk_email_exist($base_data['email'])){
            return array('email is exist.', '');
        }
        
        return array('', $base_data);
    }
    
    /**
     * 寫入新增的客戶基本資料
     * @param array $base_data
     * @param object $db
     */
    static public function add_user_model(&$base_data, &$db){
        
        $info = array();
        $detail = array();
        if( ! empty($base_data)){
            foreach($base_data as $field => $val){
                if(in_array($field, array('user_id', 'user_name', 'com_id', 'pwd', 'first_name', 'last_name', 'nickname', 'ib_id', 'email', 'mod_user'))){
                    $info[$field] = $val;
                }else{
                    $detail[$field] = $val;
                }
            }
            
            $detail['user_id'] = $base_data['user_id'];
            $detail['com_id'] = $base_data['com_id'];
            $detail['mod_user'] = $base_data['mod_user'];
        }
        
        //檢查必填欄位
        //cell_phone,..
        
        //寫入 user
        $db->select('user_id');
        $db->where('user_id', $base_data['user_id']);
        $db->where('com_id', $base_data['com_id']);
        $query = $db->get(self::TB_USER);
        if(empty($query->row()->user_id)){
            $db->set('ctime', 'NOW()', FALSE);
            $db->insert(self::TB_USER, $info);
        }        
        
        //寫入 detail
        $db->select('user_id');
        $db->where('user_id', $base_data['user_id']);
        $db->where('com_id', $base_data['com_id']);
        $query = $db->get(self::TB_UD);
        if(empty($query->row()->user_id)){
            $db->set('ctime', 'NOW()', FALSE);
            $db->insert(self::TB_UD, $detail);
        }        
    }
    
    /**
     * 加入應用程式
     * @param string $com_id 公司編號
     * @param string $user_id 客戶編號
     * @param string $app_id 應用程式編號
     */
    static public function add_to_app_model($com_id, $user_id, $app_id){
        $CI = &get_instance();
        $CI->load->database();
                
        $CI->db->select('user_id');
        $CI->db->where('user_id', $user_id);
        $CI->db->where('com_id', $com_id);
        $CI->db->where('app_id', $app_id);
        $query = $CI->db->get(self::TB_UAR);
        if(empty($query->row()->user_id)){
            $CI->db->set('app_id', $app_id);
            $CI->db->set('user_id', $user_id);
            $CI->db->set('com_id', $com_id);
            $CI->db->set('ctime', 'NOW()', FALSE);
            $CI->db->insert(self::TB_UAR);
        }
        
        if ($CI->db->trans_status() === FALSE)
        {
            $CI->db->trans_rollback();
            return FALSE;
        }
        else
        {
            $CI->db->trans_commit();
        }
        
        return TRUE;
    }
    
    /**
     * 取得客戶基本資料
     * @param string $user_id 客戶資料
     * @return array
     */
    static public function info($user_id){
        $CI = &get_instance();
        $CI->load->model('user_comm_model');
        
        return $CI->user_comm_model->info_by_user_id($user_id);
    }
}
