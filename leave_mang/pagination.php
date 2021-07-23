

<?php

	// Connect database 

	require '../includes/conn.php';

	$limit = 5;

	if (isset($_POST['page_no'])) {
	    $page_no = $_POST['page_no'];
	}else{
	    $page_no = 1;
	}

	$offset = ($page_no-1) * $limit;

	$query = "SELECT a.id, a.emp_id , a.type_of_leave , a.details_of_leave , a.no_of_working_days, b.emp_first_name , b.emp_middle_name , b.emp_last_name , b.emp_ext from emp_leaves a join employee b where a.emp_id = b.emp_id  LIMIT $offset, $limit";

	$result = mysqli_query($conn, $query);

	$output = '';

	if (mysqli_num_rows($result) > 0) {

	$output.="<table class='table home-page-table mt-2 table-striped table-responsive-sm table-sm '>
    <thead>
          <tr>
                <th scope='col'>Employee Id</th>
                <th scope='col'>Name</th>
                <th scope='col'>Type Of Leave</th>
                <th scope='col'>Duration</th>
                <th scope='col'>Details of leave</th>
				<th scope='col'>Action</th>
          </tr>
    </thead>
    <tbody>";
    
    while ($mydata = mysqli_fetch_assoc($result)) {

	$output.="<tr>
                        <td>{$mydata['emp_id']}</td>
                        <td>
                              <img src='../img/logo-2.png' alt='' style='width: 20px; height:20px'>
                              <span> {$mydata['emp_first_name']}  {$mydata['emp_middle_name']} {$mydata['emp_last_name']} {$mydata['emp_ext']} </span>
                        </td>
                        <td> {$mydata['type_of_leave']} </td>
                        <td>{$mydata['no_of_working_days']}</td>
                        <td>{$mydata['details_of_leave']}</td>
                        <td><a  data-toggle='modal' data-id='{$mydata['id']}' data-target='#edit_leave' class='leave-edit' ><i class='fas fa-edit '></i></a> </td>
                  </tr>";
	} 
	$output.="</tbody>
		</table>";

	$sql = 'SELECT id  FROM emp_leaves';

	$records = mysqli_query($conn, $sql);

	$totalRecords = mysqli_num_rows($records);

	$totalPage = ceil($totalRecords/$limit);

	$output.="<ul class='pagination justify-content-end ' style='margin:20px 0'>";

	for ($i=1; $i <= $totalPage ; $i++) { 
	   if ($i == $page_no) {
		$active = 'active';
	   }else{
		$active = '';
	   }

	    $output.="<li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>";
	}

	$output .= '</ul>';

	

	echo $output;


	}

	

?>


<script>
  $(document).ready(function() {
    $('.leave-edit').click(function() {
    
	$('#leave_id').val($(this).data('id'));

    });
 
  });
</script>

 
 