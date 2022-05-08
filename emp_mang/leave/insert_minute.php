<?php

if(isset($_POST['leave_emp_id']) ){

    $emp_id = $_POST['leave_emp_id'];
    $type = $_POST['type'];
    $mon = $_POST['mon'];
    $year = $_POST['year'];
    $value = $_POST['value'];
    
    require '../../includes/conn.php';

    $sql="INSERT INTO emp_leave_time (emp_id , type, mon, year , value) VALUE ('$emp_id' , '$type', '$mon', '$year' , '$value')
     ON DUPLICATE KEY UPDATE
     value = '$value'
      ";

        if (mysqli_query($conn, $sql)){
           echo 'success';
           } else {
            echo 'error';
        }
}
  

?>