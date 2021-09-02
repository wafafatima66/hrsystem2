<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<!-- delete message -->
<?php 
if(isset($_GET['delete'])){
    if(isset($_GET['delete']) =='success'){
        echo  '<script>toastr.success("Applicant deleted successfully")</script>';
    }else if(isset($_GET['delete']) =='fail'){
        echo  '<script>toastr.error("Applicant not deleted. Try again !")</script>';
    }
}
?>

<?php
// adding applicant 
if (isset($_POST['submit'])) {

    // $assigned = 0;
    if(isset($_POST['item_no'])){
        $item_no = $_POST['item_no'];
        $position_no = "";
    }else if(isset($_POST['position_no'])){
        $position_no = $_POST['position_no'];
        $item_no = "";
    }
    
   
    $applicant_id = $_POST['applicant_id'];
    $applicant_rating = $_POST['applicant_rating'];
    $applicant_rank = $_POST['applicant_rank'];
    $applicant_first_name = $_POST['applicant_first_name'];
    $applicant_last_name = $_POST['applicant_last_name'];
    $applicant_middle_name = $_POST['applicant_middle_name'];
    $applicant_ext = $_POST['applicant_ext'];
    $applicant_gender = $_POST['applicant_gender'];
    $applicant_country = $_POST['applicant_country'];
    $applicant_state = $_POST['applicant_state'];
    $applicant_municipal = $_POST['applicant_municipal'];
    $applicant_zip = $_POST['applicant_zip'];

    
    $targetDir = "../files/";
    $fileNames = array_filter($_FILES['applicant_files']['name']);
    // $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    if (!empty($fileNames)) {
        foreach ($_FILES['applicant_files']['name'] as $key => $val) {
            // File upload path 
            $fileName = "applicant - " . $applicant_id . "-" .  basename($_FILES['applicant_files']['name'][$key]);

            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            // Upload file to server 
            if (move_uploaded_file($_FILES["applicant_files"]["tmp_name"][$key], $targetFilePath)) {
                // Image db insert sql 
                $sql_files = "INSERT INTO applicant_file (file_name, applicant_id) VALUES ('$fileName' , '$applicant_id') ";
                if (mysqli_query($conn, $sql_files)) {
                    echo  '<script>toastr.success("Files uploaded")</script>';
                }
            } else {
                echo  '<script>toastr.error("Files Not uploaded ! Try again")</script>';
            }
        }
    }

    $sql = "INSERT INTO applicant (
        item_no  , position_no, applicant_id , applicant_rating , applicant_rank , applicant_first_name, applicant_last_name, applicant_middle_name, applicant_ext, applicant_gender, applicant_country, applicant_state, applicant_municipal, applicant_zip ) VALUES (  '$item_no' , '$position_no', '$applicant_id' ,' $applicant_rating' , '$applicant_rank', '$applicant_first_name', '$applicant_last_name', '$applicant_middle_name', '$applicant_ext', '$applicant_gender', '$applicant_country', '$applicant_state', '$applicant_municipal','$applicant_zip' )";


    if (!empty($_POST['hiring_education'])) {
        for ($i = 0; $i < count($_POST['hiring_education']); $i++) {

            $hiring_education = $_POST['hiring_education'][$i];

            $sql1 = "INSERT INTO hiring_education (
        applicant_id  , hiring_education  ) VALUES ( '$applicant_id'  , '$hiring_education')";

            mysqli_query($conn, $sql1);
        }
    }

    if (!empty($_POST['hiring_work_exp'])) {
        for ($i = 0; $i < count($_POST['hiring_work_exp']); $i++) {

            $hiring_work_exp = $_POST['hiring_work_exp'][$i];

            $sql2 = "INSERT INTO hiring_work_exp (
        applicant_id  , hiring_work_exp  ) VALUES ( '$applicant_id'  , '$hiring_work_exp')";
            mysqli_query($conn, $sql2);
        }
    }

    if (!empty($_POST['hiring_training'])) {
        for ($i = 0; $i < count($_POST['hiring_training']); $i++) {

            $hiring_training = $_POST['hiring_training'][$i];

            $sql3 = "INSERT INTO hiring_training (
            applicant_id  , hiring_training  ) VALUES ( '$applicant_id'  , '$hiring_training')";
            mysqli_query($conn, $sql3);
        }
    }

    if (!empty($_POST['hiring_eligibility'])) {
        for ($i = 0; $i < count($_POST['hiring_eligibility']); $i++) {

            $hiring_eligibility = $_POST['hiring_eligibility'][$i];

            $sql4 = "INSERT INTO hiring_eligibility (
                applicant_id  , hiring_eligibility  ) VALUES ( '$applicant_id'  , '$hiring_eligibility')";
            mysqli_query($conn, $sql4);
        }
    }



    if (mysqli_query($conn, $sql)) {

        echo  '<script>toastr.success("Applicant added successfully")</script>';
    } else {
        echo  '<script>toastr.error("Applicant not added. Try again !")</script>';
    }
}

// editing aplicant 

if (isset($_POST['edit_applicant'])) {

    $assigned = 0;

    if(isset($_POST['item_no'])){
        $item_no = $_POST['item_no'];
        $position_no = "";
    }else if(isset($_POST['position_no'])){
        $position_no = $_POST['position_no'];
        $item_no = "";
    }

    $applicant_id = $_POST['applicant_id'];
    $applicant_rating = $_POST['applicant_rating'];
    $applicant_rank = $_POST['applicant_rank'];
    $applicant_first_name = $_POST['applicant_first_name'];
    $applicant_last_name = $_POST['applicant_last_name'];
    $applicant_middle_name = $_POST['applicant_middle_name'];
    $applicant_ext = $_POST['applicant_ext'];
    $applicant_gender = $_POST['applicant_gender'];
    $applicant_country = $_POST['applicant_country'];
    $applicant_state = $_POST['applicant_state'];
    $applicant_municipal = $_POST['applicant_municipal'];
    $applicant_zip = $_POST['applicant_zip'];

    $del_sql_1 = "DELETE FROM applicant WHERE applicant_id='$applicant_id'";
    $conn->query($del_sql_1);

    $del_sql_2 = "DELETE FROM hiring_education WHERE applicant_id='$applicant_id'";
    $conn->query($del_sql_2);

    $del_sql_3 = "DELETE FROM hiring_work_exp WHERE applicant_id='$applicant_id'";
    $conn->query($del_sql_3);

    $del_sql_4 = "DELETE FROM hiring_training WHERE applicant_id='$applicant_id'";
    $conn->query($del_sql_4);

    $del_sql_5 = "DELETE FROM hiring_eligibility WHERE applicant_id='$applicant_id'";
    $conn->query($del_sql_5);


    $targetDir = "../files/";
    $fileNames = array_filter($_FILES['applicant_files']['name']);
    // $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    if (!empty($fileNames)) {
        foreach ($_FILES['applicant_files']['name'] as $key => $val) {
            // File upload path 
            $fileName = "applicant - " . $applicant_id . "-" .  basename($_FILES['applicant_files']['name'][$key]);

            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            // Upload file to server 
            if (move_uploaded_file($_FILES["applicant_files"]["tmp_name"][$key], $targetFilePath)) {
                // Image db insert sql 
                $sql_files = "INSERT INTO applicant_file (file_name , applicant_id) VALUES ('$fileName' , '$applicant_id') ";
                if (mysqli_query($conn, $sql_files)) {
                    echo  '<script>toastr.success("Files uploaded")</script>';
                }
            } else {
                echo  '<script>toastr.error("Files Not uploaded ! Try again")</script>';
            }
        }
    }

    $sql = "INSERT INTO applicant (
    item_no  , position_no,  applicant_id , applicant_rating , applicant_rank , applicant_first_name, applicant_last_name, applicant_middle_name, applicant_ext, applicant_gender, applicant_country, applicant_state, applicant_municipal, applicant_zip ) VALUES (  '$item_no'  , '$position_no',  '$applicant_id' ,' $applicant_rating' , '$applicant_rank', '$applicant_first_name', '$applicant_last_name', '$applicant_middle_name', '$applicant_ext', '$applicant_gender', '$applicant_country', '$applicant_state', '$applicant_municipal','$applicant_zip' )";


    if (!empty($_POST['hiring_education'])) {
        for ($i = 0; $i < count($_POST['hiring_education']); $i++) {

            $hiring_education = $_POST['hiring_education'][$i];

            $sql1 = "INSERT INTO hiring_education (
    applicant_id  , hiring_education  ) VALUES ( '$applicant_id'  , '$hiring_education')";

            mysqli_query($conn, $sql1);
        }
    }

    if (!empty($_POST['hiring_work_exp'])) {
        for ($i = 0; $i < count($_POST['hiring_work_exp']); $i++) {

            $hiring_work_exp = $_POST['hiring_work_exp'][$i];

            $sql2 = "INSERT INTO hiring_work_exp (
    applicant_id  , hiring_work_exp  ) VALUES ( '$applicant_id'  , '$hiring_work_exp')";
            mysqli_query($conn, $sql2);
        }
    }

    if (!empty($_POST['hiring_training'])) {
        for ($i = 0; $i < count($_POST['hiring_training']); $i++) {

            $hiring_training = $_POST['hiring_training'][$i];

            $sql3 = "INSERT INTO hiring_training (
        applicant_id  , hiring_training  ) VALUES ( '$applicant_id'  , '$hiring_training')";
            mysqli_query($conn, $sql3);
        }
    }

    if (!empty($_POST['hiring_eligibility'])) {
        for ($i = 0; $i < count($_POST['hiring_eligibility']); $i++) {

            $hiring_eligibility = $_POST['hiring_eligibility'][$i];

            $sql4 = "INSERT INTO hiring_eligibility (
            applicant_id  , hiring_eligibility  ) VALUES ( '$applicant_id'  , '$hiring_eligibility')";
            mysqli_query($conn, $sql4);
        }
    }



    if (mysqli_query($conn, $sql)) {

        echo  '<script>toastr.success("Applicant updated successfully")</script>';
    } else {
        echo  '<script>toastr.error("Applicant not updated. Try again !")</script>';
    }
}

?>

<?php

if (isset($_GET['item_no']) || isset($_GET['position_no']) ) {
   
    if (isset($_GET['item_no'])){
        $item_no =  $_GET['item_no'];
        $query = "SELECT *  FROM applicant where item_no = '$item_no'";
        $del_id =  $_GET['item_no'] . '&item';
    } else if (isset($_GET['position_no'])){
        $position_no =  $_GET['position_no'];
        $query = "SELECT *  FROM applicant where position_no = '$position_no'";
        $del_id =  $_GET['position_no'] . '&position';
    }
    

?>



    <!-- <div class="form-row mt-2 mb-4">
        <div class="col-lg-12 col-sm-12">
            <h4 class="h4-heading">ITEM MANAGEMENT - PERMANENT </h4>
        </div>
    </div> -->


    <h4 class="background-title-1 p-3">Item profile (Add applicants)</h4>

    <div class="" style="border:solid 1px #505A43 ; padding:20px;">



        <div class="form-row mt-3">
            <div class="col-lg-12 col-sm-12">
                <label for="" class="h6">Applicant</label>
            </div>
        </div>

        <table class="table home-page-table mt-4 table-striped table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Rank</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $output = "";
                
                // $query = "SELECT *  FROM applicant where item_no = '$item_no'";

                $result = mysqli_query($conn, $query);

                $i = 1 ; 
                if (mysqli_num_rows($result) > 0) {

                    while ($mydata = mysqli_fetch_assoc($result)) {
                        
                        echo "<tr>
                            <td>{$i}</td>
                            <td>
                                {$mydata['applicant_first_name']}  {$mydata['applicant_middle_name']} {$mydata['applicant_last_name']} {$mydata['applicant_ext']} 
                            </td>
                            <td> {$mydata['applicant_country']} </td>
                            <td>{$mydata['applicant_rating']} </td>
                            <td>{$mydata['applicant_rank']} </td>
                            <td>
                                <a class='view_applicant_btn' data-toggle='modal' data-target='#view_applicant' data-id=' {$mydata['id']} '><i class='fa fa-edit mx-2'></i></a>

                                
                                <a href='delete_applicant.php?applicant_id={$mydata['applicant_id']}&del_id={$del_id}' onClick=\"return confirm('Are you sure you want to delete the applicant');\"><i class='fa fa-trash mx-2'></i></a>
                            </td>
                        </tr>";
                        
                        // echo $output;
                        $i++ ;
                    }
                } else {
                    echo "<tr>
                    <td colspan = '6'>No data Available</td>
                        </tr>";
                } ?>
            </tbody>
        </table>






        <div class="text-right">
            <a href="../hiring_publication/" class="btn button-1 mt-2 ">Back</a>

            <button class="ml-3 btn button-1 mt-2" data-toggle="modal" data-target="#add_applicant">Add Applicant</button>
        </div>



        <!-- end of first part -->

    </div>


    <!-- add applicant modal -->

    <?php include 'add_applicant_modal.php' ?>

    <!-- view applicant modal -->
    
    <div class="modal fade view_applicant " id="view_applicant"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <h3 class=" background-title-1 p-3">View Applicant</h3>

                <div class="modal-body" id="view_applicant_details">

                </div>
            </div>
        </div>
    </div>

   

<?php } ?>

<script>

$(document).ready(function(){
    $(".view_applicant_btn").click(function(){
        // $("#view_applicant").modal();

        //THIS IS JQUERY AJAX METHOD
        $.ajax({
            type:'POST',
            url:'get_applicant_details.php',
            data: { id : $(this).data("id")  },
            success:function(data){
                $("#view_applicant_details").html(data); //the data is displayed in id=display_details
            }
        }); 
    });

});
</script>