<?php
require '../../includes/conn.php';

$last_year = '';
$year = '';
$emp_id = '';

if (isset($_POST['date'])) {
	$last_year = $_POST['date']-1;
} else {
	$last_year = date("Y") - 1;
}

if (isset($_POST['emp_id'])) {
	$emp_id = $_POST['emp_id'];
} else {
	$emp_id = "";
}


$output = '';

$output.='<div class="d-flex flex-column pb-4">';

       
        // if (!empty($_COOKIE["inputDate"])) {
        //     $last_year = $_COOKIE['inputDate']-1;
        // }else {
        //     $last_year = date("Y") - 1; 
        //     //finding last year
        // }
        
        // echo $last_year;

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
                $vl_pts = 15.0;
                $sl_pts = 15.0;
                if (isset($_POST['date'])) {
                    $year = $_POST['date']-1;
                }else {
                    $year = date("Y")-1;
                }
                // $year = date("Y") - 1;
            }
        }
        $total_pts = $vl_pts + $sl_pts;
        
       $output .=' <p class="text-center">BALANCE FORWARDED AS OF <span style="font-style:italic;">12/31/'. $year .'</span></p> 
       
       <div class="d-flex align-items-center justify-content-center">

            <input type="hidden" name="leave_emp_id" value="'. $emp_id .'" id="leave_emp_id">

            <div class="d-flex flex-column" style=" border-right: 1px solid #000; padding:0 20px ">
                <input type="text" size="1" class="text-center h4 pts" style="background: none;
                    border: none; " value="'. $vl_pts .'" name="vl_pts" id="vl_pts">
                <span class="text-center">VL</span>
            </div>

            <div class="d-flex flex-column" style=" border-right: 1px solid #000; padding:0 20px ">
                <input type="text" size="1" class="text-center h4 pts" style="background: none;
                    border: none; " value="'. $sl_pts .'" name="sl_pts" id="sl_pts">
                <span class="text-center">SL</span>
            </div>

            <div class="d-flex flex-column" style=" border-right: 1px solid #000; padding:0 20px ">
                <input type="text" size="1" class="text-center h4" style="background: none;
                    border: none; " value="'. $total_pts .'">
                <span class="text-center">Total</span>
            </div>


        </div>

        <div class="container">
            <div class="text-center">
                <input type="submit" class="btn m-3 button-1" name="upgrade" value="Update" id="update_year">
            </div>
        </div>

        <!-- </form> -->

    </div>

    <div class="row">

        <div class="col-lg-1 col-sm-1 col-1"></div>

        <div class="col-lg-11 col-sm-11 col-11">
            <div class="form-inline ">

                <div class="col-lg-3 col-sm-3 col-3 ">
                    <label for="" style="color:#54A04B; " class="responsive-label date-input">VACATION LEAVE</label>
                </div>

                <div class="col-lg-3 col-sm-3 col-3">
                    <label for="" style="color:#54A04B;  " class="responsive-label date-input">SICK LEAVE</label>
                </div>

                <div class="col-lg-2 col-sm-2 col-2">
                    <label for="" style="color:#54A04B; " class="responsive-label date-input">SPL</label>
                </div>

                <div class="col-lg-2 col-sm-2 col-2">
                    <label for="" style="color:#54A04B; " class="responsive-label date-input">FORCE LEAVE</label>
                </div>

                <div class="col-lg-2 col-sm-2 col-2">
                    <label for="" style="color:#54A04B;  " class="responsive-label date-input">LEAVE WITHOUT PAY</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row" >';

$array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");


for ($i = 0; $i < 12; $i++) {



   $output .=' <div class="col-lg-1 col-sm-1 col-1">
        <label for="" class="mr-2 date-input">'. $array[$i] .'</label>
    </div> ' ;


     $j = $i + 1;

        // if (!empty($_COOKIE["inputDate"])) {
        //     $year = $_COOKIE['inputDate'];
        // }else {
        //     $year = date("Y");
        // }
             
        if (isset($_POST['date'])) {
            $year = $_POST['date'];
        }else {
            $year = date("Y");
        }

        
    $query = "select sum(vacation_leave) as vl_days , sum(sick_leave) as sl_days, sum(spl) as spl_days , sum(force_leave) as fl_days , sum(lwp) as lwp_days from leave_credits where emp_id = '$emp_id' and mon = $j and year = $year and status = 1 and final_status = 1";


    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount != 0) {

        while ($mydata = $runquery->fetch_assoc()) {

            $spl_days = ($mydata["spl_days"] == '' ? '0' : $mydata["spl_days"]);
            $fl_days = ($mydata["fl_days"] == '' ? '0' : $mydata["fl_days"]);
            $lwp_days = ($mydata["lwp_days"] == '' ? '0' : $mydata["lwp_days"]);

            if (!empty($mydata["vl_days"]) && !empty($mydata["sl_days"])) {

                $vl_days = $mydata["vl_days"]; //getting vacation days
                $vl_pts =  $vl_pts - ($vl_days * 1);
                $sl_days = $mydata["sl_days"];
                $sl_pts =  $sl_pts - ($sl_days * 1);
            } else if (!empty($mydata["sl_days"])) {

                $sl_days = $mydata["sl_days"];
                $sl_pts =  $sl_pts - ($sl_days * 1);
                $vl_days = 1.25;
                $vl_pts =  $vl_pts + 1.25; //when no vc

            } else if (!empty($mydata["vl_days"])) {

                $vl_days = $mydata["vl_days"]; //getting vacation days
                $vl_pts =  $vl_pts - ($vl_days * 1);
                $sl_days = 1.25;
                $sl_pts =  $sl_pts + 1.25; //when no sick leaves 

            } else {

                $vl_days = 1.25; //when no leave has taken 
                $vl_pts =  $vl_pts + 1.25;
                $sl_days = 1.25; //when no leave has taken 
                $sl_pts =  $sl_pts + 1.25;
            }


            //for fetching the information into leave form 
            $mon = $i + 1; //getting month number
            $sql_3 = "INSERT INTO leave_credits_result (vl_pts_$mon, sl_pts_$mon, year , emp_id) VALUES('$vl_pts', '$sl_pts' , '$year','$emp_id') 
            ON DUPLICATE KEY UPDATE    
            vl_pts_$mon='$vl_pts' , 
            sl_pts_$mon='$sl_pts' ";
            // $sql_3 = "UPDATE leave_credits_result SET vl_pts_$mon = '$vl_pts' ,sl_pts_$mon = '$sl_pts' WHERE emp_id = '$emp_id' and year = '$year' ; ";
            mysqli_query($conn, $sql_3);

    

           $output .= ' <div class="col-lg-11 col-sm-11 col-11">

                <div class="form-row mt-2">

                    <div class="col-lg-3 col-sm-3 col-3 form-inline">
                        <input type="text" class="form-control date-input text-input " readonly value="'. $vl_days .'" style="width:50%" id="vl_days_">
                        <input type="text" class="form-control date-input text-input " readonly value="'. $vl_pts .'" style="width:50%">
                    </div>


                    <div class="col-lg-3 col-sm-3 col-3 form-inline">
                        <input type="text" class="form-control date-input text-input" readonly value="'. $sl_days .'" style="width:50%">

                        <input type="text" class="form-control date-input text-input" readonly value="'. $sl_pts .'" style="width:50%">
                    </div>

                    <div class="col-lg-2 col-sm-2 col-2">
                        <input type="text" class="form-control date-input text-input " readonly value="'. $spl_days .'">
                    </div>

                    <div class="col-lg-2 col-sm-2 col-2">
                        <input type="text" class="form-control date-input text-input " readonly value="'. $fl_days.'">
                    </div>

                    <div class="col-lg-2 col-sm-2 col-2">
                        <input type="text" class="form-control date-input text-input " readonly value="'. $lwp_days .'">
                    </div>
                </div>
            </div>';




        }
    }
}

$output.='</div>';
echo $output;

?>