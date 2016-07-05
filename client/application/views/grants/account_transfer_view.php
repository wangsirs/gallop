
    <!-- load mask -->
    <link href="<?=ASSETS_JS?>thirdParty/plugins/loadMask/jquery.loadmask.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?=ASSETS_JS?>thirdParty/plugins/loadMask/jquery.loadmask.min.js"></script>
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
                             <ul class="nav pull-left ui-sortable-handle">
                                <li class="pull-left header text-light-blue">
                                   <h3><i class="fa fa-bank"></i>&nbsp;帳戶互轉</h3></li>
                             </ul>
                          </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">轉出MT4帳號</label>
                                    <div class="col-sm-10">
                                        <select id="actSel" class="form-control">
                                            <option value="1">88888888</option>
                                            <option value="2">88888889</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">MT4密碼</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="mt4_pw" class="form-control" placeholder="請輸入您的轉出帳號密碼">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">轉帳金額</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="amount" class="form-control" placeholder="(請勿包含逗號及$符號)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">出金附言</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="note" rows="10" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">轉入MT4帳號</label>
                                    <div class="col-sm-10">
                                        <select id="actSel" class="form-control">
                                            <option value="1">88888888</option>
                                            <option value="2">88888889</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">驗證碼</label>
                                    <div class="col-sm-2">
                                        <img src="/mt4/captcha_gen" id="rand-img"></p>  
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="number" name="captcha" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                       
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