<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<?php
if (isset($_POST['submit'])) {

    $applicant_id = $_POST['applicant_id'];
    $item_no = $_POST['item_no'];
    $appointment_date = $_POST['appointment_date'];
    $nature = $_POST['nature'];
    $emp_id = $_POST['emp_id'];
    // $nature = 'Original';

    $query = "SELECT * FROM applicant where applicant_id = '$applicant_id' ";
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
        $applicant_barangay = $mydata['applicant_barangay'];
    }

    $sql1 = "INSERT INTO employee (emp_id , emp_first_name , emp_middle_name , emp_last_name , emp_ext , emp_gender , emp_nationality , emp_resi_add  , emp_resi_add_municipal  , emp_resi_add_zipcode,emp_resi_add_barangay)
    VALUES ('$emp_id', '$applicant_first_name', '$applicant_middle_name', '$applicant_last_name', '$applicant_ext', '$applicant_gender', '$applicant_country', '$applicant_state', '$applicant_municipal', '$applicant_zip' , '$applicant_barangay' )";



    $sql2 = "UPDATE item SET  emp_id = '$emp_id' , date_orgappnt_lhmrh = '$appointment_date', nature = '$nature' ,  filled = 1  WHERE item_no='$item_no'";

    $year = date("Y");


    $sql3 = "INSERT INTO `leave_credits_result` (`emp_id`, `year`, `vl_pts_1`, `vl_pts_2`, `vl_pts_3`, `vl_pts_4`, `vl_pts_5`, `vl_pts_6`, `vl_pts_7`, `vl_pts_8`, `vl_pts_9`, `vl_pts_10`, `vl_pts_11`, `vl_pts_12`, `sl_pts_1`, `sl_pts_2`, `sl_pts_3`, `sl_pts_4`, `sl_pts_5`, `sl_pts_6`, `sl_pts_7`, `sl_pts_8`, `sl_pts_9`, `sl_pts_10`, `sl_pts_11`, `sl_pts_12`) VALUES ('$emp_id', '$year', '16.25', '17.5', '18.75', '20', '21.25', '22.5', '23.75', '25', '26.25', '27.5', '28.75', '30', '16.25', '17.5', '18.75', '20', '21.25', '22.5', '23.75', '25', '26.25', '27.5', '28.75', '30');";

    $sql4 = "UPDATE applicant SET appointmented = '1'  WHERE applicant_id='$applicant_id'";


    if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4)) {
        echo  '<script>toastr.success("Applicant appointmented successfully")</script>';
    } else {
        echo  '<script>toastr.error("Applicant not appointmented. Try again !")</script>';
    }
}

?>


<div class="form-row mt-2 mb-4">
    <div class="col-lg-12 col-sm-12">
        <h4 class="h4-heading">ITEM MANAGEMENT - PERMANENT </h4>
    </div>
</div>


<h4 class="background-title-1 p-3">Item profile (Appointment)</h4>

<div class="container container-box">

    <?php

    if (isset($_GET['item-no'])) {

        $item_no =  $_GET['item-no'];  ?>

        <form method="post" action="" enctype="multipart/form-data">

            <div class="form-row mt-4">
                <div class="col-lg-12 col-sm-12">
                    <label for="" class="h6">Item Information</label>
                </div>
            </div>

            <div class="form-row">

                <div class="col-lg-3 col-sm-6 mt-2">
                    <select class="form-control text-input" name="nature">
                        <option value='Original'>Original</option>
                        <option value='Promotion'>Promotion</option>
                        <option value='Reappointment'>Reappointment</option>
                        <option value='Reemployement'>Reemployement</option>
                    </select>
                </div>

            </div>

            <div class="form-row ">

                <?php

                $query = "SELECT * FROM item where item_no = '$item_no'  ";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {

                    while ($mydata = mysqli_fetch_assoc($result)) {

                ?>

                        <div class="col-lg-2 col-sm-6 mt-2">
                            <label for="">Item No.</label>
                            <input type="text" class="form-control text-input" name="item_no" placeholder="Item No." value="<?= $mydata['item_no'] ?>" id="item_no">
                        </div>

                        <div class="col-lg-2 col-sm-6 mt-2">
                            <label for="">Position</label>
                            <input type="text" class="form-control text-input" name="position" placeholder="Position" value="<?= $mydata['position'] ?>">
                        </div>


                        <div class="col-lg-1 col-sm-6 mt-2">
                            <label for="">SG</label>
                            <input type="text" class="form-control text-input" name="salary_grade" placeholder="SG" value="<?= $mydata['salary_grade'] ?>">
                        </div>

                        <div class="col-lg-2 col-sm-6 mt-2">
                            <label for="">Salary</label>
                            <input type="text" class="form-control text-input" name="monthly_salary" placeholder="Salary" value="<?= $mydata['monthly_salary'] ?>">
                        </div>

                        <div class="col-lg-2 col-sm-6 mt-2">
                            <label for="">Department</label>
                            <input type="text" class="form-control text-input" name="division" placeholder="Department" value="<?= $mydata['division'] ?>">
                        </div>

                        <div class="col-lg-2 col-sm-6 mt-2">
                            <label for="">Office</label>
                            <input type="text" class="form-control text-input" name="area_wrk_assign" placeholder="Office" value="<?= $mydata['area_wrk_assign'] ?>">
                        </div>

            </div>

            <div class="form-row mt-4">
                <div class="col-lg-12 col-sm-12">
                    <label for="" class="h6">Previous Employee Information (If Applicable)</label>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-3 col-sm-6 mt-2">
                    <label for="">Employee Id</label>
                    <input type="text" class="form-control text-input" placeholder="Employee Id" value="<?php echo (empty($mydata['emp_id']) ?  '' : $mydata["emp_id"]) ?>">
                </div>

                <?php
                        $emp_name = "";

                        if (!empty($mydata['emp_id'])) {
                            $emp_id = $mydata['emp_id'];

                            $query = "SELECT emp_first_name , emp_last_name , emp_middle_name , emp_ext FROM employee where emp_id = '$emp_id'  ";
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) {

                                while ($mydata = mysqli_fetch_assoc($result)) {
                                    $emp_first_name = $mydata['emp_first_name'];
                                    $emp_last_name = $mydata['emp_last_name'];
                                    $emp_middle_name = $mydata['emp_middle_name'];
                                    $emp_ext = $mydata['emp_ext'];

                                    $emp_name =   $emp_last_name . " " . $emp_first_name  . " " .  $emp_middle_name  . " " .  $emp_ext;
                                }
                            }
                        }
                ?>

                <div class="col-lg-6 col-sm-6 mt-2">
                    <label for="">LastName , FirstName , MiddleName , Ext</label>
                    <input type="text" class="form-control text-input" placeholder="" value="<?= $emp_name ?>">
                </div>

        <?php   }
                }

        ?>

            </div>


            <div class="form-row mt-4">
                <div class="col-lg-12 col-sm-12">
                    <label for="" class="h6">Employee Information</label>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-3 col-sm-6 mt-2">

         

                    <select class="form-control text-input" name="applicant_id" id="select_applicant">


                        <?php
                        $query = "SELECT applicant_id FROM applicant where item_no = '$item_no' and appointmented = '0' ";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            echo "<option value=''> Select Applicant </option> ";
                            while ($mydata = mysqli_fetch_assoc($result)) {
                                echo "<option value= '" . $mydata['applicant_id'] . "'>" . $mydata['applicant_id'] . "</option>";
                            }
                        } else {
                            echo "<option value=''> Select Applicant </option>";
                        }
                        ?>


                    </select>

                </div>

                <div class="col-lg-5 col-sm-6 mt-2">
                    <input type="text" class="form-control text-input" name="applicant_name" placeholder="LastName , FirstName , MiddleName , Ext" id="applicant_name">
                </div>

                <div class="col-lg-2 col-sm-6 mt-2">
                    <input type="text" class="form-control text-input" name="applicant_rating" placeholder="Rating" id="applicant_rating">
                </div>


                <div class="col-lg-2 col-sm-6 mt-2">
                    <input type="text" class="form-control text-input" name="applicant_rank" placeholder="Rank" id="applicant_rank">
                </div>

                <!-- <div class="col-lg-3 col-sm-6 mt-2">
              <input type="text" class="form-control text-input" name="applicant_ext" placeholder="Ext" id="applicant_ext">
          </div> -->

            </div>

            <div class="form-row">
                <div class="col-lg-3 col-sm-6 mt-2">
                    <input type="text" class="form-control text-input" name="emp_id" placeholder="Employee ID">
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

          
                <!-- <div class="text-left">
                <a href="" class="btn button-1 mt-2" style="height:35px" id="appointment_print"><i class="fa fa-print"></i></a>
                </div> -->

                <div class="text-right">
                    <a href="../hiring_publication/" class="btn button-1 mt-2 ">Back</a>
                    <button class="ml-3 btn button-1 mt-2" type="submit" name="submit">Submit</button>
                </div>
            

            


        </form>

    <?php } ?>

</div>



<script>
    // get applicant info
    $(document).ready(function() {
        $("#select_applicant").change(function() {
            $.ajax({
                url: 'get_info_applicant.php',
                type: 'post',
                data: {
                    applicant_id: $(this).val()
                },
                dataType: 'json',
                success: function(result) {

                    $('#applicant_name').val(result.applicant_name);
                    $('#applicant_rating').val(result.applicant_rating);
                    $('#applicant_rank').val(result.applicant_rank);
                    // $('#applicant_ext').val(result.applicant_ext);

                }
            });
        });

    });
</script>