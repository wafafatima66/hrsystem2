<!-- SIDE MENU BAR -->
<aside class="app-sidebar"> 
    <div class="app-sidebar__logo">
        <a class="header-brand" href="../home/">
            <img src="<?php echo $admin_photo_to_show ?>" class="header-brand-img desktop-lgo " alt="Admintro logo">
                <h6 class="main-layout-logo-h6"><?php echo $row['username'] ?></h6>
            <p class="main-layout-logo-p"><?php echo $row['role'] ?></p>
            <img src="../assets/img/brand/favicon.png" class="header-brand-img mobile-logo" alt="Admintro logo">
        </a>
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

    <ul class="side-menu app-sidebar3" >
     
    <?php if ($row['role'] == 'Super Administrator') { ?>


        

    <!-- <li class="side-item side-item-category mt-4 ">Admin Dashboard</li> -->

        <li class="slide ">
            <a class="side-menu__item <?php active('home'); ?>" href="../home/">
                <span class="side-menu__icon "><i class="fa fa-home"></i></span>
                <span class="side-menu__label">Dashboard</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item <?php active('emp_mang'); ?>" href="../emp_mang/">
                <span class="side-menu__icon "><i class="fas fa-users"></i></span>
                <span class="side-menu__label">Employee Management</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item <?php active('leave_mang'); ?>" href="../leave_mang/">
                <span class="side-menu__icon "><i class="fa fa-calendar"></i></span>
                <span class="side-menu__label">Leave Management</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item <?php active('performance_mang'); ?>" href="../performance_mang/">
                <span class="side-menu__icon "><i class="fas fa-chart-line"></i></span>
                <span class="side-menu__label">Performance Management</span>
            </a>
        </li>
        
        <li class="slide ">
            <a class="side-menu__item <?php learning_active(); ?>" data-toggle="slide" href="#learning_menus">
                <span class="side-menu__icon "><i class="fas fa-calendar-check"></i></span>
                <span class="side-menu__label">Learning & Development</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">
                <li><a href="../learning" class="slide-item <?php list_active('learning'); ?>">Trainings & Seminars</a></li>

                <li><a href="../learning_summary" class="slide-item <?php list_active('learning_summary'); ?>">Summary of Trainings</a></li>

                <li><a href="../learning_post" class="slide-item <?php list_active('learning_post'); ?>">Posted Trainings</a></li>
            </ul>
        </li>

        <li class="slide ">
            <a class="side-menu__item <?php hiring_active(); ?>" data-toggle="slide" href="#hiring_menus">
                <span class="side-menu__icon "><i class="fas fa-calendar-check"></i></span>
                <span class="side-menu__label">Hiring &
              Appointment</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">
                <li><a href="../hiring_item" class="slide-item <?php list_active('hiring_item'); ?>">Item Management</a></li>

                <li><a href="../hiring_publication" class="slide-item <?php list_active('hiring_publication'); ?>">Publication Management</a></li>

                <li><a href="../hiring_resignation" class="slide-item <?php list_active('hiring_resignation'); ?>">Termination Management</a></li>
            </ul>
        </li>
        
        <li class="slide">
            <a class="side-menu__item <?php active('report_mang'); ?>" href="../report_mang/">
                <span class="side-menu__icon "><i class="fas fa-copy"></i></span>
                <span class="side-menu__label">Reports Management</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item <?php active('user_mang'); ?>" href="../user_mang/">
                <span class="side-menu__icon "><i class="fas fa-user"></i></span>
                <span class="side-menu__label">User Management</span>
            </a>
        </li>
       

        <?php

        } else if ($row['role'] == 'Employee' || $row['role'] == 'Division Head' || $row['role'] == 'Supervisor' || $row['role'] == 'HR Administrator' || $row['role'] == 'Agency Head') {

          $emp_id = $row['emp_id'];
          $sql = "SELECT id FROM employee WHERE emp_id = '$emp_id'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $id = $row['id'];
        ?>

        <li class="slide">
            <a class="side-menu__item <?php active('emp_mang'); ?>" href="../emp_mang/emp_profile.php?id=<?php echo $id ?>">
                <span class="side-menu__icon "><i class="fas fa-user"></i></span>
                <span class="side-menu__label">Profile Management</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item <?php active('leave_mang'); ?>" href="../leave_mang/">
                <span class="side-menu__icon "><i class="fa fa-calendar"></i></span>
                <span class="side-menu__label">Leave Management</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item <?php active('performance_mang'); ?>" href="../performance_mang/emp_profile.php?id=<?php echo $id ?>">
                <span class="side-menu__icon "><i class="fa fa-chart-line"></i></span>
                <span class="side-menu__label">Performance Management</span>
            </a>
        </li>

        <!-- <li class="slide">
            <a class="side-menu__item <?php active('learning'); ?>" href="../learning/">
                <span class="side-menu__icon "><i class="fa fa-chalkboard-teacher"></i></span>
                <span class="side-menu__label">Learning &
              Development</span>
            </a>
        </li> -->

        <li class="slide ">
            <a class="side-menu__item <?php learning_active(); ?>" data-toggle="slide" href="#learning_menus">
                <span class="side-menu__icon "><i class="fas fa-calendar-check"></i></span>
                <span class="side-menu__label">Learning & Development</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">
                <li><a href="../learning" class="slide-item <?php list_active('learning'); ?>">Trainings & Seminars</a></li>

                <li><a href="../learning_summary" class="slide-item <?php list_active('learning_summary'); ?>">Summary of Trainings</a></li>

                <li><a href="../learning_post" class="slide-item <?php list_active('learning_post'); ?>">Posted Trainings</a></li>
            </ul>
        </li>

        <li class="slide">
            <a class="side-menu__item <?php active('emp_hiring'); ?>" href="../emp_hiring/">
                <span class="side-menu__icon "><i class="fa fa-chalkboard-teacher"></i></span>
                <span class="side-menu__label">Hiring &
              Appointment</span>
            </a>
        </li>

        <?php  } else { ?>
            <li class="slide">
            <a class="side-menu__item <?php active('home'); ?>" href="../home/">
                <span class="side-menu__icon "><i class="fa fa-home"></i></span>
                <span class="side-menu__label">Dashboard</span>
            </a>
        </li>
        <?php } ?>

        <div class="text-center mt-3 ">
          <img src="../loginassets/images/login.png" alt="" style="" class="nav-aside-footer-logo">
        </div>
        
        
    </ul>
   
   
</aside>
<!-- END SIDE MENU BAR -->