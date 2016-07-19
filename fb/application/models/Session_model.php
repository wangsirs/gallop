<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class session_model extends CI_Model{
        
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
    public function add($data){
        $this->db->set('data', $data);
        
        $query = $this->db->insert('fb_order');
        
//        return $query->num_rows();
        return TRUE;
    }
}
