<?php
require '../includes/conn.php';

if (isset($_POST['post_submit'])) {

  // $training_id=$_POST['training_id'];
  $title_of_training = $_POST['title_of_training'];
  $from_date = $_POST['from_date'];
  $to_date = $_POST['to_date'];
  $type_of_training = $_POST['type_of_training'];
  $no_of_hrs = $_POST['no_of_hrs'];
  $venue = $_POST['venue'];
  $training_details = $_POST['training_details'];

  // arrays


  $sponsor = $_POST['sponsor'];


  $sponsors = '';
  if (!empty($_POST['sponsor'])) {
    for ($i = 0; $i < count($_POST['sponsor']); $i++) {
      $sponsors .= $_POST['sponsor'][$i] . ',';
    }
  }

  // file 

  if (!empty($_FILES["file"]["name"])) {
    $allowed = array('pdf');
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
      echo  '<script>toastr.error("File must be PDF ! ")</script>';
    } else {
      $filename = time() . "-" . $_FILES["file"]["name"];
      $tempname = $_FILES["file"]["tmp_name"];
      $folder = "../files/" . $filename;
      $file_size = $_FILES['file']['size'];
      $file_type = $_FILES['file']['type'];
      $file_date = date("Y-m-d");
      move_uploaded_file($tempname, $folder);
    }
  } else {
    $filename = "";
  }

  $sql1 = "INSERT INTO training_post_table (title_of_training,from_date ,to_date, type_of_training, no_of_hrs,venue,sponsors,training_details,file_name)

  VALUES ('$title_of_training','$from_date', '$to_date', '$type_of_training', '$no_of_hrs', '$venue','$sponsors','$training_details','$filename')";

  if (mysqli_query($conn, $sql1)) {
    echo  '<script>toastr.success("Post Training added successfully")</script>';
  } else {
    echo  '<script>toastr.error("Post Training not added. Try again !")</script>';
  }
}

?>

<!--modal to add training-->

<div class="modal fade training_modal" id="addpost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">


      <form method="post" action="" enctype="multipart/form-data">

        <h3 class=" background-title-1 p-3 mb-3">TRAINING INVITATION</h3>

        <div class="modal-body ">
          <div class="container-box mt-0">

            <!-- <h6>TRAINEES/ATTENDESS</h6> -->


            <div class="form-row">

              <div class="col-lg-6 col-sm-6">
                <label>Title of training</label>
                <input type="text" class="form-control text-input" name="title_of_training">
              </div>


              <div class="col-lg-6 col-sm-6">
                <label>Inclusive Dates</label>
                <div class="form-inline">
                  <input type="date" class="form-control text-input" name="from_date" style="width:50%">
                  <input type="date" class="form-control text-input" name="to_date" style="width:50%">
                </div>
              </div>

              <div class="col-lg-3 col-sm-6">
                <label>Type</label>
                <select class="form-control text-input" name="type_of_training">
                  <option value="">SELECT</option>
                  <option value="Technical">Technical</option>
                  <option value="Managerial">Managerial</option>
                  <option value="Supervisory">Supervisory</option>
                  <option value="Clerical">Clerical</option>
                </select>
              </div>


              <div class="col-lg-3 col-sm-6">
                <label>No. of Hours</label>
                <input type="text" class="form-control text-input" name="no_of_hrs">
              </div>

              <div class="col-lg-3 col-sm-6">
                <label>Venue</label>
                <input type="text" class="form-control text-input" name="venue">
              </div>

              <div class="col-lg-3 col-sm-6">
                <label>Address</label>
                <input class="form-control text-input" name="province">
              </div>

            </div>

            <div class="form-row mt-3">
              <div class="col-lg-12 col-sm-6">
                <label for="">Basic Information</label>
                <textarea name="training_details" class="form-control text-input"></textarea>
              </div>
            </div>




            <div class="form-row mt-2">

              <div class="col-lg-12 col-sm-6">
                <label>Sponsor</label>
              </div>

              <div class="col-lg-4 col-sm-6">
                <input type="text" class="form-control text-input" name="sponsor[]" placeholder="Sponsor">
              </div>

              <div class="col-lg-4 col-sm-6">
                <input type="text" class="form-control text-input" name="sponsor[]" placeholder="Sponsor">
              </div>

              <div class="col-lg-4 col-sm-6">
                <input type="text" class="form-control text-input" name="sponsor[]" placeholder="Sponsor">
              </div>

            </div>

            <div class="form-row mt-4 ">
              <div class="col-lg-6 col-sm-6">
              <input type="file" name="file" accept=".pdf">
              </div>
              
            </div>

          </div>


          <div class="modal-footer">
            <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
            </button>
            <button type="submit" name="post_submit" class="btn button-1 ">Submit</button>
          </div>

      </form>
    </div>
  </div>
</div>
</div>

<script src="../learning/learning.js"></script>