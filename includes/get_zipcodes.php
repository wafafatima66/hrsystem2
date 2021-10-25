<?php require '../includes/conn.php'; ?>

<?php 
    if(!empty($_POST["city"])) {
    
  $city = $_POST["city"];
  
    $query = "SELECT zip_code FROM zipcodes WHERE city = '$city'";
    $runquery = $conn->query($query);
      $rowcount = mysqli_num_rows($runquery);
      if($rowcount > 0){
        if($runquery == true){
     
       
            while($mydata = $runquery -> fetch_assoc()){
        
                // echo  $mydata['zip_code'] ;
                echo "<option value= '" . $mydata['zip_code'] . "'>" . $mydata['zip_code'] . "</option>";
            }
           
            
        
        } else echo "Query not runned !";
      } else {
        echo  'Wrong Id typed';
      }
    
  
  } else echo "No ID typed" ; 

?>