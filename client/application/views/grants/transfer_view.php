<script>
$(document).ready(function() {
   $('select[name="mt4_id"]').change(function(){
      $('input[name="available-quota"]').val($('option:selected', this).attr('left'));
   });

   $('form').validate({
      rules: {
         mt4_id: {
            required: true
         },
         target_mt4_id: {
            required: true
         },
         amount: {
            required: true
         },
         mt4_pw: {
            required: true
         }
      },
      messages: {
         mt4_id: '此為必填欄位',
         target_mt4_id: '此為必填欄位',
         amount: '此為必填欄位',
         mt4_pw: '此為必填欄位'
      },
      errorPlacement: function(error, elem) {
         if (elem.siblings().hasClass('input-group-addon')) {
            elem.closest('.input-group').after(error);
         }else{
             elem.after(error);
         }
      },
      submitHandler: function(formElem) {
         var withdraw = $('input[name="amount"]').val(),
         available = $('input[name="available-quota"]').val();
         if(isNaN(withdraw) || isNaN(available)){
            return false;
         }else{
            if(parseInt(withdraw) > parseInt(available)){
               BootstrapDialog.alert({
                  title: '轉帳失敗',
                  type: BootstrapDialog.TYPE_DANGER,
                  message: '轉帳金額不得超過可提領金額！',
                  callback: function(result) {}
               });
               return false;
            }
            if(parseInt(withdraw) < 0){
               BootstrapDialog.alert({
                  title: '轉帳失敗',
                  type: BootstrapDialog.TYPE_DANGER,
                  message: '轉帳金額不得小於0！',
                  callback: function(result) {}
               });
               return false;
            }
         }

         $.ajax({
            url: formElem.action,
            type: formElem.method,
            data: $(formElem).serialize(),
            dataType: 'json',
            success: function(resp) {
               $('body').unmask();
               if (resp.hasOwnProperty('status')) {
                  if (resp.status === true) {
                     BootstrapDialog.alert({
                        title: '成功訊息',
                        type: BootstrapDialog.TYPE_SUCCESS,
                        message: '帳戶互轉資金程序成功！',
                        callback: function(result) {
                           location.href = '/mt4/transfer';
                        }
                     });
                  } else {
                     BootstrapDialog.alert({
                        title: '轉帳失敗',
                        type: BootstrapDialog.TYPE_DANGER,
                        message: '帳戶互轉資金程序失敗！',
                        callback: function(result) {
                           location.href = '/mt4/transfer';
                        }
                     });
                  }
               }
            }
         });
      }
   });
});
</script>
<!-- Full Width Column -->
<div class="content-wrapper">
   <div class="container container-v-center">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
         <form class="form-horizontal transfer" action="/mt4/transfer" method="post" novalidate="novalidate">
            <div class="box box-primary">
               <div class="box-header">
                  <ul class="nav pull-left ui-sortable-handle">
                     <li class="pull-left header text-light-blue">
                        <h3><i class="fa fa-bank"></i>&nbsp;帳戶互轉</h3></li>
                  </ul>
               </div>
               <div class="box-body">
                  <div class="form-group">
                     <label for="" class="col-sm-2 control-label">轉出MT4帳號</label>
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
                                 <?=($mt4['is_child'] == '0') ? '[主帳號]' : ''?>
                                    <?=empty($mt4['note']) ? '' : '('.$mt4['note'].')'?>
                           </option>
                           <?php endforeach;} ?>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="col-sm-2 control-label">可提領金額</label>
                     <div class="col-sm-10">
                        <input type="text" name="available-quota" class="form-control" readonly value="<?=$first_item_bal?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="col-sm-2 control-label">轉帳金額</label>
                     <div class="col-sm-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-dollar"></i>
                           </div>
                           <input type="number" name="amount" class="form-control" placeholder="(請勿包含逗號及$符號)">
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
                     <label for="" class="col-sm-2 control-label">轉入MT4帳號</label>
                     <div class="col-sm-10">
                        <select name="target_mt4_id" class="form-control">
                           <?php if( ! empty($mt4s)){foreach ($mt4s as $mt4):?>
                           <option value="<?=$mt4['mt4_id']?>">
                              <?=$mt4['mt4_id']?>
                                 <?=($mt4['is_child'] == '0') ? '[主帳號]' : ''?>
                                    <?=empty($mt4['note']) ? '' : '('.$mt4['note'].')'?>
                           </option>
                           <?php endforeach;} ?>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="box-footer">
                  <button type="submit" class="btn btn-info pull-right">確定送出</button>
               </div>
            </div>
         </form>
      </section>
      <!-- /.content -->
   </div>
   <!-- /.container -->
</div>
