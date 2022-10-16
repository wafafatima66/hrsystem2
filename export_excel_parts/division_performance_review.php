<?php 

$dept = $_GET["dept"];
$rating_period = $_GET["rating_period"];
$year = date('Y');
$k = 9;
$i = 0;

$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$spreadsheet = $reader->load('../export_excel_parts/division_performance_review.xlsx');

$all_borders = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$border_top = [
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ]
];

$bold = [
    'font' => [
        'bold' => true,
    ]
];

if ($rating_period == 1) {
    $spreadsheet->getActiveSheet()->setCellValue("A5", "Rating Period : JANUARY TO JUNE " . $year);

} else if ($rating_period == 2) {
    $spreadsheet->getActiveSheet()->setCellValue("A5", "Rating Period : JULY TO DECEMBER " . $year);

}

$spreadsheet->getActiveSheet()->setCellValue("A7", "Division:".$dept);

$query3 = "SELECT  i.division , i.area_wrk_assign , i.position ,  e.emp_first_name , e.emp_middle_name , e.emp_last_name , e.emp_ext , e.id ,  p.*  FROM employee e left join item i on i.emp_id = e.emp_id left join emp_performance p on e.emp_id = p.emp_id where i.division = '$dept' and p.rating_period = '$rating_period'";

$runquery3 = $conn->query($query3);
$rowcount3 = mysqli_num_rows($runquery3);
if ($rowcount3 != 0) {

    // $k = 9 ; 
    while ($mydata3 = $runquery3->fetch_assoc()) {

        $k += 1;
        $i += 1;

        $emp_full_name =  $mydata3['emp_first_name'] . $mydata3['emp_middle_name'] . $mydata3['emp_last_name'] . $mydata3['emp_ext'];

        if (empty($mydata3["rating"])) {
            $adjectival_rating =  "";
        } else if ($mydata3["rating"] <= 1) {
            $adjectival_rating =  "Poor";
        } else  if ($mydata3["rating"] <= 2) {
            $adjectival_rating = "Not Satisfactory";
        } else  if ($mydata3["rating"] <= 3) {
            $adjectival_rating = " Satisfactory";
        } else  if ($mydata3["rating"] <= 4) {
            $adjectival_rating = "Very Satisfactory";
        } else  if ($mydata3["rating"] <= 5) {
            $adjectival_rating = "Outstanding";
        } else {
            $adjectival_rating = "Good Work";
        }

        $spreadsheet->getActiveSheet()->setCellValue("A" . $k, $i);
        $spreadsheet->getActiveSheet()->setCellValue("B" . $k, $emp_full_name);
        $spreadsheet->getActiveSheet()->setCellValue("C" . $k, $mydata3['position']);
        $spreadsheet->getActiveSheet()->setCellValue("D" . $k, $mydata3['area_wrk_assign']);
        $spreadsheet->getActiveSheet()->setCellValue("E" . $k, $mydata3['rating']);
        $spreadsheet->getActiveSheet()->setCellValue("G" . $k, $adjectival_rating);

        $spreadsheet->getActiveSheet()->getRowDimension($k)->setRowHeight(40);
    }
}

else if($rowcount3 == 0 ){
    $k = 15 ; 
}



foreach (range('A', 'J') as $columnID) {
    $spreadsheet->getActiveSheet()->getStyle($columnID)
        ->getAlignment()->setWrapText(true);
}


$spreadsheet->getActiveSheet()->getStyle("A10:J" . $k)->applyFromArray($all_borders);

if($k < 15 ){
    $k = 15 ; 
}


$k+=2 ; 

$spreadsheet->getActiveSheet()->setCellValue("B" . $k, 'Prepared:');
$spreadsheet->getActiveSheet()->mergeCells("C" .$k+3 .":D" .$k+3);
$spreadsheet->getActiveSheet()->setCellValue("C" . $k+3, 'Division Secretary');
$spreadsheet->getActiveSheet()->getStyle("C" . $k + 3)->applyFromArray($bold);
$spreadsheet->getActiveSheet()->getStyle("C" .$k+3 .":D" .$k+3)->applyFromArray($border_top);

$spreadsheet->getActiveSheet()->setCellValue("G" . $k, 'Noted by:');
$spreadsheet->getActiveSheet()->mergeCells("H" .$k+3 .":I" .$k+3);
$spreadsheet->getActiveSheet()->setCellValue("H" . $k + 3, 'Division Head ');
$spreadsheet->getActiveSheet()->getStyle("H" . $k + 3)->applyFromArray($bold);
$spreadsheet->getActiveSheet()->getStyle("H" .$k+3 .":I" .$k+3)->applyFromArray($border_top);

$a= $k+5 ; 
$spreadsheet->getActiveSheet()->getStyle("A".$k. ":J" . $a)
        ->getAlignment()->setWrapText(false);

$fileName = "consolidated_performance_review- " . $year . ".xlsx"; //date('d/m/Y')

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment ; filename=' . $fileName);
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
die;
