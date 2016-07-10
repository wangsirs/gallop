<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Admin
*/
class admin extends CI_Controller {

    private $_app = 'admin';

    /**
    * 建構子，優先執行
    */
    public function __construct()
    {
        parent::__construct();

        //網址尾端帶 ?ajax=1 會辨識為 ajax 方式進入
        $is_ajax = ( ! empty($this->input->get('ajax')));
    }


    public function index(){
        $data = array();
        load_frame( __CLASS__, __FUNCTION__, $data, FALSE, __FUNCTION__.'_view');
    }

}
