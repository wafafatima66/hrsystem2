<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<?php


?>



    <!-- <div class="form-row mt-2 mb-4">
        <div class="col-lg-12 col-sm-12">
            <h4 class="h4-heading">ITEM MANAGEMENT - PERMANENT </h4>
        </div>
    </div> -->


    <h4 class="background-title-1 p-3">Item profile (Add applicants)</h4>

    <div class="" style="border:solid 1px #505A43 ; padding:20px;">



        <div class="form-row mt-3">
            <div class="col-lg-12 col-sm-12">
                <label for="" class="h6">Applicant</label>
            </div>
        </div>

        <table class="table home-page-table mt-4 table-striped table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Rank</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>
                    <a data-toggle="modal" data-target="#view_applicant"><i class='fa fa-eye mx-2'></i></a>

                    <a data-toggle="modal" data-target="#edit_applicant"><i class='fa fa-edit mx-2 '></i></a>

                        <a href=''><i class='fa fa-trash mx-2'></i></a>
          </td>
                </tr>
               

            </tbody>
        </table>



        <div class="text-right"><button class="ml-3 btn button-1 mt-2" data-toggle="modal" data-target="#add_applicant">Add Applicant</button></div>



        <!-- end of first part -->

    </div>


<!-- add applicant modal -->

<?php  include 'add_applicant_modal.php' ?>

<!-- view applicant modal -->

<?php  include 'view_applicant_modal.php' ?>

<!-- edit applicant modal -->

<?php  include 'edit_applicant_modal.php' ?>