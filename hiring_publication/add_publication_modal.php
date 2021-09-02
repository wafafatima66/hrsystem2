<?php
if (isset($_POST['submit'])) {


    $date_of_publication = $_POST['date_of_publication'];
    $item_number = $_POST['item_number'];
    $salary_grade = $_POST['salary_grade'];
    $plantilla = $_POST['plantilla'];
    $place_of_assignment = $_POST['place_of_assignment'];
    $date_created = $_POST['date_created'];

    $sql = "INSERT INTO publication (
         date_of_publication  , item_number , salary_grade , plantilla , place_of_assignment , date_created ) VALUES (  '$date_of_publication'  , '$item_number' , '$salary_grade' ,' $plantilla' ,  '$place_of_assignment' ,'$date_created')";



    if (mysqli_query($conn, $sql)) {
        echo  '<script>toastr.success("Publication added successfully")</script>';
    } else {
        echo  '<script>toastr.error("Publication not added. Try again !")</script>';
    }
}
?>

<div class="modal fade add_publication " id="add_publication" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">


            <h3 class=" background-title-1 p-3">Add Publication</h3>

            <div class="modal-body">

                <div class="container ">

                    <form method="post" action="" enctype="multipart/form-data">

                        <div class="form-row">
                            <div class="col-lg-3 col-sm-6">
                                <label for="">Date of publication</label>
                                <input type="date" class="form-control text-input" name="date_of_publication" placeholder="">
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

                                    $query = "SELECT item_no FROM item where status = 0  ";
                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        echo "<option value=''> Select Item </option> ";
                                        while ($mydata = mysqli_fetch_assoc($result)) {
                                            echo "<option value= '" . $mydata['item_no'] . "'>" . $mydata['item_no'] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''> Select Item </option>";
                                    }

                                    ?>


                                </select>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <input type="text" class="form-control text-input" name="plantilla" placeholder="Plantilla" id="plantilla">
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <input type="text" class="form-control text-input" name="salary_grade" placeholder="Salary Grade" id="salary_grade">
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <input type="text" class="form-control text-input" name="place_of_assignment" placeholder="Place of assignment" id="place_of_assignment">
                            </div>

                            <div class="col-lg-3 col-sm-6 mt-2">
                                <div class="d-flex flex-column">
                                    <input type="date" class="form-control text-input" name="date_created" id="date_created">
                                    <small class="text-muted"> (Date created)</small>
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


</div>

<script>
    $("#item_number").change(function() {
        $.ajax({
            url: 'get_info_item.php',
            type: 'post',
            data: {
                item_no: $(this).val()
            },
            dataType: 'json',
            success: function(result) {

                $('#plantilla').val(result.plantilla);
                $('#place_of_assignment').val(result.place_of_assignment);
                $('#salary_grade').val(result.salary_grade);
                $('#date_created').val(result.date_created);

                //     $('#emp_status').val(result.emp_status);
                //     $('#emp_salary').val(result.emp_salary);

            }
        });
    });
</script>