 <?php
	
	include("inc/header.php");
$error = 0;
	if($_GET){
		if($_GET['lab_id']){
			$lab_id = $_GET['lab_id'];
			$lab_res_date = $_GET['date'];
			$lab_res_time = $_GET['time'];
			
			$sel_lab_qu = "select * from `labs` where `id` = '$lab_id'";
			$sel_lab_qu = mysqli_query($con , $sel_lab_qu);
			
			$sel_lab_sch = "select * from `labs_sch` where `lab_id` = '$lab_id' and `date` = '$lab_res_date' and `time_num` = '$lab_res_time'";
			$sel_lab_sch = mysqli_query($con , $sel_lab_sch);
			
			if(mysqli_num_rows($sel_lab_qu) == 1 && mysqli_num_rows($sel_lab_sch) != 1){
				$run_sel_lab = mysqli_fetch_array($sel_lab_qu);
				$lab_res_day = date( "w" , strtotime($lab_res_date));
				if($_POST){
					 $tech_id = $_POST['tech_id'];
					$new_lab_sch_qu = "INSERT INTO `labs_sch`(`lab_id`, `tech_id`, `date`, `time_num`) VALUES ('$lab_id' , '$tech_id' , '$lab_res_date' , '$lab_res_time')";
					if(mysqli_query($con , $new_lab_sch_qu)){
						?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-success alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>تم !</strong> تم تأكيد حجز المعمل بنجاح</h5>
	</div>
</div>
<script>

	
	
	setTimeout(function(){
		window.location = "lab_res.php?lab_id=<?php echo $lab_id ?>";
	},2000)
	
	
</script>
<?php
							exit();
					}
					echo "sdf";
				}
				
			}else{
				$error++;
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
	
	window.location = "labs.php";
	
	
</script>

<?php
}
	?>
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">تأكيد حجز معمل</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">الرئيسية</a>
                </li>
                <li class="breadcrumb-item"><a href="./labs.php">المعامل</a>
                </li>
                <li class="breadcrumb-item"><a href="./lab_res.php?lab_id=<?php echo $lab_id; ?>"><?php echo $run_sel_lab['name']; ?> ( حجز المعمل )</a>
                </li>
                <li class="breadcrumb-item"><a href="#">تأكيد حجز معمل</a>
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
                  <h4 class="card-title font-weight-bold" id="basic-layout-card-center"><?php echo $run_sel_lab['name']; ?> <small>تأكيد حجز المعمل</small></h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show px-1">
					 <form class="form" method="post" action="./lab_res_conf.php?lab_id=<?php echo $lab_id; ?>&time=<?php echo $lab_res_time."&date=".$lab_res_date; ?>">
                      <div class="form-body">
						 <div class="form-group">
                          <label for="eventRegInput1">اسم المعلم</label> <?php
						  
						  if($run_user['perm'] == "1"){
						  ?>
						  <select name="tech_id" class="form-control">
							  <option selected disabled>أختر المعلم</option>
							  <?php
							  
							  $sel_techs_qu = "select * from `users` where `perm` = '2'";
							  $sel_techs_qu = mysqli_query($con , $sel_techs_qu);
							  while($run_sel_techs = mysqli_fetch_array($sel_techs_qu)){
							  ?>
							    <option value="<?php echo $run_sel_techs['id']; ?>"><?php echo $run_sel_techs['name']; ?></option>
							  <?php
							  }
							  ?>
						  </select>		  
						 <?php } else {
							  ?>
                        
                          <input type="text" id="eventRegInput1" disabled class="form-control" value="<?php echo $run_user['name']; ?>">
                          <input type="hidden" id="eventRegInput1"  class="form-control" name="tech_id" value="<?php echo $run_user['id']; ?>">
                        </div>
						  <?php } ?>
                        <div class="form-group">
                          <label for="eventRegInput1">اليوم</label>
                          <input type="text" id="eventRegInput1" disabled class="form-control" name="lab_res_day" value="<?php echo $days[$lab_res_day]; ?>">
                        </div>
                        <div class="form-group">
                          <label for="eventRegInput1">التاريخ</label>
                          <input type="text" id="eventRegInput1" disabled class="form-control" name="lab_res_date" value="<?php echo $_GET['date']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="eventRegInput1">الوقت</label>
                          <input type="text" id="eventRegInput1" disabled class="form-control" name="lab_res_time" value="<?php echo $times[$_GET['time']-1]; ?>">
                        </div>
                      </div>
                      <div class="form-actions center">
						  <button class="btn btn-info px-2"  type="submit" aria-haspopup="true" aria-expanded="false">
							  <i class="ft-check"></i>
							  تأكيد الحجز
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