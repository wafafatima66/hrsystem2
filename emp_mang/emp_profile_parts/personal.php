

    <div class="form-row mt-3">
        <div class="col-lg-3 col-sm-6">
            <input type="text" class=" form-control text-input" placeholder="First name" name="emp_first_name" value="<?php echo $mydata['emp_first_name']?>">
        </div>
        <div class="col-lg-3 col-sm-6">
            <input type="text" class=" form-control text-input" placeholder="Last name" name="emp_last_name" value="<?php echo $mydata['emp_last_name']?>">
        </div>
        <div class="col-lg-3 col-sm-6">
            <input type="text" class="form-control text-input" placeholder="Middle name" name="emp_middle_name" value="<?php echo $mydata['emp_middle_name']?>">
        </div>
        <div class="col-lg-1 col-sm-6">
            <input type="text" class="form-control text-input" placeholder="ext" name="emp_ext" value="<?php echo $mydata['emp_ext']?>">
        </div>
        <div class="col-lg-2 col-sm-6">
            <input type="date" class="form-control text-input" placeholder="Salary" name="emp_dob" value="<?php echo $mydata['emp_dob']?>">
        </div>
    </div>

    <div class="form-row mt-3">
        <div class="col-lg-2 col-sm-6">
            <input type="text" class=" form-control text-input" placeholder="Sex" name="emp_gender" value="<?php echo $mydata['emp_gender']?>">
        </div>
        <div class="col-lg-3 col-sm-6">
            <input type="text" class=" form-control text-input" placeholder="Civil status" name="emp_civil_status" value="<?php echo $mydata['emp_civil_status']?>">
        </div>
        <div class="col-lg-1 col-sm-6">
            <input type="text" class="form-control text-input" placeholder="Height" name="emp_height" value="<?php echo $mydata['emp_height']?>">
        </div>
        <div class="col-lg-1 col-sm-6">
            <input type="text" class="form-control text-input" placeholder="Weight" name="emp_weight" value="<?php echo $mydata['emp_weight']?>">
        </div>
        <div class="col-lg-1 col-sm-6">
            <input type="text" class="form-control text-input" placeholder="Blood Type" name="emp_blood" value="<?php echo $mydata['emp_blood']?>">
        </div>

        <div class="col-lg-2 col-sm-6">
            <select class="form-control text-input" name="emp_citizen"  >

                    <?php if(!empty($mydata['emp_citizen'])){
                        echo "<option value= '" . $mydata['emp_citizen'] . "'>" . $mydata['emp_citizen'] . "</option>" ; 
                    } else {
                        echo "<option value='' > Citizenship </option>" ;  
                    }?>
                    
                    <?php include '../includes/countries.php' ?>
                    
            </select>
        </div>

        <div class="col-lg-2 col-sm-6">
            <select class="form-control text-input" name="emp_nationality" >

                <?php if(!empty($mydata['emp_nationality'])){
                        echo "<option value= '" . $mydata['emp_nationality'] . "'>" . $mydata['emp_nationality'] . "</option>" ; 
                    } else {
                        echo "<option value='' > Select Country </option>" ;  
                    }?>

                   <?php include '../includes/countries.php' ?>
            </select>
        </div>
    </div>

    <h5 class="mt-3">Residential Address</h5>
    <div class="form-row ">
       
        <div class="col-lg-4 col-sm-6">
            <input type="text" class=" form-control text-input" placeholder="House no/Block no/Lot no.Street" name="emp_resi_add" value="<?php echo $mydata['emp_resi_add']?>">
        </div>
        <div class="col-lg-2 col-sm-6">
            <select class="form-control text-input" name="emp_resi_add_street" value="<?php echo $mydata['emp_resi_add_street']?>">
                    <option selected>State/Province</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
            </select>
        </div>
        <div class="col-lg-2 col-sm-6">
        <select class="form-control text-input" name="emp_resi_add_municipal" value="<?php echo $mydata['emp_resi_add_municipal']?>">
                    <option selected>City/Municipilaty</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
            </select>
        </div>
        <div class="col-lg-2 col-sm-6">
        <select class="form-control text-input" name="emp_resi_add_barangay" value="<?php echo $mydata['emp_resi_add_barangay']?>">
                    <option selected>Barangay</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
            </select>
        </div>
        <div class="col-lg-2 col-sm-6">
            <input type="text" class="form-control text-input" placeholder="Zip code" name="emp_resi_add_zipcode" value="<?php echo $mydata['emp_resi_add_zipcode']?>">
        </div>
       
    </div>

    <h5 class="mt-3">Permanent Address</h5>
    <div class="form-row ">
       
        <div class="col-lg-4 col-sm-6">
            <input type="text" class=" form-control text-input" placeholder="House no/Block no/Lot no.Street" name="emp_per_add" value="<?php echo $mydata['emp_per_add']?>">
        </div>
        <div class="col-lg-2 col-sm-6">
            <select class="form-control text-input" name="emp_per_add_street">
                    <option selected>State/Province</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
            </select>
        </div>
        <div class="col-lg-2 col-sm-6">
        <select class="form-control text-input" name="emp_per_add_municipal" value="<?php echo $mydata['emp_per_add_municipal']?>">
                    <option selected>City/Municipilaty</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
            </select>
        </div>
        <div class="col-lg-2 col-sm-6">
        <select class="form-control text-input" name="emp_per_add_barangay" value="<?php echo $mydata['emp_per_add_barangay']?>">
                    <option selected>Barangay</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
            </select>
        </div>
        <div class="col-lg-2 col-sm-6">
            <input type="text" class="form-control text-input" placeholder="Zip code" name="emp_per_add_zipcode" value="<?php echo $mydata['emp_per_add_zipcode']?>">
        </div>
       
    </div>

    <div class="form-row mt-3">
        <div class="col-lg-3 col-sm-6">
            <input type="text" class=" form-control text-input" placeholder="Telephone no" name="emp_tel_no" value="<?php echo $mydata['emp_tel_no']?>">
        </div>
        <div class="col-lg-3 col-sm-6">
            <input type="text" class=" form-control text-input" placeholder="Mobile no" name="emp_mb_no" value="<?php echo $mydata['emp_mb_no']?>">
        </div>
        <div class="col-lg-3 col-sm-6">
            <input type="text" class="form-control text-input" placeholder="Email Address" name="emp_email" value="<?php echo $mydata['emp_email']?>">
        </div>
    </div>

    <div class="form-row mt-3">
        <div class="col-lg-3 col-sm-6">
            <input type="text" class=" form-control text-input" placeholder="GSIS ID NO" name="emp_contact_gs" value="<?php echo $mydata['emp_contact_gs']?>">
        </div>
        <div class="col-lg-3 col-sm-6">
            <input type="text" class=" form-control text-input" placeholder="PAG-ibig ID NO" name="emp_contact_pag" value="<?php echo $mydata['emp_contact_pag']?>">
        </div>
        <div class="col-lg-3 col-sm-6">
            <input type="text" class="form-control text-input" placeholder="Philhealth No" name="emp_contact_ph" value="<?php echo $mydata['emp_contact_ph']?>">
        </div>
    </div>

    <div class="form-row mt-3">
        <div class="col-lg-3 col-sm-6">
            <input type="text" class=" form-control text-input" placeholder="SIS NO" name="emp_contact_ss" value="<?php echo $mydata['emp_contact_ss']?>">
        </div>
        <div class="col-lg-3 col-sm-6">
            <input type="text" class=" form-control text-input" placeholder="TIN NO" name="emp_contact_tin" value="<?php echo $mydata['emp_contact_tin']?>">
        </div>
        <div class="col-lg-3 col-sm-6">
            <input type="text" class="form-control text-input" placeholder="Agency Emp No" name="emp_contact_agency" value="<?php echo $mydata['emp_contact_agency']?>">
        </div>
    </div>

