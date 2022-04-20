<!--body section of VOLUNTARY WORKS-->

<div class="voluntary_wrapper">

    <?php 
 
                              
 $query = "SELECT * FROM emp_voluntary_work WHERE emp_id = '$emp_id'";

 $runquery = $conn -> query($query);
 $rowcount=mysqli_num_rows($runquery);
 if($rowcount > 0 ){
   
   while($mydata = $runquery -> fetch_assoc()){  ?>

    <div class="form-row mt-5">

        <div class="col-lg-4 col-sm-12">
            <div class="d-flex flex-column">
                <small>Name of Organization</small>
                <input type="text" class="form-control text-input" name="vol_name_org[]" value="<?php echo $mydata['vol_name_org']?>">
            </div>
        </div>

        <div class="col-lg-4 col-sm-6">
            <div class="d-flex flex-column">
                <small>Address</small>
                <input type="text" class="form-control text-input" name="vol_org_add[]" value="<?php echo $mydata['vol_org_add']?>">
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <small>No of Hours</small>
            <input type="text" class="form-control text-input" name="vol_no_of_hrs[]" value="<?php echo $mydata['vol_no_of_hrs']?>">
        </div>



    </div>

    <div class="form-row mt-3">


        <div class="col-lg-6 col-sm-12">
            <div class="d-flex flex-column">
                <small>Inclusive Dates</small>
                <div class="d-md-flex justify-content-center">

                    <input type="date" class="form-control text-input " name="vol_from_date[]" value="<?php echo $mydata['vol_from_date']?>">

                    <input type="date" class="form-control text-input " name="vol_to_date[]" value="<?php echo $mydata['vol_to_date']?>">
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-sm-6">
            <small>Position/Role</small>
            <input type="text" class="form-control text-input" name="vol_position[]" value="<?php echo $mydata['vol_position']?>">
        </div>




    </div>

    <?php }}else{ ?>


    <div class="form-row mt-5">

        <div class="col-lg-4 col-sm-12">
            <div class="d-flex flex-column">
                <label for="">NAME OF ORGANIZATION</label>
                <input type="text" class="form-control text-input" name="vol_name_org[]">
            </div>
        </div>

        <div class="col-lg-4 col-sm-6">
            <div class="d-flex flex-column">
                <label for="">ADDRESS</label>
                <input type="text" class="form-control text-input" name="vol_org_add[]">
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <label for="">NO OF HOURS</label>
            <input type="text" class="form-control text-input" name="vol_no_of_hrs[]">
        </div>



    </div>

    <div class="form-row mt-3">


        <div class="col-lg-6 col-sm-12">
            <div class="d-flex flex-column">
                <label for="">INCLUSIVE DATES</label>
                <div class="d-flex justify-content-center">

                    <input type="date" class="form-control text-input " name="vol_from_date[]">

                    <input type="date" class="form-control text-input " name="vol_to_date[]">
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-sm-6">
            <label for="">POSITION/ROLE</label>
            <input type="text" class="form-control text-input" name="vol_position[]">
        </div>

    </div>

    <?php  } ?>

</div>

<div class="mt-4">
    <a class=" btn button-1 add_vol_button">+</a>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_vol_button'); //Add button selector
        var wrapper = $('.voluntary_wrapper'); //Input field wrapper
        var fieldHTML =
            ' <div class="form-row mt-5"> <div class="col-lg-4 col-sm-12"> <div class="d-flex flex-column"> <label for="">NAME OF ORGANIZATION</label> <input type="text" class="form-control text-input"  name="vol_name_org[]"> </div> </div> <div class="col-lg-4 col-sm-6"> <div class="d-flex flex-column"> <label for="">ADDRESS</label> <input type="text" class="form-control text-input"  name="vol_org_add[]"> </div> </div> <div class="col-lg-3 col-sm-6"> <label for="">NO OF HOURS</label> <input type="text" class="form-control text-input"  name="vol_no_of_hrs[]"> </div> </div> <div class="form-row mt-3"> <div class="col-lg-6 col-sm-12"> <div class="d-flex flex-column"> <label for="">INCLUSIVE DATES</label> <div class="d-md-flex justify-content-center"> <input type="date" class="form-control text-input " name="vol_from_date[]"> <input type="date" class="form-control text-input " name="vol_to_date[]"> </div> </div> </div> <div class="col-lg-3 col-sm-6"> <label for="">POSITION/ROLE</label> <input type="text" class="form-control text-input"  name="vol_position[]"> </div> </div>';

        //New input field html 
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function () {
            //Check maximum number of input fields
            // if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            // }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_vol_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>