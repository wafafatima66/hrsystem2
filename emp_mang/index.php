<?php include '../config.php';


include SITE_ROOT . '/includes/header.php';

require '../includes/conn.php';



?>

<?php
$sql = "SELECT COUNT(e.emp_gender) AS male_total from employee e join item i on e.emp_id = i.emp_id WHERE e.emp_gender = 'Male' and appt_stat = 'P'   ";
$result = $conn->query($sql);
$data =  $result->fetch_assoc();
$per_male_total =  $data['male_total'];

$sql = "SELECT COUNT(e.emp_gender) AS female_total from employee e join item i on e.emp_id = i.emp_id WHERE e.emp_gender = 'Female' and appt_stat = 'P'  ";
$result = $conn->query($sql);
$data =  $result->fetch_assoc();
$per_female_total =  $data['female_total'];

// MOA

$sql = "SELECT COUNT(e.emp_gender) AS male_total from employee e join item i on e.emp_id = i.emp_id WHERE e.emp_gender = 'Male' and appt_stat = 'M'   ";
$result = $conn->query($sql);
$data =  $result->fetch_assoc();
$moa_male_total =  $data['male_total'];

$sql = "SELECT COUNT(e.emp_gender) AS female_total from employee e join item i on e.emp_id = i.emp_id WHERE e.emp_gender = 'Female' and appt_stat = 'M'  ";
$result = $conn->query($sql);
$data =  $result->fetch_assoc();
$moa_female_total =  $data['female_total'];

//JOB ORDER

$sql = "SELECT COUNT(e.emp_gender) AS male_total from employee e join item i on e.emp_id = i.emp_id WHERE e.emp_gender = 'Male' and appt_stat = 'J'   ";
$result = $conn->query($sql);
$data =  $result->fetch_assoc();
$job_male_total =  $data['male_total'];

$sql = "SELECT COUNT(e.emp_gender) AS female_total from employee e join item i on e.emp_id = i.emp_id WHERE e.emp_gender = 'Female' and appt_stat = 'J'  ";
$result = $conn->query($sql);
$data =  $result->fetch_assoc();
$job_female_total =  $data['female_total'];

?>


<div class="container ">
      <div class="row">

            <div class="col-lg-4 col-sm-6 home-page-col">
                  <div class="home-col-box" style="background-color: #A8E5E9 ;">
                        <div class="row">
                              <div class="col" style="border-right: solid #6DC7CD 1px;">Male <span><?= $per_male_total ?></span></div>
                              <div class="col">Female <span><?= $per_female_total ?></span></div>
                        </div>

                  </div>
                  <div class="home-col-box-title" style="background-color: #6DC7CD ;">
                        <h4 class="text-center">Permanent</h4>
                  </div>
            </div>

            <div class="col-lg-4 col-sm-6 home-page-col">

                  <div class="home-col-box" style="background-color: #EE999F ;">
                        <div class="row">
                              <div class="col" style="border-right: solid #CE787E 1px;">Male <span><?= $moa_male_total ?></span></div>
                              <div class="col">Female <span><?= $moa_female_total ?></span></div>
                        </div>

                  </div>

                  <div class="home-col-box-title" style="background-color: #CE787E  ;">
                        <h4 class="text-center">MOA/Residency</h4>
                  </div>
            </div>

            <div class="col-lg-4 col-sm-6 home-page-col">
                  <div class="home-col-box" style="background-color: #F7CB75 ;">
                        <div class="row">
                              <div class="col" style="border-right: solid #B99653 1px;">Male <span><?= $job_male_total ?></span></div>
                              <div class="col">Female <span><?= $job_female_total ?></span></div>
                        </div>

                  </div>
                  <div class="home-col-box-title" style="background-color: #B99653 ;">
                        <h4 class="text-center">Job Order</h4>
                  </div>
            </div>


      </div>
      <!-- end of first part -->

      <?php include "../home/emp_mang_section.php"; ?>

      <div class="container-box emp_report_gen_box">

            <h4 class="h4-heading">PERSONNEL STATISTICS</h4>

            <div class="form-row mt-4">

                  <div class="col-lg-12 col-sm-12 mt-2">
                        <a href="../includes/export_excel.php?summary_of_position" >SUMMARY OF POSITION</a>
                  </div>

                  <div class="col-lg-12 col-sm-12 mt-2">
                        <a href="../includes/export_excel.php?educational_profile" >EDUCATIONAL PROFILE</a>
                  </div>

                  <div class="col-lg-12 col-sm-12 mt-2">
                        <a href="../includes/export_excel.php?dob_over_age" >DOB OVER AGE</a>
                  </div>


            </div>

      </div>

</div>

<script>
      jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                  window.location = $(this).data("href");
            });
      });
</script>