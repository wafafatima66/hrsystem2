<?php
// session_start();


require '../includes/conn.php';

if(isset($_POST['applicant_id'])){

    
    $applicant_id = $_POST['applicant_id'];
    // $_SESSION['emp_id']= $emp_id;
    
    $query = "SELECT * FROM applicant WHERE  applicant_id = '$applicant_id'" ;
      
    $runquery = $conn -> query($query);
    if($runquery == true){
     
       
    while($mydata = $runquery -> fetch_assoc()){

        $applicant_last_name = $mydata["applicant_last_name"];
        $applicant_first_name = $mydata["applicant_first_name"];
        $applicant_middle_name = $mydata["applicant_middle_name"];
        $applicant_ext = $mydata["applicant_ext"];
        $applicant_rating = $mydata["applicant_rating"];
        $applicant_rank = $mydata["applicant_rank"];

        $applicant_name = $applicant_last_name ." ".  $applicant_first_name ." ".  $applicant_middle_name ." ".  $applicant_ext  ; 

        echo json_encode( array('applicant_name'=>$applicant_name,'applicant_rating'=>$applicant_rating,'applicant_rank'=>$applicant_rank));

}
    }

    }     

   

    