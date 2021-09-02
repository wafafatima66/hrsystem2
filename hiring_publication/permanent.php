
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

  <div class="ml-auto col-lg-3 col-sm-6">

    <select name="hiring_dropdown" id="hiring_dropdown" class="form-control text-input">
      <option value="All">Filter By</option>
      <option value="Filled">Filled</option>
      <option value="Unfilled">Unfilled</option>
    </select>



  </div>
</div>

<table class="table home-page-table mt-4 table-striped table-responsive-sm table-sm">
  <thead>
    <tr>
      <th scope="col">Date of publication</th>
      <th scope="col">Item Number</th>
      <th scope="col">Plantilla</th>
      <th scope="col">SG</th>
      <th scope="col">Place of Assignment</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="hiring-permanent-table">

    <?php
        $query = "SELECT * FROM publication  ";
        $result = mysqli_query($conn, $query);
        
        // item table
        include "publication_table.php";
    ?>

  </tbody>
</table>

<div class="mt-4 ">
  <button class="btn button-1 " type="submit" name="submit"><i class="fa fa-print"></i></button>
</div>

<!-- add item modal -->
 <?php include "add_publication_modal.php";  ?>
 

 <!-- edit publication config -->
 <?php include "edit_publication_config.php";  ?>


<!-- edit publication modal -->
<div class="modal fade view_publication " id="view_publication"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

  $(".view_publication_btn").click(function(){
     console.log('hi');
      $.ajax({
          type:'POST',
          url:'get_publication_details.php',
          data: { id : $(this).data("id")  },
          success:function(data){
              $("#view_publication_details").html(data); //the data is displayed in id=display_details
          }
      }); 
  });

});
</script>