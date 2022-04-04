<?php

require '../includes/conn.php';

if (isset($_POST['limit'])) {
	$limit = $_POST['limit'];
} else {
	$limit = 5;
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



if (isset($_POST['search_summary']) && !empty($_POST['search_summary'])) {

	$search_employee = $_POST['search_summary'];
	// $add3 = "and t.title_of_training LIKE '%{$search}%' OR t.training_type_of_position LIKE '%{$search}%'";
	$add3 = "and e.emp_first_name LIKE '%{$search_employee}%' OR e.emp_last_name LIKE '%{$search_employee}%' OR e.emp_id LIKE '%{$search_employee}%'";
}


$query = "SELECT t.*,  e.emp_id , e.emp_image, e.emp_first_name , e.emp_last_name , e.emp_middle_name , e.emp_ext , e.emp_gender , e.emp_image , e.ele_school_name , e.sec_school_name , e.voc_school_name , e.voc_degree, e.sec_degree ,e.ele_degree, p.appt_stat , p.area_wrk_assign , p.position FROM employee e join item p on e.emp_id = p.emp_id join emp_training t on e.emp_id = t.emp_id ".$add1." ".$add3." ORDER BY t.id DESC LIMIT $offset, $limit";


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

		if(empty($mydata['emp_image']) ){
			$emp_image = 'no_image.jpeg';
	}else {
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
			if($mydata1['type'] == 'graduation'){
				$higest_edu = $mydata1['degree'];
			}else if ($mydata1['type'] == 'college'){
				$higest_edu = $mydata1['degree'];
			}
		}}
			else if(!empty($mydata['voc_school_name'])){
				$higest_edu = $mydata['voc_degree'];
			}
			else if(!empty($mydata['sec_school_name'])){
				$higest_edu = $mydata['sec_degree'];
			}
			else if(!empty($mydata['ele_school_name'])){
				$higest_edu = $mydata['ele_degree'];
			}else {
				$higest_edu = '';
			}
		
			// FIND OUT NUMBER OF HOURS 
			$Technical = 0;
			$Managerial = 0;
			$Supervisory = 0;
			$Clerical = 0;

			if($mydata['training_type_of_position']=='Technical'){
				$Technical += $mydata['training_no_of_hrs'];
			}else if($mydata['training_type_of_position']=='Managerial'){
				$Managerial += $mydata['training_no_of_hrs'];
			}else if($mydata['training_type_of_position']=='Supervisory'){
				$Supervisory += $mydata['training_no_of_hrs'];
			}else if($mydata['training_type_of_position']=='Clerical'){
				$Clerical += $mydata['training_no_of_hrs'];
			}

		$output .= "<tr>
						<td> {$mydata['emp_id']} </td>
						<td>
                              <img src='../emp_img/{$emp_image}' alt='' style='width: 50px; height:50px; border-radius: 100%; margin-right: 12px;'>
                              <span> {$mydata['emp_first_name']}  {$mydata['emp_middle_name']} {$mydata['emp_last_name']} {$mydata['emp_ext']} </span>
                        </td>
						<td>{$mydata['position']}</td>
                        <td>{$mydata['area_wrk_assign']}</td>
                        <td>{$higest_edu}</td>
                        <td>{$Technical}</td>
                        <td>{$Managerial}</td>
                        <td>{$Supervisory}</td>
                        <td>{$Clerical}</td>
                  </tr>";
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

?>

