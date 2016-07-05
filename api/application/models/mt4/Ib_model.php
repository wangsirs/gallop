<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MT4 IB Model
 */
class ib_model extends CI_Model{

    const TB_USER = 'user';
    const TB_UD = 'user_detail';
    const TB_IB = 'ib';
    const TB_ID = 'ib_detail';
    const TB_MP = 'mt4_promotion';
    const TB_MF = 'money_funding';
    const TB_MU = 'mt4_user';
    const TB_MI = 'mt4_ib';
    const TB_MIR = 'mt4_ib_relation';
    
    private $_app = 'mt4';
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    /**
     * 新增晉升請求
     * @param string $ib_id 顧問編號
     * @param string $com_id 公司編號
     * @param int $level 等級(0=初級)
     * @param float $scale 新佣金比例
     * @return boolean
     */
    public function add_promotion($ib_id, $com_id, $level, $scale){
        $this->db->db_debug = FALSE;
        
        $this->db->trans_start();
        
        $this->db->set('ib_id', $ib_id);
        $this->db->set('com_id', $com_id);
        $this->db->set('level', $level);
        $this->db->set('scale', $scale);
        $this->db->set('ctime', 'NOW()', FALSE);
        
        $this->db->insert(self::TB_MP);
        
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
     * 檢查是否有未審核的晉升申請
     * @param string $ib_id 顧問編號
     * @param string $com_id 公司編號
     * @return boolean
     */
    public function chk_promotion_no_approve($ib_id, $com_id){
        $sql = "SELECT * FROM `".self::TB_MP."` as mp "
                . "WHERE mp.ib_id = '".$ib_id."' AND mp.com_id = '".$com_id."' AND mp.st_time = '9999-01-01' AND mp.expired = 0";
        
        $query = $this->db->query($sql);
        
        return $query->num_rows() > 0;
    }
    
    
    /**
     * 檢查是否有未審核的晉升申請
     * @param string $ib_id 顧問編號
     * @param string $com_id 公司編號
     * @param string $st_date 生效時間
     * @return boolean
     */
    public function approve_promotion($ib_id, $com_id, $st_date){
        $this->db->trans_start();
        
        //將已生效標註結束日期
        $sql = "UPDATE ".self::TB_MP." mp SET st_time = '".$st_date." 00:00:00' " 
                . "WHERE mp.ib_id = '".$ib_id."' AND mp.com_id = '".$com_id."' AND mp.end_time = '9999-01-01' AND mp.expired = 0";
        
        $query = $this->db->query($sql);
        
        //未生效的壓起始時間
        $sql = "UPDATE ".self::TB_MP." mp SET st_time = '".$st_date." 00:00:00' " 
                . "WHERE mp.ib_id = '".$ib_id."' AND mp.com_id = '".$com_id."' AND mp.st_time = '9999-01-01' AND mp.expired = 0";
        
        $query = $this->db->query($sql);
        
        
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
     * 取得顧問佣金比例
     * @param string $ib_id 顧問編號
     */
    public function scale($ib_id){
//        $sql = "SELECT scale FROM `".self::TB_MP."` as mp "
//                . "WHERE mp.ib_id = '".$ib_id."' AND mp.st_time <= '".date('Y-m-d H:i:s')."' AND '".date('Y-m-d H:i:s')."' < mp.end_time AND mp.expired = 0";
//        
//        $query = $this->db->query($sql);
//        
//        if($query->num_rows() <= 0 || $query->num_rows() > 1){
//            return FALSE;
//        }
//        
//        return $query->row()->scale;
        $this->db->select('scale');
        $this->db->where('ib_id', $ib_id);
        $query = $this->db->get(self::TB_MI);
        
        if($query->num_rows() <= 0){
            return FALSE;
        }
        
        return $query->row()->scale;
    }
    
    /**
     * 新增顧問
     * @param array $params 基本資料
     */
    public function add(&$base_data, &$app_data){
                
        $this->db->trans_start();
                
        //建立基本客戶
        include_once APPPATH.'libraries/Ib_share_lib.php';
        ib_share_lib::add_ib_model($base_data, $this->db);
        
        //建立 MT4 IB
        $this->db->select('*');
        $this->db->where('ib_id', $base_data['ib_id']);
        $query = $this->db->get(self::TB_MI);
        if(empty($query->row()->ib_id)){
            $this->db->set('ib_id', $base_data['ib_id']);
            $this->db->set('scale', $app_data['scale']);
            $this->db->insert(self::TB_MI);         
        }
        $this->db->select('*');
        $this->db->where('ib_id', $base_data['ib_id']);
        $query = $this->db->get(self::TB_MIR);
        if(empty($query->row()->ib_id)){            
            $this->db->set('ib_id', $base_data['ib_id']);
            $this->db->set('parent_id', $app_data['parent_id']);
            $this->db->insert(self::TB_MIR);            
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
     * 取得未驗證的顧問資料
     * @param string $ib_id 客戶編號
     */
    public function no_approve($ib_id){
        $sql = "SELECT * FROM `".self::TB_IB."` as u "
                . "left join `".self::TB_ID."` d ON u.ib_id = d.ib_id "
                . "left join `".self::TB_MI."` m ON u.ib_id = m.ib_id "
                . "WHERE u.ib_id = '".$ib_id."' AND m.approve = 0";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array()[0];
    }
    
    /**
     * 更新驗證狀態
     * @param string $ib_id 顧問編號
     */
    public function approve($ib_id){
        
        $this->db->where('ib_id', $ib_id);
        
        $this->db->set('approve', 1);
        $this->db->set('approve_time', 'NOW()', FALSE);
        
        $this->db->update(self::TB_MI); 
        
        return $this->db->affected_rows() > 0;
    }
    
    /**
     * 取得客戶清單
     * @param string $ib_id 顧問編號
     */
    public function clients($ib_id){
        //sum(mu.balance) balance, 
        $sql = "SELECT u.first_name, u.last_name, u.user_id, DATE(u.ctime) ctime,"
                . "(SELECT sum(mu.balance) balance FROM ".self::TB_MU." mu WHERE mu.user_id = u.user_id AND mu.approve = 1) balance, "
                . "(SELECT sum(amount) funding FROM ".self::TB_MF." mf WHERE mf.user_id = u.user_id AND mf.mf_status = 1) funding "
                . "FROM `".self::TB_USER."` as u "
                . "WHERE u.ib_id = '".$ib_id."'";
        
//        $sql = "SELECT u.first_name, u.last_name, DATE(u.ctime) ctime, mu.mt4_id, mu.is_child, mu.leverage, 0 net_value, "
//                . "(SELECT sum(amount) funding FROM ".self::TB_MF." mf WHERE mf.mf_app_id = '".$this->_app."' and mf.mf_app_uid = mu.mt4_id) funding "
//                . "FROM `".self::TB_USER."` as u "
////                . "left join `".self::TB_UD."` d ON u.user_id = d.user_id "
//                . "left join `".self::TB_MU."` mu ON u.user_id = mu.user_id "
//                . "WHERE u.ib_id = '".$ib_id."'";
//        
        $query = $this->db->query($sql);
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array();
    }
    
    /**
     * 客戶 MT4 清單
     * @param string $ib_id 顧問編號
     * @param string $user_id 客戶編號
     */
    public function client_mt4s($ib_id, $user_id){
        $sql = "SELECT DATE(mu.ctime) ctime, mu.mt4_id, mu.is_child, mu.leverage, mu.balance, mu.approve, "
                . "(SELECT sum(amount) funding FROM ".self::TB_MF." mf WHERE mf.mf_app_id = '".$this->_app."' and mf.mf_app_uid = mu.mt4_id AND mf.mf_status = 1) funding "
                . "FROM `".self::TB_USER."` as u "
//                . "left join `".self::TB_UD."` d ON u.user_id = d.user_id "
                . "left join `".self::TB_MU."` mu ON u.user_id = mu.user_id "
                . "WHERE u.user_id = '".$user_id."' AND u.ib_id = '".$ib_id."' "
                . "ORDER BY mu.ctime ASC";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array();
    }
    
    /**
     * 取得顧問清單
     * @param array $list_ib_id 顧問編號清單
     */
    public function ibs($list_ib_id){
        if(empty($list_ib_id)){
            return array();
        }
        //sum(mu.balance) balance, 
        $sql = "SELECT ib.first_name, ib.last_name, ib.ib_id, DATE(ib.ctime) ctime, mi.scale, mi.approve, DATE(mi.approve_time) approve_date "
//                . "(SELECT sum(mu.balance) balance FROM ".self::TB_MU." mu WHERE mu.user_id = u.user_id AND mu.approve = 1) balance, "
//                . "(SELECT sum(amount) funding FROM ".self::TB_MF." mf WHERE mf.user_id = u.user_id AND mf.mf_status = 1) funding "
                . "FROM `".self::TB_IB."` ib "
                . "LEFT JOIN ".self::TB_MI." mi ON mi.ib_id = ib.ib_id "
                . "WHERE ib.ib_id IN ('".  implode("','", $list_ib_id)."')";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array();
    }
    
    /**
     * 列出沒老爸的子節點
     */
    public function no_parent(){
        $sql = "SELECT mi.ib_id FROM ".self::TB_MI." mi LEFT JOIN ".self::TB_MIR." mir ON mir.ib_id = mi.ib_id WHERE mir.parent_id is null";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        $list = array();
        foreach($query->result_array() as $row){
            $list[] = $row['ib_id'];
        }
        
        return $list;
        
    }
    
    /**
     * IB 階層樹
     * @param string $ib_id 客戶編號
     */
    public function tree($ib_id, $nodes = FALSE, $inc_no_approve = FALSE){      
        $this->load->model('ib_comm_model');
        
        $approve = $inc_no_approve ? '' : ' WHERE mi.approve = 1';
        
        //有審核同過才顯示
        $sql = "SELECT * FROM (%s) tree LEFT JOIN ".self::TB_MI." mi ON tree.ib_id = mi.ib_id ".$approve;
        
        return $this->ib_comm_model->full_tree($this->_app, $ib_id, $sql, $nodes);
    }
}
