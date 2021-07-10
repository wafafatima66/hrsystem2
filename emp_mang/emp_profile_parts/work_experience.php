<!--body section of WORK EXPERIENCE-->

<div class="work_wrapper">

<?php 
 
                              
 $query = "SELECT * FROM emp_work_experience WHERE emp_id = '$emp_id'";

 $runquery = $conn -> query($query);
 $rowcount=mysqli_num_rows($runquery);
 if($rowcount > 0 ){
   
   while($mydata = $runquery -> fetch_assoc()){  ?>


    <div class="form-row mt-3">

        <div class="col-lg-6 col-sm-12">
            <div class="d-flex flex-column">
                <label for="">Inclusive dates</label>
                <div class="d-flex justify-content-center">
                    <input type="date" class="form-control text-input mx-sm-1"  name="work_from_date[]" value="<?php echo $mydata['work_from_date']?>">
                    <input type="date" class="form-control text-input mx-sm-1"  name="work_to_date[]" value="<?php echo $mydata['work_to_date']?>">
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-sm-6">
            <div class="d-flex flex-column">
                <label for="">POSITION/TITLE</label>
                <input type="text" class="form-control text-input"  name="work_position[]" value="<?php echo $mydata['work_position']?>">
            </div>
        </div>



        <div class="col-lg-3 col-sm-6">
            <div class="d-flex flex-column">
                <label for="">EMPLOYER </label>
                <input type="text" class="form-control text-input"  name="work_employer[]" value="<?php echo $mydata['work_employer']?>">
            </div>
        </div>

    </div>

    <div class="form-row mt-3">

        <div class="col-lg-3 col-sm-12">
            <div class="d-flex flex-column">
                <label for="">GOVERNMENT SERVICE</label>
                <div class="d-flex justify-content-center" >
                   <select name="work_govt_service[]" id="" class="form-control text-input" >
                   <option value=0>Select</option>
                    <option value="Yes" 
                    <?php if ($mydata['work_govt_service'] == "Yes"  ) {
                    echo 'selected'; }?> 
                    >Yes</option>

                    <option value="No" <?php if ($mydata['work_govt_service'] == "No"  ) {
                    echo 'selected';
                 }?>>No</option>

                   </select>
                </div>
            </div>
        </div>


        <div class="col-lg-2 col-sm-6">
            <label for="">MONTHLY SALARY</label>
            <input type="text" class="form-control text-input"  name="work_monthly_sal[]" value="<?php echo $mydata['work_monthly_sal']?>">
        </div>

        <div class="col-lg-2 col-sm-6">
            <label for="">INCREMENT</label>
            <input type="text" class="form-control text-input" name="work_increment[]" value="<?php echo $mydata['work_increment']?>">
        </div>

        <div class="col-lg-3 col-sm-6">
            <label for="">STATUS</label>
            <select class="form-control text-input"  name="work_status[]">
            <option value=0>Select</option>

                <option  value="permanent" <?php if ($mydata['work_status'] == "permanent"  ) {
                    echo 'selected';
                 }?> >Permanent</option>

                <option value="contractual" <?php if ($mydata['work_status'] == "contractual"  ) {
                    echo 'selected';
                 }?> >Contractual</option>

                <option value="Job order" <?php if ($mydata['work_status'] == "Job order"  ) {
                    echo 'selected';
                 }?> >Job order</option>

            </select>
        </div>

        </div>

 <?php } } else {?>


                <div class="form-row mt-3">

            <div class="col-lg-6 col-sm-12">
                <div class="d-flex flex-column">
                    <label for="">Inclusive dates</label>
                    <div class="d-flex justify-content-center">
                        <input type="date" class="form-control text-input mx-sm-1"  name="work_from_date[]" >
                        <input type="date" class="form-control text-input mx-sm-1"  name="work_to_date[]">
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-sm-6">
                <div class="d-flex flex-column">
                    <label for="">POSITION/TITLE</label>
                    <input type="text" class="form-control text-input"  name="work_position[]">
                </div>
            </div>



            <div class="col-lg-3 col-sm-6">
                <div class="d-flex flex-column">
                    <label for="">EMPLOYER </label>
                    <input type="text" class="form-control text-input"  name="work_employer[]">
                </div>
            </div>

            </div>

            <div class="form-row mt-3">

            <div class="col-lg-3 col-sm-12">
                <div class="d-flex flex-column">
                    <label for="">GOVERNMENT SERVICE</label>
                    <div class="d-flex justify-content-center" >
                    <select name="work_govt_service[]" id="" class="form-control text-input" >
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    </div>
                </div>
            </div>


            <div class="col-lg-2 col-sm-6">
                <label for="">MONTHLY SALARY</label>
                <input type="text" class="form-control text-input"  name="work_monthly_sal[]">
            </div>

            <div class="col-lg-2 col-sm-6">
                <label for="">INCREMENT</label>
                <input type="text" class="form-control text-input" name="work_increment[]">
            </div>

            <div class="col-lg-3 col-sm-6">
                <label for="">STATUS</label>
                <select class="form-control text-input"  name="work_status[]">
                    <option value=0>Select</option>
                    <option value="permanent">Permanent</option>
                    <option value="contractual">Contractual</option>
                    <option value="Job order">Job order</option>
                </select>
            </div>

            </div>


 <?php } ?>  
       

   

 

</div>

<div class="col-lg-2 col-sm-6 mt-4">
                <a class="ml-3 btn button-1 add_work_button">Add</a>
            </div>


<script type="text/javascript">
    $(document).ready(function () {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_work_button'); //Add button selector
        var wrapper = $('.work_wrapper'); //Input field wrapper
        var fieldHTML =
            '  <div class="form-row mt-5"> <div class="col-lg-6 col-sm-12"> <div class="d-flex flex-column"> <label for="">Inclusive dates</label> <div class="d-flex justify-content-center"> <input type="date" class="form-control text-input mx-sm-1"  name="work_from_date[]"> <input type="date" class="form-control text-input mx-sm-1"  name="work_to_date[]"> </div> </div> </div> <div class="col-lg-3 col-sm-6"> <div class="d-flex flex-column"> <label for="">POSITION/TITLE</label> <input type="text" class="form-control text-input"  name="work_position[]"> </div> </div> <div class="col-lg-3 col-sm-6"> <div class="d-flex flex-column"> <label for="">EMPLOYER </label> <input type="text" class="form-control text-input"  name="work_employer[]"> </div> </div> </div> <div class="form-row mt-3"> <div class="col-lg-3 col-sm-12"> <div class="d-flex flex-column"> <label for="">GOVERNMENT SERVICE</label> <div class="d-flex justify-content-center" > <select name=" work_govt_service[]" id="" class="form-control text-input" > <option value="">Select</option> <option value="Yes">Yes</option> <option value="No">No</option> </select> </div> </div> </div> <div class="col-lg-2 col-sm-6"> <label for="">MONTHLY SALARY</label> <input type="text" class="form-control text-input"  name=" work_monthly_sal[]"> </div> <div class="col-lg-2 col-sm-6"> <label for="">INCREMENT</label> <input type="text" class="form-control text-input" name=" work_increment[]"> </div> <div class="col-lg-3 col-sm-6"> <label for="">STATUS</label> <select class="form-control text-input"  name="work_status[]"> <option value=0>Select</option> <option value="permanent">Permanent</option> <option value="contractual">Contractual</option> <option value="Job order">Job order</option> </select> </div> </div>';

        //New input field html 
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function () {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_work_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>