<?php

if (isset($_POST['submit-con'])) {

    $job_type = $_POST['job_type'];
    $item_no = $_POST['item_no'];
    $position = $_POST['position'];
    $salary_grade = $_POST['salary_grade'];
    $date_created = $_POST['date_created'];
    // $applicant = $_POST['applicant'];
    $department = $_POST['department'];
    $unit = $_POST['unit'];
    $designation = $_POST['designation'];
    $date_of_expiry = $_POST['date_of_expiry'];
    $date_of_effectivity = $_POST['date_of_effectivity'];
    $type = $_POST['type'];

    $emp_id = $_POST['emp_id'];
    $emp_first_name = $_POST['emp_first_name'];
    $emp_last_name = $_POST['emp_last_name'];
    $emp_middle_name = $_POST['emp_middle_name'];
    $emp_ext = $_POST['emp_ext'];
    $emp_gender = $_POST['emp_gender'];

    $sql2 = "INSERT INTO employee_job_type (emp_id,job_type , item_no, position, salary_grade, date_created,department,unit,nature,designation,date_of_expiry,date_of_effectivity,type)

    VALUES ('$emp_id','$job_type', '$item_no', '$position', '$salary_grade', '$date_created','$department','$unit','$nature','$designation','$date_of_expiry','$date_of_effectivity','$type')";

    $sql3 = "INSERT INTO employee (emp_id , emp_first_name, emp_last_name, emp_middle_name, emp_ext,emp_gender)

    VALUES ('$emp_id','$emp_first_name', '$emp_last_name', '$emp_middle_name', '$emp_ext', '$emp_gender')";

    if (mysqli_query($conn, $sql3)  && mysqli_query($conn, $sql2)) {

        echo  '<script>toastr.success("Employee added successfully")</script>';
    } else {
        echo  '<script>toastr.error("Employee not added. Try again !")</script>';
    }

    // echo $emp_first_name ; 

}

?>


<div class="Contractual switch-tab">

    <form method="post" action="" enctype="multipart/form-data">

        <input type="hidden" name="job_type" value="Contractual">

        <div class="form-row">
            <div class="col-lg-12 col-sm-12">
                <label for="">Item Information</label>
            </div>
        </div>

        <div class="form-row">
            <div class="col-lg-3 col-sm-6">
                <select class="form-control text-input" name="item_no">
                    <option value="">Item No </option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>

            <div class="col-lg-3 col-sm-6">
                <input type="text" class="form-control text-input" name="position" placeholder="Position">
            </div>

            <div class="col-lg-3 col-sm-6">
                <input type="text" class="form-control text-input" name="salary_grade" placeholder="Salary Grade">
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="d-flex flex-column">
                    <input type="date" class="form-control text-input" name="date_created">
                    <small class="text-muted"> (Date created)</small>
                </div>
            </div>

        </div>

        <div class="form-row mt-3">
            <div class="col-lg-12 col-sm-12">
                <label for="">Employee Information</label>
            </div>
        </div>

        <div class="form-row">
            <div class="col-lg-3 col-sm-6">
                <select class="form-control text-input" name="type">
                    <option value="">Select Type</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>

            <!-- <div class="col-lg-3 col-sm-6">
                <select class="form-control text-input" name="applicant">
                    <option value="">Select applicant</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div> -->

            <div class="col-lg-3 col-sm-6">
                <input type="text" class=" form-control text-input" placeholder="Employee Id" name="emp_id" id="emp_id_2" onBlur="checkAvailability2()">
            </div>

            <div class="col-lg-4 col-sm-6 mt-2">
                <p id="user-availability-status_2"></p>
            </div>

        </div>

        <div class="form-row mt-3">
            <div class="col-lg-3 col-sm-6">
                <input type="text" class=" form-control text-input" placeholder="First name" name="emp_first_name">
            </div>
            <div class="col-lg-3 col-sm-6">
                <input type="text" class=" form-control text-input" placeholder="Last name" name="emp_last_name">
            </div>
            <div class="col-lg-3 col-sm-6">
                <input type="text" class="form-control text-input" placeholder="Middle name" name="emp_middle_name">
            </div>
            <div class="col-lg-1 col-sm-6">
                <input type="text" class="form-control text-input" placeholder="ext" name="emp_ext">
            </div>
            <div class="col-lg-2 col-sm-6">
                <input type="text" class=" form-control text-input" placeholder="Sex" name="emp_gender">
            </div>
        </div>

        <div class="form-row mt-3">
            <div class="col-lg-12 col-sm-12">
                <label for="">Office Information</label>
            </div>
        </div>

        <div class="form-row ">
            <div class="col-lg-3 col-sm-6">
                <input type="text" class=" form-control text-input" placeholder="Department" name="department">
            </div>
            <div class="col-lg-3 col-sm-6">
                <input type="text" class=" form-control text-input" placeholder="Office/Unit" name="unit">
            </div>
            <div class="col-lg-3 col-sm-6">
                <input type="text" class="form-control text-input" placeholder="Designation" name="designation">
            </div>
        </div>

        <div class="form-row mt-3">

            <div class="col-lg-3 col-sm-6">
                <div class="d-flex flex-column">
                    <input type="date" class="form-control text-input" name="date_of_effectivity">
                    <small class="text-muted"> (Date of Effectivity)</small>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="d-flex flex-column">
                    <input type="date" class="form-control text-input" name="date_of_expiry">
                    <small class="text-muted"> (Date of Expiry)</small>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
            </button>
            <button type="submit" name="submit-con" class="btn button-1 ">Submit</button>
        </div>
    </form>
</div>