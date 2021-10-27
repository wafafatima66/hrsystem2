<?php
require '../includes/conn.php';

if(isset($_POST['submit'])){

    // $date_filled = date('Y-m-d');
    $year = date("Y");
    $emp_id=$_POST['emp_id'];

  
    $type_of_leave=$_POST['type_of_leave'];
    $leave_from_date=$_POST['leave_from_date'];
    $leave_to_date=$_POST['leave_to_date'];
    $details_of_leave=$_POST['details_of_leave'];
    $no_of_working_days=$_POST['no_of_working_days'];
    $date_filled=$_POST['date_filled'];

    $from_date = strtotime($leave_from_date); // or your date as well
    $to_date = strtotime($leave_to_date);
    


    $date_diff = round(($to_date - $from_date )/ (60 * 60 * 24))+1;
 
               $sql="INSERT INTO emp_leaves (emp_id, type_of_leave,leave_from_date,leave_to_date,details_of_leave,date_diff,no_of_working_days , date_filled) VALUE ('$emp_id', '$type_of_leave','$leave_from_date','$leave_to_date','$details_of_leave','$date_diff','$no_of_working_days' , '$date_filled')
           
            ";


                // inserting emp id to table to identify employee applied for leave
                // $sql1="INSERT INTO per_emp_leaves (emp_id) VALUE ('$emp_id')";
            
               

                   //getting month year and difference to store to leave credits 

                    $mon = date("m", strtotime($leave_from_date));
                    $year = date("Y", strtotime($leave_from_date));

                    $vacation_leave = "";
                    $sick_leave = "";
                    $spl = "";
                    $force_leave = "";
                    $lwp = "";


                    if($type_of_leave == "Vacation leave"){
                        $vacation_leave = $date_diff;
                        //$sick_leave = 1.25 ; 
                    }else  if($type_of_leave == "Sick leave"){
                        $sick_leave = $date_diff;
                        //$vacation_leave = 1.25 ; 
                    }else  if($type_of_leave == "Special priviledge leave"){
                        $spl = $date_diff;
                    }else  if($type_of_leave == "Force leave"){
                        $force_leave = $date_diff;
                    }else  if($type_of_leave == "Leave without pay"){
                        $lwp = $date_diff;
                    }

                    // $sql2="INSERT INTO leave_credits (emp_id,vacation_leave,sick_leave,spl,force_leave,lwp,mon,year) VALUE ('$emp_id','$vacation_leave','$sick_leave','$spl','$force_leave','$lwp','$mon','$year')";

                    $query = "SELECT * FROM leave_credits WHERE emp_id = '$emp_id' and year = '$year' and mon = '$mon'";
                        $runquery = $conn->query($query);
                        $rowcount = mysqli_num_rows($runquery);
                        if ($rowcount == 0) {

                            $sql2 = "INSERT INTO leave_credits (emp_id,vacation_leave,sick_leave,spl,force_leave,lwp,mon,year) VALUE ('$emp_id','$vacation_leave','$sick_leave','$spl','$force_leave','$lwp','$mon','$year')";

                            $conn->query($sql2);
                        }else  {

                            $sql3 = "UPDATE leave_credits SET vacation_leave = '$vacation_leave' ,sick_leave = '$sick_leave' , spl = '$spl' , force_leave = '$force_leave' , lwp = '$lwp'  WHERE emp_id = '$emp_id' and year = '$year' and mon = '$mon' ; ";

                            $conn->query($sql3);
                        }

                    
                   

                    if (mysqli_query($conn, $sql)  )
                    {
                      
                       header("Location:../leave_mang?success");
                   
                      } else {
                          echo  '<script>toastr.error("Leave form not added. Try again !")</script>';
                       
                      }
               
        } 
    

    else
    {
        header("Location:emp_mang.php");
        exit();
    }
    

    