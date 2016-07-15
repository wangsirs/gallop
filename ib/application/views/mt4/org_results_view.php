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
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.min.js',
//        'js/jquery.cookie.js'));
?>
<!-- Page script -->
<script>
    $(function() {
        start_date = '';
        end_date = '';
        date_format = 'YYYY-MM-DD';
        ib_id = '';

        if(QueryString.st_day != undefined && QueryString.end_day != undefined){
            start_date = QueryString.st_day;
            end_date = QueryString.end_day;
        }
        if(QueryString.ib_id != undefined){
            ib_id = QueryString.ib_id;
        }

        //存取cookie取得目前節點位置
        $("#" + $.cookie('ib_id')).parents('.treeview-menu').addClass('menu-open').css('display', 'block');
        if ($.cookie('child_open') === 'true'){
            target = null;
            if($.cookie('ib_id') == 'tree_head')
                target = $("#" + $.cookie('ib_id')).closest('li');
            else
                target = $("#" + $.cookie('ib_id'));
            target.children('.treeview-menu').addClass('menu-open').css('display', 'block');
        }

        $('li[id] span, #tree_head').click(function(e){
            $.fx.off = true;
            ib_id = $(this).closest('li').attr('id');
            if(ib_id == undefined)
                location.href = '/mt4/org_results';
            else
                location.replace('/mt4/org_results?ib_id=' + ib_id);
        });

        $('.filter_txt').click(function(){
            $(this).prevAll('div').first().iCheck('check');
        });

        //如果全選&選定日期範圍切換，則觸發事件
        $('input[type="radio"].minimal')
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
            'startDate': (start_date.length == 0)?moment().format(date_format): start_date,
            'endDate': (end_date.length == 0)?moment().format(date_format): end_date
        }, function(start, end, label) {
            start_date = start.format(date_format);
            end_date = end.format(date_format);
        });
        $("#clientTable").DataTable(GetDataTableAttrs());

        //當按下搜尋按鈕後的事件觸發
        $('.query').click(function() {
            if (start_date.length != 0 && end_date.length != 0) {
                location.href = '/mt4/org_results?st_day=' + start_date + '&end_day=' + end_date + '&ib_id=' + ib_id;
            } else {
                location.href = '/mt4/org_results?ib_id=' + ib_id;
            }
        });

        cnt = 0;
        //紀錄最後一筆ib id
        $('li,#tree_head').click(function() {
            if (cnt == 0) {
                if ($(this).closest('li').find('ul.treeview-menu').hasClass('menu-open') === true) {
                    $.cookie('child_open', 'false', {
                        expires: 1
                    });
                } else {
                    $.cookie('child_open', 'true', {
                        expires: 1
                    });
                }
                $.cookie('ib_id', $(this).attr('id'), {
                    expires: 1
                });
            }
            if ($(this).attr('id') == undefined) {
                cnt = 0;
            } else {
                cnt++;
            }
        });

        //載入IB資訊
        $('.client-profile').click(function() {
            $('body').mask('資料載入中...');
            var ib_id = $(this).attr('data-bind');
            BootstrapDialog.show({
                title: 'IB個人詳細資訊',
                type: BootstrapDialog.TYPE_PRIMARY,
                size: BootstrapDialog.SIZE_WIDE,
                message: function(dialog) {
                    var $message = $('<div></div>');
                    var pageToLoad = dialog.getData('client_profile');
                    $message.load(pageToLoad);

                    return $message;
                },
                data: {
                    'client_profile': 'mt4/ib_profile?ib_id=' + ib_id
                },
                onshown: function(diag){
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
                            <h3><i class="fa fa-user"></i>&nbsp;
                                <?=$page_title?></h3></li>
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
                            <table id="clientTable" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>顧問帳號</th>
                                        <th>顧問姓名</th>
                                        <th>交易量</th>
                                        <th>佣金</th>
                                        <th>入金金額</th>
                                        <th>損益</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if( ! empty($content)){foreach ($content as $num => $item):?>
                                        <tr>
                                            <td><?=$item['ib_id']?></td>
                                            <td><a role="button" class="client-profile" data-bind="<?=! empty($item['ib_id'])?$item['ib_id'] : '' ;?>"><span class="glyphicon glyphicon-search" style="margin-right: 0.5em;"></span><?=$item['first_name'].' '.$item['last_name'];?></a></td>
                                            <td><?=! empty($item['volume'])? $item['volume'] : 0;?></td>
                                            <td><?=! empty($item['bonus'])? $item['bonus'] : 0;?></td>
                                            <td><?=! empty($item['funding'])? round($item['funding'], BAL_DIGITS) : 0;?></td>
                                            <td><?php
                                                $profit = ! empty($item['profit'])? round($item['profit'], PROFIT_DIGITS) : 0;
                                                echo ((float)$profit > 0)?'<span class="label label-success">'.$profit.'</span>' : '<span class="label label-danger">'.$profit.'</span>';
                                                ?></td>
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
