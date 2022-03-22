<?php

require '../includes/conn.php';

if (isset($_POST['emp_id'])) {
    if ($_POST['type_of_leave'] == 'Special privilege leave' || $_POST['type_of_leave'] == 'Mandatory/Forced Leave'  ) {

    $emp_id = $_POST['emp_id'];
    $type_of_leave = $_POST['type_of_leave'];
    $no_of_working_days = $_POST['no_of_working_days'];

    $year = date("Y");
            
            $query = "select sum(spl) as spl_days , sum(force_leave) as fl_days  from leave_credits where emp_id = '$emp_id' and year = $year";

    $runquery = $conn->query($query);
    if ($runquery == true) {

        while ($mydata = $runquery->fetch_assoc()) {

            $spl_days = $mydata["spl_days"];
            $fl_days = $mydata["fl_days"];

        }
    }

    $total_spl = '' ; 
    $total_fl = '' ; 
    if($type_of_leave == 'Special privilege leave'){
        $total_spl = $no_of_working_days + $spl_days ;
    }else if($type_of_leave == 'Mandatory/Forced Leave'){
        $total_fl = $no_of_working_days + $fl_days ;
    }
     

    if($total_spl > 3 || $total_fl > 5 ){
        echo json_encode(array('msg' => 'Exceeding days limit', 'allowed' => 'allowed'));
    }else {
        echo json_encode(array('msg' => '', 'allowed' => ''));
    }
    

}else {
    echo json_encode(array('msg' => '', 'allowed' => ''));
}
} else {
    echo json_encode(array('msg' => '', 'allowed' => ''));
}
