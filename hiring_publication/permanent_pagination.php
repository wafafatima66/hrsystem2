<?php

// Connect database 
require '../includes/conn.php';

if (isset($_POST['limit'])) {
  $limit = $_POST['limit'];
} else {
  $limit = 10;
}

if (isset($_POST['page_no'])) {
  $page_no = $_POST['page_no'];
} else {
  $page_no = 1;
}

$offset = ($page_no - 1) * $limit;


if (isset($_POST['dept'])  && (!empty($_POST['dept']))) {
  $dept = $_POST['dept'];
  $query = "SELECT * FROM publication where department = '$dept'  LIMIT $offset, $limit ";

} 

else if (isset($_POST['office']) && (!empty($_POST['office'])) ) {
  $office = $_POST['office'];
  $query = "SELECT * FROM publication where  office = '$office'  LIMIT $offset, $limit ";
}  

else if ((isset($_POST['dept'])) && (isset($_POST['office'])) && (!empty($_POST['dept'])) && (!empty($_POST['office']))  ){

  $dept = $_POST['dept'];
  $office = $_POST['office'];
  $query = "SELECT * FROM publication where department = '$dept' and office = '$office'  LIMIT $offset, $limit ";
} 
else  {
  $query = "SELECT * FROM publication  LIMIT $offset, $limit ";
}


$result = mysqli_query($conn, $query);

$output = '';

$output .= '<table class="table home-page-table mt-4 table-striped table-responsive-sm table-sm">
<thead>
  <tr>
    <th scope="col">Date of publication</th>
    <th scope="col">Item Number</th>
    <th scope="col">Plantilla</th>
    <th scope="col">SG</th>
    <th scope="col">Department</th>
    <th scope="col">Office</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>';

if (mysqli_num_rows($result) > 0) {
  while ($mydata = mysqli_fetch_assoc($result)) {

    $output .= "<tr>
        <td>{$mydata['date_of_publication']}</td>
        <td> {$mydata['item_number']} </td>
        <td>{$mydata['plantilla']}</td>
        <td>{$mydata['salary_grade']}</td>
        <td>{$mydata['department']}</td>
        <td>{$mydata['office']}</td>
        <td><a class='view_publication_btn' data-toggle='modal' data-target='#view_publication' data-id='{$mydata['id']}'><i class='fa fa-edit mx-2'></i></a>

                <a href='applicant.php?item_no={$mydata['item_number']}'><i class='fa fa-file-alt mx-2'></i></a>

                <a href='permanent_appointment.php?item-no={$mydata['item_number']}'><i class='fa fa-user-edit mx-2'></i></a>
              </td>
        </tr>";

 }

  $output .= "</tbody> </table> ";

  // pagination

  $sql = 'SELECT id FROM publication';

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
