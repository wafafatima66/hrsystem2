<?php

include "../includes/conn.php";

if (!empty($_FILES["file"]["name"])) {
    $userid =  $_POST['user_id'];
    // $emp_image = "employee - " . $emp_id . "-" . $_FILES["file"]["name"];
    $admin_photo = "user-" . $userid . "-" . $_FILES["file"]["name"];

    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "../img/" . $admin_photo;


    //checking file extension
    $text1 = explode('.', $_FILES['file']['name']);
    $text = strtolower(end($text1));
    $file_ext = strtolower($text);
    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        echo  '<script>toastr.error("Image must be JPG , JPEG ,PNG format ! ")</script>';
    } else {
        (move_uploaded_file($tempname, $folder));
        $sql = "UPDATE users SET admin_photo ='$admin_photo'  WHERE id = '$userid'";
       
        if (mysqli_query($conn, $sql)) {
            echo '<img src="'.$folder.'" alt="emp-image" style="width:100%;height:100%">';
            }
        
    }
}

?>