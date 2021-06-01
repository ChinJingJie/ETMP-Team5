<?php
//include "sessionstart.php";
//include "applicationprocess.php";

$array = array();
	
$conn = mysqli_connect('sql6.freesqldatabase.com','sql6416331','WBlQPE6vKx','sql6416331');
$id = $_REQUEST['id'];
$app_query = "SELECT * FROM training WHERE id='$id'";
$result = mysqli_query($conn, $app_query);
	
while($app = mysqli_fetch_assoc($result)){
	$array['id'] = $app['id'];
	$array['tname'] = $app['tname'];
	$array['tdesc'] = $app['tdesc'];
	$array['category'] = $app['category'];
	$array['tTemplate'] = $app['tTemplate'];
	$array['base_price'] = $app['base_price'];
	$array['daily_price'] = $app['daily_price'];
}

echo (json_encode($array));	
?>