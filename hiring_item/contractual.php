<div class="row mt-5 ">

    <div class=" col-lg-12 col-sm-12 mb-3">
        <h4 class="h4-heading">ITEM MANAGEMENT - JOB ORDER/CONTRACTUAL </h4>
    </div>

    <div class="col-lg-5 col-sm-6">
        <div class="input-group">
            <input type="search" class="form-control">
            <button type="button" class="home-page-search-btn">
                <i class="fa fa-search"></i>
            </button>

            <button type="button" class="ml-3 btn button-1" data-toggle="modal" data-target="#addposition">Add Position</button>


        </div>
    </div>

    <!-- <div class="ml-auto col-lg-3 col-sm-6">

        <select name="hiring_dropdown_cont" id="hiring_dropdown_cont" class="form-control text-input">
            <option value="All">Filter By</option>
            <option value="Filled">Filled</option>
            <option value="Unfilled">Unfilled</option>
        </select>

    </div> -->

    <div class="col-lg-1 col-sm-6">
    <select id="limit_dropdown_cont" class="form-control text-input">
      <option value="10">10</option>
      <option value="20">20</option>
      <option value="50">50</option>
    </select>
  </div>


</div>
<!-- <div class="table-container">

<table class="table home-page-table mt-4 table-striped table-responsive-sm table-sm">
    <thead>
        <tr>
            <th scope="col">Position</th>
            <th scope="col">SG</th>
            <th scope="col">Duration</th>
            <th scope="col">Date posted</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
 

    <tbody id="hiring-contractual-table"> -->

        <?php
        // $query = "SELECT * FROM cont_position  ";
        // $result = mysqli_query($conn, $query);

        // // item table
        // include "position_table.php";
        echo '<div id="contractual-table-data"> </div>';
        ?>

    <!-- </tbody>



</table>
</div>

<div class="mt-4 ">
    <button class="btn button-1 " type="submit" name="submit"><i class="fa fa-print"></i></button>
</div> -->

<!-- add position modal -->
<?php include 'add_position_modal.php'; ?>

<script>
    $(document).ready(function() {

       
    function loadData(page_cont, limit_cont ) {
      $.ajax({
        url: "contractual_pagination.php",
        type: "POST",
        cache: false,
        data: {
          page_no_cont: page_cont,
          limit_cont: limit_cont
        },
        success: function(response) {
          $("#contractual-table-data").html(response);
        }
      });
    }

    function loadDataVariables() {
      var limit_cont = $('#limit_dropdown_cont').val();
      return [limit_cont];
    }

    loadData();

    $(document).on("click", ".page-item_cont", function() {
      var page_cont = $(this).attr("id");
      var [limit_cont] = loadDataVariables();
      loadData(page_cont, limit_cont);
    });

    $('#limit_dropdown_cont').on('change', function() {
      var page_cont = 1;
      var [limit_cont] = loadDataVariables();
      loadData(page_cont, limit_cont);
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