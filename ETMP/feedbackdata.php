<?php
include "sessionstart.php";
include "applicationprocess.php";	
	
	function getApplicationData(){
		$array = array();
		$conn = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
		$name = $_SESSION['name'];
		$application_query = "SELECT * FROM application WHERE name ='$name'";
		$result = mysqli_query($conn, $application_query);
		
		while($app = mysqli_fetch_assoc($result)){
			$array['id'] = $app['id'];
			$array['accepted'] = $app['isAccepted'];
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
		return $array;
		
	}