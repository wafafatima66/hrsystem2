<?php
require '../includes/conn.php';

if(isset($_POST['submit'])){

  // $training_id=$_POST['training_id'];
    $title_of_training=$_POST['title_of_training'];
    $from_date=$_POST['from_date'];
    $to_date=$_POST['to_date'];
    $type_of_training=$_POST['type_of_training'];
    $no_of_hrs=$_POST['no_of_hrs'];
    $venue=$_POST['venue'];
    $province=$_POST['province'];
    $agency=$_POST['agency'];

    // arrays
    $emp_id=$_POST['emp_id'];

    $speaker_last_name=$_POST['speaker_last_name'];
    $speaker_first_name=$_POST['speaker_first_name'];
    $speaker_middle_name=$_POST['speaker_middle_name'];
    $speaker_ext=$_POST['speaker_ext'];
    $title=$_POST['title'];

    $sponsor=$_POST['sponsor'];


  $speakers_name=array();
  $speakers_title = array();
  if (isset($_POST['speaker_first_name'])) {
        for ($i = 0; $i < count($_POST['speaker_first_name']); $i++) {
          $speakers_name[$i] = $_POST['speaker_first_name'][$i] .' '. $_POST['speaker_middle_name'][$i] .' '. $_POST['speaker_last_name'][$i];
          $speakers_title[$i]=$_POST['title'][$i];
    }
    $myjson = array(
              "speakers_name"=> $speakers_name,
              "speakers_title"=> $speakers_title
          );
          $speakers = json_encode($myjson);
  }

    
$sponsors = '';
if (!empty($_POST['sponsor'])) {
  for ($i = 0; $i < count($_POST['sponsor']); $i++) {
    $sponsors .= $_POST['sponsor'][$i] .',';
  }
}

$employees = '';
if (!empty($_POST['emp_id'])) {
  for ($i = 0; $i < count($_POST['emp_id']); $i++) {
    $employees .= $_POST['emp_id'][$i] .',';
  }
}

if (!empty($_POST['emp_id'])) {
  for ($i = 0; $i < count($_POST['emp_id']); $i++) {

  $emp_id = $_POST['emp_id'][$i];
      
$sql = "INSERT INTO emp_training (emp_id, title_of_training, training_type_of_position, training_no_of_hrs, training_from_date, training_to_date, training_conducted_by)
VALUES ('$emp_id', '$title_of_training', '$type_of_training', '$no_of_hrs', '$from_date', '$to_date', '$sponsors')";

mysqli_query($conn, $sql);

  }
}

$sql1 = "INSERT INTO training_table (title_of_training,from_date ,to_date, type_of_training, no_of_hrs, venue,province,agency,speakers,sponsors,employees)

    VALUES ('$title_of_training','$from_date', '$to_date', '$type_of_training', '$no_of_hrs', '$venue','$province','$agency' ,'$speakers','$sponsors','$employees')";

    if (mysqli_query($conn, $sql1)) {
     echo  '<script>toastr.success("Training added successfully")</script>';
    } else {
        echo  '<script>toastr.error("Training not added. Try again !")</script>';
    } 

}

?>

<!--modal to add training-->

<div class="modal fade training_modal" id="addlearning" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">


      <form method="post" action="">

        <h3 class=" background-title-1 p-3 mb-3">ADD TRAINING</h3>

        <div class="modal-body ">
          <div class="container-box mt-0">

            <h6>TRAINEES/ATTENDESS</h6>

            <div class=" add_emp_id_wrapper">

              <div class="form-row">

                <div class="col-lg-6 col-sm-6">

                  <label for="">Employee</label>

                  <input type="text" class="form-control text-input emp_id" placeholder="Employee Id" name="emp_id[]">

                  <div id="space"></div>

                </div>

              </div>

            </div>

            <!-- <a href="" class="add_emp_id ml-3" title="Add field"><i class="fa fa-plus"></i></a> -->

            <div class="form-row mt-1">
              <div class="col-lg-3 col-sm-6 ">
                <a class=" btn button-1 add_emp_id">Add</a>
              </div>
            </div>


            <h6 class="pt-2">TRAINING INFORMATION</h6>

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



              <div class="add_speaker_wrapper mt-3">

                <div class="form-row ">

                  <div class="col-lg-12 col-sm-6">
                    <label>Speaker<span style="text-transform: lowercase;">/s</span></label>
                  </div>

                  <div class="col-lg-2 col-sm-6">
                    <input type="text" class="form-control text-input" placeholder="LastName"
                      name="speaker_last_name[]">
                  </div>

                  <div class="col-lg-2 col-sm-6">
                    <input type="text" class="form-control text-input" placeholder="FirstName"
                      name="speaker_first_name[]" required>
                  </div>

                  <div class="col-lg-2 col-sm-6">
                    <input type="text" class="form-control text-input" placeholder="MiddleName"
                      name="speaker_middle_name[]">
                  </div>

                  <div class="col-lg-2 col-sm-6">
                    <input type="text" class="form-control text-input" placeholder="Ext" name="speaker_ext[]">
                  </div>


                  <div class="col-lg-4 col-sm-6">
                    <input type="text" class="form-control text-input" name="title[]" placeholder="Title">
                  </div>


                </div>

              </div>

              <!-- <a href="" class="add_speaker" title="Add field"><i class="fa fa-plus"></i></a> -->

              <div class="form-row mt-1">
                <div class="col-lg-3 col-sm-6 ">
                  <a class="btn button-1 add_speaker">Add</a>
                </div>
              </div>

            </div>

            <div class="form-row mt-2">

              <div class="col-lg-3 col-sm-6">
                <label>Agency</label>
              </div>

              <div class="col-lg-4 col-sm-6">
                <input type="text" class="form-control text-input" name="agency">
              </div>

            </div>

            <div class="add_sponsor_wrapper ">

              <div class="form-row mt-2">
                <div class="col-lg-3 col-sm-6">
                  <label>Sponsor Agency<span style="text-transform: lowercase;">/ies</span></label>
                </div>

                <div class="col-lg-4 col-sm-6">
                  <input type="text" class="form-control text-input" name="sponsor[]" placeholder="Sponsor">
                </div>
              </div>

            </div>

            <!-- <a href="" class="add_sponsor" title="Add field"><i class="fa fa-plus"></i></a> -->

            <div class="form-row mt-1">
              <div class="col-lg-3 col-sm-6 ">
                <a class=" btn button-1 add_sponsor">Add</a>
              </div>
            </div>


          </div>


          <div class="modal-footer">
            <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
            </button>
            <button type="submit" name="submit" class="btn button-1 ">Submit</button>
          </div>

      </form>
    </div>
  </div>
</div>
</div>



<script type="text/javascript">
  $(document).ready(function () {
    var maxField = 10;
    var x = 1;

    var fieldHTML1 =
      '<div class="form-row mt-2"> <div class="col-lg-6 col-sm-6"><input type="text" class="form-control text-input emp_id" placeholder="Employee Id"  name="emp_id[]"> </div> </div> </div>';

    var fieldHTML2 =
      '<div class="form-row mt-2 "> <div class="col-lg-12 col-sm-6"></div> <div class="col-lg-2 col-sm-6"> <input type="text" class="form-control text-input" placeholder="LastName" name="speaker_last_name[]"> </div> <div class="col-lg-2 col-sm-6"> <input type="text" class="form-control text-input" placeholder="FirstName" name="speaker_first_name[]"> </div> <div class="col-lg-2 col-sm-6"> <input type="text" class="form-control text-input" placeholder="MiddleName" name="speaker_middle_name[]"> </div> <div class="col-lg-2 col-sm-6"> <input type="text" class="form-control text-input" placeholder="Ext" name="speaker_ext[]"> </div> <div class="col-lg-4 col-sm-6"> <input type="text" class="form-control text-input" name="title[]" placeholder="Title"> </div> </div>';

    var fieldHTML3 =
      '  <div class="form-row mt-2"> <div class="col-lg-3 col-sm-6"> </div> <div class="col-lg-4 col-sm-6"> <input type="text" class="form-control text-input" name="sponsor[]" placeholder="Sponsor"> </div> </div>';


    $('.add_emp_id').click(function () {
      if (x < maxField) {
        x++;
        $('.add_emp_id_wrapper').append(fieldHTML1); //Add field html
      }
    });

    $('.add_speaker').click(function () {
      if (x < maxField) {
        x++;
        $('.add_speaker_wrapper').append(fieldHTML2); //Add field html
      }
    });

    $('.add_sponsor').click(function () {
      if (x < maxField) {
        x++;
        $('.add_sponsor_wrapper').append(fieldHTML3); //Add field html
      }
    });

  });
</script>