<script>
    $(function() {
        start_date = '';
        end_date = '';
        date_format = 'YYYY-MM-DD';

        if(QueryString.st_day != undefined && QueryString.end_day != undefined){
            start_date = QueryString.st_day;
            end_date = QueryString.end_day;
        }

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

        //手機板data-table功能與版面調整
        $('#clientTable').DataTable(GetDataTableAttrs());

        //當按下搜尋按鈕後的事件觸發
        $('.query').click(function() {
            if (start_date.length != 0 && end_date.length != 0) {
                location.href = '/grants/money_history?st_day=' + start_date + '&end_day=' + end_date;
            } else {
                location.href = '/grants/money_history';
            }
        });
    });
</script>
<!-- Main content -->
<div class="content-wrapper">
    <div class="container container-v-center">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <ul class="nav pull-left ui-sortable-handle">
                                <li class="pull-left header text-light-blue">
                                    <h3><i class="fa fa-credit-card"></i>&nbsp;出入金查詢</h3></li>
                                </ul>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="radio" name="query_range" class="minimal" value="0" <?php if(!$flag){echo 'checked'; } ?>>
                                            <ins class="iCheck-helper"></ins>
                                            <span class="filter_txt">全部</span>
                                            <input type="radio" name="query_range" class="minimal" value="1" <?php if($flag){echo 'checked'; } ?>>
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
                 <table id="clientTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>交易日期</th>
                            <th>異動類別</th>
                            <th>銀行名稱</th>
                            <th>銀行帳號</th>
                            <th>幣別</th>
                            <th>金額</th>
                            <th>狀態</th>
                            <th>訊息</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($info as $num => $item):?>
                            <tr>
                                <td><?=! empty($item['ctime'])?trim($item['ctime']):'';?></td>
                                <td><?php $active = !empty($item['active'])?$item['active']:'';
                                if ($active == 'in'): echo '入金';
                                elseif($active == 'out'): echo '出金';
                                endif;?></td>
                                <td><?=! empty($item['bank'])?$item['bank']:'無';?></td>
                                <td><?=! empty($item['bank_acc'])?$item['bank_acc']:'無';?></td>
                                <td>美金</td>
                                <td><?=! empty($item['amount'])?$item['amount']:'';?></td>
                                <td><?php 
                                    $show_status = '';
                                    if($active === 'in'){
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
                                 }elseif($active === 'out'){
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
                             <td><?=! empty($item['note'])?$item['note']:'';?></td>
                         </tr>
                     <?php endforeach; ?>
                 </tbody>
             </table>
         </div>
     </div>
     <!-- /.box-header -->
 </div>
 <!-- /.box -->
</div>
<!-- /.col -->
<!-- /.row -->
</section>
<!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->
<!-- Add the sidebar's background. This div must be placed
 immediately after the control sidebar -->
 <div class="control-sidebar-bg"></div>
