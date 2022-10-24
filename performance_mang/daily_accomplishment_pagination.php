<?php

// Connect database 
require '../includes/conn.php';

if (isset($_POST['limit'])) {
  $limit = $_POST['limit'];
} else {
  $limit = 5;
}

if (isset($_POST['page_no'])) {
  $page_no = $_POST['page_no'];
} else {
  $page_no = 1;
}

$offset = ($page_no - 1) * $limit;

if (isset($_POST['emp_id'])) {
$emp_id = $_POST['emp_id'] ; 
}
  $query = "SELECT * FROM daily_accomplishment where emp_id = '$emp_id' LIMIT $offset, $limit ";

$result = mysqli_query($conn, $query);

$output = '';

$output .= '<table class="table home-page-table mt-4 table-striped table-responsive-sm">
<thead>
  <tr>
    <th scope="col">Date</th>
    <th scope="col">Output</th>
    <th scope="col">Success Indicator (Performance Measure + Target)</th>
    <th scope="col">QTY</th>
    <th scope="col" style="width:100px" >Action</th>
  </tr>
</thead>
<tbody >';

if (mysqli_num_rows($result) > 0) {
  while ($mydata = mysqli_fetch_assoc($result)) {

    $output_description = json_decode($mydata['output_description']);
    $output_description = array_values(array_filter($output_description, 'strlen'));

    // var_dump($output_description) ; 
    // die ; 


    $ul_output = "";

        if(!empty($output_description)){
          
        for ($i = 0; $i < count($output_description); $i++) {
          $ul_output .= "<li class='text-left'> $output_description[$i] </li>" ;
        }
        
      };


      $success_description = json_decode($mydata['success_description']);
      $success_description = array_values(array_filter($success_description, 'strlen'));

    //   var_dump($success_description) ; 
    // die ;

    $ul_success = "";

        if(!empty($success_description)){
          
        for ($i = 0; $i < count($success_description); $i++) {
          $ul_success .= "<li class='text-left'> $success_description[$i] </li>" ;
        }
        
      };

    $output .= "<tr>
        <td>{$mydata['date']}</td>
        
        <td>{$ul_output}</td>
        <td>{$ul_success}</td>

        <td>{$mydata['qty']}</td>
        
        <td> <a href='edit_daily_accomplishment.php?id={$mydata['id']}'><i class='fa fa-edit mx-2'></i></a>
           
        <a href='' class='delete_modal' data-toggle='modal' data-target='#delete_modal' data-id='daily_accomplishment={$mydata['id']}&'><i class='fa fa-trash mx-2'></i></a>

         </td>
        </tr>";
  }

  $output .= "</tbody> </table> ";

  // pagination

  $sql = "SELECT id FROM daily_accomplishment where emp_id = '$emp_id' ";
  $records = mysqli_query($conn, $sql);
  $totalRecords = mysqli_num_rows($records);
  $totalPage = ceil($totalRecords / $limit);
  $showpageli = 3;

  $output .= '<div class=" d-flex justify-content-between mt-4 ">
              <div>
              
              <a class="btn button-1 mr-3" style="height:35px" id="print_daily_accomplishment"><i class="fa fa-print"></i></a>


              <p class="text-lowercase " style="display: contents;">' . $limit . ' ' . "of" . '  ' . $totalRecords . '</p>
              </div> ';
  $output .= "<ul class='pagination '>";

  include "../includes/pagination_ul.php"; //getting pagination to work

  $output .= '</ul> </div>';
  echo $output;
} else {

  $output .= "<tr><td colspan='7'>No data Available</td> </tr> </tbody></table>";

  echo $output;
}
