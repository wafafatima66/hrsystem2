<?php

include "../includes/conn.php";


if (isset($_POST['id'])) {

    $id = $_POST['id'];
    

    $query = "SELECT * FROM publication WHERE id = '$id'";

    $runquery = $conn->query($query);
    if ($runquery == true) {
        while ($mydata = $runquery->fetch_assoc()) {


?>

            <div class="container">

                <form method="post" action="" enctype="multipart/form-data">

                <input type="hidden" name="id"  value="<?php echo $mydata['id']; ?>">

                    <div class="form-row">
                        <div class="col-lg-3 col-sm-6">
                            <label for="">Date of publication</label>
                            <input type="date" class="form-control text-input" name="date_of_publication" value="<?php echo $mydata['date_of_publication']; ?>">
                        </div>
                    </div>

                    <div class="form-row mt-2">
                        <div class="col-lg-12 col-sm-12">
                            <label for="" class="h6">Item Details</label>
                        </div>
                    </div>

                    <div class="form-row">

                        <!-- <div class="col-lg-3 col-sm-6">
        <input type="text" class="form-control text-input" name="item_number" placeholder="Select Item">
    </div> -->
                        <div class="col-lg-3 col-sm-6">
                            <select class="form-control text-input" name="item_number" id="item_number">


                                <?php

                                if(!empty($mydata['item_number'])){
                                    echo "<option value= '" . $mydata['item_number'] . "'>" . $mydata['item_number'] . "</option>";
                                }

                                    $query = "SELECT item_no FROM item ";
                                    $result2 = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result2) > 0) {

                                        if(empty($mydata['item_number'])){
                                            echo "<option value=''> Select Item </option> ";
                                        }

                                        while ($mydata2 = mysqli_fetch_assoc($result2)) {
                                            echo "<option value= '" . $mydata2['item_no'] . "'>" . $mydata2['item_no'] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''> Select Item </option>";
                                    }
                                

                                

                                ?>


                            </select>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" name="plantilla" placeholder="Plantilla" id="plantilla" value="<?php echo $mydata['plantilla']; ?>">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" name="salary_grade" placeholder="Salary Grade" id="salary_grade" value="<?php echo $mydata['salary_grade']; ?>">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" name="place_of_assignment" placeholder="Place of assignment" id="place_of_assignment" value="<?php echo $mydata['place_of_assignment']; ?>">
                        </div>

                        <div class="col-lg-3 col-sm-6 mt-2">
                            <div class="d-flex flex-column">
                                <input type="date" class="form-control text-input" name="date_created" id="date_created" value="<?php echo $mydata['date_created']; ?>">
                                <small class="text-muted"> (Date created)</small>
                            </div>
                        </div>


                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
                        </button>
                        <button type="submit" name="edit_publication" class="btn button-1 ">Submit</button>
                    </div>
                </form>

            </div>

<?php        }
    }
} ?>