<?php 

include '../includes/conn.php';

if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $id = $_POST['id'];

    if($id == 'Filled'){
       
        $query = "SELECT * FROM cont_position where status = 1 ";
        $result = mysqli_query($conn, $query);
        include "position_table.php";

    }else if($id == 'Unfilled'){

        $query = "SELECT * FROM cont_position where status = 0 ";
        $result = mysqli_query($conn, $query);
        include "position_table.php";
        
    } else if($id == 'All') {

        $query = "SELECT * FROM cont_position  ";
        $result = mysqli_query($conn, $query);
        include "position_table.php";
    }

  }
