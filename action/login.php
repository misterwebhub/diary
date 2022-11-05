<?php
		include('../config.php');


$email=$_POST['email'];
$password=$_POST['password'];
		
		$sql = "SELECT * FROM `users` where email='".$email."' and password='".$password."' ";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		   		    $_SESSION['user_id']=$row['id'];
		   		      $_SESSION['name']=$row['name'];
		    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		  }

		} else {

	      $_SESSION['msg']="Username or password is wrong";
	      header('Location: http://localhost/adminlte/');
		exit;

	
		}
				
		header('Location: http://localhost/adminlte/dashboard.php');
		exit;


 ?>