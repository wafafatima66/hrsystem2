<?php
$date =  $_GET["date_to_print"]; //2022-10

$datearray = explode('-', $date);

$search_month = $datearray[1];
$search_year = $datearray[0];

$k = 10;
$a = 1;


$dateObj   = DateTime::createFromFormat('!m', $search_month);
$monthName = $dateObj->format('F'); // March

$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$spreadsheet = $reader->load('../export_excel_parts/monthly_training_report_attendance_ld.xlsx');

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

$spreadsheet->getActiveSheet()->setCellValue("A5", 'MONTH: '.$monthName);
$spreadsheet->getActiveSheet()->setCellValue("A6", 'YEAR: ' .$search_year);

$query = "SELECT * from training_table where YEAR(from_date) = ".$search_year." AND MONTH(from_date) = ".$search_month." ORDER BY id DESC";

$runquery = $conn->query($query);
$rowcount = mysqli_num_rows($runquery);

if ($rowcount != 0) {

  while ($mydata = $runquery->fetch_assoc()) {


        $female_count = 0;
		$male_count = 0;
		$id = $mydata['id'];

        $leave_from = date("m/d/Y", strtotime($mydata['from_date']));
		$leave_to = date("m/d/Y", strtotime($mydata['to_date']));
        $inclusive_dates = $leave_from.'-'.$leave_to ;

		$query1 = "SELECT e.emp_gender ,  a.id from employee e join emp_training t on t.emp_id = e.emp_id join training_table a on a.id = t.learning_id where a.id = '$id'";


		$result1 = mysqli_query($conn, $query1);
		if (mysqli_num_rows($result1) > 0) {
			while ($mydata1 = mysqli_fetch_assoc($result1)) {

				if ($mydata1['emp_gender'] == 'Female') {
					$female_count += 1;
				} else if ($mydata1['emp_gender'] == 'Male') {
					$male_count += 1;
				}
			}
		}

        $spreadsheet->getActiveSheet()->setCellValue("A" . $k, $mydata['proponent']);
        $spreadsheet->getActiveSheet()->setCellValue("C" . $k, $mydata['classification']);
        $spreadsheet->getActiveSheet()->setCellValue("D" . $k, $mydata['financed_by']);
        $spreadsheet->getActiveSheet()->setCellValue("E" . $k, $mydata['title_of_training']);
        $spreadsheet->getActiveSheet()->setCellValue("F" . $k, $inclusive_dates);
        $spreadsheet->getActiveSheet()->setCellValue("G" . $k, $mydata['no_of_days']);
        $spreadsheet->getActiveSheet()->setCellValue("H" . $k, $mydata['no_of_hrs']);
        $spreadsheet->getActiveSheet()->setCellValue("I" . $k, $mydata['budgetary_requirement']);
        $spreadsheet->getActiveSheet()->setCellValue("AE" . $k, $female_count);
        $spreadsheet->getActiveSheet()->setCellValue("AF" . $k, $male_count);
		
        if($k > 19){
            // $k_for_borders = $k+2 ; 
            $spreadsheet->getActiveSheet()
                  ->getStyle("A" . $k. ":AF" . $k)
                  ->applyFromArray($all_borders);
      
                  $spreadsheet->getActiveSheet()->getRowDimension($k)->setRowHeight(35);

                //   $spreadsheet->getActiveSheet()
                //   ->getStyle("A" . $k_for_borders. ":J" . $k_for_borders)
                //   ->applyFromArray($all_borders);
      
          }

        $k += 1;

  }
}

if($k < 19 ){
    $k = 19 ; 
}

$k+=3 ; 

$spreadsheet->getActiveSheet()->setCellValue("A" . $k, 'Prepared by:');
$spreadsheet->getActiveSheet()->setCellValue("E" . $k, 'Noted by:');
$spreadsheet->getActiveSheet()->setCellValue("I" . $k, 'Approved By :');

$k+=2 ; 

$spreadsheet->getActiveSheet()->mergeCells("A" .$k.":B" .$k);
$spreadsheet->getActiveSheet()->setCellValue("A" . $k, 'KHAREEN A. GARRINO');
$spreadsheet->getActiveSheet()->getStyle("A" . $k)->applyFromArray($bold);

$spreadsheet->getActiveSheet()->setCellValue("E" . $k, 'PAMELA C. PAKIPAC, RND, MPA');
$spreadsheet->getActiveSheet()->getStyle("E" . $k)->applyFromArray($bold);

$spreadsheet->getActiveSheet()->mergeCells("I" .$k.":Y" .$k);
$spreadsheet->getActiveSheet()->setCellValue("I" . $k, 'EDUARDO B. CALPITO, MD, MHA, FPSMS');
$spreadsheet->getActiveSheet()->getStyle("I" . $k)->applyFromArray($bold);

$k+=1 ;
$spreadsheet->getActiveSheet()->setCellValue("A" . $k, 'Name & Position');
$spreadsheet->getActiveSheet()->setCellValue("E" . $k, 'Immediate Supervisor');
$spreadsheet->getActiveSheet()->mergeCells("I" .$k.":Y" .$k);
$spreadsheet->getActiveSheet()->setCellValue("I" . $k, 'Medical Center Chief / Regional Director');



$fileName = "monthly_training_report_attendance_ld- " . $date . ".xlsx"; //date('d/m/Y')

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment ; filename=' . $fileName);
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
die;