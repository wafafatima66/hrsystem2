<?php
require '../includes/conn.php';
session_start();

if (isset($_POST['limit'])) {
	$limit = $_POST['limit'];
} else {
	$limit = 10;
}

if (isset($_POST['page_no_summary'])) {
	$page_no = $_POST['page_no_summary'];
} else {
	$page_no = 1;
}

$offset = ($page_no - 1) * $limit;

$add1 = "where 1";
$add2 = "";
$add3 = "";
$add4 = "";
$add5 = "";

$pagination_sql = "SELECT id FROM employee";

if ($_SESSION['user_role'] == 'Supervisor') {

	$session_office =  $_SESSION['office'];
	$add5 = "and p.area_wrk_assign = '$session_office' ";

	$pagination_sql = "SELECT e.id , i.area_wrk_assign FROM employee e left join item i on e.emp_id = i.emp_id where i.area_wrk_assign = '$session_office' ";
}

if ($_SESSION['user_role'] == 'Division Head') {

	$session_dept =  $_SESSION['department'];
	$add5 = "and p.division = '$session_dept' ";

	$pagination_sql = "SELECT e.id , i.division FROM employee e left join item i on e.emp_id = i.emp_id where i.division = '$session_dept' ";
}


if (isset($_POST['search_summary']) && !empty($_POST['search_summary'])) {

	$search_employee = $_POST['search_summary'];
	// $add3 = "and t.title_of_training LIKE '%{$search}%' OR t.training_type_of_position LIKE '%{$search}%'";
	$add2 = "and e.emp_first_name LIKE '%{$search_employee}%' OR e.emp_last_name LIKE '%{$search_employee}%' OR e.emp_id LIKE '%{$search_employee}%'";
}

if (isset($_POST['dept'])  && (!empty($_POST['dept']))) {
	$dept = $_POST['dept'];


	$add3 = "and  p.division = '$dept'";


	// $query = "SELECT * FROM item where (division = '$dept') && (area_wrk_assign = '$office') && (filled = '$status') LIMIT $offset, $limit ";
}

if (isset($_POST['office'])  && (!empty($_POST['office']))) {

	$office = $_POST['office'];

	$add4 = "and p.area_wrk_assign = '$office'";
}

$Technical = 0;
$Managerial = 0;
$Supervisory = 0;
$Clerical = 0;

$query = "SELECT e.emp_id , e.emp_first_name , e.emp_last_name , e.emp_middle_name , e.emp_ext , e.emp_gender , e.emp_image , e.ele_school_name , e.sec_school_name , e.voc_school_name , e.voc_degree, e.sec_degree ,e.ele_degree , p.appt_stat , p.area_wrk_assign , p.position FROM employee e LEFT JOIN item p on e.emp_id = p.emp_id 
			" . $add1 . " " . $add2 . " " . $add3 . " " . $add4 . " " . $add5 . " LIMIT $offset, $limit ";

$result = mysqli_query($conn, $query);

$output = '';

$output .= "<table class='table home-page-table mt-3 table-striped ' >
	<thead>
		  <tr>
				<th rowspan='2' >Employee ID</th>
				<th rowspan='2'>Name</th>
				<th rowspan='2'>Position</th>
				<th rowspan='2'>Office/Unit</th>
				<th rowspan='2'>Highest Educational Attainment</th>
				<th rowspan='4' style='width:10%'>Action</th>

				<th colspan='6'>Trainings (Hrs)</th>
				
		  </tr>

		  <tr>
		  <th >T</th>
		  <th >M</th>
		  <th >S</th>
		  <th >C</th>
	</tr>
	</thead>
	<tbody>";

if (mysqli_num_rows($result) > 0) {


	while ($mydata = mysqli_fetch_assoc($result)) {

		if (empty($mydata['emp_image'])) {
			$emp_image = 'no_image.jpeg';
		} else {
			$emp_image = $mydata['emp_image'];
		}

		$emp_id = $mydata['emp_id'];

		$higest_edu = '';

		// run query for finding highest educational attainment
		$query = "SELECT DISTINCT(type) , degree FROM emp_education where emp_id = '$emp_id' and degree is not null and degree <>'' ORDER BY id DESC LIMIT 1 ";
		$runquery = $conn->query($query);
		$rowcount = mysqli_num_rows($runquery);
		if ($rowcount != 0) {
			while ($mydata1 = $runquery->fetch_assoc()) {
				if ($mydata1['type'] == 'graduation') {
					$higest_edu = $mydata1['degree'];
				} else if ($mydata1['type'] == 'college') {
					$higest_edu = $mydata1['degree'];
				}
			}
		} else if (!empty($mydata['voc_school_name'])) {
			$higest_edu = $mydata['voc_degree'];
		} else if (!empty($mydata['sec_school_name'])) {
			$higest_edu = $mydata['sec_degree'];
		} else if (!empty($mydata['ele_school_name'])) {
			$higest_edu = $mydata['ele_degree'];
		} else {
			$higest_edu = '';
		}

		// FIND OUT NUMBER OF HOURS 

		$query_hr = "SELECT SUM(training_no_of_hrs) FROM `emp_training` where training_type_of_position = 'Technical' and emp_id = '$emp_id' ORDER BY id DESC LIMIT 1 ";
		$runquery_hr = $conn->query($query_hr);
		$rowcount_hr = mysqli_num_rows($runquery_hr);
		if ($rowcount_hr != 0) {
			while ($mydata_hr = $runquery_hr->fetch_assoc()) {
				$Technical = $mydata_hr['SUM(training_no_of_hrs)'];
			}
		}

		$query_hr = "SELECT SUM(training_no_of_hrs) FROM `emp_training` where training_type_of_position = 'Supervisory' and emp_id = '$emp_id' ORDER BY id DESC LIMIT 1 ";
		$runquery_hr = $conn->query($query_hr);
		$rowcount_hr = mysqli_num_rows($runquery_hr);
		if ($rowcount_hr != 0) {
			while ($mydata_hr = $runquery_hr->fetch_assoc()) {
				$Supervisory = $mydata_hr['SUM(training_no_of_hrs)'];
			}
		}

		$query_hr = "SELECT SUM(training_no_of_hrs) FROM `emp_training` where training_type_of_position = 'Managerial' and emp_id = '$emp_id' ORDER BY id DESC LIMIT 1 ";
		$runquery_hr = $conn->query($query_hr);
		$rowcount_hr = mysqli_num_rows($runquery_hr);
		if ($rowcount_hr != 0) {
			while ($mydata_hr = $runquery_hr->fetch_assoc()) {
				$Managerial = $mydata_hr['SUM(training_no_of_hrs)'];
			}
		}

		$query_hr = "SELECT SUM(training_no_of_hrs) FROM `emp_training` where training_type_of_position = 'Clerical' and emp_id = '$emp_id' ORDER BY id DESC LIMIT 1 ";
		$runquery_hr = $conn->query($query_hr);
		$rowcount_hr = mysqli_num_rows($runquery_hr);
		if ($rowcount_hr != 0) {
			while ($mydata_hr = $runquery_hr->fetch_assoc()) {
				$Clerical = $mydata_hr['SUM(training_no_of_hrs)'];
			}
		}


		// if($mydata['training_type_of_position']=='Technical'){
		// 	$Technical += $mydata['training_no_of_hrs'];
		// }else if($mydata['training_type_of_position']=='Managerial'){
		// 	$Managerial += $mydata['training_no_of_hrs'];
		// }else if($mydata['training_type_of_position']=='Supervisory'){
		// 	$Supervisory += $mydata['training_no_of_hrs'];
		// }else if($mydata['training_type_of_position']=='Clerical'){
		// 	$Clerical += $mydata['training_no_of_hrs'];
		// }

		$output .= "<tr>
						<td> {$mydata['emp_id']} </td>
						<td>
                              <img src='../emp_img/{$emp_image}' alt='' style='width: 50px; height:50px; border-radius: 100%; margin-right: 12px;'>
                              <span> {$mydata['emp_first_name']}  {$mydata['emp_middle_name']} {$mydata['emp_last_name']} {$mydata['emp_ext']} </span>
                        </td>
						<td>{$mydata['position']}</td>
                        <td>{$mydata['area_wrk_assign']}</td>
                        <td>{$higest_edu}</td>

                        <td>
						
						<a href='view_learning_summary.php?emp_id={$mydata['emp_id']} '><i class='fa fa-eye mx-2'></i></a>

					<a href='../includes/export_excel.php?view_learning_summary_print={$mydata['emp_id']}'><i class='fa fa-print mx-2 mt-3' style='color: #505A43;'></i></a>

						</td>

                        <td>{$Technical}</td>
                        <td>{$Managerial}</td>
                        <td>{$Supervisory}</td>
                        <td>{$Clerical}</td>
                     
                  </tr>";
	}


	$output .= "</tbody>
	</table>";

	// pagination

	$sql = $pagination_sql;
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

