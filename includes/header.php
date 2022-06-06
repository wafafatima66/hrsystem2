<!--Favicon -->
<!-- <link rel="icon" href="../assets/img/brand/favicon.ico" type="image/x-icon"/> -->
<link rel="icon" href="../loginassets/images/login.png" type="image/x-icon"/>

<!-- Animate css -->
<link href="../assets/css/animated.css" rel="stylesheet" />

<!--Sidemenu css -->
<link href="../assets/css/sidemenu.css" rel="stylesheet">

<!-- P-scroll bar css-->
<link href="../assets/plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />

<!---Icons css-->
<link href="../assets/css/icons.css" rel="stylesheet" />

<!-- Style css -->
<link href="../assets/css/app.css" rel="stylesheet" />


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

    if(empty($row1['emp_image']) || is_null($row1['emp_image'] ) ){

      $admin_photo_to_show = '../assets/img/brand/logo.png';

    }else {

      $admin_photo_to_show = '../img/' . $row['admin_photo'];
      
    }

    $emp_name = 'Super Administrator';

  } else {

    $sql1 = mysqli_query($conn, "select emp_image , emp_first_name , emp_last_name , emp_middle_name from employee where emp_id = '$emp_id' ");
    $row1 = mysqli_fetch_array($sql1, MYSQLI_ASSOC);

    if(empty($row1['emp_image'])){
      $admin_photo_to_show = '../assets/img/brand/logo.png';
    }else {
      $admin_photo_to_show = '../emp_img/' . $row1['emp_image'];
    }
   
    $emp_name = $row1['emp_first_name'] . $row1['emp_middle_name'] . $row1['emp_last_name'];
  }

  $_SESSION['user_role'] = $row['role'];
  $_SESSION['user_name'] = $row['username'];
  $_SESSION['emp_id'] = $row['emp_id'];
  $_SESSION['emp_name'] = $emp_name;
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

<div class="app sidebar-mini">

	<!-- LOADER -->
	<div id="global-loader">
		<img src="../assets/img/svgs/loader3.gif" alt="loader">
	</div>
	<!-- END LOADER -->

	<!-- PAGE -->
	<div class="page">
		<div class="page-main">

			<!-- @include('layouts.nav-aside') -->
			<?php include 'nav-aside.php' ?>

			<!-- APP CONTENT -->
			<div class="app-content main-content">

				<div class="side-app">

					<?php include 'nav-top.php' ?>


					<!-- PAGE HEADER-->
					<div class="page-header mt-5-7">
						<div class="page-leftheader">
							<!-- <h4 class="page-title mb-0">{{ __('Admin Dashboard') }}</h4>
							<ol class="breadcrumb mb-2">
								<li class="breadcrumb-item"><a href=""><i class="fa fa-th-large mr-2 fs-12"></i>{{ __('Admin') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page"><a href=""> {{ __('Dashboard') }}</a></li>
							</ol> -->
						
							<?php include 'footer-script.php' ?>

</div>				
					
