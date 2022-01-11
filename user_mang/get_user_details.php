<?php

include "../includes/conn.php";


if (isset($_POST['id'])) {

      $id = $_POST['id'];

      //     $query = "SELECT * FROM users WHERE id = '$id'";
      $query = "SELECT u.* , i.division , i.area_wrk_assign , e.emp_first_name , e.emp_middle_name , e.emp_last_name FROM users u left join employee e on u.emp_id = e.emp_id left join item i on i.emp_id = u.emp_id WHERE u.id = '$id'";

      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) > 0) {
            while ($mydata = mysqli_fetch_assoc($result)) {

                  if (empty($mydata['department'])) {
                        $department = $mydata['division'];
                  } else {
                        $department = $mydata['department'];
                  } //trying to keep department assigned in users 

                  if (empty($mydata['office'])) {
                        $office = $mydata['area_wrk_assign'];
                  } else {
                        $office = $mydata['office'];
                  } //trying to keep office assigned in users 

                  if (empty($mydata['name'])) {
                        $name = $mydata['emp_first_name'] . ' ' . $mydata['emp_middle_name'] . ' ' . $mydata['emp_last_name'];
                  } else {
                        $name = $mydata['name'];
                  } //trying to keep name assigned in users

?>

                  <div class="container">

                        <form action="" method="post">
                              <div class="form-row">
                                    <div class="col-lg-6 col-sm-12 mt-3">
                                          <label for="">Full Name</label>
                                          <input type="text" class="form-control text-input" placeholder="Full name" value="<?php echo $name; ?>" disabled>
                                    </div>

                                    <div class="col-lg-3 col-sm-12 mt-3">
                                          <label for="">Username</label>
                                          <input type="text" class="form-control text-input" placeholder="Username" name="username" value="<?php echo $mydata['username']; ?>">
                                    </div>

                                    <div class="col-lg-3 col-sm-12 mt-3">
                                          <label for="">Password</label>
                                          <input type="text" class="form-control text-input" placeholder="Password" name="password" value="<?php echo $mydata['password']; ?>">
                                    </div>

                              </div>


                              <div class="form-row">

                                    <div class="col-lg-6 col-sm-12 mt-3">
                                          <label for="">Role</label>
                                          <select name="role" class="form-control text-input">
                                                <option value="<?php echo $mydata['role']; ?>"><?php echo $mydata['role']; ?></option>
                                                <option value="Super Administrator" <?php echo ($mydata['role'] == "Super Administrator") ? "hidden" : "" ?>>Super Administrator</option>

                                                <option value="HR Administrator" <?php echo ($mydata['role'] == "HR Administrator") ? "hidden" : "" ?>>HR Administrator</option>

                                                <option value="Department Head" <?php echo ($mydata['role'] == "Department Head") ? "hidden" : "" ?>>Department Head</option>

                                                <option value="Employee" <?php echo ($mydata['role'] == "Employee") ? "hidden" : "" ?>>Employee</option>

                                          </select>
                                    </div>

                                    <div class="col-lg-3 col-sm-12 mt-3">
                                          <label for="">Department</label>
                                          <!-- <input type="text" class="form-control text-input" placeholder="Department" name="department" value="<?php echo $mydata['department']; ?>"> -->

                                          <select name="department" class="form-control text-input department-select">
                                                <option value='<?= $department ?>'><?= $department ?></option>
                                                <?php
                                                $query = "select * from (SELECT DISTINCT department_name FROM department union select division from item ) as tablec where tablec.department_name != ''  ";
                                                $result = mysqli_query($conn, $query);
                                                if (mysqli_num_rows($result) > 0) {
                                                      while ($mydata1 = mysqli_fetch_assoc($result)) {
                                                            echo "<option value= '" . $mydata1['department_name'] . "'>" . $mydata1['department_name'] . "</option>";
                                                      }
                                                } else {
                                                      echo "<option value='' > Select Department </option>";
                                                }
                                                ?>

                                          </select>

                                    </div>

                                    <div class="col-lg-3 col-sm-12 mt-3">
                                          <label for="">Office</label>
                                          <!-- <input type="text" class="form-control text-input" placeholder="Office" name="office" value="<?php echo $mydata['office']; ?>"> -->



                                          <select name="office" class="form-control text-input office-select">
                                                <option value='<?= $office ?>'><?= $office ?></option>
                                                <?php
                                                // $query = "SELECT * FROM ( SELECT DISTINCT area_wrk_assign from item UNION SELECT DISTINCT  office_name FROM office ) as tableC WHERE tableC.area_wrk_assign != ''  ";
                                                // $result = mysqli_query($conn, $query);
                                                // if (mysqli_num_rows($result) > 0) {
                                                //       while ($mydata2 = mysqli_fetch_assoc($result)) {
                                                //             echo "<option value= '" . $mydata2['area_wrk_assign'] . "'>" . $mydata2['area_wrk_assign'] . "</option>";
                                                //       }
                                                // } else {
                                                //       echo "<option value='' > Select Office/Unit </option>";
                                                // }
                                                ?>

                                          </select>

                                    </div>


                                    <input type="hidden" class="form-control text-input" name="emp_id" value="<?php echo $mydata['emp_id']; ?>">

                                    <input type="hidden" class="form-control text-input" name="emp_name" value="<?php echo $mydata['name']; ?>">


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
<script>
      $(".department-select").change(function() {
            var department = $(".department-select").val();
            console.log(department);
            jQuery.ajax({
                  url: "get_office.php",
                  data: {
                        department: department
                  },
                  type: "POST",
                  success: function(data) {
                        $(".office-select").html(data);
                  },
                  error: function() {}
            });
      });
</script>