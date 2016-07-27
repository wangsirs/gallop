<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="" />
    <title>RD監控畫面功能</title>

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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/<?=ASSETS_CSS?>bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />

    <!--自寫 css-->
    <link href="<?=ASSETS_CSS?>common.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>menu.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>txt_style.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>table_style.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>button.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS_CSS?>form_style.css" rel="stylesheet" type="text/css">

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
                <h1>RD監控畫面功能</h1>

                <div class="contentGroup">
                    <div class="col-sm-12 padding0">
                        <!--button start--> 	
                        <div class="btn_Position rig">
                            <a class="btn btn-info btn_sm_Width Gradient_Brown" id="" onclick="javascript:refreshTimer();">刷新時間</a>
                        </div>
                        <div class="clr"></div>
                        <div class="rig" style="font-size:1em;padding-right: 14px;padding-bottom: 10px;">時間倒數：<span class="leftTime" style="font-size:1.5em;background-color:#eee;display: inline-block;color:#FF0105;font-weight:600;"></span></div>
                        <div class="clr"></div>
                        <!--button end---->
                    </div>

                    <form id="rd_monitor_view_Features_form" action="" method="post"> 
                        <!--文字start-->
                        <div class="Table_Layout">
                            <!--表格內容start-->
                            <div class="col-sm-12">

                                <!-- Combined Table -->									
                                <table class="table table-bordered table-striped table-condensed table-hover table_Style_RWD_Padding">										
                                    <tbody>

                                        <tr>
                                            <td class="txtC vertical_Align min_Width200">MT4群組</td>
                                            <td class="txtC vertical_Align">交易類型</td>
                                            <td class="txtC vertical_Align">Web佣金</td>
                                            <td class="txtC vertical_Align">Web點差</td>
                                            <td class="txtC vertical_Align">MT4點差</td>
                                            <td class="txtC vertical_Align">功能</td>
                                        </tr>								                                    <?php 
                                        if( ! empty($content)){
                                            foreach($content as $key => $val){
                                                if($key === 'diff'){
                                                    foreach($val as $val2){
                                                        ?>
                                                        <tr>
                                                        <td class="txtC vertical_Align"><?=$val2['group'];?></td>
                                                        <td class="txtC vertical_Align"><?=$val2['sec'];?></td>
                                                        <td class="txtC vertical_Align"><?=$val2['web']['scale'];?></td>
                                                        <td class="txtC vertical_Align"><?=$val2['web']['spread'];?></td>
                                                        <td class="txtC vertical_Align"><?=$val2['mt4']['spread'];?></td>
                                                        <td class="txtC vertical_Align">
                                                            <div class="btn_Position">
                                                                <a class="btn btn-info btn_sm_Width Gradient_Brown" onclick="javascript:restore('<?=$val2['group'];?>');">還原</a>
                                                            </div>
                                                        </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                }else if($key === 'abook'){
                                                    foreach ($val as $val2) {
                                                ?>			
                                        <tr>
                                            <td colspan="6" class="txtC vertical_Align">
                                                <h2 class="txt_title_information txt_title_Bord_Gradient">A BOOK未拋上手</h2>
                                                <hr class="LineStyle">
                                            </td>                                        
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="txtC vertical_Align"><?=$val2?></td>
                                        </tr> 
                                        <?php
                                                    }
                                                 }
                                            }
                                        }
                                        ?>                                                           
                                    </tbody>
                                </table>
                            </div>
                            <!--表格內容end---->
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


<!--引用Google CDN jQuery-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<!--引用最新編譯和最佳化的bootstrap CDN jQuery-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
       function GetCount(leftSecs, iid) {
          if (leftSecs <= 1) { //過了該時間
             leftSecs = 180;
          } else { //時間還沒到
             out = "";
             copyLeft = leftSecs;
             mins = Math.floor(copyLeft / 60); //分
             secs = Math.floor(copyLeft % 60); //秒
             out += mins + "分";
             out += secs + "秒";

             $(iid).text(out);
             setTimeout(function() {
                GetCount(--leftSecs, iid)
             }, 1000);
          }
      }

   window.onload = function() {
      GetCount(180, '.leftTime');
   };

   function restore(group){
        $.ajax({
            url: '/admin/rd_monitor',
            type: 'POST',
            data: {action : 'restore', group :group },
            dataType: 'json',
            success: function(resp){
                if(resp.status){
                alert('還原成功!');
                location.href = '/admin/rd_monitor';
                }else{
                    alert('還原失敗!');
                }
            }
        })
   }

   function refreshTimer(){
        $.ajax({
            url: '/admin/rd_monitor',
            type: 'POST',
            data: {action : 'refresh'},
            dataType: 'json',
            success: function(resp){
                if(resp.status){
                location.href = '/admin/rd_monitor';
                }
            }
        })
   }
</script>
</body>
</html>
