<?php
if (isset($_POST['submit'])) {

    $date_of_publication = $_POST['date_of_publication'];
    $end_of_publication = $_POST['end_of_publication'];


    if (!empty($_POST['item_number'])) {
        for ($i = 0; $i < count($_POST['item_number']); $i++) {

            // $hiring_work_exp = $_POST['hiring_work_exp'][$i];
            $item_number = $_POST['item_number'][$i];
            // $salary_grade = $_POST['salary_grade'][$i];
            // $plantilla = $_POST['plantilla'][$i];
            // $place_of_assignment = $_POST['place_of_assignment'][$i];
            // $date_created = $_POST['date_created'][$i];
            // $department = $_POST['department'][$i];
            // $office = $_POST['office'][$i];

            $sql = "INSERT INTO publication (
                date_of_publication  ,end_of_publication, item_number  ) VALUES (  '$date_of_publication' , '$end_of_publication'  , '$item_number' )";

            if (mysqli_query($conn, $sql)) {
                echo  '<script>toastr.success("Item added to Publication added successfully")</script>';
            } else {
                echo  '<script>toastr.error("Item not added to Publication. Try again !")</script>';
            }
        }
    }

    // $item_number = $_POST['item_number'];
    // $salary_grade = $_POST['salary_grade'];
    // $plantilla = $_POST['plantilla'];
    // $place_of_assignment = $_POST['place_of_assignment'];
    // $date_created = $_POST['date_created'];

    // $sql = "INSERT INTO publication (
    //      date_of_publication  , item_number , salary_grade , plantilla , place_of_assignment , date_created ) VALUES (  '$date_of_publication'  , '$item_number' , '$salary_grade' ,' $plantilla' ,  '$place_of_assignment' ,'$date_created')";



    // if (mysqli_query($conn, $sql)) {
    //     echo  '<script>toastr.success("Publication added successfully")</script>';
    // } else {
    //     echo  '<script>toastr.error("Publication not added. Try again !")</script>';
    // }
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
                                <input type="date" class="form-control text-input" name="date_of_publication" placeholder="" required>
                            </div>

                            <div class="col-lg-3 col-sm-6 ">
                                <label for="">End of publication</label>
                                        <input type="date" class="form-control text-input" name="end_of_publication" required>
                                </div>
                        </div>

                        <div class="add_item_wrapper">

                            <div class="form-row mt-2">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="" class="h6">Item Details</label>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="col-lg-5 col-sm-6">
                                    <select class="form-control text-input item_number" name="item_number[]" id="item_number_1">


                                        <?php

                                        $query = "SELECT item_no FROM item where filled = 0  ";
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

                                <div class="col-lg-2 col-sm-6">
                                    <input type="text" class="form-control text-input" name="plantilla[]" placeholder="Plantilla" id="plantilla_1">
                                </div>

                                <div class="col-lg-1 col-sm-6">
                                    <input type="text" class="form-control text-input" name="salary_grade[]" placeholder="SG" id="salary_grade_1">
                                </div>

                                <div class="col-lg-3 col-sm-6">
                                    <input type="text" class="form-control text-input" name="place_of_assignment[]" placeholder="Place of assignment" id="place_of_assignment_1">
                                </div>

                        

                                <!-- <div class="col-lg-3 col-sm-6 mt-2">
                                    <select class="form-control text-input department_name" name="department[]" id="department_name_1">

                                        <?php

                                        // $query = "SELECT * FROM department ";
                                        // $result = mysqli_query($conn, $query);
                                        // if (mysqli_num_rows($result) > 0) {
                                        //     echo "<option value=''> Select Department </option> ";
                                        //     while ($mydata = mysqli_fetch_assoc($result)) {
                                        //         echo "<option value= '" . $mydata['department_name'] . "'>" . $mydata['department_name'] . "</option>";
                                        //     }
                                        // } else {
                                        //     echo "<option value=''> Select Department </option>";
                                        // }

                                        ?>


                                    </select>
                                </div> -->

                                <!-- <div class="col-lg-3 col-sm-6 mt-2">
                                    <select class="form-control text-input office_data_1 " name="office[]">
                                        <option value=''> Select Office </option>
                                    </select>
                                </div> -->

                            </div>

                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn button-1 add_item_btn mb-2">+</button>
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
    // var item_list = "";

    $(document).on('click', '.item_number', function() {
        var id = $(this).attr('id');
        var myArray = id.split("_");
        var i = myArray[2];

        $("#item_number_" + i).change(function() {

            $.ajax({
                url: 'get_info_item.php',
                type: 'post',
                data: {
                    item_no: $(this).val()
                },
                dataType: 'json',
                success: function(result) {

                    $('#plantilla_' + i).val(result.plantilla);
                    $('#place_of_assignment_' + i).val(result.place_of_assignment);
                    $('#salary_grade_' + i).val(result.salary_grade);
                    $('#date_created_' + i).val(result.date_created);

                }
            });

        });
    });


    // adding item 
    $(document).ready(function() {

        var item_list;
        var maxField = 10;
        var x = 1;
        var office_list;
        var dept_list;

        // getting items 
        $.ajax({
            type: "GET",
            url: "item_list.php",
            dataType: "html",
            success: function(data) {
                item_list = data;
            }
        });

        // // getting departments 
        // $.ajax({
        //     type: "GET",
        //     url: "dept_list.php",
        //     dataType: "html",
        //     success: function(data) {
        //         dept_list = data;
        //     }
        // });

        $('.add_item_btn').click(function() {
            if (x < maxField) {
                x++;
                var fieldHtml = '<div class="form-row mt-2"> <div class="col-lg-12 col-sm-12"> <label for="" class="h6">Item Details</label> </div> </div> <div class="form-row"> <div class="col-lg-5 col-sm-6"> <select class="form-control text-input item_number " name="item_number[]" id="item_number_' + x + '"> ' + item_list + ' </select> </div> <div class="col-lg-2 col-sm-6"> <input type="text" class="form-control text-input" name="plantilla[]" placeholder="Plantilla" id="plantilla_' + x + '"> </div> <div class="col-lg-1 col-sm-6"> <input type="text" class="form-control text-input" name="salary_grade[]" placeholder="SG" id="salary_grade_' + x + '"> </div> <div class="col-lg-3 col-sm-6"> <input type="text" class="form-control text-input" name="place_of_assignment[]" placeholder="Place of assignment" id="place_of_assignment_' + x + '"> </div>  </div> ';

                $('.add_item_wrapper').append(fieldHtml);
                // console.log(fieldHtml);
            }
        });

        // getting office related to department in 

        // $(document).on('click', '.department_name', function() {


        //     var id = $(this).attr('id');
        //     var myArray = id.split("_");
        //     var i = myArray[2];

        //     $("#department_name_" + i).change(function() {

        //         $.ajax({
        //             url: 'get_office_name.php',
        //             type: 'post',
        //             data: {
        //                 dept: $(this).val()
        //             },
        //             success: function(response) {
        //                 $('.office_data_' + i).html(response);

        //             }
        //         });

        //     });

        // });

    });
</script>