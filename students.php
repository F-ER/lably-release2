 <?php
	
	include("inc/header.php");
	
	?>
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">الطلاب</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">الرئيسية</a>
                </li>
                <li class="breadcrumb-item"><a href="#">الطلاب</a>
                </li>
              </ol>
            </div>
          </div>
        </div>

        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
            <a href="new_stu.php"><button class="btn btn-blue btn-glow px-2"  type="button" aria-haspopup="true" aria-expanded="false">طالب جديد</button></a>
          </div>
        </div>
      </div>
      <div class="content-body">
		  <div class="row">
			  			  <?php
	
	$sel_stus_qu = "select * from `stu`";
	$sel_stus_qu = mysqli_query($con , $sel_stus_qu);
	while($run_sel_stus = mysqli_fetch_array($sel_stus_qu)){
		?>
	<div class="col-xl-3 col-lg-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-cyan bg-lighten-2 rounded-left">
						<i class="ft-users white font-large-1"></i>
                    </div>
                    <div class="p-2 media-body text-left">
                      <h5 class="font-weight-bold">
						  <?php echo $run_sel_stus['name']; ?>
						  <div class="btn-group pull-left">
                            <button type="button" class="btn btn-cyan btn-min-width dropdown-toggle border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings"></i> خيارات</button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item blue" href="./edit_stu.php?stu_id=<?php echo $run_sel_stus['id']; ?>"><i class="ft-edit-2"></i> تعديل</a>
                              <a class="dropdown-item red" href="./del_stu.php?stu_id=<?php echo $run_sel_stus['id']; ?>"><i class="ft-trash"></i> حذف</a>
                            </div>
                          </div>
						  
						</h5>
                      <h5 class="text-bold-400 mb-0 blue-grey">
						  <?php echo $run_sel_stus['ac_id'] ?> | <span class="cyan"><?php echo $run_sel_stus['major']; ?></span>
						</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			  <?php } ?>
</div>

 <?php
	
	include("inc/footer.php");
	
	?>