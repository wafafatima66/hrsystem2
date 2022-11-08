<?php 
$year = date('Y');
$month = date('F');
$k = 4;
$i = 0;



$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$spreadsheet = $reader->load('../export_excel_parts/dob_over_age.xlsx');

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

$query = "SELECT concat(emp_first_name , emp_middle_name ,emp_last_name ) as emp_full_name , emp_dob from employee where emp_dob is not null and emp_dob != ''";

$runquery = $conn->query($query);
$rowcount = mysqli_num_rows($runquery);

if ($rowcount != 0) {

  while ($mydata = $runquery->fetch_assoc()) {

    $k += 1;
    $dob = date('m/d/Y',strtotime($mydata['emp_dob']));
    $birth_year = date('Y',strtotime($mydata['emp_dob']));
    $age = $year - $birth_year ; 
    $spreadsheet->getActiveSheet()->setCellValue("A" . $k, $mydata['emp_full_name']);
    $spreadsheet->getActiveSheet()->setCellValue("B" . $k, $dob);
    $spreadsheet->getActiveSheet()->setCellValue("C" . $k, $year);
    $spreadsheet->getActiveSheet()->setCellValue("D" . $k, $birth_year);
    $spreadsheet->getActiveSheet()->setCellValue("E" . $k, $age);

  }
}




$fileName = "dob_over_age-" . $month . "-" . $year . ".xlsx"; //date('d/m/Y')

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment ; filename=' . $fileName);
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
die;




?> 