<?php include '../config.php';

include SITE_ROOT .'/includes/header.php'; 

require '../includes/conn.php';

?>

<?php 

if($_SESSION['user_role']=='Super Administrator'){
      $sql = "SELECT COUNT(emp_gender) AS male_total from employee WHERE emp_gender = 'Male'   ";
      $result = $conn->query($sql);
      $data =  $result->fetch_assoc();
      $male_total =  $data['male_total'];

      $sql = "SELECT COUNT(emp_gender) AS female_total from employee WHERE emp_gender = 'Female'  ";
      $result = $conn->query($sql);
      $data =  $result->fetch_assoc();
      $female_total =  $data['female_total'];

      $sql = "SELECT COUNT(item_no) AS vacant from item WHERE filled = '0' ";
      $result = $conn->query($sql);
      $data =  $result->fetch_assoc();
      $vacant =  $data['vacant'];

      // curdate
      $year = date("Y");
      $month = date("m");
      $date = date("Y-m-d");

      // $sql = "  SELECT COUNT( DISTINCT emp_gender) as female_total_leave from employee e , emp_leaves p where e.emp_id = p.emp_id and e.emp_gender = 'female' and month(p.leave_from_date) = '$month' and year(p.leave_from_date) = '$year'   ";

      $sql = "  SELECT DISTINCT e.emp_id, COUNT(  emp_gender) as female_total_leave from employee e , emp_leaves p where e.emp_id = p.emp_id and e.emp_gender = 'Female' and '$date' BETWEEN leave_from_date AND leave_to_date ";
      $result = $conn->query($sql);
      $data =  $result->fetch_assoc();
      $female_total_leave =  $data['female_total_leave'];

   
      $sql = "  SELECT DISTINCT e.emp_id, COUNT( emp_gender) as male_total_leave from employee e , emp_leaves p where e.emp_id = p.emp_id and e.emp_gender = 'Male' and '$date' BETWEEN leave_from_date AND leave_to_date  ";
      $result = $conn->query($sql);
      $data =  $result->fetch_assoc();
      $male_total_leave =  $data['male_total_leave'];

?>
<div class="container ">
      <div class="row">

            <div class="col-lg-4 col-sm-6 home-page-col">
                  <div class="home-col-box" style="background-color: #A8E5E9 ;">
                        <div class="row">
                              <div class="col" style="border-right: solid #6DC7CD 1px;">Male <span><?php echo $male_total ;  ?></span></div>
                              <div class="col">Female <span><?php echo $female_total ; ?></span></div>
                        </div>

                  </div>
                  <div class="home-col-box-title" style="background-color: #6DC7CD ;">
                        <h4 class="text-center">Employees</h4>
                  </div>
            </div>

            <div class="col-lg-4 col-sm-6 home-page-col">
                  <div class="home-col-box" style="background-color: #EE999F ;">
                        <h2 class="text-center" style="font-size: 43px; font-weight:100;"><?php echo $vacant ;  ?></h2>
                  </div>
                  <div class="home-col-box-title" style="background-color: #CE787E  ;">
                        <h4 class="text-center">Vacant Positions</h4>
                  </div>
            </div>

            <!-- <div class="col-lg-3 col-sm-6 home-page-col">
                  <div class="home-col-box" style="background-color: #F7CB75 ;">
                        <div class="row">
                              <div class="col" style="border-right: solid #B99653 1px;">Male <span>67</span></div>
                              <div class="col">Female <span>67</span></div>
                        </div>

                  </div>
                  <div class="home-col-box-title" style="background-color: #B99653 ;">
                        <h4 class="text-center">Trainings</h4>
                  </div>
            </div> -->

            <div class="col-lg-4 col-sm-6 home-page-col">
                  <div class="home-col-box" style="background-color: #90AD7F ;">
                        <div class="row">
                              <div class="col" style="border-right: solid #6A8858 1px;">Male <span><?php echo $male_total_leave ; ?></span></div>
                              <div class="col">Female <span><?php echo $female_total_leave ; ?></span></div>
                        </div>

                  </div>
                  <div class="home-col-box-title" style="background-color: #6A8858 ;">
                        <h4 class="text-center">Employee Leave</h4>
                  </div>
            </div>
      </div>
      <!-- end of first part -->

     
      <?php include "emp_mang_section.php";?>
     
</div>

<?php } else { ?>

      <div class="container">
      <div class="jumbotron">
  <h1 class="display-4">Hello, <?php echo $_SESSION['user_name'] ?></h1>
  
</div>
      </div>
<?php } ?>
