<?php 

include '../includes/conn.php';

if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $id = $_POST['id'];

    if($id == 'Filled'){
       
        $query = "SELECT * FROM item where filled = 1 ";
    
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
          while ($mydata = mysqli_fetch_assoc($result)) {
    
        ?>
    
    <tr> <td><?php echo $mydata['item_no']?></td>
            <td><?php echo$mydata['position']?></td>
            <td><?php echo$mydata['date_created']?></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php if ($mydata['filled']== '0'){echo "Unfilled" ;  } else {  echo "Filled" ;   }?></td>
            <td>
            <a href='<?php if ($mydata['filled']== '0'){
                    echo "unfilled.php?id=".$mydata['id']; 
                }else {
                  echo "filled.php?id=".$mydata['id'];
                }?>'>
                <i class='fa fa-edit mx-2 '></i>
            </a>
    
    <a href=''><i class='fa fa-trash mx-2'></i></a>
            </td>
        </tr>
    
        <?php }
        } 
    }else if($id == 'Unfilled'){

        $query = "SELECT * FROM item where filled = 0 ";
    
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
          while ($mydata = mysqli_fetch_assoc($result)) {
    
        ?>
    
    <tr> <td><?php echo $mydata['item_no']?></td>
            <td><?php echo$mydata['position']?></td>
            <td><?php echo$mydata['date_created']?></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php if ($mydata['filled']== '0'){echo "Unfilled" ;  } else {  echo "Filled" ;   }?></td>
            <td>
            <a href='<?php if ($mydata['filled']== '0'){
                    echo "unfilled.php?id=".$mydata['id']; 
                }else {
                  echo "filled.php?id=".$mydata['id'];
                }?>'>
                <i class='fa fa-edit mx-2 '></i>
            </a>
    
    <a href=''><i class='fa fa-trash mx-2'></i></a>
            </td>
        </tr>
    
        <?php }
        } 
        
    } else if($id == 'All') {
      $query = "SELECT * FROM item  ";

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($mydata = mysqli_fetch_assoc($result)) {

  
    ?>

<tr> <td><?php echo $mydata['item_no']?></td>
        <td><?php echo$mydata['position']?></td>
        <td><?php echo$mydata['date_created']?></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php if ($mydata['filled']== '0'){echo "Unfilled" ;  } else {  echo "Filled" ;   }?></td>
        <td>
        <a href='<?php if ($mydata['filled']== '0'){
                echo "unfilled.php?id=".$mydata['id']; 
            }else {
              echo "filled.php?id=".$mydata['id'];
            }?>'>
            <i class='fa fa-edit mx-2 '></i>
        </a>

<a href=''><i class='fa fa-trash mx-2'></i></a>
        </td>
    </tr>

    <?php }
    } else { ?>
          <tr>
            <td colspan = '8'>No data Available</td>
          </tr>
  <?php  }
    }

  }
?>