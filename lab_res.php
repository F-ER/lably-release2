 <?php
	
	include("inc/header.php");
$error = 0;
	if($_GET){
		if($_GET['lab_id']){
			$lab_id = $_GET['lab_id'];
			$sel_lab_qu = "select * from `labs` where `id` = '$lab_id' and `state` = '1'";
			$sel_lab_qu = mysqli_query($con , $sel_lab_qu);
			if(mysqli_num_rows($sel_lab_qu) == 1){
				$run_sel_lab = mysqli_fetch_array($sel_lab_qu);
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
          <h3 class="content-header-title mb-0 d-inline-block">حجز معمل</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">الرئيسية</a>
                </li>
                <li class="breadcrumb-item"><a href="./labs.php">المعامل</a>
                </li>
                <li class="breadcrumb-item"><a href="#">حجز معمل</a>
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
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title font-weight-bold" id="basic-layout-card-center"><?php echo $run_sel_lab['name']; ?> <small>حجز المعمل</small></h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show px-1">
					<div class="table-responsive">
                    <table class="table">
                      <thead>
						  <tr class="text-center">
							  <th>اليوم</th>
							  <th>من 8:00 إلى 9:30</th>
							  <th>من 10:00 إلى 11:45</th>
							  <th>من 12:45 إلى 2:35</th>
						  </tr>
                      </thead>
                      <tbody class="text-center">
						  <?php
						 
						  $num = 0;
						  
						  while($num < count($days)){
							  $day_date = date("Y-m-d" , strtotime('next '.$days_date[$num]));
							  
						  ?>
						  
						  <tr>
							  <th>
								  <?php echo $days[$num]; ?>
								  <br>
								  <?php echo $day_date; ?>
							  </th>
							  <?php
							  $sch_time_num = 0;
							    while($sch_time_num < count($sch_time)){
									$sel_lab_sch = "select * from `labs_sch` where `lab_id` = '$lab_id' and `date` = '$day_date' and `time_num` = '$sch_time[$sch_time_num]'";
									$sel_lab_sch = mysqli_query($con , $sel_lab_sch);
									if(mysqli_num_rows($sel_lab_sch) != 1){
										
							  ?>
							  <td>
								  <a class="btn btn-primary btn-block" href="./lab_res_conf.php?lab_id=<?php echo $lab_id; ?>&time=<?php echo $sch_time[$sch_time_num]."&date=".$day_date; ?>">حجز</a>
							  </td>
							  <?php
								}else {
										$run_lab_sch = mysqli_fetch_array($sel_lab_sch);
										$res_tech_id = $run_lab_sch['tech_id']; 
							 $sel_res_tech_qu = "select * from `users` where `id` = '$res_tech_id'";
			                 $sel_res_tech_qu = mysqli_query($con , $sel_res_tech_qu);			
			                 $run_sel_res_tech = mysqli_fetch_array($sel_res_tech_qu);
									?>
							  <td>
								  <a class="btn btn-secondary btn-block disabled white"  >
									  محجوز
									  <br> <br>
									  <?php echo $run_sel_res_tech['name']; ?>
								  </a>
							  </td>
							  <?php
								}
									 $sch_time_num++;
								}
							  ?>
						  </tr>
						  
						  <?php
							  $num++;
						  }
						  
						  ?>
                      </tbody>
                    </table>
                  </div>
				  </div>
				</div>
			  </div>
			  </div>
 <?php
	
	include("inc/footer.php");
	
	?>