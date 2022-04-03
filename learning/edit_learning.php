<?php

include '../config.php';
include SITE_ROOT . '/includes/header.php';
?>

<?php
if (isset($_POST['submit'])) {
    $learning_id=$_POST['learning_id'];
  $title_of_training = $_POST['title_of_training'];
  $from_date = $_POST['from_date'];
  $to_date = $_POST['to_date'];
  $type_of_training = $_POST['type_of_training'];
  $no_of_hrs = $_POST['no_of_hrs'];
  $venue = $_POST['venue'];
  $province = $_POST['province'];
  $agency = $_POST['agency'];

  // arrays
  $emp_id = $_POST['emp_id'];
  $speaker_full_name = $_POST['speaker_full_name'];
  $title = $_POST['title'];
  $sponsor = $_POST['sponsor'];


  $speakers_name = array();
  $speakers_title = array();
  if (isset($_POST['speaker_full_name'])) {
    for ($i = 0; $i < count($_POST['speaker_full_name']); $i++) {
      // $speakers_name[$i] = $_POST['speaker_first_name'][$i] . ' ' . $_POST['speaker_middle_name'][$i] . ' ' . $_POST['speaker_last_name'][$i];
      $speakers_name[$i] = $_POST['speaker_full_name'][$i] ;
      $speakers_title[$i] = $_POST['title'][$i];
    }
    $myjson = array(
      "speakers_name" => $speakers_name,
      "speakers_title" => $speakers_title
    );
    $speakers = json_encode($myjson);
  }


  $sponsors = '';
  if (!empty($_POST['sponsor'])) {
    for ($i = 0; $i < count($_POST['sponsor']); $i++) {
      $sponsors .= $_POST['sponsor'][$i] . ',';
    }
  }

  $employees = '';
  if (!empty($_POST['emp_id'])) {
    for ($i = 0; $i < count($_POST['emp_id']); $i++) {
      $employees .= $_POST['emp_id'][$i] . ',';
    }
  }

  $del = "DELETE FROM training_table WHERE id = '$learning_id'";
  $del1 = "DELETE FROM emp_training WHERE learning_id = '$learning_id'";
  mysqli_query($conn, $del) ; mysqli_query($conn, $del1);

  $sql1 = "INSERT INTO training_table (id , title_of_training,from_date ,to_date, type_of_training, no_of_hrs, venue,province,agency,speakers,sponsors,employees)

    VALUES ('$learning_id','$title_of_training','$from_date', '$to_date', '$type_of_training', '$no_of_hrs', '$venue','$province','$agency' ,'$speakers','$sponsors','$employees')";

  

  if (mysqli_query($conn, $sql1)) {
    // take id from training_table table 
//    $query = "SELECT max(id) as id FROM training_table ";

//    $runquery = $conn->query($query);
//        while ($mydata = $runquery->fetch_assoc()) {
//            $learning_id = ($mydata['id']);
//    }

  if (!empty($_POST['emp_id'])) {

    for ($i = 0; $i < count($_POST['emp_id']); $i++) {

      $emp_id = $_POST['emp_id'][$i];

      $sql = "INSERT INTO emp_training (emp_id, title_of_training, training_type_of_position, training_no_of_hrs, training_from_date, training_to_date, training_conducted_by,learning_id)
      VALUES ('$emp_id', '$title_of_training', '$type_of_training', '$no_of_hrs', '$from_date', '$to_date', '$sponsors','$learning_id')";

      mysqli_query($conn, $sql);
    }
  }
    echo '<script>toastr.success("Training updated successfully")</script>';
  } else {
    echo  '<script>toastr.error("Training not updated. Try again !")</script>';
  }
}
?>


<?php
if (isset($_GET['learning_id'])) {

    $learning_id = $_GET['learning_id'];
    $query = "SELECT * FROM training_table WHERE id = '$learning_id'  ";

    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount != 0) {
        while ($mydata = $runquery->fetch_assoc()) {


?>
            <form method="post" action="">

            <input type="hidden" value="<?php echo $mydata['id']?>" name="learning_id">
                <h3 class=" background-title-1 p-3 mb-3">EDIT TRAINING</h3>

                <div class="modal-body">
                    <div class="container-box mt-0">

                        <h6>TRAINEES/ATTENDESS</h6>

                        <div class="add_emp_id_wrapper">

                            <div class="form-row">
                                <div class="col-lg-6 col-sm-6">
                                    <label for="">Employee</label>
                                </div>
                            </div>
                            <?php
                            if (!empty($mydata['employees'])) { ?>
                                <?php
                                $employees = explode(',', $mydata['employees']);
                                foreach (array_filter($employees) as $employee) { ?>
                                    <div class="form-row">
                                        <div class="col-lg-6 col-sm-6">
                                            <input type="text" class="form-control text-input emp_id mt-2" placeholder="Employee Id" name="emp_id[]" value="<?php echo $employee; ?>">
                                            <div id="space"></div>
                                        </div>
                                    </div>
                                <?php   }
                            } else { ?>
                                <div class="form-row">
                                    <div class="col-lg-6 col-sm-6">
                                        <input type="text" class="form-control text-input emp_id mt-2" placeholder="Employee Id" name="emp_id[]">
                                        <div id="space"></div>
                                    </div>
                                </div>
                            <?php } ?>

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
                                <input type="text" class="form-control text-input" name="title_of_training" value="<?php echo $mydata['title_of_training'] ?>">
                            </div>


                            <div class="col-lg-6 col-sm-6">
                                <label>Inclusive Dates</label>
                                <div class="form-inline">
                                    <input type="date" class="form-control text-input" name="from_date" style="width:50%" value="<?php echo $mydata['from_date'] ?>">
                                    <input type="date" class="form-control text-input" name="to_date" style="width:50%" value="<?php echo $mydata['to_date'] ?>">
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <label>Type</label>
                                <select class="form-control text-input" name="type_of_training">
                                    <option value="">SELECT</option>
                                    <option value="Technical" <?php echo ($mydata['type_of_training'] == 'Technical') ? "selected" : "" ?>>Technical
                                    </option>
                                    <option value="Managerial" <?php echo ($mydata['type_of_training'] == 'Managerial') ? "selected" : "" ?>>Managerial
                                    </option>
                                    <option value="Supervisory" <?php echo ($mydata['type_of_training'] == 'Supervisory') ? "selected" : "" ?>>Supervisory
                                    </option>
                                </select>
                            </div>


                            <div class="col-lg-3 col-sm-6">
                                <label>No. of Hours</label>
                                <input type="text" class="form-control text-input" name="no_of_hrs" value="<?php echo $mydata['no_of_hrs'] ?>">
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <label>Venue</label>
                                <input type="text" class="form-control text-input" name="venue" value="<?php echo $mydata['venue'] ?>">
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <label>Address</label>
                                <input class="form-control text-input" name="province" value="<?php echo $mydata['province'] ?>">
                            </div>

                        </div>


                        <div class="add_speaker_wrapper mt-3">

                            <div class="form-row">

                                <div class="col-lg-12 col-sm-6">
                                    <label>Speaker<span style="text-transform: lowercase;">/s</span></label>
                                </div>

                                <?php
                                $speakers = json_decode($mydata['speakers']);

                                for ($i = 0; $i < count(array_filter($speakers->speakers_name)); $i++) { ?>

                                    <div class="col-lg-6 col-sm-6">
                                        <label for="">Full Name</label>
                                        <input type="text" class="form-control text-input" placeholder="Full Name" name="speaker_full_name[]" value="<?php echo $speakers->speakers_name[$i] ?>">
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <label for="">Title</label>
                                        <input type="text" class="form-control text-input" name="title[]" placeholder="Title" value="<?php echo $speakers->speakers_title[$i] ?>">
                                    </div>

                                <?php }
                                ?>
                            </div>
                        </div>

                        <!-- <a href="" class="add_speaker" title="Add field"><i class="fa fa-plus"></i></a> -->

                        <div class="form-row mt-1">
                            <div class="col-lg-3 col-sm-6 ">
                                <a class="btn button-1 add_speaker">Add</a>
                            </div>
                        </div>



                        <div class="form-row mt-2">
                            <div class="col-lg-3 col-sm-6">
                                <label>Agency</label>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <input type="text" class="form-control text-input" name="agency" value="<?php echo $mydata['agency'] ?>">
                            </div>
                        </div>

                        <div class="add_sponsor_wrapper ">
                            <?php
                            if (!empty($mydata['sponsors'])) {
                                $sponsors = explode(',', $mydata['sponsors']);
                            ?>
                                <?php foreach (array_filter($sponsors) as $sponsor) { ?>
                                    <div class="form-row mt-2">
                                        <div class="col-lg-3 col-sm-6">
                                            <label>Sponsor Agency<span style="text-transform: lowercase;">/ies</span></label>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <input type="text" class="form-control text-input" name="sponsor[]" placeholder="Sponsor" value="<?php echo $sponsor ?>">
                                        </div>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="form-row mt-2">
                                    <div class="col-lg-3 col-sm-6">
                                        <label>Sponsor Agency<span style="text-transform: lowercase;">/ies</span></label>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <input type="text" class="form-control text-input" name="sponsor[]" placeholder="Sponsor" value="">
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <!-- <a href="" class="add_sponsor" title="Add field"><i class="fa fa-plus"></i></a> -->

                        <div class="form-row mt-1">
                            <div class="col-lg-3 col-sm-6 ">
                                <a class=" btn button-1 add_sponsor">Add</a>
                            </div>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <a href="../learning/index.php" class="btn button-1 mr-2">Back</a>
                        <button type="submit" name="submit" class="btn button-1 ">Update</button>
                    </div>

            </form>

<?php }
    }
} ?>
<script src="../learning/learning.js"></script>