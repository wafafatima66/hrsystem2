<?php

// $year =  $_GET["leave_summary"];
$id = $_GET["leave_application_report"];

$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$spreadsheet = $reader->load('../export_excel_parts/Leave-application-report.xlsx');


$query = "SELECT a.* ,  b.emp_first_name , b.emp_middle_name , b.emp_last_name , b.emp_ext , b.emp_image , u.role , i.area_wrk_assign , i.position , i.salary_grade , i.monthly_salary from emp_leaves a join employee b on a.emp_id = b.emp_id join users u on u.emp_id = a.emp_id join item i on i.emp_id = a.emp_id where a.id = '$id' ";


$runquery = $conn->query($query);
$rowcount = mysqli_num_rows($runquery);
if ($rowcount != 0) {

    while ($mydata = $runquery->fetch_assoc()) {

        $emp_name = $mydata['emp_last_name'] . " " . $mydata['emp_first_name'] . " " . $mydata['emp_middle_name'];

        $obj = json_decode($mydata['details_of_leave']);

        $details = '';
        $details1 = '';
        $details2 = '';

        if (isset($obj->details_of_leave_option)) {
            $details1 =  $obj->details_of_leave_option;
            $details2 = $obj->details_text;
        } else {
            $details = $mydata['details_of_leave'];
        }



        $leave_from_date_array = json_decode($mydata['leave_from_date']);
        $leave_to_date_array = json_decode($mydata['leave_to_date']);
        $lenght = count($leave_to_date_array) - 1;
        $leave_from_date = (date('m/d/Y', strtotime($leave_from_date_array[0])));
        $leave_to_date = (date('m/d/Y', strtotime($leave_to_date_array[$lenght])));

        $year = date("Y", strtotime($leave_to_date));
        $mon = date("n", strtotime($leave_to_date));
        // $emp_id = $mydate['$emp_id'];

        $leave_days = $leave_from_date . '-' . $leave_to_date;

        
        $salary = "P ". number_format($mydata['monthly_salary']);

        $spreadsheet->getActiveSheet()->setCellValue('B5', $mydata['area_wrk_assign']);
        $spreadsheet->getActiveSheet()->setCellValue('F5', $emp_name);
        $spreadsheet->getActiveSheet()->setCellValue('E6', $mydata['date_filled']);
        $spreadsheet->getActiveSheet()->setCellValue('G6', $mydata['position']);
        $spreadsheet->getActiveSheet()->setCellValue('K6', $salary);

        // LEFT COLUMN 

        if ($mydata['type_of_leave'] == 'Vacation leave') {
            $spreadsheet->getActiveSheet()->setCellValue('C11', '☑');
        } else {
            $spreadsheet->getActiveSheet()->setCellValue('C11', '☐');
        }

        if ($mydata['type_of_leave'] == 'Mandatory/Forced Leave') {
            $spreadsheet->getActiveSheet()->setCellValue('C13', '☑');
        } else {
            $spreadsheet->getActiveSheet()->setCellValue('C13', '☐');
        }

        if ($mydata['type_of_leave'] == 'Sick leave') {
            $spreadsheet->getActiveSheet()->setCellValue('C15', '☑');
        } else {
            $spreadsheet->getActiveSheet()->setCellValue('C15', '☐');
        }

        if ($mydata['type_of_leave'] == 'Maternity Leave') {
            $spreadsheet->getActiveSheet()->setCellValue('C17', '☑');
        } else {
            $spreadsheet->getActiveSheet()->setCellValue('C17', '☐');
        }

        if ($mydata['type_of_leave'] == 'Paternity Leave') {
            $spreadsheet->getActiveSheet()->setCellValue('C19', '☑');
        } else {
            $spreadsheet->getActiveSheet()->setCellValue('C19', '☐');
        }

        if ($mydata['type_of_leave'] == 'Special privilege leave') {
            $spreadsheet->getActiveSheet()->setCellValue('C21', '☑');
        } else {
            $spreadsheet->getActiveSheet()->setCellValue('C21', '☐');
        }

        if ($mydata['type_of_leave'] == 'Solo Parent Leave') {
            $spreadsheet->getActiveSheet()->setCellValue('C23', '☑');
        } else {
            $spreadsheet->getActiveSheet()->setCellValue('C23', '☐');
        }

        if ($mydata['type_of_leave'] == 'Study Leave') {
            $spreadsheet->getActiveSheet()->setCellValue('C25', '☑');
        } else {
            $spreadsheet->getActiveSheet()->setCellValue('C25', '☐');
        }

        if ($mydata['type_of_leave'] == '10-day VAWC Leave') {
            $spreadsheet->getActiveSheet()->setCellValue('C27', '☑');
        } else {
            $spreadsheet->getActiveSheet()->setCellValue('C27', '☐');
        }

        if ($mydata['type_of_leave'] == 'Rehabilitation Privilege') {
            $spreadsheet->getActiveSheet()->setCellValue('C29', '☑');
        } else {
            $spreadsheet->getActiveSheet()->setCellValue('C29', '☐');
        }

        if ($mydata['type_of_leave'] == 'Special Leave Benefits for Women') {
            $spreadsheet->getActiveSheet()->setCellValue('C31', '☑');
        } else {
            $spreadsheet->getActiveSheet()->setCellValue('C31', '☐');
        }

        if ($mydata['type_of_leave'] == 'Special Emergency Leave') {
            $spreadsheet->getActiveSheet()->setCellValue('C33', '☑');
        } else {
            $spreadsheet->getActiveSheet()->setCellValue('C33', '☐');
        }

        if ($mydata['type_of_leave'] == 'Adoption Leave') {
            $spreadsheet->getActiveSheet()->setCellValue('C35', '☑');
        } else {
            $spreadsheet->getActiveSheet()->setCellValue('C35', '☐');
        }

        if ($mydata['type_of_leave'] == 'Others') {
            $spreadsheet->getActiveSheet()->setCellValue('C41', $details);
        }

        // RIGHT COLUMN

        if ($mydata['type_of_leave'] == 'Vacation leave' || $mydata['type_of_leave'] == 'Special privilege leave') {

            if ($details1 == 'Within the Philippines') {
                $spreadsheet->getActiveSheet()->setCellValue('I13', '☑');
            } else {
                $spreadsheet->getActiveSheet()->setCellValue('I13', '☐');
            }

            if ($details1 == 'Abroad') {
                $spreadsheet->getActiveSheet()->setCellValue('I15', '☑');
            } else {
                $spreadsheet->getActiveSheet()->setCellValue('I15', '☐');
            }

            $spreadsheet->getActiveSheet()->setCellValue('K15', $details2);

        } else {
            $spreadsheet->getActiveSheet()->setCellValue('I13', '☐');
            $spreadsheet->getActiveSheet()->setCellValue('I15', '☐');
        }


        if ($mydata['type_of_leave'] == 'Sick leave') {
            if ($details1 == 'In Hospital') {
                $spreadsheet->getActiveSheet()->setCellValue('I19', '☑');
                $spreadsheet->getActiveSheet()->setCellValue('K19', $details2);
            } else {
                $spreadsheet->getActiveSheet()->setCellValue('I19', '☐');
                $spreadsheet->getActiveSheet()->setCellValue('K21', $details2);
            }

            if ($details1 == 'Out Patient') {
                $spreadsheet->getActiveSheet()->setCellValue('I21', '☑');
            } else {
                $spreadsheet->getActiveSheet()->setCellValue('I21', '☐');
            }
        } else {
            $spreadsheet->getActiveSheet()->setCellValue('I19', '☐');
            $spreadsheet->getActiveSheet()->setCellValue('I21', '☐');
        }


        if ($mydata['type_of_leave'] == 'Special Leave Benefits for Women') {
            $spreadsheet->getActiveSheet()->setCellValue('J27', $details2);
        }

        if ($mydata['type_of_leave'] == 'Study Leave') {

            if ($details1 == 'Completion of Master Degree') {
                $spreadsheet->getActiveSheet()->setCellValue('I33', '☑');
            } else {
                $spreadsheet->getActiveSheet()->setCellValue('I33', '☐');
            }

            if ($details1 == 'Bar/Board Exam Review') {
                $spreadsheet->getActiveSheet()->setCellValue('I35', '☑');
            } else {
                $spreadsheet->getActiveSheet()->setCellValue('I35', '☐');
            }
        } else {
            $spreadsheet->getActiveSheet()->setCellValue('I33', '☐');
            $spreadsheet->getActiveSheet()->setCellValue('I35', '☐');
        }

        $spreadsheet->getActiveSheet()->setCellValue('I39', '☐');
        $spreadsheet->getActiveSheet()->setCellValue('I41', '☐');
        $spreadsheet->getActiveSheet()->setCellValue('I45', '☐');
        $spreadsheet->getActiveSheet()->setCellValue('I47', '☐');
        $spreadsheet->getActiveSheet()->setCellValue('I53', '☐');
        $spreadsheet->getActiveSheet()->setCellValue('I55', '☐');

        // END OF RIGHT COLUMN 

        $spreadsheet->getActiveSheet()->setCellValue('F43', $mydata['no_of_working_days']);
        $spreadsheet->getActiveSheet()->setCellValue('D48', $leave_days);

        // CREDITS CALCULATION

        $today = date("Y/m/d");
        $spreadsheet->getActiveSheet()->setCellValue('E53', $today);

        $emp_id = $mydata['emp_id'];
        $type_of_leave = $mydata['type_of_leave'];
        $date_diff = $mydata['no_of_working_days'];

        $vl_now_pts = 0;
        $sl_now_pts = 0;

        if ($type_of_leave == "Vacation leave") {
            $vl_now_pts = $date_diff * 1;
        } else if ($type_of_leave == "Sick leave") {
            $sl_now_pts = $date_diff * 1;
        } else {
            $vl_now_pts = 0;
            $sl_now_pts = 0;
        }

        $total_pts_now =  $vl_now_pts + $sl_now_pts;


        $query1 = "SELECT vl_pts_$mon , sl_pts_$mon FROM leave_credits_result WHERE  emp_id = '$emp_id' and year = '$year'";

        $runquery1 = $conn->query($query1);
        if ($runquery1 == true) {


            while ($mydata1 = $runquery1->fetch_assoc()) {

                $vl_pts = $mydata1["vl_pts_$mon"];
                $sl_pts = $mydata1["sl_pts_$mon"];

                $pts_total = $vl_pts + $sl_pts;

                $vl_bal = $vl_pts -  $vl_now_pts;
                $sl_bal =  $sl_pts - $sl_now_pts;
                $total_bal = $vl_bal + $sl_bal;

                $spreadsheet->getActiveSheet()->setCellValue('E56', $vl_pts);
                $spreadsheet->getActiveSheet()->setCellValue('F56', $sl_pts);

                $spreadsheet->getActiveSheet()->setCellValue('E57', $vl_now_pts);
                $spreadsheet->getActiveSheet()->setCellValue('F57', $sl_now_pts);

                $spreadsheet->getActiveSheet()->setCellValue('E58', $vl_bal);
                $spreadsheet->getActiveSheet()->setCellValue('F58', $sl_bal);
            }
        }

        //    END OF COMPUTATION

        $spreadsheet->getActiveSheet()->setCellValue('C62', $mydata['no_of_working_days']);
        $spreadsheet->getActiveSheet()->setCellValue('C63', $mydata['lwp']);

    }
}

$fileName = "Leave-application-report- " . $id .  ".xlsx"; //date('d/m/Y')

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment ; filename=' . $fileName);
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
die;
