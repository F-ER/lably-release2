 <?php
	
	include("inc/header.php");
	 ?>

<div class="col-120 col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">حجوزات اليوم</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table mb-0">
            <thead>
              <th>#</th>
              <th>المعمل</th>
              <th>اليوم</th>
              <th>الوقت</th>
            </thead>
                      <tbody>
              <?php
     $labs_qu = "SELECT * FROM `labs_sch` WHERE `date` ='$today'";
     $labs_qu = mysqli_query($con , $labs_qu);
     $lab_num = 1 ;
     while($run_labs = mysqli_fetch_array($labs_qu)){
       $lab_id = $run_labs['lab_id'];
       $lab_qu = "SELECT * FROM `labs` ";
       $lab_qu = mysqli_query($con , $lab_qu);
       $run_lab = mysqli_fetch_array($lab_qu);
     ?>
                        <tr>
                          <th scope="row" class="border-top-0"><?php echo $lab_num; ?></th>
                          <td class="border-top-0"><?php echo $run_lab['name']; ?></td>
                          <td class="border-top-0"><?php echo $run_labs['date']; ?></td>
                          <td class="border-top-0"><?php echo $times[$run_labs['time_num']-1]; ?></td>
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
 
 <div class="col-120 col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">الحجوزات</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table mb-0">
            <thead>
              <th>#</th>
              <th>المعمل</th>
              <th>اليوم</th>
              <th>الوقت</th>
            </thead>
                      <tbody>
              <?php
     $labs_qu = "SELECT * FROM `labs_sch`";
     $labs_qu = mysqli_query($con , $labs_qu);
     $lab_num = 1 ;
     while($run_labs = mysqli_fetch_array($labs_qu)){
       $lab_id = $run_labs['lab_id'];
       $lab_qu = "SELECT * FROM `labs` ";
       $lab_qu = mysqli_query($con , $lab_qu);
       $run_lab = mysqli_fetch_array($lab_qu);
     ?>
                        <tr>
                          <th scope="row" class="border-top-0"><?php echo $lab_num; ?></th>
                          <td class="border-top-0"><?php echo $run_lab['name']; ?></td>
                          <td class="border-top-0"><?php echo $run_labs['date']; ?></td>
                          <td class="border-top-0"><?php echo $times[$run_labs['time_num']-1]; ?></td>
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


 

 