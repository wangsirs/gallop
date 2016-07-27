<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MT4 行政 Model
 */
class admin_model extends CI_Model{

    const TB_MSP = 'mt4_symbol_plan';
    const TB_MIL = 'mt4_ib_level';
    
    const ABOOK_UNSET = 0;
    const ABOOK_DONE = 1;
    const ABOOK_NONEED = 2;
    
    const ORG_ST_DISABLE = 0;
    const ORG_ST_ENABLE = 1;
    const ORG_ST_UNCOMPLETED = 2;
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }

    /**
     * 取得 佣金群組名稱清單
     * @return array
     */
    public function list_msp_id(){
        $sql = "SELECT msp_id FROM ".self::TB_MSP." WHERE expired = 0 AND msp_private = 0 GROUP BY msp_id";
        
        $query = $this->db->query($sql);
                
        if($query->num_rows() == 0){
            return array();
        }
        
        $list = array();
        foreach($query->result_array() as $row){
            $list[] = $row['msp_id'];
        }
        
        return $list;
    }
    
    /**
     * 取得 佣金群組清單的點差
     * @return array
     */
    public function list_symbol_plan_scale(){
        $sql = "SELECT msp_id, security_group, msp_scale, msp_spread, msp_private FROM ".self::TB_MSP." WHERE expired = 0";
        
        $query = $this->db->query($sql);
                
        if($query->num_rows() == 0){
            return array();
        }
        
        $list = array();
        foreach($query->result_array() as $row){
            $list[$row['msp_id']][$row['security_group']] = array(
                'scale' => floatval($row['msp_scale']),
                'spread' => floatval($row['msp_spread']),
                'enable' => TRUE,
                'msp_private' => boolval($row['msp_private'])
            );
        }
        
        return $list;
    }
    
    public function symbol_plan_detail($msp_id){
        $sql = "SELECT * "
                . "FROM ".self::TB_MSP." WHERE msp_id = '".$msp_id."' AND expired = 0 ORDER BY security_group ASC, msp_volume_min ASC";
 
        $query = $this->db->query($sql);
        
        if($query->num_rows() == 0){
            return array();
        }
        
        return $query->result_array();        
    }
    
    /**
     * 取得未拋上手的 A book 群組
     * @return array
     */
    public function unset_abook_user_group(){
        $sql = "SELECT CONCAT('A_', msp_id) msp_id "
                . "FROM ".self::TB_MSP." WHERE expired = 0 AND msp_abook = 0 GROUP BY msp_id ORDER BY ctime DESC";
 
        $query = $this->db->query($sql);
        
        if($query->num_rows() == 0){
            return array();
        }
        
        $list = array();
        foreach($query->result_array() as $row){
            $list[] = $row['msp_id'];
        }
        return $list;
    }
    
    /**
     * 更新 A book 狀態
     * @param string $msp_id 佣金群組名稱
     * @param int $type Abook 狀態
     * @return boolean
     */
    public function update_abook_type($msp_id, $type){
        $this->db->trans_start();
        
        $this->db->set('msp_abook', $type);
        $this->db->where('msp_id', $msp_id);
        $this->db->where('expired', 0);
        $this->db->update(self::TB_MSP);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return FALSE;
        }
        
        $this->db->trans_commit();
        
        return TRUE;
    }
    
    /**
     * 產 IB 層級編號
     * @return int
     */
    private function _gen_mil_id(){
        $sql = "SELECT mil_id "
                . "FROM ".self::TB_MIL." WHERE expired = 0 GROUP BY mil_id ORDER BY mil_id DESC LIMIT 1";
 
        $query = $this->db->query($sql);
        
        if($query->num_rows() == 0){
            return 1;
        }
        
        return intval($query->row()->mil_id) + 1;
    }
    
    /**
     * 新增顧問層級
     * @param string $mil_name 顧問層級名稱
     * @param array $levels 顧問層級清單
     * @return boolean
     */
    public function add_ib_levels($mil_name, $levels){
        $this->db->trans_start();
        
        $mil_id = $this->_gen_mil_id();
                
        $sql_key = "mil_id,mil_name,mil_level,mil_title,mil_scale";
        
        $sql_batch = array();
        foreach($levels as $row){
            $sql_batch[] = "(".$mil_id.",'".$mil_name."',".$row['mil_level'].",'".$row['mil_title']."',".$row['mil_scale'].")";
        }
        $sql = "INSERT IGNORE INTO ".self::TB_MIL."(".$sql_key.") values".implode(',', $sql_batch);

        $query = $this->db->query($sql);
        
        if ($this->db->trans_status() === FALSE || count($levels) !== $this->db->affected_rows())
        {
            $this->db->trans_rollback();
            return FALSE;
        }
        
        $this->db->trans_commit();
        
        return TRUE;
    }
    
    /**
     * 取得單一顧問層級資料
     * @param int $mil_id 顧問層級方案編號
     * @return array
     */
    public function ib_levels($mil_id){
        $sql = "SELECT mil_id, mil_name, mil_level, mil_title, mil_scale "
                . "FROM ".self::TB_MIL." WHERE mil_id='".$mil_id."' AND expired = 0 ORDER BY mil_level DESC";
 
        $query = $this->db->query($sql);
        
        if($query->num_rows() == 0){
            return array();
        }
        
        $re = array();
        foreach($query->result_array() as $row){
            $re['mil_id'] = $row['mil_id'];
            $re['mil_name'] = $row['mil_name'];
            $re['levels'][] = array(
                'mil_title' => $row['mil_title'],
                'mil_level' => intval($row['mil_level']),
                'mil_scale' => floatval($row['mil_scale']));
        }
        
        return $re;
    }
    
    /**
     * 取得單一顧問層級資料
     * @param string $mil_name 顧問層級名稱
     * @return array
     */
    public function ib_levels_by_name($mil_name){
        $sql = "SELECT mil_id, mil_name, mil_level, mil_title, mil_scale "
                . "FROM ".self::TB_MIL." WHERE mil_name='".$mil_name."' AND expired = 0 ORDER BY mil_level DESC";
 
        $query = $this->db->query($sql);
        
        if($query->num_rows() == 0){
            return array();
        }
        
        $re = array();
        foreach($query->result_array() as $row){
            $re['mil_id'] = $row['mil_id'];
            $re['mil_name'] = $row['mil_name'];
            $re['levels'][] = array(
                'mil_title' => $row['mil_title'],
                'mil_level' => intval($row['mil_level']),
                'mil_scale' => floatval($row['mil_scale']));
        }
        
        return $re;
    }
    
    /**
     * 取得所有顧問層級方案
     * @return array
     */
    public function list_ib_level_plan(){
        $sql = "SELECT mil_id, mil_name FROM ".self::TB_MIL." WHERE expired = 0 GROUP BY mil_id";
 
        $query = $this->db->query($sql);
        
        if($query->num_rows() == 0){
            return array();
        }
        
        return $query->result_array();
    }
    
    /**
     * 新增組織
     * @param array $ib 顧問資料
     * @param array $org 組織資料
     * @param string $msp_id 共用的佣金群組編號
     * @param int $mil_id 顧問階級編號
     * @param array $symbol_plan 私有的佣金群組資料(非必要)
     */
    public function add_org($ib, $org, $msp_id, $mil_id, $symbol_plan = array()){
        
        $this->db->trans_start();
        //新增 IB --------------------------------------------------------------
        include_once APPPATH.'libraries/Ib_share_lib.php';
        ib_share_lib::add_ib_model($ib, $this->db);
        
        //新增私有 佣金群組 ------------------------------------------------------
        $err_msg = mt4_share_lib::add_symbol_plan($symbol_plan, $this->db);
        if( ! empty($err_msg)){
            return $err_msg;
        }
        
        
        //新增 組織 -------------------------------------------------------------
//        $this->db->set();
        
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return FALSE;
        }
        else
        {
            $this->db->trans_commit();
        }
        
        return '';
    }
}
