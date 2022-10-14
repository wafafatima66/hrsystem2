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

<!-- delete message -->
<?php 
if(isset($_GET['item_delete'])){
    if(isset($_GET['item_delete']) =='success'){
        echo  '<script>toastr.success("Item deleted successfully")</script>';
    }else if(isset($_GET['item_delete']) =='fail'){
        echo  '<script>toastr.error("Item not deleted. Try again !")</script>';
    }
}
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

        $('.add_time').click(function() {
            if (x < maxField) {
                x++; 
                $('.time_wrapper').append('<div class="form-row"><div class="col-lg-3 col-sm-6 "> <input type="text" class="form-control text-input mt-1 mb-1" name="time_allocation[]" placeholder="Time allocation"> </div> <div class="col-lg-8 col-sm-8 "> <textarea class="form-control text-input mt-1 mb-1" name="time_allocation_function[]" placeholder="Functions" rows="0"></textarea> </div> <a class="ml-4 btn button-1 remove_time_button mt-1" style="height: fit-content;">-</a> </div>'); 
            }
        });

        $('.time_wrapper').on('click', '.remove_time_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });

    });
</script>