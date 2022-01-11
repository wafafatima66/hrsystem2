<div class="container container-box">

      <form action="pds_config.php" method="post" enctype="multipart/form-data" id="emp_profile_form">




            <div class="row ">

                  <div class=" col-lg-12 ">


                        <div class="accordion" id="accordionExample">

                              <div class="card ">
                                    <div class="card-header" id="headingOne">
                                          <h5 class="mb-0 d-flex justify-content-between">
                                                <span>Personal Information</span>
                                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                      <i class="fas fa-caret-down"></i>
                                                </button>

                                          </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                          <div class="card-body">
                                                <?php include 'emp_profile_parts/personal.php'; ?>
                                          </div>
                                    </div>
                              </div>

                              <div class="card">
                                    <div class="card-header" id="headingTwo">
                                          <h5 class="mb-0 d-flex justify-content-between">
                                                <span>Family Background</span>
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                      <i class="fas fa-caret-down"></i>
                                                </button>

                                          </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                          <div class="card-body">
                                                <?php include 'emp_profile_parts/family_background.php'; ?>
                                          </div>
                                    </div>
                              </div>

                              <div class="card">
                                    <div class="card-header" id="headingThree">
                                          <h5 class="mb-0 d-flex justify-content-between">
                                                <span>Educational Background</span>
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                      <i class="fas fa-caret-down"></i>
                                                </button>

                                          </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                          <div class="card-body">
                                                <?php include 'emp_profile_parts/education_background.php'; ?>
                                          </div>
                                    </div>
                              </div>

                              <div class="card">
                                    <div class="card-header" id="headingFour">
                                          <h5 class="mb-0 d-flex justify-content-between">
                                                <span>Civil Service Eligibility</span>
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                      <i class="fas fa-caret-down"></i>
                                                </button>

                                          </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                          <div class="card-body">
                                                <?php include 'emp_profile_parts/civil_service.php'; ?>
                                          </div>
                                    </div>
                              </div>

                              <div class="card">
                                    <div class="card-header" id="headingFive">
                                          <h5 class="mb-0 d-flex justify-content-between">
                                                <span>Work Experience</span>
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                      <i class="fas fa-caret-down"></i>
                                                </button>

                                          </h5>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                          <div class="card-body">
                                                <?php include 'emp_profile_parts/work_experience.php'; ?>
                                          </div>
                                    </div>
                              </div>

                              <div class="card">
                                    <div class="card-header" id="headingSix">
                                          <h5 class="mb-0 d-flex justify-content-between">
                                                <span>Voluntary Work Involvement</span>
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                      <i class="fas fa-caret-down"></i>
                                                </button>

                                          </h5>
                                    </div>
                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                          <div class="card-body">
                                                <?php include 'emp_profile_parts/voluntary_work.php'; ?>
                                          </div>
                                    </div>
                              </div>

                              <div class="card">
                                    <div class="card-header" id="headingSeven">
                                          <h5 class="mb-0 d-flex justify-content-between">
                                                <span>Learning And Development</span>
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                      <i class="fas fa-caret-down"></i>
                                                </button>

                                          </h5>
                                    </div>
                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                          <div class="card-body">
                                                <?php include 'emp_profile_parts/learning.php'; ?>
                                          </div>
                                    </div>
                              </div>

                              <div class="card">
                                    <div class="card-header" id="headingEight">
                                          <h5 class="mb-0 d-flex justify-content-between">
                                                <span>Other information</span>
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                      <i class="fas fa-caret-down"></i>
                                                </button>

                                          </h5>
                                    </div>

                                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                                          <div class="card-body">
                                                <?php include 'emp_profile_parts/others.php'; ?>
                                          </div>
                                    </div>

                              </div>

                              <div class="card">
                                    <div class="card-header" id="headingNine">
                                          <h5 class="mb-0 d-flex justify-content-between">
                                                <span>References</span>
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                      <i class="fas fa-caret-down"></i>
                                                </button>

                                          </h5>
                                    </div>
                                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                                          <div class="card-body">
                                                <?php include 'emp_profile_parts/references.php'; ?>
                                          </div>
                                    </div>
                              </div>

                        </div>

                  </div>



                  <div class="col-lg-12  mt-4 d-flex justify-content-between ">

                  <?php 
                  

                        $get = mysqli_fetch_assoc(mysqli_query($conn, "SELECT date_accomplished FROM item WHERE emp_id = '$emp_id'"));
                        $date_accomplished = $get['date_accomplished'];
                  
                  ?>

                        <div class="d-flex ">
                              <label for="" style="white-space: nowrap; margin-top:10px">DATE ACCOMPLISED</label>
                              <input type="date" class="form-control text-input ml-2" id="date_accomplished" value="<?= $date_accomplished?>">
                        </div>

                        <div class="">
                              <!-- <button class="btn button-1 " type="submit"><i class="fa fa-print"></i></button> -->

                              <button class="btn button-1 " type="submit" name="submit"><i class="fas fa-check"></i></button>
                        </div>


                        <!-- <button class="btn button-2  "><i class="fas fa-trash-alt"></i></button>
             <button class="btn button-2 " ><i class="fa fa-eye"></i></button> -->
                  </div>


            </div>

      </form>
</div>

<script>
      $('#date_accomplished').change(function() {
            
            var date_accomplished = $(this).val();
            var emp_id = $('.emp_id').val();
            // console.log(emp_id);
            $.ajax({
                  url: "date_accomplished.php",
                  method: "POST",
                  data: {
                        date_accomplished: date_accomplished,
                        emp_id:emp_id,
                  },
                  success: function(data) {
                        if (data == "success") {
                              toastr.success("Employee profile status updated !");
                        } else if (data == "fail") {
                              toastr.error("Employee profile status not updated !");
                        }
                  },
            });

      });

      $('#emp_birth_add_street').change(function() {
            var state = $("#emp_birth_add_street").val();
            // console.log(state);
            jQuery.ajax({
                  url: "../includes/get_city.php",
                  data: {
                        state: state
                  },
                  type: "POST",
                  success: function(data) {
                        $("#emp_birth_add_municipal").html(data);
                  },
                  error: function() {}
            });
      });

      $('#emp_birth_add_municipal').change(function() {
            var city = $("#emp_birth_add_municipal").val();
            console.log(city);
            jQuery.ajax({
                  url: "../includes/get_zipcodes.php",
                  data: {
                        city: city
                  },
                  type: "POST",
                  success: function(data) {
                        $("#emp_birth_add_zipcode").html(data);
                        console.log(data);
                  },
                  error: function() {}
            });
      });
     
      $('#emp_resi_add_street').change(function() {
            var state = $("#emp_resi_add_street").val();
            // console.log(state);
            jQuery.ajax({
                  url: "../includes/get_city.php",
                  data: {
                        state: state
                  },
                  type: "POST",
                  success: function(data) {
                        $("#emp_resi_add_municipal").html(data);
                  },
                  error: function() {}
            });
      });

      $('#emp_resi_add_municipal').change(function() {
            var city = $("#emp_resi_add_municipal").val();
            console.log(city);
            jQuery.ajax({
                  url: "../includes/get_zipcodes.php",
                  data: {
                        city: city
                  },
                  type: "POST",
                  success: function(data) {
                        $("#emp_resi_add_zipcode").html(data);
                        console.log(data);
                  },
                  error: function() {}
            });
      });

      $('#emp_per_add_street').change(function() {
            var state = $("#emp_per_add_street").val();
            // console.log(state);
            jQuery.ajax({
                  url: "../includes/get_city.php",
                  data: {
                        state: state
                  },
                  type: "POST",
                  success: function(data) {
                        $("#emp_per_add_municipal").html(data);
                  },
                  error: function() {}
            });
      });

      $('#emp_per_add_municipal').change(function() {
            var city = $("#emp_per_add_municipal").val();
            // console.log(city);
            jQuery.ajax({
                  url: "../includes/get_zipcodes.php",
                  data: {
                        city: city
                  },
                  type: "POST",
                  success: function(data) {
                        $("#emp_per_add_zipcode").html(data);
                        // console.log(data);
                  },
                  error: function() {}
            });
      });

</script>