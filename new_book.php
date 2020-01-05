 <?php
	
	include("inc/header.php");

if($_POST){
	$book_name = $_POST['book_name'];
	$book_num = $_POST['book_num'];
	$book_auth = $_POST['book_auth'];
	
	$ser_stu_qu = "select * from `books` where `bid` = '$book_num'";
	$ser_stu_qu = mysqli_query($con , $ser_stu_qu);
	if(mysqli_num_rows($ser_stu_qu) <= 0){
					
	$new_stu_qu = "INSERT INTO `books`(`name`, `bid`, `auth`) VALUES ('$book_name','$book_num','$book_auth')";
	$new_stu_qu = mysqli_query($con , $new_stu_qu);
	if($new_stu_qu){
		$last_id = $con->insert_id;
		?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-success alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>تم !</strong> تم إضافة كتاب جديد سيتم تحويلك إلى الصفحة الخاصة بالكتاب خلال لحظات</h5>
	</div>
</div>	
<script>
	
	setTimeout(function(){
		window.location = "edit_book.php?book_id=<?php echo $last_id ?>";
	},2000)
	
	
</script>
<?php
	}
	}
	else {
		?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-danger alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>عفوا !</strong> رقم الكتاب موجود مسبقا</h5>
	</div>
</div>
<script>
	
	setTimeout(function(){
		window.location = "new_book.php";
	},1000)
	
	
</script>
<?php
		
	}
	
}else{

	?>
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">كتاب جديد</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">الرئيسية</a>
                </li>
                <li class="breadcrumb-item"><a href="./library.php">المكتبة</a>
                </li>
                <li class="breadcrumb-item"><a href="#">كتاب جديد</a>
                </li>
              </ol>
            </div>
          </div>
        </div>

        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
            <a href="./library.php"><button class="btn btn-red px-2 border-0"  type="button" aria-haspopup="true" aria-expanded="false">إلغاء</button></a>
          </div>
        </div>
      </div>
      <div class="content-body">
<div class="row justify-content-md-center">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-card-center">كتاب جديد</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <form class="form" method="post" action="./new_book.php">
                      <div class="form-body">
                        <div class="form-group">
                          <label for="eventRegInput1">اسم الكتاب</label>
                          <input type="text" id="eventRegInput1" class="form-control" name="book_name" required>
                        </div>
                        <div class="form-group">
                          <label for="eventRegInput1">رقم الكتاب</label>
                          <input type="number" id="eventRegInput1" class="form-control" name="book_num" required>
                        </div>
                        <div class="form-group">
                          <label for="eventRegInput1">المؤلف</label>
                          <input type="text" id="eventRegInput1" class="form-control" name="book_auth" required>
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