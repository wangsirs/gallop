<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="" />
    <title>MT4顧問存提款紀錄</title>

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

    <style>
        .dataTables_paginate{display:none;}
    </style>

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
            <h1>MT4顧問存提款紀錄</h1>
            
            <div class="contentGroup">                
                <!--文字start-->  
                <div class="margin_Top margin_Bottom margin_Left">
                	<label class="margin_Right">
                      <input type="radio" name="radio-1" checked>全部												
                  </label>
                  <label>
                      <input type="radio" name="radio-1">選定日期範圍												
                  </label>
                  <!--查詢button start-->
                  <div class="btn_Position disLine_Block">
                   <button class="btn btn-success btn_sm_Width Gradient_Brown" id="BTN_Inquire">
                       <span class="glyphicon glyphicon-search"></span>
                       查詢
                   </button>
               </div>
               <!--查詢button end---->
           </div>
           <!--文字end---->

           <div class="Table_Layout">

            <form id="consultant_Deposit_Withdrawal_Record_form" action="" method="post"> 
                <!--表格內容start-->
                <table id="myTable" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                    <thead>
                        <tr role="row" class="BG_Gray">
                           <th class="sorting Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 120px;">交易日期</th>
                           <th id="" class="sorting Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 136px;">客戶帳號</th>
                           <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">客戶姓名</th>
                           <th id="" class="sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 150px;">異動類別</th> 
                           <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="">方式</th> 
                           <th id="" class="sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1">幣別</th>    
                           <th id="" class="sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1">金額</th> 
                           <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="">狀態</th> 
                           <th id="" class="sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1">備註</th>                                  
                       </tr>
                   </thead>
                   <tbody>
                    <tr role="row" class="odd parent">
                       <td class="txt_Bold">2016/05/12 22:32:33</td>
                       <td class="txt_Weight">U91992</td>
                       <td class="sorting_1">王小明</td>
                       <td><span class="sorting_1 txt_Weight">出金</span></td>
                       <td class="sorting_1">電匯</td>
                       <td> USD</td>                                     
                       <td>20333.00</td>  
                       <td>
                           <span class="sorting_1 txt_Weight">
                               <div class="btn_Position">
                                  <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">OTP未過</span>
                              </div>
                          </span>
                      </td>
                      <td></td>                                 
                  </tr>
                  <tr role="row" class="even">
                   <td class="txt_Bold">2016/05/12 22:56:33</td>
                   <td class="txt_Weight">U55746</td>
                   <td class="sorting_1">劉大福</td>
                   <td><span class="sorting_1 txt_Weight">出金</span></td>
                   <td class="sorting_1">電匯</td>
                   <td> USD</td>                                     
                   <td>7000.00</td>  
                   <td>
                       <span class="sorting_1 txt_Weight">
                           <div class="btn_Position">
                              <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">OTP未過</span>
                          </div>
                      </span>
                  </td>
                  <td></td>   
              </tr>
              <tr role="row" class="odd">
               <td class="txt_Bold">2016/01/01 12:55:33</td>
               <td class="txt_Weight">U14682</td>
               <td class="sorting_1">安澤軒</td>
               <td><span class="sorting_1 txt_Weight">入金</span></td>
               <td class="sorting_1">電匯</td>
               <td> USD</td>                                     
               <td>6000.00</td>  
               <td>
                   <span class="sorting_1 txt_Weight">
                       <div class="btn_Position">
                          <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">OTP未過</span>
                      </div>
                  </span>
              </td>
              <td></td>                                    
          </tr>
          <tr role="row" class="even">
           <td class="txt_Bold">2016/05/05 20:22:33</td>
           <td class="txt_Weight">U87741</td>
           <td class="sorting_1">李崗</td>
           <td><span class="sorting_1 txt_Weight">入金</span></td>
           <td class="sorting_1">電匯</td>
           <td> USD</td>                                     
           <td>9000.00</td>  
           <td>
               <span class="sorting_1 txt_Weight">
                   <div class="btn_Position">
                      <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">OTP未過</span>
                  </div>
              </span>
          </td>
          <td></td>                                     
      </tr>
      <tr role="row" class="odd">
       <td class="txt_Bold">2016/06/12 12:44:15</td>
       <td class="txt_Weight">U64378</td>
       <td class="sorting_1">邱毅</td>
       <td><span class="sorting_1 txt_Weight">入金</span></td>
       <td class="sorting_1">電匯</td>
       <td> USD</td>                                     
       <td>15150.00</td>  
       <td>
           <span class="sorting_1 txt_Weight">
               <div class="btn_Position">
                  <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">OTP未過</span>
              </div>
          </span>
      </td>
      <td></td>                                    
  </tr>
  <tr role="row" class="even">
   <td class="txt_Bold">2016/05/27 18:44:23</td>
   <td class="txt_Weight">U83145</td>
   <td class="sorting_1">李崗</td>
   <td><span class="sorting_1 txt_Weight">入金</span></td>
   <td class="sorting_1">電匯</td>
   <td> USD</td>                                     
   <td>10000.00</td>  
   <td>
       <span class="sorting_1 txt_Weight">
           <div class="btn_Position">
              <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">OTP未過</span>
          </div>
      </span>
  </td>
  <td></td>                                     
</tr>
<tr role="row" class="odd">
   <td class="txt_Bold">2016/05/26 21:43:17</td>
   <td class="txt_Weight">U85526</td>
   <td class="sorting_1">范澤佑</td>
   <td><span class="sorting_1 txt_Weight">入金</span></td>
   <td class="sorting_1">電匯</td>
   <td> USD</td>                                     
   <td>5000.00</td>  
   <td>
       <span class="sorting_1 txt_Weight">
           <div class="btn_Position">
              <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">OTP未過</span>
          </div>
      </span>
  </td>
  <td></td>                                    
</tr>
<tr role="row" class="even">
   <td class="txt_Bold">2016/06/16 18:42:12</td>
   <td class="txt_Weight">U14263</td>
   <td class="sorting_1">馬如先</td>
   <td><span class="sorting_1 txt_Weight">入金</span></td>
   <td class="sorting_1">電匯</td>
   <td> USD</td>                                     
   <td>95010.00</td>  
   <td>
       <span class="sorting_1 txt_Weight">
           <div class="btn_Position">
              <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">OTP未過</span>
          </div>
      </span>
  </td>
  <td></td>   
</tr>
<tr role="row" class="odd">
   <td class="txt_Bold">2016/06/13 21:44:13</td>
   <td class="txt_Weight">U42356</td>
   <td class="sorting_1">陳建豪</td>
   <td><span class="sorting_1 txt_Weight">入金</span></td>
   <td class="sorting_1">電匯</td>
   <td> USD</td>                                     
   <td>50000.00</td>  
   <td>
       <span class="sorting_1 txt_Weight">
           <div class="btn_Position">
              <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">OTP未過</span>
          </div>
      </span>
  </td>
  <td></td>                                    
</tr>
<tr role="row" class="even">
   <td class="txt_Bold">2016/07/11 15:53:33</td>
   <td class="txt_Weight">U87756</td>
   <td class="sorting_1">白啟惠</td>
   <td><span class="sorting_1 txt_Weight">入金</span></td>
   <td class="sorting_1">電匯</td>
   <td> USD</td>                                     
   <td>4000.00</td>  
   <td>
       <span class="sorting_1 txt_Weight">
           <div class="btn_Position">
              <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">OTP未過</span>
          </div>
      </span>
  </td>
  <td></td>                                    
</tr>
<tr role="row" class="odd">
   <td class="txt_Bold">2016/05/07 15:43:33</td>
   <td class="txt_Weight">U87050</td>
   <td class="sorting_1">陳易辰</td>
   <td><span class="sorting_1 txt_Weight">入金</span></td>
   <td class="sorting_1">電匯</td>
   <td> USD</td>                                     
   <td>56000.00</td>  
   <td>
       <span class="sorting_1 txt_Weight">
           <div class="btn_Position">
              <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">OTP未過</span>
          </div>
      </span>
  </td>
  <td></td>                                   
</tr>
<tr role="row" class="even">
   <td class="txt_Bold">2016/01/01 12:55:33</td>
   <td class="txt_Weight">U87736</td>
   <td class="sorting_1">藍殊異</td>
   <td><span class="sorting_1 txt_Weight">出金</span></td>
   <td class="sorting_1">電匯</td>
   <td> USD</td>                                     
   <td>2000.00</td>  
   <td>
       <span class="sorting_1 txt_Weight">
           <div class="btn_Position">
              <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">OTP未過</span>
          </div>
      </span>
  </td>
  <td></td>                                     
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
         order : [[ 0, 'desc' ]], //asc是遞增；第一欄排序功能是往下遞增
        responsive : true, //打開 #myTable表格RWD 的功能
        paging:   true,
        searching : true, //打開原有的search功能
        info:     false,
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
