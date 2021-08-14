<div class="row mt-5 ">

    <div class=" col-lg-12 col-sm-12 mb-3">
        <h4 class="h4-heading">ITEM MANAGEMENT - JOB ORDER/CONTRACTUAL </h4>
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
    
    <select name="hiring_dropdown" id="hiring_dropdown" class="form-control text-input">
        <option value="">Filter By</option>
        <option value="1">1</option>
        <option value="2">2</option>
    </select>

    </div>
</div>

<table class="table home-page-table mt-4 table-striped table-responsive-sm table-sm">
    <thead>
        <tr>
            <th scope="col">Position</th>
            <th scope="col">SG</th>
            <th scope="col">Description</th>
            <th scope="col">Duration</th>
            <th scope="col">Date posted</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Mark</td>
            <td>@mdo</td>
            <td>Otto</td>
            <td>Otto</td>
            <td>
            <a href='contractual_edit.php?id=<?php echo $mydata['id'] ?>'>
              <i class='fa fa-edit mx-2 '></i>
            </a>

            <a href='add_applicant.php?id=<?php echo $mydata['id'] ?>'><i class='fa fa-file-alt mx-2'></i></a>
            <a href=''><i class='fa fa-user-edit mx-2'></i></a>
          </td>
        </tr>
       
       

    </tbody>
</table>

<div class="mt-4 ">
    <button class="btn button-1 " type="submit" name="submit"><i class="fa fa-print"></i></button>
</div>

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