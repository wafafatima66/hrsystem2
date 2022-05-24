<?php
session_start();
require '../includes/conn.php';

if (isset($_POST['limit'])) {
	$limit = $_POST['limit'];
} else {
	$limit = 5;
}

if (isset($_POST['page_no_post'])) {
	$page_no = $_POST['page_no_post'];
} else {
	$page_no = 1;
}

$offset = ($page_no - 1) * $limit;

$add1 = "where 1";
$add2 = "";
$add3 = "";



if (isset($_POST['search_post']) && !empty($_POST['search_post'])) {

	$search_post = $_POST['search_post'];
	$add3 = "and title_of_training LIKE '%{$search_post}%' OR type_of_training LIKE '%{$search_post}%'";
}


$query = "SELECT * from training_post_table " . $add1 . " " . $add2 . "" . $add3 . "  ORDER BY id DESC LIMIT $offset, $limit";


$result = mysqli_query($conn, $query);

$output = '';

$output .= "<table class='table home-page-table mt-3 table-striped ' >
	<thead>
		  <tr>
		  		<th >ID</th>
				<th >Title Of Trainings</th>
				<th >Duration</th>
				<th >Venue</th>
				<th >No Of Hrs</th>
				<th >Sponsors</th>
				<th style='width:100px'>Action</th>
		  </tr>
	</thead>
	<tbody>";

if (mysqli_num_rows($result) > 0) {

	$i= 1 ;
	while ($mydata = mysqli_fetch_assoc($result)) {

		if( 
			
			($mydata['role_posted'] == 'Super Administrator' && ($_SESSION['user_role'] == 'Division Head' || $_SESSION['user_role'] == 'Employee' || $_SESSION['user_role'] == 'Supervisor'))
		
			|| 
			
			($mydata['role_posted'] == 'HR Administrator' && ($_SESSION['user_role'] == 'Division Head' 
			|| $_SESSION['user_role'] == 'Employee' || $_SESSION['user_role'] == 'Supervisor'))

			||

			($mydata['role_posted'] == 'Division Head' &&  $_SESSION['user_role'] == 'Employee' && $mydata['role_posted_dept'] == $_SESSION['department'])
			
			||

			($mydata['role_posted'] == 'Supervisor' &&  $_SESSION['user_role'] == 'Employee' && $mydata['role_posted_office'] == $_SESSION['office'])

			||

			$_SESSION['user_role'] == 'Super Administrator'


			
		)
		
		{

	
		$leave_from = date("m/d/Y", strtotime($mydata['from_date']));
		$leave_to = date("m/d/Y", strtotime($mydata['to_date']));

		$output .= "<tr>
		<td>{$i}</td>
		<td> {$mydata['title_of_training']} </td>
		<td>{$leave_from}-{$leave_to}</td>
		<td>{$mydata['venue']}</td>
		<td>{$mydata['no_of_hrs']}</td>
		<td>{$mydata['sponsors']}</td>
		
		<td> 
			<a href='edit_learning_post.php?learning_id={$mydata['id']} '><i class='fa fa-edit mx-2'></i></a>
			<a href='' class='delete_modal' data-toggle='modal' data-target='#delete_modal' data-id='learning_post_id={$mydata['id']}'><i class='fa fa-trash mx-2'></i></a>
		</td>
  </tr>";
  $i++;

		}
	
}


	$output .= "</tbody>
	</table>";

	// pagination

	$sql = 'SELECT id FROM training_post_table';
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
