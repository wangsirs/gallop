<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="keywords" content="" />
<title>MT4申請入金審核</title>

<link href="<?=ASSETS_CSS?>reset.css" rel="stylesheet" type="text/css">
<!-- Custom Theme files -->
<!--theme-style-->
<link href="<?=ASSETS_CSS?>style.css" rel="stylesheet" type="text/css" media="all" />   
<!--//theme-style-->
<!--引用元素 css-->
<link href="<?=ASSETS_CSS?>xenon-core.css" rel="stylesheet" type="text/css" media="all" />

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
<link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
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
            <h1>MT4申請入金審核</h1>            
                    
            <div class="contentGroup">
                <form id="ib_Group_Account_form" action="" method="post"> 
                    <!--文字start-->
                  <div class="Table_Layout">
                        <!--表格內容start-->
                        <div class="col-sm-12">
                            <h2 class="txt_title_information txt_title_Bord_Gradient">銀行匯款資料</h2>
                            <hr class="LineStyle">      
                            <!-- Combined Table -->                                 
                            <table class="table table-bordered table-striped table-condensed table-hover table_Style_RWD_Padding">                                      
                                <tbody>                                  
                                    <tr>
                                        <td class="txtC vertical_Align min_Width200">MT4帳戶帳號</td>
                                        <td>
                                            60000001
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="txtC vertical_Align">姓名</td>
                                        <td>王小明</td>
                                    </tr>                                           
                                    <tr>
                                        <td class="txtC vertical_Align">電子信箱</td>
                                        <td>
                                            123456789@xxx.com.tw
                                        </td>
                                    </tr>                                           
                                    <tr>
                                        <td class="txtC vertical_Align">電話</td>
                                        <td>
                                            02-12345678
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="txtC vertical_Align">日期</td>
                                        <td>
                                            2016/01/01 12:55:33
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="txtC vertical_Align min_Width200">*存款金額</td>
                                        <td>
                                            100.0000USD
                                        </td>
                                    </tr>                                           
                                    <tr>
                                        <td class="txtC vertical_Align">備註</td>
                                        <td>
                                            
                                        </td>
                                    </tr>                                           
                                    <tr>
                                        <td class="txtC vertical_Align">入金資訊</td>
                                        <td>
                                            <div class="col-sm-3">  
                                                匯款水單
                                                <span class="btn btn-info btn-sm btn_Shadow disLine_Block margin_Top margin_Bottom15" id="">顯示資料</span>
                                            </div>
                                            <div class="col-sm-3">  
                                                匯款資料
                                                <span class="btn btn-info btn-sm btn_Shadow disLine_Block margin_Top margin_Bottom15" id="">顯示資料</span>
                                            </div>
                                            <div class="col-sm-3">  
                                                銀聯
                                                <span class="btn btn-info btn-sm btn_Shadow disLine_Block margin_Top margin_Bottom15" id="">顯示資料</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="txtC vertical_Align">入金狀態</td>
                                        <td class="vertical_Align">
                                            <select class="form-control form_control_style" id="">
                                                <option value="0">處理中</option>
                                                <option value="1">同意</option>
                                                <option value="2">拒絕</option>                                      
                                            </select>
                                        </td>
                                    </tr>      
                                    <tr>
                                        <td class="txtC vertical_Align">註記</td>
                                        <td>
                                            
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
                     <div class="btn_goBack_Group margin_Top50 margin_Bottom15"> 
                        <div class="btn_Position disLine_Block">
                            <a class="btn btn-info btn_sm_Width Gradient_Green" id="BTN_Delete" href="ib_Group_Account_step3.html">確定</a>
                        </div>                          
                        <div class="btn_Position disLine_Block">
                            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="BTN_Reduction" href="#">
                                <span class="glyphicon glyphicon-repeat"></span>
                                返回
                            </a>
                         </div>
                     </div>
                     <!--按鈕end---->
                </form>
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

<!-- for bootstrap datepicker & ie8-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/es5-shim/4.1.1/es5-shim.min.js"></script>
<script src="<?=ASSETS_JS?>bootstrap-datepicker.min.js"></script>
<script src="<?=ASSETS_JS?>bootstrap-datepicker.zh-TW.min.js"></script>

<!--引用 CKEditor CDN JS-->
<script type="text/javascript" src="http://cdn.ckeditor.com/4.5.1/full/ckeditor.js"></script>
<!--<script type="text/javascript" src="<?=ASSETS_JS?>ckeditor.js"></script>-->
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
            