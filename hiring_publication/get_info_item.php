<?php
session_start();

//to get information after getting id in leave management first box 

require '../includes/conn.php';

if (isset($_POST['item_no'])) {


    $item_no = $_POST['item_no'];

    $query = "SELECT * FROM item where item_no = '$item_no'  ";

    $runquery = $conn->query($query);
    if ($runquery == true) {


        while ($mydata = $runquery->fetch_assoc()) {

            $plantilla = $mydata["position"];
            $place_of_assignment = $mydata["place_of_assignment"];
            $salary_grade = $mydata["salary_grade"];
            $date_created = $mydata["date_created"];

            echo json_encode(array('plantilla' => $plantilla, 'place_of_assignment' => $place_of_assignment, 'salary_grade' => $salary_grade, 'date_created' => $date_created));
        }
    }
}
