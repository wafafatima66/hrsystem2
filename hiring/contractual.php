<div class="row mt-5 ">

    <div class=" col-lg-12 col-sm-12 mb-3">
        <h4 class="h4-heading">ITEM MANAGEMENT - JOB ORDER/CONTRACTUAL </h4>
    </div>

    <div class="col-lg-5 col-sm-6">
        <div class="input-group">
            <input type="search" class="form-control">
            <button type="button" class="home-page-search-btn">
                <i class="fa fa-search"></i>
            </button>

            <button type="button" class="ml-3 btn button-1" data-toggle="modal" data-target="#addposition">Add Position</button>


        </div>
    </div>

    <div class="ml-auto col-lg-3 col-sm-6">

        <select name="hiring_dropdown_cont" id="hiring_dropdown_cont" class="form-control text-input">
            <option value="All">Filter By</option>
            <option value="Filled">Filled</option>
            <option value="Unfilled">Unfilled</option>
        </select>

    </div>
</div>

<table class="table home-page-table mt-4 table-striped table-responsive-sm table-sm">
    <thead>
        <tr>
            <th scope="col">Position</th>
            <th scope="col">SG</th>
            <!-- <th scope="col">Description</th> -->
            <th scope="col">Duration</th>
            <th scope="col">Date posted</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <!-- <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Mark</td>
            <td>@mdo</td>
            <td>Otto</td>
            <td>Otto</td>
            <td>
            
          </td>
        </tr>
       
       

    </tbody> -->

    <tbody id="hiring-contractual-table">

        <?php
        $query = "SELECT * FROM cont_position  ";
        $result = mysqli_query($conn, $query);

        // item table
        include "position_table.php";
        ?>

    </tbody>



</table>

<div class="mt-4 ">
    <button class="btn button-1 " type="submit" name="submit"><i class="fa fa-print"></i></button>
</div>

<!-- add position modal -->
<?php include 'add_position_modal.php'; ?>

<script>
    $(document).ready(function() {

        $('#hiring_dropdown_cont').on('change', function() {
            fetchRecordsfromDB(this.value);
            // console.log(this.value);
        });

        function fetchRecordsfromDB(data) {
            $.ajax({
                url: "filter_position.php",
                cache: false,
                type: "POST",
                data: {
                    id: data
                },
                success: function(html) {
                    $("#hiring-contractual-table").empty();
                    $("#hiring-contractual-table").append(html);
                }
            });
        }


    });
</script>