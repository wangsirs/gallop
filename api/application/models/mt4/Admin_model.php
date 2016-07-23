<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MT4 行政 Model
 */
class admin_model extends CI_Model{

    const TB_MSP = 'mt4_symbol_plan';
    
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
        $sql = "SELECT msp_seq, security_group, msp_scale, msp_spread, msp_volume_min, msp_volume_max "
                . "FROM ".self::TB_MSP." WHERE msp_id = '".$msp_id."' AND expired = 0 "
                . "ORDER BY security_group ASC,msp_volume_min ASC";
 
        $query = $this->db->query($sql);
                
        if($query->num_rows() == 0){
            return array();
        }
                
        return $query->result_array();
        
    }
    
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
    
    public function update_abook_type($msp_id, $type){
        $this->db->trans_start();
        
        $this->db->set('abook', $type);
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
}
