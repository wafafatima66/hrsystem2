<?php require '../includes/conn.php'; ?>

<?php
if (!empty($_GET["user_id"])) {

  $user_id = $_GET["user_id"];
  
  $del_sql = "DELETE FROM users WHERE id='$user_id'";
  // $conn->query($del_sql_1);


  if (mysqli_query($conn, $del_sql)) {
    header("Location:../user_mang/index.php?&delete=success");
  } else {
    header("Location:../user_mang/index.php?delete=fail");
  }
}

?>