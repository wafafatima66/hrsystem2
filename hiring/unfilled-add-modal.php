<?php



if (isset($_POST['submit'])) {

    $assigned = 0;
    $item_no = $_POST['item_no'];
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
    } else {
        $applicant_image = "";
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

        echo  '<script>toastr.success("Item added successfully")</script>';
    } else {
        echo  '<script>toastr.error("Item not added. Try again !")</script>';
    }
}


?>


<div class="modal fade addapplicant " id="addapplicant" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">


                        <h3 class=" background-title-1 p-3">Add Applicant</h3>

                        <div class="modal-body">

                            <div class="container">

                                <?php
                                if (isset($_GET['id'])) {

                                    $id =  $_GET['id'];

                                    $query = "SELECT item_no FROM item WHERE id = '$id'";
                                    $runquery = $conn->query($query);
                                    if ($runquery == true) {
                                        while ($mydata = $runquery->fetch_assoc()) {

                                            $item_no =  $mydata['item_no'];
                                        }
                                    }
                                }

                                ?>

                                <form method="post" action="" enctype="multipart/form-data">

                                    <input type="hidden" name="item_no" value="<?php echo $item_no; ?>">

                                    <div class="form-row">

                                        <div class="col-lg-3 col-sm-6">
                                            <input type="text" class="form-control text-input" name="applicant_id" placeholder="Applicant ID" id="applicant_id"  onBlur="checkAvailability()">

                                            
            <p id="user-availability-status"></p>
       
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <input type="text" class="form-control text-input" name="applicant_rating" placeholder="Rating">
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <input type="text" class="form-control text-input" name="applicant_rank" placeholder="Rank">
                                        </div>


                                    </div>

                                    <div class="form-row mt-3">
                                        <div class="col-lg-3 col-sm-6">
                                            <input type="text" class=" form-control text-input" placeholder="First name" name="applicant_first_name" value="">
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <input type="text" class=" form-control text-input" placeholder="Last name" name="applicant_last_name" value="">
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <input type="text" class="form-control text-input" placeholder="Middle name" name="applicant_middle_name" value="">
                                        </div>
                                        <div class="col-lg-1 col-sm-6">
                                            <input type="text" class="form-control text-input" placeholder="ext" name="applicant_ext" value="">
                                        </div>
                                        <div class="col-lg-2 col-sm-6">
                                            <input type="text" class="form-control text-input" placeholder="Sex" name="applicant_gender" value="">
                                        </div>
                                    </div>

                                    <div class="form-row mt-3">

                                        <div class="col-lg-3 col-sm-6">
                                            <input type="text" class=" form-control text-input" placeholder="Country" name="applicant_country" value="">
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <input type="text" class=" form-control text-input" placeholder="Province/State" name="applicant_state" value="">
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <input type="text" class="form-control text-input" placeholder="Municipality" name="applicant_municipal" value="">
                                        </div>
                                        <div class="col-lg-1 col-sm-6">
                                            <input type="text" class="form-control text-input" placeholder="Zip code" name="applicant_zip" value="">
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

                                    <div class="form-row mt-4">
                                        <div class="col-lg-12 col-sm-12">
                                            <label for="" class="h6">Credentials</label>
                                        </div>
                                    </div>

                                    <div class="form-row mt-4">
                                        <div class="col-lg-4 col-sm-6">
                                            <input type="file" name="applicant_image" id="">
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

    var applicant_id = 'applicant_id=' + $("#applicant_id").val();

    console.log(applicant_id);

    jQuery.ajax({
      url: "check_id.php",
      data: applicant_id,
      type: "POST",
      success: function(data) {
        $("#user-availability-status").html(data);
        // $("#loaderIcon").hide();
      },
      error: function() {}
    });
  }
            </script>