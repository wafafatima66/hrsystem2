<?php 

$year = date('Y');
$month = date('F');
$k = 6;
$i = 0;
$total_count = 0 ; 
$total_male_count = 0; 
$total_female_count =  0; 


$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$spreadsheet = $reader->load('../export_excel_parts/summary_of_position.xlsx');

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

$spreadsheet->getActiveSheet()->setCellValue("A3", 'SUMMARY OF POSITIONS (As of '.$month. ','. $year .')' );



$query = "SELECT position, count(*) as position_count FROM item where position is not null GROUP BY position";

$runquery = $conn->query($query);
$rowcount = mysqli_num_rows($runquery);



if ($rowcount != 0) {

   

  while ($mydata = $runquery->fetch_assoc()) {

    $male_count = 0 ; 
    $female_count = 0 ;

    $k += 1;

    $position = $mydata['position'];
    $position_count = $mydata['position_count'];
    $total_count +=  $position_count; 

        $gender_count_query = "SELECT e.emp_gender from item i join employee e on i.emp_id = e.emp_id where i.position = '$position' ";

            $runquery1 = $conn->query($gender_count_query);
            $rowcount1 = mysqli_num_rows($runquery1);

            if ($rowcount1 != 0) {

            while ($mydata1 = $runquery1->fetch_assoc()) {

                if($mydata1['emp_gender'] == 'Male') {
                    $male_count += 1 ;  
                }
                
                else if($mydata1['emp_gender'] == 'Female') {
                    $female_count += 1 ;  
                }

            }
        }

        $total_male_count +=  $male_count; 
        $total_female_count +=  $female_count; 

    $spreadsheet->getActiveSheet()->setCellValue("A" . $k, $position);
    $spreadsheet->getActiveSheet()->setCellValue("B" . $k, $position_count);
    $spreadsheet->getActiveSheet()->setCellValue("C" . $k, $male_count);
    $spreadsheet->getActiveSheet()->setCellValue("D" . $k, $female_count);

  }
}

$spreadsheet->getActiveSheet()->getStyle("A7:D" . $k)->applyFromArray($all_borders);

$k+=2 ; 

$spreadsheet->getActiveSheet()->getStyle("A" . $k)->applyFromArray($bold);
$spreadsheet->getActiveSheet()->getStyle("B" . $k)->applyFromArray($bold);
$spreadsheet->getActiveSheet()->getStyle("C" . $k)->applyFromArray($bold);
$spreadsheet->getActiveSheet()->getStyle("D" . $k)->applyFromArray($bold);

$spreadsheet->getActiveSheet()->setCellValue("A" . $k, 'TOTAL');

$spreadsheet->getActiveSheet()->setCellValue("B" . $k, $total_count);
$spreadsheet->getActiveSheet()->setCellValue("C" . $k, $total_male_count);
$spreadsheet->getActiveSheet()->setCellValue("D" . $k, $total_female_count);


$fileName = "summary_of_position-" . $month . "-" . $year . ".xlsx"; //date('d/m/Y')

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment ; filename=' . $fileName);
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
die;

?>