
<?php require '../includes/conn.php'; ?>
<?php 

if(!empty($_POST["position_no"])) {
  $position_no = $_POST["position_no"];
    $query = "SELECT position_no FROM cont_position WHERE position_no = '$position_no'";
    $runquery = $conn->query($query);
      $rowcount = mysqli_num_rows($runquery);
  
  
  //   $user_count = $db_handle->numRows($query);
    if($rowcount>0) {
        echo "<span class='text-danger'> Position No Exist.</span>";
    }else{
        echo "<span class='text-success'> Position No. Available.</span>";
    }

  // echo $_POST["position_no"];
  }

  // echo "hi";

?>