<?php require '../includes/conn.php'; ?>

<style>
  .switch-tab {

    display: none;
    margin-top: 20px;
  }
</style>

<!--button to add employye-->
<!-- Modal -->
<div class="modal fade addemployee " id="addemployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">


      <h3 class=" background-title-1 p-3">Add Employee</h3>

      <div class="modal-body">



        <div class="form-inline mt-3 p-3" style="background-color: #9EB87C;">

          <input type="radio" name="job_type" value="Permanent" class=" m-2 " checked>
          <label for="">Permanent/Regular</label>


          <input type="radio" name="job_type" value="Contractual" class=" m-2 ">
          <label for="">Job Order/Contractual</label>


        </div>


        <div class="container">

          <?php include "permanent.php"; ?>

          <?php include "contractual.php"; ?>

        </div>

      </div>



    </div>

  </div>
</div>

<script>
  $(document).ready(function() {
    $('input[type="radio"]').click(function() {
      var inputValue = $(this).attr("value");
      var targetBox = $("." + inputValue);
      $(".switch-tab").not(targetBox).hide();
      $(targetBox).show();
    });
  });

  function checkAvailability1() {
    // $("#loaderIcon").show();

    var emp_id = 'emp_id=' + $("#emp_id_1").val();

    console.log(emp_id);

    jQuery.ajax({
      url: "../add_emp/check.php",
      data: emp_id,
      type: "POST",
      success: function(data) {
        $("#user-availability-status_1").html(data);
        // $("#loaderIcon").hide();
      },
      error: function() {}
    });
  }

  function checkAvailability2() {
    // $("#loaderIcon").show();

    var emp_id = 'emp_id=' + $("#emp_id_2").val();

    console.log(emp_id);

    jQuery.ajax({
      url: "../add_emp/check.php",
      data: emp_id,
      type: "POST",
      success: function(data) {
        $("#user-availability-status_2").html(data);
        // $("#loaderIcon").hide();
      },
      error: function() {}
    });
  }
</script>