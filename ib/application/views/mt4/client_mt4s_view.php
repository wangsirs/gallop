     <script>
     $(document).ready(function(){
     });
     </script>
      <section class="content">
         <div class="row">
            <div class="col-xs-12">
               <div class="box no-border">
                  <div class="box-header">
                     <ul class="nav pull-left ui-sortable-handle">
                        <li class="pull-left header text-light-blue">
                           <h3><i class="fa fa-user"></i>&nbsp;<?=$content['first_name']?> <?=$content['last_name']?></h3></li>
                     </ul>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                     <table id="mt4s_table" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>MT4帳號</th>
                              <th>開戶日期</th>
                              <th>累積入金</th>
                              <th>餘額</th>
                              <th>狀態</th>
                              <th>槓桿</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php if( ! empty($content['mt4s'])){foreach ($content['mt4s'] as $num => $item):?>
                           <tr>
                              <td><?=! empty($item['mt4_id'])?$item['mt4_id'] : '' ;?></td>
                              <td><?=! empty($item['ctime'])? $item['ctime'] : '' ;?></td>
                              <td><?=! empty($item['funding'])? $item['funding'] : 0 ;?></td>
                              <td><?=! empty($item['balance'])? $item['balance'] : 0 ;?></td>
                              <td><?php if(isset($item['approve'])){
                                        switch($item['approve']){
                                            case '0':echo '審核中';break;
                                            case '1':echo '批准';break;
                                            case '2':echo '否決';break;
                                            default:echo '系統錯誤';break;
                                    }}?></td>
                              <td><?=! empty($item['leverage'])? '1:'.$item['leverage'] : 0 ;?></td>
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