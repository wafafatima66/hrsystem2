<?php 
include '../includes/conn.php';

if(isset($_POST['id']) && isset($_POST['active']) ) {
    $id =  $_POST['id'] ; 
    $active =  $_POST['active'] ;

    $sql = "UPDATE employee SET active='$active' WHERE emp_id='$id'";
    mysqli_query($conn , $sql);
    
    
    // echo  '<script>toastr.success("Employee active status updated !");</script>';
    echo "success";

}else {
    echo "fail";
    // echo  '<script>toastr.error("Employee active status not updated !");</script>';
}

?>