<script src="<?=ASSETS_CUSTOM_JS?>plugins/dataTables/datatables.min.js"></script>
<link href="<?=ASSETS_CUSTOM_CSS?>plugins/dataTables/datatables.min.css" rel="stylesheet">
<script>
$().ready(function() {
    $('table').DataTable();
})
</script>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a><h5>MT4 顧問管理</h5></a>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover " id="editable">
                        <thead>
                            <tr>
                                <th>顧問姓名</th>
                                <th>顧問編號</th>
                                <th>顧問暱稱</th>
                                <th>組織</th>
                                <th>狀態</th>
                                <th>槓桿</th>
                                <th>功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>aaa</td>
                                <td>aaa</td>
                                <td>aaa</td>
                                <td>aaa</td>
                                <td>aaa</td>
                                <td>aaa</td>
                                <td>aaa</td>
                            </tr>
                            <tr>
                                <td>bbb</td>
                                <td>bbb</td>
                                <td>bbb</td>
                                <td>bbb</td>
                                <td>bbb</td>
                                <td>bbb</td>
                                <td>bbb</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
