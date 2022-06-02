<?php 

$year =  $_GET["leave_credits"];
$emp_id = $_GET["emp_id"];

$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$spreadsheet = $reader->load('../export_excel_parts/leave_credits.xlsx');

$spreadsheet->getActiveSheet()->setCellValue("B2", "LEAVE CREDITS OF ".$year);
$spreadsheet->getActiveSheet()->setCellValue("B4", "EMPLOYEE ID : ".$emp_id);

            $k = 6 ; 

        for ($i = 0; $i < 12; $i++) {

             $j = $i+1;
             $k += 2; 
    
            // $query = "select sum(vacation_leave) as vl_days , sum(sick_leave) as sl_days, sum(spl) as spl_days , sum(force_leave) as fl_days , sum(lwp) as lwp_days from leave_credits where emp_id = '$emp_id' and mon = $j and year = $year  and final_status = 1";


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
            }else {
                    $vac_date_diff = '';
                    $sick_date_diff = '';
                    $spl_date_diff = '';
                    $man_date_diff = '';
                    $lwp_date_diff = '';
            }

            $spreadsheet->getActiveSheet()->setCellValue("D". $k, $vac_date_diff);
            $spreadsheet->getActiveSheet()->setCellValue("F". $k, $sick_date_diff);
            $spreadsheet->getActiveSheet()->setCellValue("H". $k, $spl_date_diff);
            $spreadsheet->getActiveSheet()->setCellValue("J". $k, $man_date_diff);
            $spreadsheet->getActiveSheet()->setCellValue("L". $k, $lwp_date_diff);

        }

$fileName = "Leave-credits- " .$emp_id . $year . ".xlsx"; //date('d/m/Y')

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment ; filename=' . $fileName);
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
die;

?>