<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * Dashboard api
 */
class Dashboard_api extends CI_Controller {

    function __construct(){
        parent::__construct();

        if( IS_ONLINE){
            die('dev env only');
        }
    }  
    
    public function index(){
        
        $this->load->model('mt4/results_model');
        $this->load->model('mt4/ib_model');
        
        echo '找不到老爸：';
        echo '<pre>';
        var_dump($this->ib_model->no_parent());
        echo '</pre>';
        
        $chk_diff_scale = $this->results_model->chk_diff_scale();
        echo '錯誤的組織佣金：';
        echo '<pre>';
        var_dump($chk_diff_scale);
        echo '</pre>';
        exit();
        
        echo '本期公司總佣金/總手數';
        
        echo '內轉被強制終止';
        
        echo '餘額負值的帳號';
        
    }
    
}
