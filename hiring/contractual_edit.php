<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<?php
if (isset($_GET['id'])) {
    echo $_GET['id'];
}
?>
<div class="form-row mt-2 mb-4">
    <div class="col-lg-12 col-sm-12">
        <h4 class="h4-heading">POSITION MANAGEMENT - CONTRACTUAL </h4>
    </div>
</div>


<h4 class="background-title-1 p-3">Edit Position</h4>

<div class="" style="border:solid 1px #505A43 ; padding:20px;">



    <form method="post" action="" enctype="multipart/form-data">

        <input type="hidden" name="job_type" value="Contractual">

        <div class="form-row">
            <div class="col-lg-12 col-sm-12">
                <label for="" class="h6">Position Information</label>
            </div>
        </div>

        <div class="form-row">
            <div class="col-lg-3 col-sm-6">
                <input type="text" class="form-control text-input" name="position" placeholder="Position No">
            </div>

            <div class="col-lg-3 col-sm-6">
                <input type="text" class="form-control text-input" name="position" placeholder="Position">
            </div>

            <div class="col-lg-3 col-sm-6">
                <input type="text" class="form-control text-input" name="salary_grade" placeholder="Salary Grade">
            </div>

            <div class="col-lg-3 col-sm-6">
                <input type="text" class="form-control text-input" name="duration" placeholder="Duration">
            </div>

            <div class="col-lg-3 col-sm-6 mt-2">
                <label for="">From date</label>
                <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['gra_from_date'] ?>" name="gra_from_date">

            </div>

            <div class="col-lg-3 col-sm-6 mt-2">
                <label for="">To date</label>
                <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['gra_from_date'] ?>" name="gra_from_date">

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
                    <input type="text" class="form-control text-input mt-1 mb-1" name="per_original_education[]">
                </div>

                <button type="button" class="btn button-1 float-right add_education pr-1 pl-1 pt-0 pb-0">+</button>
            </div>

            <div class="col-lg-3 col-sm-6 ">
                <span>Work Experience</span>

                <div class="work_exp_wrapper">
                    <input type="text" class="form-control text-input mt-1 mb-1" name="per_original_work_exp[]">
                </div>

                <button type="button" class="btn button-1 float-right add_work_exp pr-1 pl-1 pt-0 pb-0">+</button>
            </div>

            <div class="col-lg-3 col-sm-6 ">
                <span>Training</span>

                <div class="traning_wrapper">
                    <input type="text" class="form-control text-input mt-1 mb-1" name="per_original_training[]">
                </div>

                <button type="button" class="btn button-1 float-right add_training pr-1 pl-1 pt-0 pb-0">+</button>
            </div>

            <div class="col-lg-3 col-sm-6 ">
                <span>Eligibility</span>

                <div class="eligibility_wrapper">
                    <input type="text" class="form-control text-input mt-1 mb-1" name="per_original_eligibility[]">
                </div>

                <button type="button" class="btn button-1 float-right add_eligibility pr-1 pl-1 pt-0 pb-0">+</button>
            </div>

        </div>


        <div class="modal-footer">
            <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
            </button>
            <button type="submit" name="submit-con" class="btn button-1 ">Submit</button>
        </div>
    </form>

</div>