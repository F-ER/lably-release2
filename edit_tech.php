 <?php
	
	include("inc/header.php");
$error = 0;
	if($_GET){
		if($_GET['tech_id']){
			$tech_id = $_GET['tech_id'];
			
			$sel_tech_qu = "select * from `users` where `id` = '$tech_id' ";
			$sel_tech_qu = mysqli_query($con , $sel_tech_qu);
	
			if(mysqli_num_rows($sel_tech_qu) == 1){
				$run_sel_tech = mysqli_fetch_array($sel_tech_qu);
			}else{
				$error++;
			}
			$get_tech_name=$run_sel_tech['name'];
			$trc_t="select * from `teachers` where `tech_name` = '$get_tech_name'";
			    $trc_t=mysqli_query($con ,$trc_t );
				
				if(mysqli_num_rows($trc_t) == 1){
				$run_tech_info= mysqli_fetch_array($trc_t);
			}else{
				$error++;
			}
			/////////////////////////////////////////////////////
			if($_POST){
				$tech_name = $_POST['tech_name'];
				$tech_username = $_POST['tech_username'];
				$tech_password = $_POST['tech_password'] != "" ? md5(sha1($_POST['tech_password'])) : $run_sel_tech['password'];
				$training_section=$_POST['training_section'];
	            $computer_num=$_POST['computer_num'];
	            $tech_email=$_POST['tech_email'];
				$mobile_num=$_POST['mobile_num'];
				
				$ser_tech_qu = "select * from `users` where `username` = '$tech_username' and `id` <> '$tech_id'";
				$ser_tech_qu = mysqli_query($con , $ser_tech_qu);
								
				if(mysqli_num_rows($ser_tech_qu) <= 0){
				$up_tech_qu = "UPDATE `users` SET `name`='$tech_name',`username`='$tech_username',`password`='$tech_password' WHERE `id` = '$tech_id'";
				$edit_t = "UPDATE `teachers` SET `tech_name`='$tech_name',`tech_username`='$tech_username',`training_section`='$training_section' ,`computer_num`='$computer_num',`tech_email`='$tech_email',`mobile_num`='$mobile_num' WHERE `tech_name` = '$get_tech_name'";
				

				if(mysqli_query($con , $up_tech_qu) && mysqli_query($con , $edit_t)){
					
					?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-success alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>تم !</strong> تم تعديل معلومات المعلم بنجاح</h5>
	</div>
</div>
<script>
	
	setTimeout(function(){
		window.location = "edit_tech.php?tech_id=<?php echo $tech_id ?>";
	},2000)
	
	
</script>
<?php
				}
				}else {
					?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-danger alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>عفوا !</strong> اسم المستخدم موجود مسبقا</h5>
	</div>
</div>
<?php
					
				}
			}
		}else {
			$error++;
		}
	}else {
		$error++;
	}

if($error > 0){
	?>
<script>
	
	window.location = "teachers.php";
	
	
</script>

<?php
}
	?>
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">تعديل معلم</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">الرئيسية</a>
                </li>
                <li class="breadcrumb-item"><a href="./teachers.php">المعلمين</a>
                </li>
                <li class="breadcrumb-item"><a href="#">تعديل معلم</a>
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
                   <h4 class="card-title font-weight-bold" id="basic-layout-card-center"><?php echo $run_sel_tech['name']; ?> <small>تعديل المعلم</small></h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <form class="form" method="post" action="./edit_tech.php?tech_id=<?php echo $run_sel_tech['id']; ?>">
                      <div class="form-body">
                        <div class="form-group">
                         <label for="eventRegInput1">اسم المعلم</label>
                          <input type="text" id="eventRegInput1" class="form-control" name="tech_name" value="<?php echo $run_sel_tech['name']; ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="eventRegInput1">اسم المستخدم</label>
                          <input type="text" id="eventRegInput1" class="form-control" name="tech_username" value="<?php echo $run_tech_info['tech_username']; ?>">
                        </div>
						<label for="eventRegInput1">القسم التدريبي</label>
						  <select name="training_section" class="form-control">
						  <option ><?php echo $run_tech_info['training_section']; ?></option>
						        <option>الدراسات العامة</option>
							    <option > تقنية الحاسب والمعلومات</option>
							    <option> الاتصالات</option>
								<option> التقنية الخاصة</option>
							</optgroup>
						  </select>
						  
						<div class="form-group">
                          <label for="eventRegInput1">رقم الحاسب للمدرب</label>
                          <input type="text" id="eventRegInput1" class="form-control" name="computer_num" value="<?php echo $run_tech_info['computer_num']; ?>">
                        </div>
						<div class="form-group">
                          <label for="eventRegInput1">البريد الالكتروني</label>
                          <input type="text" id="eventRegInput1" class="form-control" name="tech_email" value="<?php echo $run_tech_info['tech_email']; ?>">
                        </div>
						<div class="form-group">
                          <label for="eventRegInput1">رقم الجوال</label>
                          <input type="text" id="eventRegInput1" class="form-control" name="mobile_num" maxlength="10" value="<?php echo $run_tech_info['mobile_num']; ?>" >
                        </div>
                        <div class="form-group">
                          <label for="eventRegInput1">كلمة المرور</label>
                          <input type="password" id="eventRegInput1" class="form-control" name="tech_password" >
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
	include("inc/footer.php");
	
	?>