<style>
  .switch-tab {

    display: none;

  }

  input[type='radio']:checked:after {
    width: 15px;
    height: 15px;
    border-radius: 15px;
    top: -3px;
    left: -3px;
    position: relative;
    background-color: #ffa500;
    content: '';
    display: inline-block;
    visibility: visible;
    border: 2px solid white;
  }
</style>


<h4 class="background-title-1 p-2 mt-3">LEAVE LEDGER</h4>

<div class="form-inline p-3 mt-2" style="background-color: #9EB87C;">

  <input type="radio" name="leave" value="Summary" class=" m-2 " checked>
  <label for="">Summary of leaves</label>


  <input type="radio" name="leave" value="Credits" class=" m-2 ">
  <label for="">Leave Credits</label>


</div>

<div class="container container-box">

  <?php include "../emp_mang/leave/summary.php"; ?>

  <?php include "../emp_mang/leave/credits.php"; ?>

</div>




<?php  ?>

<script>
  // ajax call for leave credits 
  function loadCredits(date, emp_id) {
    var date = $("#input-date").val();
    var emp_id = $("#emp_id_for_credits").val();
    $.ajax({
      url: "../emp_mang/leave/credits_ajax.php",
      type: "POST",
      cache: false,
      data: {
        date: date,
        emp_id: emp_id,
      },
      success: function(response) {
        $("#credits_section").html(response);
      }
    });
  }

  loadCredits();

  $(document).on("click", "#date-submit", function() {
    var date = $("#input-date").val();
    var emp_id = $("#emp_id_for_credits").val();
    loadCredits(date,emp_id)
  });

  $(document).on("click", "#update_year", function() {
    var vl_pts = $("#vl_pts").val();
    var sl_pts = $("#sl_pts").val();
    var leave_emp_id = $("#leave_emp_id").val();
    var year = $("#input-date").val();
    $.ajax({
      type: "POST",
      url: "../emp_mang/leave/year_credits_config.php",
      data: {
        vl_pts: vl_pts,
        sl_pts: sl_pts,
        leave_emp_id: leave_emp_id,
        year : year
      },
      success: function(data) {
        var date = $("#input-date").val();
        var emp_id = $("#emp_id_for_credits").val();
        loadCredits(date,emp_id);
      }
    });
  });

  $("#forward_balance").click(function() {
    var leave_emp_id = $("#leave_emp_id").val();
    var year = $("#input-date").val();
    let today = new Date().toLocaleDateString()
// console.log(today)
    $.ajax({
      type: "POST",
      url: "../emp_mang/leave/forward_balance.php",
      data: {
        leave_emp_id: leave_emp_id,
        year : year 
      },
      success: function(data) {
        var date = $("#input-date").val();
        $("#input-date").val(parseInt(date) + 1);
        var emp_id = $("#emp_id_for_credits").val();
        loadCredits(date,emp_id);
      }
    });

  });

  // ajax call for summary leave 
  function loadSummary(date, emp_id) {
    var date = $("#summary-date").val();
    var emp_id = $("#emp_id_for_summary").val();
    $.ajax({
      url: "../emp_mang/leave/summary_ajax.php",
      type: "POST",
      cache: false,
      data: {
        date: date,
        emp_id: emp_id,
      },
      success: function(response) {
        $("#summary_section").html(response);
      }
    });
  }

  loadSummary();

  $(document).on("click", "#date-summary", function() {
    var date = $("#summary-date").val();
    var emp_id = $("#emp_id_for_summary").val();
    loadSummary(date,emp_id)
  });

  $(document).ready(function() {
    $('input[type="radio"]').click(function() {
      var inputValue = $(this).attr("value");
      var targetBox = $("." + inputValue);
      $(".switch-tab").not(targetBox).hide();
      $(targetBox).show();
    });
  });


  
</script>