<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 展示
 */
class Demo extends CI_Controller {

    /**
     * 建構子，優先執行
     */
    public function __construct()
    {
        parent::__construct();
        
        if( IS_ONLINE){
            die('dev env only');
        }
    }
    
	public function index()
	{
        //直接在 ctrl 印出，同樣會出現在畫面上
        echo "This is Benson test!";
        
        //資料送至 view 呈現
        $data = array(
            'key1' => 'aaa',
            'key2' => 'bbb'
        );
        
        //Load 樣板並顯示
        $this->load->view('demo_view', $data);
        //Load 樣板變數中，再做另外處理
        $view = $this->parser->parse('demo_view', $data);
        
	}
    
    public function info()
    {
        phpinfo();
    }
    
    public function frame()
    {
        load_frame('mt4', __CLASS__, __FUNCTION__, array(), FALSE, 'demo_view');
    }
    
    /**
     * 測試 Get
     */
    public function testget()
    {
        //取得 key 為 "g" 的 paramater
        $str = $this->input->get('g');
        
        echo 'test Get<br>';
        echo 'get='.$str;
    }
        
    /**
     * 測試 segment
     * @author bs
     * @param mix $seg1
     * @param mix $seg2
     * @return void
     */
    public function testsegment($seg1, $seg2)
    {
        echo 'test segment<br>';
        echo "seg1=".$seg1.',seg2='.$seg2;
    }
    
    public function env()
    {
        echo '<pre>';
        echo '公司編號='.COM_ID;
        echo '<br />環境參數';
        echo '<br />base_url()='.base_url();
        echo '<br />current_url()='.current_url();
        echo '<br />site_url()='.site_url();
        echo '<br />server name='.$_SERVER['SERVER_NAME'];
        echo '<br />timezone='.date_default_timezone_get();
        echo '<br />now='.date('Y-m-d H:i:s', time());
        echo '<br />APPPATH='.APPPATH;
                
        echo '<br />目前環境是:';
        
        if(IS_DEV)
        {
            echo 'dev';
        }elseif(IS_BETA)
        {
            echo 'beta';
        }elseif(IS_PREV)
        {
            echo 'prev';
        }elseif(IS_ONLINE)
        {
            echo 'online';
        }
        echo '<br />目前系統為:';
        if(IS_ADMIN)
        {
            echo '行政後台';
        }elseif(IS_IB)
        {
            echo '顧問';
        }elseif(IS_CLIENT)
        {
            echo '客戶端';
        }
        
        
        echo '<br />S3 圖片庫';
        echo '<br />S3根目錄:'.S3_ROOT;
        echo '<br /><img src="'.IMG_ROOT.'Koala.jpg" style="height:100px;width:100px;">';
        
        echo '<br />ASSETS_IMG='.ASSETS_IMG;
        echo '<br />ASSETS_JS='.ASSETS_JS;
        echo '<br />ASSETS_CSS='.ASSETS_CSS;
        echo '</pre>';
    }
    
    /**
     * 測試 Session
     */
    public function sessions()
    {
        //Load library
        $this->load->library('session');
        
        //取得 session 值
        $name = $this->session->userdata('name');
        echo '$name 值為'.$name;
        
        //如果為空，就寫入
        if(empty($name))
        {
            echo '值不存在，寫入 session';
            $this->session->set_userdata('name', 'value~');
            
        }else
        {
            echo '值已經存在，清空完畢！';
            $this->session->unset_userdata('name');            
        }
        
    }
    
    /**
     * 多國語系
     */
    public function lang($lang = 'en')
    {
        $this->load->library('session');
        $this->session->set_userdata('lang', $lang);
        
        echo '語言設定成 '.$this->session->userdata('lang');
        
    }
    
    /**
     * 測試 API
     */
    public function api($user_id = 'AE000001')
    {
        $this->load->library('api_lib');
        
        $param = array(
            'user_id' => $user_id,
        );
        
        $api_re = $this->api_lib->call_api(API_PATH.'user_api/info', json_encode($param));
        
        if($api_re['status'] === TRUE){
            echo '<pre>';
            var_dump($api_re);
            echo '</pre>';
        }else{
            echo 'none';
        }
    }
}
