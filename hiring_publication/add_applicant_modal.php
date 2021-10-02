<div class="modal fade addapplicant " id="add_applicant" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">


            <h3 class=" background-title-1 p-3">Add Applicant</h3>

            <div class="modal-body">

                <div class="container">

                    <?php
                    // if (isset($_GET['id'])) {

                    //     $id =  $_GET['id'];

                    //     $query = "SELECT item_no FROM item WHERE id = '$id'";
                    //     $runquery = $conn->query($query);
                    //     if ($runquery == true) {
                    //         while ($mydata = $runquery->fetch_assoc()) {

                    //             $item_no =  $mydata['item_no'];
                                
                    //         }
                    //     }
                    // }

                    if (isset($_GET['item_no'])) {

                        $item_no =  $_GET['item_no'];
                        $input = '<input type="hidden" name="item_no" value="'.$item_no.'">';
                     
                    }else if (isset($_GET['position_no'])) {

                        $position_no =  $_GET['position_no'];
                        $input = '<input type="hidden" name="position_no" value="'.$position_no.'">';
                     
                    }

                    ?>

                    <form method="post" action="" enctype="multipart/form-data">

                        <?php echo $input ;  ?>

                        <div class="form-row">

                            <div class="col-lg-3 col-sm-6">
                                <input type="text" class="form-control text-input" name="applicant_id" placeholder="Applicant ID" id="applicant_id" onBlur="checkAvailability()">


                                <p id="user-availability-status"></p>

                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <input type="text" class="form-control text-input" name="applicant_rating" placeholder="Rating">
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <input type="text" class="form-control text-input" name="applicant_rank" placeholder="Rank">
                            </div>


                        </div>

                        <div class="form-row ">
                            <div class="col-lg-12 col-sm-12">
                                <label for="" class="h6">Basic Information</label>
                            </div>
                        </div>

                        <div class="form-row ">
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
                                <!-- <input type="text" class=" form-control text-input" placeholder="Country" name="applicant_country" value=""> -->

                                <select class="form-control text-input" name="applicant_country" >
                                    <option value="">Select Country</option>
                                    <?php  include '../includes/countries.php' ?>
                                </select>

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
                                <label for="" class="h6">Applicant Qualification</label>
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
                                <label for="" class="h6">Credentials( PDS, Resume, Application Letter, Certificates, etc)</label>
                            </div>
                        </div>

                        <div class="form-row mt-2 mb-2">
                            <div class="col-lg-4 col-sm-6">
                                

                             <label style="width: 100%;" >
                             
                             <div class="inner-upload-field p-2">
                                   <h6 class="text-center">Upload Files</h6>
                             </div>

                                    <input type="file" name="applicant_files[]" id="applicant_files" multiple style="display: none;" >
                              </label>

                              <div id="total" class="text-success"></div>

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
     $("#applicant_files").change(function(){
            $("#total").html($("#applicant_files")[0].files.length + " Files uploaded");
      });

      function checkAvailability() {
    // $("#loaderIcon").show();

        var applicant_id = 'applicant_id=' + $("#applicant_id").val();

        console.log(applicant_id);

        jQuery.ajax({
        url: "check_applicant_id.php",
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