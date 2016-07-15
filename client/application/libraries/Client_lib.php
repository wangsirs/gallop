<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 客戶基本資料
 */
class client_lib
{   
    static private $info = array();
            
	function __construct()
	{   
	}
    
    /**
     * 更改欄位值
     * @param string $field 欄位名稱
     * @param mix $value 欄位值
     */
    static function set($field, $value){
        self::$info[$field] = $value;
        $CI =& get_instance();
        $CI->session->set_userdata('user', self::$info);
    }
    
    /**
     * 取得欄位資料
     * @param string $field 欄位名稱
     * @return mix
     */
    static function get($field){
        if(empty(self::$info)){
            $CI =& get_instance();
            self::$info = $CI->session->userdata('user');
        }
        
        return self::$info[$field];
    }
    

    static function flush(){
        
    }
    
    /**
     * 取得簡易客戶資料
     * @return array
     */
    static function all(){
        return self::$info;
    }
    
    /**
     * 客戶編號
     */
    static function user_id(){
        return self::get('user_id');
    }       
    
    /**
     * 取得完整姓名
     * @return string
     */
    static function full_name(){
        return self::get('first_name').' '.self::get('last_name');
    }
    
    /**
     * 取得目前正在使用的語系
     */
    static function lang(){
        return self::get('last_lang');
    }
}