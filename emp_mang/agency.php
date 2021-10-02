

<div class=" container-box">

  <h4 class="h4-heading">Agency Profile</h4>

  <?php 


 $query = "SELECT * FROM item where emp_id = '$emp_id'  ";
 $result = mysqli_query($conn, $query);
 if (mysqli_num_rows($result) > 0) {
     while ($mydata = mysqli_fetch_assoc($result)) {
 

?>

  <form method="post" action="" enctype="multipart/form-data">

  <div class="form-row mt-5">

      <div class="col-lg-3 col-sm-6">
        <label for="">Employee Type</label>
        <!-- <input type="text" name="emp_id" class="form-control text-input"  value="<?php echo $mydata['emp_id']?>"/> -->
        <select name="" id="" class="form-control text-input" >
          <option value="">Permanent</option>
          <option value="">Job-Order</option>
          <option value="">MOA</option>
          <option value="">Post residency</option>
        </select>
      </div>

      <div class="col-lg-3 col-sm-6">
        <label for="">Nature of App</label>
        <input type="text" name="item_no" class="form-control text-input" value="<?php echo $mydata['nature']?>" />
      </div>

      <div class="col-lg-3 col-sm-6">
        <label for="">Original Appointment</label>
        <input type="text" name="position" class="form-control text-input" value="<?php echo $mydata['date_orgappnt_lhmrh']?>" />
      </div>

      <div class="col-lg-3 col-sm-6">
        <label for="">Last Promotion</label>
        <input type="text" name="salary_grade" class="form-control text-input" value="<?php echo $mydata['date_last_promotion']?>" />
      </div>

    </div>


    <div class="form-row mt-3">

      <!-- <div class="col-lg-3 col-sm-6">
        <label for="">Employee Id</label>
        <input type="text" name="emp_id" class="form-control text-input"  value="<?php echo $mydata['emp_id']?>"/>
      </div> -->

      <div class="col-lg-3 col-sm-6">
        <label for="">Item No</label>
        <input type="text" name="item_no" class="form-control text-input" value="<?php echo $mydata['item_no']?>" />
      </div>

      <div class="col-lg-4 col-sm-6">
        <label for="">Position</label>
        <input type="text" name="position" class="form-control text-input" value="<?php echo $mydata['position']?>" />
      </div>

      <div class="col-lg-1 col-sm-6">
        <label for="">SG</label>
        <input type="text" name="salary_grade" class="form-control text-input" value="<?php echo $mydata['salary_grade']?>" />
      </div>

      <div class="col-lg-1 col-sm-6">
        <label for="">Increment</label>
        <input type="text" name="salary_grade" class="form-control text-input" value="<?php echo $mydata['sg_step']?>" />
      </div>

      <div class="col-lg-2 col-sm-6">
        <label for="">Monthly Salary</label>
        <input type="text" name="salary_grade" class="form-control text-input" value="<?php echo "P ". number_format($mydata['monthly_salary'])?>" />
      </div>

    </div>

    <div class="form-row mt-3">
      <!-- <div class="col-lg-3 col-sm-6">
        <label for="">Date of Effectivity</label>
        <input type="date" name="date_of_effectivity" class="form-control text-input" value="<?php echo $mydata['date_of_effectivity']?>"/>
      </div> -->

      <div class="col-lg-3 col-sm-6">
        <label for="">Department</label>
        <input type="text" name="department" class="form-control text-input" value="<?php echo $mydata['division']?>" />
      </div>

      <div class="col-lg-3 col-sm-6">
        <label for="">Office/unit</label>
        <input type="text" name="office" class="form-control text-input" value="<?php echo $mydata['area_wrk_assign']?>"/>
      </div>

      <div class="col-lg-3 col-sm-6">
        <label for="">Designation</label>
        <input type="text" name="" class="form-control text-input" value=""/>
      </div>

      <div class="col-lg-3 col-sm-6">
        <label for="">Reassignment</label>
        <input type="text" name="" class="form-control text-input" value=""/>
      </div>

    </div>
  


</div>

<div class="col-lg-12 text-right mt-4 ">

  <button class="btn button-1 " type="submit"><i class="fa fa-print"></i></button>
  <!-- <button class="btn button-1 " type="submit" name="submit"><i class="fas fa-check"></i></button> -->

</div>

</form>

<?php  }}else {
      echo 'No Item found for the employee';
} ?>