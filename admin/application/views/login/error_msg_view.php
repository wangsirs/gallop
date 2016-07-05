<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$this->lang->line('title')?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=ASSETS_CSS?>bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=ASSETS_CSS?>font-awesome.min.css">
    <!-- Ionicons -->
   <link rel="stylesheet" href="<?=ASSETS_CSS?>ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=ASSETS_CSS?>AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=ASSETS_JS?>thirdParty/plugins/iCheck/square/blue.css">
    <!-- dialog plugin -->
    <link rel="stylesheet" href="<?=ASSETS_CSS?>bootstrap-dialog.css">
    <!-- jQuery 2.1.4 -->
    <script src="<?=ASSETS_JS?>thirdParty/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=ASSETS_JS?>bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?=ASSETS_JS?>thirdParty/plugins/iCheck/icheck.min.js"></script>
    <script src="<?=ASSETS_JS?>bootstrap-dialog.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
        var status = parseInt("<?=$status?>");
        if(status == 0){
          BootstrapDialog.alert({
            title: '',
            message: '確認信已寄至您的電子信箱，請查收!',
            callback: function(result) {
              if(result){
                window.location = '/';
              }
            }
          });       
        }else{
          BootstrapDialog.alert({
            title: '',
            type: BootstrapDialog.TYPE_ERROR,
            message: '您輸入之訊息有錯，請重新確認!',
            callback: function(result) {
              if(result){
                window.location = '/';
              }
            }
          });           
        }
      });
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box bg-light-blue disabled color-palette">
    </div><!-- /.login-box -->
  </body>
</html>
