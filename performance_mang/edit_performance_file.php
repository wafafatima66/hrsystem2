<?php

include '../config.php';
include SITE_ROOT . '/includes/header.php';
?>

<?php
include '../includes/conn.php';

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $performance_file_id = $_POST['performance_file_id'];
    $emp_id = $_POST['emp_id'];
    $excel_file_type = $_POST['excel_file_type'];
    $year = $_POST['year'];
    $rating_period = $_POST['rating_period'];
    $rating = $_POST['rating'];
    $file_date = date("Y-m-d");

    // $excel_file_name = $_POST['excel_file_name'];


    if (!empty($_FILES["excel_file_name"]["name"])) {
        $excel_file_name = "excel-" . time() . '-' . $emp_id . "-" . $_FILES["excel_file_name"]["name"];
        $tempname = $_FILES["excel_file_name"]["tmp_name"];
        $folder = "../files/" . $excel_file_name;
        $file_size = $_FILES['excel_file_name']['size'];
        //checking file extension

        $text1 = explode('.', $_FILES['excel_file_name']['name']);
        $text = strtolower(end($text1));
        $file_ext = strtolower($text);
        $extensions = array("xlsx");

        if (in_array($file_ext, $extensions) === false) {
            echo  '<script>toastr.error("File must be Excel sheet !")</script>';
        } else {
            (move_uploaded_file($tempname, $folder));
        }
    }
    else{
        $query = "SELECT excel_file_name FROM emp_performance where id = '$performance_file_id'";
        $runquery = $conn->query($query);
        while ($mydata = $runquery->fetch_assoc()) {
            $excel_file_name = ($mydata['excel_file_name']);
        }
    }
    

    $sql = "UPDATE emp_performance SET excel_file_type = '$excel_file_type' , year = '$year', rating_period ='$rating_period',rating = '$rating' , excel_file_name ='$excel_file_name' WHERE id = '$performance_file_id'";


    $sql1 = "UPDATE emp_file SET file_name = '$excel_file_name' , file_date = '$file_date' WHERE performance_file_id = '$performance_file_id'";

    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)) {
        echo  '<script>toastr.success("Performance File updated Succesfully ")</script>';
    } else {
        echo  '<script>toastr.error("Performance File not updated !")</script>';
    }
}


if (isset($_GET['performance_file_id'])) {

    $performance_file_id =  $_GET['performance_file_id'];
    $id =  $_GET['id']; //to find out employee

    $query = "SELECT * FROM emp_performance WHERE id = '$performance_file_id'";

    $runquery = $conn->query($query);
    if ($runquery == true) {
        if (mysqli_num_rows($runquery) > 0) {
            while ($mydata = $runquery->fetch_assoc()) {

                $excel_file_name = '../files/' . $mydata['excel_file_name']; ?>

<div class=" col-lg-12 col-sm-12 mt-2">
    <h4 class="h4-heading">EDIT PERFORMANCE</h4>
  </div>
                <form class="container mt-3 container-box" action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" value="<?php echo $mydata['id'] ?>" name="performance_file_id">
                    <input type="hidden" value="<?php echo $mydata['emp_id'] ?>" name="emp_id">
                    <input type="hidden" value="<?php echo $id ?>" name="id">

                    <div class="form-row">
                        <div class="col-lg-2 col-sm-6">
                            <label for="">Select File Type</label>
                            <select name="excel_file_type" class="form-control text-input">
                                <option value="IPCR" <?php echo ($mydata['excel_file_type'] == 'IPCR') ? "selected" : "" ?>>IPCR
                                </option>
                                <option value="DPCR" <?php echo ($mydata['excel_file_type'] == 'DPCR') ? "selected" : "" ?>> DPCR
                                </option>
                            </select>
                        </div>

                        <div class="col-lg-1 col-sm-6">
                            <label for="">Year</label>
                            <input type="number" min="1900" max="2099" step="1" class="form-control text-input" name="year" value="<?php echo ($mydata['year']) ?>" />
                        </div>

                        <div class="col-lg-2 col-sm-6">
                            <label for="">Rating Period</label>
                            <select name="rating_period" class="form-control text-input">
                                <option value="">Rating period</option>
                                <option value="1" <?php echo ($mydata['rating_period'] == '1') ? "selected" : "" ?>>1</option>
                                <option value="2" <?php echo ($mydata['rating_period'] == '2') ? "selected" : "" ?>>2</option>
                            </select>
                        </div>

                        <div class="col-lg-2 col-sm-6">
                            <label for="">Rating</label>
                            <input type="text" name="rating" class="form-control text-input" value=" <?php echo ($mydata['rating']) ?>">
                        </div>

                        <!-- <div class="col-lg-3 col-sm-6 mt-2">
                        <input type="file" name="excel_file_name" required>
                    </div> -->
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-lg-2 col-sm-6 col-6" style="cursor: pointer;">
                        <a href="<?php echo $excel_file_name; ?>" class="btn button-1">View File</a>
                                <!-- <img src="../img/excel.png" alt="" style="width:100%; height:50%"></a>
                                <small>View File</small> -->
                        </div>

                        <div class="col-lg-3 col-sm-6 mt-2">
                            <input type="file" name="excel_file_name" value="change">
                            <small style="color: #fc7e43;">Change File</small>
                        </div>

                    </div>

                    <div class="form-row mt-2 ">
                        <div class="col-lg-2 col-sm-12 ">
                            <button class="btn button-1" type="submit" name="submit">Update</button>
                            <a href="../performance_mang/emp_profile.php?id=<?php echo $id; ?>" class="btn button-1 ">Back</a>
                        </div>
                    </div>


                </form>

<?php    }
        }
    }
} else {
    echo "Wrong File id !";
}

?>