<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--兼容ie 使用chrome-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="" />
    <title>MT4客戶管理</title>


    <link href="<?=ASSETS_CSS?>common.css" rel="stylesheet" type="text/css">

    <link href="<?=ASSETS_CSS?>bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="<?=ASSETS_CSS?>style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <!--引用元素 css-->
    <link href="<?=ASSETS_CSS?>xenon-core.css" rel="stylesheet" type="text/css" media="all" />

    <!--引用 date table-->
    <link href="<?=ASSETS_CSS?>jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <!--引用 RWD table css-->
    <link href="<?=ASSETS_CSS?>responsive.dataTables.min.css" rel="stylesheet" type="text/css">
    <!--引用 bootstrap skin style-->
    <link href="<?=ASSETS_CSS?>bootstrap.min.css" rel="stylesheet"/>
    <!--引用兼容ie bootstrap ui css-->
    <link href="<?=ASSETS_CSS?>bootstrap-ie7.css" rel="stylesheet" type="text/css" media="all" />

    <!--fonts-->
    <link href="<?=ASSETS_CSS?>font_style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?=ASSETS_CSS?>font-awesome.min.css" rel="stylesheet" />

    <!--引用 表單樣式 css-->
    <link href="<?=ASSETS_CSS?>xenon-forms.css" rel="stylesheet" type="text/css">
    <!--引用 表單核心 css-->
    <link href="<?=ASSETS_CSS?>xenon-core.css" rel="stylesheet" type="text/css">
    <!--引用 下拉選單selectBoxIt css-->
    <link href="<?=ASSETS_CSS?>jquery.selectBoxIt.css" rel="stylesheet" type="text/css">
    <!--引用兼容ie bootstrap ui css-->
    <link href="<?=ASSETS_CSS?>bootstrap-ie7.css" rel="stylesheet" type="text/css" media="all" />

    <!--自寫 css-->
    <link href="<?=ASSETS_CSS?>menu.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>txt_style.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>table_style.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>button.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>form_style.css" rel="stylesheet" type="text/css">
    <!--修改引用pagination的樣式-->
    <link href="<?=ASSETS_CSS?>pagination_modity.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
  <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
  <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->

</head>
<body>

    <!--content start-->
    <div class="content content_BG">
     <div class="container">
         <!---開始-->
         <div class="wrapper">
            <h1>MT4客戶管理</h1>

            <div class="contentGroup">

                <div class="Table_Layout">

                    <form id="customer_Manage_form" action="" method="post">
                        <!--表格內容start-->
                        <table id="myTable" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                            <thead>
                                <tr role="row" class="BG_Gray">
                                	<th class="sorting Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1">客戶帳號</th>
                                    <th id="" class="sorting Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">客戶姓名</th>
                                    <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">開戶日期</th>
                                    <th id="" class="sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 150px;">累積入金</th>
                                    <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="">餘額</th>
                                    <th id="" class="sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1">狀態</th>
                                    <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="">明細</th>
                                    <th id="" class="dt-body-right sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 79px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd parent">
                                	<td class="txt_Bold">AE3212695</td>
                                    <td class="txt_Weight">范小小</td>
                                    <td class="sorting_1">2016/07/11 23:12:44</td>
                                    <td><span class="sorting_1">23212.000</span></td>
                                    <td class="sorting_1">1134.94</td>
                                    <td><span class="sorting_1">ok</span></td>
                                    <td class="sorting_1">
                                    	<div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Green btn_Multiple_Account_Manage" href="/mt4/client_manage_edit">明細</a>
                                        </div>
                                    </td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Blue btn_Modify" href="/mt4/client_manage_edit">修改</a>
                                        </div>
                                        <br/>
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Orange btn_Multiple_Account_Manage" href="/mt4/client_multi_account">多帳號管理</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE5110012</td>
                                    <td class="txt_Weight">王大明</td>
                                    <td class="sorting_1">2016/05/30 12:11:33</td>
                                    <td><span class="sorting_1">54213.000</span></td>
                                    <td class="sorting_1">16774.33</td>
                                    <td><span class="sorting_1">ok</span></td>
                                    <td class="sorting_1">
                                    	<div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Green btn_Multiple_Account_Manage" href="/mt4/client_manage_edit">明細</a>
                                        </div>
                                    </td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Blue btn_Modify" href="/mt4/client_manage_edit">修改</a>
                                        </div>
                                        <br/>
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Orange btn_Multiple_Account_Manage" href="/mt4/client_multi_account">多帳號管理</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE3210684</td>
                                    <td class="txt_Weight">王建超</td>
                                    <td class="sorting_1">2016/06/12 15:12:45</td>
                                    <td><span class="sorting_1">89850.000</span></td>
                                    <td class="sorting_1">53268.11</td>
                                    <td><span class="sorting_1">ok</span></td>
                                    <td class="sorting_1">
                                    	<div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Green btn_Multiple_Account_Manage" href="/mt4/client_manage_edit">明細</a>
                                        </div>
                                    </td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Blue btn_Modify" href="/mt4/client_manage_edit">修改</a>
                                        </div>
                                        <br/>
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Orange btn_Multiple_Account_Manage" href="/mt4/client_multi_account">多帳號管理</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3214595</td>
                                    <td class="txt_Weight">林安億</td>
                                    <td class="sorting_1">2016/01/01 20:33:05</td>
                                    <td><span class="sorting_1">800000.000</span></td>
                                    <td class="sorting_1">2389.21</td>
                                    <td><span class="sorting_1">ok</span></td>
                                    <td class="sorting_1">
                                    	<div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Green btn_Multiple_Account_Manage" href="/mt4/client_manage_edit">明細</a>
                                        </div>
                                    </td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Blue btn_Modify" href="/mt4/client_manage_edit">修改</a>
                                        </div>
                                        <br/>
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Orange btn_Multiple_Account_Manage" href="/mt4/client_multi_account">多帳號管理</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE5110412</td>
                                    <td class="txt_Weight">陳宣旭</td>
                                    <td class="sorting_1">2016/06/01 21:11:13</td>
                                    <td><span class="sorting_1">53457.000</span></td>
                                    <td class="sorting_1">1111.94</td>
                                    <td><span class="sorting_1">ok</span></td>
                                    <td class="sorting_1">
                                    	<div class="btn-group btn-group-justified btn_Width btn_Width_100 ">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Green btn_Multiple_Account_Manage" href="/mt4/client_manage_edit">明細</a>
                                        </div>
                                    </td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Blue btn_Modify" href="/mt4/client_manage_edit">修改</a>
                                        </div>
                                        <br/>
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Orange btn_Multiple_Account_Manage" href="/mt4/client_multi_account">多帳號管理</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3864695</td>
                                    <td class="txt_Weight">林易連</td>
                                    <td class="sorting_1">2016/01/01 14:15:22</td>
                                    <td><span class="sorting_1">78900.000</span></td>
                                    <td class="sorting_1">23422.94</td>
                                    <td><span class="sorting_1">ok</span></td>
                                    <td class="sorting_1">
                                    	<div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Green btn_Multiple_Account_Manage" href="/mt4/client_manage_edit">明細</a>
                                        </div>
                                    </td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Blue btn_Modify" href="/mt4/client_manage_edit">修改</a>
                                        </div>
                                        <br/>
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Orange btn_Multiple_Account_Manage" href="/mt4/client_multi_account">多帳號管理</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE3238484</td>
                                    <td class="txt_Weight">蔡小婷</td>
                                    <td class="sorting_1">2016/07/01 14:14:15</td>
                                    <td><span class="sorting_1t">50000.000</span></td>
                                    <td class="sorting_1">48952.94</td>
                                    <td><span class="sorting_1">ok</span></td>
                                    <td class="sorting_1">
                                    	<div class="btn-group btn-group-justified btn_Width btn_Width_100 ">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Green btn_Multiple_Account_Manage" href="/mt4/client_manage_edit">明細</a>
                                        </div>
                                    </td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Blue btn_Modify" href="/mt4/client_manage_edit">修改</a>
                                        </div>
                                        <br/>
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Orange btn_Multiple_Account_Manage" href="/mt4/client_multi_account">多帳號管理</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3218425</td>
                                    <td class="txt_Weight">劉小雯</td>
                                    <td class="sorting_1">2016/06/30 23:55:11</td>
                                    <td><span class="sorting_1">908821.000</span></td>
                                    <td class="sorting_1">8321.94</td>
                                    <td><span class="sorting_1">ok</span></td>
                                    <td class="sorting_1">
                                    	<div class="btn-group btn-group-justified btn_Width btn_Width_100 ">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Green btn_Multiple_Account_Manage" href="/mt4/client_manage_edit">明細</a>
                                        </div>
                                    </td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Blue btn_Modify" href="/mt4/client_manage_edit">修改</a>
                                        </div>
                                        <br/>
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Orange btn_Multiple_Account_Manage" href="/mt4/client_multi_account">多帳號管理</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE4210012</td>
                                    <td class="txt_Weight">王華紹</td>
                                    <td class="sorting_1">2016/01/01 12:55:33</td>
                                    <td><span class="sorting_1">885511.592</span></td>
                                    <td class="sorting_1">75065.56</td>
                                    <td><span class="sorting_1s">ok</span></td>
                                    <td class="sorting_1">
                                    	<div class="btn-group btn-group-justified btn_Width btn_Width_100 ">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Green btn_Multiple_Account_Manage" href="/mt4/client_manage_edit">明細</a>
                                        </div>
                                    </td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Blue btn_Modify" href="/mt4/client_manage_edit">修改</a>
                                        </div>
                                        <br/>
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Orange btn_Multiple_Account_Manage" href="/mt4/client_multi_account">多帳號管理</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE3252984</td>
                                    <td class="txt_Weight">劉本華</td>
                                    <td class="sorting_1">2016/01/01 06:12:44</td>
                                    <td><span class="sorting_1">951503.82</span></td>
                                    <td class="sorting_1">13877.94</td>
                                    <td><span class="sorting_1">ok</span></td>
                                    <td class="sorting_1">
                                    	<div class="btn-group btn-group-justified btn_Width btn_Width_100 ">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Green btn_Multiple_Account_Manage" href="/mt4/client_manage_edit">明細</a>
                                        </div>
                                    </td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg btn_Width_100 Gradient_Blue btn_Modify" href="/mt4/client_manage_edit">修改</a>
                                        </div>
                                        <br/>
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Orange btn_Multiple_Account_Manage" href="/mt4/client_multi_account">多帳號管理</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">AE3210004</td>
                                    <td class="txt_Weight">李大木</td>
                                    <td class="sorting_1">2016/01/01 09:12:43</td>
                                    <td><span class="sorting_1">9080630.000</span></td>
                                    <td class="sorting_1">12383.66</td>
                                    <td><span class="sorting_1">ok</span></td>
                                    <td class="sorting_1">
                                    	<div class="btn-group btn-group-justified btn_Width btn_Width_100 ">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Green btn_Multiple_Account_Manage" href="/mt4/client_manage_edit">明細</a>
                                        </div>
                                    </td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Blue btn_Modify" href="/mt4/client_manage_edit">修改</a>
                                        </div>
                                        <br/>
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Orange btn_Multiple_Account_Manage" href="/mt4/client_multi_account">多帳號管理</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">AE9823684</td>
                                    <td class="txt_Weight">王喬</td>
                                    <td class="sorting_1">2016/01/01 10:22:33</td>
                                    <td><span class="sorting_1">79213.000</span></td>
                                    <td class="sorting_1">2325.22</td>
                                    <td><span class="sorting_1">ok</span></td>
                                    <td class="sorting_1">
                                    	<div class="btn-group btn-group-justified btn_Width btn_Width_100 ">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Green btn_Multiple_Account_Manage" href="/mt4/client_manage_edit">明細</a>
                                        </div>
                                    </td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Blue btn_Modify" href="/mt4/client_manage_edit">修改</a>
                                        </div>
                                        <br/>
                                        <div class="btn-group btn-group-justified btn_Width btn_Width_100">
                                            <a type="button" class="btn btn-success bg-lg Gradient_Orange btn_Multiple_Account_Manage" href="/mt4/client_multi_account">多帳號管理</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--表格內容end---->

                    </form>
                </div>
            </div>
        </div>

		<!--結束--->

	</div>
</div>
<!--content end-->

<script type="text/javascript" src="<?=ASSETS_JS?>bootstrap.min.js"></script>

<!--引用 date table JS-->
<script type="text/javascript" src="<?=ASSETS_JS?>jquery.dataTables.min.js"></script>
<!--引用 RWD table JS-->
<script type="text/javascript" src="<?=ASSETS_JS?>dataTables.responsive.min.js"></script>

<!--引用 bootstrap 頁碼 style-->
<script type="text/javascript" src="<?=ASSETS_JS?>jquery.pagination.js"></script>

<!--修改 引用的data table 的功能-->
<script>
    $(document).ready( function () {
		/*$(document).ready(function() {
			$('#myTable').DataTable( {
				responsive : true, //打開 #myTable表格RWD 的功能
				paging:   false, //關掉 檔案原來的頁碼功能
				ordering: false, //關掉 檔案原來的 排序功能
				info:     false //關掉 檔案原來的info功能
			} );
		} );*/
		$('#myTable').DataTable({ //讓#myTable 執行DataTable 函式套件
        // order : [[ 0, 'asc' ]], asc是遞增；第一欄排序功能是往下遞增
        responsive : true, //打開 #myTable表格RWD 的功能
        paging:   true,
        searching : true, //打開原有的search功能
        info:     true,
        filter:     true,
        ordering :   true, //打開 排序功能
        language : {
            lengthMenu : "顯示 _MENU_ 筆記錄",
            zeroRecords : "無符合資料",
            info : "目前記錄：_START_ 至 _END_, 總筆數：_TOTAL_",
            infoEmpty : "目前記錄： 0 至 0 , 總筆數：0",
            paginate : {
                first : "第一頁",
                last : "最後一頁",
                next : "Next",
                previous : "Previous"
            }
        }
    });

    });
</script>

<!--修改 引用的bootstrap 頁碼 的功能-->
<script>
    $(function() {
	$('#pagination_sm').pagination({ //讓#pagination_sm 執行pagination 函式套件
		first:'«', //修改first為 << 頁碼文字
		last:'»', //修改last為 >> 頁碼文字
        totalPages: 20, //總頁數20頁
        visiblePages: 2, //顯示2頁
        onPageClick: function (event, page) { //按頁碼之後會執行的事
            $('#page-content_sm').text('Page ' + page);
        }
    });
});
</script>

</body>
</html>

