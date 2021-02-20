<?php  
 
$server = "localhost";
$username = "root";
$password = "mysql";
$db_name = "customer";

$con = mysqli_connect($server, $username, $password, $db_name);
mysqli_select_db($con, 'customer');
 
 ?> 