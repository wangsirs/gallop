<?php
//    $this->minify->css(array(
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.css'));

//    $this->minify->js(array(
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.min.js',
//        'js/jquery.validate.js',
//        'js/bootstrap-dialog.js'));
//    echo $this->minify->deploy_js(FALSE, $assets_name.'.js');
?>
<script type="text/javascript">
$().ready(function() {
   $("form.withdraw_otp").validate({
      rules: {
         otp: {
            required: true,
            number: true
         }
      },
      /* 提交callback handler */
      submitHandler: function(formElem) {
         $('body').mask('處理中...');
         $.ajax({
            url: formElem.action + '?is_ajax=1',
            type: formElem.method,
            data: $(formElem).serialize(),
            dataType: 'json',
            success: function(resp) {
               $('body').unmask();
               /* success callback, 若status=true代表密碼更改成功*/
               if (resp.status === true) {
                  BootstrapDialog.alert({
                     title: '成功訊息',
                     type: BootstrapDialog.TYPE_SUCCESS,
                     message: '出金程序成功！',
                     callback: function(result) {
                        location.href = '/';
                     }
                  });
               } else {
                  BootstrapDialog.alert({
                     title: '失敗訊息',
                     type: BootstrapDialog.TYPE_DANGER,
                     message: '出金程序失敗！',
                     callback: function(result) {
                        location.href = '/';
                     }
                  });
               }
            },
            error: function() {
               $('body').unmask();
               BootstrapDialog.alert({
                  title: 'Message',
                  message: '出金程序失敗，請聯絡客服處理！',
                  callback: function(result) {
                     location.href = '/';
                  }
               });
            }
         })
      }
   });

   function GetCount(leftSecs, iid) {
      if (leftSecs < 0) { //過了該時間
         location.href = '/';
      } else { //時間還沒到
         out = "";
         copyLeft = leftSecs;
         mins = Math.floor(copyLeft / 60); //分
         secs = Math.floor(copyLeft % 60); //秒
         out += mins + "分";
         out += secs + "秒";

         $(iid).text(out);
         setTimeout(function() {
            GetCount(--leftSecs, iid)
         }, 1000);
      }
   }

   window.onload = function() {
      GetCount(600, '.leftTime');
   };
});
</script>
<!-- Full Width Column -->
<div class="content-wrapper">
   <div class="container container-v-center">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
         <form class="form-horizontal withdraw_otp" action="/mt4/withdraw_otp" method="post" novalidate="novalidate">
            <div class="box box-primary">
               <div class="box-header">
                  OTP簡訊認證
               </div>
               <div class="box-body">
                  <div class="row">
                     <div class="col-sm-6">
                        <dlv class="input-group margin">
                           <div class="input-group-btn">
                              <button type="button" class="btn btn-danger">設定日期</button>
                           </div>
                           <input type="text" class="form-control" value="2016/01/01" disabled="disabled">
                     </div>
                     <div class="col-sm-6">
                        <dlv class="input-group margin">
                           <div class="input-group-btn">
                              <button type="button" class="btn btn-danger">生效日期</button>
                           </div>
                           <input type="text" class="form-control" value="2016/01/01" disabled="disabled">
                        </dlv>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <dlv class="input-group margin">
                           <div class="input-group-btn">
                              <button type="button" class="btn btn-danger">轉出帳號</button>
                           </div>
                           <input type="text" class="form-control" value="88880000" disabled="disabled">
                     </div>
                     <div class="col-sm-6">
                        <dlv class="input-group margin">
                           <div class="input-group-btn">
                              <button type="button" class="btn btn-danger">轉入帳號</button>
                           </div>
                           <input type="text" class="form-control" value="88880001" disabled="disabled">
                        </dlv>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <dlv class="input-group margin">
                           <div class="input-group-btn">
                              <button type="button" class="btn btn-danger">轉帳金額</button>
                           </div>
                           <input type="text" class="form-control" value="10000" disabled="disabled">
                     </div>
                     <div class="col-sm-6">
                        <dlv class="input-group margin">
                           <div class="input-group-btn">
                              <button type="button" class="btn btn-danger">手續費</button>
                           </div>
                           <input type="text" class="form-control" value="100" disabled="disabled">
                        </dlv>
                     </div>
                  </div>
                  <br>
                  <div class="panel panel-default">
                     <div class="panel-body panel-body-enlarge">
                        <div class="form-group">
                           <label for="" class="col-sm-4 control-label">輸入您接收到的OTP密碼(四碼)</label>
                           <div class="col-sm-5">
                              <input type="number" name="otp" class="form-control" id="wdAmt" placeholder="">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="" class="col-sm-4 control-label"></label>
                           <label for="" class="col-sm-5">簡訊OTP密碼有效時間尚餘<span class="leftTime text-red"></span></label>
                        </div>
                        <div class="form-group">
                           <label for="" class="col-sm-12 text-red">*提醒您！簡訊OTP密碼5分鐘有效，請於時間內將簡訊中的密碼輸入於欄位中，若逾時未輸入，視同交易取消，謝謝！</label>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="box-footer">
                  <button type="submit" class="btn btn-info pull-right send">確定送出</button>
               </div>
            </div>
         </form>
      </section>
      <!-- /.content -->
   </div>
   <!-- /.container -->
</div>
