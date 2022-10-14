<?php

$office =  $_GET["office"];
$dept = $_GET["dept"];
$rating_period = $_GET["rating_period"];
$year = date('Y');
$k = 7;
$i = 0;


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


$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$spreadsheet = $reader->load('../export_excel_parts/performance_summary_list.xlsx');

if ($rating_period = 1) {
    $spreadsheet->getActiveSheet()->setCellValue("A3", "Rating Period : JANUARY TO JUNE " . $year);
    $spreadsheet->getActiveSheet()->setCellValue("D6", "JAN-JUN " . $year);
} else if ($rating_period = 2) {
    $spreadsheet->getActiveSheet()->setCellValue("A3", "Rating Period : JULY TO DECEMBER " . $year);
    $spreadsheet->getActiveSheet()->setCellValue("D6", "JUL-DEC " . $year);
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

          
            $k += 1;
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

                    $spreadsheet->getActiveSheet()->setCellValue("B" . $k, $area_wrk_assign_value);

                    $spreadsheet->getActiveSheet()->getStyle("B" . $k)->applyFromArray($bold);

                    $query3 = "SELECT  i.division , i.area_wrk_assign , i.position ,  e.emp_first_name , e.emp_middle_name , e.emp_last_name , e.emp_ext , e.id ,  p.rating , p.rating_period , p.remarks FROM employee e left join item i on i.emp_id = e.emp_id left join emp_performance p on e.emp_id = p.emp_id where i.division = '$division_value' and i.area_wrk_assign = '$area_wrk_assign_value' and p.rating_period = '$rating_period'";

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
                            $spreadsheet->getActiveSheet()->setCellValue("F" . $k, $mydata3['remarks']);
                        }
                    }
                }


                $k+=1 ; 
                
                $spreadsheet->getActiveSheet()->setCellValue("B" . $k, 'Sub-Total');
                $spreadsheet->getActiveSheet()->getStyle("B" . $k)->applyFromArray($bold);

                $k+=1 ; 

                $spreadsheet->getActiveSheet()->setCellValue("B" . $k, 'Over all Rating of ' . $division_value);
                $spreadsheet->getActiveSheet()->getStyle("B" . $k)->applyFromArray($bold);
                $spreadsheet->getActiveSheet()->getStyle("A" . $k .":F" . $k)->applyFromArray($yellow);



            }
        }
    }
// } else {


//     if ($office == 'all' && $dept != 'all') { //select dept all office 
//         $query1 = "SELECT DISTINCT area_wrk_assign FROM `item` WHERE division = '$dept'";
//     } else if ($office != 'all' && $dept != 'all') //select dept select office 
//     {
//         $query1 = "SELECT DISTINCT area_wrk_assign FROM `item` WHERE division = '$dept' and area_wrk_assign = '$office'";
//     } else { //all dept all office 

//         $query1 = "SELECT DISTINCT area_wrk_assign FROM `item`";
//     }


//     $runquery1 = $conn->query($query1);
//     $rowcount1 = mysqli_num_rows($runquery1);
//     if ($rowcount1 != 0) {

//         while ($mydata1 = $runquery1->fetch_assoc()) {

//             $k += 1;
//             $area_wrk_assign_value = $mydata1["area_wrk_assign"];


//             $spreadsheet->getActiveSheet()->setCellValue("B" . $k, $area_wrk_assign_value);

//             $spreadsheet->getActiveSheet()->getStyle("B" . $k)->applyFromArray($bold);

//             $query2 = "SELECT  i.division , i.area_wrk_assign , i.position ,  e.emp_first_name , e.emp_middle_name , e.emp_last_name , e.emp_ext , e.id ,  p.rating , p.rating_period , p.remarks FROM employee e left join item i on i.emp_id = e.emp_id left join emp_performance p on e.emp_id = p.emp_id where i.division = '$dept' and i.area_wrk_assign = '$area_wrk_assign_value'";

//             $runquery2 = $conn->query($query2);
//             $rowcount2 = mysqli_num_rows($runquery2);
//             if ($rowcount2 != 0) {
//                 while ($mydata2 = $runquery2->fetch_assoc()) {

//                     $k += 1;
//                     $i += 1;
//                     $emp_full_name =  $mydata2['emp_first_name'] . $mydata2['emp_middle_name'] . $mydata2['emp_last_name'] . $mydata2['emp_ext'];

//                     if (empty($mydat2["rating"])) {
//                         $adjectival_rating =  "";
//                     } else if ($mydata2["rating"] <= 1) {
//                         $adjectival_rating =  "Poor";
//                     } else  if ($mydata2["rating"] <= 2) {
//                         $adjectival_rating = "Not Satisfactory";
//                     } else  if ($mydata2["rating"] <= 3) {
//                         $adjectival_rating = " Satisfactory";
//                     } else  if ($mydata2["rating"] <= 4) {
//                         $adjectival_rating = "Very Satisfactory";
//                     } else  if ($mydata2["rating"] <= 5) {
//                         $adjectival_rating = "Outstanding";
//                     } else {
//                         $adjectival_rating = "Good Work";
//                     }

//                     $spreadsheet->getActiveSheet()->setCellValue("A" . $k, $i);
//                     $spreadsheet->getActiveSheet()->setCellValue("B" . $k, $emp_full_name);
//                     $spreadsheet->getActiveSheet()->setCellValue("C" . $k, $mydata2['position']);
//                     $spreadsheet->getActiveSheet()->setCellValue("D" . $k, $mydata2['rating']);
//                     $spreadsheet->getActiveSheet()->setCellValue("E" . $k, $adjectival_rating);
//                     $spreadsheet->getActiveSheet()->setCellValue("F" . $k, $mydata2['remarks']);
//                 }
//             }
//         }
//     }



//     $spreadsheet->getActiveSheet()->setCellValue("B" . $k + 1, 'Sub-Total');
//     $spreadsheet->getActiveSheet()->getStyle("B" . $k + 1)->applyFromArray($bold);

//     $spreadsheet->getActiveSheet()->setCellValue("B" . $k + 2, 'Over all Rating of ' . $dept);
//     $spreadsheet->getActiveSheet()->getStyle("B" . $k + 2)->applyFromArray($bold);
// }


foreach (range('A', 'F') as $columnID) {
    // $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
    //     ->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getStyle($columnID)
        ->getAlignment()->setWrapText(true);
}

$spreadsheet->getActiveSheet()->getStyle("A9:F" . $k + 2)->applyFromArray($all_borders);
$j = $k + 4;
$spreadsheet->getActiveSheet()->setCellValue("B" . $j, 'Prepared By : ');
$spreadsheet->getActiveSheet()->setCellValue("B" . $j + 3, 'PAMELA C. PAKIPAC, RND, MPA');
$spreadsheet->getActiveSheet()->setCellValue("B" . $j + 4, 'Administrative Officer V');
$spreadsheet->getActiveSheet()->setCellValue("B" . $j + 7, 'Approved by:');
$spreadsheet->getActiveSheet()->setCellValue("B" . $j + 9, 'EDUARDO B. CALPITO, MD, MHA, FPSMS');
$spreadsheet->getActiveSheet()->setCellValue("B" . $j + 10, 'Medical Center Chief I');


$fileName = "performance_summary_list- " . $year . ".xlsx"; //date('d/m/Y')

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment ; filename=' . $fileName);
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
die;
