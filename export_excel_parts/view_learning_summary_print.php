<?php

$emp_id =  $_GET["view_learning_summary_print"];
$year = date('Y');
$k = 17;
// echo $emp_id;
// die ; 


$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$spreadsheet = $reader->load('../export_excel_parts/view_learning_summary_print.xlsx');

$bold = [
    'font' => [
        'bold' => true,
    ]
];

$all_borders = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$query= "SELECT concat(e.emp_first_name , e.emp_middle_name, e.emp_last_name) as emp_full_name , i.position , i.area_wrk_assign
    from  employee e  
    join item i on e.emp_id = i.emp_id  
    where e.emp_id = '$emp_id'";

$runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);

    if ($rowcount != 0) {

        while ($mydata = $runquery->fetch_assoc()) {

            $spreadsheet->getActiveSheet()->setCellValue("B9", $emp_id);
            $spreadsheet->getActiveSheet()->setCellValue("B10", $mydata['emp_full_name']);
            $spreadsheet->getActiveSheet()->setCellValue("B11", $mydata['position']);
            $spreadsheet->getActiveSheet()->setCellValue("B12", $mydata['area_wrk_assign']);

        }
    }
 
$query1 = "SELECT t.* , concat(e.emp_first_name , e.emp_middle_name, e.emp_last_name) as emp_full_name , i.position , i.area_wrk_assign
    from emp_training t 
    join employee e on e.emp_id = t.emp_id  
    join item i on e.emp_id = i.emp_id  
    and t.learning_id is null and t.emp_id = '$emp_id'
   ";

$runquery1 = $conn->query($query1);
    $rowcount1 = mysqli_num_rows($runquery1);

    // echo $rowcount1;
    // die ; 

    if ($rowcount1 != 0) {

        while ($mydata1 = $runquery1->fetch_assoc()) {
            $k+=1 ; 
            // echo $mydata1['emp_full_name'];
            //  die ; 

            $leave_from = date("m/d/Y", strtotime($mydata1['training_from_date']));
            $leave_to = date("m/d/Y", strtotime($mydata1['training_to_date']));

        
            $spreadsheet->getActiveSheet()->setCellValue("A" . $k, $mydata1['title_of_training']);
            $spreadsheet->getActiveSheet()->setCellValue("C" . $k, $leave_from);
            $spreadsheet->getActiveSheet()->setCellValue("D" . $k, $leave_to);
            $spreadsheet->getActiveSheet()->setCellValue("E" . $k, $mydata1['training_no_of_hrs']);
            $spreadsheet->getActiveSheet()->setCellValue("F" . $k, $mydata1['training_conducted_by']);
            $spreadsheet->getActiveSheet()->setCellValue("H" . $k, $mydata1['training_type_of_position']);

        }
    
    }

    $spreadsheet->getActiveSheet()->getStyle("A17:H" . $k)->applyFromArray($all_borders);

    if($k < 34){
        $k = 34 ; 
    }

    $k+=3 ; 

    $spreadsheet->getActiveSheet()->setCellValue("A" . $k, 'Prepared by:');
    $spreadsheet->getActiveSheet()->setCellValue("C" . $k, 'Noted by:');

    $k+=2 ; 

    $spreadsheet->getActiveSheet()->setCellValue("A" . $k, 'KHAREEN A. GARRINO');
    $spreadsheet->getActiveSheet()->getStyle("A" . $k)->applyFromArray($bold);
    $spreadsheet->getActiveSheet()->setCellValue("C" . $k, 'PAMELA C. PAKIPAC, RND, MPA');
    $spreadsheet->getActiveSheet()->getStyle("C" . $k)->applyFromArray($bold);

    $k+=1 ;
    $spreadsheet->getActiveSheet()->setCellValue("A" . $k, 'Administrative Officer II');
    $spreadsheet->getActiveSheet()->setCellValue("C" . $k, 'Administrative Officer V');
    $spreadsheet->getActiveSheet()->setCellValue("C" . $k+1, 'Head, Human Resource Management Office');

    // $spreadsheet->getActiveSheet()->mergeCells("A" .$k.":C" .$k);
    $spreadsheet->getActiveSheet()->getStyle("A" . $k)->applyFromArray($bold);

$fileName = "view_learning_summary_print- " . $year . ".xlsx"; //date('d/m/Y')

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment ; filename=' . $fileName);
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
die;