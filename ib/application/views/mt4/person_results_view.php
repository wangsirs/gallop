<?php
//    $this->minify->css(array(
//        'js/thirdParty/plugins/daterangepicker/daterangepicker-bs3.css',
//        'js/thirdParty/plugins/datatables/dataTables.bootstrap.css',
//        'js/thirdParty/plugins/iCheck/flat/blue.css',
//        'js/thirdParty/plugins/iCheck/minimal/blue.css',
//        'js/thirdParty/plugins/iCheck/minimal/red.css',
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.css'));

//    $this->minify->js(array(
//        'js/thirdParty/plugins/datatables/jquery.dataTables.min.js',
//        'js/thirdParty/plugins/datatables/dataTables.bootstrap.min.js',
//        'js/moment.min.js',
//        'js/thirdParty/plugins/daterangepicker/daterangepicker.js',
//        'js/thirdParty/plugins/iCheck/icheck.min.js',
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.min.js',));
?>
<link rel="stylesheet" href="<?=ASSETS_CUSTOM_CSS?>gallop.min.css">
<!-- Page script -->
<script>
$(function() {
    start_date = '';
    end_date = '';
    date_format = 'YYYY-MM-DD';
    date_choice = -1;
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
                if(start_date.length == 0 || end_date.length == 0){
                    start_date = end_date = moment().format(date_format);
                }
                $('.query-row').fadeIn();
            }
        });

    //iCheck for seleted range
    $('input[type="radio"][name="r2"]')
        .iCheck({
            radioClass: 'iradio_minimal-red'
        })
        .on('ifChecked', function(event) {
            subtract_days = 0;
            if(this.value == 0){
                subtract_days = 1;
            }else if(this.value == 1){
                subtract_days = 7;
            }else if(this.value == 2){
                subtract_days = 30;
            }
            end_date = moment().format('YYYY-MM-DD'),
                start_date = moment().subtract(subtract_days, 'days').format('YYYY-MM-DD');
            date_choice = this.value;
            $('input[name="date-range"]').val('');
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
            $('input[type="radio"][name="r2"]').iCheck('uncheck');
            date_choice = -1;
        });

    //
    if(QueryString.choice != -1){
        $('input[type="radio"][name="r2"][value="' + QueryString.choice + '"]').iCheck('check');
    }

    $('.client-profile').click(function() {
        $('body').mask('載入資料中...');
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
            onshown: function(diag){
                $('body').unmask();
            },
            cssClass: 'client-profile-modal',
            buttons: [{
                label: '關閉',
                hotkey: 13,
                cssClass: 'btn-danger',
                action: function(diag) {
                    diag.close();
                }
            }]
        });
    });

    $("#clientTable").DataTable(GetDataTableAttrs());
    LoadGeneral();
    //當按下搜尋按鈕後的事件觸發
    $('.query').click(function() {
        if (start_date.length != 0 && end_date.length != 0) {
            location.href = '/mt4/person_results?st_day=' + start_date + '&end_day=' + end_date + '&choice=' + date_choice;
        } else {
            location.href = '/mt4/person_results';
        }
    });
});

function showDetail(user_id){
    $('body').mask('載入資料中...');
    BootstrapDialog.show({
        title: '客戶MT4子帳號明細',
        type: BootstrapDialog.TYPE_PRIMARY,
        message: function(dialog) {
            var $message = $('<div></div>');
            var pageToLoad = dialog.getData('client_detail');
            $message.load(pageToLoad);

            return $message;
        },
        data: {
            'client_detail': 'mt4/person_results_detail?user_id=' + user_id
        },
        onshown: function(dialog) {
            $('body').unmask();
            $("#detail_table").DataTable(GetDataTableAttrs());
            $('.pagination:eq(1)').pagination({
                first:'«', //修改first為 << 頁碼文字
                last:'»', //修改last為 >> 頁碼文字
                totalPages: 20, //總頁數20頁
                visiblePages: 2, //顯示2頁
                onPageClick: function (event, page) { //按頁碼之後會執行的事
                    $('#page-content_sm').text('Page ' + page);
                }
            });
        },
        buttons: [{
            label: '關閉',
            hotkey: 13,
            cssClass: 'btn-danger',
            action: function(diag) {
                diag.close();
            }
        }]
    });
}
</script>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <ul class="nav pull-left ui-sortable-handle">
                        <li class="pull-left header text-light-blue">
                            <h3><i class="fa fa-user"></i>&nbsp;
        <?=$page_title?></h3></li>
                    </ul>
                </div>
                <div class="box-body">
                    <!--
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <div class="input-group col-xs-6 pull-right">
                                <div class="input-group-addon">
                                    <i class="fa fa-search"></i><span>客戶搜尋</span>
                                </div>
                                <input type="text" class="form-control" placeholder="請輸入客戶帳號">
                                <span class="input-group-btn">
      <button class="btn btn-info btn-flat" type="button">查詢</button>
  </span>
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="radio" name="r1" class="minimal" value="0" <?php if(!$flag){echo 'checked'; } ?>>
                                <ins class="iCheck-helper"></ins>
                                <span class="filter_txt">全部</span>&nbsp;
                                <input type="radio" name="r1" class="minimal" value="1" <?php if($flag){echo 'checked'; } ?>>
                                <ins class="iCheck-helper"></ins>
                                <span class="filter_txt">選定日期範圍</span>
                                <button class="btn btn-info query pull-right" type="button"><span class="glyphicon glyphicon-search"> </span>&nbsp;查詢</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row query-row" <?php if(!$flag){echo 'style="display:none;"'; } ?>>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="inputEmail3" class="control-label">搜尋條件： 日期</label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="date-range" class="form-control pull-right" id="reservation" placeholder="選擇日期範圍">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-5">
                            <label class="control-label" style="margin-right:1em;">或</label>
                            <label class="">
                                <div aria-checked="false" aria-disabled="false">
                                    <input type="radio" name="r2" class="minimal" value="0">
                                    <ins class="iCheck-helper"></ins>
                                    <span class="filter_txt">1日</span>
                                </div>
                            </label>
                            <label class="">
                                <div aria-checked="false" aria-disabled="false">
                                    <input type="radio" name="r2" class="minimal" value="1">
                                    <ins class="iCheck-helper"></ins>
                                    <span class="filter_txt">1周</span>
                                </div>
                            </label>
                            <label class="">
                                <div aria-checked="false" aria-disabled="false">
                                    <input type="radio" name="r2" class="minimal" value="2">
                                    <ins class="iCheck-helper"></ins> 
                                    <span class="filter_txt">1個月</span>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <!--
                     <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"></label>
                        <div class="input-group">
                           <button class="btn btn-default pull-right" id="daterange-btn">
                              <i class="fa fa-calendar"></i>日期範圍選擇
                              <i class="fa fa-caret-down"></i>
                           </button>
                        </div>
                     </div>
                 -->
                    <table id="clientTable" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>客戶帳號</th>
                                <th>客戶姓名</th>
                                <th>交易量</th>
                                <th>佣金</th>
                                <th>入金金額</th>
                                <th>損益</th>
                                <th>明細</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if( ! empty($content)){foreach ($content as $num => $item):?>
                            <tr>
                                <td><?=! empty($item['user_id'])? $item['user_id'] : '' ;?></td>
                                <td>
                                    <a role="button" class="client-profile" data-bind="<?=! empty($item['user_id'])?$item['user_id'] : '' ;?>"><span class="glyphicon glyphicon-search" style="margin-right: 0.5em;"></span><?=$item['first_name'].' '.$item['last_name'];?></a></td>
                                <td><?=! empty($item['mrc_volume'])? $item['mrc_volume'] : 0;?></td>
                                <td><?=! empty($item['comission'])? $item['comission'] : 0;?></td>
                                <td><?=! empty($item['funding'])? round($item['funding'], BAL_DIGITS) : 0;?></td>
                                <td><?php
                                $profit = ! empty($item['mrc_profit'])? round($item['mrc_profit'], PROFIT_DIGITS) : '' ;
                                echo ((float)$profit > 0)?'<span class="label label-success">'.$profit.'</span>' : '<span class="label label-danger">'.$profit.'</span>';
                                ?></td>
                                <td><a  onclick="showDetail('<?=$item[ 'user_id']?>');"><button type="button" class="btn btn-warning client-detail"><span class="glyphicon glyphicon-th-list"></span>&nbsp;明細</button></a></td>
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
