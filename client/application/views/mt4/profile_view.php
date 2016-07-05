<script>
    $(document).ready(function(){
        $('.view-pw')
        .click(function(){
            $(this)
            .closest('.row')
            .find('input[name="read_password"]')
            .attr('type', 'text')
            .delay(10000)
            .queue(function(){
              $(this)
              .attr('type','password')
              .dequeue();
            });
        })
    });
</script>
<!-- Full Width Column -->
<div class="content-wrapper">
   <div class="container">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
         <div class="box box-info">
            <div class="box-header with-border">
              <a><h3 class="box-title"><span class="fa fa-bank"></span>&nbsp;帳戶資料</h3></a>
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
                        <input id="lastName" name="lastName" class="form-control " type="text" value="2016/01/01" disabled>
                     </div>
                     <!-- /.form-group -->
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>開戶方式</label>
                        <input id="ppName" name="ppName" class="form-control " type="text" value="個人帳戶" disabled>
                     </div>
                     <!-- /.form-group -->
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>帳戶狀態</label>
                        <input id="pw" name="pw" class="form-control" type="text" value="正常戶" disabled>
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
               <a><h3 class="box-title"><span class="fa fa-user"></span>&nbsp;基本資料</h3></a>
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
                        <input class="form-control " type="text" value="<?=$info['country']?>" disabled>
                     </div>
                     <!-- /.form-group -->
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>身分證或護照號碼</label>
                        <input id="ppName" name="ppName" class="form-control " type="text" value="<?=$info['passport']?>" disabled>
                     </div>
                     <!-- /.form-group -->
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>出生日期</label>
                        <input class="form-control" type="text" value="<?=$info['birthday']?>" disabled>
                     </div>
                     <!-- /.form-group -->
                  </div>
                <div class="col-sm-6">
                   <div class="form-group">
                      <label>銀行帳號</label>
                      <input name="bank_id" class="form-control" type="text" disabled>
                   </div>
                </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label>居住地址</label>
                        <input class="form-control" type="text" value="<?=$info['address']?>" disabled>
                     </div>
                     <!-- /.form-group -->
                  </div>
               </div>
             <div class="row">
                <div class="col-sm-6">
                   <div class="form-group">
                      <label>居住電話號碼</label>
                      <input name="phone" class="form-control" type="text" value="<?=$info['phone']?>" disabled>
                   </div>
                </div>
                <div class="col-sm-6">
                   <div class="form-group">
                      <label>手機電話號碼</label>
                      <input name="mobile_phone" class="form-control" type="text" value="<?=$info['cell_phone']?>" disabled>
                   </div>
                </div>
             </div>
             <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label>電子郵件信箱</label>
                        <input class="form-control" type="text" value="<?=$info['email']?>" disabled>
                     </div>
                     <!-- /.form-group -->
                  </div>
               </div>
            </div>
            <!-- /.row -->
         </div>
      </section>
      <section id="list" class="content">
         <div class="box box-info">
            <div class="box-header with-border">
               <a><h3 class="box-title">&nbsp;MT4</h3></a>
               <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
               </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php if(!empty($mt4s)){foreach($mt4s as $mt4):?>
               <div class="row">
                  <div class="col-sm-2">
                     <label>MT4帳號</label>
                     <input name="loginID" class="form-control" type="text" value="<?=$mt4['mt4_id']?>" disabled>
                  </div>
                  <div class="col-sm-2">
                     <label>跟單帳號</label>
                     <input name="follow" class="form-control" type="text" value="<?=$mt4['follow']?>" disabled>
                  </div>
                  <div class="col-sm-2">
                     <label>槓桿比例</label>
                     <input name="leverage" class="form-control" type="text" value="1:<?=$mt4['leverage']?>" disabled>
                  </div>
                  <div class="col-sm-2">
                     <label>餘額</label>
                     <input name="balance" class="form-control" type="numbr" value="<?=round($mt4['balance'], BAL_DIGITS);?>" disabled>
                  </div>
                  <div class="col-sm-2">
                     <label>MT4觀看密碼</label>
                     <input name="read_password" class="form-control" type="password" value="<?=$mt4['pw_read']?>" readonly>
                  </div>
                  <div class="col-sm-2">
                     <label></label>
                     <button class="btn btn-block btn-primary view-pw">查看</button>
                  </div>
               </div>
            <?php endforeach;}?>
            </div>
            <!-- /.row -->
         </div>
      </section>
      <!-- /.content -->
   </div>
   <!-- /.container -->
</div>
