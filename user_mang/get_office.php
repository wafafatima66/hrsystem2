<?php require '../includes/conn.php'; ?>

<?php
if (!empty($_POST["department"])) {

  $department = $_POST["department"];

  $query = "SELECT DISTINCT area_wrk_assign from item where division = '$department' and area_wrk_assign != '' ";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    echo "";
    while ($mydata = mysqli_fetch_assoc($result)) {
      echo "<option value= '" . $mydata['area_wrk_assign'] . "'>" . $mydata['area_wrk_assign'] . "</option>";
    }
  } else {
    echo "<option value='' > Select Office/Unit </option>";
  }
} else echo "No ID typed";

?>