<?php  
if (isset($_POST['submit'])) {

    $nature = 'Original';
    $item_no = $_POST['item_no'];
    $position = $_POST['position'];
    $salary_grade = $_POST['salary_grade'];
    $date_created = $_POST['date_created'];
    $filled = 0 ; 

    $sql = "INSERT INTO item (
        nature , item_no  , position , salary_grade , date_created , filled ) VALUES ( '$nature'  , '$item_no'  , '$position' , '$salary_grade' ,' $date_created' , '$filled')";

if (!empty($_POST['hiring_education'])) {
    for ($i = 0; $i < count($_POST['hiring_education']); $i++) {

        $hiring_education = $_POST['hiring_education'][$i];

$sql1 = "INSERT INTO hiring_education (
     item_no  , hiring_education  ) VALUES ( '$item_no'  , '$hiring_education')";

    mysqli_query($conn, $sql1);

    }}

    if (!empty($_POST['hiring_work_exp'])) {
        for ($i = 0; $i < count($_POST['hiring_work_exp']); $i++) {
    
            $hiring_work_exp = $_POST['hiring_work_exp'][$i];
    
            $sql2 = "INSERT INTO hiring_work_exp (
                item_no  , hiring_work_exp  ) VALUES ( '$item_no'  , '$hiring_work_exp')";
    mysqli_query($conn, $sql2);
        }}

        if (!empty($_POST['hiring_training'])) {
            for ($i = 0; $i < count($_POST['hiring_training']); $i++) {
        
                $hiring_training = $_POST['hiring_training'][$i];
        
                $sql3 = "INSERT INTO hiring_training (
                    item_no  , hiring_training  ) VALUES ( '$item_no'  , '$hiring_training')";
        mysqli_query($conn, $sql3);
            }}

            if (!empty($_POST['hiring_eligibility'])) {
                for ($i = 0; $i < count($_POST['hiring_eligibility']); $i++) {
            
                    $hiring_eligibility = $_POST['hiring_eligibility'][$i];
            
                    $sql4 = "INSERT INTO hiring_eligibility (
                        item_no  , hiring_eligibility  ) VALUES ( '$item_no'  , '$hiring_eligibility')";
            mysqli_query($conn, $sql4);
                }}


if (mysqli_query($conn, $sql)) {
   
    echo  '<script>toastr.success("Item added successfully")</script>';
   } else {
       echo  '<script>toastr.error("Item not added. Try again !")</script>';
    
   }
}
?>


<div class="Promotion switch-tab">

    <form method="post" action="" enctype="multipart/form-data">

        <!-- <input type="hidden" name="nature" value="Original">

        <input type="hidden" name="filled" value="0"> -->

        <div class="form-row">
            <div class="col-lg-12 col-sm-12">
                <label for="" class="h6">Previous Employee Information</label>
            </div>
        </div>

        <div class="form-row">
            <div class="col-lg-4 col-sm-6">
                <input type="text" class="form-control text-input" name="" placeholder="Employee ID ">
            </div>

            <div class="col-lg-2 col-sm-6">
                <input type="text" class="form-control text-input" name="" placeholder="Last Name">
            </div>

            <div class="col-lg-2 col-sm-6">
                <input type="text" class="form-control text-input" name="" placeholder="First Name">
            </div>

            <div class="col-lg-2 col-sm-6">
                    <input type="text" class="form-control text-input" name="" placeholder="Middle Name">
            </div>

            <div class="col-lg-2 col-sm-6">
                    <input type="text" class="form-control text-input" name="" placeholder="Ext">
            </div>

        </div>

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


        <div class="modal-footer">
            <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
            </button>
            <button type="submit" name="submit" class="btn button-1 ">Submit</button>
        </div>
    </form>
</div>

