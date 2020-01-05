<?php
  
  include("inc/header.php");
   ?>
  <div class="col-120 col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">الكتب المتوفرة</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table mb-0">
						<thead>
							<th>#</th>
							<th>اسم الكتاب </th>
							<th>اسم الكاتب </th>
							<th>رقم الكتاب</th>
						</thead>
                      <tbody>
						  <?php
		 $labs_qu = "SELECT * FROM `books` where `take_state` = 0";
     
		 $labs_qu = mysqli_query($con , $labs_qu);
		 $lab_num = 1 ;
		 while($run_labs = mysqli_fetch_array($labs_qu)){
			 $lab_id = $run_labs['name'];
			 $lab_qu = "SELECT * FROM `books`";
     	 $lab_qu = mysqli_query($con , $lab_qu);
			 $run_lab = mysqli_fetch_array($lab_qu);
		 ?>
                       <tr>
                          <th scope="row" class="border-top-0"><?php echo $lab_num; ?></th>
                          <td class="border-top-0"><?php echo $run_labs['name']; ?></td>
                          <td class="border-top-0"><?php echo $run_labs['auth']; ?></td>
                          <td class="border-top-0"><?php echo $run_labs['bid']; ?></td>
                          
                        </tr>
						  <?php
		 $lab_num++;
		 }  ?> 
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>