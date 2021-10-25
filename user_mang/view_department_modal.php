<div class="modal fade" id="view_department" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <h3 class=" background-title-1 p-3">All Department</h3>

            <div class="modal-body">
                <?php
                require '../includes/conn.php';

                $query = "select * from (SELECT DISTINCT department_name FROM department union select division from item ) as tablec where tablec.department_name != '' ";

                $result = mysqli_query($conn, $query);
                $i = 1;

                $output = '';

                if (mysqli_num_rows($result) > 0) {

                    $output .= "<table class='table home-page-table mt-3 table-striped table-responsive-sm '>
        <thead>
            <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Department Name</th>
                    
            </tr>
        </thead>
                <tbody>";

                    while ($mydata = mysqli_fetch_assoc($result)) {

                        $output .= "	<tr>
                                        <td>{$i}</td>
                                        <td>{$mydata['department_name']}</td>
                                </tr>";
                        $i++;
                    }

                    $output .= "</tbody>
            </table>";

                    echo $output;
                } else {
                    $output .= "<table class='table home-page-table mt-3 table-striped table-responsive-sm '>
    <thead>
          <tr>
            <th scope='col'>ID</th>
            <th scope='col'>Department Name</th>
          </tr>
    </thead>
    <tbody>
    <tr>
            <td colspan='2'>No data Available</td>
              </tr>
              </tbody>
    </table>";

                    echo $output;
                }

                ?>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn button-1 mr-2" data-dismiss="modal" aria-label="Close">Close
                </button>
            </div>

        </div>

    </div>

</div>