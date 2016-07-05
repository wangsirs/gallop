<link rel="stylesheet" href="<?=ASSETS_CUSTOM_CSS?>gallop.min.css">
<script>
$(document).ready(function() {
    //iCheck for all / date-range
    $('input[type="radio"][name="r1"]')
        .iCheck({
            radioClass: 'iradio_minimal-blue'
        });
});
</script>
<div class="content-wrapper">
    <div class="container">
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                <i class="fa fa-bank"></i> 銀聯卡轉帳
              </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                    <div class="panel panel-default">
                        <div class="panel-body panel-body-enlarge">
                            <img src="<?=ASSETS_IMG?>pay8.jpg" alt="Union Pay" class="Union-Pay">
                            <table class="table funding-step">
                                <tbody>
                                    <tr>
                                        <td> 受益人名稱：</td>
                                        <td>GALLOP</td>
                                    </tr>
                                    <tr>
                                        <td> MT4帳戶帳號：</td>
                                        <td>
                                            <?=$main_mt4_id?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 賬戶持有人名稱：</td>
                                        <td>
                                            <?=$username?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 幣別 ：</td>
                                        <td>USD</td>
                                    </tr>
                                    <tr>
                                        <td> 存款金額：</td>
                                        <td>
                                            <input type="number" class="form-control">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <button type="submit" class="btn btn-info pull-right send"><i class="fa fa-check"></i> 確定送出</button>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </section>
    </div>
</div>
