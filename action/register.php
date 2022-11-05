<?php
		include('../config.php');


    	$FullName=$_POST['fullname'];
		$Email=$_POST['email'];
		$Password=$_POST['password'];
		$Phone=$_POST['phone'];
	
		if($_POST['password']!=$_POST['repassword']){
 		$_SESSION['msg']="Password Mismatched";

		header('Location: http://localhost/adminlte/');
		exit;
		}

		

		$sql = "INSERT INTO `users` (`name`, `email`, `password`, `phone`) VALUES ('".$FullName."','".$Email."','".$Password."','".$Phone."')";

		if ($conn->query($sql) === TRUE) {
		   $_SESSION['msg']="New record created successfully";
		} else {
			$_SESSION['msg']=$conn->error;		 
		}
		
		header('Location: http://localhost/adminlte/');
		exit;


 ?>