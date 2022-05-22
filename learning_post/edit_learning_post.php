<?php

include '../config.php';
include SITE_ROOT . '/includes/header.php';
?>

<?php
require '../includes/conn.php';

if (isset($_POST['post_submit'])) {

    $learning_id = $_POST['learning_id'];

    // $training_id=$_POST['training_id'];
    $title_of_training = $_POST['title_of_training'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $type_of_training = $_POST['type_of_training'];
    $no_of_hrs = $_POST['no_of_hrs'];
    $venue = $_POST['venue'];
    $address = $_POST['address'];
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
        // $filename = "";
        $filename_sql = mysqli_query($conn, "SELECT filename FROM training_post_table WHERE id = '$learning_id' ");
        $filename_row = mysqli_fetch_array($filename_sql, MYSQLI_ASSOC);
        $filename = $filename_row['filename'];
    }

    $del = "DELETE FROM training_post_table WHERE id = '$learning_id'";
    mysqli_query($conn, $del);

    $sql1 = "INSERT INTO training_post_table (id , title_of_training,from_date ,to_date, type_of_training, no_of_hrs,venue,sponsors,training_details,file_name, address)

  VALUES ('$learning_id' , '$title_of_training','$from_date', '$to_date', '$type_of_training', '$no_of_hrs', '$venue','$sponsors','$training_details','$filename' , '$address')";

    if (mysqli_query($conn, $sql1)) {
        echo  '<script>toastr.success("Post Training updated successfully")</script>';
    } else {
        echo  '<script>toastr.error("Post Training not updated. Try again !")</script>';
    }
}

?>


<?php
if (isset($_GET['learning_id'])) {

    $learning_id = $_GET['learning_id'];
    $query = "SELECT * FROM training_post_table WHERE id = '$learning_id'  ";

    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount != 0) {
        while ($mydata = $runquery->fetch_assoc()) {

            if(empty($mydata['file_name'])){
                $file = '#';
            }else {
                $file = '../files/'.$mydata['file_name'];
            }

?>
            <form method="post" action="" enctype="multipart/form-data">

                <input type="hidden" value="<?php echo $mydata['id'] ?>" name="learning_id">

                <h3 class=" background-title-1 p-3 mb-3">TRAINING INVITATION</h3>

                <div class="modal-body ">
                    <div class="container-box mt-0">

                        <!-- <h6>TRAINEES/ATTENDESS</h6> -->


                        <div class="form-row">

                            <div class="col-lg-6 col-sm-6">
                                <label>Title of training</label>
                                <input type="text" class="form-control text-input" name="title_of_training" value="<?php echo $mydata['title_of_training'] ?> ">
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
                                    <option value="Clerical" <?php echo ($mydata['type_of_training'] == 'Clerical') ? "selected" : "" ?>>Clerical
                                    </option>
                                    <option value="Foundational " <?php echo ($mydata['type_of_training'] == 'Foundational ') ? "selected" : "" ?>>Foundational
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
                                <input class="form-control text-input" name="address" value="<?php echo $mydata['address'] ?>">
                            </div>

                        </div>

                        <div class="form-row mt-3">
                            <div class="col-lg-12 col-sm-6">
                                <label for="">Basic Information</label>
                                <textarea name="training_details" class="form-control text-input"><?php echo $mydata['training_details'] ?></textarea>
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

                        <div class="form-row mt-1">
                            <div class="col-lg-3 col-sm-6 ">
                                <a class=" btn button-1 add_sponsor">Add</a>
                            </div>
                        </div>

                        <!-- <div class="form-row mt-4 ">
      <div class="col-lg-6 col-sm-6">
      <input type="file" name="file" accept=".pdf">
      </div>
      
    </div> -->

                        <div class="form-row mt-4 ">
                            <div class="col-lg-6 col-sm-6">
                                <label>
                                    <div class="inner-upload-field p-2">
                                        <h6 class="text-center">UPLOAD / <a href="<?php echo $file ?>" target='_blank' style="color:black">VIEW FILE</a></h6>
                                    </div>
                                    <input type="file" name="file" accept=".pdf" style="display: none;">
                                </label>
                            </div>
                        </div>

                    </div>


                    <div class="modal-footer">
                        <button type="submit" name="post_submit" class="btn button-1 ">Update</button>
                        <a href="../learning/index.php" class="btn button-1 mr-2">Back</a>
                    </div>

            </form>

<?php }
    }
} ?>
<script src="../learning/learning.js"></script>