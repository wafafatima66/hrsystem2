<?php include '../config.php';

include SITE_ROOT .'/includes/header.php'; ?>
<div class="container ">
      <div class="row">

            <div class="col-lg-4 col-sm-6 home-page-col">
                  <div class="home-col-box" style="background-color: #A8E5E9 ;">
                        <div class="row">
                              <div class="col" style="border-right: solid #6DC7CD 1px;">Male <span>67</span></div>
                              <div class="col">Female <span>67</span></div>
                        </div>

                  </div>
                  <div class="home-col-box-title" style="background-color: #6DC7CD ;">
                        <h4 class="text-center">Permanent</h4>
                  </div>
            </div>

            <div class="col-lg-4 col-sm-6 home-page-col">
                
                  <div class="home-col-box" style="background-color: #EE999F ;">
                        <div class="row">
                              <div class="col" style="border-right: solid #CE787E 1px;">Male <span>67</span></div>
                              <div class="col">Female <span>67</span></div>
                        </div>

                  </div>
                  
                  <div class="home-col-box-title" style="background-color: #CE787E  ;">
                        <h4 class="text-center">Casual</h4>
                  </div>
            </div>

            <div class="col-lg-4 col-sm-6 home-page-col">
                  <div class="home-col-box" style="background-color: #F7CB75 ;">
                        <div class="row">
                              <div class="col" style="border-right: solid #B99653 1px;">Male <span>67</span></div>
                              <div class="col">Female <span>67</span></div>
                        </div>

                  </div>
                  <div class="home-col-box-title" style="background-color: #B99653 ;">
                        <h4 class="text-center">Job Order</h4>
                  </div>
            </div>

           
      </div>
      <!-- end of first part -->

      <?php include "../home/emp_mang_section.php";?>

      <!-- <div class="row mt-5">
            <div class="col-lg-3 col-sm-6">
                  <div class="input-group">
                        <input type="search" class="form-control">
                        <button type="button" class="home-page-search-btn">
                              <i class="fa fa-search"></i>
                        </button>
                        <button class="ml-3 btn button-1">Add</button>
                  </div>

            </div>

            <div class="ml-auto col-lg-3 col-sm-6">
                  <div class="dropdown">
                        <button class=" btn dropdown-toggle home-page-dropdown" type="button" id="dropdownMenuButton"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Filter By
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                  </div>
            </div>
      </div>

      <table class="table home-page-table mt-2 table-striped ">
            <thead>
                  <tr>
                        <th scope="col">Employee Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Status</th>
                        <th scope="col">Position</th>
                        <th scope="col">Office/Unit</th>
                  </tr>
            </thead>
            <tbody>
                  <tr class="clickable-row" data-href='emp_profile.php?emp_id=1'>
                        <th scope="row">1</th>
                        <td>
                              <img src="../img/logo-2.png" alt="" style="width: 20px; height:20px">
                              <span>Otto</span>
                        </td>
                        <td>Mark</td>
                        <td>@mdo</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                  </tr>
                  <tr>
                        <th scope="row">2</th>
                        <td>
                              <img src="../img/logo-2.png" alt="" style="width: 20px; height:20px">
                              <span>Otto</span></td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                  </tr>
                  <tr>
                        <th scope="row">2</th>
                        <td>
                              <img src="../img/logo-2.png" alt="" style="width: 20px; height:20px;">
                              <span>Otto</span>
                        </td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                  </tr>

            </tbody>
      </table> -->
</div>

<script>
      jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>