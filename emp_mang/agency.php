

<div class=" container-box">

  <h4 class="h4-heading">Agency Profile</h4>

  <?php 


 $query = "SELECT * FROM item where emp_id = '$emp_id'  ";
 $result = mysqli_query($conn, $query);
 if (mysqli_num_rows($result) > 0) {
     while ($mydata = mysqli_fetch_assoc($result)) {
      $emp_id = $mydata['emp_id']; 

?>

  <form method="post" action="" enctype="multipart/form-data">

  <div class="form-row mt-5">

      <div class="col-lg-3 col-sm-6">
        <small>Employee Type</small>
        <!--<label for="">Employee Type</label>-->
        <!-- <input type="text" name="emp_id" class="form-control text-input"  value="<?php echo $mydata['emp_id']?>"/> -->
        <select name="" id="" class="form-control text-input" >
          <option value="">Permanent</option>
          <option value="">Job-Order</option>
          <option value="">MOA</option>
          <option value="">Post residency</option>
        </select>
      </div>

      <div class="col-lg-3 col-sm-6">
        <small>Nature of Appointment</small>
        <input type="text" name="item_no" class="form-control text-input" value="<?php echo $mydata['nature']?>" />
      </div>

      <div class="col-lg-3 col-sm-6">
        <small>Original Appointment</small>
        <input type="text" name="position" class="form-control text-input" value="<?php echo $mydata['date_orgappnt_lhmrh']?>" />
      </div>

      <div class="col-lg-3 col-sm-6">
        <small>Last Promotion</small>
        <input type="text" name="salary_grade" class="form-control text-input" value="<?php echo $mydata['date_last_promotion']?>" />
      </div>

    </div>


    <div class="form-row mt-3">

      <!-- <div class="col-lg-3 col-sm-6">
        <label for="">Employee Id</label>
        <input type="text" name="emp_id" class="form-control text-input"  value="<?php echo $mydata['emp_id']?>"/>
      </div> -->

      <div class="col-lg-4 col-sm-6">
        <small>Item Number</small>
        <input type="text" name="item_no" class="form-control text-input" value="<?php echo $mydata['item_no']?>" />
      </div>

      <div class="col-lg-4 col-sm-6">
        <small>Position</small>
        <input type="text" name="position" class="form-control text-input" value="<?php echo $mydata['position']?>" />
      </div>

      <div class="col-lg-1 col-sm-6">
        <small>SG</small>
        <input type="text" name="salary_grade" class="form-control text-input" value="<?php echo $mydata['salary_grade']?>" />
      </div>

      <div class="col-lg-1 col-sm-6">
        <small>SG Step</small>
        <input type="text" name="salary_grade" class="form-control text-input" value="<?php echo $mydata['sg_step']?>" />
      </div>

      <div class="col-lg-2 col-sm-6">
        <small>Monthly Salary</small>
        <input type="text" name="salary_grade" class="form-control text-input" value="<?php echo "P ". number_format($mydata['monthly_salary'])?>" />
      </div>

    </div>

    <div class="form-row mt-3">
      <!-- <div class="col-lg-3 col-sm-6">
        <label for="">Date of Effectivity</label>
        <input type="date" name="date_of_effectivity" class="form-control text-input" value="<?php echo $mydata['date_of_effectivity']?>"/>
      </div> -->

      <div class="col-lg-3 col-sm-6">
        <small>Department</small>
        <input type="text" name="department" class="form-control text-input" value="<?php echo $mydata['division']?>" />
      </div>

      <div class="col-lg-3 col-sm-6">
        <small>Office/Unit</small>
        <input type="text" name="office" class="form-control text-input" value="<?php echo $mydata['area_wrk_assign']?>"/>
      </div>

      <div class="col-lg-3 col-sm-6">
        <small>Designation</small>
        <input type="text" name="" class="form-control text-input" value=""/>
      </div>

      <div class="col-lg-3 col-sm-6">
        <small>Reassignment</small>
        <input type="text" name="" class="form-control text-input" value=""/>
      </div>

    </div>
  


</div>
<!-- 
<div class="col-lg-12 text-right mt-4 ">

  <button class="btn button-1 " type="submit"><i class="fa fa-print"></i></button <button class="btn button-1 " type="submit" name="submit"><i class="fas fa-check"></i></button> 

</div> -->

</form>

<input type="hidden" name="emp_id" class="form-control text-input"  value="<?php echo $mydata['emp_id']?>"/>

<?php  }}else {
      echo 'No Item found for the employee';
} ?>






<div class="container-box emp_report_gen_box">

  <h4 class="h4-heading">Employee Report Generation</h4>

  
  <div class="form-row mt-4">

      <div class="col-lg-3 col-sm-6">
        <a href=""  id="pds_report" >Personal Data Sheet</a>
      </div>

      <div class="col-lg-3 col-sm-6">
      <a href='../includes/export_doc.php?cer_emp=<?php echo $emp_id?>'>Certificate of Employment</a>
      </div>

    
      </div>

      <div class="form-row mt-2">

      <div class="col-lg-3 col-sm-6">
      <a href="" id="service_record" >Service Record</a>
      </div>

      <div class="col-lg-3 col-sm-6">
    <a href='../includes/export_doc.php?cer_leave_credits=<?php echo $emp_id?>'>Certificate of Leave Credits</a>
      </div>

    </div>

    <div class="form-row mt-2">

      <div class="col-lg-3 col-sm-6">
      <a href="" id="leave_ledger_report" >Leave Ledger</a>
      </div>


    </div>

    </div>
  
    <script>
       $('#service_record').on('click', function() {
      var emp_id = $('.emp_id').val();
      var url = '../includes/export_excel.php?service_record=' ;
     var newHref = url.concat(emp_id);
     console.log(emp_id);
    $('#service_record').attr('href', newHref);
    });

    $('#leave_ledger_report').on('click', function() {
      var emp_id = $('.emp_id').val();
      var url = '../includes/export_excel.php?leave_ledger_report=' ;
     var newHref = url.concat(emp_id);
     console.log(emp_id);
    $('#leave_ledger_report').attr('href', newHref);
    });

    $('#pds_report').on('click', function() {
      var emp_id = $('.emp_id').val();
      var url = '../includes/export_excel.php?pds_report=' ;
     var newHref = url.concat(emp_id);
     console.log(emp_id);
    $('#pds_report').attr('href', newHref);
    });

    </script>