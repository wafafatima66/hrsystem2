<?php
$emp_id =  $_GET["daily_accomplishment_report"];
$date = $_GET["date"]; //2022-10

$datearray = explode('-', $date);

$search_month = $datearray[1];
$search_year = $datearray[0];


$k = 15;
$i = $k;
$j = $k + 1;
$a = 1;

// $ul_output = "";
// $ul_success = "";

$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$spreadsheet = $reader->load('../export_excel_parts/daily_accomplishment_report.xlsx');

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

$query = "SELECT  i.division , i.area_wrk_assign , i.position ,  e.emp_first_name , e.emp_middle_name , e.emp_last_name , e.emp_ext  , p.* FROM employee e left join item i on i.emp_id = e.emp_id left join daily_accomplishment p on e.emp_id = p.emp_id where p.emp_id = '$emp_id' and YEAR(date) = '$search_year' AND MONTH(date) = '$search_month'";

$runquery1 = $conn->query($query);
$rowcount1 = mysqli_num_rows($runquery1);



if ($rowcount1 != 0) {

  while ($mydata = $runquery1->fetch_assoc()) {

    $emp_full_name =  $mydata['emp_first_name'] . $mydata['emp_middle_name'] . $mydata['emp_last_name'] . $mydata['emp_ext'];

    $month = strtoupper(date('F', strtotime($mydata['date'])));
    $day = strtoupper(date('j', strtotime($mydata['date'])));

    $date_row_col = '';
    switch ($day) {
      case 1:
        $date_row_col = 'D' . $i;
        break;
      case 2:
        $date_row_col = 'E' . $i;
        break;
      case 3:
        $date_row_col = 'F' . $i;
        break;
      case 4:
        $date_row_col = 'G' . $i;
        break;
      case 5:
        $date_row_col = 'H' . $i;
        break;
      case 6:
        $date_row_col = 'I' . $i;
        break;
      case 7:
        $date_row_col = 'J' . $i;
        break;
      case 8:
        $date_row_col = 'K' . $i;
        break;
      case 9:
        $date_row_col = 'L' . $i;
        // $date_row_col = 'L16';
        break;
      case 10:
        $date_row_col = 'M' . $i;
        break;
      case 11:
        $date_row_col = 'N' . $i;
        break;
      case 12:
        $date_row_col = '0' . $i;
        break;
      case 13:
        $date_row_col = 'P' . $i;
        break;
      case 14:
        $date_row_col = 'Q' . $i;
        break;
      case 15:
        $date_row_col = 'R' . $i;
        break;
      case 16:
        $date_row_col = 'D' . $j;
        break;
      case 17:
        $date_row_col = 'E' . $j;
        break;
      case 18:
        $date_row_col = 'F' . $j;
        break;
      case 19:
        $date_row_col = 'G' . $j;
        break;
      case 20:
        $date_row_col = 'H' . $j;
        break;
      case 21:
        $date_row_col = 'I' . $j;
        break;
      case 22:
        $date_row_col = 'J' . $j;
        break;
      case 23:
        $date_row_col = 'K' . $j;
        break;
      case 24:
        $date_row_col = 'L' . $j;
        break;
      case 25:
        $date_row_col = 'M' . $j;
        break;
      case 26:
        $date_row_col = 'N' . $j;
        break;
      case 27:
        $date_row_col = 'O' . $j;
        break;
      case 28:
        $date_row_col = 'P' . $j;
        break;
      case 29:
        $date_row_col = 'Q' . $j;
        break;
      case 30:
        $date_row_col = 'R' . $j;
        break;
      case 31:
        $date_row_col = 'S' . $j;
        break;
      default:
        $date_row_col = '';
    }

    // echo $date_row_col ; 


    $output_description = json_decode($mydata['output_description']);
    $ul_output = "";

    if (!empty($output_description)) {

      for ($z = 0; $z < count($output_description); $z++) {
        $ul_output .= $output_description[$z] . ',';
      }
    };


    $success_description = json_decode($mydata['success_description']);
    $ul_success = "";

    if (!empty($success_description)) {

      for ($z = 0; $z < count($success_description); $z++) {
        $ul_success .= $success_description[$z] . ',';
      }
    };

    $spreadsheet->setActiveSheetIndexByName('Sheet2')->setCellValue("C8", $emp_full_name);
    $spreadsheet->setActiveSheetIndexByName('Sheet2')->setCellValue("C9", $mydata['position']);
    $spreadsheet->setActiveSheetIndexByName('Sheet2')->setCellValue("C10", $mydata['area_wrk_assign']);
    $spreadsheet->setActiveSheetIndexByName('Sheet2')->setCellValue("C11", $mydata['division']);
    $spreadsheet->setActiveSheetIndexByName('Sheet2')->setCellValue("D12", $month);

    $spreadsheet->setActiveSheetIndexByName('Sheet2')->setCellValue("A" . $k, $a);
    $spreadsheet->setActiveSheetIndexByName('Sheet2')->setCellValue("B" . $k, $ul_output);
    $spreadsheet->setActiveSheetIndexByName('Sheet2')->setCellValue("C" . $k, $ul_success);



    $spreadsheet->setActiveSheetIndexByName('Sheet2')->setCellValue($date_row_col, $mydata['qty']);

    if($k > 28){
      $k_for_borders = $k+1 ; 
      $spreadsheet->getActiveSheet()
            ->getStyle("A" . $k. ":T" . $k)
            ->applyFromArray($all_borders);

            $spreadsheet->getActiveSheet()
            ->getStyle("A" . $k_for_borders. ":T" . $k_for_borders)
            ->applyFromArray($all_borders);

    }

    $k += 2;
    $i += 2;
    $j += 2;
    $a += 1; //increment


  }
}



if ($k != 28 && $k<28) {
  $k = 28;
}




$newcount = $k + 2;

$spreadsheet->setActiveSheetIndexByName('Sheet2')->setCellValue("B" . $newcount,   "Prepared by:");
$spreadsheet->setActiveSheetIndexByName('Sheet2')->setCellValue("C" . $newcount,   "Noted by:");

$newcount += 3;

$spreadsheet->setActiveSheetIndexByName('Sheet2')->setCellValue("B" . $newcount,   "Signature of Employee");
$spreadsheet->getActiveSheet()
  ->getStyle("B" . $newcount)
  ->applyFromArray($border_top);

$spreadsheet->setActiveSheetIndexByName('Sheet2')->setCellValue("D" . $newcount,   "Name and Signature of Supervisor");

$spreadsheet->getActiveSheet()
        ->getStyle("D" . $newcount. ":M" . $newcount)
        ->applyFromArray($border_top);

// $spreadsheet->getActiveSheet()
//   ->getStyle("D" . $newcount)
//   ->applyFromArray($border_top);

// $spreadsheet->getActiveSheet()
//   ->getStyle("E" . $newcount)
//   ->applyFromArray($border_top);
// $spreadsheet->getActiveSheet()
//   ->getStyle("F" . $newcount)
//   ->applyFromArray($border_top);
// $spreadsheet->getActiveSheet()
//   ->getStyle("G" . $newcount)
//   ->applyFromArray($border_top);
// $spreadsheet->getActiveSheet()
//   ->getStyle("H" . $newcount)
//   ->applyFromArray($border_top);
// $spreadsheet->getActiveSheet()
//   ->getStyle("I" . $newcount)
//   ->applyFromArray($border_top);
// $spreadsheet->getActiveSheet()
//   ->getStyle("J" . $newcount)
//   ->applyFromArray($border_top);
// $spreadsheet->getActiveSheet()
//   ->getStyle("K" . $newcount)
//   ->applyFromArray($border_top);
// $spreadsheet->getActiveSheet()
//   ->getStyle("L" . $newcount)
//   ->applyFromArray($border_top);
// $spreadsheet->getActiveSheet()
//   ->getStyle("M" . $newcount)
//   ->applyFromArray($border_top);


foreach (range('B', 'C') as $columnID) {
  $spreadsheet->getActiveSheet()->getStyle($columnID)
    ->getAlignment()->setWrapText(true);
}

foreach (range(15, 28) as $columnID) {
  $spreadsheet->getActiveSheet()->getRowDimension($columnID)->setRowHeight(-1);
}



$fileName = "daily_accomplishment_report- " . $emp_id . ".xlsx"; //date('d/m/Y')

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment ; filename=' . $fileName);
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
die;
