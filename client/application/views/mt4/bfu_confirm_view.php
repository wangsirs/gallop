<div class="content-wrapper">
    <div class="container">
        <section class="invoice">
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
                                            <td><?=($result == 1)?'<h4 class="text-aqua"><strong>支付成功</strong></h4>':'<h4 class="text-red"><strong>支付失敗</strong></h4>';?></td>
                                        </tr>
                                        <?php
                                            if(intval($result_desc) !== 1){
                                                echo '<tr><td>';
                                                switch (intval($result_desc)) {
                                                    case 0:
                                                        echo '支付失敗';
                                                        break;
                                                    case 2:
                                                        echo '訂單超時';
                                                        break;
                                                    case 11:
                                                        echo '系統維護';
                                                        break;
                                                    case 12:
                                                        echo '無效商戶';
                                                        break;
                                                    case 13:
                                                        echo '餘額不足';
                                                        break;
                                                    case 14:
                                                        echo '超過支付限額';
                                                        break;
                                                    case 15:
                                                        echo '卡號或卡密錯誤';
                                                        break;
                                                    case 16:
                                                        echo '不合法的IP地址';
                                                        break;
                                                    case 17:
                                                        echo '重複訂單金額不符';
                                                        break;
                                                    case 18:
                                                        echo '卡密已被使用';
                                                        break;
                                                    case 19:
                                                        echo '訂單金額錯誤';
                                                        break;
                                                    case 1:
                                                        echo '系統錯誤';
                                                        break;
                                                    default:
                                                        echo '不明錯誤原因';
                                                        break;
                                                }
                                                echo '</td></tr>';
                                            }
                                        ?>
                                        <tr>
                                            <td> 實際匯款金額：</td>
                                            <td>$<?=(float)$real_funding/100.0?></td>
                                        </tr>
                                        <tr>
                                            <td> 交易完成時間：</td>
                                            <td><?php
                                            $date = date_create($trade_comp_time);
                                            echo date_format($date, 'Y/m/d H:i:s');
                                            ?></td>
                                        </tr>
                                        <tr>
                                            <td> 匯款銀行：</td>
                                            <td><?php
                                            if($bank_id == '101'){ echo '神州行';}
                                            else if($bank_id == '1022'){ echo '聯通卡';}
                                            else if($bank_id == '1033'){ echo '電信卡';}
                                            else if($bank_id == '111'){ echo '盛大卡';}
                                            else if($bank_id == '112'){ echo '完美卡';}
                                            else if($bank_id == '114'){ echo '征途卡';}
                                            else if($bank_id == '115'){ echo '駿網一卡通';}
                                            else if($bank_id == '116'){ echo '網易卡';}
                                            
                                            else if($bank_id == '1001'){ echo '招商銀行';}
                                            else if($bank_id == '1002'){ echo '工商銀行';}
                                            else if($bank_id == '1003'){ echo '建設銀行';}
                                            else if($bank_id == '1004'){ echo '浦發銀行';}
                                            else if($bank_id == '1005'){ echo '農業銀行';}
                                            else if($bank_id == '1006'){ echo '民生銀行';}
                                            else if($bank_id == '1009'){ echo '興業銀行';}
                                            else if($bank_id == '1020'){ echo '交通銀行';}
                                            else if($bank_id == '1022'){ echo '光大銀行';}
                                            else if($bank_id == '1026'){ echo '中國銀行';}
                                            else if($bank_id == '1032'){ echo '北京銀行';}      
                                            else if($bank_id == '1035'){ echo '平安銀行';}
                                            else if($bank_id == '1036'){ echo '廣發銀行';}
                                            else if($bank_id == '1039'){ echo '中信銀行';}
                                            else if($bank_id == '1080'){ echo '銀聯在線';}
                                            
                                            else if($bank_id == '3001'){ echo '招商銀行(借)';}
                                            else if($bank_id == '3002'){ echo '工商銀行(借)';}
                                            else if($bank_id == '3003'){ echo '建設銀行(借)';}
                                            else if($bank_id == '3004'){ echo '浦發銀行(借)';}
                                            else if($bank_id == '3005'){ echo '農業銀行(借)';}
                                            else if($bank_id == '3006'){ echo '民生銀行(借)';}
                                            else if($bank_id == '3009'){ echo '興業銀行(借)';}
                                            else if($bank_id == '3020'){ echo '交通銀行(借)';}
                                            else if($bank_id == '3022'){ echo '光大銀行(借)';}
                                            else if($bank_id == '3026'){ echo '中國銀行(借)';}
                                            else if($bank_id == '3032'){ echo '北京銀行(借)';}       
                                            else if($bank_id == '3035'){ echo '平安銀行(借)';}
                                            else if($bank_id == '3036'){ echo '廣發銀行(借)';}
                                            else if($bank_id == '3039'){ echo '中信銀行(借)';}

                                            else if($bank_id == '4001'){ echo '招商銀行(貸)';}
                                            else if($bank_id == '4002'){ echo '工商銀行(貸)';}
                                            else if($bank_id == '4003'){ echo '建設銀行(貸)';}
                                            else if($bank_id == '4004'){ echo '浦發銀行(貸)';}
                                            else if($bank_id == '4005'){ echo '農業銀行(貸)';}
                                            else if($bank_id == '4006'){ echo '民生銀行(貸)';}
                                            else if($bank_id == '4009'){ echo '興業銀行(貸)';}
                                            else if($bank_id == '4020'){ echo '交通銀行(貸)';}
                                            else if($bank_id == '4022'){ echo '光大銀行(貸)';}
                                            else if($bank_id == '4026'){ echo '中國銀行(貸)';}
                                            else if($bank_id == '4032'){ echo '北京銀行(貸)';}       
                                            else if($bank_id == '4035'){ echo '平安銀行(貸)';}
                                            else if($bank_id == '4036'){ echo '廣發銀行(貸)';}
                                            else if($bank_id == '4039'){ echo '中信銀行(貸)';}
                                            ?></td>
                                        </tr>
                                        <tr>
                                            <td> 附加訊息：</td>
                                            <td><?=strlen($add_info) === 0?'無訊息':$add_info?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-xs-3">
                                </div>
                                <div class="col-xs-6">
                                <a href="/mt4"><button class="btn btn-block btn-primary btn-lg">回到首頁</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>