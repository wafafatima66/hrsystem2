<div class="row mt-5 ">

  <div class=" col-lg-12 col-sm-12 mb-3">
    <h4 class="h4-heading">ITEM MANAGEMENT - PERMANENT </h4>
  </div>

  <div class="col-lg-5 col-sm-6">
    <div class="input-group">
      <input type="search" class="form-control search_item" >
      <button type="button" class="home-page-search-btn" id="search_item_btn">
        <i class="fa fa-search"></i>
      </button>

      <button type="button" class="ml-3 btn button-1" data-toggle="modal" data-target="#add_item">Add Item</button>

    </div>
  </div>

  <div class="col-lg-1 col-sm-6">
    <select id="limit_dropdown" class="form-control text-input">
      <option value="10">10</option>
      <option value="20">20</option>
      <option value="50">50</option>
    </select>
  </div>

  <div class="col-lg-2 col-sm-6">
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

  <div class="col-lg-2 col-sm-6">
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

  <div class="ml-auto col-lg-2 col-sm-6">

    <select id="status_dropdown" class="form-control text-input">
      <option value="">Filter Status</option>
      <option value="Filled">Filled</option>
      <option value="Unfilled">Unfilled</option>
    </select>

  </div>


</div>



<?php

echo '<div id="table-data"> </div>';
?>


<!-- add item modal -->
<?php include "add_item_modal.php";  ?>


<!-- delete modal -->
<?php include "../includes/delete_modal.php";  ?>

<script>
  $(document).ready(function() {


    function loadData(page, limit, dept, office, status ,search_item ) {
      $.ajax({
        url: "permanent_pagination.php",
        type: "POST",
        cache: false,
        data: {
          page_no: page,
          limit: limit,
          dept: dept,
          office: office,
          status: status,
          search_item : search_item
        },
        success: function(response) {
          $("#table-data").html(response);
        }
      });
    }

    function loadDataVariables() {
      var limit = $('#limit_dropdown').val();
      var dept = $('#dept_dropdown').val();
      var office = $('#office_dropdown').val();
      var status = $('#status_dropdown').val();
      var search_item = $('.search_item').val();
      return [limit, dept, office, status,search_item];
    }

    loadData();

    $(document).on("click", ".page-item", function() {
      var page = $(this).attr("id");
      var [limit, dept, office, status,search_item] = loadDataVariables();
      loadData(page, limit, dept, office, status,search_item);
    });

    $('#limit_dropdown').on('change', function() {
      var page = 1;
      var [limit, dept, office, status,search_item] = loadDataVariables();
      loadData(page, limit, dept, office, status,search_item);
    });


    $('#dept_dropdown').on('change', function() {
      var page = 1;
      var [limit, dept, office, status,search_item] = loadDataVariables();
      loadData(page, limit, dept, office, status,search_item);
    });

    $('#office_dropdown').on('change', function() {
      var page = 1;
      var [limit, dept, office, status,search_item] = loadDataVariables();
      loadData(page, limit, dept, office, status,search_item);
    });

    $('#status_dropdown').on('change', function() {
      var page = 1;
      var [limit, dept, office, status,search_item] = loadDataVariables();
      loadData(page, limit, dept, office, status,search_item);
    });

    $('#search_item_btn').on('click', function() {
          var page = 1;
          var [limit, dept, office, status,search_item] = loadDataVariables();
          loadData(page, limit, dept, office, status , search_item);
    });


    // delete 
    $(document).on('click', '.delete_modal', function() {
      var id = $(this).data('id');
      var url = '../includes/delete.php?';
      var newHref = url.concat(id);
      $('#delete_confirm_btn').attr('href', newHref);
    });

  });
</script>