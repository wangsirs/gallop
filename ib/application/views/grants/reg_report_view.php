   <!-- Date Picker -->
   <link rel="stylesheet" href="<?=ASSETS_JS?>thirdParty/plugins/datepicker/datepicker3.css">
   <!-- datepicker -->
   <script src="<?=ASSETS_JS?>thirdParty/plugins/datepicker/bootstrap-datepicker.js"></script>
   <script src="<?=ASSETS_JS?>jquery.validate.js"></script>
   <!-- Page script -->
   <script>
   $().ready(function() {
         LoadGeneral();
      $("#ctime").datepicker({
         format: 'yyyy/mm/dd',
         autoclose: true,
      });

      $("form.openAct").validate({
         rules: {
            first_name: {
               required: true
            },
            last_name: {
               required: true
            },
            id_number: {
               required: true
            },
            ctime: {
               required: true
            },
            quote: {
               required: true,
               number: true
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
                     <h3 class="box-title"><span class="glyphicon glyphicon-check"></span>&nbsp;&nbsp;<?=$page_title?></h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal openAct" action="/account/open_act_confirm" method="post">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">報備顧問</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="account" placeholder="<?=$username?>" disabled="true">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">客戶姓名</label>
                           <div class="col-sm-10">
                              <div class="input-group">
                                 <span class="input-group-addon">姓</span>
                                 <input type="text" id="first_name" name="first_name" class="form-control" placeholder="姓">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="" class="col-sm-2 control-label"></label>
                           <div class="col-sm-10">
                              <div class="input-group">
                                 <span class="input-group-addon">名字</span>
                                 <input type="text" id="last_name" name="last_name" class="form-control" placeholder="名字">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="" class="col-sm-2 control-label">客戶身分證字號</label>
                           <div class="col-sm-10">
                              <input type="text" id="id_number" name="id_number" class="form-control" id="account" placeholder="身分證字號">
                           </div>
                        </div>
                        <div class="form-group date">
                           <label for="" class="col-sm-2 control-label">開戶日期</label>
                           <div class="col-sm-10">
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                 </div>
                                 <input type="text" id="ctime" name="ctime" class="form-control" placeholder="開戶日">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="" class="col-sm-2 control-label">開戶金額</label>
                           <div class="col-sm-10">
                              <div class="input-group">
                                 <span class="input-group-addon">$USD</span>
                                 <input type="number" id="quote" name="quote" class="form-control" placeholder="金額">
                              </div>
                           </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                           <button type="submit" class="btn btn-info pull-right">確定送出</button>
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
      <!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>