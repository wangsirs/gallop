<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Pincode<br>
 * 基準時間皆以 php server 為準
 */
class pincode_lib {
    
    const TB_PC = 'pincode';
    
    public function __construct()
    {
    }
    
    /**
     * 取得 pincode
     * @param string $com_id 公司編號
     * @param string $uid 對應帳號 (user_id, ib_id)
     * @param string $flag 動作旗標
     * @param string $alive 存活時間長度(分鐘)
     * @param string $size pin code 數字長度 (非必要)
     * @return string pincode
     */
    static public function get($com_id, $uid, $flag, $alive = 5, $size = 4){
        //產生 pincode        
        $pincode = rand(pow(10, ($size - 1)), pow(10, $size) - 1);

        if(empty($com_id) || empty($uid) || empty($flag)){
            return FALSE;
        }

        //寫入資料庫
        $CI =& get_instance();
        $CI->load->database();
        $data = array(
            'uid' => $uid,
            'com_id' => $com_id,
            'pincode' => $pincode,
            'flag' => $flag,
            'alive' => $alive
        );
        
        //以 web server timestamp 為準
        $CI->db->set('ctime', 'FROM_UNIXTIME('.time().')', FALSE);
        $CI->db->set('extime', 'FROM_UNIXTIME('.(time()+$alive*60).')', FALSE);

        $CI->db->insert(self::TB_PC, $data); 
       
        return $pincode;
    }
    
    /**
     * 驗證 pincode
     * @param string $com_id 公司編號
     * @param string $uid 對應帳號 (user_id, ib_id)
     * @param string $flag 動作旗標
     * @param string $pincode Pincode
     * @return boolean 結果
     */
    static public function vali($com_id, $uid, $flag, $pincode){
        //寫入資料庫
        $CI =& get_instance();
        $CI->load->database();

        $CI->db->where('pincode', $pincode);
        $CI->db->where('flag', $flag);
        $CI->db->where('com_id', $com_id);
        $CI->db->where('uid', $uid);
        
        //以 web server timestamp 為準
        $CI->db->where('extime >', 'FROM_UNIXTIME('.(time()).')', FALSE);
        
        $CI->db->set('expired', 1);        
        $query = $CI->db->update(self::TB_PC);
        
        $num = $CI->db->affected_rows();        
        //$CI->db->last_query();
        
        //清除舊紀錄 (隨機)
        if(2 == substr(time(), -1)){
            self::clear();
        }
        
        return $num > 0;
    }
    
    /**
     * 清除舊驗證紀錄
     * @param int $over_days 保留 N 天內，超過 N 天都清掉
     * @return boolean
     */
    static public function clear($over_days = 7){
        $CI =& get_instance();
        $CI->load->database();
        
        $CI->db->where('extime <', 'FROM_UNIXTIME('.(time() - $over_days * 24 * 60 * 60).')', FALSE);
        $CI->db->delete(self::TB_PC); 
        
        return $CI->db->affected_rows();
    }   
}
