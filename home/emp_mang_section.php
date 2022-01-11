<div class="row mt-5">


      <div class="col-lg-4 col-sm-6">
            <div class="input-group ">
                  <input type="search" class="form-control " name="search" id="search_employee">
                  <button type="button" class="home-page-search-btn" id="search_employee_btn">
                        <i class="fa fa-search"></i>
                  </button>
            </div>
      </div>

      <div class="col-lg-1 col-sm-6">
            <button type="button" class=" btn button-1" data-toggle="modal" data-target="#addemployee">
                  Add
            </button>
      </div>

      <div class="col-lg-3 col-sm-6">
            <input type="date" class="form-control text-input" id="date_appointed_search">
            <small class="text-muted">Date of appointment</small>
      </div>

      <div class="col-lg-3 col-sm-6">
            <input type="date" class="form-control text-input" id="date_modified_search">
            <small class="text-muted">Date modified</small>
      </div>

      <div class="col-lg-1 col-sm-6">
            <div class="d-flex justify-content-end">
                  <select name="limit_dropdown" id="limit_dropdown" class="form-control text-input">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                  </select>
            </div>
      </div>

</div>


<?php

echo '<div id="table-data"> </div>';

?>


<?php include "../add_emp/add_emp_modal.php"; ?>


<script type="text/javascript">
      $(document).ready(function() {

            function loadData(page, limit, search_employee, date_appointed_search, date_modified_search) {
                  $.ajax({
                        url: "../home/pagination.php",
                        type: "POST",
                        cache: false,
                        data: {
                              page_no: page,
                              limit: limit,
                              search_employee: search_employee,
                              date_appointed_search: date_appointed_search,
                              date_modified_search,
                              date_modified_search
                        },
                        success: function(response) {
                              $("#table-data").html(response);
                        }
                  });
            }

            loadData();

            $(document).on("click", ".page-item", function() {
                  var page = $(this).attr("id");
                  var search_employee = $('#search_employee').val();
                  var limit = $('#limit_dropdown').val();
                  var date_appointed_search = $('#date_appointed_search').val();
                  var date_modified_search = $('#date_modified_search').val();
                  loadData(page, limit, search_employee, date_appointed_search, date_modified_search);
            });

            $('#limit_dropdown').on('change', function() {
                  var page = 1;
                  var search_employee = $('#search_employee').val();
                  var limit = $('#limit_dropdown').val();
                  var date_appointed_search = $('#date_appointed_search').val();
                  var date_modified_search = $('#date_modified_search').val();
                  loadData(page, limit, search_employee, date_appointed_search, date_modified_search);
            });

            $('#search_employee_btn').on('click', function() {
                  var page = 1;
                  var search_employee = $('#search_employee').val();
                  var limit = $('#limit_dropdown').val();
                  var date_appointed_search = $('#date_appointed_search').val();
                  var date_modified_search = $('#date_modified_search').val();
                  loadData(page, limit, search_employee, date_appointed_search, date_modified_search);
            });

            $('#date_appointed_search').on('change', function() {
                  var page = 1;
                  var search_employee = $('#search_employee').val();
                  var limit = $('#limit_dropdown').val();
                  var date_appointed_search = $('#date_appointed_search').val();
                  var date_modified_search = $('#date_modified_search').val();
                  loadData(page, limit, search_employee, date_appointed_search, date_modified_search);
            });

            $('#date_modified_search').on('change', function() {
                  var page = 1;
                  var search_employee = $('#search_employee').val();
                  var limit = $('#limit_dropdown').val();
                  var date_appointed_search = $('#date_appointed_search').val();
                  var date_modified_search = $('#date_modified_search').val();
                  loadData(page, limit, search_employee, date_appointed_search, date_modified_search);
            });


      });
</script>