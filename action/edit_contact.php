<?php
		include('../config.php');
	 ini_set ('display_errors', 'on');
	 ini_set ('log_errors', 'on');
	 ini_set ('display_startup_errors', 'on');
	 ini_set ('error_reporting', E_ALL);

		echo '<pre>';
		print_r($_FILES);
		if(isset($_POST['PhoneNUmber'])){
			echo 'hi';
		}

		else{
			echo  'jadu';
		}
		print_r($_POST);

		die;

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

		
		exit;


 ?>