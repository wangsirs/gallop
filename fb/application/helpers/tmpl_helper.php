<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 存成 json
 * @param string $path 檔案路徑 ex. aaa/bb/
 * @param string $fname 檔案名稱 ex. cc.json
 * @param mix $data 資料
 * @return bool
 */
function json_save($path, $fname, $data){
    if('/' === $path[0]){
        $path = substr($path, 1);
    }
    if('/' !== $path[strlen($path)-1]){
        $path .= '/';        
    }
    
    $path = TMPL_PATH.$path;
    if( ! is_dir($path)){
        mkdir($path, 0777, TRUE);
    }
    
    return FALSE !== file_put_contents($path.$fname, json_encode($data));
}

/**
 * 讀取 json
 * @param string $path 檔案路徑 ex. aaa/bb/
 * @param string $fname 檔案名稱 ex. cc.json
 * @param boolean $is_object 是物件型態
 * @return array
 */
function json_read($path, $fname, $is_object= FALSE){
    if('/' === $path[0]){
        $path = substr($path, 1);
    }
    if('/' !== $path[strlen($path)-1]){
        $path .= '/';        
    }
    
    $path = TMPL_PATH.$path;
    
    $conetnt = @file_get_contents($path.$fname);
    if('' == $conetnt){
        return '';
    }
    return json_decode($conetnt, ! $is_object);
}

/**
 * json 增加資料 (會一直開關檔案)
 * @param string $path 檔案路徑 ex. aaa/bb/
 * @param string $fname 檔案名稱 ex. cc.json
 * @param array|string $data 要增加的資料
 */
function json_push($path, $fname, $data){
    $list = json_read($path, $fname);
    if(empty($list)){
        $list = array();
    }
    
    if(is_array($data)){
        $list = array_merge($list, $data);
    }else{
        $list[] = $data;
    }
    return json_save($path, $fname, $list);
}

/**
 * 刪除 json 檔案
 * @param string $path 檔案路徑 ex. aaa/bb/
 * @param string $fname 檔案名稱 ex. cc.json
 */
function json_drop($path, $fname){    
    if('/' === $path[0]){
        $path = substr($path, 1);
    }
    if('/' !== $path[strlen($path)-1]){
        $path .= '/';        
    }
    
    $path = TMPL_PATH.$path;
    
    return @unlink($path.$fname);
}

function logger_debug($class, $funcname, $msg){
    logger(LOG_DEBUG, $msg, $class.'->'.$funcname);
}
function logger_warn($class, $funcname, $msg){
    logger(LOG_WARNING, $msg, $class.'->'.$funcname);    
}
function logger_info($class, $funcname, $msg){
    logger(LOG_INFO, $msg, $class.'->'.$funcname);
}
function logger_err($class, $funcname, $msg){
    logger(LOG_ERR, $msg, $class.'->'.$funcname);    
}
function logger($log_type, $msg, $title = ''){
    if(!in_array($log_type, array(LOG_DEBUG, LOG_WARNING, LOG_INFO, LOG_ERR))){
        die('Wrong log type');
    }
    $title = '['.$title.']';
    
    switch ($log_type){
        case LOG_DEBUG: $title .= '[DEBUG]';break;
        case LOG_WARNING: $title .= '[WARNING]';break;
        case LOG_INFO: $title .= '[INFO]';break;
        case LOG_ERR: $title .= '[ERR]';break;
    }

    $msg .= ', client: '.$_SERVER['REMOTE_ADDR'];
    $msg .= ', server: '.$_SERVER['SERVER_NAME'];
    $msg .= ', request: "'.$_SERVER['REQUEST_METHOD'].' '.$_SERVER['REQUEST_URI'].' '.$_SERVER['SERVER_PROTOCOL'].'"';
//    $msg .= ', upstream: "fastcgi://127.0.0.1:9000"';
    $msg .= ', host: "'.$_SERVER['HTTP_HOST'].'"';

    openlog($title, LOG_PID | LOG_PERROR, LOG_LOCAL1);
    syslog($log_type, $msg);
    closelog();        
}
/**
 * 國碼轉名稱
 * @param string $country_code 國碼 (ISO 3166-1)
 */
function country_name($country_code, $lang = 'en'){
    if(empty($lang)){
        $lang = 'en';
    }

    get_instance()->lang->load('country', strtolower($lang));
    $ct = lang('ct_'.strtolower($country_code));
    if($ct !== FALSE){
        $country_code = $ct;
    }

    return $country_code;
}