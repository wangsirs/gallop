<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 顧問共用 lib
 *
 * @author wild
 */
class ib_share_lib {
    
    const TB_IB = 'ib';
    const TB_ID = 'ib_detail';
    const TB_IAR = 'ib_app_relation';
    
    public function __construct()
    {
    }
    
    /**
     * 產生IB帳號
     * @return type
     */
    static public function gen_ib_id(){
        return 'B'.rand(10000, 99999);
    }
    
    /**
     * 檢查新增的顧問基本資料
     * @param array $post
     * @return type
     */
    static public function add_ib_chk(&$post){
        
        $base_data = array();
        //必要
        foreach(array(
            'com_id', 'pwd', 'first_name', 'last_name', 
            'passport', 'mod_user', 'email', 'gender', 'birthday', 
            'country', 'zip', 'city', 'state', 'address', 'cell_phone'
            ) as $field){
            if( ! isset($post[$field]) || empty($post[$field]) && $post[$field] !== '0'){
                return array('Parameter is required:'.$field, '');
            }
            $base_data[$field] = $post[$field];
        }
        //次要
        foreach(array('ib_name', 'nickname', 'phone', 'nationality', 'marital', 'passport_path', 'bank_path', 'resident_path') as $field){
            if(empty($post[$field])) continue;
            $base_data[$field] = $post[$field];
        }
        
        //FIXME:CI form validation
        
        $ib_id = self::gen_ib_id();
        
        $base_data['ib_id'] = $ib_id;
        
        if(empty($base_data['email'])){
            return array('email is required.', '');
        }
        
        $CI = &get_instance();
        $CI->load->model('ib_comm_model');
        
        //檢查 email 是否存在
        if($CI->ib_comm_model->chk_email_exist($base_data['email'])){
            return array('email is exist.', '');
        }
        
        //手機號碼前面需帶 +
        if($base_data['cell_phone'][0] !== '+'){
            return array('cell_phone is wrong format. ex.+886933001122', '');
        }
        
        //帶入 last_lang
        $CI->load->model('env_comm_model');
        $list_ct = $CI->env_comm_model->country();
        $base_data['last_lang'] = (isset($list_ct[$base_data['country']])) ? $list_ct[$base_data['country']]['lang'] : '';
        
        return array('', $base_data);
    }
    
    /**
     * 寫入新增的顧問基本資料
     * @param array $base_data
     * @param object $db
     */
    static public function add_ib_model(&$base_data, &$db){
        
        $info = array();
        $detail = array();
        if( ! empty($base_data)){
            foreach($base_data as $field => $val){
                if(in_array($field, array('ib_id', 'ib_name', 'com_id', 'pwd', 'first_name', 'last_name', 'nickname', 'email', 'last_lang', 'mod_user'))){
                    $info[$field] = $val;
                }else{
                    $detail[$field] = $val;
                }
            }
            
            $detail['ib_id'] = $base_data['ib_id'];
            $detail['com_id'] = $base_data['com_id'];
            $detail['mod_user'] = $base_data['mod_user'];
        }
        
        //檢查必填欄位
        //cell_phone,..
        
        //寫入 user
        $db->select('ib_id');
        $db->where('ib_id', $base_data['ib_id']);
        $db->where('com_id', $base_data['com_id']);
        $query = $db->get(self::TB_IB);
        if(empty($query->row()->ib_id)){
            $db->set('ctime', 'NOW()', FALSE);
            $db->insert(self::TB_IB, $info);
        }        
        
        //寫入 detail
        $db->select('ib_id');
        $db->where('ib_id', $base_data['ib_id']);
        $db->where('com_id', $base_data['com_id']);
        $query = $db->get(self::TB_ID);
        if(empty($query->row()->ib_id)){
            $db->set('ctime', 'NOW()', FALSE);
            $db->insert(self::TB_ID, $detail);
        }        
    }
    
    /**
     * 加入應用程式
     * @param string $com_id 公司編號
     * @param string $ib_id 客戶編號
     * @param string $app_id 應用程式編號
     */
    static public function add_to_app_model($com_id, $ib_id, $app_id){
        $CI = &get_instance();
        $CI->load->database();
                
        $CI->db->select('ib_id');
        $CI->db->where('ib_id', $ib_id);
        $CI->db->where('com_id', $com_id);
        $query = $CI->db->get(self::TB_IAR);
        if(empty($query->row()->ib_id)){
            $CI->db->set('app_id', $app_id);
            $CI->db->set('ib_id', $ib_id);
            $CI->db->set('com_id', $com_id);
            $CI->db->set('ctime', 'NOW()', FALSE);
            $CI->db->insert(self::TB_IAR);
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
     * IB 階層樹
     * @param string $app_id 應用程式編號
     * @param string $ib_id 客戶編號
     */
    static public function tree($app_id, $ib_id){
        $CI = &get_instance();
        $CI->load->model('ib_comm_model');
        
        //檢查 email 是否存在
        return $CI->ib_comm_model->full_tree($app_id, $ib_id);
    }
    
    /**
     * 取得客戶出入金資料
     * @param string $app_id 應用程式編號
     * @param string $ib_id 客戶編號
     */
    static public function client_money_history($app_id, $com_id, $ib_id){
        $CI = &get_instance();
        $CI->load->model('ib_comm_model');
        
        return $CI->ib_comm_model->client_money_history($app_id, $com_id, $ib_id);
    }
}
