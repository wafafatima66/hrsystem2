<?php require '../includes/conn.php'; ?>

<?php
if (!empty($_GET["publication_id"])) {

  $id = $_GET["publication_id"];

  $del_sql = "DELETE FROM publication WHERE id='$id'";


  if (mysqli_query($conn, $del_sql) ) {
    header("Location:../hiring_publication/index.php?publication_delete=success");
  } else {
    header("Location:../hiring_publication/index.php?publication_delete=fail");
  }
}

if (!empty($_GET["item_id"])) {

  $id = $_GET["item_id"];
  $del_sql_1 = "DELETE FROM item WHERE id='$id'";
  
  $del_sql_2 = "DELETE FROM publication WHERE item_number =(
    SELECT item_no FROM item
    WHERE id='$id')";

  if (mysqli_query($conn, $del_sql_1) && mysqli_query($conn, $del_sql_2)) {
    header("Location:../hiring_item/index.php?item_delete=success");
  } else {
    header("Location:../hiring_item/index.php?item_delete=fail");
  }
}

if (!empty($_GET["applicant_id"])) {

  $applicant_id = $_GET["applicant_id"];
  // $del_id = $_GET["del_id"];

  // if (isset($_GET["position"])) {
  //   $temp = 'position_no=' . $del_id;
  // } else if (isset($_GET["item"])) {
  //   $temp = 'item_no=' . $del_id;
  // }

  $sql = "SELECT item_no FROM applicant where applicant_id = '$applicant_id'";

    $result = mysqli_query($conn, $sql);
    $mydata = mysqli_fetch_assoc($result);
    $item_no = 'item_no='.$mydata['item_no'];
  


  $del_sql_1 = "DELETE FROM applicant WHERE applicant_id='$applicant_id'";
  // $conn->query($del_sql_1);


  if (mysqli_query($conn, $del_sql_1)) {
    header("Location:../hiring_publication/applicant.php?" . $item_no . "&delete=success");
  } else {
    header("Location:../hiring_publication/applicant.php?delete=fail");
  }
}

?>