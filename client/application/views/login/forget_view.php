<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?=lang('login_title')?>
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
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
    <div class="login-box-body">
        <?php
        echo validation_errors(); 
        $attrs = array();
        echo form_open('forget_confirm', $attrs) ?>
            <h3>帳號:</h3>
            <div class="form-group has-feedback">
                <input type="text" class="form-control input-lg" name="account" placeholder="<?=lang('login_user_ph')?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <h3>E-mail信箱:</h3>
            <div class="form-group has-feedback">
                <input type="email" class="form-control input-lg" name="email" placeholder="<?=lang('login_email_ph')?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <h3>驗證碼:</h3>
            <div class="row">
                <div class="col-xs-8">
                    <div class="form-group has-feedback">
                        <input type="number" name="captcha" class="form-control input-lg" placeholder="<?=lang('login_cap_ph')?>">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                </div>
                <div class="col-xs-4">
                    <img src="/login/captcha_gen" id="rand-img"></p>  
                </div>
            </div>
            <div class="row">
            </div>
            <br>
            <div class="row pull-right">
                <div class="col-xs-6 form-group">
                    <a href="login">
                        <button type="button" class="btn btn-block btn-default btn-lg"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;
                            <?=lang('login_back')?>
                        </button>
                    </a>
                </div>
                <!-- /.col -->
                <div class="col-xs-6 form-group">
                    <button type="submit" class="btn btn-block btn-primary btn-lg"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;&nbsp;
                        <?=lang('login_send')?>
                    </button>
                </div>
                <!-- /.col -->
            </div>
            <?php echo form_close(); ?>
            <br>
            <div class="social-auth-links text-center">
                <!--<p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>-->
            </div>
            <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
</body>

</html>
