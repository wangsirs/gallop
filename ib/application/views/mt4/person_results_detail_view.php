      <section class="content">
         <div class="row">
            <div class="col-xs-12">
               <div class="box no-border">
                  <div class="box-header">
                     <ul class="nav pull-left ui-sortable-handle">
                        <li class="pull-left header text-light-blue">
                           <!--<h3><i class="fa fa-user"></i>&nbsp;客戶個帳號業績明細</h3></li>-->
                     </ul>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                     <table id="detail_table" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                        <thead>
                           <tr>
                              <th>MT4帳號</th>
                              <th>交易量</th>
                              <th>佣金</th>
                              <th>入金金額</th>
                              <th>損益</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php if( ! empty($content)){foreach ($content as $num => $item):?>
                           <tr>
                              <td><?=! empty($item['mt4_id'])?$item['mt4_id'] : '' ;?></td>
                              <td><?=! empty($item['mrc_volume'])? $item['mrc_volume'] : '' ;?></td>
                              <td><?=! empty($item['comission'])? $item['comission'] : 0 ;?></td>
                              <td><?=! empty($item['funding'])? round($item['funding'], BAL_DIGITS) : 0 ;?></td>
                              <td><?=! empty($item['mrc_profit'])?round($item['mrc_profit'], PROFIT_DIGITS): 0 ;?></td>
                           </tr>
                           <?php endforeach;} ?>
                        </tbody>
                     </table>
                  </div>
                  <!-- /.box-body -->
               </div>
               <!-- /.box -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </section>