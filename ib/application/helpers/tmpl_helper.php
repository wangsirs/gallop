<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 載入外框
 * @param string $app
 * @param string $classname
 * @param string $funcname
 * @param array $view_data
 * @param boolean $tree
 * @param string $view
 */
function load_frame($app, $classname, $funcname, $view_data = array(), $tree = FALSE, $view = ''){
    
    $CI =& get_instance();
    $CI->load->library('session');
    $CI->load->library('parser');
    
    $CI->load->library('menu_lib', array('app' => $app, 'classname' => $classname, 'funcname' => $funcname));
    
    if($tree){
        $CI->load->library('tree_lib', array('app' => $app));        
    }
    
    $view_data['page_title'] = $CI->menu_lib->page_title();
//    $view_data['assets_name'] = $classname.'_'.$funcname;
    
    if(empty($view)){
        $view = $classname.'/'.$funcname.'_view';
    }
    
    $apps = ib_lib::get('apps');
    if(isset($apps[$app])){
        $apps[$app]['sel'] = '1';
    }
    $data = array(
        'menu' => $CI->menu_lib->load(),
        'bread_crumb' => $CI->menu_lib->bread_crumb(),
        'left' => $tree ? $CI->tree_lib->load() : '',
        'apps' => json_encode($apps),
        'app_name' => $apps[$app]['app_name'],
        'content' => empty($view) ? '' : $CI->parser->parse($view, $view_data, TRUE),
        'username' => ib_lib::full_name(),
        'assets_name' => $classname.'_'.$funcname
    );
    $CI->load->view('frame/base_frame_view', $data);
}


/**
 * 載入輕盈外框
 * @param string $view
 * @param array $view_data
 */
function load_light_frame($view, $view_data = array()){
    
    $CI =& get_instance();
    $CI->load->library('parser');
    
    $data = array(
        'content' => empty($view) ? '' : $CI->parser->parse($view, $view_data, TRUE),
    );
    $CI->load->view('frame/light_frame_view', $data);
}