<?php
// Connect database 

	require '../includes/conn.php';

	$add = 'where 1';
	$add1 ='';
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

	if (isset($_POST['search']) && !empty($_POST['search'])) {

		$search = $_POST['search'];
		$add1 = "and e.emp_first_name LIKE '%{$search}%' OR e.emp_last_name LIKE '%{$search}%' OR e.emp_id LIKE '%{$search}%'";
	}

	$offset = ($page_no-1) * $limit;

	$query = "SELECT e.id, e.emp_id , e.emp_first_name , e.emp_last_name , e.emp_middle_name , e.emp_ext , e.emp_gender , e.emp_image , p.appt_stat , p.area_wrk_assign , p.position  FROM employee e join item p on e.emp_id = p.emp_id ".$add." ".$add1."LIMIT $offset, $limit";

	

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

		if (empty($mydata['emp_image'])) {
			$emp_image = 'no_image.jpeg';
		} 	
		else {
			$emp_image = $mydata['emp_image'];
		}
		
	$output.="<tr class='clickable-row' data-href='../performance_mang/emp_profile.php?id={$mydata["id"]}' >
				<td>{$mydata['emp_id']}</td>

				<td class = 'text-center' >
					<img src='../emp_img/{$emp_image}' alt='' style='width: 50px; height:50px; border-radius: 100%; margin-right: 12px;'>
					<span style='display:block; margin-top:20px; '> {$mydata['emp_first_name']}  {$mydata['emp_middle_name']} {$mydata['emp_last_name']} {$mydata['emp_ext']} </span>
				</td>

				<td> {$mydata['emp_gender']} </td>
				<td>{$mydata['appt_stat']}</td>
				<td>{$mydata['position']}</td>
				<td>{$mydata['area_wrk_assign']}</td>
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

 
 