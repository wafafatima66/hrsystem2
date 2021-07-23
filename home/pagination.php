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

	$query = "SELECT id, emp_id , emp_first_name , emp_last_name , emp_middle_name , emp_ext , emp_gender  FROM employee LIMIT $offset, $limit";

	$result = mysqli_query($conn, $query);

	$output = '';

	if (mysqli_num_rows($result) > 0) {

	$output.="<table class='table home-page-table mt-2 table-striped table-responsive-sm '>
    <thead>
          <tr>
                <th scope='col'>Employee Id</th>
                <th scope='col'>Name</th>
                <th scope='col'>Sex</th>
                <th scope='col'>Status</th>
                <th scope='col'>Position</th>
                <th scope='col'>Office/Unit</th>
          </tr>
    </thead>
    <tbody>";
    
    while ($mydata = mysqli_fetch_assoc($result)) {

	$output.="<tr class='clickable-row' data-href='../emp_mang/emp_profile.php?id={$mydata["id"]}' >
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
	$output.="</tbody>
		</table>";

	$sql = 'SELECT id  FROM employee';

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
/*FOR THE CLICKABLE ROW IN emp_mang.php to new page emp_profile.php*/ 

jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>

 
 