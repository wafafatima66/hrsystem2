<?php

include "../includes/conn.php";


if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $query = "SELECT * FROM users WHERE id = '$id'";

    $runquery = $conn->query($query);
    if ($runquery == true) {
        while ($mydata = $runquery->fetch_assoc()) {
            


?>

            <div class="container">


            <form action="" method="post">
            <div class="row ">

            <div class="col-lg-3 col-sm-12 mt-3">
                      <label for="">Username</label>
                        <input type="text" class="form-control text-input" placeholder="Username" name="username" value="<?php echo $mydata['username']; ?>">
                  </div>

                  <div class="col-lg-3 col-sm-12 mt-3">
                      <label for="">Password</label>
                        <input type="text" class="form-control text-input" placeholder="Password" name="password" value="<?php echo $mydata['password']; ?>">
                  </div>

                  <!-- <div class="col-lg-3 col-sm-12 mt-3">
                      <label for="">Employee Id</label>
                        <input type="text" class="form-control text-input" placeholder="Type id" name="emp_id" value="<?php echo $mydata['emp_id']; ?>" >
                  </div>

                  <div class="col-lg-3 col-sm-12 mt-3">
                      <label for="">Name</label>
                        <input type="text" class="form-control text-input" placeholder="Full name"  name="emp_name" value="<?php echo $mydata['name']; ?>">
                  </div> -->

                  <div class="col-lg-5 col-sm-12 mt-3">
                      <label for="">Role</label>
                        <select name="role" class="form-control text-input">
                              <option value="<?php echo $mydata['role']; ?>"><?php echo $mydata['role']; ?></option>
                              <option value="Super Administrator">Super Administrator</option>
                              <option value="HR Administrator">HR Administrator</option>
                              <option value="Department Head">Department Head</option>
                              <option value="Employee">Employee</option>
                        </select>
                  </div>

                  <input type="hidden" class="form-control text-input"  name="emp_id" value="<?php echo $mydata['emp_id']; ?>">

                        <input type="hidden" class="form-control text-input" placeholder="Department" name="department" value="<?php echo $mydata['department']; ?>" >
                  

                        <input type="hidden" class="form-control text-input" placeholder="Office/Unit"  name="office" value="<?php echo $mydata['office']; ?>">
                  

            </div>


                    <div class="modal-footer mt-4">
                        <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
                        </button>
                        <button type="submit" name="edit_user" class="btn button-1 ">Submit</button>
                    </div>


                </form>

            </div>

<?php        }
    }
} ?>

