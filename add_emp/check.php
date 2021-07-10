<?php
// require_once("DBController.php");
// $db_handle = new DBController();
require '../includes/conn.php';

if(!empty($_POST["emp_id"])) {
  $query = "SELECT * FROM employee WHERE emp_id='" . $_POST["emp_id"] . "'";
  $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);


//   $user_count = $db_handle->numRows($query);
  if($rowcount>0) {
      echo "<span class='text-danger'> Employee ID Not Available.</span>";
  }else{
      echo "<span class='text-success'> Employee ID Available.</span>";
  }
}
?>