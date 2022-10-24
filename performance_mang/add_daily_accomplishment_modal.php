<?php
if (isset($_POST['submit'])) {

    $emp_id = $_POST['emp_id'];
    $date = $_POST['date'];
    $qty = $_POST['qty'];
    // $output_description = $_POST['output_description'];
    $output_date = $_POST['output_date'];
    // $success_description = $_POST['success_description'];
    $success_date = $_POST['success_date'];

    if (isset($_POST['success_checked'])) {
        $success_checked = $_POST['success_checked'];
    } else {
        $success_checked = '';
    }

    if (isset($_POST['output_checked'])) {
        $output_checked = $_POST['output_checked'];
    } else {
        $output_checked = '';
    }



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

    $sql = "INSERT INTO daily_accomplishment (
         emp_id  , date , qty , output_date , success_date , output_description , success_description , success_checked , output_checked) VALUES (  '$emp_id'  , '$date' , '$qty' ,' $output_date' , '$success_date' , '$output_description' , '$success_description' , '$success_checked' , '$output_checked' )";



    if (mysqli_query($conn, $sql)) {
        echo  '<script>toastr.success("Daily Accomplishment added successfully")</script>';
    } else {
        echo  '<script>toastr.error("Daily Accomplishment not added. Try again !")</script>';
    }
}

?>

<div class="modal fade add_daily_accomplishment " id="add_daily_accomplishment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">


            <h3 class=" background-title-1 p-3">DAILY ACCOMPLISHMENT REPORT</h3>

            <div class="modal-body">

                <div class="container ">

                    <form method="post" action="" enctype="multipart/form-data">

                        <input type="hidden" value="<?php echo $emp_id ?>" name="emp_id" id="emp_id">

                        <div class="form-row">

                            <div class="col-lg-3 col-sm-6">
                                <label for="">Date</label>
                                <input type="date" class="form-control text-input" name="date">
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <label for="">QTY</label>
                                <input type="input" class="form-control text-input" name="qty">
                            </div>

                        </div>


                        <div class="wrapper">
                            <div class="form-row mt-2">

                                <div class="col-lg-6 col-sm-6 ">
                                    <label for="">Output</label>

                                    <textarea name="output_description[]" cols="30" rows="5" class="form-control text-input" placeholder="Output" id="output_description"></textarea>

                                    <div class="row">

                                        <div class="col-lg-6">
                                            <input type="checkbox" class="form-check-input ml-1" name="output_checked" value="1" id="output_checked_id">
                                            <label class="form-check-label ml-4">Same as</label>
                                        </div>

                                        <div class="col-lg-6 mt-2">
                                            <input type="date" class="form-control text-input" name="output_date" id="output_date">
                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-6 col-sm-6">

                                    <label for="">Success Indicator</label>
                                    
                                    <textarea name="success_description[]" cols="30" rows="5" class="form-control text-input" placeholder="Success Indicator" id="success_description"></textarea>

                                    <div class="row">

                                        <div class="col-lg-6">
                                            <input type="checkbox" class="form-check-input ml-1" name="success_checked" value="1" id="success_checked_id">
                                            <label class="form-check-label ml-4">Same as</label>
                                        </div>

                                        <div class="col-lg-6 mt-2">
                                            <input type="date" class="form-control text-input" name="success_date" id="success_date">

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row mt-2">

                            <button type="button" class="btn button-1 float-right add_wrapper pr-1 pl-1 mb-2">Add</button>

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
                            </button>
                            <button type="submit" name="submit" class="btn button-1 ">Submit</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

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

    // output check 

    function get_output_data(){
    var output_date = $("#output_date").val();
            var emp_id = $("#emp_id").val();
            // console.log(department);
            jQuery.ajax({
                url: "get_output_data.php",
                data: {
                    output_date: output_date,
                    emp_id : emp_id
                },
                type: "POST",
                success: function(data) {
                    $(".wrapper").append(data);
                },
                error: function() {}
            });
    }

    $("#output_checked_id").change(function() {
        if (this.checked) {
            if($("#output_date").val()){
                get_output_data()
            }else {
                toastr.error('Please select a date')
            }
            
        }
    });

    $("#output_date").change(function() {
        if($('#output_checked_id').is(':checked')){
            get_output_data()
        }
    });

// success check 

function get_success_data(){
    var success_date = $("#success_date").val();
            var emp_id = $("#emp_id").val();
            // console.log(department);
            jQuery.ajax({
                url: "get_success_data.php",
                data: {
                    success_date: success_date,
                    emp_id : emp_id
                },
                type: "POST",
                success: function(data) {
                    $(".wrapper").append(data);
                },
                error: function() {}
            });
    }

    $("#success_checked_id").change(function() {
        if (this.checked) {
            if($("#success_date").val()){
                get_success_data()
            }else {
                toastr.error('Please select a date')
            }
            
        }
    });

    $("#success_date").change(function() {
        if($('#success_checked_id').is(':checked')){
            get_success_data()
        }
    });
</script>