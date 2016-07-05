<?php
//    $this->minify->css(array(
//        'js/thirdParty/plugins/iCheck/flat/blue.css',
//        'js/thirdParty/plugins/iCheck/minimal/blue.css'));
//
//    $this->minify->js(array(
//        'js/thirdParty/plugins/iCheck/icheck.min.js'));
//    echo $this->minify->deploy_js(FALSE, $assets_name.'.js');
?>
<link rel="stylesheet" href="<?=ASSETS_CUSTOM_CSS?>gallop.min.css">
<script>
$(document).ready(function() {
    //iCheck for all / date-range
    $('input[type="radio"][name="r1"]')
        .iCheck({
            radioClass: 'iradio_minimal-blue'
        });
   $("form.funding").validate({
      rules: {
         amount: {
            required: true,
            number: true
         },
         mt4_id:{
            required: true
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
                  BootstrapDialog.alert({
                     title: '成功訊息',
                     type: BootstrapDialog.TYPE_SUCCESS,
                     message: '出金程序成功！',
                     callback: function(result) {
                      location.href = '/grants/funding';
                     }
                  });
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
<div class="content-wrapper">
    <div class="container">
        <section class="invoice">
            <form class="form-horizontal funding" action="/grants/funding" method="post" novalidate="novalidate">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                <i class="fa fa-bank"></i> 銀行匯款
              </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                    <a><h4><p class="txt-red">步驟1:銀行匯款</p></h4></a>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table funding-step">
                                <tbody>
                                    <tr>
                                        <td> 國際匯款識別碼（SWIFT CODE）：</td>
                                        <td>CTBAAU2S</td>
                                    </tr>
                                    <tr>
                                        <td> 受款銀行（BENEFICIARY BANK）：</td>
                                        <td>COMMONWEALTH BANK , AUSTRALIA</td>
                                    </tr>
                                    <tr>
                                        <td> BSB：</td>
                                        <td>062-005</td>
                                    </tr>
                                    <tr>
                                        <td> 帳戶名稱（A/C NAME）：</td>
                                        <td>GALLOP INTERNATIONAL GROUP PTY LTD</td>
                                    </tr>
                                    <tr>
                                        <td> 銀行地址 (ADD OF BANK)：</td>
                                        <td>George & Market St. , Sydney , NSW , 2000 Australia</td>
                                    </tr>
                                    <tr>
                                        <td> 帳戶號碼（A/C NO.）：</td>
                                        <td>1129 5564</td>
                                    </tr>
                                    <tr>
                                        <td> 備註：</td>
                                        <td>USD (美金帳戶) </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 invoice-col">
                    <a><h4><p class="txt-red">步驟2: 填寫銀行匯款資料</p></h4></a>
                </div>
                <!-- /.col -->
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                  <div class="form-group">
                  <div class="col-sm-12">
                     <label class="control-label">*MT4帳號</label>
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
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label class="control-label">*匯款人姓名</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="姓名">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="control-label">*存放金額</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input type="text" class="form-control" name="amount" placeholder="金額">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <label class="control-label">備註</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                                <input type="text" class="form-control" placeholder="留言...">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label class="control-label">匯款日期</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control" placeholder="yyyy/mm/dd">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="control-label">國家</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                <input type="text" class="form-control" placeholder="您的銀行所在國家">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label class="control-label">銀行帳號</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-bank"></i></span>
                                <input type="text" class="form-control" placeholder="帳號(不允許!#符號)">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="control-label">付款銀行</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-bank"></i></span>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label class="control-label"> 匯款人地址</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="control-label"> 付款銀行地址</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-bank"></i></span>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon" style="border:0px;"><input type="radio" name="r1" class="minimal" value="0"> *匯款水單</span>
                                <input type="file" style="border:0px;" class="form-control" name="upload">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon" style="border:0px;text-align:start;"><input type="radio" name="r1" class="minimal" value="0"> *匯款資料(未上傳匯款水單者請詳填，已上傳水單者免填)</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-info pull-right send"><i class="fa fa-check"></i> 確定送出</button>
                    <a href="<?=ASSETS_IMG?>Accounts_Funding_tw.png"><img src="<?=ASSETS_IMG?>Accounts_Funding_tw.png" alt="匯款內容" class="funding-content"></a>
                </div>
            </div>
            </form>
        </section>
    </div>
</div>
