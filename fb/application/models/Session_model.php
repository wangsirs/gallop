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
    public function add($stk){
        $this->db->set('stk', $stk);
        //$this->db->set('ctime', 'NOW()', FALSE);
        
        $this->db->insert('');
        
        return $query->num_rows() > 0;
    }
}
