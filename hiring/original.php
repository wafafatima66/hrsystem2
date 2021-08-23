
<?php

if (isset($_POST['submit'])) {

    $applicant_id = $_POST['applicant_id'];
    $item_no = $_POST['item_no'];
    $appointment_date = $_POST['appointment_date'];
    $department_name = $_POST['department_name'];
    $office_name = $_POST['office_name'];
    $nature = 'Original';

    $query = "SELECT * FROM applicant where applicant_id = '$applicant_id'  ";
    $result = mysqli_query($conn, $query);
                    
    while ($mydata = mysqli_fetch_assoc($result)) {
        $applicant_first_name = $mydata['applicant_first_name'];
        $applicant_last_name = $mydata['applicant_last_name'];
        $applicant_middle_name = $mydata['applicant_middle_name'];
        $applicant_ext = $mydata['applicant_ext'];
        $applicant_gender = $mydata['applicant_gender'];
        $applicant_country = $mydata['applicant_country'];
        $applicant_state = $mydata['applicant_state'];
        $applicant_municipal = $mydata['applicant_municipal'];
        $applicant_zip = $mydata['applicant_zip'];
    }

    $sql1 = "INSERT INTO employee (emp_id , emp_first_name , emp_middle_name , emp_last_name , emp_ext , emp_gender , emp_nationality , emp_resi_add  , emp_resi_add_municipal  , emp_resi_add_zipcode)
    VALUES ('$applicant_id', '$applicant_first_name', '$applicant_middle_name', '$applicant_last_name', '$applicant_ext', '$applicant_gender', '$applicant_country', '$applicant_state', '$applicant_municipal', '$applicant_zip')";


    // $sql2 = "DELETE FROM applicant WHERE applicant_id='$applicant_id'";
    // $conn->query($sql2);

    $query2 = "SELECT position ,  salary_grade FROM item where item_no = '$item_no'  ";
    $result = mysqli_query($conn, $query2);
                    
    while ($mydata = mysqli_fetch_assoc($result)) {
        $position = $mydata['position'];
        $salary_grade = $mydata['salary_grade'];
    }

    $sql3 = "INSERT INTO employee_agency (emp_id , appointment_date , item_no , nature , position , salary_grade , job_type , department , office)
    VALUES ('$applicant_id', '$appointment_date', '$item_no', '$nature','$position', '$salary_grade' , 'Permanent' , '$department_name','$office_name' )";
      
    $sql4 = "UPDATE item SET status = 1  WHERE item_no='$item_no'";


    if (mysqli_query($conn, $sql1)  && mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4)) {
        echo  '<script>toastr.success("Applicant appointmented successfully")</script>';
    } else {
        echo  '<script>toastr.error("Applicant not appointmented. Try again !")</script>';
    }
}

if (isset($_GET['item-no'])) {
  
    $item_no =  $_GET['item-no'];  ?>

    <form method="post" action="" enctype="multipart/form-data">


        <div class="form-row mt-4">
            <div class="col-lg-12 col-sm-12">
                <label for="" class="h6">Employee Information</label>
            </div>
        </div>

        <div class="form-row">
            <div class="col-lg-3 col-sm-6 mt-2">

                <input type="hidden" name="item_no" value="<?php echo $item_no ; ?>">
            
                <select class="form-control text-input" name="applicant_id" id="select_applicant">
                    

                    <?php
                    $query = "SELECT applicant_id FROM applicant where item_no = '$item_no'  ";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        echo "<option value=''> Select Applicant </option> ";
                        while ($mydata = mysqli_fetch_assoc($result)) {
                            echo "<option value= '" . $mydata['applicant_id'] . "'>" . $mydata['applicant_id'] . "</option>";
                        }
                    } else {
                        echo "<option value='' > Select Applicant </option>";
                    }
                    ?>


                </select>

            </div>

            <div class="col-lg-3 col-sm-6 mt-2">
                <input type="text" class="form-control text-input" name="applicant_last_name" placeholder="Last Name" id="applicant_last_name">
            </div>

            <div class="col-lg-3 col-sm-6 mt-2">
                <input type="text" class="form-control text-input" name="applicant_first_name" placeholder="First Name" id="applicant_first_name">
            </div>


            <div class="col-lg-3 col-sm-6 mt-2">
                <input type="text" class="form-control text-input" name="applicant_middle_name" placeholder="Middle Name" id="applicant_middle_name">
            </div>

            <div class="col-lg-3 col-sm-6 mt-2">
                <input type="text" class="form-control text-input" name="applicant_ext" placeholder="Ext" id="applicant_ext">
            </div>

            <div class="col-lg-3 col-sm-6 mt-2">
                <input type="text" class="form-control text-input" name="department_name" placeholder="Department" >
            </div>

            <div class="col-lg-3 col-sm-6 mt-2">
                <input type="text" class="form-control text-input" name="office_name" placeholder="Office/Unit">
            </div>

        </div>

        <div class="form-row mt-4">
            <div class="col-lg-12 col-sm-12">
                <label for="" class="h6">Appointment Information</label>
            </div>
        </div>

        <div class="form-row">
            <div class="col-lg-3 col-sm-6 mt-2">
                <input type="date" class="form-control text-input" name="appointment_date">
            </div>
        </div>

        <div class="text-right">
            <a href="../hiring/" class="btn button-1 mt-2 ">Back</a>
            <button class="ml-3 btn button-1 mt-2" type="submit" name="submit">Submit</button>
        </div>


    </form>

<?php } ?>

<script>

// get applicant info
$(document).ready(function(){
    $("#select_applicant").change(function(){
        $.ajax({
            url:'get_info_applicant.php',
            type : 'post',
            data: {applicant_id : $(this).val()},
            dataType: 'json',
            success : function(result){
                
                $('#applicant_last_name').val(result.applicant_last_name);
                $('#applicant_first_name').val(result.applicant_first_name);
                $('#applicant_middle_name').val(result.applicant_middle_name);
                $('#applicant_ext').val(result.applicant_ext);
          
            }
        });
    });
}); 
</script>