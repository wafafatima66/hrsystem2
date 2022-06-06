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

      <div class="col-lg-2 col-sm-6 mt-3">
                  <select id="dept_dropdown" class="form-control text-input">
                        <?php
                        $query = "SELECT DISTINCT division FROM item where division != '' ";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                              echo "<option value=''> Department </option> ";
                              while ($mydata = mysqli_fetch_assoc($result)) {
                                    echo "<option value= '" . $mydata['division'] . "'>" . $mydata['division'] . "</option>";
                              }
                        } else {
                              echo "<option value=''> Department </option>";
                        }
                        ?>
                  </select>
            </div>

            <div class="col-lg-2 col-sm-6 mt-3">
                  <select id="office_dropdown" class="form-control text-input">
                        <?php
                        $query = "SELECT DISTINCT area_wrk_assign FROM item where area_wrk_assign != ''";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                              echo "<option value=''> Office </option> ";
                              while ($mydata = mysqli_fetch_assoc($result)) {
                                    echo "<option value= '" . $mydata['area_wrk_assign'] . "'>" . $mydata['area_wrk_assign'] . "</option>";
                              }
                        } else {
                              echo "<option value=''>  Office</option>";
                        }
                        ?>
                  </select>
            </div>

            <div class="col-lg-1 col-sm-6 mt-3">
                  <select id="limit_dropdown" class="form-control text-input">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                  </select>
            </div>


</div>

<?php echo '<div id="summary"> </div>'; ?>
</div>
<!-- end of summary training -->

<script>

    // for summary table
    function loadData(page_no_summary,search_summary ,limit, dept, office,) {
            $.ajax({
                  url: "../learning_summary/summary_pagination.php",
                  type: "POST",
                  cache: false,
                  data: {
                        page_no_summary: page_no_summary,
                        search_summary: search_summary,
                        limit: limit,
                        dept: dept,
                        office: office
                  },
                  success: function (response) {
                        $("#summary").html(response);
                  }
            });
      }

      function loadDataVariables() {
                  var limit = $('#limit_dropdown').val();
                  var dept = $('#dept_dropdown').val();
                  var office = $('#office_dropdown').val();
                  var search_summary = $('#search_input_summary').val();
                  return [search_summary ,limit, dept, office ];
            }

      loadData();

      // Pagination code
      $(document).on("click", ".page-item", function () {
            var page_no_summary = $(this).attr("id");
            var [search_summary ,limit, dept, office ] = loadDataVariables();
            // console.log(page_no_summary)
            // var search_summary = $('#search_input_summary').val();
            loadData(page_no_summary,search_summary,limit, dept, office);
      });
      $(document).on("click", "#search_button_summary", function () {
            var page_no_summary = 1;
            // var search_summary = $('#search_input_summary').val();
            var [search_summary ,limit, dept, office ] = loadDataVariables();
            loadData(page_no_summary,search_summary,limit, dept, office);
      });

      $('#limit_dropdown').on('change', function() {
            var page_no_summary = 1;
            var [search_summary ,limit, dept, office ] = loadDataVariables();
                   loadData(page_no_summary,search_summary,limit, dept, office);
            });


            $('#dept_dropdown').on('change', function() {
                  var page_no_summary = 1;
                  var [search_summary ,limit, dept, office ] = loadDataVariables();
                   loadData(page_no_summary,search_summary,limit, dept, office);
            });

            $('#office_dropdown').on('change', function() {
                  var page_no_summary = 1;
                  var [search_summary ,limit, dept, office ] = loadDataVariables();
                   loadData(page_no_summary,search_summary,limit, dept, office);
            });

            // end of pagination

      $(".department-select").change(function() {
            var department = $(".department-select").val();
            console.log(department);
            jQuery.ajax({
                  url: "get_office.php",
                  data: {
                        department: department
                  },
                  type: "POST",
                  success: function(data) {
                        $(".office-select").html(data);
                  },
                  error: function() {}
            });
      });

</script>