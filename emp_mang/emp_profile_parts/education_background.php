<!--body section of education background-->


<!--ELEMENTARY-->



<?php

if (isset($_GET['id'])) {

    $id =  $_GET['id'];
    $query = "SELECT * FROM employee WHERE id = '$id'";

    $runquery = $conn->query($query);
    if ($runquery == true) {
        while ($mydata = $runquery->fetch_assoc()) {
?>


            <div class="form-row mt-3">
                <div class="col-lg-12 col-sm-6">
                    <h5>ElEMENTARY</h5>
                </div>
            </div>



            <div class="form-row mt-3">


                <div class="col-lg-3 col-sm-6">
                    <div class="d-flex flex-column">
                        <label for="" class="">NAME OF SCHOOL </label>
                        <input type="text" class="form-control text-input" value=" <?php echo $mydata['ele_school_name'] ?>" name="ele_school_name">
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="d-flex flex-column">
                        <label for="">BASIC EDUCATION</label>
                        <input type="text" class="form-control text-input" value="<?php echo $mydata['ele_degree'] ?>" name="ele_degree">
                    </div>
                </div>



                <div class="col-lg-6 col-sm-12">
                    <div class="d-flex flex-column">
                        <label for="">PERIOD OF ATTENDANCE</label>
                        <div class="d-md-flex justify-content-center">
                            <!-- <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['ele_from_date'] ?>" name="ele_from_date">
                            <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['ele_to_date'] ?>" name="ele_to_date"> -->

                            <input name="ele_from_date" type="number" min="1900" max="2099" step="1" value="<?php echo (empty($mydata['ele_from_date']) ? "2021": $mydata['ele_from_date']  )?>"  class="form-control text-input mx-sm-1"/>
                            <input name="ele_to_date" type="number" min="1900" max="2099" step="1" value="<?php echo (empty($mydata['ele_to_date']) ? "2021": $mydata['ele_to_date']  )?>" class="form-control text-input mx-sm-1" />
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-row mt-3">
                <div class="col-lg-3 col-sm-12 ">
                    <label for="">HIGHEST UNITS EARNED</label>
                    <input type="text" class="form-control text-input" value="<?php echo $mydata['ele_units'] ?>" name="ele_units">
                </div>

                <div class="col-lg-3 col-sm-12">
                    <label for="">SCHOLARSHIP/AWARDS</label>
                    <input type="text" class="form-control text-input" value="<?php echo $mydata['ele_award'] ?>" name="ele_award">
                </div>

                <div class="col-lg-3 col-sm-12">
                    <label for="">YEAR GRADUATED</label>
                    <input type="text" class="form-control text-input date-own" value="<?php echo $mydata['ele_graduation'] ?>" name="ele_graduation">
                </div>


            </div>



            <!--ELEMENTARY-->


            <div class="form-row mt-3">
                <div class="col-lg-12 col-sm-6">
                    <h5>SECONDARY</h5>
                </div>
            </div>
            <div class="form-row mt-3">

                <div class="col-lg-3 col-sm-6">
                    <div class="d-flex flex-column">
                        <label for="">NAME OF SCHOOL</label>
                        <input type="text" class="form-control text-input" value="<?php echo $mydata['sec_school_name'] ?>" name="sec_school_name">
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="d-flex flex-column">
                        <label for="">BASIC EDUCATION</label>
                        <input type="text" class="form-control text-input" value="<?php echo $mydata['sec_degree'] ?>" name="sec_degree">
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12">
                    <div class="d-flex flex-column">
                        <label for="">PERIOD OF ATTENDANCE</label>
                        <div class="d-md-flex justify-content-center">
                            <!-- <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['sec_from_date'] ?>" name="sec_from_date">

                            <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['sec_to_date'] ?>" name="sec_to_date"> -->

                            <input name="sec_from_date" type="number" min="1900" max="2099" step="1" value="<?php echo (empty($mydata['sec_from_date']) ? "2021": $mydata['sec_from_date']  )?>"  class="form-control text-input mx-sm-1"/>
                            <input name="sec_to_date" type="number" min="1900" max="2099" step="1" value="<?php echo (empty($mydata['sec_to_date']) ? "2021": $mydata['sec_to_date']  )?>" class="form-control text-input mx-sm-1" />

                        </div>
                    </div>
                </div>

            </div>
            <div class="form-row mt-3">

                <div class="col-lg-3 col-sm-12">
                    <label for="">HIGHEST UNITS EARNED</label>
                    <input type="text" class="form-control text-input" value="<?php echo $mydata['sec_units'] ?>" name="sec_units">
                </div>

                <div class="col-lg-3 col-sm-12">
                    <label for="">SCHOLARSHIP/AWARDS</label>
                    <input type="text" class="form-control text-input" value="<?php echo $mydata['sec_award'] ?>" name="sec_award">
                </div>

                <div class="col-lg-3 col-sm-12">
                    <label for="">YEAR GRADUATED</label>
                    <input type="text" class="form-control text-input" value="<?php echo $mydata['sec_graduation'] ?>" name="sec_graduation">
                </div>



            </div>


            <!--ELEMENTARY-->

            <div class="form-row mt-3">
                <div class="col-lg-12 col-sm-6">
                    <h5>VOCATIONAL/TRADE COURSE</h5>
                </div>
            </div>

            <div class="form-row mt-3">

                <div class="col-lg-3 col-sm-6">
                    <div class="d-flex flex-column">
                        <label for="">NAME OF SCHOOL</label>
                        <input type="text" class="form-control text-input" value="<?php echo $mydata['voc_school_name'] ?>" name="voc_school_name">
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="d-flex flex-column">
                        <label for="">BASIC EDUCATION</label>
                        <input type="text" class="form-control text-input" value="<?php echo $mydata['voc_degree'] ?>" name="voc_degree">
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12">
                    <div class="d-flex flex-column">
                        <label for="">PERIOD OF ATTENDANCE</label>
                        <div class="d-md-flex justify-content-center">
                            <!-- <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['voc_from_date'] ?>" name="voc_from_date">

                            <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['voc_to_date'] ?>" name="voc_to_date"> -->

                            <input name="voc_from_date" type="number" min="1900" max="2099" step="1" value="<?php echo (empty($mydata['voc_from_date']) ? "2021": $mydata['voc_from_date']  )?>"  class="form-control text-input mx-sm-1"/>
                            <input name="voc_to_date" type="number" min="1900" max="2099" step="1" value="<?php echo (empty($mydata['voc_to_date']) ? "2021": $mydata['voc_to_date']  )?>" class="form-control text-input mx-sm-1" />

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row mt-3">

                <div class="col-lg-3 col-sm-12">
                    <label for="">HIGHEST UNITS EARNED</label>
                    <input type="text" class="form-control text-input" value="<?php echo $mydata['voc_units'] ?>" name="voc_units">
                </div>

                <div class="col-lg-3 col-sm-12">
                    <label for="">SCHOLARSHIP/AWARDS</label>
                    <input type="text" class="form-control text-input" value="<?php echo $mydata['voc_award'] ?>" name="voc_award">
                </div>

                <div class="col-lg-3 col-sm-12">
                    <label for="">YEAR GRADUATED</label>
                    <input type="text" class="form-control text-input" value="<?php echo $mydata['voc_graduation'] ?>" name="voc_graduation">
                </div>



            </div>



            <!--ELEMENTARY-->

            <div class="form-row mt-3">
                <div class="col-lg-12 col-sm-6">
                    <h5>COLLEGE</h5>
                </div>
            </div>

            <div class="coll_wrapper">

                <?php $query = "SELECT * FROM emp_education WHERE emp_id = '$emp_id' and type ='college'";

                $runquery = $conn->query($query);
                $rowcount = mysqli_num_rows($runquery);


                if ($rowcount > 0) {

                    while ($mydata = $runquery->fetch_assoc()) {  ?>

                        <div class="form-row mt-5">

                            <div class="col-lg-3 col-sm-6">
                                <div class="d-flex flex-column">
                                    <label for="">NAME OF SCHOOL</label>
                                    <input type="text" class="form-control text-input" value="<?php echo $mydata['school_name'] ?>" name="coll_school_name[]">
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="d-flex flex-column">
                                    <label for="">BASIC EDUCATION</label>
                                    <input type="text" class="form-control text-input" value="<?php echo $mydata['degree'] ?>" name="coll_degree[]">
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12">
                                <div class="d-flex flex-column">
                                    <label for="">PERIOD OF ATTENDANCE</label>
                                    <div class="d-md-flex justify-content-center">
                                        <!-- <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['from_date'] ?>" name="coll_from_date[]">
                                        <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['to_date'] ?>" name="coll_to_date[]"> -->

                                        <input name="coll_from_date[]" type="number" min="1900" max="2099" step="1" value="<?php echo (empty($mydata['from_date']) ? "2021": $mydata['from_date']  )?>"  class="form-control text-input mx-sm-1"/>
                            <input name="coll_to_date[]" type="number" min="1900" max="2099" step="1" value="<?php echo (empty($mydata['to_date']) ? "2021": $mydata['to_date']  )?>" class="form-control text-input mx-sm-1" />

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-3">

                            <div class="col-lg-3 col-sm-12">
                                <label for="">HIGHEST UNITS EARNED</label>
                                <input type="text" class="form-control text-input" value="<?php echo $mydata['units'] ?>" name="coll_units[]">
                            </div>

                            <div class="col-lg-3 col-sm-12">
                                <label for="">SCHOLARSHIP/AWARDS</label>
                                <input type="text" class="form-control text-input" value="<?php echo $mydata['award'] ?>" name="coll_award[]">
                            </div>

                            <div class="col-lg-3 col-sm-12">
                                <label for="">YEAR GRADUATED</label>
                                <input type="text" class="form-control text-input" value="<?php echo $mydata['graduation'] ?>" name="coll_graduation[]">
                            </div>


                        </div>

                    <?php }
                } else { ?>

                    <div class="form-row mt-5">

                        <div class="col-lg-3 col-sm-6">
                            <div class="d-flex flex-column">
                                <label for="">NAME OF SCHOOL</label>
                                <input type="text" class="form-control text-input" value="" name="coll_school_name[]">
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="d-flex flex-column">
                                <label for="">BASIC EDUCATION</label>
                                <input type="text" class="form-control text-input" value="" name="coll_degree[]">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="d-flex flex-column">
                                <label for="">PERIOD OF ATTENDANCE</label>
                                <div class="d-md-flex justify-content-center">
                                    <!-- <input type="date" class="form-control text-input mx-sm-1" value="" name="coll_from_date[]">
                                    <input type="date" class="form-control text-input mx-sm-1" value="" name="coll_to_date[]"> -->

                                    <input name="coll_from_date[]" type="number" min="1900" max="2099" step="1" value=""  class="form-control text-input mx-sm-1"/>
                            <input name="coll_to_date[]" type="number" min="1900" max="2099" step="1" value="" class="form-control text-input mx-sm-1" />

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-3">

                        <div class="col-lg-3 col-sm-12">
                            <label for="">HIGHEST UNITS EARNED</label>
                            <input type="text" class="form-control text-input" value="" name="coll_units[]">
                        </div>

                        <div class="col-lg-3 col-sm-12">
                            <label for="">SCHOLARSHIP/AWARDS</label>
                            <input type="text" class="form-control text-input" value="" name="coll_award[]">
                        </div>

                        <div class="col-lg-3 col-sm-12">
                            <label for="">YEAR GRADUATED</label>
                            <input type="text" class="form-control text-input" value="" name="coll_graduation[]">
                        </div>

                        <!-- <a class="ml-3 btn button-1 add_coll_button" style="height: fit-content;margin-top:30px;">+</a> -->

                    </div>

                <?php } ?>

                <a class="mt-3 btn button-1 add_coll_button" style="height: fit-content;">+</a>

            </div>



            <!--ELEMENTARY-->

            <div class="form-row mt-3">
                <div class="col-lg-12 col-sm-6">
                    <h5>GRADUATE STUDIES</h5>
                </div>
            </div>

            <div class="gra_wrapper">

                <?php

                $query = "SELECT * FROM emp_education WHERE emp_id = '$emp_id' and type ='graduation'";

                $runquery = $conn->query($query);
                $rowcount = mysqli_num_rows($runquery);

                if ($rowcount > 0) {
                    while ($mydata = $runquery->fetch_assoc()) {  ?>

                        <div class="form-row mt-5">

                            <div class="col-lg-3 col-sm-6">
                                <div class="d-flex flex-column">
                                    <label for="">NAME OF SCHOOL</label>
                                    <input type="text" class="form-control text-input" value="<?php echo $mydata['school_name'] ?>" name="gra_school_name[]">
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="d-flex flex-column">
                                    <label for="">BASIC EDUCATION</label>
                                    <input type="text" class="form-control text-input" value="<?php echo $mydata['degree'] ?>" name="gra_degree[]">
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12">
                                <div class="d-flex flex-column">
                                    <label for="">PERIOD OF ATTENDANCE</label>
                                    <div class="d-md-flex justify-content-center">
                                        <!-- <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['from_date'] ?>" name="gra_from_date[]">
                                        <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['to_date'] ?>" name="gra_to_date[]"> -->

                                        <input name="gra_from_date[]" type="number" min="1900" max="2099" step="1" value="<?php echo (empty($mydata['from_date']) ? "2021": $mydata['from_date']  )?>"  class="form-control text-input mx-sm-1"/>
                            <input name="gra_to_date[]" type="number" min="1900" max="2099" step="1" value="<?php echo (empty($mydata['to_date']) ? "2021": $mydata['to_date']  )?>" class="form-control text-input mx-sm-1" />

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col-lg-3 col-sm-12">
                                <label for="">HIGHEST UNITS EARNED</label>
                                <input type="text" class="form-control text-input" value="<?php echo $mydata['units'] ?>" name="gra_units[]">
                            </div>

                            <div class="col-lg-3 col-sm-12">
                                <label for="">SCHOLARSHIP/AWARDS</label>
                                <input type="text" class="form-control text-input" value="<?php echo $mydata['award'] ?>" name="gra_award[]">
                            </div>

                            <div class="col-lg-3 col-sm-12">
                                <label for="">YEAR GRADUATED</label>
                                <input type="text" class="form-control text-input" value="<?php echo $mydata['graduation'] ?>" name="gra_graduation[]">
                            </div>

                            <!-- <a class="ml-3 btn button-1 add_gra_button" style="height: fit-content;margin-top:30px;">+</a> -->
                        </div>

                    <?php }
                } else { ?>

                    <div class="form-row mt-5">

                        <div class="col-lg-3 col-sm-6">
                            <div class="d-flex flex-column">
                                <label for="">NAME OF SCHOOL</label>
                                <input type="text" class="form-control text-input" value="" name="gra_school_name[]">
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="d-flex flex-column">
                                <label for="">BASIC EDUCATION</label>
                                <input type="text" class="form-control text-input" value="" name="gra_degree[]">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="d-flex flex-column">
                                <label for="">PERIOD OF ATTENDANCE</label>
                                <div class="d-md-flex justify-content-center">
                                    <!-- <input type="date" class="form-control text-input mx-sm-1" value="" name="gra_from_date[]">
                                    <input type="date" class="form-control text-input mx-sm-1" value="" name="gra_to_date[]"> -->

                                    <input name="gra_from_date[]" type="number" min="1900" max="2099" step="1" value=""  class="form-control text-input mx-sm-1"/>
                            <input name="gra_to_date[]" type="number" min="1900" max="2099" step="1" value="" class="form-control text-input mx-sm-1" />

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-lg-3 col-sm-12">
                            <label for="">HIGHEST UNITS EARNED</label>
                            <input type="text" class="form-control text-input" value="" name="gra_units[]">
                        </div>

                        <div class="col-lg-3 col-sm-12">
                            <label for="">SCHOLARSHIP/AWARDS</label>
                            <input type="text" class="form-control text-input" value="" name="gra_award[]">
                        </div>

                        <div class="col-lg-3 col-sm-12">
                            <label for="">YEAR GRADUATED</label>
                            <input type="text" class="form-control text-input" value="" name="gra_graduation[]">
                        </div>

                        <!-- <a class="ml-3 btn button-1 add_gra_button" style="height: fit-content;margin-top:30px;">+</a> -->

                    </div>


                <?php } ?>

                <a class="mt-3 btn button-1 add_gra_button" style="height: fit-content;">+</a>
            </div>

<?php }
    }
} ?>


<script type="text/javascript">
    $(document).ready(function() {


        var maxField = 10;

        //college wrapper
        var x = 1;

        $('.add_coll_button').click(function() {
            if (x < maxField) {
                x++;

                $('.coll_wrapper').append('<div><div class="form-row mt-5"> <div class="col-lg-3 col-sm-6"> <div class="d-flex flex-column"> <label for="">NAME OF SCHOOL</label> <input type="text" class="form-control text-input" value="" name="coll_school_name[]"> </div> </div> <div class="col-lg-3 col-sm-6"> <div class="d-flex flex-column"> <label for="">BASIC EDUCATION</label> <input type="text" class="form-control text-input" value="" name="coll_degree[]"> </div> </div> <div class="col-lg-6 col-sm-12"> <div class="d-flex flex-column"> <label for="">PERIOD OF ATTENDANCE</label> <div class="d-md-flex justify-content-center">  <input name="coll_from_date[]" type="number" min="1900" max="2099" step="1" value=""  class="form-control text-input mx-sm-1"/> <input name="coll_to_date[]" type="number" min="1900" max="2099" step="1" value="" class="form-control text-input mx-sm-1" /> </div> </div> </div> </div> <div class="form-row mt-3"> <div class="col-lg-3 col-sm-12"> <label for="">HIGHEST UNITS EARNED</label> <input type="text" class="form-control text-input" value="" name="coll_units[]"> </div> <div class="col-lg-3 col-sm-12"> <label for="">SCHOLARSHIP/AWARDS</label> <input type="text" class="form-control text-input" value="" name="coll_award[]"> </div> <div class="col-lg-3 col-sm-12"> <label for="">YEAR GRADUATED</label> <input type="text" class="form-control text-input" value="" name="coll_graduation[]"> </div>  </div> <a class="mt-3 btn button-1 remove_coll_button" style="height: fit-content;">-</a></div>');

            }
        });

        $('.coll_wrapper').on('click', '.remove_coll_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });

        //graduation

        var y = 1;

        $('.add_gra_button').click(function() {
            if (y < maxField) {
                y++;

                $('.gra_wrapper').append('<div><div class="form-row mt-5"> <div class="col-lg-3 col-sm-6"> <div class="d-flex flex-column"> <label for="">NAME OF SCHOOL</label> <input type="text" class="form-control text-input" value="" name="gra_school_name[]"> </div> </div> <div class="col-lg-3 col-sm-6"> <div class="d-flex flex-column"> <label for="">BASIC EDUCATION</label> <input type="text" class="form-control text-input" value="" name="gra_degree[]"> </div> </div> <div class="col-lg-6 col-sm-12"> <div class="d-flex flex-column"> <label for="">PERIOD OF ATTENDANCE</label> <div class="d-md-flex justify-content-center"> <input name="gra_from_date[]" type="number" min="1900" max="2099" step="1" value=""  class="form-control text-input mx-sm-1"/> <input name="gra_to_date[]" type="number" min="1900" max="2099" step="1" value="" class="form-control text-input mx-sm-1" /> </div> </div> </div> </div> <div class="form-row mt-3"> <div class="col-lg-3 col-sm-12"> <label for="">HIGHEST UNITS EARNED</label> <input type="text" class="form-control text-input" value="" name="gra_units[]"> </div> <div class="col-lg-3 col-sm-12"> <label for="">SCHOLARSHIP/AWARDS</label> <input type="text" class="form-control text-input" value="" name="gra_award[]"> </div> <div class="col-lg-3 col-sm-12"> <label for="">YEAR GRADUATED</label> <input type="text" class="form-control text-input" value="" name="gra_graduation[]"> </div> </div> <a class="mt-3 btn button-1 remove_gra_button" style="height: fit-content;">-</a></div>');

            }
        });

        $('.gra_wrapper').on('click', '.remove_gra_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });




    });
</script>