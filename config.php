<?php 
session_start();
include('constants.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "diary";
//mysql  5.6
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

else{
	
	//echo 'connected';
}




$base_url="http://localhost/adminlte/";

?>