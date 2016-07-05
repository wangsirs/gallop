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
//        'js/thirdParty/plugins/loadMask/jquery.loadmask.min.js',
//        'js/jquery.cookie.js'));
?>
<!-- Page script -->
<script>
    $(function() {
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
          location.href = '/mt4/ib_list';
      else
          location.replace('/mt4/ib_list?ib_id=' + ib_id);
  });

    $('.client-profile')
    .click(function() {
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
    <th>顧問帳號</th>
    <th>顧問姓名</th>
    <th>開戶日期</th>
    <th>佣金比例</th>
    <th>狀態</th>
</tr>
</thead>
<tbody>
   <?php if( ! empty($content)){foreach ($content as $num => $item):?>
       <tr>
        <td><?=! empty($item['ib_id'])?$item['ib_id'] : '' ;?></td>
        <td><a role="button" class="client-profile" data-bind="<?=! empty($item['ib_id'])?$item['ib_id'] : '' ;?>"><span class="glyphicon glyphicon-search" style="margin-right: 0.5em;"></span><?=$item['first_name'].' '.$item['last_name'];?></a></td>
        <td><?=! empty($item['ctime'])? $item['ctime'] : '' ;?></td>
        <td><?=! empty($item['scale'])? $item['scale'].' %' : '0 %' ;?></td>
        <td><?php if(isset($item['approve'])){
         switch($item['approve']){
             case 0:'審核中';break;
             case 1:'批准';break;
             case 2:'否決';break;
             default:'系統錯誤';break;
         }}?></td>
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
