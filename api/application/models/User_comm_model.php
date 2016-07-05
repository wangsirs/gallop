<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_comm_model extends CI_Model{
    
    const TB_USER = 'user';
    const TB_APP = 'app';
    const TB_UAR = 'user_app_relation';
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * 登入驗證
     * @param string $id email or ib_id
     * @param string $pw 密碼
     */
    public function login($id, $pw){
        $query = $this->db->query("SELECT * FROM ".self::TB_USER." WHERE (email = '".$id."' or user_id = UPPER('".$id."')) and pwd = '".$pw."'");
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->row_array();
    }
    
    /**
     * 檢查 email 是否存在
     * @param string $email 電子信箱
     * @return boolean
     */
    public function chk_email_exist($email){
        $this->db->select('user_id');
        $this->db->where('email', $email);
        $query = $this->db->get(self::TB_USER);
        
        return $query->num_rows() > 0;
    }
    
    /**
     * 撈取簡易 user 資訊
     * @param string $email 電子信箱
     */
    public function info($email){        
        $query = $this->db->query('SELECT * FROM user WHERE email="'.$email.'"');
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->row_array();
    }
    
    /**
     * 撈取簡易 user 資訊
     * @param string $user_id 客戶編號
     */
    public function info_by_user_id($user_id){
        $query = $this->db->query('SELECT * FROM user WHERE user_id="'.$user_id.'"');
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->row_array();
    }
    
    /**
     * 更新密碼
     * @param string $user_id 會員帳號
     * @param string $old_pass 舊密碼
     * @param string $new_pass 新密碼
     */
    public function update_pw($user_id, $old_pass, $new_pass){
        $this->db->where('user_id', $user_id);
        $this->db->where('pwd', $old_pass);
        
        $this->db->set('pwd', $new_pass);
        $this->db->set('utime', 'NOW()', FALSE);
        
        $this->db->update(self::TB_USER); 
        //$this->db->last_query();
        return $this->db->affected_rows() > 0;
    }
    
    /**
     * 取得應用程式清單&是否開通
     * @param string $user_id 顧問編號
     * @return array
     */
    public function apps($user_id){
        $sql = "SELECT *, (SELECT count(user_id) FROM ".self::TB_UAR." iar WHERE user_id = '".$user_id."' AND a.app_id = iar.app_id ) opened FROM ".self::TB_APP." a";
        $query = $this->db->query($sql);
            
        if($query->num_rows() <= 0){
            return array();
        }
        
        $list = array();
        foreach($query->result_array() as $row){
            $list[$row['app_id']] = $row;
        }
        
        return $list;
    }
}
