<?php 
include '../includes/conn.php';

if(isset($_POST['id']) && isset($_POST['status']) && isset($_POST['remarks']) ) {


    $id =  $_POST['id'] ; 
    $status =  $_POST['status'] ;
    $remarks =  $_POST['remarks'] ;

    if(($_POST['final']) == ''){
        $sql = "UPDATE emp_leaves SET status='$status' , remarks = '$remarks' WHERE id='$id'";
      
        
    }else if(($_POST['final']) == 'final'){
        $sql = "UPDATE emp_leaves SET final_status='$status' , final_remarks = '$remarks' WHERE id='$id'";
        $sql1 = "UPDATE leave_credits SET status='$status'  WHERE leave_id='$id'";
        mysqli_query($conn , $sql1);
       
    }
    mysqli_query($conn , $sql);
    
    echo "success";

}else {
    echo "fail";
}
