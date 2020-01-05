 <?php
	
	include("inc/header.php");

if($_POST){
	$tech_name = $_POST['tech_name'];
	$tech_username = $_POST['tech_username'];
	$tech_password = md5(sha1($_POST['tech_password']));
	
	$ser_tech_qu = "select * from `users` where `username` = '$tech_name'";
	$ser_tech_qu = mysqli_query($con , $ser_tech_qu);
	if(mysqli_num_rows($ser_tech_qu) <= 0){
		
	$new_tech_qu = "INSERT INTO `users`(`name`, `username`, `password`, `perm`) VALUES ('$tech_name' , '$tech_username', '$tech_password','3')";
	$new_tech_qu = mysqli_query($con , $new_tech_qu);
	if($new_tech_qu){
		$last_id = $con->insert_id;
		?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-success alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>تم !</strong> تم إضافة موظف جديد سيتم تحويلك إلى الصفحة الخاصة بالمعلم خلال لحظات</h5>
	</div>
</div>	
<script>
	
	setTimeout(function(){
		window.location = "edit_tech.php?tech_id=<?php echo $last_id ?>";
	},2000)
	
	
</script>
<?php
	}
	}
		else {
		?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-danger alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>عفوا !</strong> اسم المستخدم موجود مسبقا</h5>
	</div>
</div>
<script>
	
	setTimeout(function(){
		window.location = "new_staff.php";
	},1000)
	
	
</script>
<?php
		
	}
}else{

	?>
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">مسؤول مكتبة جديد</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">الرئيسية</a>
                </li>
                <li class="breadcrumb-item"><a href="./staff.php">مسؤولي المكنبة</a>
                </li>
                <li class="breadcrumb-item"><a href="#">مسؤول مكتبة جديد</a>
                </li>
              </ol>
            </div>
          </div>
        </div>

        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
            <button class="btn btn-danger px-2"  type="button" aria-haspopup="true" aria-expanded="false"><i class="ft-x"></i>إلغاء</button>
          </div>
        </div>
      </div>
      <div class="content-body">
<div class="row justify-content-md-center">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-card-center">مسؤول مكتبة جديد</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <form class="form" method="post" action="./new_staff.php">
                      <div class="form-body">
                        <div class="form-group">
                          <label for="eventRegInput1">اسم الموظف</label>
                          <input type="text" id="eventRegInput1" class="form-control" name="tech_name" required>
                        </div>
                        <div class="form-group">
                          <label for="eventRegInput1">اسم المستخدم</label>
                          <input type="text" id="eventRegInput1" class="form-control" name="tech_username" required>
                        </div>
                        <div class="form-group">
                          <label for="eventRegInput1">كلمة المرور</label>
                          <input type="password" id="eventRegInput1" class="form-control" name="tech_password" required>
                        </div>
                      </div>
                      <div class="form-actions center">
						  <button class="btn btn-success px-2"  type="submit" aria-haspopup="true" aria-expanded="false">
							  <i class="ft-check"></i>
							  حفظ
						  </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

 <?php
}
	
	include("inc/footer.php");
	
	?>