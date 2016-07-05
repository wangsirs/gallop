<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MT4 選單
 */
class Menu_mt4_lib
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
                        array('name' => lang('menu_ib_reg'), 'url' => 'mt4/account/ib_register', 'popup' => FALSE, 'page_title' => ''),
                        array('name' => lang('menu_cli_reg'), 'url' => 'mt4/account/register/inside', 'popup' => FALSE, 'page_title' => ''),
                    )
                ),
                array(
                    'name' => lang('menu_info'),
                    'page_title' => '',
                    'url' => '',
                    'list' => array(
                        array('name' => lang('menu_profile'), 'url' => 'mt4/account/profile', 'popup' => FALSE, 'page_title' => lang('menu_profile_full')),
                        array('name' => lang('menu_change_pw'), 'url' => 'mt4/account/change_pw', 'popup' => FALSE, 'page_title' => ''),
                        array('name' => lang('menu_promotion'), 'url' => '', 'popup' => FALSE, 'page_title' => ''),
                    )                    
                ),
                array(
                    'name' => lang('menu_client'),
                    'page_title' => '',
                    'url' => '',
                    'list' => array(
                        array('name' => lang('menu_cli_list'), 'url' => 'mt4/client_list', 'popup' => FALSE, 'page_title' => ''),
                        array('name' => lang('menu_ib_list'), 'url' => 'mt4/ib_list', 'popup' => FALSE, 'page_title' => ''),
                        array('name' => lang('menu_reg_report'), 'url' => 'mt4/reg_report', 'popup' => FALSE, 'page_title' => ''),
                    )                    
                ),
                array(
                    'name' => lang('menu_bonus'),
                    'page_title' => '',
                    'url' => '',                    
                    'list' => array(
                        array('name' => lang('menu_bonus_cal'), 'url' => 'mt4/bonus_cal', 'popup' => FALSE, 'page_title' => ''),
                        array('name' => lang('menu_bonus_withdraw'), 'url' => 'mt4/bonus_withdraw', 'popup' => FALSE, 'page_title' => ''),
                    ) 
                ),
                array(
                    'name' => lang('menu_person_result'),
                    'page_title' => '',
                    'url' => 'mt4/person_results',
                ),
                array(
                    'name' => lang('menu_org_result'),
                    'page_title' => '',
                    'url' => 'mt4/org_results',                    
                ),
                array(
                    'name' => lang('menu_money_flow'),
                    'page_title' => '',
                    'url' => 'mt4/money_flow',                    
                ),
                array(
                    'name' => lang('menu_logout'),
                    'page_title' => '',
                    'url' => 'account/logout',                    
                ),
            
            );
    }
}