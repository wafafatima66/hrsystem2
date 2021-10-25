<?php require '../includes/conn.php'; ?>

<?php 
    if(!empty($_POST["state"])) {
    
  $state = $_POST["state"];
  
    $query = "SELECT city FROM zipcodes WHERE major_area = '$state'";
    $runquery = $conn->query($query);
      $rowcount = mysqli_num_rows($runquery);
      if($rowcount > 0){
        if($runquery == true){
     
       
            while($mydata = $runquery -> fetch_assoc()){
        

                echo "<option value= '" . $mydata['city'] . "'>" . $mydata['city'] . "</option>";
      
            }
           
            
        
        } else echo "Query not runned !";
      } else {
        echo  'Wrong Id typed';
      }
    
  
  } else echo "No ID typed" ; 

?>