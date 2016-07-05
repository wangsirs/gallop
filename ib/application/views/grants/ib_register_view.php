<script>
add_rules({
    scale:{
        required: true,
        range: [0, <?=$scale?>]
    }
});

add_messages({
    scale: "請確認此欄位介於0至<?=$scale?>"
});

$(document).ready(function() {
    $('input[name=scale]').change(function(){
        if(parseInt($(this).val()) > <?=$scale?>){
            $(this).val(<?=$scale?>);
        }
    });
});
</script>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">業務設置</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*介紹人代碼:</label>
                                <input id="agentCode" name="ib_id" class="form-control " type="text" value="<?=$ib_id?>" disabled="true">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*業務佣金比例:</label>
                                <div class="input-group">
                                    <?php //加上 step attr, vali 會掛?>
                                    <input type="number" name="scale" min="0" max="<?=$scale?>" class="form-control" placeholder="0.00~<?=$scale?>" />
                                    <span class="input-group-addon">%</span>
                                  </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>
                    </div>
                    </div>
            <!--
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">*新帳戶設置</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*首次準備存入的資金量:</label>
                                <input id="firstDepo" name="firstDepo" class="form-control " type="number" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>*請選擇槓桿比例:</label>
                                <select name="leverage" id="leverage" class="form-control" data-bv-field="data.map.leverage">
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
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>請輸入代理商代碼:</label>
                                <input id="agentCode" name="agentCode" class="form-control " type="number" placeholder="2000001" disabled="true">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <br>
                                <br>
                                <label>若不知[代理商代碼]可詢問您的理財顧問</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            -->