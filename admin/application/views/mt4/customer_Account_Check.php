<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--兼容ie 使用chrome-->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="keywords" content="" />
<title>MT4客戶開戶審核</title>

<link href="css/reset.css" rel="stylesheet" type="text/css">
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

<!--自寫 css-->
<link href="css/common.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/txt_style.css" rel="stylesheet" type="text/css">
<link href="css/table_style.css" rel="stylesheet" type="text/css">
<link href="css/button.css" rel="stylesheet" type="text/css">
<link href="css/form_style.css" rel="stylesheet" type="text/css">

<!--fonts-->
<link href="css/font_style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
<link href="css/font-awesome.min.css" rel="stylesheet" />

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
    	<!---開始-->
        <div class="wrapper">
            <h1>MT4客戶開戶審核</h1>
            
            <div class="contentGroup">
                <form id="customer_Account_Check_form" action="" method="post"> 
                    <!--文字start-->
                    <div class="Table_Layout">
                        <!--表格內容start-->
                        <table id="myTable" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                            <thead>
                                <tr role="row" class="BG_Gray">
                                    <th id="Open_an_Account" class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 136px;">帳號</th>
                                    <th id="Open_an_Account_Date" class="sorting_asc sorting_asc_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 216px;" aria-sort="ascending">開戶日期</th>
                                    <th id="Open_an_Account_Type" class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 102px;">開戶方式</th>
                                    <th id="Open_an_Account_Feature" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 42px;">帳戶狀態</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd parent">
                                    <td class="txt_Bold sorting_1">U75647</td>
                                    <td class="txt_Weight">范小小</td>
                                    <td class="">個人帳戶</td>
                                    <td class="">正常戶</td>
                                </tr>              
                             </tbody>
                        </table>
                        <!--表格內容end---->
                        <div class="clr"></div>
                    </div>
                    <!--文字end---->
                    
                    <!--文字start-->
                    <div class="Table_Layout">
                        <!--表格內容 個人資料start-->
                        <h2 class="txt_title_information">基本資料</h2>
                        <table id="myTable_information" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                            <thead>
                                <tr role="row" class="BG_Gray">
                                    <th id="customer_Name" class="sorting sorting_NONE Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">客戶姓名</th>
                                    <th id="Gender" class="sorting_asc sorting_asc_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" aria-sort="ascending">性別</th>
                                    <th id="Nationality" class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >國籍</th>
                                    <th id="customer_ID_Card_Number" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >身份證或護照號碼</th>
                                    <th id="Date_of_Birth" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >出生日期</th>
                                    <th id="customer_Bank_Account" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >銀行帳號</th>
                                    <th id="customer_Address_Number" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >居住電話號碼</th>
                                    <th id="customer_Phone_Number" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">手機號碼</th>
                                    <th id="customer_Address" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >居住地址</th>
                                    <th id="customer_Email" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">電子郵件信箱</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd parent">
                                    <td class="txt_Bold sorting_1">王小明</td>
                                    <td>男</td>
                                    <td class="">台灣</td>
                                    <td class="">A123456789<br/>
                                    	<div class="btn_Position">
                                        	<span class="btn btn-info btn-sm btn_Shadow disLine_Block btn_ID_Card_Number" id="ID_Card_Number">顯示資料</span>
                                        </div>                                
                                    </td>
                                    <td class="">2016/01/01</td>
                                    <td class="">1234567891234<br/>
                                    	<div class="btn_Position">
                                        	<span class="btn btn-info btn-sm btn_Shadow disLine_Block btn_Bank_Account_Number" id="Bank_Account_Number">顯示資料</span>
                                        </div>
                                    </td>
                                    <td class="">0912345678</td>
                                    <td class="">0912345678</td>
                                    <td class="">台北市xx區xx路xx巷xxx號xx樓<br/> 
                                    	<div class="btn_Position">                                   	
                                        	<span class="btn btn-info btn-sm btn_Shadow disLine_Block btn_Living_Address" id="Living_Address">顯示資料</span>
                                        </div>                                        
                                    </td>
                                    <td class="">t123456@xxxxxx.com.tw</td>
                                </tr>              
                             </tbody>
                        </table>
                        <!--表格內容 個人資料end---->
                        <div class="clr"></div>
                        
                        <!--身份證資料start-->
                        <div class="id_Card_Number_Group" id="ID_Card_Number_Group">
                            <div class="id_Card_details_Group">
                                <p class="Color_Gray txt_family txt_Weight disLine_Block">正面<br/><img src="images/id_Card.png" width="500" height="314" alt="身份證正面"></p>
                                <p class="Color_Gray txt_family txt_Weight disLine_Block">反面<br/><img src="images/02.jpg" width="500" height="314" alt="身份證反面"></p>
                            </div>
                            <div class="btn_Close_details_Position">
                                <a class="btn btn-info btn-sm btn_Close_details btn_Shadow btn_Close_details" href="#">關閉</a>
                            </div>
                        </div>
                        <!--身份證資料end--->
                        
                        <!--銀行帳號start-->
                        <div class="id_Card_Number_Group_02" id="Bank_Account_Number_Group">
                            <div class="id_Card_details_Group">
                                <p class="Color_Gray txt_family txt_Weight disLine_Block">銀行存摺封面<br/><img src="images/sample_photo.jpg" width="564" height="316" alt="銀行存摺封面">
                                </p>
                            </div>
                            <div class="btn_Close_details_Position">
                                <a class="btn btn-info btn-sm btn_Close_details btn_Shadow btn_Close_details" href="#">關閉</a>
                            </div>
                        </div>
                        <!--銀行帳號end--->
                        
                        <!--居住地start-->
                        <div class="id_Card_Number_Group_03" id="Living_Address_Group">
                            <div class="id_Card_details_Group">
                                <p class="Color_Gray txt_family txt_Weight disLine_Block">居住證明<br/><img src="images/sample_photo_02.jpg" width="564" height="316" alt="居住證明">
                                </p>
                            </div>
                            <div class="btn_Close_details_Position">
                              <a class="btn btn-info btn-sm btn_Close_details btn_Shadow btn_Close_details" href="#">關閉</a>
                            </div>
                        </div>
                        <!--居住地end--->
                        
                    </div>
                    <!--文字end---->
                    
                    
                    <!--文字start-->
                    <div class="Table_Layout">
                        <!--表格內容 個人資料start-->
                        <h2 class="txt_title_information">Bank Office設定</h2>
                        <table id="myTable_Bank_Office" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                            <thead>
                                <tr role="row" class="BG_Gray">
                                    <th class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 250px;">代理商代碼</th>
                                    <th class="sorting_asc sorting_asc_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" aria-sort="ascending">群組代碼</th>
                                    <th class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">槓桿比例</th>
                                    <th class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >狀態</th>
                                    <th class="dt-body-right sorting sorting_NONE Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">附加信息</th>
                                    <th class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 42px;">請填管理者MT4帳號</th>
                                    <th class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">開戶審核結果</th>                     
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd parent">
                                    <td class="txt_Bold sorting_1">
                                        <input class="form-control form_control_style" name="Agents_number" id="Agents_number" data-validate="required" placeholder="代理商代碼" />
                                    </td>
                                    <td id="Group_number">GAM</td>
                                    <td  id="">
                                        <input class="form-control form_control_style" name="Lever_percent" id="Lever_percent" data-validate="required" placeholder="槓桿比例" />
                                    </td>
                                    <td class="">                        	
                                        <select class="form-control form_control_style select_Style" id="sboxit-1">
                                            <option value="0">active</option>
                                            <option value="1">11111</option>
                                            <option value="2">22222</option>
                                            <option value="3" selected="selected">33333</option>
                                            <option value="4">44444</option>
                                            <option value="5">5555555</option>
                                            <option value="6">666666</option>
                                            <option value="7">77777</option>
                                            <option value="8">888888</option>
                                            <option value="9">999999</option>
                                            <option value="10">1000000</option>
                                        </select> 	                                      
                                    </td>
                                    <td class="">                        	
                                        <label>
                                            <input type="checkbox" class="cbr cbr-gray">授權第三方管理我的帳戶
                                        </label>
                                    </td>
                                    <td class="">
                                    <input class="form-control form_control_style" name="Manager_number" id="Manager_number" data-validate="required" placeholder="請填管理者MT4帳號" />
                                    </td>
                                    <td class="">
                                         <div class="btn_Position">
                                            <button class="btn btn-info btn_Width Gradient_Blue" id="Agree">同意</button>
                                        </div>
                                        <div class="btn_Position">
                                            <button class="btn btn-danger btn_Width Gradient_Red" id="Refuse">拒絕</button>
                                        </div>
                                    </td>
                                </tr>              
                             </tbody>
                        </table>
                        <!--表格內容 個人資料end---->
                        <div class="clr"></div>
                    </div>
                    <!--文字end---->
                </form>
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
        //order : [[ 3, 'desc' ]], // asc是遞增；第四欄排序功能是往下遞減
        responsive : true, //打開 #myTable表格RWD 的功能
		paging:   false,
        searching : false, //關掉原有的search功能
		info:     false,
		filter:     false,
        ordering :   false, //關掉 排序功能
        language : {
            lengthMenu : "顯示 _MENU_ 筆記錄",
            zeroRecords : "無符合資料",
            info : "目前記錄：_START_ 至 _END_, 總筆數：_TOTAL_",
            infoEmpty : "目前記錄： 0 至 0 , 總筆數：0",
            paginate : {
                first : "第一頁",
                last : "最後一頁",
                next : "上頁",
                previous : "下頁"
            }
        }
    });
	
	
	$('#myTable_Bank_Office').DataTable({ //讓#myTable 執行DataTable 函式套件
        //order : [[ 3, 'desc' ]], // asc是遞增；第四欄排序功能是往下遞減
        responsive : true, //打開 #myTable表格RWD 的功能
		paging:   false,
        searching : false, //關掉原有的search功能
		info:     false,
		filter:     false,
        ordering :   false, //關掉 排序功能
        language : {
            lengthMenu : "顯示 _MENU_ 筆記錄",
            zeroRecords : "無符合資料",
            info : "目前記錄：_START_ 至 _END_, 總筆數：_TOTAL_",
            infoEmpty : "目前記錄： 0 至 0 , 總筆數：0",
            paginate : {
                first : "第一頁",
                last : "最後一頁",
                next : "上頁",
                previous : "下頁"
            }
        }
    });
	
	
	$('#myTable_information').DataTable({ //讓#myTable 執行DataTable 函式套件
        //order : [[ 3, 'desc' ]], // asc是遞增；第四欄排序功能是往下遞減
        responsive : true, //打開 #myTable表格RWD 的功能
		paging:   false,
        searching : false, //關掉原有的search功能
		info:     false,
		filter:     false,
        ordering :   false, //關掉 排序功能
        language : {
            lengthMenu : "顯示 _MENU_ 筆記錄",
            zeroRecords : "無符合資料",
            info : "目前記錄：_START_ 至 _END_, 總筆數：_TOTAL_",
            infoEmpty : "目前記錄： 0 至 0 , 總筆數：0",
            paginate : {
                first : "第一頁",
                last : "最後一頁",
                next : "上頁",
                previous : "下頁"
            }
        },
        fnInitComplete : function () { //等 datatable 執行完，再執行
            //身份證
            $(".btn_ID_Card_Number").click(function(){ //顯示資料按鈕用class 去綁
                $("#ID_Card_Number_Group").toggle(); //切換
				$("#Bank_Account_Number_Group , #Living_Address_Group").hide(); //其他兩個關
            });
            $(".btn_Close_details").click(function(){
                $("#ID_Card_Number_Group").hide();
            });
            
            //銀行帳號
            $(".btn_Bank_Account_Number").click(function(){
                $("#Bank_Account_Number_Group").toggle();
				$("#ID_Card_Number_Group , #Living_Address_Group").hide();
            });
            $(".btn_Close_details").click(function(){
                $("#Bank_Account_Number_Group").hide();
            });
            
            //居住地
            $(".btn_Living_Address").click(function(){
                $("#Living_Address_Group").toggle();
				$("#ID_Card_Number_Group , #Bank_Account_Number_Group").hide();
            });
            $(".btn_Close_details").click(function(){
                $("#Living_Address_Group").hide();
            });
        }
    });
});
</script>

</body>
</html>
			