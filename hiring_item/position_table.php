<?php
if (mysqli_num_rows($result) > 0) {
          while ($mydata = mysqli_fetch_assoc($result)) {
    
        ?>
    
    <tr> 
        <td><?php echo $mydata['position_name']?></td>
            <td><?php echo$mydata['salary_grade']?></td>
            <td><?php echo$mydata['duration']?></td>
            <td><?php echo$mydata['date_posted']?></td>
            <td><?php if ($mydata['status']== '0'){echo "Unfilled" ;  } else {  echo "Filled" ;   }?></td>
            <td>
            
            <!-- <a href='edit_position.php?id=<?php echo $mydata['position_no'] ?>'>
              <i class='fa fa-edit mx-2 '></i>
            </a> -->

            <a href='edit_position.php?position_no=<?php echo $mydata['position_no'] ?>'><i class='fa fa-edit mx-2'></i></a>

            <!-- <a href='applicant.php?position_no=<?php echo $mydata['position_no'] ?>'><i class='fa fa-file-alt mx-2'></i></a>

            <a href=''><i class='fa fa-user-edit mx-2'></i></a> -->

            </td>
    </tr>
    
        <?php }
        } else { ?>
          <tr>
            <td colspan = '8'>No data Available</td>
          </tr>
  <?php  }