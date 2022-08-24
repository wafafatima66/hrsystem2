<?php

include "../includes/conn.php";

if (isset($_POST['inactiveModalSubmit'])) {


    $emp_id = $_POST['emp_id'];
    $termination_reason = $_POST['termination_reason'];
    $date_of_effectivity = $_POST['date_of_effectivity'];
    $termination_details = $_POST['termination_details'];



    $targetDir = "../files/";
    $fileNames = array_filter($_FILES['termination_files']['name']);
    // $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    if (!empty($fileNames)) {
        foreach ($_FILES['termination_files']['name'] as $key => $val) {
            // File upload path 
            $fileName = "termination - " . $emp_id . "-" .  basename($_FILES['termination_files']['name'][$key]);

            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            // Upload file to server 
            if (move_uploaded_file($_FILES["termination_files"]["tmp_name"][$key], $targetFilePath)) {
                // Image db insert sql 
                $sql_files = "INSERT INTO termination_file (file_name, emp_id) VALUES ('$fileName' , '$emp_id') ";
                if (mysqli_query($conn, $sql_files)) {
                    echo  '<script>toastr.success("Files uploaded")</script>';
                }
            } else {
                echo  '<script>toastr.error("Files Not uploaded ! Try again")</script>';
            }
        }
    }

    $sql = "INSERT INTO termination (
        emp_id  , termination_reason, date_of_effectivity , termination_details ) VALUES (  '$emp_id' , '$termination_reason', '$date_of_effectivity' ,' $termination_details' )";

    $sql1 = "UPDATE employee SET active='0' WHERE emp_id='$emp_id'";
    mysqli_query($conn, $sql1);

    $sql2 = "UPDATE item SET filled='0' WHERE emp_id='$emp_id'";
    mysqli_query($conn, $sql2);

    if (mysqli_query($conn, $sql)) {
        echo "<meta http-equiv='refresh' content='0'>";
        echo  '<script>toastr.success("Employee Status updated")</script>';
    } else {
        echo "<meta http-equiv='refresh' content='0'>";
        echo  '<script>toastr.error("Employee status not updated. Try again !")</script>';
    }
}


?>

<div class="modal fade" id="inactiveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg ">
        <div class="modal-content">

            <h3 class=" background-title-1 p-3">STATUS UPDATE</h3>

            <div class="modal-body">
                <div class="container">

                    <form action="" method="post" enctype="multipart/form-data">

                        <input type="hidden" id="modal_emp_id" name="emp_id">

                        <div class="form-row mt-1">
                            <div class="col-lg-12 col-sm-12">
                                <label for="">Reasons for termination</label>
                            </div>
                        </div>

                        <div class="form-row ">
                            <div class="col-lg-4 col-sm-6">
                                <select name="termination_reason" class="form-control text-input" required>
                                    <option value="">Select</option>
                                    <option value="Resignation">Resignation</option>
                                    <option value="Retirement">Retirement</option>
                                    <option value="Death">Death</option>
                                    <option value="Dismissal">Dismissal</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="d-flex flex-column">
                                    <input type="date" class="form-control text-input" name="date_of_effectivity" required>
                                    <small class="text-muted"> (Date of Effectivity)</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col-lg-12 col-sm-12">
                                <label for="">Short Details</label>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <textarea name="termination_details" cols="30" rows="3" class="form-control text-input" required></textarea>
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


                </div>



                <div class="modal-footer">
                    <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
                    </button>
                    <button type="submit" name="inactiveModalSubmit" class="btn button-1 ">Submit</button>
                </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script>
    $("#termination_files").change(function() {
        $("#total_file").html($("#termination_files")[0].files.length + " Files uploaded");
    });
</script>