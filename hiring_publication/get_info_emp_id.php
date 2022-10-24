<?php
session_start();

//to get information after getting id in leave management first box 

require '../includes/conn.php';

if(isset($_POST['emp_id'])){

    
    $emp_id = $_POST['emp_id'];
    // $_SESSION['emp_id']= $emp_id;
    
    // $query = "SELECT * FROM employee WHERE  emp_id = '$emp_id'" ;

     $query = "SELECT e.emp_id , e.emp_first_name , e.emp_last_name , e.emp_middle_name , e.emp_ext , e.emp_birth_add_barangay , e.emp_birth_add_province , e.emp_birth_add_municipal	 , e.emp_birth_add_zipcode , e.emp_gender ,  a.position , a.salary_grade , a.area_wrk_assign FROM employee e join item a on e.emp_id = a.emp_id where e.emp_id = '$emp_id' ";
      
    $runquery = $conn -> query($query);
    if($runquery == true){
     
       
    while($mydata = $runquery -> fetch_assoc()){

        $emp_first_name = $mydata["emp_first_name"];
        $emp_middle_name = $mydata["emp_middle_name"];
        $emp_last_name = $mydata["emp_last_name"];
        $emp_ext = $mydata["emp_ext"];
        $position = $mydata["position"];
        $salary_grade = $mydata["salary_grade"];
        $office = $mydata["area_wrk_assign"];
        $emp_birth_add_barangay = $mydata["emp_birth_add_barangay"];
        $emp_birth_add_province = $mydata["emp_birth_add_province"];
        $emp_birth_add_municipal = $mydata["emp_birth_add_municipal"];
        $emp_birth_add_zipcode = $mydata["emp_birth_add_zipcode"];
        $emp_gender = $mydata["emp_gender"];
        
        $office = $mydata["area_wrk_assign"];
        echo json_encode( array('emp_first_name'=>$emp_first_name,'emp_middle_name'=>$emp_middle_name,'emp_last_name'=>$emp_last_name,'emp_ext'=>$emp_ext,'position'=>$position,'salary_grade'=>$salary_grade,'office'=>$office , 'emp_birth_add_barangay'=>$emp_birth_add_barangay , 'emp_birth_add_province'=> $emp_birth_add_province , 'emp_birth_add_municipal'=>$emp_birth_add_municipal , 'emp_birth_add_zipcode'=>$emp_birth_add_zipcode , 'emp_gender'=>$emp_gender));

}
    }


    }     

    else
    {
        header("Location:emp_mang.php");
        exit();
    }
    

    