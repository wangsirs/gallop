<?php
//    $this->minify->css(array(
//        'js/thirdParty/plugins/daterangepicker/daterangepicker-bs3.css',
//        'js/thirdParty/plugins/datatables/dataTables.bootstrap.css',
//        'js/thirdParty/plugins/iCheck/flat/blue.css',
//        'js/thirdParty/plugins/iCheck/minimal/blue.css',
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.css'));

//    $this->minify->js(array(
//        'js/thirdParty/plugins/datatables/jquery.dataTables.min.js',
//        'js/thirdParty/plugins/datatables/dataTables.bootstrap.min.js',
//        'js/moment.min.js',
//        'js/thirdParty/plugins/daterangepicker/daterangepicker.js',
//        'js/thirdParty/plugins/iCheck/icheck.min.js',
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.min.js'));
?>
<link rel="stylesheet" href="<?=ASSETS_CUSTOM_CSS?>gallop.min.css">
<!-- Page script -->
<script>
$(function() {
    start_date = '';
    end_date = '';
    date_format = 'YYYY-MM-DD';

    if (QueryString.st_day != undefined && QueryString.end_day != undefined) {
        start_date = QueryString.st_day;
        end_date = QueryString.end_day;
    }

    //iCheck for all / date-range
    $('input[type="radio"][name="r1"]')
        .iCheck({
            radioClass: 'iradio_minimal-blue'
        })
        .on('ifChecked', function(event) {
            if (this.value == 0) {
                start_date = end_date = '';
                $('.query-row').fadeOut();
            } else {
                if (start_date.length == 0 || end_date.length == 0) {
                    start_date = end_date = moment().format(date_format);
                }
                $('.query-row').fadeIn();
            }
        });

    //當點選文字部分，自動點選radio
    $('.filter_txt').click(function() {
        $(this).prevAll('div').first().iCheck('check');
    });

    //當apply時決定start date與end date
    $('input[name="date-range"]')
        .daterangepicker({
            'showDropdowns': true,
            'autoApply': true,
            'locale': {
                'format': date_format,
                'separator': ' ~ ',
                'firstDay': 1
            },
            'startDate': (start_date.length == 0) ? moment().format(date_format) : start_date,
            'endDate': (end_date.length == 0) ? moment().format(date_format) : end_date
        }, function(start, end, label) {
            start_date = start.format(date_format);
            end_date = end.format(date_format);
        });

    $('.client-profile').click(function() {
        $('body').mask('資料載入中...');
        var user_id = $(this).attr('data-bind');
        BootstrapDialog.show({
            title: 'MT4客戶基本資料',
            type: BootstrapDialog.TYPE_PRIMARY,
            message: function(dialog) {
                var $message = $('<div></div>');
                var pageToLoad = dialog.getData('client_profile');
                $message.load(pageToLoad);

                return $message;
            },
            data: {
                'client_profile': 'mt4/client_profile?user_id=' + user_id
            },
            cssClass: 'client-profile-modal',
            onshown: function(diag) {
                $('body').unmask();
            },
            buttons: [{
                label: '關閉',
                hotkey: 13,
                cssClass: 'btn-danger',
                action: function(dialogRef) {
                    dialogRef.close();
                }
            }]
        });
    });
    LoadGeneral();

    $("#clientTable").DataTable(GetDataTableAttrs());

    //當按下搜尋按鈕後的事件觸發
    $('.query').click(function() {
        if (start_date.length != 0 && end_date.length != 0) {
            location.href = '/mt4/money_flow?st_day=' + start_date + '&end_day=' + end_date;
        } else {
            location.href = '/mt4/money_flow';
        }
    });

    $("th:eq(0)").click();
});
</script>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <ul class="nav pull-left ui-sortable-handle">
                        <li class="pull-left header text-light-blue">
                            <h3><i class="fa fa-money"></i>&nbsp;<?=$page_title?></h3></li>
                    </ul>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="radio" name="r1" class="minimal" value="0" <?php if(!$flag){echo 'checked'; } ?>>
                                <ins class="iCheck-helper"></ins>
                                <span class="filter_txt">全部</span>&nbsp;
                                <input type="radio" name="r1" class="minimal" value="1" <?php if($flag){echo 'checked'; } ?>>
                                <ins class="iCheck-helper"></ins>
                                <span class="filter_txt">選定日期範圍</span>
                                <button class="btn btn-info btn-flat query pull-right" type="button"><span class="glyphicon glyphicon-search"></span>&nbsp;查詢</button>
                            </div>
                        </div>
                    </div>
                    <div class="row query-row" <?php if(!$flag){echo 'style="display:none;"'; } ?>>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>搜尋條件： 日期</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="date-range" placeholder="選擇日期範圍">
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <table id="clientTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>交易日期</th>
                                <th>客戶帳號</th>
                                <th>客戶姓名</th>
                                <th>異動類別</th>
                                <th>方式</th>
                                <th>幣別</th>
                                <th>金額</th>
                                <th>狀態</th>
                                <th>備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if( ! empty($content)){foreach ($content as $num => $item):?>
                            <tr>
                                <td><?=$item['ctime'];?></td>
                                <td><?=$item['user_id'];?></td>
                                <td><a role="button" class="client-profile" data-bind="<?=! empty($item['user_id'])?$item['user_id'] : '' ;?>"><span class="glyphicon glyphicon-search" style="margin-right: 0.5em;"></span><?=$item['first_name'].' '.$item['last_name'];?></a></td>
                                <td><?=($item['active'] === 'out') ? '出金' : '入金';?></td>
                                <td>電匯</td>
                                <td>USD</td>
                                <td><?=$item['amount'];?></td>
                                <td><?php 
                                        $show_status = '';
                                        if($item['active'] === 'in'){
                                          switch (intval($item['status'])) {
                                           case 0:
                                           $show_status = '<span class="label label-warning">申請中</span>';
                                           break;
                                           case 1:
                                           $show_status = '<span class="label label-success">已收到</span>';
                                           break;
                                           case 2:
                                           $show_status = '<span class="label label-danger">失敗</span>';
                                           break;
                                           case 3:
                                           $show_status = '<span class="label label-warning">重複申請</span>';
                                           break;
                                           default:
                                           $show_status = '<span class="label label-warning">狀態未確定</span>';
                                           break;
                                         }
                                       }elseif($item['active'] === 'out'){
                                        switch (intval($item['status'])) {
                                         case 0:
                                         $show_status = '<span class="label label-danger">OTP未過</span>';
                                         break;
                                         case 1:
                                         $show_status = '<span class="label label-warning">申請中</span>';
                                         break;
                                         case 2:
                                         $show_status = '<span class="label label-success">成功</span>';
                                         break;
                                         case 3:
                                         $show_status = '<span class="label label-danger">駁回</span>';
                                         break;
                                         case 4:
                                         $show_status = '<span class="label label-warning">重複申請</span>';
                                         break;
                                         default:
                                         $show_status = '<span class="label label-warning">狀態未確定</span>';
                                         break;
                                       }
                                     }
                                     echo $show_status;
                                     ?></td>
                                <td><?=! empty($item['comment'])? $item['comment'] : '';?></td>
                            </tr>
                            <?php endforeach;} ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-header -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
