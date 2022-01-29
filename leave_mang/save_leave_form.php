<?php
require '../includes/conn.php';

if (isset($_POST['submit'])) {

    // echo $_POST['allowed'] ;
    //     die ; 

    if ($_POST['allowed'] == 1) {


        $year = date("Y");
        $emp_id = $_POST['emp_id'];
        $type_of_leave = $_POST['type_of_leave'];

        if (isset($_POST['details_of_leave'])) {
            $details_of_leave = $_POST['details_of_leave'];
        } else {
            $myjson = array(
                "details_of_leave_option" => $_POST['details_of_leave_option'],
                "details_text" => $_POST['details_text']
            );
            $details_of_leave = json_encode($myjson);
        }


        $no_of_working_days = $_POST['no_of_working_days'];
        $date_filled = $_POST['date_filled'];
        $date_diff = $_POST['date_diff'];
        $mon = $_POST['mon'];
        $year = $_POST['year'];
        $lenght = count($_POST['leave_to_date']) - 1;
        $leave_from_date = $_POST['leave_from_date'][0];
        $leave_to_date = $_POST['leave_to_date'][$lenght];
        // $date_diff = round(($to_date - $from_date) / (60 * 60 * 24)) + 1;

        $sql = "INSERT INTO emp_leaves (emp_id, type_of_leave,leave_from_date,leave_to_date,details_of_leave,date_diff,no_of_working_days , date_filled , status) VALUE ('$emp_id', '$type_of_leave','$leave_from_date','$leave_to_date','$details_of_leave','$date_diff','$no_of_working_days' , '$date_filled' , '2') ";

        $conn->query($sql);

        //getting month year and difference to store to leave credits 
        // $mon = date("m", strtotime($leave_from_date));
        // $year = date("Y", strtotime($leave_from_date));

        $vacation_leave = "";
        $sick_leave = "";
        $spl = "";
        $force_leave = "";
        $lwp = "";

        $result = $conn->query("SELECT id FROM emp_leaves ORDER BY id DESC LIMIT 1");
        while ($row = $result->fetch_assoc()) {
            $leave_id = $row['id'];
        }


        if ($type_of_leave == "Vacation leave") {
            $vacation_leave = $date_diff;
            //$sick_leave = 1.25 ; 
        } else  if ($type_of_leave == "Sick leave") {
            $sick_leave = $date_diff;
            //$vacation_leave = 1.25 ; 
        } else  if ($type_of_leave == "Special priviledge leave") {
            $spl = $date_diff;
        } else  if ($type_of_leave == "Force leave") {
            $force_leave = $date_diff;
        } else  if ($type_of_leave == "Leave without pay") {
            $lwp = $date_diff;
        }


        $sql2 = "INSERT INTO leave_credits (emp_id,vacation_leave,sick_leave,spl,force_leave,lwp,mon,year,status,leave_id) VALUE ('$emp_id','$vacation_leave','$sick_leave','$spl','$force_leave','$lwp','$mon','$year',0,'$leave_id')";

        // $conn->query($sql2);



        if (mysqli_query($conn, $sql2)) {
            header("Location:../leave_mang?success");
        } else {
            header("Location:../leave_mang?error");
        }
    } else {
        header("Location:../leave_mang?limit");
    }
} else {
    header("Location:emp_mang.php");
    exit();
}
