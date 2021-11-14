<?php 
$emp_id =  $_GET["cer_leave_credits"];

if (empty($emp_id)) {
    header("Location:../emp_mang");
}else {
   
            // generate report
            $templateProcessor = new PhpOffice\PhpWord\TemplateProcessor('../reports_doc/cer_leave_credits.docx'); 

            $filename = $emp_id . " - certificate_leave_credits.docx";

            header("Content-Disposition: attachment; filename=".$filename);
            $templateProcessor->saveAs('php://output');

        }
   


?>