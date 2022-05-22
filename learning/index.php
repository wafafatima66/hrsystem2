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

            <div class=" col-lg-12 col-sm-12 mt-2">
                  <h4 class="h4-heading">TRAININGS AND SEMINARS</h4>
            </div>

            <?php if ($_SESSION['user_role'] == 'Super Administrator' || $_SESSION['user_role'] == 'HR Administrator' || $_SESSION['user_role'] == 'Division Head' || $_SESSION['user_role'] == 'Agency Head' || $_SESSION['user_role'] == 'Supervisor') { ?>
            <div class="col-lg-5 col-sm-12 mt-3">
                  <div class="input-group">
                        <input type="search" class="form-control" id="search_input">
                        <button type="button" class="home-page-search-btn" id="search_button">
                              <i class="fa fa-search"></i>
                        </button>

                        
                              <button type="button" class="ml-3 btn button-1" data-toggle="modal" data-target="#addlearning">Add Training</button>
                        

                       
                              <button type="button" class="ml-3 btn button-1" data-toggle="modal" data-target="#addpost">Post</button>
                       

                  </div>
                  
            </div>
            


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

            <?php } ?>
      </div>


      <!-- main table -->
      <?php
      if ( $_SESSION['user_role'] == 'Super Administrator' || $_SESSION['user_role'] == 'Agency Head' || $_SESSION['user_role'] == 'Division Head' || $_SESSION['user_role'] == 'Supervisor' || $_SESSION['user_role'] == 'HR Administrator')
       { 
              echo '<div id="table-data"></div>'; 
      }
      ?>


      <?php if ($_SESSION['user_role'] == 'Employee' || $_SESSION['user_role'] == 'HR Administrator' || $_SESSION['user_role'] == 'Division Head') {

            // $emp_id = $_SESSION["emp_id"];
      ?>
            <div class="row mt-5 ">
                  <h4 class="background-title-1">AVAILABLE TRAININGS</h4>


                  <?php

                  $query = "SELECT * from training_post_table ORDER BY id DESC LIMIT 10";

                  $result = mysqli_query($conn, $query);

                  if (mysqli_num_rows($result) > 0) { ?>
                        <table class="table home-page-table mt-4 table-striped table-responsive-sm">
                              <thead>
                                    <tr>
                                          <th scope="col">Title of Trainings</th>
                                          <th scope="col">Inclusive dates</th>
                                          <th scope="col">Venue</th>
                                          <th scope="col">Type</th>
                                          <th scope="col">No of Hours</th>
                                          <th scope="col">Sponsor</th>
                                          <th scope="col">Action</th>
                                    </tr>
                              </thead>
                              <tbody>

                                    <?php while ($mydata = mysqli_fetch_assoc($result)) {

                                          $leave_from = date("m/d/Y", strtotime($mydata['from_date']));
                                          $leave_to = date("m/d/Y", strtotime($mydata['to_date']));

                                    ?>
                                          <tr>
                                                <td><?php echo $mydata['title_of_training'];  ?></td>
                                                <td><?php echo $leave_from; ?> - <?php echo $leave_to; ?>
                                                <td><?php echo $mydata['venue'];  ?></td>
                                                <td><?php echo $mydata['type_of_training'];  ?></td>

                                                </td>
                                                <td><?php echo $mydata['no_of_hrs'];  ?></td>
                                                <td><?php echo $mydata['sponsors'];  ?></td>

                                                <td> <a class='view_post_btn' data-toggle='modal' data-target='#view_post' data-id='<?php echo $mydata['id'];?>' style="color:black ; cursor:pointer ; ">View</a></td>

                                          </tr>

                                    <?php } ?>
                              </tbody>
                        </table>
                  <?php  } else {
                        echo '<p>No data Available</p>';
                  }
                  ?>

                  <!-- <div class=" mt-2 ">
          <button class="btn button-1 " type="submit" name="submit"><i class="fa fa-print"></i></button>
    </div> -->
            </div>
      <?php } ?>



</div>

<?php include "learning_modal.php" ?>
<?php include "post_modal.php" ?>
<?php include "../includes/delete_modal.php";  ?>

<!-- view post modal -->
<div class="modal fade view_post " id="view_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                  <h3 class=" background-title-1 p-3">View Post</h3>

                  <div class="modal-body" id="view_post_details">

                  </div>
            </div>
      </div>
</div>

<script src="../learning/learning.js"></script> -
<script>
      $(".view_post_btn").click(function() {
            console.log('hi');
            $.ajax({
                  type: 'POST',
                  url: 'get_post_details.php',
                  data: {
                        id: $(this).data("id")
                  },
                  success: function(data) {
                        $("#view_post_details").html(data); //the data is displayed in id=display_details
                  }
            });
      });

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
                  success: function(response) {
                        $("#table-data").html(response);
                  }
            });
      }
      loadData();

      // Pagination code
      $(document).on("click", ".page-item", function() {
            console.log('kooo')
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var pageId = $(this).attr("id");
            var search = $('#search_input').val();
            loadData(pageId, from_date, to_date, search);
      });

      $(document).on("click", "#search_button", function() {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var pageId = 1;
            var search = $('#search_input').val();
            loadData(pageId, from_date, to_date, search);
      });

      $(document).on("click", "#search_date", function() {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var pageId = 1;
            var search = $('#search_input').val();
            loadData(pageId, from_date, to_date, search);
      });

      $(document).on('click', '.delete_modal', function() {
            var id = $(this).data('id');
            var url = '../includes/delete.php?';
            var newHref = url.concat(id);
            $('#delete_confirm_btn').attr('href', newHref);
      });
</script>