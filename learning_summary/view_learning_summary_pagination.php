<?php
session_start();
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

if (isset($_POST['emp_id'])  && (!empty($_POST['emp_id']))) {
	
	$emp_id = $_POST['emp_id'];
}

// echo $emp_id ; 
// die ; 
$offset = ($page_no - 1) * $limit;

$add1 = "where 1";
$add2 = "";
$add3 = "";




$query = "SELECT t.* , concat(e.emp_first_name , e.emp_middle_name, e.emp_last_name) as emp_full_name from emp_training t join employee e on e.emp_id = t.emp_id " . $add1 . " " . $add2 . "" . $add3 . " and t.learning_id is null and t.emp_id = '$emp_id' ORDER BY id DESC LIMIT $offset, $limit";


$result = mysqli_query($conn, $query);

$output = '';

$output .= "<table class='table home-page-table mt-3 table-striped ' >
	<thead>
		  <tr>
		  		<th >ID</th>
				<th >Title Seminar/ Conference/ Workshop/ Short Courses</th>
				<th >Inclusive Dates</th>
				<th >No Of Hrs</th>
				<th >Sponsored By</th>
				<th >Type of L & D</th>
		  </tr>
	</thead>
	<tbody>";

if (mysqli_num_rows($result) > 0) {

	$i= 1 ;
	while ($mydata = mysqli_fetch_assoc($result)) {
	
		{

		$leave_from = date("m/d/Y", strtotime($mydata['training_from_date']));
		$leave_to = date("m/d/Y", strtotime($mydata['training_to_date']));

		$output .= "
        
        <tr>

		<td>{$i}</td>
		<td> {$mydata['title_of_training']} </td>
		<td> {$leave_from}  -  {$leave_to} </td>
		<td> {$mydata['training_no_of_hrs']} </td>
		<td> {$mydata['training_conducted_by']} </td>
		<td> {$mydata['training_type_of_position']} </td> 
        
        </tr>";
	
  $i++;

		}
	
}


	$output .= "</tbody>
	</table>";

	// pagination

	$sql = "SELECT id FROM emp_training where learning_id is null and emp_id = '$emp_id'";
	$records = mysqli_query($conn, $sql);
	$totalRecords = mysqli_num_rows($records);
	$totalPage = ceil($totalRecords / $limit);
	$showpageli = 3;
	

	$output .= '<div class=" d-flex justify-content-between mt-4 ">
	<div>
	
	<a href="" class="btn button-1 mr-3" style="height:35px"><i class="fas fa-sync-alt"></i></a>
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
	$output .= "<tr><td colspan='7'>No data Available</td> </tr></tbody></table>";
	echo $output;
}


?>

