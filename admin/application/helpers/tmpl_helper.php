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
function load_frame($classname, $funcname, $view_data = array(), $tree = FALSE, $view = '', $show_crumb = FALSE){
    
    $CI =& get_instance();
    $CI->load->library('session');
    $CI->load->library('parser');
    
    $CI->load->library('menu_lib', array('classname' => $classname, 'funcname' => $funcname));
    
    if($tree){
        $CI->load->library('tree_lib');        
    }
    
    $view_data['page_title'] = $CI->menu_lib->page_title();
    
    if(empty($view)){
        $view = $classname.'/'.$funcname.'_view';
    }
    
    $data = array(
        'menu' => $CI->menu_lib->load(),
        'bread_crumb' => $show_crumb ?
         $CI->parser->parse('frame/bread_crumb_view', array('data' => $CI->menu_lib->bread_crumb()), TRUE):'',
        'left' => $tree ? $CI->tree_lib->load() : '',
        'content' => empty($view) ? '' : $CI->parser->parse($view, $view_data, TRUE)
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