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
        
        //檢查 msp_id 是否存在
        
        
        if( ! isset($post['list']) || empty($post['list'])){
            return array('Parameter is required:list', '');
        }
        
        $CI->load->model('mt4/base_model');
        $list_security_group = $CI->base_model->list_security_group();
        
        //必要
        $list_sec_spead = array();
        
        foreach($post['list'] as $row){
            foreach(array('security_group', 'msp_scale','msp_spead','msp_volume_min','msp_volume_max') as $field){
                if( ! isset($row[$field])){
                    return array('Parameter is required:'.$field, '');
                }
                $row['msp_id'] = $post['msp_id'];
                $base_data[] = $row;
            }
            
            //檢查security_group 是否存在
            if( ! in_array($row['security_group'], $list_security_group )){
                return array('security group not exist:'.$row['security_group'], '');
            }
            
            //檢查級距大小值
            if(intval($row['msp_volume_min']) >= intval($row['msp_volume_max'])){
                return array('volume_min have to small than volume_max:'.$row['security_group'], '');
            }
            
            //檢查點差是否相同
            if(isset($list_sec_spead[$row['security_group']])){
                if($row['msp_spead'] != $list_sec_spead[$row['security_group']]){
                    return array('same security group\'s spead have conflict:'.$row['security_group'], '');
                }
            }else{
                $list_sec_spead[$row['security_group']] = $row['msp_spead'];
            }
        }
        
        
            //檢查級距重疊
        
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
        
        $data['mf_app_id'] = $app;
        $data['mf_app_uid'] = $app_uid;
        
        //寫入 user
        $db->set('ctime', 'NOW()', FALSE);
        $db->insert(self::TB_MF, $data);
    }
}
