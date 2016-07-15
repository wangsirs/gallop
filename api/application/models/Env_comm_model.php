<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Env_comm_model extends CI_Model{
    
    const TB_CT = 'country';
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * 取得國家與語系清單
     * @return array
     */
    public function country(){
        $this->db->select('*');
        $query = $this->db->get(self::TB_CT);
        
        if($query->num_rows() == 0){
            return array();
        }
        
        $list = array();
        foreach($query->result_array() as $row){
            $list[$row['country']] = $row;
        }
        
        return $list;
    }
}
