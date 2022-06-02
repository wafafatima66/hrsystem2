<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<?php
if (isset($_GET['success'])) {
    echo  '<script>toastr.success("Leave form added succesfully !")</script>';
} else if (isset($_GET['error'])) {
    echo  '<script>toastr.error("Leave form not added. Try again !")</script>';
} else if (isset($_GET['limit'])) {
    echo  '<script>toastr.error("Leave cannot be added. Exceeding the days limit !")</script>';
}

if (isset($_GET['delete']) == 'success') {
    echo  '<script>toastr.success("Leave deleted succesfully !")</script>';
} else if (isset($_GET['delete']) == 'fail') {
    echo  '<script>toastr.error("Leave not deleted. Try again !")</script>';
}

if (isset($_GET['no_date'])) {
    echo  '<script>toastr.error("You did not select month & year !")</script>';
}

// editing approve or not approving leave 
require '../includes/conn.php';

if (isset($_POST['edit_leave_approve'])) {

    $id = $_POST['id'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];

    $sql = "UPDATE emp_leaves SET status = '$status', remarks='$remarks' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo  '<script>toastr.success("Leave form updated")</script>';
    } else {
        echo mysqli_error($conn);
    }
}

?>

<div class="container ">

    <?php
    // if ($_SESSION['user_role'] == 'Super Administrator' || $_SESSION['user_role'] == 'Employee') {  
    ?>


    <div class="row ">
        <h4 class="background-title-1">LEAVE FORM</h4>

        <div class="leave-mang-box-1 container-box" style="width: 100%;">

            <form method="post" action="save_leave_form.php">
                <input type="hidden" name="date_diff" id="date_diff">
                <input type="hidden" name="mon" id="mon">
                <input type="hidden" name="year" id="year">
                <div class="form-row mt-3">

                    <div class="col-lg-2 col-sm-6" <?php echo ($_SESSION['user_role'] == 'Employee' ? "style='display:none'" : "") ?>>
                        <label for="" class="responsive-label">ID</label>
                        <input type="text" class=" form-control text-input" placeholder="Employee Id" name="emp_id" id="emp_id" value="<?php echo ($_SESSION['user_role'] == 'Employee' ?  $_SESSION['emp_id'] : "") ?>">
                    </div>

                    <div class="col-lg-4 col-sm-6" <?php echo ($_SESSION['user_role'] == 'Employee' ? "style='display:none'" : "") ?>>
                        <label for="" class="responsive-label">Name</label>
                        <input type="text" class=" form-control text-input" placeholder="First Name,Last Name,Middle Name , Ext" name="emp_name" id="emp_name">
                    </div>

                    <div class="col-lg-4 col-sm-6" <?php echo ($_SESSION['user_role'] == 'Employee' ? "style='display:none'" : "") ?>>
                        <label for="" class="responsive-label">Position</label>
                        <input type="text" class="form-control text-input" placeholder="Position" id="position" name="position">
                    </div>

                    <div class="col-lg-2 col-sm-6" <?php echo ($_SESSION['user_role'] == 'Employee' ? "style='display:none'" : "") ?>>
                        <label for="" class="responsive-label">Salary</label>
                        <input type="text" class="form-control text-input" placeholder="Salary" id="salary_grade" name="salary_grade">
                    </div>
                </div>



                <div class="leave-wrapper" style="border: solid 1px #fc7e43;padding: 12px; margin: 12px 0px">
                    <div class="form-row mt-3">
                        <div class="col-lg-4 col-sm-6 form-inline">
                            <label for="" class="responsive-label">From date</label>
                            <input type="date" class="form-control text-input ml-3" placeholder="Date Picker" name="leave_from_date[]">
                        </div>

                        <div class="col-lg-4 col-sm-6 form-inline">
                            <label for="" class="responsive-label">To date</label>
                            <input type="date" class="form-control text-input ml-3" placeholder="Date Picker" name="leave_to_date[]">
                        </div>
                        <div class="col-lg-2 col-sm-12 ">
                            <a class="btn button-1 add_leave">Add</a>
                        </div>
                    </div>
                </div>

                <div class="form-row mt-4">

                    <div class="col-lg-3 col-sm-6" <?php echo ($_SESSION['user_role'] == 'Employee' ? "style='display:none'" : "") ?>>
                        <label for="" class="responsive-label">Office/Department</label>
                        <input type="text" class=" form-control text-input" placeholder="Office/Department" id="office" name="office">
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <label for="" class="responsive-label">Type of Leave</label>
                        <select class="form-control text-input" name="type_of_leave" id="type_of_leave">
                            <option value="">Select Type of leave</option>
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
                        <input type="text" class="form-control text-input" placeholder="No of Working Days" name="no_of_working_days" id="no_of_working_days" required>
                        <p class="text-danger" id="check_limit_msg"></p>
                        <input type="hidden" name="allowed" id="allowed">
                    </div>

                    <div class="col-lg-2 col-sm-6">
                        <label for="" class="responsive-label">No of Leave w/o Pay</label>
                        <input type="text" class="form-control text-input" placeholder="No of Leave w/o Pay" name="no_of_leave_without_pay">
                    </div>

                    <div class="col-lg-2 col-sm-6">
                        <label for="" class="responsive-label">Date of filing</label>
                        <input type="date" class="form-control text-input " placeholder="Date Picker" name="date_filled" id="date_filled">
                    </div>

                </div>

                <div class="form-row  ">
                    <div class="col-lg-6 col-sm-6 mt-3 leave_details">
                        <textarea class="form-control text-input" rows="5" placeholder="Details Of Leave(Required)" name="details_of_leave" ></textarea>
                    </div>
                    <div class="col-lg-6 col-sm-6 mt-3">
                        <table class="table home-page-table table-sm ">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Vacation</th>
                                    <th scope="col">Sick</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>

                                    <th>Last Balance</th>
                                    <td id="vl_pts"></td>
                                    <td id="sl_pts"></td>
                                    <td id="pts_total"></td>

                                </tr>

                                <tr>
                                    <th>Less this Leave</th>
                                    <td id="vl_now_pts"></td>
                                    <td id="sl_now_pts"></td>
                                    <td id="total_pts_now"></td>

                                </tr>

                                <tr>
                                    <th>Balance</th>
                                    <td id="vl_bal"></td>
                                    <td id="sl_bal"></td>
                                    <td id="total_bal"></td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="text-right"><button class="ml-3 btn button-1" name="submit" type="submit">Submit</button>
                </div>

                
            </form>
        </div>

        <a href="index.php" class="btn button-1 mr-3 mt-2 " style="height:35px"><i class="fas fa-sync-alt"></i></a>
    </div>
    <?php
    //  } 
    ?>

    <!-- end of first part -->

    <?php if ($_SESSION['user_role'] == 'Employee') {

        $emp_id = $_SESSION["emp_id"];
    ?>
        <div class="row mt-5 ">
            <h4 class="background-title-1">LEAVE APPLICATION HISTORY</h4>


            <?php

            $query = "SELECT date_filled , type_of_leave , leave_from_date , leave_to_date , no_of_working_days , final_status , final_remarks from emp_leaves where emp_id = '$emp_id' ORDER BY id DESC";

            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) { ?>
                <table class="table home-page-table mt-4 table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">Date Filled</th>
                            <th scope="col">Type of leave</th>
                            <th scope="col">Inclusive dates</th>
                            <th scope="col">No of working days</th>
                            <th scope="col">Status</th>
                            <th scope="col">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while ($mydata = mysqli_fetch_assoc($result)) {

                            // $leave_from = date("m/d/Y", strtotime($mydata['leave_from_date']));
                            // $leave_to = date("m/d/Y", strtotime($mydata['leave_to_date']));
                            $leave_from_date_array = json_decode($mydata['leave_from_date']);
                            $leave_to_date_array = json_decode($mydata['leave_to_date']);
                            $lenght = count($leave_to_date_array)-1 ;
                            $leave_from_date = (date('m/d/Y', strtotime($leave_from_date_array[0])));
                            $leave_to_date = (date('m/d/Y', strtotime($leave_to_date_array[$lenght])));
                            $date_filled = date("m/d/Y", strtotime($mydata['date_filled']));

                        ?>
                            <tr>
                                <td><?php echo $date_filled;  ?></td>
                                <td><?php echo $mydata['type_of_leave'];  ?></td>
                                <td><?php echo $leave_from_date; ?> - <?php echo $leave_to_date; ?>
                                </td>
                                <td><?php echo $mydata['no_of_working_days'];  ?></td>
                                <td><?php if ($mydata['final_status'] == 1) {
                                        echo "Leave Approved";
                                    } else if ($mydata['final_status'] == 2) {
                                        echo "Leave Pending";
                                    } else if ($mydata['final_status'] == 0) {
                                        echo "Leave Disapproved";
                                    }  ?>
                                </td>
                                <td><?php if ($mydata['final_remarks'] == '') {
                                        echo "No remarks";
                                    } else {
                                        echo $mydata['final_remarks'];
                                    }  ?>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            <?php  } else {
                echo '<p>No data Available</p>';
            }
            ?>

            <!-- <div class=" mt-2 ">
                  <button class="btn button-1 " type="submit" name="submit"><i class="fa fa-print"></i></button>
            </div> -->
        </div>
    <?php } ?>

    <!-- leave summary -->

    <?php if ($_SESSION['user_role'] == 'Supervisor' || $_SESSION['user_role'] == 'Super Administrator' || $_SESSION['user_role'] == 'HR Administrator' || $_SESSION['user_role'] == 'Division Head' || $_SESSION['user_role'] == 'Agency Head') {

    ?>

        <div class="row mt-3 ">
            <h4 class="background-title-1">LEAVE SUMMARY</h4>

            <div class="form-row ml-2 mr-2 mt-3 " style="width: 100%;">

                <!-- <form action="" method="post" class="form-inline "> -->

                <div class="col-lg-2 col-sm-5">
                    <input type="date" class="form-control text-input" placeholder="Date Picker" style="width:100%" id="from_date">
                </div>

                <span class="ml-2 mr-2 mt-2">to</span>

                <div class="col-lg-2 col-sm-5">
                    <input type="date" class="form-control text-input" placeholder="Date Picker" style="width:100%" id="to_date">
                </div>

                <div class="col-lg-1 col-sm-2">
                    <button type="submit" id="search_leave" class="btn button-1">Search </button>
                </div>

                <!-- <div class="col-lg-3"></div> -->

                <div class="col-lg-2 col-sm-6">
                    <select name="search_approve" id="search_approve" class="form-control text-input">
                        <option value="0">Status</option>
                        <option value="Approved">Approved</option>
                        <option value="Disapprove">Disapprove</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>


                <div class="col-lg-2 col-sm-6 ml-5">

                    <input type="month" id="month_input" class="form-control text-input" onchange="change_month()">
                    <small id="date_message" style="font-size: 10px;" class="text-muted">Select Month & year for Report</small>
                </div>

                <div class="col-lg-1 col-sm-1 ">
                    <!-- <button class="btn button-1 " style="height:35px ; " id="print_leave"
                              onclick="printDiv('printableArea_leave_summary')"><i class="fa fa-print"></i></button> -->
                    <a class="btn button-1" href='' style="height:35px" id="print_leave_summary"><i class="fa fa-print"></i></a>
                </div>
                <!-- </form> -->
            </div>
        </div>

        <?php echo '<div id="table-data"> </div>'; ?>

    <?php } ?>
</div>

<?php
// if($_SESSION['user_role']=='Supervisor' || $_SESSION['user_role']=='Super Administrator' || $_SESSION['user_role'] == 'Division Head' ||  $_SESSION['user_role']=='Agency Head') {
//  include "leave_summary_print_section.php";
// }

?>

<!-- delete modal -->
<?php include "../includes/delete_modal.php";  ?>

<script>
    // delete 
    $(document).on('click', '.delete_modal', function() {
        var id = $(this).data('id');
        var url = '../includes/delete.php?';
        var newHref = url.concat(id);
        $('#delete_confirm_btn').attr('href', newHref);
    });

    // print leave summary docs
    function change_month() {
        var a = document.getElementById('print_leave_summary');
        var month_input = document.getElementById('month_input').value;
        if (month_input == '') {
            document.getElementById('date_message').innerHTML = '<p class="text-danger">Select Month for report</p>';
        } else {
            a.href = "../includes/export_doc.php?leave_summary=" + month_input;
        }

    }

    // print
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

    // to get the info
    $(document).ready(function() {
        $("#emp_id").keyup(function() {
            // console.log('hi');
            $.ajax({
                url: 'get_info_emp_id.php',
                type: 'post',
                data: {
                    emp_id: $(this).val()
                },
                dataType: 'json',
                success: function(result) {
                    var emp_name = result.emp_first_name + " " +
                        result.emp_middle_name + " " + result
                        .emp_last_name + " " + result.emp_ext;
                    $('#emp_name').val(emp_name);
                    $('#position').val(result.position);
                    $('#salary_grade').val(result.salary_grade);
                    $('#office').val(result.office);

                }
            });
        });

        //to get date from leave management first box to load credits points in the small table
        $("#no_of_working_days").change(function() {

            var leave_from_date = $("input[name='leave_from_date[]']")
                .map(function() {
                    return $(this).val();
                }).get();

            var leave_to_date = $("input[name='leave_to_date[]']")
                .map(function() {
                    return $(this).val();
                }).get();

            var date_diff = 0;
            var lenght = $("input[name='leave_to_date[]']").length;

            for (var i = 0; i < lenght; i++) {
                const date1 = new Date(leave_from_date[i]);
                const date2 = new Date(leave_to_date[i]);
                var date_diff = date_diff + getDifferenceInDays(date1, date2);
                var mon = date1.getMonth() + 1;
                var year = date1.getFullYear();
            }

            function getDifferenceInDays(date1, date2) {
                const diffInMs = Math.abs(date2 - date1);
                return diffInMs / (1000 * 60 * 60 * 24) + 1;
            }


            $('#mon').val(mon);
            $('#year').val(year);

            var date_diff = $('#no_of_working_days').val();
            $('#date_diff').val(date_diff);
            // console.log(date_diff);

            $.ajax({
                url: 'get_leave_credits.php',
                type: 'post',
                data: {
                    mon: mon,
                    year: year,
                    date_diff: date_diff,
                    type_of_leave: $("#type_of_leave").val(),
                    emp_id: $("#emp_id").val()
                },
                dataType: 'json',
                success: function(result) {

                    $('#vl_pts').html(result
                        .vl_pts
                    ); // getting vacation  leaves points from database
                    $('#sl_pts').html(result
                        .sl_pts
                    ); // getting sick  leaves points from database
                    $('#pts_total').html(result
                        .pts_total
                    ); // getting total points from calculing vl_pts and sl_pts
                    $('#total_pts_now').html(result
                        .total_pts_now
                    ); // getting pints calculating from vi_now-pts and sl_now_pts
                    $('#vl_bal').html(result
                        .vl_bal); // vl_pts - vl_now_pts
                    $('#sl_bal').html(result
                        .sl_bal); // sl_pts - sl_now_pts
                    $('#total_bal').html(result
                        .total_bal); //vl_bal - sl_bal
                    $('#vl_now_pts').html(result
                        .vl_now_pts
                    ); // getting vacation  leaves points date given 
                    $('#sl_now_pts').html(result
                        .sl_now_pts
                    ); // getting sick leaves points from date given
                }
            });
        });



        function loadData(page, from_date, to_date, search_approve) {
            $.ajax({
                url: "../leave_mang/pagination.php",
                type: "POST",
                cache: false,
                data: {
                    page_no: page,
                    from_date: from_date,
                    to_date: to_date,
                    search_approve: search_approve
                },
                success: function(response) {
                    $("#table-data").html(response);
                }
            });
        }
        loadData();

        // Pagination code
        $(document).on("click", ".page-item", function() {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var pageId = $(this).attr("id");
            var search_approve = $('#search_approve').val();
            loadData(pageId, from_date, to_date, search_approve);
        });

        $(document).on("click", "#search_leave", function() {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var pageId = 1;
            var search_approve = $('#search_approve').val();
            loadData(pageId, from_date, to_date, search_approve);
        });

        $(document).on("change", "#search_approve", function() {
            var search_approve = $('#search_approve').val();
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var pageId = 1;
            loadData(pageId, from_date, to_date, search_approve);
        });


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

        // change details  according to type of leave 
        $("#type_of_leave").change(function() {
            var type_of_leave = $("#type_of_leave").val();
            // console.log(type_of_leave);
            if (type_of_leave == 'Vacation leave' || type_of_leave ==
                'Special privilege leave') {
                var details =
                    '<div  style="padding: 20px; border: solid 1px #fc7e43; ; "> <h6>Details of leave</h6> <label>In case of Vacation/Special privilege leave</label> <div class="form-row"> <div class="col-sm-6 col-lg-6"> <select name="details_of_leave_option" class="form-control text-input " > <option value="Within the Philippines">Within the Philippines</option> <option value="Abroad">Abroad</option> </select> </div> <div class="col-sm-6 col-lg-6"> <input type="text" class="form-control text-input" placeholder="Write Details" name="details_text"> </div> </div> </div>'

            } else if (type_of_leave == 'Sick leave') {
                var details =
                    '<div  style="padding: 20px; border: solid 1px #fc7e43; ; "> <h6>Details of leave</h6> <label>In case of Sick Leave</label> <div class="form-row"> <div class="col-sm-6 col-lg-6"> <select name="details_of_leave_option" class="form-control text-input " > <option value="In Hospital">In Hospital</option> <option value="Out Patient">Our Patient</option> </select> </div> <div class="col-sm-6 col-lg-6"> <input type="text" class="form-control text-input" placeholder="Specify Illness" name="details_text"> </div> </div> </div>'

            } else if (type_of_leave == 'Special Leave Benefits for Women') {
                var details =
                    '<div  style="padding: 20px; border: solid 1px #fc7e43; ; "> <h6>Details of leave</h6> <label>In case of Special Leave Benefits for Women</label> <div class="form-row">  <div class="col-sm-6 col-lg-6"> <input type="text" class="form-control text-input" placeholder="Specify Illness" name="details_text"> <input type="hidden"  name="details_of_leave_option"> </div> </div> </div>'

            } else if (type_of_leave == 'Study Leave') {
                var details =
                    '<div  style="padding: 20px; border: solid 1px #fc7e43; ; "> <h6>Details of leave</h6> <label>In case of Study Leave</label> <div class="form-row"> <div class="col-sm-6 col-lg-8"> <select name="details_of_leave_option" class="form-control text-input " > <option value="Completion of Master Degree">Completion of Master Degree</option> <option value="Bar/Board Exam Review">Bar/Board Exam Review</option> </select> <input type="hidden"  name="details_text"></div>  </div> </div>'
            } else {
                var details =
                    '<textarea class="form-control text-input" rows="5" placeholder="Details Of Leave(Required)" name="details_of_leave"  required></textarea>'
            }

            $('.leave_details').html(details);
        });

        // CHECK DAYS LIMIT 
        $("#no_of_working_days").keyup(function() {
            // console.log('hi');
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
    });
</script>

<?php
// }
?>