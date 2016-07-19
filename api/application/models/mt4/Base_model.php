<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MT4 基礎 Model
 */
class base_model extends CI_Model{

    const TB_MSS = 'mt4_sync_symbol';
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }

    /**
     * 同步所有商品
     * @param array $list 商品清單
     * @return mix TRUE=全部成功, String=失敗
     */
    public function sync_symbol(&$list){
        $this->db->trans_start();
        
        $this->_insert_symbol($list);
        
        $query = $query = $this->_chk_duplicat_symbol();
        
        if ($this->db->trans_status() === FALSE)
        {
            //這批有錯就直接復原並且終止
            $this->db->trans_rollback();
            return 'SELECT duplicate data failed.';
        }
        
        //將舊資料註記刪除
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                $this->db->where('mss_id', $row['mss_id']);
                $this->db->where_not_in('ctime', $row['ctime']);
                $this->db->where('expired', 0);

                $this->db->set('expired', 1);
                $this->db->set('extime', 'NOW()', FALSE);

                $this->db->update(self::TB_MSS); 
                //$this->db->last_query();
                if ($this->db->trans_status() === FALSE)
                {
                    //這批有錯就直接復原並且終止
                    $this->db->trans_rollback();
                    return 'expire old data failed:'.  implode('|', $row);
                }
            }
        }
        
        $this->db->trans_commit();
                
        return TRUE;
        
    }
    
    /**
     * 檢查重複
     * @param array $list
     * @return array
     */
    public function chk_symbol(&$list){
        $this->db->trans_start();
        
        $this->_insert_symbol($list);
        
        if($this->db->affected_rows() == 0){
            return array();
        }
        
        $query = $this->_chk_duplicat_symbol();
                
        $list_mss_id = array();
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                $list_mss_id[] = $row['mss_id'];
            }
        }
        $this->db->trans_rollback();
        
        $this->db->select('mss_id,symbol,security_group,ctime');
        $this->db->where_in('mss_id', $list_mss_id);
        $this->db->where_in('expired', 0);
        
        $query = $this->db->get(self::TB_MSS);

        
        return $query->result_array();        
    }
    
    /**
     * 寫入商品清單
     * @param array $list
     */
    private function _insert_symbol($list){
        $sql_key = "mss_id, symbol, security_group";
        
        $sql_batch = array();
        foreach($list as $row){
            $sql_batch[] = "('".$row['symbol_id']."','".$row['symbol']."','".$row['sec_group']."')";
        }
        $sql = "INSERT IGNORE INTO ".self::TB_MSS."(".$sql_key.") values".implode(',', $sql_batch);

        $query = $this->db->query($sql);
    }
    
    /**
     * 檢查重覆商品，並回傳要保留的 row
     * @return array
     */
    private function _chk_duplicat_symbol(){
        //取得有重複的資料
        $sql = "SELECT mss_id, symbol, security_group, ctime FROM ("
                    . "SELECT *, count(mss_id) num FROM ("
                        . "SELECT * FROM `".self::TB_MSS."` WHERE expired = 0 ORDER BY ctime DESC"
                    . ") so group by mss_id"
                . ") mss WHERE mss.num > 1 ";
//        
        return $this->db->query($sql);
    }
}
