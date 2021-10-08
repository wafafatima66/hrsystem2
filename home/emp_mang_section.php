<div class="row mt-5">

      <div class="col-lg-6 col-sm-6">
            <!-- <form class="form-inline" method="post" action=""> -->
            <div class="input-group ">

                  <input type="search" class="form-control" name="search" id="search_employee">
                  <button type="button" class="home-page-search-btn" id="search_employee_btn">
                        <i class="fa fa-search"></i>
                  </button>

                  <!-- <button type="button" class="ml-3 btn button-1" data-toggle="modal" data-target="#addemployee">Add</button> -->


            </div>
            <!-- </form> -->
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

echo '<div id="table-data"> </div>';

?>


<?php include "../add_emp/add_emp_modal.php"; ?>


<script type="text/javascript">
      $(document).ready(function() {

            function loadData(page, limit, search_employee) {
                  $.ajax({
                        url: "../home/pagination.php",
                        type: "POST",
                        cache: false,
                        data: {
                              page_no: page,
                              limit: limit,
                              search_employee: search_employee
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
                  loadData(page, limit, search_employee);
            });

            $('#limit_dropdown').on('change', function() {
                  var page = 1;
                  var search_employee = $('#search_employee').val();
                  var limit = $('#limit_dropdown').val();
                  loadData(page, limit, search_employee);
            });

            $('#search_employee_btn').on('click', function() {
                  var page = 1;
                  var search_employee = $('#search_employee').val();
                  var limit = $('#limit_dropdown').val();
                  loadData(page, limit, search_employee);
            });


      });
</script>