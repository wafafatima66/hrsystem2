<?php require '../includes/conn.php'; ?>

<?php
if (!empty($_POST["success_date"])) {

  $success_date = $_POST["success_date"];
  $emp_id = $_POST["emp_id"];

  
  $query = "SELECT success_description FROM `daily_accomplishment` WHERE date = '$success_date' and emp_id = '$emp_id';";


  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {

    
    while ($mydata = mysqli_fetch_assoc($result)) {

        $success_description = json_decode($mydata['success_description']);
        $success_description = array_values(array_filter($success_description, 'strlen'));


        $ul_output = "";
    
            if(!empty($success_description)){
              
            for ($i = 0; $i < count($success_description); $i++) {

              // $ul_output .= "$output_description[$i] ," ;

              $ul_output .= "<div class='form-row mt-2'>
              
              <div class='col-lg-6 col-sm-6 '> 
              
              <label >Output</label> 
              
              <textarea name='output_description[]' cols='30' rows='5' class='form-control text-input' placeholder='Output'></textarea> 

              </div>

              <div class='col-lg-6 col-sm-6 '> 
              
              <label >Success</label> 
              
              <textarea name='success_description[]' cols='30' rows='5' class='form-control text-input' placeholder='Success'> {$success_description[$i]} </textarea> 
              
              </div>
              

            </div>";

            }
            
          } else echo "<p class='text-danger'>No data found</p>";

      
    }

    echo $ul_output ; 

  } 
  
  else {
    echo "<p class='text-danger'>No data found</p>";
  }

} 


else echo "<p class='text-danger'>No data found</p>";