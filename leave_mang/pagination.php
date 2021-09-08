<?php

	// Connect database 

	require '../includes/conn.php';

	// $limit = 5;

	// if (isset($_POST['page_no'])) {
	//     $page_no = $_POST['page_no'];
	// }else{
	//     $page_no = 1;
	// }

	// $offset = ($page_no-1) * $limit;

	// $query = "SELECT a.id, a.emp_id , a.type_of_leave , a.details_of_leave , a.no_of_working_days, b.emp_first_name , b.emp_middle_name , b.emp_last_name , b.emp_ext from emp_leaves a join employee b where a.emp_id = b.emp_id  LIMIT $offset, $limit";

	$query = "SELECT a.id, a.emp_id , a.type_of_leave , a.details_of_leave , a.no_of_working_days, b.emp_first_name , b.emp_middle_name , b.emp_last_name , b.emp_ext from emp_leaves a join employee b where a.emp_id = b.emp_id ";

	$result = mysqli_query($conn, $query);

	$output = '';

	if (mysqli_num_rows($result) > 0) {

	$output.="<tbody>";
    
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
	$output.="</tbody>";

// 	$sql = 'SELECT id  FROM emp_leaves';

// 	$records = mysqli_query($conn, $sql);

// 	$totalRecords = mysqli_num_rows($records);

// 	$totalPage = ceil($totalRecords/$limit);

// 	$output .= '<div class=" d-flex justify-content-between mt-4 ">

// 	<button class="btn button-1 " style="height:35px"><i class="fa fa-print"></i></button>
  
  
//   ';

	// $output.="<ul class='pagination  '>";

	// for ($i=1; $i <= $totalPage ; $i++) { 
	//    if ($i == $page_no) {
	// 	$active = 'active';
	//    }else{
	// 	$active = '';
	//    }

	//     $output.="<li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>";
	// }

	// $output .= '</ul> </div>';

	

	echo $output;


	}  else {
		$output.="
		<tbody>
		<tr>
				<td colspan='6'>No data Available</td>
                  </tr>
				  </tbody>";

		echo $output ; 
	}

	

?>


<script>
//   $(document).ready(function() {
//     $('.leave-edit').click(function() {
    
// 	$('#leave_id').val($(this).data('id'));

//     });
 
//   });

$(".leave-edit").click(function(){
     
	 $.ajax({
		 type:'POST',
		 url:'get_status_details.php',
		 data: { id : $(this).data("id")  },
		 success:function(data){
			 $("#view_status_details").html(data); 
		 }
	 }); 
 });

</script>

 
 