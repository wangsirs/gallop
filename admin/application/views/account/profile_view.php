   <script src="<?=ASSETS_JS?>jquery.validate.js"></script>
   <script src="<?=ASSETS_JS?>bootstrap-dialog.js"></script>
   <!-- Page script -->
   <script>
   $().ready(function() {
      LoadGeneral();
      // $('#phone, #mobilePhone').inputmask();
      $("form.changePw").validate({
         rules: {
            oldPw: {
               required: true
            },
            newPw: {
               required: true,
               minlength: 5
            },
            newPwConf: {
               required: true,
               equalTo: "#newPw",
               minlength: 5
            }
         },
         /* 提交callback handler */
         submitHandler: function(formElem) {
            $.ajax({
               url: formElem.action,
               type: formElem.method,
               data: $(formElem).serialize(),
               dataType: 'json',
               success: function(resp) {
                  if (resp.status == 0) {
                     BootstrapDialog.alert({
                        title: 'Message',
                        message: '密碼更改成功!!',
                        callback: function(result) {
                           if (result) {
                              window.location.href = '/';
                           }
                        }
                     });
                  } else {
                     BootstrapDialog.alert({
                        title: 'Message',
                        message: '密碼更改失敗!!',
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
                  <form class="form-horizontal changePw" action="<?=$app?>/account/profile_conf" method="post">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="account" value="<?=$first_name?> <?=$last_name?>" disabled="true">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">狀態</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="account" value="" disabled="true">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">出生日期</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="account" value="<?=$birthday?>" disabled="true">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">身分證或護照號碼</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="account" value="<?=$passport?>" disabled="true">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">報聘單位(代號)</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="account" value="" disabled="true">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">編號</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="account" value="<?=$ib_id?>" disabled="true">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">居住城市</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="account" value="<?=$state?> <?=$city?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">居住地址</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="account" value="<?=$address?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">聯絡電話</label>
                           <div class="col-sm-10">
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                 </div>
                                  <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999999999999999&quot;" data-mask="" id="phone" value="<?=$phone?>">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">行動電話</label>
                           <div class="col-sm-10">
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                 </div>
                                  <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999999999999999&quot;" data-mask="" id="mobilePhone" value="<?=$cell_phone?>">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">郵政編碼</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="account" value="<?=$zip?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">E-MAIL</label>
                           <div class="col-sm-10">
                              <input type="email" class="form-control" id="account" placeholder="E-MAIL" value="<?=$email?>">
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
      <!-- /.content -->
   </div>