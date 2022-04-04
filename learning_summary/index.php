<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<!-- summary of training -->
<div class="container">
<div class="row">
      <div class=" col-lg-12 col-sm-12 mt-2">
            <h4 class="h4-heading">SUMMARY OF TRAININGS</h4>
      </div>
      <div class="col-lg-5 col-sm-12 mt-3">
            <div class="input-group">
                  <input type="search" class="form-control" id="search_input_summary">
                  <button type="button" class="home-page-search-btn" id="search_button_summary">
                        <i class="fa fa-search"></i>
                  </button>
            </div>
      </div>

</div>

<?php echo '<div id="summary"> </div>'; ?>
</div>
<!-- end of summary training -->

<script>

    // for summary table
    function loadData(page_no_summary,search_summary) {
            $.ajax({
                  url: "../learning_summary/summary_pagination.php",
                  type: "POST",
                  cache: false,
                  data: {
                        page_no_summary: page_no_summary,
                        search_summary: search_summary
                  },
                  success: function (response) {
                        $("#summary").html(response);
                  }
            });
      }
      loadData();

      // Pagination code
      $(document).on("click", ".page-item", function () {
            var page_no_summary = $(this).attr("id");
            console.log(page_no_summary)
            var search_summary = $('#search_input_summary').val();
            loadData(page_no_summary,search_summary);
      });
      $(document).on("click", "#search_button_summary", function () {
            var page_no_summary = 1;
            var search_summary = $('#search_input_summary').val();
            loadData(page_no_summary,search_summary);
      });

</script>