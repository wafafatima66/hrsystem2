<?php
if (isset($_POST['edit_user'])) {


      $emp_id = $_POST['emp_id'];
      $emp_name = $_POST['emp_name'];
      $role = $_POST['role'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $department = $_POST['department'];
      $office = $_POST['office'];

    //   $del_query = "Delete FROM users WHERE emp_id = '$emp_id'";
    //   $runquery = $conn->query($del_query);


      // $query = "SELECT username FROM users WHERE username = '$username'";
      // $runquery = $conn->query($query);
      // $rowcount = mysqli_num_rows($runquery);
      // if ($rowcount > 0) {
      //       echo  '<script>toastr.error("Username exist . Try again with new username !")</script>';
      // } else {
       
            // $sql1 = "INSERT INTO users (
            // emp_id  , role , username , password , name , department , office  ) VALUES (  '$emp_id'  , '$role' , '$username' ,'$password' , '$emp_name' ,'$department' , '$office' )
            // ON DUPLICATE KEY UPDATE
            //   role = '$role',
            //   password = '$password',
            //   username='$username',
            //   name = '$emp_name',
            //   department = '$department',
            //         office = '$office'
            //   ";

            $sql1 = "UPDATE users
            SET role='$role', username='$username', password = '$password' , department = '$department' , office = '$office'
            WHERE emp_id='$emp_id'";

            if (mysqli_query($conn, $sql1)) {
                  echo  '<script>toastr.success("User updated successfully")</script>';
            } else {
                  echo  '<script>toastr.error("User not updated . Try again !")</script>';
            }
      // }
}

if (isset($_POST['add_user'])) {

      // $nature = 'Original';
      $emp_id = $_POST['emp_id'];
      $emp_name = $_POST['emp_name'];
      $role = $_POST['role'];
      $username = $_POST['username'];
      $password = $_POST['password'];


      $query = "SELECT username FROM users WHERE username = '$username'";
      $runquery = $conn->query($query);
      $rowcount = mysqli_num_rows($runquery);
      if ($rowcount > 0) {
            echo  '<script>toastr.error("Username exist . Try again with new username !")</script>';
      } else {

        $query = "SELECT area_wrk_assign,division FROM item where emp_id = '$emp_id'";

	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) > 0) {
            while ($mydata = mysqli_fetch_assoc($result)) {
                 $department =  $mydata['division'];
                 $office =  $mydata['area_wrk_assign'];
            }
      }else {
            $department =  "";
                 $office =  "";
      }

            $sql1 = "INSERT INTO users (
                  emp_id  , role , username , password , name , department , office  ) VALUES (  '$emp_id'  , '$role' , '$username' ,'$password' , '$emp_name' ,'$department' , '$office' )
                  ON DUPLICATE KEY UPDATE
                    role = '$role',
                    password = '$password',
                    username='$username',
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
           emp_id , name ,  role  , department , username ) VALUES (  '$emp_id' , '$emp_name' ,'$role' , '$department_name' , '$emp_id' )
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
            emp_id , name ,  role  , department , office , username ) VALUES (  '$emp_id' , '$emp_name' ,'$role' , '$department_name' , '$office_name' , '$emp_id' )
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
