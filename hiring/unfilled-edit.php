<?php require '../includes/conn.php'; ?>

<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<?php 



if (isset($_POST['submit'])) {

    $assigned = 0;
    // $item_no = $_POST['item_no'];086 
    $applicant_id = $_POST['applicant_id'];
    $applicant_rating = $_POST['applicant_rating'];
    $applicant_rank = $_POST['applicant_rank'];
    $applicant_first_name = $_POST['applicant_first_name'];
    $applicant_last_name = $_POST['applicant_last_name'];
    $applicant_middle_name = $_POST['applicant_middle_name'];
    $applicant_ext = $_POST['applicant_ext'];
    $applicant_gender = $_POST['applicant_gender'];
    $applicant_country = $_POST['applicant_country'];
    $applicant_state = $_POST['applicant_state'];
    $applicant_municipal = $_POST['applicant_municipal'];
    $applicant_zip = $_POST['applicant_zip'];

    $sql = "DELETE FROM applicant WHERE applicant_id='$applicant_id'";
        $conn->query($sql);

    if (!empty($_FILES["applicant_image"]["name"])) {
        $applicant_image = "applicant" . $applicant_id . "-" . $_FILES["applicant_image"]["name"];

        $tempname = $_FILES["applicant_image"]["tmp_name"];
        $folder = "../img/" . $applicant_image;


        //checking file extension

        $text1 = explode('.', $_FILES['applicant_image']['name']);
        $text = strtolower(end($text1));
        $file_ext = strtolower($text);
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            echo  '<script>toastr.error("Image must be JPG , JPEG ,PNG format ! ")</script>';
        } else {
            (move_uploaded_file($tempname, $folder));
        }
    }

    $sql = "INSERT INTO applicant (
item_no  , assigned , applicant_id , applicant_rating , applicant_rank , applicant_first_name, applicant_last_name, applicant_middle_name, applicant_ext, applicant_gender, applicant_country, applicant_state, applicant_municipal, applicant_zip ,applicant_image) VALUES (  '$item_no'  , '$assigned' , '$applicant_id' ,' $applicant_rating' , '$applicant_rank', '$applicant_first_name', '$applicant_last_name', '$applicant_middle_name', '$applicant_ext', '$applicant_gender', '$applicant_country', '$applicant_state', '$applicant_municipal','$applicant_zip' , '$applicant_image')";


    if (!empty($_POST['hiring_education'])) {
        for ($i = 0; $i < count($_POST['hiring_education']); $i++) {

            $hiring_education = $_POST['hiring_education'][$i];

            $sql1 = "INSERT INTO hiring_education (
applicant_id  , hiring_education  ) VALUES ( '$applicant_id'  , '$hiring_education')";

            mysqli_query($conn, $sql1);
        }
    }

    if (!empty($_POST['hiring_work_exp'])) {
        for ($i = 0; $i < count($_POST['hiring_work_exp']); $i++) {

            $hiring_work_exp = $_POST['hiring_work_exp'][$i];

            $sql2 = "INSERT INTO hiring_work_exp (
    applicant_id  , hiring_work_exp  ) VALUES ( '$applicant_id'  , '$hiring_work_exp')";
            mysqli_query($conn, $sql2);
        }
    }

    if (!empty($_POST['hiring_training'])) {
        for ($i = 0; $i < count($_POST['hiring_training']); $i++) {

            $hiring_training = $_POST['hiring_training'][$i];

            $sql3 = "INSERT INTO hiring_training (
        applicant_id  , hiring_training  ) VALUES ( '$applicant_id'  , '$hiring_training')";
            mysqli_query($conn, $sql3);
        }
    }

    if (!empty($_POST['hiring_eligibility'])) {
        for ($i = 0; $i < count($_POST['hiring_eligibility']); $i++) {

            $hiring_eligibility = $_POST['hiring_eligibility'][$i];

            $sql4 = "INSERT INTO hiring_eligibility (
            applicant_id  , hiring_eligibility  ) VALUES ( '$applicant_id'  , '$hiring_eligibility')";
            mysqli_query($conn, $sql4);
        }
    }



    if (mysqli_query($conn, $sql)) {

        echo  '<script>toastr.success("Applicant updated successfully")</script>';
    } else {
        echo  '<script>toastr.error("Applicant not updated. Try again !")</script>';
    }
}

?>


<?php
if (isset($_GET['applicant_id'])) {

    $applicant_id =  $_GET['applicant_id'];


    $query = "SELECT * FROM applicant WHERE applicant_id = '$applicant_id'";

    $runquery = $conn->query($query);
    if ($runquery == true) {
        while ($mydata = $runquery->fetch_assoc()) {
            $photo_to_show = '../img/'.$mydata['applicant_image'];
?>

            <h3 class=" background-title-1 p-3">Edit Applicant</h3>

            <div class="container">

                <form method="post" action="" enctype="multipart/form-data">



                    <div class="form-row mt-5">

                        <div class="col-lg-3 col-sm-6">
                            <label for="">Applicant Id</label>
                            <input type="text" class="form-control text-input" name="applicant_id" placeholder="Applicant ID" value="<?php echo $mydata['applicant_id']; ?>">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                        <label for="">Applicant Rating</label>
                            <input type="text" class="form-control text-input" name="applicant_rating" placeholder="Rating" value="<?php echo $mydata['applicant_rating']; ?>">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                        <label for="">Applicant Rank</label>
                            <input type="text" class="form-control text-input" name="applicant_rank" placeholder="Rank" value="<?php echo $mydata['applicant_rank']; ?>">
                        </div>


                    </div>

                    <div class="form-row mt-3">
                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class=" form-control text-input" placeholder="First name" name="applicant_first_name" value="<?php echo $mydata['applicant_first_name']; ?>">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class=" form-control text-input" placeholder="Last name" name="applicant_last_name" value="<?php echo $mydata['applicant_last_name']; ?>">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" placeholder="Middle name" name="applicant_middle_name" value="<?php echo $mydata['applicant_middle_name']; ?>">
                        </div>
                        <div class="col-lg-1 col-sm-6">
                            <input type="text" class="form-control text-input" placeholder="ext" name="applicant_ext" value="<?php echo $mydata['applicant_ext']; ?>">
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <input type="text" class="form-control text-input" placeholder="Sex" name="applicant_gender" value="<?php echo $mydata['applicant_gender']; ?>">
                        </div>
                    </div>

                    <div class="form-row mt-3">

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class=" form-control text-input" placeholder="Country" name="applicant_country" value="<?php echo $mydata['applicant_country']; ?>">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class=" form-control text-input" placeholder="Province/State" name="applicant_state" value="<?php echo $mydata['applicant_state']; ?>">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" placeholder="Municipality" name="applicant_municipal" value="<?php echo $mydata['applicant_municipal']; ?>">
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <input type="text" class="form-control text-input" placeholder="Zip code" name="applicant_zip" value="<?php echo $mydata['applicant_zip']; ?>">
                        </div>

                    </div>



                    <div class="form-row mt-4">
                        <div class="col-lg-12 col-sm-12">
                            <label for="" class="h6">Minimum Qualification</label>
                        </div>
                    </div>

                    <div class="form-row">

                   

                        <div class="col-lg-3 col-sm-6 ">
                            <label for="">Education</label>
                            <div class="education_wrapper">
                            <?php


                            $query = "SELECT * FROM hiring_education WHERE applicant_id = '$applicant_id'";

                            $runquery = $conn->query($query);
                            $rowcount = mysqli_num_rows($runquery);
                            if ($rowcount > 0) {

                                while ($mydata = $runquery->fetch_assoc()) {

                                    echo '<input type="text" class=" form-control text-input mt-2 mb-1" placeholder="" value=" ' . $mydata["hiring_education"] . '">';
                                }
                            } else {
                                echo '<input type="text" class=" form-control text-input mt-2 mb-1" placeholder="" value=" ">';
                            }
                            ?>

                            
                        </div>
                        <button type="button" class="btn button-1 float-right add_education pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <label for="">Work Experience</label>
                            <div class="work_exp_wrapper">
                            <?php


                            $query = "SELECT * FROM hiring_work_exp WHERE applicant_id = '$applicant_id'";

                            $runquery = $conn->query($query);
                            $rowcount = mysqli_num_rows($runquery);
                            if ($rowcount > 0) {

                                while ($mydata = $runquery->fetch_assoc()) {

                                    echo '<input type="text" class=" form-control text-input mt-2 mb-1" placeholder="" value=" ' . $mydata["hiring_work_exp"] . '">';
                                }
                            }else {
                                echo '<input type="text" class=" form-control text-input mt-2 mb-1" placeholder="" value=" ">';
                            }
                            ?>
</div>
                            <button type="button" class="btn button-1 float-right add_work_exp pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <label for="">Training</label>
                            <div class="traning_wrapper">
                            <?php


                            $query = "SELECT * FROM hiring_training WHERE applicant_id = '$applicant_id'";

                            $runquery = $conn->query($query);
                            $rowcount = mysqli_num_rows($runquery);
                            if ($rowcount > 0) {

                                while ($mydata = $runquery->fetch_assoc()) {

                                    echo '<input type="text" class=" form-control text-input mt-2 mb-1" placeholder="" value=" ' . $mydata["hiring_training"] . '">';
                                }
                            }else {
                                echo '<input type="text" class=" form-control text-input mt-2 mb-1" placeholder="" value=" ">';
                            }
                            ?>
</div>
                            <button type="button" class="btn button-1 float-right add_training pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <label for="">Eligibility</label>
                            <div class="eligibility_wrapper">
                            <?php


                            $query = "SELECT * FROM hiring_eligibility WHERE applicant_id = '$applicant_id'";

                            $runquery = $conn->query($query);
                            $rowcount = mysqli_num_rows($runquery);
                            if ($rowcount > 0) {

                                while ($mydata = $runquery->fetch_assoc()) {

                                    echo '<input type="text" class=" form-control text-input mt-2 mb-1" placeholder="" value=" ' . $mydata["hiring_eligibility"] . '">';
                                }
                            }else {
                                echo '<input type="text" class=" form-control text-input mt-2 mb-1" placeholder="" value=" ">';
                            }
                            ?>
</div>
                            <button type="button" class="btn button-1 float-right add_eligibility pr-1 pl-1 pt-0 pb-0">+</button>
                        </div>


                    </div>

                    <div class="form-row mt-4">
                        <div class="col-lg-12 col-sm-12">
                            <label for="" class="h6">Credentials</label>
                        </div>
                    </div>

                    <div class="form-row mt-4">
                      <div class="col-lg-6 col-sm-6">
                          <input type="file" name="" id="">
                      </div>

                      <div class="col-lg-12 col-sm-6  float-right mt-2">
                      
                      <button type="submit" name="submit" class="btn button-1 ">Update</button>
                  </div>

                        </div>

                       
                    </div>


                    


                </form>

            </div>

<?php }
    }
} ?>

<script type="text/javascript">
                $(document).ready(function() {
                    var maxField = 10;
                    var x = 1;

                    $('.add_education').click(function() {
                        if (x < maxField) {
                            x++;
                            $('.education_wrapper').append(
                                '<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_education[]" >'
                            );
                        }
                    });

                    $('.add_work_exp').click(function() {
                        if (x < maxField) {
                            x++;
                            $('.work_exp_wrapper').append(
                                '<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_work_exp[]">'
                            );
                        }
                    });

                    $('.add_training').click(function() {
                        if (x < maxField) {
                            x++;
                            $('.traning_wrapper').append(
                                '<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_training[]">'
                            );
                        }
                    });

                    $('.add_eligibility').click(function() {
                        if (x < maxField) {
                            x++;
                            $('.eligibility_wrapper').append(
                                '<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_eligibility[]">'
                            );
                        }
                    });


                });
            </script>