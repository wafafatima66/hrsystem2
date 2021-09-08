<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<div class="row mt-5 ">

  <div class=" col-lg-12 col-sm-12">
    <h4 class="h4-heading">PERFORMANCE MANAGEMENT</h4>
  </div>

  <div class="col-lg-6 col-sm-6">
    <form class="form-inline" method="post" action="">
      <div class="input-group">

        <input type="search" class="form-control" name="search">
        <button type="submit" class="home-page-search-btn" name="submit">
          <i class="fa fa-search"></i>
        </button>


      </div>
    </form>
  </div>

</div>

<div class="table-container">

  <table class='table home-page-table mt-4 table-striped table-responsive-sm'>
    <thead>
      <tr>
        <th scope='col'>Employee Id</th>
        <th scope='col'>Name</th>
        <th scope='col'>Sex</th>
        <th scope='col'>Status</th>
        <th scope='col'>Position</th>
        <th scope='col'>Office/Unit</th>
      </tr>
    </thead>



    <?php
    // echo '<div id="table-data"> </div>' ;
    include 'pagination.php';
    ?>


  </table>
</div>

<div class=" d-flex justify-content-between mt-4 ">

  <button class="btn button-1 " style="height:35px"><i class="fa fa-print"></i></button>
</div>

<script type="text/javascript">
  // $(document).ready(function(){
  //   function loadData(page){
  //     $.ajax({
  //       url  : "pagination.php",
  //       type : "POST",
  //       cache: false,
  //       data : {page_no:page},
  //       success:function(response){
  //         $("#table-data").html(response);
  //       }
  //     });
  //   }
  //   loadData();

  //   // Pagination code
  //   $(document).on("click", ".pagination li a", function(e){
  //     e.preventDefault();
  //     var pageId = $(this).attr("id");
  //     loadData(pageId);
  //   });
  // });
</script>