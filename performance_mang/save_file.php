<?php 

require '../includes/conn.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $emp_id = $_POST['emp_id'];
    $excel_file_type = $_POST['excel_file_type'];
    $year = $_POST['year'];
    $rating_period = $_POST['rating_period'];
    $rating = $_POST['rating'];
    // $rating_period = preg_replace('/\s+/', ' ', $_POST['rating_period']);


    // echo $rating_period ; 
    // die ; 

    $file_date = date("Y-m-d");

    $date_of_submission = $_POST['date_of_submission'];
    $date_of_resubmission = $_POST['date_of_resubmission'];
    $remarks = $_POST['remarks'];
    
    // $excel_file_name = $_POST['excel_file_name'];
   

    if (!empty($_FILES["excel_file_name"]["name"])) {
        $excel_file_name = "pdf-".time().'-' . $emp_id . "-" . $_FILES["excel_file_name"]["name"];
        $tempname = $_FILES["excel_file_name"]["tmp_name"];
        $folder = "../files/" . $excel_file_name;
        $file_size = $_FILES['excel_file_name']['size'];
        //checking file extension

        $text1 = explode('.', $_FILES['excel_file_name']['name']);
        $text = strtolower(end($text1));
        $file_ext = strtolower($text);
        $extensions = array("pdf");

        if (in_array($file_ext, $extensions) === false) {
            header("Location:../performance_mang/emp_profile.php?id=".$id."&file");
        } else {
            (move_uploaded_file($tempname, $folder));
            
            $sql = "INSERT INTO emp_performance (emp_id ,excel_file_type,year ,rating_period ,rating ,excel_file_name ,date_of_submission ,date_of_resubmission ,remarks) VALUES ( 
                 '$emp_id', 
                 '$excel_file_type', 
                 '$year','$rating_period' , '$rating', '$excel_file_name' , '$date_of_submission' , '$date_of_resubmission' , '$remarks')";

            mysqli_query($conn, $sql);
            // take id from emp_performance table 
            $query = "SELECT max(id) as id FROM emp_performance ";

            $runquery = $conn->query($query);
                while ($mydata = $runquery->fetch_assoc()) {
                    $performance_file_id = ($mydata['id']);
            }

                $sql1 = "INSERT INTO emp_file (emp_id ,file_folder, file_name, file_type, file_size,file_date,performance_file_id) VALUE ('$emp_id' ,'IPCR', '$excel_file_name', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', '$file_size', '$file_date','$performance_file_id')";

                    if ( mysqli_query($conn, $sql1)) {
                        header("Location:../performance_mang/emp_profile.php?id=".$id."&success");
                    } else {
                        header("Location:../performance_mang/emp_profile.php?id=".$id."&error");
                    }
        }
    }

    
}
