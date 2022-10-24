<?php
// Connect database 

require '../includes/conn.php';

$add = 'where 1';
$add1 = '';
$add2 = '';
$add3 = '';
$add4 = '';


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

if (isset($_POST['search']) && !empty($_POST['search'])) {

	$search = $_POST['search'];
	$add1 = "and e.emp_first_name LIKE '%{$search}%' OR e.emp_last_name LIKE '%{$search}%' OR e.emp_id LIKE '%{$search}%'";
}

if (isset($_POST['dept'])  && (!empty($_POST['dept']))) {

	$dept = $_POST['dept'];

	if($dept == 'all'){
		$add2 = '';
	}else {
		$add2 = "and  i.division = '$dept'";
	}
	

}

if (isset($_POST['office'])  && (!empty($_POST['office']))) {
	$office = $_POST['office'];
	if($office == 'all'){
		$add3 = '';
	}else {
		$add3 = "and  i.area_wrk_assign = '$office'";
	}
	
}

if (isset($_POST['rating'])  && (!empty($_POST['rating']))) {
	$rating = $_POST['rating'];
	$add4 = "and  P.rating_period = '$rating'";
}


$offset = ($page_no - 1) * $limit;

// $query = "SELECT e.id, e.emp_id , e.emp_first_name , e.emp_last_name , e.emp_middle_name , e.emp_ext , e.emp_gender , e.emp_image , p.appt_stat , p.area_wrk_assign , p.position  FROM employee e join item p on e.emp_id = p.emp_id ".$add." 
// ".$add1." LIMIT $offset, $limit";

$query = "SELECT  i.division , i.area_wrk_assign , i.position ,  e.emp_first_name , e.emp_middle_name , e.emp_last_name , e.emp_ext , e.id ,  p.rating , p.rating_period , p.remarks FROM employee e left join item i on i.emp_id = e.emp_id left join emp_performance p on e.emp_id = p.emp_id " . $add . " " . $add1 . " " . $add2 . " " . $add3 . " " . $add4 . " LIMIT $offset, $limit ";



$result = mysqli_query($conn, $query);

$output = '';

$output .= " <table class='table home-page-table mt-4 table-striped table-responsive-sm'>
	  <thead>
		<tr>
		  <th scope='col'>Name</th>
		  <th scope='col'>Position</th>
		  <th scope='col'>Rating Period</th>
		  <th scope='col'>Rating</th>
		  <th scope='col'>Adjectival Rating</th>
		  <th scope='col'>Remarks</th>
		</tr>
	  </thead> <tbody>";

if (mysqli_num_rows($result) > 0) {


	while ($mydata = mysqli_fetch_assoc($result)) {

		if (empty($mydata["rating"])) {
			$adjectival_rating =  "";
		} else if ($mydata["rating"] <= 1) {
			$adjectival_rating =  "Poor";
		} else  if ($mydata["rating"] <= 2) {
			$adjectival_rating = "Not Satisfactory";
		} else  if ($mydata["rating"] <= 3) {
			$adjectival_rating = " Satisfactory";
		} else  if ($mydata["rating"] <= 4) {
			$adjectival_rating = "Very Satisfactory";
		} else  if ($mydata["rating"] <= 5) {
			$adjectival_rating = "Outstanding";
		} else {
			$adjectival_rating = "Good Work";
		}

		if ($mydata["rating_period"] == 1) {
			$rating_period = 'Jan-Jun';
		} else if ($mydata["rating_period"] == 2) {
			$rating_period = 'Jul-Dec';
		} else {
			$rating_period = '';
		}
		$output .= "<tr class='clickable-row' data-href='../performance_mang/emp_profile.php?id={$mydata["id"]}' >
				
				<td class = 'text-center' >
					<span> {$mydata['emp_first_name']}  {$mydata['emp_middle_name']} {$mydata['emp_last_name']} {$mydata['emp_ext']} </span>
				</td>

				<td> {$mydata['position']} </td>
				<td>{$rating_period}</td>
				<td>{$mydata['rating']}</td>
				<td>{$adjectival_rating}</td>
				<td>{$mydata['remarks']}</td>
			</tr>";
	}

	$output .= "</tbody>
	</table> ";
} else {
	$output .= "<tr><td colspan='6'>No data Available</td>  </tr> </tbody></table>";

	//echo $output ; 
}

// pagination

$sql = 'SELECT id  FROM employee';

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




?>

<script>
	/*FOR THE CLICKABLE ROW IN emp_mang.php to new page emp_profile.php*/

	jQuery(document).ready(function($) {
		$(".clickable-row").click(function() {
			window.location = $(this).data("href");
		});
	});
</script>