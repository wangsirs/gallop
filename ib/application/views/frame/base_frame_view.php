<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gallop 帳務管理介面</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <base href="<?=base_url()?>" />
    <?php // add css files
    $this->minify->add_css(array(
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/ionicons.min.css',
        'css/AdminLTE.css',
        'css/skins/_all-skins.min.css',
        'css/bootstrap-dialog.css',
        'css/pagination_modity.css',
        'js/thirdParty/plugins/select2/select2.min.css',
        'js/thirdParty/plugins/datatables/jquery.dataTables.min.css',
        'js/thirdParty/plugins/datatables/responsive.dataTables.min.css',
        'js/thirdParty/plugins/datatables/table_style.css',
        'js/thirdParty/plugins/iCheck/flat/blue.css',
        'js/thirdParty/plugins/iCheck/minimal/red.css',
        'js/thirdParty/plugins/iCheck/minimal/blue.css',
        'js/thirdParty/plugins/iCheck/square/red.css',
        'js/thirdParty/plugins/daterangepicker/daterangepicker-bs3.css',
        'js/thirdParty/plugins/loadMask/jquery.loadmask.css'), TRUE);
    echo $this->minify->deploy_css(FALSE, 'base_frame.css');
    ?>
    <style>
       /*slove next page white bg*/
        body{
            background-color: #ecf0f5;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="<?=ASSETS_JS?>html5shiv.min.js"></script>
    <script src="<?=ASSETS_JS?>respond.min.js"></script>
    <link href="<?=ASSETS_CSS?>ie/ie8.css" rel="stylesheet">
    <![endif]-->
</head>

<body class="hold-transition skin-green sidebar-mini">
    <button class="btn btn-lg btn-warning btn-frame-middle"><span class="glyphicon glyphicon-refresh spinning"></span> Loading...</button>
    <div class="wrapper">
        <header class="main-header">
            <?php
            $this->load->library('Mobile_Detect');
            $detect = new Mobile_Detect();
            $isMobile = $detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS();
            if ($isMobile) {
                ?>
                <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <?php
                }
                ?>
                <a href="" class="sidebar-toggle-mobile" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Logo -->
                <a href="/mt4" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>GAM</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><img src="/share/img/horse_logo.png" style="height: 2.1em;margin:-0.3em 0 0 -1em;padding-right: 0.3em;"><b>Gallop</b> 管理系統</span>
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar" role="navigation">
                    <?php
                    if(!$isMobile){
                        ?>
                        <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                            <?php
                        }
                        ?>
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <ul class="nav navbar-nav navbar-collapse pull-left collapse" id="navbar-collapse" aria-expanded="false">
                        <?php if( ! empty($menu)){ foreach($menu as $item):?>
                            <?php if(isset($item['list']) && ! empty($item['list'])){?>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><?=$item['name']?><span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php foreach ($item['list'] as $num => $item2):?>
                                        <li><a href="<?=empty($item2['url']) ? 'javascript:void();' : $item2['url']?>"><?=$item2['name']?></a></li>
                                        <?php if($num+1 < count($item['list'])): ?> <li class="divider"></li> <?php endif;?>
                                    <?php endforeach;?>
                                </ul>
                            </li>
                            <?php }else{?>
                                <li><a href="<?=empty($item['url']) ? 'javascript:void();' : $item['url']?>"><?=$item['name']?></a></li>
                                <?php }?>
                            <?php endforeach;}?>
                        </ul>
                    </nav>
                </header>    
                <!-- Left side column. contains the logo and sidebar -->
                <aside class="main-sidebar">
                    <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">
                        <!-- Sidebar user panel -->
                        <div class="user-panel">
                            <div class="pull-left image">
                                <img src="<?=ASSETS_IMG?>admin.jpg" class="img-circle" alt="User Image">
                            </div>
                            <div class="pull-left info">
                                <p>
                                    <?=$username;?>
                                </p>
                                <a class="typeSel" style="cursor:pointer;"><span><?=$app_name?></span>&nbsp;&nbsp;<i class="fa fa-angle-down text-yellow "></i></a>
                            </div>
                        </div>
<?php 
$this->minify->add_js(array(
    'js/jquery-1.9.1.min.js',
    'js/jquery-ui.min.js',
    'js/thirdParty/plugins/slimScroll/jquery.slimscroll.min.js',
    'js/app.min.js',
    'js/bootstrap.min.js',
    'js/bootstrap-dialog.js',
    'js/gallop.min.js',
    'js/jquery.validate.js',
    'js/jquery.pagination.js',
    'js/thirdParty/plugins/select2/select2.full.min.js',
    'js/thirdParty/plugins/input-mask/jquery.inputmask.js',
    'js/thirdParty/plugins/input-mask/jquery.inputmask.date.extensions.js',
    'js/thirdParty/plugins/input-mask/jquery.inputmask.extensions.js',
    'js/thirdParty/plugins/datatables/jquery.dataTables.min.js',
    'js/thirdParty/plugins/datatables/dataTables.bootstrap.min.js',
    'js/thirdParty/plugins/datatables/dataTables.responsive.min.js',
    'js/moment.min.js',
    'js/thirdParty/plugins/daterangepicker/daterangepicker.js',
    'js/thirdParty/plugins/iCheck/icheck.min.js',
    'js/thirdParty/plugins/loadMask/jquery.loadmask.min.js',
//    'js/thirdParty/plugins/timepicker/bootstrap-timepicker.min.js',
    'js/jquery.cookie.js',), TRUE);

//    $this->minify->js(array(
//        'js/thirdParty/plugins/datatables/jquery.dataTables.min.js',
//        'js/thirdParty/plugins/datatables/dataTables.bootstrap.min.js',
//        'js/moment.min.js',
//        'js/thirdParty/plugins/daterangepicker/daterangepicker.js',
//        'js/thirdParty/plugins/iCheck/icheck.min.js',
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.min.js',
echo $this->minify->deploy_js(FALSE, 'base_frame.js');

?>   
                        <?=$left?>
                    </section>
                    <!-- /.sidebar -->
                </aside>
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h4>
                        </h4>
                        <ol class="breadcrumb"<?php if(empty($bread_crumb)):?> style="visibility: hidden"<?php endif;?>>
                            <li><a href=""><i class="fa fa-home"></i>首頁</a></li>
                            <li class="active"><?=$bread_crumb?></li>
                        </ol>
                    </section>
                    <section class="content">
                        <!-- Content Wrapper. Contains page content -->
                        <?=$content?>
                    </section>
                </div>
                <!-- /.content-wrapper -->
                <footer class="main-footer">
                    <strong>Copyright &copy; 2016 <a>GALLOP Studio</a>.</strong> All rights reserved.
                </footer>
                <!-- Control Sidebar -->
                <!-- /.control-sidebar -->
            </div>
            <!-- ./wrapper -->
            <script>
                var apps = '<?=$apps?>';
            </script>
            <!--<script src="<?=ASSETS_JS?>jquery.tmpl.min.js"></script>-->
            <!--<script src="<?=ASSETS_JS?>gallop.min.js"></script>-->

        </body>

        </html>
