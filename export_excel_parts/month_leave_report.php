<?php
$date =  $_GET["date"]; //2022-10

$datearray = explode('-', $date);

$search_month = $datearray[1];
$search_year = $datearray[0];

$k = 10;
$a = 1;


$dateObj   = DateTime::createFromFormat('!m', $search_month);
$monthName = $dateObj->format('F'); // March

$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$spreadsheet = $reader->load('../export_excel_parts/month_leave_report.xlsx');

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

$spreadsheet->getActiveSheet()->setCellValue("A7", 'FOR THE MONTH OF '.$monthName.', '.$search_year.'');

$query = "SELECT a.id, a.emp_id , a.type_of_leave , a.details_of_leave , a.no_of_working_days, a.status , a.leave_from_date ,a.leave_to_date, a.lwp , a.final_remarks , b.emp_first_name , b.emp_middle_name , b.emp_last_name , b.emp_ext , b.emp_image , i.position , i.area_wrk_assign from emp_leaves a join employee b on a.emp_id = b.emp_id join item i on a.emp_id = i.emp_id where YEAR(a.from_date) = ".$search_year." AND MONTH(a.from_date) = ".$search_month." ORDER BY id DESC";

$runquery = $conn->query($query);
$rowcount = mysqli_num_rows($runquery);



if ($rowcount != 0) {

  while ($mydata = $runquery->fetch_assoc()) {

 
    if($mydata['status'] == '1'){
        $status = 'Approved';
    }else if($mydata['status'] == '2'){
        $status = 'Pending';
    }else if($mydata['status'] == '0'){
        $status = 'Disapproved';
    }else {
        $status = '';
    }

    $emp_name = strtoupper($mydata['emp_first_name'] . '' . $mydata['emp_middle_name'] . '' . $mydata['emp_last_name']);

    $leave_from_date_array = json_decode($mydata['leave_from_date']);
    $leave_to_date_array = json_decode($mydata['leave_to_date']);
    $lenght = count($leave_to_date_array)-1 ;
    $leave_from = (date('m/d/Y', strtotime($leave_from_date_array[0])));
    $leave_to = (date('m/d/Y', strtotime($leave_to_date_array[$lenght])));


    $spreadsheet->getActiveSheet()->setCellValue("A" . $k, $a);
    $spreadsheet->getActiveSheet()->setCellValue("B" . $k, $emp_name);
    $spreadsheet->getActiveSheet()->setCellValue("C" . $k, $mydata['position']);
    $spreadsheet->getActiveSheet()->setCellValue("D" . $k, $mydata['area_wrk_assign']);
    $spreadsheet->getActiveSheet()->setCellValue("E" . $k, $mydata['no_of_working_days']);
    $spreadsheet->getActiveSheet()->setCellValue("F" . $k, $mydata['lwp']);
    $spreadsheet->getActiveSheet()->setCellValue("G" . $k, $leave_from.' - '.$leave_to);
    $spreadsheet->getActiveSheet()->setCellValue("H" . $k, $mydata['type_of_leave']);
    $spreadsheet->getActiveSheet()->setCellValue("I" . $k, $status);
    $spreadsheet->getActiveSheet()->setCellValue("J" . $k, $mydata['final_remarks']);

    if($k > 24){
        $k_for_borders = $k+1 ; 
        $spreadsheet->getActiveSheet()
              ->getStyle("A" . $k. ":J" . $k)
              ->applyFromArray($all_borders);
  
              $spreadsheet->getActiveSheet()
              ->getStyle("A" . $k_for_borders. ":J" . $k_for_borders)
              ->applyFromArray($all_borders);
  
      }

    $k += 1;
    $a += 1; //increment

  }
}

if($k < 24 ){
    $k = 24 ; 
}

$k+=2 ; 

$spreadsheet->getActiveSheet()->setCellValue("B" . $k, 'Prepared by:');
$spreadsheet->getActiveSheet()->setCellValue("G" . $k, 'Noted by:');

$k+=2 ; 

  $spreadsheet->getActiveSheet()->mergeCells("G" .$k.":J" .$k);
$spreadsheet->getActiveSheet()->setCellValue("G" . $k, 'PAMELA C. PAKIPAC, RND, MPA');
$spreadsheet->getActiveSheet()->getStyle("G" . $k)->applyFromArray($bold);

$k+=1 ;
$spreadsheet->getActiveSheet()->mergeCells("G" .$k.":J" .$k);
$spreadsheet->getActiveSheet()->setCellValue("G" . $k, 'Administrative Officer V');

$k+=1 ;
$spreadsheet->getActiveSheet()->mergeCells("G" .$k.":J" .$k);
$spreadsheet->getActiveSheet()->setCellValue("G" . $k, 'Head, Human Resource Management Office');


$fileName = "month_leave_report- " . $date . ".xlsx"; //date('d/m/Y')

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment ; filename=' . $fileName);
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
die;