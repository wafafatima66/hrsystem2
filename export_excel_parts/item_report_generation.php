<?php

$year = date('Y');
$month = date('F');
$k = 8;
$i = 0;

$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$spreadsheet = $reader->load('../export_excel_parts/item_report_generation.xlsx');

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

$spreadsheet->getActiveSheet()->setCellValue("A2", 'As of '.$month. ','. $year);

$query = "SELECT concat(e.emp_first_name , e.emp_middle_name, e.emp_last_name) as emp_full_name ,  e.emp_first_name , e.emp_middle_name, e.emp_last_name , e.emp_dob , e.emp_contact_tin , i.* from employee e join item i on e.emp_id = i.emp_id";

$runquery = $conn->query($query);
$rowcount = mysqli_num_rows($runquery);



if ($rowcount != 0) {

  while ($mydata = $runquery->fetch_assoc()) {
    $k += 1;
    $spreadsheet->getActiveSheet()->setCellValue("A" . $k, $mydata['item_no']);
    $spreadsheet->getActiveSheet()->setCellValue("D" . $k, $mydata['position']);
    $spreadsheet->getActiveSheet()->setCellValue("E" . $k, $mydata['salary_grade']);
    
    $spreadsheet->getActiveSheet()->setCellValue("R" . $k, $mydata['emp_last_name']);
    $spreadsheet->getActiveSheet()->setCellValue("S" . $k, $mydata['emp_first_name']);
    $spreadsheet->getActiveSheet()->setCellValue("T" . $k, $mydata['emp_last_name']);

    $spreadsheet->getActiveSheet()->setCellValue("U" . $k, $mydata['emp_full_name']);
    $spreadsheet->getActiveSheet()->setCellValue("AB" . $k, $mydata['emp_dob']);
    $spreadsheet->getActiveSheet()->setCellValue("AM" . $k, $mydata['emp_contact_tin']);
    $spreadsheet->getActiveSheet()->setCellValue("AN" . $k, $mydata['nature']);
    $spreadsheet->getActiveSheet()->setCellValue("AO" . $k, $mydata['date_orgappnt_other']);
    $spreadsheet->getActiveSheet()->setCellValue("AP" . $k, $mydata['date_orgappnt_lhmrh']);
    $spreadsheet->getActiveSheet()->setCellValue("AQ" . $k, $mydata['date_last_promotion']);
    $spreadsheet->getActiveSheet()->setCellValue("AR" . $k, $mydata['appt_stat']);
    $spreadsheet->getActiveSheet()->setCellValue("AT" . $k, $mydata['area_wrk_assign']);

  }

}

foreach (range('A', 'AW') as $columnID) {
    $spreadsheet->getActiveSheet()->getStyle($columnID)
        ->getAlignment()->setWrapText(true);
}


$spreadsheet->getActiveSheet()->getStyle("A8:AW" . $k)->applyFromArray($all_borders);

$fileName = "performance_summary_list-" . $month . "-" . $year . ".xlsx"; //date('d/m/Y')

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment ; filename=' . $fileName);
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
die;