<?php

include "../includes/conn.php";


if (isset($_POST['id'])) {

    $id = $_POST['id'];


    // $query = "SELECT * FROM publication WHERE id = '$id'";
    $query = "SELECT * from training_post_table WHERE id = '$id'";

    $runquery = $conn->query($query);
    if ($runquery == true) {
        while ($mydata = $runquery->fetch_assoc()) {
            // echo $mydata['file_name'];

?>

            <!-- <h6>TRAINEES/ATTENDESS</h6> -->

            <div class="container-box mt-0">
                <div class="form-row">

                    <div class="col-lg-6 col-sm-6">
                        <label>Title of training</label>
                        <input type="text" class="form-control text-input" name="title_of_training" value="<?php echo $mydata['title_of_training']; ?>">
                    </div>


                    <div class="col-lg-6 col-sm-6">
                        <label>Inclusive Dates</label>
                        <div class="form-inline">
                            <input type="date" class="form-control text-input" name="from_date" style="width:50%" value="<?php echo $mydata['from_date']; ?>">
                            <input type="date" class="form-control text-input" name="to_date" style="width:50%" value="<?php echo $mydata['to_date']; ?>">
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <label>Type</label>
                        <select class="form-control text-input" name="type_of_training">
                            <option value="">SELECT</option>
                            <option value="Technical" <?php echo ($mydata['type_of_training'] == 'Technical' ? 'selected' : ''); ?>>Technical</option>
                            <option value="Managerial" <?php echo ($mydata['type_of_training'] == 'Managerial' ? 'selected' : ''); ?>>Managerial</option>
                            <option value="Supervisory" <?php echo ($mydata['type_of_training'] == 'Supervisory' ? 'selected' : ''); ?>>Supervisory</option>
                            <option value="Clerical" <?php echo ($mydata['type_of_training'] == 'Clerical' ? 'selected' : ''); ?>>Clerical</option>
                        </select>
                    </div>


                    <div class="col-lg-3 col-sm-6">
                        <label>No. of Hours</label>
                        <input type="text" class="form-control text-input" name="no_of_hrs" value="<?php echo $mydata['no_of_hrs']; ?>">
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <label>Venue</label>
                        <input type="text" class="form-control text-input" name="venue" value="<?php echo $mydata['venue']; ?>">
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <label>Address</label>
                        <input class="form-control text-input" name="province" value="<?php echo $mydata['province']; ?>">
                    </div>

                </div>

                <div class="form-row mt-3">
                    <div class="col-lg-12 col-sm-6">
                        <label for="">Basic Information</label>
                        <textarea name="training_details" class="form-control text-input"><?php echo $mydata['training_details']; ?></textarea>
                    </div>
                </div>




                <div class="form-row mt-2">

                    <div class="col-lg-12 col-sm-6">
                        <label>Sponsor</label>
                    </div>


                    <?php
                    if (!empty($mydata['sponsors'])) {
                        $sponsors = explode(',', $mydata['sponsors']);
                    ?>
                        <?php foreach (array_filter($sponsors) as $sponsor) { ?>
                            <!-- <div class="form-row mt-2"> -->
                            <div class="col-lg-4 col-sm-6">
                                <input type="text" class="form-control text-input" name="sponsor[]" placeholder="Sponsor" value="<?php echo $sponsor ?>">
                            </div>
                            <!-- </div> -->
                        <?php  }
                    } else { ?>
                        <div class="form-row mt-2">
                            <div class="col-lg-4 col-sm-6">
                                <input type="text" class="form-control text-input" name="sponsor[]" placeholder="Sponsor" value="">
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <input type="text" class="form-control text-input" name="sponsor[]" placeholder="Sponsor" value="">
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <input type="text" class="form-control text-input" name="sponsor[]" placeholder="Sponsor" value="">
                            </div>
                        </div>
                    <?php } ?>


                </div>

                <div class="form-row mt-4 ">
                    
                    <div class="col-lg-12 col-sm-12">

                    <?php if(empty($mydata['file_name'])){
                        
                    }else {?>
                        <a href="../files/<?php echo $mydata['file_name'] ?>" target='_blank'  class="btn button-1">VIEW FILE</a>
                   <?php }
                     ?>

                        

                        <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
            </button>
                    </div>

                   
                </div>

            </div>

<?php        }
    }
} ?>