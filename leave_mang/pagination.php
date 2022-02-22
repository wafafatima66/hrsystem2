<?php
session_start();
// Connect database 

require '../includes/conn.php';

if (isset($_POST['limit'])) {
	$limit = $_POST['limit'];
} else {
	$limit = 3;
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

if ($_SESSION['user_role'] == 'Supervisor' || $_SESSION['user_role'] == 'HR Administrator' || $_SESSION['user_role'] == 'Department Head') {
	$department =  $_SESSION['department'];
	$office =  $_SESSION['office'];
	$add1 = "join item i on a.emp_id = i.emp_id where i.division = '$department' and i.area_wrk_assign = '$office'";
}
 

if (isset($_POST['from_date']) && isset($_POST['to_date']) && !empty($_POST['from_date']) && !empty($_POST['to_date'])) {

	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$add2 = "and a.leave_from_date BETWEEN '$from_date' AND '$to_date'";
}

if (isset($_POST['search_approve']) && !empty($_POST['search_approve'])) {

	$search_approve = $_POST['search_approve'];
	if ($search_approve == 'Approved') {
		$status = 1;
	} else if ($search_approve == 'Disapprove') {
		$status = 0;
	} else if ($search_approve == 'Pending') {
		$status = 2;
	}
	$add3 = "and a.status = '$status'";
}


$query = "SELECT a.id, a.emp_id , a.type_of_leave , a.details_of_leave , a.no_of_working_days, a.status,a.final_status , a.leave_from_date , a.leave_to_date, b.emp_first_name , b.emp_middle_name , b.emp_last_name , b.emp_ext , b.emp_image  from emp_leaves a join employee b on a.emp_id = b.emp_id " . $add1 . " " . $add2 . "" . $add3 . " LIMIT $offset, $limit";




$result = mysqli_query($conn, $query);

$output = '';

$output .= "<table class='table home-page-table mt-3 table-striped ' >
	<thead>
		  <tr>
				<th scope='col'>Employee Id</th>
				<th scope='col'>Name</th>
				<th scope='col'>Type Of Leave</th>
				<th scope='col'>Duration</th>
				<th scope='col'>Date of Leave</th>
				<th scope='col'>Details of leave</th>
				<th scope='col'>Status</th>
				
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
			$obj = json_decode($mydata['details_of_leave']);
			if(isset($obj->details_of_leave_option) ){
			$details =  $obj->details_of_leave_option . ' , ' . $obj->details_text;
		}else {
			$details = $mydata['details_of_leave'];
		}

		$emp_id = $mydata['emp_id'];
		$sql1 = mysqli_query($conn, "select role from users where emp_id = '$emp_id' ");
		$row1 = mysqli_fetch_array($sql1, MYSQLI_ASSOC);
		$role = $row1['role'];
		if($role == 'Department Head'){
			$style = 'style="display:none"';
		}else {
			$style = '';
		}
		if(($role == 'Department Head' && $_SESSION['user_role']=='Department Head') || ($_SESSION['user_role']=='Department Head') || ($_SESSION['user_role']=='HR Administrator')){
			$disabled = 'disabled';
		}else{
			$disabled = '';
		}

		$leave_from = date("m/d/Y", strtotime($mydata['leave_from_date']));
		$leave_to = date("m/d/Y", strtotime($mydata['leave_to_date']));

		$output .= "<tr>
                        <td>{$mydata['emp_id']}</td>
                        <td>
							  <img src='../emp_img/{$emp_image}' alt='' style='width: 50px; height:50px; border-radius: 100%; margin-right: 12px;'>
                              <span> {$mydata['emp_first_name']}  {$mydata['emp_middle_name']} {$mydata['emp_last_name']} {$mydata['emp_ext']} </span>
                        </td>
                        <td> {$mydata['type_of_leave']} </td>
                        <td>{$mydata['no_of_working_days']}</td>
                        <td>{$leave_from}-{$leave_to}</td>
                        <td>{$details}</td>
						<td>
						
							<div class=''>";

							if($_SESSION['user_role']=='Supervisor' || $_SESSION['user_role']=='Department Head' || $_SESSION['user_role']=='Agency Head' ){

								$output .="<div class='mr-2 status-{$mydata['id']}'" .$style;
								$output .= ">
									<label>Department Head</label>
									<select  class='form-control text-input leave_status_dropdown' id='{$mydata['id']}' >
									<option>Select</option>
									<option value='1'";
										if (($mydata['status'])  == '1') {
											$output .= 'selected';
										} else {
											$output .= '';
										};
										$output .= ">Approved</option>
															<option value='0' ";
										if (($mydata['status'])  == '0') {
											$output .= 'selected';
										} else {
											$output .= '';
										};
										$output .= ">Disapprove</option>
																<option value='2' ";
										if (($mydata['status'])  == '2') {
											$output .= 'selected';
										} else {
											$output .= '';
										};
										$output .= ">Pending </option>
									</select>
								</div>";
									// }
									// if($_SESSION['user_role']=='Agency Head'){
									$output .="<div class='final_status-{$mydata['id']}'>
									<label>Agency Head</label>
									<select class='form-control text-input leave_status_dropdown_final' id='{$mydata['id']}'".$disabled ;
									$output .=">
									<option >Select</option>
										<option value='1'";
											if (($mydata['final_status']) == '1') {
												$output .= 'selected';
											} else {
												$output .= '';
											};
											$output .=">Approved</option>
																<option value='0' ";
											if (($mydata['final_status'])  == '0') {
												$output .= 'selected';
											} else {
												$output .= '';
											};
											$output .= ">Disapprove</option>
																	<option value='2' ";
											if (($mydata['final_status'])  == '2') {
												$output .= 'selected';
											} else {
												$output .= '';
											};
											$output .= ">Pending</option>
									</select>
								</div>";
										}
										if($_SESSION['user_role']=='Super Administrator'){
											$output .="<div class=''>";
											if (($mydata['status'])  == '1') {
														$output .= "Approved";
													} else if (($mydata['status'])  == '0') {
														$output .= "Disapprove";
													}else {
														$output .= "Pending";
													}
													$output .="</div>";
												}

										$output .="</div>
						</td>
                  </tr>";
	}

	// 	if (($mydata['status'])  == '1') {
	// 		$output .= "<option value='Approved'>Approved</option>";
	// 	} else if (($mydata['status'])  == '0') {
	// 		$output .= "<option value='Disapprove'>Disapprove</option>";
	// 	}
	// else { 
	// 	$output .="<option value='Pending'>Pending</option>";
	// }
	// <label class='switch mr-5'>
	// 	<input type='checkbox' class='leave_status' value='{$mydata['id']}'";
	// 	if (($mydata['status'])  == '1') {
	// 		$output .= 'checked';
	// 	} else {
	// 		$output .= '';
	// 	};
	// 	$output .= " > <span class='slider round'></span>
	// </label>

	$output .= "</tbody>
	</table>";

	// <td><a  data-toggle='modal' data-id='{$mydata['id']}' data-target='#edit_leave' class='leave-edit' ><i class='fas fa-edit '></i></a> </td>

	// pagination

	$sql = 'SELECT id  FROM emp_leaves';
	$records = mysqli_query($conn, $sql);
	$totalRecords = mysqli_num_rows($records);
	$totalPage = ceil($totalRecords / $limit);
	$showpageli = 3;
	// $totalRows = ceil(  $totalPage / ($limit  * $totalRecords )  );

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

	$output .= "<tr><td colspan='6'>No data Available</td> </tr></tbody></table>";
	echo $output;
}



?>


<script>
	// $('.leave_status').click(function() {


	// 	if ($(this).prop('checked') == false) {
	// 		var status = 0;
	// 		var id = $(this).val();
	// 		console.log(id, status, 'we')
	// 		// event.preventDefault();
	// 		jQuery.noConflict(true);
	// 		$('.statusModal').modal('show');
	// 		$("#modal_emp_id").val(id);
	// 		jQuery.noConflict(false);

	// 	} else
	// 	if ($('.leave_status').is(":checked")) {
	// 		var status = 1;
	// 		// }
	// 		// else {
	// 		// 	var status = 1;
	// 		// }
	// 		var id = $(this).val();
	// 		console.log(id, status)
	// 		$.ajax({
	// 			url: "emp_leave_status.php",
	// 			method: "POST",
	// 			data: {
	// 				status: status,
	// 				id: id,
	// 			},
	// 			success: function(data) {
	// 				if (data == "success") {
	// 					toastr.success("Employee active status updated !");
	// 				} else if (data == "fail") {
	// 					toastr.error("Employee active status not updated !");
	// 				}
	// 			},
	// 		});

	// 	}


	// });

	$(".leave_status_dropdown").change(function() {

		var status = $(this).val();
		var id = $(this).attr('id');
		// console.log(id)

		if (status == 0) {
			var details = '<textarea cols=12 rows=5 style="width:100%" placeholder="Remarks" name="remarks" class="remarks mt-2 form-control text-input"></textarea>'
			$('.status-' +id).append(details);

			$(".remarks").focusout(function() {
				var remarks = $(".remarks").val();
				// console.log(remarks);
				run_ajax(status,id,remarks,'');
			});
		} else {
			var remarks = '';
			run_ajax(status,id,remarks,'');
		}
	});

	$(".leave_status_dropdown_final").change(function() {
		// console.log('hi');
	
		var status = $(this).val();
		var id = $(this).attr('id');		// console.log('.'+id)

		if (status == 0) {
			var details = '<textarea cols=12 rows=5 style="width:100%" placeholder="Remarks"  class="final_remarks mt-2 form-control text-input"></textarea>'
			
			$('.final_status-' +id).append(details);

			$(".final_remarks").focusout(function() {
				var remarks = $(".final_remarks").val();
				// console.log(remarks);
				run_ajax(status,id,remarks,'final');
			});
		} else {
			var remarks = '';
			run_ajax(status,id,remarks,'final');
		}

	});

	function run_ajax(status,id,remarks,final) {
			$.ajax({
				url: "emp_leave_status.php",
				method: "POST",
				data: {
					status: status,
					id: id,
					remarks: remarks,
					final:final
				},
				success: function(data) {
					if (data == "success") {
						toastr.success("Employee active status updated !");
					} else if (data == "fail") {
						toastr.error("Employee active status not updated !");
					}
				},
			});
		}

	
</script>