<?php
// session_start();
require '../includes/conn.php';

//to fill up the table points in leave management first box
   
if(isset($_POST['emp_id'])){

    $emp_id = $_POST['emp_id'];
     $type_of_leave = $_POST['type_of_leave'];
     $date_diff = $_POST['date_diff'];
     $mon = $_POST['mon'];
     $year = $_POST['year'];

    //  $from_date = strtotime($leave_from_date); 
    //  $to_date = strtotime($leave_to_date);

    // $mon = date("n", strtotime($leave_from_date));
    // $year = date("Y", strtotime($leave_from_date));


    //  $date_diff = round(($to_date - $from_date )/ (60 * 60 * 24))+1;

     $vl_now_pts = 0;
     $sl_now_pts = 0;

     if($type_of_leave == "Vacation leave"){
        $vl_now_pts = $date_diff * 1 ; 
    } else if($type_of_leave == "Sick leave"){
       $sl_now_pts = $date_diff * 1 ; 
   } else {
       $vl_now_pts = 0;
       $sl_now_pts = 0;
   }

   
   $total_pts_now =  $vl_now_pts + $sl_now_pts ; 
     

     $query = "SELECT vl_pts_$mon , sl_pts_$mon FROM leave_credits_result WHERE  emp_id = '$emp_id' and year = '$year'" ;
       
     $runquery = $conn -> query($query);
     if($runquery == true){
      
        
     while($mydata = $runquery -> fetch_assoc()){
 
         $vl_pts = $mydata["vl_pts_$mon"];
         $sl_pts = $mydata["sl_pts_$mon"];

         $pts_total = $vl_pts + $sl_pts;

         $vl_bal = $vl_pts -  $vl_now_pts ; 
         $sl_bal =  $sl_pts - $sl_now_pts ; 
         $total_bal = $vl_bal + $sl_bal ; 
       
 
         echo json_encode( array('vl_now_pts'=>$vl_now_pts,'sl_now_pts'=>$sl_now_pts,'vl_pts'=>$vl_pts,'sl_pts'=>$sl_pts,'pts_total'=>$pts_total, 'total_pts_now'=>$total_pts_now,'vl_bal'=>$vl_bal,'sl_bal'=>$sl_bal,'total_bal'=>$total_bal));
        
 
}
} else {
    echo json_encode( array('vl_pts'=>$year , 'sl_pts'=>$mon));
}
}
