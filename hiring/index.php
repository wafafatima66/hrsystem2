<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<?php 
// if(isset($_GET['update-item'])){
//     if(isset($_GET['update-item']) =='success'){
//         echo  '<script>toastr.success("Item updated successfully")</script>';
//     }else if(isset($_GET['update-item']) =='fail'){
//         echo  '<script>toastr.error("Item not updated. Try again !")</script>';
//     }
// }
?>

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

        $('.add_com_1').click(function() {
            if (x < maxField) {
                x++; 
                $('.com_wrapper_1').append('<input type="text" class="form-control text-input mt-1 mb-1" name="add_com_1[]">'); 
            }
        });

        $('.add_com_2').click(function() {
            if (x < maxField) {
                x++; 
                $('.com_wrapper_2').append('<input type="text" class="form-control text-input mt-1 mb-1" name="add_com_2[]">'); 
            }
        });

        $('.add_com_3').click(function() {
            if (x < maxField) {
                x++; 
                $('.com_wrapper_3').append('<input type="text" class="form-control text-input mt-1 mb-1" name="add_com_3[]">'); 
            }
        });

        $('.add_com_4').click(function() {
            if (x < maxField) {
                x++; 
                $('.com_wrapper_4').append('<input type="text" class="form-control text-input mt-1 mb-1" name="add_com_4[]">'); 
            }
        });


    });
</script>