<?php

include "../includes/conn.php";
if (!empty($_FILES["file"]["name"])) {
    
        $emp_id =  $_POST['emp_id'];

        $emp_image = "employee - " . $emp_id . "-" . $_FILES["file"]["name"];

    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "../emp_img/" . $emp_image;


    //checking file extension
    $text1 = explode('.', $_FILES['file']['name']);
    $text = strtolower(end($text1));
    $file_ext = strtolower($text);
    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        echo  '<script>toastr.error("Image must be JPG , JPEG ,PNG format ! ")</script>';
    } else {
        (move_uploaded_file($tempname, $folder));
        $sql = "UPDATE employee SET emp_image = '$emp_image' WHERE  emp_id ='$emp_id'";
        if (mysqli_query($conn, $sql)) {
            echo '<img src="'.$folder.'" alt="emp-image" style="width:100%;height:100%">';
            }
        
    }
    }
    
    


?>