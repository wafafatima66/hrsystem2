<?php

	// Connect database 

	require '../includes/conn.php';

	$to_date = $_POST['to_date'];
    $from_date = $_POST['from_date'];


	$query = "SELECT a.id, a.emp_id , a.type_of_leave , a.details_of_leave , a.no_of_working_days, b.emp_first_name , b.emp_middle_name , b.emp_last_name , b.emp_ext from emp_leaves a join employee b where a.emp_id = b.emp_id and a.leave_from_date BETWEEN  '$from_date' AND '$to_date' ";

	$result = mysqli_query($conn, $query);

	$output = '';

	if (mysqli_num_rows($result) > 0) {

	$output.="<table class='table home-page-table mt-2 table-striped '>
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

	



	

	echo $output;


	} else{
		echo '<div class="col-lg-12 col-sm-6 text-center mt-3 ">
		<p class=" p-3" style="background-color: #9EB87C;">No leave application found in these dates ! </p>
		</div>';
	}

	

?>


<script>
  $(document).ready(function() {
    $('.leave-edit').click(function() {
    
	$('#leave_id').val($(this).data('id'));

    });
 
  });
</script>

 
 