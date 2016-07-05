<?php
//    $this->minify->css(array(
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.css'));

//    $this->minify->js(array(
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.min.js'));
//    echo $this->minify->deploy_js(FALSE, $assets_name.'.js');
?>
<script>
$(document).ready(function() {
    $('.send').click(function(){
        $('body').mask('Creating...');
        $.ajax({
            url: $('form:eq(0)').attr('action') + '?is_ajax=1',
            type: $('form:eq(0)').attr('method'),
            data: $('form:eq(0)').serialize(),
            dataType: 'json',
            success: function(res) {
                if (res.status === true) {
                        alert('success');
                    } else {
                        alert('failed');
                    }
                $('body').unmask();
                }
            });
    });
});
</script>
<!-- Full Width Column -->
        <div class="content-wrapper">
            <div class="container container-v-center">
                <!-- Content Header (Page header) -->
                <!-- Main content -->
                <section class="content">
                    <form class="form-horizontal changePw" action="/mt4/deposit" method="post" novalidate="novalidate">
                        <div class="box box-primary">
                            <div class="box-header">
                                入金資料上傳
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">帳號</label>
                                    <div class="col-sm-10">
                                        <select id="actSel" class="form-control">
                                            <option value="1">ACCOUNT1</option>
                                            <option value="2">ACCOUNT2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">入金金額</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="money" class="form-control" id="depAmt" placeholder="(請勿包含逗號及$符號)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">電匯資料上傳</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" value="上傳入金認證圖檔"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">銀聯卡</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="union_pay" class="form-control" id="depAmt" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="button" class="btn btn-info pull-right send">確定送出</button>
                            </div>
                        </div>
                    </form>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.container -->
        </div>