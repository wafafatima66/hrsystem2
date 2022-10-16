<?php

$office =  $_GET["office"];
$dept = $_GET["dept"];
$rating_period = $_GET["rating_period"];
$year = date('Y');
$k = 7;
$i = 0;

// echo $rating_period ; 
// die ; 

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

$yellow = [
    'fill' => [
        
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            'startColor' => array('argb' => 'FFFF00')
        
    ],
];

$green = [
    'fill' => [
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            'startColor' => array('argb' => '92D050')
        
    ],
];

$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$spreadsheet = $reader->load('../export_excel_parts/consolidated_performance_review.xlsx');

if ($rating_period == 1) {
    $spreadsheet->getActiveSheet()->setCellValue("A3", "Rating Period : JANUARY TO JUNE " . $year);

} else if ($rating_period == 2) {
    $spreadsheet->getActiveSheet()->setCellValue("A3", "Rating Period : JULY TO DECEMBER " . $year);

}


//all dept all office
//select dept all office 
//select dept select office 

if($dept == 'all'){

    $query1 = "SELECT DISTINCT division FROM `item`";   
}
else if ( $dept != 'all') 
{
    $query1 = "SELECT DISTINCT division FROM `item` where division = '$dept'";
}




// if ($dept == 'all') { 
    
    //all dept all office 

    // $query1 = "SELECT DISTINCT division FROM `item`";
    $runquery1 = $conn->query($query1);
    $rowcount1 = mysqli_num_rows($runquery1);

    if ($rowcount1 != 0) {


       
        while ($mydata1 = $runquery1->fetch_assoc()) {

          
           
            $division_value = $mydata1["division"];

            if ($office == 'all') 
            { 
                $query2 = "SELECT DISTINCT area_wrk_assign FROM `item` WHERE division = '$division_value'";
            } else if ($office != 'all') //select dept select office 
            {
                $query2 = "SELECT DISTINCT area_wrk_assign FROM `item` WHERE division = '$division_value' and area_wrk_assign = '$office'";
            } 

            // $query2 = "SELECT DISTINCT area_wrk_assign FROM `item` where division = '$division_value'";
            $runquery2 = $conn->query($query2);
            $rowcount2 = mysqli_num_rows($runquery2);
            if ($rowcount2 != 0) {

                while ($mydata2 = $runquery2->fetch_assoc()) {

                    $k += 1;

                    $area_wrk_assign_value = $mydata2["area_wrk_assign"];

                    $spreadsheet->getActiveSheet()->setCellValue("A" . $k, $area_wrk_assign_value);

                    $spreadsheet->getActiveSheet()->getStyle("A" . $k)->applyFromArray($bold);

                    $spreadsheet->getActiveSheet()->mergeCells("A" .$k.":K" .$k);

                    $query3 = "SELECT  i.division , i.area_wrk_assign , i.position ,  e.emp_first_name , e.emp_middle_name , e.emp_last_name , e.emp_ext , e.id ,  p.*  FROM employee e left join item i on i.emp_id = e.emp_id left join emp_performance p on e.emp_id = p.emp_id where i.division = '$division_value' and i.area_wrk_assign = '$area_wrk_assign_value' and p.rating_period = '$rating_period'";

                    $runquery3 = $conn->query($query3);
                    $rowcount3 = mysqli_num_rows($runquery3);
                    if ($rowcount3 != 0) {
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
                            $spreadsheet->getActiveSheet()->setCellValue("D" . $k, $mydata3['rating']);
                            $spreadsheet->getActiveSheet()->setCellValue("E" . $k, $adjectival_rating);
                            $spreadsheet->getActiveSheet()->setCellValue("H" . $k, $mydata3['date_of_submission']);
                            $spreadsheet->getActiveSheet()->setCellValue("J" . $k, $mydata3['date_of_resubmission']);
                            $spreadsheet->getActiveSheet()->setCellValue("K" . $k, $mydata3['remarks']);
                        }
                    }
                }


                $k+=1 ; 
                
                $spreadsheet->getActiveSheet()->setCellValue("B" . $k, 'Sub-Total');
                $spreadsheet->getActiveSheet()->getStyle("B" . $k)->applyFromArray($bold);

                $k+=1 ; 

                $spreadsheet->getActiveSheet()->setCellValue("B" . $k, 'Over all Rating of ' . $division_value);
                $spreadsheet->getActiveSheet()->mergeCells("B" .$k.":C" .$k);
                $spreadsheet->getActiveSheet()->getStyle("B" . $k)->applyFromArray($bold);
                $spreadsheet->getActiveSheet()->getStyle("A" . $k .":K" . $k)->applyFromArray($yellow);



            }
        }

        foreach (range(8, $k) as $columnID) {
            $spreadsheet->getActiveSheet()->getRowDimension($columnID)->setRowHeight(-1);
          }

        $k+=3 ; 

        $spreadsheet->getActiveSheet()->setCellValue("A" . $k, 'DIVISION AVERAGE RATING');
        $spreadsheet->getActiveSheet()->mergeCells("A" .$k.":C" .$k);
        $spreadsheet->getActiveSheet()->getStyle("A" . $k)->applyFromArray($bold);
        $spreadsheet->getActiveSheet()->getStyle("A" . $k .":K" . $k)->applyFromArray($yellow);
        $spreadsheet->getActiveSheet()->getRowDimension($k)->setRowHeight(50);
        // $sheet->getDefaultRowDimension()->setRowHeight(15);

        $k+=1 ; 

        $spreadsheet->getActiveSheet()->setCellValue("A" . $k, 'OVERALL RATING');
        $spreadsheet->getActiveSheet()->mergeCells("A" .$k.":C" .$k);
        $spreadsheet->getActiveSheet()->getStyle("A" . $k)->applyFromArray($bold);
        $spreadsheet->getActiveSheet()->getStyle("A" . $k .":K" . $k)->applyFromArray($green);
        $spreadsheet->getActiveSheet()->getRowDimension($k)->setRowHeight(50);

    }


foreach (range('A', 'K') as $columnID) {
    // $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
    //     ->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getStyle($columnID)
        ->getAlignment()->setWrapText(true);
}


$spreadsheet->getActiveSheet()->getStyle("A8:K" . $k)->applyFromArray($all_borders);


$j = $k + 4;

$spreadsheet->getActiveSheet()->setCellValue("B" . $j, 'Prepared By : ');
$spreadsheet->getActiveSheet()->setCellValue("B" . $j + 2, 'BRIGET M. GAWADING');
$spreadsheet->getActiveSheet()->getStyle("B" . $j + 2)->applyFromArray($bold);
$spreadsheet->getActiveSheet()->setCellValue("B" . $j + 3, 'Administrative Officer IV');

$spreadsheet->getActiveSheet()->setCellValue("H" . $j, 'Noted by:');
$spreadsheet->getActiveSheet()->setCellValue("H" . $j + 2, 'RACHEL A. BENITO, RN, MAN');
$spreadsheet->getActiveSheet()->getStyle("H" . $j + 2)->applyFromArray($bold);
$spreadsheet->getActiveSheet()->setCellValue("H" . $j + 3, 'PMT Chairperson/Supervising Administrative Officer');

$a= $j+5 ; 
$spreadsheet->getActiveSheet()->getStyle("B".$j. ":K" . $a)
        ->getAlignment()->setWrapText(false);

$fileName = "division_performance_review- " . $year . ".xlsx"; //date('d/m/Y')

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment ; filename=' . $fileName);
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
die;


?>