<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<?php
if (isset($_GET['delete'])) {
      echo  '<script>toastr.success("Daily Accomplishment Deleted Successfully !")</script>';
} else if (isset($_GET['notdelete'])) {
      echo  '<script>toastr.error("Daily Accomplishment not Deleted. Try again !")</script>';
}
?>

<div class="container">
  <div class="row mt-5 ">

    <div class=" col-lg-12 col-sm-12 mt-2">
      <h4 class="h4-heading">PERFORMANCE MANAGEMENT</h4>
    </div>

    <div class="col-lg-4 col-sm-6">

      <div class="input-group">
        <input type="search" class="form-control" id="search_input">
        <button type="button" class="home-page-search-btn" id="search_button">
          <i class="fa fa-search"></i>
        </button>
      </div>

    </div>

    <div class="col-lg-2 col-sm-6">
      <select id="dept_dropdown" class="form-control text-input department-select">
       <option value='all' selected >All Division</option>
        <?php
        $query = "select * from (SELECT DISTINCT department_name FROM department union select division from item ) as tablec where tablec.department_name != ''";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
          echo "<option value='' disabled  hidden> Select Division </option> ";
         
          while ($mydata = mysqli_fetch_assoc($result)) {
            echo "<option value= '" . $mydata['department_name'] . "'>" . $mydata['department_name'] . "</option>";
          }
        } else {
          echo "<option value='' disabled  hidden> Select Division </option>";
        }
        ?>
      </select>
    </div>

    <div class="col-lg-2 col-sm-6">
      <select name="office_name" class="form-control text-input office-select" id="office_dropdown">
        <option value="all">All Office</option>
      </select>
    </div>

    <div class="col-lg-2 col-sm-6">
      <select class="form-control text-input " id="rating_dropdown">
        <option value="" disabled selected hidden>Rating Period</option>
        <option value="1">Jan-Jun</option>
        <option value="2">Jul-Dec</option>
      </select>
    </div>

    <div class="col-lg-2 col-sm-6">
      <!-- <div class="d-flex justify-content-end"> -->
      <select name="limit_dropdown" id="limit_dropdown" class="form-control text-input">
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
      </select>
      <!-- </div> -->
    </div>

  </div>


  <?php
  echo '<div id="table-data"> </div>';
  // include 'pagination.php';
  ?>

  <div class="container-box emp_report_gen_box">

    <h4 class="h4-heading">PERFORMANCE REPORT GENERATION</h4>

    <div class="form-row mt-4">

      <div class="col-lg-12 col-sm-12 mt-2">
        <a href="">DIVISION PERFORMANCE REVIEW & EVALUATION</a>
      </div>

      <div class="col-lg-12 col-sm-12 mt-2">
        <a href="">CONSOLIDATED PERFORMANCE REVIEW & EVALUATION FORM</a>
      </div>

      <div class="col-lg-12 col-sm-12 mt-2">
        <a href="#" id="performance_summary_list">SUMMARY LIST OF PERFORMANCE RATING</a>
      </div>


    </div>

  </div>

</div>
<script type="text/javascript">
  $(document).ready(function() {

    $('#performance_summary_list').on('click', function() {
      var dept = $('#dept_dropdown').val();
      var office = $('#office_dropdown').val();
      var rating = $('#rating_dropdown').val();
      if (dept == '' || dept == null) {
        toastr.error("Select a Department/Division")
      } else {
        if (rating == '' ||  rating == null) {
          rating = 1
        }
        var url = '../includes/export_excel.php?performance_summary_list&';
        var newHref = url.concat('office=' + office + '&dept=' + dept + '&rating_period=' + rating);
        console.log(newHref);
        $('#performance_summary_list').attr('href', newHref);
      }

    });

    function loadData(page, limit, search, dept, office, rating) {
      $.ajax({
        url: "pagination.php",
        type: "POST",
        cache: false,
        data: {
          page_no: page,
          limit: limit,
          search: search,
          dept: dept,
          office: office,
          rating: rating
        },
        success: function(response) {
          $("#table-data").html(response);
        }
      });
    }

    function loadDataVariables() {
      var limit = $('#limit_dropdown').val();
      var search = $('#search_input').val();
      var dept = $('#dept_dropdown').val();
      var office = $('#office_dropdown').val();
      var rating = $('#rating_dropdown').val();
      return [limit, search, dept, office, rating];
    }

    loadData();

    // Pagination code
    $(document).on("click", ".page-item", function() {
      var pageId = $(this).attr("id");
      var [limit, search, dept, office, rating] = loadDataVariables();
      loadData(pageId, limit, search, dept, office, rating);
    });

    $('#limit_dropdown').on('change', function() {
      var pageId = 1;
      var [limit, search, dept, office, rating] = loadDataVariables();
      loadData(pageId, limit, search, dept, office, rating);
    })

    $(document).on("click", "#search_button", function() {
      var pageId = 1;
      var [limit, search, dept, office, rating] = loadDataVariables();
      loadData(pageId, limit, search, dept, office, rating);
    });

    $('#dept_dropdown').on('change', function() {
      var pageId = 1;
      var [limit, search, dept, office, rating] = loadDataVariables();
      loadData(pageId, limit, search, dept, office, rating);
    })

    $('#office_dropdown').on('change', function() {
      var pageId = 1;
      var [limit, search, dept, office, rating] = loadDataVariables();
      loadData(pageId, limit, search, dept, office, rating);
    })

    $('#rating_dropdown').on('change', function() {
      var pageId = 1;
      var [limit, search, dept, office, rating] = loadDataVariables();
      loadData(pageId, limit, search, dept, office, rating);
    })

    $(".department-select").change(function() {
      var department = $(".department-select").val();
      // console.log(department);
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

  });
</script>