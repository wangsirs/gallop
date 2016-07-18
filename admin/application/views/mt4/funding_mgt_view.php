<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="keywords" content="" />
<title>MT4客戶入金管理</title>

<link href="<?=ASSETS_CSS?>reset.css" rel="stylesheet" type="text/css">
<link href="<?=ASSETS_CSS?>common.css" rel="stylesheet" type="text/css">

<!--<link href="<?=ASSETS_CSS?>bootstrap.css" rel="stylesheet" type="text/css" media="all" />-->
<!-- Custom Theme files -->
<!--theme-style-->
<link href="<?=ASSETS_CSS?>style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<!--引用元素 css-->
<link href="<?=ASSETS_CSS?>xenon-core.css" rel="stylesheet" type="text/css" media="all" />

<!--引用 date table-->
<link href="<?=ASSETS_CSS?>jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<!--引用 RWD table css-->
<link href="<?=ASSETS_CSS?>responsive.dataTables.min.css" rel="stylesheet" type="text/css">
<!--引用 bootstrap skin style-->
<link href="<?=ASSETS_CSS?>bootstrap.min.css" rel="stylesheet"/>

<!--引用兼容ie bootstrap ui css-->
<link href="<?=ASSETS_CSS?>bootstrap-ie7.css" rel="stylesheet" type="text/css" media="all" />

<!--最新編譯和最佳化的 bootstrap3.0 CSS-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<!--引用bootstrap datepicker CSS-->
<link href="<?=ASSETS_CSS?>bootstrap-datepicker.css" rel="stylesheet">
<!--修改 datepicker style-->
<link href="<?=ASSETS_CSS?>datepicker_style.css" rel="stylesheet" type="text/css">

<!--fonts-->
<!--<link href="<?=ASSETS_CSS?>font_style.css" rel="stylesheet" type="text/css" media="all" />-->
<link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
<link href="<?=ASSETS_CSS?>font-awesome.min.css" rel="stylesheet" />

<!--自寫 css-->
<link href="<?=ASSETS_CSS?>common.css" rel="stylesheet" type="text/css">
<link href="<?=ASSETS_CSS?>menu.css" rel="stylesheet" type="text/css">
<link href="<?=ASSETS_CSS?>txt_style.css" rel="stylesheet" type="text/css">
<link href="<?=ASSETS_CSS?>table_style.css" rel="stylesheet" type="text/css">
<link href="<?=ASSETS_CSS?>button.css" rel="stylesheet" type="text/css">
<link href="<?=ASSETS_CSS?>form_style.css" rel="stylesheet" type="text/css">


<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


<!--使IE5,IE6,IE7,IE8兼容到IE9模式-->
<!--[if lt IE 9]>
  <script src=”http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js”></script>
<![endif]-->

</head>
<body>

<!--content start-->
<div class="content content_BG">
	<div class="container">
    	<!---開始-->
        <div class="wrapper">
            <h1>MT4客戶入金管理</h1>
            
            <div class="contentGroup">                
                <!--文字start-->  
                <div class="txt_Group margin_Top margin_Bottom margin_Left margin_Right10">
                	<div class="row margin_Left0 margin_Right0">
    					<div class="col-sm-2">
                            <select class="form-control form_control_style select_Style btn_Margin" id="">
                                <option value="0">所有國家</option>
                                <option value="1">11111</option>
                                <option value="2">22222</option>
                                <option value="3">33333</option>
                                <option value="4">44444</option>
                                <option value="5">5555555</option>
                                <option value="6">666666</option>
                                <option value="7">77777</option>
                                <option value="8">888888</option>
                                <option value="9">999999</option>
                                <option value="10">1000000</option>
                            </select>
                    	</div>                    
    					<div class="col-sm-2">
                            <select class="form-control form_control_style select_Style btn_Margin" id="">
                                <option value="0">所有介紹人帳號</option>
                                <option value="1">11111</option>
                                <option value="2">22222</option>
                                <option value="3">33333</option>
                                <option value="4">44444</option>
                                <option value="5">5555555</option>
                                <option value="6">666666</option>
                                <option value="7">77777</option>
                                <option value="8">888888</option>
                                <option value="9">999999</option>
                                <option value="10">1000000</option>
                            </select>
                    	</div>
                        <div class="col-sm-2">
                            <select class="form-control form_control_style select_Style btn_Margin" id="">
                                <option value="0">All Status</option>
                                <option value="1">11111</option>
                                <option value="2">22222</option>
                                <option value="3">33333</option>
                                <option value="4">44444</option>
                                <option value="5">5555555</option>
                                <option value="6">666666</option>
                                <option value="7">77777</option>
                                <option value="8">888888</option>
                                <option value="9">999999</option>
                                <option value="10">1000000</option>
                            </select>
                    	</div>
                        <div class="col-sm-6">
                        	<div class="input-group input-daterange">
                                <input type="text" class="form-control" value="2012-04-05">
                                <span class="input-group-addon">~</span>
                                <input type="text" class="form-control" value="2012-04-19">
                            </div>
                        </div>
                        <!--查詢button start-->    
                        <div class="col-sm-6 margin_Top30">	                            
                            <input class="form-control form_control_style btn_Margin btn_PC_Margin" name="Keyword_Inquire" id="Keyword_Inquire" data-validate="required" placeholder="關鍵字查詢">
                        </div>
                        <div class="col-sm-6 margin_Top30">	
                            <div class="btn_Margin disLine_Block btn_PC_Margin">
                                <button class="btn btn-success btn_sm_Width Gradient_Brown" id="BTN_Inquire">
                                    <span class="glyphicon glyphicon-search"></span>
                                    搜尋
                                </button>
                            </div>
                            
                         </div>
                         <!--查詢button end---->
                    </div>
                </div>
                <!--文字end---->
                               
                <div class="Table_Layout">
                    
                    <form id="customer_Account_Record_form" action="" method="post"> 
                        <!--表格內容start-->
                        <table id="myTable" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                            <thead>
                                <tr role="row" class="BG_Gray">
                                	<th class="sorting Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 120px;">客戶帳號</th>
                                    <th id="" class="sorting Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 136px;">姓名</th>
                                    <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">方式</th>
                                    <th id="" class="sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 150px;">金額</th> 
                                    <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="">狀態</th> 
                                    <th id="" class="sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1">時間</th> 
                                    <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="">功能</th>                                     
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd parent">
                                	<td class="txt_Bold">AE3210695</td>
                                    <td class="txt_Weight">范小小</td>
                                    <td class="sorting_1">2016/01/01</td>
                                    <td><span class="sorting_1 txt_Weight">0</span></td>
                                    <td class="sorting_1">處理中</td>
                                    <td>
                                        2016/01/01 12:55:33
                                    </td> 
                                    <td>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="BTN_Check" href="/mt4/funding_check">審核</a>
                                        </div>
                                    </td>                                   
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE5110012</td>
                                    <td class="txt_Weight">王大明</td>
                                    <td class="sorting_1">銀聯卡</td>
                                    <td><span class="sorting_1 txt_Weight">1000000.00</span></td>
                                    <td class="sorting_1">處理中</td>
                                    <td>
                                    	2016/01/01 12:55:33
                                    </td>
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="BTN_Check" href="/mt4/funding_check">審核</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE3210684</td>
                                    <td class="txt_Weight">林小華</td>
                                    <td class="sorting_1">銀聯卡</td>
                                    <td><span class="sorting_1 txt_Weight">2000000.00</span></td>
                                    <td class="sorting_1">
                                    	<span class="txt_Check">同意</span>
                                    </td>
                                    <td>
                                    	2016/01/01 12:55:33
                                    </td> 
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="BTN_Examination" href="/mt4/funding_check">檢查</a>
                                        </div>
                                    </td>                                  
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210695</td>
                                    <td class="txt_Weight">范小小</td>
                                    <td class="sorting_1">銀聯卡</td>
                                    <td><span class="sorting_1 txt_Weight">1000000.00</span></td>
                                    <td class="sorting_1">處理中</td>
                                    <td>
                                    	2016/01/01 12:55:33
                                    </td>
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="BTN_Check" href="/mt4/funding_check">審核</a>
                                        </div>
                                    </td>                                    
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE5110012</td>
                                    <td class="txt_Weight">王大明</td>
                                    <td class="sorting_1">銀聯卡</td>
                                    <td><span class="sorting_1 txt_Weight">2000000.00</span></td>
                                    <td class="sorting_1">
                                    	<span class="txt_Check">同意</span>
                                    </td>
                                    <td>
                                    	2016/01/01 12:55:33
                                    </td> 
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="BTN_Examination" href="/mt4/funding_check">檢查</a>
                                        </div>
                                    </td>                                  
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210695</td>
                                    <td class="txt_Weight">林小華</td>
                                    <td class="sorting_1">銀聯卡</td>
                                    <td><span class="sorting_1 txt_Weight">1000000.00</span></td>
                                    <td class="sorting_1">處理中</td>
                                    <td>
                                    	2016/01/01 12:55:33
                                    </td> 
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="BTN_Check" href="/mt4/funding_check">審核</a>
                                        </div>
                                    </td>                                  
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE3210684</td>
                                    <td class="txt_Weight">蔡小婷</td>
                                    <td class="sorting_1">銀聯卡</td>
                                    <td><span class="sorting_1 txt_Weight">2000000.00</span></td>
                                    <td class="sorting_1">處理中</td>
                                    <td>
                                    	2016/01/01 12:55:33
                                    </td> 
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="BTN_Check" href="/mt4/funding_check">審核</a>
                                        </div>
                                    </td>                                  
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210695</td>
                                    <td class="txt_Weight">劉小雯</td>
                                    <td class="sorting_1">銀聯卡</td>
                                    <td><span class="sorting_1 txt_Weight">1000000.00</span></td>
                                    <td class="sorting_1">處理中</td>
                                    <td>
                                    	2016/01/01 12:55:33
                                    </td>
                                  	<td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="BTN_Check" href="/mt4/funding_check">審核</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE5110012</td>
                                    <td class="txt_Weight">林小華</td>
                                    <td class="sorting_1">銀聯卡</td>
                                    <td><span class="sorting_1 txt_Weight">2000000.00</span></td>
                                    <td class="sorting_1">處理中</td>    
                                    <td>
                                    	2016/01/01 12:55:33
                                    </td>
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="BTN_Check" href="/mt4/funding_check">審核</a>
                                        </div>
                                    </td>                                     
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210684</td>
                                    <td class="txt_Weight">王大明</td>
                                    <td class="sorting_1">銀聯卡</td>
                                    <td><span class="sorting_1 txt_Weight">1000000.00</span></td> 
                                    <td class="sorting_1">處理中</td> 
                                    <td>
                                    	2016/01/01 12:55:33
                                    </td>
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="BTN_Check" href="/mt4/funding_check">審核</a>
                                        </div>
                                    </td>                                      
                                </tr>
                                 <tr role="row" class="odd">
                                	<td class="txt_Bold">AE3210684</td>
                                    <td class="txt_Weight">王大明</td>
                                    <td class="sorting_1">銀聯卡</td>
                                    <td><span class="sorting_1 txt_Weight">2000000.00</span></td> 
                                    <td class="sorting_1">處理中</td>    
                                    <td>
                                    	2016/01/01 12:55:33
                                    </td>
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="BTN_Check" href="/mt4/funding_check">審核</a>
                                        </div>
                                    </td>                                   
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210684</td>
                                    <td class="txt_Weight">王大明</td>
                                    <td class="sorting_1">銀聯卡</td>
                                    <td><span class="sorting_1 txt_Weight">1000000.00</span></td>
                                    <td class="sorting_1">處理中</td>   
                                    <td>
                                    	2016/01/01 12:55:33
                                    </td> 
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="BTN_Check" href="/mt4/funding_check">審核</a>
                                        </div>
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

<!--引用Google CDN jQuery-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<!--引用最新編譯和最佳化的bootstrap CDN jQuery-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!--引用 date table JS-->
<script type="text/javascript" src="<?=ASSETS_JS?>jquery.dataTables.min.js"></script>
<!--引用 RWD table JS-->
<script type="text/javascript" src="<?=ASSETS_JS?>dataTables.responsive.min.js"></script>

<!-- for bootstrap datepicker & ie8-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/es5-shim/4.1.1/es5-shim.min.js"></script>
<script src="<?=ASSETS_JS?>bootstrap-datepicker.min.js"></script>
<script src="<?=ASSETS_JS?>bootstrap-datepicker.zh-TW.min.js"></script>
<!--引用 bootstrap 頁碼 style-->
<!--<script type="text/javascript" src="<?=ASSETS_JS?>jquery.pagination.js"></script> -->

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
		paging:   false,
        searching : false, //打開原有的search功能
		info:     false,
		filter:     true,
        ordering :   true, //打開 排序功能
        language : {
            lengthMenu : "", //清空字串 原設定值『顯示 _MENU_ 筆記錄』
            zeroRecords : "無符合資料",
            info : "目前記錄：_START_ 至 _END_, 總筆數：_TOTAL_",
            infoEmpty : "目前記錄： 0 至 0 , 總筆數：0",
            paginate : {
                first : "第一頁",
                last : "最後一頁",
                next : "Next",
                previous : "Previous"
            }
        },
		fnInitComplete : function () { //等 datatable 執行完，再執行
		}
    });

});
</script>


<!--修改 datepicker 的功能變Range-->
<script type="text/javascript">
$(function() {
	
	$('.input-daterange input').datepicker({
	   language: 'zh-TW',//中文化
	
   });
   
	$('.input-daterange input').each(function() {
		$(this).datepicker("clearDates");
	});

});
</script>


</body>
</html>
			