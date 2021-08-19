<?php require '../includes/conn.php'; ?>
<?php 
if(!empty($_POST["applicant_id"])) {
  $id = $_POST["applicant_id"];
    $query = "SELECT applicant_id FROM applicant WHERE applicant_id = '$id' UNION SELECT emp_id FROM employee WHERE emp_id = '$id'";
    $runquery = $conn->query($query);
      $rowcount = mysqli_num_rows($runquery);
  
  
  //   $user_count = $db_handle->numRows($query);
    if($rowcount>0) {
        echo "<span class='text-danger'> Applicant ID Not Available.</span>";
    }else{
        echo "<span class='text-success'> Applicant ID Available.</span>";
    }
  }

?>