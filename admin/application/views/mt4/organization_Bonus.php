<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--兼容ie 使用chrome-->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="keywords" content="" />
<title>MT4組織獎金</title>

<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/common.css" rel="stylesheet" type="text/css">

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<!--引用元素 css-->
<link href="css/xenon-core.css" rel="stylesheet" type="text/css" media="all" />

<!--引用 date table-->
<link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<!--引用 RWD table css-->
<link href="css/responsive.dataTables.min.css" rel="stylesheet" type="text/css">
<!--引用 bootstrap skin style-->
<link href="css/bootstrap.min.css" rel="stylesheet"/>

<!--引用兼容ie bootstrap ui css-->
<link href="css/bootstrap-ie7.css" rel="stylesheet" type="text/css" media="all" />

<!--fonts-->
<link href="css/font_style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
<link href="css/font-awesome.min.css" rel="stylesheet" />

<!--引用 表單樣式 css-->
<link href="css/xenon-forms.css" rel="stylesheet" type="text/css">
<!--引用 表單核心 css-->
<link href="css/xenon-core.css" rel="stylesheet" type="text/css">
<!--引用 下拉選單selectBoxIt css-->
<link href="css/jquery.selectBoxIt.css" rel="stylesheet" type="text/css">

<!--自寫 css-->
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/txt_style.css" rel="stylesheet" type="text/css">
<link href="css/table_style.css" rel="stylesheet" type="text/css">
<link href="css/button.css" rel="stylesheet" type="text/css">
<link href="css/form_style.css" rel="stylesheet" type="text/css">
<!--修改引用pagination的樣式-->
<link href="css/pagination_modity.css" rel="stylesheet" type="text/css">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
  <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
  <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->


<!--使IE5,IE6,IE7,IE8兼容到IE9模式-->
<!--[if lt IE 9]>
  <script src=”http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js”></script>
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
					<a href="index.html"><img src="images/logo.png" alt=""></a>	
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
                    <li><a href="#"> 贈金專案<span class="tip_txt">3</span></a>
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
    	<!---開始-->
        <div class="wrapper">
            <h1>MT4組織獎金</h1>
            
            <div class="contentGroup">                
                <!--文字start-->  
                <div class="margin_Top margin_Bottom margin_Left">
                	<label class="margin_Right">
						<input type="radio" name="radio-1" checked>全部												
					</label>
                    <label>
						<input type="radio" name="radio-1">選定日期範圍												
					</label>
                    <!--新增button start-->
                    <div class="btn_Position disLine_Block">
                    	<button class="btn btn-success btn_Width Gradient_Orange" id="BTN_Inquire">查詢</button>
                    </div>
                    <!--新增button end---->
                </div>
                <!--文字end---->
                               
                <div class="Table_Layout">
                    
                    <form id="customer_Account_Record_form" action="" method="post"> 
                        <!--表格內容start-->
                        <table id="myTable" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                            <thead>
                                <tr role="row" class="BG_Gray">
                                	<th class="sorting Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 120px;">顧問帳號</th>
                                    <th id="" class="sorting Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 136px;">顧問姓名</th>
                                    <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">交易量</th>
                                    <th id="" class="sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 150px;">佣金</th> 
                                    <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="">入金金額</th> 
                                    <th id="" class="sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1">損益</th>                                      
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd parent">
                                	<td class="txt_Bold">AE3210695</td>
                                    <td class="txt_Weight">范小小</td>
                                    <td class="sorting_1">無</td>
                                    <td><span class="sorting_1 txt_Weight">2016/01/01 12:55:33</span></td>
                                    <td class="sorting_1">無</td>
                                    <td>
                                        <span class="sorting_1 txt_Weight">
                                        	<div class="btn_Position">
                                        		<span class="btn btn-secondary btn-sm cursor_Default disLine_Block" id="">18.38</span>
                                        	</div>
                                        </span>
                                    </td>                                    
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE5110012</td>
                                    <td class="txt_Weight">王大明</td>
                                    <td class="sorting_1">無</td>
                                    <td><span class="sorting_1 txt_Weight">2016/01/01 12:55:33</span></td>
                                    <td class="sorting_1">無</td>
                                    <td>
                                    	<span class="sorting_1 txt_Weight">
                                        	<div class="btn_Position">
                                        		<span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">-19.25</span>
                                        	</div>
                                        </span>
                                    </td>
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE3210684</td>
                                    <td class="txt_Weight">林小華</td>
                                    <td class="sorting_1">無</td>
                                    <td><span class="sorting_1 txt_Weight">2016/01/01 12:55:33</span></td>
                                    <td class="sorting_1">無</td>
                                    <td>
                                    	<span class="sorting_1 txt_Weight">
                                        	<div class="btn_Position">
                                        		<span class="btn btn-secondary btn-sm cursor_Default disLine_Block" id="">18.38</span>
                                        	</div>
                                        </span>
                                    </td>                                   
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210695</td>
                                    <td class="txt_Weight">范小小</td>
                                    <td class="sorting_1">無</td>
                                    <td><span class="sorting_1 txt_Weight">2016/01/01 12:55:33</span></td>
                                    <td class="sorting_1">無</td>
                                    <td>
                                    	<span class="sorting_1 txt_Weight">
                                        	<div class="btn_Position">
                                        		<span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">-19.25</span>
                                        	</div>
                                        </span>
                                    </td>                                    
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE5110012</td>
                                    <td class="txt_Weight">王大明</td>
                                    <td class="sorting_1">無</td>
                                    <td><span class="sorting_1 txt_Weight">2016/01/01 12:55:33</span></td>
                                    <td class="sorting_1">無</td>
                                    <td>
                                    	<span class="sorting_1 txt_Weight">
                                        	<div class="btn_Position">
                                        		<span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">-19.25</span>
                                        	</div>
                                        </span>
                                    </td>                                   
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210695</td>
                                    <td class="txt_Weight">林小華</td>
                                    <td class="sorting_1">無</td>
                                    <td><span class="sorting_1 txt_Weight">2016/01/01 12:55:33</span></td>
                                    <td class="sorting_1">無</td>
                                    <td>
                                    	<span class="sorting_1 txt_Weight">
                                        	<div class="btn_Position">
                                        		<span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">-19.25</span>
                                        	</div>
                                        </span>
                                    </td>                                   
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE3210684</td>
                                    <td class="txt_Weight">蔡小婷</td>
                                    <td class="sorting_1">無</td>
                                    <td><span class="sorting_1 txt_Weight">2016/01/01 12:55:33</span></td>
                                    <td class="sorting_1">無</td>
                                    <td>
                                    	<span class="sorting_1 txt_Weight">
                                        	<div class="btn_Position">
                                        		<span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">-19.25</span>
                                        	</div>
                                        </span>
                                    </td>                                   
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210695</td>
                                    <td class="txt_Weight">劉小雯</td>
                                    <td class="sorting_1">無</td>
                                    <td><span class="sorting_1 txt_Weight">2016/01/01 12:55:33</span></td>
                                    <td class="sorting_1">無</td>
                                    <td>
                                    	<span class="sorting_1 txt_Weight">
                                        	<div class="btn_Position">
                                        		<span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">-19.25</span>
                                        	</div>
                                        </span>
                                    </td>
                                  
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE5110012</td>
                                    <td class="txt_Weight">林小華</td>
                                    <td class="sorting_1">無</td>
                                    <td><span class="sorting_1 txt_Weight">2016/01/01 12:55:33</span></td>
                                    <td class="sorting_1">無</td>    
                                    <td>
                                    	<span class="sorting_1 txt_Weight">
                                        	<div class="btn_Position">
                                        		<span class="btn btn-secondary btn-sm cursor_Default disLine_Block" id="">18.38</span>
                                        	</div>
                                        </span>
                                    </td>                                     
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210684</td>
                                    <td class="txt_Weight">王大明</td>
                                    <td class="sorting_1">無</td>
                                    <td><span class="sorting_1 txt_Weight">2016/01/01 12:55:33</span></td> 
                                    <td class="sorting_1">無</td> 
                                    <td>
                                    	<span class="sorting_1 txt_Weight">
                                        	<div class="btn_Position">
                                        		<span class="btn btn-secondary btn-sm cursor_Default disLine_Block" id="">18.38</span>
                                        	</div>
                                        </span>
                                    </td>                                      
                                </tr>
                                 <tr role="row" class="odd">
                                	<td class="txt_Bold">AE3210684</td>
                                    <td class="txt_Weight">王大明</td>
                                    <td class="sorting_1">無</td>
                                    <td><span class="sorting_1 txt_Weight">2016/01/01 12:55:33</span></td> 
                                    <td class="sorting_1">無</td>    
                                    <td>
                                    	<span class="sorting_1 txt_Weight">
                                        	<div class="btn_Position">
                                        		<span class="btn btn-secondary btn-sm cursor_Default disLine_Block" id="">18.38</span>
                                        	</div>
                                        </span>
                                    </td>                                   
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210684</td>
                                    <td class="txt_Weight">王大明</td>
                                    <td class="sorting_1">無</td>
                                    <td><span class="sorting_1 txt_Weight">2016/01/01 12:55:33</span></td>
                                    <td class="sorting_1">無</td>   
                                    <td>
                                    	<span class="sorting_1 txt_Weight">
                                        	<div class="btn_Position">
                                        		<span class="btn btn-secondary btn-sm cursor_Default disLine_Block" id="">18.38</span>
                                        	</div>
                                        </span>
                                    </td>                                      
                                </tr>
                             </tbody>
                        </table>
                        <!--表格內容end---->
                    </form>
                </div>
            </div>
        </div>	        
               
		<!--結束--->

	</div>	
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

<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!--引用 date table JS-->
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<!--引用 RWD table JS-->
<script type="text/javascript" src="js/dataTables.responsive.min.js"></script>

<!-- menu -->
<script src="js/menu.js"></script> 
<!--phone_Menu手機版選單-->
<script type="text/javascript" src="js/phone_Menu.js"></script>

<!--引用 bootstrap 頁碼 style-->
<script type="text/javascript" src="js/jquery.pagination.js"></script> 

<!--修改 引用的data table 的功能-->
<script>
$(document).ready( function () {
		/*$(document).ready(function() {
			$('#myTable').DataTable( {
				responsive : true, //打開 #myTable表格RWD 的功能
				paging:   false, //關掉 檔案原來的頁碼功能
				ordering: false, //關掉 檔案原來的 排序功能
				info:     false //關掉 檔案原來的info功能
			} );
		} );*/
		$('#myTable').DataTable({ //讓#myTable 執行DataTable 函式套件
        // order : [[ 0, 'asc' ]], asc是遞增；第一欄排序功能是往下遞增
        responsive : true, //打開 #myTable表格RWD 的功能
		paging:   true,
        searching : true, //打開原有的search功能
		info:     true,
		filter:     true,
        ordering :   true, //打開 排序功能
        language : {
            lengthMenu : "顯示 _MENU_ 筆記錄",
            zeroRecords : "無符合資料",
            info : "目前記錄：_START_ 至 _END_, 總筆數：_TOTAL_",
            infoEmpty : "目前記錄： 0 至 0 , 總筆數：0",
            paginate : {
                first : "第一頁",
                last : "最後一頁",
                next : "Next",
                previous : "Previous"
            }
        }
    });

});
</script>

<!--修改 引用的bootstrap 頁碼 的功能-->
<script>
$(function() { 
	$('#pagination_sm').pagination({ //讓#pagination_sm 執行pagination 函式套件
		first:'«', //修改first為 << 頁碼文字
		last:'»', //修改last為 >> 頁碼文字
        totalPages: 20, //總頁數20頁
        visiblePages: 2, //顯示2頁
        onPageClick: function (event, page) { //按頁碼之後會執行的事
            $('#page-content_sm').text('Page ' + page);
        }
    });
});
</script>

</body>
</html>
			