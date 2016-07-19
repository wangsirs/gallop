<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="keywords" content="" />
<title>MT4客戶手動出入金管理</title>

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

<!--fonts-->
<!--<link href="<?=ASSETS_CSS?>font_style.css" rel="stylesheet" type="text/css" media="all" />-->
<link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
<link href="<?=ASSETS_CSS?>font-awesome.min.css" rel="stylesheet" />

<!--引用 表單樣式 css-->
<link href="<?=ASSETS_CSS?>xenon-forms.css" rel="stylesheet" type="text/css">
<!--引用 表單核心 css-->
<link href="<?=ASSETS_CSS?>xenon-core.css" rel="stylesheet" type="text/css">
<!--引用 下拉選單selectBoxIt css-->
<link href="<?=ASSETS_CSS?>jquery.selectBoxIt.css" rel="stylesheet" type="text/css">

<!--自寫 css-->
<link href="<?=ASSETS_CSS?>menu.css" rel="stylesheet" type="text/css">
<link href="<?=ASSETS_CSS?>txt_style.css" rel="stylesheet" type="text/css">
<link href="<?=ASSETS_CSS?>table_style.css" rel="stylesheet" type="text/css">
<link href="<?=ASSETS_CSS?>button.css" rel="stylesheet" type="text/css">
<link href="<?=ASSETS_CSS?>form_style.css" rel="stylesheet" type="text/css">
<!--修改引用pagination的樣式-->
<link href="<?=ASSETS_CSS?>pagination_modity.css" rel="stylesheet" type="text/css">

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
            <h1>MT4客戶手動出入金管理</h1>
            
            <div class="contentGroup">                
                <!--文字start-->  
                <div class="txt_Group margin_Top margin_Bottom margin_Left margin_Right10">
                	<div class="row margin_Left0 margin_Right0">
    					<div class="col-sm-3">
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
    					<div class="col-sm-3">
                            <select class="form-control form_control_style select_Style btn_Margin" id="">
                                <option value="0">選擇群組代號</option>
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
                            
                        <div class="col-sm-3">	
                            <!--查詢button start-->
                            <input class="form-control form_control_style btn_Margin" name="Keyword_Inquire" id="Keyword_Inquire" data-validate="required" placeholder="關鍵字查詢">
                        </div>
                        <div class="col-sm-3">	
                            <div class="btn_Margin disLine_Block">
                                <button class="btn btn-success btn_sm_Width Gradient_Brown" id="BTN_Inquire">
                                    <span class="glyphicon glyphicon-search"></span>
                                    搜尋
                                </button>
                            </div>
                            <!--查詢button end---->
                         </div>
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
                                    <th id="" class="sorting Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 136px;">客戶姓名</th>
                                    <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">開戶日期</th>
                                    <th id="" class="sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 150px;">累積入金</th> 
                                    <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="">款項</th> 
                                    <th id="" class="sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1">狀態</th> 
                                    <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="">功能</th>                                     
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd parent">
                                	<td class="txt_Bold">AE3210695</td>
                                    <td class="txt_Weight">范改攬</td>
                                    <td class="sorting_1">2016/01/01</td>
                                    <td><span class="sorting_1 txt_Weight">23252</span></td>
                                    <td class="sorting_1">753</td>
                                    <td>
                                        OK
                                    </td> 
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="/mt4/client_funding">入金</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="/mt4/client_withdraw">出金</a>
                                        </div>
                                    </td>                                   
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE5160012</td>
                                    <td class="txt_Weight">王旻建</td>
                                    <td class="sorting_1">2015/02/01</td>
                                    <td><span class="sorting_1 txt_Weight">123232.00</span></td>
                                    <td class="sorting_1">54323.94</td>
                                    <td>
                                    	OK
                                    </td>
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="/mt4/client_funding">入金</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="/mt4/client_withdraw">出金</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE3232384</td>
                                    <td class="txt_Weight">林小飛</td>
                                    <td class="sorting_1">2016/07/01</td>
                                    <td><span class="sorting_1 txt_Weight">334334.00</span></td>
                                    <td class="sorting_1">65634</td>
                                    <td>
                                    	OK
                                    </td> 
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="/mt4/client_funding">入金</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="/mt4/client_withdraw">出金</a>
                                        </div>
                                    </td>                                  
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3280695</td>
                                    <td class="txt_Weight">范大時</td>
                                    <td class="sorting_1">2016/04/01</td>
                                    <td><span class="sorting_1 txt_Weight">1244425.00</span></td>
                                    <td class="sorting_1">34343.94</td>
                                    <td>
                                    	OK
                                    </td>
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="/mt4/client_funding">入金</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="/mt4/client_withdraw">出金</a>
                                        </div>
                                    </td>                                    
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE5156512</td>
                                    <td class="txt_Weight">王左線</td>
                                    <td class="sorting_1">2016/03/01</td>
                                    <td><span class="sorting_1 txt_Weight">123783.00</span></td>
                                    <td class="sorting_1">5466241.94</td>
                                    <td>
                                    	OK
                                    </td> 
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="/mt4/client_funding">入金</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="/mt4/client_withdraw">出金</a>
                                        </div>
                                    </td>                                  
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3233215</td>
                                    <td class="txt_Weight">林易連</td>
                                    <td class="sorting_1">2016/01/15</td>
                                    <td><span class="sorting_1 txt_Weight">54514.00</span></td>
                                    <td class="sorting_1">55623434</td>
                                    <td>
                                    	OK
                                    </td> 
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="/mt4/client_funding">入金</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="/mt4/client_withdraw">出金</a>
                                        </div>
                                    </td>                                  
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE3111684</td>
                                    <td class="txt_Weight">蔡男非</td>
                                    <td class="sorting_1">2016/01/03</td>
                                    <td><span class="sorting_1 txt_Weight">77724.00</span></td>
                                    <td class="sorting_1">875652.94</td>
                                    <td>
                                    	OK
                                    </td> 
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="/mt4/client_funding">入金</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="/mt4/client_withdraw">出金</a>
                                        </div>
                                    </td>                                  
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210695</td>
                                    <td class="txt_Weight">劉西非</td>
                                    <td class="sorting_1">2016/01/21</td>
                                    <td><span class="sorting_1 txt_Weight">87314.00</span></td>
                                    <td class="sorting_1">2323223</td>
                                    <td>
                                    	OK
                                    </td>
                                  	<td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="/mt4/client_funding">入金</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="/mt4/client_withdraw">出金</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE5110012</td>
                                    <td class="txt_Weight">林重慶</td>
                                    <td class="sorting_1">2016/01/25</td>
                                    <td><span class="sorting_1 txt_Weight">85811.00</span></td>
                                    <td class="sorting_1">12323.94</td>    
                                    <td>
                                    	OK
                                    </td>
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="/mt4/client_funding">入金</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="/mt4/client_withdraw">出金</a>
                                        </div>
                                    </td>                                     
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210334</td>
                                    <td class="txt_Weight">王西安</td>
                                    <td class="sorting_1">2016/01/28</td>
                                    <td><span class="sorting_1 txt_Weight">96712.00</span></td> 
                                    <td class="sorting_1">54522</td> 
                                    <td>
                                    	OK
                                    </td>
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="/mt4/client_funding">入金</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="/mt4/client_withdraw">出金</a>
                                        </div>
                                    </td>                                      
                                </tr>
                                 <tr role="row" class="odd">
                                	<td class="txt_Bold">AE3278684</td>
                                    <td class="txt_Weight">李奕華</td>
                                    <td class="sorting_1">2016/01/15</td>
                                    <td><span class="sorting_1 txt_Weight">657864.00</span></td> 
                                    <td class="sorting_1">343413.94</td>    
                                    <td>
                                    	OK
                                    </td>
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="/mt4/client_funding">入金</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="/mt4/client_withdraw">出金</a>
                                        </div>
                                    </td>                                   
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3232684</td>
                                    <td class="txt_Weight">王撢撢</td>
                                    <td class="sorting_1">2016/01/16</td>
                                    <td><span class="sorting_1 txt_Weight">424422.00</span></td>
                                    <td class="sorting_1">545122</td>   
                                    <td>
                                    	OK
                                    </td> 
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="/mt4/client_funding">入金</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="/mt4/client_withdraw">出金</a>
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

<!--引用 bootstrap 頁碼 style-->
<script type="text/javascript" src="<?=ASSETS_JS?>jquery.pagination.js"></script> 

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
        searching : false, //打開原有的search功能
		info:     true,
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
			