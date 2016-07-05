<?php
//    $this->minify->css(array(
//        'js/thirdParty/plugins/daterangepicker/daterangepicker-bs3.css',
//        'js/thirdParty/plugins/datatables/dataTables.bootstrap.css',
//        'js/thirdParty/plugins/iCheck/minimal/blue.css'));

//    $this->minify->js(array(
//        'js/thirdParty/plugins/datatables/jquery.dataTables.min.js',
//        'js/thirdParty/plugins/datatables/dataTables.bootstrap.min.js',
//        'js/moment.min.js',
//        'js/thirdParty/plugins/daterangepicker/daterangepicker.js'));
//    echo $this->minify->deploy_js(FALSE, $assets_name.'.js');
?>
<script>
$(function() {
    //手機板data-table功能與版面調整
    $("#clientTable").DataTable(GetDataTableAttrs());
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
                                    <h3><i class="fa fa-credit-card"></i>&nbsp;交易明細</h3></li>
                            </ul>
                        </div>
                        <div class="box-body">
                            <!--
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="form-group">
                              <label class="">
                                 <div class="iradio_minimal-blue checked" aria-checked="false" aria-disabled="false" style="position: relative;">
                                    <input type="radio" name="r1" class="minimal" checked="" style="position: absolute; opacity: 0;">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                                 </div>
                                 即時交易報表
                              </label>
                              &nbsp;
                              <label class="">
                                 <div class="iradio_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
                                    <input type="radio" name="r1" class="minimal" checked="" style="position: absolute; opacity: 0;">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                                 </div>
                                 歷史交易報表
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xs-12">
                           <div class="form-group">
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <span>日期</span>
                                 </div>
                                 <select class="form-control">
                                    <option value="0">開倉時間</option>
                                    <option value="1" selected>平倉時間</option>
                                 </select>
                                 <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                 </div>
                                 <input type="text" class="form-control pull-right" id="reservation" placeholder="選擇日期範圍">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xs-12">
                           <div class="form-group">
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <span>商品</span>
                                 </div>
                                 <input type="text" class="form-control" placeholder="商品">
                                 <div class="input-group-addon">
                                    <span>類型</span>
                                 </div>
                                 <select class="form-control">
                                    <option value="0">請選擇類型</option>
                                    <option value="1">平倉時間</option>
                                 </select>
                                 <div class="input-group-addon">
                                    <span>附註</span>
                                 </div>
                                 <input type="text" class="form-control" placeholder="註釋查詢">
                              </div>
                           </div>
                        </div>
                     </div>
                     -->
                         <div class="row col-sm-12">
                               <div class="form-group">
                                 <span class="input-group-btn">
                                  <a href="<?=$app?>/<?=$method?>?action=download&filetype=csv"><button class="btn btn-warning btn-flat" type="button"><span class="glyphicon glyphicon-download-alt"></span>下載CSV檔</button></a>
                              </span>
                                </div>
                            </div>
                            <table id="clientTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>交單編號</th>
                                        <th>商品別</th>
                                        <th>手數</th>
                                        <th>進場時間</th>
                                        <th>進場價位</th>
                                        <th>出場時間</th>
                                        <th>出場價位</th>
                                        <th>獲利</th>
                                        <th>附註</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if( ! empty($list)){foreach ($list as $num => $item):?>
                                    <tr>
                                        <td><?=$item['mt4_order'];?></td>
                                        <td><?=$item['symbol'];?></td>
                                        <td><?=$item['volume'];?></td>
                                        <td><?=$item['open_time'];?></td>
                                        <td><?=$item['open_price'];?></td>
                                        <td><?=$item['close_time'];?></td>
                                        <td><?=$item['close_price'];?></td>
                                        <td><?=(float)$item['profit'] > 0?'<span class="label label-success">'.$item['profit'].'</span>' : '<span class="label label-danger">'.$item['profit'].'</span>';?></td>
                                        <td><?=$item['note'];?></td>
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
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
<!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
