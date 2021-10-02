<?php 
include '../includes/conn.php';

if(isset($_POST['date_accomplished']) && isset($_POST['emp_id'])) {
    $date_accomplished =  $_POST['date_accomplished'] ; 
    $emp_id =  $_POST['emp_id'] ; 

    $sql = "UPDATE item SET date_accomplished='$date_accomplished' WHERE emp_id='$emp_id'";
    mysqli_query($conn , $sql);
  
    echo "success";

}else {
    echo "fail";
    
}

?>