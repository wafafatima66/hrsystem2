<?php include '../config.php';

include SITE_ROOT . '/includes/header.php';

?>

<?php
if (isset($_GET['delete'])) {
      if (isset($_GET['delete']) == 'success') {
            echo  '<script>toastr.success("User deleted successfully")</script>';
      } else if (isset($_GET['delete']) == 'fail') {
            echo  '<script>toastr.error("User not deleted. Try again !")</script>';
      }
}
?>

<?php include "config.php" ?>


<div class="container mt-3">

      <h4 class="h4-heading">User Management</h4>

      <form action="" method="post">
            <div class="row ">

                  <div class="col-lg-3 col-sm-12 mt-3">
                        <input type="text" class="form-control text-input" placeholder="Type id" name="emp_id" onBlur="get_emp_name_1()" id="emp_id_1">
                  </div>

                  <div class="col-lg-5 col-sm-12 mt-3">
                        <input type="text" class="form-control text-input" placeholder="Full name" id="emp_name_1" name="emp_name">
                  </div>


                  <div class="col-lg-3 col-sm-12 mt-3">
                        <select name="role" class="form-control text-input">
                              <option value="">Role selection</option>
                              <option value="Super Administrator">Super Administrator</option>
                              <option value="HR Administrator">HR Administrator</option>
                              <option value="Department Head">Department Head</option>
                              <option value="Employee">Employee</option>
                        </select>
                  </div>

            </div>

            <div class="row ">
                  <div class="col-lg-3 col-sm-12 mt-3">
                        <input type="text" class="form-control text-input" placeholder="Username" name="username">
                  </div>

                  <div class="col-lg-3 col-sm-12 mt-3">
                        <input type="text" class="form-control text-input" placeholder="Password" name="password">
                  </div>

                  <div class="col-lg-3 col-sm-12 mt-3"><button type="submit" name="add_user" class="ml-3 btn button-1">Add user</button></div>

            </div>

      </form>



      <!-- user table -->

      <!-- <div class="table-container">
      <table class='table home-page-table mt-3 table-striped table-responsive-sm '>
		<thead>
			  <tr>
				<th scope='col'>Employee Id</th>
				<th scope='col'>Name</th>
				<th scope='col'>User Role</th>
				<th scope='col'>Department</th>
				<th scope='col'>Office</th>
				<th scope='col'>Action</th>
			  </tr>
		</thead>

            <?php

            // include "pagination.php";
            ?>
            </table>
            </div>

            <div class=" d-flex justify-content-between mt-4 ">

	<button class="btn button-1 " style="height:35px"><i class="fa fa-print"></i></button>
      </div> -->

      <?php

      echo '<div id="table-data"> </div>';

      ?>



      <h4 class="h4-heading mt-4">DEPARTMENTS AND OFFICES</h4>

      <div class="form-row mt-4">
            <form method="post" action="">
                  <label for="">Add department</label>
                  <div class="d-flex justify-content-start">
                        <input type="text" class="form-control text-input" placeholder="Department" name="department_name">
                        <button type="submit" class="btn button-1 ml-3" name="add_department">+</button>
                        <button type="button" class='btn button-1 ml-3' data-toggle='modal' data-target='#view_department'>View</button>
                  </div>
            </form>
      </div>

      <div class="form-row mt-4">
            <form method="post" action="">
                  <label for="">Add Offices/Units</label>
                  <div class="d-flex justify-content-start">
                        <input type="text" class="form-control text-input" placeholder="Office/Unit" name="office_name">
                        <select name="department_name" class="form-control text-input ml-4">
                              <!-- <option value="">Select Department</option> -->

                              <?php
                              $query = "select * from (SELECT DISTINCT department_name FROM department union select division from item ) as tablec where tablec.department_name != '' ";
                              $result = mysqli_query($conn, $query);
                              if (mysqli_num_rows($result) > 0) {
                                    echo "<option value=''> Select Department </option> ";
                                    while ($mydata = mysqli_fetch_assoc($result)) {
                                          echo "<option value= '" . $mydata['department_name'] . "'>" . $mydata['department_name'] . "</option>";
                                    }
                              } else {
                                    echo "<option value='' > Select Department </option>";
                              }
                              ?>

                        </select>
                        <button type="submit" class="btn button-1 ml-3" name="add_office">+</button>
                        <button type="button" class='btn button-1 ml-3' data-toggle='modal' data-target='#view_office'>View</button>
                  </div>
            </form>
      </div>

      <div class="form-row mt-4">
            <form method="post" action="">
                  <label for="">Assign department head</label>
                  <div class="d-flex justify-content-start">

                        <select name="department_name" class="form-control text-input ">

                              <?php
                              $query = "select * from (SELECT DISTINCT department_name FROM department union select division from item ) as tablec where tablec.department_name != ''  ";
                              $result = mysqli_query($conn, $query);
                              if (mysqli_num_rows($result) > 0) {
                                    echo "<option value=''> Select Department </option> ";
                                    while ($mydata = mysqli_fetch_assoc($result)) {
                                          echo "<option value= '" . $mydata['department_name'] . "'>" . $mydata['department_name'] . "</option>";
                                    }
                              } else {
                                    echo "<option value='' > Select Department </option>";
                              }
                              ?>

                        </select>

                        <input type="text" class="form-control text-input ml-4" placeholder="Employee Id.no" name="emp_id" id="emp_id_2" onBlur="get_emp_name_2()">

                        <input type="text" class="form-control text-input ml-4" placeholder="Auto fill name" name="emp_name" id="emp_name_2">

                        <button type="submit" class="btn button-1  ml-3 " name="assign_dept_head">Assign</button>

                  </div>
            </form>
      </div>

      <div class="form-row mt-4">
            <form method="post" action="">
                  <label for="">Assign Office/Unit Supervisor</label>
                  <div class="d-flex justify-content-start">

                        <select name="department_name" class="form-control text-input ">

                              <?php
                              $query = "select * from (SELECT DISTINCT department_name FROM department union select division from item ) as tablec where tablec.department_name != ''  ";
                              $result = mysqli_query($conn, $query);
                              if (mysqli_num_rows($result) > 0) {
                                    echo "<option value=''> Select Department </option> ";
                                    while ($mydata = mysqli_fetch_assoc($result)) {
                                          echo "<option value= '" . $mydata['department_name'] . "'>" . $mydata['department_name'] . "</option>";
                                    }
                              } else {
                                    echo "<option value='' > Select Department </option>";
                              }
                              ?>

                        </select>

                        <select name="office_name" class="form-control text-input ml-4 ">

                              <?php
                              $query = "SELECT * FROM ( SELECT DISTINCT area_wrk_assign from item UNION SELECT DISTINCT  office_name FROM office ) as tableC WHERE tableC.area_wrk_assign != ''  ";
                              $result = mysqli_query($conn, $query);
                              if (mysqli_num_rows($result) > 0) {
                                    echo "<option value=''> Select Office/Unit </option> ";
                                    while ($mydata = mysqli_fetch_assoc($result)) {
                                          echo "<option value= '" . $mydata['area_wrk_assign'] . "'>" . $mydata['area_wrk_assign'] . "</option>";
                                    }
                              } else {
                                    echo "<option value='' > Select Office/Unit </option>";
                              }
                              ?>

                        </select>

                        <input type="text" class="form-control text-input ml-4" placeholder="Employee Id.no" name="emp_id" id="emp_id_3" onBlur="get_emp_name_3()">

                        <input type="text" class="form-control text-input ml-4" placeholder="Auto fill name" name="emp_name" id="emp_name_3">

                        <button type="submit" class="btn button-1  ml-3" name="assign_supervisor">Assign</button>


                  </div>
            </form>
      </div>

</div>

<?php include "view_department_modal.php" ?>
<?php include "view_office_modal.php" ?>

<!-- delete modal -->
<?php include "../includes/delete_modal.php";  ?>



<script>
      function get_emp_name_1() {
            var emp_id = $("#emp_id_1").val();
            console.log(emp_id);
            jQuery.ajax({
                  url: "get_emp_name.php",
                  data: {
                        emp_id: emp_id
                  },
                  type: "POST",
                  success: function(data) {
                        $("#emp_name_1").val(data);
                  },
                  error: function() {}
            });
      }

      function get_emp_name_2() {
            var emp_id = $("#emp_id_2").val();
            console.log(emp_id);
            jQuery.ajax({
                  url: "get_emp_name.php",
                  data: {
                        emp_id: emp_id
                  },
                  type: "POST",
                  success: function(data) {
                        $("#emp_name_2").val(data);
                  },
                  error: function() {}
            });
      }

      function get_emp_name_3() {
            var emp_id = $("#emp_id_3").val();
            console.log(emp_id);
            jQuery.ajax({
                  url: "get_emp_name.php",
                  data: {
                        emp_id: emp_id
                  },
                  type: "POST",
                  success: function(data) {
                        $("#emp_name_3").val(data);
                  },
                  error: function() {}
            });
      }

      $(document).ready(function() {
            function loadData(page) {
                  $.ajax({
                        url: "pagination.php",
                        type: "POST",
                        cache: false,
                        data: {
                              page_no: page
                        },
                        success: function(response) {
                              $("#table-data").html(response);
                        }
                  });
            }
            loadData();

            // Pagination code
            $(document).on("click", ".page-item", function(e) {
                  var pageId = $(this).attr("id");
                  loadData(pageId);
            });

             // delete 
            $(document).on('click', '.delete_modal', function() {
            var id = $(this).data('id');
            var url = '../includes/delete.php?' ; 
            var newHref = url.concat(id);
            $('#delete_confirm_btn').attr('href', newHref);
            });

      });
</script>