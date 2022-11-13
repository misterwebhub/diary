<?php
		include('../config.php');

	$userPicPath='';
	if(isset($_FILES['UserProfile']['name'])){
			$uploaddir = '../uploads/contacts/';
			$uploadfile = $uploaddir . basename($_FILES['UserProfile']['name']);

			
			if (move_uploaded_file($_FILES['UserProfile']['tmp_name'], $uploadfile)) {
			   // echo "File is valid, and was successfully uploaded.\n";
			    $userPicPath='uploads/contacts/'.basename($_FILES['UserProfile']['name']);
			} else {
			   // echo "failed!\n";
			}
	}

$UserId=$_SESSION['user_id'];
$Email=$_POST['Email'];
$Name=$_POST['Name'];
$PhoneNUmber=$_POST['PhoneNUmber'];


		

		$sql = "INSERT INTO ".tbl_users_contacts." (`user_id`, `email`, `name`, `phone`,`user_pic`) VALUES ('".$UserId."','".$Email."','".$Name."','".$PhoneNUmber."','".$userPicPath."')";

		if ($conn->query($sql) === TRUE) {
		   $_SESSION['msg']="New record created successfully";
		} else {
			$_SESSION['msg']=$conn->error;		 
		}
		
		header('Location: '.$base_url.'add_new_contact.php');
		exit;


 ?>