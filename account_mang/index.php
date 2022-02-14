<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<style>
.employee-banner-setting , .emp-profile-img-setting {
      height: 300px;
      width: 100%;
      background-color: #505A43;
}
</style>

<?php 
$userid = $_SESSION['login_user'];

$sql = mysqli_query($conn, "select * from users where id = '$userid' ");
// echo $userid ; 

$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);


$admin_photo_to_show = '../img/' . $row['admin_photo'];
$emp_id = $row['emp_id'];

$sql2 = mysqli_query($conn, "select emp_image , emp_banner from employee where emp_id = '$emp_id' ");
$row2 = mysqli_fetch_array($sql2, MYSQLI_ASSOC);


$emp_image = '../emp_img/' .$row2['emp_image'];
$emp_banner = '../emp_img/' .$row2['emp_banner'];


if (isset($_POST['submit'])) {

      $add1 = "";
      $add2 = "";
      if (isset($_POST['username'])&& !empty(isset($_POST['username']))) {
            $username = $_POST['username'];
            $add1 = "username ='$username'";
      }
      if (isset($_POST['password']) && !empty(isset($_POST['password']))) {
            if (isset($_POST['current_password'])&& !empty(isset($_POST['password']))) {
                  $current_password = trim($_POST['current_password']);
                  $db_password = trim($row['password']);
                  
                  if ($db_password == $current_password) {
                        $password = $_POST['password'];
                        if(empty($add1)){
                              $add2="password = '$password'";
                        }else {
                              $add2=", password = '$password'";
                        }
                  } else {
                        echo  '<script>toastr.error("Current Password is Wrong ! Try again ")</script>';
                        // die ;
                  }
            } else {
                  echo  '<script>toastr.error("Type Your Current Password ! ")</script>';
                  // die ;
            }
      }
            $sql = "UPDATE users SET ".$add1." ".$add2."  WHERE id = '$userid'";
            if (mysqli_query($conn, $sql)) {
                  echo  '<script>toastr.success("Admin data updated succesfully")</script>';
            } else {
                  echo  '<script>toastr.error("Admin data did not update ! try again")</script>';
            }

}

?>
<form action="" method="post" enctype="multipart/form-data">
      <div class="container mt-5">
            <h4 class="h4-heading">Account Management</h4>

            <!-- end of first part -->

            <div class="row mt-3">

                  <div class="col-lg-3 col-sm-4" <?php echo($_SESSION['user_role'] == 'Super Administrator' ? '' : 'style="display:none"')?>>
                  <label for="">User Image</label>
                        <!-- <div class="account-profile-img">
                              <img src="<?php echo $admin_photo_to_show ?>" alt="" id="previewImg" style="width:100%;height:100%">
                        </div>

                        <div class="text-lg-right  mt-2">
                              <label>
                                    <i class="fa fa-camera"> </i>
                                    <input type="file" style="display: none;" name="admin_photo" onchange="previewFile(this);">
                              </label>
                        </div> -->

                        <div class="account-profile-img">
                              
                              <img src="<?php echo  $admin_photo_to_show; ?>" alt="" style="width:100%;height:100%">
                        </div>
                        <div class="text-lg-right  mt-2">
                              <label>
                                    <i class="fa fa-camera"> </i>
                                    <input type="file" style="display: none;" name="admin_photo" id="admin_photo">
                                    <input type="hidden" name="user_id" value="<?php echo $userid ?>">
                              </label>
                        </div>
                  </div>

                  <div class="col-lg-3 col-sm-4">
                  <label for="">Employee Image</label>
                        <div class="emp-profile-img-setting">
                              <img src="<?php echo  $emp_image; ?>" alt="" style="width:100%;height:100%">
                        </div>
                        <div class="text-lg-right  mt-2">
                              <label>
                                    <i class="fa fa-camera"> </i>
                                    <input type="file" style="display: none;" name="emp_image" id="emp_image">
                                    <input type="hidden" name="emp_id" value="<?php echo $emp_id ?>">

                              </label>
                        </div>
                  </div>

                  <div class="col-lg-6 col-sm-6">
                        <label for="">Banner Image</label>
                        <div class="employee-banner-setting">
                              <img src="<?php echo  $emp_banner; ?>" alt="" style="width:100%;height:100%">
                        </div>
                        <label>
                              <i class="fa fa-camera"> </i>
                              <input type="file" style="display: none;" name="emp_banner" id="emp_banner">
                              <input type="hidden" name="emp_id" value="<?php echo $emp_id ?>">
                        </label>
                  </div>

            </div>

            <div class="row mt-3">
                  <div class="col-lg-3 col-sm-12">
                        <input type="text" class="form-control text-input" placeholder="Username" value="<?php echo $row['username'] ?>" name='username'>
                  </div>

                  <div class="col-lg-3 col-sm-12">
                        <input type="text" class="form-control text-input" placeholder="Current Password" name="current_password" >
                  </div>

                  <div class="col-lg-3 col-sm-12">
                        <input type="text" class="form-control text-input" placeholder="New Password" name="password" >
                  </div>

                  <div class="col-lg-3 col-sm-12"><button class="ml-3 btn button-2" type="submit" name="submit">Update</button>
                  </div>
            </div>

      </div>

</form>


<script>
      function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                  var reader = new FileReader();

                  reader.onload = function() {
                        $("#previewImg").attr("src", reader.result);
                  }

                  reader.readAsDataURL(file);
            }
      }

      //     employee image uploading 

      $(document).on('change', '#admin_photo', function() {
            var user_id = $('input[name="user_id"]').val();
            var name = document.getElementById("admin_photo").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                  alert("Invalid Image File");
            }
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("admin_photo").files[0]);
            var f = document.getElementById("admin_photo").files[0];
            var fsize = f.size || f.fileSize;
            if (fsize > 2000000) {
                  alert("Image File Size is very big");
            } else {
                  form_data.append("file", document.getElementById('admin_photo').files[0]);
                  form_data.append("user_id", user_id);
                  $.ajax({
                        url: "upload_admin_photo.php",
                        method: "POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,

                        success: function(data) {
                              $('.account-profile-img').empty().html(data);
                              toastr.success("Admin Photo Image Updated !");
                        }
                  });
            }

      });
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
                              $('.emp-profile-img-setting').empty().html(data);
                              toastr.success("Employee Profile Image Updated !");
                        }
                  });
            }
      });

      //     employee banner uploading 

      $(document).on('change', '#emp_banner', function() {
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
                              $('.employee-banner-setting').empty().html(data);
                              toastr.success("Employee Profile Banner Updated !");
                        }
                  });
            }
      });
</script>