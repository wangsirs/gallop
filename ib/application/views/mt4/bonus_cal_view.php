<link rel="stylesheet" href="<?=ASSETS_CUSTOM_CSS?>gallop.min.css"> 
<script>
$(function() {
   $("#clientTable").DataTable(GetDataTableAttrs());
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
                     <h3><i class="fa fa-users"></i>&nbsp;<?=$page_title?></h3></li>
               </ul>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="clientTable" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                  <thead>
                     <tr>
                        <th>日期區間</th>
                        <th>客戶獎金</th>
                        <th>組織獎金</th>
                        <th>獎金合計</th>
                        <th>已提領獎金</th>
                        <th>未提領獎金合計</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if( ! empty($content)){foreach ($content as $num => $item):?>
                     <tr>
                        <td><?=! empty($item['user_id'])?$item['user_id'] : '' ;?></td>
                        <td><a role="button" class="client-profile" data-bind="<?=! empty($item['user_id'])?$item['user_id'] : '' ;?>"><span class="glyphicon glyphicon-search" style="margin-right: 0.5em;"></span><?=$item['first_name'].' '.$item['last_name'];?></a></td>
                        <td><?=! empty($item['ctime'])? $item['ctime'] : '' ;?></td>
                        <td><?=! empty($item['funding'])? $item['funding'] : 0 ;?></td>
                        <td><?=! empty($item['balance'])? $item['balance'] : 0 ;?></td>
                        <td>OK</td>
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
<!-- /.content -->
<!-- /.content-wrapper -->
<!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
