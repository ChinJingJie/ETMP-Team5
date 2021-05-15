<?php
include "sessionstart.php";
include "applicationprocess.php";

	$array = array();
	
	$conn = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
	$id = $_REQUEST['id'];
	$app_query = "SELECT * FROM application WHERE id='$id'";
	$result = mysqli_query($conn, $app_query);
	
	while($app = mysqli_fetch_assoc($result)){
		$array['id'] = $app['id'];
		$array['isAccepted'] = $app['isAccepted'];
		$array['isPaid'] = $app['isPaid'];
		$array['isComplete'] = $app['isComplete'];
	}
     echo (json_encode($array));	

?>