<?php
if (mysqli_num_rows($result) > 0) {
          while ($mydata = mysqli_fetch_assoc($result)) {
    
        ?>
    
    <tr> 
        <td><?php echo $mydata['date_of_publication']?></td>
            <td><?php echo$mydata['item_number']?></td>
            <td><?php echo$mydata['plantilla']?></td>
            <td><?php echo$mydata['salary_grade']?></td>
            <td><?php echo$mydata['place_of_assignment']?></td>
           
            
            <td>
            
            <!-- <a href='edit_item.php?item_no=<?php echo $mydata['item_no'] ?>'><i class='fa fa-edit mx-2'></i></a> -->

            <a class='view_publication_btn' data-toggle='modal' data-target='#view_publication' data-id=' <?php echo$mydata['id']?>'><i class='fa fa-edit mx-2'></i></a>
            
            <a href='applicant.php?item_no=<?php echo $mydata['item_number']?>'><i class='fa fa-file-alt mx-2'></i></a>
            
            <a href='permanent_appointment.php?item-no=<?php echo $mydata['item_number'] ?>'><i class='fa fa-user-edit mx-2'></i></a>

            </td>
    </tr>
    
        <?php }
        } else { ?>
          <tr>
            <td colspan = '6'>No data Available</td>
          </tr>
  <?php  } ?>

