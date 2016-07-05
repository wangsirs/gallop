<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_admin_lib
{    
    public function lists()
    {
        $CI =& get_instance();
        $CI->lang->load('menu', ib_lib::lang());
        return array(
            array(
                'name' => lang('menu_staff'),
                'page_title' => '',
                'url' => '',
                'list' => array(
                    array('name' => lang('menu_client_register'), 'url' => 'admin/client_register', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_ib_register'), 'url' => 'admin/ib_register', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_sub_register'), 'url' => 'admin/sub_register', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_money_transfer'), 'url' => 'admin/money_transfer', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_msg_manage'), 'url' => 'admin/msg_manage', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_consult_srv'), 'url' => 'admin/consult_srv', 'popup' => FALSE, 'page_title' => ''),
                    )
                ),
            array(
                'name' => lang('menu_mt4'),
                'page_title' => '',
                'url' => '',
                'list' => array(
                    array('name' => lang('menu_mt4_ib_manage'), 'url' => 'mt4/ib_manage', 'popup' => FALSE, 'page_title' => lang('menu_profile_full')),
                    array('name' => lang('menu_mt4_client_manage'), 'url' => 'mt4/client_manage', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_scale_report'), 'url' => 'mt4/scale_report', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_scale_detail'), 'url' => 'mt4/scale_detail', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_trade_report'), 'url' => 'mt4/trade_report', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_assets_manage'), 'url' => 'mt4/assets_manage', 'popup' => FALSE, 'page_title' => ''),
                    )                    
                ),
            array(
                'name' => lang('menu_grant'),
                'page_title' => '',
                'url' => '',
                'list' => array(
                    array('name' => lang('menu_grants_ib_manage'), 'url' => 'grants/ib_manage', 'popup' => FALSE, 'page_title' => lang('menu_profile_full')),
                    array('name' => lang('menu_grants_client_manage'), 'url' => 'grants/client_manage', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_bonus_report'), 'url' => 'grants/bonus_report', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_interest_report'), 'url' => 'grants/interest_report', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_trade_report'), 'url' => 'grants/trade_report', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_assets_manage'), 'url' => 'grants/assets_manage', 'popup' => FALSE, 'page_title' => ''),
                    )                    
                ),
            array(
                'name' => lang('menu_admin_manage'),
                'url' => '',
                'list' => array(
                    array('name' => lang('menu_area_manage'), 'url' => 'admin/area_manage', 'popup' => FALSE, 'page_title' => lang('menu_profile_full')),
                    array('name' => lang('menu_user_manage'), 'url' => 'admin/user_manage', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_email_manage'), 'url' => 'admin/email_manage', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_email_record'), 'url' => 'admin/email_record', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_rate_manage'), 'url' => 'admin/rate_manage', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_role_manage'), 'url' => 'admin/role_manage', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_scale_group'), 'url' => 'admin/scale_group', 'popup' => FALSE, 'page_title' => ''),
                    array('name' => lang('menu_transfer_approve'), 'url' => 'admin/transfer_approve', 'popup' => FALSE, 'page_title' => ''),
                    )       
                ),
            );
    }
}
?>