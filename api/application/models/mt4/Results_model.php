<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MT4 業績 Model
 */
class results_model extends CI_Model{

    const TB_IB = 'ib';
    const TB_USER = 'user';
    const TB_MI = 'mt4_ib';
    const TB_MIR = 'mt4_ib_relation';
    const TB_MST = 'mt4_sync_trade';
    const TB_MF = 'money_funding';
    const TB_MRC = 'mt4_results_cus';
    const TB_MRO = 'mt4_results_org';
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }

    /**
     * 計算 個人業績
     * @param string $user_id 客戶編號
     * @param string $st_day 開始日期 y-m-d
     * @param string $end_day 結束日期 y-m-d
     * @param string $mt4_id MT4編號
     */
    public function count($user_id, $st_day, $end_day = '', $mt4_id = ''){
        
        if(empty($end_day)){
            $end_day = $st_day;
        }
        $end_day = date('Y-m-d', strtotime($end_day . "+1 day"));
        
        $sql_target = !empty($mt4_id) ? "mt4_id = '".$mt4_id."'" : "user_id = '".$user_id."'";
        
        //注意，子查詢 MST 統計每日， close_time 必須是 < $end_day，不會將結束日期計入!! 否則 end_day 會被偷計算 00:00 那一筆
        $sql = "SELECT r.*, u.ib_id, m.scale, (r.volume*m.scale/100)comission FROM ("
                    . "SELECT mt4_id, user_id, sum(volume) volume, DATE(close_time) close_date, sum(profit) profit , 0 funding "
                    //. "(SELECT sum(amount) FROM ".self::TB_MF." mf WHERE mf.user_id = mst.user_id AND ctime >= '".$st_day."' AND ctime <= '".$end_day."' AND mf_status = 1 group by user_id) funding "
                    . "FROM `mt4_sync_trade` mst "
                    . "WHERE $sql_target AND close_time >= '".$st_day."' AND close_time < '".$end_day."' "
                    . "GROUP BY mt4_id,DATE(close_time)"
                . ") r LEFT JOIN user u ON r.user_id = u.user_id LEFT JOIN mt4_ib m ON m.ib_id = u.ib_id";
        
        $query = $this->db->query($sql);
        $list_mrc = $query->result_array();
        
        //計算入金
        $sql = "SELECT DATE(mf.ctime) close_date, mf.user_id, mf_app_uid mt4_id, u.ib_id, mi.scale, sum(amount) funding, 0 volume, 0 profit, 0 comission "
                . "FROM ".self::TB_MF." mf "
                . "LEFT JOIN user u ON mf.user_id = u.user_id "
                . "LEFT JOIN mt4_ib mi ON mi.ib_id = u.ib_id "
                . "WHERE mf.user_id = '".$user_id."' AND mf.mf_app_id = 'mt4' AND mf.ctime >= '".$st_day."' AND mf.ctime <= '".$end_day."' AND mf_status = 1 "
                . "GROUP BY mf.mf_app_uid, DATE(mf.ctime)";
        $query = $this->db->query($sql);
        //$list_funding = $query->result_array();
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                $match = FALSE;
                if(count($list_mrc) > 0){
                    foreach($list_mrc as $idx => $_mrc){
                        if($_mrc['mt4_id'] == $row['mt4_id'] && $_mrc['close_date'] == $row['close_date']){
                            $list_mrc[$idx]['funding'] = $row['funding'];
                            $match = TRUE;
                            break;
                        }
                    }
                }
                
                if( ! $match){
                    $list_mrc[] = $row;
                }
            }
        }
        
        return $list_mrc;
    }
        
    /**
     * 儲存個人業績
     * @param array $results 個人業績資料
     * @param string $user_id 客戶編號
     * @return boolean
     */
    public function save($results, $user_id){
        //批次寫入限制筆數
        $batch_max = 100;
        $list_split = array_chunk($results, $batch_max);
        if(empty($list_split)){
            return 'chunk array failed:count='.count($results);
        }
                
        $sql_key = "close_date, mt4_id, user_id, ib_id, mrc_volume, mrc_scale, mrc_profit, mrc_funding, comission, ctime";
        
        $this->db->trans_start();
            
        $success_num = 0;
        foreach($list_split as $pack){
            $sql_batch = array();
            foreach($pack as $row){
                $sql_batch[] = "('".$row['close_date']."','".$row['mt4_id']."','".$row['user_id']."','".$row['ib_id']."',".$row['volume'].","
                        .$row['scale'].",'".$row['profit']."', ".$row['funding'].", ".$row['comission'].", NOW())";
            }
            $sql = "INSERT IGNORE INTO ".self::TB_MRC."(".$sql_key.") values".implode(',', $sql_batch);
            
            $query = $this->db->query($sql);
        }
        
        //取得有重複的資料 (mt4_id + close_date 唯一)
        $sql = "SELECT close_date, mt4_id, ctime FROM ("
                    . "SELECT *, count(close_date) num FROM ("
                        . "SELECT * FROM `".self::TB_MRC."` WHERE user_id = '".$user_id."' AND expired = 0 ORDER BY ctime DESC"
                    . ") so group by close_date, mt4_id"
                . ") mrc WHERE mrc.num > 1 ";
        
        $query = $this->db->query($sql);
        
//        if ($this->db->trans_status() === FALSE)
//        {
//            //這批有錯就直接復原並且終止
//            $this->db->trans_rollback();
//            return '';
//        }
        
        //將舊資料註記刪除
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                $this->db->where('mt4_id', $row['mt4_id']);
                $this->db->where('close_date', $row['close_date']);
                $this->db->where_not_in('ctime', $row['ctime']);

                $this->db->set('expired', 1);
                $this->db->set('extime', 'NOW()', FALSE);

                $this->db->update(self::TB_MRC); 
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
     * 查詢個人業績 ( by 單一顧問)
     * @param string $st_day 開始日期 y-m-d
     * @param string $end_day 結束日期 y-m-d
     * @param string $ib_id 顧問編號
     */
    public function search($st_day, $end_day, $ib_id){
        
        $sql = "SELECT mrc.user_id, u.first_name, u.last_name, sum(mrc_volume) mrc_volume, sum(mrc_profit) mrc_profit, sum(comission) comission, "
                . "(SELECT sum(amount) FROM ".self::TB_MF." mf WHERE mf.user_id = mrc.user_id AND ctime >= '".$st_day."' AND ctime <= '".$end_day."' AND mf_status = 1 group by user_id) funding "
                . "FROM ".self::TB_MRC." mrc "
                . "LEFT JOIN ".self::TB_USER." u ON u.user_id = mrc.user_id "
                . "WHERE mrc.ib_id = '".$ib_id."' AND mrc.close_date >= '".$st_day."' AND mrc.close_date <= '".$end_day."' AND mrc.expired = 0 "
                . "GROUP BY mrc.user_id";
        
        $query = $this->db->query($sql);
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array();     
    }
    
    /**
     * 查詢個人業績 ( by 單一客戶)
     * @param string $st_day 開始日期 y-m-d
     * @param string $end_day 結束日期 y-m-d
     * @param string $ib_id 顧問編號
     * @param string $user_id 客戶編號
     */
    public function search_by_user_id($st_day, $end_day, $user_id){
        $sql = "SELECT close_date, mt4_id, sum(mrc_volume) mrc_volume, sum(mrc_profit) mrc_profit, sum(comission) comission, "
                . "(SELECT sum(amount) FROM ".self::TB_MF." mf WHERE mf_app_id = 'mt4' AND mf_app_uid = mrc.mt4_id AND ctime >= '".$st_day."' AND ctime <= '".$end_day."' AND mf_status = 1 group by mt4_id) funding "
                . "FROM ".self::TB_MRC." mrc WHERE user_id = '".$user_id."' AND close_date >= '".$st_day."' AND close_date <= '".$end_day."' AND expired = 0 GROUP BY mt4_id";
        
        $query = $this->db->query($sql);
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array();            
    }
    
    /**
     * 檢查全站錯誤的 組織佣金比例
     * @return array (less_zero => array(小於等於0者), big_son => array(子顧問大於等於父的佣金比例), conflict => array(計算有差異者))
     */
    public function chk_diff_scale(){
        //已通過審核，diff_scale 為 <= 0
        $this->db->select('ib_id, diff_scale');
        $this->db->where('approve', 1);
        $this->db->where('diff_scale <=', 0);
        $query = $this->db->get(self::TB_MI);
        
        $re['less_zero'] = $query->num_rows() > 0 ? $query->result_array() : array();
        
        //篩選出 子顧問 >= 父顧問 的佣金比例
        $sql = "SELECT * FROM ("
                    . "SELECT mi.ib_id, mi.scale, mir.parent_id, (SELECT mi2.scale FROM ".self::TB_MI." mi2 WHERE mi2.ib_id = mir.parent_id) parent_scale "
                    . "FROM ".self::TB_MI." mi LEFT JOIN ".self::TB_MIR." mir ON mir.ib_id = mi.ib_id WHERE mir.parent_id is not null"
                . ") two WHERE two.scale > two.parent_scale";
        $query = $this->db->query($sql);
        $re['big_son'] = $query->num_rows() > 0 ? $query->result_array() : array();
        
        //篩選出計算有誤者
        $sql = "SELECT ct.ib_id, ct.parent_id, ct.diff_scale count_diff_scale, re.diff_scale real_diff_scale FROM (". $this->_sql_count_diff_scale().") ct "
                . "LEFT JOIN mt4_ib re ON re.ib_id = ct.ib_id "
                . "WHERE ct.diff_scale != re.diff_scale";
        $query = $this->db->query($sql);
        $re['conflict'] = $query->num_rows() > 0 ? $query->result_array() : array();
        
        return $re;
    }
    
    /**
     * 計算組織佣金的 SQL
     * @param string $ib_id 顧問編號 (沒指定，就跑全部)
     * @return string
     */
    private function _sql_count_diff_scale($ib_id = ''){
        //未審核者，也可計算組織佣金比例
        $sql_target = ( ! empty($ib_id)) ? "mi.ib_id = '".$ib_id."' AND " : "";
        return "SELECT mi.ib_id, mir.parent_id, (SELECT mi2.scale - mi.scale FROM mt4_ib mi2 WHERE mi2.ib_id = mir.parent_id) diff_scale "
                . "FROM `mt4_ib` mi LEFT JOIN mt4_ib_relation mir ON mir.ib_id = mi.ib_id WHERE ". $sql_target ." mir.parent_id is not null";
    }
    
    /**
     * 更新組織佣金比例(與父佣金差值)
     * @param string $ib_id 顧問編號 (沒指定，就跑全部)
     */
    public function update_diff_scale($ib_id = ''){
        
        $sql = $this->_sql_count_diff_scale($ib_id);
        
        $query = $this->db->query($sql);
        if($query->num_rows() <= 0){
            return 'count failed, cant find parent.';
        }
        
        $results = $query->result_array();
        
        $batch_max = 100;
        $list_split = array_chunk($results, $batch_max);
        if(empty($list_split)){
            return 'chunk array failed:count='.count($results);
        }
                
        $sql_key = "close_date, mt4_id, user_id, ib_id, mrc_volume, mrc_scale, mrc_profit, comission, ctime";
        
        $this->db->trans_start();
            
        $success_num = 0;
        $wrong_scale = array();
        foreach($list_split as $pack){
            $sql_batch = array();
            $list_ib_id = array();
            foreach($pack as $row){
                if(intval($row['diff_scale']) < 0){
                    $wrong_scale[] = $row;
                    error_log('count wrong diff_scale:'.implode(',', $row));
                }else{
                    $sql_batch[] = "WHEN ib_id = '".$row['ib_id']."' THEN ".$row['diff_scale'];
                    $list_ib_id[] = "'".$row['ib_id']."'";
                }
            }
            $sql = "UPDATE ".self::TB_MI." SET diff_scale = CASE ".implode(' ', $sql_batch)." END WHERE ib_id IN (".  implode(',', $list_ib_id).")";

            $query = $this->db->query($sql);
            if ($this->db->trans_status() === FALSE)
            {
                //這批有錯就直接復原並且終止
                $this->db->trans_rollback();
                return 'update mt4_ib failed:';
            }
        }
        
        //如果有 <= 0 的 diff_scale 就取消全部操作
        if( ! empty($wrong_scale)){
            $this->db->trans_rollback();
            return 'some ib scale big then parent, check Dashboard_api first.';
        }        
        
        $this->db->trans_commit();
        
        return TRUE;
    }
    
    public function count_org_results($ib_id, $st_day, $end_day = ''){
        if(empty($end_day)){
            $end_day = $st_day;
        }
        $end_day = date('Y-m-d', strtotime($end_day . "+1 day"));
        
        $sql_target = is_array($ib_id) ? " IN ('".implode("','", $ib_id)."')" : "='".$ib_id."'";
        
        //注意，子查詢 MTL 統計每日， close_time 必須是 < $end_day，不會將結束日期計入!! 否則 end_day 會被偷計算 00:00 那一筆
        $sql = "SELECT *, (m.volume*m.diff_scale/100) bonus FROM ("
                    . "SELECT mrc.close_date, mrc.ib_id, sum(mrc.mrc_volume) volume, mi.diff_scale, sum(mrc.mrc_profit) profit , sum(mrc.mrc_funding) funding FROM ".self::TB_MRC." mrc "
                    . "LEFT JOIN ".self::TB_MI." mi ON mi.ib_id = mrc.ib_id "
                    . "WHERE mrc.ib_id ".$sql_target." AND close_date >= '".$st_day."' AND close_date < '".$end_day."' AND expired = 0 "
                    . "GROUP BY mrc.ib_id, close_date"
                . ") m";
        
        $query = $this->db->query($sql);
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array();
    }
    
       
    /**
     * 儲存組織業績
     * @param array $results 組織業績資料
     * @param string $ib_id 顧問編號
     * @return boolean
     */
    public function save_org_results($results, $ib_id){
        //批次寫入限制筆數
        $batch_max = 100;
        $list_split = array_chunk($results, $batch_max);
        if(empty($list_split)){
            return 'chunk array failed:count='.count($results);
        }
                
        $sql_key = "close_date, ib_id, diff_scale, mro_volume, mro_profit, mro_funding, bonus, ctime";
        
        $this->db->trans_start();
            
        $success_num = 0;
        foreach($list_split as $pack){
            $sql_batch = array();
            foreach($pack as $row){
                $sql_batch[] = "('".$row['close_date']."','".$row['ib_id']."',".$row['diff_scale'].","
                        .$row['volume'].", ".$row['profit'].", ".$row['funding'].", ".$row['bonus'].", NOW())";
            }
            $sql = "INSERT IGNORE INTO ".self::TB_MRO."(".$sql_key.") values".implode(',', $sql_batch);
            
            $query = $this->db->query($sql);
        }
        
        //取得有重複的資料 (mt4_id + close_date 唯一)
        $sql = "SELECT close_date, ib_id, ctime FROM ("
                    . "SELECT *, count(close_date) num FROM ("
                        . "SELECT * FROM `".self::TB_MRO."` WHERE ib_id = '".$ib_id."' AND expired = 0 ORDER BY ctime DESC"
                    . ") so group by close_date, ib_id"
                . ") mro WHERE mro.num > 1 ";
        
        $query = $this->db->query($sql);
        
//        if ($this->db->trans_status() === FALSE)
//        {
//            //這批有錯就直接復原並且終止
//            $this->db->trans_rollback();
//            return '';
//        }
        
        //將舊資料註記刪除
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                $this->db->where('ib_id', $row['ib_id']);
                $this->db->where('close_date', $row['close_date']);
                $this->db->where_not_in('ctime', $row['ctime']);

                $this->db->set('expired', 1);
                $this->db->set('extime', 'NOW()', FALSE);

                $this->db->update(self::TB_MRO); 
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
     * 查詢組織業績
     * @param string $st_day 開始日期 y-m-d
     * @param string $end_day 結束日期 y-m-d
     * @param string $list_ib_id 顧問編號清單
     */
    public function search_org_results($st_day, $end_day, $list_ib_id){
        
        $sql = "SELECT i.ib_id, i.first_name, i.last_name, sum(mro_volume) volume, sum(bonus) bonus, sum(mro_profit) profit, sum(mro_funding) funding "
                //. "(SELECT sum(amount) FROM ".self::TB_MF." mf WHERE mf.user_id = mrc.user_id AND ctime >= '".$st_day."' AND ctime <= '".$end_day."' AND mf_status = 1 group by user_id) funding "
                . "FROM ".self::TB_MRO." mro "
                . "LEFT JOIN ib i ON mro.ib_id = i.ib_id  "
                . "WHERE i.ib_id IN ('".implode("','", $list_ib_id)."') AND close_date >= '".$st_day."' AND close_date <= '".$end_day."' AND mro.expired = 0 "
                . "GROUP BY i.ib_id";
        
        $query = $this->db->query($sql);
        if($query->num_rows() <= 0){
            return array();
        }
        
        return $query->result_array();     
    }
}
