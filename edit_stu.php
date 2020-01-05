 <?php
	
	include("inc/header.php");
$error = 0;
	if($_GET){
		if($_GET['stu_id']){
			$stu_id = $_GET['stu_id'];
			$sel_stu_qu = "select * from `stu` where `id` = '$stu_id'";
			$sel_stu_qu = mysqli_query($con , $sel_stu_qu);
			if(mysqli_num_rows($sel_stu_qu) == 1){
				$run_sel_stu = mysqli_fetch_array($sel_stu_qu);
			}else{
				$error++;
			}
			/////////////////////////////////////////////////////
			if($_POST){
				$stu_name = $_POST['stu_name'];
				$stu_num = $_POST['stu_num'];
				$stu_major = $_POST['stu_major'];
				
				$ser_stu_qu = "select * from `stu` where `ac_id` = '$stu_num' and `id` <> '$stu_id'";
				$ser_stu_qu = mysqli_query($con , $ser_stu_qu);
				if(mysqli_num_rows($ser_stu_qu) <= 0){
				$up_stu_qu = "UPDATE `stu` SET `name`='$stu_name',`ac_id`='$stu_num',`major`='$stu_major' WHERE `id` = '$stu_id'";
				if(mysqli_query($con , $up_stu_qu)){
					?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-success alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>تم !</strong> تم تعديل معلومات الطالب بنجاح</h5>
	</div>
</div>
<script>
	
	setTimeout(function(){
		window.location = "edit_stu.php?stu_id=<?php echo $stu_id ?>";
	},2000)
	
	
</script>
<?php
				}
				}else {
					?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-danger alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>عفوا !</strong> الرقم الأكاديمي موجود مسبقا</h5>
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
	
	window.location = "students.php";
	
	
</script>

<?php
}
	?>
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">تعديل طالب</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">الرئيسية</a>
                </li>
                <li class="breadcrumb-item"><a href="./students.php">الطلاب</a>
                </li>
                <li class="breadcrumb-item"><a href="#">تعديل طالب</a>
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
                   <h4 class="card-title font-weight-bold" id="basic-layout-card-center"><?php echo $run_sel_stu['name']; ?> <small>تعديل الطالب</small></h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <form class="form" method="post" action="./edit_stu.php?stu_id=<?php echo $run_sel_stu['id']; ?>">
                      <div class="form-body">
                        <div class="form-group">
                          <label for="eventRegInput1">اسم الطالب</label>
                          <input type="text" id="eventRegInput1" class="form-control" name="stu_name" value="<?php echo $run_sel_stu['name']; ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="eventRegInput1">الرقم الأكاديمي</label>
                          <input type="number" id="eventRegInput1" class="form-control" name="stu_num" value="<?php echo $run_sel_stu['ac_id']; ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="eventRegInput1">التخصص</label>
                          <input type="text" id="eventRegInput1" class="form-control" name="stu_major" value="<?php echo $run_sel_stu['major']; ?>" required>
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