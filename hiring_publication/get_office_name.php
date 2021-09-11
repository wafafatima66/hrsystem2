<?php

// Connect database 
require '../includes/conn.php';

if (isset($_POST['dept'])) {
  $dept = $_POST['dept'];
  

    $query = "SELECT * FROM office where department_name = '$dept' ";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($mydata = mysqli_fetch_assoc($result)) {
                echo "<option value= '" . $mydata['office_name'] . "'>" . $mydata['office_name'] . "</option>";
            }
        } 

} 

?>