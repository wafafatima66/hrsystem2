<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<div class="row mt-5 ">

  <div class=" col-lg-12 col-sm-12">
    <h4>PERFORMANCE MANAGEMENT</h4>
  </div>

</div>

<?php  echo '<div id="table-data"> </div>' ; ?>


<script type="text/javascript">
  $(document).ready(function(){
    function loadData(page){
      $.ajax({
        url  : "pagination.php",
        type : "POST",
        cache: false,
        data : {page_no:page},
        success:function(response){
          $("#table-data").html(response);
        }
      });
    }
    loadData();
    
    // Pagination code
    $(document).on("click", ".pagination li a", function(e){
      e.preventDefault();
      var pageId = $(this).attr("id");
      loadData(pageId);
    });
  });
</script>
