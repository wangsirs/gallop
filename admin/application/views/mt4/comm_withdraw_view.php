<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="" />
    <title>MT4佣金提款</title>

    <link href="<?=ASSETS_CSS?>reset.css" rel="stylesheet" type="text/css">
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
    <!---->
    <link href="<?=ASSETS_CSS?>linecons.css" rel="stylesheet" type="text/css">
    <!--引用兼容ie bootstrap ui css-->
    <link href="<?=ASSETS_CSS?>bootstrap-ie7.css" rel="stylesheet" type="text/css" media="all" />
    <!--引用最新編譯和最佳化的 bootstrap3.0 CSS-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <!--引用bootstrap datepicker CSS-->
    <link href="<?=ASSETS_CSS?>bootstrap-datepicker.css" rel="stylesheet">

    <!--自寫 css-->
    <link href="<?=ASSETS_CSS?>common.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>menu.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>txt_style.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>table_style.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>button.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>form_style.css" rel="stylesheet" type="text/css">
    <!--修改 datepicker style-->
    <link href="<?=ASSETS_CSS?>datepicker_style.css" rel="stylesheet" type="text/css">

    <!--fonts-->
    <!--<link href="<?=ASSETS_CSS?>font_style.css" rel="stylesheet" type="text/css" media="all" />-->
    <link href="<?=ASSETS_CSS?>font-awesome.min.css" rel="stylesheet" />

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
            <h1>MT4佣金提款</h1>            

            <div class="contentGroup">
                <form id="commission_Withdrawal_form" action="" method="post"> 
                    <!--文字start-->
                    <div class="Table_Layout">
                        <!--表格內容start-->
                        <div class="col-sm-12">	
                         <!-- Combined Table -->									
                         <table class="table table-bordered table-striped table-condensed table-hover table_Style_RWD_Padding">										
                            <tbody>                                  
                               <tr>
                                  <td class="txtC vertical_Align min_Width200">*代理商帳號</td>
                                  <td class="vertical_Align">
                                   60000001
                               </td>
                           </tr>
                           <tr>
                               <td class="txtC vertical_Align">*代理商姓名</td>
                               <td class="vertical_Align">CS</td>
                           </tr>											
                           <tr>
                              <td class="txtC vertical_Align">*方式</td>
                              <td class="vertical_Align">
                               <label class="margin_Right">
                                <input type="radio" name="radio-1" checked="">銀行帳戶帳號												
                            </label>
                            <label class="margin_Right">
                                <input type="radio" name="radio-1">MT4帳戶帳號												
                            </label>
                            <label class="margin_Right">
                                <input type="radio" name="radio-1">國際提款卡帳號												
                            </label>
                        </td>
                    </tr>											
                    <tr>
                      <td class="txtC vertical_Align">申請日期</td>
                      <td class="vertical_Align">
                       <div class="input-group date datetimepicker1" id="datetimepicker1">                                        	
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        <input type="text" class="form-control" />
                    </div>
                </td>
            </tr>
            <tr>
                <td class="txtC vertical_Align">*提款金額</td>
                <td class="vertical_Align">
                   <input class="form-control form_control_style disLine_Block max_Width70" type="text" name="" id="" data-validate="required" placeholder="">
                   <span class="margin_Left">USD</span>
               </td>
           </tr>
           <tr>
              <td class="txtC vertical_Align min_Width200">*受款人名稱</td>
              <td class="vertical_Align">
               <input class="form-control form_control_style btn_Margin" name="" id="" data-validate="required" placeholder="">
           </td>
       </tr>											
       <tr>
          <td class="txtC vertical_Align">*受款人銀行</td>
          <td class="vertical_Align">
           <input class="form-control form_control_style btn_Margin" name="" id="" data-validate="required" placeholder="">
       </td>
   </tr>											
   <tr>
      <td class="txtC vertical_Align">*銀行帳號</td>
      <td class="vertical_Align">
       <input class="form-control form_control_style btn_Margin" name="" id="" data-validate="required" placeholder="">                                      	
   </td>
</tr>
<tr>
    <td class="txtC vertical_Align">*受款人帳戶幣種</td>
    <td class="vertical_Align">
       <input class="form-control form_control_style btn_Margin" name="" id="" data-validate="required" placeholder="">	
   </td>
</tr>   
<tr>
    <td class="txtC vertical_Align">*國家</td>
    <td class="vertical_Align">
       <input class="form-control form_control_style btn_Margin" name="" id="" data-validate="required" placeholder="">
   </td>
</tr> 
<tr>
    <td class="txtC vertical_Align" style="word-wrap: break-word; min-width: 100px;">*國際匯款代碼<br/>Swift Code</td>
    <td class="vertical_Align">
       <input class="form-control form_control_style btn_Margin" name="" id="" data-validate="required" placeholder="">	
   </td>
</tr>
<tr>
   <td class="txtC vertical_Align">補充意見 </td>
   <td class="vertical_Align">
       <textarea name="additional_Comments" id="additional_Comments" style="width:100%;min-height:150px;"></textarea>	
   </td>
</tr>                                                                               
</tbody>
</table>								
</div>
<!--表格內容end---->
<div class="clr"></div>
</div>
<!--文字end---->                    

<!--按鈕start-->
<div class="btn_goBack_Group margin_Top30 margin_Bottom45"> 
  <div class="btn_Position disLine_Block">
    <a class="btn btn-info btn_sm_Width Gradient_Brown" id="Deposit" href="#">
       <span class="glyphicon glyphicon-plus"></span>
       提款
   </a>
</div>                          
<div class="btn_Position disLine_Block">
    <a class="btn btn-info btn_sm_Width Gradient_Orange" id="BTN_Reduction" href="commission_Deposit_Withdrawal.html">
       <span class="glyphicon glyphicon-repeat"></span>
       返回
   </a>
</div>
</div>
<!--按鈕end---->
</form>

<!--第二個表格start-->
<div class="Table_Layout">

    <form id="commission_Deposit_Edit_form" action="" method="post"> 
        <!--表格內容start-->
        <table id="myTable" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
            <thead>
                <tr role="row" class="BG_Gray">
                   <th class="sorting sorting_NONE Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 120px;">日期</th>
                   <th id="" class="sorting sorting_NONE Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 136px;">類型</th>
                   <th id="" class="sorting_asc sorting_asc_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">入金/出金</th>
                   <th id="" class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 150px;">金額</th> 
                   <th id="" class="sorting_asc sorting_asc_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="">備註</th>                                     
                   <th id="" class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1">功能</th>                                       
               </tr>
           </thead>
           <tbody>
            <tr role="row" class="odd parent">
               <td class="txt_Bold">2016/01/01</td>
               <td class="txt_Weight">佣金存入 </td>
               <td class="sorting_1"></td>
               <td><span class="sorting_1 txt_Weight">1009.36</span></td>
               <td class="sorting_1">Auto Commission Deposit</td> 
               <td>
                <div class="btn_Position">
                    <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="" href="#">
                        <span class="glyphicon glyphicon-edit"></span>
                        修改</a>
                    </div>
                </td>                                 
            </tr>
            <tr role="row" class="even">
               <td class="txt_Bold">2016/01/01</td>
               <td class="txt_Weight">佣金存入 </td>
               <td class="sorting_1"></td>
               <td><span class="sorting_1 txt_Weight">1009.36</span></td>
               <td class="sorting_1">Auto Commission Deposit</td> 
               <td>
                <div class="btn_Position">
                    <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="" href="#">
                        <span class="glyphicon glyphicon-edit"></span>
                        修改</a>
                    </div>
                </td>
            </tr>
            <tr role="row" class="odd">
               <td class="txt_Bold">2016/01/01</td>
               <td class="txt_Weight">佣金存入 </td>
               <td class="sorting_1"></td>
               <td><span class="sorting_1 txt_Weight">1009.36</span></td>
               <td class="sorting_1">Auto Commission Deposit</td> 
               <td>
                <div class="btn_Position">
                    <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="" href="#">
                        <span class="glyphicon glyphicon-edit"></span>
                        修改</a>
                    </div>
                </td>                                 
            </tr>
            <tr role="row" class="even">
               <td class="txt_Bold">2016/01/01</td>
               <td class="txt_Weight">佣金存入 </td>
               <td class="sorting_1"></td>
               <td><span class="sorting_1 txt_Weight">1009.36</span></td>
               <td class="sorting_1">Auto Commission Deposit</td> 
               <td>
                <div class="btn_Position">
                    <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="" href="#">
                        <span class="glyphicon glyphicon-edit"></span>
                        修改</a>
                    </div>
                </td>                                   
            </tr>
            <tr role="row" class="odd">
               <td class="txt_Bold">2016/01/01</td>
               <td class="txt_Weight">佣金存入 </td>
               <td class="sorting_1"></td>
               <td><span class="sorting_1 txt_Weight">1009.36</span></td>
               <td class="sorting_1">Auto Commission Deposit</td> 
               <td>
                <div class="btn_Position">
                    <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="" href="#">
                        <span class="glyphicon glyphicon-edit"></span>
                        修改</a>
                    </div>
                </td>                                
            </tr>
            <tr role="row" class="even">
               <td class="txt_Bold">2016/01/01</td>
               <td class="txt_Weight">佣金存入 </td>
               <td class="sorting_1"></td>
               <td><span class="sorting_1 txt_Weight">1009.36</span></td>
               <td class="sorting_1">Auto Commission Deposit</td> 
               <td>
                <div class="btn_Position">
                    <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="" href="#">
                        <span class="glyphicon glyphicon-edit"></span>
                        修改</a>
                    </div>
                </td>                              
            </tr>
            <tr role="row" class="odd">
               <td class="txt_Bold">2016/01/01</td>
               <td class="txt_Weight">佣金存入 </td>
               <td class="sorting_1"></td>
               <td><span class="sorting_1 txt_Weight">1009.36</span></td>
               <td class="sorting_1">Auto Commission Deposit</td> 
               <td>
                <div class="btn_Position">
                    <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="" href="#">
                        <span class="glyphicon glyphicon-edit"></span>
                        修改</a>
                    </div>
                </td>                                   
            </tr>
            <tr role="row" class="even">
               <td class="txt_Bold">2016/01/01</td>
               <td class="txt_Weight">佣金存入 </td>
               <td class="sorting_1"></td>
               <td><span class="sorting_1 txt_Weight">1009.36</span></td>
               <td class="sorting_1">Auto Commission Deposit</td> 
               <td>
                <div class="btn_Position">
                    <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="" href="#">
                        <span class="glyphicon glyphicon-edit"></span>
                        修改</a>
                    </div>
                </td>
            </tr>
            <tr role="row" class="odd">
               <td class="txt_Bold">2016/01/01</td>
               <td class="txt_Weight">佣金存入 </td>
               <td class="sorting_1"></td>
               <td><span class="sorting_1 txt_Weight">1009.36</span></td>
               <td class="sorting_1">Auto Commission Deposit</td> 
               <td>
                <div class="btn_Position">
                    <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="" href="#">
                        <span class="glyphicon glyphicon-edit"></span>
                        修改</a>
                    </div>
                </td>                               
            </tr>
            <tr role="row" class="even">
               <td class="txt_Bold">2016/01/01</td>
               <td class="txt_Weight">佣金存入 </td>
               <td class="sorting_1"></td>
               <td><span class="sorting_1 txt_Weight">1009.36</span></td>
               <td class="sorting_1">Auto Commission Deposit</td> 
               <td>
                <div class="btn_Position">
                    <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="" href="#">
                        <span class="glyphicon glyphicon-edit"></span>
                        修改</a>
                    </div>
                </td>                                    
            </tr>
            <tr role="row" class="odd">
               <td class="txt_Bold">2016/01/01</td>
               <td class="txt_Weight">佣金存入 </td>
               <td class="sorting_1"></td>
               <td><span class="sorting_1 txt_Weight">1009.36</span></td>
               <td class="sorting_1">Auto Commission Deposit</td> 
               <td>
                <div class="btn_Position">
                    <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="" href="#">
                        <span class="glyphicon glyphicon-edit"></span>
                        修改</a>
                    </div>
                </td>                                
            </tr>
            <tr role="row" class="even">
               <td class="txt_Bold">2016/01/01</td>
               <td class="txt_Weight">佣金存入 </td>
               <td class="sorting_1"></td>
               <td><span class="sorting_1 txt_Weight">1009.36</span></td>
               <td class="sorting_1">Auto Commission Deposit</td> 
               <td>
                <div class="btn_Position">
                    <a class="btn btn-danger btn_sm_Width Gradient_Brown" id="" href="#">
                        <span class="glyphicon glyphicon-edit"></span>
                        修改</a>
                    </div>
                </td>                                      
            </tr>
        </tbody>
    </table>
    <!--表格內容end---->
</form>
</div>
<!--第二個表格end---->
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

<!--引用 CKEditor CDN JS-->
<script type="text/javascript" src="http://cdn.ckeditor.com/4.5.1/full/ckeditor.js"></script>
<!--<script type="text/javascript" src="<?=ASSETS_JS?>ckeditor.js"></script>-->
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


<!--修改 datepicker 的功能-->
<script type="text/javascript">
    $(function() {

     $('.datetimepicker1').datepicker({
	   language: 'zh-TW',//中文化

 });


 });
</script>


</body>
</html>
