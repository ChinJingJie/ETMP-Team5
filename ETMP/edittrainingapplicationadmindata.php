<?php
include "sessionstart.php";
include "applicationprocess.php";

$array = array();
	
$conn = mysqli_connect('sql6.freesqldatabase.com','sql6416331','WBlQPE6vKx','sql6416331');
$id = $_REQUEST['id'];
$app_query = "SELECT * FROM application WHERE id='$id' and isSubmitted=1";
$result = mysqli_query($conn, $app_query);
	
while($app = mysqli_fetch_assoc($result)){
	$array['id'] = $app['id'];
	$array['name'] = $app['name'];
	$array['phone'] = $app['phone'];
	$array['email'] = $app['email'];
	$array['venue'] = $app['venue'];
	$array['address'] = $app['street'];
	$array['city'] = $app['city'];
	$array['postcode'] = $app['postcode'];
	$array['program'] = $app['program'];
	$array['category'] = $app['category'];
	$array['date_start'] = $app['date_start'];
	$array['date_end'] = $app['date_end'];
	$array['time_start'] = $app['time_start'];
	$array['time_end'] = $app['time_end'];
	$array['template'] = $app['template'];
	$array['remarks'] = $app['remarks'];
}
echo (json_encode($array));	
?>