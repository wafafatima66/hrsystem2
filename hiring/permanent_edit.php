<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<?php 
// if(isset($_GET['id'])){
//     echo $_GET['id'];
// }
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

        <div class="form-row">
            <div class="col-lg-3 col-sm-6">
                <input type="text" class="form-control text-input" name="item_no" placeholder="Item No ">
            </div>

            <div class="col-lg-3 col-sm-6">
                <input type="text" class="form-control text-input" name="position" placeholder="Position">
            </div>

            <div class="col-lg-3 col-sm-6">
                <input type="text" class="form-control text-input" name="salary_grade" placeholder="Salary Grade">
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="d-flex flex-column">
                    <input type="date" class="form-control text-input" name="date_created">
                    <small class="text-muted"> (Date created)</small>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <input type="text" class="form-control text-input" name="" placeholder="Place of assignment">
            </div>

        </div>

        <div class="form-row mt-2">
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

        <div class="form-row mt-2">
            <div class="col-lg-12 col-sm-12">
                <label for="" class="h6">Applicable competency</label>
            </div>
        </div>

        <div class="form-row mb-2">

            <div class="col-lg-3 col-sm-6 ">
                <span>Competency 1</span>

                <div class="com_wrapper_1">
                    <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_education[]">
                </div>

                <button type="button" class="btn button-1 float-right add_com_1 pr-1 pl-1 pt-0 pb-0">+</button>
            </div>

            <div class="col-lg-3 col-sm-6 ">
                <span>Competency 2</span>

                <div class="com_wrapper_2">
                    <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_work_exp[]">
                </div>

                <button type="button" class="btn button-1 float-right add_com_2 pr-1 pl-1 pt-0 pb-0">+</button>
            </div>

            <div class="col-lg-3 col-sm-6 ">
                <span>Competency 3</span>

                <div class="com_wrapper_3">
                    <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_training[]">
                </div>

                <button type="button" class="btn button-1 float-right add_com_3 pr-1 pl-1 pt-0 pb-0">+</button>
            </div>

            <div class="col-lg-3 col-sm-6 ">
                <span>Competency 4</span>

                <div class="com_wrapper_4">
                    <input type="text" class="form-control text-input mt-1 mb-1" name="hiring_eligibility[]">
                </div>

                <button type="button" class="btn button-1 float-right add_com_4 pr-1 pl-1 pt-0 pb-0">+</button>
            </div>

        </div>


        <div class="modal-footer">
            
            <button type="submit" name="submit" class="btn button-1 ">Submit</button>
        </div>
    </form>
</div>

