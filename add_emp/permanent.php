<?php

if(isset($_POST['submit-per'])){

    $job_type=$_POST['job_type'];
    $item_no=$_POST['item_no'];
    $position=$_POST['position'];
    $salary_grade=$_POST['salary_grade'];
    $date_created=$_POST['date_created'];
    // $applicant=$_POST['applicant'];
    $department=$_POST['department'];
    $office=$_POST['office'];
    $nature=$_POST['nature'];
    $designation=$_POST['designation'];
    $date_of_expiry=$_POST['date_of_expiry'];
    $emp_id=$_POST['emp_id'];
    $emp_first_name=$_POST['emp_first_name'];
    $emp_last_name=$_POST['emp_last_name'];
    $emp_middle_name=$_POST['emp_middle_name'];
    $emp_ext=$_POST['emp_ext'];
    $emp_gender=$_POST['emp_gender'];

     $sql2 = "UPDATE item SET emp_id = '$emp_id'  WHERE item_no='$item_no'";

    // $sql2 = "INSERT INTO employee_agency (emp_id, job_type , item_no, position, salary_grade, date_created,department,office ,nature,designation,date_of_expiry)

    // VALUES ('$emp_id','$job_type', '$item_no', '$position', '$salary_grade', '$date_created','$department','$office','$nature','$designation','$date_of_expiry')";


    $sql3 = "INSERT INTO employee (emp_id , emp_first_name, emp_last_name, emp_middle_name, emp_ext,emp_gender)

    VALUES ('$emp_id','$emp_first_name', '$emp_last_name', '$emp_middle_name', '$emp_ext', '$emp_gender')";

// adding for leave credits 

        $year = date("Y");


        $sql4 = "INSERT INTO `leave_credits_result` (`emp_id`, `year`, `vl_pts_1`, `vl_pts_2`, `vl_pts_3`, `vl_pts_4`, `vl_pts_5`, `vl_pts_6`, `vl_pts_7`, `vl_pts_8`, `vl_pts_9`, `vl_pts_10`, `vl_pts_11`, `vl_pts_12`, `sl_pts_1`, `sl_pts_2`, `sl_pts_3`, `sl_pts_4`, `sl_pts_5`, `sl_pts_6`, `sl_pts_7`, `sl_pts_8`, `sl_pts_9`, `sl_pts_10`, `sl_pts_11`, `sl_pts_12`) VALUES ('$emp_id', '$year', '16.25', '17.5', '18.75', '20', '21.25', '22.5', '23.75', '25', '26.25', '27.5', '28.75', '30', '16.25', '17.5', '18.75', '20', '21.25', '22.5', '23.75', '25', '26.25', '27.5', '28.75', '30');";


    if (mysqli_query($conn, $sql2)  && mysqli_query($conn, $sql3)   && mysqli_query($conn, $sql4)) {
   
     echo  '<script>toastr.success("Employee added successfully")</script>';
    } else {
        echo  '<script>toastr.error("Employee not added. Try again !")</script>';
     
    }

    // echo $emp_first_name ; 

}

?>



<div class="Permanent switch-tab" style="display: block;">

<form method="post" action="" enctype="multipart/form-data">



    <!-- <div class="form-row">
        <div class="col-lg-12 col-sm-12">
            <label for="">Item Information</label>
        </div>
    </div>

    <div class="form-row">
        <div class="col-lg-3 col-sm-6">
            <select class="form-control text-input" name="item_no" id="select_item" required>
            <?php
                    $query = "SELECT item_no FROM item where filled = 0  ";
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

        <div class="col-lg-2 col-sm-6">
            <input type="text" class="form-control text-input" name="position" placeholder="position" id="position">
        </div>

        <div class="col-lg-2 col-sm-6">
            <input type="text" class="form-control text-input" name="salary_grade" placeholder="Salary Grade" id="salary_grade">
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="d-flex flex-column">
                <input type="date" class="form-control text-input" name="date_created" id="date_created">
                <small class="text-muted"> (Date created)</small>
            </div>
        </div>

        <div class="col-lg-2 col-sm-6">
            <div class="d-flex flex-column">
                <input type="text" class="form-control text-input" name="nature" placeholder="Nature" id="nature">
            </div>
        </div>

    </div> -->

    <div class="form-row mt-3">
        <div class="col-lg-12 col-sm-12">
            <label for="">Employee Information</label>
        </div>
    </div>

    <div class="form-row">
       
    </div>

    <div class="form-row mt-3">

    <div class="col-lg-3 col-sm-6">
            <input type="text" class=" form-control text-input" placeholder="Last name" name="emp_last_name">
        </div>
        <div class="col-lg-3 col-sm-6">
            <input type="text" class=" form-control text-input" placeholder="First name" name="emp_first_name">
        </div>
       
        <div class="col-lg-3 col-sm-6">
            <input type="text" class="form-control text-input" placeholder="Middle name" name="emp_middle_name">
        </div>
        <div class="col-lg-3 col-sm-6">
            <input type="text" class=" form-control text-input" placeholder="Employee Id" name="emp_id"  >
        </div>
       
    </div>

    <div class="form-row mt-3">
        
        <div class="col-lg-3 col-sm-6">
        <label for="">Employee type</label>
                <input type="text" class=" form-control text-input" placeholder="Employee Type" name="">
            </div>
            <div class="col-lg-3 col-sm-6">
            <label for="">Nature of Employement</label>
                <input type="text" class=" form-control text-input" placeholder="Nature of Employment" name="">
            </div>
           
            <div class="col-lg-3 col-sm-6">
                <label for="">Designation</label>
                <input type="text" class="form-control text-input" placeholder="Designation" name="">
            </div>
            <div class="col-lg-3 col-sm-6">
                <label for="">Effective Date</label>
                <input type="date" class=" form-control text-input"  name=""  >
            </div>
           
        </div>

    
   

    <div class="modal-footer">
        <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
        </button>
        <button type="submit" name="submit-per" class="btn button-1 ">Submit</button>
    </div>

    </form>
</div>


<script>

// get applicant info
$(document).ready(function(){
    $("#select_item").change(function(){
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
                
            }
        });
        // console.log("hi");
    });
}); 
</script>