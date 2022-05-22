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

if (isset($_GET['file_delete'])) {
      echo  '<script>toastr.success("Employee File deleted Succesfully")</script>';
      unset($_GET['file_delete']);
}
if (isset($_GET['file_not_delete'])) {
      echo  '<script>toastr.success("Employee file not deleted Successfully ")</script>';
}

if (isset($_GET['id'])) {


      $id =  $_GET['id'];


      $query = "SELECT * FROM employee WHERE id = '$id'";
    
      $runquery = $conn->query($query);
      if ($runquery == true) {
            while ($mydata = $runquery->fetch_assoc()) {

                  $emp_id = $mydata['emp_id'];

                  // if(empty($mydata['emp_image'])){
                  //       $photo_to_show = '../emp_img/no_image.jpg';
                  // }else {
                        $photo_to_show = '../emp_img/' .$mydata['emp_image'];
                  // }
                  
                  // if(empty($mydata['emp_banner'])){
                  //       $banner = '../emp_img/no-banner.jpg';
                  // }else {
                        $banner = '../emp_img/' .$mydata['emp_banner'];
                  // }
                  

                  // getting position 
                  $get = mysqli_fetch_assoc(mysqli_query($conn, "SELECT position FROM item WHERE emp_id = '$emp_id'"));
                  $position = $get['position'];

?>


                  <div class="container ">
                        <div class="emp-profile-box-1 "  <?php if($_SESSION['user_role'] != 'Super Administrator' ){ ?> style="background: linear-gradient(rgba(91, 103, 76, 0.8), rgba(91, 103, 76, 0.8)) , url('<?php echo $banner?>') repeat 0 0;" <?php } ?> > 
                              <div class="row">
                                    <div class="col-lg-3 col-sm-4" <?php echo($_SESSION['user_role'] == 'Super Administrator' ? '' : 'style="display:none"')?>>

                                          <div class="emp-profile-img">
                                                <img src="<?php echo  $photo_to_show; ?>" alt="" style="width:100%;height:100%">
                                          </div>

                                          <div class="text-lg-right  mt-2">
                                                <label>
                                                      <i class="fa fa-camera"> </i>
                                                      <input type="file" style="display: none;" name="emp_image" id="emp_image">
                                                      <input type="hidden" name="emp_id" value="<?php echo $emp_id ?>">
                                                </label>
                                          </div>
                                    </div>
                                 
                                    <div class="d-flex flex-column <?php echo($_SESSION['user_role'] == 'Super Administrator' ? 'col-lg-9 col-sm-12' : 'col-lg-12 col-sm-12')?>" <?php echo($_SESSION['user_role'] == 'Super Administrator' ? '' : 'style="height:250px')?> ">

                                          <div class="d-flex justify-content-end">
                                                <h5 class="emp_profile_button emp_profile_button_active" id="agency">Agency Profile | </h5>
                                                <h5 class="emp_profile_button" id="pds">PDS | </h5>
                                                <h5 class="emp_profile_button" id="leave">Leave ledger | </h5>
                                                <h5 class="emp_profile_button" id="file">File 201</h5>
                                          </div>


                                          <!-- <div class="employee-banner" style="display:none">
                                                <img src="<?php echo  $banner; ?>" alt="" <?php echo($_SESSION['user_role'] == 'Super Administrator' ? '' : 'style="height:200px;padding-right:0px"')?>>
                                          </div>

                                          <div class="text-lg-right pr-4 mt-2 mb-2" <?php echo($_SESSION['user_role'] == 'Super Administrator' ? 'style="display:none"' : '')?>
                                                <label>
                                                      <i class="fa fa-camera"> </i>
                                                      <input type="file" style="display:none;" name="emp_banner" id="emp_banner">
                                                      <input type="hidden" name="emp_id" value="<?php echo $emp_id ?>">
                                                </label>
                                          </div> -->
                                          
                                          <div class="mt-auto">
                                                <h4 style="color: #FFDF88; white-space: nowrap"><?php echo $mydata["emp_first_name"] . " " . $mydata["emp_middle_name"] . " " . $mydata["emp_last_name"] . " " . $mydata["emp_ext"] ?></h4>

                                                <div class="d-flex justify-content-between">
                                                      <h5><?php echo $position;  ?></h5>
                                                      <h5>Emp.ID : <?php echo $mydata["emp_id"]  ?> </h5>
                                                      <input type="hidden" name="emp_id" value="<?php echo $mydata['emp_id'] ?>" form="emp_profile_form" class="emp_id">
                                                     <div>
                                                      <label class="switch mr-5 mb-0">
                                                            <input type="checkbox" <?php echo ($mydata["active"] == '1' ? 'checked' : '') ?> id="emp_active" value="<?php echo $mydata["emp_id"]  ?>">
                                                            <span class="slider round"></span>
                                                      </label>
                                                      <div style="color: #FFDF88" id="status_span" class="ml-2" ><?=($mydata["active"]?"Active" : "Inactive")?></div>
                                                     </div>
                                                </div>
                                          </div>

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

                  <?php include "inactiveModal.php" ?>




                  <script>
                        $(document).ready(function() {

                              //active button
                              $('#emp_active').click(function() {
                                    var active = 0;

                                    if ($("#emp_active").prop('checked') == false) 
                                    {
                                          event.preventDefault();
                                          jQuery.noConflict();
                                          var emp_id = $(this).val();
                                          $('#inactiveModal').modal('show');
                                          $("#modal_emp_id").val( emp_id );
                                          
                                    }
                                    
                                    else if ($('#emp_active').is(":checked")) {
                                          var active = 1;
                                     
                                          var id = $(this).val();

                                          $.ajax({
                                                url: "emp_active_button.php",
                                                method: "POST",
                                                data: {
                                                      active: active,
                                                      id: id,
                                                },
                                                success: function(data) {
                                                      if (data == "success") {
                                                            toastr.success("Employee active status updated !");
                                                            $("#status_span").html( 'Active' );
                                                      } else if (data == "fail") {
                                                            toastr.error("Employee active status not updated !");
                                                      }
                                                },
                                          });
                                    
                                    }
                              });

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
                                                      toastr.success("Employee Profile Image Updated !");
                                                }
                                          });
                                    }
                              });

                              //     employee banner uploading 

                              $(document).on('change', '#emp_banner', function() {
                                    console.log('hi');
                                    var emp_id = $('input[name="emp_id"]').val();
                                    var name = document.getElementById("emp_banner").files[0].name;
                                    var form_data = new FormData();
                                    var ext = name.split('.').pop().toLowerCase();
                                    if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                                          alert("Invalid Image File");
                                    }
                                    var oFReader = new FileReader();
                                    oFReader.readAsDataURL(document.getElementById("emp_banner").files[0]);
                                    var f = document.getElementById("emp_banner").files[0];
                                    var fsize = f.size || f.fileSize;
                                    if (fsize > 2000000) {
                                          alert("Image File Size is very big");
                                    } else {
                                          form_data.append("file", document.getElementById('emp_banner').files[0]);
                                          form_data.append("emp_id", emp_id);
                                          $.ajax({
                                                url: "upload_emp_banner.php",
                                                method: "POST",
                                                data: form_data,
                                                contentType: false,
                                                cache: false,
                                                processData: false,

                                                success: function(data) {
                                                      $('.employee-banner').empty().html(data);
                                                      toastr.success("Employee Profile Banner Updated !");
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