<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ib_comm_model extends CI_Model{
    
    const TB_IB = 'ib';
    const TB_ID = 'ib_detail';
    const TB_USER = 'user';
    const TB_MF = 'money_funding';
    const TB_MW = 'money_withdraw';
    const TB_APP = 'app';
    const TB_IAR = 'ib_app_relation';
    
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
        $query = $this->db->query("SELECT * FROM ".self::TB_IB." WHERE (email = '".$id."' or ib_id = UPPER('".$id."')) and pwd = '".$pw."'");
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->row_array();
    }
    
    /**
     * 更新密碼
     * @param string $ib_id 顧問帳號
     * @param string $old_pass 舊密碼
     * @param string $new_pass 新密碼
     */
    public function update_pw($ib_id, $old_pass, $new_pass){
        $this->db->where('ib_id', $ib_id);
        $this->db->where('pwd', $old_pass);
        
        $this->db->set('pwd', $new_pass);
        $this->db->set('utime', 'NOW()', FALSE);
        
        $this->db->update(self::TB_IB); 
        //$this->db->last_query();
        return $this->db->affected_rows() > 0;
    }
    
    /**
     * 檢查 email 是否存在
     * @param string $email 電子信箱
     * @return boolean
     */
    public function chk_email_exist($email){
        $this->db->select('ib_id');
        $this->db->where('email', $email);
        $query = $this->db->get(self::TB_IB);
        
        return $query->num_rows() > 0;
    }
    
    /**
     * 撈取詳細顧問資訊
     * @param string $ib_id 顧問編號
     */
    public function detail($ib_id){        
        $query = $this->db->query("SELECT * FROM ".self::TB_IB." b LEFT JOIN ".self::TB_ID." d ON b.ib_id = d.ib_id WHERE b.ib_id='".$ib_id."'");
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->row_array();
    }
    
    private $_tmp_tree = array();
    private $_last_prent = '';
    
    /**
     * 取得整顆數<br>
     * (請務必快取!!)
     * @param string $app_id 應用程式編號
     * @param string $ib_id 顧問編號
     * @param string $filter 過濾 sql
     * @param boolean $node 以單層顯示
     */
    public function full_tree($app_id, $ib_id, $filter = '', $nodes = FALSE){
        $this->_get_tree_items($app_id, $ib_id, $filter);
        if($nodes){
            return $this->_tmp_tree;
        }
        return $this->buildTree($this->_tmp_tree, $ib_id);
    }
    
    /**
     * 取得單層 items
     * @param string $app_id 應用程式編號
     * @param string $ib_id 顧問編號
     * @return array
     */
    private function _get_tree_items($app_id, $ib_id, $filter = ''){
//        $sql = "SELECT * FROM ".$app_id."_ib_relation WHERE parent_id='".$ib_id."'";
        
        $sql = "SELECT b.ib_id, r.parent_id, b.first_name, b.last_name FROM ".$app_id."_ib_relation r "
                . "LEFT JOIN ".self::TB_IB." b ON b.ib_id = r.ib_id "
                . "WHERE parent_id='".$ib_id."'";
        
        if( ! empty($filter)){
            $sql = sprintf($filter, $sql);
        }
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        foreach($query->result_array() as $val){            
            $this->_tmp_tree[] = $val;
            $this->_get_tree_items($app_id, $val['ib_id']);
        }
    }
    
    /**
     * 排成樹狀
     * @param array $elements items 清單
     * @param string $parentId 最根層
     * @return array
     */
    function buildTree(array &$elements, $parentId = 0) {
        $branch = array();    
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->buildTree($elements, $element['ib_id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[$element['ib_id']] = $element;
            }
        }
        return $branch;
    }

    /**
     * 客戶出入金
     * @param string $app_id 應用程式編號
     * @param string $com_id 公司編號
     * @param string $ib_id 顧問編號
     * @return type
     */
    public function client_money_history($app_id, $com_id, $ib_id){
        //入金清單
        $sql_in = "SELECT 'in' active, mf.mf_id id, mf.user_id, mf.ctime ctime, mf.bank, mf.bank_acc, mf.amount, mf.mf_status status, mf.note note FROM `".self::TB_MF."` as mf "
                . "WHERE mf.com_id = '".$com_id."' AND mf.user_id in(SELECT user_id FROM `user` WHERE ib_id = '".$ib_id."') AND mf.mf_app_id = '".$app_id."'";
                
        //出金
        $sql_out = "SELECT 'out' active, mw.mw_id id, mw.user_id, mw.ctime ctime, mw.union_name bank, mw.union_acc bank_acc,  mw.amount, mw.mw_status status, mw.note note FROM `".self::TB_MW."` as mw "
                . "WHERE mw.com_id = '".$com_id."'  AND mw.user_id in(SELECT user_id FROM `user` WHERE ib_id = '".$ib_id."') AND mw.mw_app_id = '".$app_id."'";
        
        $sql_user = " LEFT JOIN ".self::TB_USER." u ON a.user_id = u.user_id ";
        $query = $this->db->query("SELECT a.*, u.first_name, u.last_name FROM (".$sql_in." UNION ".$sql_out.") a ".$sql_user." ORDER BY ctime DESC");
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array();
    }
    
    /**
     * 取得應用程式清單&是否開通
     * @param string $ib_id 顧問編號
     * @return array
     */
    public function apps($ib_id){
        $sql = "SELECT *, (SELECT count(ib_id) FROM ".self::TB_IAR." iar WHERE ib_id = '".$ib_id."' AND a.app_id = iar.app_id ) opened FROM ".self::TB_APP." a";
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
    
    /**
     * 更新密碼
     * @param string $ib_id 顧問編號
     * @param string $last_lang 語系
     */
    public function update_last_lang($ib_id, $last_lang){
        $this->db->where('ib_id', $ib_id);
        
        $this->db->set('last_lang', $last_lang);
        
        $this->db->update(self::TB_IB); 
        //$this->db->last_query();
        return $this->db->affected_rows() > 0;
    }
}
