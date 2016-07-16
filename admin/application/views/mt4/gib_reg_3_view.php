<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="" />
    <title></title>

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

    <!--自寫 css-->
    <link href="<?=ASSETS_CSS?>common.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>menu.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>txt_style.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>table_style.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>button.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>form_style.css" rel="stylesheet" type="text/css">

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
            <h1>MT4大IB群組開戶設定</h1>
            
            <!--step start-->
            <div class="txtC margin_Top margin_Bottom">
            	<img src="<?=ASSETS_IMG?>step_03.png" width="679" height="54">
            </div>
            <!--step end---->

            <div class="contentGroup">
                <form id="ib_Group_Account_form" action="" method="post"> 
                    <!--文字start-->
                    <div class="Table_Layout">
                        <!--表格內容start-->
                        <div class="col-sm-12">

                         <!-- Combined Table -->									
                         <table class="table table-bordered table-striped table-condensed table-hover table_Style_RWD_Padding">										
                            <tbody>
                               <tr>
                                  <td class="txtC vertical_Align min_Width200">設定MT4群組名稱</td>
                                  <td>
                                   <select class="form-control form_control_style margin_Top margin_Bottom15" id="" style="width:200px;">
                                    <option value="1">公版一</option>
                                    <option value="2">公版二</option>
                                    <option value="3">公版三</option>
                                    <option value="4">公版四</option>
                                </select>
                            </td>
                        </tr>											
                        <tr>
                          <td class="txtC vertical_Align">階級設定</td>
                          <td>
                           <select class="form-control form_control_style margin_Top margin_Bottom15" id="" style="width:200px;">
                            <option value="1">公版一</option>
                            <option value="2">公版二</option>
                            <option value="3">公版三</option>
                            <option value="4">公版四</option>
                        </select>
                    </td>
                </tr>											
                <tr>
                  <td class="txtC vertical_Align">新增MT4群組名稱</td>
                  <td>B_B36252_
                   <input class="form-control form_control_style min_Width400 disLine_Block" name="add_MT4_Group_number" id="add_MT4_Group_number" data-validate="required" placeholder="">
               </td>
           </tr>
           <tr>
            <td class="txtC vertical_Align">MT4商品設定</td>
            <td>
               <select class="form-control form_control_style margin_Top margin_Bottom15" id="" style="width:200px;">
                <option value="1">1111</option>
                <option value="2">2222</option>
                <option value="3">3333</option>
                <option value="4">4444</option>
            </select>
        </td>
    </tr>
    <tr>
       <td colspan="2" class="txtC vertical_Align">
           <h2 class="txt_title_information txt_title_Bord_Gradient">商品設定</h2>
           <hr class="LineStyle">
       </td>  
   </tr>
   <tr>
       <td class="txtC vertical_Align">交易量距</td>
       <td>
           <input class="form-control form_control_style min_Width400" name="" id="" data-validate="required" placeholder="">
       </td>
   </tr>
   <tr>
       <td class="txtC vertical_Align">佣金設定</td>
       <td>
           <input class="form-control form_control_style min_Width400" name="" id="" data-validate="required" placeholder="">
       </td>
   </tr>
   <tr>
       <td class="txtC vertical_Align">點差設定</td>
       <td>
           <input class="form-control form_control_style min_Width400" name="" id="" data-validate="required" placeholder="">
       </td>
   </tr>
   <tr>
    <td colspan="2" class="txtC vertical_Align">
        <div class="btn_Position">
            <a class="btn btn-info btn_sm_Width Gradient_Brown" id="BTN_Add" href="javascript:void(0);">新增</a>
        </div>
    </td>
</tr>
<tr>
   <td colspan="2" class="txtC vertical_Align">
       <h2 class="txt_title_information txt_title_Bord_Gradient">設定內容</h2>
       <hr class="LineStyle">
   </td>                                        
</tr>
<tr>
   <td class="txtC vertical_Align">日期</td>
   <td class="vertical_Align">2016/07/15</td>
</tr>
<tr>
   <td class="txtC vertical_Align">商品設定</td>
   <td class="vertical_Align">全部</td>
</tr>
<tr>
   <td class="txtC vertical_Align">交易量距</td>
   <td>
       <input class="form-control form_control_style min_Width400" name="edit_Transaction" id="edit_Transaction" data-validate="required" placeholder="0.0~5000000000000000000000000.0">                                        	
   </td>
</tr>
<tr>
   <td class="txtC vertical_Align">佣金設定</td>
   <td class="vertical_Align">
       <input class="form-control form_control_style min_Width400" name="edit_Commission" id="edit_Commission" data-validate="required" placeholder="請輸入">
   </td>
</tr>
<tr>
   <td class="txtC vertical_Align">點差設定</td>
   <td class="vertical_Align">
       <input class="form-control form_control_style min_Width400" name="edit_Spreads" id="edit_Spreads" data-validate="required" placeholder="請輸入">
   </td>
</tr>
<tr>
    <td colspan="2" class="txtC vertical_Align">
        <div class="btn_Position">
            <a class="btn btn-info btn_sm_Width Gradient_Orange" id="BTN_Add" href="javascript:void(0);">修改</a>
        </div>
    </td>
</tr>
<tr>
   <td colspan="2" class="txtC vertical_Align">
       <h2 class="txt_title_information txt_title_Bord_Gradient">紀錄</h2>
       <hr class="LineStyle">
   </td>                                        
</tr>
<tr>
   <td class="txtC vertical_Align">日期</td>
   <td class="vertical_Align">2016/07/15</td>
</tr>
<tr>
   <td class="txtC vertical_Align">商品設定</td>
   <td class="vertical_Align">全部</td>
</tr>
<tr>
   <td class="txtC vertical_Align">交易量距</td>
   <td>0.0~5000000000000000000000000.0                                        	
   </td>
</tr>
<tr>
   <td class="txtC vertical_Align">佣金設定</td>
   <td class="vertical_Align">28                                        	
   </tr>
   <tr>
       <td class="txtC vertical_Align">點差設定</td>
       <td class="vertical_Align">40                                        	
       </td>
   </tr>
   <tr>
       <td class="txtC vertical_Align">生效日</td>
       <td class="vertical_Align">2016/07/19                                        	
       </tr>
       <tr>
           <td class="txtC vertical_Align">狀態</td>
           <td class="vertical_Align">未生效                                        	
           </td>
       </tr>
       <tr>
        <td colspan="2" class="txtC vertical_Align">
            <div class="btn_Position disLine_Block">
                <a class="btn btn-info btn_sm_Width Gradient_Blue" id="BTN_Reduction" href="javascript:void(0);">還原</a>
            </div>
            <div class="btn_Position disLine_Block">
                <a class="btn btn-info btn_sm_Width Gradient_Red" id="BTN_Delete" href="javascript:void(0);">刪除</a>
            </div>
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
   <a class="btn btn-success btn_Width Gradient_Green" id="BTN_Final" href="javascript:void(0);">完成</a>
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


<!--引用 CKEditor CDN JS-->
<script type="text/javascript" src="http://cdn.ckeditor.com/4.5.1/full/ckeditor.js"></script>
<!--<script type="text/javascript" src="js/ckeditor.js"></script>-->

<!-- menu -->
<script src="js/menu.js"></script> 
<!--phone_Menu手機版選單-->
<script type="text/javascript" src="js/phone_Menu.js"></script>


</body>
</html>
