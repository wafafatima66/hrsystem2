

            <div class="row">

                <div class="col-md-8 col-sm-12">
                    <div class="spouse_wrapper">

                        <?php

                        $query = "SELECT * FROM emp_spouse WHERE emp_id = '$emp_id'";

                        $runquery = $conn->query($query);
                        $rowcount = mysqli_num_rows($runquery);
                        if ($rowcount > 0) {

                            while ($mydata = $runquery->fetch_assoc()) {  ?>


                                <div class="form-row mt-3">

                                    <div class="col-lg-12 col-sm-12">
                                        <label for="">Spouse (If Married)</label>
                                    </div>

                                    <div class="col-lg-3 col-sm-6">
                                        <input type="text" class="form-control text-input " value="<?php echo $mydata['emp_spouse_lastname'] ?>" name="emp_spouse_lastname[]" placeholder="Surname">
                                    </div>

                                    <div class="col-lg-3 col-sm-6">
                                        <input type="text" class="form-control text-input" value="<?php echo $mydata['emp_spouse_firstname'] ?>" name="emp_spouse_firstname[]" placeholder="First">
                                    </div>

                                    <div class="col-lg-3 col-sm-6">
                                        <input type="text" class="form-control text-input" value="<?php echo $mydata['emp_spouse_middlename'] ?>" name="emp_spouse_middlename[]" placeholder="Middle">
                                    </div>

                                    <div class="col-lg-3 col-sm-6">
                                        <input type="text" class="form-control text-input" value="<?php echo $mydata['emp_spouse_extname'] ?>" name="emp_spouse_extname[]" placeholder="Ext">
                                    </div>

                                </div>

                                <div class="form-row mt-3">

                                    <div class="col-lg-3 col-sm-6">
                                        <input type="text" class="form-control text-input" name="emp_sp_occupation[]" value="<?php echo $mydata['emp_sp_occupation'] ?>" placeholder="Occupation">
                                    </div>

                                    <div class="col-lg-3 col-sm-6">
                                        <input type="text" class="form-control text-input" name="emp_sp_employer[]" value="<?php echo $mydata['emp_sp_employer'] ?>" placeholder="Employer">
                                    </div>

                                </div>


                                <div class="form-row mt-3">

                                    <div class="form-group mx-sm-2 mb-2">
                                        <input type="text" class="form-control text-input" name="emp_sp_tel[]" value="<?php echo $mydata['emp_sp_tel'] ?>" placeholder="Tel.No">
                                    </div>

                                    <div class="form-group mx-sm-2 mb-2">
                                        <input type="text" class="form-control text-input" name="emp_sp_add[]" value="<?php echo $mydata['emp_sp_add'] ?>" placeholder="Address">
                                    </div>


                                </div>

                            <?php }
                        } else { ?>
                            <div class="form-row mt-3">

                                <div class="col-lg-12 col-sm-12">
                                    <label for="">Spouse (If Married)</label>
                                </div>

                                <div class="col-lg-3 col-sm-6">
                                    <input type="text" class="form-control text-input " value="" name="emp_spouse_lastname[]" placeholder="Surname">
                                </div>

                                <div class="col-lg-3 col-sm-6">
                                    <input type="text" class="form-control text-input" value="" name="emp_spouse_firstname[]" placeholder="First">
                                </div>

                                <div class="col-lg-3 col-sm-6">
                                    <input type="text" class="form-control text-input" value="" name="emp_spouse_middlename[]" placeholder="Middle">
                                </div>

                                <div class="col-lg-3 col-sm-6">
                                    <input type="text" class="form-control text-input" value="" name="emp_spouse_extname[]" placeholder="Ext">
                                </div>

                            </div>

                            <div class="form-row mt-3">

                                <div class="col-lg-3 col-sm-6">
                                    <input type="text" class="form-control text-input" name="emp_sp_occupation[]" value="" placeholder="Occupation">
                                </div>

                                <div class="col-lg-3 col-sm-6">
                                    <input type="text" class="form-control text-input" name="emp_sp_employer[]" value="" placeholder="Employer">
                                </div>

                            </div>


                            <div class="form-row mt-3">

                                <div class="form-group mx-sm-2 mb-2">
                                    <input type="text" class="form-control text-input" name="emp_sp_tel[]" value="" placeholder="Tel.No">
                                </div>

                                <div class="form-group mx-sm-2 mb-2">
                                    <input type="text" class="form-control text-input" name="emp_sp_add[]" value="" placeholder="Address">
                                </div>

                                

                            </div>

                        <?php } ?>

                        <!-- <div class="col-lg-3 col-sm-6 ">
                                
                            </div> -->
                            <a class="ml-3 btn button-1 add_spouse_button" style="height: fit-content; display: table-cell;">+</a>
                           

                    </div>

                    <?php
if (isset($_GET['id'])) {

    $id =  $_GET['id'];

    $query = "SELECT * FROM employee WHERE id = '$id'";

    $runquery = $conn->query($query);
    if ($runquery == true) {
        while ($mydata = $runquery->fetch_assoc()) {
?>

                    <div class="form-row mt-3">

                        <div class="col-lg-12 col-sm-12">
                            <label for="">FATHER'S NAME</label>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" value="<?php echo $mydata['emp_father_lastname'] ?>" name="emp_father_lastname" placeholder="Surname">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" value="<?php echo $mydata['emp_father_firstname'] ?>" name="emp_father_firstname" placeholder="First">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" value="<?php echo $mydata['emp_father_middlename'] ?>" name="emp_father_middlename" placeholder="Middle">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" value="<?php echo $mydata['emp_father_extname'] ?>" name="emp_father_extname" placeholder="Ext">
                        </div>
                    </div>



                    <div class="form-row mt-3">

                        <div class="col-lg-12 col-sm-12">
                            <label for="">MOTHER'S NAME</label>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" value="<?php echo $mydata['emp_mother_lastname'] ?>" name="emp_mother_lastname" placeholder="Surname">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" value="<?php echo $mydata['emp_mother_firstname'] ?> " name="emp_mother_firstname" placeholder="First">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" value="<?php echo $mydata['emp_mother_middlename'] ?>" name="emp_mother_middlename" placeholder="Middle">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control text-input" value="<?php echo $mydata['emp_mother_extname'] ?>" name="emp_mother_extname" placeholder="Ext">
                        </div>

                    </div>

                    <?php }}} ?>

                </div>

                <div class="col-md-4 col-sm-12 mt-sm-3  " style="background-color: #9EB87C;">
                    <div class="family_wrapper">

                        <div class="form-row mt-3  ">

                            <div class="col-lg-12 col-sm-12">
                                <label for="">Children</label>
                            </div>

                            </div>

                            <?php

                            $i = 1;

                            $query = "SELECT * FROM emp_children WHERE emp_id = '$emp_id'";

                            $runquery = $conn->query($query);
                            $rowcount = mysqli_num_rows($runquery);
                            if ($rowcount > 0) {

                                while ($mydata = $runquery->fetch_assoc()) {  ?>

                                <div class="form-row mt-3  ">

                                    <!-- <div class="col-lg-2 col-sm-3">
                                        <h3><?php echo $i++ ?></h3>
                                    </div> -->

                                    <div class="col-lg-10 col-sm-9">
                                        <input type="text" class="form-control text-input" name="emp_child_name[]" value="<?php echo $mydata['emp_child_name'] ?>">
                                    </div>


                                    <!-- <div class="col-lg-2 col-sm-3">
                                    </div> -->

                                    <div class="col-lg-7 col-sm-9 mt-1">
                                        <input type="date" class="form-control text-input" name="emp_child_dob[]" value="<?php echo $mydata['emp_child_dob'] ?>">
                                        <small class="text-muted">Date of birth</small>
                                    </div>

                                    </div>


                                <?php   } ?>


                            <?php } else {  ?>

                                <div class="form-row mt-3  ">
                                <!-- <div class="col-lg-2 col-sm-3">
                                    <h3><?php echo $i++ ?></h3>
                                </div> -->

                                <div class="col-lg-10 col-sm-9">
                                    <input type="text" class="form-control text-input" name="emp_child_name[]">
                                </div>

                                <!-- <div class="col-lg-2 col-sm-3">
                                </div> -->

                                <div class="col-lg-7 col-sm-9 mt-1">
                                    <input type="date" class="form-control text-input" name="emp_child_dob[]">
                                    <small class="text-muted">Date of birth</small>
                                </div>

                                </div>

                            <?php } ?>

                            

                            <a class="ml-4 btn button-1 add_fam_button" style="height: fit-content; display:table-cell">+</a>
                            
                        

                    </div>


                </div>


            </div>




<script type="text/javascript">
    $(document).ready(function() {

        var maxField = 10; //Input fields increment limitation
        // var addButton = $('.add_fam_button'); //Add button selector
        // var wrapper = $('.family_wrapper'); //Input field wrapper

        // var fieldHTML =
        //     ' ';

        var x = 1;

        $('.add_fam_button').click(function() {
            if (x < maxField) {
                x++;

                $('.family_wrapper').append('<div class="form-row mt-3  "> <div class="col-lg-10 col-sm-9"> <input type="text" class="form-control text-input" name="emp_child_name[]" value=""> </div>  <div class="col-lg-7 col-sm-9 mt-1"> <input type="date" class="form-control text-input" name="emp_child_dob[]" value=""><small class="text-muted">Date of birth</small> </div>   <a class="ml-4 btn button-1 remove_fam_button mt-1" style="height: fit-content;">-</a> </div>');

            }
        });

        $('.family_wrapper').on('click', '.remove_fam_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });

        // spouse wrapper

        var y = 1;

        $('.add_spouse_button').click(function() {
            if (y < maxField) {
                y++;

                $('.spouse_wrapper').append('<div><div class="form-row mt-3"> <div class="col-lg-12 col-sm-12"> <label for="">Spouse (If Married)</label> </div> <div class="col-lg-3 col-sm-6"> <input type="text" class="form-control text-input " value="" name="emp_spouse_lastname[]" placeholder="Surname"> </div> <div class="col-lg-3 col-sm-6"> <input type="text" class="form-control text-input" value="" name="emp_spouse_firstname[]" placeholder="First"> </div> <div class="col-lg-3 col-sm-6"> <input type="text" class="form-control text-input" value="" name="emp_spouse_middlename[]" placeholder="Middle"> </div> <div class="col-lg-3 col-sm-6"> <input type="text" class="form-control text-input" value="" name="emp_spouse_extname[]" placeholder="Ext"> </div> </div> <div class="form-row mt-3"> <div class="col-lg-3 col-sm-6"> <input type="text" class="form-control text-input" name="emp_sp_occupation[]" value="" placeholder="Occupation"> </div> <div class="col-lg-3 col-sm-6"> <input type="text" class="form-control text-input" name="emp_sp_employer[]" value="" placeholder="Employer"> </div> </div> <div class="form-row mt-3"> <div class="form-group mx-sm-2 mb-2"> <input type="text" class="form-control text-input" name="emp_sp_tel[]" value="" placeholder="Tel.No"> </div> <div class="form-group mx-sm-2 mb-2"> <input type="text" class="form-control text-input" name="emp_sp_add[]" value="" placeholder="Address"> </div> </div><a class="ml-4 btn button-1 remove_spouse_button" style="height: fit-content; display: table-cell;">-</a></div>');

            }
        });

        $('.spouse_wrapper').on('click', '.remove_spouse_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });



    });
</script>