 <?php
	
	include("inc/header.php");

if($_POST){
	$lab_name = $_POST['lab_name'];
	$lab_state = $_POST['lab_state'];
	
	$new_lab_qu = "insert into `labs` (`name` , `state`) values ('$lab_name' , '$lab_state')";
	$new_lab_qu = mysqli_query($con , $new_lab_qu);
	if($new_lab_qu){
		$last_id = $con->insert_id;
		?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-success alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>تم !</strong> تم إنشاء معمل جديد سيتم تحويلك إلى الصفحة الخاصة بالمعمل خلال لحظات</h5>
	</div>
</div>	
<script>
	
	setTimeout(function(){
		window.location = "edit_lab.php?lab_id=<?php echo $last_id ?>";
	},2000)
	
	
</script>
<?php
	}
}else{

	?>
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">معمل جديد</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">الرئيسية</a>
                </li>
                <li class="breadcrumb-item"><a href="./lab_res.php">المعامل</a>
                </li>
                <li class="breadcrumb-item"><a href="#">معمل جديد</a>
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
                  <h4 class="card-title" id="basic-layout-card-center">معمل جديد</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <form class="form" method="post" action="./new_lab.php">
                      <div class="form-body">
                        <div class="form-group">
                          <label for="eventRegInput1">اسم المعمل</label>
                          <input type="text" id="eventRegInput1" class="form-control" name="lab_name" required>
                        </div>
                        <div class="form-group">
                          <label>هل المعمل متاح للحجز</label>
                          <div class="input-group">
                            <div class="d-inline-block custom-control custom-radio mr-1">
                              <input type="radio" name="lab_state" checked class="custom-control-input" id="yes1" value="1" required>
                              <label class="custom-control-label" for="yes1">نعم</label>
                            </div>
                            <div class="d-inline-block custom-control custom-radio">
                              <input type="radio" name="lab_state" class="custom-control-input" id="no1" value="0" required>
                              <label class="custom-control-label" for="no1">لا</label>
                            </div>
                          </div>
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