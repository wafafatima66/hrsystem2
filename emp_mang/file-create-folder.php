<?php

require '../includes/conn.php';



if (isset($_POST['emp_id'])) {

	$emp_id =  $_POST['emp_id'];


?>
	<div class="modal-header">
		<h3 class="modal-title">CREATE FOLDER</h3>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<div class="modal-body">
		<form method="post" action="" enctype="multipart/form-data">

			<input type="hidden" name="emp_id" value="<?php echo $emp_id ?>">

			<div class="form-row mt-2 justify-content-center">



				<div class="col-lg-6 col-sm-6 ">
					<input type="text" name="folder_name" class="form-control text-input" placeholder="FOLDER NAME" />
				</div>


				<div class="col-lg-2 col-sm-6 ">
					<button class="btn button-2" type="submit" name="create_folder">ADD</button>
				</div>

			</div>
		</form>

	</div>


<?php } ?>