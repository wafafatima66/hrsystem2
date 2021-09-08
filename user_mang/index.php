<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; 

?>

<?php 
if(isset($_GET['delete'])){
    if(isset($_GET['delete']) =='success'){
        echo  '<script>toastr.success("User deleted successfully")</script>';
    }else if(isset($_GET['delete']) =='fail'){
        echo  '<script>toastr.error("User not deleted. Try again !")</script>';
    }
}
?>

<?php
if (isset($_POST['edit_user'])) {

      // $nature = 'Original';
      $emp_id = $_POST['emp_id'];
      $role = $_POST['role'];
      // $emp_name = $_POST['emp_name'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $department = $_POST['department'];
      $office = $_POST['office'];
  
      $sql1 = "UPDATE users
      SET 
      role='$role',
      username='$username',
      password='$password',
      department='$department',
      office='$office'
      WHERE emp_id='$emp_id'";
  
  
      if (mysqli_query($conn, $sql1)) {
            echo  '<script>toastr.success("User updated successfully")</script>';
      } else {
            echo  '<script>toastr.error("User not updated . Try again !")</script>';
      }
  }

if (isset($_POST['add_user'])) {

      // $nature = 'Original';
      $emp_id = $_POST['emp_id'];
      $emp_name = $_POST['emp_name'];
      $role = $_POST['role'];
      $username = $_POST['username'];
      $password = $_POST['password'];

      $query = "SELECT emp_id,department,office FROM employee_agency where emp_id = '$emp_id'";

	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) > 0) {
            while ($mydata = mysqli_fetch_assoc($result)) {
                 $department =  $mydata['department'];
                 $office =  $mydata['office'];
            }
      }else {
            $department =  "";
                 $office =  "";
      }

      $sql1 = "INSERT INTO users (
         emp_id  , role , username , password , name , department,office ) VALUES (  '$emp_id'  , '$role' , '$username' ,'$password' , '$emp_name','$department' , '$office' )
         ON DUPLICATE KEY UPDATE
           role = '$role',
           username = '$username',
           password = '$password',
           name = '$emp_name',
           department = '$department',
           office = '$office'
           ";


      if (mysqli_query($conn, $sql1)) {
            echo  '<script>toastr.success("User added successfully")</script>';
      } else {
            echo  '<script>toastr.error("User not added. Try again !")</script>';
      }
}

if (isset($_POST['add_department'])) {

      // $nature = 'Original';
      $department_name = $_POST['department_name'];

      $sql2 = "INSERT INTO department (
           department_name   ) VALUES (  '$department_name' )";


      if (mysqli_query($conn, $sql2)) {
            echo  '<script>toastr.success("Department added successfully")</script>';
      } else {
            echo  '<script>toastr.error("Department not added. Try again !")</script>';
      }
}

if (isset($_POST['add_office'])) {

      // $nature = 'Original';
      $office_name = $_POST['office_name'];
      $department_name = $_POST['department_name'];

      $sql3 = "INSERT INTO office (
           office_name  , department_name  ) VALUES (  '$office_name' , '$department_name' )";


      if (mysqli_query($conn, $sql3)) {
            echo  '<script>toastr.success("Office added successfully")</script>';
      } else {
            echo  '<script>toastr.error("Office not added. Try again !")</script>';
      }
}

if (isset($_POST['assign_dept_head'])) {

      // $nature = 'Original';
      $emp_id = $_POST['emp_id'];
      $emp_name = $_POST['emp_name'];
      $department_name = $_POST['department_name'];
      $role = "Department Head";

      $sql4 = "INSERT INTO users (
           emp_id , name ,  role  , department ) VALUES (  '$emp_id' , '$emp_name' ,'$role' , '$department_name')
           ON DUPLICATE KEY UPDATE
           role = '$role',
           department = '$department_name'
           ";


      if (mysqli_query($conn, $sql4)) {
            echo  '<script>toastr.success("Department Head assigned successfully")</script>';
      } else {
            echo  '<script>toastr.error("Department Head  not assigned. Try again !")</script>';
      }
}

if (isset($_POST['assign_supervisor'])) {

      // $nature = 'Original';
      $emp_id = $_POST['emp_id'];
      $emp_name = $_POST['emp_name'];
      $department_name = $_POST['department_name'];
      $office_name = $_POST['office_name'];
      $role = "Supervisor";

      $sql4 = "INSERT INTO users (
            emp_id , name ,  role  , department , office  ) VALUES (  '$emp_id' , '$emp_name' ,'$role' , '$department_name' , '$office_name')
            ON DUPLICATE KEY UPDATE
           role = '$role',
           department = '$department_name',
           office = '$office_name'
            ";


      if (mysqli_query($conn, $sql4)) {
            echo  '<script>toastr.success("Office Supervisor assigned successfully")</script>';
      } else {
            echo  '<script>toastr.error("Office Supervisor not assigned. Try again !")</script>';
      }
}

?>


<div class="container mt-3">

      <h4 class="h4-heading">User Management</h4>

      <form action="" method="post">
            <div class="row ">



                  <div class="col-lg-3 col-sm-12 mt-3">
                        <input type="text" class="form-control text-input" placeholder="Type id" name="emp_id" onBlur="get_emp_name_1()" id="emp_id_1">
                  </div>

                  <div class="col-lg-3 col-sm-12 mt-3">
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
      <div class="table-container">
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
            //  echo '<div id="table-data"> </div>'; 
            include "pagination.php";
              ?>
            </table>
            </div>

            <div class=" d-flex justify-content-between mt-4 ">

	<button class="btn button-1 " style="height:35px"><i class="fa fa-print"></i></button>
      </div>


      

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
                              $query = "SELECT department_name FROM department  ";
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
                              $query = "SELECT department_name FROM department  ";
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
                              $query = "SELECT department_name FROM department  ";
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
                              $query = "SELECT office_name FROM office  ";
                              $result = mysqli_query($conn, $query);
                              if (mysqli_num_rows($result) > 0) {
                                    echo "<option value=''> Select Office/Unit </option> ";
                                    while ($mydata = mysqli_fetch_assoc($result)) {
                                          echo "<option value= '" . $mydata['office_name'] . "'>" . $mydata['office_name'] . "</option>";
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

      // $(document).ready(function() {
      //       function loadData(page) {
      //             $.ajax({
      //                   url: "pagination.php",
      //                   type: "POST",
      //                   cache: false,
      //                   data: {
      //                         page_no: page
      //                   },
      //                   success: function(response) {
      //                         $("#table-data").html(response);
      //                   }
      //             });
      //       }
      //       loadData();

      //       // Pagination code
      //       $(document).on("click", ".pagination li a", function(e) {
      //             e.preventDefault();
      //             var pageId = $(this).attr("id");
      //             loadData(pageId);
      //       });

        
      // });
</script>