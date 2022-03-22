<?php include '../config.php';

include SITE_ROOT .'/includes/header.php'; ?>

<style>
      .ul-search{
            list-style: none;
      }
      .li-search{
            padding: 8px;
            background-color: #e6e6e6;
      }
</style>
<?php
require '../includes/conn.php';
if (isset($_POST['submit'])) {

    $total = count($_FILES['upload_file']['name']);
    for( $i=0 ; $i < $total ; $i++ ) {

  $file_date = date("Y-m-d"); 

  $file_name =  $_FILES['upload_file']['name'][$i];
  $file_loc = $_FILES['upload_file']['tmp_name'][$i];
  $file_size = $_FILES['upload_file']['size'][$i];
  $file_type = $_FILES['upload_file']['type'][$i];
  $path = "../files/";


    if (move_uploaded_file($file_loc, $path . $file_name)) {
      $sql = "INSERT INTO files (name, type, size,date) VALUE ('$file_name', '$file_type', '$file_size', '$file_date')";

      if (mysqli_query($conn, $sql)) {
        echo  '<script>toastr.success("File is uploaded succesfully !")</script>';
      } else {
        echo  $conn->error;
        echo  '<script>toastr.error("File not uploaded !")</script>';
      }
    } else {
      echo  '<script>toastr.error("Could not move to location!")</script>';
    }
  
}
}
?>

<div class="container mt-5">

<form  method="post" action="" enctype="multipart/form-data">
      <div class="row mt-2">
      
            <div class="col-lg-12 col-12 upload-file-class">
                  <label style="width: 100%;">
                        <div class="upload-field">
                              <div class="inner-upload-field p-4">
                                    <h4 class="text-center">Upload Files</h4>
                              </div>
                        </div>
                        <input type="file" style="display: none;" multiple  name="upload_file[]">
                  </label>
                  <span class="message h6" style="color: #505A43;"></span>
            </div>

            <div class="col-lg-12 col-sm-12 mt-2 d-flex justify-content-end">
                  <button class="btn button-2" type="submit" name="submit">Upload</button>
            </div>
      
      </div>
      </form>

      <div class="row mt-1">
            <div class="col-lg-12 col-sm-12 ">
                  <h4 class="text-center">Search</h4>

                  <div class="d-flex justify-content-center">
                        <input type="text" id="search" class="form-control text-input"
                              style="width: 30%; border-radius:20px">
                  </div>

                  <div class="d-flex justify-content-center mt-2">
                        <button class="btn button-2" style="border-radius:12px" id="submit">Go</button>
                  </div>

            </div>
      </div>

      <div class="row mt-3" style="border-top:2px solid #505A43 ;">
      </div>

      <div class="row mt-2">
            <!-- Search Result -->
            <div id="table-data"></div>
      </div>

</div>

<script>
      $(".upload-file-class").change(function () {
            var numFiles = $("input:file", this)[0].files.length;
            $('.message').html(numFiles+' files uploaded');
});

function loadData(search) {
                  $.ajax({
                        url: "search.php",
                        type: "POST",
                        cache: false,
                        data: {
                              search: search
                        },
                        success: function (response) {
                              $("#table-data").html(response);
                        }
                  });
            }
            loadData();

            // Pagination code
            $(document).on("click", "#submit", function () {
                  var search = $('#search').val();
                  loadData(search);
            });
</script>