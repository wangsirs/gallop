<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--兼容ie 使用chrome-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="" />
    <title>MT4客戶管理多帳號</title>

    <link href="<?=ASSETS_CSS?>reset.css" rel="stylesheet" type="text/css">
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
            <h1>MT4客戶開戶審核紀錄</h1>
            
            <div class="contentGroup">
                <!--文字start-->
                <div class="txt_Group">

                    <!----輸入框 start---->
                    <div class="col-sm-4">
                        <div class="form-group formGroup_Style">
                            <label class="control-label" for="BTN_enter"></label>
                            <input class="form-control form_control_style Blue_Box_Blur" name="BTN_enter" id="BTN_enter" data-validate="required" placeholder="帳號 姓名" />
                        </div>
                    </div>
                        <!----輸入框 end----->
                        
                        <!--新增button start-->
                        <div class="btn_Position disLine_Block">
                        <button class="btn btn-success btn_Width Gradient_Orange" id="BTN_Add"><i class="fa fa-search"></i>&nbsp;搜尋</button>
                        </div>
                        <!--新增button end---->
                        <div class="clr"></div>
                    </div>    
                    <!--文字end---->


                    <div class="Table_Layout">

                        <form id="customer_Manage_Multiple_Account_form" action="" method="post"> 
                            <!--表格內容start-->
                            <table id="myTable" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                                <thead>
                                    <tr role="row" class="BG_Gray">
                                       <th class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 40px;"></th>
                                       <th id="Edit_Account" class="sorting sorting_NONE Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">申請人帳號</th>
                                       <th id="Edit_Time" class="sorting_asc sorting_asc_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">姓名</th>
                                       <th id="Editor" class="sorting sorting_NONE Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1">國家</th> 
                                       <th id="Edit_status" class="sorting sorting_NONE Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1">狀態</th>                                   
                                       <th id="Edit_Feature" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 79px;">功能</th>
                                   </tr>
                               </thead>
                               <tbody>
                                <tr role="row" class="odd parent">
                                	<td class="txt_Bold">1</td>
                                    <td class="txt_Bold">3210695</td>
                                    <td class="sorting_1">范小小</td>
                                    <td><span class="sorting_1 txt_Weight">台灣</span></td>
                                    <td class="sorting_1">待審核</td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width">					
                                            <a type="button" class="btn btn-success bg-lg Gradient_Red btn_Delete" href="/mt4/ib_check_detail">查看資料</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">2</td>
                                    <td class="">5110012</td>
                                    <td class="sorting_1">王大明</td>
                                    <td><span class="sorting_1 txt_Weight">台灣</span></td>
                                    <td class="sorting_1">待審核</td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width">					
                                            <a type="button" class="btn btn-success bg-lg Gradient_Red btn_Delete" href="/mt4/ib_check_detail">查看資料</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">3</td>
                                    <td class="">3210684</td>
                                    <td class="sorting_1">林小華</td>
                                    <td><span class="sorting_1 txt_Weight">台灣</span></td>
                                    <td class="sorting_1">待審核</td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width">					
                                            <a type="button" class="btn btn-success bg-lg Gradient_Red btn_Delete" href="/mt4/ib_check_detail">查看資料</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">4</td>
                                    <td class="">3210695</td>
                                    <td class="sorting_1">范小小</td>
                                    <td><span class="sorting_1 txt_Weight">南極洲</span></td>
                                    <td class="sorting_1">待審核</td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width">					
                                            <a type="button" class="btn btn-success bg-lg Gradient_Red btn_Delete" href="/mt4/ib_check_detail">查看資料</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">5</td>
                                    <td class="">5110012</td>
                                    <td class="sorting_1">王大明</td>
                                    <td><span class="sorting_1 txt_Weight">南極洲</span></td>
                                    <td class="sorting_1">待審核</td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width">					
                                            <a type="button" class="btn btn-success bg-lg Gradient_Red btn_Delete" href="/mt4/ib_check_detail">查看資料</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">6</td>
                                    <td class="">3210695</td>
                                    <td class="sorting_1">林小華</td>
                                    <td><span class="sorting_1 txt_Weight">南極洲</span></td>
                                    <td class="sorting_1">待審核</td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width">					
                                            <a type="button" class="btn btn-success bg-lg Gradient_Red btn_Delete" href="/mt4/ib_check_detail">查看資料</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">7</td>
                                    <td class="">3210684</td>
                                    <td class="sorting_1">蔡小婷</td>
                                    <td><span class="sorting_1 txt_Weight">南極洲</span></td>
                                    <td class="sorting_1">待審核</td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width">					
                                            <a type="button" class="btn btn-success bg-lg Gradient_Red btn_Delete" href="/mt4/ib_check_detail">查看資料</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">8</td>
                                    <td class="">3210695</td>
                                    <td class="sorting_1">劉小雯</td>
                                    <td><span class="sorting_1 txt_Weight">西伯利亞</span></td>
                                    <td class="sorting_1">待審核</td>
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width">					
                                            <a type="button" class="btn btn-success bg-lg Gradient_Red btn_Delete" href="/mt4/ib_check_detail">查看資料</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="odd">
                                	<td class="txt_Bold">9</td>
                                    <td class="">5110012</td>
                                    <td class="sorting_1">林小華</td>
                                    <td><span class="sorting_1 txt_Weight">西伯利亞</span></td>
                                    <td class="sorting_1">待審核</td>                                    
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width">					
                                            <a type="button" class="btn btn-success bg-lg Gradient_Red btn_Delete" href="/mt4/ib_check_detail">查看資料</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr role="row" class="even">
                                	<td class="txt_Bold">10</td>
                                    <td class="">3210684</td>
                                    <td class="sorting_1">王大明</td>
                                    <td><span class="sorting_1 txt_Weight">西伯利亞</span></td>       
                                    <td class="sorting_1">待審核</td>                            
                                    <td class=" dt-body-right sorting_1">
                                        <div class="btn-group btn-group-justified btn_Width">					
                                            <a type="button" class="btn btn-success bg-lg Gradient_Red btn_Delete" href="/mt4/ib_check_detail">查看資料</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--表格內容end---->
                        
                        <div class="pagination_Group">
                        	<!--頁碼start-->
                            <ul id="pagination_sm" class="pagination-sm">
                                <li><a>first</a></li>
                                <li><a></a></li>
                                <li><a>1</a></li>
                                <li><a>2</a></li>
                                <li><a>3</a></li>
                                <li><a>4</a></li>
                                <li><a>5</a></li>
                                <li><a>6</a></li>
                                <li><a>7</a></li>
                                <li><a></a></li>
                                <li><a>last</a></li>
                            </ul>
                            <!--頁碼end---->
                            <span class="disLine_Block txt_family select_Box">
                                <select class="form-control form_control_style" id="sboxit-1">
                                    <option value="0">10</option>
                                    <option value="1">20</option>
                                    <option value="2">30</option>
                                    <option value="3">40</option>
                                    <option value="4">50</option>
                                </select> 	
                            </span>
                        </div>
                        <div class="clr"></div>
                        
                        <!--按鈕start-->
                        <div class="btn_goBack_Group">                           
                            <div class="btn_Position disLine_Block">
                            	<a class="btn btn-success btn_Width Gradient_Green" id="BTN_Add">確定</a>
                            </div>
                            <div class="btn_Position disLine_Block">
                            	<a class="btn btn-success btn_Width Gradient_Orange" id="BTN_Add" href="customer_Manage.html">返回</a>
                            </div>
                        </div>
                        <!--按鈕end---->
                    </form>                    

                </div>
            </div>
        </div>	

		<!--結束--->

	</div>	
</div>
<!--content end-->

<!--引用Google CDN jQuery-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

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
        order : [[ 0, 'asc' ]], // asc是遞增；第一欄排序功能是往下遞增
        responsive : true, //打開 #myTable表格RWD 的功能
        paging:   false,
        searching : false, //關掉原有的search功能
        info:     false,
        filter:     false,
        ordering :   true, //打開 排序功能
        language : {
            lengthMenu : "顯示 _MENU_ 筆記錄",
            zeroRecords : "無符合資料",
            info : "目前記錄：_START_ 至 _END_, 總筆數：_TOTAL_",
            infoEmpty : "目前記錄： 0 至 0 , 總筆數：0",
            paginate : {
                first : "第一頁",
                last : "最後一頁",
                next : "上頁",
                previous : "下頁"
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
