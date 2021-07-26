<style>
  .switch-tab {

    display: none;
    
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


<div class="col-lg-12 text-right mt-4 ">

  <button class="btn button-1 " type="submit" name="submit"><i class="fa fa-print"></i></button>


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
</script>