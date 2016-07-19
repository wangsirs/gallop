<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="keywords" content="" />
<title>MT4佣金存入/提款</title>

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
            <h1>MT4佣金存入/提款</h1>
            
            <div class="contentGroup">                
                <!--文字start-->  
                <div class="margin_Top margin_Left">
                	<div class="col-sm-3">
                    	<select class="form-control form_control_style select_Style btn_Margin margin_Top" id="">
                        	<option value="0">2016/05/22</option>
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
                    <!--falsebutton start-->
                    <div class="btn_goBack_Group margin_Top20"> 
                    	<div class="btn_Position disLine_Block">
                        	<a class="btn btn-info btn_sm_Width btn_xL_Width Gradient_Red" id="" href="#">
                            <span class="glyphicon glyphicon-plus"></span>
                               計算佣金
                            </a>
                        </div>
                        <div class="btn_Position disLine_Block">
                        	<a class="btn btn-info btn_sm_Width btn_xL_Width Gradient_Brown" id="" href="#"> 
                            <span class="glyphicon glyphicon-search"></span>
                               搜尋
                            </a>
                        </div>
                        <div class="btn_Position disLine_Block">
                        	<a class="btn btn-info btn_sm_Width btn_xL_Width Gradient_Blue" id="" href="#"> 
                            <span class="glyphicon glyphicon-edit"></span>
                               佣金存入
                            </a>
                        </div>
                        <div class="btn_Position disLine_Block">
                        	<a class="btn btn-info btn_sm_Width btn_xL_Width Gradient_Orange" id="BTN_Download" href="#"> 
                            <span class="glyphicon glyphicon-download-alt"></span>
                            	下載Excel檔
                            </a>
                        </div>
                    </div>	 
                    <!--falsebutton end---->
                   
                </div>
                <!--文字end---->
                               
                <div class="Table_Layout">
                    
                    <form id="commission_Deposit_Withdrawal_form" action="" method="post"> 
                        <!--表格內容start-->
                        <table id="myTable" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                            <thead>
                                <tr role="row" class="BG_Gray">
                                	<th class="sorting sorting_NONE Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 120px;">代理商帳號</th>
                                    <th id="" class="sorting sorting_NONE Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 136px;">群組代號</th>
                                    <th id="" class="sorting_asc sorting_asc_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">客戶獎金</th>
                                    <th id="" class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 150px;">組織獎金</th> 
                                    <th id="" class="sorting_asc sorting_asc_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="">獎金合計</th> 
                                    <th id="" class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1">已提領獎金</th>
                                    <th id="" class="sorting_asc sorting_asc_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="">未提領獎金合計</th> 
                                    <th id="" class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1">功能</th>                                       
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd parent">
                                	<td class="txt_Bold">AE3210695</td>
                                    <td class="txt_Weight">99999999999999</td>
                                    <td class="sorting_1">128.68</td>
                                    <td><span class="sorting_1 txt_Weight">128.68</span></td>
                                    <td class="sorting_1">128.68</td>
                                    <td>
                                        128.68
                                    </td> 
                                    <td>0</td>   
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="#">重新計算</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="#">自動存入 </a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Red" id="Deposit" href="commission_Deposit.html">手動存入</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="Withdrawal" href="commission_Withdrawal.html">提款</a>
                                        </div>
                                    </td>                                 
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE5110012</td>
                                    <td class="txt_Weight">王孝民</td>
                                    <td class="sorting_1">50.00</td>
                                    <td><span class="sorting_1 txt_Weight">00.00</span></td>
                                    <td class="sorting_1">50.00</td>
                                    <td>
                                    	00.00
                                    </td>
                                    <td>0</td>   
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="#">重新計算</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="#">自動存入 </a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Red" id="Deposit" href="commission_Deposit.html">手動存入</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="Withdrawal" href="commission_Withdrawal.html">提款</a>
                                        </div>
                                    </td> 
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE3210684</td>
                                    <td class="txt_Weight">CS</td>
                                    <td class="sorting_1">189.36</td>
                                    <td><span class="sorting_1 txt_Weight">189.36</span></td>
                                    <td class="sorting_1">189.36</td>
                                    <td>
                                    	189.36
                                    </td> 
                                    <td>0</td>   
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="#">重新計算</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="#">自動存入 </a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Red" id="Deposit" href="commission_Deposit.html">手動存入</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="Withdrawal" href="commission_Withdrawal.html">提款</a>
                                        </div>
                                    </td>                                  
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210695</td>
                                    <td class="txt_Weight">范曉筱</td>
                                    <td class="sorting_1">1200.14</td>
                                    <td><span class="sorting_1 txt_Weight">400.00</span></td>
                                    <td class="sorting_1">1600.14</td>
                                    <td>
                                    	0.00
                                    </td>
                                    <td>0</td>   
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="#">重新計算</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="#">自動存入 </a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Red" id="Deposit" href="commission_Deposit.html">手動存入</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="Withdrawal" href="commission_Withdrawal.html">提款</a>
                                        </div>
                                    </td>                                    
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE5110012</td>
                                    <td class="txt_Weight">100000599</td>
                                    <td class="sorting_1">189.36</td>
                                    <td><span class="sorting_1 txt_Weight">189.36</span></td>
                                    <td class="sorting_1">189.36</td>
                                    <td>
                                    	189.36
                                    </td>  
                                    <td>0</td>   
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="#">重新計算</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="#">自動存入 </a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Red" id="Deposit" href="commission_Deposit.html">手動存入</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="Withdrawal" href="commission_Withdrawal.html">提款</a>
                                        </div>
                                    </td>                                  
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210695</td>
                                    <td class="txt_Weight">林一連</td>
                                    <td class="sorting_1">48.68</td>
                                    <td><span class="sorting_1 txt_Weight">556.68</span></td>
                                    <td class="sorting_1">13.68</td>
                                    <td>
                                    	128.68
                                    </td>  
                                    <td>0</td>   
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="#">重新計算</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="#">自動存入 </a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Red" id="Deposit" href="commission_Deposit.html">手動存入</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="Withdrawal" href="commission_Withdrawal.html">提款</a>
                                        </div>
                                    </td>                                 
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE3210684</td>
                                    <td class="txt_Weight">蔡小婷</td>
                                    <td class="sorting_1">880.44</td>
                                    <td><span class="sorting_1 txt_Weight">888.77</span></td>
                                    <td class="sorting_1">1769.22</td>
                                    <td>
                                    	0.88
                                    </td> 
                                    <td>0</td>   
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="#">重新計算</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="#">自動存入 </a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Red" id="Deposit" href="commission_Deposit.html">手動存入</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="Withdrawal" href="commission_Withdrawal.html">提款</a>
                                        </div>
                                    </td>                                   
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210695</td>
                                    <td class="txt_Weight">劉小雯</td>
                                    <td class="sorting_1">128.68</td>
                                    <td><span class="sorting_1 txt_Weight">128.68</span></td>
                                    <td class="sorting_1">128.68</td>
                                    <td>
                                    	128.68
                                    </td>
                                  	<td>0</td>   
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="#">重新計算</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="#">自動存入 </a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Red" id="Deposit" href="commission_Deposit.html">手動存入</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="Withdrawal" href="commission_Withdrawal.html">提款</a>
                                        </div>
                                    </td> 
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE5110012</td>
                                    <td class="txt_Weight">林小華</td>
                                    <td class="sorting_1">189.36</td>
                                    <td><span class="sorting_1 txt_Weight">189.36</span></td>
                                    <td class="sorting_1">189.36</td>    
                                    <td>
                                    	189.36
                                    </td>
                                    <td>0</td>   
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="#">重新計算</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="#">自動存入 </a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Red" id="Deposit" href="commission_Deposit.html">手動存入</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="Withdrawal" href="commission_Withdrawal.html">提款</a>
                                        </div>
                                    </td>                                      
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210684</td>
                                    <td class="txt_Weight">王智輝</td>
                                    <td class="sorting_1">0.00</td>
                                    <td><span class="sorting_1 txt_Weight">0.00</span></td> 
                                    <td class="sorting_1">0.00</td> 
                                    <td>
                                    	0.00
                                    </td> 
                                    <td>0</td>   
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="#">重新計算</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="#">自動存入 </a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Red" id="Deposit" href="commission_Deposit.html">手動存入</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="Withdrawal" href="commission_Withdrawal.html">提款</a>
                                        </div>
                                    </td>                                      
                                </tr>
                                 <tr role="row" class="odd">
                                	<td class="txt_Bold">AE3210684</td>
                                    <td class="txt_Weight">王大明</td>
                                    <td class="sorting_1">189.36</td>
                                    <td><span class="sorting_1 txt_Weight">189.36</span></td> 
                                    <td class="sorting_1">189.36</td>    
                                    <td>
                                    	189.36
                                    </td>
                                    <td>0</td>   
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="#">重新計算</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="#">自動存入 </a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Red" id="Deposit" href="commission_Deposit.html">手動存入</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="Withdrawal" href="commission_Withdrawal.html">提款</a>
                                        </div>
                                    </td>                                   
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3210684</td>
                                    <td class="txt_Weight">王廷箴</td>
                                    <td class="sorting_1">0.00</td>
                                    <td><span class="sorting_1 txt_Weight">0.00</span></td>
                                    <td class="sorting_1">0.00</td>   
                                    <td>
                                    	0.00
                                    </td>
                                    <td>0</td>   
                                    <td>
                                    	<div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="Deposit" href="#">重新計算</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Blue" id="Withdrawal" href="#">自動存入 </a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-info btn_sm_Width Gradient_Red" id="Deposit" href="commission_Deposit.html">手動存入</a>
                                        </div>
                                        <div class="btn_Position">
                                            <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="Withdrawal" href="commission_Withdrawal.html">提款</a>
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
		paging:   false,
        searching : false, //打開原有的search功能
		info:     false,
		filter:     true,
        ordering :   false, //打開 排序功能
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
		,
        fnInitComplete : function () { //等 datatable 執行完，再執行
		}
    });

});
</script>

<!--修改 引用的bootstrap 頁碼 的功能-->
<script>
//$(function() { 
//	$('#pagination_sm').pagination({ //讓#pagination_sm 執行pagination 函式套件
//		first:'«', //修改first為 << 頁碼文字
//		last:'»', //修改last為 >> 頁碼文字
//        totalPages: 20, //總頁數20頁
//        visiblePages: 2, //顯示2頁
//        onPageClick: function (event, page) { //按頁碼之後會執行的事
//            $('#page-content_sm').text('Page ' + page);
//        }
//    });
//});
</script>

</body>
</html>
			