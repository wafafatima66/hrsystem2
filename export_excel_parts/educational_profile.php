<?php 

$year = date('Y');
$month = date('F');
$k = 5;
$i = 0;
$total_count = 0 ; 
$total_male_count = 0; 
$total_female_count =  0; 


$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$spreadsheet = $reader->load('../export_excel_parts/educational_profile.xlsx');

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

$spreadsheet->getActiveSheet()->setCellValue("A3", 'EDUCATIONAL PROFILE (As of '.$month. ','. $year .')' );



$query = "SELECT  emp_gender FROM `employee` where ele_school_name is not null and ele_school_name != ''";

$runquery = $conn->query($query);
$rowcount = mysqli_num_rows($runquery);

$male_count = 0 ; 
$female_count = 0 ;

if ($rowcount != 0) {

  while ($mydata = $runquery->fetch_assoc()) {

    if($mydata['emp_gender'] == 'Male') {
        $male_count += 1 ;  
    }
    
    else if($mydata['emp_gender'] == 'Female') {
        $female_count += 1 ;  
    }

        $total_count +=  $rowcount; 
        $total_male_count +=  $male_count; 
        $total_female_count +=  $female_count; 

    $spreadsheet->getActiveSheet()->setCellValue("B6", $rowcount);
    $spreadsheet->getActiveSheet()->setCellValue("C6" , $male_count);
    $spreadsheet->getActiveSheet()->setCellValue("D6" , $female_count);

  }
}


$query = "SELECT  emp_gender FROM `employee` where sec_school_name is not null and sec_school_name != ''";

$runquery = $conn->query($query);
$rowcount = mysqli_num_rows($runquery);
$male_count = 0 ; 
$female_count = 0 ;

if ($rowcount != 0) {

  while ($mydata = $runquery->fetch_assoc()) {

   

    if($mydata['emp_gender'] == 'Male') {
        $male_count += 1 ;  
    }
    
    else if($mydata['emp_gender'] == 'Female') {
        $female_count += 1 ;  
    }

        $total_count +=  $rowcount; 
        $total_male_count +=  $male_count; 
        $total_female_count +=  $female_count; 

    $spreadsheet->getActiveSheet()->setCellValue("B8", $rowcount);
    $spreadsheet->getActiveSheet()->setCellValue("C8" , $male_count);
    $spreadsheet->getActiveSheet()->setCellValue("D8" , $female_count);

  }
}


$query = "SELECT  emp_gender FROM `employee` where voc_school_name is not null and voc_school_name != ''";

$runquery = $conn->query($query);
$rowcount = mysqli_num_rows($runquery);
$male_count = 0 ; 
    $female_count = 0 ;

if ($rowcount != 0) {

  while ($mydata = $runquery->fetch_assoc()) {

    

    if($mydata['emp_gender'] == 'Male') {
        $male_count += 1 ;  
    }
    
    else if($mydata['emp_gender'] == 'Female') {
        $female_count += 1 ;  
    }

        $total_count +=  $rowcount; 
        $total_male_count +=  $male_count; 
        $total_female_count +=  $female_count; 

    $spreadsheet->getActiveSheet()->setCellValue("B9", $rowcount);
    $spreadsheet->getActiveSheet()->setCellValue("C9" , $male_count);
    $spreadsheet->getActiveSheet()->setCellValue("D9" , $female_count);

  }
}

$query = "SELECT  emp_gender FROM `employee` where high_school_name is not null and high_school_name != ''";

$runquery = $conn->query($query);
$rowcount = mysqli_num_rows($runquery);
$male_count = 0 ; 
    $female_count = 0 ;

if ($rowcount != 0) {

  while ($mydata = $runquery->fetch_assoc()) {

    if($mydata['emp_gender'] == 'Male') {
        $male_count += 1 ;  
    }
    
    else if($mydata['emp_gender'] == 'Female') {
        $female_count += 1 ;  
    }

        $total_count +=  $rowcount; 
        $total_male_count +=  $male_count; 
        $total_female_count +=  $female_count; 

    $spreadsheet->getActiveSheet()->setCellValue("B7", $rowcount);
    $spreadsheet->getActiveSheet()->setCellValue("C7" , $male_count);
    $spreadsheet->getActiveSheet()->setCellValue("D7" , $female_count);

  }
}

$query = "SELECT a.emp_id , a.type , e.emp_gender , COUNT(*) as count FROM emp_education a join employee e on a.emp_id = e.emp_id where a.emp_id is not null and a.emp_id != '' and a.type is not null and a.type != '' and a.type = 'college' GROUP BY a.type , a.emp_id";

$runquery = $conn->query($query);
$rowcount = mysqli_num_rows($runquery);

$male_count = 0 ; 
$female_count = 0 ;

if ($rowcount != 0) {

  while ($mydata = $runquery->fetch_assoc()) {

    if($mydata['emp_gender'] == 'Male') {
        $male_count += 1 ;  
    }
    
    else if($mydata['emp_gender'] == 'Female') {
        $female_count += 1 ;  
    }

        $total_count +=  $rowcount; 
        $total_male_count +=  $male_count; 
        $total_female_count +=  $female_count; 

    $spreadsheet->getActiveSheet()->setCellValue("B10", $rowcount);
    $spreadsheet->getActiveSheet()->setCellValue("C10" , $male_count);
    $spreadsheet->getActiveSheet()->setCellValue("D10" , $female_count);

  }
}

$query = "SELECT a.emp_id , a.type , e.emp_gender , COUNT(*) as count FROM emp_education a join employee e on a.emp_id = e.emp_id where a.emp_id is not null and a.emp_id != '' and a.type is not null and a.type != '' and a.type = 'graduation' GROUP BY a.type , a.emp_id";

$runquery = $conn->query($query);
$rowcount = mysqli_num_rows($runquery);

$male_count = 0 ; 
$female_count = 0 ;

if ($rowcount != 0) {

  while ($mydata = $runquery->fetch_assoc()) {

    if($mydata['emp_gender'] == 'Male') {
        $male_count += 1 ;  
    }
    
    else if($mydata['emp_gender'] == 'Female') {
        $female_count += 1 ;  
    }

        $total_count +=  $rowcount; 
        $total_male_count +=  $male_count; 
        $total_female_count +=  $female_count; 

    $spreadsheet->getActiveSheet()->setCellValue("B11", $rowcount);
    $spreadsheet->getActiveSheet()->setCellValue("C11" , $male_count);
    $spreadsheet->getActiveSheet()->setCellValue("D11" , $female_count);

  }
}



// $spreadsheet->getActiveSheet()->setCellValue("B15" , $total_count);
// $spreadsheet->getActiveSheet()->setCellValue("C15" , $total_male_count);
// $spreadsheet->getActiveSheet()->setCellValue("D15" , $total_female_count);


$fileName = "educational_profile-" . $month . "-" . $year . ".xlsx"; //date('d/m/Y')

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment ; filename=' . $fileName);
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
die;

?>