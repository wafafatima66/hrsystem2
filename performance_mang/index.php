<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>
<div class="container">
<div class="row mt-5 ">

  <div class=" col-lg-12 col-sm-12 mt-2">
    <h4 class="h4-heading">PERFORMANCE MANAGEMENT</h4>
  </div>

  <div class="col-lg-6 col-sm-6">

    <div class="input-group">
      <input type="search" class="form-control" id="search_input">
      <button type="button" class="home-page-search-btn" id="search_button">
        <i class="fa fa-search"></i>
      </button>
    </div>

  </div>

  <div class="col-lg-6 col-sm-6">
    <div class="d-flex justify-content-end">
      <select name="limit_dropdown" id="limit_dropdown" class="form-control text-input" style="width: 20%;">
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
      </select>
    </div>

  </div>

</div>


<?php
    echo '<div id="table-data"> </div>' ;
    // include 'pagination.php';
    ?>

</div>
<script type="text/javascript">
  $(document).ready(function () {
    function loadData(page, limit,search) {
      $.ajax({
        url: "pagination.php",
        type: "POST",
        cache: false,
        data: {
          page_no: page,
          limit: limit,
          search:search
        },
        success: function (response) {
          $("#table-data").html(response);
        }
      });
    }
    loadData();

    // Pagination code
    $(document).on("click", ".page-item", function () {
      var pageId = $(this).attr("id");
      var limit = $('#limit_dropdown').val();
      var search = $('#search_input').val();
      loadData(pageId, limit,search);
    });

    $('#limit_dropdown').on('change', function () {
      var pageId = 1;
      var limit = $('#limit_dropdown').val();
      var search = $('#search_input').val();
      loadData(pageId, limit,search);
    })

    $(document).on("click", "#search_button", function () {
      var pageId = 1;
      var limit = $('#limit_dropdown').val();
      var search = $('#search_input').val();
      loadData(pageId, limit, search);
    });

  });
</script>