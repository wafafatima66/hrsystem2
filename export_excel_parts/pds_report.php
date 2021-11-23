<?php
$emp_id =  $_GET["pds_report"];

$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$spreadsheet = $reader->load('../export_excel_parts/PDS.xlsx');




$query = "Select * from employee where emp_id = '$emp_id'";

$result = mysqli_query($conn, $query);
$emp_image = '';
if (mysqli_num_rows($result) > 0) {
    
    while ($mydata = mysqli_fetch_assoc($result)) {
        $emp_image = $mydata['emp_image'];

        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D10', $mydata['emp_last_name']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D11', $mydata['emp_first_name']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D12', $mydata['emp_middle_name']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D13', $mydata['emp_dob']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('J13', $mydata['emp_citizen']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('K16', $mydata['emp_nationality']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D16', $mydata['emp_gender']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D17', $mydata['emp_civil_status']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('I17', $mydata['emp_resi_add']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('L17', $mydata['emp_resi_add_street']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('I19', $mydata['emp_resi_add_subvillage']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('L19', $mydata['emp_resi_add_barangay']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('I22', $mydata['emp_resi_add_municipal']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('L22', $mydata['emp_resi_add_province']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('I24', $mydata['emp_resi_add_zipcode']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('I25', $mydata['emp_per_add']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('I27', $mydata['emp_per_add_subvillage']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('L27', $mydata['emp_per_add_barangay']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('J29', $mydata['emp_per_add_municipal']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('L29', $mydata['emp_per_add_province']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('I31', $mydata['emp_per_add_zipcode']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D22', $mydata['emp_height']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D24', $mydata['emp_weight']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D25', $mydata['emp_blood']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D27', $mydata['emp_contact_gs']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D29', $mydata['emp_contact_pag']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D31', $mydata['emp_contact_ph']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D32', $mydata['emp_contact_ss']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D33', $mydata['emp_contact_tin']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D34', $mydata['emp_contact_agency']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('I32', $mydata['emp_tel_no']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('I33', $mydata['emp_mb_no']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('I34', $mydata['emp_email']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D43', $mydata['emp_father_lastname']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D44', $mydata['emp_father_firstname']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D45', $mydata['emp_father_middlename']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D47', $mydata['emp_mother_lastname']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D48', $mydata['emp_mother_firstname']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D49', $mydata['emp_mother_middlename']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D54', $mydata['ele_school_name']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('G54', $mydata['ele_degree']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('J54', $mydata['ele_from_date']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('K54', $mydata['ele_to_date']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('L54', $mydata['ele_units']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('M54', $mydata['ele_graduation']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('N54', $mydata['ele_award']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D55', $mydata['sec_school_name']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('G55', $mydata['sec_degree']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('J55', $mydata['sec_from_date']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('K55', $mydata['sec_to_date']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('L55', $mydata['sec_units']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('M55', $mydata['sec_graduation']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('N55', $mydata['sec_award']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D56', $mydata['voc_school_name']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('G56', $mydata['voc_degree']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('J56', $mydata['voc_from_date']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('K56', $mydata['voc_to_date']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('L56', $mydata['voc_units']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('M56', $mydata['voc_graduation']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('N56', $mydata['voc_award']);

        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('H6', $mydata['condition_1']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('H8', $mydata['condition_2']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('I11', $mydata['condition_2_des']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('H13', $mydata['condition_3']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('I15', $mydata['condition_3_des']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('H18', $mydata['condition_4']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('K19', $mydata['condition_4_des']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('K20', $mydata['condition_4_date']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('K21', $mydata['condition_4_status']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('H27', $mydata['condition_5']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('H29', $mydata['condition_5_des']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('H31', $mydata['condition_6']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('K32', $mydata['condition_6_des']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('H34', $mydata['condition_7']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('K35', $mydata['condition_7_des']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('H37', $mydata['condition_8']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('H39', $mydata['condition_8_des']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('H43', $mydata['condition_10']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('K44', $mydata['condition_10_des']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('H45', $mydata['condition_11']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('L46', $mydata['condition_11_des']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('H47', $mydata['condition_12']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue('L48', $mydata['condition_12_des']);
      
    }

}

$query2 = "SELECT * FROM `emp_spouse` WHERE emp_id = '$emp_id' ORDER BY id DESC limit 1";

$result = mysqli_query($conn, $query2);

if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D36', $mydata['emp_spouse_lastname']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D37', $mydata['emp_spouse_firstname']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D38', $mydata['emp_spouse_middlename']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D39', $mydata['emp_sp_occupation']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D40', $mydata['emp_sp_employer']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D41', $mydata['emp_sp_add']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue('D42', $mydata['emp_sp_tel']);
    }
}


$query3 = "SELECT * FROM `emp_children` WHERE emp_id = '$emp_id' order by id desc limit 12";

$result = mysqli_query($conn, $query3);
$count = 37;
if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("I" . $count, $mydata['emp_child_name']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("M" . $count, $mydata['emp_child_dob']);
        $count ++ ;
    }
}    

$query4 = "SELECT * FROM `emp_education` WHERE emp_id = '$emp_id' and type = 'college' order by id desc limit 1";

$result = mysqli_query($conn, $query4);
if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("D57", $mydata['school_name']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("G57", $mydata['degree']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("J57", $mydata['from_date']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("K57", $mydata['to_date']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("L57", $mydata['units']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("M57", $mydata['graduation']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("N57", $mydata['award']);
    }
} 

$query5 = "SELECT * FROM `emp_education` WHERE emp_id = '$emp_id' and type = 'graduation' order by id desc limit 1";

$result = mysqli_query($conn, $query5);
if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("D58", $mydata['school_name']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("G58", $mydata['degree']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("J58", $mydata['from_date']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("K58", $mydata['to_date']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("L58", $mydata['units']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("M58", $mydata['graduation']);
        $spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("N58", $mydata['award']);
    }
} 

$query6 = "SELECT * FROM `emp_civil_service` WHERE emp_id = '$emp_id' order by id desc limit 7";
$count = 5;
$result = mysqli_query($conn, $query6);
if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {
        $spreadsheet->setActiveSheetIndexByName('C2')->setCellValue("A" . $count, $mydata['civil_exam_name']);
        $spreadsheet->setActiveSheetIndexByName('C2')->setCellValue("F" . $count, $mydata['civil_exam_rating']);
        $spreadsheet->setActiveSheetIndexByName('C2')->setCellValue("G" . $count, $mydata['civil_exam_date']);
        $spreadsheet->setActiveSheetIndexByName('C2')->setCellValue("I" . $count, $mydata['civil_exam_place']);
        $spreadsheet->setActiveSheetIndexByName('C2')->setCellValue("L" . $count, $mydata['civil_exam_licence_no']);
        $spreadsheet->setActiveSheetIndexByName('C2')->setCellValue("M" . $count, $mydata['civil_exam_licence_val']);
        $count++;
    }
} 

$query7 = "SELECT * FROM `emp_work_experience` WHERE emp_id = '$emp_id' order by id desc limit 25";
$count = 18;
$result = mysqli_query($conn, $query7);
if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {
        $spreadsheet->setActiveSheetIndexByName('C2')->setCellValue("A" . $count, $mydata['work_from_date']);
        $spreadsheet->setActiveSheetIndexByName('C2')->setCellValue("C" . $count, $mydata['work_to_date']);
        $spreadsheet->setActiveSheetIndexByName('C2')->setCellValue("D" . $count, $mydata['work_position']);
        $spreadsheet->setActiveSheetIndexByName('C2')->setCellValue("G" . $count, $mydata['work_employer']);
        $spreadsheet->setActiveSheetIndexByName('C2')->setCellValue("J" . $count, $mydata['work_monthly_sal']);
        $spreadsheet->setActiveSheetIndexByName('C2')->setCellValue("K" . $count, $mydata['work_increment']);
        $spreadsheet->setActiveSheetIndexByName('C2')->setCellValue("L" . $count, $mydata['work_status']);
        $spreadsheet->setActiveSheetIndexByName('C2')->setCellValue("M" . $count, $mydata['work_govt_service']);
        $count++;
    }
} 

$query8 = "SELECT * FROM `emp_voluntary_work` WHERE emp_id = '$emp_id' order by id desc limit 5";
$count = 6;
$result = mysqli_query($conn, $query8);
if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {
        $vol = $mydata['vol_name_org'] . "  -  " .$mydata['vol_org_add'];
        $spreadsheet->setActiveSheetIndexByName('C3')->setCellValue("A" . $count, $vol);
        $spreadsheet->setActiveSheetIndexByName('C3')->setCellValue("E" . $count, $mydata['vol_from_date']);
        $spreadsheet->setActiveSheetIndexByName('C3')->setCellValue("F" . $count, $mydata['vol_to_date']);
        $spreadsheet->setActiveSheetIndexByName('C3')->setCellValue("G" . $count, $mydata['vol_no_of_hrs']);
        $spreadsheet->setActiveSheetIndexByName('C3')->setCellValue("H" . $count, $mydata['vol_position']);
        $count++;
    }
} 

$query9 = "SELECT * FROM `emp_training` WHERE emp_id = '$emp_id' order by id desc limit 24";
$count = 18;
$result = mysqli_query($conn, $query9);
if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {
        $spreadsheet->setActiveSheetIndexByName('C3')->setCellValue("A" . $count, $mydata['title_of_training']);
        $spreadsheet->setActiveSheetIndexByName('C3')->setCellValue("E" . $count, $mydata['training_from_date']);
        $spreadsheet->setActiveSheetIndexByName('C3')->setCellValue("F" . $count, $mydata['training_to_date']);
        $spreadsheet->setActiveSheetIndexByName('C3')->setCellValue("G" . $count, $mydata['training_no_of_hrs']);
        $spreadsheet->setActiveSheetIndexByName('C3')->setCellValue("H" . $count, $mydata['training_type_of_position']);
        $spreadsheet->setActiveSheetIndexByName('C3')->setCellValue("K" . $count, $mydata['training_conducted_by']);
        $count++;
    }
} 

$query10 = "SELECT * FROM `emp_special_skills` WHERE emp_id = '$emp_id' order by id desc limit 5";
$count = 46;
$result = mysqli_query($conn, $query10);
if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {
        $spreadsheet->setActiveSheetIndexByName('C3')->setCellValue("A" . $count, $mydata['emp_special_skills']);
        $count++;
    }
} 

$query11 = "SELECT * FROM `emp_non_academic` WHERE emp_id = '$emp_id' order by id desc limit 5";
$count = 46;
$result = mysqli_query($conn, $query11);
if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {
        $spreadsheet->setActiveSheetIndexByName('C3')->setCellValue("C" . $count, $mydata['emp_non_academic']);
        $count++;
    }
} 

$query12 = "SELECT * FROM `emp_membership` WHERE emp_id = '$emp_id' order by id desc limit 5";
$count = 46;
$result = mysqli_query($conn, $query12);
if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {
        $spreadsheet->setActiveSheetIndexByName('C3')->setCellValue("I" . $count, $mydata['emp_membership']);
        $count++;
    }
} 

$query13 = "SELECT * FROM `emp_reference` WHERE emp_id = '$emp_id' order by id desc limit 3";
$count = 52;
$result = mysqli_query($conn, $query13);
if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue("A" . $count, $mydata['ref_full_name']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue("F" . $count, $mydata['ref_add']);
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue("G" . $count, $mydata['ref_tel']);
        $count++;
    }
} 

$query14 = "SELECT date_accomplished FROM `item` WHERE emp_id = '$emp_id'";
$result = mysqli_query($conn, $query14);
if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {
        $date_accomplished = $mydata['date_accomplished'];
    }
}

$spreadsheet->setActiveSheetIndexByName('C1')->setCellValue("L60" , $date_accomplished);
$spreadsheet->setActiveSheetIndexByName('C2')->setCellValue("J47" , $date_accomplished);
$spreadsheet->setActiveSheetIndexByName('C3')->setCellValue("I53" , $date_accomplished);
$spreadsheet->setActiveSheetIndexByName('C4')->setCellValue("F64" , $date_accomplished);

// image
if(!empty($emp_image)){
$drawing = new PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setPath('../emp_img/'.$emp_image); // put your path and image here
$drawing->setCoordinates('J50');
$drawing->setHeight(220);
$drawing->setWidth(200);
$drawing->setWorksheet($spreadsheet->setActiveSheetIndexByName('C4'));
}

$query15 = "SELECT emp_gov_issued_id FROM `emp_govt_id` WHERE emp_id = '$emp_id'  limit 1";
$result = mysqli_query($conn, $query15);
if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue("D61", $mydata['emp_gov_issued_id']);
    }
}

$query16 = "SELECT emp_gov_issued_id FROM `emp_govt_id` WHERE emp_id = '$emp_id'  limit 1,1";
$result = mysqli_query($conn, $query16);
if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue("D62", $mydata['emp_gov_issued_id']);
    }
}

$query17 = "SELECT emp_gov_issued_id FROM `emp_govt_id` WHERE emp_id = '$emp_id'  limit 2,1";
$result = mysqli_query($conn, $query17);
if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {
        $spreadsheet->setActiveSheetIndexByName('C4')->setCellValue("D64", $mydata['emp_gov_issued_id']);
    }
}

$fileName = "PDS-" . $emp_id . "" . ".xlsx"; //date('d/m/Y')
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment ; filename=' . $fileName);

$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
die;
?>