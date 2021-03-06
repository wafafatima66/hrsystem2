<?php

include SITE_ROOT . '/includes/link.php';

require SITE_ROOT . '/includes/conn.php';

session_start();

if (!isset($_SESSION['login_user'])) {
  header("location:../index.php");
  die();
} else {

  $user = $_SESSION['login_user'];
  // $sql = mysqli_query($conn, "select * from users where id = '$user' ");
  $sql = mysqli_query($conn, "select u.* , i.division , i.area_wrk_assign from users u join item i on u.emp_id = i.emp_id where u.id =  '$user' ");
  $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
  $emp_id = $row['emp_id'];

  if ($row['role'] == 'Super Administrator') {
    $admin_photo_to_show = '../img/' . $row['admin_photo'];
  } else {
    $sql1 = mysqli_query($conn, "select emp_image from employee where emp_id = '$emp_id' ");
    $row1 = mysqli_fetch_array($sql1, MYSQLI_ASSOC);
    $admin_photo_to_show = '../emp_img/' . $row1['emp_image'];
  }

  $_SESSION['user_role'] = $row['role'];
  $_SESSION['user_name'] = $row['username'];
  $_SESSION['emp_id'] = $row['emp_id'];
  // $_SESSION['department'] = $row['department'];
  // $_SESSION['office'] = $row['office'];

  if (empty($row['department'])) {
    $_SESSION['department']= $row['division'];
  } else {
    $_SESSION['department'] = $row['department'];
  } //trying to keep department assigned in users 

  if (empty($row['office'])) {
    $_SESSION['office'] = $row['area_wrk_assign'];
  } else {
    $_SESSION['office'] = $row['office'];
  } //trying to keep office assigned in users
  
}

?>

<div class="container-fluid">
  <div class="row d-flex d-md-block flex-nowrap wrapper">

    <div class="col-md-3 float-left col-1 pl-0 pr-0 collapse width show" id="sidebar">

      <div class="list-group border-0 text-center text-md-left">

        <div class="text-center mt-3 main-layout-logo">
          <img src="<?php echo $admin_photo_to_show ?>" alt="">
          <h6><?php echo $row['username'] ?></h6>
          <p><?php echo $row['role'] ?></p>
        </div>


        <?php

        // for highling active menu 

        function active($currect_page)
        {
          $url_array =  explode('/', $_SERVER['REQUEST_URI']);
          $url =  $url_array[2];
          if ($currect_page == $url) {
            echo 'menu-active'; //class name in css 
          }
        }

        function hiring_active()
        {
          $url_array =  explode('/', $_SERVER['REQUEST_URI']);
          $url =  $url_array[2];
          if ($url == 'hiring_item' || $url == 'hiring_publication' || $url == 'hiring_resignation') {
            echo 'menu-active'; //class name in css 
          }
        }

        function list_active($currect_page)
        {
          $url_array =  explode('/', $_SERVER['REQUEST_URI']);
          $url =  $url_array[2];
          if ($currect_page == $url) {
            echo 'list-active'; //class name in css 
          }
        }

        function learning_active()
        {
          $url_array =  explode('/', $_SERVER['REQUEST_URI']);
          $url =  $url_array[2];
          if ($url == 'learning' || $url == 'learning_summary' || $url == 'learning_post') {
            echo 'menu-active'; //class name in css 
          }
        }
        ?>

        <?php if ($row['role'] == 'Super Administrator') { ?>

          <a href="../home/" class="list-group-item d-inline-block collapsed  <?php active('home'); ?>">
            <span class="d-none d-md-inline">Dashboard</span> <i class="fa fa-home"></i>
          </a>

          <a href="../emp_mang/" class="list-group-item d-inline-block collapsed <?php active('emp_mang'); ?>"><span class="d-none d-md-inline">Employee
              Management</span><i class="fas fa-users"></i> </a>

          <a href="../leave_mang/" class="list-group-item d-inline-block collapsed <?php active('leave_mang'); ?>"><span class="d-none d-md-inline">Leave
              Management</span><i class="fa fa-calendar"></i>
          </a>

          <a href="../performance_mang/" class="list-group-item d-inline-block collapsed <?php active('performance_mang'); ?>"><span class="d-none d-md-inline">Performance
              Management</span> <i class="fas fa-chart-line"></i>
          </a>

          <!-- <a href="../learning/" class="list-group-item d-inline-block collapsed <?php active('learning'); ?>"><span class="d-none d-md-inline">Learning &
              Development</span><i class="fas fa-chalkboard-teacher"></i> </a> -->
              <a data-toggle="collapse" href="#learning_menus" role="button" class="list-group-item d-inline-block collapsed <?php learning_active(); ?>"><span class="d-none d-md-inline">Learning & Development</span><i class="fas fa-calendar-check"></i>
          </a>

                <ul class="list-unstyled collapse" id="learning_menus">

                  <li class="float-right <?php list_active('learning'); ?>"><a href="../learning"><span class="d-md-inline ">Trainings & Seminars</span></a></li>

                  <li class="float-right <?php list_active('learning_summary'); ?> "><a href="../learning_summary"><span class="d-md-inline ">Summary of Trainings</span></a></li>

                  <li class="float-right <?php list_active('learning_post'); ?> "><a href="../learning_post"><span class="d-md-inline ">Posted Trainings</span></a></li>

                  </ul>

          <a data-toggle="collapse" href="#hiring_menus" role="button" class="list-group-item d-inline-block collapsed <?php hiring_active(); ?>"><span class="d-none d-md-inline">Hiring &
              Appointment</span><i class="fas fa-calendar-check"></i>
          </a>

          <ul class="list-unstyled collapse" id="hiring_menus">

            <li class="float-right <?php list_active('hiring_item'); ?>"><a href="../hiring_item"><span class="d-md-inline ">Item Management</span></a></li>

            <li class="float-right <?php list_active('hiring_publication'); ?> "><a href="../hiring_publication"><span class="d-md-inline ">Publication Management</span></a></li>

            <li class="float-right <?php list_active('hiring_resignation'); ?>"><a href="../hiring_resignation"><span class="d-md-inline ">Termination Management</span></a></li>

          </ul>
          <!-- 
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Cras justo odio</li>
      
      </ul> -->

          <a href="../report_mang/" class="list-group-item d-inline-block collapsed <?php active('report_mang'); ?> " id="myDIV"><span class="d-none d-md-inline">Reports
              Management</span><i class="fas fa-copy"></i>
          </a>

          <a href="../user_mang/" class="list-group-item d-inline-block collapsed <?php active('user_mang'); ?> " id="myDIV"><span class="d-none d-md-inline">User Management</span><i class="fa fa-user"></i>
          </a>

        <?php

        } else if ($row['role'] == 'Employee' || $row['role'] == 'Division Head' || $row['role'] == 'Supervisor' || $row['role'] == 'HR Administrator' || $row['role'] == 'Agency Head') {

          $emp_id = $row['emp_id'];
          $sql = "SELECT id FROM employee WHERE emp_id = '$emp_id'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $id = $row['id'];
        ?>

          <a href="../emp_mang/emp_profile.php?id=<?php echo $id ?>" class="list-group-item d-inline-block collapsed <?php active('emp_mang'); ?>"><span class="d-none d-md-inline">Profile Management</span><i class="fas fa-users"></i> </a>

          <!-- <a href="../emp_leave_mang/index.php?emp_id=<?php echo $emp_id ?>" class="list-group-item d-inline-block collapsed <?php active('emp_leave_mang'); ?>"><span class="d-none d-md-inline">Leave
              Application</span><i class="fa fa-calendar"></i>
          </a> -->

          <a href="../leave_mang/" class="list-group-item d-inline-block collapsed <?php active('leave_mang'); ?>"><span class="d-none d-md-inline">Leave
              Management</span><i class="fa fa-calendar"></i>
          </a>

          <a href="../performance_mang/emp_profile.php?id=<?php echo $id ?>" class="list-group-item d-inline-block collapsed <?php active('performance_mang'); ?>"><span class="d-none d-md-inline">Performance
              Submission</span> <i class="fas fa-chart-line"></i>
          </a>

          <a href="../learning/" class="list-group-item d-inline-block collapsed <?php active('learning'); ?>"><span class="d-none d-md-inline">Learning &
              Development</span><i class="fas fa-chalkboard-teacher"></i> </a>

          <a href="../emp_hiring/" class="list-group-item d-inline-block collapsed <?php active('emp_hiring'); ?>"><span class="d-none d-md-inline">Hiring &
              Appointment</span><i class="fas fa-calendar-check"></i>
          </a>


        <?php 
        // } 

        // else if ($row['role'] == 'Supervisor' || $row['role'] == 'HR Administrator' || $row['role'] == 'Agency Head') {

          // $emp_id = $row['emp_id'];
          // $sql = "SELECT department , office FROM users WHERE emp_id = '$emp_id'";
          // $result = mysqli_query($conn, $sql);
          // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          // $_SESSION['department'] = $row['department'];
          // $_SESSION['office'] = $row['office'];
        ?>
          <!-- <a href="../home/" class="list-group-item d-inline-block collapsed  <?php active('home'); ?>">
            <span class="d-none d-md-inline">Dashboard</span> <i class="fa fa-home"></i>
          </a>

          <a href="../leave_mang/" class="list-group-item d-inline-block collapsed <?php active('leave_mang'); ?>"><span class="d-none d-md-inline">Leave
              Management</span><i class="fa fa-calendar"></i>
          </a> -->


        <?php 

        // } 
        
        } else { ?>
          <a href="../home/" class="list-group-item d-inline-block collapsed  <?php active('home'); ?>">
            <span class="d-none d-md-inline">Dashboard</span> <i class="fa fa-home"></i>
          </a>
        <?php } ?>

        <div class="text-center mt-3 ">
          <img src="../loginassets/images/login.png" alt="" style=" bottom: 0; width: 200px; margin: 20px 10px 40px 50px ; height:200px">
        </div>
        <?php  ?>

      </div>

    </div>

    <main class="col-md-9 float-left col main">
      <!-- <a href="#" data-target="#sidebar" data-toggle="collapse"><i
          class="text-dark fa fa-navicon fa-lg py-2 p-1"></i></a> -->
      <nav class="navbar main-header ">
        <h4 class="">HUMAN RESOURCES MANAGEMENT SYSTEM</h4>
        <div class="text-right">
          <a href="../account_mang/"><i class="fas fa-cog mr-3"></i></a>
          <a href="../includes/logout.php">
            <i class="fas fa-sign-out-alt mr-3"></i>
          </a>
        </div>
      </nav>

      <div class="page-body">

        <!---End of Main header-->