<?php include '../config.php';

include SITE_ROOT . '/includes/header.php';

require '../includes/conn.php';

if (isset($_GET['emp_id'])) {

      // to save leave form

      if (isset($_POST['submit'])) {

            $date_filled = date('Y-m-d');
            $year = date("Y");

            $emp_id = $_POST['emp_id'];
            $type_of_leave = $_POST['type_of_leave'];
            $leave_from_date = $_POST['leave_from_date'];
            $leave_to_date = $_POST['leave_to_date'];
            $details_of_leave = $_POST['details_of_leave'];
            $no_of_working_days = $_POST['no_of_working_days'];

            $from_date = strtotime($leave_from_date); // or your date as well
            $to_date = strtotime($leave_to_date);


            $date_diff = round(($to_date - $from_date) / (60 * 60 * 24)) + 1;

            $sql = "INSERT INTO emp_leaves (emp_id, type_of_leave,leave_from_date,leave_to_date,details_of_leave,date_diff,no_of_working_days , date_filled) VALUE ('$emp_id', '$type_of_leave','$leave_from_date','$leave_to_date','$details_of_leave','$date_diff','$no_of_working_days' , '$date_filled')
             
              ";


            // inserting emp id to table to identify employee applied for leave
            // $sql1="INSERT INTO per_emp_leaves (emp_id) VALUE ('$emp_id')";



            //getting month year and difference to store to leave credits 

            $mon = date("m", strtotime($leave_from_date));
            $year = date("Y", strtotime($leave_from_date));

            $vacation_leave = "";
            $sick_leave = "";
            $spl = "";
            $force_leave = "";
            $lwp = "";


            if ($type_of_leave == "Vacation leave") {
                  $vacation_leave = $date_diff;
                  //$sick_leave = 1.25 ; 
            } else  if ($type_of_leave == "Sick leave") {
                  $sick_leave = $date_diff;
                  //$vacation_leave = 1.25 ; 
            } else  if ($type_of_leave == "Special priviledge leave") {
                  $spl = $date_diff;
            } else  if ($type_of_leave == "Force leave") {
                  $force_leave = $date_diff;
            } else  if ($type_of_leave == "Leave without pay") {
                  $lwp = $date_diff;
            }

            // $sql2="INSERT INTO leave_credits (emp_id,vacation_leave,sick_leave,spl,force_leave,lwp,mon,year) VALUE ('$emp_id','$vacation_leave','$sick_leave','$spl','$force_leave','$lwp','$mon','$year')";

            $query = "SELECT * FROM leave_credits WHERE emp_id = '$emp_id' and year = '$year' and mon = '$mon'";
            $runquery = $conn->query($query);
            $rowcount = mysqli_num_rows($runquery);
            if ($rowcount == 0) {

                  $sql2 = "INSERT INTO leave_credits (emp_id,vacation_leave,sick_leave,spl,force_leave,lwp,mon,year) VALUE ('$emp_id','$vacation_leave','$sick_leave','$spl','$force_leave','$lwp','$mon','$year')";

                  $conn->query($sql2);
            } else {

                  $sql3 = "UPDATE leave_credits SET vacation_leave = '$vacation_leave' ,sick_leave = '$sick_leave' , spl = '$spl' , force_leave = '$force_leave' , lwp = '$lwp'  WHERE emp_id = '$emp_id' and year = '$year' and mon = '$mon' ; ";

                  $conn->query($sql3);
            }

            if (mysqli_query($conn, $sql)) {

                  //  header("Location:../leave_mang?success");
                  echo  '<script>toastr.success("Leave form added")</script>';
            } else {
                  echo  '<script>toastr.error("Leave form not added. Try again !")</script>';
            }
      }


      $emp_id = $_GET['emp_id'];

      // echo $emp_id ;       

      $sql = "SELECT e.emp_id , e.emp_first_name , e.emp_last_name , e.emp_middle_name , e.emp_ext , a.position , a.salary_grade , a.office FROM employee e join employee_agency a on e.emp_id = a.emp_id where e.emp_id = '$emp_id'";

      // $result = mysqli_query($conn, $sql);
      // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

      $runquery = $conn->query($sql);
      if ($runquery == true) {


            while ($row = $runquery->fetch_assoc()) {

                  $emp_first_name = $row['emp_first_name'];
                  $emp_last_name = $row['emp_last_name'];
                  $emp_middle_name = $row['emp_middle_name'];
                  $emp_ext = $row['emp_ext'];
                  $position = $row['position'];
                  $salary_grade = $row['salary_grade'];
                  $office = $row['office'];
                  $emp_name =  $emp_first_name . $emp_last_name . $emp_middle_name . $emp_ext;
            }
      }
?>

      <div class="container">
            <div class="row ">
                  <h4 class="background-title-1">LEAVE FORM</h4>

                  <div class="leave-mang-box-1  container-box " style="width: 100%;">
                        <form action="" method="post">
                              <div class="form-row mt-3">

                                    <div class="col-lg-2 col-sm-6">
                                          <label for="">Employee ID</label>
                                          <input type="text" class=" form-control text-input" name="emp_id" placeholder="Employee Id" value="<?php echo $emp_id; ?>">
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                          <label for="">Employee Name</label>
                                          <input type="text" class=" form-control text-input" placeholder="First Name,Last Name,Middle Name , Ext" value="<?php echo $emp_name; ?>">
                                    </div>

                                    <div class="col-lg-2 col-sm-6">
                                          <label for="">Position</label>
                                          <input type="text" class="form-control text-input" placeholder="Position" value="<?php echo $position; ?>">
                                    </div>
                                    <div class="col-lg-2 col-sm-6">
                                          <label for="">Salary grade</label>
                                          <input type="text" class="form-control text-input" placeholder="Salary" value="<?php echo $salary_grade; ?>">
                                    </div>
                              </div>

                              <div class="form-row mt-3">
                                    <div class="col-lg-3 col-sm-6">
                                          <label for="">Office</label>
                                          <input type="text" class=" form-control text-input" placeholder="Office/Department" value="<?php echo $office; ?>">
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                          <label for="">Type of leave</label>
                                          <select class="form-control text-input" name="type_of_leave" id="type_of_leave">
                                                <option value="">Select Type of leave</option>
                                                <option value="Vacation leave">Vacation Leave</option>
                                                <option value="Sick leave">Sick Leave</option>
                                                <option value="Special priviledge leave">Special priviledge Leave</option>
                                                <option value="Force leave">Force Leave</option>
                                                <option value="Leave without pay">Leave without pay</option>
                                          </select>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                          <label for="">From date</label>
                                          <input type="date" class="form-control text-input" placeholder="Date Picker" name="leave_from_date">
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                          <label for="">To date</label>
                                          <input type="date" class="form-control text-input" placeholder="Date Picker" name="leave_to_date">
                                    </div>


                              </div>

                              <div class="form-row mt-3">
                                    <div class="col-lg-3 col-sm-6">
                                          <input type="text" class="form-control text-input" placeholder="No of Working Days" name="no_of_working_days">
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                          <textarea class="form-control text-input" rows="5" placeholder="Details Of Leave" name="details_of_leave"></textarea>
                                    </div>


                              </div>

                              <div class="text-right"><button class="ml-3 btn button-1" type="submit" name="submit">Submit</button></div>

                        </form>
                  </div>


            </div>
            <!-- end of first part -->

            <div class="row mt-5 ">
                  <h4 class="background-title-1">LEAVE APPLICATION HISTORY</h4>

                  <table class="table home-page-table mt-4 table-striped table-responsive-sm">
                        <thead>
                              <tr>
                                    <th scope="col">Date Filled</th>
                                    <th scope="col">Type of leave</th>
                                    <th scope="col">Inclusive dates</th>
                                    <th scope="col">No of working days</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Remarks</th>
                              </tr>
                        </thead>
                        <tbody>
                              <?php 
                              
	$query = "SELECT date_filled , type_of_leave , leave_from_date , leave_to_date , no_of_working_days , status , remarks from emp_leaves where emp_id = '$emp_id'";

	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) > 0) {
            while ($mydata = mysqli_fetch_assoc($result)) {
                              
                        ?>
                              <tr>
                                    <td><?php echo $mydata['date_filled'] ;  ?></td>
                                    <td><?php echo $mydata['type_of_leave'] ;  ?></td>
                                    <td><?php echo $mydata['leave_from_date'] ; ?> - <?php echo $mydata['leave_to_date'] ; ?></td>
                                    <td><?php echo $mydata['no_of_working_days'] ;  ?></td>
                                    <td><?php if($mydata['status'] == 1){echo "Leave Approved" ;} else {echo "Leave not approved";} ;  ?></td>
                                    <td><?php if($mydata['remarks'] == ''){echo "No remarks" ;} else {echo $mydata['remarks'] ;}  ?></td>
                              </tr>

                        <?php }} ?>

                        </tbody>
                  </table>

                  <div class=" mt-2 ">
                        <button class="btn button-1 " type="submit" name="submit"><i class="fa fa-print"></i></button>
                  </div>

                 

            </div>


      <?php } ?>