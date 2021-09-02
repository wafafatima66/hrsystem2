<?php 

include '../includes/conn.php';

if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $id = $_POST['id'];

    if($id == 'Filled'){
       
        $query = "SELECT * FROM item where status = 1 ";
        $result = mysqli_query($conn, $query);
        include "item_table.php";

    }else if($id == 'Unfilled'){

        $query = "SELECT * FROM item where status = 0 ";
        $result = mysqli_query($conn, $query);
        include "item_table.php";
        
    } else if($id == 'All') {

        $query = "SELECT * FROM item  ";
        $result = mysqli_query($conn, $query);
        include "item_table.php";
    }

  }
