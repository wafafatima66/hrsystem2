<?php

require '../includes/conn.php';

if(isset($_POST['item_no'])){

    
    $item_no = $_POST['item_no'];
    // $_SESSION['emp_id']= $emp_id;
    
    $query = "SELECT i.* , p.* , e.emp_last_name , e.emp_first_name,e.emp_middle_name FROM item i 
    LEFT join publication p on i.item_no = p.item_number 
    LEFT join employee  e on i.emp_id = e.emp_id WHERE item_no = '$item_no'" ;
      
    $runquery = $conn -> query($query);
    if($runquery == true){
     
       
    while($mydata = $runquery -> fetch_assoc()){

        $position = $mydata["position"];
        $salary_grade = $mydata["salary_grade"];
        $date_created = $mydata["date_created"];
        $nature = $mydata["nature"];
        $monthly_salary= $mydata["monthly_salary"];
        $description= $mydata["description"];
        $division= $mydata["division"];
        $area_wrk_assign= $mydata["area_wrk_assign"];
        $date_of_publication= $mydata["date_of_publication"];;
        $end_of_publication= $mydata["end_of_publication"];
        $pre_emp_last_name= $mydata["emp_last_name"];
        $pre_emp_first_name= $mydata["emp_first_name"];
        $pre_emp_middle_name= $mydata["emp_middle_name"];
        $pre_emp_id= $mydata["emp_id"];

        echo json_encode( array('position'=>$position,'salary_grade'=>$salary_grade,'date_created'=>$date_created,'nature'=>$nature,'monthly_salary'=>$monthly_salary,'description'=>$description,'division'=>$division,'area_wrk_assign'=>$area_wrk_assign,'date_of_publication'=>$date_of_publication,'end_of_publication'=>$end_of_publication,'pre_emp_last_name'=>$pre_emp_last_name,'pre_emp_first_name'=>$pre_emp_first_name,'pre_emp_middle_name'=>$pre_emp_middle_name,'pre_emp_id'=>$pre_emp_id));

}
    }

    }     

   

    