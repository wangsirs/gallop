<?php
//    $this->minify->css(array(
//        'js/thirdParty/plugins/datatables/dataTables.bootstrap.css',
//        'js/thirdParty/plugins/iCheck/flat/blue.css',
//        'js/thirdParty/plugins/iCheck/minimal/blue.css',
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.css'));

//    $this->minify->js(array(
//        'js/thirdParty/plugins/datatables/jquery.dataTables.min.js',
//        'js/thirdParty/plugins/datatables/dataTables.bootstrap.min.js',
//        'js/thirdParty/plugins/iCheck/icheck.min.js',
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.min.js'));
?>
<link rel="stylesheet" href="<?=ASSETS_CUSTOM_CSS?>gallop.min.css"> 
<!-- Page script -->
<script>
$(function() {
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
   $("#clientTable").DataTable(GetDataTableAttrs());
   LoadGeneral();
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
            'client_detail': 'mt4/client_mt4s?user_id=' + user_id
         },
         onshown: function(dialog){
           $("#mt4s_table").DataTable(GetDataTableAttrs());
           $('body').unmask();
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
            action: function(dialogRef) {
               dialogRef.close();
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
                     <h3><i class="fa fa-users"></i>&nbsp;<?=$page_title?></h3></li>
               </ul>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="clientTable" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
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
                        <td><a  onclick="showDetail('<?=$item[ 'user_id']?>');"><button type="button" class="btn btn-warning client-detail"><span class="glyphicon glyphicon-th-list"></span>&nbsp;明細</button></a></td>
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
