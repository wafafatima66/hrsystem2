<?php require '../includes/conn.php'; 

?>

<div id="printableArea_leave_summary" style="display: none;">

    <div class="container">

        <h4 class="">LEAVE SUMMARY</h4>

        <?php

    $department =  $_SESSION['department'] ;
    $office =  $_SESSION['office'];

        $query = "SELECT a.id, a.emp_id , a.type_of_leave , a.details_of_leave , a.no_of_working_days, a.status , b.emp_first_name , b.emp_middle_name , b.emp_last_name , b.emp_ext , b.emp_image , i.division , i.area_wrk_assign from emp_leaves a join employee b on a.emp_id = b.emp_id join item  i on a.emp_id = i.emp_id where i.division = '$department' and i.area_wrk_assign = '$office' ";

        $result = mysqli_query($conn, $query);

        $output = '';

        $output .= "<table class='table table-bordered mt-3 table-striped ' >
	<thead>
		  <tr>
				<th scope='col'>Employee Id</th>
				<th scope='col'>Name</th>
				<th scope='col'>Type Of Leave</th>
				<th scope='col'>Duration</th>
				<th scope='col'>Details of leave</th>
				<th scope='col'>Status</th>
				
		  </tr>
	</thead>
	<tbody>";

        if (mysqli_num_rows($result) > 0) {

            while ($mydata = mysqli_fetch_assoc($result)) {

                if(empty($mydata['emp_image'])){
                    $emp_image = 'no_image.jpeg';
            }else {
                $emp_image = $mydata['emp_image'];
            }
        
                $output .= "
	
	<tr>
                        <td>{$mydata['emp_id']}</td>
                        <td>
                            <img src='../emp_img/{$emp_image}' alt='' style='width: 50px; height:50px; border-radius: 100%; margin-right: 12px;'>
                            <span> {$mydata['emp_first_name']}  {$mydata['emp_middle_name']} {$mydata['emp_last_name']} {$mydata['emp_ext']} </span>
                        </td>
                        <td> {$mydata['type_of_leave']} </td>
                        <td>{$mydata['no_of_working_days']}</td>
                        <td>{$mydata['details_of_leave']}</td>
						<td>{$mydata['status']}</td>
                  </tr>";
            }

            $output .= "</tbody>
	</table>";

            echo $output;
        } else {

            $output .= "<tr><td colspan='6'>No data Available</td> </tr></tbody></table>";
            echo $output;
        }


        ?>

    </div>
</div>