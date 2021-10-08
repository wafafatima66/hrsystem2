<?php

include "../includes/conn.php";


if (isset($_POST['id'])) {

    $id = $_POST['id'];
    

    // $query = "SELECT * FROM publication WHERE id = '$id'";
    $query = "SELECT i.* , p.id as publication_id, p.date_of_publication , p.item_number , p.end_of_publication FROM publication p join item i on i.item_no = p.item_number WHERE p.id = '$id'";

    $runquery = $conn->query($query);
    if ($runquery == true) {
        while ($mydata = $runquery->fetch_assoc()) {


?>

            <div class="container">

                <form method="post" action="" enctype="multipart/form-data">

                <input type="hidden" name="id"  value="<?php echo $mydata['publication_id']; ?>">

                    <div class="form-row">
                        <div class="col-lg-3 col-sm-6">
                            <label for="">Date of publication</label>
                            <input type="date" class="form-control text-input" name="date_of_publication" value="<?php echo $mydata['date_of_publication']; ?>">
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                                <label for="">End of publication</label>
                                        <input type="date" class="form-control text-input" name="end_of_publication"  value="<?php echo $mydata['end_of_publication']; ?>" required>
                                </div>

                    </div>

                    <!-- <div class="form-row mt-2">
                        <div class="col-lg-12 col-sm-12">
                            <label for="" class="h6">Item Details</label>
                        </div>
                    </div> -->

                    <div class="form-row mb-2">

                    
                        <div class="col-lg-5 col-sm-6">

                        <input type="hidden" name="item_number" id="item_number" value="<?= $mydata['item_number']?>">
                            
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