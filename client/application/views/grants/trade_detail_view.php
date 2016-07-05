   <script>
   $(function() {
      //Date range picker
      $('#reservation').daterangepicker();
      //Date range picker with time picker

      $("#clientTable").DataTable();
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
                     <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">搜尋條件： 日期</label>
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                           </div>
                           <input type="text" class="form-control pull-right" id="reservation" placeholder="選擇日期範圍">
                           <span class="input-group-btn">
                              <button class="btn btn-info btn-flat" type="button">查詢</button>
                          </span>
                        </div>
                     </div>
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
                        <?php foreach ($info as $num => $item):?>
                           <tr>
                              <td>
                              <?=$item['order'];?>
                              </td>
                              <td>
                              <?=$item['symbol'];?>
                              </td>
                              <td>
                              <?=$item['volume'];?>
                              </td>
                              <td>
                              <?=$item['open_time'];?>
                              </td>
                              <td>
                              <?=$item['open_price'];?>
                              </td>
                              <td>
                              <?=$item['close_time'];?>
                              </td>
                              <td>
                              <?=$item['close_price'];?>
                              </td>
                              <td>
                              <?=$item['profit'];?>
                              </td>
                              <td>
                              <?=$item['comment'];?>
                              </td>
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