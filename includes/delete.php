<?php require '../includes/conn.php'; ?>

<?php
if (!empty($_GET["publication_id"])) {

  $id = $_GET["publication_id"];

  $sql = "SELECT item_number FROM publication where id = '$id'";

  $result = mysqli_query($conn, $sql);
  $mydata = mysqli_fetch_assoc($result);
  $item_no = $mydata['item_number'];

  $del_sql = "DELETE FROM publication WHERE id='$id'";

  $sql2 = "UPDATE item SET  filled = 0  WHERE item_no='$item_no'";
  mysqli_query($conn, $sql2);

  if (mysqli_query($conn, $del_sql)) {
    header("Location:../hiring_publication/index.php?publication_delete=success");
  } else {
    header("Location:../hiring_publication/index.php?publication_delete=fail");
  }

}

if (!empty($_GET["item_id"])) {

  $id = $_GET["item_id"];

  $del_sql_1 = "DELETE FROM item WHERE id='$id'";

  $del_sql_2 = "DELETE FROM hiring_education WHERE item_no=( SELECT item_no FROM item WHERE id='$id')";
  $conn->query($del_sql_2);

  $del_sql_3 = "DELETE FROM hiring_work_exp WHERE item_no=( SELECT item_no FROM item WHERE id='$id')";
  $conn->query($del_sql_3);

  $del_sql_4 = "DELETE FROM hiring_training WHERE item_no=( SELECT item_no FROM item WHERE id='$id')";
  $conn->query($del_sql_4);

  $del_sql_5 = "DELETE FROM hiring_eligibility WHERE item_no=( SELECT item_no FROM item WHERE id='$id')";
  $conn->query($del_sql_5);

  $del_sql_6 = "DELETE FROM hiring_competency WHERE item_no=( SELECT item_no FROM item WHERE id='$id')";
  $conn->query($del_sql_6);

  $del_sql_7 = "DELETE FROM publication WHERE item_number = ( SELECT item_no FROM item WHERE id='$id')";


  if (mysqli_query($conn, $del_sql_7) && mysqli_query($conn, $del_sql_1)) {
    header("Location:../hiring_item/index.php?item_delete=success");
  } else {
    header("Location:../hiring_item/index.php?item_delete=fail");
  }
}

if (!empty($_GET["applicant_id"])) {

  $applicant_id = $_GET["applicant_id"];

  $sql = "SELECT item_no FROM applicant where applicant_id = '$applicant_id'";

  $result = mysqli_query($conn, $sql);
  $mydata = mysqli_fetch_assoc($result);
  $item_no = 'item_no=' . $mydata['item_no'];



  $del_sql_1 = "DELETE FROM applicant WHERE applicant_id='$applicant_id'";
  // $conn->query($del_sql_1);


  if (mysqli_query($conn, $del_sql_1)) {
    header("Location:../hiring_publication/applicant.php?" . $item_no . "&delete=success");
  } else {
    header("Location:../hiring_publication/applicant.php?delete=fail");
  }
}

if (!empty($_GET["termination_id"])) {

  $termination_id = $_GET["termination_id"];



  $del_sql_1 = "DELETE FROM termination WHERE id='$termination_id'";
  // $conn->query($del_sql_1);
  

  if (mysqli_query($conn, $del_sql_1)) {
    header("Location:../hiring_resignation/index.php?delete=success");
  } else {
    header("Location:../hiring_resignation/index.php?delete=fail");
  }
}

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

if (!empty($_GET["leave_id"])) {

  $leave_id = $_GET["leave_id"];
  
  $del_sql = "DELETE FROM emp_leaves WHERE id='$leave_id'";
  $del_sql1 = "DELETE FROM leave_credits WHERE leave_id='$leave_id'";
  // $conn->query($del_sql_1);


  if (mysqli_query($conn, $del_sql) && mysqli_query($conn, $del_sql1)) {
    header("Location:../leave_mang/index.php?&delete=success");
  } else {
    header("Location:../leave_mang/index.php?delete=fail");
  }
}

if (!empty($_GET["performance_file_id"])) {

  $id = $_GET["id"];
  $performance_file_id = $_GET["performance_file_id"];
  $sql = "DELETE FROM emp_performance WHERE id = '$performance_file_id'";
  $sql1 = "DELETE FROM emp_file WHERE performance_file_id = '$performance_file_id'";
  if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1) ) {
    header("Location:../performance_mang/emp_profile.php?id=".$id."&delete");
  } else {
    header("Location:../performance_mang/emp_profile.php?id=".$id."&notdelete");
  }
}

if (!empty($_GET["learning_id"])) {

  $learning_id = $_GET["learning_id"];
  $sql = "DELETE FROM training_table WHERE id = '$learning_id'";
  $sql1 = "DELETE FROM emp_training WHERE learning_id = '$learning_id'";
  if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1) ) {
    header("Location:../learning/index.php?delete");
  } else {
    header("Location:../learning/index.php?notdelete");
  }
}
?>