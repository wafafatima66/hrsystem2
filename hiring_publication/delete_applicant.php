<?php require '../includes/conn.php'; ?>
<?php
if (!empty($_GET["applicant_id"]) && !empty($_GET["del_id"])) {

  $applicant_id = $_GET["applicant_id"];
  $del_id = $_GET["del_id"];

  if (isset($_GET["position"])) {
    $temp = 'position_no=' . $del_id;
  } else if (isset($_GET["item"])) {
    $temp = 'item_no=' . $del_id;
  }

  $del_sql_1 = "DELETE FROM applicant WHERE applicant_id='$applicant_id'";
  // $conn->query($del_sql_1);


  if (mysqli_query($conn, $del_sql_1)) {
    header("Location:applicant.php?" . $temp . "&delete=success");
  } else {
    header("Location:applicant.php?delete=fail");
  }
}

?>