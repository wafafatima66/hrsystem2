<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<?php
if (isset($_GET['success'])) {
      echo  '<script>toastr.success("Leave form added succesfully !")</script>';
}

// editing approve or not approving leave 
require '../includes/conn.php';

if (isset($_POST['edit_leave_approve'])) {

      $id = $_POST['id'];
      $status = $_POST['status'];
      $remarks = $_POST['remarks'];



      $sql = "UPDATE emp_leaves SET status = '$status', remarks='$remarks' WHERE id='$id'";


      if (mysqli_query($conn, $sql)) {
            echo  '<script>toastr.success("Leave form updated")</script>';
      } else {
            echo mysqli_error($conn);
      }
}

?>

<div class="container ">
      <div class="row ">
            <h4 class="background-title-1">LEAVE FORM</h4>

            <div class="leave-mang-box-1" style="width: 100%;">

                  <form method="post" action="save_leave_form.php">

                        <div class="form-row mt-3">

                              <div class="col-lg-2 col-sm-6">
                                    <input type="text" class=" form-control text-input" placeholder="Employee Id" name="emp_id" id="emp_id">
                              </div>

                              <div class="col-lg-6 col-sm-6">
                                    <input type="text" class=" form-control text-input" placeholder="First Name,Last Name,Middle Name , Ext" name="emp_name" id="emp_name">
                              </div>

                              <div class="col-lg-2 col-sm-6">
                                    <input type="text" class="form-control text-input" placeholder="Position" id="position" name="position">
                              </div>

                              <div class="col-lg-2 col-sm-6">
                                    <input type="text" class="form-control text-input" placeholder="Salary" id="salary_grade" name="salary_grade">
                              </div>
                        </div>

                        <div class="form-row mt-4">

                              <div class="col-lg-3 col-sm-6">
                                    <input type="text" class=" form-control text-input" placeholder="Office/Department" id="office" name="office">
                              </div>

                              <div class="col-lg-4 col-sm-6">
                                    <select class="form-control text-input" name="type_of_leave" id="type_of_leave">
                                          <option value="">Select Type of leave</option>
                                          <option value="Vacation leave">Vacation Leave</option>
                                          <option value="Sick leave">Sick Leave</option>
                                          <option value="Special priviledge leave">Special priviledge Leave</option>
                                          <option value="Force leave">Force Leave</option>
                                          <option value="Leave without pay">Leave without pay</option>
                                    </select>
                              </div>

                              <div class="col-lg-4 col-sm-6">
                                    <input type="text" class="form-control text-input" placeholder="No of Working Days" name="no_of_working_days">
                              </div>

                        </div>

                        <div class="form-row mt-3">

                              <div class="col-lg-4 col-sm-6 form-inline">
                                    <label for="" class="responsive-label">From date</label>
                                    <input type="date" class="form-control text-input ml-3" placeholder="Date Picker" name="leave_from_date" id="leave_from_date">
                              </div>

                              <div class="col-lg-4 col-sm-6 form-inline">
                                    <label for="" class="responsive-label">To date</label>
                                    <input type="date" class="form-control text-input ml-3" placeholder="Date Picker" name="leave_to_date" id="leave_to_date">
                              </div>

                        </div>

                        <div class="form-row ">
                              <div class="col-lg-6 col-sm-6 mt-3">
                                    <textarea class="form-control text-input" rows="5" placeholder="Details Of Leave" name="details_of_leave"></textarea>
                              </div>

                              <div class="col-lg-6 col-sm-6 mt-3">
                                    <table class="table home-page-table table-sm ">
                                          <thead>
                                                <tr>
                                                      <th scope="col"></th>
                                                      <th scope="col">Vacation</th>
                                                      <th scope="col">Sick</th>
                                                      <th scope="col">Total</th>
                                                </tr>
                                          </thead>

                                          <tbody>
                                                <tr>

                                                      <th>Last Balance</th>
                                                      <td id="vl_pts"></td>
                                                      <td id="sl_pts"></td>
                                                      <td id="pts_total"></td>

                                                </tr>

                                                <tr>
                                                      <th>Less this Leave</th>
                                                      <td id="vl_now_pts"></td>
                                                      <td id="sl_now_pts"></td>
                                                      <td id="total_pts_now"></td>

                                                </tr>

                                                <tr>
                                                      <th>Balance</th>
                                                      <td id="vl_bal"></td>
                                                      <td id="sl_bal"></td>
                                                      <td id="total_bal"></td>

                                                </tr>

                                          </tbody>
                                    </table>
                              </div>
                        </div>

                        <div class="text-right"><button class="ml-3 btn button-1" name="submit" type="submit">Submit</button></div>

                  </form>
            </div>


      </div>
      <!-- end of first part -->

      <div class="row mt-5 mr-2 ml-2">
            <h4 class="background-title-1">LEAVE SUMMARY</h4>

            <div class="form-row mx-auto mt-3 ">

                  <!-- <form action="" method="post" class="form-inline "> -->

                        <div class="col-lg-5 col-sm-5">
                              <input type="date" class="form-control text-input" placeholder="Date Picker" style="width:100%" id="from_date">
                        </div>

                        <div class="col-lg-1 col-sm-1">
                              <span>to</span>
                        </div>

                        <div class="col-lg-5 col-sm-5">
                              <input type="date" class="form-control text-input" placeholder="Date Picker" style="width:100%" id="to_date">
                        </div>

                        <div class="col-lg-1 col-sm-2">
                              <button type="submit" id="search_leave" class="btn button-1">Search </button>
                        </div>


                  <!-- </form> -->

            </div>
      </div>


            

                  <?php
               
                  echo '<div id="table-data"> </div>';

                  ?>



</div>

<!-- view status modal -->
<div class="modal fade " id="edit_leave" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">

                  <h3 class=" background-title-1 p-3">View Applicant</h3>

                  <div class="modal-body" id="view_status_details">

                  </div>
            </div>
      </div>
</div>



<script>
      // to get the info
      $(document).ready(function() {



            $("#emp_id").keyup(function() {
                  $.ajax({
                        url: 'get_info_emp_id.php',
                        type: 'post',
                        data: {
                              emp_id: $(this).val()
                        },
                        dataType: 'json',
                        success: function(result) {

                              var emp_name = result.emp_first_name + " " + result.emp_middle_name + " " + result.emp_last_name + " " + result.emp_ext;

                              $('#emp_name').val(emp_name);
                              $('#position').val(result.position);
                              $('#salary_grade').val(result.salary_grade);
                              $('#office').val(result.office);

                              //     $('#emp_status').val(result.emp_status);
                              //     $('#emp_salary').val(result.emp_salary);

                        }
                  });
            });

            //to get date from leave management first box to load credits points in the small table
            $("#leave_to_date").change(function() {
                  $.ajax({
                        url: 'get_leave_credits.php',
                        type: 'post',
                        data: {
                              leave_to_date: $(this).val(),
                              leave_from_date: $("#leave_from_date").val(),
                              type_of_leave: $("#type_of_leave").val(),
                              emp_id: $("#emp_id").val()
                        },
                        dataType: 'json',
                        success: function(result) {

                              $('#vl_pts').html(result.vl_pts); // getting vacation  leaves points from database
                              $('#sl_pts').html(result.sl_pts); // getting sick  leaves points from database

                              $('#pts_total').html(result.pts_total); // getting total points from calculing vl_pts and sl_pts
                              $('#total_pts_now').html(result.total_pts_now); // getting pints calculating from vi_now-pts and sl_now_pts
                              $('#vl_bal').html(result.vl_bal); // vl_pts - vl_now_pts
                              $('#sl_bal').html(result.sl_bal); // sl_pts - sl_now_pts
                              $('#total_bal').html(result.total_bal); //vl_bal - sl_bal

                              $('#vl_now_pts').html(result.vl_now_pts); // getting vacation  leaves points date given 
                              $('#sl_now_pts').html(result.sl_now_pts); // getting sick leaves points from date given
                        }
                  });
            });

            function loadData(page , from_date , to_date) {
                  $.ajax({
                        url: "../leave_mang/pagination.php",
                        type: "POST",
                        cache: false,
                        data: {
                              page_no: page ,
                              from_date : from_date, 
                              to_date : to_date
                        },
                        success: function(response) {
                              $("#table-data").html(response);
                        }
                  });
            }
            loadData();

            // Pagination code
            $(document).on("click", ".page-item", function() {
                  var from_date = $('#from_date').val();
                  var to_date = $('#to_date').val();
                  var pageId = $(this).attr("id");
                  loadData(pageId , from_date , to_date);
            });

            $(document).on("click", "#search_leave", function() {
                  var from_date = $('#from_date').val();
                  var to_date = $('#to_date').val();
                  var pageId = 1;
                  loadData(pageId , from_date , to_date);
            });

      });
</script>