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
				if($_POST){
					$pass =  md5(sha1($_POST['password']));
					if($pass == $run_user['password']){
						
					$del_stu_qu = "DELETE FROM `stu` WHERE `id` = '$stu_id'";
					$del_stu_sch_qu = "DELETE FROM `enter` WHERE `stu_id` = '$stu_id'";
					if(mysqli_query($con , $del_stu_qu) && mysqli_query($con , $del_stu_sch_qu)){
						?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-success alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>تم !</strong> تم حذف الطالب بنجاح</h5>
	</div>
</div>
<script>
	
	setTimeout(function(){
		window.location = "students.php";
	},2000)
	
	
</script>
<?php
							exit();
					}
					
				}else {
						?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-danger alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>عذرا !</strong> كلمة المرور غير صحيحة</h5>
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
          <h3 class="content-header-title mb-0 d-inline-block">حذف الطالب</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">الرئيسية</a>
                </li>
                <li class="breadcrumb-item"><a href="./students.php">الطلاب</a>
                </li>
                <li class="breadcrumb-item"><a href="./edit_stus.php?stu_id=<?php echo $stu_id; ?>"><?php echo $run_sel_stu['name']; ?> ( حذف الطالب )</a>
                </li>
                <li class="breadcrumb-item"><a href="#">تأكيد حذف الطالب</a>
                </li>
              </ol>
            </div>
          </div>
        </div>

        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
          </div>
        </div>
      </div>
      <div class="content-body">
		  <div class="row justify-content-md-center">
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title font-weight-bold" id="basic-layout-card-center"><?php echo $run_sel_stu['name']; ?> <small>تأكيد حذف الطالب</small></h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show px-1">
					 <form class="form" method="post" action="./del_stu.php?stu_id=<?php echo $stu_id; ?>">
                      <div class="form-body">
                        <div class="form-group">
                          <stuel for="eventRegInput1">اسم الطالب</stuel>
                          <input type="text" id="eventRegInput1"  disabled class="form-control"  value="<?php echo $run_sel_stu['name']; ?>">
                        </div>
                        <div class="form-group">
                          <stuel for="eventRegInput1">الرقم الإكاديمي</stuel>
                          <input type="text" id="eventRegInput1"  disabled class="form-control"  value="<?php echo $run_sel_stu['ac_id']; ?>">
                        </div>
                        <div class="form-group">
                          <stuel for="eventRegInput1">التخصص</stuel>
                          <input type="text" id="eventRegInput1"  disabled class="form-control"  value="<?php echo $run_sel_stu['major']; ?>">
                        </div>
                        <div class="form-group">
                          <stuel for="eventRegInput1" class="red text-center full-width">
							  <br>
							  <span class="alert-warning p-1 full-width">
								  سيتم حذف جميع الأمور المتعلقة بهذا الطالب
							  </span>
							  <br> <br> <br>
							  لحذف الطالب يجب كتابة كلمة المرور الخاصه بك
							</stuel>
                           <input type="password" id="eventRegInput1" class="form-control" name="password" placeholder="كلمة المرور">
                        </div>
                      </div>
                      <div class="form-actions center">
						  <button class="btn btn-danger px-2"  type="submit" aria-haspopup="true" aria-expanded="false">
							  <i class="ft-check"></i>
							  تأكيد الحذف
						  </button>
                      </div>
                    </form>
				  </div>
				</div>
			  </div>
			  </div>
 <?php
	
	include("inc/footer.php");
	
	?>