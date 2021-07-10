<?php

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname="hrsystem2";

$conn = mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname);

if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
} 