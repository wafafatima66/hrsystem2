<?php

include '../config.php';

include SITE_ROOT . '/includes/header.php';

if (isset($_GET['emp_id'])) {

    $emp_id = $_GET['emp_id'];


    ?>

    <!-- summary of training -->
    <div class="container">
        <div class="row">
            <div class=" col-lg-12 col-sm-12 mt-2">
                <h4 class="h4-heading">LEARNING AND DEVELOPMENT PROFILE</h4>
            </div>

            <div class="modal-body ">
               

                <h6 class="h4-heading">Employee ID : <?php echo $emp_id?></h6>

                <input type="hidden" id="emp_id" value="<?php echo $emp_id?>">

                <?php echo '<div id="view_learning_summary"> </div>'; ?>

                
            </div>

        </div>
    </div>

<?php }

?>

<script>

function loadData(page_no) {
    var emp_id = $('#emp_id').val()
            $.ajax({
                  url: "../learning_summary/view_learning_summary_pagination.php",
                  type: "POST",
                  cache: false,
                  data: {
                    page_no: page_no,
                    emp_id : emp_id
                  },
                  success: function (response) {
                        $("#view_learning_summary").html(response);
                  }
            });
      }


      loadData();

      // Pagination code
      $(document).on("click", ".page-item", function () {
            var page_no = $(this).attr("id");
            loadData(page_no);
      });

</script>