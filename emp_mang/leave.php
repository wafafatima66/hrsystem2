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


<div class="form-row justify-content-between mt-4 ">

  <div class="form-inline">
    <input type="number" min="1900" max="2099" step="1" value="<?php echo ((!empty($_COOKIE["inputDate"])) ? $_COOKIE['inputDate'] : date("Y") );
    ?>" class="form-control text-input" id="input-date"/>
    <button id="date-submit" class="btn button-1">Search</button>
  </div>

  <div>
    <?php
  
    // $mon = date("n");
    // if ($mon == 1 || $mon == 12) {
    //   $display = 'inline-block';
    // } else {
    //   $display = 'none';
    // }
    ?>

    <button class="btn button-1" id="forward_balance" >Forward Balance</button>
    <button class="btn button-1" id="refresh">Refresh</button>
  </div>
  <!-- <button class="btn button-1 " ><i class="fa fa-print"></i></button> -->



</div>

<?php  ?>

<script>

  var date = $("#input-date").val();
  document.cookie = `inputDate=${date}`;

$("#date-submit").click(function() {
  window.location.reload();
  var date = $("#input-date").val();
  document.cookie = `inputDate=${date}`;
  // console.log()
});

  $('#refresh').click(function() {
    location.reload();
  });

  $(document).ready(function() {
    $('input[type="radio"]').click(function() {
      var inputValue = $(this).attr("value");
      var targetBox = $("." + inputValue);
      $(".switch-tab").not(targetBox).hide();
      $(targetBox).show();
    });
  });

  $("#update_year").click(function() {
    var vl_pts = $("#vl_pts").val();
    var sl_pts = $("#sl_pts").val();
    var leave_emp_id = $("#leave_emp_id").val();

    $.ajax({
      type: "POST",
      url: "../emp_mang/leave/year_credits_config.php",
      data: {
        vl_pts: vl_pts,
        sl_pts: sl_pts,
        leave_emp_id: leave_emp_id
      },
      success: function(data) {
        //  alert("sucess");
        // toastr.success("Credits Year updated ! ")
        if (data == 'success') {
          toastr.success("Credits Year updated !")
        } else if (data == 'error') {
          toastr.error("Credits Year Not updated !. Try again !")
        }
      }
    });

    location.reload();

  });

  $("#forward_balance").click(function() {
    var leave_emp_id = $("#leave_emp_id").val();
    $.ajax({
      type: "POST",
      url: "../emp_mang/leave/forward_balance.php",
      data: {
        leave_emp_id: leave_emp_id
      },
      success: function(data) {
        if (data == 'success') {
          toastr.success("Balance Forwarded ")
        } else if (data == 'error') {
          toastr.error("Balance Not Forwarded. Try again !")
        }
      },
      error: function(request, status, error) {
        toastr.error("Balance Not Forwarded. Try again !")
      }
    });

  // location.reload();

  });
</script>