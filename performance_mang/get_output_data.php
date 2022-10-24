<?php require '../includes/conn.php'; ?>

<?php
if (!empty($_POST["output_date"])) {

  $output_date = $_POST["output_date"];
  $emp_id = $_POST["emp_id"];

  
  $query = "SELECT output_description FROM `daily_accomplishment` WHERE date = '$output_date' and emp_id = '$emp_id';";


  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {

    
    while ($mydata = mysqli_fetch_assoc($result)) {

        $output_description = json_decode($mydata['output_description']);
        $output_description = array_values(array_filter($output_description, 'strlen'));

        $ul_output = "";
    
            if(!empty($output_description)){
              
            for ($i = 0; $i < count($output_description); $i++) {

              // $ul_output .= "$output_description[$i] ," ;

              $ul_output .= "<div class='form-row mt-2'>
              
              <div class='col-lg-6 col-sm-6 '> 
              
              <label >Output</label> 
              
              <textarea name='output_description[]' cols='30' rows='5' class='form-control text-input' placeholder='Output'> {$output_description[$i]} </textarea> 
              
              </div>

              <div class='col-lg-6 col-sm-6 '> 
              
              <label >Success</label> 
              
              <textarea name='success_description[]' cols='30' rows='5' class='form-control text-input' placeholder='Success'></textarea> 
              
              </div>
              

            </div>";

            }
            
          }else  echo "<p class='text-danger'>No data found</p>";

      
    }

    echo $ul_output ; 

  } 
  
  else {
    echo "<p class='text-danger'>No data found</p>";
  }

} 


else echo "<p class='text-danger'>No data found</p>";