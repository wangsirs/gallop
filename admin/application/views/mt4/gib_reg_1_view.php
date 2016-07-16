<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="" />
    <title>MT4大IB群組開戶設定</title>

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
            <h1>MT4大IB群組開戶設定</h1>
            
            <!--step start-->
            <div class="txtC margin_Top margin_Bottom">
            	<img src="<?=ASSETS_IMG?>step_01.png" width="679" height="54">
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
                                  <td class="txtC vertical_Align min_Width200">*姓氏</td>
                                  <td>
                                   <input class="form-control form_control_style" type="text" name="Last_Name" id="Last_Name" data-validate="required" placeholder="姓氏">
                               </td>
                           </tr>											
                           <tr>
                              <td class="txtC vertical_Align">*名</td>
                              <td>
                               <input class="form-control form_control_style" type="text" name="First_Name" id="First_Name" data-validate="required" placeholder="名字">
                           </td>
                       </tr>											
                       <tr>
                          <td class="txtC vertical_Align">*護照或身份證號碼</td>
                          <td>
                           <input class="form-control form_control_style" type="text" name="edit_id_Card_Number" id="edit_id_Card_Number" data-validate="required" placeholder="護照或身份證密碼">
                       </td>
                   </tr>
                   <tr>
                    <td class="txtC vertical_Align">*出生日期</td>
                    <td>
                       <div class="input-group date datetimepicker1" id="datetimepicker1">                                        	
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        <input type="text" class="form-control" />
                    </div>
                </td>
            </tr>
            <tr>
              <td class="txtC vertical_Align min_Width200">*密碼</td>
              <td>
               <input class="form-control form_control_style" type="text" name="Password" id="Password" data-validate="required" placeholder="密碼">
           </td>
       </tr>											
       <tr>
          <td class="txtC vertical_Align">*確認密碼</td>
          <td>
           <input class="form-control form_control_style" type="text" name="confirn_Password" id="confirn_Password" data-validate="required" placeholder="確認密碼">
       </td>
   </tr>											
   <tr>
      <td class="txtC vertical_Align">*性別</td>
      <td>
       <select class="form-control form_control_style" id="">
        <option value="0">請選擇</option>
        <option value="1">男</option>
        <option value="2">女</option>                                      
    </select>
</td>
</tr>
<tr>
    <td class="txtC vertical_Align">群組代碼</td>
    <td>
       <input class="form-control form_control_style" type="text" name="edit_Group_Number" id="edit_Group_Number" data-validate="required" placeholder="群組代碼">
   </td>
</tr>
<tr>
   <td colspan="2" class="txtC vertical_Align">
       <h2 class="txt_title_information txt_title_Bord_Gradient">聯絡資料</h2>
       <hr class="LineStyle">
   </td>  
</tr>
<tr>
  <td class="txtC vertical_Align min_Width200">*居住國家</td>
  <td>
   <select class="form-control form_control_style" id="">
    <option value="0">請選擇</option>
    <option value="1">中國</option>
    <option value="2">台灣</option>
    <option value="3">香港</option>
</select>
</td>
</tr>											
<tr>
  <td class="txtC vertical_Align">*省</td>
  <td>
   <input class="form-control form_control_style" name="Province" id="Province" data-validate="required" placeholder="省">
</td>
</tr>											
<tr>
  <td class="txtC vertical_Align">*居住城市</td>
  <td>
   <input class="form-control form_control_style" name="City" id="City" data-validate="required" placeholder="居住城市">
</td>
</tr>
<tr>
    <td class="txtC vertical_Align">*居住地址</td>
    <td>
       <input class="form-control form_control_style" name="Address" id="Address" data-validate="required" placeholder="居住地址">
   </td>
</tr>
<tr>
  <td class="txtC vertical_Align min_Width200">*電話</td>
  <td>
   <div class="input-group">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-earphone"></span>
    </span>
    <input type="text" class="form-control" placeholder="電話">                                         
</div>
</td>
</tr>											
<tr>
  <td class="txtC vertical_Align">*行動電話</td>
  <td>
   <div class="input-group">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-earphone"></span>
    </span>
    <input type="text" class="form-control" placeholder="行動電話">                                         
</div>
</td>
</tr>											
<tr>
  <td class="txtC vertical_Align">*電子信箱</td>
  <td>
   <div class="input-group">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-envelope"></span>
    </span>
    <input type="text" class="form-control" placeholder="Email">                                         
</div>
</td>
</tr>
<tr>
    <td class="txtC vertical_Align">*郵政編碼</td>
    <td>
       <input class="form-control form_control_style" name="Postal_Number" id="Postal_Number" data-validate="required" placeholder="郵政編碼">
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
   <a class="btn btn-success btn_Width Gradient_Green" id="BTN_Next" href="/mt4/gib_reg_2">下一步</a>
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
<!--<script type="text/javascript" src="js/ckeditor.js"></script>-->


<!--修改 datetimepicker 的功能-->
<script type="text/javascript">
    $(function() {

     $('.datetimepicker1').datepicker({
	   language: 'zh-TW',//中文化

 });


 });
</script>


</body>
</html>
