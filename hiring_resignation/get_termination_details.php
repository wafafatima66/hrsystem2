<?php

include "../includes/conn.php";


if (isset($_POST['id'])) {

    $id = $_POST['id'];


    // $query = "SELECT * FROM publication WHERE id = '$id'";
    $query = "SELECT * from termination where id = '$id'";

    $runquery = $conn->query($query);
    if ($runquery == true) {
        while ($mydata = $runquery->fetch_assoc()) {


?>

            <div class="container">

                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?= $mydata['id']; ?>">
                    <input type="hidden" name="emp_id" value="<?= $mydata['emp_id']; ?>">

                    <div class="form-row mt-1">
                        <div class="col-lg-12 col-sm-12">
                            <label for="">Reasons for termination</label>
                        </div>
                    </div>

                    <div class="form-row ">
                        <div class="col-lg-4 col-sm-6">
                            <select name="termination_reason" class="form-control text-input" required>

                                <?php if (!empty($mydata['termination_reason'])) {
                                    echo "<option value= '" . $mydata['termination_reason'] . "'>" . $mydata['termination_reason'] . "</option>";
                                } else {
                                    echo "<option value='' > Select </option>";
                                } ?>

                                <option value='Resignation' <?php echo ($mydata['termination_reason'] == 'Resignation' ? 'style="display: none;"' : '') ?>> Resignation </option>
                                <option value='Retirement' <?php echo ($mydata['termination_reason'] == 'Retirement' ? 'style="display: none;"' : '') ?>> Retirement </option>
                                <option value='Death' <?php echo ($mydata['termination_reason'] == 'Death' ? 'style="display: none;"' : '') ?>> Death </option>
                                <option value='Dismissal' <?php echo ($mydata['termination_reason'] == 'Dismissal' ? 'style="display: none;"' : '') ?>> Dismissal </option>
                                <option value='Others' <?php echo ($mydata['termination_reason'] == 'Others' ? 'style="display: none;"' : '') ?>> Others </option>

                            </select>
                        </div>
                        <div class="col-lg-5 col-sm-6">
                            <div class="d-flex flex-column">
                                <input type="date" class="form-control text-input" name="date_of_effectivity" required value="<?= $mydata['date_of_effectivity']; ?>">
                                <small class="text-muted"> (Date of Effectivity)</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-lg-12 col-sm-12">
                            <label for="">Short Details</label>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <textarea name="termination_details" cols="30" rows="3" class="form-control text-input" required><?= $mydata['termination_details']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-row mt-2 mb-2">
                        <div class="col-lg-4 col-sm-6">
                            <label style="width: 100%;">

                                <div class="inner-upload-field p-2">
                                    <h6 class="text-center">Upload Files</h6>
                                </div>

                                <input type="file" name="termination_files[]" id="termination_files" multiple style="display: none;">
                            </label>

                            <div id="total_file" class="text-success"></div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
                        </button>
                        <button type="submit" name="edit_termination" class="btn button-1 ">Submit</button>
                    </div>

                </form>

            </div>

<?php        }
    }
} ?>