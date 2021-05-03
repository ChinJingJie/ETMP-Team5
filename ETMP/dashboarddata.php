<?php
include "sessionstart.php";
include "applicationprocess.php";

	$array = array();
	
	$conn = mysqli_connect('sql6.freemysqlhosting.net','sql6405286','csc3XZRv7d','sql6405286');
	$id = $_REQUEST['id'];
	$app_query = "SELECT * FROM application WHERE id='$id'";
	$result = mysqli_query($conn, $app_query);
	
	while($app = mysqli_fetch_assoc($result)){
		$array['id'] = $app['id'];
	}
     echo (json_encode($array));	

?>