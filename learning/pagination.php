<?php
session_start();
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

$add1 = "where 1";
$add2 = "";
$add3 = "";


if (isset($_POST['from_date']) && isset($_POST['to_date']) && !empty($_POST['from_date']) && !empty($_POST['to_date'])) {

	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$add2 = "and from_date BETWEEN '$from_date' AND '$to_date'";
}

if (isset($_POST['search']) && !empty($_POST['search'])) {

	$search = $_POST['search'];
	$add3 = "and title_of_training LIKE '%{$search}%' OR type_of_training LIKE '%{$search}%'";
}


$query = "SELECT * from training_table " . $add1 . " " . $add2 . "" . $add3 . "  ORDER BY id DESC LIMIT $offset, $limit";




$result = mysqli_query($conn, $query);

$output = '';

$output .= "<table class='table home-page-table mt-3 table-striped ' >
	<thead>
		  <tr>
				<th >ID</th>
				<th >Title Of Training</th>
				<th >Posted By</th>
				<th >Duration</th>
				<th >Venue</th>
				<th >No of Hours</th>
				<th >Sponser/s</th>";

				$output.="<th style='width:100px'>Action</th>";


				$output.="</tr>
	</thead>
	<tbody>";

if (mysqli_num_rows($result) > 0) {

	$i= 1 ; 
	while ($mydata = mysqli_fetch_assoc($result)) {
		
			// $obj = json_decode($mydata['speakers']);

			// if(isset($obj->speakers_name) ) {
			// 	$details =  $obj->details_of_leave_option . ' , ' . $obj->details_text;
			// }	
			// else {
			// 	$details = $mydata['details_of_leave'];
			// }

	
		$leave_from = date("m/d/Y", strtotime($mydata['from_date']));
		$leave_to = date("m/d/Y", strtotime($mydata['to_date']));

		$output .= "<tr>
						<td>{$i}</td>
                        <td> {$mydata['title_of_training']} </td>
                        <td> {$mydata['role_posted_name']} </td>
						<td>{$leave_from}-{$leave_to}</td>
						<td>{$mydata['venue']}</td>
                        <td>{$mydata['no_of_hrs']}</td>
                        <td>{$mydata['sponsors']}</td><td>";
                        
						if($mydata['role_posted'] ==  $_SESSION['user_role']  ){

						$output .= " 
							<a href='edit_learning.php?learning_id={$mydata['id']} '><i class='fa fa-edit mx-2'></i></a>
							<a href='' class='delete_modal' data-toggle='modal' data-target='#delete_modal' data-id='learning_id={$mydata['id']}'><i class='fa fa-trash mx-2'></i></a>
						";

						}
						$output .= "</td></tr>";
				  
	
	$i++;
}

	$output .= "</tbody>
	</table>";

	// pagination

	$sql = 'SELECT id  FROM training_table';
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

?>

