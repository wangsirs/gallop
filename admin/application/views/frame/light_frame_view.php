<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gallop 帳務管理介面</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <base href="<?=base_url()?>" />
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=ASSETS_CSS?>bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=ASSETS_CSS?>font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=ASSETS_CSS?>ionicons.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?=ASSETS_JS?>thirdParty/plugins/iCheck/all.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=ASSETS_CSS?>AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=ASSETS_CSS?>skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=ASSETS_JS?>thirdParty/plugins/iCheck/flat/blue.css">
    <!-- dialog plugin -->
    <link rel="stylesheet" href="<?=ASSETS_CSS?>bootstrap-dialog.css">
    <!-- jQuery 2.1.4 -->
    <script src="<?=ASSETS_JS?>thirdParty/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?=ASSETS_JS?>jquery-ui.min.js"></script>
    <!-- Sparkline -->
    <script src="<?=ASSETS_JS?>thirdParty/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?=ASSETS_JS?>thirdParty/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?=ASSETS_JS?>thirdParty/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=ASSETS_JS?>app.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=ASSETS_JS?>bootstrap.min.js"></script>
    <script src="<?=ASSETS_JS?>gallop.min.js"></script>
    <script src="<?=ASSETS_JS?>bootstrap-dialog.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
    <?=$content?>
    </div>
    <!-- ./wrapper -->
</body>

</html>