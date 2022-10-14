<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; 

?>

<?php
if (isset($_GET['delete'])) {
      echo  '<script>toastr.success("Post Training Deleted Successfully !")</script>';
} else if (isset($_GET['notdelete'])) {
      echo  '<script>toastr.error("Post Training not Deleted. Try again !")</script>';
}
?>

<!-- post of training -->
<div class="container">
<div class="row">
      <div class=" col-lg-12 col-sm-12 mt-2">
            <h4 class="h4-heading">POSTED TRAININGS</h4>
      </div>
      <div class="col-lg-5 col-sm-12 mt-3">
            <div class="input-group">
                  <input type="search" class="form-control" id="search_input_post">
                  <button type="button" class="home-page-search-btn" id="search_button_post">
                        <i class="fa fa-search"></i>
                  </button>
            </div>
      </div>

</div>

<?php echo '<div id="posted_trainings"> </div>'; ?>
</div>
<!-- end of post training -->

<?php include "../includes/delete_modal.php";  ?>

<script>

    // for post table
    function loadData(page_no_post,search_post) {
            $.ajax({
                  url: "../learning_post/pagination.php",
                  type: "POST",
                  cache: false,
                  data: {
                        page_no_post: page_no_post,
                        search_post: search_post
                  },
                  success: function (response) {
                        $("#posted_trainings").html(response);
                  }
            });
      }
      loadData();

      // Pagination code
      $(document).on("click", ".page-item", function () {
            var page_no_post = $(this).attr("id");
            console.log(page_no_post)
            var search_post = $('#search_input_post').val();
            loadData(page_no_post,search_post);
      });
      $(document).on("click", "#search_button_post", function () {
            var page_no_post = 1;
            var search_post = $('#search_input_post').val();
            loadData(page_no_post,search_post);
      });

      $(document).on('click', '.delete_modal', function() {
	var id = $(this).data('id');
	var url = '../includes/delete.php?';
	var newHref = url.concat(id);
	$('#delete_confirm_btn').attr('href', newHref);
});
      

</script>