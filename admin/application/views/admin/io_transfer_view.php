<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="" />
    <title>MT4資金互轉</title>

    <link href="<?=ASSETS_CSS?>reset.css" rel="stylesheet" type="text/css">
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="<?=ASSETS_CSS?>style.css" rel="stylesheet" type="text/css" media="all" /> 
    <!--//theme-style-->
    <!---->
    <link href="<?=ASSETS_CSS?>linecons.css" rel="stylesheet" type="text/css">
    <!--引用兼容ie bootstrap ui css-->
    <link href="<?=ASSETS_CSS?>bootstrap-ie7.css" rel="stylesheet" type="text/css" media="all" />
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
                <h1>MT4資金互轉</h1>

                <div class="contentGroup">
                    <form id="ib_Group_Account_form" class="io_transfer" action="/admin/io_transfer" method="post"> 
                        <!--文字start-->
                        <div class="Table_Layout">
                            <!--表格內容start-->
                            <div class="col-sm-12">

                                <!-- Combined Table -->                                  
                                <table class="table table-bordered table-striped table-condensed table-hover table_Style_RWD_Padding">                                       
                                    <tbody>
                                        <tr>
                                            <td class="txtC vertical_Align min_Width200">*MT4轉出帳號</td>
                                            <td>
                                                <input class="form-control form_control_style" type="text" name="out_account" data-validate="required" placeholder="轉出帳號ID" required>
                                            </td>
                                        </tr>                                            
                                        <tr>
                                            <td class="txtC vertical_Align">*MT4轉入帳號</td>
                                            <td>
                                                <input class="form-control form_control_style" type="text" name="in_account" data-validate="required" placeholder="轉入帳號ID" required>
                                            </td>
                                        </tr>                                          
                                        <tr>
                                            <td class="txtC vertical_Align">*內轉金額</td>
                                            <td>
                                                <input class="form-control form_control_style" type="number" name="amount" data-validate="required" placeholder="金額" required>
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
                                <button class="btn btn-success btn_Width Gradient_Green" id="BTN_Next" type="submit">確認轉出</button>
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
<script src="<?=ASSETS_JS?>jquery.validate.js"></script>
<script src="<?=ASSETS_JS?>bootstrap-dialog.js"></script>
<!--引用 CKEditor CDN JS-->
<script type="text/javascript" src="http://cdn.ckeditor.com/4.5.1/full/ckeditor.js"></script>
<!--<script type="text/javascript" src="js/ckeditor.js"></script>-->
<link href="<?=ASSETS_CSS?>bootstrap-dialog.css" rel="stylesheet" type="text/css">

<!--修改 datetimepicker 的功能-->
<script type="text/javascript">
    $(function() {
        $('.datetimepicker1').datepicker({
        language: 'zh-TW',//中文化
        });
    });
        $("form.io_transfer").validate({
            /* 送出allback handler */
            submitHandler: function(formElem) {
                $.ajax({
                    url: formElem.action,
                    type: formElem.method,
                    data: $(formElem).serialize(),
                    dataType: 'json',
                    success: function(resp) {
                        if(resp.status){
                        alert( '資金互轉程序成功! ');

                      }else{
                         alert( '資金互轉程序失敗! 原因：' + resp.msg);
                    }
                    window.location = '/admin/io_transfer';
                }
            });
            }
        });
</script>


</body>
</html>
