
<?php
require '../includes/conn.php';
if(isset($_POST['submit'])){

  $emp_id = $_POST['emp_id'];  
  

  $file_date = date("Y-m-d"); //date("l jS \of F Y ");
  $file_folder = $_POST["folder"];

  $file_name =  $emp_id."-".$_FILES['upload_file']['name'];
  $file_loc = $_FILES['upload_file']['tmp_name'];
  $file_size = $_FILES['upload_file']['size'];
  $file_type = $_FILES['upload_file']['type'];
  $path="../files/";


$query = "SELECT * FROM emp_file WHERE file_name = '$file_name' and file_folder = '$file_folder' ";

$runquery = $conn -> query($query);
$rowcount=mysqli_num_rows($runquery);
if($rowcount == 0 ){

       if(move_uploaded_file($file_loc,$path.$file_name)) {


      $sql="INSERT INTO emp_file (emp_id ,file_folder, file_name, file_type, file_size,file_date) VALUE ('$emp_id' ,'$file_folder', '$file_name', '$file_type', '$file_size', '$file_date')";
      
       if (mysqli_query($conn, $sql)){
        echo  '<script>toastr.success("File uploaded !")</script>';
       } else {
        echo  $conn->error;
        echo  '<script>toastr.error("File not uploaded !")</script>';
       }
          
         
      } else {
        echo  '<script>toastr.error("Could not move to location!")</script>';
       }
    } else{
      echo  '<script>toastr.error("File exist !")</script>';
    }
    
     
}


?>


<div class="container container-box file-box">

  <div class="form-row">

    <div class="col-lg-3 col-sm-6 text-center">
      <h6>PDS</h6>

      <a data-id="<?php echo $emp_id?>" data-folder="pds" data-toggle="modal" data-target="#modal-popup" class="view_file"><i class="fas fa-folder-open" name="pds"></i></a>
    </div>

    <div class="col-lg-3 col-sm-6 text-center">
      <h6>IPCR</h6>

      <a data-id="<?php echo $emp_id?>" data-folder="ipcr" data-toggle="modal" data-target="#modal-popup" class="view_file"><i class="fas fa-folder-open" name="ipcr"></i></a>
    </div>


    <div class="col-lg-3 col-sm-6 text-center">
      <h6>SALN</h6>
      <a data-id="<?php echo $emp_id?>" data-folder="saln" data-toggle="modal" data-target="#modal-popup" class="view_file"><i class="fas fa-folder-open"></i></a>
    </div>

    <div class="col-lg-3 col-sm-6 text-center">
      <h6>OTHERS</h6>
      <a data-id="<?php echo $emp_id?>" data-folder="others" data-toggle="modal" data-target="#modal-popup" class="view_file"><i class="fas fa-folder-open"></i></a>
    </div>



  </div>
  
  <form method="post" action="" enctype="multipart/form-data">

  <input type="hidden" name="emp_id" value="<?php echo $emp_id?>">

    <div class="form-row mt-5 justify-content-center">

      <div class="col-lg-3 col-sm-6">
        <select class="form-control text-input" name="folder" required>
          <option value=""> Select Folder</option>
          <option value="pds"> PDS</option>
          <option value="ipcr">IPCR</option>
          <option value="saln">SALN</option>
          <option value="others">OTHERS</option>
        </select>

        

      </div>

      <div class="col-lg-4 col-sm-6">
        <input type="file" name="upload_file" class="form-control text-input" />
      </div>


      <div class="col-lg-2 col-sm-6">
        <button class="btn button-2" type="submit" name="submit">UPLOAD</button>
      </div>

    </div>
  </form>
  </div>

<div class="modal fade" id="modal-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered " role="document">

    <div class="modal-content">

        <div id="table-data"></div>
        

    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $('.view_file').click(function() {
    var folder = $(this).data('folder');
    var emp_id = $(this).data('id');

      $.ajax({
        url  : "../emp_mang/file-table.php",
        type : "POST",
        cache: false,
        data : {folder:folder , emp_id:emp_id },
        success:function(response){
          $("#table-data").html(response);
        }
      });

    });
 
  });
</script>