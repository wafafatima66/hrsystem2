
<?php

// Connect database 
require '../includes/conn.php';

if (isset($_POST['limit_cont'])) {
  $limit = $_POST['limit_cont'];
} else {
  $limit = 10;
}

if (isset($_POST['page_no_cont'])) {
  $page_no = $_POST['page_no_cont'];
} else {
  $page_no = 1;
}

$offset = ($page_no - 1) * $limit;


  $query = "SELECT * FROM cont_position  LIMIT $offset, $limit ";


$result = mysqli_query($conn, $query);

$output = '';

$output .= '<table class="table home-page-table mt-4 table-striped table-responsive-sm">
<thead>
  <tr>
      <th scope="col">Position</th>
      <th scope="col">SG</th>
      <th scope="col">Duration</th>
      <th scope="col">Date posted</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
  </tr>
</thead>
<tbody >';

if (mysqli_num_rows($result) > 0) {
  while ($mydata = mysqli_fetch_assoc($result)) {

    $output .= "<tr>
        <td>{$mydata['position_name']}</td>
        <td> {$mydata['salary_grade']} </td>
        <td>{$mydata['duration']}</td>
        <td>{$mydata['date_posted']}</td>
        <td> " . (($mydata['status'] == 1) ? 'Filled' : 'Unfilled') . "</td>
        
        <td> 

        <a href='edit_position.php?position_no={$mydata['position_no']}'><i class='fa fa-edit mx-2'></i></a>


         </td>
        </tr>";
  }

  $output .= "</tbody> </table> ";

  // pagination

  $sql = 'SELECT id FROM cont_position';

  $records = mysqli_query($conn, $sql);
  $totalRecords = mysqli_num_rows($records);
  $totalPage = ceil($totalRecords / $limit);
  $showpageli = 3;

  $output .= '<div class=" d-flex justify-content-between mt-4 ">
              <div>
              <button class="btn button-1 mr-3" style="height:35px"><i class="fa fa-print"></i></button>
              <p class="text-lowercase " style="display: contents;">' . $limit . ' ' . "of" . '  ' . $totalRecords . '</p>
              </div> ';


  $output .= "<ul class='pagination '>";

  include "../includes/pagination_ul.php"; //getting pagination to work

  $output .= '</ul> </div>';
  echo $output;
} else {

  $output .= "<tr><td colspan='6'>No data Available</td> </tr> </tbody></table>";

  echo $output;
}
