<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<?php

if(isset($_GET['id'])){

$id =  $_GET['id'];

$query = "SELECT * FROM item WHERE id = '$id'";

$runquery = $conn -> query($query);
if($runquery == true){
    while($mydata = $runquery -> fetch_assoc()){

      

?>

<div class="container ">

<div class="form-row mt-2">
            <div class="col-lg-12 col-sm-12">
                <label for="" class="h2 mb-5 ">ITEM MANAGEMENT - PERMANENT </label>
            </div>
        </div>
    
        
        <h4 class="background-title-1 p-3">Item profile (Filled)</h4>

        <div class="unfilled-box" style="border:solid 1px #505A43 ; padding:20px;">

                <div class="form-row mt-5">

                    <div class="col-lg-4 col-sm-6 form-inline">
                        <label for="" class="mx-2">Item No</label>
                        <input type="text" class=" form-control text-input" placeholder="" value="<?php echo $mydate['item_no'];?>">
                    </div>

                    <div class="col-lg-4 col-sm-6 form-inline">
                        <label for="" class="mx-2">Plantilla</label>
                        <input type="text" class=" form-control text-input" placeholder="" value="<?php echo $mydate['position'];?>">
                    </div>

                    <div class="col-lg-4 col-sm-6 form-inline">
                        <label for="" class="mx-2">Salary Grade</label>
                        <input type="text" class="form-control text-input" placeholder="" value="<?php echo $mydate['salary_grade'];?>">
                    </div>

                </div>



                <div class="form-row mt-3">

                    <!-- <div class="col-lg-4 col-sm-6 form-inline">
                        <label for="" class="mx-2">Salary Grade</label>
                        <input type="text" class=" form-control text-input" placeholder="">
                    </div> -->

                    <div class="col-lg-4 col-sm-6 form-inline">
                        <label for="" class="mx-2">Date created</label>
                        <input type="text" class=" form-control text-input" placeholder="Date Created" value="<?php echo $mydate['date_created'];?>">
                    </div>

                    <div class="col-lg-4 col-sm-6 form-inline">
                        <label for="" class="mx-2">Date posted</label>
                        <input type="text" class="form-control text-input" placeholder="Date posted">
                    </div>
                </div>

                <div class="form-row mt-3">

                    <div class="col-lg-4 col-sm-6 ">
                        <label for="" class="mx-2">Appointed Employee</label>
                        
                        <input type="text" class=" form-control text-input" placeholder="Employee Id">
                    </div>

                    <div class="col-lg-4 col-sm-6">
                    <label for="" class="mx-2">Employee Name</label>
                        <input type="text" class=" form-control text-input" placeholder="">
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <label for="" class="mx-2">Effectivity</label>
                        <input type="text" class="form-control text-input" placeholder="">
                    </div>
                </div>



                <div class="form-row mt-3">
                    <div class="col-lg-12 col-sm-12">
                        <label for="" class="h6">Applicant</label>
                    </div>
                    </div> 

                    <table class="table home-page-table mt-4 table-striped ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Rank</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>
                        <img src="../img/logo-2.png" alt="" style="width: 20px; height:20px">
                        <span>Otto</span>
                    </td>
                    <td>Mark</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>
                        <img src="../img/logo-2.png" alt="" style="width: 20px; height:20px">
                        <span>Otto</span>
                    </td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>
                        <img src="../img/logo-2.png" alt="" style="width: 20px; height:20px;">
                        <span>Otto</span>
                    </td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Otto</td>
                </tr>

            </tbody>
        </table>

        <div class="form-row mt-3">

                <div class="col-lg-12 col-sm-12">
                <label for="" class="h6">Actions</label>
                </div>


                <div class="col-lg-4 col-sm-6 form-inline">
                    <label for="" class="mx-2">Change Status</label>
                    <select name="" id="" class=" form-control text-input">
                        <option value="Filled">Filled</option>
                        <option value="Unfilled">Unfilled</option>
                    </select>
                </div>

                <div class="col-lg-4 col-sm-6 form-inline">
                    <label for="" class="mx-2">Reason</label>
                    <select name="" id="" class=" form-control text-input">
                        <option value="Filled">Retirement</option>
                        <option value="Unfilled">Resignation</option>
                        <option value="Unfilled">Promotion</option>
                        <option value="Unfilled">Demotion</option>
                        <option value="Unfilled">Death</option>
                        <option value="Unfilled">Others</option>
                    </select>
                </div>

                <div class="col-lg-4 col-sm-6 form-inline">
                <label for="" class="mx-2">Date</label>
                    <input type="date" class=" form-control text-input" placeholder="">
                </div>


                </div>


        <div class="text-right"><button class="ml-3 btn button-1">Add Applicant</button></div>



    <!-- end of first part -->

    </div>
</div>

<?php }} }?>