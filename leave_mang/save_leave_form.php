<?php
require '../includes/conn.php';

if (isset($_POST['submit'])) {

    // echo $_POST['allowed'] ;
    //     die ; 

    if ($_POST['allowed'] == 'allowed') {
        header("Location:../leave_mang?limit");
    } else {

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
        $no_of_leave_without_pay = $_POST['no_of_leave_without_pay'];
        $date_filled = $_POST['date_filled'];
        $date_diff = $_POST['date_diff'];
        $mon = $_POST['mon'];
        $year = $_POST['year'];
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

        $sql = "INSERT INTO emp_leaves (emp_id, type_of_leave,leave_from_date,leave_to_date,details_of_leave,date_diff,no_of_working_days , date_filled , status, final_status,lwp,from_date) VALUE ('$emp_id', '$type_of_leave','$leave_from_date','$leave_to_date','$details_of_leave','$no_of_working_days','$no_of_working_days' , '$date_filled' , '2', '2','$no_of_leave_without_pay','$from_date') ";

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
        } else  if ($type_of_leave == "Special privilege leave") {
            $spl = $date_diff;
        } else  if ($type_of_leave == "Mandatory/Forced Leave") {
            $force_leave = $date_diff;
        } else  if ($type_of_leave == "Leave without pay") {
            $lwp = $date_diff;
        }


        $sql2 = "INSERT INTO leave_credits (emp_id,vacation_leave,sick_leave,spl,force_leave,mon,year,status,leave_id,lwp,final_status) VALUE ('$emp_id','$vacation_leave','$sick_leave','$spl','$force_leave','$mon','$year',2,'$leave_id','$no_of_leave_without_pay',2)";

        // $conn->query($sql2);

        if (mysqli_query($conn, $sql2)) {
            header("Location:../leave_mang?success");
        } else {
            header("Location:../leave_mang?error");
        }
    }
} else {
    header("Location:emp_mang.php");
    exit();
}
