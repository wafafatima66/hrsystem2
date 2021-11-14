<?php 
$emp_id =  $_GET["cer_emp"];

if (empty($emp_id)) {
    header("Location:../emp_mang");
}else {
   
            // generate report
            $templateProcessor = new PhpOffice\PhpWord\TemplateProcessor('../reports_doc/cer_emp.docx'); 

            $filename = $emp_id . " - certificate_employment.docx";

            header("Content-Disposition: attachment; filename=".$filename);
            $templateProcessor->saveAs('php://output');

        }
   


?>