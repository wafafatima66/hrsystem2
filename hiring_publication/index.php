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
        echo  '<script>toastr.error("Publication date not specified ! ")</script>';
    }
}



    if(isset($_GET['appointment_fail']) ){
        echo  '<script>toastr.error("No item number found ! ")</script>';
    }
   else if(isset($_GET['appointment_no']) ){
        echo  '<script>toastr.error("No Employee appointmented for this item! ")</script>';
    }
    


?>


<style>
    .switch-tab {
    display: none;
    margin-top: 20px;
}
</style>

<div class="">

  <?php include "permanent.php"; ?>

  <?php 
  
//   include "contractual.php"; 
  
  ?>


</div>
