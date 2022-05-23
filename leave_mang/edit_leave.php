<?php

include '../config.php';
include SITE_ROOT . '/includes/header.php';
?>

<?php
if (isset($_POST['submit'])) {

    if ($_POST['allowed'] == 'allowed') {
        echo  '<script>toastr.error("You have exceeded leave limits")</script>';
    } else {

        $year = date("Y");
        $emp_id = $_POST['emp_id'];
        $type_of_leave = $_POST['type_of_leave'];
        $leave_id = $_POST['leave_id'];
        $no_of_working_days = $_POST['no_of_working_days'];
        $no_of_leave_without_pay = $_POST['no_of_leave_without_pay'];
        $date_filled = $_POST['date_filled'];
        $date_diff = $no_of_working_days;

        
        // $lenght = count($_POST['leave_to_date']) - 1;
        // $leave_from_date = $_POST['leave_from_date'][0];
        // $leave_to_date = $_POST['leave_to_date'][$lenght];
        // $date_diff = round(($to_date - $from_date) / (60 * 60 * 24)) + 1;

        $leave_from_date_array = array();
        if (isset($_POST['leave_from_date'])) {
            for ($i = 0; $i < count($_POST['leave_from_date']); $i++) {
                $leave_from_date_array[$i] = $_POST['leave_from_date'][$i];
            }
            $leave_from_date = json_encode($leave_from_date_array);
        }

        $leave_to_date_array = array();
        if (isset($_POST['leave_to_date'])) {
            for ($i = 0; $i < count($_POST['leave_to_date']); $i++) {
                $leave_to_date_array[$i] = $_POST['leave_to_date'][$i];
            }
            $leave_to_date = json_encode($leave_to_date_array);
        }

        $from_date = $_POST['leave_from_date'][0];
        $mon = date("m", strtotime($from_date));
        $year = date("Y", strtotime($from_date));
        // $year = $_POST['year'];

        $result = $conn->query("SELECT details_of_leave, status , final_status , remarks , final_remarks FROM emp_leaves where id = '$leave_id'");
        while ($row = $result->fetch_assoc()) {
            $details_of_leave = $row['details_of_leave'];
            $status = $row['status'];
            $final_status = $row['final_status'];
            $remarks = $row['remarks'];
            $final_remarks = $row['final_remarks'];
        }

        $result1 = $conn->query("SELECT status , final_status FROM leave_credits where leave_id = '$leave_id'");
        while ($row1 = $result1->fetch_assoc()) {;
            $status1 = $row1['status'];
            $final_status1 = $row1['final_status'];
        }

        $del_sql = "DELETE FROM emp_leaves WHERE id='$leave_id'";
        $del_sql1 = "DELETE FROM leave_credits WHERE leave_id='$leave_id'";
        mysqli_query($conn, $del_sql);
        mysqli_query($conn, $del_sql1);

        $sql = "INSERT INTO emp_leaves (id,emp_id, type_of_leave,leave_from_date,leave_to_date,details_of_leave,date_diff,no_of_working_days , date_filled , status, final_status,lwp,remarks,final_remarks,from_date) VALUE ('$leave_id','$emp_id', '$type_of_leave','$leave_from_date','$leave_to_date','$details_of_leave','$no_of_working_days','$no_of_working_days' , '$date_filled' , '$status', '$final_status','$no_of_leave_without_pay','$remarks','$final_remarks','$from_date') ";

        $conn->query($sql);

        $vacation_leave = "";
        $sick_leave = "";
        $spl = "";
        $force_leave = "";
        $lwp = "";



        if ($type_of_leave == "Vacation leave") {
            $vacation_leave = $date_diff;
            //$sick_leave = 1.25 ; 
        } else  if ($type_of_leave == "Sick leave") {
            $sick_leave = $date_diff;
            //$vacation_leave = 1.25 ; 
        } else  if ($type_of_leave == "Special privilege leave") {
            $spl = $date_diff;
        } else  if ($type_of_leave == "Mandatory/Forced Leave") {
            $force_leave = $date_diff;
        } else  if ($type_of_leave == "Leave without pay") {
            $lwp = $date_diff;
        }


        $sql2 = "INSERT INTO leave_credits (emp_id,vacation_leave,sick_leave,spl,force_leave,mon,year,status,leave_id,lwp,final_status) VALUE ('$emp_id','$vacation_leave','$sick_leave','$spl','$force_leave','$mon','$year','$status1','$leave_id','$no_of_leave_without_pay','$final_status1')";

        // $conn->query($sql2);

        if (mysqli_query($conn, $sql2)) {
            // header("Location:../leave_mang?success");
            echo  '<script>toastr.success("Leave Form Edited Successfully")</script>';
        } else {
            // header("Location:../leave_mang?error");
            echo  '<script>toastr.error("Somethings Wrong ! Try Again !")</script>';
        }
        // } else {
        //     // header("Location:../leave_mang?limit");
        //     echo  '<script>toastr.error("You have exceeded leave limits")</script>';
        // }
    }
}
?>


<?php
if (isset($_GET['leave_id'])) { ?>
    <div class="container ">

        <div class="row ">
            <h4 class="background-title-1">LEAVE EDIT</h4>
            <?php
            $leave_id = $_GET['leave_id'];
            $query = "SELECT * FROM emp_leaves where id = '$leave_id' ";

            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($mydata = mysqli_fetch_assoc($result)) {

                    $leave_id = $mydata['id'];

            ?>

                    <div class="leave-mang-box-1 container-box" style="width: 100%;">

                        <form method="post" action="">
                            <input type="hidden" name="date_diff" id="date_diff">
                            <!-- <input type="text" name="mon" id="mon">
                            <input type="text" name="year" id="year"> -->
                            <input type="hidden" name="leave_id" value="<?php echo $leave_id ?>">
                            <?php
                            $leave_from_date = json_decode($mydata['leave_from_date']);
                            $leave_to_date = json_decode($mydata['leave_to_date']);

                            // $new = json_encode( $data[1] ); 
                            // echo count($data);
                            //  echo $new; die ; 

                            ?>
                            <div class="leave-wrapper" style="border: solid 1px #fc7e43;padding: 12px; margin: 12px 0px">
                                <?php for ($i = 0; $i < count($leave_from_date); $i++) { ?>

                                    <div class="form-row mt-3">
                                        <div class="col-lg-4 col-sm-6 form-inline">
                                            <label for="" class="responsive-label">From date</label>
                                            <input type="date" class="form-control text-input ml-3" placeholder="Date Picker" name="leave_from_date[]" value="<?php echo (date('Y-m-d', strtotime($leave_from_date[$i]))) ?>">
                                        </div>

                                        <div class="col-lg-4 col-sm-6 form-inline">
                                            <label for="" class="responsive-label">To date</label>
                                            <input type="date" class="form-control text-input ml-3" placeholder="Date Picker" name="leave_to_date[]" value="<?php echo (date('Y-m-d', strtotime($leave_to_date[$i]))) ?>">
                                        </div>

                                        <a class="ml-4 btn button-1 remove_leave_button" style="height: fit-content; display: table-cell;">-</a>
                                    </div>


                                <?php } ?>

                            </div>
                            <div class="mt-2">
                                <a class="btn button-1 add_leave">Add</a>
                            </div>

                            <div class="form-row mt-4">

                                <div class="col-lg-3 col-sm-6">
                                    <label for="" class="responsive-label">ID</label>
                                    <input type="text" class=" form-control text-input" placeholder="Employee Id" name="emp_id" id="emp_id" value="<?php echo $mydata['emp_id'] ?>">
                                </div>

                                <div class="col-lg-3 col-sm-6">
                                    <label for="" class="responsive-label">Type of Leave</label>
                                    <select class="form-control text-input" name="type_of_leave" id="type_of_leave">
                                        <option value="<?php echo $mydata['type_of_leave'] ?>"><?php echo $mydata['type_of_leave'] ?></option>
                                        <option value="Vacation leave">Vacation Leave</option>
                                        <option value="Mandatory/Forced Leave">Mandatory/Forced Leave</option>
                                        <option value="Sick leave">Sick Leave</option>
                                        <option value="Maternity Leave">Maternity Leave</option>
                                        <option value="Paternity Leave">Paternity Leave</option>
                                        <option value="Special privilege leave">Special privilege Leave</option>
                                        <option value="Solo Parent Leave">Solo Parent Leave</option>
                                        <option value="Study Leave">Study Leave</option>
                                        <option value="10-day VAWC Leave">10-day VAWC Leave</option>
                                        <option value="Rehabilitation Privilege">Rehabilitation Privilege</option>
                                        <option value="Special Leave Benefits for Women">Special Leave Benefits for
                                            Women</option>
                                        <option value="Special Emergency Leave">Special Emergency Leave</option>
                                        <option value="Adoption Leave">Adoption Leavee</option>
                                        <option value="Others">Others</option>

                                    </select>
                                </div>

                                <div class="col-lg-2 col-sm-6">
                                    <label for="" class="responsive-label">No of Working days</label>
                                    <input type="text" class="form-control text-input" placeholder="No of Working Days" name="no_of_working_days" id="no_of_working_days" value="<?php echo $mydata['no_of_working_days'] ?>" required>
                                    <p class="text-danger" id="check_limit_msg"></p>
                                    <input type="hidden" name="allowed" id="allowed">
                                </div>

                                <div class="col-lg-2 col-sm-6">
                                    <label for="" class="responsive-label">No of Leave w/o Pay</label>
                                    <input type="text" class="form-control text-input" placeholder="No of Leave w/o Pay" name="no_of_leave_without_pay" value="<?php echo $mydata['lwp'] ?>">
                                </div>

                                <div class="col-lg-2 col-sm-6">
                                    <label for="" class="responsive-label">Date of filing</label>
                                    <input type="date" class="form-control text-input " placeholder="Date Picker" name="date_filled" id="date_filled" value="<?php echo $mydata['date_filled'] ?>">
                                </div>

                            </div>

                            <div class="text-right">
                                <button class="ml-3 btn button-1" name="submit" type="submit">Update</button>
                                <a href="../leave_mang/"  class="ml-3 btn button-1" >Back</a>
                            </div>

                            

                        </form>
                    </div>

        <?php     }
            }
        } ?>
        </div>
    </div>
    <script>
        //adding extra date      
        var maxField = 10;
        var addButton = $('.add_leave');
        var wrapper = $('.leave-wrapper');
        var fieldHTML =
            '<div class="form-row mt-3"> <div class="col-lg-4 col-sm-6 form-inline"> <label for="" class="responsive-label">From date</label> <input type="date" class="form-control text-input ml-3" placeholder="Date Picker" name="leave_from_date[]" > </div> <div class="col-lg-4 col-sm-6 form-inline"> <label for="" class="responsive-label">To date</label> <input type="date" class="form-control text-input ml-3" placeholder="Date Picker" name="leave_to_date[]"> </div><a class="ml-4 btn button-1 remove_leave_button" style="height: fit-content; display: table-cell;">-</a></div>';

        var x = 1;
        $(addButton).click(function() {
            if (x < maxField) {
                x++;
                $(wrapper).append(fieldHTML);
            }
        });

        $('.leave-wrapper').on('click', '.remove_leave_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });



        // CHECK DAYS LIMIT 
        $("#no_of_working_days").keyup(function() {
            $.ajax({
                url: 'check_days_limit.php',
                type: 'post',
                data: {
                    emp_id: $('#emp_id').val(),
                    type_of_leave: $('#type_of_leave').val(),
                    no_of_working_days: $(this).val()
                },
                dataType: 'json',
                success: function(result) {
                    $('#check_limit_msg').html(result.msg);
                    $('#allowed').val(result.allowed);
                }
            });
        });
    </script>