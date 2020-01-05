 <?php
	
	include("inc/header.php");
$error = 0;
	if($_GET){
		if($_GET['book_id']){
			$bbook_id = $_GET['book_id'];
			
			$sel_bbook_qu = "SELECT * from `brow_book` WHERE `id` = '$bbook_id'";
			$sel_bbook_qu = mysqli_query($con , $sel_bbook_qu);
						
			if(mysqli_num_rows($sel_bbook_qu) == 1 ){
				$run_sel_bbook = mysqli_fetch_array($sel_bbook_qu);
				$book_id = $run_sel_bbook['book_id'];
				$tech_id = $run_sel_bbook['tech_id'];
				
				$sel_book_qu = "SELECT * from `books` WHERE `id` = '$book_id'";
			     $sel_book_qu = mysqli_query($con , $sel_book_qu);
				$run_sel_book = mysqli_fetch_array($sel_book_qu);
				
				$sel_techs_qu = "SELECT * from `users` WHERE `id` = '$tech_id'";
				$sel_techs_qu = mysqli_query($con , $sel_techs_qu);
				$run_sel_techs = mysqli_fetch_array($sel_techs_qu);

				$sel_stu_qu = "SELECT * from `stu` WHERE `id` = '$tech_id'";
				$sel_stu_qu = mysqli_query($con , $sel_stu_qu);
				$run_sel_stu = mysqli_fetch_array($sel_stu_qu);
				
				if($_POST){
					$today_date = date("Y-m-d H-i-s");
					$new_book_sch_qu = "UPDATE `brow_book` SET `back_date` = '$today_date' WHERE `id` ='$bbook_id'";
					$up_book_state_qu = "UPDATE `books` SET `take_state` = '0' WHERE `id` ='$book_id'";
					if(mysqli_query($con , $new_book_sch_qu) && mysqli_query($con , $up_book_state_qu)){
						?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-success alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>تم !</strong> تم تأكيد إستعادة الكتاب بنجاح</h5>
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
          <h3 class="content-header-title mb-0 d-inline-block">تأكيد إستعادة الكتاب</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">الرئيسية</a>
                </li>
                <li class="breadcrumb-item"><a href="./library.php">المكتبة</a>
                </li>
                <li class="breadcrumb-item"><a href="./edit_book.php?book_id=<?php echo $book_id; ?>"><?php echo $run_sel_book['name']; ?> ( إستعادة الكتاب )</a>
                </li>
                <li class="breadcrumb-item"><a href="#">تأكيد إستعادة الكتاب</a>
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
                  <h4 class="card-title font-weight-bold" id="basic-layout-card-center"><?php echo $run_sel_book['name']; ?> <small>تأكيد إستعادة الكتاب</small></h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show px-1">
					 <form class="form" method="post" action="./back_book.php?book_id=<?php echo $bbook_id; ?>">
                      <div class="form-body">
                        <div class="form-group">
                          <bookel for="eventRegInput1">اسم الكتاب</bookel>
                          <input type="text" id="eventRegInput1"  disabled class="form-control" name="tech_name" value="<?php echo $run_sel_book['name']; ?>">
                          <input type="hidden" name="ok" value="0">
                        </div>
                        <div class="form-group">
                          <bookel for="eventRegInput1">تاريخ الإستعارة</bookel>
                          <input type="text" id="eventRegInput1" disabled class="form-control" name="book_res_day" value="<?php echo $run_sel_bbook['brow_date']; ?>">
                        </div>
                        <div class="form-group">
                          <bookel for="eventRegInput1">تاريخ الإستعادة</bookel>
                          <input type="text" id="eventRegInput1" disabled class="form-control" name="book_res_day" value="<?php echo $today; ?>">
                        </div>
                        <div class="form-group">
                          <bookel for="eventRegInput1">المعلم</bookel>
                          <input type="text" id="eventRegInput1" disabled class="form-control" name="tech_id" value="<?php echo $run_sel_techs['name']; ?>">
                        </div>

 						
 						<div class="form-group">
                          <bookel for="eventRegInput1">الطلاب</bookel>
                          <input type="text" id="eventRegInput1" disabled class="form-control" name="tech_id" value="<?php echo $run_sel_stu['name']; ?>">
                        </div>


                      </div>
                      <div class="form-actions center">
						  <button class="btn px-2 btn-red"  type="submit" aria-haspopup="true" aria-expanded="false">
							  <i class="ft-check"></i>
							  تأكيد الإستعادة
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