<?php 

// editing termination

if (isset($_POST['edit_termination'])) {

  
  $id = $_POST['id'];
  $emp_id = $_POST['emp_id'];
  $termination_reason = $_POST['termination_reason'];
  $date_of_effectivity = $_POST['date_of_effectivity'];
  $termination_details = $_POST['termination_details'];



  $targetDir = "../files/";
  $fileNames = array_filter($_FILES['termination_files']['name']);
  // $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
  if (!empty($fileNames)) {
      foreach ($_FILES['termination_files']['name'] as $key => $val) {
          // File upload path 
          $fileName = "termination - " . $emp_id . "-" .  basename($_FILES['termination_files']['name'][$key]);

          $targetFilePath = $targetDir . $fileName;

          // Check whether file type is valid 
          $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

          // Upload file to server 
          if (move_uploaded_file($_FILES["termination_files"]["tmp_name"][$key], $targetFilePath)) {
              // Image db insert sql 
              $sql_files = "INSERT INTO termination_file (file_name, emp_id) VALUES ('$fileName' , '$emp_id') ";
              if (mysqli_query($conn, $sql_files)) {
                  echo  '<script>toastr.success("Files uploaded")</script>';
              }
          } else {
              echo  '<script>toastr.error("Files Not uploaded ! Try again")</script>';
          }
      }
  }

  $del_sql_1 = "DELETE FROM termination WHERE id='$id'";
  $conn->query($del_sql_1);

  $sql = "INSERT INTO termination (
      emp_id  , termination_reason, date_of_effectivity , termination_details ) VALUES (  '$emp_id' , '$termination_reason', '$date_of_effectivity' ,' $termination_details' )";


  if (mysqli_query($conn, $sql)) {
      echo  '<script>toastr.success("Employee Status updated")</script>';
  } else {
      echo  '<script>toastr.error("Employee status not updated. Try again !")</script>';
  }
}

?>
