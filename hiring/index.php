<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<style>
    .switch-tab {
    display: none;
    margin-top: 20px;
}
</style>

<div class="container ">

  <?php include "permanent.php"; ?>

  <?php include "contractual.php"; ?>


</div>

<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 10; 
        var x = 1;

        $('.add_education').click(function() {
            if (x < maxField) {
                x++; 
                $('.education_wrapper').append('<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_education[]">'); 
            }
        });

        $('.add_work_exp').click(function() {
            if (x < maxField) {
                x++; 
                $('.work_exp_wrapper').append('<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_work_exp[]">'); 
            }
        });

        $('.add_training').click(function() {
            if (x < maxField) {
                x++; 
                $('.traning_wrapper').append('<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_training[]">'); 
            }
        });

        $('.add_eligibility').click(function() {
            if (x < maxField) {
                x++; 
                $('.eligibility_wrapper').append('<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_eligibility[]">'); 
            }
        });


    });
</script>