<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MT4 User Model
 */
class user_model extends CI_Model{

    const TB_MU = 'mt4_user';
    
    const USER_OLD = TRUE;
    const USER_NEW = FALSE;
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }

    public function gen_mt4_id(){
        //FIXME:須先去查 grant_user 資料庫
        return '88'.rand(1000000, 9999999);
    }
    
    public function gen_mt4_read_pwd(){
        return substr(md5(time()), -5).dechex(rand(0, 15)); 
    }
    
    /**
     * 新增客戶
     * @param array $base_data 基本資訊
     * @param array $app_data 應用程式資訊
     * @param boolean $old_user 舊客戶
     * @return boolean
     */
    public function add($base_data, &$app_data, $old_user = FALSE){
                
        $this->db->trans_start();
                
        //建立基本客戶
        if( ! $old_user){
            include_once APPPATH.'libraries/User_share_lib.php';
            user_share_lib::add_user_model($base_data, $this->db);
        }
        
        //建立 MT4 會員
        if($app_data['is_child'] == 0){
            $this->db->select('user_id');
            $this->db->where('user_id', $app_data['user_id']);
            $query = $this->db->get(self::TB_MU);
        }else{
            $this->db->select('mt4_id');
            $this->db->where('mt4_id', $app_data['mt4_id']);
            $query = $this->db->get(self::TB_MU);
        }
        if($query->num_rows() == 0){
            $this->db->set('ctime', 'NOW()', FALSE);
            $this->db->replace(self::TB_MU, $app_data);
        }else{
            return FALSE;
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return FALSE;
        }
        else
        {
            $this->db->trans_commit();
        }
        
        return TRUE;
    }
    
    /**
     * 取得未驗證的客戶資料
     * @param string $mt4_id mt4帳號
     * @param string $user_id 客戶編號
     */
    public function no_approve($mt4_id, $user_id){
        $sql = "SELECT * FROM `user` as u "
                . "left join `user_detail` d ON u.user_id = d.user_id "
                . "left join `mt4_user` m ON u.user_id = m.user_id "
                . "WHERE u.user_id = '".$user_id."' AND m.approve = 0 AND m.mt4_id = '".$mt4_id."'";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array()[0];
    }
    
    /**
     * 更新驗證狀態
     * @param string $mt4_id mt4帳號
     * @param string $user_id 客戶編號
     */
    public function approve($mt4_id, $user_id){
        
        $this->db->where('user_id', $user_id);
        $this->db->where('mt4_id', $mt4_id);
        
        $this->db->set('approve', 1);
        $this->db->set('approve_time', 'NOW()', FALSE);
        
        $this->db->update(self::TB_MU); 
        
        return $this->db->affected_rows() > 0;
    }
    
    
    
    
    /**
     * 撈取簡易 user 資訊
     * @param string $user_id 客戶編號
     */
    public function detail($user_id){   
        $sql = "SELECT * FROM `user` as u "
                . "left join `user_detail` d ON u.user_id = d.user_id "
                . "left join ".self::TB_MU." m ON u.user_id = m.user_id "
                . "WHERE u.user_id = '".$user_id."'";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array()[0];
    }
    
    /**
     * 取得所有 mt4_id
     * @param string $user_id 客戶編號
     */
    public function list_mt4_id($user_id){
        $sql = "SELECT mt4_id FROM `".self::TB_MU."` "
                . "WHERE user_id = '".$user_id."' AND approve = 1";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        $list_mt4_id = array();
        foreach($query->result_array() as $row){
            $list_mt4_id[] = $row['mt4_id'];
        }
        return $list_mt4_id;
    }
    
    /**
     * 取得所有 mt4_id by page
     * @param int $page 頁碼 1~n, 0=全部
     * @param int $num 筆數
     * @return array
     */
    public function list_mt4_id_by_page($page = 1, $num = 100){
        $offset = $num*($page-1);
        
        $limit = $page >= 0 ? "LIMIT ".$offset.",".$num : "";
        
        $sql = "SELECT mt4_id FROM `".self::TB_MU."` "
                . "WHERE approve = 1 ORDER BY ctime ASC ".$limit;
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        $list_mt4_id = array();
        foreach($query->result_array() as $row){
            $list_mt4_id[] = $row['mt4_id'];
        }
        return $list_mt4_id;        
    }
    
    /**
     * 取得所有 mt4 帳號資料 (有照先後順序排)
     * @param string $user_id 客戶編號
     */
    public function list_mt4($user_id, $only_approve = FALSE){
        $sql_approve = ($only_approve) ? ' AND approve = 1 ' : '';
            
        $sql = "SELECT mt4_id, is_child, leverage, approve, DATE(approve_time) approve_time, mt4_group, follow_auth, follow, pw_read, note, balance, ctime FROM `".self::TB_MU."` "
                . "WHERE user_id = '".$user_id."' ".$sql_approve." AND expired = 0 ORDER BY is_child ASC, ctime ASC";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array();
    }
    
    /**
     * 檢查是否有未審核的 MT4 子帳號
     * @param string $user_id 客戶編號
     */
    public function chk_sub_mt4_need_approve($user_id){
        $this->db->select('mt4_id');
        $this->db->where('user_id', $user_id);
        $this->db->where('is_child', 1);
        $this->db->where('approve', 0);
        
        $this->db->get(self::TB_MU); 
        
        return $this->db->affected_rows() > 0;
    }
    
    /**
     * 更新餘額
     */
    public function update_balance($list_balance){       
        if(empty($list_balance)){
            return FALSE;
        }
        
        $this->db->trans_start();
            
        foreach($list_balance as $row){
            $sql_batch[] = "WHEN mt4_id = '".$row['mt4_id']."' THEN ".$row['balance'];
            $list_mt4_id[] = "'".$row['mt4_id']."'";
        }
        $sql = "UPDATE ".self::TB_MU." SET balance = CASE ".implode(' ', $sql_batch)." END WHERE mt4_id IN (".  implode(',', $list_mt4_id).")";

        $query = $this->db->query($sql);
        if ($this->db->trans_status() === FALSE)
        {
            //這批有錯就直接復原並且終止
            $this->db->trans_rollback();
            return FALSE;
        }
        
        $this->db->trans_commit();
        
        return TRUE;
    }
}
