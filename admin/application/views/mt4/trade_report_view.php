<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="keywords" content="" />
<title>交易報表</title>

<link href="<?=ASSETS_CSS?>reset.css" rel="stylesheet" type="text/css">
<link href="<?=ASSETS_CSS?>common.css" rel="stylesheet" type="text/css">

<!--<link href="<?=ASSETS_CSS?>bootstrap.css" rel="stylesheet" type="text/css" media="all" />-->
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

<!--最新編譯和最佳化的 bootstrap3.0 CSS-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<!--引用bootstrap datepicker CSS-->
<link href="<?=ASSETS_CSS?>bootstrap-datepicker.css" rel="stylesheet">
<!--修改 datepicker style-->
<link href="<?=ASSETS_CSS?>datepicker_style.css" rel="stylesheet" type="text/css">

<!--fonts-->
<!--<link href="<?=ASSETS_CSS?>font_style.css" rel="stylesheet" type="text/css" media="all" />-->
<link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
<link href="<?=ASSETS_CSS?>font-awesome.min.css" rel="stylesheet" />

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


<style>
.dataTables_paginate{display:none;}
</style>

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
            <h1>交易報表</h1>
            
            <div class="contentGroup">                
                <!--文字start-->  
                <div class="Table_Layout">
                        <!--表格內容start-->
                        <div class="col-sm-12">
                                
                            <!-- Combined Table -->                                 
                            <table class="table table-bordered table-striped table-condensed table-hover table_Style_RWD_Padding">                                      
                                <tbody>
                                    <tr>
                                        <td class="txtC vertical_Align min_Width200">國家</td>
                                        <td>
                                            <select class="form-control form_control_style" id="">
                                                <option value="0">所有國家</option>
                                                <option value="1">1111</option>
                                                <option value="2">2222</option>                                      
                                            </select>
                                        </td>
                                    </tr>                                           
                                    <tr>
                                        <td class="txtC vertical_Align">代理商</td>
                                        <td>
                                            <select class="form-control form_control_style" id="">
                                                <option value="0">選擇代理商</option>
                                                <option value="1">1111</option>
                                                <option value="2">2222</option>                                      
                                            </select>
                                        </td>
                                    </tr>                                           
                                    <tr>
                                        <td class="txtC vertical_Align">客戶</td>
                                        <td>
                                            <select class="form-control form_control_style" id="">
                                                <option value="0">選擇客戶</option>
                                                <option value="1">1111</option>
                                                <option value="2">2222</option>                                      
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="border_Color_None padding0">
                                        <td colspan="2" class="border_Color_None padding0">
                                            <div class="btn_goBack_Group margin_Top20"> 
                                                 <div class="btn_Position disLine_Block">
                                                    <a class="btn btn-info btn_sm_Width Gradient_Gray" id="" href="#">即時交易報表</a>
                                                 </div>
                                                 <div class="btn_Position disLine_Block">
                                                    <a class="btn btn-info btn_sm_Width Gradient_Gray" id="BTN_hitory_transaction_Report" href="#">歷史交易報表</a>
                                                 </div>
                                             </div>
                                        </td>
                                    </tr>                                                                                                                                                                                 
                                </tbody>
                            </table>
                            
                           <div style="width:100%;">
                                <table class="table table-bordered table-striped table-condensed table-hover table_Style_RWD_Padding transaction_report_Group" id="transaction_Report_Group">                                       
                                    <tbody>
                                        <tr>
                                            <td class="txtC vertical_Align min_Width200">日期</td>
                                            <td>
                                                <select class="form-control form_control_style" id="">
                                                    <option value="0">關倉時間</option>
                                                    <option value="1">1111</option>
                                                    <option value="2">2222</option>                                      
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="txtC">
                                                    <div class="input_Daterange_Group_Width">
                                                        <div class="input-group input-daterange">
                                                            <input type="text" class="form-control" value="2012-04-05">
                                                            <span class="input-group-addon">~</span>
                                                            <input type="text" class="form-control" value="2012-04-19">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clr"></div>
                                            </td>                                                        
                                        </tr>
                                        <tr>
                                            <td class="txtC vertical_Align min_Width200">商品</td>
                                            <td>
                                                <select class="form-control form_control_style" id="">
                                                    <option value="0">商品</option>
                                                    <option value="1">1111</option>
                                                    <option value="2">2222</option>                                      
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="txtC vertical_Align min_Width200">類型</td>
                                            <td>
                                                <select class="form-control form_control_style" id="">
                                                    <option value="0">請選擇</option>
                                                    <option value="1">1111</option>
                                                    <option value="2">2222</option>                                      
                                            </select>
                                           </td>
                                        </tr>
                                        <tr>
                                            <td class="txtC vertical_Align min_Width200">附註</td>
                                            <td>
                                                <select class="form-control form_control_style" id="">
                                                    <option value="0">註釋查詢</option>
                                                    <option value="1">1111</option>
                                                    <option value="2">2222</option>                                      
                                                </select>
                                            </td>
                                        </tr>                                                                                                                                                                     
                                    </tbody>
                                </table>
                            </div>
                           
                            <table class="table table-bordered table-striped table-condensed table-hover table_Style_RWD_Padding">                                      
                                <tbody>
                                    <tr>
                                        <div class="btn_goBack_Group margin_Top20"> 
                                            <div class="btn_Position disLine_Block">
                                                <a class="btn btn-info btn_sm_Width Gradient_Brown" id="" href="#">
                                                <span class="glyphicon glyphicon-search"></span>
                                                    搜尋
                                                </a>
                                             </div>
                                             <div class="btn_Position disLine_Block">
                                                <a class="btn btn-info btn_sm_Width btn_xL_Width Gradient_Brown" id="" href="#">
                                                    搜尋最近三個月 
                                                </a>
                                             </div>
                                             <div class="btn_Position disLine_Block">
                                                <a class="btn btn-info btn_sm_Width Gradient_Orange" id="BTN_Download" href="#"> 
                                                <span class="glyphicon glyphicon-download-alt"></span>
                                                    下載Excel檔
                                                </a>
                                             </div>
                                        </div>   
                                    </tr>                                                                                                                 
                                </tbody>
                            </table>
                                                                    
                        </div>
                        <!--表格內容end---->
                        <div class="clr"></div>
                </div>
                <!--文字end---->
                               
                <div class="Table_Layout">
                    
                    <form id="transactions_Report_form" action="" method="post"> 
                        <!--表格內容start-->
                        <table id="myTable" class="cell-border display nowrap dataTable dtr-inline table_style" cellspacing="0" width="" role="grid" aria-describedby="example_info" style="width: 100%;">
                            <thead>
                                <tr role="row" class="BG_Gray">
                                    <th class="sorting Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 120px;">交易編號</th>
                                    <th id="" class="sorting Color_Gray min_Width" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="" style="width: 136px;">商品別</th>
                                    <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">手數</th>
                                    <th id="" class="sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 150px;">進場時間</th> 
                                    <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="">進場價位</th> 
                                    <th id="" class="sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1">出場時間</th>    
                                    <th id="" class="sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1">出場價位</th> 
                                    <th id="" class="sorting_asc Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="">獲利</th> 
                                    <th id="" class="sorting Color_Gray" tabindex="0" aria-controls="example" rowspan="1" colspan="1">附註</th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd parent">
                                    <td class="txt_Bold">1275587740</td>
                                    <td class="txt_Weight">GBPUSD</td>
                                    <td class="sorting_1">2.0</td>
                                    <td><span class="sorting_1 txt_Weight">2016/04/01 21:55:33</span></td>
                                    <td class="sorting_1">1.05115</td>
                                    <td> 2016/04/02 18:22:57</td>                                     
                                    <td>1.10547</td>  
                                    <td>
                                        <span class="sorting_1 txt_Weight">
                                            <div class="btn_Position">
                                                <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">-0.28</span>
                                            </div>
                                        </span>
                                    </td>
                                    <td></td>                                 
                                </tr>
                                <tr role="row" class="even">
                                    <td class="txt_Bold">1275587714</td>
                                    <td class="txt_Weight">SGDUSD</td>
                                    <td class="sorting_1">1.0</td>
                                    <td><span class="sorting_1 txt_Weight">2016/06/04 21:44:23</span></td>
                                    <td class="sorting_1">215.52</td>
                                    <td> 2016/06/11 19:42:33</td>                                     
                                    <td>1.10007</td>  
                                    <td>
                                        <span class="sorting_1 txt_Weight">
                                            <div class="btn_Position">
                                                <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">-9.25</span>
                                            </div>
                                        </span>
                                    </td>
                                    <td></td>   
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="txt_Bold">1270587745</td>
                                    <td class="txt_Weight">AUDUSD</td>
                                    <td class="sorting_1">0.02</td>
                                    <td><span class="sorting_1 txt_Weight">2016/07/11 15:12:11</span></td>
                                    <td class="sorting_1">1.0899</td>
                                    <td> 2016/07/11 16:11:21</td>                                     
                                    <td>1.52312</td>  
                                    <td>
                                        <span class="sorting_1 txt_Weight">
                                            <div class="btn_Position">
                                                <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">10.55</span>
                                            </div>
                                        </span>
                                    </td>
                                    <td></td>                                    
                                </tr>
                                <tr role="row" class="even">
                                    <td class="txt_Bold">1271657755</td>
                                    <td class="txt_Weight">GBPJPY</td>
                                    <td class="sorting_1">0.05</td>
                                    <td><span class="sorting_1 txt_Weight">2016/04/08 19:26:53</span></td>
                                    <td class="sorting_1">1.16688</td>
                                    <td> 2016/04/09 12:44:21</td>                                     
                                    <td>1.12327</td>  
                                    <td>
                                        <span class="sorting_1 txt_Weight">
                                            <div class="btn_Position">
                                                <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">-1002.8</span>
                                            </div>
                                        </span>
                                    </td>
                                    <td></td>                                     
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="txt_Bold">1275587756</td>
                                    <td class="txt_Weight">EURUSD</td>
                                    <td class="sorting_1">0</td>
                                    <td><span class="sorting_1 txt_Weight">2016/06/22 12:11:33</span></td>
                                    <td class="sorting_1">1.10575</td>
                                    <td> 2016/06/22 14:25:11</td>                                     
                                    <td>1.10547</td>  
                                    <td>
                                        <span class="sorting_1 txt_Weight">
                                            <div class="btn_Position">
                                                <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">-12.51</span>
                                            </div>
                                        </span>
                                    </td>
                                    <td></td>                                    
                                </tr>
                                <tr role="row" class="even">
                                    <td class="txt_Bold">1275587758</td>
                                    <td class="txt_Weight">EURUSD</td>
                                    <td class="sorting_1">0</td>
                                    <td><span class="sorting_1 txt_Weight">2016/07/14 21:31:21</span></td>
                                    <td class="sorting_1">1.10575</td>
                                    <td> 2016/07/15 15:21:32</td>                                     
                                    <td>1.10547</td>  
                                    <td>
                                        <span class="sorting_1 txt_Weight">
                                            <div class="btn_Position">
                                                <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">-63.28</span>
                                            </div>
                                        </span>
                                    </td>
                                    <td></td>                                     
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="txt_Bold">1275211721</td>
                                    <td class="txt_Weight">EURUSD</td>
                                    <td class="sorting_1">2.5</td>
                                    <td><span class="sorting_1 txt_Weight">2016/06/12 13:44:12</span></td>
                                    <td class="sorting_1">1.08232</td>
                                    <td> 2016/06/12 14:55:33</td>                                     
                                    <td>1.25237</td>  
                                    <td>
                                        <span class="sorting_1 txt_Weight">
                                            <div class="btn_Position">
                                                <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">-32.55</span>
                                            </div>
                                        </span>
                                    </td>
                                    <td></td>                                    
                                </tr>
                                <tr role="row" class="even">
                                    <td class="txt_Bold">1275921732</td>
                                    <td class="txt_Weight">CFDJPY</td>
                                    <td class="sorting_1">0.02</td>
                                    <td><span class="sorting_1 txt_Weight">2016/06/26 23:11:33</span></td>
                                    <td class="sorting_1">1.65501</td>
                                    <td> 2016/06/27 04:55:33</td>                                     
                                    <td>1.10427</td>  
                                    <td>
                                        <span class="sorting_1 txt_Weight">
                                            <div class="btn_Position">
                                                <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">-15.28</span>
                                            </div>
                                        </span>
                                    </td>
                                    <td></td>   
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="txt_Bold">1275234744</td>
                                    <td class="txt_Weight">EURUSD</td>
                                    <td class="sorting_1">0.3</td>
                                    <td><span class="sorting_1 txt_Weight">2016/05/11 13:55:33</span></td>
                                    <td class="sorting_1">1.14275</td>
                                    <td> 2016/05/11 18:22:58</td>                                     
                                    <td>1.12321</td>  
                                    <td>
                                        <span class="sorting_1 txt_Weight">
                                            <div class="btn_Position">
                                                <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">-80.55</span>
                                            </div>
                                        </span>
                                    </td>
                                    <td></td>                                    
                                </tr>
                                <tr role="row" class="even">
                                    <td class="txt_Bold">1275587323</td>
                                    <td class="txt_Weight">EURUSD</td>
                                    <td class="sorting_1">0.15</td>
                                    <td><span class="sorting_1 txt_Weight">2016/04/05 21:12:45</span></td>
                                    <td class="sorting_1">1.15022</td>
                                    <td> 2016/04/05 21:55:33</td>                                     
                                    <td>1.18887</td>  
                                    <td>
                                        <span class="sorting_1 txt_Weight">
                                            <div class="btn_Position">
                                                <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">-14.28</span>
                                            </div>
                                        </span>
                                    </td>
                                    <td></td>                                    
                                </tr>
                                 <tr role="row" class="odd">
                                    <td class="txt_Bold">1275587781</td>
                                    <td class="txt_Weight">EURUSD</td>
                                    <td class="sorting_1">0.15</td>
                                    <td><span class="sorting_1 txt_Weight">2016/07/07 12:55:33</span></td>
                                    <td class="sorting_1">1.10575</td>
                                    <td> 2016/07/07 18:55:33</td>                                     
                                    <td>1.10547</td>  
                                    <td>
                                        <span class="sorting_1 txt_Weight">
                                            <div class="btn_Position">
                                                <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">21.28</span>
                                            </div>
                                        </span>
                                    </td>
                                    <td></td>                                   
                                </tr>
                                <tr role="row" class="even">
                                    <td class="txt_Bold">1275514280</td>
                                    <td class="txt_Weight">EURUSD</td>
                                    <td class="sorting_1">0.5</td>
                                    <td><span class="sorting_1 txt_Weight">2016/03/03 14:55:33</span></td>
                                    <td class="sorting_1">1.10575</td>
                                    <td> 2016/03/04 21:55:33</td>                                     
                                    <td>1.13237</td>  
                                    <td>
                                        <span class="sorting_1 txt_Weight">
                                            <div class="btn_Position">
                                                <span class="btn btn-pink btn-sm cursor_Default disLine_Block" id="">21.28</span>
                                            </div>
                                        </span>
                                    </td>
                                    <td></td>                                     
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
                        </div>
                        <div class="clr"></div>
                        
                    </form>
                </div>
            </div>
        </div>          
               
        <!--結束--->

    </div>  
</div>
<!--content end-->


<!--footer start-->
<div class="footer">
    <div class="footer-class">
        <p>Copyright &copy; 2016 <a href="#">GALLOP Studio</a>. All rights reserved.</p>
    </div>
</div>
<!--footer end-->

<!--引用Google CDN jQuery-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<!--引用最新編譯和最佳化的bootstrap CDN jQuery-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!--引用 date table JS-->
<script type="text/javascript" src="<?=ASSETS_JS?>jquery.dataTables.min.js"></script>
<!--引用 RWD table JS-->
<script type="text/javascript" src="<?=ASSETS_JS?>dataTables.responsive.min.js"></script>

<!-- for bootstrap datepicker & ie8-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/es5-shim/4.1.1/es5-shim.min.js"></script>
<script src="<?=ASSETS_JS?>bootstrap-datepicker.min.js"></script>
<script src="<?=ASSETS_JS?>bootstrap-datepicker.zh-TW.min.js"></script>

<!-- -->
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


<!--修改 datepicker 的功能變Range-->
<script type="text/javascript">
$(function() {
    
    $('.input-daterange input').datepicker({
       language: 'zh-TW',//中文化
    
   });
   
    $('.input-daterange input').each(function() {
        $(this).datepicker("clearDates");
    });

});
</script>

<!--秀歷史交易報表-->
<script type="text/javascript">
$(function() {
    
    $("#BTN_hitory_transaction_Report").click(function(){

        $("#transaction_Report_Group").toggle();
   });


});
</script>

</body>
</html>
            