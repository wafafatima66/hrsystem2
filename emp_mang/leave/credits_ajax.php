<?php
require '../../includes/conn.php';
include 'points.php';

$last_year = '';
$year = '';
$emp_id = '';

if (isset($_POST['date'])) {
    $last_year = $_POST['date'] - 1;
} else {
    $last_year = date("Y") - 1;
}

if (isset($_POST['emp_id'])) {
    $emp_id = $_POST['emp_id'];
} else {
    $emp_id = "";
}

$vl_earned = 0 ; $vl_incurred = 0 ; $vl_balance = 0;
$sl_earned = 0 ; $sl_incurred = 0 ; $sl_balance = 0;

session_start();
// readonly for users
$readonly = 'readonly';
if ($_SESSION['user_role'] == 'HR Administrator' || $_SESSION['user_role'] == 'Super Administrator') {
    $readonly = '';
}

$output = '';

$output .= '<div class="d-flex flex-column pb-4">';

$query = "select vl_pts,sl_pts,year from leave_credits_year where emp_id = '$emp_id' and year = $last_year ";

if ($runquery = $conn->query($query)) {
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount != 0) {
        while ($mydata = $runquery->fetch_assoc()) {
            $vl_pts = $mydata["vl_pts"];
            $sl_pts = $mydata["sl_pts"];
            $year = $mydata["year"]; //getting last year to display
        }
    } else {
        $vl_pts = 15.00;
        $sl_pts = 15.00;
        if (isset($_POST['date'])) {
            $year = $_POST['date'] - 1;
        } else {
            $year = date("Y") - 1;
        }
        // $year = date("Y") - 1;
    }
}
$total_pts = $vl_pts + $sl_pts;

$output .= ' <p class="text-center">BALANCE FORWARDED AS OF <span style="font-style:italic;">12/31/' . $year . '</span></p> 
       
       <div class="d-flex align-items-center justify-content-center">

            <input type="hidden" name="leave_emp_id" value="' . $emp_id . '" id="leave_emp_id">

            <div class="d-flex flex-column" style=" border-right: 1px solid #000; padding:0 20px ">
                <input type="text" size="1" class="text-center h4 pts" style="background: none;
                    border: none; " value="' . $vl_pts . '" name="vl_pts" id="vl_pts">
                <span class="text-center">VL</span>
            </div>

            <div class="d-flex flex-column" style=" border-right: 1px solid #000; padding:0 20px ">
                <input type="text" size="1" class="text-center h4 pts" style="background: none;
                    border: none; " value="' . $sl_pts . '" name="sl_pts" id="sl_pts">
                <span class="text-center">SL</span>
            </div>

            <div class="d-flex flex-column" style=" border-right: 1px solid #000; padding:0 20px ">
                <input type="text" size="1" class="text-center h4" style="background: none;
                    border: none; " value="' . $total_pts . '">
                <span class="text-center">Total</span>
            </div>


        </div>';

        if ($_SESSION['user_role'] == 'Super Administrator' || $_SESSION['user_role'] == 'HR Administrator' ) {

           

            $output .= ' <div class="container">
            <div class="text-center">
                <input type="submit" class="btn m-3 button-1" name="upgrade" value="Update" id="update_year">
            </div>
        </div>';

        }

      

        $output .= '</div>

    <div class="row">

        <div class="col-lg-1 col-sm-1 col-1"></div>

        <div class="col-lg-11 col-sm-11 col-11">
            <div class="form-inline ">

                <div class="col-lg-3 col-sm-3 col-3">
                    <label for="" style="color:#54A04B; " class="responsive-label date-input font-weight-bold">VACATION</label>
                </div>

                <div class="col-lg-3 col-sm-3 col-3">
                    <label for="" style="color:#54A04B;  " class="responsive-label date-input font-weight-bold">SICK </label>
                </div>

                <div class="col-lg-1 col-sm-1 col-1">
                    <label for="" style="color:#54A04B; " class="responsive-label date-input font-weight-bold">SPL</label>
                </div>

                <div class="col-lg-1 col-sm-1 col-1">
                    <label for="" style="color:#54A04B; " class="responsive-label date-input font-weight-bold">ML/FL</label>
                </div>

                <div class="col-lg-1 col-sm-1 col-1">
                    <label for="" style="color:#54A04B;  " class="responsive-label date-input font-weight-bold">LWP</label>
                </div>

                <div class="col-lg-3 col-sm-3 col-3">
                    <label for="" style="color:#54A04B;  " class="responsive-label date-input font-weight-bold">UT</label>
                </div>

            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-1 col-sm-1 col-1"></div>

        <div class="col-lg-11 col-sm-11 col-11">
            <div class="form-inline mt-2">

                <div class="col-lg-3 col-sm-3 col-3">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 col-4">
                            <label for="" style="color:#54A04B; " class="responsive-label date-input">Earned</label>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-4">
                            <label for="" style="color:#54A04B; " class="responsive-label date-input">Incurred</label>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-4">
                            <label for="" style="color:#54A04B; " class="responsive-label date-input">Balance</label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3 col-3">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 col-4">
                                <label for="" style="color:#54A04B; " class="responsive-label date-input">Earned</label>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-4">
                            <label for="" style="color:#54A04B; " class="responsive-label date-input">Incurred</label>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-4">
                            <label for="" style="color:#54A04B; " class="responsive-label date-input">Balance</label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-1 col-sm-1 col-1">
                    <label for="" style="color:#54A04B; " class="responsive-label date-input">Days</label>
                </div>

                <div class="col-lg-1 col-sm-1 col-1">
                    <label for="" style="color:#54A04B; " class="responsive-label date-input">Days</label>
                </div>

                <div class="col-lg-1 col-sm-1 col-1">
                    <label for="" style="color:#54A04B;  " class="responsive-label date-input">Days</label>
                </div>

                <div class="col-lg-3 col-sm-3 col-3">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <label for="" style="color:#54A04B; " class="responsive-label date-input">Hour</label>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-6">
                            <label for="" style="color:#54A04B; " class="responsive-label date-input">Minutes</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">';

$array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");


for ($i = 0; $i < 12; $i++) {

    $output .= ' <div class="col-lg-1 col-sm-1 col-1">
        <label for="" class="mr-2 date-input">' . $array[$i] . '</label>
    </div> ';


    $j = $i + 1;

    // if (!empty($_COOKIE["inputDate"])) {
    //     $year = $_COOKIE['inputDate'];
    // }else {
    //     $year = date("Y");
    // }

    if (isset($_POST['date'])) {
        $year = $_POST['date'];
    } else {
        $year = date("Y");
    }

    

    $query = "select sum(vacation_leave) as vl_days , sum(sick_leave) as sl_days, sum(spl) as spl_days , sum(force_leave) as fl_days , sum(lwp) as lwp_days from leave_credits where emp_id = '$emp_id' and mon = $j and year = $year and  final_status = 1";


    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount != 0) {

        while ($mydata = $runquery->fetch_assoc()) {

            $hour_value = '';
            $minute_value = '';
            // hour value
            $hour_query = "select * from emp_leave_time where emp_id = '$emp_id' and mon = '$j' and year = '$year' and type = 'hour' ";
            $hour_runquery = $conn->query($hour_query);
            $hour_rowcount = mysqli_num_rows($hour_runquery);
            if ($hour_rowcount != 0) {
                while ($hour_mydata = $hour_runquery->fetch_assoc()) {
                    $hour_value = $hour_mydata["value"];
                }
            }else {
                $hour_value = 0 ; 
            }

            // minute value
            $minute_query = "select * from emp_leave_time where emp_id = '$emp_id' and mon = '$j' and year = '$year' and type = 'minute' ";
            $minute_runquery = $conn->query($minute_query);
            $minute_rowcount = mysqli_num_rows($minute_runquery);
            if ($minute_rowcount != 0) {
                while ($minute_mydata = $minute_runquery->fetch_assoc()) {
                    $minute_value = ($minute_mydata["value"]);
                }
            }else {
                $minute_value = 0 ; 
            }

            $spl_days = ($mydata["spl_days"] == '' ? '0' : $mydata["spl_days"]);
            $fl_days = ($mydata["fl_days"] == '' ? '0' : $mydata["fl_days"]);
            $lwp_days = ($mydata["lwp_days"] == '' ? '0' : $mydata["lwp_days"]);

            $default_earn_leave = 1.25 ; 
              
            $lwp_points = lwp_points($lwp_days);
            $ut_points = ut_points($hour_value , $minute_value);

            $vl_days = ($mydata["vl_days"] == '' ? '0' : $mydata["vl_days"]);
            $sl_days = ($mydata["sl_days"] == '' ? '0' : $mydata["sl_days"]);

            

            // if (($mydata["vl_days"]) == 0 || ($mydata["sl_days"]) == 0){
                
            // }

            // if (!empty($mydata["vl_days"]) && !empty($mydata["sl_days"])) {

            //     $vl_days = $mydata["vl_days"]; 
            //     $vl_pts =  $vl_pts - ($vl_days * 1);
            //     $sl_days = $mydata["sl_days"];
            //     $sl_pts =  $sl_pts - ($sl_days * 1);
            // } else if (!empty($mydata["sl_days"])) {

            //     $sl_days = $mydata["sl_days"];
            //     $sl_pts =  $sl_pts - ($sl_days * 1);
            //     $vl_days = 1.25;
            //     $vl_pts =  $vl_pts + 1.25; 

            // } else if (!empty($mydata["vl_days"])) {

            //     $vl_days = $mydata["vl_days"]; 
            //     $vl_pts =  $vl_pts - ($vl_days * 1);
            //     $sl_days = 1.25;
            //     $sl_pts =  $sl_pts + 1.25;  

            // } else {

                // $vl_days = 1.25; 
                // $vl_pts =  $vl_pts + 1.25;
                // $sl_days = 1.25;  
                // $sl_pts =  $sl_pts + 1.25;
                // $vl_days = 0; 
                // $sl_days = 0;  

                $vl_earned = $sl_earned =  $default_earn_leave - ( $lwp_points + $ut_points);

                if($j == 1){
                    $vl_balance = $vl_pts + $vl_earned;
                    $sl_balance = $sl_pts + $sl_earned;
                } else {
                    $vl_balance = ($vl_balance + $vl_earned) - $vl_days;
                    $sl_balance = ($sl_balance + $sl_earned) - $sl_days;
                }
               
                
                // (Earned + Previous Balance) – Incurred = Balance
                //1.25 -(0+.125)
            // }

            
            //for fetching the information into leave form 

            $mon = $i + 1; 



            $sql_3 = "INSERT INTO leave_credits_result (vl_pts_$mon, sl_pts_$mon, year , emp_id) VALUES('$vl_balance', '$sl_balance' , '$year','$emp_id') 

            ON DUPLICATE KEY UPDATE    
            vl_pts_$mon='$vl_balance' , 
            sl_pts_$mon='$sl_balance' ";

            mysqli_query($conn, $sql_3);

            

            $output .= '<div class="col-lg-11 col-sm-11 col-11">

                <div class="form-row mt-2">

                    <div class="col-lg-3 col-sm-3 col-3 ">
                        
                        
                        <div class="d-flex flex-row">
                            <div class="col-lg-4 col-sm-4 col-4 p-0">
                                <input type="text" class="form-control date-input text-input " readonly value="' . $vl_earned . '"  id="vl_days_">
                            </div>
                            <div class="col-lg-4 col-sm-4 col-4 p-0">
                                <input type="text" class="form-control date-input text-input " readonly value="' . $vl_days . '" >
                            </div>
                            <div class="col-lg-4 col-sm-4 col-4 p-0">
                                <input type="text" class="form-control date-input text-input " readonly value="' . $vl_balance . '" >
                            </div>
                        </div>

                        
                    </div>


                    <div class="col-lg-3 col-sm-3 col-3">
                        
                        <div class="d-flex flex-row">
                            <div class="col-lg-4 col-sm-4 col-4 p-0">
                                <input type="text" class="form-control date-input text-input" readonly value="' . $sl_earned . '">
                            </div>
                            <div class="col-lg-4 col-sm-4 col-4 p-0">
                                <input type="text" class="form-control date-input text-input" readonly value="' . $sl_days . '" >
                            </div>
                            <div class="col-lg-4 col-sm-4 col-4 p-0">
                                <input type="text" class="form-control date-input text-input" readonly value="' . $sl_balance . '" >
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-1 col-sm-1 col-1">
                        <input type="text" class="form-control date-input text-input " readonly value="' . $spl_days . '">
                    </div>

                    <div class="col-lg-1 col-sm-1 col-1">
                        <input type="text" class="form-control date-input text-input " readonly value="' . $fl_days . '">
                    </div>

                    <div class="col-lg-1 col-sm-1 col-1">
                        <input type="text" class="form-control date-input text-input " readonly value="' . $lwp_days . '">
                    </div>

                    <div class="col-lg-3 col-sm-3 col-3">

                    <div class="d-flex flex-row">

                        <div class="col-lg-6 col-sm-6 col-6 p-0">
                            <input type="number" min="1" max="8" step="1" value="'.$hour_value.'" class="form-control text-input date-input"  id="hour_'.$mon."_".$year.'" onkeypress="get_hour(this)" '.$readonly.'/>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-6 p-0">
                            <input type="number" min="1" max="60" step="1" value="'.$minute_value.'" class="form-control text-input date-input" id="minute_'.$mon."_".$year.'" onkeypress="get_minute(this)" '.$readonly.' />
                        </div>

                    </div>

                </div>

                </div>
            </div>';
        }
    }
}

$output .= '</div>';
echo $output;
