<?php include '../config.php';

include SITE_ROOT .'/includes/header.php'; ?>

<div class="container">
      <div class="row ">
            <h4 class="background-title-1">LEAVE FORM</h4>

            <div class="leave-mang-box-1  container-box " style="width: 100%;">
                  <form>
                        <div class="form-row mt-3">
                              <div class="col-lg-2 col-sm-6">
                                    <input type="text" class=" form-control text-input" placeholder="Employee Id">
                              </div>
                              <div class="col-lg-6 col-sm-6">
                                    <input type="text" class=" form-control text-input"
                                          placeholder="First Name,Last Name,Middle Name , Ext">
                              </div>
                              <div class="col-lg-2 col-sm-6">
                                    <input type="text" class="form-control text-input" placeholder="Position">
                              </div>
                              <div class="col-lg-2 col-sm-6">
                                    <input type="text" class="form-control text-input" placeholder="Salary">
                              </div>
                        </div>

                        <div class="form-row mt-3">
                              <div class="col-lg-3 col-sm-6">
                                    <input type="text" class=" form-control text-input" placeholder="Office/Department">
                              </div>
                              <div class="col-lg-3 col-sm-6">
                                    <select class="form-control text-input">
                                          <option selected>Type Of Leave</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                    </select>
                              </div>
                              <div class="col-lg-3 col-sm-6">
                                    <input type="date" class="form-control text-input" placeholder="Date Picker">
                              </div>
                              <div class="col-lg-3 col-sm-6">
                                    <input type="text" class="form-control text-input" placeholder="No of Working Days">
                              </div>
                        </div>

                        <div class="form-row mt-3">
                              <div class="col-lg-6 col-sm-6">
                                    <textarea class="form-control text-input" rows="5"
                                          placeholder="Details Of Leave"></textarea>
                              </div>

                              
                        </div>

                        <div class="text-right"><button class="ml-3 btn button-1">Submit</button></div>
                        
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
                        <tr>
                              <td scope="row">1</td>
                              <td></td>
                              <td>Mark</td>
                              <td>@mdo</td>
                              <td>Otto</td>
                              <td>Otto</td>
                        </tr>
                        

                  </tbody>
            </table>
            <div class=" mt-2 ">
            <button class="btn button-1 " type="submit" name="submit"><i class="fa fa-print"></i></button>
      </div>
</div>

