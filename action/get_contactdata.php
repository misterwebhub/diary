<?php
		include('../config.php');
	
		$id=$_GET['id'];

    $sql = "SELECT * FROM ".tbl_users_contacts." where id='".$id."'";

    $result = $conn->query($sql);

    $response=[];
    if ($result->num_rows > 0) {
      // output data of each row
      $row = $result->fetch_assoc();

       $response=array(
       	'status'=>1,
       	'data'=>$row
       );

  }

  else{
  	 $response=array(
       	'status'=>0,
       	'data'=>''
       );
  }

 echo json_encode($response);


 ?>