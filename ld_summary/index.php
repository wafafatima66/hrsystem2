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
                        <a href="#" id="monthly_training_report_attendance_ld">MONTHLY TRAINING REPORT ON ATTENDANCE TO L & D</a>
                  </div>

                  <div class="col-lg-12 col-sm-12 mt-2">
                        <a href="#"  id="monthly_learning_development_database">MONTHLY LEARNING DEVELOPMENT DATABASE</a>
                  </div>


            </div>

      </div>

</div>

<script>
      // EXCELS
      $('#monthly_training_report_attendance_ld').on('click', function() {
            var date_to_print = $('#date_to_print').val();
            if (date_to_print == '' || date_to_print == null) {
                  toastr.error("Select a Month and a Year")
            } else {
                  var url = '../includes/export_excel.php?monthly_training_report_attendance_ld&';
                  var newHref = url.concat('date_to_print=' + date_to_print);
                  $('#monthly_training_report_attendance_ld').attr('href', newHref);
            }

      });

      $('#monthly_learning_development_database').on('click', function() {
            var date_to_print = $('#date_to_print').val();
            if (date_to_print == '' || date_to_print == null) {
                  toastr.error("Select a Month and a Year")
            } else {
                  var url = '../includes/export_excel.php?monthly_learning_development_database&';
                  var newHref = url.concat('date_to_print=' + date_to_print);
                  $('#monthly_learning_development_database').attr('href', newHref);
            }

      });

      // for post table
      function loadData(page_no, limit , date) {
            $.ajax({
                  url: "../ld_summary/pagination.php",
                  type: "POST",
                  cache: false,
                  data: {
                        page_no: page_no,
                        limit: limit,
                        date:date
                  },
                  success: function(response) {
                        $("#pagination").html(response);
                  }
            });
      }
      loadData();

      // Pagination code
      $(document).on("click", ".page-item", function() {
            var page_no = $(this).attr("id");
            var limit = $('#limit_dropdown').val();
            var date = $('#date_to_print').val();
            loadData(page_no, limit , date);
      });

      $('#limit_dropdown').on('change', function() {
            var page_no = 1;
            var limit = $('#limit_dropdown').val();
            var date = $('#date_to_print').val();
            loadData(page_no, limit , date);
      });

      $('#date_to_print').on('change', function() {
            var page_no = 1;
            var limit = $('#limit_dropdown').val();
            var date = $('#date_to_print').val();
            loadData(page_no, limit , date);
      });

</script>