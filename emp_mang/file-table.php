<style>
  .modal-body{
    overflow: scroll;
  }
</style>

<?php

	require '../includes/conn.php';

if(isset($_POST['folder']) && isset($_POST['emp_id']) ){
	$folder =  $_POST['folder'] ;
	$emp_id =  $_POST['emp_id'] ;

	$sql = "SELECT * FROM emp_file WHERE emp_id = '$emp_id' AND file_folder='$folder'";

	$result = mysqli_query($conn, $sql);

	$output = '';

	$output= '<div class="modal-header">
	<h3 class="modal-title">'.strtoupper($folder).' FILES</h3>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div> <div class="modal-body">' ; 

	if (mysqli_num_rows($result) > 0) {

	$output.="<table width='60%' class='table table-sm table-striped mt-2 '>
    <thead>
          <tr>
                <th scope='col'>File Name</th>
                <th scope='col'>File Date</th>
                <th scope='col'>File Type</th>
                <th scope='col'>File Size(KB)</th>
                <th scope='col'>View</th>
          </tr>
    </thead>
    <tbody>";
    
    while ($mydata = mysqli_fetch_assoc($result)) {

	$output.="<tr >
                        <td>{$mydata['file_name']}</td>
                        <td> {$mydata['file_date']} </td>
                        <td>{$mydata['file_type']}</td>
                        <td>{$mydata['file_size']}</td>
                        <td><a href='../files/{$mydata['file_name']}' target='_blank'>view file</a></td>
						<td><a href='' class='delete_modal' data-toggle='modal' data-target='#delete_modal' data-id='file_del={$mydata['id']}'><i class='fa fa-trash mx-2'></i></a> <td>
                  </tr>";
	} 
	$output.="</tbody>
		</table>
		</div>
		";

	} else {
		$output.="NO FILES AVAILABLE ! ";
	}


	echo $output;

	}

?>


 