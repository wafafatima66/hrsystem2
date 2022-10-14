<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

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

    $del_sql_1 = "DELETE FROM item WHERE item_no='$item_no'";
    $conn->query($del_sql_1);

    $del_sql_2 = "DELETE FROM hiring_education WHERE item_no='$item_no'";
    $conn->query($del_sql_2);

    $del_sql_3 = "DELETE FROM hiring_work_exp WHERE item_no='$item_no'";
    $conn->query($del_sql_3);

    $del_sql_4 = "DELETE FROM hiring_training WHERE item_no='$item_no'";
    $conn->query($del_sql_4);

    $del_sql_5 = "DELETE FROM hiring_eligibility WHERE item_no='$item_no'";
    $conn->query($del_sql_5);

    $del_sql_6 = "DELETE FROM hiring_competency WHERE item_no='$item_no'";
    $conn->query($del_sql_6);



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


    // if (mysqli_query($conn, $sql)) {
    //     header("Location:../hiring?update-item=success");

    // } else {
    //     header("Location:../hiring?update-item=fail");
    // }


    if (mysqli_query($conn, $sql)) {
        echo  '<script>toastr.success("Item updated successfully")</script>';
    } else {
        echo  '<script>toastr.error("Item not updated. Try again !")</script>';
    }
}
?>

<?php
if (isset($_GET['item_no'])) {
    $item_no = $_GET['item_no'];
    $query = "SELECT * FROM item where item_no = '$item_no' ";

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($mydata1 = mysqli_fetch_assoc($result)) {

            $item_no = $mydata1['item_no'];

?>
            <div class="form-row mt-2 mb-4">
                <div class="col-lg-12 col-sm-12">
                    <h4 class="h4-heading">ITEM MANAGEMENT - PERMANENT </h4>
                </div>
            </div>


            <h4 class="background-title-1 p-3">Edit Item</h4>

            <div class="" style="border:solid 1px #505A43 ; padding:20px;">


                <form method="post" action="" enctype="multipart/form-data">

                    <!-- <input type="hidden" name="nature" value="Original">

        <input type="hidden" name="filled" value="0"> -->

                    <div class="form-row">
                        <div class="col-lg-12 col-sm-12">
                            <label for="" class="h6">Item Information</label>
                        </div>
                    </div>

                    <div class="form-row mt-2">
                        <div class="col-lg-3 col-sm-6">
                            <label for="">Item No</label>
                            <input type="text" class="form-control text-input" placeholder="Item No " value="<?php echo $mydata1['item_no'] ?>" disabled>

                            <input type="hidden" name="item_no" value="<?php echo $mydata1['item_no'] ?>">
                        </div>

                        <div class="col-lg-5 col-sm-6">
                            <label for="">Position</label>
                            <input type="text" class="form-control text-input" name="position" placeholder="Position" value="<?php echo $mydata1['position'] ?>">
                        </div>

                        <div class="col-lg-1 col-sm-6">
                            <label for="">SG</label>
                            <input type="text" class="form-control text-input" name="salary_grade" placeholder="Salary Grade" value="<?php echo $mydata1['salary_grade'] ?>">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <label for="">Monthly Salary</label>
                                <input type="text" class="form-control text-input" name="monthly_salary" placeholder="Monthly Salary" value="<?php echo $mydata1['monthly_salary'] ?>">
                            </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="d-flex flex-column">
                                <label for="">Date created</label>
                                <input type="date" class="form-control text-input" name="date_created" value="<?php echo $mydata1['date_created'] ?>">
                                <small class="text-muted"> (Date created)</small>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <label for="">Place of assignment</label>
                            <input type="text" class="form-control text-input" name="place_of_assignment" placeholder="Place of assignment" value="<?php echo $mydata1['place_of_assignment'] ?>">
                        </div>

                        <!-- <div class="col-lg-3 col-sm-6">
                            <label for="">Department</label>
                            <input type="text" class="form-control text-input" name="department" placeholder="Department" value="<?php echo $mydata1['division'] ?>">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <label for="">Office</label>
                            <input type="text" class="form-control text-input" name="office" placeholder="Office" value="<?php echo $mydata1['area_wrk_assign'] ?>">
                        </div> -->

                        <div class="col-lg-3 col-sm-6">
                        <label for="">Department</label>
                                <select class="form-control text-input" name="department">

                                    <?php
                                    $query = "select * from (SELECT DISTINCT department_name FROM department union select division from item ) as tablec where tablec.department_name != '' ";
                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        echo "<option value='' disabled selected hidden> Department </option> ";
                                        while ($dept_data = mysqli_fetch_assoc($result)) {?>
                                       
                                            <option value= "<?php echo $dept_data['department_name']?>" 
                                            <?php echo ($dept_data['department_name'] == $mydata1['division'] ? 'selected' : '' ) ?> > 
                                            <?php echo $dept_data['department_name']?> 

                                        </option>

                                       <?php }
                                    } else {
                                        echo "<option value='' disabled selected hidden> Department </option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                            <label for="">Office</label>
                                <select class="form-control text-input" name="office">
                                    <?php
                                    $query = "SELECT * FROM ( SELECT DISTINCT area_wrk_assign from item UNION SELECT DISTINCT office_name FROM office ) as tableC WHERE tableC.area_wrk_assign != '' ";

                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        echo "<option value='' disabled selected hidden> Office </option> ";
                                        while ($office_data = mysqli_fetch_assoc($result)) {?>

                                            <!-- echo "<option value= '" . $office_data['area_wrk_assign'] . "'>" . $office_data['area_wrk_assign'] . "</option>"; -->

                                            <option value= "<?php echo $office_data['area_wrk_assign']?>" 
                                            <?php echo ($office_data['area_wrk_assign'] == $mydata1['area_wrk_assign'] ? 'selected' : '' ) ?> > 
                                            <?php echo $office_data['area_wrk_assign']?> 

                                      <?php  }
                                    } else {
                                        echo "<option value='' disabled selected hidden>  Office</option>";
                                    }
                                    ?>
                                </select>
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

                                <?php
                                $query = "SELECT * FROM hiring_education WHERE item_no = '$item_no'";

                                $runquery = $conn->query($query);
                                $rowcount = mysqli_num_rows($runquery);
                                if ($rowcount > 0) {

                                    while ($mydata = $runquery->fetch_assoc()) {  ?>

                                        <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_education[]" value="<?php echo $mydata['hiring_education'] ?>">

                                <?php }
                                } else {
                                    echo '<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_education[]" >';
                                } ?>

                            </div>

                            <button type="button" class="btn button-1 float-right add_education pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <span>Work Experience</span>

                            <div class="work_exp_wrapper">

                                <?php

                                $query = "SELECT * FROM hiring_work_exp WHERE item_no = '$item_no'";

                                $runquery = $conn->query($query);
                                $rowcount = mysqli_num_rows($runquery);
                                if ($rowcount > 0) {

                                    while ($mydata = $runquery->fetch_assoc()) {  ?>

                                        <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_work_exp[]" value="<?php echo $mydata['hiring_work_exp'] ?>">

                                <?php }
                                } else {
                                    echo '  <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_work_exp[]">';
                                } ?>


                            </div>

                            <button type="button" class="btn button-1 float-right add_work_exp pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <span>Training</span>

                            <div class="traning_wrapper">

                                <?php

                                $query = "SELECT * FROM hiring_training WHERE item_no = '$item_no'";

                                $runquery = $conn->query($query);
                                $rowcount = mysqli_num_rows($runquery);
                                if ($rowcount > 0) {

                                    while ($mydata = $runquery->fetch_assoc()) {  ?>

                                        <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_training[]" value="<?php echo $mydata['hiring_training'] ?>">

                                <?php }
                                } else {
                                    echo '<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_training[]">';
                                } ?>


                            </div>

                            <button type="button" class="btn button-1 float-right add_training pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <span>Eligibility</span>

                            <div class="eligibility_wrapper">

                                <?php

                                $query = "SELECT * FROM hiring_eligibility WHERE item_no = '$item_no'";

                                $runquery = $conn->query($query);
                                $rowcount = mysqli_num_rows($runquery);
                                if ($rowcount > 0) {

                                    while ($mydata = $runquery->fetch_assoc()) {  ?>

                                        <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_eligibility[]" value="<?php echo $mydata['hiring_eligibility'] ?>">

                                <?php }
                                } else {
                                    echo '<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_eligibility[]">';
                                } ?>


                            </div>

                            <button type="button" class="btn button-1 float-right add_eligibility pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                    </div>

                    <!-- <div class="form-row mt-2">
                        <div class="col-lg-12 col-sm-12">
                            <label for="" class="h6">Applicable competency</label>
                        </div>
                    </div> -->

                    <div class="form-row mt-2">
                            <div class="col-lg-12 col-sm-12">
                                <label class="lead">Applicable competency</label>
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <span>Level of Competency</span>
                                <input type="number" min="0" max="5" step="1" class="form-control text-input" name="level_of_competency" value="<?php echo $mydata1['level_of_competency'] ?>" />
                            </div>
                        </div>

                    <div class="form-row mb-2">

                        <div class="col-lg-3 col-sm-6 ">
                            <span>Core Competencies</span>

                            <div class="com_wrapper_1">

                                <?php

                                $query = "SELECT * FROM hiring_competency WHERE item_no = '$item_no' and com_num = 1";

                                $runquery = $conn->query($query);
                                $rowcount = mysqli_num_rows($runquery);
                                if ($rowcount > 0) {

                                    while ($mydata = $runquery->fetch_assoc()) {  ?>

                                        <input type="text" class="form-control text-input mt-1 mb-1" name="add_com_1[]" value="<?php echo $mydata['add_com'] ?>">

                                <?php }
                                } else {
                                    echo '<input type="text" class="form-control text-input mt-1 mb-1" name="add_com_1[]">';
                                } ?>


                            </div>

                            <button type="button" class="btn button-1 float-right add_com_1 pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <span>Organization Competencies</span>

                            <div class="com_wrapper_2">

                                <?php

                                $query = "SELECT * FROM hiring_competency WHERE item_no = '$item_no' and com_num = 2";

                                $runquery = $conn->query($query);
                                $rowcount = mysqli_num_rows($runquery);
                                if ($rowcount > 0) {

                                    while ($mydata = $runquery->fetch_assoc()) {  ?>

                                        <input type="text" class="form-control text-input mt-1 mb-1" name="add_com_2[]" value="<?php echo $mydata['add_com'] ?>">

                                <?php }
                                } else {
                                    echo '<input type="text" class="form-control text-input mt-1 mb-1" name="add_com_2[]">';
                                } ?>
                            </div>

                            <button type="button" class="btn button-1 float-right add_com_2 pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <span>Leadership Competencies</span>

                            <div class="com_wrapper_3">
                                <?php

                                $query = "SELECT * FROM hiring_competency WHERE item_no = '$item_no' and com_num = 3";

                                $runquery = $conn->query($query);
                                $rowcount = mysqli_num_rows($runquery);
                                if ($rowcount > 0) {

                                    while ($mydata = $runquery->fetch_assoc()) {  ?>

                                        <input type="text" class="form-control text-input mt-1 mb-1" name="add_com_3[]" value="<?php echo $mydata['add_com'] ?>">

                                <?php }
                                } else {
                                    echo '<input type="text" class="form-control text-input mt-1 mb-1" name="add_com_3[]">';
                                } ?>

                            </div>

                            <button type="button" class="btn button-1 float-right add_com_3 pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <span>Technical Competencies</span>

                            <div class="com_wrapper_4">
                                <?php

                                $query = "SELECT * FROM hiring_competency WHERE item_no = '$item_no' and com_num = 4";

                                $runquery = $conn->query($query);
                                $rowcount = mysqli_num_rows($runquery);
                                if ($rowcount > 0) {

                                    while ($mydata = $runquery->fetch_assoc()) {  ?>

                                        <input type="text" class="form-control text-input mt-1 mb-1" name="add_com_4[]" value="<?php echo $mydata['add_com'] ?>">

                                <?php }
                                } else {
                                    echo '<input type="text" class="form-control text-input mt-1 mb-1" name="add_com_4[]">';
                                } ?>

                            </div>

                            <button type="button" class="btn button-1 float-right add_com_4 pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                    </div>

                    <div class="form-row mb-2 ">
                            <div class="col-lg-12 col-sm-6">
                            <textarea name="description"  cols="30" rows="5" class="form-control text-input mt-2 mb-1" placeholder="Brief Description of functions"> <?php echo $mydata1['description'] ?> </textarea>
                            </div>
                            
                     </div>


                        <div class="form-row">
                            <div class="col-lg-12 col-sm-12">
                                <label for="" class="lead">Time Allocation and Functions</label>
                            </div>
                        </div>

                            <div class="time_wrapper mb-2">

                            <?php 
                            
                            $time_allocations = json_decode($mydata1['time_allocations']);

                            // var_dump($time_allocations->time[0]) ; 
                            // die ; 

                            if(!empty($time_allocations)){
                            for ($i = 0; $i < count($time_allocations->time); $i++) {

                            ?>
                            <div class="form-row">
                                <div class="col-lg-3 col-sm-6 ">
                                    <input type="text" class="form-control text-input mt-1 mb-1" name="time_allocation[]" placeholder="Time allocation" value="<?php echo $time_allocations->time[$i] ?>">
                                </div>

                                <div class="col-lg-8 col-sm-8 ">

                                    <textarea class="form-control text-input mt-1 mb-1" name="time_allocation_function[]" placeholder="Functions" rows="0"><?php echo $time_allocations->functions[$i] ?>
                                    </textarea>

                                </div>

                                <a class="ml-4 btn button-1 add_time mt-1" style="height: fit-content;">+</a>

                            </div>

                            <?php } } else {?>

                                <div class="form-row">
                                <div class="col-lg-3 col-sm-6 ">
                                    <input type="text" class="form-control text-input mt-1 mb-1" name="time_allocation[]" placeholder="Time allocation">
                                </div>

                                <div class="col-lg-8 col-sm-8 ">

                                    <textarea class="form-control text-input mt-1 mb-1" name="time_allocation_function[]" placeholder="Functions" rows="0"></textarea>

                                </div>

                                <a class="ml-4 btn button-1 add_time mt-1" style="height: fit-content;">+</a>

                                </div>


                            
<?php }?>
                            </div>


                    <div class="modal-footer">
                        <a href="../hiring_item/" class="btn button-1 ">Back</a>
                        <button type="submit" name="submit" class="btn button-1 ">Submit</button>
                    </div>
                </form>
            </div>

<?php     }
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

        $('.add_com_1').click(function() {
            if (x < maxField) {
                x++;
                $('.com_wrapper_1').append('<input type="text" class="form-control text-input mt-1 mb-1" name="add_com_1[]">');
            }
        });

        $('.add_com_2').click(function() {
            if (x < maxField) {
                x++;
                $('.com_wrapper_2').append('<input type="text" class="form-control text-input mt-1 mb-1" name="add_com_2[]">');
            }
        });

        $('.add_com_3').click(function() {
            if (x < maxField) {
                x++;
                $('.com_wrapper_3').append('<input type="text" class="form-control text-input mt-1 mb-1" name="add_com_3[]">');
            }
        });

        $('.add_com_4').click(function() {
            if (x < maxField) {
                x++;
                $('.com_wrapper_4').append('<input type="text" class="form-control text-input mt-1 mb-1" name="add_com_4[]">');
            }
        });

        $('.add_time').click(function() {
            if (x < maxField) {
                x++; 
                $('.time_wrapper').append('<div class="form-row"><div class="col-lg-3 col-sm-6 "> <input type="text" class="form-control text-input mt-1 mb-1" name="time_allocation[]" placeholder="Time allocation"> </div> <div class="col-lg-8 col-sm-8 "> <textarea class="form-control text-input mt-1 mb-1" name="time_allocation_function[]" placeholder="Functions" rows="0"></textarea> </div> <a class="ml-4 btn button-1 remove_time_button mt-1" style="height: fit-content;">-</a> </div>'); 
            }
        });

        $('.time_wrapper').on('click', '.remove_time_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });

    });
</script>