<?php 

// editing aplicant 

if (isset($_POST['edit_publication'])) {

  $id = $_POST['id'];
  $date_of_publication = $_POST['date_of_publication'];
  $end_of_publication = $_POST['end_of_publication'];
  $item_number = $_POST['item_number'];
  // $salary_grade = $_POST['salary_grade'];
  // $plantilla = $_POST['plantilla'];
  // $place_of_assignment = $_POST['place_of_assignment'];
  // $date_created = $_POST['date_created'];

  
  $del_sql_1 = "DELETE FROM publication WHERE id='$id'";
  $conn->query($del_sql_1);

  $sql = "INSERT INTO publication (
    date_of_publication  , item_number  , end_of_publication) VALUES (  '$date_of_publication'  , '$item_number' , '$end_of_publication')";



  if (mysqli_query($conn, $sql)) {

      echo  '<script>toastr.success("Publication updated successfully")</script>';
  } else {
      echo  '<script>toastr.error("Publication not updated. Try again !")</script>';
  }
}

?>
