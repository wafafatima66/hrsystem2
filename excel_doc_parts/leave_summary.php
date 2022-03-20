<?php session_start();
$date =  $_GET["leave_summary"];

if (empty($date)) {
    header("Location:../leave_mang");
}else 
   {
       //March,2022
        $department =  $_SESSION['department'] ;
        $office =  $_SESSION['office'];

        $new_Date = date("F, Y", strtotime($date));
        $mon = date("n", strtotime($date));
        $year = date("Y", strtotime($date));

            //Create table
$document_with_table = new PhpOffice\PhpWord\PhpWord();

$section = $document_with_table->addSection();

$fancyTableStyleName ='Leave Summary';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => 'b3b3b3', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderColor' => '#fc7e43','borderSize' => 10,'cellSpacing' => 50,'borderBottomSize' => 18);
$fancyTableCellStyle = array('valign' => 'center');
$fancyTableFontStyle = array('bold' => true,'valign' => 'center');

$table = $section->addTable($fancyTableStyleName);
$table->addRow(300);
$table->addCell(2500, $fancyTableFirstRowStyle)->addText('EMPLOYEE ID', $fancyTableFontStyle);
$table->addCell(3000, $fancyTableFirstRowStyle)->addText('NAME', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableFirstRowStyle)->addText('TYPE OF LEAVE', $fancyTableFontStyle);
$table->addCell(500, $fancyTableFirstRowStyle)->addText('DURATION', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableFirstRowStyle)->addText('DATE OF LEAVE', $fancyTableFontStyle);
$table->addCell(3000, $fancyTableFirstRowStyle)->addText('DETAILS OF LEAVE', $fancyTableFontStyle);
$table->addCell(500, $fancyTableFirstRowStyle)->addText('STATUS', $fancyTableFontStyle);


// passing quiries

// $query = "SELECT a.id, a.emp_id , a.type_of_leave , a.details_of_leave , a.no_of_working_days, a.status , b.emp_first_name , b.emp_middle_name , b.emp_last_name , b.emp_ext , b.emp_image , i.division , i.area_wrk_assign from emp_leaves a join employee b on a.emp_id = b.emp_id join item  i on a.emp_id = i.emp_id where i.division = '$department' and i.area_wrk_assign = '$office' ";

$query = "SELECT a.id, a.emp_id , a.type_of_leave , a.details_of_leave , a.no_of_working_days, a.status , a.leave_from_date ,a.leave_to_date, b.emp_first_name , b.emp_middle_name , b.emp_last_name , b.emp_ext , b.emp_image from emp_leaves a join employee b on a.emp_id = b.emp_id where YEAR(a.leave_from_date) = ".$year." AND MONTH(a.leave_from_date) = ".$mon." ORDER BY id DESC " ;

$result = mysqli_query($conn, $query);
$len = mysqli_num_rows($result) ; 
    if (mysqli_num_rows($result) > 0) {

// data in table 

        while ($mydata = mysqli_fetch_assoc($result)) {
            $mydata = mysqli_fetch_assoc($result);

            for ($r = 1; $r <= $len; $r++) {
                $emp_name = strtoupper($mydata['emp_first_name'] . '' . $mydata['emp_middle_name'] . '' . $mydata['emp_last_name']);

                $obj = json_decode($mydata['details_of_leave']);
                    if(isset($obj->details_of_leave_option) ){
                    $details =  $obj->details_of_leave_option . ' , ' . $obj->details_text;
                }else {
                    $details = $mydata['details_of_leave'];
                }

                if($mydata['status'] == '1'){
                    $status = 'Approved';
                }else if($mydata['status'] == '2'){
                    $status = 'Pending';
                }else if($mydata['status'] == '0'){
                    $status = 'Disapproved';
                }else {
                    $status = '';
                }

                $leave_from = date("m/d/Y", strtotime($mydata['leave_from_date']));
		        $leave_to = date("m/d/Y", strtotime($mydata['leave_to_date']));

            $table->addRow(300);
            $table->addCell(2500, $fancyTableStyle)->addText($mydata['emp_id']);
            $table->addCell(3000, $fancyTableStyle)->addText($emp_name);
            $table->addCell(2000, $fancyTableStyle)->addText($mydata['type_of_leave']);
            $table->addCell(500, $fancyTableStyle)->addText($mydata['no_of_working_days']);
            $table->addCell(2000, $fancyTableStyle)->addText($leave_from.' - '.$leave_from);
            $table->addCell(3000, $fancyTableStyle)->addText($details);
            $table->addCell(500, $fancyTableStyle)->addText($status);
        }
    }
    }else {
        for ($r = 1; $r <= 1; $r++) {
            $table->addRow(300);
            for ($c = 1; $c <= 1; $c++) {
                $text = 'No Data Available';
                $table->addCell(5000)->addText($text);
            }
    }
    }

// Create writer to convert document to xml
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($document_with_table, 'Word2007');

// Get all document xml code
$fullxml = $objWriter->getWriterPart('Document')->write();

// Get only table xml code
$tablexml = preg_replace('/^[\s\S]*(<w:tbl\b.*<\/w:tbl>).*/', '$1', $fullxml);

//Open template with ${table}
$template_document = new \PhpOffice\PhpWord\TemplateProcessor('../reports_doc/leave_summary.docx');

// Replace mark by xml code of table
 $template_document->setValues(array(
                'date' => $new_Date,
                'table' => $tablexml
            ));

$filename = $date . " - leave_summary.docx";

 header("Content-Disposition: attachment; filename=".$filename);

//save template with table
$template_document->saveAs('php://output');
        }
