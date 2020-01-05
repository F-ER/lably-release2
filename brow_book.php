 <?php
	
	include("inc/header.php");
$error = 0;
	if($_GET){
		if($_GET['book_id']){
			$book_id = $_GET['book_id'];
			
			$sel_book_qu = "SELECT * from `books` where `id` = '$book_id'";
			$sel_book_qu = mysqli_query($con , $sel_book_qu);
						
			if(mysqli_num_rows($sel_book_qu) == 1 ){
				$run_sel_book = mysqli_fetch_array($sel_book_qu);
				if($_POST){
					 if($run_user['perm'] == "3"){
						 $tech_id = explode("_" , $_POST['tech_id']);
						 $tech_type = $tech_id[0];
						 $tech_id = $tech_id[1];
					 }else {
						 $tech_id = $user_id;
						 $tech_type = "tech";
					 }
					$new_book_sch_qu = "INSERT INTO `brow_book`(`book_id`, `tech_id`, `brow_date`, `back_date`) VALUES ('$book_id' , '$tech_id', '$today' , '00-00-00')";
					$up_book_state_qu = "UPDATE `books` SET `take_state` = '1' WHERE `id` ='$book_id'";
					if(mysqli_query($con , $new_book_sch_qu) && mysqli_query($con , $up_book_state_qu)){
						?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-success alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>تم !</strong> تم تأكيد إستعارة الكتاب بنجاح</h5>
	</div>
</div>
<script>
	
	setTimeout(function(){
		window.location = "library.php";
	},2000)
	
	
</script>
<?php
							exit();
					}
					
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
	
	window.location = "library.php";
	
	
</script>

<?php
}
	?>
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">تأكيد إستعارة الكتاب</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">الرئيسية</a>
                </li>
                <li class="breadcrumb-item"><a href="./library.php">المكتبة</a>
                </li>
                <li class="breadcrumb-item"><a href="./edit_book.php?book_id=<?php echo $book_id; ?>"><?php echo $run_sel_book['name']; ?> ( إستعارة الكتاب )</a>
                </li>
                <li class="breadcrumb-item"><a href="#">تأكيد إستعارة الكتاب</a>
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
                  <h4 class="card-title font-weight-bold" id="basic-layout-card-center"><?php echo $run_sel_book['name']; ?> <small>تأكيد إستعارة الكتاب</small></h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show px-1">
					 <form class="form" method="post" action="./brow_book.php?book_id=<?php echo $book_id; ?>">
                      <div class="form-body">
                        <div class="form-group">
                          <bookel for="eventRegInput1">اسم الكتاب</bookel>
                          <input type="text" id="eventRegInput1"  disabled class="form-control" name="tech_name" value="<?php echo $run_sel_book['name']; ?>">
                          <input type="hidden" name="ok" value="0">
                        </div>
                        <div class="form-group">
                          <bookel for="eventRegInput1">تاريخ الإستعارة</bookel>
                          <input type="text" id="eventRegInput1" disabled class="form-control" name="book_res_day" value="<?php echo $today; ?>">
                        </div>
						  <?php
						  
						  if($run_user['perm'] == "1"){
						  ?>
						   <label for="eventRegInput1">المستعير</label>
						  <select name="tech_id" class="form-control">
							  <option disabled selected>إختر المستعير</option> 
							  <optgroup label="المعلمين">
							  <?php
							  
							  $sel_techs_qu = "SELECT * from `users` where `perm` = '2'";
							  $sel_techs_qu = mysqli_query($con , $sel_techs_qu);
							  while($run_sel_techs = mysqli_fetch_array($sel_techs_qu)){
							  ?>
							    <option value="tech_<?php echo $run_sel_techs['id']; ?>"><?php echo $run_sel_techs['name']; ?></option>
							  <?php
							  }
							  ?>
							</optgroup>
							  <optgroup label="الطلاب">
							  <?php
							  
							  $sel_stu_qu = "SELECT * from `stu`";
							  $sel_stu_qu = mysqli_query($con , $sel_stu_qu);
							  while($run_sel_stu = mysqli_fetch_array($sel_stu_qu)){
							  ?>
							    <option value="stu_<?php echo $run_sel_stu['id']; ?>"><?php echo $run_sel_stu['name']; ?></option>
							  <?php
							  }
							  ?>
							</optgroup>
						  </select>		

						 <?php }  elseif($run_user['perm'] == "3"  ){

							  ?>
							  <label for="eventRegInput1">المستعير</label>
						  <select name="tech_id" class="form-control">
							  <option disabled selected>إختر المستعير</option> 
							  <optgroup label="المعلمين">
							  <?php
							  
							  $sel_techs_qu = "SELECT * from `users` where `perm` = '2'";
							  $sel_techs_qu = mysqli_query($con , $sel_techs_qu);
							  while($run_sel_techs = mysqli_fetch_array($sel_techs_qu)){
							  ?>
							    <option value="tech_<?php echo $run_sel_techs['id']; ?>"><?php echo $run_sel_techs['name']; ?></option>
							  <?php
							  }
							  ?>
							</optgroup>
							  <optgroup label="الطلاب">
							  <?php
							  
							  $sel_stu_qu = "SELECT * from `stu`";
							  $sel_stu_qu = mysqli_query($con , $sel_stu_qu);
							  while($run_sel_stu = mysqli_fetch_array($sel_stu_qu)){
							  ?>
							    <option value="stu_<?php echo $run_sel_stu['id']; ?>"><?php echo $run_sel_stu['name']; ?></option>
							  <?php
							  }
							  ?>
							</optgroup>
						  </select>		  




							  <?php } else {
							  ?>


                        <div class="form-group">
                          <label for="eventRegInput1">المعلم</label>
                          <input type="text" id="eventRegInput1" disabled class="form-control" name="tech_id" value="<?php echo $run_user['name']; ?>">
                        </div>
                      </div>
						 <?php
							  
						  } ?>
                      <div class="form-actions center">
						  <button class="btn btn-info px-2"  type="submit" aria-haspopup="true" aria-expanded="false">
							  <i class="ft-check"></i>
							  تأكيد الإستعارة
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