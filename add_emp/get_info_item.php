<?php

require '../includes/conn.php';

if(isset($_POST['item_no'])){

    
    $item_no = $_POST['item_no'];
    // $_SESSION['emp_id']= $emp_id;
    
    $query = "SELECT * FROM item WHERE item_no = '$item_no'" ;
      
    $runquery = $conn -> query($query);
    if($runquery == true){
     
       
    while($mydata = $runquery -> fetch_assoc()){

        $position = $mydata["position"];
        $salary_grade = $mydata["salary_grade"];
        $date_created = $mydata["date_created"];
        $nature = $mydata["nature"];

        echo json_encode( array('position'=>$position,'salary_grade'=>$salary_grade,'date_created'=>$date_created,'nature'=>$nature));

}
    }

    }     

   

    