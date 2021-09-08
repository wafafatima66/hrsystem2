<div class="row mt-5 ">

  <div class=" col-lg-12 col-sm-12 mb-3">
    <h4 class="h4-heading">ITEM MANAGEMENT - PERMANENT </h4>
  </div>

  <div class="col-lg-5 col-sm-6">
    <div class="input-group">
      <input type="search" class="form-control">
      <button type="button" class="home-page-search-btn">
        <i class="fa fa-search"></i>
      </button>

      <button type="button" class="ml-3 btn button-1" data-toggle="modal" data-target="#add_item">Add Item</button>

    </div>

  </div>

  <div class="ml-auto col-lg-3 col-sm-6">

    <select name="hiring_dropdown" id="hiring_dropdown" class="form-control text-input">
      <option value="All">Filter By</option>
      <option value="Filled">Filled</option>
      <option value="Unfilled">Unfilled</option>
    </select>



  </div>
</div>
<div class="table-container">
<table class="table home-page-table mt-4 table-striped table-responsive-sm table-sm">
  <thead>
    <tr>
      <th scope="col">Item No</th>
      <th scope="col">Plantilla</th>
      <th scope="col">Date created</th>
      <th scope="col">date posted</th>
      <!-- <th scope="col">Date filled</th> -->
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="hiring-permanent-table">

    <?php
        $query = "SELECT * FROM item  ";
        $result = mysqli_query($conn, $query);
        
        // item table
        include "item_table.php";
    ?>

  </tbody>
</table>
</div>


<div class="mt-4 ">
  <button class="btn button-1 " type="submit" name="submit"><i class="fa fa-print"></i></button>
</div>

<!-- add item modal -->

 <?php include "add_item_modal.php";  ?>

<!--  -->

<script>
  $(document).ready(function() {

    $('#hiring_dropdown').on('change', function() {
      fetchRecordsfromDB(this.value);
      // console.log(this.value);
    });

    function fetchRecordsfromDB(data) {
      $.ajax({
        url: "filter_item.php",
        cache: false,
        type: "POST",
        data: {
          id: data
        },
        success: function(html) {
          $("#hiring-permanent-table").empty();
          $("#hiring-permanent-table").append(html);
        }
      });
    }


  });
</script>