<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MT4 交易 Model
 */
class trade_model extends CI_Model{

    const TB_MST = 'mt4_sync_trade';
    const TB_MU = 'mt4_user';
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }

    /**
     * 新增 log
     * @param array $list array(0=>,1=>,2=>...) n筆交易資料
     * @param string $user_id 客戶編號
     * @param string $mt4_id MT4編號
     * @return mix TRUE=全部成功, FALSE=全部失敗, INT=部分成功
     */
    public function add(&$list, $mt4_id){
        
        //批次寫入限制筆數
        $batch_max = 100;
        $list_split = array_chunk($list, $batch_max);
        if(empty($list_split)){
            return FALSE;
        }
        
        $sql_key = "mt4_id, user_id, mt4_order, cmd, symbol, volume, open_price, open_time, close_price, close_time, profit, note";
        
        $success_num = 0;
        foreach($list_split as $pack){
            $sql_batch = array();
            foreach($pack as $row){
                $sql_user_id = "SELECT user_id FROM ".self::TB_MU." WHERE mt4_id = '".$mt4_id."'";
                //注意！！交易紀錄手數要 / 100
                $sql_batch[] = "('".$mt4_id."',(".$sql_user_id."),".$row['order'].",".$row['cmd'].",'".$row['symbol']."',".(intval($row['volume'])/100).",'"
                        .$row['open_price']."',FROM_UNIXTIME(".$row['open_time']."),'".$row['close_price']."',FROM_UNIXTIME(".$row['close_time']."),"
                        .$row['profit'].",'".$row['comment']."')";
            }
            //交易紀錄只要釋出，就不會再修改
            $sql = "INSERT IGNORE INTO ".self::TB_MST."(".$sql_key.") values".implode(',', $sql_batch);

            $this->db->trans_start();
            
            $query = $this->db->query($sql);

            if ($this->db->trans_status() === FALSE)
            {
                //這批有錯就直接復原並且終止
                $this->db->trans_rollback();
                return $success_num == 0 ? FALSE : $success_num;
            }
            else
            {
                $success_num = $success_num + $this->db->affected_rows();
                $this->db->trans_commit();
            }
        }
        
        return TRUE;
    }
       
    /**
     * 取得最後單號
     * @param string $user_id 客戶編號
     * @return array (mt4_id => mt4_order, ...)
     */
    public function list_last_order($user_id){        
        $sql = "SELECT mt4_id, mt4_order FROM ( SELECT * FROM ".self::TB_MST." WHERE user_id = '".$user_id."' ORDER BY close_time DESC ) s GROUP BY s.mt4_id";
        
        $query = $this->db->query($sql);
        if($query->num_rows() <= 0){
            return array();
        }
        
        $list = array();
        foreach($query->result_array() as $row){            
            $list[$row['mt4_id']] = $row['mt4_order'];
        }
        
        return $list;
    }
    
    /**
     * 取得交易歷史資料
     * @param string $mt4_id mt4 編號
     * @return array
     */
    public function list_histroy($list_mt4_id, $st_day, $end_day = ''){
        
        if(empty($end_day)){
            $end_day = $st_day;
        }
        $end_day = date('Y-m-d', strtotime($end_day . "+1 day"));
        
        $sql = "SELECT * FROM ".self::TB_MST." mst "
                . "WHERE mst.mt4_id IN ('".  implode("','", $list_mt4_id)."') AND mst.close_time >= '".$st_day."' AND mst.close_time < '".$end_day."' "
                . "ORDER BY mst.close_time DESC";
        
        $query = $this->db->query($sql);
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array();
    }
}
