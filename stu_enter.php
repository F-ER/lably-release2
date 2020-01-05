<?php

include "inc/config.php";

if($_POST){
	$stu_ac = $_POST['stu_ac'];
	
	$user_qu = "select * from `stu` where `ac_id` = '$stu_ac'";
	$user_qu = mysqli_query($con , $user_qu);
	if(mysqli_num_rows($user_qu) == 1){
		$enter_qu = "select * from `enter` where `stu_id` = '$stu_ac' and `date` like '%$today%'";
	    $enter_qu = mysqli_query($con , $enter_qu);
		if(mysqli_num_rows($enter_qu) == 1){
       while($run_enter = mysqli_fetch_array($enter_qu)){
       $stu_id = $run_enter['stu_id'];
      $today_date = date("Y-m-d H-i-s");
      $stu_id = $run_enter['stu_id'];
      $in_enter_qu = "UPDATE `enter` SET `time_out` = '$today_date' where `stu_id` = '$stu_ac'";
      if(mysqli_query($con , $in_enter_qu)){
		?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-danger alert-dismissible mb-2" role="alert">
	<h5 class="white"><strong>تم !</strong>لقد تم تسجيل خروجك</h5>
	</div>
</div>

<?php
		}
  }
}
    else { 
			$today_time = date("H:i:s");
      $today_date = date("Y-m-d H:i:s");
			$in_enter_qu = "INSERT INTO `enter`(`stu_id`, `date` ,`time_in`,`time_out`) VALUES ('$stu_ac' , '$today_date', '$today_time', '00:00:00')";
		if(mysqli_query($con , $in_enter_qu)){
			?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-success alert-dismissible mb-2" role="alert">
	<h5 class="white"><strong>تم !</strong> تم تسجيل دخولك بنجاح</h5>
	</div>
</div>

<?php
		}
		}
	}else {
		?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-danger alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>عفوا !</strong> المعلومات المدخلة غير صحيحة</h5>
	</div>
</div>
<?php
	}
	
}
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
<body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
						<h1 class="font-weight-bold">LABLY</h1>
						<h3>تسحيل الدخول والخروج</h3>
                    </div>
                  </div>
                </div>
                <div class="card-content">

                  <div class="card-body pt-0">
                    <form class="form-horizontal" method="post" action="./stu_enter.php" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="stu_ac">الرقم الأكاديمي</label>
                        <input type="number" required class="form-control" id="stu_ac" name="stu_ac">
                      </fieldset>
                      <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-lock"></i> إدخال </button>
                    </form>
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