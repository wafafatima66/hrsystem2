<?php require '../includes/conn.php'; ?>

<?php

if (isset($_POST['submit'])) {

  $emp_last_name = $_POST['emp_last_name'];
  $emp_first_name = $_POST['emp_first_name'];
  $emp_middle_name = $_POST['emp_middle_name'];
  $emp_id = $_POST['emp_id'];
  $nature_of_employment = $_POST['nature_of_employment'];
  $designation = $_POST['designation'];
  $employee_type = $_POST['employee_type'];
  $effective_date = $_POST['effective_date'];
  $item_no = $_POST['item_no'];
  $position = $_POST['position'];
  $salary_grade = $_POST['salary_grade'];
  $monthly_salary = $_POST['monthly_salary'];
  $date_created = $_POST['date_created'];
  $description = $_POST['description'];
  $division = $_POST['division'];
  $area_wrk_assign = $_POST['area_wrk_assign'];
  $date_of_publication = $_POST['date_of_publication'];
  $end_of_publication = $_POST['end_of_publication'];


  $sql2 = "UPDATE item SET 
  emp_id = '$emp_id',
  position ='$position',
  salary_grade ='$salary_grade',
  monthly_salary ='$monthly_salary',
  date_created ='$date_created',
  description ='$description',
  division ='$division',
  area_wrk_assign ='$area_wrk_assign',
  filled = 1
  WHERE item_no='$item_no'";

  $sql3 = "UPDATE publication SET 
  date_of_publication = '$date_of_publication',
  end_of_publication ='$end_of_publication'
  WHERE item_number='$item_no'";

  $sql4 = "INSERT INTO employee (emp_id , emp_first_name, emp_last_name, emp_middle_name, active) VALUES ('$emp_id','$emp_first_name', '$emp_last_name', '$emp_middle_name', '1')";

$sql5 = "INSERT INTO applicant (item_no , applicant_id , applicant_first_name, applicant_last_name, applicant_middle_name, appointmented) VALUES ('$item_no','$emp_id','$emp_first_name', '$emp_last_name', '$emp_middle_name', '1')";

  // adding for leave credits 

  $year = date("Y");

  $sql6 = "INSERT INTO `leave_credits_result` (`emp_id`, `year`, `vl_pts_1`, `vl_pts_2`, `vl_pts_3`, `vl_pts_4`, `vl_pts_5`, `vl_pts_6`, `vl_pts_7`, `vl_pts_8`, `vl_pts_9`, `vl_pts_10`, `vl_pts_11`, `vl_pts_12`, `sl_pts_1`, `sl_pts_2`, `sl_pts_3`, `sl_pts_4`, `sl_pts_5`, `sl_pts_6`, `sl_pts_7`, `sl_pts_8`, `sl_pts_9`, `sl_pts_10`, `sl_pts_11`, `sl_pts_12`) VALUES ('$emp_id', '$year', '16.25', '17.5', '18.75', '20', '21.25', '22.5', '23.75', '25', '26.25', '27.5', '28.75', '30', '16.25', '17.5', '18.75', '20', '21.25', '22.5', '23.75', '25', '26.25', '27.5', '28.75', '30');";


  if (mysqli_query($conn, $sql2)  && mysqli_query($conn, $sql3)   && mysqli_query($conn, $sql4) && mysqli_query($conn, $sql5)&& mysqli_query($conn, $sql6)) {

    echo  '<script>toastr.success("Employee added successfully")</script>';
  } else {
    echo  '<script>toastr.error("Employee not added. Try again !")</script>';
  }
}

?>
<style>
  .switch-tab {

    display: none;
    margin-top: 20px;
  }
</style>

<!--button to add employye-->
<!-- Modal -->
<div class="modal fade addemployee " id="addemployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <h3 class=" background-title-1 p-3">Add Employee</h3>

      <div class="modal-body">

        <div class="container-box mt-0">

          <form method="post" action="" enctype="multipart/form-data">

            <div class="form-row ">
              <div class="col-lg-12 col-sm-12">
                <label for="" style="font-weight: 700;">Employee Information</label>
              </div>
            </div>

            <div class="form-row ">

              <div class="col-lg-3 col-sm-6">
                <label for="">Last Name</label>
                <input type="text" class=" form-control text-input" placeholder="Last name" name="emp_last_name">
              </div>
              <div class="col-lg-3 col-sm-6">
                <label for="">First Name</label>
                <input type="text" class=" form-control text-input" placeholder="First name" name="emp_first_name">
              </div>

              <div class="col-lg-3 col-sm-6">
                <label for="">Middle Name</label>
                <input type="text" class="form-control text-input" placeholder="Middle name" name="emp_middle_name">
              </div>
              <div class="col-lg-3 col-sm-6">
                <label for="">Employee Id</label>
                <input type="text" class=" form-control text-input" placeholder="Employee Id" name="emp_id">
              </div>

            </div>

            <div class="form-row mt-3">

              <div class="col-lg-3 col-sm-6">
                <label for="">Employee type</label>
                <input type="text" class=" form-control text-input" placeholder="Employee Type" name="employee_type">
              </div>
              <div class="col-lg-3 col-sm-6">
                <label for="">Nature of Employement</label>
                <select name="nature_of_employment"  class="form-control text-input">
                  <option value="">Nature of Employment</option>
                  <option value="REEMPLOYMENT">REEMPLOYMENT</option>
                  <option value="ORIGINAL">ORIGINAL</option>
                  <option value="PROMOTION">PROMOTION</option>
                  <option value="TRANFER">TRANFER</option>
                  <option value="REAPPOINTMENT">REAPPOINTMENT</option>
                </select>
              </div>

              <div class="col-lg-3 col-sm-6">
                <label for="">Designation</label>
                <input type="text" class="form-control text-input" placeholder="Designation" name="designation">
              </div>
              <div class="col-lg-3 col-sm-6">
                <label for="">Effective Date</label>
                <input type="date" class=" form-control text-input" name="effective_date">
              </div>

            </div>

          
        </div>

        <div class="container-box">
          <div class="form-row">
            <div class="col-lg-12 col-sm-12">
              <label for="" style="font-weight: 700;">Item and Publication Details</label>
            </div>
          </div>

          <div class="form-row">
            <div class="col-lg-3 col-sm-6 ">
              <label for="">Item No.</label>
              <select  class="form-control text-input " name="item_no" id="select_item"  required>
            <?php
                    $query = "SELECT item_no FROM item where filled = 0";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        echo "<option value=''> Select Item </option> ";
                        while ($mydata = mysqli_fetch_assoc($result)) {
                            echo "<option value= '" . $mydata['item_no'] . "'>" . $mydata['item_no'] . "</option>";
                        }
                    } else {
                        echo "<option value='' > Select Item </option>";
                    }
            ?>
            </select> 
            
            </div>
            
            <div class="col-lg-3 col-sm-6">
              <label for="">Plantilla Position</label>
              <input type="text" class="form-control text-input" name="position" placeholder="Plantilla Position" id="position">
            </div>

            <div class="col-lg-1 col-sm-6">
              <label for="">SG</label>
              <input type="text" class="form-control text-input" name="salary_grade" placeholder="SG" id="salary_grade">
            </div>

            <div class="col-lg-2 col-sm-6">
              <label for="">Monthly Salary</label>
              <input type="text" class="form-control text-input" name="monthly_salary" placeholder="Monthly Salary" id="monthly_salary">
            </div>

            <div class="col-lg-3 col-sm-6">
              <div class="d-flex flex-column">
                <label for="">Date Created</label>
                <input type="date" class="form-control text-input" name="date_created" id="date_created">
                <small class="text-muted"> (Date created)</small>
              </div>
            </div>

          </div>

          <div class="form-row mt-3">
            <div class="col-lg-6 col-sm-6">
              <label for="">Item description</label>
              <textarea name="description" id="description" cols="45" rows="5" placeholder="Item description"></textarea>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="form-row">

                <div class="col-lg-6 col-sm-6">
                  <label for="">Department</label>
                  <input type="text" class=" form-control text-input" placeholder="Department" name="division" id="division">
                </div>
                <div class="col-lg-6 col-sm-6">
                  <label for="">Office/Unit</label>
                  <input type="text" class=" form-control text-input" placeholder="Office/Unit" name="area_wrk_assign" id="area_wrk_assign">
                </div>

                <div class="col-lg-6 col-sm-6 mt-2">
                  <div class="d-flex flex-column">
                    <input type="date" class="form-control text-input" id="date_of_publication" name="date_of_publication">
                    <small class="text-muted"> (Date Published)</small>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-6 mt-2">
                  <div class="d-flex flex-column">
                    <input type="date" class="form-control text-input" id="end_of_publication" name="end_of_publication">
                    <small class="text-muted"> (End of Publication)</small>
                  </div>
                </div>

              </div>
            </div>

          </div>

          <div class="form-row mt-3">
            <div class="col-lg-12 col-sm-12">
              <label for="" style="font-weight: 700;">Previous Employee of this item(If applicable)</label>
            </div>
          </div>

          <div class="form-row ">

            <div class="col-lg-3 col-sm-6">
              <label for="">Last Name</label>
              <input type="text" class=" form-control text-input" placeholder="Last Name" name="" id="pre_emp_last_name">
            </div>
            <div class="col-lg-3 col-sm-6">
              <label for="">First Name</label>
              <input type="text" class=" form-control text-input" placeholder="First Name" name="" id="pre_emp_first_name">
            </div>

            <div class="col-lg-3 col-sm-6">
              <label for="">Middle Name</label>
              <input type="text" class="form-control text-input" placeholder="Middle Name" name="" id="pre_emp_middle_name">
            </div>
            <div class="col-lg-3 col-sm-6">
              <label for="">Employee Id</label>
              <input type="text" class="form-control text-input" placeholder="Employee Id" name="" id="pre_emp_id">
            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
          </button>
          <button type="submit" name="submit" class="btn button-1 ">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>



<script>

// get applicant info
$(document).ready(function(){
    $("#select_item").change(function(){
//  console.log("hi");
        $.ajax({
            url:'../add_emp/get_info_item.php',
            type : 'post',
            data: {item_no : $(this).val()},
            dataType: 'json',
            success : function(result){
                
                $('#position').val(result.position);
                $('#salary_grade').val(result.salary_grade);
                $('#date_created').val(result.date_created);
                $('#nature').val(result.nature);
                $('#monthly_salary').val(result.monthly_salary);
                $('#description').val(result.description);
                $('#division').val(result.division);
                $('#area_wrk_assign').val(result.area_wrk_assign);
                $('#date_of_publication').val(result.date_of_publication);
                $('#end_of_publication').val(result.end_of_publication);
                $('#pre_emp_last_name').val(result.pre_emp_last_name);
                $('#pre_emp_first_name').val(result.pre_emp_first_name);
                $('#pre_emp_middle_name').val(result.pre_emp_middle_name);
                $('#pre_emp_id').val(result.pre_emp_id);
                
            }
        });
        
    });

   
}); 
</script>