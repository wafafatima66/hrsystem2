<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<?php
if (isset($_POST['submit_cont'])) {

    // $nature = 'Original';
    $position_no = $_POST['position_no'];
    $position_name = $_POST['position_name'];
    $salary_grade = $_POST['salary_grade'];
    $duration = $_POST['duration'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $status = 0;
    $date_posted = date('Y-m-d');

    $del_sql_1 = "DELETE FROM cont_position WHERE position_no='$position_no'";
    $conn->query($del_sql_1);

    $del_sql_2 = "DELETE FROM hiring_education WHERE position_no='$position_no'";
    $conn->query($del_sql_2);

    $del_sql_3 = "DELETE FROM hiring_work_exp WHERE position_no='$position_no'";
    $conn->query($del_sql_3);

    $del_sql_4 = "DELETE FROM hiring_training WHERE position_no='$position_no'";
    $conn->query($del_sql_4);

    $del_sql_5 = "DELETE FROM hiring_eligibility WHERE position_no='$position_no'";
    $conn->query($del_sql_5);

    $del_sql_6 = "DELETE FROM hiring_competency WHERE position_no='$position_no'";
    $conn->query($del_sql_6);


    $sql = "INSERT INTO cont_position (
         position_no  , position_name , salary_grade , duration , from_date , to_date , status , date_posted) VALUES (  '$position_no'  , '$position_name' , '$salary_grade' ,'$duration' , '$from_date' , '$to_date' , '$status' , '$date_posted')";

    if (!empty($_POST['hiring_education'])) {
        for ($i = 0; $i < count($_POST['hiring_education']); $i++) {

            $hiring_education = $_POST['hiring_education'][$i];

            $sql1 = "INSERT INTO hiring_education (
     position_no  , hiring_education  ) VALUES ( '$position_no'  , '$hiring_education')";

            mysqli_query($conn, $sql1);
        }
    }

    if (!empty($_POST['hiring_work_exp'])) {
        for ($i = 0; $i < count($_POST['hiring_work_exp']); $i++) {

            $hiring_work_exp = $_POST['hiring_work_exp'][$i];

            $sql2 = "INSERT INTO hiring_work_exp (
                position_no  , hiring_work_exp  ) VALUES ( '$position_no'  , '$hiring_work_exp')";
            mysqli_query($conn, $sql2);
        }
    }

    if (!empty($_POST['hiring_training'])) {
        for ($i = 0; $i < count($_POST['hiring_training']); $i++) {

            $hiring_training = $_POST['hiring_training'][$i];

            $sql3 = "INSERT INTO hiring_training (
                    position_no  , hiring_training  ) VALUES ( '$position_no'  , '$hiring_training')";
            mysqli_query($conn, $sql3);
        }
    }

    if (!empty($_POST['hiring_eligibility'])) {
        for ($i = 0; $i < count($_POST['hiring_eligibility']); $i++) {

            $hiring_eligibility = $_POST['hiring_eligibility'][$i];

            $sql4 = "INSERT INTO hiring_eligibility (
                        position_no  , hiring_eligibility  ) VALUES ( '$position_no'  , '$hiring_eligibility')";
            mysqli_query($conn, $sql4);
        }
    }

    if (mysqli_query($conn, $sql)) {

        echo  '<script>toastr.success("Position updated successfully")</script>';
    } else {
        echo  '<script>toastr.error("Position not updated. Try again !")</script>';
    }
}
?>


<?php
if (isset($_GET['position_no'])) {
    $position_no =  $_GET['position_no'];
    $query = "SELECT * FROM cont_position where position_no = '$position_no' ";

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($mydata = mysqli_fetch_assoc($result)) {

        $position_no = $mydata['position_no'];
 
?>
<div class="form-row mt-2 mb-4">
    <div class="col-lg-12 col-sm-12">
        <h4 class="h4-heading">POSITION MANAGEMENT - CONTRACTUAL </h4>
    </div>
</div>


<h4 class="background-title-1 p-3">Edit Position</h4>

<div class="" style="border:solid 1px #505A43 ; padding:20px;">


<form method="post" action="" enctype="multipart/form-data">

                    <!-- <input type="hidden" name="job_type" value="Contractual"> -->

                    <div class="form-row">
                        <div class="col-lg-12 col-sm-12">
                            <label for="" class="h6">Position Information</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-3 col-sm-6">

                            <input type="text" class="form-control text-input"  placeholder="Position No" value="<?php echo $mydata['position_no']?>" disabled>

                            <input type="hidden" name="position_no" value="<?php echo $mydata['position_no']?>" >


                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" name="position_name" placeholder="Position" value="<?php echo $mydata['position_name']?>">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" name="salary_grade" placeholder="Salary Grade" value="<?php echo $mydata['salary_grade']?>">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" name="duration" placeholder="Duration" value="<?php echo $mydata['duration']?>">
                        </div>

                        <div class="col-lg-3 col-sm-6 mt-2">
                                <label for="">From date</label>
                                <input type="date" class="form-control text-input mx-sm-1"  name="from_date" value="<?php echo $mydata['from_date']?>">
                               
                        </div>

                        <div class="col-lg-3 col-sm-6 mt-2">
                        <label for="">To date</label>
                                <input type="date" class="form-control text-input mx-sm-1"  name="to_date" value="<?php echo $mydata['to_date']?>">
                               
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
                                $query = "SELECT * FROM hiring_education WHERE position_no = '$position_no'";

                                $runquery = $conn -> query($query);
                                $rowcount=mysqli_num_rows($runquery);
                                if($rowcount > 0 ){
                                
                                while($mydata = $runquery -> fetch_assoc()){  ?>

                                    <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_education[]" value="<?php echo $mydata['hiring_education']?>">
                                                
                                <?php } } else {
                                    echo '<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_education[]" >';
                                }
                            ?>
                            </div>

                            <button type="button" class="btn button-1 float-right add_education pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <span>Work Experience</span>

                            <div class="work_exp_wrapper">
                            <?php  

                                $query = "SELECT * FROM hiring_work_exp WHERE position_no = '$position_no'";

                                $runquery = $conn -> query($query);
                                $rowcount=mysqli_num_rows($runquery);
                                if($rowcount > 0 ){

                                while($mydata = $runquery -> fetch_assoc()){  ?>

                                <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_work_exp[]"  value="<?php echo $mydata['hiring_work_exp']?>" >  
                                                
                                <?php } } else {
                                    echo '  <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_work_exp[]">';
                                }
                            ?>

                            </div>

                            <button type="button" class="btn button-1 float-right add_work_exp pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <span>Training</span>

                            <div class="traning_wrapper">
                                <?php
                                    $query = "SELECT * FROM hiring_training WHERE position_no = '$position_no'";

                                    $runquery = $conn -> query($query);
                                    $rowcount=mysqli_num_rows($runquery);
                                    if($rowcount > 0 ){

                                    while($mydata = $runquery -> fetch_assoc()){  ?>

                                        <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_training[]" value="<?php echo $mydata['hiring_training']?>">            
                                                    
                                    <?php } } else {
                                        echo '<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_training[]">';
                                    }
                                ?>
                            </div>

                            <button type="button" class="btn button-1 float-right add_training pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <span>Eligibility</span>

                            <div class="eligibility_wrapper">

                                <?php

                                    $query = "SELECT * FROM hiring_eligibility WHERE position_no = '$position_no'";

                                    $runquery = $conn -> query($query);
                                    $rowcount=mysqli_num_rows($runquery);
                                    if($rowcount > 0 ){

                                    while($mydata = $runquery -> fetch_assoc()){  ?>

                                        <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_eligibility[]" value="<?php echo $mydata['hiring_eligibility']?>">            
                                                    
                                    <?php } } else {
                                        echo '<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_eligibility[]">';
                                    }
                                    
                                ?>
                            </div>

                            <button type="button" class="btn button-1 float-right add_eligibility pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
                        </button>
                        <button type="submit" name="submit_cont" class="btn button-1 ">Submit</button>
                    </div>
                </form>

</div>

<?php      }}
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



    });
</script>