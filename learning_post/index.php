<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

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

</script>