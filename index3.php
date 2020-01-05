 <?php
	
	include("inc/header.php");
	 ?>

<div class="col-100 col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">المستعيرين</h4>  
              </div>
              <div class="card-content collapse show">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table mb-0">
						<thead>


              <!-- script select Date 

               <select name="selct_date" class="form-control">
              <option disabled selected> اختر تاريخ العرض </option>
                    <option name="today" > إستعارات اليوم </option>
                    <option name="week" > إستعارات إسبوع </option>
                    <option name="month"> إستعارات الشهر </option>
                    <option name="semester"> إستعارات الترم</option>
                    <option name="yeer"> إستعارات السنه</option>
                    <option name="all"> عرض كل الإستعارات</option>
              </optgroup>
              </select>
              ---->



              <br><br>
							<th>#</th>
              <td> رقم الكتاب </td>
							<th>الكتاب</th>
							<th>الكاتب</th>
							<th>تاريخ الإستعاره</th>
              <th>تاريخ الاستعادة</th>
              <th>رقم المستعير</th>
						


						
						  <?php
              $today = date('Y-m-d', strtotime(" today ")); 
              $week = date('Y-m-d', strtotime("-1 week ")); 
              $month = date('Y-m-d', strtotime("-1 month ")); 
              $semester = date('Y-m-d', strtotime("-4 month "));

              $day =$today;

              
#echo "month ", $firstday, "\n" ,$scendday ; 

		 $brow_qu = "SELECT *  FROM `brow_book`";# WHERE `brow_date` BETWEEN '".$week."' AND '".$today."' ;";
		 $brow_qu = mysqli_query($con , $brow_qu);
		 $brow_num = 1 ;
		 while($run_brow = mysqli_fetch_array($brow_qu))
     {
      
			 $book_id = $run_brow['book_id'];
			 $book_qu = "SELECT * FROM `books` where `id` = '$book_id' ";
     	 $book_qu = mysqli_query($con , $book_qu);
			 $run_book = mysqli_fetch_array($book_qu);
       $firstday = date('l - d/m/Y', strtotime("-14 day ")); 
       $scendday = date('l - d/m/Y', strtotime("+1 day ")); 
       //$time = date ("H:i:s");
		 ?>
           
                        <tr>
                          <th scope="row" class="border-top-0"><?php echo $brow_num; ?></th>
                         
                       

                          <td class="border-top-0"><?php echo $run_book['id']; ?></td>
                          <td class="border-top-0"><?php echo $run_book['name']; ?></td>
                          <td class="border-top-0"><?php echo $run_book['auth']; ?></td>
                          <td class="border-top-0"><?php echo $run_brow['brow_date']; ?></td>
                          <td class="border-top-0"><?php echo $run_brow['back_date']; ?></td>
                          <td class="border-top-0"><?php echo $run_brow['tech_id']; ?></td>
                        </tr>

                          
						  <?php
		 $brow_num++;
		 }  ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


 