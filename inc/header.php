 <?php
	
	include("inc/config.php");
?>
<!DOCTYPE html>
<html class="loading" lang="ar" data-textdirection="rtl">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Lably
  </title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/vendors.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/custom-rtl.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/core/colors/palette-gradient.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/style-rtl.css">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item mr-auto">
            <a class="navbar-brand" href="index.php">
              <img class="brand-logo" alt="modern admin logo" src="app-assets/images/logo/logo.png">
              <h3 class="brand-text">lably</h3>
            </a>
          </li>
          <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="avatar avatar-online">
                  <img src="app-assets/images/avatar.png" alt="avatar"><i></i></span>
                <span class="mr-1">مرحبا,
                  <span class="user-name text-bold-700"><?php echo $run_user['name']; ?></span>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ft-user"></i> حسابي</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="?logout"><i class="ft-power danger" ></i> خروج</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item">
			<a href="./">
				<i class="ft-globe"></i>
				<span class="menu-title" data-i18n="nav.home.main">الرئيسية</span>
			</a>
        </li>


        <?php
      
      if($run_user['perm'] == "2" or "1"){
      ?>

        <li class=" nav-item">
			<a href="./labs.php">
				<i class="ft-sidebar"></i>
				<span class="menu-title" data-i18n="nav.labs.main">المعامل</span>
			</a>
        </li>
        <?php } ?>

         <?php
      
      if($run_user['perm'] == "3"){
      ?>

        <li class=" nav-item">
      <a href="./stu_enter.php">
        <i class="ft-users"></i>
        <span class="menu-title" data-i18n="nav.labs.main"> تسجيل دخول الطلاب </span>
      </a>
        </li>
        
        <?php } ?>
        
		  <?php
		  
		  if($run_user['perm'] == "1"){
		  ?>
        <li class=" nav-item">
			<a href="./students.php">
				<i class="ft-users"></i>
				<span class="menu-title" data-i18n="nav.labs.main">الطلاب</span>
			</a>
        </li>
        <li class=" nav-item">
      <a href="./stu_enter.php">
        <i class="ft-users"></i>
        <span class="menu-title" data-i18n="nav.labs.main"> تسجيل دخول الطلاب </span>
      </a>
        </li>
        <li class=" nav-item">
			<a href="./teachers.php">
				<i class="ft-briefcase"></i>
				<span class="menu-title" data-i18n="nav.labs.main">المعلمين</span>
			</a>
      <li class=" nav-item">
      <a href="./staff.php">
        <i class="ft-briefcase"></i>
        <span class="menu-title" data-i18n="nav.labs.main"> مسؤول مكتبة </span>
      </a>

        </li>
        
        <li class=" nav-item">
      <a href="./qr/index.html">
        <i class="ft-globe"></i>
        <span class="menu-title" data-i18n="nav.home.main"> أنشاء QR  </span>
      </a>

        </li>
		  <?php } ?>
        <li class=" nav-item">
			<a href="./library.php">
				<i class="ft-feather"></i>
				<span class="menu-title" data-i18n="nav.set.main">المكتبة</span>
			</a>
        </li>

        <li class=" nav-item">
      <a href="mailto:fawaz0920@gmail.com">
        <i class="ft-globe"></i>
        <span class="menu-title" data-i18n="nav.home.main">للإستفسارات والشكاوي  </span>
      </a>

      
      </ul>
    </div>
  </div>
	  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
