<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="" />
    <title>MT4大IB群組開戶設定</title>

    <link href="<?=ASSETS_CSS?>reset.css" rel="stylesheet" type="text/css">
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="<?=ASSETS_CSS?>style.css" rel="stylesheet" type="text/css" media="all" />	
    <!--//theme-style-->
    <!--引用元素 css-->
    <link href="<?=ASSETS_CSS?>xenon-core.css" rel="stylesheet" type="text/css" media="all" />

    <!--引用 bootstrap skin style-->
    <link href="<?=ASSETS_CSS?>bootstrap.min.css" rel="stylesheet"/>
    <!---->
    <link href="<?=ASSETS_CSS?>linecons.css" rel="stylesheet" type="text/css">
    <!--引用兼容ie bootstrap ui css-->
    <link href="<?=ASSETS_CSS?>bootstrap-ie7.css" rel="stylesheet" type="text/css" media="all" />
    <!--引用最新編譯和最佳化的 bootstrap3.0 CSS-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />

    <!--自寫 css-->
    <link href="<?=ASSETS_CSS?>common.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>menu.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>txt_style.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>table_style.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>button.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>form_style.css" rel="stylesheet" type="text/css">

    <!--fonts-->
    <!--<link href="<?=ASSETS_CSS?>font_style.css" rel="stylesheet" type="text/css" media="all" />-->
    <link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
    <link href="<?=ASSETS_CSS?>font-awesome.min.css" rel="stylesheet" />

    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

      <!--使IE5,IE6,IE7,IE8兼容到IE9模式-->
<!--[if lt IE 9]>
  <script src=”http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js”></script>
  <![endif]-->

</head>
<body>
    <!--content start-->
    <div class="content content_BG">
       <div class="container">
           <!---開始-->
           <div class="wrapper">
            <h1>MT4大IB群組開戶設定</h1>
            
            <!--step start-->
            <div class="txtC margin_Top margin_Bottom margin_Left margin_Right10">
            	<img src="<?=ASSETS_IMG?>step_02.png" width="679" height="54">
            </div>
            <!--step end---->

            <div class="contentGroup">
                <form id="ib_Group_Account_form" action="" method="post"> 
                    <!--文字start-->
                    <div class="Table_Layout">
                        <!--表格內容start-->
                        <div class="col-sm-12">

                         <!-- Combined Table -->									
                         <table class="table table-bordered table-striped table-condensed table-hover">										
                            <tbody>
                               <tr>
                                  <td class="txtC vertical_Align min_Width100">付款方式</td>
                                  <td>                                        	
                                   <label class="margin_Top">                                    	
                                       <input type="checkbox" class="cbr cbr-gray">Bank
                                   </label>
                                   <br/>
                                   <label class="margin_Top margin_Bottom15">                                    	
                                       <input type="checkbox" class="cbr cbr-gray">銀聯卡
                                   </label>
                               </td>
                           </tr>																					
                    <tr>
                      <td class="txtC vertical_Align">提款方式</td>
                      <td>
                       <label  class="margin_Top">                                    	
                           <input type="checkbox" class="cbr cbr-gray">Bank
                       </label>
                       <br/>
                       <label  class="margin_Top">                                    	
                           <input type="checkbox" class="cbr cbr-gray">MT4帳戶帳號
                       </label>
                       <br/>
                       <label  class="margin_Top margin_Bottom15">                                    	
                           <input type="checkbox" class="cbr cbr-gray">銀聯卡
                       </label>
                   </td>
               </tr>
               <tr>
                <td class="txtC vertical_Align">狀態</td>
                <td>
                   <select class="form-control form_control_style margin_Top margin_Bottom15" id="" style="width:200px;">
                    <option value="1">同意</option>
                    <option value="2">不同意</option>
                </select>
            </td>
        </tr>
    </tbody>
</table>								
</div>
<!--表格內容end---->
<div class="clr"></div>
</div>
<!--文字end---->                    

<!--按鈕start-->
<div class="btn_goBack_Group margin_Top20"> 
   <div class="btn_Position disLine_Block">
    <a class="btn btn-info btn_sm_Width Gradient_Orange" id="BTN_Reduction" href="/mt4/gib_reg_1">返回</a>
</div>
<div class="btn_Position disLine_Block">
    <a class="btn btn-info btn_sm_Width Gradient_Green" id="BTN_Delete" href="/mt4/gib_reg_3">下一步</a>
</div>
</div>
<!--按鈕end---->
</form>
</div>

</div>

		<!--結束--->

	</div>	
</div>
<!--content end-->
<!--引用Google CDN jQuery-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<!--引用最新編譯和最佳化的bootstrap CDN jQuery-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!--引用 date table JS-->
<!--<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>-->
<!--引用 RWD table JS-->
<!--<script type="text/javascript" src="js/dataTables.responsive.min.js"></script>-->

<!--引用 CKEditor CDN JS-->
<script type="text/javascript" src="http://cdn.ckeditor.com/4.5.1/full/ckeditor.js"></script>
<!--<script type="text/javascript" src="js/ckeditor.js"></script>-->

<!-- menu -->
<script src="js/menu.js"></script> 
<!--phone_Menu手機版選單-->
<script type="text/javascript" src="js/phone_Menu.js"></script>

<!--修改 引用的data table 的功能-->
<script>
//$(document).ready( function () {
		/*$(document).ready(function() {
//			$('#myTable').DataTable( {
//				responsive : true, //打開 #myTable表格RWD 的功能
//				paging:   false, //關掉 檔案原來的頁碼功能
//				ordering: false, //關掉 檔案原來的 排序功能
//				info:     false //關掉 檔案原來的info功能
//			} );
//		} );*/
		//$('#myTable').DataTable({ //讓#myTable 執行DataTable 函式套件
//        //order : [[ 3, 'desc' ]], // asc是遞增；第四欄排序功能是往下遞減
//       responsive : true, //打開 #myTable表格RWD 的功能
//		paging:   false,
//        searching : false, //關掉原有的search功能
//		info:     false,
//		filter:     false,
//        ordering :   false, //關掉 排序功能
//        language : {
//            lengthMenu : "顯示 _MENU_ 筆記錄",
//            zeroRecords : "無符合資料",
//            info : "目前記錄：_START_ 至 _END_, 總筆數：_TOTAL_",
//            infoEmpty : "目前記錄： 0 至 0 , 總筆數：0",
//            paginate : {
//                first : "第一頁",
//                last : "最後一頁",
//                next : "上頁",
//                previous : "下頁"
//            }
//        }
//    });
//		
//	
//	$('#myTable_information').DataTable({ //讓#myTable 執行DataTable 函式套件
//        //order : [[ 3, 'desc' ]], // asc是遞增；第四欄排序功能是往下遞減
//        responsive : true, //打開 #myTable表格RWD 的功能
//		paging:   false,
//        searching : false, //關掉原有的search功能
//		info:     false,
//		filter:     false,
//        ordering :   false, //關掉 排序功能
//        language : {
//            lengthMenu : "顯示 _MENU_ 筆記錄",
//            zeroRecords : "無符合資料",
//            info : "目前記錄：_START_ 至 _END_, 總筆數：_TOTAL_",
//            infoEmpty : "目前記錄： 0 至 0 , 總筆數：0",
//            paginate : {
//                first : "第一頁",
//                last : "最後一頁",
//                next : "上頁",
//                previous : "下頁"
//            }
//        },
//		 fnInitComplete : function () { //等 datatable 執行完，再執行
//		},
//        
//    });
//});
//</script>

<script>
	CKEDITOR.replace( 'content_ckEditor', {
		//width:600,//設定內容編輯器寬度
	});
</script>


</body>
</html>
