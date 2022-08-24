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
                              <option value="Division Head">Division Head</option>
                              <option value="Agency Head">Agency Head</option>
                              <option value="Supervisor">Supervisor</option>
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

      <div class="row mt-5">

            <div class=" col-lg-12 col-sm-12 ">
                  <h4 class="h4-heading">USERS</h4>
            </div>

            <div class="col-lg-5 col-sm-6">
                  <div class="input-group">
                        <input type="search" class="form-control search">
                        <button type="button" class="home-page-search-btn" id="search">
                              <i class="fa fa-search"></i>
                        </button>
                  </div>
            </div>

            <div class="col-lg-2 col-sm-6">
                  <select id="role_dropdown" class="form-control text-input">
                        <option value="">User Role</option>
                        <option value="Super Administrator">Super Administrator</option>
                        <option value="HR Administrator">HR Administrator</option>
                        <option value="Division Head">Division Head</option>
                        <option value="Agency Head">Agency Head</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Employee">Employee</option>
                  </select>
            </div>

            <div class="col-lg-2 col-sm-6">
                  <select id="dept_dropdown" class="form-control text-input">
                        <?php
                        $query = "select * from (SELECT DISTINCT department_name FROM department union select division from item ) as tablec where tablec.department_name != ''";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                              echo "<option value='' disabled selected hidden> Department </option> ";
                              while ($mydata = mysqli_fetch_assoc($result)) {
                                    echo "<option value= '" . $mydata['department_name'] . "'>" . $mydata['department_name'] . "</option>";
                              }
                        } else {
                              echo "<option value='' disabled selected hidden> Department </option>";
                        }
                        ?>
                  </select>
            </div>

            <div class="col-lg-2 col-sm-6">
                  <select id="office_dropdown" class="form-control text-input">
                        <?php
                        $query = "SELECT * FROM ( SELECT DISTINCT area_wrk_assign from item UNION SELECT DISTINCT office_name FROM office ) as tableC WHERE tableC.area_wrk_assign != '' ";

                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                              echo "<option value='' disabled selected hidden> Office </option> ";
                              while ($mydata = mysqli_fetch_assoc($result)) {
                                    echo "<option value= '" . $mydata['area_wrk_assign'] . "'>" . $mydata['area_wrk_assign'] . "</option>";
                              }
                        } else {
                              echo "<option value='' disabled selected hidden>  Office</option>";
                        }
                        ?>
                  </select>
            </div>

            <div class="col-lg-1 col-sm-6">
                  <select id="limit_dropdown" class="form-control text-input">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                  </select>
            </div>
      </div>
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
                  <label for="">Assign Division Head</label>
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

                        <select name="department_name" class="form-control text-input department-select ">

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

                        <select name="office_name" class="form-control text-input ml-4 office-select">
                              <option value=''> Select Office/Unit </option>
                              <?php
                              // $query = "SELECT * FROM ( SELECT DISTINCT area_wrk_assign from item UNION SELECT DISTINCT  office_name FROM office ) as tableC WHERE tableC.area_wrk_assign != ''  ";
                              // $result = mysqli_query($conn, $query);
                              // if (mysqli_num_rows($result) > 0) {
                              //       echo "<option value=''> Select Office/Unit </option> ";
                              //       while ($mydata = mysqli_fetch_assoc($result)) {
                              //             echo "<option value= '" . $mydata['area_wrk_assign'] . "'>" . $mydata['area_wrk_assign'] . "</option>";
                              //       }
                              // } else {
                              //       echo "<option value='' > Select Office/Unit </option>";
                              // }
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

      $(".department-select").change(function() {
            var department = $(".department-select").val();
            console.log(department);
            jQuery.ajax({
                  url: "get_office.php",
                  data: {
                        department: department
                  },
                  type: "POST",
                  success: function(data) {
                        $(".office-select").html(data);
                  },
                  error: function() {}
            });
      });

// Pagination code
      $(document).ready(function() {
            function loadData(page, limit, dept, office, role ,search) {
                  $.ajax({
                        url: "pagination.php",
                        type: "POST",
                        cache: false,
                        data: {
                              page_no: page,
                              limit: limit,
                              dept: dept,
                              office: office,
                              role: role,
                              search : search
                        },
                        success: function(response) {
                              $("#table-data").html(response);
                        }
                  });
            }

            function loadDataVariables() {
                  var limit = $('#limit_dropdown').val();
                  var dept = $('#dept_dropdown').val();
                  var office = $('#office_dropdown').val();
                  var role = $('#role_dropdown').val();
                  var search = $('.search').val();
                  return [limit, dept, office, role,search];
            }

            loadData();

            $(document).on("click", ".page-item", function(e) {
                  var page = $(this).attr("id");
                  var [limit, dept, office, role,search] = loadDataVariables();
                  loadData(page, limit, dept, office, role,search);
            });

            $('#limit_dropdown').on('change', function() {
                  var page = 1;
                  var [limit, dept, office, role,search] = loadDataVariables();
                  loadData(page, limit, dept, office, role,search);
            });


            $('#dept_dropdown').on('change', function() {
                  var page = 1;
                  var [limit, dept, office, role,search] = loadDataVariables();
                  loadData(page, limit, dept, office, role,search);
            });

            $('#office_dropdown').on('change', function() {
                  var page = 1;
                  var [limit, dept, office, role,search] = loadDataVariables();
                  loadData(page, limit, dept, office, role,search);
            });

            $('#role_dropdown').on('change', function() {
                  var page = 1;
                  var [limit, dept, office, role,search] = loadDataVariables();
                  loadData(page, limit, dept, office, role,search);
            });

            $('#search').on('click', function() {
                  var page = 1;
                  var [limit, dept, office, role,search] = loadDataVariables();
                  loadData(page, limit, dept, office, role,search);
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