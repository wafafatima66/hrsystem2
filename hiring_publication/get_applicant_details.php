<?php

include "../includes/conn.php";



if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $query = "SELECT * FROM applicant WHERE id = '$id'";

    $runquery = $conn->query($query);
    if ($runquery == true) {
        while ($mydata = $runquery->fetch_assoc()) {
            $applicant_id =  $mydata['applicant_id'];

            if (!empty($mydata['item_no'])) {
                $item_no =  $mydata['item_no'];
                $input = '<input type="hidden" name="item_no" value="' . $item_no . '">';
            } else if (!empty($mydata['position_no'])) {
                $position_no =  $mydata['position_no'];
                $input = '<input type="hidden" name="position_no" value="' . $position_no . '">';
            }



?>

            <div class="container">

                <form method="post" action="" enctype="multipart/form-data">

                    <?php echo $input; ?>

                    <div class="form-row">

                        <div class="col-lg-3 col-sm-6">
                            <label for="" class="text-secondary">Applicant ID</label>
                            <input type="text" class="form-control text-input" placeholder="Applicant ID" value="<?php echo $mydata['applicant_id']; ?>" disabled>

                            <input type="hidden" name="applicant_id" value="<?php echo $mydata['applicant_id']; ?>">

                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <label for="" class="text-secondary">Rating</label>
                            <input type="text" class="form-control text-input" name="applicant_rating" placeholder="Rating" value="<?php echo $mydata['applicant_rating']; ?>">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <label for="" class="text-secondary">Rank</label>
                            <input type="text" class="form-control text-input" name="applicant_rank" placeholder="Rank" value="<?php echo $mydata['applicant_rank']; ?>">
                        </div>


                    </div>

                    <div class="form-row mb-2 mt-4">
                        <div class="col-lg-12 col-sm-12">
                            <label for="" class="h6">Basic Information</label>
                        </div>
                    </div>

                    <input type="hidden" name="old_employee" value="<?php echo $mydata['old_employee']; ?>" >
                    
                    <input type="hidden" name="emp_id" value="<?php echo $mydata['emp_id']; ?>" >

                    <div class="form-row ">
                        <div class="col-lg-3 col-sm-6">
                            <label for="" class="text-secondary">First Name</label>
                            <input type="text" class=" form-control text-input" placeholder="First name" name="applicant_first_name" value="<?php echo $mydata['applicant_first_name']; ?>">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <label for="" class="text-secondary">Last Name </label>
                            <input type="text" class=" form-control text-input" placeholder="Last name" name="applicant_last_name" value="<?php echo $mydata['applicant_last_name']; ?>">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <label for="" class="text-secondary">Middle Name </label>
                            <input type="text" class="form-control text-input" placeholder="Middle name" name="applicant_middle_name" value="<?php echo $mydata['applicant_middle_name']; ?>">
                        </div>
                        <div class="col-lg-1 col-sm-6">
                            <label for="" class="text-secondary">Ext </label>
                            <input type="text" class="form-control text-input" placeholder="ext" name="applicant_ext" value="<?php echo $mydata['applicant_ext']; ?>">
                        </div>

                        <div class="col-lg-2 col-sm-6">
                            <label for="" class="text-secondary">Gender </label>
                            <!-- <input type="text" class="form-control text-input" placeholder="Sex" name="applicant_gender" value="<?php echo $mydata['applicant_gender']; ?>"> -->
                            <select class="form-control text-input" name="applicant_gender">

                        <?php if (!empty($mydata['applicant_gender'])) {
                            echo "<option value= '" . $mydata['applicant_gender'] . "'>" . $mydata['applicant_gender'] . "</option>";
                        } else {
                            echo "<option value='' > Sex </option>";
                        } ?>

                        <option value='Male' <?php echo ($mydata['applicant_gender'] == 'Male' ? 'style="display: none;"' : '') ?>> Male </option>
                        <option value='Female' <?php echo ($mydata['applicant_gender'] == 'Female' ? 'style="display: none;"' : '') ?>> Female </option>
                       

                    </select>
                        </div>

                    </div>

                    <div class="form-row mt-3">

                        <div class="col-lg-3 col-sm-6">
                        <label for="" class="text-secondary">State/Provinve</label>
                            <select class="form-control text-input" name="applicant_state">
                                <?php if (!empty($mydata['applicant_state'])) {
                                    echo "<option value= '" . $mydata['applicant_state'] . "'>" . $mydata['applicant_state'] . "</option>";
                                } else {
                                    echo "<option value='' > State/Province </option>";
                                } ?>

                                <?php include '../includes/provinces.php' ?>
                            </select>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <label for="" class="text-secondary">Municipality</label>
                            <input type="text" class="form-control text-input" placeholder="Municipality" name="applicant_municipal" value="<?php echo $mydata['applicant_municipal']; ?>">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <label for="" class="text-secondary">Barangay</label>
                            <input type="text" class="form-control text-input" placeholder="Barangay" name="applicant_barangay" value="<?php echo $mydata['applicant_barangay']; ?>">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <label for="" class="text-secondary">Zip</label>
                            <input type="text" class="form-control text-input" placeholder="Zip code" name="applicant_zip" value="<?php echo $mydata['applicant_zip']; ?>">
                        </div>

                    </div>



                    <div class="form-row mt-4">
                        <div class="col-lg-12 col-sm-12">
                            <label for="" class="h6">Minimum Qualification</label>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="col-lg-3 col-sm-6 ">
                            <span>Education</span>

                            <div class="education_wrapper">
                                <!-- <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_education[]"> -->

                                <?php

                                $query = "SELECT * FROM hiring_education WHERE applicant_id = '$applicant_id'";

                                $runquery = $conn->query($query);
                                $rowcount = mysqli_num_rows($runquery);
                                if ($rowcount > 0) {

                                    while ($mydata = $runquery->fetch_assoc()) {

                                        echo '<input type="text" class=" form-control text-input mt-1 mb-1" placeholder="" value=" ' . $mydata["hiring_education"] . '" name="hiring_education[]"> ';
                                    }
                                } else {
                                    echo ' <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_education[]">';
                                }
                                ?>

                            </div>

                            <button type="button" class="btn button-1 float-right add_education pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <span>Work Experience</span>

                            <div class="work_exp_wrapper">
                                <!-- <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_work_exp[]"> -->

                                <?php

                                $query = "SELECT * FROM hiring_work_exp WHERE applicant_id = '$applicant_id'";

                                $runquery = $conn->query($query);
                                $rowcount = mysqli_num_rows($runquery);
                                if ($rowcount > 0) {

                                    while ($mydata = $runquery->fetch_assoc()) {

                                        echo '<input type="text" class=" form-control text-input mt-1 mb-1" placeholder="" value=" ' . $mydata["hiring_work_exp"] . '" name="hiring_work_exp[]"> ';
                                    }
                                } else {
                                    echo ' <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_work_exp[]">';
                                }
                                ?>

                            </div>

                            <button type="button" class="btn button-1 float-right add_work_exp pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <span>Training</span>

                            <div class="traning_wrapper">
                                <!-- <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_training[]"> -->

                                <?php

                                $query = "SELECT * FROM hiring_training WHERE applicant_id = '$applicant_id'";

                                $runquery = $conn->query($query);
                                $rowcount = mysqli_num_rows($runquery);
                                if ($rowcount > 0) {

                                    while ($mydata = $runquery->fetch_assoc()) {

                                        echo '<input type="text" class=" form-control text-input mt-1 mb-1" placeholder="" value=" ' . $mydata["hiring_training"] . '" name="hiring_training[]"> ';
                                    }
                                } else {
                                    echo ' <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_training[]">';
                                }
                                ?>

                            </div>

                            <button type="button" class="btn button-1 float-right add_training pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <span>Eligibility</span>

                            <div class="eligibility_wrapper">
                                <!-- <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_eligibility[]"> -->
                                <?php

                                $query = "SELECT * FROM hiring_eligibility WHERE applicant_id = '$applicant_id'";

                                $runquery = $conn->query($query);
                                $rowcount = mysqli_num_rows($runquery);
                                if ($rowcount > 0) {

                                    while ($mydata = $runquery->fetch_assoc()) {

                                        echo '<input type="text" class=" form-control text-input mt-1 mb-1" placeholder="" value=" ' . $mydata["hiring_eligibility"] . '" name="hiring_eligibility[]"> ';
                                    }
                                } else {
                                    echo ' <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_eligibility[]">';
                                }
                                ?>
                            </div>

                            <button type="button" class="btn button-1 float-right add_eligibility pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                    </div>

                    <div class="form-row mt-4">
                        <div class="col-lg-12 col-sm-12">
                            <label for="" class="h6">Credentials( PDS, Resume, Application Letter, Certificates, etc)</label>
                        </div>
                    </div>

                    <!-- <div class="form-row mt-4">
                        <div class="col-lg-4 col-sm-6">
                            <input type="file" name="applicant_files" id="" multiple>
                        </div>
                    </div> -->

                    <div class="form-row mt-2 mb-2">
                        <div class="col-lg-4 col-sm-6">


                            <label style="width: 100%;">

                                <div class="inner-upload-field p-2">
                                    <h6 class="text-center">Upload Files</h6>
                                </div>

                                <input type="file" name="applicant_files[]" id="applicant_files_edit" multiple style="display: none;">
                            </label>

                            <div id="total_edit" class="text-success"></div>

                        </div>

                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
                        </button>
                        <button type="submit" name="edit_applicant" class="btn button-1 ">Submit</button>
                    </div>


                </form>

            </div>

<?php        }
    }
} ?>

<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 10;
        var x = 1;

        $('.add_education').click(function() {
            if (x < maxField) {
                x++;
                $('.education_wrapper').append('<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_education[]">');
            }
        });

        $('.add_work_exp').click(function() {
            if (x < maxField) {
                x++;
                $('.work_exp_wrapper').append('<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_work_exp[]">');
            }
        });

        $('.add_training').click(function() {
            if (x < maxField) {
                x++;
                $('.traning_wrapper').append('<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_training[]">');
            }
        });

        $('.add_eligibility').click(function() {
            if (x < maxField) {
                x++;
                $('.eligibility_wrapper').append('<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_eligibility[]">');
            }
        });

        $("#applicant_files_edit").change(function() {
            $("#total_edit").html($("#applicant_files_edit")[0].files.length + "  Files uploaded");
        });

    });
</script>