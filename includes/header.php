<?php 


include SITE_ROOT . '/includes/link.php';

require SITE_ROOT.'/includes/conn.php';

session_start();

if(!isset($_SESSION['login_user'])){
   header("location:../index.php");
   die();
} else {

  $user= $_SESSION['login_user'];
  $sql = mysqli_query($conn,"select * from users where id = '$user' ");
   
   $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
   $admin_photo_to_show = '../img/'.$row['admin_photo'];

}

?>

<div class="container-fluid">
  <div class="row d-flex d-md-block flex-nowrap wrapper">

    <div class="col-md-3 float-left col-1 pl-0 pr-0 collapse width show" id="sidebar">

      <div class="list-group border-0 text-center text-md-left">

        <div class="text-center mt-3 main-layout-logo" >
          <img src="<?php echo $admin_photo_to_show?>" alt="" >
          <h6><?php echo $row['name']?></h6>
          <p><?php echo $row['role']?></p>
        </div>


<?php

// for highling active menu 

function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url =  $url_array[2];
  if($currect_page == $url){
      echo 'menu-active'; //class name in css 
  } 
}

function hiring_active(){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url =  $url_array[2];
  if($url == 'hiring_item' || $url == 'hiring_publication' || $url == 'hiring_resignation' ){
      echo 'menu-active'; //class name in css 
  } 
}

function list_active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url =  $url_array[2];
  if($currect_page == $url){
      echo 'list-active'; //class name in css 
  } 
}

?>

<?php if($row['role'] == 'Super Administrator'){ ?>

<a href="../home/" class="list-group-item d-inline-block collapsed  <?php active('home');?>" >
<span class="d-none d-md-inline">Dashboard</span> <i class="fa fa-home"></i>
</a>

<a href="../emp_mang/" class="list-group-item d-inline-block collapsed <?php active('emp_mang');?>"><span class="d-none d-md-inline">Employee
    Management</span><i class="fas fa-users"></i> </a>

<a href="../leave_mang/" class="list-group-item d-inline-block collapsed <?php active('leave_mang');?>"><span class="d-none d-md-inline">Leave
    Management</span><i class="fa fa-calendar"></i>
</a>

<a href="../performance_mang/" class="list-group-item d-inline-block collapsed <?php active('performance_mang');?>"><span class="d-none d-md-inline">Performance
    Management</span> <i class="fas fa-chart-line"></i>
</a>

<a href="../learning/" class="list-group-item d-inline-block collapsed <?php active('learning');?>"><span class="d-none d-md-inline">Learning &
    Development</span><i class="fas fa-chalkboard-teacher"></i> </a>

<a data-toggle="collapse" href="#hiring_menus" role="button" class="list-group-item d-inline-block collapsed <?php hiring_active() ;?>"><span class="d-none d-md-inline">Hiring &
    Appointment</span><i class="fas fa-calendar-check"></i>
</a>

  <ul class="list-unstyled collapse" id="hiring_menus">

    <li class="float-right <?php list_active('hiring_item');?>"><a href="../hiring_item"><span class="d-md-inline ">Item Management</span></a></li>

    <li class="float-right <?php list_active('hiring_publication');?> "><a href="../hiring_publication"><span class="d-md-inline ">Publication Management</span></a></li>

    <li class="float-right <?php list_active('hiring_resignation');?>"><a href="../hiring_resignation"><span class="d-md-inline ">Termination Management</span></a></li>

  </ul>
<!-- 
<ul class="list-group list-group-flush">
  <li class="list-group-item">Cras justo odio</li>
 
</ul> -->

<a href="../report_mang/" class="list-group-item d-inline-block collapsed <?php active('report_mang');?> " id="myDIV"><span class="d-none d-md-inline">Reports
    Management</span><i class="fas fa-copy"></i>
</a>

<a href="../user_mang/" class="list-group-item d-inline-block collapsed <?php active('user_mang');?> " id="myDIV"><span class="d-none d-md-inline">User Management</span><i class="fa fa-user"></i>
</a>

<?php 

}else if($row['role'] == 'Employee') {
  
  $emp_id = $row['emp_id'] ; 
  $sql = "SELECT id FROM employee WHERE emp_id = '$emp_id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $id = $row['id'] ; 
  ?>

<a href="../emp_mang/emp_profile.php?id=<?php echo $id?>" class="list-group-item d-inline-block collapsed <?php active('emp_mang');?>"><span class="d-none d-md-inline">Profile Management</span><i class="fas fa-users"></i> </a>

<a href="../emp_leave_mang/index.php?emp_id=<?php echo $emp_id?>" class="list-group-item d-inline-block collapsed <?php active('emp_leave_mang');?>"><span class="d-none d-md-inline">Leave
    Application</span><i class="fa fa-calendar"></i>
</a>

<a href="../performance_mang/emp_profile.php?id=<?php echo $id?>" class="list-group-item d-inline-block collapsed <?php active('performance_mang');?>"><span class="d-none d-md-inline">Performance
   Submission</span> <i class="fas fa-chart-line"></i>
</a>

<a href="../learning/" class="list-group-item d-inline-block collapsed <?php active('learning');?>"><span class="d-none d-md-inline">Learning &
    Development</span><i class="fas fa-chalkboard-teacher"></i> </a>

    <a href="../emp_hiring/" class="list-group-item d-inline-block collapsed <?php active('emp_hiring');?>"><span class="d-none d-md-inline">Hiring &
    Appointment</span><i class="fas fa-calendar-check"></i>
</a>


<?php } ?>

       



      </div>
    </div>

    <main class="col-md-9 float-left col main">
      <!-- <a href="#" data-target="#sidebar" data-toggle="collapse"><i
          class="text-dark fa fa-navicon fa-lg py-2 p-1"></i></a> -->
      <nav class="navbar main-header ">
        <h4 class="">HUMAN RESOURCES MANAGEMENT SYSTEM</h4>

        <div class="text-right">
        <a href="../account_mang/"><i class="fas fa-cog mr-3" ></i></a> 
        <a href="../includes/logout.php">
                  <i class="fas fa-sign-out-alt mr-3"  ></i>
                </a>
        </div>
     
              
      </nav>
     
      <div class="page-body">
    
<!---End of Main header-->