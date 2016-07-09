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
//    if(empty($title)){
//        die('need log title');
//    }
    $title = '['.$title.']';
    
    switch ($log_type){
        case LOG_DEBUG: $title .= '[DEBUG]';break;
        case LOG_WARNING: $title .= '[WARNING]';break;
        case LOG_INFO: $title .= '[INFO]';break;
        case LOG_ERR: $title .= '[ERR]';break;
    }
//    array(38) {
//  ["USER"]=>
//  string(8) "www-data"
//  ["HOME"]=>
//  string(8) "/var/www"
//  ["HTTP_ACCEPT_LANGUAGE"]=>
//  string(5) "zh-TW"
//  ["HTTP_ACCEPT_ENCODING"]=>
//  string(13) "gzip, deflate"
//  ["HTTP_ACCEPT"]=>
//  string(3) "*/*"
//  ["HTTP_CONTENT_TYPE"]=>
//  string(68) "multipart/form-data; boundary=----WebKitFormBoundaryIU8osDQhfVqt8exA"
//  ["HTTP_USER_AGENT"]=>
//  string(150) "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Postman/4.4.1 Chrome/47.0.2526.73 Electron/0.36.2 Safari/537.36"
//  ["HTTP_ORIGIN"]=>
//  string(7) "file://"
//  ["HTTP_CACHE_CONTROL"]=>
//  string(8) "no-cache"
//  ["HTTP_POSTMAN_TOKEN"]=>
//  string(36) "6d0fffb3-eeea-eae4-87b2-3b1becef38f4"
//  ["HTTP_AUTHORIZATION"]=>
//  string(18) "Basic ZGV2OjEyMzQ="
//  ["HTTP_CONTENT_LENGTH"]=>
//  string(3) "153"
//  ["HTTP_CONNECTION"]=>
//  string(10) "keep-alive"
//  ["HTTP_HOST"]=>
//  string(17) "api.gamfx.dev.com"
//  ["REDIRECT_STATUS"]=>
//  string(3) "200"
//  ["SERVER_NAME"]=>
//  string(17) "api.gamfx.dev.com"
//  ["SERVER_PORT"]=>
//  string(2) "80"
//  ["SERVER_ADDR"]=>
//  string(13) "172.31.31.111"
//  ["REMOTE_PORT"]=>
//  string(5) "60455"
//  ["REMOTE_ADDR"]=>
//  string(14) "114.37.208.125"
//  ["SERVER_SOFTWARE"]=>
//  string(11) "nginx/1.4.6"
//  ["GATEWAY_INTERFACE"]=>
//  string(7) "CGI/1.1"
//  ["SERVER_PROTOCOL"]=>
//  string(8) "HTTP/1.1"
//  ["DOCUMENT_ROOT"]=>
//  string(38) "/var/www/api.gamfx.dev.com/public_html"
//  ["DOCUMENT_URI"]=>
//  string(10) "/index.php"
//  ["REQUEST_URI"]=>
//  string(16) "/client_api/info"
//  ["SCRIPT_NAME"]=>
//  string(10) "/index.php"
//  ["CONTENT_LENGTH"]=>
//  string(3) "153"
//  ["CONTENT_TYPE"]=>
//  string(68) "multipart/form-data; boundary=----WebKitFormBoundaryIU8osDQhfVqt8exA"
//  ["REQUEST_METHOD"]=>
//  string(4) "POST"
//  ["QUERY_STRING"]=>
//  string(0) ""
//  ["SCRIPT_FILENAME"]=>
//  string(48) "/var/www/api.gamfx.dev.com/public_html/index.php"
//  ["FCGI_ROLE"]=>
//  string(9) "RESPONDER"
//  ["PHP_SELF"]=>
//  string(10) "/index.php"
//  ["PHP_AUTH_USER"]=>
//  string(3) "dev"
//  ["PHP_AUTH_PW"]=>
//  string(4) "1234"
//  ["REQUEST_TIME_FLOAT"]=>
//  float(1468068614.7776)
//  ["REQUEST_TIME"]=>
//  int(1468068614)
//}

    $msg .= ', client: '.$_SERVER['REMOTE_ADDR'];
    $msg .= ', server: '.$_SERVER['SERVER_NAME'];
    $msg .= ', request: "'.$_SERVER['REQUEST_METHOD'].' '.$_SERVER['REQUEST_URI'].' '.$_SERVER['SERVER_PROTOCOL'].'"';
//    $msg .= ', upstream: "fastcgi://127.0.0.1:9000"';
    $msg .= ', host: "'.$_SERVER['HTTP_HOST'].'"';

    openlog($title, LOG_PID | LOG_PERROR, LOG_LOCAL1);
    syslog($log_type, $msg);
    closelog();        
}