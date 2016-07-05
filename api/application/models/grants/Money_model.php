<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MT4 Money Model
 */
class money_model extends CI_Model{

    const TB_GU = 'grants_user';
    const TB_MF = 'money_funding';
    const TB_MW = 'money_withdraw';
    const TB_MMT = 'mt4_money_transfer';
    
    const FA_READY = 0;
    const FA_SUCCESS = 1;
    const FA_FAILED = 2;
    const FA_DOUBLE = 3;
    
    const MA_NO_OTP = 0;
    const MA_READY = 1;
    const MA_SUCCESS = 2;
    const MA_FAILED = 3;
    const MA_DOUBLE = 4;
    
    const TA_READY = 0;
    const TA_SUCCESS = 1;
    const TA_FAILED = 2;
    const TA_DOUBLE = 3;
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }

    /**
     * 新增入金申請
     * @param string $app 應用程式名稱
     * @param string $mt4_id mt4 流水號
     * @param string|FLASE $mf_id 入金申請單流水號
     */
    public function add_funding($app, $mt4_id, &$data){
        $this->db->trans_start();
                
        //建立基本客戶
        include_once APPPATH.'libraries/Money_share_lib.php';
        money_share_lib::add_funding_model($app, $mt4_id, $data, $this->db);
                
        $query = $this->db->query('SELECT LAST_INSERT_ID() mf_id');
        
        $mf_id = $query->row_array()['mf_id'];
        
        if ($this->db->trans_status() === FALSE || $mf_id == '0')
        {
            $this->db->trans_rollback();
            return FALSE;
        }
        else
        {
            $this->db->trans_commit();
        }
        
        return $mf_id;
    }
    
    /**
     * 取得未驗證的入金資料
     * @param string $com_id 公司編號
     * @param string $mf_id 入金單號
     */
    public function get_funding_no_approve($com_id, $mf_id){
        $sql = "SELECT * FROM ".self::TB_MF." as mf "
                . "LEFT JOIN ".self::TB_GU." m ON mf.mf_app_uid = m.mt4_id "
                . "WHERE mf.mf_id = '".$mf_id."' AND mf.com_id = '".$com_id."' AND mf.mf_status = 0";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array()[0];
    }    
    
    /**
     * 更新入金狀態
     * @param string $com_id 公司編號
     * @param string $mf_id 入金單號
     * @param string $mf_status 狀態
     * @return bool
     */
    public function update_funding_status($com_id, $mf_id, $mf_status){
        $this->db->where('mf_id', $mf_id);
        $this->db->where('com_id', $com_id);
        
        $this->db->set('mf_status', $mf_status, FALSE);
        $this->db->set('utime', 'NOW()', FALSE);
        
        $this->db->update(self::TB_MF); 
        //$this->db->last_query();
        return $this->db->affected_rows() > 0;
    }
    
    
    /**
     * 新增出金申請
     * @param string $app 應用程式名稱
     * @param string $mt4_id mt4 流水號
     * @param string|FLASE $mw_id 出金申請單流水號
     */
    public function add_withdraw($app, $mt4_id, &$data){
        $this->db->trans_start();
                
        //建立基本客戶
        include_once APPPATH.'libraries/Money_share_lib.php';
        money_share_lib::add_withdraw_model($app, $mt4_id, $data, $this->db);
                
        $query = $this->db->query('SELECT LAST_INSERT_ID() mw_id');
        
        $mw_id = $query->row_array()['mw_id'];
        
        if ($this->db->trans_status() === FALSE || $mw_id == '0')
        {
            $this->db->trans_rollback();
            return FALSE;
        }
        else
        {
            $this->db->trans_commit();
        }
        
        return $mw_id;
    }
    
    /**
     * 取得未驗證的出金資料
     * @param string $com_id 公司編號
     * @param string $app_id 應用程式名稱
     * @param string $mw_id 入金單號
     */
    public function get_withdraw_no_approve($com_id, $app_id, $mw_id){
        $sql = "SELECT * FROM ".self::TB_MW." as mw "
                . "LEFT JOIN ".self::TB_GU." m ON mw.mw_app_uid = m.mt4_id "
                . "WHERE mw.mw_id = '".$mw_id."' AND mw.com_id = '".$com_id."' AND mw.mw_status = 1 AND mw.mw_app_id = '".$app_id."'";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array()[0];
    }    
    
    /**
     * 更新出金狀態
     * @param string $com_id 公司編號
     * @param string $mw_id 出金單號
     * @param string $mw_status 狀態
     * @return bool
     */
    public function update_withdraw_status($com_id, $mw_id, $mw_status){
        $this->db->where('mw_id', $mw_id);
        $this->db->where('com_id', $com_id);
        
        $this->db->set('mw_status', $mw_status, FALSE);
        $this->db->set('utime', 'NOW()', FALSE);
        
        $this->db->update(self::TB_MW); 
        //$this->db->last_query();
        return $this->db->affected_rows() > 0;
    }
    
    /**
     * 撈取出入金資訊
     * @param string $app 應用程式名稱
     * @param string $com_id 公司編號
     * @param string $user_id 客戶編號
     * @param string $st_day 開始日期 y-m-d
     * @param string $end_day 結束日期 y-m-d
     * @return array
     */
    public function history($app, $com_id, $user_id, $st_day, $end_day = ''){ 
        if(empty($end_day)){
            $end_day = $st_day;
        }
        $end_day = date('Y-m-d', strtotime($end_day . "+1 day"));
        
        //入金清單
        $sql_in = "SELECT 'in' active, mf.mf_id id, mf.ctime ctime, mf.bank, mf.bank_acc,  mf.amount, mf.mf_status status, mf.note note FROM `".self::TB_MF."` as mf "
                . "WHERE mf.com_id = '".$com_id."' AND mf.user_id = '".$user_id."' AND mf.mf_app_id = '".$app."' AND mf.ctime >= '".$st_day."' AND mf.ctime < '".$end_day."'";
                
        //出金
        $sql_out = "SELECT 'out' active, mw.mw_id id, mw.ctime ctime, mw.union_name bank, mw.union_acc bank_acc,  mw.amount, mw.mw_status status, mw.note note FROM `".self::TB_MW."` as mw "
                . "WHERE mw.com_id = '".$com_id."' AND mw.user_id = '".$user_id."' AND mw.mw_app_id = '".$app."' AND mw.ctime >= '".$st_day."' AND mw.ctime < '".$end_day."'";
        
        $query = $this->db->query("SELECT * FROM (".$sql_in." UNION ".$sql_out.") a ORDER BY ctime DESC");
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array();
    }
    
    /**
     * 新增內轉 log
     * @param string $mt4_id MT4編號
     * @param string $mt4_id 目標MT4編號
     * @param string $user_id 客戶編號
     * @param int $amount 金額
     * @param string $note 備註
     * @return string 流水號
     */
    public function add_transfer(&$data){
        $this->db->trans_start();
                        
        //寫入
        $this->db->set('ctime', 'NOW()', FALSE);
        $this->db->insert(self::TB_MMT, $data);
          
        $query = $this->db->query('SELECT LAST_INSERT_ID() mmt_id');
        
        $mmt_id = $query->row_array()['mmt_id'];
        
        if ($this->db->trans_status() === FALSE || $mmt_id == '0')
        {
            $this->db->trans_rollback();
            return FALSE;
        }
        else
        {
            $this->db->trans_commit();
        }
        
        return $mmt_id;
    }
    
    /**
     * 取得未驗證的內轉資料
     * @param string $mmt_id 內轉單號
     */
    public function get_transfer_no_approve($mmt_id){
        $sql = "SELECT * FROM ".self::TB_MMT." as mmt "
                . "LEFT JOIN ".self::TB_GU." m ON mmt.mt4_id = m.mt4_id "
                . "WHERE mmt.mmt_id = '".$mmt_id."' AND mmt.mmt_status = 0";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array()[0];
    }    
    
    /**
     * 更新內轉狀態
     * @param string $mmt_id 內轉單號
     * @param string $mmt_status 狀態
     * @return bool
     */
    public function update_transfer_status($mmt_id, $mmt_status){
        $this->db->where('mmt_id', $mmt_id);
        
        $this->db->set('mmt_status', $mmt_status, FALSE);
        $this->db->set('utime', 'NOW()', FALSE);
        
        $this->db->update(self::TB_MMT); 
        //$this->db->last_query();
        return $this->db->affected_rows() > 0;
    }
}
