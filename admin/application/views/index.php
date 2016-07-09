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

</head>
<body>

<!--phone選單列start-->
<div class="phone_MenuGroup" id="phone_MenuGroup">
	<span class="btn_close" id="BTN_CLOSE">&times;</span>
    <ul>
        <li><a href="#">行政管理</a>
        	<ul class="sub_menu" id="sub_Menu_01">
                <li><a href="#">使用者管理</a></li>
                <li><a href="#">信件管理</a></li>
                <li><a href="#">郵件紀錄</a></li>
                <li><a href="#">匯率管理</a></li> 
                <li><a href="#" >角色管理</a></li>
                <li><a href="#">階級設定</a></li>
                <li><a href="#">佣金設定</a></li>
                <li><a href="#">訊息管理<span class="badge badge-red badge_Width">1</span></a></li>
                <li><a href="#">諮詢服務<span class="badge badge-red badge_Width">1</span></a></li>
            </ul>
        </li>
        <li><a href="#">MT4專案<span class="badge badge-red badge_Width">1</span></a>
        	<ul class="sub_menu" id="sub_Menu_02">
            	<li><a href="#">新增大IB群組</a></li>
                <li><a href="#">人員審核<span class="arrow_down"></span></a>
                	<ul class="child_sub_menu" id="child_sub_Menu_02">
                    	<li><a href="customer_Account_Check.html">客戶開戶審核<span class="badge badge-red badge_Width">1</span></a></li>
                        <li><a href="#">顧問開戶審核<span class="badge badge-red badge_Width">1</span></a></li>
                        <li><a href="Sub_Account_Check.html">子帳號開戶審核<span class="badge badge-red badge_Width">1</span></a></li>
                     </ul>
                </li>
                <li><a href="#">人員管理<span class="arrow_down"></span></a>
                	<ul class="child_sub_menu" id="child_sub_Menu_03">
                        <li><a href="#">大IB管理</a></li>
                        <li><a href="#">顧問管理</a></li>
                        <li><a href="customer_Manage.html">客戶管理</a></li>
                	</ul>
                </li>
                <li><a href="#">佣金報表<span class="arrow_down"></span></a>
                	<ul class="child_sub_menu" id="child_sub_Menu_04">
                        <li><a href="organization_Bonus.html">組織獎金</a></li>
                        <li><a href="#">直客獎金</a></li>
               		</ul>
                </li>
                <li><a href="#">發佣明細<span class="arrow_down"></span></a>
                	<ul class="child_sub_menu" id="child_sub_Menu_05">
                        <li><a href="#">佣金存入/提款<span class="badge badge-red badge_Width">1</span></a></li>
                        <li><a href="#">存提款紀錄</a></li>
                        <li><a href="#">客戶交易報表</a></li>
                	</ul>
                </li>
                <li class="end"><a href="#">客戶資金管理<span class="arrow_down"></span></a>
                	<ul class="child_sub_menu" id="child_sub_Menu_06">
                        <li><a href="#">出入金管理</a></li>
                        <li><a href="#">入金管理<span class="badge badge-red badge_Width">1</span></a></li>
                        <li><a href="#">出金管理<span class="badge badge-red badge_Width">1</span></a></li>
                	</ul>
            	</li>
        	</ul>
        </li>
        <li><a href="#">贈金專案<span class="badge badge-red badge_Width">1</span></a>
        	<ul class="sub_menu" id="sub_Menu_03">
            	<li><a href="#">新增大IB群組</a></li>
                <li><a href="#">人員審核<span class="arrow_down"></span></a>
                	<ul class="child_sub_menu" id="child_menu_03_2">
                    	<li><a href="#">客戶開戶審核<span class="badge badge-red badge_Width">1</span></a></li>
                        <li><a href="#">顧問開戶審核<span class="badge badge-red badge_Width">1</span></a></li>
                     </ul>
                </li>
                <li><a href="#">人員管理<span class="arrow_down"></span></a>
                	<ul class="child_sub_menu" id="child_menu_03_3">
                    	<li><a href="#">大IB管理</a></li>
                        <li><a href="#">顧問管理</a></li>
                        <li><a href="#">客戶管理</a></li>
                	</ul>
                </li>
                <li><a href="#">獎金報表</a></li>
                <li><a href="#">客戶利息報表</a></li>
                <li><a href="#">發佣明細<span class="arrow_down"></span></a>
                	<ul class="child_sub_menu" id="child_menu_03_6">
                    	<li><a href="#">佣金存入/提款<span class="badge badge-red badge_Width">1</span></a></li>
                        <li><a href="#">存提款紀錄</a></li>
                	</ul>
                </li>
                <li class="end"><a href="#">客戶資金管理<span class="arrow_down"></span></a>
                	<ul class="child_sub_menu" id="child_menu_03_7">
                    	<li><a href="#">出入金管理</a></li>
                        <li><a href="#">入金管理<span class="badge badge-red badge_Width">1</span></a></li>
                        <li><a href="#">出金管理<span class="badge badge-red badge_Width">1</span></a></li>
                	</ul>
                </li>
        	</ul>
        </li>
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
					<a href="index.html"><img src="<?=ASSETS_IMG?>logo.png" alt=""></a>	
				</div>
                
		  <!-----------------桌機版menu start---------------->
            <div class="nav rig">
                <ul class="menu">
                    <li><a href="#">行政管理</a>
                        <ul class="sub-menu" id="Sub_menu_01">
                            <li><a href="#">使用者管理</a></li>
                            <li><a href="#">信件管理</a></li>
                            <li><a href="#">郵件紀錄</a></li>
                            <li><a href="#">匯率管理</a></li> 
                            <li><a href="#" >角色管理</a></li>
                            <li><a href="#">階級設定</a></li>
                            <li><a href="#">佣金設定</a></li>
                            <li><a href="#">訊息管理<span class="tip_txt">1</span></a></li>
                            <li><a href="#">諮詢服務<span class="tip_txt">1</span></a></li>
                        </ul>
                    </li>
                    <li><a href="#">MT4專案<span class="tip_txt">6</span></a>
                        <ul class="sub-menu sub-menu_02" id="Sub_menu_02">
                            <li><a href="#">新增大IB群組</a></li>
                            <li><a href="#">人員審核<span class="arrow_down"></span></a>
                                <ul class="sub-menu" id="child_menu_02">
                                    <li><a href="customer_Account_Check.html">客戶開戶審核<span class="tip_txt">1</span></a></li>
                                    <li><a href="#">顧問開戶審核<span class="tip_txt">1</span></a></li>
                                    <li><a href="Sub_Account_Check.html">子帳號開戶審核<span class="tip_txt">1</span></a></li>
                                </ul>
                            </li>
                            <li><a href="#">人員管理<span class="arrow_down"></span></a>
                                <ul class="sub-menu" id="child_menu_03">
                                    <li><a href="#">大IB管理</a></li>
                                    <li><a href="#">顧問管理</a></li>
                                    <li><a href="customer_Manage.html">客戶管理</a></li>
                                </ul>
                            </li>
                            <li><a href="#">佣金報表<span class="arrow_down"></span></a>
                                <ul class="sub-menu" id="child_menu_04">
                                    <li><a href="organization_Bonus.html">組織獎金</a></li>
                                    <li><a href="#">直客獎金</a></li>
                                </ul>
                            </li>
                            <li><a href="#">發佣明細<span class="arrow_down"></span></a>
                                <ul class="sub-menu" id="child_menu_05">
                                    <li><a href="#">佣金存入/提款<span class="tip_txt">1</span></a></li>
                                    <li><a href="#">存提款紀錄</a></li>
                                    <li><a href="#">客戶交易報表</a></li>
                                </ul>
                            </li>
                            <li class="end"><a href="#">客戶資金管理<span class="arrow_down"></span></a>
                                <ul class="sub-menu" id="child_menu_06">
                                    <li><a href="#">出入金管理</a></li>
                                    <li><a href="#">入金管理<span class="tip_txt">1</span></a></li>
                                    <li><a href="#">出金管理<span class="tip_txt">1</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">贈金專案<span class="tip_txt">3</span></a>
                        <ul class="sub-menu sub-menu_03" id="Sub_menu_03">
                            <li><a href="#">新增大IB群組</a></li>
                            <li><a href="#">人員審核<span class="arrow_down"></span></a>
                                <ul class="sub-menu" id="child_menu_03_2">
                                    <li><a href="#">客戶開戶審核<span class="tip_txt">1</span></a></li>
                                    <li><a href="#">顧問開戶審核<span class="tip_txt">1</span></a></li>
                                </ul>
                            </li>
                            <li><a href="#">人員管理<span class="arrow_down"></span></a>
                                <ul class="sub-menu" id="child_menu_03_3">
                                    <li><a href="#">大IB管理</a></li>
                                    <li><a href="#">顧問管理</a></li>
                                    <li><a href="#">客戶管理</a></li>
                                </ul>
                            </li>
                            <li><a href="#">獎金報表</a></li>
                            <li><a href="#">客戶利息報表</a></li>
                            <li><a href="#">發佣明細<span class="arrow_down"></span></a>
                                <ul class="sub-menu" id="child_menu_03_6">
                                    <li><a href="#">佣金存入/提款<span class="tip_txt">1</span></a></li>
                                    <li><a href="#">存提款紀錄</a></li>
                                </ul>
                            </li>
                            <li class="end"><a href="#">客戶資金管理<span class="arrow_down"></span></a>
                                <ul class="sub-menu" id="child_menu_03_7">
                                    <li><a href="#">出入金管理</a></li>
                                    <li><a href="#">入金管理<span class="tip_txt">1</span></a></li>
                                    <li><a href="#">出金管理<span class="tip_txt">1</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
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

	

<!--content start-->
<div class="content content_BG">
	<div class="container">
	<div class="content-top">
		<h1 class="txt_fontFamily txt_icon">行政畫面功能</h1>
		<div class="grid-in">
			
		<div class="clearfix"> </div>
		</div>
	</div>
	<!----->

	</div>
	<!---->
	
</div>
<!--content end-->


<!--footer start-->
<div class="footer">
	<div class="footer-class">
		<p>Copyright &copy; 2016 <a href="#">GALLOP Studio</a>. All rights reserved.</p>
	</div>
</div>
<!--footer end-->

<!--引用Google CDN jQuery-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<!--<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>-->

<!-- menu -->
<script src="<?=ASSETS_JS?>menu.js"></script> 
<!--phone_Menu手機版選單-->
<script type="text/javascript" src="<?=ASSETS_JS?>phone_Menu.js"></script>


</body>
</html>
			