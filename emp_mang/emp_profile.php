<?php include '../config.php';
include SITE_ROOT .'/includes/header.php'; 
require '../includes/conn.php';

if(isset($_GET['id'])){

      $id =  $_GET['id'];

      $query = "SELECT * FROM employee WHERE id = '$id'";

      $runquery = $conn -> query($query);
      if($runquery == true){
          while($mydata = $runquery -> fetch_assoc()){

            $emp_id = $mydata['emp_id'];
            $photo_to_show = '../img/'.$mydata['emp_image'];

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
                              <img src="<?php echo  $photo_to_show ; ?>" alt="" id="previewImg"
                                    style="width:100%;height:100%">
                        </div>

                        <div class="text-lg-right  mt-2">


                              <label>
                                    <i class="fa fa-camera"> </i>
                                    <input type="file" style="display: none;" name="emp_image"
                                          onchange="previewFile(this);"  form="emp_profile_form">
                              </label>


                        </div>




            </div>
            <div class="col-lg-3 col-sm-4 align-self-end">

                  <h2><?php echo $mydata["emp_first_name"] ." ". $mydata["emp_middle_name"] ." " . $mydata["emp_last_name"] . " " . $mydata["emp_ext"] ?></h2>
                  <h6>Position/officer</h6>

            </div>
            <div class="col-lg-2 col-sm-4"></div>

            <div class="col-lg-4 col-sm-12 d-flex align-items-start flex-column ">
                  <div class="d-flex justify-content-center">
                        <h5 class="emp_profile_button" id="pds">PDS | </h5>
                        <h5 class="emp_profile_button" id="leave">Leave ledger | </h5>
                        <h5 class="emp_profile_button" id="file">File 201</h5>
                  </div>

                  <div class="mt-auto">
                        <h5>Emp.ID : <?php echo $mydata["emp_id"]  ?> </h5>
                        <input type="hidden" name="emp_id" value="<?php echo $mydata['emp_id']?>" form="emp_profile_form">
                  </div>
            </div>
      </div>
      <!-- end of first part -->

      <div class="pds-tab emp_profile_tab" style="display: block;">
            <?php include "pds.php";?>
      </div>

      <div class="leave-tab emp_profile_tab">
            <?php include "leave.php";?>
      </div>

      <div class="file-tab emp_profile_tab">
            <?php include "file.php";?>
      </div>
    

</div>


<?php }} }?>
<script>
 
  $(document).ready(function () {
    $('.emp_profile_button').click(function () {
      var className=$(this).attr('id');
      var tab = className + '-tab';
      var targetBox = $("." + tab);
      $(".emp_profile_tab").not(targetBox).hide();
      $(targetBox).show();
      
    });
  });

  function previewFile(input) {
      var file = $("input[type=file]").get(0).files[0];

      if (file) {
            var reader = new FileReader();

            reader.onload = function () {
                  $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
      }
}

</script>