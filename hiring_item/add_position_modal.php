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

        echo  '<script>toastr.success("Position added successfully")</script>';
    } else {
        echo  '<script>toastr.error("Position not added. Try again !")</script>';
    }
}
?>

<div class="modal fade addposition " id="addposition" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">


            <h3 class=" background-title-1 p-3">Add Position</h3>

            <div class="modal-body">

            <div class="container">

                <form method="post" action="" enctype="multipart/form-data">

                    <!-- <input type="hidden" name="job_type" value="Contractual"> -->

                    <div class="form-row">
                        <div class="col-lg-12 col-sm-12">
                            <label for="" class="h6">Position Information</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" name="position_no" placeholder="Position No" id="position_no" onBlur="checkAvailability_position()">

                                <p id="position-availability-status"></p>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" name="position_name" placeholder="Position">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" name="salary_grade" placeholder="Salary Grade">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" name="duration" placeholder="Duration">
                        </div>

                        <div class="col-lg-3 col-sm-6 mt-2">
                                <label for="">From date</label>
                                <input type="date" class="form-control text-input mx-sm-1" value="" name="from_date">
                               
                        </div>

                        <div class="col-lg-3 col-sm-6 mt-2">
                        <label for="">To date</label>
                                <input type="date" class="form-control text-input mx-sm-1" value="" name="to_date">
                               
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


                    <div class="modal-footer">
                        <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
                        </button>
                        <button type="submit" name="submit_cont" class="btn button-1 ">Submit</button>
                    </div>
                </form>

</div>
            </div>



        </div>

    </div>


</div>


<script>
   
      function checkAvailability_position() {
    // $("#loaderIcon").show();

        var position_no = 'position_no=' + $("#position_no").val();

        // console.log(applicant_id);

        jQuery.ajax({
        url: "check_position.php",
        data: position_no,
        type: "POST",
        success: function(data) {
            $("#position-availability-status").html(data);
            // $("#loaderIcon").hide();
        },
        error: function() {}
        });

        // console.log(position_no);
  }

</script>