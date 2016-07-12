<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--兼容ie 使用chrome-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="" />
    <title>Home</title>

    <link href="<?=ASSETS_CSS?>bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="<?=ASSETS_CSS?>style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <!--引用元素 css-->
    <link href="<?=ASSETS_CSS?>xenon-core.css" rel="stylesheet" type="text/css" media="all" />
    <!--引用兼容ie bootstrap ui css-->
    <link href="<?=ASSETS_CSS?>bootstrap-ie7.css" rel="stylesheet" type="text/css" media="all" />

    <!--自寫 css-->
    <link href="<?=ASSETS_CSS?>common.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>menu.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>txt_style.css" rel="stylesheet" type="text/css">

    <!--fonts-->
    <link href="<?=ASSETS_CSS?>font_style.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!--引用Google CDN jQuery-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <!--<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>-->

    <!-- menu -->
    <script src="<?=ASSETS_JS?>menu.js"></script>
    <!--phone_Menu手機版選單-->
    <script type="text/javascript" src="<?=ASSETS_JS?>phone_Menu.js"></script>
</head>
<body>

    <!--phone選單列start-->
    <div class="phone_MenuGroup" id="phone_MenuGroup">
        <span class="btn_close" id="BTN_CLOSE">&times;</span>
        <ul>
        <?php if( ! empty($menu)){ foreach($menu as $key => $item):?>
            <?php if(isset($item['list']) && ! empty($item['list'])){?>
                <li><a href="#"><?=$item['name']?><?php if(intval($item['count']) > 0){ echo '<span class="tip_txt">'.$item['count'].'</span>';} ?></a>
                    <ul class="sub-menu" id="sub_Menu_0<?=intval($key) + 1?>" >
                        <?php foreach ($item['list'] as $key2 => $item2):?>
                        <li><a href="<?=empty($item2['url']) ? '#' : $item2['url']?>"><?=$item2['name']?><?php if(intval($item2['count']) > 0){ echo '<span class="tip_txt">'.$item2['count'].'</span>';} ?></a>
                            <?php if(isset($item2['list']) && ! empty($item2['list'])){?>
                                <ul class="sub-menu" id="child_menu_0<?php if($key >1){ ?><?=intval($key) + 1?>_<?=intval($key2) + 1?><?php }else{ ?><?=intval($key2) + 1?><?php } ?>" >
                                    <?php foreach ($item2['list'] as $key3 => $item3):?>
                                    <li><a href="<?=empty($item3['url']) ? '#' : $item3['url']?>"><?=$item3['name']?><?php if(intval($item3['count']) > 0){ echo '<span class="tip_txt">'.$item3['count'].'</span>';} ?></a></li>
                                <?php endforeach;?>
                            </ul>
                            <?php } ?></li>
                        <?php endforeach; }?>
                    </ul>
                </li>
            <?php endforeach; }?>
            <li><a href="#">切換語系</a></li>
            <li><a href="#">開戶</a></li>
            <li><a href="#">提款</a></li>
            <li><a href="#">提款</a></li>
            <li><a href="#">提款</a></li>
            <li><a href="#">提款</a></li>
        </ul>
    </div>
    <div class="mask" id="Mask"></div>
    <!--phone選單列end------>


    <!--header-->
    <div class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <ul>
                        <li><a href="#">切換語系</a></li>
                        <li><a  href="#">開戶<span class="badge badge-lemon badge_Width bacg_pc_Position">1</span></a></li>
                        <li><a  href="#">提款<span class="badge badge-lemon badge_Width bacg_pc_Position">1</span></a></li>
                        <li><a  href="#">提款</a></li>
                        <li><a  href="#">提款</a></li>
                        <li><a  href="#">提款<span class="badge badge-lemon badge_Width bacg_pc_Position">45</span></a></li>
                    </ul>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="container">
            <div class="head-top">
                <div class="logo">
                    <a href="/"><img src="<?=ASSETS_IMG?>logo.png" alt=""></a>
                </div>

                <!-----------------桌機版menu start---------------->
                <div class="nav rig">
                    <ul class="menu">
                        <?php if( ! empty($menu)){ foreach($menu as $key => $item):?>
                            <?php if(isset($item['list']) && ! empty($item['list'])){?>
                                <li><a href="#"><?=$item['name']?><?php if(intval($item['count']) > 0){ echo '<span class="tip_txt">'.$item['count'].'</span>';} ?></a>
                                    <ul class="sub-menu sub-menu_0<?=intval($key) + 1?>" id="Sub_menu_0<?=intval($key) + 1?>" >
                                        <?php foreach ($item['list'] as $key2 => $item2):?>
                                        <li><a href="<?=empty($item2['url']) ? '#' : $item2['url']?>"><?=$item2['name']?><?php if(intval($item2['count']) > 0){ echo '<span class="tip_txt">'.$item2['count'].'</span>';} ?></a>
                                            <?php if(isset($item2['list']) && ! empty($item2['list'])){?>
                                                <ul class="sub-menu" id="child_menu_0<?php if($key >1){ ?><?=intval($key) + 1?>_<?=intval($key2) + 1?><?php }else{ ?><?=intval($key2) + 1?><?php } ?>" >
                                                    <?php foreach ($item2['list'] as $key3 => $item3):?>
                                                    <li><a href="<?=empty($item3['url']) ? '#' : $item3['url']?>"><?=$item3['name']?><?php if(intval($item3['count']) > 0){ echo '<span class="tip_txt">'.$item3['count'].'</span>';} ?></a></li>
                                                <?php endforeach;?>
                                            </ul>
                                            <?php } ?></li>
                                        <?php endforeach; }?>
                                    </ul>
                                </li>
                            <?php endforeach; }?>
                        </ul>
                    </div>
                    <div class="clr"></div>
            <!------------------桌機版menu end----------------->
            <!--手機版menuBar start-->
            <div class="phone_MenuBar" id="Phone_MenuBar">
                <li class="showhide" style="display: list-item;">
                    <span class="title">MENU</span>
                    <span class="icon1"></span>
                    <span class="icon2"></span>
                </li>
            </div>
            <!--手機版menuBar end --->

            <div class="clearfix"> </div>
        </div>
        </div>

    </div>
    <?=$content?>


    <!--footer start-->
    <div class="footer">
        <div class="footer-class">
            <p>Copyright &copy; 2016 <a href="#">GALLOP Studio</a>. All rights reserved.</p>
        </div>
    </div>
    <!--footer end-->


</body>
</html>

