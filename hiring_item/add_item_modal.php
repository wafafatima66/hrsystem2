<?php
if (isset($_POST['submit'])) {

    $item_no = $_POST['item_no'];
    $position = $_POST['position'];
    $salary_grade = $_POST['salary_grade'];
    $date_created = $_POST['date_created'];
    $place_of_assignment = $_POST['place_of_assignment'];
    $department = $_POST['department'];
    $office = $_POST['office'];
    $description = $_POST['description'];
    $monthly_salary = $_POST['monthly_salary'];
    $level_of_competency = $_POST['level_of_competency'];
    $filled = 0;
    $date_posted = date('Y-m-d');
    // $nature = 'Original';
    $job_type = 'P';

    $time = array();
    $functions = array();
  
    if (isset($_POST['time_allocation'])) {
      for ($i = 0; $i < count($_POST['time_allocation']); $i++) {
        $time[$i] = $_POST['time_allocation'][$i] ;
        $functions[$i] = $_POST['time_allocation_function'][$i];
      }
      $myjson = array(
        "time" => $time,
        "functions" => $functions
      );
      $time_allocations = json_encode($myjson);
    }

    $sql = "INSERT INTO item (
         item_no  , position , salary_grade , date_created , filled , place_of_assignment , date_posted , appt_stat , division , area_wrk_assign , description , monthly_salary , time_allocations , level_of_competency) VALUES (  '$item_no'  , '$position' , '$salary_grade' ,' $date_created' , '$filled' , '$place_of_assignment' , '$date_posted' , '$job_type' , '$department' , '$office' , '$description' , '$monthly_salary' , '$time_allocations' , '$level_of_competency')";

    if (!empty($_POST['hiring_education'])) {
        for ($i = 0; $i < count($_POST['hiring_education']); $i++) {

            $hiring_education = $_POST['hiring_education'][$i];

            $sql1 = "INSERT INTO hiring_education (
     item_no  , hiring_education  ) VALUES ( '$item_no'  , '$hiring_education')";

            mysqli_query($conn, $sql1);
        }
    }

    if (!empty($_POST['hiring_work_exp'])) {
        for ($i = 0; $i < count($_POST['hiring_work_exp']); $i++) {

            $hiring_work_exp = $_POST['hiring_work_exp'][$i];

            $sql2 = "INSERT INTO hiring_work_exp (
                item_no  , hiring_work_exp  ) VALUES ( '$item_no'  , '$hiring_work_exp')";
            mysqli_query($conn, $sql2);
        }
    }

    if (!empty($_POST['hiring_training'])) {
        for ($i = 0; $i < count($_POST['hiring_training']); $i++) {

            $hiring_training = $_POST['hiring_training'][$i];

            $sql3 = "INSERT INTO hiring_training (
                    item_no  , hiring_training  ) VALUES ( '$item_no'  , '$hiring_training')";
            mysqli_query($conn, $sql3);
        }
    }

    if (!empty($_POST['hiring_eligibility'])) {
        for ($i = 0; $i < count($_POST['hiring_eligibility']); $i++) {

            $hiring_eligibility = $_POST['hiring_eligibility'][$i];

            $sql4 = "INSERT INTO hiring_eligibility (
                        item_no  , hiring_eligibility  ) VALUES ( '$item_no'  , '$hiring_eligibility')";
            mysqli_query($conn, $sql4);
        }
    }

    // competency
    if (!empty($_POST['add_com_1'])) {
        for ($i = 0; $i < count($_POST['add_com_1']); $i++) {

            $add_com = $_POST['add_com_1'][$i];
            $com_num = 1;
            $sql5 = "INSERT INTO hiring_competency (
                            item_no  , add_com , com_num  ) VALUES ( '$item_no'  , '$add_com' ,'$com_num')";
            mysqli_query($conn, $sql5);
        }
    }

    if (!empty($_POST['add_com_2'])) {
        for ($i = 0; $i < count($_POST['add_com_2']); $i++) {

            $add_com = $_POST['add_com_2'][$i];
            $com_num = 2;
            $sql6 = "INSERT INTO hiring_competency (
                                item_no  , add_com , com_num  ) VALUES ( '$item_no'  , '$add_com' ,'$com_num')";
            mysqli_query($conn, $sql6);
        }
    }

    if (!empty($_POST['add_com_3'])) {
        for ($i = 0; $i < count($_POST['add_com_3']); $i++) {

            $add_com = $_POST['add_com_3'][$i];
            $com_num = 3;
            $sql6 = "INSERT INTO hiring_competency (
                                    item_no  , add_com , com_num  ) VALUES ( '$item_no'  , '$add_com' ,'$com_num')";
            mysqli_query($conn, $sql6);
        }
    }

    if (!empty($_POST['add_com_4'])) {
        for ($i = 0; $i < count($_POST['add_com_4']); $i++) {

            $add_com = $_POST['add_com_4'][$i];
            $com_num = 4;
            $sql7 = "INSERT INTO hiring_competency (
                                        item_no  , add_com , com_num  ) VALUES ( '$item_no'  , '$add_com' ,'$com_num')";
            mysqli_query($conn, $sql7);
        }
    }


    if (mysqli_query($conn, $sql)) {
        echo  '<script>toastr.success("Item added successfully")</script>';
    } else {
        echo  '<script>toastr.error("Item not added. Try again !")</script>';
    }
}
?>

<div class="modal fade add_item " id="add_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">


            <h3 class=" background-title-1 p-3">Add Item</h3>

            <div class="modal-body">

                <div class="container ">

                    <form method="post" action="" enctype="multipart/form-data">

                        <!-- <input type="hidden" name="nature" value="Original">

    <input type="hidden" name="filled" value="0"> -->

                        <div class="form-row">
                            <div class="col-lg-12 col-sm-12">
                                <label for="" class="lead">Item Information</label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-3 col-sm-6">
                                <input type="text" class="form-control text-input" name="item_no" placeholder="Item No " id="item_no" onBlur="checkAvailability()">

                                <p id="user-availability-status"></p>

                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <input type="text" class="form-control text-input" name="position" placeholder="Position">
                            </div>

                            <div class="col-lg-1 col-sm-6">
                                <input type="text" class="form-control text-input" name="salary_grade" placeholder="SG">
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <input type="text" class="form-control text-input" name="monthly_salary" placeholder="Monthly Salary">
                            </div>

                            <div class="col-lg-2 col-sm-6">
                                <div class="d-flex flex-column">
                                    <input type="date" class="form-control text-input" name="date_created">
                                    <small class="text-muted"> (Date created)</small>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <input type="text" class="form-control text-input" name="place_of_assignment" placeholder="Place of assignment">
                            </div>

                            <!-- <div class="col-lg-3 col-sm-6">
                                <input type="text" class="form-control text-input" name="department" placeholder="Department">
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <input type="text" class="form-control text-input" name="office" placeholder="Office">
                            </div> -->

                            <div class="col-lg-3 col-sm-6">
                                <select class="form-control text-input" name="department">

                                    <?php
                                    $query = "select * from (SELECT DISTINCT department_name FROM department union select division from item ) as tablec where tablec.department_name != '' ";
                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        echo "<option value='' disabled selected hidden> Department </option> ";
                                        while ($mydata = mysqli_fetch_assoc($result)) {
                                            echo "<option value= '" . $mydata['department_name'] . "'>" . $mydata['department_name'] . "</option>";
                                        }
                                    } else {
                                        echo "<option value='' disabled selected hidden> Department </option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <select class="form-control text-input" name="office">
                                    <?php
                                    $query = "SELECT * FROM ( SELECT DISTINCT area_wrk_assign from item UNION SELECT DISTINCT office_name FROM office ) as tableC WHERE tableC.area_wrk_assign != '' ";

                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        echo "<option value='' disabled selected hidden> Office </option> ";
                                        while ($mydata = mysqli_fetch_assoc($result)) {
                                            echo "<option value= '" . $mydata['area_wrk_assign'] . "'>" . $mydata['area_wrk_assign'] . "</option>";
                                        }
                                    } else {
                                        echo "<option value='' disabled selected hidden>  Office</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>

                        <div class="form-row mt-3">
                            <div class="col-lg-12 col-sm-12">
                                <label for="" class="lead">Minimum Qualification</label>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="col-lg-3 col-sm-6 ">
                                <span>Education</span>

                                <div class="education_wrapper">
                                    <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_education[]">
                                </div>

                                <button type="button" class="btn button-1 float-right add_education pr-1 pl-1 pt-0 pb-0">+</button>
                            </div>

                            <div class="col-lg-3 col-sm-6 ">
                                <span>Work Experience</span>

                                <div class="work_exp_wrapper">
                                    <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_work_exp[]">
                                </div>

                                <button type="button" class="btn button-1 float-right add_work_exp pr-1 pl-1 pt-0 pb-0">+</button>
                            </div>

                            <div class="col-lg-3 col-sm-6 ">
                                <span>Training</span>

                                <div class="traning_wrapper">
                                    <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_training[]">
                                </div>

                                <button type="button" class="btn button-1 float-right add_training pr-1 pl-1 pt-0 pb-0">+</button>
                            </div>

                            <div class="col-lg-3 col-sm-6 ">
                                <span>Eligibility</span>

                                <div class="eligibility_wrapper">
                                    <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_eligibility[]">
                                </div>

                                <button type="button" class="btn button-1 float-right add_eligibility pr-1 pl-1 pt-0 pb-0">+</button>
                            </div>

                        </div>

                        <div class="form-row mt-2">
                            <div class="col-lg-12 col-sm-12">
                                <label class="lead">Applicable competency</label>
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <span>Level of Competency</span>
                                <input type="number" min="0" max="5" step="1" class="form-control text-input" name="level_of_competency" value="0" />
                            </div>
                        </div>

                        <div class="form-row mb-2 mt-2">

                            <div class="col-lg-3 col-sm-6 ">
                                <span class="small">Core Competencies</span>

                                <div class="com_wrapper_1">
                                    <input type="text" class="form-control text-input mt-1 mb-1" name="add_com_1[]">
                                </div>

                                <button type="button" class="btn button-1 float-right add_com_1 pr-1 pl-1 pt-0 pb-0">+</button>
                            </div>

                            <div class="col-lg-3 col-sm-6 ">
                                <span class="small">Organization Competencies</span>

                                <div class="com_wrapper_2">
                                    <input type="text" class="form-control text-input mt-1 mb-1" name="add_com_2[]">
                                </div>

                                <button type="button" class="btn button-1 float-right add_com_2 pr-1 pl-1 pt-0 pb-0">+</button>
                            </div>

                            <div class="col-lg-3 col-sm-6 ">
                                <span class="small">Leadership Competencies</span>

                                <div class="com_wrapper_3">
                                    <input type="text" class="form-control text-input mt-1 mb-1" name="add_com_3[]">
                                </div>

                                <button type="button" class="btn button-1 float-right add_com_3 pr-1 pl-1 pt-0 pb-0">+</button>
                            </div>

                            <div class="col-lg-3 col-sm-6 ">
                                <span class="small">Technical Competencies</span>

                                <div class="com_wrapper_4">
                                    <input type="text" class="form-control text-input mt-1 mb-1" name="add_com_4[]">
                                </div>

                                <button type="button" class="btn button-1 float-right add_com_4 pr-1 pl-1 pt-0 pb-0">+</button>
                            </div>

                        </div>

                        <div class="form-row mb-2 ">
                            <div class="col-lg-12 col-sm-6">
                                <textarea name="description" id="" cols="30" rows="5" class="form-control text-input mt-2 mb-1" placeholder="Brief Description of functions"></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12 col-sm-12">
                                <label for="" class="lead">Time Allocation and Functions</label>
                            </div>
                        </div>

                            <div class="time_wrapper mb-2">

                            <div class="form-row">
                                <div class="col-lg-3 col-sm-6 ">
                                    <input type="text" class="form-control text-input mt-1 mb-1" name="time_allocation[]" placeholder="Time allocation">
                                </div>

                                <div class="col-lg-8 col-sm-8 ">
                                    <!-- <input type="text" class="form-control text-input mt-1 mb-1" name="time_allocation_function[]" placeholder="Functions"> -->

                                    <textarea class="form-control text-input mt-1 mb-1" name="time_allocation_function[]" placeholder="Functions" rows="0"></textarea>
                                </div>

                                <!-- <button type="button" class="btn button-1 float-right add_time pr-1 pl-1 pt-0 pb-0">+</button> -->

                                <a class="ml-4 btn button-1 add_time mt-1" style="height: fit-content;">+</a>

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
    function checkAvailability() {
        // $("#loaderIcon").show();

        var item_no = 'item_no=' + $("#item_no").val();

        // console.log(applicant_id);

        jQuery.ajax({
            url: "check_item_no.php",
            data: item_no,
            type: "POST",
            success: function(data) {
                $("#user-availability-status").html(data);
                // $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
</script>