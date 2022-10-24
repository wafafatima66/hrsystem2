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

$offset = ($page_no - 1) * $limit;

$add1 = "where 1";
$add2 = "";
$add3 = "";



// if (isset($_POST['from_date']) && isset($_POST['to_date']) && !empty($_POST['from_date']) && !empty($_POST['to_date'])) {

// 	$from_date = $_POST['from_date'];
// 	$to_date = $_POST['to_date'];
// 	$add2 = "and from_date BETWEEN '$from_date' AND '$to_date'";

// }


// if (isset($_POST['search_post']) && !empty($_POST['search_post'])) {

// 	$search_post = $_POST['search_post'];
// 	$add3 = "and title_of_training LIKE '%{$search_post}%' OR type_of_training LIKE '%{$search_post}%'";

// }


$query = "SELECT * from training_table " . $add1 . " " . $add2 . "" . $add3 . "  ORDER BY id DESC LIMIT $offset, $limit";


$result = mysqli_query($conn, $query);

$output = '';

$output .= "<table class='table home-page-table mt-3 table-striped ' >
	<thead>
		  <tr>
		  		<th rowspan='2'>ID</th>
				<th rowspan='2'>Proponent</th>
				<th rowspan='2'>Classification T/W/O</th>
				<th rowspan='2'>Training Title</th>
				<th rowspan='2'>Duration</th>
				<th rowspan='2'>Number of Days</th>
				<th rowspan='2'>Number of Hours</th>
				<th rowspan='2'>Budget</th>
                <th colspan='6'>Attendance (Hrs)</th>
                <tr>
                <th >Female</th>
                <th >Male</th>
          </tr>
		  </tr>
	</thead>
	<tbody>";

if (mysqli_num_rows($result) > 0) {

	$i = 1;
	while ($mydata = mysqli_fetch_assoc($result)) {

		$female_count = 0;
		$male_count = 0;
		$id = $mydata['id'];

		// if (!empty(strtotime($mydata['from_date']))) {

		// 	
		// 	$diff = abs(strtotime($mydata['from_date']) - strtotime($mydata['to_date']));

		// 	$years = floor($diff / (365 * 60 * 60 * 24));
		// 	$months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
		// 	$numberDays = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
		// } else {
		// 	$numberDays = 0;
		// }

		$query1 = "SELECT e.emp_gender ,  a.id from employee e join emp_training t on t.emp_id = e.emp_id join training_table a on a.id = t.learning_id where a.id = '$id'";


		$result1 = mysqli_query($conn, $query1);
		if (mysqli_num_rows($result) > 0) {
			while ($mydata1 = mysqli_fetch_assoc($result1)) {

				if ($mydata1['emp_gender'] == 'Female') {
					$female_count += 1;
				} else if ($mydata1['emp_gender'] == 'Male') {
					$male_count += 1;
				}
			}
		}

		$output .= "<tr>
		<td>{$i}</td>
		<td> {$mydata['proponent']} </td>
		<td> {$mydata['classification']} </td>
		<td> {$mydata['title_of_training']} </td>
		<td> </td>
		<td> {$mydata['no_of_days']} </td>
		<td> {$mydata['no_of_hrs']} </td>
		<td>{$mydata['budgetary_requirement']}</td>
		<td> {$female_count} </td>
		<td> {$male_count} </td>
		
		</tr>";

		$i++;
	}


	$output .= "</tbody>
	</table>";

	// pagination

	$sql = 'SELECT id FROM training_table';
	$records = mysqli_query($conn, $sql);
	$totalRecords = mysqli_num_rows($records);
	$totalPage = ceil($totalRecords / $limit);
	$showpageli = 3;


	$output .= '<div class=" d-flex justify-content-between mt-4 ">
	<div>
	
	<a href="index.php" class="btn button-1 mr-3" style="height:35px"><i class="fas fa-sync-alt"></i></a>
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
