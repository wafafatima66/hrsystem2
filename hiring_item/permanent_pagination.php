

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

if (isset($_POST['search_item']) && (!empty($_POST['search_item']))) {

	$search_item = $_POST['search_item'];

	$query = "SELECT * FROM item WHERE item_no LIKE '%{$search_item}%' or  position LIKE '%{$search_item}%'  LIMIT $offset, $limit";
}

else if ( isset($_POST['dept'])  && (!empty($_POST['dept'])) && isset($_POST['office'])  && (!empty($_POST['office'])) && isset($_POST['status'])  && (!empty($_POST['status']))) {
  $dept = $_POST['dept'];
  $office = $_POST['office'];
  $status = $_POST['status'];
  if ($_POST['status'] == 'Filled') {
    $status = 1;
  } else {$status = 0;}
  $query = "SELECT * FROM item where (division = '$dept') && (area_wrk_assign = '$office') && (filled = '$status') LIMIT $offset, $limit ";
}

else if ( isset($_POST['dept'])  && (!empty($_POST['dept'])) && isset($_POST['office'])  && (!empty($_POST['office']))) {
  $dept = $_POST['dept'];
  $office = $_POST['office'];
  $query = "SELECT * FROM item where division = '$dept' && area_wrk_assign = '$office' LIMIT $offset, $limit ";
}

else if ( isset($_POST['dept'])  && (!empty($_POST['dept']))  && isset($_POST['status'])  && (!empty($_POST['status']))) {
  $dept = $_POST['dept'];
  $status = $_POST['status'];
  if ($_POST['status'] == 'Filled') {
    $status = 1;
  } else {$status = 0;}
  $query = "SELECT * FROM item where (division = '$dept')  && (filled = '$status') LIMIT $offset, $limit ";
}

else if ( isset($_POST['office'])  && (!empty($_POST['office'])) && isset($_POST['status'])  && (!empty($_POST['status']))) {
  $office = $_POST['office'];
  $status = $_POST['status'];
  if ($_POST['status'] == 'Filled') {
    $status = 1;
  } else {$status = 0;}
  $query = "SELECT * FROM item where (area_wrk_assign = '$office') && (filled = '$status') LIMIT $offset, $limit ";
}

else if (isset($_POST['dept'])  && (!empty($_POST['dept']))) {
  $dept = $_POST['dept'];
  $query = "SELECT * FROM item where (division = '$dept')  LIMIT $offset, $limit ";
}

else if (isset($_POST['office'])  && (!empty($_POST['office']))) {
  $office = $_POST['office'];
  $query = "SELECT * FROM item where  (area_wrk_assign = '$office')  LIMIT $offset, $limit ";
}

else if (isset($_POST['status'])  && (!empty($_POST['status']))) {
  if ($_POST['status'] == 'Filled') {
    $status = 1;
  } else $status = 0;
  $query = "SELECT * FROM item where filled = '$status'  LIMIT $offset, $limit ";
}

else if (empty($_POST['office'])  && empty($_POST['status']) && empty($_POST['dept'])) {
  $query = "SELECT * FROM item LIMIT $offset, $limit ";
}

$result = mysqli_query($conn, $query);

$output = '';

$output .= '<table class="table home-page-table mt-4 table-striped table-responsive-sm">
<thead>
  <tr>
    <th scope="col">Item No</th>
    <th scope="col">Plantilla</th>
    <th scope="col">Date created</th>
    <th scope="col">Department</th>
    <th scope="col">Office</th>
    <th scope="col">Status</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody >';

if (mysqli_num_rows($result) > 0) {
  while ($mydata = mysqli_fetch_assoc($result)) {

    $output .= "<tr>
        <td>{$mydata['item_no']}</td>
        <td> {$mydata['position']} </td>
        <td>{$mydata['date_created']}</td>
        <td>{$mydata['division']}</td>
        <td>{$mydata['area_wrk_assign']}</td>
        <td> " . (($mydata['filled'] == 1) ? 'Filled' : 'Unfilled') . "</td>
        
        <td> <a href='edit_item.php?item_no={$mydata['item_no']} '><i class='fa fa-edit mx-2'></i></a>
            

        <a href='' class='delete_modal' data-toggle='modal' data-target='#delete_modal' data-id='item_id={$mydata['id']}'><i class='fa fa-trash mx-2'></i></a>


         </td>
        </tr>";
  }

  $output .= "</tbody> </table> ";

  // pagination

  $sql = 'SELECT id FROM item';

  $records = mysqli_query($conn, $sql);
  $totalRecords = mysqli_num_rows($records);
  $totalPage = ceil($totalRecords / $limit);
  $showpageli = 3;

  $output .= '<div class=" d-flex justify-content-between mt-4 ">
              <div>
              <button class="btn button-1 mr-3" style="height:35px"><i class="fa fa-print"></i></button>
              <a href="index.php" class="btn button-1 mr-3" style="height:35px"><i class="fas fa-sync-alt"></i></a>
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
