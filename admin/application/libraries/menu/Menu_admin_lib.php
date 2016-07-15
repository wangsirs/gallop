<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_admin_lib
{
    function __construct()
    {

    }

    public function lists()
    {
        $CI =& get_instance();
        $CI->lang->load('menu', 'zh-tw');
        return array(
            array(
                'name' => lang('menu_admin_manage'),
                'page_title' => '',
                'url' => '',
                'count' => 6,
                'list' => array(
                    array('name' => lang('menu_user_manage'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                    array('name' => lang('menu_email_manage'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                    array('name' => lang('menu_email_record'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                    array('name' => lang('menu_rate_manage'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                    array('name' => lang('menu_role_manage'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                    array('name' => lang('menu_lv_setup'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                    array('name' => lang('menu_scale_setup'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                    array('name' => lang('menu_msg_manage'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                    array('name' => lang('menu_consult_srv'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0)
                    )
                ),
            array(
                'name' => lang('menu_mt4'),
                'page_title' => '',
                'url' => '',
                'count' => 0,
                'list' => array(
                    array('name' => lang('menu_mt4_add_great_ib'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                    array('name' => lang('menu_mt4_staff_check'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 3, 'list' => array(
                        array('name' => lang('menu_mt4_ib_check'), 'url' => '/mt4/ib_check', 'popup' => FALSE, 'page_title' => '', 'count' => 4),
                        array('name' => lang('menu_mt4_client_check'), 'url' => '/mt4/client_check', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        array('name' => lang('menu_mt4_sub_check'), 'url' => '/mt4/sub_check', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        )),
                    array('name' => lang('menu_mt4_staff_mgt'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0, 'list' => array(
                        array('name' => lang('menu_mt4_great_ib_mgt'), 'url' => '/mt4/great_ib_manage', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        array('name' => lang('menu_mt4_ib_mgt'), 'url' => '/mt4/ib_manage', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        array('name' => lang('menu_mt4_client_mgt'), 'url' => '/mt4/client_manage', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        )),
                    array('name' => lang('menu_mt4_scale_rep'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0,'list' => array(
                        array('name' => lang('menu_mt4_org_bonus'), 'url' => '/mt4/org_bonus', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        array('name' => lang('menu_mt4_dir_bonus'), 'url' => '/mt4/client_bonus', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        )),
                    array('name' => lang('menu_mt4_scale_detail'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0, 'list' => array(
                        array('name' => lang('menu_mt4_scale_io'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        array('name' => lang('menu_mt4_io_record'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        array('name' => lang('menu_mt4_trade_rep'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        )),
                    array('name' => lang('menu_mt4_assets_mgt'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0, 'list' => array(
                        array('name' => lang('menu_mt4_io_mgt'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        array('name' => lang('menu_mt4_funding_mgt'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        array('name' => lang('menu_mt4_withdraw_mgt'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        )),
                    ),
                ),
            array(
                'name' => lang('menu_grants'),
                'page_title' => '',
                'url' => '',
                'count' => 0,
                'list' => array(
                    array('name' => lang('menu_grants_add_great_ib'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                    array('name' => lang('menu_grants_staff_check'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0, 'list' => array(
                        array('name' => lang('menu_grants_ib_check'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        array('name' => lang('menu_grants_client_check'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        )),
                    array('name' => lang('menu_grants_staff_mgt'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0, 'list' => array(
                        array('name' => lang('menu_grants_great_ib_mgt'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        array('name' => lang('menu_grants_ib_mgt'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        array('name' => lang('menu_grants_client_mgt'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        )),
                    array('name' => lang('menu_grants_bonus_rep'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                    array('name' => lang('menu_grants_client_rate_rep'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                    array('name' => lang('menu_grants_scale_detail'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0, 'list' => array(
                        array('name' => lang('menu_grants_scale_io'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        array('name' => lang('menu_grants_io_record'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        )),
                    array('name' => lang('menu_grants_assets_mgt'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0, 'list' => array(
                        array('name' => lang('menu_grants_io_mgt'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        array('name' => lang('menu_grants_funding_mgt'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        array('name' => lang('menu_grants_withdraw_mgt'), 'url' => '', 'popup' => FALSE, 'page_title' => '', 'count' => 0),
                        )),
                    ),
                ),
            );
}
}
?>
