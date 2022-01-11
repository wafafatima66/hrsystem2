<?php
if (isset($_GET['id'])) {

    $id =  $_GET['id'];

    $query = "SELECT * FROM employee WHERE id = '$id'";

    $runquery = $conn->query($query);
    if ($runquery == true) {
        while ($mydata = $runquery->fetch_assoc()) {
?>

            <div class="form-row mt-3">
                <div class="col-lg-2 col-sm-6">
                    <small>First Name</small>
                    <input type="text" class=" form-control text-input" placeholder="First name" name="emp_first_name" value="<?php echo $mydata['emp_first_name'] ?>">
                </div>
                <div class="col-lg-2 col-sm-6">
                    <small>Last Name</small>
                    <input type="text" class=" form-control text-input" placeholder="Last name" name="emp_last_name" value="<?php echo $mydata['emp_last_name'] ?>">
                </div>
                <div class="col-lg-2 col-sm-6">
                    <small>Middle Name</small>
                    <input type="text" class=" form-control text-input" placeholder="Middle name" name="emp_middle_name" value="<?php echo $mydata['emp_middle_name'] ?>">
                </div>
                <div class="col-lg-2 col-sm-6">
                    <small>Extension Name</small>
                    <select class="form-control text-input" name="emp_ext">

                        <?php if (!empty($mydata['emp_ext'])) {
                            echo "<option value= '" . $mydata['emp_ext'] . "'>" . $mydata['emp_ext'] . "</option>";
                        } else {
                            echo "<option value='' >Name Extension</option>";
                        } ?>

                        <option value='JR' <?php echo ($mydata['emp_ext'] == 'JR' ? 'style="display: none;"' : '') ?>> JR </option>
                        <option value='SR' <?php echo ($mydata['emp_ext'] == 'SR' ? 'style="display: none;"' : '') ?>> SR </option>
                        <option value='III' <?php echo ($mydata['emp_ext'] == 'III' ? 'style="display: none;"' : '') ?>> III </option>
                        <option value='IV' <?php echo ($mydata['emp_ext'] == 'IV' ? 'style="display: none;"' : '') ?>> IV </option>
                        <option value='N/A' <?php echo ($mydata['emp_ext'] == 'N/A' ? 'style="display: none;"' : '') ?>> N/A </option>

                    </select>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <small>Date of Birth</small>
                    <input type="date" class="form-control text-input" placeholder="Salary" name="emp_dob" value="<?php echo $mydata['emp_dob'] ?>" >
                </div>
                <div class="col-lg-2 col-sm-6">
                    <!-- <input type="text" class=" form-control text-input" placeholder="Sex" name="emp_gender" value="<?php echo $mydata['emp_gender'] ?>"> -->
                    <small>Gender</small>
                    <select class="form-control text-input" name="emp_gender">

                        <?php if (!empty($mydata['emp_gender'])) {
                            echo "<option value= '" . $mydata['emp_gender'] . "'>" . $mydata['emp_gender'] . "</option>";
                        } else {
                            echo "<option value='' > Sex </option>";
                        } ?>

                        <option value='Male' <?php echo ($mydata['emp_gender'] == 'Male' ? 'style="display: none;"' : '') ?>> Male </option>
                        <option value='Female' <?php echo ($mydata['emp_gender'] == 'Female' ? 'style="display: none;"' : '') ?>> Female </option>
                        <!-- <option value='Other' <?php echo ($mydata['emp_gender'] == 'Other' ? 'style="display: none;"' : '') ?>> Other </option> -->

                    </select>

                </div>
            </div>

            <div class="form-row mt-3">
                
                <div class="col-lg-2 col-sm-6">
                    
                    <small>Civil Status</small>
                    <select class="form-control text-input" name="emp_civil_status">

                        <?php if (!empty($mydata['emp_civil_status'])) {
                            echo "<option value= '" . $mydata['emp_civil_status'] . "'>" . $mydata['emp_civil_status'] . "</option>";
                        } else {
                            echo "<option value='' > Civil status </option>";
                        } ?>

                        <option value='Single' <?php echo ($mydata['emp_civil_status'] == 'Single' ? 'style="display: none;"' : '') ?>> Single </option>
                        <option value='Married' <?php echo ($mydata['emp_civil_status'] == 'Married' ? 'style="display: none;"' : '') ?>> Married </option>
                        <option value='Widowed' <?php echo ($mydata['emp_civil_status'] == 'Widowed' ? 'style="display: none;"' : '') ?>> Widowed </option>
                        <option value='Seperated' <?php echo ($mydata['emp_civil_status'] == 'Seperated' ? 'style="display: none;"' : '') ?>> Seperated </option>
                        <option value='Others' <?php echo ($mydata['emp_civil_status'] == 'Others' ? 'style="display: none;"' : '') ?>> Others </option>

                    </select>

                </div>
                <div class="col-lg-2 col-sm-6">
                    <small>Height(m)</small>
                    <input type="text" class="form-control text-input" placeholder="Height" name="emp_height" value="<?php echo $mydata['emp_height'] ?>">
                </div>
                <div class="col-lg-2 col-sm-6">
                    <small>Weight(kg)</small>
                    <input type="text" class="form-control text-input" placeholder="Weight" name="emp_weight" value="<?php echo $mydata['emp_weight'] ?>">
                </div>
                <div class="col-lg-2 col-sm-6">
                    <small>Blood Type</small>
                    <select class="form-control text-input" name="emp_blood">
                        <?php if (!empty($mydata['emp_blood'])) {
                            echo "<option value= '" . $mydata['emp_blood'] . "'>" . $mydata['emp_blood'] . "</option>";
                        } else {
                            echo "<option value='' > Blood Type </option>";
                            } 
                        ?>

                        <option value='A' <?php echo ($mydata['emp_blood'] == 'A' ? 'style="display: none;"' : '') ?>>A</option>
                        <option value='B' <?php echo ($mydata['emp_blood'] == 'B' ? 'style="display: none;"' : '') ?>>B</option>
                        <option value='O' <?php echo ($mydata['emp_blood'] == 'O' ? 'style="display: none;"' : '') ?>>O</option>
                        <option value='AB' <?php echo ($mydata['emp_blood'] == 'AB' ? 'style="display: none;"' : '') ?>>AB</option>
                    </select>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <small>Citizenship</small>  
                    <input type="text" class=" form-control text-input" placeholder="Citizenship" name="emp_citizen" value="<?php echo $mydata['emp_citizen'] ?>">

                </div>
                <div class="col-lg-2 col-sm-6">
                    <small>Country</small>
                    <!-- <input type="text" class=" form-control text-input" placeholder="Nationality" name="emp_nationality" value="<?php echo $mydata['emp_nationality'] ?>"> -->

                    <select class="form-control text-input" name="emp_nationality">
                        <?php if (!empty($mydata['emp_nationality'])) {
                            echo "<option value= '" . $mydata['emp_nationality'] . "'>" . $mydata['emp_nationality'] . "</option>";
                        } else {
                            echo "<option value='' > Select Country </option>";
                        } ?>
                        <?php include '../includes/countries.php' ?>
                    </select>
                </div>
            </div>

            <h5 class="mt-3">Birth Place</h5>
            <div class="form-row ">

                <div class="col-lg-2 col-sm-6">
                    <small>Barangay</small>
                    <input type="text" class=" form-control text-input" placeholder="Barangay" name="emp_birth_add_barangay" value="<?php echo $mydata['emp_birth_add_barangay'] ?>">
                </div>

                <div class="col-lg-2 col-sm-6">
                    <small>Province</small>
                     <select class="form-control text-input" name="emp_birth_add_province" id="emp_birth_add_street">
                     <?php if (!empty($mydata['emp_birth_add_province'])) {
                            echo "<option value= '" . $mydata['emp_birth_add_province'] . "'>" . $mydata['emp_birth_add_province'] . "</option>";
                        } else {
                            echo "<option value='' > State/Province </option>";
                        } ?>
                        <?php include '../includes/provinces.php' ?>
                    </select>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <small>City/Municipality</small>
                    <select class="form-control text-input" name="emp_birth_add_municipal" id="emp_birth_add_municipal" >
                        <?php if (!empty($mydata['emp_birth_add_municipal'])) {
                            echo "<option value= '" . $mydata['emp_birth_add_municipal'] . "'>" . $mydata['emp_birth_add_municipal'] . "</option>";
                        } else {
                            echo "<option value='' > City/Municipilaty </option>";
                        } 
                        ?>
                    </select>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <small>ZIP Code</small>
                    <select class="form-control text-input" name="emp_birth_add_zipcode" id="emp_birth_add_zipcode" >
                        <?php if (!empty($mydata['emp_birth_add_zipcode'])) {
                            echo "<option value= '" . $mydata['emp_birth_add_zipcode'] . "'>" . $mydata['emp_birth_add_zipcode'] . "</option>";
                        } else {
                            echo "<option value='' > Zip code </option>";
                        } 
                        ?>
                </select>
            </div>

            </div>

            <h5 class="mt-3">Residential Address</h5>
            <div class="form-row ">

                <div class="col-lg-2 col-sm-6">
                    <small>House/Block/Lot No.</small>
                    <input type="text" class=" form-control text-input" placeholder="House no/Block no/Lot no." name="emp_resi_add" value="<?php echo $mydata['emp_resi_add'] ?>">
                </div>
                <div class="col-lg-1 col-sm-6">
                    <small>Street</small>
                    <input type="text" class=" form-control text-input" placeholder="Street" name="emp_resi_add_street" value="<?php echo $mydata['emp_resi_add_street'] ?>">
                </div>
                <div class="col-lg-2 col-sm-6">
                    <small>Subdivision/Village</small>
                    <input type="text" class=" form-control text-input" placeholder="Subdivision/Village" name="emp_resi_add_subvillage" value="<?php echo $mydata['emp_resi_add_subvillage'] ?>">
                </div>
                <div class="col-lg-2 col-sm-6">
                    <small>Barangay</small>
                    <input type="text" class=" form-control text-input" placeholder="Barangay" name="emp_resi_add_barangay" value="<?php echo $mydata['emp_resi_add_barangay'] ?>">
                </div>

                <div class="col-lg-2 col-sm-6">
                    <small>Province</small>
                     <select class="form-control text-input" name="emp_resi_add_province" id="emp_resi_add_street">
                     <?php if (!empty($mydata['emp_resi_add_province'])) {
                            echo "<option value= '" . $mydata['emp_resi_add_province'] . "'>" . $mydata['emp_resi_add_province'] . "</option>";
                        } else {
                            echo "<option value='' > State/Province </option>";
                        } ?>
                        <?php include '../includes/provinces.php' ?>
                    </select>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <small>City/Municipality</small>
                    <!-- <input type="text" class=" form-control text-input" placeholder="City/Municipality" name="emp_resi_add_municipal" value="<?php echo $mydata['emp_resi_add_municipal'] ?>"> -->
                    <select class="form-control text-input" name="emp_resi_add_municipal" id="emp_resi_add_municipal" >
                        <?php if (!empty($mydata['emp_resi_add_municipal'])) {
                            echo "<option value= '" . $mydata['emp_resi_add_municipal'] . "'>" . $mydata['emp_resi_add_municipal'] . "</option>";
                        } else {
                            echo "<option value='' > City/Municipilaty </option>";
                        } 
                        ?>
                    </select>
                </div>

                <div class="col-lg-1 col-sm-6">
                    <small>ZIP Code</small>
                    <!-- <input type="text" class=" form-control text-input" placeholder="" name="emp_resi_add_zipcode" value="<?php echo $mydata['emp_resi_add_zipcode'] ?>"> -->
                    <select class="form-control text-input" name="emp_resi_add_zipcode" id="emp_resi_add_zipcode" >
                        <?php if (!empty($mydata['emp_resi_add_zipcode'])) {
                            echo "<option value= '" . $mydata['emp_resi_add_zipcode'] . "'>" . $mydata['emp_resi_add_zipcode'] . "</option>";
                        } else {
                            echo "<option value='' > Zip code </option>";
                        } 
                        ?>
                </select>
            </div>

            </div>

            <h5 class="mt-3">Permanent Address</h5>
            <div class="form-row ">

                <div class="col-lg-2 col-sm-6">
                    <small>House/Block/Lot No.</small>
                    <input type="text" class=" form-control text-input" placeholder="House no/Block no/Lot no." name="emp_per_add" value="<?php echo $mydata['emp_per_add'] ?>">
                </div>
                <div class="col-lg-1 col-sm-6">
                    <small>Street</small>
                    <input type="text" class=" form-control text-input" placeholder="Street" name="emp_per_add_street" value="<?php echo $mydata['emp_per_add_street'] ?>">
                </div>
                <div class="col-lg-2 col-sm-6">
                    <small>Subdivision/Village</small>
                    <input type="text" class=" form-control text-input" placeholder="Subdivision/Village" name="emp_per_add_subvillage" value="<?php echo $mydata['emp_per_add_subvillage'] ?>">
                </div>
                <div class="col-lg-2 col-sm-6">
                    <small>Barangay</small>
                    <input type="text" class=" form-control text-input" placeholder="Barangay" name="emp_per_add_barangay" value="<?php echo $mydata['emp_per_add_barangay'] ?>">
                </div>

                <div class="col-lg-2 col-sm-6">
                    <small>Province</small>
                     <select class="form-control text-input" name="emp_per_add_province" id="emp_per_add_street">
                     <?php if (!empty($mydata['emp_per_add_province'])) {
                            echo "<option value= '" . $mydata['emp_per_add_province'] . "'>" . $mydata['emp_per_add_province'] . "</option>";
                        } else {
                            echo "<option value='' > State/Province </option>";
                        } ?>
                        <?php include '../includes/provinces.php' ?>
                    </select>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <small>City/Municipality</small>
                    <!-- <input type="text" class=" form-control text-input" placeholder="City/Municipality" name="emp_per_add_municipal" value="<?php echo $mydata['emp_per_add_municipal'] ?>"> -->
                    <select class="form-control text-input" name="emp_per_add_municipal" id="emp_per_add_municipal" >
                        <?php if (!empty($mydata['emp_per_add_municipal'])) {
                            echo "<option value= '" . $mydata['emp_per_add_municipal'] . "'>" . $mydata['emp_per_add_municipal'] . "</option>";
                        } else {
                            echo "<option value='' > City/Municipilaty </option>";
                        } 
                        ?>
                    </select>
                </div>

                <div class="col-lg-1 col-sm-6">
                    <small>ZIP Code</small>
                    <!-- <input type="text" class=" form-control text-input" placeholder="" name="emp_per_add_zipcode" value="<?php echo $mydata['emp_per_add_zipcode'] ?>"> -->
                    <select class="form-control text-input" name="emp_per_add_zipcode" id="emp_per_add_zipcode" >
                        <?php if (!empty($mydata['emp_per_add_zipcode'])) {
                            echo "<option value= '" . $mydata['emp_per_add_zipcode'] . "'>" . $mydata['emp_per_add_zipcode'] . "</option>";
                        } else {
                            echo "<option value='' > Zip code </option>";
                        } 
                        ?>
                </select>
                </div>

            </div>

            <div class="form-row mt-3">
                <div class="col-lg-2 col-sm-6">
                    <small>Telephone No.</small>
                    <input type="text" class=" form-control text-input" placeholder="Telephone no" name="emp_tel_no" value="<?php echo $mydata['emp_tel_no'] ?>">
                </div>
                <div class="col-lg-2 col-sm-6">
                    <small>Mobile No.</small>
                    <input type="text" class=" form-control text-input" placeholder="Mobile no" name="emp_mb_no" value="<?php echo $mydata['emp_mb_no'] ?>">
                </div>
                <div class="col-lg-3 col-sm-6">
                    <small>Email</small>
                    <input type="text" class="form-control text-input" placeholder="Email Address" name="emp_email" value="<?php echo $mydata['emp_email'] ?>" style="
                    text-transform: none">
                </div>
                <div class="col-lg-2 col-sm-6">
                    <small>GSIS</small>
                    <input type="text" class=" form-control text-input" placeholder="GSIS ID NO" name="emp_contact_gs" value="<?php echo $mydata['emp_contact_gs'] ?>">
                </div>
                <div class="col-lg-3 col-sm-6">
                    <small>PAG-IBIG</small>
                    <input type="text" class=" form-control text-input" placeholder="PAG-ibig ID NO" name="emp_contact_pag" value="<?php echo $mydata['emp_contact_pag'] ?>">
                </div>
            </div>


            <div class="form-row mt-3">
                <div class="col-lg-3 col-sm-6">
                    <small>PHILHEALTH</small>
                    <input type="text" class="form-control text-input" placeholder="Philhealth No" name="emp_contact_ph" value="<?php echo $mydata['emp_contact_ph'] ?>">
                </div>

                <div class="col-lg-3 col-sm-6">
                    <small>SSS</small>
                    <input type="text" class=" form-control text-input" placeholder="SIS NO" name="emp_contact_ss" value="<?php echo $mydata['emp_contact_ss'] ?>">
                </div>
                <div class="col-lg-3 col-sm-6">
                    <small>TIN</small>
                    <input type="text" class=" form-control text-input" placeholder="TIN NO" name="emp_contact_tin" value="<?php echo $mydata['emp_contact_tin'] ?>">
                </div>
                <div class="col-lg-3 col-sm-6">
                    <small>EMPLOYEE ID</small>
                    <input type="text" class="form-control text-input" placeholder="Agency Emp No" name="emp_contact_agency" value="<?php echo $mydata['emp_id'] ?>">
                </div>
            </div>

<?php }
    }
 } ?>


