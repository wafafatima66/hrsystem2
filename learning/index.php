<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<?php
if (isset($_GET['delete'])) {
      echo  '<script>toastr.success("Training/Seminar Deleted Successfully !")</script>';
} else if (isset($_GET['notdelete'])) {
      echo  '<script>toastr.error("Training/Seminar not Deleted. Try again !")</script>';
}

?>
<div class="container">
<div class="row">
      <!-- end of first part -->
      <?php if ($_SESSION['user_role'] == 'Super Administrator' || $_SESSION['user_role'] == 'HR Administrator') { ?>
      
            <div class=" col-lg-12 col-sm-12 mt-2">
                  <h4 class="h4-heading">TRAININGS AND SEMINARS</h4>
            </div>
            <div class="col-lg-5 col-sm-12 mt-3">
                  <div class="input-group">
                        <input type="search" class="form-control" id="search_input">
                        <button type="button" class="home-page-search-btn" id="search_button">
                              <i class="fa fa-search"></i>
                        </button>

                        <button type="button" class="ml-3 btn button-1" data-toggle="modal"
                              data-target="#addlearning">Add Training</button>
                  </div>

            </div>

            <?php } ?>

            <div class="col-lg-2 col-sm-5  mt-3">
                  <input type="date" class="form-control text-input" placeholder="Date Picker" id="from_date">
            </div>
            <span class="mr-2 ml-2 mt-4">to</span>
            <div class="col-lg-2 col-sm-5 mt-3">
                  <input type="date" class="form-control text-input" placeholder="Date Picker" id="to_date">
            </div>

            <div class="col-lg-2 col-sm-6 mt-3">
                  <button type="button" class="ml-3 btn button-1" id="search_date">Search</button>
            </div>


      </div>

      <?php echo '<div id="table-data"></div>'; ?>

      <!-- <div class=" mt-4 ">
            <button class="btn button-1 " type="submit" name="submit"><i class="fa fa-print"></i></button>
      </div> -->
</div>




<?php include "learning_modal.php" ?>
<?php include "../includes/delete_modal.php";  ?>

<script>
      function loadData(page, from_date, to_date, search) {
            $.ajax({
                  url: "../learning/pagination.php",
                  type: "POST",
                  cache: false,
                  data: {
                        page_no: page,
                        from_date: from_date,
                        to_date: to_date,
                        search: search
                  },
                  success: function (response) {
                        $("#table-data").html(response);
                  }
            });
      }
      loadData();

      // Pagination code
      $(document).on("click", ".page-item", function () {
            console.log('kooo')
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var pageId = $(this).attr("id");
            var search = $('#search_input').val();
            loadData(pageId, from_date, to_date, search);
      });

      $(document).on("click", "#search_button", function () {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var pageId = 1;
            var search = $('#search_input').val();
            loadData(pageId, from_date, to_date, search);
      });

      $(document).on("click", "#search_date", function () {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var pageId = 1;
            var search = $('#search_input').val();
            loadData(pageId, from_date, to_date, search);
      });

      $(document).on('click', '.delete_modal', function () {
            var id = $(this).data('id');
            var url = '../includes/delete.php?';
            var newHref = url.concat(id);
            $('#delete_confirm_btn').attr('href', newHref);
      });

      
</script>