	<?php
//		$this->minify->js(array(
//            'js/jquery.validate.js',
//            'js/bootstrap-dialog.js'));
	?>
   <!-- Page script -->
   <script>
   $().ready(function() {
      LoadGeneral();

        $.validator.addMethod(
            "regExp",
            function(value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);
            },
            "密碼組合至少為8位字符，包含1個大寫字母、1個小寫字母和1個數字"
        );

      $("form.changePw").validate({
         
         rules: {
            oldPw: {
               required: true
            },
            newPw: {
               required: true,
               minlength: 8,
               regExp: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
            },
            newPwConf: {
               equalTo: "#newPw"
            },
         },
         /* 提交callback handler */
         submitHandler: function(formElem) {
            $.ajax({
               url: formElem.action,
               type: formElem.method,
               data: $(formElem).serialize(),
               dataType: 'json',
               success: function(resp) {
            /* success callback, 若status=true代表密碼更改成功*/
                  if (resp.status === true) {
                     BootstrapDialog.alert({
                        title: '成功訊息',
                        type: BootstrapDialog.TYPE_SUCCESS,
                        message: '密碼更改成功，請重新登入!',
                        callback: function(result) {
                           if (result) {
                              window.location.href = '/';
                           }
                        }
                     });
                  } else {
                     BootstrapDialog.alert({
                        title: '失敗訊息',
                        type: BootstrapDialog.TYPE_DANGER,
                        message: '密碼更改失敗，請確認輸入資料無誤!',
                        callback: function(result) {
                           if (result) {
                              window.location.href = '/';
                           }
                        }
                     });
                  }
               },
               error: function() {
                  BootstrapDialog.alert({
                     title: 'Message',
                     message: '更改密碼程序失敗，請聯絡工程師處理!',
                     callback: function(result) {
                        if (result) {
                           window.location.href = '/';
                        }
                     }
                  });
               }
            })
         }
      })
   });
   </script>
      <!-- Main content -->
      <section class="content">
         <div class="row">
            <div class="col-xs-12">
               <!-- /.box-header -->
               <div class="box box-info">
                  <div class="box-header with-border">
                     <h3 class="box-title"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;<?=$page_title?></h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal changePw" action="<?=$app?>/account/change_pw_conf" method="post">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">帳號</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="account" placeholder="<?=$username?>" disabled="true">
                           </div>
                        </div>
                        <div class="form-group has-warning">
                           <label for="inputEmail3" class="col-sm-2 control-label">舊密碼</label>
                           <div class="col-sm-10">
                              <input type="password" class="form-control" name="oldPw" placeholder="舊密碼">
                           </div>
                        </div>
                        <div class="form-group has-success">
                           <label for="inputPassword3" class="col-sm-2 control-label">新密碼</label>
                           <div class="col-sm-10">
                              <input type="password" class="form-control" id="newPw" name="newPw" placeholder="新密碼">
                           </div>
                        </div>
                        <div class="form-group has-success">
                           <label for="inputPassword3" class="col-sm-2 control-label">確認密碼</label>
                           <div class="col-sm-10">
                              <input type="password" class="form-control" name="newPwConf" placeholder="確認密碼">
                           </div>
                        </div>
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">確認修改</button>
                     </div>
                     <!-- /.box-footer -->
                  </form>
               </div>
               <!-- /.box-body -->
               <!-- /.box -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </section>