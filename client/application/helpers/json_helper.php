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