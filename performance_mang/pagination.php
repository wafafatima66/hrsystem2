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
	}else{
	    $page_no = 1;
	}

	$offset = ($page_no-1) * $limit;

	$query = "SELECT id, emp_id , emp_first_name , emp_last_name , emp_middle_name , emp_ext , emp_gender  FROM employee LIMIT $offset, $limit";

	

	$result = mysqli_query($conn, $query);

	$output = '';

	$output.=" <table class='table home-page-table mt-4 table-striped table-responsive-sm'>
	  <thead>
		<tr>
		  <th scope='col'>Employee Id</th>
		  <th scope='col'>Name</th>
		  <th scope='col'>Sex</th>
		  <th scope='col'>Status</th>
		  <th scope='col'>Position</th>
		  <th scope='col'>Office/Unit</th>
		</tr>
	  </thead> <tbody>";

	if (mysqli_num_rows($result) > 0) {

    
    while ($mydata = mysqli_fetch_assoc($result)) {

	$output.="<tr class='clickable-row' data-href='../performance_mang/emp_profile.php?id={$mydata["id"]}' >
				<td>{$mydata['emp_id']}</td>
				<td>
						<img src='../img/logo-2.png' alt='' style='width: 20px; height:20px'>
						<span> {$mydata['emp_first_name']}  {$mydata['emp_middle_name']} {$mydata['emp_last_name']} {$mydata['emp_ext']} </span>
				</td>
				<td> {$mydata['emp_gender']} </td>
				<td></td>
				<td></td>
				<td></td>
			</tr>";
	} 

	$output .= "</tbody>
	</table> "; 

	}else {
		$output.="<tr><td colspan='6'>No data Available</td>  </tr> </tbody></table>";

		echo $output ; 
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

 
 