<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>


<?php
$userid = $_SESSION['login_user'];

$sql = mysqli_query($conn, "select * from users where id = '$user' ");

$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);

$admin_photo_to_show = '../img/' . $row['admin_photo'];


if (isset($_POST['submit'])) {

      $username = $_POST['username'];

      if (!empty($_POST['password'])) {
            $password = $_POST['password'];
      } else {
            $password = $row['password'];
      }


      if (!empty($_FILES["admin_photo"]["name"])) {
            $admin_photo = "admin" . $userid . "-" . $_FILES["admin_photo"]["name"];

            $tempname = $_FILES["admin_photo"]["tmp_name"];
            $folder = "../img/" . $admin_photo;


            //checking file extension

            $text1 = explode('.', $_FILES['admin_photo']['name']);
            $text = strtolower(end($text1));
            $file_ext = strtolower($text);
            $extensions = array("jpeg", "jpg", "png");

            if (in_array($file_ext, $extensions) === false) {
                  echo  '<script>toastr.error("Image must be JPG , JPEG ,PNG format ! ")</script>';
            } else {
                  (move_uploaded_file($tempname, $folder));
            }
      } else {

            $admin_photo = $row['admin_photo'];
      }


      $sql = "UPDATE users SET username ='$username' , password ='$password ',admin_photo = '$admin_photo'  WHERE id = '$userid'";
      if (mysqli_query($conn, $sql)) {
            echo  '<script>toastr.success("Admin data updated succesfully")</script>';
      } else {
            echo  '<script>toastr.success("Admin data did not update ! try again")</script>';
      }
}



?>
<form action="" method="post" enctype="multipart/form-data">
      <div class="container mt-5">


            <h4 class="h4-heading">Account Management</h4>


            <!-- end of first part -->

            <div class="row mt-3">

                  <div class="col-lg-3 col-sm-4">
                        <div class="account-profile-img">
                              <img src="<?php echo $admin_photo_to_show ?>" alt="" id="previewImg" style="width:100%;height:100%">
                        </div>

                        <div class="text-lg-right  mt-2">


                              <label>
                                    <i class="fa fa-camera"> </i>
                                    <input type="file" style="display: none;" name="admin_photo" onchange="previewFile(this);">
                              </label>


                        </div>
                  </div>

            </div>

            <div class="row mt-3">
                  <div class="col-lg-3 col-sm-12">
                        <input type="text" class="form-control text-input" placeholder="Username" value="<?php echo $row['username'] ?>" name='username'>
                  </div>

                  <div class="col-lg-3 col-sm-12">
                        <input type="text" class="form-control text-input" placeholder="Password" name="password">
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

      //       $('#admin_photo').click(function() {
      // //     $('#photo-name').val($(this).val());


      // });
</script>