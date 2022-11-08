<?php
$date =  $_GET["date_to_print"]; //2022-10

$datearray = explode('-', $date);

$search_month = $datearray[1];
$search_year = $datearray[0];

$k = 9;
$a = 1;


$dateObj   = DateTime::createFromFormat('!m', $search_month);
$monthName = $dateObj->format('F'); // March

$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$spreadsheet = $reader->load('../export_excel_parts/monthly_learning_development_database.xlsx');

$border_top = [
  'borders' => [
    'top' => [
      'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    ],
  ]
];

$all_borders = [
  'borders' => [
      'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
      ],
  ],
];

$bold = [
    'font' => [
        'bold' => true,
    ]
];

$spreadsheet->getActiveSheet()->setCellValue("A5", $monthName);
$spreadsheet->getActiveSheet()->setCellValue("B5", $search_year);


$query = "SELECT e.emp_id , concat(e.emp_first_name , e.emp_middle_name , e.emp_last_name ) as emp_full_name , e.emp_gender , e.emp_dob , e.emp_civil_status , p.title_of_training ,p.from_date , p.to_date , p.no_of_hrs , p.no_of_days , p.registration_fee , i.area_wrk_assign , i.position from employee e join emp_training t on e.emp_id = t.emp_id join item i on e.emp_id = i.emp_id join training_table p on t.learning_id = p.id where YEAR(p.from_date) = ".$search_year." AND MONTH(p.from_date) = ".$search_month." and t.learning_id is not null";

$runquery = $conn->query($query);
$rowcount = mysqli_num_rows($runquery);

if ($rowcount != 0) {

  while ($mydata = $runquery->fetch_assoc()) {

        $leave_from = date("m/d/Y", strtotime($mydata['from_date']));
		$leave_to = date("m/d/Y", strtotime($mydata['to_date']));
        $inclusive_dates = $leave_from.'-'.$leave_to ;

        $spreadsheet->getActiveSheet()->setCellValue("A" . $k, $mydata['emp_id']);
        $spreadsheet->getActiveSheet()->setCellValue("B" . $k, $mydata['emp_full_name']);
        $spreadsheet->getActiveSheet()->setCellValue("C" . $k, $mydata['position']);
        $spreadsheet->getActiveSheet()->setCellValue("D" . $k, $mydata['area_wrk_assign']);
        $spreadsheet->getActiveSheet()->setCellValue("E" . $k, $mydata['emp_gender']);
        $spreadsheet->getActiveSheet()->setCellValue("E" . $k, $mydata['emp_dob']);
        $spreadsheet->getActiveSheet()->setCellValue("I" . $k, $mydata['emp_civil_status']);
        $spreadsheet->getActiveSheet()->setCellValue("M" . $k, $mydata['title_of_training']);
        $spreadsheet->getActiveSheet()->setCellValue("N" . $k, $leave_from);
        $spreadsheet->getActiveSheet()->setCellValue("O" . $k, $leave_to);
        $spreadsheet->getActiveSheet()->setCellValue("P" . $k, $mydata['no_of_days']);
        $spreadsheet->getActiveSheet()->setCellValue("Q" . $k, $mydata['no_of_hrs']);
        $spreadsheet->getActiveSheet()->setCellValue("R" . $k, $mydata['registration_fee']);
		
        
            $spreadsheet->getActiveSheet()
                  ->getStyle("A" . $k. ":R" . $k)
                  ->applyFromArray($all_borders);
      
                  $spreadsheet->getActiveSheet()->getRowDimension($k)->setRowHeight(35);


        $k += 1;

  }
}



$k+=2 ; 

$spreadsheet->getActiveSheet()->setCellValue("A" . $k, 'Prepared by:');
$spreadsheet->getActiveSheet()->setCellValue("G" . $k, 'Noted by:');

$k+=2 ; 

$spreadsheet->getActiveSheet()->mergeCells("A" .$k.":B" .$k);
$spreadsheet->getActiveSheet()->setCellValue("A" . $k, 'KHAREEN A. GARRINO');
$spreadsheet->getActiveSheet()->getStyle("A" . $k)->applyFromArray($bold);

$spreadsheet->getActiveSheet()->mergeCells("G" .$k.":J" .$k);
$spreadsheet->getActiveSheet()->setCellValue("G" . $k, 'PAMELA C. PAKIPAC, RND, MPA');
$spreadsheet->getActiveSheet()->getStyle("G" . $k)->applyFromArray($bold);

$k+=1 ;

$spreadsheet->getActiveSheet()->mergeCells("A" .$k.":B" .$k);
$spreadsheet->getActiveSheet()->setCellValue("A" . $k, 'Administrative Officer II');

$spreadsheet->getActiveSheet()->mergeCells("G" .$k.":J" .$k);
$spreadsheet->getActiveSheet()->setCellValue("G" . $k, 'Administrative Officer V');

$k+=1 ;
$spreadsheet->getActiveSheet()->mergeCells("G" .$k.":J" .$k);
$spreadsheet->getActiveSheet()->setCellValue("G" . $k, 'Head, Human Resource Management Office');



$fileName = "monthly_learning_development_database- " . $date . ".xlsx"; //date('d/m/Y')

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment ; filename=' . $fileName);
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
die;