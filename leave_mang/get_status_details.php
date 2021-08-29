<?php
require '../includes/conn.php';


?>

<?php

if (isset($_POST['id'])) {

  $id = $_POST['id'];

  $query = "SELECT id , status , remarks FROM emp_leaves WHERE id = '$id'";

  $runquery = $conn->query($query);
  if ($runquery == true) {
    while ($mydata = $runquery->fetch_assoc()) { ?>

      <form action="" method="post">

        <!-- <input id='leave_id' type="hidden" name="id" /> -->
        <input type="hidden" name="id" value="<?php echo $mydata['id'] ?> " />

        <div class="form-inline mt-2 p-2 justify-content-center" style="background-color: #9EB87C;">


          <input type="radio" name="status" value="1" class=" m-2 " <?php if($mydata['status'] == 1){ echo 'checked'; } ?>>
          <label for="">Appproved leave</label>

          <input type="radio" name="status" value="0" class=" m-2 " <?php if($mydata['status'] == 0){ echo 'checked'; } ?>>
          <label for="">Not Appproved Leave </label>


          <div class="col-lg-12 col-sm-6 mt-3">
            <label>Remarks<label>
          </div>

          <div class="col-lg-12 col-sm-6">
            <textarea cols=12 rows=5 style="width:100%" placeholder="Remarks" name="remarks"><?php echo $mydata['remarks'] ?></textarea>
          </div>

        </div>



        <div class="modal-footer">
          <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
          </button>
          <button type="submit" name="edit_leave_approve" class="btn button-1 ">Submit</button>
        </div>

      </form>

<?php }
  }
} ?>