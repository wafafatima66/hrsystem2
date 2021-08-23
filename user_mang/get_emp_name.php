<?php require '../includes/conn.php'; ?>

<?php 
    if(!empty($_POST["emp_id"])) {
    
  $emp_id = $_POST["emp_id"];
  
    $query = "SELECT emp_first_name , emp_last_name , emp_middle_name , emp_ext FROM employee WHERE emp_id = '$emp_id'";
    $runquery = $conn->query($query);
      $rowcount = mysqli_num_rows($runquery);
      if($rowcount > 0){
        if($runquery == true){
     
       
            while($mydata = $runquery -> fetch_assoc()){
        
                $emp_first_name = $mydata["emp_first_name"];
                $emp_last_name = $mydata["emp_last_name"];
                // $emp_middle_name = $mydata["emp_middle_name"];
                // $emp_ext = $mydata["emp_ext"];
      
            }
            $emp_name = $emp_first_name . " " .$emp_last_name  ; 
            echo $emp_name ; 
        
        } else echo "Query not runned !";
      } else {
        echo  'Wrong Id !';
      }
    
  
  } else echo "No ID Received !" ; 

?>