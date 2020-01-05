 <?php
	
	include("inc/header.php");
$error = 0;
	if($_GET){
		if($_GET['lab_id']){
			$lab_id = $_GET['lab_id'];
			
			$sel_lab_qu = "select * from `labs` where `id` = '$lab_id'";
			$sel_lab_qu = mysqli_query($con , $sel_lab_qu);
			
			
			if(mysqli_num_rows($sel_lab_qu) == 1){
				$run_sel_lab = mysqli_fetch_array($sel_lab_qu);
				if($_POST){
					$pass =  md5(sha1($_POST['password']));
					if($pass == $run_user['password']){
						
					$del_lab_qu = "DELETE FROM `labs` WHERE `id` = '$lab_id'";
					$del_lab_sch_qu = "DELETE FROM `labs_sch` WHERE `lab_id` = '$lab_id'";
					if(mysqli_query($con , $del_lab_qu) && mysqli_query($con , $del_lab_sch_qu)){
						?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-success alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>تم !</strong> تم حذف المعمل بنجاح</h5>
	</div>
</div>
<script>
	
	setTimeout(function(){
		window.location = "labs.php";
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
	
	window.location = "labs.php";
	
	
</script>

<?php
}
	?>
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">حذف المعمل</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">الرئيسية</a>
                </li>
                <li class="breadcrumb-item"><a href="./labs.php">المعامل</a>
                </li>
                <li class="breadcrumb-item"><a href="./edit_labs.php?lab_id=<?php echo $lab_id; ?>"><?php echo $run_sel_lab['name']; ?> ( حذف المعمل )</a>
                </li>
                <li class="breadcrumb-item"><a href="#">تأكيد حذف المعمل</a>
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
                  <h4 class="card-title font-weight-bold" id="basic-layout-card-center"><?php echo $run_sel_lab['name']; ?> <small>تأكيد حذف المعمل</small></h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show px-1">
					 <form class="form" method="post" action="./del_lab.php?lab_id=<?php echo $lab_id; ?>">
                      <div class="form-body">
                        <div class="form-group">
                          <label for="eventRegInput1">اسم المعمل</label>
                          <input type="text" id="eventRegInput1"  disabled class="form-control"  value="<?php echo $run_sel_lab['name']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="eventRegInput1" class="red text-center full-width">
							  <br>
							  <span class="alert-warning p-1 full-width">
								  سيتم حذف جميع الحجوزات المتعلقة بهذا المعمل
							  </span>
							  <br> <br> <br>
							  لحذف المعمل يجب كتابة كلمة المرور الخاصه بك
							</label>
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