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
                    <small class="text-muted">First Name</small>
                    <input type="text" class=" form-control text-input" placeholder="First name" name="emp_first_name" value="<?php echo $mydata['emp_first_name'] ?>">
                </div>
                <div class="col-lg-2 col-sm-6">
                    <small class="text-muted">Middle Name</small>
                    <input type="text" class="form-control text-input" placeholder="Middle name" name="emp_middle_name" value="<?php echo $mydata['emp_middle_name'] ?>">
                </div>
                <div class="col-lg-2 col-sm-6">
                    <small class="text-muted">Last Name</small>
                    <input type="text" class=" form-control text-input" placeholder="Last name" name="emp_last_name" value="<?php echo $mydata['emp_last_name'] ?>">
                </div>



                <div class="col-lg-2 col-sm-6">
                    <small class="text-muted">Extension Name</small>
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
                    <small class="text-muted">Date of Birth</small>
                    <input type="date" class="form-control text-input" placeholder="Salary" name="emp_dob" value="<?php echo $mydata['emp_dob'] ?>">
                </div>

                <div class="col-lg-2 col-sm-6">
                    <small class="text-muted">Gender</small>
                    <select class="form-control text-input" name="emp_gender">

                        <?php if (!empty($mydata['emp_gender'])) {
                            echo "<option value= '" . $mydata['emp_gender'] . "'>" . $mydata['emp_gender'] . "</option>";
                        } else {
                            echo "<option value='' > Sex </option>";
                        } ?>

                        <option value='Male' <?php echo ($mydata['emp_gender'] == 'male' ? 'style="display: none;"' : '') ?>> Male </option>
                        <option value='Female' <?php echo ($mydata['emp_gender'] == 'female' ? 'style="display: none;"' : '') ?>> Female </option>
                        <!-- <option value='Other' <?php echo ($mydata['emp_gender'] == 'other' ? 'style="display: none;"' : '') ?>> Other </option> -->

                    </select>
                </div>

               

                
            </div>

            <div class="form-row mt-3">
                <div class="col-lg-2 col-sm-6">
                    <small class="text-muted">Civil Status</small>
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
                <div class="col-lg-1 col-sm-6">
                    <small class="text-muted">Height (m)</small>
                    <input type="text" class="form-control text-input" placeholder="Height" name="emp_height" value="<?php echo $mydata['emp_height'] ?>">
                </div>
                <div class="col-lg-1 col-sm-6">
                    <small class="text-muted">Weight (kg)</small>
                    <input type="text" class="form-control text-input" placeholder="Weight" name="emp_weight" value="<?php echo $mydata['emp_weight'] ?>">
                </div>



                <div class="col-lg-2 col-sm-6">
                    <small class="text-muted">Blood Type</small>
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
                    <small class="text-muted">Citizenship</small>
                    <input type="text" class=" form-control text-input" placeholder="Citizenship" name="emp_citizen" value="<?php echo $mydata['emp_citizen'] ?>">

                </div>

                <div class="col-lg-2 col-sm-6">
                    <small class="text-muted">Nationality</small>
                    <input type="text" class=" form-control text-input" placeholder="Nationality" name="emp_nationality" value="<?php echo $mydata['emp_nationality'] ?>">
                </div>
            </div>

            <h5 class="mt-3">Residential Address</h5>
            <div class="form-row ">

                <div class="col-lg-4 col-sm-6">
                    <input type="text" class=" form-control text-input" placeholder="House no/Block no/Lot no.Street" name="emp_resi_add" value="<?php echo $mydata['emp_resi_add'] ?>">
                </div>
                <div class="col-lg-2 col-sm-6">
                    
                     <select class="form-control text-input" name="emp_resi_add_street">

                     <?php if (!empty($mydata['emp_resi_add_street'])) {
                            echo "<option value= '" . $mydata['emp_resi_add_street'] . "'>" . $mydata['emp_resi_add_street'] . "</option>";
                        } else {
                            echo "<option value='' > State/Province </option>";
                        } ?>

                        <?php include '../includes/provinces.php' ?>

                    </select>

                </div>
                <div class="col-lg-2 col-sm-6">
                    <input class="form-control text-input" name="emp_resi_add_municipal" value="<?php echo $mydata['emp_resi_add_municipal'] ?>" placeholder="City/Municipilaty">
                </div>
                <div class="col-lg-2 col-sm-6">
                    <input type="text" class=" form-control text-input" placeholder="Barangay" name="emp_resi_add_barangay" value="<?php echo $mydata['emp_resi_add_barangay'] ?>">
                </div>
                <div class="col-lg-2 col-sm-6">
                    <input type="text" class="form-control text-input" placeholder="Zip code" name="emp_resi_add_zipcode" value="<?php echo $mydata['emp_resi_add_zipcode'] ?>">
                </div>

            </div>

            <h5 class="mt-3">Permanent Address</h5>
            <div class="form-row ">

                <div class="col-lg-4 col-sm-6">
                    <input type="text" class=" form-control text-input" placeholder="House no/Block no/Lot no.Street" name="emp_per_add" value="<?php echo $mydata['emp_per_add'] ?>">
                </div>
                <div class="col-lg-2 col-sm-6">
                    <!-- <select class="form-control text-input" name="emp_per_add_street">
                        <option selected>State/Province</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select> -->

                    <select class="form-control text-input" name="emp_per_add_street">

                    <?php if (!empty($mydata['emp_per_add_street'])) {
                           echo "<option value= '" . $mydata['emp_per_add_street'] . "'>" . $mydata['emp_per_add_street'] . "</option>";
                       } else {
                           echo "<option value='' > State/Province </option>";
                       } ?>

                       <?php include '../includes/provinces.php' ?>

                    </select>

                </div>
                <div class="col-lg-2 col-sm-6">
                    <!-- <select class="form-control text-input" name="emp_per_add_municipal" value="<?php echo $mydata['emp_per_add_municipal'] ?>">
                        <option selected>City/Municipilaty</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select> -->

                    <input type="text" class="form-control text-input" placeholder="City/Municipilaty" name="emp_per_add_municipal" value="<?php echo $mydata['emp_per_add_municipal'] ?>">

                </div>
                <div class="col-lg-2 col-sm-6">
                    <!-- <select class="form-control text-input" name="emp_per_add_barangay" value="<?php echo $mydata['emp_per_add_barangay'] ?>">
                        <option selected>Barangay</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select> -->

                    <input type="text" class="form-control text-input" placeholder="Barangay" name="emp_per_add_barangay" value="<?php echo $mydata['emp_per_add_barangay'] ?>">

                </div>
                <div class="col-lg-2 col-sm-6">
                    <input type="text" class="form-control text-input" placeholder="Zip code" name="emp_per_add_zipcode" value="<?php echo $mydata['emp_per_add_zipcode'] ?>">
                </div>

            </div>

            <div class="form-row mt-3">
                <div class="col-lg-3 col-sm-6">
                    <small class="text-muted">Telephone Number</small>
                    <input type="text" class=" form-control text-input" placeholder="Telephone no" name="emp_tel_no" value="<?php echo $mydata['emp_tel_no'] ?>">
                </div>
                <div class="col-lg-3 col-sm-6">
                    <small class="text-muted">Mobile Number</small>
                    <input type="text" class=" form-control text-input" placeholder="Mobile no" name="emp_mb_no" value="<?php echo $mydata['emp_mb_no'] ?>">
                </div>
                <div class="col-lg-3 col-sm-6">
                    <small class="text-muted">Email Address</small>
                    <input type="text" class="form-control text-input" placeholder="Email Address" name="emp_email" value="<?php echo $mydata['emp_email'] ?>">
                </div>
            </div>

            <div class="form-row mt-3">
                <div class="col-lg-3 col-sm-6">
                    <small class="text-muted">GSIS</small>
                    <input type="text" class=" form-control text-input" placeholder="GSIS ID NO" name="emp_contact_gs" value="<?php echo $mydata['emp_contact_gs'] ?>">
                </div>
                <div class="col-lg-3 col-sm-6">
                    <small class="text-muted">PAG-IBIG</small>
                    <input type="text" class=" form-control text-input" placeholder="PAG-ibig ID NO" name="emp_contact_pag" value="<?php echo $mydata['emp_contact_pag'] ?>">
                </div>
                <div class="col-lg-3 col-sm-6">
                    <small class="text-muted">PHILHEALTH</small>
                    <input type="text" class="form-control text-input" placeholder="Philhealth No" name="emp_contact_ph" value="<?php echo $mydata['emp_contact_ph'] ?>">
                </div>
            </div>

            <div class="form-row mt-3">
                <div class="col-lg-3 col-sm-6">
                    <small class="text-muted">SSS</small>
                    <input type="text" class=" form-control text-input" placeholder="SIS NO" name="emp_contact_ss" value="<?php echo $mydata['emp_contact_ss'] ?>">
                </div>
                <div class="col-lg-3 col-sm-6">
                    <small class="text-muted">TIN NUMBER</small>
                    <input type="text" class=" form-control text-input" placeholder="TIN NO" name="emp_contact_tin" value="<?php echo $mydata['emp_contact_tin'] ?>">
                </div>
                <div class="col-lg-3 col-sm-6">
                    <small class="text-muted">EMPLOYEE ID</small>
                    <input type="text" class="form-control text-input" placeholder="Agency Emp No" name="emp_contact_agency" value="<?php echo $mydata['emp_id'] ?>">
                </div>
            </div>

<?php }
    }
} ?>