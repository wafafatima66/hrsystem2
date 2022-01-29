<?php
     
    $vac_date_diff =   "";
    $sick_date_diff =   "";
    $spl_date_diff =   "";
    $lwp_date_diff =   "";
    $man_date_diff =   "";

    $vac_leave_dates="";
    $sick_leave_dates="";
    $spl_leave_dates="";
    $lwp_leave_dates="";
    $man_leave_dates="";

    if (!empty($_COOKIE["inputDate"]) )  {
        $year = $_COOKIE['inputDate'];
    }else {
        $year = date("Y");
    }
    
    $j = $i+1;
    

    $query = "select sum(vacation_leave) as vl_days , sum(sick_leave) as sl_days, (spl) as spl_days , (force_leave) as fl_days , (lwp) as lwp_days from leave_credits where emp_id = '$emp_id' and mon = $j and year = $year and status = 1";


            $runquery = $conn->query($query);
            $rowcount = mysqli_num_rows($runquery);
            if ($rowcount != 0) {

                while ($mydata = $runquery->fetch_assoc()) {

                    $vac_date_diff = ($mydata["vl_days"]==''?'0':$mydata["vl_days"]);
                    $sick_date_diff = ($mydata["sl_days"]==''?'0':$mydata["sl_days"]);
                    $spl_date_diff = ($mydata["spl_days"]==''?'0':$mydata["spl_days"]);
                    $man_date_diff = ($mydata["fl_days"]==''?'0':$mydata["fl_days"]);
                    $lwp_date_diff =($mydata["lwp_days"]==''?'0':$mydata["lwp_days"]);
                }
            }

    // $query = "select * from emp_leaves where emp_id = '$emp_id' and MONTH(leave_from_date) = $j and year(leave_from_date)= $year and type_of_leave = 'vacation leave'"; 

    // if($runquery = $conn -> query($query))

    // {
    // while($mydata = $runquery -> fetch_assoc())
    //     {
    //         $leave_from_date =   date("m/d", strtotime($mydata["leave_from_date"]));
    //         $leave_to_date =   date("m/d", strtotime($mydata["leave_to_date"]));
    //         $vac_date_diff =   $mydata["date_diff"];
            

    //         $vac_leave_dates = $leave_from_date . ' '.'-'.' ' . $leave_to_date ; 
    //     }

        
    // }



    // $query = "select * from emp_leaves where emp_id = '$emp_id' and MONTH(leave_from_date) = $j and year(leave_from_date)= $year and type_of_leave = 'sick leave'"; 



    // if($runquery = $conn -> query($query))

    // {
    // while($mydata = $runquery -> fetch_assoc())
    //     {
    //         $leave_from_date =   date("m/d", strtotime($mydata["leave_from_date"]));
    //         $leave_to_date =   date("m/d", strtotime($mydata["leave_to_date"]));
    //         $sick_date_diff =   $mydata["date_diff"];


    //         $sick_leave_dates = $leave_from_date . ' '.'-'.' ' . $leave_to_date ; 
    //     }

        
    // }




    // $query = "select * from emp_leaves where emp_id = '$emp_id' and MONTH(leave_from_date) = $j and year(leave_from_date)= $year and type_of_leave = 'special priviledge leave'"; 



    // if($runquery = $conn -> query($query))

    // {
    // while($mydata = $runquery -> fetch_assoc())
    //     {
    //         $leave_from_date =   date("m/d", strtotime($mydata["leave_from_date"]));
    //         $leave_to_date =   date("m/d", strtotime($mydata["leave_to_date"]));
    //         $spl_date_diff =   $mydata["date_diff"];


    //         $spl_leave_dates = $leave_from_date . ' '.'-'.' ' . $leave_to_date ; 
    //     }

        
    // }

    // $query = "select * from emp_leaves where emp_id = '$emp_id' and MONTH(leave_from_date) = $j and year(leave_from_date)= $year and type_of_leave = 'Mandatory/Forced Leave'"; 
    
    
    
    // if($runquery = $conn -> query($query))
    
    // {
    // while($mydata = $runquery -> fetch_assoc())
    //     {
    //         $leave_from_date =   date("m/d", strtotime($mydata["leave_from_date"]));
    //         $leave_to_date =   date("m/d", strtotime($mydata["leave_to_date"]));
    //         $man_date_diff =   $mydata["date_diff"];
    
    
    //         $man_leave_dates = $leave_from_date . ' '.'-'.' ' . $leave_to_date ; 
    //     }
    
        
    // }


    // $query = "select * from emp_leaves where emp_id = '$emp_id' and MONTH(leave_from_date) = $j and year(leave_from_date)= $year and type_of_leave = 'leave without pay'"; 
    
    
    
    // if($runquery = $conn -> query($query))
    
    // {
    // while($mydata = $runquery -> fetch_assoc())
    //     {
    //         $leave_from_date =   date("m/d", strtotime($mydata["leave_from_date"]));
    //         $leave_to_date =   date("m/d", strtotime($mydata["leave_to_date"]));
    //         $lwp_date_diff =   $mydata["date_diff"];
    
    
    //         $lwp_leave_dates = $leave_from_date . ' '.'-'.' ' . $leave_to_date ; 
    //     }
    
        
    // }
   
?>