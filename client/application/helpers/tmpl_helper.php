<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 載入外框
 * @param string $app
 * @param string $classname
 * @param string $funcname
 * @param array $view_data
 * @param string $view
 */
function load_frame($app, $classname, $funcname, $view_data = array(), $view = ''){

    $CI =& get_instance();
    $CI->load->library('session');
    $CI->load->library('parser');

    $CI->load->library('header_lib', array('app' => $app));

    $header_obj = $CI->header_lib->load();

    if(empty($view)){
        $view = $classname.'/'.$funcname.'_view';
    }
    
    $view_data['assets_name'] = $classname.'_'.$funcname;
    
    $apps = client_lib::get('apps');
    if(isset($apps[$app])){
        $apps[$app]['sel'] = '1';
    }

    $data = array(
        'apps' => json_encode($apps),
        'app' => $app,
        'username' => client_lib::full_name(),
        'nav' => $header_obj->nav(),
        'balance' => $header_obj->balance(),
        'header_menu' => $header_obj->menu(),
//        'left' => $tree ? $CI->tree_lib->load() : '',
        'content' => empty($view) ? '' : $CI->parser->parse($view, $view_data, TRUE),
        'assets_name' => $classname.'_'.$funcname
        );
    $CI->load->view('frame/base_frame_view', $data);
}
