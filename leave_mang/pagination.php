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

if (isset($_POST['from_date']) && isset($_POST['to_date'] )) {

	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];

	$query = "SELECT a.id, a.emp_id , a.type_of_leave , a.details_of_leave , a.no_of_working_days, b.emp_first_name , b.emp_middle_name , b.emp_last_name , b.emp_ext from emp_leaves a join employee b where a.emp_id = b.emp_id and a.leave_from_date BETWEEN  '$from_date' AND '$to_date' LIMIT $offset, $limit";

	// $showlimit = $limit ;

} else {

	$query = "SELECT a.id, a.emp_id , a.type_of_leave , a.details_of_leave , a.no_of_working_days, b.emp_first_name , b.emp_middle_name , b.emp_last_name , b.emp_ext from emp_leaves a join employee b where a.emp_id = b.emp_id  LIMIT $offset, $limit";

	// $showlimit = $limit ; 
}



$result = mysqli_query($conn, $query);

$output = '';

$output .= "<table class='table home-page-table mt-5 table-striped '>
	<thead>
		  <tr>
				<th scope='col'>Employee Id</th>
				<th scope='col'>Name</th>
				<th scope='col'>Type Of Leave</th>
				<th scope='col'>Duration</th>
				<th scope='col'>Details of leave</th>
				<th scope='col'>Action</th>
		  </tr>
	</thead>
	<tbody>";

if (mysqli_num_rows($result) > 0) {



	while ($mydata = mysqli_fetch_assoc($result)) {

		$output .= "
	
	<tr>
                        <td>{$mydata['emp_id']}</td>
                        <td>
                              <img src='../img/logo-2.png' alt='' style='width: 20px; height:20px'>
                              <span> {$mydata['emp_first_name']}  {$mydata['emp_middle_name']} {$mydata['emp_last_name']} {$mydata['emp_ext']} </span>
                        </td>
                        <td> {$mydata['type_of_leave']} </td>
                        <td>{$mydata['no_of_working_days']}</td>
                        <td>{$mydata['details_of_leave']}</td>
                        <td><a  data-toggle='modal' data-id='{$mydata['id']}' data-target='#edit_leave' class='leave-edit' ><i class='fas fa-edit '></i></a> </td>
                  </tr>";
	}

	$output .= "</tbody>
	</table>";


	// pagination

	$sql = 'SELECT id  FROM emp_leaves';
	$records = mysqli_query($conn, $sql);
	$totalRecords = mysqli_num_rows($records);
	$totalPage = ceil($totalRecords / $limit);
	$showpageli = 3;
	// $totalRows = ceil(  $totalPage / ($limit  * $totalRecords )  );

	$output .= '<div class=" d-flex justify-content-between mt-4 ">
	<div>
	<button class="btn button-1 mr-3" style="height:35px"><i class="fa fa-print"></i></button>
	<p class="text-lowercase " style="display: contents;">' . $limit . ' ' . "of" . '  ' . $totalRecords . '</p></div>';


	$adjacents = 1;
	$lpm1 = $totalPage - 1;
	$prev = $page_no - 1;                          //previous page is page - 1
	$next = $page_no + 1;                          //next page is page + 1


	$output .= "<ul class='pagination'>";

	include "../includes/pagination_ul.php"; //getting pagination to work

	$output .= '</ul> </div>';
	echo $output;

} else {

	$output .= "<tr><td colspan='6'>No data Available</td> </tr></tbody></table>";
	echo $output;
}



?>


<script>

	$(".leave-edit").click(function() {

		$.ajax({
			type: 'POST',
			url: 'get_status_details.php',
			data: {
				id: $(this).data("id")
			},
			success: function(data) {
				$("#view_status_details").html(data);
			}
		});
	});
</script>