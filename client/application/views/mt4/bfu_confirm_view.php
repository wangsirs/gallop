<div class="content-wrapper">
    <div class="container">
        <section class="invoice">
            <form class="form-horizontal funding" action="/mt4/funding" method="post" novalidate="novalidate">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                        <i class="fa fa-bank"></i> 寶付轉帳結果
                        </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-12 invoice-col">
                        <a><h4><p class="txt-red"></p></h4></a>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table class="table funding-step">
                                    <tbody>
                                        <tr>
                                            <td> 交易單ID：</td>
                                            <td><?=$transID?></td>
                                        </tr>
                                        <tr>
                                            <td> 交易結果：</td>
                                            <td><?=($result == 1)?'成功':'失敗';?></td>
                                        </tr>
                                        <tr>
                                            <td> 實際匯款金額：</td>
                                            <td><?=$real_funding?></td>
                                        </tr>
                                        <tr>
                                            <td> 交易完成時間：</td>
                                            <td><?=$trade_comp_time?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>