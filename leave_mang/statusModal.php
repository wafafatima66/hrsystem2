<?php

include "../includes/conn.php";




?>

<div class="modal fade statusModal" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">

            <h3 class=" background-title-1 p-3">STATUS UPDATE</h3>

            <div class="modal-body">
                <div class="container">

                    <form action="" method="post" enctype="multipart/form-data">

                        <input type="hidden" id="modal_emp_id" name="id">
                        <input type="hidden" name="status" value="0">

                        <div class="form-row mt-1">
                            <div class="col-lg-12 col-sm-12">
                                <label for="">Remark for disapproval</label>
                            </div>

                            <div class="col-lg-12 col-sm-6">
                                <textarea cols=12 rows=5 style="width:100%" placeholder="Remarks" name="remarks"></textarea>
                            </div>
                        </div>





                </div>



                <div class="modal-footer">
                    <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
                    </button>
                    <button type="submit" name="edit_leave_approve" class="btn button-1 ">Submit</button>
                </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script>
    $("#termination_files").change(function() {
        $("#total_file").html($("#termination_files")[0].files.length + " Files uploaded");
    });
</script>