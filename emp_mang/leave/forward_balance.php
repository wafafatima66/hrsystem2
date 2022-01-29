<?php

if(isset($_POST['leave_emp_id']) ){

    $emp_id = $_POST['leave_emp_id'];

    // $mon = date("n");

    // if($mon == 12)
    // {
    //     if (isset($_COOKIE["inputDate"])) {
    //         $year = $_COOKIE['inputDate'];
    //     }else {
    //         $year = date("Y");
    //     }
        
        // $year = date("Y")+1;
        
    // }else
    //  if($mon == 1) {
        if (!empty($_COOKIE["inputDate"])) {
            $year = $_COOKIE['inputDate'];
        }else {
            $year = date("Y")-1;
        // }
        
        // $year = date("Y");
    }
    

    require '../../includes/conn.php';

    $sql1="SELECT vl_pts_12, sl_pts_12 FROM `leave_credits_result` WHERE emp_id = '$emp_id' and year = '$year'";
    $runquery = $conn->query($sql1);
            $rowcount = mysqli_num_rows($runquery);
            if ($rowcount != 0) {
                while ($mydata = $runquery->fetch_assoc()) {
                    $vl_pts_12 = $mydata["vl_pts_12"];
                    $sl_pts_12 = $mydata["sl_pts_12"];
                }
            }else {
                $vl_pts_12 = 15;
                    $sl_pts_12 = 15;
            }

            $forward_year = $year  ;  

    $sql="INSERT INTO leave_credits_year (emp_id , vl_pts, sl_pts, year) VALUE ('$emp_id' , '$vl_pts_12', '$sl_pts_12', '$forward_year')
     ON DUPLICATE KEY UPDATE
     vl_pts = '$vl_pts_12',
     sl_pts = '$sl_pts_12' ";

        if (mysqli_query($conn, $sql)){
           echo 'success';
           } else {
            echo 'error';
        }
    
}
  

?>