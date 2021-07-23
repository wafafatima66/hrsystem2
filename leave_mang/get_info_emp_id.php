<?php
session_start();

//to get information after getting id in leave management first box 

require '../includes/conn.php';

if(isset($_POST['emp_id'])){

    
    $emp_id = $_POST['emp_id'];
    // $_SESSION['emp_id']= $emp_id;
    
    $query = "SELECT * FROM employee WHERE  emp_id = '$emp_id'" ;
      
    $runquery = $conn -> query($query);
    if($runquery == true){
     
       
    while($mydata = $runquery -> fetch_assoc()){

        $emp_first_name = $mydata["emp_first_name"];
        $emp_middle_name = $mydata["emp_middle_name"];
        $emp_last_name = $mydata["emp_last_name"];
        $emp_ext = $mydata["emp_ext"];
        // $emp_status = $mydata["emp_status"];
        // $emp_salary = $mydata["emp_salary"];

        echo json_encode( array('emp_first_name'=>$emp_first_name,'emp_middle_name'=>$emp_middle_name,'emp_last_name'=>$emp_last_name,'emp_ext'=>$emp_ext));

}
    }



    

    }     

    else
    {
        header("Location:emp_mang.php");
        exit();
    }
    

    