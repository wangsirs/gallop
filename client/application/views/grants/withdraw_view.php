<script>
$(document).ready(function() {
   $('select[name="mt4_id"]').change(function(){
      $('input[name="available-quota"]').val($('option:selected', this).attr('left'));
   });
   $("form.withdraw").validate({
      rules: {
         amount: {
            required: true,
            number: true
         }
      },
      messages: {
         amount: '請填寫金額'
      },
      errorPlacement: function(error, elem) {
         if (elem.siblings().hasClass('input-group-addon')) {
            elem.closest('.input-group').after(error);
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
                  location.href = '/grants/withdraw_otp';
               } else {
                  BootstrapDialog.alert({
                     title: '失敗訊息',
                     type: BootstrapDialog.TYPE_DANGER,
                     message: '出金程序失敗！',
                     callback: function(result) {}
                  });
               }
            },
            error: function() {
               BootstrapDialog.alert({
                  title: 'Message',
                  message: '出金程序失敗，請聯絡客服處理！',
                  callback: function(result) {}
               });
               $('body').unmask();
            }
         })
      }
   })
});
</script>
<!-- Full Width Column -->
<div class="content-wrapper">
   <div class="container container-v-center">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
         <form class="form-horizontal withdraw" action="/grants/withdraw" method="post" novalidate="novalidate">
            <div class="box box-primary">
               <div class="box-header">
                  <h3><a><span class="fa fa-credit-card"></span>
                            出金申請</a></h3>
               </div>
               <div class="box-body">
                  <div class="form-group">
                     <label for="" class="col-sm-2 control-label">帳號</label>
                     <div class="col-sm-10">
                        <select name="mt4_id" class="form-control">
                           <?php 
                           $first_item_bal =0;
                           if( ! empty($mt4s)){foreach ($mt4s as $count => $mt4):
                                 if($count == 0){
                                    $first_item_bal = $mt4['balance'];
                                 }
                              ?>
                           <option value="<?=$mt4['mt4_id']?>" left="<?=$mt4['balance']?>">
                              <?=$mt4['mt4_id']?>
                                    <?=empty($mt4['note']) ? '' : '('.$mt4['note'].')'?>
                           </option>
                           <?php endforeach;} ?>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="col-sm-2 control-label">餘額</label>
                     <div class="col-sm-10">
                        <input type="text" name="available-quota" class="form-control" readonly value="<?=$first_item_bal?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="col-sm-2 control-label">提領利息</label>
                     <div class="col-sm-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-dollar"></i>
                           </div>
                           <input type="number" name="amount" class="form-control" id="wdAmt" placeholder="(請勿包含逗號及$符號)">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="col-sm-2 control-label">出金附言</label>
                     <div class="col-sm-10">
                        <textarea class="form-control" name="note" rows="10" placeholder="留言..."></textarea>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="col-sm-2 control-label">出金方式</label>
                     <div class="col-sm-10">
                        <select class="form-control" name="type">
                           <option value="1">銀聯</option>
                           <option value="2">銀聯</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="box-footer">
                  <button type="submit" class="btn btn-info pull-right send"><span class="glyphicon glyphicon-plus"></span>&nbsp;確定送出</button>
               </div>
            </div>
         </form>
      </section>
      <!-- /.content -->
   </div>
   <!-- /.container -->
</div>
