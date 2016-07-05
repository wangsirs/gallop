<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gallop 行政後台管理</title>
    <!-- Mainly scripts -->
    <script src="<?=ASSETS_CUSTOM_JS?>jquery-2.1.1.js"></script>
    <script src="<?=ASSETS_CUSTOM_JS?>bootstrap.min.js"></script>
    <script src="<?=ASSETS_CUSTOM_JS?>plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=ASSETS_CUSTOM_JS?>plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Flot -->
    <script src="<?=ASSETS_CUSTOM_JS?>plugins/flot/jquery.flot.js"></script>
    <script src="<?=ASSETS_CUSTOM_JS?>plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?=ASSETS_CUSTOM_JS?>plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?=ASSETS_CUSTOM_JS?>plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?=ASSETS_CUSTOM_JS?>plugins/flot/jquery.flot.pie.js"></script>
    <!-- Peity -->
    <script src="<?=ASSETS_CUSTOM_JS?>plugins/peity/jquery.peity.min.js"></script>
    <script src="<?=ASSETS_CUSTOM_JS?>demo/peity-demo.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="<?=ASSETS_CUSTOM_JS?>inspinia.js"></script>
    <script src="<?=ASSETS_CUSTOM_JS?>plugins/pace/pace.min.js"></script>
    <!-- jQuery UI -->
    <script src="<?=ASSETS_CUSTOM_JS?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- GITTER -->
    <script src="<?=ASSETS_CUSTOM_JS?>plugins/gritter/jquery.gritter.min.js"></script>
    <!-- Sparkline -->
    <script src="<?=ASSETS_CUSTOM_JS?>plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- Sparkline demo data  -->
    <script src="<?=ASSETS_CUSTOM_JS?>demo/sparkline-demo.js"></script>
    <!-- ChartJS-->
    <script src="<?=ASSETS_CUSTOM_JS?>plugins/chartJs/Chart.min.js"></script>
    <!-- Toastr -->
    <script src="<?=ASSETS_CUSTOM_JS?>plugins/toastr/toastr.min.js"></script>
    <link href="<?=ASSETS_CUSTOM_CSS?>bootstrap.min.css" rel="stylesheet">
    <link href="<?=ASSETS_CUSTOM_CSS?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="<?=ASSETS_CUSTOM_CSS?>plugins/toastr/toastr.min.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="<?=ASSETS_CUSTOM_JS?>plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="<?=ASSETS_CUSTOM_CSS?>animate.css" rel="stylesheet">
    <link href="<?=ASSETS_CUSTOM_CSS?>style.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?=ASSETS_CUSTOM_IMG?>profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=$username?></strong>
                             </span> <span class="text-muted text-xs block">行政管理人員<b class="caret"></b></span> </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li class="divider"></li>
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            GAM
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-nav">
                        <?php if( ! empty($menu)){ foreach($menu as $item):?>
                        <?php if(isset($item['list']) && ! empty($item['list'])){?>
                        <li class="dropdown">
                            <a aria-expanded="false" role="button" href="" class="dropdown-toggle" data-toggle="dropdown">
                                <?=$item['name']?><span class="badge badge-warning">6</span><span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <?php foreach ($item['list'] as $num => $item2):?>
                                <li>
                                    <a href="/<?=empty($item2['url']) ? 'javascript:void();' : $item2['url']?>">
                                        <?=$item2['name']?></a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </li>
                        <?php }?>
                        <?php endforeach;}?>
                    </ul>
                </nav>
                <?=$bread_crumb?>
            </div>
            <?=$content?>
        </div>
    </div>
</body>

</html>
