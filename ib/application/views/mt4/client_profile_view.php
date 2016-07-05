<script>
$(document).ready(function() {
});
</script>
<section class="content">
   <div class="box box-info">
      <div class="box-header with-border">
         <h3 class="box-title">帳戶資料</h3>
         <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
         </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
         <div class="row">
            <div class="col-sm-6">
               <div class="form-group">
                  <label>帳號</label>
                  <input id="loginID" name="loginID" class="form-control" type="text" value="<?=$info['user_id']?>" disabled>
               </div>
               <!-- /.form-group -->
            </div>
            <div class="col-sm-6">
               <div class="form-group">
                  <label>開戶日期</label>
                  <input id="lastName" name="lastName" class="form-control " type="text" value="<?=$info['ctime']?>" disabled>
               </div>
               <!-- /.form-group -->
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <div class="form-group">
                  <label>帳戶類型</label>
                  <input id="ppName" name="ppName" class="form-control " type="text" value="VIP帳戶" disabled>
               </div>
               <!-- /.form-group -->
            </div>
            <div class="col-sm-6">
               <div class="form-group">
                  <label>開戶方式</label>
                  <input id="ppName" name="ppName" class="form-control " type="text" value="個人帳戶" disabled>
               </div>
               <!-- /.form-group -->
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <div class="form-group">
                  <label>帳戶狀態</label>
                  <input id="pw" name="pw" class="form-control" type="text" value="<?=($info['approve'] == '1')?'正常戶': '未開戶'?>" disabled>
               </div>
               <!-- /.form-group -->
            </div>
         </div>
      </div>
      <!-- /.row -->
   </div>
</section>
<section class="content">
   <div class="box box-info">
      <div class="box-header with-border">
         <h3 class="box-title">基本資料</h3>
         <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
         </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
         <div class="row">
            <div class="col-sm-6">
               <div class="form-group">
                  <label>客戶姓名</label>
                  <input id="loginID" name="loginID" class="form-control" type="text" value="<?=$info['first_name'].' '.$info['last_name']?>" disabled>
               </div>
               <!-- /.form-group -->
            </div>
            <div class="col-sm-6">
               <div class="form-group">
                  <label>性別</label>
                  <input id="lastName" name="lastName" class="form-control " type="text" value="<?=$info['gender'] == '1' ? '女' : '男'?>" disabled>
               </div>
               <!-- /.form-group -->
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <div class="form-group">
                  <label>國籍</label>
                  <input id="ppName" name="ppName" class="form-control " type="text" value="地球人" disabled>
               </div>
               <!-- /.form-group -->
            </div>
            <div class="col-sm-6">
               <div class="form-group">
                  <label>身分證或護照</label>
                  <input id="ppName" name="ppName" class="form-control " type="text" value="<?=$info['passport']?>" disabled>
               </div>
               <!-- /.form-group -->
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <div class="form-group">
                  <label>出生日期</label>
                  <input name="birth" class="form-control" type="text" value="<?=$info['birthday']?>" disabled>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group">
                  <label>銀行帳號</label>
                  <input name="bank_id" class="form-control" type="text" disabled>
               </div>
            </div>
         </div>
         <!-- /.row -->
         <div class="row">
            <div class="col-sm-6">
               <div class="form-group">
                  <label>居住電話號碼</label>
                  <input name="phone" class="form-control" type="text" value="<?=$info['phone']?>" disabled>
               </div>
            </div>
            <!-- /.form-group -->
         </div>
         <div class="row">
            <div class="col-sm-12">
               <label>手機電話號碼</label>
            </div>
            <div class="col-sm-6">
               <div class="form-group">
                  <input name="mobile_phone" class="form-control" type="text" value="<?=$info['cell_phone']?>" disabled>
               </div>
            </div>
            <div class="col-sm-4">
               <div class="form-group">
                  <button type="button" class="btn btn-warning" onclick="location.href='tel:<?=$info['cell_phone']?>'">撥號</button>
                  <button type="button" class="btn btn-warning" onclick="location.href='sms:<?=$info['cell_phone']?>'">簡訊</button>
               </div>
            </div>
            <!-- /.form-group -->
         </div>
         <div class="row">
            <div class="col-sm-12">
               <label>電子郵件信箱</label>
            </div>
            <div class="col-sm-6">
               <div class="form-group">
                  <input name="email" class="form-control" type="text" value="<?=$info['email']?>" disabled>
               </div>
            </div>
            <div class="col-sm-4">
               <div class="form-group">
                  <button type="button" class="btn btn-warning" onclick="location.href='mailto:<?=$info['email']?>'">發信</button>
               </div>
            </div>
            <!-- /.form-group -->
         </div>
      </div>
   </div>
</section>
