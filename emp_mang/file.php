<?php
require '../includes/conn.php';
if (isset($_POST['submit'])) {

  $emp_id = $_POST['emp_id'];

  $file_date = date("Y-m-d"); //date("l jS \of F Y ");
  $file_folder = $_POST["folder"];

  $file_name =  $emp_id ."-" .time(). "-". $_FILES['upload_file']['name'];
  $file_loc = $_FILES['upload_file']['tmp_name'];
  $file_size = $_FILES['upload_file']['size'];
  $file_type = $_FILES['upload_file']['type'];
  $path = "../files/";


  // $query = "SELECT * FROM emp_file WHERE file_name = '$file_name' and file_folder = '$file_folder' ";

  // $runquery = $conn->query($query);
  // $rowcount = mysqli_num_rows($runquery);
  // if ($rowcount == 0) {

    if (move_uploaded_file($file_loc, $path . $file_name)) {

      $sql = "INSERT INTO emp_file (emp_id ,file_folder, file_name, file_type, file_size,file_date) VALUE ('$emp_id' ,'$file_folder', '$file_name', '$file_type', '$file_size', '$file_date')";

      if (mysqli_query($conn, $sql)) {
        echo  '<script>toastr.success("File is uploaded succesfully !")</script>';
      } else {
        echo  $conn->error;
        echo  '<script>toastr.error("File not uploaded !")</script>';
      }
    } else {
      echo  '<script>toastr.error("Could not move to location!")</script>';
    }
  // } 
  // else {
  //   echo  '<script>toastr.error("File exist !")</script>';
  // }
}

//create folder
if (isset($_POST['create_folder'])) {

  $emp_id = $_POST['emp_id'];
  
  $folder_name = $_POST["folder_name"];
  
    $sql = "INSERT INTO emp_folder (emp_id ,folder_name) VALUE ('$emp_id' ,'$folder_name')";
  
    if (mysqli_query($conn, $sql)) {
      echo  '<script>toastr.success("Folder created succesfully !")</script>';
    } else {
      // echo  $conn->error;
      echo  '<script>toastr.error("Folder not created!")</script>';
    }
    } 

?>


<div class="container-box file-box">

  <div class="form-row">

    <div class="col-lg-3 col-sm-6 text-center mt-5">
      <h5>PDS</h5>
     
      <a data-id="<?php echo $emp_id ?>" data-folder="pds" data-toggle="modal" data-target="#modal-popup" class="view_file"><i class="fas fa-folder-open" name="pds"></i></a>
    </div>

    <div class="col-lg-3 col-sm-6 text-center mt-5 ">
      <h5>IPCR</h5>

      <a data-id="<?php echo $emp_id ?>" data-folder="ipcr" data-toggle="modal" data-target="#modal-popup" class="view_file"><i class="fas fa-folder-open" name="ipcr"></i></a>
    </div>


    <div class="col-lg-3 col-sm-6 text-center mt-5">
      <h5>SALN</h5>
      <a data-id="<?php echo $emp_id ?>" data-folder="saln" data-toggle="modal" data-target="#modal-popup" class="view_file"><i class="fas fa-folder-open"></i></a>
    </div>

    <div class="col-lg-3 col-sm-6 text-center mt-5">
      <h5>CERTIFICATES</h5>
      <a data-id="<?php echo $emp_id ?>" data-folder="certificates" data-toggle="modal" data-target="#modal-popup" class="view_file"><i class="fas fa-folder-open"></i></a>
    </div>

<?php 

$sql = "SELECT * FROM emp_folder WHERE emp_id = '$emp_id'  ";

  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($mydata = mysqli_fetch_assoc($result)) {?>

  <div class="col-lg-3 col-sm-6 text-center mt-5">
      <h5 style="text-transform: uppercase;"><?= $mydata['folder_name'] ?> 
        <a href='' class='delete_modal ml-2' data-toggle='modal' data-target='#delete_modal'    data-id='del_folder=<?php echo $mydata["id"] ?>&id=<?php echo $id ?>' style="font-size:30px ;    text-decoration:none ; color : #fc7e43">&times;
        </a>
     </h5>
      <a data-id="<?= $mydata['emp_id'] ?>" data-folder="<?= $mydata['folder_name'] ?>" data-toggle="modal" data-target="#modal-popup" class="view_file"><i class="fas fa-folder-open"></i></a>
  </div>

  <?php  }} ?>
   

    <div class="col-lg-3 col-sm-6 text-center mt-5">
      <h5>ADD FOLDER</h5>
      <a data-id="<?php echo $emp_id ?>" data-toggle="modal" data-target="#create_modal" class="create_folder"><i class="fa fa-plus"></i></a>
    </div>



  </div>

  <form method="post" action="" enctype="multipart/form-data">

    <input type="hidden" name="emp_id" value="<?php echo $emp_id ?>">

    <div class="form-row mt-5 justify-content-center">

      <div class="col-lg-3 col-sm-6">
        <select class="form-control text-input" name="folder" required>
          <option value=""> Select Folder</option>
          <option value="PDS"> PDS</option>
          <option value="IPCR">IPCR</option>
          <option value="SALN">SALN</option>
          <option value="CERTIFICATES">CERTIFICATES</option>
          <!-- <option value="others">OTHERS</option> -->
          <?php 

              $sql = "SELECT * FROM emp_folder WHERE emp_id = '$emp_id'  ";

                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while ($mydata = mysqli_fetch_assoc($result)) {

              echo " <option value='{$mydata['folder_name']}'>{$mydata['folder_name']}</option>" ;
                 }} ?>

        </select>



      </div>

      <div class="col-lg-4 col-sm-6 ">
        <input type="file" name="upload_file" class="form-control text-input" />
      </div>


      <div class="col-lg-2 col-sm-6 ">
        <button class="btn button-2" type="submit" name="submit">UPLOAD</button>
      </div>

    </div>
  </form>
</div>



<!-- <div class="col-lg-12 text-right mt-4 ">

  <button class="btn button-1 " type="submit" name="submit"><i class="fa fa-print"></i></button>

</div> -->

<!-- create folder modal -->
<?php 

   ?>
<div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal " >

    <div class="modal-content">
        <div id="table-data-folder"></div>
     
    </div>
  </div>
</div>

<!-- opening folder -->
<div class="modal fade" id="modal-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-lg " role="document">

    <div class="modal-content">

      <div id="table-data"></div>


    </div>
  </div>
</div>

<?php include "../includes/delete_modal.php";  ?>

<script>
  $(document).ready(function() {
    $('.view_file').click(function() {
      var folder = $(this).data('folder');
      var emp_id = $(this).data('id');
      $.ajax({
        url: "../emp_mang/file-table.php",
        type: "POST",
        cache: false,
        data: {
          folder: folder,
          emp_id: emp_id
        },
        success: function(response) {
          $("#table-data").html(response);
        }
      });
    });


    $('.create_folder').click(function() {
      var emp_id = $(this).data('id');
      $.ajax({
        url: "../emp_mang/file-create-folder.php",
        type: "POST",
        cache: false,
        data: {
          emp_id: emp_id
        },
        success: function(response) {
          $("#table-data-folder").html(response);
        }
      });
    });

  });

  $(document).on('click', '.delete_modal', function() {
        var id = $(this).data('id');
        var url = '../includes/delete.php?';
        var newHref = url.concat(id);
        $('#delete_confirm_btn').attr('href', newHref);
    });

</script>