<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Minify
 */
class Minify extends CI_Controller {

    /**
     * 建構子，優先執行
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    public function debug($mode = 'off'){
        $this->session->set_userdata('minify_debug', $mode == 'on');
        
        //取得 SESSION資料(無=>回傳 FALSE)
        if($this->session->userdata('minify_debug')){
            die('Minify Debug Mode [ ON ]');
        }else{
            die('Minify Debug Mode [ OFF ]');
        }
    }
    
    public function clean($mode = 'scan'){
//        switch($mode){
//            case 'scan':
//                $assets_dir = $this->config->item('assets_dir', 'minify');
//                if(!empty($assets_dir)){
//                    array_map('unlink', glob($assets_dir.'__scan*'));
//                }
//                break;
//            case 'all':
//                $assets_dir = $this->config->item('assets_dir', 'minify');
//                if(!empty($assets_dir)){
//                    array_map('unlink', glob($assets_dir.'*.json'));
//                }
//                break;
//        }
    }
}
