<div class="row mt-5 ">

  <div class=" col-lg-12 col-sm-12 mb-3">
    <h4 class="h4-heading">PUBLICATION MANAGEMENT - PERMANENT </h4>
  </div>

  <div class="col-lg-5 col-sm-6">
    <div class="input-group">
      <input type="search" class="form-control">
      <button type="button" class="home-page-search-btn">
        <i class="fa fa-search"></i>
      </button>

      <button type="button" class="ml-3 btn button-1" data-toggle="modal" data-target="#add_publication">Add Publication</button>

    </div>

  </div>

  <!-- <div class="ml-auto col-lg-3 col-sm-6">

    <select name="hiring_dropdown" id="hiring_dropdown" class="form-control text-input">
      <option value="All">Filter By</option>
      <option value="Filled">Filled</option>
      <option value="Unfilled">Unfilled</option>
    </select>



  </div> -->

  <div class="col-lg-1 col-sm-6">
    <select id="limit_dropdown" class="form-control text-input">
      <option value="10">10</option>
      <option value="20">20</option>
      <option value="50">50</option>
    </select>
  </div>

  <div class="col-lg-3 col-sm-6">
    <select id="dept_dropdown" class="form-control text-input">
     <?php 
     $query = "SELECT department_name FROM department  ";
     $result = mysqli_query($conn, $query);
     if (mysqli_num_rows($result) > 0) {
         echo "<option value=''> Select Department </option> ";
         while ($mydata = mysqli_fetch_assoc($result)) {
             echo "<option value= '" . $mydata['department_name'] . "'>" . $mydata['department_name'] . "</option>";
         }
     } else {
         echo "<option value=''> Select Department </option>";
     }
     ?>
    </select>
  </div>

  <div class="col-lg-3 col-sm-6">
    <select id="office_dropdown" class="form-control text-input">
    <?php 
    $query = "SELECT * FROM office  ";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      echo "<option value=''> Select Office </option> ";
        while ($mydata = mysqli_fetch_assoc($result)) {
            echo "<option value= '" . $mydata['office_name'] . "'>" . $mydata['office_name'] . "</option>";
        }
    } else {
      echo "<option value=''> Select Office</option>";
  }
    ?>
    </select>
  </div>


</div>



    <?php
 
    echo '<div id="table-data"> </div>';
    ?>


<!-- add item modal -->
<?php include "add_publication_modal.php";  ?>


<!-- edit publication config -->
<?php include "edit_publication_config.php";  ?>


<!-- edit publication modal -->
<div class="modal fade view_publication " id="view_publication" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

      <h3 class=" background-title-1 p-3">View Publication</h3>

      <div class="modal-body" id="view_publication_details">

      </div>
    </div>
  </div>
</div>



<script>
  $(document).ready(function() {

    $(".view_publication_btn").click(function() {
      //  console.log('hi');
      $.ajax({
        type: 'POST',
        url: 'get_publication_details.php',
        data: {
          id: $(this).data("id")
        },
        success: function(data) {
          $("#view_publication_details").html(data); //the data is displayed in id=display_details
        }
      });
    });

    function loadData(page, limit , dept , office) {
      $.ajax({
        url: "permanent_pagination.php",
        type: "POST",
        cache: false,
        data: {
          page_no: page,
          limit: limit,
          dept:dept , 
          office : office
        },
        success: function(response) {
          $("#table-data").html(response);
        }
      });
    }

    loadData();

    $(document).on("click", ".page-item", function() {
      var page = $(this).attr("id");
      var limit = $('#limit_dropdown').val();
      var dept = $('#dept_dropdown').val();
      var office = $('#office_dropdown').val();
      loadData(page, limit , dept , office);
    });

    $('#limit_dropdown').on('change', function() {
      var page = 1;
      var limit = $('#limit_dropdown').val();
      var dept = $('#dept_dropdown').val();
      var office = $('#office_dropdown').val();
      loadData(page, limit , dept , office);
    });

    $('#dept_dropdown').on('change', function() {
      var page = 1;
      var limit = $('#limit_dropdown').val();
      var dept = $('#dept_dropdown').val();
      var office = $('#office_dropdown').val();
      loadData(page, limit , dept , office);
    });

    $('#office_dropdown').on('change', function() {
      var page = 1;
      var limit = $('#limit_dropdown').val();
      var dept = $('#dept_dropdown').val();
      var office = $('#office_dropdown').val();
      loadData(page, limit , dept , office);
    });

  });
</script>