<?php
		include('../config.php');

		  $id=$_POST['ID'];
      $Email=$_POST['Email'];
      $Phone=$_POST['Phone'];
      $Name=$_POST['Name'];

    $sql = "UPDATE ".tbl_users_contacts." SET `email`='".$Email."',`phone`='".$Phone."',`name`='".$Name."' where id='".$id."'";

    
    $response=[];
    if ( $conn->query($sql) === TRUE  ) {
      // output data of each row
     $response=array(
       	'status'=>1,
       	'msg'=>'<p class="alert alert-success">Successfully updated</p>'
       );

  }

  else{
  	 $response=array(
       	'status'=>0,
       	'msg'=> $conn->error
       );
  }

 echo json_encode($response);


 ?>