<?php include '../config.php';

include SITE_ROOT .'/includes/header.php'; ?>

<div class="container ">
      <div class="row ">
            <h4 class="background-title-1">LEAVE FORM</h4>

            <div class="leave-mang-box-1" style="width: 100%;">
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

                              <div class="col-lg-6 col-sm-6">
                                    <table class="table home-page-table table-sm ">
                                          <thead>
                                                <tr>
                                                      <th scope="col"></th>
                                                      <th scope="col">Vacation</th>
                                                      <th scope="col">Sick</th>
                                                      <th scope="col">SPL</th>
                                                      <th scope="col">Total</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                <tr>

                                                      <td>Last Balance</td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                </tr>
                                                <tr>

                                                      <td>Less this leave</td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                </tr>
                                                <tr>

                                                      <td>Updated Balance</td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                </tr>

                                          </tbody>
                                    </table>
                              </div>
                        </div>

                        <div class="text-right"><button class="ml-3 btn button-1">Submit</button></div>
                        
                  </form>
            </div>


      </div>
      <!-- end of first part -->

      <div class="row mt-5 mr-2 ml-2">
      <h4 class="background-title-1">LEAVE SUMMARY</h4>

      <div class="form-row mx-auto mt-3 ">
                  
                  <div class="col-lg col-sm-6">
                                    <input type="date" class="form-control text-input" placeholder="Date Picker">
                              </div>
                             <span class="mr-2 ml-2">to</span>
                              <div class="col-lg col-sm-6">
                                    <input type="date" class="form-control text-input" placeholder="Date Picker">
                              </div>
                 
                  </div>
            <table class="table home-page-table mt-4 table-striped ">
                  <thead>
                        <tr>
                              <th scope="col">Employee Id</th>
                              <th scope="col">Name</th>
                              <th scope="col">Type Of Leave</th>
                              <th scope="col">Duration</th>
                              <th scope="col">Details of leave</th>
                        </tr>
                  </thead>
                  <tbody>
                        <tr>
                              <th scope="row">1</th>
                              <td>
                                    <img src="../img/logo-2.png" alt="" style="width: 20px; height:20px">
                                    <span>Otto</span>
                              </td>
                              <td>Mark</td>
                              <td>@mdo</td>
                              <td>Otto</td>
                        </tr>
                        <tr>
                              <th scope="row">2</th>
                              <td>
                                    <img src="../img/logo-2.png" alt="" style="width: 20px; height:20px">
                                    <span>Otto</span></td>
                              <td>Thornton</td>
                              <td>@fat</td>
                              <td>Otto</td>
                        </tr>
                        <tr>
                              <th scope="row">2</th>
                              <td>
                                    <img src="../img/logo-2.png" alt="" style="width: 20px; height:20px;">
                                    <span>Otto</span>
                              </td>
                              <td>Thornton</td>
                              <td>@fat</td>
                              <td>Otto</td>
                        </tr>

                  </tbody>
            </table>
      </div>
</div>