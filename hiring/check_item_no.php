<?php require '../includes/conn.php'; ?>
<?php 
if(!empty($_POST["item_no"])) {
  $item_no = $_POST["item_no"];
    $query = "SELECT item_no FROM item WHERE item_no = '$item_no'";
    $runquery = $conn->query($query);
      $rowcount = mysqli_num_rows($runquery);
  
  
  //   $user_count = $db_handle->numRows($query);
    if($rowcount>0) {
        echo "<span class='text-danger'> Item No. Exist.</span>";
    }else{
        echo "<span class='text-success'> Item No. Available.</span>";
    }
  }

?>