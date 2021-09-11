<?php 

include "../includes/conn.php";
    $query = "SELECT department_name FROM department  ";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<option value=''> Select Department </option> ";
            while ($mydata = mysqli_fetch_assoc($result)) {
                echo "<option value= '" . $mydata['department_name'] . "'>" . $mydata['department_name'] . "</option>";
            }
        } else {
            echo "<option value=''> Select Department </option>";
        }

?>