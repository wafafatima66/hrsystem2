
<?php

if(isset($_POST['upgrade']) ){

    $vl_pts = $_POST['vl_pts'];
    $sl_pts = $_POST['sl_pts'];
    $emp_id = $_POST['leave_emp_id'];
    $year = date("Y")-1;

    
    require '../../includes/conn.php';


    $sql="INSERT INTO leave_credits_year (emp_id , vl_pts, sl_pts, year) VALUE ('$emp_id' , '$vl_pts', '$sl_pts', '$year')
     ON DUPLICATE KEY UPDATE
     vl_pts = '$vl_pts',
     sl_pts = '$sl_pts' ";

        if (mysqli_query($conn, $sql)){

            $sql1 = mysqli_query($conn,"select id from employee where emp_id = '$emp_id' ");
   
            $row = mysqli_fetch_array($sql1,MYSQLI_ASSOC);
            $id = $row['id'];
    
            header("Location:../../emp_mang/emp_profile.php?id=".$id."&credits_year");

            
        
           } else {
               echo  '<script>toastr.error("Credits Year not updated. Try again !")</script>';
            
        }
    

   
}
  else echo "hi";

?>