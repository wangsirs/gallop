<!--<script src="<?=ASSETS_JS?>thirdParty/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=ASSETS_JS?>thirdParty/plugins/datatables/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="<?=ASSETS_JS?>thirdParty/plugins/datatables/dataTables.bootstrap.css">
 iCheck for checkboxes and radio inputs 
<link rel="stylesheet" href="<?=ASSETS_JS?>thirdParty/plugins/iCheck/all.css">
<link rel="stylesheet" href="<?=ASSETS_JS?>thirdParty/plugins/iCheck/flat/blue.css">
  load mask 
 <link href="<?=ASSETS_JS?>thirdParty/plugins/loadMask/jquery.loadmask.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="<?=ASSETS_JS?>thirdParty/plugins/loadMask/jquery.loadmask.min.js"></script>  -->


<link rel="stylesheet" href="<?=ASSETS_CUSTOM_CSS?>gallop.min.css"> 
<!-- Page script -->
<script>
$(function() {
   $('.client-detail').click(function() {
      $('body').mask('載入資料中...');
      var user_id = $(this).attr('data-bind');
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
            'client_detail': 'mt4/client_mt4s?user_id=' + user_id
         },
         onshown: function(dialog){
           $("#mt4s_table").DataTable(GetDataTableAttrs());
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

   $('.client-profile')
      .click(function() {
         $('body').mask('載入資料中...');
         var user_id = $(this).attr('data-bind');
         BootstrapDialog.show({
            title: 'MT4客戶基本資料',
            type: BootstrapDialog.TYPE_PRIMARY,
            size: BootstrapDialog.SIZE_WIDE,
            message: function(dialog) {
               var $message = $('<div></div>');
               var pageToLoad = dialog.getData('client_profile');
               $message.load(pageToLoad);

               return $message;
            },
            data: {
               'client_profile': 'mt4/client_profile?user_id=' + user_id
            },
            onshown: function(dialog){
              $('body').unmask();
            },
            cssClass: 'client-profile-modal',
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
               <table id="clientTable" class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>客戶帳號</th>
                        <th>客戶姓名</th>
                        <th>開戶日期</th>
                        <th>累積入金</th>
                        <th>餘額</th>
                        <th>狀態</th>
                        <th>明細</th>
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
                        <td><button type="button" class="btn btn-warning client-detail" data-bind="<?=$item['user_id']?>"><span class="glyphicon glyphicon-th-list"></span>&nbsp;明細</button></td>
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
</div>
<!-- /.content-wrapper -->
<!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
