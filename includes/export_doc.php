<?php 
require "../vendor/autoload.php";

require '../includes/conn.php';

function convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundred = (int) ($num_levels[$i] / 100);
        $hundred = ($hundred ? ' ' . $list1[$hundred] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundred . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
}

if (isset($_GET["appointment"])) {

    $item_no =  $_GET["appointment"];

    if (empty($item_no)) {
        header("Location:../hiring_publication?appointment_fail");
    }else {

        // echo $item_no ; 

        $query = "Select e.emp_first_name , e.emp_last_name , e.emp_middle_name , e.emp_ext , i.position , i.salary_grade , i.area_wrk_assign , i.monthly_salary , i.nature , i.item_no from employee e JOIN item i on e.emp_id = i.emp_id where i.item_no = '$item_no'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($mydata = mysqli_fetch_assoc($result)) {

                $emp_first_name = $mydata['emp_first_name'] ;
                $emp_last_name = $mydata['emp_last_name'] ;
                $emp_middle_name = $mydata['emp_middle_name'] ;
                $emp_ext = $mydata['emp_ext'] ;
                $position = strtoupper($mydata['position']) ;
                $salary_grade = $mydata['salary_grade'] ;
                $division = strtoupper($mydata['area_wrk_assign']) ;
                $monthly_salary = number_format($mydata['monthly_salary']) ;
                $nature = strtoupper($mydata['nature']) ;
                $item_no = strtoupper($mydata['item_no']) ;

                $emp_name =   strtoupper ($emp_last_name . " " . $emp_first_name  . " " .  $emp_middle_name  . " " .  $emp_ext);

                $salary_word =  strtoupper(convertNumberToWord($monthly_salary));


                // generate report
                $templateProcessor = new PhpOffice\PhpWord\TemplateProcessor('../reports_doc/template.docx'); 

                $templateProcessor->setValues(array(
                    'empName' => $emp_name,
                    'position' => $position,
                    'SG' => $salary_grade,
                    'department' => $division,
                    'salaryWord' => $salary_word,
                    'salary' => $monthly_salary,
                    'nature' => $nature,
                    'itemNum' => $item_no
                ));

                $filename = $item_no . " - appointment_report.docx";

                header("Content-Disposition: attachment; filename=".$filename);
                $templateProcessor->saveAs('php://output');

            }
        }else {
                header("Location:../hiring_publication?appointment_no");
            }

            
    }
}
