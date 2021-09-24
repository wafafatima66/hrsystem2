<style>
      .emp_profile_button_active {
            border-bottom: #FFDF88 1px solid;
      }
</style>

<?php include '../config.php';
include SITE_ROOT . '/includes/header.php';
require '../includes/conn.php';



if (isset($_GET['success'])) {
      echo  '<script>toastr.success("Employee updated successfully")</script>';
}
if (isset($_GET['credits_year'])) {
      echo  '<script>toastr.success("Credits year updated successfully")</script>';
}


if (isset($_GET['id'])) {

      $id =  $_GET['id'];


      $query = "SELECT * FROM employee WHERE id = '$id'";
      // $query =  "SELECT e.* , a.position FROM employee e join item a on e.emp_id = a.emp_id WHERE e.id = '$id'";


      $runquery = $conn->query($query);
      if ($runquery == true) {
            while ($mydata = $runquery->fetch_assoc()) {

                  $emp_id = $mydata['emp_id'];
                  $photo_to_show = '../emp_img/' . $mydata['emp_image'];

                  // getting position 
                  $get = mysqli_fetch_assoc(mysqli_query($conn, "SELECT position FROM item WHERE emp_id = '$emp_id'"));
                  $position = $get['position'];

?>


                  <div class="container ">
                        <div class="row emp-profile-box-1">
                              <div class="col-lg-3 col-sm-4">
                                    <!-- <div class="emp-profile-img">
                        <img src="" alt="">
                  </div>
                  <div class="text-lg-right  mt-2">
                        <i class="fa fa-camera"> </i>
                  </div> -->

                                    <div class="emp-profile-img">

                                          <!-- <img src="<?php echo  $photo_to_show; ?>" alt="" id="previewImg"
                                    style="width:100%;height:100%"> -->

                                          <img src="<?php echo  $photo_to_show; ?>" alt="" style="width:100%;height:100%">
                                    </div>

                                    <div class="text-lg-right  mt-2">


                                          <label>
                                                <i class="fa fa-camera"> </i>
                                                <!-- <input type="file" style="display: none;" name="emp_image"
                                    onchange="previewFile(this);"  form="emp_profile_form"> -->

                                                <input type="file" style="display: none;" name="emp_image" id="emp_image">
                                                <input type="hidden" name="emp_id" value="<?php echo $emp_id ?>">

                                          </label>


                                    </div>




                              </div>
                              <div class="col-lg-3 col-sm-4 align-self-end">

                                    <h4 style="color: #FFDF88;"><?php echo $mydata["emp_first_name"] . " " . $mydata["emp_middle_name"] . " " . $mydata["emp_last_name"] . " " . $mydata["emp_ext"] ?></h4>
                                    <h6>Position / <?php echo $position;  ?></h6>

                              </div>
                              <div class="col-lg-1 col-sm-4"></div>

                              <div class="col-lg-5 col-sm-12 d-flex align-items-start flex-column ">
                                    <div class="d-flex justify-content-center">
                                          <h5 class="emp_profile_button emp_profile_button_active" id="agency">Agency Profile | </h5>
                                          <h5 class="emp_profile_button" id="pds">PDS | </h5>
                                          <h5 class="emp_profile_button" id="leave">Leave ledger | </h5>
                                          <h5 class="emp_profile_button" id="file">File 201</h5>
                                    </div>

                                    <div class="mt-auto">
                                          <h5>Emp.ID : <?php echo $mydata["emp_id"]  ?> </h5>
                                          <input type="hidden" name="emp_id" value="<?php echo $mydata['emp_id'] ?>" form="emp_profile_form">
                                    </div>
                              </div>
                        </div>

      <?php }
      }
} ?>


      <div class="agency-tab emp_profile_tab" style="display: block;">
            <?php include "agency.php"; ?>
      </div>

      <div class="leave-tab emp_profile_tab">
            <?php include "leave.php"; ?>
      </div>

      <div class="file-tab emp_profile_tab">
            <?php include "file.php"; ?>
      </div>

      <div class="pds-tab emp_profile_tab">
            <?php include "pds.php"; ?>
      </div>



                  </div>



                  <script>
                        $(document).ready(function() {
                              $('.emp_profile_button').click(function() {
                                    $('.emp_profile_button').removeClass('emp_profile_button_active');
                                    $(this).addClass('emp_profile_button_active');
                                    var className = $(this).attr('id');
                                    var tab = className + '-tab';
                                    var targetBox = $("." + tab);
                                    $(".emp_profile_tab").not(targetBox).hide();
                                    $(targetBox).show();

                              });

                              //     employee image uploading 

                              $(document).on('change', '#emp_image', function() {
                                    var emp_id = $('input[name="emp_id"]').val();
                                    var name = document.getElementById("emp_image").files[0].name;
                                    var form_data = new FormData();
                                    var ext = name.split('.').pop().toLowerCase();
                                    if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                                          alert("Invalid Image File");
                                    }
                                    var oFReader = new FileReader();
                                    oFReader.readAsDataURL(document.getElementById("emp_image").files[0]);
                                    var f = document.getElementById("emp_image").files[0];
                                    var fsize = f.size || f.fileSize;
                                    if (fsize > 2000000) {
                                          alert("Image File Size is very big");
                                    } else {
                                          form_data.append("file", document.getElementById('emp_image').files[0]);
                                          form_data.append("emp_id", emp_id);
                                          $.ajax({
                                                url: "upload_emp_image.php",
                                                method: "POST",
                                                data: form_data,
                                                contentType: false,
                                                cache: false,
                                                processData: false,

                                                success: function(data) {
                                                      $('.emp-profile-img').empty().html(data);
                                                }
                                          });
                                    }
                              });


                        });

                        // for the image preview

                        //   function previewFile(input) {
                        //       var file = $("input[type=file]").get(0).files[0];

                        //       if (file) {
                        //             var reader = new FileReader();

                        //             reader.onload = function () {
                        //                   $("#previewImg").attr("src", reader.result);
                        //             }

                        //             reader.readAsDataURL(file);
                        //       }
                        // }
                  </script>