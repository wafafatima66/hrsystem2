

<form action="pds_config.php" method="post" enctype="multipart/form-data" id="emp_profile_form">




<div class="row mt-5">

      <div class=" col-lg-12 emp-profile-box-2">


            <div class="accordion" id="accordionExample">

                  <div class="card ">
                        <div class="card-header" id="headingOne">
                              <h5 class="mb-0 d-flex justify-content-between">
                                    <span>Personal Information</span>
                                    <button class="btn" type="button" data-toggle="collapse"
                                          data-target="#collapseOne" aria-expanded="true"
                                          aria-controls="collapseOne">
                                          <i class="fas fa-caret-down"></i>
                                    </button>

                              </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                              data-parent="#accordionExample">
                              <div class="card-body">
                                   <?php include 'emp_profile_parts/personal.php';?>
                              </div>
                        </div>
                  </div>

                  <div class="card">
                        <div class="card-header" id="headingTwo">
                              <h5 class="mb-0 d-flex justify-content-between">
                                    <span>Family Background</span>
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                          data-target="#collapseTwo" aria-expanded="false"
                                          aria-controls="collapseTwo">
                                          <i class="fas fa-caret-down"></i>
                                    </button>

                              </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                              data-parent="#accordionExample">
                              <div class="card-body">
                                    <?php include 'emp_profile_parts/family_background.php';?>
                              </div>
                        </div>
                  </div>

                  <div class="card">
                        <div class="card-header" id="headingThree">
                              <h5 class="mb-0 d-flex justify-content-between">
                                    <span>Educational Background</span>
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                          data-target="#collapseThree" aria-expanded="false"
                                          aria-controls="collapseThree">
                                          <i class="fas fa-caret-down"></i>
                                    </button>

                              </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                              data-parent="#accordionExample">
                              <div class="card-body">
                                    <?php include 'emp_profile_parts/education_background.php';?>
                              </div>
                        </div>
                  </div>

                  <div class="card">
                        <div class="card-header" id="headingFour">
                              <h5 class="mb-0 d-flex justify-content-between">
                                    <span>Civil Service Eligibility</span>
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                          data-target="#collapseFour" aria-expanded="false"
                                          aria-controls="collapseFour">
                                          <i class="fas fa-caret-down"></i>
                                    </button>

                              </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                              data-parent="#accordionExample">
                              <div class="card-body">
                                    <?php include 'emp_profile_parts/civil_service.php';?>
                              </div>
                        </div>
                  </div>

                  <div class="card">
                        <div class="card-header" id="headingFive">
                              <h5 class="mb-0 d-flex justify-content-between">
                                    <span>Work Experience</span>
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                          data-target="#collapseFive" aria-expanded="false"
                                          aria-controls="collapseFive">
                                          <i class="fas fa-caret-down"></i>
                                    </button>

                              </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                              data-parent="#accordionExample">
                              <div class="card-body">
                                    <?php include 'emp_profile_parts/work_experience.php';?>
                              </div>
                        </div>
                  </div>

                  <div class="card">
                        <div class="card-header" id="headingSix">
                              <h5 class="mb-0 d-flex justify-content-between">
                                    <span>Voluntary Work Involvement</span>
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                          data-target="#collapseSix" aria-expanded="false"
                                          aria-controls="collapseSix">
                                          <i class="fas fa-caret-down"></i>
                                    </button>

                              </h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                              data-parent="#accordionExample">
                              <div class="card-body">
                                    <?php include 'emp_profile_parts/voluntary_work.php';?>
                              </div>
                        </div>
                  </div>

                  <div class="card">
                        <div class="card-header" id="headingSeven">
                              <h5 class="mb-0 d-flex justify-content-between">
                                    <span>Learning And Development</span>
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                          data-target="#collapseSeven" aria-expanded="false"
                                          aria-controls="collapseSeven">
                                          <i class="fas fa-caret-down"></i>
                                    </button>

                              </h5>
                        </div>
                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                              data-parent="#accordionExample">
                              <div class="card-body">
                                    <?php include 'emp_profile_parts/learning.php';?>
                              </div>
                        </div>
                  </div>

                  <div class="card">
                        <div class="card-header" id="headingEight">
                              <h5 class="mb-0 d-flex justify-content-between">
                                    <span>Other information</span>
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                          data-target="#collapseEight" aria-expanded="false"
                                          aria-controls="collapseEight">
                                          <i class="fas fa-caret-down"></i>
                                    </button>

                              </h5>
                        </div>

                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                              data-parent="#accordionExample">
                              <div class="card-body">
                                    <?php include 'emp_profile_parts/others.php';?>
                              </div>
                        </div>
                        
                  </div>

                  <div class="card">
                        <div class="card-header" id="headingNine">
                              <h5 class="mb-0 d-flex justify-content-between">
                                    <span>References</span>
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                          data-target="#collapseNine" aria-expanded="false"
                                          aria-controls="collapseNine">
                                          <i class="fas fa-caret-down"></i>
                                    </button>

                              </h5>
                        </div>
                        <div id="collapseNine" class="collapse" aria-labelledby="headingNine"
                              data-parent="#accordionExample">
                              <div class="card-body">
                                    <?php include 'emp_profile_parts/references.php';?>
                              </div>
                        </div>
                  </div>

            </div>

      </div>

          <div class="col-lg-12 text-right mt-4 ">

             <button class="btn button-1 " type="submit" name="submit"><i class="fas fa-edit"></i></button>

             <!-- <button class="btn button-2  "><i class="fas fa-trash-alt"></i></button>
             <button class="btn button-2 " ><i class="fa fa-eye"></i></button> -->
          </div>
     

</div>

</form>