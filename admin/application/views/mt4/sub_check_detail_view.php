<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--兼容ie 使用chrome-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="" />
    <title>MT4子帳號開戶審核</title>

    <link href="<?=ASSETS_CSS?>reset.css" rel="stylesheet" type="text/css">
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

    <!--自寫 css-->
    <link href="<?=ASSETS_CSS?>common.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>menu.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>txt_style.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>table_style.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>button.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>form_style.css" rel="stylesheet" type="text/css">

    <!--fonts-->
    <link href="<?=ASSETS_CSS?>font_style.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
    <link href="<?=ASSETS_CSS?>font-awesome.min.css" rel="stylesheet" />

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
            <h1>子帳號開戶審核</h1>

            <div class="contentGroup">
                <form id="customer_Account_Check_form" action="" method="post">
                    <!--文字start-->
                    <div class="Table_Layout">
                        <!--表格內容start-->
                        <h2 class="txt_title_information">申請人資料</h2>
                        <table id="myTable" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                            <thead>
                                <tr role="row" class="BG_Gray">
                                    <th id="Open_an_Account" class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 136px;">姓名</th>
                                    <th id="Open_an_Account_Date" class="sorting_asc sorting_asc_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 216px;" aria-sort="ascending">電子信箱</th>
                                    <th id="Open_an_Account_Type" class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 102px;">護照或身份證號碼</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd parent">
                                    <td class="txt_Bold sorting_1">王大明</td>
                                    <td class="txt_Weight">p1234@gmail.com</td>
                                    <td class="">Y123111999</td>
                                </tr>
                            </tbody>
                        </table>
                        <!--表格內容end---->
                        <div class="clr"></div>
                    </div>
                    <!--文字end---->

                    <!--文字start-->
                    <div class="Table_Layout">
                        <!--表格內容 個人資料start-->
                        <h2 class="txt_title_information">新子帳戶設置</h2>
                        <table id="myTable_information" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                            <thead>
                                <tr role="row" class="BG_Gray">
                                    <th id="customer_Name" class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">&nbsp;</th>
                                    <th id="Gender" class="sorting_asc sorting_asc_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" aria-sort="ascending">請填管理者MT4帳號</th>
                                    <th id="Nationality" class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >*請選擇槓桿比例</th>
                                    <th id="customer_ID_Card_Number" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >註記</th>
                                    <th id="Date_of_Birth" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >*MT4 ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd parent">
                                    <td class="txt_Bold sorting_1">
                                    	<label>
                                            <input type="checkbox" class="cbr cbr-gray">授權第三方管理我的帳戶
                                        </label>
                                    </td>
                                    <td>
                                    	<input class="form-control form_control_style" name="Manager_MT4_Account" id="Manager_MT4_Account" data-validate="required" placeholder="請填管理者MT4帳號">
                                    </td>
                                    <td class="">
                                    	<select class="form-control form_control_style" id="">
                                            <option value="0">請選擇</option>
                                            <option value="1">1111</option>
                                            <option value="2">2222</option>
                                            <option value="3">3333</option>
                                        </select>
                                    </td>
                                    <td class="">
                                    	<input class="form-control form_control_style" name="Sub_Account_Notice" id="Sub_Account_Notice" data-validate="required" placeholder="顧客可對此子帳號作使用註記 ">
                                    </td>
                                    <td class="">
                                    	<input class="form-control form_control_style" name="Agents_number" id="Agents_number" data-validate="required" placeholder="3210778">
                                        <span class="txt_family txt_Weight txt_Red">帳號設定範圍1000~999999999</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--表格內容 個人資料end---->
                        <div class="clr"></div>

                    </div>
                    <!--文字end---->


                    <!--文字start-->
                    <div class="Table_Layout">
                        <!--表格內容 個人資料start-->
                        <h2 class="txt_title_information">Back Office設定</h2>
                        <table id="myTable_Bank_Office" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                            <thead>
                                <tr role="row" class="BG_Gray">
                                    <th class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 250px;">幣別</th>
                                    <th class="sorting_asc sorting_asc_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" aria-sort="ascending">啟用狀態</th>
                                    <th class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">群組代碼</th>
                                    <th class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">開戶審核結果</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd parent">
                                    <td class="txt_Bold sorting_1">
                                    	<select class="form-control form_control_style" id="">
                                            <option value="0">USD</option>
                                            <option value="1">USD</option>
                                            <option value="2">USD</option>
                                            <option value="3">USD</option>
                                        </select>
                                    </td>
                                    <td id="Group_number">
                                    	<select class="form-control form_control_style" id="">
                                            <option value="0">啟用</option>
                                            <option value="1">未啟用</option>
                                        </select>
                                    </td>
                                    <td  id="">
                                        <select class="form-control form_control_style" id="">
                                            <option value="0">GAM</option>
                                            <option value="1">未啟用</option>
                                        </select>
                                    </td>
                                    <td class="">
                                    	<div class="btn_Position">
                                            <button class="btn btn-info btn_Width Gradient_Blue" id="Agree">同意</button>
                                        </div>
                                        <div class="btn_Position">
                                            <button class="btn btn-danger btn_Width Gradient_Red" id="Refuse">拒絕</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--表格內容 個人資料end---->
                        <div class="clr"></div>
                    </div>
                    <!--文字end---->
                </form>
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
        //order : [[ 3, 'desc' ]], // asc是遞增；第四欄排序功能是往下遞減
        responsive : true, //打開 #myTable表格RWD 的功能
        paging:   false,
        searching : false, //關掉原有的search功能
        info:     false,
        filter:     false,
        ordering :   false, //關掉 排序功能
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


	$('#myTable_Bank_Office').DataTable({ //讓#myTable 執行DataTable 函式套件
        //order : [[ 3, 'desc' ]], // asc是遞增；第四欄排序功能是往下遞減
        responsive : true, //打開 #myTable表格RWD 的功能
        paging:   false,
        searching : false, //關掉原有的search功能
        info:     false,
        filter:     false,
        ordering :   false, //關掉 排序功能
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


	$('#myTable_information').DataTable({ //讓#myTable 執行DataTable 函式套件
        //order : [[ 3, 'desc' ]], // asc是遞增；第四欄排序功能是往下遞減
        responsive : true, //打開 #myTable表格RWD 的功能
        paging:   false,
        searching : false, //關掉原有的search功能
        info:     false,
        filter:     false,
        ordering :   false, //關掉 排序功能
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
        },
        fnInitComplete : function () { //等 datatable 執行完，再執行
            //身份證
            $(".btn_ID_Card_Number").click(function(){ //顯示資料按鈕用class 去綁
                $("#ID_Card_Number_Group").toggle(); //切換
				$("#Bank_Account_Number_Group , #Living_Address_Group").hide(); //其他兩個關
            });
            $(".btn_Close_details").click(function(){
                $("#ID_Card_Number_Group").hide();
            });

            //銀行帳號
            $(".btn_Bank_Account_Number").click(function(){
                $("#Bank_Account_Number_Group").toggle();
                $("#ID_Card_Number_Group , #Living_Address_Group").hide();
            });
            $(".btn_Close_details").click(function(){
                $("#Bank_Account_Number_Group").hide();
            });

            //居住地
            $(".btn_Living_Address").click(function(){
                $("#Living_Address_Group").toggle();
                $("#ID_Card_Number_Group , #Bank_Account_Number_Group").hide();
            });
            $(".btn_Close_details").click(function(){
                $("#Living_Address_Group").hide();
            });
        }
    });
});
</script>

</body>
</html>

