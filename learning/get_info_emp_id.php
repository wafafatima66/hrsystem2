<?php
// session_start();

//to get information after getting id in leave management first box 



require '../includes/conn.php';

if(isset($_POST['full_name'])){

    

    $emp_name = $_POST['full_name'];
    // $_SESSION['emp_id']= $emp_id;
    
    // $query = "SELECT * FROM employee WHERE  emp_id = '$emp_id'" ;

    //  $query = "SELECT i.area_wrk_assign , concat_ws(e.emp_first_name , e.emp_middle_name , e.emp_last_name) as emp_full_name FROM item i join employee e on i.emp_id = e.emp_id HAVING emp_full_name LIKE '%$emp_name%'";
     $query = "SELECT e.emp_id , i.area_wrk_assign , concat(e.emp_first_name , e.emp_middle_name , e.emp_last_name) as emp_full_name FROM item i join employee e on i.emp_id = e.emp_id where concat(e.emp_first_name , e.emp_middle_name , e.emp_last_name) = '$emp_name'";
      
     //SELECT i.area_wrk_assign FROM item i join employee e on i.emp_id = e.emp_id where e.emp_first_name = 'ERNISON' and e.emp_middle_name = 'WAPAN' and e.emp_last_name= 'BAY-OS'

    //  SELECT i.area_wrk_assign , concat_ws(e.emp_first_name , e.emp_middle_name , e.emp_last_name) as emp_full_name FROM item i join employee e on i.emp_id = e.emp_id where concat_ws(e.emp_first_name , e.emp_middle_name , e.emp_last_name) = 'ERNISON WAPANBAY-OS';

     
    $runquery = $conn -> query($query);
    if($runquery == true){
     
       
    while($mydata = $runquery -> fetch_assoc()){

        $area_wrk_assign = $mydata["area_wrk_assign"];
        $emp_id = $mydata["emp_id"];
        // $emp_middle_name = $mydata["emp_middle_name"];
        // $emp_last_name = $mydata["emp_last_name"];
        // $emp_ext = $mydata["emp_ext"];

        echo json_encode( array('area_wrk_assign'=>$area_wrk_assign  , 'emp_id' => $emp_id));

}
    }


    }     

    else
    {
        header("Location:emp_mang.php");
        exit();
    }
    

    