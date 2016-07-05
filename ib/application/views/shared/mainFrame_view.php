<header class="main-header">
   <a href="" class="sidebar-toggle-mobile" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
   </a>
   <!-- Logo -->
   <a href="/main" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>GAM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Gallop</b> 管理介面</span>
   </a>
   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
      <i class="fa fa-bars"></i>
   </button>
   <!-- Header Navbar: style can be found in header.less -->
   <nav class="navbar" role="navigation">
      <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
         <span class="sr-only">Toggle navigation</span>
      </a>
      <ul class="nav navbar-nav navbar-collapse pull-left collapse" id="navbar-collapse" aria-expanded="false">
         <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">開戶<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
               <li><a href="/account/adviser_register?inreg=1">顧問開戶</a></li>
               <li class="divider"></li>
               <li><a href="/account/register?inreg=1">客戶開戶</a></li>
            </ul>
         </li>
         <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">基本資料<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
               <li><a href="/main/person_info">人事資料</a></li>
               <li class="divider"></li>
               <li><a href="/main/change_pw">密碼變更</a></li>
               <li class="divider"></li>
               <li><a>晉升紀錄</a></li>
            </ul>
         </li>
         <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">客戶管理<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
               <li><a href="/main/member_list">客戶總覽</a></li>
               <li class="divider"></li>
               <li><a href="/main/open_account_report">開戶報備</a></li>
            </ul>
         </li>
         <li><a href="/main/person_results">個人業績</a></li>
         <li><a href="/main/org_results">組織業績</a></li>
         <li><a href="/main/member_assets">客戶出入金訊息</a></li>
         <li><a>獎金計算</a></li>
         <li><a href="/account/logout">登出</a></li>
      </ul>
   </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
         <div class="pull-left image">
            <img src="/assets/img/admin.jpg" class="img-circle" alt="User Image">
         </div>
         <div class="pull-left info">
            <p>
               <?=$username;?>
            </p>
            <a class="typeSel" style="cursor:pointer;"><span>佣金系統</span>&nbsp;&nbsp;<i class="fa fa-angle-down text-yellow "></i></a>
         </div>
      </div>
      <!-- search form -->
      <!--
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
                    </div>
                </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
         <li class="header">業務組織圖</li>
         <li class=" treeview">
            <a href="">
               <i class="fa fa-user"></i> <span><?=$username;?></span> <i class="fa fa-angle-left pull-right"></i>
            </a>
         </li>
      </ul>
   </section>
   <!-- /.sidebar -->
</aside>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h4>
        </h4>
      <ol class="breadcrumb">
         <li><a href=""><i class="fa fa-home"></i>首頁</a></li>
         <li class="active"><?=isset($funcName)? $funcName : "子頁面" ?></li>
      </ol>
   </section>
   <section class="content">
