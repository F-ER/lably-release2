 <?php
	
	include("inc/header.php");
	
	?>
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">بحث عن كتاب</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">الرئيسية</a>
                </li>
                <li class="breadcrumb-item"><a href="./library.php">المكتبة</a>
                </li>
                <li class="breadcrumb-item"><a href="#">بحث عن كتاب</a>
                </li>
              </ol>
            </div>
          </div>
        </div>

        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right col-12">
			 <form lass="form" method="post" action="./search_book.php">
			  <div class="form-group pull-right col-8">
                   <input type="text" id="eventRegInput1" class="form-control col-12" name="book_name" required placeholder="اسم الكتاب / المؤلف / رقم الكتاب">
                </div>
			  <button class="btn btn-cyan pull-right border-0 px-2 ml-1"  type="submit" aria-haspopup="true" aria-expanded="false">بحث</button>
			 </form>
            
          </div>
        </div>
      </div>
      <div class="content-body">
		  <div class="row">
			  			  <?php
	if($_POST){
	$book = $_POST['book_name'];	
	$sel_bookss_qu = "select * from `books` where `bid` like '%$book%' or `name` like '%$book%' or `auth` like '%$book%' ";
	$sel_bookss_qu = mysqli_query($con , $sel_bookss_qu);
	$book_num = 1;
	while($run_sel_books = mysqli_fetch_array($sel_bookss_qu)){
		?>
	<div class="col-xl-3 col-lg-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="media align-items-stretch" style="display: -webkit-box;">
                    <div class="p-2 text-center bg-amber bg-lighten-2 rounded-left">
						<i class="ft-feather white font-large-1"></i>
						<h1 class="font-large-1 pt-2 font-weight-bold"><?php echo $book_num ; ?></h1>
                    </div>
                    <div class="p-2 media-body text-left">
                      <h5 class="font-weight-bold title">
						  <?php echo $run_sel_books['name']; ?>
						</h5>
                      <h5 class="text-bold-400 mb-0 blue-grey title">
						  <?php echo $run_sel_books['bid'] ?> | <span class="primary darken-4 auth"><?php echo $run_sel_books['auth']; ?></span>
						</h5>
						<hr>
						 <?php
						  
						  if($run_user['perm'] == "1"){
						  ?>
						<a href="./edit_book.php?book_id=<?php echo $run_sel_books['id']; ?>">
							  <button class="btn btn-amber border-0 btn-sm">
							  <i class="ft-edit-2"></i> تعديل
							  </button>
						  </a>
						<a href="./del_book.php?book_id=<?php echo $run_sel_books['id']; ?>">
							<button class="btn  btn-danger  btn-sm"  type="button" aria-haspopup="true" aria-expanded="false">
								<i class="ft-trash-2"></i>
								حذف
							</button>
						</a>
						 <?php
						  }
		  if($run_sel_books['take_state'] == "0"){
		  ?>
						<a href="./brow_book.php?book_id=<?php echo $run_sel_books['id']; ?>">
							  <button class="btn btn-primary  border-0 btn-sm">
							  <i class="ft-edit-2"></i> إستعارة
							  </button>
						  </a>
						<?php } else if($run_sel_books['take_state'] == "1"){ 
			  $book_id = $run_sel_books['id'];
						 $sel_book_qu = "select * from `brow_book` where `book_id` = '$book_id' ORDER BY `brow_date` DESC  LIMIT 1";
			             $sel_book_qu = mysqli_query($con , $sel_book_qu);			
			                 $run_sel_book_qu = mysqli_fetch_array($sel_book_qu);
			              $brow_tech_id = $run_sel_book_qu['tech_id'];
			             $sel_brow_tech_qu = "select * from `users` where `id` = '$brow_tech_id'";
			             $sel_brow_tech_qu = mysqli_query($con , $sel_brow_tech_qu);			
			                 $run_sel_brow_tech = mysqli_fetch_array($sel_brow_tech_qu);
			  if($run_user['perm'] == "1" || $user_id == $run_sel_brow_tech['id']){
						?>
						<a href="./back_book.php?book_id=<?php echo $run_sel_book_qu['id']; ?>">
							  <button class="btn btn-info btn-darken-2  border-0 btn-sm">
							  <i class="ft-edit-2"></i> إستعادة
							  </button>
						  </a>
						<br><br>
						<?php } ?>
						<span class="alert-amber btn-sm ">المستعير : <?php echo $run_sel_brow_tech['name'];  ?></span>
						<?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			  <?php
		$book_num++;
	}
	}
			  ?>
</div>

 <?php
	
	include("inc/footer.php");
	
	?>