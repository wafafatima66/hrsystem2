<!--body section of OTHER INFORMATION-->

<div class="form-row mt-3">
    <div class="col-lg-4 col-sm-12">
        <label for="">SPECIAL SKILLS AND HOBBIES</label>
    </div>
    <div class="col-lg-4 col-sm-12">
        <label for="">NON-ACADEMIC DISTINCTION/RECOGNITION</label>
    </div>
    <div class="col-lg-4 col-sm-12">
        <label for="">MEMBERSHIP IN ASSOCIATION/ORGANIZATION</label>
    </div>
</div>

<div class="skills_wrapper">


    <div class="form-row mt-3">

        <?php

        $query = "SELECT * FROM emp_special_skills WHERE emp_id = '$emp_id'";

        $runquery = $conn->query($query);
        $rowcount = mysqli_num_rows($runquery);
        if ($rowcount > 0) {

            while ($mydata1 = $runquery->fetch_assoc()) {  ?>

                <div class="col-lg-4 col-sm-12 mt-3">
                    <input type="text" class="form-control text-input" value="<?php echo $mydata1['emp_special_skills'] ?>" name="emp_special_skills[]">
                </div>

        <?php }
        } else {?>
                <div class="col-lg-4 col-sm-12 mt-3">
                    <input type="text" class="form-control text-input" value="" name="emp_special_skills[]">
                </div>
      <?php  }?>

        <?php

        $query = "SELECT * FROM emp_non_academic WHERE emp_id = '$emp_id'";

        $runquery = $conn->query($query);
        $rowcount = mysqli_num_rows($runquery);
        if ($rowcount > 0) {

            while ($mydata2 = $runquery->fetch_assoc()) {  ?>

                <div class="col-lg-4 col-sm-12 mt-3">
                    <input type="text" class="form-control text-input" value="<?php echo $mydata2['emp_non_academic'] ?>" name="emp_non_academic[]">
                </div>

        <?php }
        } else {?>
           <div class="col-lg-4 col-sm-12 mt-3">
                    <input type="text" class="form-control text-input" value="" name="emp_non_academic[]">
                </div>
  <?php  }?>

        <?php

        $query = "SELECT * FROM emp_membership WHERE emp_id = '$emp_id'";

        $runquery = $conn->query($query);
        $rowcount = mysqli_num_rows($runquery);
        if ($rowcount > 0) {

            while ($mydata3 = $runquery->fetch_assoc()) {  ?>

                <div class="col-lg-4 col-sm-12 mt-3">
                    <input type="text" class="form-control text-input" value="<?php echo $mydata3['emp_membership'] ?>" name="emp_membership[]">
                </div>

        <?php }
        } else {?>
            <div class="col-lg-4 col-sm-12 mt-3">
                    <input type="text" class="form-control text-input" value="" name="emp_membership[]">
                </div>
  <?php  }?>

    </div>


</div>

<div class="col-lg-3 col-sm-12 mt-2">
    <a class=" btn button-1 add_skills_button">Add</a>
</div>

<?php  $query = "SELECT * FROM employee WHERE id = '$id'";

    $runquery = $conn -> query($query);
    if($runquery == true){
        while($mydata = $runquery -> fetch_assoc()){
            ?>

<div class="form-row mt-3">
    <div class="col-lg-7 col-sm-12">
        <p>Are you related by consanguinity or affninity to the appointing or recommending authority, or to the cheif of
            bureau or office or to the person who has immediate supervision over you in the office,Bureau or Department
            where you will be appointed.</p>
    </div>
</div>


<div class="form-row mt-3">
    <div class="col-lg-7 col-sm-12">
        <p>a.within the third degree?</p>
    </div>
    <div class="col-lg-2 col-sm-12">
        <select name="condition_1"  class="form-control text-input ">
            <option value="">Select</option>
            <option value="Yes"
            <?php if ($mydata['condition_1'] == "Yes"  ) {
                    echo 'selected'; }?> 
            >Yes</option>
            <option value="No"
            <?php if ($mydata['condition_1'] == "No"  ) {
                    echo 'selected'; }?> 
            >No</option>
        </select>
    </div>
</div>

<div class="form-row mt-3">
    <div class="col-lg-7 col-sm-12">
        <p>b.within the fourth degree (for Local Government Unit - Career Employees)?</p>
    </div>

    <div class="col-lg-2 col-sm-12">
        <select name="condition_2"  class="form-control text-input ">
        <option value="">Select</option>
            <option value="Yes"
            <?php if ($mydata['condition_2'] == "Yes"  ) {
                    echo 'selected'; }?> 
            >Yes</option>
            <option value="No"
            <?php if ($mydata['condition_2'] == "No"  ) {
                    echo 'selected'; }?> 
            >No</option>
        </select>
    </div>

    <div class="col-lg-3 col-sm-12">
        <input type="text" class="form-control text-input " value="<?php echo $mydata['condition_2_des'] ?>" name="condition_2_des" placeholder="If YES , please give details">
    </div>

</div>

<div class="form-row mt-3">
    <div class="col-lg-7 col-sm-12">
        <p>Have you ever been found guilty of any administrative offense?</p>
    </div>

    <div class="col-lg-2 col-sm-12">
        <select name="condition_3"  class="form-control text-input ">
        <option value="">Select</option>
            <option value="Yes"
            <?php if ($mydata['condition_3'] == "Yes"  ) {
                    echo 'selected'; }?> 
            >Yes</option>
            <option value="No"
            <?php if ($mydata['condition_3'] == "No"  ) {
                    echo 'selected'; }?> 
            >No</option>
        </select>
    </div>

    <div class="col-lg-3 col-sm-12">
        <input type="text" class="form-control text-input " value="<?php echo $mydata['condition_3_des'] ?>" name="condition_3_des" placeholder="If YES , please give details">
    </div>

</div>


<div class="form-row mt-3">
    <div class="col-lg-7 col-sm-12">
        <p>Have you been criminally charged before any court?</p>
    </div>

    <div class="col-lg-2 col-sm-12">
        <select name="condition_4"  class="form-control text-input ">
        <option value="">Select</option>
            <option value="Yes"
            <?php if ($mydata['condition_4'] == "Yes"  ) {
                    echo 'selected'; }?> 
            >Yes</option>
            <option value="No"
            <?php if ($mydata['condition_4'] == "No"  ) {
                    echo 'selected'; }?> 
            >No</option>
        </select>
    </div>

    <div class="col-lg-3 col-sm-12">
        <input type="text" class="form-control text-input " value="<?php echo $mydata['condition_4_des'] ?>" name="condition_4_des" placeholder="If YES , please give details" >

        <div class="form-row mt-3">
            <div class="col-lg-6 col-sm-12">
                <input type="date" class="form-control text-input " name="condition_4_date" value="<?php echo $mydata['condition_4_date'] ?>">
            </div>
            <div class="col-lg-6 col-sm-12">
                <input type="text" class="form-control text-input " placeholder="Status" name="condition_4_status" value="<?php echo $mydata['condition_4_status'] ?>">
            </div>
        </div>

    </div>

</div>



<div class="form-row mt-3">
    <div class="col-lg-7 col-sm-12">
        <p>Have you ever been seperated from the service in any of the following modes: <br>
            resignation,retirement,dropped from the rolls, dismissal, termination, end of term, finished
            contract or phased out(abolition) in the public or private sector?</p>
    </div>

    <div class="col-lg-2 col-sm-12">
        <select name="condition_5"  class="form-control text-input ">
        <option value="">Select</option>
            <option value="Yes"
            <?php if ($mydata['condition_5'] == "Yes"  ) {
                    echo 'selected'; }?> 
            >Yes</option>
            <option value="No"
            <?php if ($mydata['condition_5'] == "No"  ) {
                    echo 'selected'; }?> 
            >No</option>
        </select>
    </div>

    <div class="col-lg-3 col-sm-12">
        <input type="text" class="form-control text-input " value="<?php echo $mydata['condition_5_des'] ?>" name="condition_5_des" placeholder="If YES , please give details">
    </div>

</div>

<div class="form-row mt-3">
    <div class="col-lg-7 col-sm-12">
        <p>Have you ever been a candidate in a national or local election held within the last year(except
            Barangay election)?</p>
    </div>


    <div class="col-lg-2 col-sm-12">
        <select name="condition_6"  class="form-control text-input ">
        <option value="">Select</option>
            <option value="Yes"
            <?php if ($mydata['condition_6'] == "Yes"  ) {
                    echo 'selected'; }?> 
            >Yes</option>
            <option value="No"
            <?php if ($mydata['condition_6'] == "No"  ) {
                    echo 'selected'; }?> 
            >No</option>
        </select>
    </div>

    <div class="col-lg-3 col-sm-12">
        <input type="text" class="form-control text-input " value="<?php echo $mydata['condition_6_des'] ?>" name="condition_6_des" placeholder="If YES , please give details">
    </div>

</div>


<div class="form-row mt-3">
    <div class="col-lg-7 col-sm-12">
        <p>Have you resigned from the government service during the three (3)-month period during the last election to
            promote/actively campaign for a national or local candidate?</p>
    </div>


    <div class="col-lg-2 col-sm-12">
        <select name="condition_7"  class="form-control text-input ">
        <option value="">Select</option>
            <option value="Yes"
            <?php if ($mydata['condition_7'] == "Yes"  ) {
                    echo 'selected'; }?> 
            >Yes</option>
            <option value="No"
            <?php if ($mydata['condition_7'] == "No"  ) {
                    echo 'selected'; }?> 
            >No</option>
        </select>
    </div>

    <div class="col-lg-3 col-sm-12">
        <input type="text" class="form-control text-input " value="<?php echo $mydata['condition_7_des'] ?>" name="condition_7_des" placeholder="If YES , please give details">
    </div>

</div>

<div class="form-row mt-3">
    <div class="col-lg-7 col-sm-12">
        <p>Have you acquired the status of an immigrant or permanent resident of another country?</p>
    </div>


    <div class="col-lg-2 col-sm-12">
        <select name="condition_8"  class="form-control text-input ">
        <option value="">Select</option>
            <option value="Yes"
            <?php if ($mydata['condition_8'] == "Yes"  ) {
                    echo 'selected'; }?> 
            >Yes</option>
            <option value="No"
            <?php if ($mydata['condition_8'] == "No"  ) {
                    echo 'selected'; }?> 
            >No</option>
        </select>
    </div>

    <div class="col-lg-3 col-sm-12">
        <input type="text" class="form-control text-input " value="<?php echo $mydata['condition_8_des'] ?>" name="condition_8_des" placeholder="If YES , please give details">
    </div>

</div>

<div class="form-row mt-3">
    <div class="col-lg-7 col-sm-12">
        <p>Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277);
            and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</p>
    </div>


    <div class="col-lg-2 col-sm-12">
        <select name="condition_9"  class="form-control text-input ">
        <option value="">Select</option>
            <option value="Yes"
            <?php if ($mydata['condition_9'] == "Yes"  ) {
                    echo 'selected'; }?> 
            >Yes</option>
            <option value="No"
            <?php if ($mydata['condition_9'] == "No"  ) {
                    echo 'selected'; }?> 
            >No</option>
        </select>
    </div>

    <div class="col-lg-3 col-sm-12">
        <input type="text" class="form-control text-input " value="<?php echo $mydata['condition_9_des'] ?>" name="condition_9_des" placeholder="If YES , please give details">
    </div>

</div>

<div class="form-row mt-3">
    <div class="col-lg-7 col-sm-12">
        <p>a.Are you a member of any indigenous group?</p>
    </div>


    <div class="col-lg-2 col-sm-12">
        <select name="condition_10"  class="form-control text-input ">
        <option value="">Select</option>
            <option value="Yes"
            <?php if ($mydata['condition_10'] == "Yes"  ) {
                    echo 'selected'; }?> 
            >Yes</option>
            <option value="No"
            <?php if ($mydata['condition_10'] == "No"  ) {
                    echo 'selected'; }?> 
            >No</option>
        </select>
    </div>

    <div class="col-lg-3 col-sm-12">
        <input type="text" class="form-control text-input " value="<?php echo $mydata['condition_10_des'] ?>" name="condition_10_des" placeholder="If YES , please give details">
    </div>

</div>

<div class="form-row mt-3">
    <div class="col-lg-7 col-sm-12">
        <p>b.Are you a person with disability?</p>
    </div>


    <div class="col-lg-2 col-sm-12">
        <select name="condition_11"  class="form-control text-input ">
        <option value="">Select</option>
            <option value="Yes"
            <?php if ($mydata['condition_11'] == "Yes"  ) {
                    echo 'selected'; }?> 
            >Yes</option>
            <option value="No"
            <?php if ($mydata['condition_11'] == "No"  ) {
                    echo 'selected'; }?> 
            >No</option>
        </select>
    </div>

    <div class="col-lg-3 col-sm-12">
        <input type="text" class="form-control text-input " value="<?php echo $mydata['condition_11_des'] ?>" name="condition_11_des" placeholder="If YES , please give details">
    </div>

</div>

<div class="form-row mt-3">
    <div class="col-lg-7 col-sm-12">
        <p>c.Are you a solo parent?</p>
    </div>


    <div class="col-lg-2 col-sm-12">
        <select name="condition_12"  class="form-control text-input ">
        <option value="">Select</option>
            <option value="Yes"
            <?php if ($mydata['condition_12'] == "Yes"  ) {
                    echo 'selected'; }?> 
            >Yes</option>
            <option value="No"
            <?php if ($mydata['condition_12'] == "No"  ) {
                    echo 'selected'; }?> 
            >No</option>
        </select>
    </div>

    <div class="col-lg-3 col-sm-12">
        <input type="text" class="form-control text-input " value="<?php echo $mydata['condition_12_des'] ?>" name="condition_12_des" placeholder="If YES , please give details">
    </div>

</div>

<?php } } ?>

<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_skills_button'); //Add button selector
        var wrapper = $('.skills_wrapper'); //Input field wrapper
        var fieldHTML =
            '<div class="form-row mt-3"> <div class="col-lg-4 col-sm-12"> <input type="text" class="form-control text-input"  value="" name="emp_special_skills[]"> </div> <div class="col-lg-4 col-sm-12"> <input type="text" class="form-control text-input"  value=""  name="emp_non_academic[]"> </div> <div class="col-lg-4 col-sm-12"> <input type="text" class="form-control text-input"  value=""  name="emp_membership[]"> </div> </div>';

           

        // New input field html 
        var x = 1; //Initial field counter is 1

        // Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
    });
    
</script>