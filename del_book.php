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
				if($_POST){
					$pass =  md5(sha1($_POST['password']));
					if($pass == $run_user['password']){
						
					$del_book_qu = "DELETE FROM `books` WHERE `id` = '$book_id'";
					$del_brow_book_qu = "DELETE FROM `brow_book` WHERE `book_id` = '$book_id'";
					if(mysqli_query($con , $del_book_qu) && mysqli_query($con , $del_brow_book_qu)){
						?>
<div class="row col-12 justify-content-md-center">
<div class="alert bg-success alert-dismissible mb-2 " role="alert">
	<h5 class="white"><strong>تم !</strong> تم حذف الكتاب بنجاح</h5>
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
	
	window.location = "library.php";
	
	
</script>

<?php
}
	?>
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">حذف الكتاب</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">الرئيسية</a>
                </li>
                <li class="breadcrumb-item"><a href="./library.php">المكتبة</a>
                </li>
                <li class="breadcrumb-item"><a href="./edit_book.php?book_id=<?php echo $book_id; ?>"><?php echo $run_sel_book['name']; ?> ( حذف الكتاب )</a>
                </li>
                <li class="breadcrumb-item"><a href="#">تأكيد حذف الكتاب</a>
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
                  <h4 class="card-title font-weight-bold" id="basic-layout-card-center"><?php echo $run_sel_book['name']; ?> <small>تأكيد حذف الكتاب</small></h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show px-1">
					 <form class="form" method="post" action="./del_book.php?book_id=<?php echo $book_id; ?>">
                      <div class="form-body">
                        <div class="form-group">
                          <label for="eventRegInput1">اسم الكتاب</label>
                          <input type="text" id="eventRegInput1"  disabled class="form-control"  value="<?php echo $run_sel_book['name']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="eventRegInput1">رقم الكتاب</label>
                          <input type="text" id="eventRegInput1" disabled class="form-control"  value="<?php echo $run_sel_book['bid']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="eventRegInput1">الكاتب</label>
                          <input type="text" id="eventRegInput1" disabled class="form-control"  value="<?php echo $run_sel_book['auth']; ?>">
                        </div>
                        <div class="form-group">
							 <label for="eventRegInput1" class="red text-center full-width">
							  <br>
							  <span class="alert-warning p-1 full-width">
								  سيتم حذف جميع الأمور المتعلقة بهذا الكتاب
							  </span>
							  <br> <br> <br>
							  لحذف الكتاب يجب كتابة كلمة المرور الخاصه بك
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