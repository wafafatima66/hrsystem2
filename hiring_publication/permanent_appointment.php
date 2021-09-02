<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<?php


?>
<style>
    .switch-tab {
        display: none;
    }
</style>

<div class="form-row mt-2 mb-4">
    <div class="col-lg-12 col-sm-12">
        <h4 class="h4-heading">ITEM MANAGEMENT - PERMANENT </h4>
    </div>
</div>


<h4 class="background-title-1 p-3">Item profile (Appointment)</h4>

<div class="" style="border:solid 1px #505A43 ; padding:20px;">

    <div class="form-inline mt-3 p-3" style="background-color: #9EB87C;">

        <input type="radio" name="job_type" value="Original" class=" m-2 " checked>
        <label for="">Original</label>


        <input type="radio" name="job_type" value="Promotion" class=" m-2 ">
        <label for="">Promotion</label>

        <input type="radio" name="job_type" value="Re-appoinment" class=" m-2 ">
        <label for="">Re-appoinment</label>

        <input type="radio" name="job_type" value="Others" class=" m-2 ">
        <label for="">Others</label>

    </div>


    <div class="container">


        <div class="Original switch-tab" style="display: block;">
           <?php include 'original.php' ?>
        </div>

        <div class="Promotion switch-tab">
        <?php include 'promotion.php' ?>
        </div>

        <div class="Re-appoinment switch-tab">
        <?php include 're-appointment.php' ?>
        </div>

        <div class="Others switch-tab">
        <?php include 'others.php' ?>
        </div>


    </div>

</div>



</div>

</div>


</div>



</div>

<?php ?>

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