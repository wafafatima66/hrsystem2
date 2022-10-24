<?php

include '../config.php';
include SITE_ROOT . '/includes/header.php';
?>

<?php
if (isset($_POST['submit'])) {
    $learning_id = $_POST['learning_id'];
    $title_of_training = $_POST['title_of_training'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $type_of_training = $_POST['type_of_training'];
    $no_of_hrs = $_POST['no_of_hrs'];
    $venue = $_POST['venue'];
    $province = $_POST['province'];

    $classification = $_POST['classification'];
    $proponent = $_POST['proponent'];
    $budgetary_requirement = $_POST['budgetary_requirement'];
    $financed_by = $_POST['financed_by'];
    $source_of_fund = $_POST['source_of_fund'];
    $no_of_days = $_POST['no_of_days'];
    $registration_fee = $_POST['registration_fee'];

    $training_details = $_POST['training_details'];

    $role_posted = $_POST['role_posted'];
    $role_posted_name = $_POST['role_posted_name'];

    // arrays
    $emp_id = $_POST['emp_id'];
    $speaker_full_name = $_POST['speaker_full_name'];
    $title = $_POST['title'];
    $sponsor = $_POST['sponsor'];
    $agency = $_POST['agency'];

    $speakers_name = array();
    $speakers_title = array();
    $speaker_agency = array();

    if (isset($_POST['speaker_full_name'])) {
        for ($i = 0; $i < count($_POST['speaker_full_name']); $i++) {
            // $speakers_name[$i] = $_POST['speaker_first_name'][$i] . ' ' . $_POST['speaker_middle_name'][$i] . ' ' . $_POST['speaker_last_name'][$i];
            $speakers_name[$i] = $_POST['speaker_full_name'][$i];
            $speakers_title[$i] = $_POST['title'][$i];
            $speaker_agency[$i] = $_POST['agency'][$i];
        }
        $myjson = array(
            "speakers_name" => $speakers_name,
            "speakers_title" => $speakers_title,
            "speaker_agency" => $speaker_agency
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

    $employee_names = '';
    if (!empty($_POST['emp_name'])) {
        for ($i = 0; $i < count($_POST['emp_name']); $i++) {
            $employee_names .= $_POST['emp_name'][$i] . ',';
        }
    }

    $del = "DELETE FROM training_table WHERE id = '$learning_id'";
    $del1 = "DELETE FROM emp_training WHERE learning_id = '$learning_id'";
    mysqli_query($conn, $del);
    mysqli_query($conn, $del1);

    //   $sql1 = "INSERT INTO training_table (id , title_of_training,from_date ,to_date, type_of_training, no_of_hrs, venue,province,speakers,sponsors,employees)

    //     VALUES ('$learning_id','$title_of_training','$from_date', '$to_date', '$type_of_training', '$no_of_hrs', '$venue','$province' ,'$speakers','$sponsors','$employees')";

    $sql1 = "INSERT INTO training_table ( id , title_of_training,from_date ,to_date, type_of_training, no_of_hrs, venue,province,speakers,sponsors,employees,training_details,role_posted , role_posted_name , classification , proponent , budgetary_requirement , financed_by , source_of_fund , employee_names , no_of_days , registration_fee)

    VALUES ('$learning_id','$title_of_training','$from_date', '$to_date', '$type_of_training', '$no_of_hrs', '$venue','$province' ,'$speakers','$sponsors','$employees','$training_details','$role_posted' , '$role_posted_name' , '$classification' , '$proponent' , '$budgetary_requirement' , '$financed_by' , '$source_of_fund' , '$employee_names'  , '$no_of_days' , '$registration_fee')";


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

            <style>
                .emp_list_ul {
                    background-color: #eee;
                    cursor: pointer;
                }

                .emp_list_li {
                    padding: 12px;
                }
            </style>

            <form method="post" action="">

                <input type="hidden" value="<?php echo $mydata['role_posted'] ?>" name="role_posted">
                <input type="hidden" value="<?php echo $mydata['role_posted_name'] ?>" name="role_posted_name">

                <input type="hidden" value="<?php echo $mydata['id'] ?>" name="learning_id">

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

                            $x = 0;
                            if (!empty($mydata['employee_names'])) {

                            ?>
                                <?php
                                $employees = explode(',', $mydata['employee_names']);
                                foreach (array_filter($employees) as $employee) {
                                    $x += 1;
                                ?>
                                    <div class="form-row">
                                        <div class="col-lg-6 col-sm-6">

                                            <input type="text" class="form-control text-input emp_id mt-2" placeholder="Employee Name" id="add_learning_<?php echo $x ?>" onkeyup=get_info(this.id) name="emp_name[]" value="<?php echo $employee; ?>">

                                            <!-- <div id="space"></div> -->
                                            <div id="emplist_<?php echo $x ?>"></div>

                                            <input type="hidden" name="emp_id[]" id="get_emp_id_<?php echo $x ?>">

                                        </div>
                                    </div>
                                <?php   }
                            } else {
                                $x += 1;
                                ?>
                                <div class="form-row">
                                    <div class="col-lg-6 col-sm-6">
                                        <!-- <input type="text" class="form-control text-input emp_id mt-2" placeholder="Employee Id" name="emp_id[]"> -->
                                        <input type="text" class="form-control text-input" placeholder="Employee Name" id="add_learning_1" onkeyup=get_info(this.id) name="emp_name[]" />
                                        <!-- <div id="space"></div> -->
                                        <div id="emplist_1"></div>

                                        <input type="hidden" name="emp_id[]" id="get_emp_id_1">
                                    </div>
                                </div>
                            <?php } ?>

                        </div>

                        <!-- <a href="" class="add_emp_id ml-3" title="Add field"><i class="fa fa-plus"></i></a> -->

                        <div class="form-row mt-1">
                            <div class="col-lg-3 col-sm-6 ">
                                <a class="btn button-1 add_emp_id" last-id=<?php echo $x ?>>Add</a>
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
                                    <option value="Clerical" <?php echo ($mydata['type_of_training'] == 'Clerical') ? "selected" : "" ?>>Clerical
                                    </option>
                                    <option value="Foundational " <?php echo ($mydata['type_of_training'] == 'Foundational ') ? "selected" : "" ?>>Foundational
                                    </option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <label>Classification</label>
                                <select class="form-control text-input" name="classification">
                                    <option value="">SELECT</option>
                                    <option value="Training" <?php echo ($mydata['classification'] == 'Training') ? "selected" : "" ?>>Technical</option>
                                    <option value="Workshop" <?php echo ($mydata['classification'] == 'Workshop') ? "selected" : "" ?>>Workshop</option>
                                    <option value="Orientation" <?php echo ($mydata['classification'] == 'Orientation') ? "selected" : "" ?>>Orientation</option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <label>No. of Days</label>
                                <input type="text" class="form-control text-input" name="no_of_days" value="<?php echo $mydata['no_of_days'] ?>">
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

                        <div class="form-row mt-3">
                            <div class="col-lg-12 col-sm-6">
                                <label for="">Training Description and Details</label>
                                <textarea name="training_details" class="form-control text-input"><?php echo $mydata['training_details'] ?></textarea>
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

                                    <div class="col-lg-4 col-sm-4">
                                        <label for="">Full Name</label>
                                        <input type="text" class="form-control text-input" placeholder="Full Name" name="speaker_full_name[]" value="<?php echo $speakers->speakers_name[$i] ?>">
                                    </div>

                                    <div class="col-lg-4 col-sm-4">
                                        <label for="">Title</label>
                                        <input type="text" class="form-control text-input" name="title[]" placeholder="Title" value="<?php echo $speakers->speakers_title[$i] ?>">
                                    </div>

                                    <div class="col-lg-4 col-sm-4">
                                        <label for="">Agency</label>
                                        <input type="text" class="form-control text-input" name="agency[]" placeholder="Agency" value="<?php echo (isset(($speakers->speaker_agency[$i])) ? ($speakers->speaker_agency[$i]) :  '')  ?>">
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


                        <div class="add_sponsor_wrapper mt-4">
                            <label>Partner / Sponsor Agency<span style="text-transform: lowercase;">/ies</span></label>
                            <?php
                            if (!empty($mydata['sponsors'])) {
                                $sponsors = explode(',', $mydata['sponsors']);
                            ?>
                                <?php foreach (array_filter($sponsors) as $sponsor) { ?>
                                    <div class="form-row mt-2">

                                        <div class="col-lg-4 col-sm-6">
                                            <input type="text" class="form-control text-input" name="sponsor[]" placeholder="Sponsor" value="<?php echo $sponsor ?>">
                                        </div>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="form-row mt-2">

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

                        <div class="form-row mt-5">
                            <div class="col-lg-3 col-sm-6">
                                <label>Proponent<span style="text-transform: lowercase;">/s</span></label>
                                <input type="text" class="form-control text-input" name="proponent" value="<?php echo $mydata['proponent'] ?>">
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="col-lg-3 col-sm-6">
                                <label>Registration Fee</label>
                                <input type="text" class="form-control text-input" name="registration_fee" value="<?php echo $mydata['registration_fee'] ?>">
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <label>Budgetary Requirement</label>
                                <input type="text" class="form-control text-input" name="budgetary_requirement" value="<?php echo $mydata['budgetary_requirement'] ?>">
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <label>Financed by</label>
                                <input type="text" class="form-control text-input" name="financed_by" value="<?php echo $mydata['financed_by'] ?>">
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <label>Source of Fund</label>
                                <input type="text" class="form-control text-input" name="source_of_fund" value="<?php echo $mydata['source_of_fund'] ?>">
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

<script>
    function get_info(full_id) {

        var array = full_id.split('_');

        emp_id = document.getElementById(full_id).value;

        var id = array[2];

        // emp_id = document.getElementById(id);

        // console.log(id)

        if (emp_id != '') {
            $.ajax({
                url: "fetchEmpNameData.php",
                method: "POST",
                data: {
                    emp_id: emp_id,
                    id: id
                },
                success: function(data) {
                    $('#emplist_' + id).fadeIn();
                    $('#emplist_' + id).html(data);
                }
            });
        }

        $(document).on('click', '.emp_list_li_' + id, function() {

            $('#add_learning_' + id).val($(this).text());
            $('#emplist_' + id).fadeOut();

            jQuery(function($) {
                var full_name = document.getElementById(full_id).value;
                // console.log(id);
                // console.log('emp_name_''+);

                $.ajax({
                    url: 'get_info_emp_id.php',
                    type: 'post',
                    data: {
                        full_name: full_name
                    },
                    dataType: 'json',
                    success: function(result) {

                        var office = result.area_wrk_assign;
                        var emp_id_value = result.emp_id;

                        // $('#office_' + id).val(office);

                        $('#get_emp_id_' + id).val(emp_id_value);

                    }
                });

            });

        });


    }
</script>