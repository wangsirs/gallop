<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 贈金選單
 */
class Menu_grants_lib
{    
    public function lists()
    {
        $CI =& get_instance();
        $CI->lang->load('menu', ib_lib::lang());
        return array(
                array(
                    'name' => lang('menu_reg'),
                    'page_title' => '',
                    'url' => '',
                    'list' => array(
                        array('name' => lang('menu_ib_reg'), 'url' => 'grants/account/ib_register', 'popup' => FALSE, 'page_title' => ''),
                        array('name' => lang('menu_cli_reg'), 'url' => 'grants/account/register/inside', 'popup' => FALSE, 'page_title' => ''),
                    )
                ),
                array(
                    'name' => lang('menu_info'),
                    'page_title' => '',
                    'url' => '',
                    'list' => array(
                        array('name' => lang('menu_profile'), 'url' => 'grants/account/profile', 'popup' => FALSE, 'page_title' => lang('menu_profile_full')),
                        array('name' => lang('menu_change_pw'), 'url' => 'grants/account/change_pw', 'popup' => FALSE, 'page_title' => ''),
                        array('name' => lang('menu_promotion'), 'url' => '', 'popup' => FALSE, 'page_title' => ''),
                    )                    
                ),
                array(
                    'name' => lang('menu_client'),
                    'page_title' => '',
                    'url' => '',
                    'list' => array(
                        array('name' => lang('menu_cli_list'), 'url' => 'grants/client_list', 'popup' => FALSE, 'page_title' => ''),
                        array('name' => lang('menu_ib_list'), 'url' => 'grants/ib_list', 'popup' => FALSE, 'page_title' => ''),
                        array('name' => lang('menu_reg_report'), 'url' => 'grants/reg_report', 'popup' => FALSE, 'page_title' => ''),
                    )                    
                ),
                array(
                    'name' => lang('menu_bonus'),
                    'page_title' => '',
                    'url' => '',                    
                    'list' => array(
                        array('name' => lang('menu_bonus_cal'), 'url' => 'grants/bonus_cal', 'popup' => FALSE, 'page_title' => ''),
                        array('name' => lang('menu_bonus_withdraw'), 'url' => 'grants/bonus_withdraw', 'popup' => FALSE, 'page_title' => ''),
                    ) 
                ),
                array(
                    'name' => lang('menu_person_result'),
                    'page_title' => '',
                    'url' => 'grants/person_results',
                ),
                array(
                    'name' => lang('menu_org_result'),
                    'page_title' => '',
                    'url' => 'grants/org_results',                    
                ),
                array(
                    'name' => lang('menu_money_flow'),
                    'page_title' => '',
                    'url' => 'grants/money_flow',                    
                ),
                array(
                    'name' => lang('menu_logout'),
                    'page_title' => '',
                    'url' => 'account/logout',                    
                ),
            
            );
    }
}