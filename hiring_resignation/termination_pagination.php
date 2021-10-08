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

  $query = "SELECT t.*  ,  e.emp_first_name , e.emp_last_name , e.emp_middle_name , e.emp_ext from termination t join employee e on e.emp_id = t.emp_id LIMIT $offset, $limit ";

$result = mysqli_query($conn, $query);

$output = '';

$output .= '<table class="table home-page-table mt-4 table-striped table-responsive-sm">
<thead>
  <tr>
    <th scope="col">Employee ID</th>
    <th scope="col">Name</th>
    <th scope="col">Reason for termination</th>
    <th scope="col">Effective Date</th>
    <th scope="col">Remarks</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>';

if (mysqli_num_rows($result) > 0) {
  while ($mydata = mysqli_fetch_assoc($result)) {

    $output .= "<tr>" ;
    $output .=  "<td>{$mydata['emp_id']}</td>
        <td> {$mydata['emp_first_name']}  {$mydata['emp_middle_name']} {$mydata['emp_last_name']} {$mydata['emp_ext']} </td>
        <td>{$mydata['termination_reason']}</td>
        <td>{$mydata['date_of_effectivity']}</td>
        <td>{$mydata['termination_details']}</td>
        <td>

        <a class='view_termination_btn' data-toggle='modal' data-target='#view_termination' data-id='{$mydata['id']}'><i class='fa fa-edit mx-2'></i></a>
               
        <a href='' class='delete_modal' data-toggle='modal' data-target='#delete_modal' data-id='termination_id={$mydata['id']}'><i class='fa fa-trash mx-2'></i></a>


              </td>
        </tr>";

 }

  $output .= "</tbody> </table> ";

  

  // pagination

  $sql = 'SELECT id FROM termination';

  $records = mysqli_query($conn, $sql);
  $totalRecords = mysqli_num_rows($records);
  $totalPage = ceil($totalRecords / $limit);
  $showpageli = 3;

  $output .= '<div class=" d-flex justify-content-between mt-4 ">
              <div>
              <a href="" class="btn button-1 mr-3" style="height:35px" id="publication_print"><i class="fa fa-print"></i></a>
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
?>


<script>
$(".view_termination_btn").click(function() {
  // console.log('hi');
  $.ajax({
    type: 'POST',
    url: 'get_termination_details.php',
    data: {
      id: $(this).data("id")
    },
    success: function(data) {
      $("#view_termination_details").html(data); //the data is displayed in id=display_details
    }
  });
});

</script>