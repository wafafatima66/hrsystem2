<?php include '../config.php';

include SITE_ROOT .'/includes/header.php'; 

require '../includes/conn.php';

?>
<div class="container ">
      <div class="row">

            <div class="col-lg-3 col-sm-6 home-page-col">
                  <div class="home-col-box" style="background-color: #A8E5E9 ;">
                        <div class="row">
                              <div class="col" style="border-right: solid #6DC7CD 1px;">Male <span>67</span></div>
                              <div class="col">Female <span>67</span></div>
                        </div>

                  </div>
                  <div class="home-col-box-title" style="background-color: #6DC7CD ;">
                        <h4 class="text-center">Employees</h4>
                  </div>
            </div>

            <div class="col-lg-3 col-sm-6 home-page-col">
                  <div class="home-col-box" style="background-color: #EE999F ;">
                        <h2 class="text-center" style="font-size: 43px; font-weight:100;">40</h2>
                  </div>
                  <div class="home-col-box-title" style="background-color: #CE787E  ;">
                        <h4 class="text-center">Employees</h4>
                  </div>
            </div>

            <div class="col-lg-3 col-sm-6 home-page-col">
                  <div class="home-col-box" style="background-color: #F7CB75 ;">
                        <div class="row">
                              <div class="col" style="border-right: solid #B99653 1px;">Male <span>67</span></div>
                              <div class="col">Female <span>67</span></div>
                        </div>

                  </div>
                  <div class="home-col-box-title" style="background-color: #B99653 ;">
                        <h4 class="text-center">Employees</h4>
                  </div>
            </div>

            <div class="col-lg-3 col-sm-6 home-page-col">
                  <div class="home-col-box" style="background-color: #90AD7F ;">
                        <div class="row">
                              <div class="col" style="border-right: solid #6A8858 1px;">Male <span>67</span></div>
                              <div class="col">Female <span>67</span></div>
                        </div>

                  </div>
                  <div class="home-col-box-title" style="background-color: #6A8858 ;">
                        <h4 class="text-center">Employees</h4>
                  </div>
            </div>
      </div>
      <!-- end of first part -->

     
      <?php include "emp_mang_section.php";?>
     
</div>

