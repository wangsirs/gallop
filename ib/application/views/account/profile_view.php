    <!-- Page script -->
    <script>
        $().ready(function() {
            LoadGeneral();
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
                                <label for="inputEmail3" class="col-sm-2 control-label">聯絡電話</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999999999999999&quot;" data-mask="" id="phone" value="<?=$phone?>"  disabled="true">
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
                                        <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999999999999999&quot;" data-mask="" id="mobilePhone" value="<?=$cell_phone?>"  disabled="true">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">E-MAIL</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="account" placeholder="E-MAIL" value="<?=$email?>"  disabled="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">居住城市</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="account" value="<?=$state?> <?=$city?>" disabled="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">居住地址</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="account" value="<?=$address?>" disabled="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">郵政編碼</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="account" value="<?=$zip?>" disabled="true">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
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
