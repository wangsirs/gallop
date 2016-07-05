<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_lib
{
	private $_CI;
	private $_status_code;
    private $_action;
    
	function __construct()
	{
		$this->_CI =& get_instance();
        
        $this->_status_code = $this->_CI->config->item($this->_CI->uri->segment(1));//讀取 config/controller/xxx_code.php 檔案
        $this->_action = $this->_CI->uri->segment(2);//取得使用類別
	}
    
    /**
     * 接收JSON
     */
	public function json_input($json_data, $is_array = FALSE)
	{
        $data = json_decode($json_data, $is_array);
        
        if(empty($data))
        {
            //$this->_json_output(array(201, 'json format error'));
        }
        
        return $data;
	}
    
    /**
     * 回傳JSON
     */
	public function json_output($header = array(), $body = array(), $info = array())
	{
        return $this->_json_output($header, $body, $info);
	}
    
    /**
     * 回傳JSON, 內部使用
     */
	private function _json_output($header = array(), $body = array(), $info = array())
	{
        list($head_status_code, $head_status_msg) = $header;
        
        //JSON 的 Header 需要用此 Method 製作
        $header = $this->_CI->pub->get_api_header(
            $this->_status_code['Controller'],
            $this->_status_code['Method'][$this->_action],
            $head_status_code,
            $head_status_msg
        );
        
        //LOG
        $log = '[POST][TYPE:' . $this->_CI->uri->segment(1) . '][ACTION:' . $this->_action . '][OUT][DATA:' . json_encode($body) . ']';
        $this->_CI->pub->set_log(strtoupper($this->_CI->uri->segment(1)), $log);
        
        echo $this->_CI->pub->json_format($_POST, $header, $body, $info);//JSON 內容輸出, 使用 json_format 進行輸出格式
        exit();
	}
    
    /**
     * request API
     * @author bs
     * @param string $api_url api 網址
     * @param string $json_data json編碼資料
     * @return mix
     */
    public function call_api($api_url, $json_data){                                                                        
        $ch = curl_init($api_url);                                      
        curl_setopt($ch, CURLOPT_POST, 1);                                                      
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($json_data),
            'Authorization: Basic '. base64_encode($this->_CI->config->item('rest_user').':'.$this->_CI->config->item('rest_pass'))
            )                                                                       
        );                          
        
        $result = array('data' => json_decode(curl_exec($ch), TRUE));
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        if($status === 200) $status = TRUE;
        $result = array_merge(array('status' => $status), $result);
        
        return $result;
    }
        
    /**
     * 資料過濾
     */
    public function data_filter($array, $key)
    {
        $return_data = '';
        
        if(isset($array[$key]))
        {
            if(is_string($array[$key]))
            {
                $return_data = trim($array[$key]);
            }
            else
            {
                $return_data = $array[$key];
            }
        }
        
        return $return_data;
    }
}