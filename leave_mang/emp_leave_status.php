<?php 
include '../includes/conn.php';

if(isset($_POST['id']) && isset($_POST['status']) ) {
    $id =  $_POST['id'] ; 
    $status =  $_POST['status'] ;

    $sql = "UPDATE emp_leaves SET status='$status' , remarks = '' WHERE id='$id'";
    mysqli_query($conn , $sql);
    
    
    // echo  '<script>toastr.success("Employee active status updated !");</script>';
    echo "success";

}else {
    echo "fail";
    // echo  '<script>toastr.error("Employee active status not updated !");</script>';
}

?>