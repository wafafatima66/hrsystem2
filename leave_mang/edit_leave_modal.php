<?php
require '../includes/conn.php';

if (isset($_POST['edit_leave'])) {

    $id = $_POST['id'];
    $approve = $_POST['approve'];
    $remarks = $_POST['remarks'];

    $sql = "UPDATE emp_leaves SET approve = '$approve', remarks='$remarks' WHERE id='$id'";

    
    if (mysqli_query($conn, $sql) ) {

        echo  '<script>toastr.success("Leave form updated")</script>';
    } else {
        // echo  '<script>toastr.error("Leave form not updated , Try again !")</script>';

        echo mysqli_error($conn);
    }

} 
?>

<!--modal to add training-->

<div class="modal fade " id="edit_leave" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">


      <h3 class=" background-title-1 p-3">Edit Leave</h3>

      <form action="" method="post" enctype="multipart/form-data">

      <div class="modal-body ">

        <input id='leave_id' type="hidden" name="id" />

        <div class="form-inline mt-2 p-3 justify-content-center" style="background-color: #9EB87C;">

          <input type="radio" name="approve" value="1" class=" m-2 ">
          <label for="">Appprove leave</label>


          <input type="radio" name="approve" value="0" class=" m-2 ">
          <label for="">Leave Not Appprove </label>


        </div>

        <div class="col-lg-12 col-sm-6 mt-3">
          <label>Remarks<label>
        </div>

        <div class="col-lg-12 col-sm-6">
          <textarea cols=12 rows=5 style="width:100%" placeholder="Remarks" name="remarks"></textarea>
        </div>


      </div>

      <div class="modal-footer">
        <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
        </button>
        <button type="submit" name="edit_leave" class="btn button-1 ">Submit</button>
    </div>

    </form>

    </div>
  </div>
</div>