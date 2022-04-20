<?php
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

$add1 = "";
$add2 = "";
$add3 = "";
$add4 = "";

if (isset($_POST['search']) && (!empty($_POST['search']))) {

	$search = $_POST['search'];
	if(!empty($add2) || !empty($add3)||!empty($add4)){
		$add1 = "and  e.emp_first_name LIKE '%{$search}%' or e.emp_middle_name LIKE '%{$search}%' or e.emp_last_name LIKE '%{$search}%' or u.username LIKE '%{$search}%' or u.emp_id LIKE '%{$search}%' ";
	}else {
		$add1 = "where e.emp_first_name LIKE '%{$search}%' or e.emp_middle_name LIKE '%{$search}%' or e.emp_last_name LIKE '%{$search}%' or u.username LIKE '%{$search}%' or u.emp_id LIKE '%{$search}%' ";
	}
	

	// $query = "SELECT * FROM item WHERE item_no LIKE '%{$search_item}%' or  position LIKE '%{$search_item}%'  LIMIT $offset, $limit";

} 

if (isset($_POST['dept'])  && (!empty($_POST['dept']))) {
	$dept = $_POST['dept'];

	if(!empty($add1) || !empty($add3)||!empty($add4)){
		$add2 = "and  i.division = '$dept'";
	}else {
		$add2 = "where i.division = '$dept'";
	}

	// $query = "SELECT * FROM item where (division = '$dept') && (area_wrk_assign = '$office') && (filled = '$status') LIMIT $offset, $limit ";
} 

if (isset($_POST['office'])  && (!empty($_POST['office']))) {
	
	$office = $_POST['office'];
	if(!empty($add1) || !empty($add2)||!empty($add4)){
		$add3 = "and  i.area_wrk_assign = '$office'";
	}else {
		$add3 = "where i.area_wrk_assign = '$office'";
	}
	
	// $query = "SELECT * FROM item where division = '$dept' && area_wrk_assign = '$office' LIMIT $offset, $limit ";
} 

if (isset($_POST['role'])  && (!empty($_POST['role']))) {
	
	$role = $_POST['role'];
	if(!empty($add1) || !empty($add2)||!empty($add3)){
		$add4 = "and  u.role = '$role' ";
	}else {
		$add4 = "where u.role = '$role' ";
	}
	
	// $query = "SELECT * FROM item where (division = '$dept')  && (filled = '$status') LIMIT $offset, $limit ";

}  



$query = "SELECT u.* , i.division , i.area_wrk_assign , e.emp_first_name , e.emp_middle_name , e.emp_last_name FROM users u left join employee e on u.emp_id = e.emp_id left join item i on i.emp_id = u.emp_id " . $add1 . " " . $add2 . " " . $add3 . " " . $add4 . " LIMIT $offset, $limit ";

$result = mysqli_query($conn, $query);

$output = '';

$output .= " <table class='table home-page-table mt-3 table-striped table-responsive-sm '>
	<thead>
		  <tr>
			<th scope='col'>Employee Id</th>
			<th scope='col'>Name</th>
			<th scope='col'>User Role</th>
			<th scope='col'>Division</th>
			<th scope='col'>Office</th>
			<th scope='col'>Action</th>
		  </tr>
	</thead>
	<tbody>";

if (mysqli_num_rows($result) > 0) {

	while ($mydata = mysqli_fetch_assoc($result)) {

		if (empty($mydata['department'])) {
			$department = $mydata['division'];
		} else {
			$department = $mydata['department'];
		} //trying to keep department assigned in users 

		if (empty($mydata['office'])) {
			$office = $mydata['area_wrk_assign'];
		} else {
			$office = $mydata['office'];
		} //trying to keep office assigned in users 

		if (empty($mydata['name'])) {
			$name = $mydata['emp_first_name'] . ' ' . $mydata['emp_middle_name'] . ' ' . $mydata['emp_last_name'];
		} else {
			$name = $mydata['name'];
		} //trying to keep name assigned in users 

		$output .= "	<tr>
				<td>{$mydata['emp_id']}</td>
				<td>{$name}</td>
				<td> {$mydata['role']} </td>
				<td>{$department}</td>
				<td>{$office}</td>
				<td>
				<a class='view_user_btn' data-toggle='modal' data-target='#view_user' data-id=' {$mydata['id']} '><i class='fa fa-edit mx-2'></i></a>
				
				<a href='' class='delete_modal' data-toggle='modal' data-target='#delete_modal' data-id='user_id={$mydata['id']}'><i class='fa fa-trash mx-2'></i></a>

			</td>
		</tr>";
	}
	$output .= "</tbody>
	</table>
	";

	$sql = 'SELECT id  FROM users';

	$records = mysqli_query($conn, $sql);
	$totalRecords = mysqli_num_rows($records);
	$totalPage = ceil($totalRecords / $limit);
	$showpageli = 3;

	$output .= '<div class=" d-flex justify-content-between mt-4 ">
				<div>
				<button class="btn button-1 mr-3" style="height:35px"><i class="fa fa-print"></i></button>
				<a href="index.php" class="btn button-1 mr-3" style="height:35px"><i class="fas fa-sync-alt"></i></a>
				<p class="text-lowercase " style="display: contents;">' . $limit . ' ' . "of" . '  ' . $totalRecords . '</p>
				</div> ';

	$output .= "<ul class='pagination '>";

	include "../includes/pagination_ul.php"; //getting pagination to work

	$output .= '</ul> </div>';
	echo $output;
} else {

	$output .= "<tr><td colspan='6'>No data Available</td> </tr> </tbody></table>";

	echo $output;
}

?>

<!-- edit user modal -->

<div class="modal fade " id="view_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">

			<h3 class=" background-title-1 p-3">Edit User</h3>

			<div class="modal-body" id="view_user_details">

			</div>

		</div>

	</div>

</div>

<script>
	$(".view_user_btn").click(function() {

		$.ajax({
			type: 'POST',
			url: 'get_user_details.php',
			data: {
				id: $(this).data("id")
			},
			success: function(data) {
				$("#view_user_details").html(data);
			}
		});
	});
</script>