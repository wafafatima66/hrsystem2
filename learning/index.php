<?php include '../config.php';

include SITE_ROOT .'/includes/header.php'; ?>
<div class="container ">
      <div class="row">

           
      </div>
      <!-- end of first part -->

      <div class="row">
            <div class="col-lg-5 col-sm-12 mt-3">
                  <div class="input-group">
                        <input type="search" class="form-control">
                        <button type="button" class="home-page-search-btn">
                              <i class="fa fa-search"></i>
                        </button>
                      
                          <button type="button" class="ml-3 btn button-1" data-toggle="modal" data-target="#addlearning" >Add Training</button> 
                  </div>

            </div>

            
                  
                  <div class="col-lg-3 col-sm-5  mt-3">
                                    <input type="date" class="form-control text-input" placeholder="Date Picker">
                              </div>
                             <span class="mr-2 ml-2 mt-2">to</span>
                              <div class="col-lg-3 col-sm-5 mt-3">
                                    <input type="date" class="form-control text-input" placeholder="Date Picker">
                              </div>
                 
                 

      </div>

      <table class="table home-page-table mt-2 table-striped table-sm table-responsive-sm">
            <thead>
                  <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Title Of Training</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Venue</th>
                        <th scope="col">No of Hours</th>
                        <th scope="col">No of Pax</th>
                        <th scope="col">Sponser/s</th>
                        <th scope="col">Facilitor/s</th>
                  </tr>
            </thead>
            <tbody>
                  <tr>
                        <th scope="row">1</th>
                        <td>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                  </tr>
                  <tr>
                        <th scope="row">1</th>
                        <td>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                  </tr>
                  <tr>
                        <th scope="row">1</th>
                        <td>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                  </tr>

            </tbody>
      </table>
</div>

<?php include "learning_modal.php" ?>