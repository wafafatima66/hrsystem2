<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>


<!-- delete message -->
<?php 
if(isset($_GET['publication_delete'])){
    if(isset($_GET['publication_delete']) =='success'){
        echo  '<script>toastr.success("Publication deleted successfully")</script>';
    }else if(isset($_GET['publication_delete']) =='fail'){
        echo  '<script>toastr.error("Publication not deleted. Try again !")</script>';
    }
}

if(isset($_GET['export'])){
    if(isset($_GET['export']) =='fail'){
        echo  '<script>toastr.success("Publication date not specified ! ")</script>';
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
