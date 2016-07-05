<script>
  $(document).ready(function(){
  	recursive_expand_tree($('.treeview') , <?= ! empty($data['data']) ? json_encode($data['data']) : json_encode(array());?>);
  });

  /* 遞迴函數，如有children則持續append */
  function recursive_expand_tree(elem, data){
    elem.append('<ul class="treeview-menu"></ul>');
    for(var ib_id in data){
      tmp = data[ib_id];
      if(! tmp.hasOwnProperty('children')){
        appendStr = '<li id="' +
         ib_id + 
         '"><a style="cursor:pointer;"><i class="fa fa-user"><span style="margin-left:0.5em;">' +
         tmp['first_name'] + ' ' + tmp['last_name'] +
        '</span></i></a></li>';

        elem.children('ul').append(appendStr);
      }else{
        appendStr = '<li id="' +
         ib_id + 
         '"><a style="cursor:pointer;"><i class="fa fa-user"><span style="margin-left:0.5em;">' + 
         tmp['first_name'] + ' ' + tmp['last_name'] +
         '</span></i><i class="fa fa-angle-left pull-right"></i></a></li>';

        elem.children('ul').append(appendStr);
        recursive_expand_tree($('#' + ib_id), tmp.children);
      }
    }
  }
</script>
<ul class="sidebar-menu">
    <li class="header">業務組織圖</li>
    <li class="treeview" style="cursor:pointer;">
        <a>
           <i class="fa fa-user"></i> <span id="tree_head">{username}</span><i class="fa fa-angle-left pull-right"></i>
        </a>
    </li>
</ul>