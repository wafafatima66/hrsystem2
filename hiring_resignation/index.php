<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; 

if(isset($_GET['delete'])){
  if(isset($_GET['delete']) =='success'){
      echo  '<script>toastr.success("Termination deleted successfully")</script>';
  }else if(isset($_GET['delete']) =='fail'){
      echo  '<script>toastr.error("Termination not deleted. Try again !")</script>';
  }
}


?>


<div class="container">
<div class="row mt-5 ">

  <div class=" col-lg-12 col-sm-12 mb-3">
    <h4 class="h4-heading">TERMINATION MANAGEMENT  </h4>
  </div>

</div>

<div class="row">
<div class="col-lg-12 col-sm-6">
            <div class="d-flex justify-content-end">
                  <select name="limit_dropdown" id="limit_dropdown" class="form-control text-input" style="width: 10%;">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                  </select>
            </div>
      </div>
</div>

<!-- pagination data -->
<?php echo '<div id="table-data"> </div>'; ?>

<!-- edit  config -->
<?php 
include "edit_termination_config.php"; 
 ?>

<!-- delete modal -->
<?php include "../includes/delete_modal.php";  ?>

<!-- edit termination modal -->
<div class="modal fade view_termination " id="view_termination" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

      <h3 class=" background-title-1 p-3">View Termination</h3>

      <div class="modal-body" id="view_termination_details">

      </div>
    </div>
  </div>
</div>


</div>
<script>
      $(document).ready(function() {
function loadData(page, limit ) {
  $.ajax({
    url: "termination_pagination.php",
    type: "POST",
    cache: false,
    data: {
      page_no: page,
      limit: limit
    },
    success: function(response) {
      $("#table-data").html(response);
    }
  });
}

loadData();

    $(document).on("click", ".page-item", function() {
      var page = $(this).attr("id");
      var limit = $('#limit_dropdown').val();
      loadData(page, limit );
    });

    $('#limit_dropdown').on('change', function() {
                  var page = 1;
                  var limit = $('#limit_dropdown').val();
                  loadData(page, limit);
            });

    
 // delete 
 $(document).on('click', '.delete_modal', function() {
     var id = $(this).data('id');
     var url = '../includes/delete.php?' ; 
     var newHref = url.concat(id);
    $('#delete_confirm_btn').attr('href', newHref);
});

      });
</script>

