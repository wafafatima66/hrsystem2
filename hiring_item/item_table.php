<?php
if (mysqli_num_rows($result) > 0) {
          while ($mydata = mysqli_fetch_assoc($result)) {
    
        ?>
    
    <tr> 
        <td><?php echo $mydata['item_no']?></td>
            <td><?php echo$mydata['position']?></td>
            <td><?php echo$mydata['date_created']?></td>
            <td><?php echo$mydata['date_posted']?></td>
            <!-- <td></td> -->
            <td><?php if ($mydata['status']== '0'){echo "Unfilled" ;  } else {  echo "Filled" ;   }?></td>
            <td>
            
            <a href='edit_item.php?item_no=<?php echo $mydata['item_no'] ?>'><i class='fa fa-edit mx-2'></i></a>
            
            <a href='delete_item.php?id=<?php echo $mydata["id"]?>' onClick="return confirm('Are you sure you want to delete the item');"><i class='fa fa-trash mx-2'></i></a>


            <!-- <a href='applicant.php?item_no=<?php echo $mydata['item_no']?>'><i class='fa fa-file-alt mx-2'></i></a>
            
            <a href='permanent_appointment.php?item-no=<?php echo $mydata['item_no'] ?>'><i class='fa fa-user-edit mx-2'></i></a> -->

            </td>
    </tr>
    
        <?php }
        } else { ?>
          <tr>
            <td colspan = '8'>No data Available</td>
          </tr>
  <?php  }