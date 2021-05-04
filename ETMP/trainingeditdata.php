<?php
//include "sessionstart.php";
//include "applicationprocess.php";

$array = array();
	
$conn = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
$id = $_REQUEST['id'];
$app_query = "SELECT * FROM training WHERE id='$id'";
$result = mysqli_query($conn, $app_query);
	
while($app = mysqli_fetch_assoc($result)){
	$array['id'] = $app['id'];
	$array['tname'] = $app['tname'];
	$array['tdesc'] = $app['tdesc'];
	$array['category'] = $app['category'];
	$array['tTemplate'] = $app['tTemplate'];
}

echo (json_encode($array));	
?>