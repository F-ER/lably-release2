 <?php
	
	include("inc/header.php");
$error = 0;
	if($_GET){
		if($_GET['book_id']){
			$book_id = $_GET['book_id'];
			$sel_book_qu = "select * from `books` where `id` = '$book_id'";
			$sel_book_qu = mysqli_query($con , $sel_book_qu);
			if(mysqli_num_rows($sel_book_qu) == 1){
				$run_sel_book = mysqli_fetch_array($sel_book_qu);
			}else{
				$error++;
			}
			/////////////////////////////////////////////////////
			if($_POST){
				$book_name = $_POST['book_name'];
				$book_num = $_POST['book_num'];
				$book_auth = $_POST['book_auth'];
				
				$ser_stu_qu = "select * from `books` where `bid` = '$book_num' and `id` <> '$book_id'";
				$ser_stu_qu = mysqli_query($con , $ser_stu_qu);
				if(mysqli_num_rows($ser_stu_qu) <= 0){
				$up_stu_qu = "UPDATE `books` SET `name`='$book_name',`bid`='$book_num',`auth`='$book_auth' WHERE `id` = '$book_id'";
				if(mysqli_query($con , $up_stu_qu)){
					?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-success alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>تم !</strong> تم تعديل معلومات الطالب بنجاح</h5>
	</div>
</div>
<script>
	
	setTimeout(function(){
		window.location = "edit_book.php?book_id=<?php echo $book_id ?>";
	},2000)
	
	
</script>
<?php
				}
				}else {
					?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-danger alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>عفوا !</strong> رقم الكتاب موجود مسبقا</h5>
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
          <h3 class="content-header-title mb-0 d-inline-block">تعديل كتاب</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">الرئيسية</a>
                </li>
                <li class="breadcrumb-item"><a href="./library.php">المكتبة</a>
                </li>
                <li class="breadcrumb-item"><a href="#">تعديل كتاب</a>
                </li>
              </ol>
            </div>
          </div>
        </div>

        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
            <button class="btn btn-danger px-2"  type="button" aria-haspopup="true" aria-expanded="false"><i class="ft-x"></i>
            	<a href="./library.php">إلغاء</button></a>
          </div>
        </div>
      </div>
      <div class="content-body">
<div class="row justify-content-md-center">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                   <h4 class="card-title font-weight-bold" id="basic-layout-card-center"><?php echo $run_sel_book['name']; ?> <small>تعديل الكتاب</small></h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <form class="form" method="post" action="./edit_book.php?book_id=<?php echo $run_sel_book['id']; ?>">
                      <div class="form-body">
                        <div class="form-group">
                          <label for="eventRegInput1">اسم الكاتب</label>
                          <input type="text" id="eventRegInput1" class="form-control" name="book_name" value="<?php echo $run_sel_book['name']; ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="eventRegInput1">رقم الكتاب</label>
                          <input type="number" id="eventRegInput1" class="form-control" name="book_num" value="<?php echo $run_sel_book['bid']; ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="eventRegInput1">الكاتب</label>
                          <input type="text" id="eventRegInput1" class="form-control" name="book_auth" value="<?php echo $run_sel_book['auth']; ?>" required>
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