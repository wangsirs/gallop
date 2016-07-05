<!--<script src="<?=ASSETS_JS?>jquery.validate.js"></script>
<script src="<?=ASSETS_JS?>bootstrap-dialog.js"></script>
<script src="<?=ASSETS_JS?>thirdParty/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=ASSETS_JS?>thirdParty/plugins/datatables/dataTables.bootstrap.min.js"></script>
 iCheck for checkboxes and radio inputs 
<link rel="stylesheet" href="<?=ASSETS_JS?>thirdParty/plugins/iCheck/all.css">
 iCheck 
<link rel="stylesheet" href="<?=ASSETS_JS?>thirdParty/plugins/iCheck/flat/blue.css">
 iCheck 1.0.1 
<script src="<?=ASSETS_JS?>thirdParty/plugins/iCheck/icheck.min.js"></script>
<link rel="stylesheet" href="<?=ASSETS_JS?>thirdParty/plugins/datatables/dataTables.bootstrap.css">-->
<!-- Page script -->
<script>
    $().ready(function() {
        LoadGeneral();
        $("table").DataTable(GetDataTableAttrs());
      //iCheck for all / date-range
      $('input[type="radio"][name="r1"]')
      .iCheck({
        radioClass: 'iradio_square-red'
    }).on('ifChecked',function(event){
        var $bonus_group = $('div.bonus-type-group');
        var filter_sel = '';
        if(this.value == 0){
            filter_sel = '.bank-group';
        }else if(this.value == 1){
            filter_sel = '.mt4-group';
        }else{
            filter_sel = '.union-pay-group';
        }
        $bonus_group
        .filter(filter_sel).fadeIn();
        $bonus_group
        .not(filter_sel).hide();
    });
});
</script>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="box no-border">
                <div class="box-header with-border">
                    <a><h3 class="box-title"><span class="fa fa-money"></span>&nbsp;&nbsp;<?=$page_title?></h3></a>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal changePw" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-sm-3"><strong>代理人帳號：</strong></div>
                            <div class="col-sm-9"><?=! empty($ib_id)? $ib_id:''?></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"><strong>姓名：</strong></div>
                            <div class="col-sm-9"><?=! empty($username)? $username:''?></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"><strong>方式：</strong></div>
                            <div class="col-sm-9">
                                <label class="">
                                    <div aria-checked="false" aria-disabled="false">
                                        <input type="radio" name="r1" class="minimal" value="0" checked>
                                        <ins class="iCheck-helper"></ins>
                                        <span class="filter_txt text-light-blue">銀行帳戶帳號</span>
                                    </div>
                                </label>
                                <label class="">
                                    <div aria-checked="false" aria-disabled="false">
                                        <input type="radio" name="r1" class="minimal" value="1">
                                        <ins class="iCheck-helper"></ins>
                                        <span class="filter_txt text-light-blue">MT4帳戶帳號</span>
                                    </div>
                                </label>
                                <label class="">
                                    <div aria-checked="false" aria-disabled="false">
                                        <input type="radio" name="r1" class="minimal" value="2">
                                        <ins class="iCheck-helper"></ins>
                                        <span class="filter_txt text-light-blue">銀聯支付</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"><strong>可提領金額：</strong></div>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" disabled="true">
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <div class="col-sm-3"><strong>*提款金額：</strong></div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" class="form-control">
                                    <div class="input-group-addon">
                                        <span>USD</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="union-pay-group bonus-type-group" style="display:none;">
                            <div class="form-group">
                                <div class="col-sm-3"><strong>*銀聯帳戶帳號：</strong></div>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mt4-group bonus-type-group" style="display:none;">
                            <div class="form-group">
                                <div class="col-sm-3"><strong>*MT4帳戶帳號：</strong></div>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="bank-group bonus-type-group">
                            <div class="form-group">
                                <div class="col-sm-3"><strong>*受款銀行：</strong></div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3"><strong>*受款人名稱：</strong></div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3"><strong>*受款人帳戶幣別：</strong></div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3"><strong>*國家：</strong></div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3"><strong>*國際匯款代碼：</strong></div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"><strong>補充意見：</strong></div>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="4" placeholder="留言..."></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-plus">&nbsp;提交</span></button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box-body -->
            <!-- /.box -->
            <div class="box no-border">
                <div class="box-header with-border">
                    <a><h3 class="box-title"><span class="fa fa-list"></span>&nbsp;&nbsp;提領紀錄</h3></a>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>日期</th>
                                <th>類型</th>
                                <th>入金/出金</th>
                                <th>金額</th>
                                <th>備註</th>
                                <th>狀態</th>
                                <th>功能</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php if( ! empty($content)){foreach ($content as $num => $item):?>
                             <tr>
                                <td><?=! empty($item['date'])?$item['date'] : '' ;?></td>
                                <td><?=! empty($item['type'])?$item['type'] : '' ;?></td>
                                <td><?=! empty($item['assets_type'])? $item['assets_type'] : '' ;?></td>
                                <td><?=! empty($item['price'])? $item['price'] : 0 ;?></td>
                                <td><?=! empty($item['comment'])? $item['comment'] : 0 ;?></td>
                                <td><?=! empty($item['status'])? $item['status'] : 0 ;?></td>
                                <td><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span>&nbsp;修改</button></td>
                            </tr>
                        <?php endforeach;} ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </section>
