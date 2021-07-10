<div class="row mt-5 ">

    <div class=" col-lg-12 col-sm-12 mb-3">
        <h4>ITEM MANAGEMENT - JOB ORDER/CONTRACTUAL </h4>
    </div>

    <div class="col-lg-5 col-sm-6">
        <div class="input-group">
            <input type="search" class="form-control">
            <button type="button" class="home-page-search-btn">
                <i class="fa fa-search"></i>
            </button>

            <button type="button" class="ml-3 btn button-1" data-toggle="modal" data-target="#addposition">Add Position</button>


        </div>

    </div>

    <div class="ml-auto col-lg-3 col-sm-6">
        <div class="dropdown">
            <button class=" btn dropdown-toggle home-page-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Filter By
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>
    </div>
</div>

<table class="table home-page-table mt-4 table-striped ">
    <thead>
        <tr>
            <th scope="col">Employee Id</th>
            <th scope="col">Name</th>
            <th scope="col">Type Of Leave</th>
            <th scope="col">Duration</th>
            <th scope="col">Details of leave</th>
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

<div class="modal fade addposition " id="addposition" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">


            <h3 class=" background-title-1 p-3">Add Position</h3>

            <div class="modal-body">

            <div class="container">

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
            </div>



        </div>

    </div>


</div>