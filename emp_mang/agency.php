<?php 


 $query = "SELECT * FROM employee_agency where emp_id = '$emp_id'  ";
 $result = mysqli_query($conn, $query);
 if (mysqli_num_rows($result) > 0) {
     while ($mydata = mysqli_fetch_assoc($result)) {
 

?>

<div class=" container-box">

  <h4 class="h4-heading">Agency Profile</h4>

  <form method="post" action="" enctype="multipart/form-data">



    <div class="form-row mt-5">

      <div class="col-lg-3 col-sm-6">
        <label for="">Employee Id</label>
        <input type="text" name="emp_id" class="form-control text-input"  value="<?php echo $mydata['emp_id']?>"/>
      </div>

      <div class="col-lg-3 col-sm-6">
        <label for="">Item No</label>
        <input type="text" name="item_no" class="form-control text-input" value="<?php echo $mydata['item_no']?>" />
      </div>

      <div class="col-lg-3 col-sm-6">
        <label for="">Position</label>
        <input type="text" name="position" class="form-control text-input" value="<?php echo $mydata['position']?>" />
      </div>

      <div class="col-lg-3 col-sm-6">
        <label for="">Salary Grade</label>
        <input type="text" name="salary_grade" class="form-control text-input" value="<?php echo $mydata['salary_grade']?>" />
      </div>

    </div>

    <div class="form-row mt-3">
      <div class="col-lg-3 col-sm-6">
        <label for="">Date of Effectivity</label>
        <input type="date" name="date_of_effectivity" class="form-control text-input" value="<?php echo $mydata['date_of_effectivity']?>"/>
      </div>

      <div class="col-lg-3 col-sm-6">
        <label for="">Department</label>
        <input type="text" name="department" class="form-control text-input" value="<?php echo $mydata['department']?>" />
      </div>

      <div class="col-lg-3 col-sm-6">
        <label for="">Office/unit</label>
        <input type="text" name="office" class="form-control text-input" value="<?php echo $mydata['office']?>"/>
      </div>

    </div>
  


</div>

<div class="col-lg-12 text-right mt-4 ">

  <button class="btn button-1 " type="submit"><i class="fa fa-print"></i></button>
  <!-- <button class="btn button-1 " type="submit" name="submit"><i class="fas fa-check"></i></button> -->

</div>

</form>

<?php  }} ?>