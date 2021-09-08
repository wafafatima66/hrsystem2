<div class="row mt-5">

      <div class="col-lg-6 col-sm-6">
            <form class="form-inline" method="post" action="">
                  <div class="input-group">

                        <input type="search" class="form-control" name="search">
                        <button type="submit" class="home-page-search-btn" name="submit">
                              <i class="fa fa-search"></i>
                        </button>

                        <button type="button" class="ml-3 btn button-1" data-toggle="modal" data-target="#addemployee">Add</button>


                  </div>
            </form>
      </div>


</div>

<div class="table-container">

<table class='table home-page-table mt-2 table-striped table-responsive-sm '>
      <thead>
            <tr>
                  <th scope='col'>Employee Id</th>
                  <th scope='col'>Name</th>
                  <th scope='col'>Sex</th>
                  <th scope='col'>Status</th>
                  <th scope='col'>Position</th>
                  <th scope='col'>Office/Unit</th>
            </tr>
      </thead>

      <?php


      if (isset($_POST['submit'])) {

            $search = $_POST['search'];

            $sql = "SELECT e.id, e.emp_id , e.emp_first_name , e.emp_last_name , e.emp_middle_name , e.emp_ext , e.emp_gender , p.job_type , p.office , p.position  FROM employee e join employee_agency p on e.emp_id = p.emp_id 
      WHERE e.emp_first_name LIKE '%{$search}%' OR e.emp_last_name LIKE '%{$search}%' OR e.emp_id LIKE '%{$search}%'";

            $result = mysqli_query($conn, $sql);

            $output = '';

            if (mysqli_num_rows($result) > 0) {

                  $output .= "<tbody>";

                  while ($mydata = mysqli_fetch_array($result)) {
                        $output .= "<tr class='clickable-row' data-href='../emp_mang/emp_profile.php?id={$mydata["id"]}' >
      <td>{$mydata['emp_id']}</td>
      <td>
            <img src='../img/logo-2.png' alt='' style='width: 20px; height:20px'>
            <span> {$mydata['emp_first_name']}  {$mydata['emp_middle_name']} {$mydata['emp_last_name']} {$mydata['emp_ext']} </span>
      </td>
      <td> {$mydata['emp_gender']} </td>
      <td>{$mydata['job_type']}</td>
      <td>{$mydata['position']}</td>
      <td>{$mydata['office']}</td>
</tr>";
                  }
                  $output .= "</tbody>
";

                  echo $output;
            }
      } else {
            // echo '<div id="table-data"> </div>' ; 
            include "pagination.php";
      }
      ?>

</table>
</div>

<div class=" d-flex justify-content-between mt-4 ">

<button class="btn button-1 " style="height:35px"><i class="fa fa-print"></i></button>
</div>

<?php include "../add_emp/add_emp_modal.php"; ?>


<script type="text/javascript">
      //   $(document).ready(function(){
      //     function loadData(page){
      //       $.ajax({
      //         url  : "../home/pagination.php",
      //         type : "POST",
      //         cache: false,
      //         data : {page_no:page},
      //         success:function(response){
      //           $("#table-data").html(response);
      //         }
      //       });
      //     }
      //     loadData();

      //     // Pagination code
      //     $(document).on("click", ".pagination li a", function(e){
      //       e.preventDefault();
      //       var pageId = $(this).attr("id");
      //       loadData(pageId);
      //     });
      //   });
</script>