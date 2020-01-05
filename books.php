<?php

include "inc/config.php";

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>lably</title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/custom-rtl.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/pages/login-register.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/style-rtl.css">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 menu-expanded"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-12 col-12 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
						<h1 class="font-weight-bold">LABLY</h1>
						<h3>الكتب</h3>
                    </div>
                  </div>
                </div>
                <div class="card-content">

                  <div class="card-body pt-0">
                   
				   	  <div class="row">
			  			  <?php
	
	$sel_bookss_qu = "select * from `books`";
	$sel_bookss_qu = mysqli_query($con , $sel_bookss_qu);
	$book_num = 1;
	while($run_sel_books = mysqli_fetch_array($sel_bookss_qu)){
		?>
	<div class="col-xl-3 col-lg-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="media align-items-stretch" style="display: -webkit-box;">
                    <div class="p-2 text-center bg-amber bg-lighten-2 rounded-left">
						<i class="ft-feather white font-large-1"></i>
						<h1 class="font-large-1 pt-2 font-weight-bold"><?php echo $book_num ; ?></h1>
                    </div>
                    <div class="p-2 media-body text-left">
                      <h5 class="font-weight-bold title">
						  <?php echo $run_sel_books['name']; ?>
						</h5>
                      <h5 class="text-bold-400 mb-0 blue-grey title">
						  <?php echo $run_sel_books['bid'] ?> | <span class="primary darken-4 auth"><?php echo $run_sel_books['auth']; ?></span>
						</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			  <?php
		$book_num++;
	}
			  ?>
</div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>