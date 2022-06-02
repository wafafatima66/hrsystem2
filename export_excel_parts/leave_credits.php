<?php 

$year =  $_GET["leave_credits"];
$emp_id = $_GET["emp_id"];

$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$spreadsheet = $reader->load('../export_excel_parts/leave_credits.xlsx');

$spreadsheet->getActiveSheet()->setCellValue("B2", "LEAVE CREDITS OF ".$year);
$spreadsheet->getActiveSheet()->setCellValue("B4", "EMPLOYEE ID : ".$emp_id);

            $k = 8 ; 

        for ($i = 0; $i < 12; $i++) {

             $j = $i+1;
             $k += 2; 
    

            $query = "SELECT vl_pts_$j , sl_pts_$j FROM leave_credits_result WHERE  emp_id = '$emp_id' and year = '$year'" ;
    
            $runquery = $conn->query($query);
            $rowcount = mysqli_num_rows($runquery);
            if ($rowcount != 0) {

                while ($mydata = $runquery->fetch_assoc()) {
                $vl_pts = $mydata["vl_pts_$j"];
                $sl_pts = $mydata["sl_pts_$j"];

            $spreadsheet->getActiveSheet()->setCellValue("D". $k, $vl_pts);
            $spreadsheet->getActiveSheet()->setCellValue("F". $k, $sl_pts);
            // $spreadsheet->getActiveSheet()->setCellValue("H". $k, $spl_date_diff);
            // $spreadsheet->getActiveSheet()->setCellValue("J". $k, $man_date_diff);
            // $spreadsheet->getActiveSheet()->setCellValue("L". $k, $lwp_date_diff);

        }
    }


    $query2 = "select sum(vacation_leave) as vl_days , sum(sick_leave) as sl_days, sum(spl) as spl_days , sum(force_leave) as fl_days , sum(lwp) as lwp_days from leave_credits where emp_id = '$emp_id' and mon = $j and year = $year and  final_status = 1";


    $runquery2 = $conn->query($query2);
    $rowcount2 = mysqli_num_rows($runquery2);
    if ($rowcount2 != 0) {

        while ($mydata2 = $runquery2->fetch_assoc()) {

            $spl_days = ($mydata2["spl_days"] == '' ? '0' : $mydata2["spl_days"]);
            $fl_days = ($mydata2["fl_days"] == '' ? '0' : $mydata2["fl_days"]);
            $lwp_days = ($mydata2["lwp_days"] == '' ? '0' : $mydata2["lwp_days"]);

            $spreadsheet->getActiveSheet()->setCellValue("H". $k, $spl_days);
            $spreadsheet->getActiveSheet()->setCellValue("J". $k, $fl_days);
            $spreadsheet->getActiveSheet()->setCellValue("L". $k, $lwp_days);

        }}

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

            $spreadsheet->getActiveSheet()->setCellValue("N". $k, $hour_value);
            $spreadsheet->getActiveSheet()->setCellValue("O". $k, $minute_value);

    }
$fileName = "Leave-credits- " .$emp_id . $year . ".xlsx"; //date('d/m/Y')

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment ; filename=' . $fileName);
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
die;

?>