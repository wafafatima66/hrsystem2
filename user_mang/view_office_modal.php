<div class="modal fade" id="view_office" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <h3 class=" background-title-1 p-3">All Office/Unit</h3>

            <div class="modal-body">
                <?php
                require '../includes/conn.php';

                $query = "SELECT * FROM ( SELECT DISTINCT division, area_wrk_assign from item UNION SELECT DISTINCT department_name , office_name FROM office ) as tableC WHERE tableC.area_wrk_assign != '' ";

                $result = mysqli_query($conn, $query);
                $i = 1;

                $output = '';

                if (mysqli_num_rows($result) > 0) {

                    $output .= "<table class='table home-page-table mt-3 table-striped table-responsive-sm '>
        <thead>
            <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Office Name</th>
                    <th scope='col'>Department Name</th>
            </tr>
        </thead>
                <tbody>";

                    while ($mydata = mysqli_fetch_assoc($result)) {

                        $output .= "	<tr>
                                        <td>{$i}</td>
                                        <td>{$mydata['division']}</td>
                                        <td>{$mydata['area_wrk_assign']}</td>
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
            <th scope='col'>Office Name</th>
            <th scope='col'>Department Name</th>
          </tr>
    </thead>
    <tbody>
    <tr>
            <td colspan='3'>No data Available</td>
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