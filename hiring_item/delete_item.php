<?php require '../includes/conn.php'; ?>
<?php
if (!empty($_GET["id"])) {

  $id = $_GET["id"];
  // $del_id = $_GET["del_id"];

  
  $del_sql_1 = "DELETE FROM item WHERE id='$id'";
  
  $del_sql_2 = "DELETE FROM publication WHERE item_number =(
    SELECT item_no FROM item
    WHERE id='$id')";

  // $conn->query($del_sql_1);


  if (mysqli_query($conn, $del_sql_1) && mysqli_query($conn, $del_sql_2)) {
    header("Location:index.php?item_delete=success");
  } else {
    header("Location:index.php?item_delete=fail");
  }
}

?>