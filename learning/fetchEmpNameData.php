<?php  
require '../includes/conn.php'; 
 if(isset($_POST["emp_id"]))  
 {  
    $id = $_POST['id'];

      $output = '';  
      $query = "SELECT concat(emp_first_name , emp_middle_name , emp_last_name) as emp_full_name FROM employee HAVING emp_full_name LIKE '%".$_POST["emp_id"]."%'";  

      
      $runquery = $conn -> query($query);

      $output = '<ul class=" emp_list_ul list-unstyled">';  

    if($runquery == true){
     
       
    while($mydata = $runquery -> fetch_assoc()){
                $output .= '<li class="emp_list_li  emp_list_li_'.$id.'">'.$mydata["emp_full_name"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>Employee Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }
