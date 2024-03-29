<?php

include '../config.php';
include SITE_ROOT . '/includes/header.php';
?>

<?php
include '../includes/conn.php';

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $emp_id = $_POST['emp_id'];
    $date = $_POST['date'];
    $qty = $_POST['qty'];
    $output_date = $_POST['output_date'];
    $success_date = $_POST['success_date'];
    $success_checked = (isset($_POST['success_checked']) ? $_POST['success_checked'] : 0);
    $output_checked = (isset($_POST['output_checked']) ? $_POST['output_checked'] : 0);
    // $success_checked = $_POST['success_checked'];
    // $output_checked = $_POST['output_checked'];

    $output = array();
    $success = array();

    if (isset($_POST['output_description'])) {
        for ($i = 0; $i < count($_POST['output_description']); $i++) {
            $output[$i] = $_POST['output_description'][$i];
        }
        //   $myjson = array(
        //     "output_description" => $output
        //   );
        $output_description = json_encode($output);
    }

    if (isset($_POST['success_description'])) {
        for ($i = 0; $i < count($_POST['success_description']); $i++) {
            $success[$i] = $_POST['success_description'][$i];
        }
        //   $myjson = array(
        //     "output_description" => $output
        //   );
        $success_description = json_encode($success);
    }

    // $sql = "INSERT INTO daily_accomplishment (
    //      emp_id  , date , qty , output_date , success_date , output_description , success_description ) VALUES (  '$emp_id'  , '$date' , '$qty' ,' $output_date' , '$success_date' , '$output_description' , '$success_description' )";

    $sql = "UPDATE daily_accomplishment SET 
    emp_id = '$emp_id' , 
    date = '$date', 
    qty ='$qty',
    output_date = '$output_date' , 
    success_date ='$success_date' ,
    output_description = '$output_description',
    success_description = '$success_description',
    success_checked = '$success_checked',
    output_checked = '$output_checked'
    WHERE id = '$id'";


    if (mysqli_query($conn, $sql)) {
        echo  '<script>toastr.success("Daily Accomplishment updated successfully")</script>';
    } else {
        echo  '<script>toastr.error("Daily Accomplishment not updated. Try again !")</script>';
    }
}



if (isset($_GET['id'])) {

    $id =  $_GET['id']; //to find out employee

    $query = "SELECT * FROM daily_accomplishment WHERE id = '$id'";

    $runquery = $conn->query($query);
    if ($runquery == true) {
        if (mysqli_num_rows($runquery) > 0) {
            while ($mydata = $runquery->fetch_assoc()) {

?>

                <form method="post" action="" enctype="multipart/form-data">

                    <input type="hidden" value="<?php echo $mydata['emp_id'] ?>" name="emp_id">
                    <input type="hidden" value="<?php echo $id?>" name="id">

                    <div class=" col-lg-12 col-sm-12 mt-2">
                        <h4 class="h4-heading">EDIT DAILY ACCOMPLISHMENT</h4>
                    </div>

                    <div class="form-row mt-5">

                        <div class="col-lg-3 col-sm-6">
                            <label for="">Date</label>
                            <input type="date" class="form-control text-input" name="date" value="<?php echo $mydata['date'] ?>">
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <label for="">QTY</label>
                            <input type="input" class="form-control text-input" name="qty" value="<?php echo $mydata['qty'] ?>">
                        </div>

                    </div>



                    <div class="form-row mt-5">

                        <div class="col-lg-6 col-sm-6 ">
                            <label for="" class="h3">Output</label>
                            <div class="row" style="display: none">
                                <div class="col-lg-4">
                                    <input type="checkbox" class="form-check-input ml-1" value="1" name="output_checked"
                                    <?php echo ($mydata['output_checked'] == 1 ? 'checked' : ''); ?>
                                    >
                                    <label class="form-check-label ml-4">Same as</label>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <input type="date" class="form-control text-input" name="output_date" value="<?php echo ($mydata['output_checked'] == 1 ? $mydata["output_date"] : ''); ?>">
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <label for="" class="h3">Success Indicator</label>
                            <div class="row" style="display: none">
                                <div class="col-lg-4">
                                    <input type="checkbox" class="form-check-input ml-1" value="1"
                                    name="success_checked"
                                    <?php echo ($mydata['success_checked'] == 1 ? 'checked' : ''); ?>
                                    >
                                    <label class="form-check-label ml-4">Same as</label>
                                </div>
                                <div class="col-lg-6 mt-2 ml-auto">
                                    <input type="date" class="form-control text-input" name="success_date" value="<?php echo ($mydata['success_checked'] == 1 ? $mydata["success_date"] : ''); ?>">
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="wrapper">
                        <div class="form-row mt-5">


                            <div class="col-lg-6 col-sm-6 ">

                                <?php
                                $output_description = json_decode($mydata['output_description']);
                                $output_description = array_values(array_filter($output_description, 'strlen'));
                                
                                if (!empty($output_description)) {
                                    for ($i = 0; $i < count($output_description); $i++) {
                                ?>

                                        <textarea name="output_description[]" cols="30" rows="5" class="form-control text-input mt-2" placeholder="Output"><?php echo $output_description[$i];?></textarea>

                                <?php }
                                } else {?>

                                    <textarea name="output_description[]" cols="30" rows="5" class="form-control text-input mt-2" placeholder="Output"></textarea>

                                    <?php } ?>

                            </div>


                            <div class="col-lg-6 col-sm-6">

                                <?php
                                $success_description = json_decode($mydata['success_description']);
                                $success_description = array_values(array_filter($success_description, 'strlen'));

                                if (!empty($success_description)) {
                                    for ($i = 0; $i < count($success_description); $i++) {
                                ?>

                                        <textarea name="success_description[]" cols="30" rows="5" class="form-control text-input mt-2" placeholder="Success"><?php echo $success_description[$i];?></textarea>

                                <?php }
                                } else {?>

                                    <textarea name="success_description[]" cols="30" rows="5" class="form-control text-input mt-2" placeholder="Success"></textarea>

                                    <?php } ?>


                            </div>

                        </div>
                    </div>

                    <div class="row mt-2">

                        <button type="button" class="btn button-1 float-right add_wrapper pr-1 pl-1 mb-2">Add</button>

                    </div>


                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn button-1 ">Submit</button>
                    </div>
                </form>


<?php    }
        }
    }
} else {
    echo "Wrong File id !";
}

?>

<script>
    var maxField = 10;
    var x = 1;
    $('.add_wrapper').click(function() {
        if (x < maxField) {
            x++;
            $('.wrapper').append('<div class="form-row mt-2"><div class="col-lg-6 col-sm-6 "> <label for="">Output</label> <textarea name="output_description[]" cols="30" rows="5" class="form-control text-input" placeholder="Output"></textarea> </div> <div class="col-lg-6 col-sm-6"> <label for="">Success Indicator</label> <textarea name="success_description[]" cols="30" rows="5" class="form-control text-input" placeholder="Success Indicator"></textarea> </div><button  class="btn button-1 float-right pr-1 pl-1 mt-2 remove">Remove</button> </div> ');
        }
    });

    $('.wrapper').on('click', '.remove', function(e) {
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
</script>