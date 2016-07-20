<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gallop 帳務管理介面</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <base href="<?=base_url()?>" />
    <?php 
		$this->minify->add_css(array(
            'css/bootstrap.min.css',
            'css/font-awesome.min.css',
            'css/AdminLTE.css',
            'css/skins/_all-skins.min.css',
            'css/bootstrap-dialog.css',
            'js/thirdParty/plugins/datatables/responsive.dataTables.min.css',
            'js/thirdParty/plugins/datatables/jquery.dataTables.min.css',
            'js/thirdParty/plugins/datatables/table_style.css',
            'js/thirdParty/plugins/daterangepicker/daterangepicker-bs3.css',
            'js/thirdParty/plugins/iCheck/flat/blue.css',
            'js/thirdParty/plugins/iCheck/minimal/blue.css',
            'js/thirdParty/plugins/loadMask/jquery.loadmask.css'), TRUE);
		echo $this->minify->deploy_css(FALSE, 'base_frame.css');
	?>
    <style>
       /*slove next page white bg*/
        body{
            background-color: #ecf0f5;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="<?=ASSETS_JS?>html5shiv.min.js"></script>
        <script src="<?=ASSETS_JS?>respond.min.js"></script>
    <![endif]-->
</head>
<body class="<?=$app=='mt4'?'skin-blue':'skin-purple';?> layout-top-nav">
    <div class="wrapper">
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <?=$nav?>
                    </div>
                    
<?php 
    $this->minify->js(array(
        'js/jquery-1.9.1.min.js',
        'js/jquery-ui.min.js',
        'js/thirdParty/plugins/slimScroll/jquery.slimscroll.min.js',
        'js/app.min.js',
        'js/bootstrap.min.js',
        'js/bootstrap-dialog.js',
        'js/jquery.validate.js',
        'js/jquery.pagination.js',
        'js/gallop.min.js',
        'js/thirdParty/plugins/datatables/jquery.dataTables.min.js',
        'js/thirdParty/plugins/datatables/dataTables.bootstrap.min.js',
        'js/thirdParty/plugins/datatables/dataTables.responsive.min.js',
        'js/moment.min.js',
        'js/thirdParty/plugins/daterangepicker/daterangepicker.js',
        'js/thirdParty/plugins/iCheck/icheck.min.js',
        'js/thirdParty/plugins/loadMask/jquery.loadmask.min.js'));
    echo $this->minify->deploy_js(FALSE, 'base_frame.js');
?>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        <?=$balance?>
                        </ul>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <?php if(!empty($header_menu)){ foreach($header_menu as $item):?>
                            <li>
                                <a class="<?=isset($item['class'])?$item['class']:''?>" href="<?=empty($item['url']) ? 'javascript:void(0);' : $item['url']?>"><?=$item['name']?><?=isset($item['extra'])?$item['extra']:''?></a>
                            </li>
                            <?php endforeach;}?>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                    <!-- Navbar Right Menu -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>
        <!-- Full Width Column -->
        <?=$content?>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="container">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 1.0.0
                    </div>
                    <strong>Copyright © 2016 <a>GALLOP Studio</a>.</strong> All rights reserved.
                </div>
                <!-- /.container -->
            </footer>
    </div>
    <!-- ./wrapper -->
<script>
$.widget.bridge('uibutton', $.ui.button);
var apps = '<?=$apps?>';
$().ready(function(){
    LoadGeneral();
});
</script>
</body>

</html>
