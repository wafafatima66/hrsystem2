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

      <button type="button" class="ml-3 btn button-1" data-toggle="modal" data-target="#hiring_permanent">Add Item</button>

    </div>

  </div>

  <div class="ml-auto col-lg-3 col-sm-6">
   
    <select name="hiring_dropdown" id="hiring_dropdown" class="form-control text-input">
      <option value="">Filter By</option>
      <option value="1">1</option>
      <option value="2">2</option>
    </select>



  </div>
</div>

<table class="table home-page-table mt-4 table-striped table-responsive-sm table-sm">
  <thead>
    <tr>
      <th scope="col">Item No</th>
      <th scope="col">Plantilla</th>
      <th scope="col">Date created</th>
      <th scope="col">date posted</th>
      <th scope="col">Date filled</th>
      <th scope="col">Appointed employee</th>
      <th scope="col">Type</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="hiring-permanent-table">

    <?php
    $query = "SELECT * FROM item  ";

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($mydata = mysqli_fetch_assoc($result)) {

        echo "
  
  "
    ?>

<tr> <td><?php echo $mydata['item_no']?></td>
        <td><?php echo$mydata['position']?></td>
        <td><?php echo$mydata['date_created']?></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php if ($mydata['filled']== '0'){echo "Unfilled" ;  } else {  echo "Filled" ;   }?></td>
        <td>
        <a href='<?php if ($mydata['filled']== '0'){
                echo "unfilled.php?id=".$mydata['id']; 
            }else {
              echo "filled.php?id=".$mydata['id'];
            }?>'>
            <i class='fa fa-edit mx-2 '></i>
        </a>

<a href=''><i class='fa fa-trash mx-2'></i></a>
        </td>
    </tr>

    <?php }
    } ?>
  </tbody>
</table>


<!-- add item modal -->
<div class="modal fade hiring_permanent " id="hiring_permanent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">


      <h3 class=" background-title-1 p-3">Add Item</h3>

      <div class="modal-body">



        <div class="form-inline mt-3 p-3" style="background-color: #9EB87C;">

          <input type="radio" name="job_type" value="Original" class=" m-2 " checked>
          <label for="">Original</label>


          <input type="radio" name="job_type" value="Promotion" class=" m-2 ">
          <label for="">Promotion</label>

          <input type="radio" name="job_type" value="Others" class=" m-2 ">
          <label for="">Others</label>

        </div>


        <div class="container">

          <?php include "permanent_original.php";  ?>

          <div class="Promotion switch-tab">
            Promotion
          </div>

          <div class="Others switch-tab">
            Others
          </div>


        </div>

      </div>



    </div>

  </div>


</div>

<script>
  $(document).ready(function() {
    $('input[type="radio"]').click(function() {
      var inputValue = $(this).attr("value");
      var targetBox = $("." + inputValue);
      $(".switch-tab").not(targetBox).hide();
      $(targetBox).show();
    });

    $('#hiring_dropdown').on('change', function() {
      fetchRecordsfromDB(this.value);
      // console.log(this.value);
    });

    function fetchRecordsfromDB(data) {
      $.ajax({
        url: "filter.php",
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