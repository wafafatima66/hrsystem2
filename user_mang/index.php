<?php include '../config.php';

include SITE_ROOT .'/includes/header.php'; ?>


<div class="container mt-5">

<h4 class="h4-heading">User Management</h4>


      <!-- end of first part -->

      <div class="row ">
           
            <div class="col-lg-3 col-sm-12 mt-3">
                  <input type="text" class="form-control text-input" placeholder="Type id">
            </div>
           
            <div class="col-lg-3 col-sm-12 mt-3">
                  <input type="text" class="form-control text-input" placeholder="">
            </div>

            <div class="col-lg-3 col-sm-12 mt-3">
                  <select name="" id="" class="form-control text-input">
                        <option value="">Role selection</option>
                        <option value=""></option>
                  </select>
            </div>

            </div>
            <div class="row ">
            <div class="col-lg-3 col-sm-12 mt-3">
                  <input type="text" class="form-control text-input" placeholder="Username">
            </div>

            <div class="col-lg-3 col-sm-12 mt-3">
                  <input type="text" class="form-control text-input" placeholder="Password">
            </div>

            <div class="col-lg-3 col-sm-12 mt-3"><button class="ml-3 btn button-1">Add user</button></div>
            
      </div>

      <table class="table home-page-table mt-3 table-striped table-sm">
            <thead>
                  <tr>
                        <th scope="col">Employee Id</th>
                        <th scope="col">NAme</th>
                        <th scope="col">User Role</th>
                        <th scope="col">Action</th>
                  </tr>
            </thead>
            <tbody>
                  <tr>
                        <th scope="row">1</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                  </tr>
                
            </tbody>
      </table>
</div>