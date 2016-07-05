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
	<base href="<?=base_url()?>" />
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
	<script src="<?=ASSETS_JS?>jquery.validate.js"></script>
	<script>
		$(function() {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			});
			$("form").validate({
				rules:{
					user: {
						required: true
					},
					pass: {
						required: true
					},
					captcha: {
						required: true
					}
				},
				messages: {
					user:"此為必填欄位",
					pass:"此為必填欄位",
					captcha:"此為必填欄位"
				},
				errorPlacement: function(error, elem) {
					elem.siblings('.form-control-feedback').after(error);
				},
				submitHandler: function(formElem) {
					$.ajax({
						url: formElem.action,
						type: formElem.method,
						data: $(formElem).serialize(),
						dataType:'json',
						success: function(resp) {
							if(resp.hasOwnProperty('status')){
								if(resp.status === true){
									window.location = '/';
								}else{
									BootstrapDialog.alert({
										title: '錯誤訊息',
										type: BootstrapDialog.TYPE_DANGER,
										message:  resp.msg,
										callback: function(resp){
											ChangeCaptcha();
										}
									});                             
								}
							}
						}
					});
				}
			});
		});

		function showFgDialog() {
			BootstrapDialog.show({
				title: '重新索取登入密碼',
				type: BootstrapDialog.TYPE_SUCCESS,
				message: function(dialog) {
					var $message = $('<div></div>');
					var pageToLoad = dialog.getData('forgetPage');
					$message.load(pageToLoad);

					return $message;
				},
				data: {
					'forgetPage': 'login/forget'
				}
			});
		}

		function ChangeCaptcha(){
			$("#rand-img").attr('src', '/login/captcha_gen');
		}
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
			<div class="login-logo">
				<img src="<?=ASSETS_IMG?>logo.png" />
			</div>
			<!-- /.login-logo -->
			<div class="login-box-body">
				<h4 class="login-box-msg"><?=lang('login_sub_title') ?></h4>
				<form action="login" method="post">
					<div class="form-group has-feedback">
						<input type="text" name="user" class="form-control input-lg" placeholder="<?=lang('login_user_ph')?>">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" name="pass" class="form-control input-lg" placeholder="<?=lang('login_pw_ph')?>">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-8">
							<div class="form-group has-feedback">
								<input type="number" name="captcha" class="form-control input-lg" placeholder="<?=lang('login_cap_ph')?>">
								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							</div>
						</div>
						<div class="col-xs-4">
							<a onclick="ChangeCaptcha();" style="cursor:pointer;"><img src="/login/captcha_gen" id="rand-img"></a>  
						</div>
					</div>
					<div class="row">
						<div class="col-xs-8">
							<div class="checkbox icheck">
								<label>
									<input type="checkbox">
									<?=lang('login_rem_me')?>
								</label>
							</div>
						</div>
						<!-- /.col -->
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-block btn-primary btn-lg"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;
								<?=lang('login_sign_in')?>
							</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				<br>
				<div class="social-auth-links text-center">
			<!--<p>- OR -</p>
		  <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
		  <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>-->
		</div>
		<!-- /.social-auth-links -->
		<h4><a onclick="showFgDialog()" class="text-aqua" style="cursor:pointer;"><ins><?=lang('login_foget')?></ins></a></h4>
		<h4><a href="reg?id=200001" class="text-center text-aqua"><ins><?=$this->lang->line('login_reg_ib')?></ins></a></h4>
		<!--<h4><a href="/account/adviser_register" class="text-center text-aqua"><ins><?=$this->lang->line('msg8')?></ins></a></h4>-->
	</div>
	<!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>

</html>
