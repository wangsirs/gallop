<?php
//    $this->minify->css(array(
//        'js/thirdParty/plugins/datatables/dataTables.bootstrap.css',
//        'js/thirdParty/plugins/iCheck/flat/blue.css',
//        'js/thirdParty/plugins/iCheck/minimal/blue.css',
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.css'));

//    $this->minify->js(array(
//        'js/thirdParty/plugins/datatables/jquery.dataTables.min.js',
//        'js/thirdParty/plugins/datatables/dataTables.bootstrap.min.js',
//        'js/thirdParty/plugins/iCheck/icheck.min.js',
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.min.js',
//        'js/jquery.validate.js',
//        'js/bootstrap-dialog.js'));
//    echo $this->minify->deploy_js(FALSE, $assets_name.'.js');
?>
<script>
$(document).ready(function() {
   //iCheck for checkbox and radio inputs
   $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
   });
    //手機板data-table功能與版面調整
    table_dict = (isMobileDev()) ? {
        "scrollX": true,
        "bFilter": true,
        "bLengthChange": false
    } : {};
   $("#clientTable").DataTable(table_dict);
   $('form.sub_mt4').validate({
      rules: {
         leverage: {
            required: true
         }
      },
      messages: {
         leverage: '此為必填欄位'
      },
      submitHandler: function(formElem) {
         BootstrapDialog.show({
            title: '確認訊息',
            type: BootstrapDialog.TYPE_WARNING,
            message: '您確定要申請MT4子帳號？',
            buttons: [{
               label: '確定',
               cssClass: 'btn-primary',
               icon: 'glyphicon glyphicon-ok',
               action: function(dialog) {
                  nextStep(formElem);
                  dialog.close();
               }
            }, {
               label: '取消',
               cssClass: 'btn-danger',
               icon: 'glyphicon glyphicon-remove',
               action: function(dialog) {
                  dialog.close();
               }
            }]
         });
      }
   });

   function nextStep(formElem) {
      $('body').mask('處理中');
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
                     message: '子帳號申請程序成功，請等待行政單位核准！',
                     callback: function(result) {}
                  });
               } else {
                  BootstrapDialog.alert({
                     title: '成功訊息',
                     type: BootstrapDialog.TYPE_ERROR,
                     message: '子帳號申請程序失敗！',
                     callback: function(result) {}
                  });
               }
            }
         }
      });
   }
});
</script>
<!-- Full Width Column -->
<div class="content-wrapper">
   <div class="container container-v-center">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
         <div class="box box-primary">
            <div class="box-header">
               <h4><a><span class="fa fa-users"></span>
               子帳號申請</a></h4>
            </div>
            <div class="box-footer">
               <form class="sub_mt4" action="/mt4/sub_mt4" method="post">
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label></label>
                           <input type="checkbox" class="minimal gallopRule" name="follow_auth" value="1">
                           <ins class="iCheck-helper"></ins>
                           授權第三方管理我的帳戶
                           <div class="errorMsg"></div>
                        </div>
                        <!-- /.form-group -->
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>請填管理者MT4帳號</label>
                           <input name="follow" class="form-control" type="number">
                        </div>
                        <!-- /.form-group -->
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>*請選擇槓桿比例</label>
                           <select name="leverage" id="leverage" class="form-control">
                              <option value="" selected="selected"></option>
                              <option value="500">1:500</option>
                              <option value="400">1:400</option>
                              <option value="300">1:300</option>
                              <option value="200">1:200</option>
                              <option value="100">1:100</option>
                              <option value="50">1:50</option>
                              <option value="10">1:10</option>
                              <option value="1">1:1</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>註記</label>
                           <input name="note" class="form-control" type="text" maxlength="64">
                        </div>
                        <!-- /.form-group -->
                     </div>
                     <!-- /.form-group -->
                  </div>
                  <div class="row">
                     <div class="col-sm-9">
                        <div class="form-group">
                           <p class="text-red"> *子帳號的MT4預設密碼為登入密碼+出生日期4碼</p>
                        </div>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-sm-3">
                        <div class="form-group">
                           <button class="btn btn-success change_mt4_pw"><span class="glyphicon glyphicon-plus"></span>提交子帳號申請</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <div class="box-footer">
               <table id="clientTable" class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>申請日期</th>
                        <th>子帳戶帳號</th>
                        <th>狀態</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if( ! empty($mt4s)){foreach ($mt4s as $num => $item):
                            // Omit when non-child
                            if($item['is_child'] == 0){
                              continue;
                            }
                            ?>
                     <tr>
                        <td>
                           <?=$item['ctime'];?>
                        </td>
                        <td>
                           <?=$item['mt4_id'];?>
                        </td>
                        <td>
                           <?php switch($item['approve']){
                               case '0': echo '<span class="label label-warning">審核中</span>';break;
                               case '1': echo '<span class="label label-success">已核准</span>';break;
                               case '2': echo '<span class="label label-danger">否決</span>';break;
                           }?>
                        </td>
                     </tr>
                     <?php endforeach;} ?>
                  </tbody>
               </table>
            </div>
         </div>
      </section>
      <!-- /.content -->
   </div>
   <!-- /.container -->
</div>
