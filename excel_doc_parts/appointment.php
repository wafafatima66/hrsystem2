<?php 
$item_no =  $_GET["appointment"];

if (empty($item_no)) {
    header("Location:../hiring_publication?appointment_fail");
}else {

    // echo $item_no ; 

    // $query = "Select e.emp_first_name , e.emp_last_name , e.emp_middle_name , e.emp_ext , i.position , i.salary_grade , i.area_wrk_assign , i.monthly_salary , i.nature , i.item_no from employee e JOIN item i on e.emp_id = i.emp_id where i.item_no = '$item_no'";

    $query = "Select e.emp_first_name , e.emp_last_name , e.emp_middle_name , e.emp_ext , e.emp_gender , e.emp_resi_add_barangay , e.emp_resi_add_municipal , e.emp_resi_add_street , i.position , i.salary_grade , i.area_wrk_assign , i.monthly_salary , i.nature , i.item_no , i.date_orgappnt_lhmrh, p.date_of_publication , p.end_of_publication from item i JOIN employee e on e.emp_id = i.emp_id JOIN publication p on i.item_no = p.item_number where i.item_no = '$item_no'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($mydata = mysqli_fetch_assoc($result)) {

            $emp_first_name = $mydata['emp_first_name'] ;
            $emp_last_name = $mydata['emp_last_name'] ;
            $emp_middle_name = $mydata['emp_middle_name'] ;
            $emp_ext = $mydata['emp_ext'] ;
            $emp_gender = $mydata['emp_gender'] ;
            $emp_resi_add_barangay = strtoupper($mydata['emp_resi_add_barangay']) ;
            $emp_resi_add_municipal = strtoupper($mydata['emp_resi_add_municipal']) ;
            $emp_resi_add_street = strtoupper($mydata['emp_resi_add_street']) ;
            $position = strtoupper($mydata['position']) ;
            $salary_grade = $mydata['salary_grade'] ;
            $division = strtoupper($mydata['area_wrk_assign']) ;
            $monthly_salary = number_format($mydata['monthly_salary']) ;
            $nature = strtoupper($mydata['nature']) ;
            $item_no = strtoupper($mydata['item_no']) ;
            $date_orgappnt_lhmrh = date("jS \\d\\a\\y\\ \\o\\f F , Y", strtotime($mydata['date_orgappnt_lhmrh'])) ;

            $appointment_date_2 = date("F d , Y", strtotime($mydata['date_orgappnt_lhmrh'])) ;

            // echo $date_orgappnt_lhmrh ;
            // exit ; 

            $date_of_publication  = date("F d , Y", strtotime($mydata['date_of_publication']));
            $end_of_publication = date("F d , Y", strtotime($mydata['end_of_publication']));

            $emp_name =   strtoupper ($emp_last_name . " " . $emp_first_name  . " " .  $emp_middle_name  . " " .  $emp_ext);

            $salary_word =  strtoupper(convertNumberToWord($monthly_salary));

            if($emp_gender == "Male"){
                $title = "Mr" ;
            }else if ($emp_gender == "Female"){
                $title = "Ms" ;
            }else $title = "Ms" ;


            // generate report
            $templateProcessor = new PhpOffice\PhpWord\TemplateProcessor('../reports_doc/appointment_doc.docx'); 

            $templateProcessor->setValues(array(
                'empName' => $emp_name,
                'position' => $position,
                'SG' => $salary_grade,
                'department' => $division,
                'salaryWord' => $salary_word,
                'salary' => $monthly_salary,
                'nature' => $nature,
                'itemNum' => $item_no,
                'date-of-publication'=>$date_of_publication,
                'end-of-publication'=>$end_of_publication,
                'barangay'=>$emp_resi_add_barangay,
                'municipality'=>$emp_resi_add_municipal,
                'province'=>$emp_resi_add_street,
                'title'=>$title,
                'appointment-date-2'=>$appointment_date_2,
                'appointment-date' => $date_orgappnt_lhmrh,
                'lastName'=>strtoupper( $emp_last_name),

            ));

            header("Content-Disposition: attachment; filename=".$filename);
            $templateProcessor->saveAs('php://output');

        }
    }else {
            header("Location:../hiring_publication?appointment_no");
        }

        
}

?>