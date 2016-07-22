<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * MT4 share model
 *
 * @author wild
 */
class mt4_share_lib {
    
    const TB_MSP = 'mt4_symbol_plan';
    
    public function __construct()
    {
    }
    
    /**
     * 檢查新增佣金群組資料
     * @param array $post
     * @return array(string,array)
     */
    static public function add_symbol_plan_chk(&$post){
        $CI = &get_instance();
        $base_data = array();
        
        if( ! isset($post['msp_id']) || empty($post['msp_id'])){
            return array('Parameter is required:msp_id', '');
        }
        
        if( ! isset($post['list']) || empty($post['list'])){
            return array('Parameter is required:list', '');
        }
        
        $CI->load->model('mt4/base_model');
        $list_security_group = $CI->base_model->list_security_group();
        
        //必要
        $list_sec_spread = array();
        $list_sec_vol = array();
        foreach($post['list'] as $row){
            foreach(array('security_group', 'msp_scale','msp_spread','msp_volume_min','msp_volume_max') as $field){
                if( ! isset($row[$field])){
                    return array('Parameter is required:'.$field, '');
                }
                $row['msp_id'] = $post['msp_id'];
                
                //檢查小於0
                if($field != 'security_group'){
                    if($row[$field] < 0){
                        return array($field.' have to bigger than 0', '');
                    }
                }
            }
            
            //檢查security_group 是否存在
            if( ! in_array($row['security_group'], $list_security_group )){
                return array('security group not exist:'.$row['security_group'], '');
            }
            
            //檢查點差是否大於佣金
            if($row['msp_scale'] > $row['msp_spread']){
                return array('scale have to small than spread:'.$row['security_group'], '');
            }
            
            //檢查級距大小值
            if(intval($row['msp_volume_min']) >= intval($row['msp_volume_max'])){
                return array('volume_min have to small than volume_max:'.$row['security_group'], '');
            }
            
            //檢查點差是否相同
            if(isset($list_sec_spread[$row['security_group']])){
                if($row['msp_spread'] != $list_sec_spread[$row['security_group']]){
                    return array('same security group\'s spread have conflict:'.$row['security_group'], '');
                }
            }else{
                $list_sec_spread[$row['security_group']] = $row['msp_spread'];
            }
            
            //檢查級距重疊
            if(isset($list_sec_vol[$row['security_group']])){
                foreach($list_sec_vol[$row['security_group']] as $vol){
                    if(($vol['min'] <= $row['msp_volume_min'] && $row['msp_volume_min'] <= $vol['max']) ||
                            ($vol['min'] <= $row['msp_volume_max'] && $row['msp_volume_max'] <= $vol['max'])){
                        return array('volume range have overlapping:'.$row['security_group'], '');
                    }
                }
            }
            $list_sec_vol[$row['security_group']][] = array('min' => $row['msp_volume_min'], 'max' => $row['msp_volume_max']);
            
            //save
            $base_data[] = $row;
        }
        
        //FIXME:CI form validation
        
        return array('', $base_data);
    }
    
    /**
     * 新增佣金群組
     * @param string $app 應用程式名稱
     * @param string $app_uid 應用程式客戶編號
     * @param array $data 資料
     * @param array $db
     */
    static public function add_symbol_plan(&$data){
        $CI = &get_instance();
        $CI->load->database();
        
        $CI->db->select('*');
        $CI->db->where('msp_id', $data[0]['msp_id']);
        $query = $CI->db->get(self::TB_MSP);
        if($query->num_rows() > 0){
            return 'group data exist.';
        }
        
        $CI->db->trans_start();
        
        $sql_key = "msp_id,security_group,msp_scale,msp_spread,msp_volume_min,msp_volume_max";
        
        $sql_batch = array();
        $symbol_group = array();
        foreach($data as $row){
            $sql_batch[] = "('".$row['msp_id']."','".$row['security_group']."',".$row['msp_scale'].",".$row['msp_spread'].",".$row['msp_volume_min'].",".$row['msp_volume_max'].")";
            $symbol_group[$row['security_group']] = array('name' => $row['security_group'], 'enable' => 1, 'spread' => $row['msp_spread']);
        }
        $sql = "INSERT IGNORE INTO ".self::TB_MSP."(".$sql_key.") values".implode(',', $sql_batch);

        $query = $CI->db->query($sql);
        
        if ($CI->db->trans_status() === FALSE || count($data) !== $CI->db->affected_rows())
        {
            $CI->db->trans_rollback();
            return 'insert db failed.';
        }
        
        
		include_once APPPATH.'libraries/mt4_com/Mt4_com_lib.php';
		$mt4_com = new mt4_com_lib();
        
        //建立 B Book user group
		$mt4_re = $mt4_com->add_group('B_'.$data[0]['msp_id'], $symbol_group);        
        if( (int)$mt4_re['status'] !== mt4_com_lib::RET_SUCCESS){
            //這批有錯就直接復原並且終止
            $CI->db->trans_rollback();
            return 'mt4_com add_group failed.'.$mt4_re['status'];
        }
        
        //建立 A Book user group
		$mt4_re = $mt4_com->add_group('A_'.$data[0]['msp_id'], $symbol_group);
        if( (int)$mt4_re['status'] !== mt4_com_lib::RET_SUCCESS){
            logger_err(__CLASS__, __FUNCTION__, 'Create MT4 user group part failed:'.'A_'.$data[0]['msp_id'].', mt4_re:'.$mt4_re['status']);
        }
        
        $CI->db->trans_commit();
        
        return '';
        
    }
}