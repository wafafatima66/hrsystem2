<?php
require '../includes/conn.php';

	$limit = 5;

	if (isset($_POST['page_no'])) {
	    $page_no = $_POST['page_no'];
	}else{
	    $page_no = 1;
	}

	$offset = ($page_no-1) * $limit;

	// $query = "SELECT u.id, u.emp_id , u.name , u.role , e.department , e.office
	// FROM users u
	// LEFT JOIN employee_agency e
	// ON u.emp_id = e.emp_id  LIMIT $offset, $limit";

	$query = "SELECT * FROM users   LIMIT $offset, $limit";

	$result = mysqli_query($conn, $query);

	$output = '';

	if (mysqli_num_rows($result) > 0) {

	$output.="<table class='table home-page-table mt-3 table-striped table-responsive-sm '>
    <thead>
          <tr>
			<th scope='col'>Employee Id</th>
			<th scope='col'>Name</th>
			<th scope='col'>User Role</th>
			<th scope='col'>Department</th>
			<th scope='col'>Office</th>
			<th scope='col'>Action</th>
          </tr>
    </thead>
    <tbody>";
    
    while ($mydata = mysqli_fetch_assoc($result)) {

	$output.="	<tr >
                        <td>{$mydata['emp_id']}</td>
                        <td>{$mydata['name']}</td>
                        <td> {$mydata['role']} </td>
						<td>{$mydata['department']}</td>
						<td>{$mydata['office']}</td>
						<td>
						<a class='view_user_btn' data-toggle='modal' data-target='#view_user' data-id=' {$mydata['id']} '><i class='fa fa-edit mx-2'></i></a>
						
						<a href='delete_user.php?user_id={$mydata['id']}' onClick=\"return confirm('Are you sure you want to delete the applicant');\"><i class='fa fa-trash mx-2'></i></a>
					</td>
                  </tr>";
	} 
	$output.="</tbody>
		</table>";

	$sql = 'SELECT id  FROM users';

	$records = mysqli_query($conn, $sql);

	$totalRecords = mysqli_num_rows($records);

	$totalPage = ceil($totalRecords/$limit);

	$output .= '<div class=" d-flex justify-content-between mt-4 ">

	<button class="btn button-1 " style="height:35px"><i class="fa fa-print"></i></button>
  
  
  ';

	$output.="<ul class='pagination  '>";

	for ($i=1; $i <= $totalPage ; $i++) { 
	   if ($i == $page_no) {
		$active = 'active';
	   }else{
		$active = '';
	   }

	    $output.="<li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>";
	}

	$output .= '</ul> </div>';
	echo $output ; 
	
	} else {
		$output.="<table class='table home-page-table mt-3 table-striped table-responsive-sm '>
		<thead>
			  <tr>
				<th scope='col'>Employee Id</th>
				<th scope='col'>Name</th>
				<th scope='col'>User Role</th>
				<th scope='col'>Department</th>
				<th scope='col'>Office</th>
				<th scope='col'>Action</th>
			  </tr>
		</thead>
		<tbody>
		<tr>
				<td colspan='6'>No data Available</td>
                  </tr>
				  </tbody>
		</table>";

		echo $output ; 
	}

?>

<!-- edit user modal -->

<div class="modal fade " id="view_user"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <h3 class=" background-title-1 p-3">Edit User</h3>

            <div class="modal-body" id="view_user_details">
                        
            </div>

        </div>

    </div>

    </div>

<script>

$(".view_user_btn").click(function(){
                  
				  $.ajax({
				  type:'POST',
				  url:'get_user_details.php',
				  data: { id : $(this).data("id")  },
				  success:function(data){
					  $("#view_user_details").html(data); 
				  }
			  }); 
		  });
</script>

 
 