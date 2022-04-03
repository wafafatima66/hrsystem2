<style>
    .red {
        color: red;
    }

    .blue {
        color: blue;
    }

    .orange {
        color: orange;
    }

    .pink {
        color: darkmagenta;
    }

    .green {
        color: green;
    }
    .yellow{
        color: yellowgreen;
    }
</style>
<?php include '../config.php';

include SITE_ROOT . '/includes/header.php';


if (isset($_GET['id'])) {

    if (isset($_GET['success'])) {
        echo  '<script>toastr.success("Employee Performance added Successfully!")</script>';
    } else if (isset($_GET['error'])) {
        echo  '<script>toastr.error("Employee Performance not added Successfully. Try again !")</script>';
    } else if (isset($_GET['file'])) {
        echo  '<script>toastr.error("File must be Excel . Try again !")</script>';
    } else if (isset($_GET['delete'])) {
        echo  '<script>toastr.success("File deleted Succesfully!")</script>';
    } else if (isset($_GET['notdelete'])) {
        echo  '<script>toastr.error("File not deleted  . Try again !")</script>';
    }


    $id =  $_GET['id'];
    $query = "SELECT * FROM employee WHERE id = '$id'";

    $runquery = $conn->query($query);
    if ($runquery == true) {
        while ($mydata = $runquery->fetch_assoc()) {
            $emp_id = $mydata['emp_id'];

?>

            <div class="container ">



                <h4 class="background-title-1 p-3">Employee Performance</h4>

                <div class="" style="border:solid 1px #505A43 ; padding:20px;">

                    <div class="form-row mt-2">

                        <div class="col-lg-2 col-sm-6">
                            <label for="">Employee Id</label>
                            <input type="text" class=" form-control text-input" placeholder="Employee Id" value="<?php echo $mydata['emp_id']; ?>">
                        </div>

                        <div class="col-lg-2 col-sm-6">
                            <label for="">Last Name</label>
                            <input type="text" class=" form-control text-input" placeholder="Last name" value="<?php echo $mydata['emp_last_name']; ?>">
                        </div>

                        <div class="col-lg-2 col-sm-6">
                            <label for="">First Name</label>
                            <input type="text" class=" form-control text-input" placeholder="First Name" value="<?php echo $mydata['emp_first_name']; ?>">
                        </div>

                        <div class="col-lg-2 col-sm-6">
                            <label for="">Middle Name</label>
                            <input type="text" class=" form-control text-input" placeholder="Middle Name" value="<?php echo $mydata['emp_middle_name']; ?>">
                        </div>

                        <div class="col-lg-2 col-sm-6">
                            <label for="">Ext</label>
                            <input type="text" class=" form-control text-input" placeholder="Ext" value="<?php echo $mydata['emp_ext']; ?>">
                        </div>

                        <div class="col-lg-2 col-sm-6">
                            <label for="">Sex</label>
                            <input type="text" class=" form-control text-input" placeholder="Sex" value="<?php echo $mydata['emp_gender']; ?>">
                        </div>


                    </div>

            <?php }
    } ?>



            <div class="container performance-box ">
                <div class="row ">

                    <?php
                    $query = "SELECT * FROM emp_performance WHERE emp_id = '$emp_id'";

                    $runquery = $conn->query($query);
                    if ($runquery == true) {
                        if (mysqli_num_rows($runquery) > 0) {
                            while ($mydata = $runquery->fetch_assoc()) {

                                $excel_file_name = '../files/' . $mydata['excel_file_name'];
                    ?>

                                <div class="col-lg-4 col-sm-6 col-12 mt-2 ">
                                    <div class="performance-col">
                                <?php 
                                if($_SESSION['user_role']=='Super Administrator' || $_SESSION['user_role']=='HR Administrator'  ){ ?>
                                        <div class="d-flex justify-content-end">
                                            <a href='edit_performance_file.php?performance_file_id=<?php echo $mydata["id"] ?>&id=<?php echo $id ?>'><i class='fa fa-edit '></i></a>
                                            <a href='' class='delete_modal ml-2' data-toggle='modal' data-target='#delete_modal' data-id='performance_file_id=<?php echo $mydata["id"] ?>&id=<?php echo $id ?>'><i class='fa fa-trash '></i></a>
                                        </div>
                                        <?php } ?>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6 col-6" style="border-right: solid #6DC7CD 1px;"><a href="<?php echo $excel_file_name; ?>">
                                                    <img src="../img/excel.png" alt="" style="width:100%; height:50%"></a>
                                                <h5><?php echo $mydata["excel_file_type"] . "-" . $mydata["year"] . " " . $mydata["rating_period"] ?>
                                                </h5>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-6">
                                                <h3 class="<?php

                                                            if ($mydata["rating"] <= 1) {
                                                                echo "red";
                                                            } else  if ($mydata["rating"] <= 2) {
                                                                echo "green";
                                                            } else  if ($mydata["rating"] <= 3) {
                                                                echo " blue";
                                                            } else  if ($mydata["rating"] <= 4) {
                                                                echo "orange";
                                                            } else  if ($mydata["rating"] <= 5) {
                                                                echo "pink";
                                                            } else {
                                                                echo "yellow";
                                                            } ?>">

                                                    <?php
                                                    echo $mydata["rating"];
                                                    ?></h3>

                                                <h4> <?php
                                                        if ($mydata["rating"] <= 1) {
                                                            echo "Poor";
                                                        } else  if ($mydata["rating"] <= 2) {
                                                            echo "Not Satisfactory";
                                                        } else  if ($mydata["rating"] <= 3) {
                                                            echo " Satisfactory";
                                                        } else  if ($mydata["rating"] <= 4) {
                                                            echo "Very Satisfactory";
                                                        } else  if ($mydata["rating"] <= 5) {
                                                            echo "Outstanding";
                                                        } else {
                                                            echo "Good Work";
                                                        }
                                                        ?></h4>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                    <?php }
                        } else {
                            echo '<div class="col-lg-12 col-sm-12 text-center mt-3 ">
                            <p class=" p-3" >No Performance data found  ! </p>
                            </div>';
                        }
                    } ?>

                </div>
            </div>

            <?php include "../includes/delete_modal.php";  ?>

            <h4 class="background-title-1 p-3">Add Performance</h4>

            <form class="form-row mt-3" action="save_file.php" method="post" enctype="multipart/form-data">

                <input type="hidden" value="<?php echo $id ?>" name="id">
                <input type="hidden" value="<?php echo $emp_id; ?>" name="emp_id">

                <div class="col-lg-2 col-sm-6">
                    <select name="excel_file_type" class="form-control text-input">
                        <option value="IPCR">IPCR</option>
                        <option value="DPCR"> DPCR</option>
                    </select>
                </div>

                <div class="col-lg-1 col-sm-6">
                    <input type="number" min="1900" max="2099" step="1" class="form-control text-input" name="year" value="<?php echo date("Y"); ?>" />
                </div>

                <div class="col-lg-2 col-sm-6">
                    <select name="rating_period" class="form-control text-input">
                        <option value="">Rating period</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <!-- <select name="rating" class="form-control text-input">
                    <option value="">Rating</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select> -->
                    <input type="text" name="rating" class="form-control text-input" placeholder="Rating">
            </div>

            <div class=" col-lg-3 col-sm-6 mt-2">
                    <input type="file" name="excel_file_name" required>
                </div>

                <div class="col-lg-2 col-sm-12 mt-2">
                    <button class="btn button-1  " type="submit" name="submit">Submit</button>
                </div>

            </form>

                </div>


                <script>
                    $(document).on('click', '.delete_modal', function() {
                        var id = $(this).data('id');
                        console.log(id);
                        var url = '../includes/delete.php?';
                        var newHref = url.concat(id);
                        $('#delete_confirm_btn').attr('href', newHref);
                    });
                </script>
            <?php } ?>