 <?php
	
	include("inc/header.php");
	
	?>
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">المعامل</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">الرئيسية</a>
                </li>
                <li class="breadcrumb-item"><a href="#">المعامل</a>
                </li>
              </ol>
            </div>
          </div>
        </div>

        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
			  		  <?php
		  
		  if($run_user['perm'] == "1"){
		  ?>

           <a href="./new_lab.php"> <button class="btn btn-blue btn-glow px-2"  type="button" aria-haspopup="true" aria-expanded="false">معمل جديد</button></a>
			  <?php } ?>
          </div>
        </div>
      </div>
      <div class="content-body">
<div class="row">
	<?php
	
	$sel_labs_qu = "select * from `labs`";
	$sel_labs_qu = mysqli_query($con , $sel_labs_qu);
	while($run_sel_labs = mysqli_fetch_array($sel_labs_qu)){
		?>
<div class="col-xl-3 col-lg-6 col-12">
	<div class="card">
		<div class="card-content">
			<div class="media align-items-stretch">
				<div class="p-2 media-body text-left">
					<h3 class="font-weight-bold"><?php echo $run_sel_labs['name']; ?></h3>
					<hr>
							  <?php
		  
		  if($run_user['perm'] == "1"){
		  ?>

					<a href="./edit_lab.php?lab_id=<?php echo $run_sel_labs['id']; ?>">
						<button class="btn btn-icon btn-info mr-1 btn-sm"  type="button" aria-haspopup="true" aria-expanded="false">
							<i class="ft-edit-2"></i>
							تعديل
						</button>
					</a>
						<a href="./del_lab.php?lab_id=<?php echo $run_sel_labs['id']; ?>">
							<button class="btn btn-icon  btn-danger  btn-sm"  type="button" aria-haspopup="true" aria-expanded="false">
								<i class="ft-trash-2"></i>
								حذف
							</button>
						</a>
					<?php } ?>
				</div>
				<?php
		if($run_sel_labs['state'] == 1){
			?>
				<a class="p-2 text-center bg-blue bg-accent-4 rounded-right" href="./lab_res.php?lab_id=<?php echo $run_sel_labs['id']; ?>">
					<i class="ft-calendar white font-large-1"></i>
					<h4 class="white">حجز</h4>
				</a>
				
				<?php
		}else {
			?>
				<div class="p-2 text-center bg-danger bg-accent-4 rounded-right">
					<i class="ft-slash white font-large-1"></i>
					<h4 class="white">
						غير متاح <br>
						للحجز
					</h4>
				</div>
				<?php
		}
		
		?>
			</div>
		</div>
	</div>
</div>	

	
	
	<?php
		
		
	}
	
	
	?>
	
	
	
	
	
</div>

 <?php
	
	include("inc/footer.php");
	
	?>