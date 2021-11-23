<?php 
$emp_id =  $_GET["cer_emp"];

if (empty($emp_id)) {
    header("Location:../emp_mang");
}else {
   
            $query = "Select e.emp_first_name , e.emp_last_name , e.emp_middle_name , e.emp_gender , i.position from employee e join item i on e.emp_id = i.emp_id where e.emp_id = '$emp_id'";

            $result = mysqli_query($conn, $query);
        
            if (mysqli_num_rows($result) > 0) {
                while ($mydata = mysqli_fetch_assoc($result)) {
        
                    $emp_first_name = $mydata['emp_first_name'] ;
                    $emp_last_name = $mydata['emp_last_name'] ;
                    $emp_middle_name = $mydata['emp_middle_name'] ;
                    $emp_gender = $mydata['emp_gender'] ;
                    $position = $mydata['position'] ;
                    $date = date("jS \\d\\a\\y\\ \\o\\f F , Y") ;
                }
            }

            if($emp_gender == "Male"){
                $title = "MR" ;
            }else if ($emp_gender == "Female"){
                $title = "MS" ;
            }else $title = "MS" ;

            $emp_name = strtoupper($title . '. ' . $emp_first_name . '' . $emp_middle_name . '' . $emp_last_name) ; 
            // generate report
            $templateProcessor = new PhpOffice\PhpWord\TemplateProcessor('../reports_doc/cer_emp.docx'); 

            $templateProcessor->setValues(array(
                'empName' => $emp_name,
                'position' => $position,
                'date' => $date
            ));

            $filename = $emp_id . " - certificate_employment.docx";

            header("Content-Disposition: attachment; filename=".$filename);
            $templateProcessor->saveAs('php://output');

        }
   


?>