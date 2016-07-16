<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--兼容ie 使用chrome-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="" />
    <title>MT4顧問管理資料修改</title>

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
            <h1>MT4顧問管理資料修改</h1>

            <div class="contentGroup">
                <form id="customer_Account_Check_form" action="" method="post">
                    <!--文字start-->
                    <div class="Table_Layout">
                        <!--表格內容start-->
                        <table id="myTable" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                            <thead>
                                <tr role="row" class="BG_Gray">
                                    <th id="Open_an_Account" class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 136px;">帳號</th>
                                    <th id="Open_an_Account_Date" class="sorting_asc sorting_asc_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 216px;" aria-sort="ascending">開戶日期</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd parent">
                                    <td class="txt_Bold sorting_1">I75647</td>
                                    <td class="txt_Weight">2016/01/01</td>
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
                        <h2 class="txt_title_information">基本資料</h2>
                        <table id="myTable_information" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                            <thead>
                                <tr role="row" class="BG_Gray">
                                    <th id="customer_Name" class="sorting sorting_NONE Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">客戶姓名</th>
                                    <th id="Gender" class="sorting_asc sorting_asc_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" aria-sort="ascending">性別</th>
                                    <th id="Nationality" class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >國籍</th>
                                    <th id="customer_ID_Card_Number" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >身份證或護照號碼</th>
                                    <th id="Date_of_Birth" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >出生日期</th>
                                    <th id="customer_Bank_Account" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >銀行帳號</th>
                                    <th id="customer_Address_Number" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >居住電話號碼</th>
                                    <th id="customer_Phone_Number" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">手機號碼</th>
                                    <th id="customer_Address" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >居住地址</th>
                                    <th id="customer_Email" class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">電子郵件信箱</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd parent">
                                    <td class="txt_Bold sorting_1">王小明</td>
                                    <td>男</td>
                                    <td class="">台灣</td>
                                    <td class="">A123456789<br/>
                                    	<div class="btn_Position">
                                         <span class="btn btn-info btn-sm btn_Shadow disLine_Block btn_ID_Card_Number" id="ID_Card_Number">顯示資料</span>
                                     </div>
                                 </td>
                                 <td class="">2016/01/01</td>
                                 <td class="">1234567891234<br/>
                                     <div class="btn_Position">
                                         <span class="btn btn-info btn-sm btn_Shadow disLine_Block btn_Bank_Account_Number" id="Bank_Account_Number">顯示資料</span>
                                     </div>
                                 </td>
                                 <td class="">0912345678</td>
                                 <td class="">0912345678</td>
                                 <td class="">台北市xx區xx路xx巷xxx號xx樓<br/>
                                     <div class="btn_Position">
                                         <span class="btn btn-info btn-sm btn_Shadow disLine_Block btn_Living_Address" id="Living_Address">顯示資料</span>
                                     </div>
                                 </td>
                                 <td class="">t123456@xxxxxx.com.tw</td>
                             </tr>
                         </tbody>
                     </table>
                     <!--表格內容 個人資料end---->
                     <div class="clr"></div>

                     <!--身份證資料start-->
                     <div class="id_Card_Number_Group" id="ID_Card_Number_Group">
                        <div class="id_Card_details_Group">
                            <p class="Color_Gray txt_family txt_Weight disLine_Block">正面<br/><img src="<?=ASSETS_IMG?>id_Card.png" width="500" height="314" alt="身份證正面"></p>
                            <p class="Color_Gray txt_family txt_Weight disLine_Block">反面<br/><img src="<?=ASSETS_IMG?>02.jpg" width="500" height="314" alt="身份證反面"></p>
                        </div>
                        <div class="btn_Close_details_Position">
                            <a class="btn btn-info btn-sm btn_Close_details btn_Shadow btn_Close_details" href="#">關閉</a>
                        </div>
                    </div>
                        <!--身份證資料end--->

                        <!--銀行帳號start-->
                        <div class="id_Card_Number_Group_02" id="Bank_Account_Number_Group">
                            <div class="id_Card_details_Group">
                                <p class="Color_Gray txt_family txt_Weight disLine_Block">銀行存摺封面<br/><img src="<?=ASSETS_IMG?>sample_photo.jpg" width="564" height="316" alt="銀行存摺封面">
                                </p>
                            </div>
                            <div class="btn_Close_details_Position">
                                <a class="btn btn-info btn-sm btn_Close_details btn_Shadow btn_Close_details" href="#">關閉</a>
                            </div>
                        </div>
                        <!--銀行帳號end--->

                        <!--居住地start-->
                        <div class="id_Card_Number_Group_03" id="Living_Address_Group">
                            <div class="id_Card_details_Group">
                                <p class="Color_Gray txt_family txt_Weight disLine_Block">居住證明<br/><img src="<?=ASSETS_IMG?>sample_photo_02.jpg" width="564" height="316" alt="居住證明">
                                </p>
                            </div>
                            <div class="btn_Close_details_Position">
                              <a class="btn btn-info btn-sm btn_Close_details btn_Shadow btn_Close_details" href="#">關閉</a>
                          </div>
                      </div>
                        <!--居住地end--->

                    </div>
                    <!--文字end---->


                    <!--文字start-->
                    <div class="Table_Layout">
                        <!--表格內容 個人資料start-->
                        <h2 class="txt_title_information">Bank Office設定</h2>
                        <table id="myTable_Bank_Office" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                            <thead>
                                <tr role="row" class="BG_Gray">
                                    <th class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 250px;">介紹人代碼</th>
                                    <th class="sorting_asc sorting_asc_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" aria-sort="ascending">群組代碼</th>
                                    <th class="sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">佣金比例</th>
                                    <th class="dt-body-right sorting sorting_NONE Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" >狀態</th>
                                    <th class="dt-body-right sorting sorting_NONE Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">高階管理權限</th>
                                    <th class="dt-body-right sorting sorting_NONE Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="">開戶審核結果</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd parent">
                                    <td class="txt_Bold sorting_1">B36272</td>
                                    <td id="Group_number">GAM</td>
                                    <td  id="">10%</td>
                                    <td class="">
                                        <select class="form-control form_control_style select_Style" id="sboxit-1">
                                            <option value="0" selected="selected">Active</option>
                                            <option value="1">Inactive</option>
                                            <option value="2">Refused</option>
                                        </select>
                                    </td>
                                    <td class="">YES</td>
                                    <td class="">
                                        <div class="btn_Position">
                                            <button class="btn btn-info btn_Width Gradient_Blue" id="Agree">提交</button>
                                        </div>
                                        <div class="btn_Position">
                                            <button class="btn btn-danger btn_Width Gradient_Red" id="Refuse">歷史紀錄</button>
                                        </div>
                                        <div class="btn_Position">
                                            <button class="btn btn-danger btn_Width Gradient_Red" id="Refuse">返回</button>
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
    $(function () {
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

