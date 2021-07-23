<!--body section of Reference-->



<div class="form-row mt-3">



    <div class="col-lg-4 col-sm-4 col-4">
        <label for="" class="responsive-label" >FULL NAME</label>
    </div>

    <div class="col-lg-4 col-sm-4 col-4 ">
        <label for="" class="responsive-label">ADDRESS</label>
    </div>

    <div class="col-lg-4 col-sm-4 col-4">
        <label for="" class="responsive-label">TELEPHONE NO./MOBILE NO.</label>
    </div>


</div>


<div class="reference_wrapper">


    

    <?php 
 
                              
 $query = "SELECT * FROM emp_reference WHERE emp_id = '$emp_id'";

 $runquery = $conn -> query($query);
 $rowcount= mysqli_num_rows($runquery);
 if($rowcount > 0 ){
   
   while($mydata = $runquery -> fetch_assoc()){  ?>

<div class="form-row ">

        <div class="col-lg-4 col-sm-4 col-4">
            <input type="text" class="form-control text-input mb-2"  value="<?php echo $mydata['ref_full_name']?>" name="ref_full_name[]">
        </div>

        <div class="col-lg-4 col-sm-4 col-4">
            <input type="text" class="form-control text-input mb-2"  value="<?php echo $mydata['ref_add']?>"name="ref_add[]">
        </div>

        <div class="col-lg-4 col-sm-4 col-4">
            <input type="text" class="form-control text-input mb-2"  value="<?php echo $mydata['ref_tel']?>"name="ref_tel[]">
        </div>
        </div>

<?php }} else {?>

    <div class="form-row ">

    <div class="col-lg-4 col-sm-4 col-4">
            <input type="text" class="form-control text-input mb-2"  value="" name="ref_full_name[]">
        </div>

        <div class="col-lg-4 col-sm-4 col-4">
            <input type="text" class="form-control text-input mb-2"  value="" name="ref_add[]">
        </div>

        <div class="col-lg-4 col-sm-4 col-4">
            <input type="text" class="form-control text-input mb-2"  value="" name="ref_tel[]">
        </div>
        </div>

    <?php } ?>

   

    


</div>

<div class="col-lg-2 col-sm-12 mt-2">
    <a class="btn button-1 add_ref_button">Add</a>
</div>



<div class="form-row mt-3">



    <div class="col-lg-12 col-sm-12">
        <label class="responsive-label">(Person not related by consanguinity or affinity to applicant/appointee)</label>
    </div>

    <div class="col-lg-12 col-sm-12">
        <label for="" class="responsive-label">GOVERNMENT ISSUED ID <span>(i.e.Passport,GSIS,SSS,PRC,Driver's Licence,etc)</span></label>
    </div>

   

</div>

<div class="wrapper-2">

    

    <?php 
 
                              
 $query = "SELECT * FROM emp_govt_id WHERE emp_id = '$emp_id'";

 $runquery = $conn -> query($query);
 $rowcount=mysqli_num_rows($runquery);
 if($rowcount > 0 ){
   
   while($mydata = $runquery -> fetch_assoc()){  ?>

<div class=" form-row ">
        <div class="col-lg-5 col-sm-12">
            <input type="text" class="form-control text-input " placeholder="Write the type of govt id . Example(Passport) " name="emp_gov_issued_id_type[]" value="<?php echo $mydata['emp_gov_issued_id_type']?>">
        </div>

        <div class="col-lg-5 col-sm-12">
            <input type="text" class="form-control text-input" name="emp_gov_issued_id[]" value="<?php echo $mydata['emp_gov_issued_id']?>">
        </div>
        </div>
        <?php }} else {?>

            <div class=" form-row ">
            <div class="col-lg-5 col-sm-12">
            <input type="text" class="form-control text-input " placeholder="Write the type of govt id . Example(Passport) " name="emp_gov_issued_id_type[]" value="">
        </div>

        <div class="col-lg-5 col-sm-12">
            <input type="text" class="form-control text-input" name="emp_gov_issued_id[]" value="">
        </div>
        </div>

<?php } ?>

    

</div>

<div class="col-lg-2 col-sm-12 mt-2">
    <a class="btn button-1 add_button">Add</a>
</div>




<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_ref_button'); //Add button selector
        var wrapper = $('.reference_wrapper'); //Input field wrapper
        var fieldHTML =
            ' <div class="form-row mt-3"> <div class="col-lg-4 col-sm-4 col-4"> <input type="text" class="form-control text-input mb-2"  value="" name="ref_full_name[]"> </div> <div class="col-lg-4 col-sm-4 col-4"> <input type="text" class="form-control text-input mb-2"  value="" name="ref_add[]"> </div> <div class="col-lg-4 col-sm-4 col-4"> <input type="text" class="form-control text-input mb-2"  value="" name="ref_tel[]"> </div> </div>';


        //  field of second part
        var addButton2 = $('.add_button'); //Add button selector
        var wrapper2 = $('.wrapper-2'); //Input field wrapper
        var fieldHTML2 =
            ' <div class=" form-row mt-3"><div class="col-lg-5 col-sm-12"> <input type="text" class="form-control text-input" name="emp_gov_issued_id_type[]" value="" placeholder="Write the type of govt id . Example(Passport) "> </div> <div class="col-lg-5 col-sm-12"> <input type="text" class="form-control text-input " name="emp_gov_issued_id[]" value=""> </div></div>';

        //New input field html 
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once  button  2 is clicked
        $(addButton2).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper2).append(fieldHTML2); //Add field html
            }
        });


    });
</script>