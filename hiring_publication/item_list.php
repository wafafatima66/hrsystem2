<?php 

include "../includes/conn.php";
    $query = "SELECT item_no FROM item where status = 0  ";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<option value=''> Select Item </option> ";
            while ($mydata = mysqli_fetch_assoc($result)) {
                echo "<option value= '" . $mydata['item_no'] . "'>" . $mydata['item_no'] . "</option>";
            }
        } else {
            echo "<option value=''> Select Item </option>";
        }

?>