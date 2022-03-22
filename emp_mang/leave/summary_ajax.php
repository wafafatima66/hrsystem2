<?php

require '../../includes/conn.php';


$year = '';
$emp_id = '';

if (isset($_POST['date'])) {
	$year = $_POST['date'];
} else {
	$year = date("Y") ;
}

if (isset($_POST['emp_id'])) {
	$emp_id = $_POST['emp_id'];
} else {
	$emp_id = "";
}


$output = '';


$output .= '
<div class="container">

    <div class="row">


        <div class="col-lg-1 col-sm-1"> </div>

        <div class="col-lg-11 col-sm-11">

            <div class="form-inline">

                <div class="col-lg-2 col-sm-2 ">
                    <label for="" class="responsive-label">VACATION LEAVE</label>
                </div>

                <div class="col-lg-2 col-sm-2 ">
                    <label for="" class="responsive-label">SICK LEAVE</label>
                </div>

                <div class="col-lg-2 col-sm-2 ">
                    <label for="" class="responsive-label">SPECIAL PRIVILEGE LEAVE</label>
                </div>

                <div class="col-lg-2 col-sm-2 ">
                    <label for="" class="responsive-label">MANTATORY/FORCED LEAVE</label>
                </div>

                <div class="col-lg-2 col-sm-2 ">
                    <label for="" class="responsive-label">LEAVE WITHOUT PAY</label>
                </div>

            </div>
        </div>

    </div>

    <div class="row">';

       
                          
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

            $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

            for ($i = 0; $i < 12; $i++) {

    
    $j = $i+1;
    

    $query = "select sum(vacation_leave) as vl_days , sum(sick_leave) as sl_days, sum(spl) as spl_days , sum(force_leave) as fl_days , sum(lwp) as lwp_days from leave_credits where emp_id = '$emp_id' and mon = $j and year = $year  and final_status = 1";


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

           

        $output .= '<div class="col-lg-1 col-sm-1">
            <label for="" class="mr-2 date-input">'. $array[$i] .'</label>
        </div>

        <div class="col-lg-11 col-sm-11">

            <div class="form-inline">

                <div class="col-lg-2 col-sm-2 form-inline p-1 ">
                    <!-- <input type="text" class="form-control text-input date-input" value="<?php echo $vac_leave_dates ?>" style="width: 60%;"> -->
                    <input type="text" class="form-control text-input date-input" value="'.$vac_date_diff .'"
                        style="width: 60%;" readonly>
                    <input type="text" class="form-control text-input date-input" value="days" style="width: 40%;" readonly>
                </div>

                <div class="col-lg-2 col-sm-2 form-inline p-1">
                    <!-- <input type="text" class="form-control text-input date-input" value="<?php echo $sick_leave_dates ?>" style="width: 60%;"> -->
                    <input type="text" class="form-control text-input date-input" value="'. $sick_date_diff .'"
                        style="width: 60%;" readonly>
                    <input type="text" class="form-control text-input date-input" value="days" style="width: 40%;" readonly>
                </div>

                <div class="col-lg-2 col-sm-2 form-inline p-1">
                    <!-- <input type="text" class="form-control text-input date-input" value="<?php echo $spl_leave_dates ?>" style="width: 60%;"> -->
                    <input type="text" class="form-control text-input date-input" value="'. $spl_date_diff .'"
                        style="width: 60%;" readonly>
                    <input type="text" class="form-control text-input date-input" value="days" style="width: 40%;" readonly>
                </div>

                <div class="col-lg-2 col-sm-2 form-inline p-1">
                    <!-- <input type="text" class="form-control text-input date-input" value="<?php echo $man_leave_dates ?>" style="width: 60%;"> -->
                    <input type="text" class="form-control text-input date-input" value="'. $man_date_diff .'"
                        style="width: 60%;" readonly>
                    <input type="text" class="form-control text-input date-input" value="days" style="width: 40%;" readonly>
                </div>

                <div class="col-lg-2 col-sm-2 form-inline p-1">
                    <!-- <input type="text" class="form-control text-input date-input" value="<?php echo $lwp_leave_dates ?>" style="width: 60%;"> -->
                    <input type="text" class="form-control text-input date-input" value="'. $lwp_date_diff .'"
                        style="width: 60%;" readonly>
                    <input type="text" class="form-control text-input date-input" value="days" style="width: 40%;" readonly>
                </div>

            </div>

        </div>';


            } 

    $output .= '</div>
</div>';
echo $output;
?>