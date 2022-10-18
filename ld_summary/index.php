<?php

include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<div class="container">
      <div class="row">
            <div class=" col-lg-12 col-sm-12 mt-2">
                  <h4 class="h4-heading">LEARNING AND DEVELOPMENT SUMMARY</h4>
            </div>

            <div class="ml-auto col-lg-2 col-sm-6">
                    <input type="month" class="form-control text-input" id="date_to_print">

                </div>

                <div class="col-lg-2 col-sm-6">
                    <select id="limit_dropdown" class="form-control text-input">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                    </select>
                </div>


      </div>


<?php echo '<div id="pagination"> </div>'; ?>


<div class="container-box emp_report_gen_box">

<h4 class="h4-heading">L & D Summary Reports</h4>

<div class="form-row mt-4">

  <div class="col-lg-12 col-sm-12 mt-2">
    <a href="#">MONTHLY TRAINING REPORT ON ATTENDANCE TO L & D</a>
  </div>

  <div class="col-lg-12 col-sm-12 mt-2">
    <a href="#" >MONTHLY LEARNING DEVELOPMENT DATABASE</a>
  </div>


</div>

</div>

</div>

<script>

    // for post table
    function loadData(page_no,limit) {
            $.ajax({
                  url: "../ld_summary/pagination.php",
                  type: "POST",
                  cache: false,
                  data: {
                        page_no: page_no,
                        limit:limit
                  },
                  success: function (response) {
                        $("#pagination").html(response);
                  }
            });
      }
      loadData();

      // Pagination code
      $(document).on("click", ".page-item", function () {
            var page_no = $(this).attr("id");
            var limit = $('#limit_dropdown').val();
            loadData(page_no,limit);
      });

      $('#limit_dropdown').on('change', function() {
            var page_no = 1;
            var limit = $('#limit_dropdown').val();
            loadData(page_no,limit);
            });
  
      

</script>

