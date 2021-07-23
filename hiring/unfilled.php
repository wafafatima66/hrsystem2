<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<?php

if (isset($_GET['id'])) {

    $id =  $_GET['id'];


    $query = "SELECT * FROM item WHERE id = '$id'";

    $runquery = $conn->query($query);
    if ($runquery == true) {
        while ($mydata = $runquery->fetch_assoc()) {



?>

            <div class="container ">

                <div class="form-row mt-2">
                    <div class="col-lg-12 col-sm-12">
                        <label for="" class="h2 mb-5 ">ITEM MANAGEMENT - PERMANENT </label>
                    </div>
                </div>


                <h4 class="background-title-1 p-3">Item profile (Unfilled)</h4>

                <div class="unfilled-box" style="border:solid 1px #505A43 ; padding:20px;">

                    <div class="form-row mt-5">

                        <div class="col-lg-4 col-sm-6 form-inline">
                            <label for="" class="mx-2">Nature</label>
                            <input type="text" class=" form-control text-input" placeholder="" value="<?php echo $mydata['nature']; ?>">
                        </div>

                        <div class="col-lg-4 col-sm-6 form-inline">
                            <label for="" class="mx-2">Item No</label>
                            <input type="text" class=" form-control text-input" placeholder="" value="<?php echo $mydata['item_no']; ?>">
                        </div>

                        <div class="col-lg-4 col-sm-6 form-inline">
                            <label for="" class="mx-2">Plantilla</label>
                            <input type="text" class="form-control text-input" placeholder="" value="<?php echo $mydata['position']; ?>">
                        </div>

                    </div>



                    <div class="form-row mt-3">

                        <div class="col-lg-4 col-sm-6 form-inline">
                            <label for="" class="mx-2">Salary Grade</label>
                            <input type="text" class=" form-control text-input" placeholder="" value="<?php echo $mydata['salary_grade']; ?>">
                        </div>

                        <div class="col-lg-4 col-sm-6 form-inline">
                            <label for="" class="mx-2">Date Created</label>
                            <input type="date" class=" form-control text-input" placeholder="" value="<?php echo $mydata['date_created']; ?>">
                        </div>

                        <div class="col-lg-4 col-sm-6 form-inline">
                            <label for="" class="mx-2">Date posted</label>
                            <input type="date" class="form-control text-input" placeholder="">
                        </div>
                    </div>

                    <div class="form-row mt-5">
                        <div class="col-lg-12 col-sm-12">
                            <label for="" class="h6">Name of previous Employees(If applicable)</label>
                        </div>

                        <div class="col-lg-4 col-sm-6 ">

                            <input type="text" class=" form-control text-input" placeholder="ID no">
                        </div>

                        <div class="col-lg-4 col-sm-6 e">

                            <input type="text" class=" form-control text-input" placeholder="First Name,Last Name,Middle Name , Ext">
                        </div>

                        <div class="col-lg-4 col-sm-6 ">

                            <input type="text" class="form-control text-input" placeholder="Retired">
                        </div>


                    </div>

                    <?php

                    $item_no =  $mydata['item_no'];

                    ?>
                    <div class="form-row mt-5">
                        <div class="col-lg-12 col-sm-12">
                            <label for="" class="h6">Minimum Qualification</label>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <label for="">Education</label>
                            <?php


                            $query = "SELECT * FROM hiring_education WHERE item_no = '$item_no'";

                            $runquery = $conn->query($query);
                            $rowcount = mysqli_num_rows($runquery);
                            if ($rowcount > 0) {

                                while ($mydata = $runquery->fetch_assoc()) {

                                    echo '<input type="text" class=" form-control text-input mt-3" placeholder="" value=" ' . $mydata["hiring_education"] . '">';
                                }
                            }
                            ?>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <label for="">Work Experience</label>
                            <?php

                            $query = "SELECT * FROM hiring_work_exp WHERE item_no = '$item_no'";

                            $runquery = $conn->query($query);
                            $rowcount = mysqli_num_rows($runquery);
                            if ($rowcount > 0) {

                                while ($mydata = $runquery->fetch_assoc()) {

                                    echo '<input type="text" class=" form-control text-input mt-3" placeholder="" value=" ' . $mydata["hiring_work_exp"] . '">';
                                }
                            } ?>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <label for="">Training</label>

                            <?php
                            $query = "SELECT * FROM hiring_training WHERE item_no = '$item_no'";

                            $runquery = $conn->query($query);
                            $rowcount = mysqli_num_rows($runquery);
                            if ($rowcount > 0) {

                                while ($mydata = $runquery->fetch_assoc()) {

                                    echo '<input type="text" class=" form-control text-input mt-3" placeholder="" value=" ' . $mydata["hiring_training"] . '">';
                                }
                            } ?>
                        </div>

                        <div class="col-lg-3 col-sm-6 ">
                            <label for="">Eligibility</label>
                <?php $query = "SELECT * FROM hiring_eligibility WHERE item_no = '$item_no'";

                $runquery = $conn->query($query);
                $rowcount = mysqli_num_rows($runquery);
                if ($rowcount > 0) {

                    while ($mydata = $runquery->fetch_assoc()) {

                        echo ' <input type="text" class=" form-control text-input mt-3" placeholder="" value=" ' . $mydata["hiring_eligibility"] . '">';
                    }
                }
            }
        }
    } ?>

                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-lg-12 col-sm-12">
                            <label for="" class="h6">Applicant</label>
                        </div>
                    </div>

                    <table class="table home-page-table mt-4 table-striped table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">Applicant Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Rank</th>
                                <th scope="col">Action</th>
                                <th scope="col">Assigned</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        
                        if (isset($_GET['id'])) {

                            $id =  $_GET['id'];

                            $query = "SELECT item_no FROM item WHERE id = '$id'";
                            $runquery = $conn->query($query);
                            if ($runquery == true) {
                                while ($mydata = $runquery->fetch_assoc()) {

                                    $item_no =  $mydata['item_no'];
                                }
                            }
                        }

                        
                        
                        $query = "SELECT * FROM applicant WHERE item_no = '$item_no'";

                        $runquery = $conn->query($query);
                        if ($runquery == true) {
                            while ($mydata = $runquery->fetch_assoc()) { ?>

                            <tr>
                                <td><?php echo $mydata['applicant_id'] ?> </td>
                                <td><?php echo $mydata['applicant_first_name'] ?> </td>
                                <td><?php echo $mydata['applicant_state'] ?> </td>
                                <td><?php echo $mydata['applicant_rating'] ?> </td>
                                <td><?php echo $mydata['applicant_rank'] ?> </td>

                                <td>

                                <a href="unfilled-edit.php?applicant_id=<?php echo $mydata['applicant_id'] ?>" ><i class='fa fa-edit mx-2'></i></a>

                                </td>

                                <td>

                                    <div class="form-check form-check-inline">
                                    <input id="applicant_assigned" type="checkbox" class="text-input mx-3" <?php if ($mydata['assigned'] == 1) echo "checked"?>>
                                    </div>
                                </td>

                            </tr>

                           <?php }}?>
                            

                        </tbody>
                    </table>



                    <button type="button" class="btn button-1" data-toggle="modal" data-target="#addapplicant">Add
                        Applicant</button>


                </div>
            </div>


           

           
           <!-- add modal -->
           <?php include 'unfilled-add-modal.php' ?>


         


            <script type="text/javascript">
                $(document).ready(function() {
                    var maxField = 10;
                    var x = 1;

                    $('.add_education').click(function() {
                        if (x < maxField) {
                            x++;
                            $('.education_wrapper').append(
                                '<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_education[]" >'
                            );
                        }
                    });

                    $('.add_work_exp').click(function() {
                        if (x < maxField) {
                            x++;
                            $('.work_exp_wrapper').append(
                                '<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_work_exp[]">'
                            );
                        }
                    });

                    $('.add_training').click(function() {
                        if (x < maxField) {
                            x++;
                            $('.traning_wrapper').append(
                                '<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_training[]">'
                            );
                        }
                    });

                    $('.add_eligibility').click(function() {
                        if (x < maxField) {
                            x++;
                            $('.eligibility_wrapper').append(
                                '<input type="text" class="form-control text-input mt-1 mb-1" name="hiring_eligibility[]">'
                            );
                        }
                    });


                });

              
  
      $("#formSubmit").on("submit",function(e){
          e.preventDefault();
          var name = $("#name").val();
          var course = [];
          $(".form-check-input").each(function(){
              if ($(this).is(":checked")) {
                  course.push($(this).val());
              }
          });

          course = course.toString(); // toString function convert array to string
          
          if (name !=="" && course.length > 0) {
            $.ajax({
              url : "insert.php",
              type: "POST",
              cache: false,
              data : {name:name,course:course},
              success:function(result){
                if (result==1) {
                    $("#formSubmit").trigger("reset");
                    alert("Data insert in database successfully");
                }
              }
            });
          }else{
            alert("Fill the required fields");
          }
      });
 

            </script>